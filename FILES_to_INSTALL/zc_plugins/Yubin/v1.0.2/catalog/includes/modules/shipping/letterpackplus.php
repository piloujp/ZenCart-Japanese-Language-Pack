<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: pilou2/piloujp 2025 March 11 Modified in v2.1.0 $
**/

class letterpackplus extends ZenShipping
{
    public function __construct()
    {
        $this->code = 'letterpackplus';
        $this->title = MODULE_SHIPPING_LETTERPACKPLUS_TEXT_TITLE;
        $this->description = MODULE_SHIPPING_LETTERPACKPLUS_TEXT_DESCRIPTION;
        $this->sort_order = defined('MODULE_SHIPPING_LETTERPACKPLUS_SORT_ORDER') ? MODULE_SHIPPING_LETTERPACKPLUS_SORT_ORDER : null;
        if (null === $this->sort_order) return false;

        $Pversion = zen_get_plugin_version('Yubin');
        $this->icon = (!empty($Pversion)) ? HTTPS_SERVER . DIR_WS_CATALOG . 'zc_plugins/Yubin/' . $Pversion . '/catalog/includes/templates/default/images/icons/shipping_letterpackplus.gif' : '';
        $this->tax_class = MODULE_SHIPPING_LETTERPACKPLUS_TAX_CLASS;
        $this->tax_basis = MODULE_SHIPPING_LETTERPACKPLUS_TAX_BASIS;

        // disable only when entire cart is free shipping
        if (zen_get_shipping_enabled($this->code)) {
            $this->enabled = (MODULE_SHIPPING_LETTERPACKPLUS_STATUS == 'True');
        }

        $this->update_status();
    }

    /**
     * Perform various checks to see whether this module should be visible
    **/
    public function update_status()
    {
        global $order, $db, $shipping_weight, $multiboxes, $box_sizes_array, $max_shipping_weight, $max_size_array;

        if (!$this->enabled) return;
        if (IS_ADMIN_FLAG === true) return;

        $multiboxes = MODULE_SHIPPING_LETTERPACKPLUS_MULTIBOX;
        $max_shipping_weight = MODULE_SHIPPING_LETTERPACKPLUS_MAX_WEIGHT;
        $max_size_array = array('Max_length' => MODULE_SHIPPING_LETTERPACKPLUS_MAX_LENGTH, 'Max_width' => MODULE_SHIPPING_LETTERPACKPLUS_MAX_WIDTH, 'Max_height' => MODULE_SHIPPING_LETTERPACKPLUS_MAX_HEIGHT, 'Max_girth' => MODULE_SHIPPING_LETTERPACKPLUS_MAX_GIRTH);
        if (!empty($box_sizes_array)) {
            $girth = $box_sizes_array[0][0] + $box_sizes_array[0][1] + $box_sizes_array[0][2];
            // disable if too big 
            if (IS_ADMIN_FLAG == false && ((($box_sizes_array[0][0] > MODULE_SHIPPING_LETTERPACKPLUS_MAX_LENGTH || $box_sizes_array[0][1] > MODULE_SHIPPING_LETTERPACKPLUS_MAX_WIDTH || $box_sizes_array[0][2] > MODULE_SHIPPING_LETTERPACKPLUS_MAX_HEIGHT || $girth > MODULE_SHIPPING_LETTERPACKPLUS_MAX_GIRTH) && $multiboxes != 'Size') || ($shipping_weight > MODULE_SHIPPING_LETTERPACKPLUS_MAX_WEIGHT && $multiboxes != 'Size'))) { 
            //if (IS_ADMIN_FLAG == false && ($shipping_weight > MODULE_SHIPPING_LETTERPACKPLUS_MAX_WEIGHT && $multiboxes == 'None')) { 
                $this->enabled = false;
            }
        }

        if ((int)MODULE_SHIPPING_LETTERPACKPLUS_ZONE > 0) {
            $check_flag = false;
            $check = $db->Execute("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_SHIPPING_LETTERPACKPLUS_ZONE . "' and zone_country_id = '" . $order->delivery['country']['id'] . "' order by zone_id");
            while (!$check->EOF) {
                if ($check->fields['zone_id'] < 1) {
                    $check_flag = true;
                    break;
                } elseif ($check->fields['zone_id'] == $order->delivery['zone_id']) {
                    $check_flag = true;
                    break;
                }
                $check->MoveNext();
            }

            if ($check_flag == false) {
                $this->enabled = false;
            }
        }

        if ($this->enabled) {
            // -----
            // Give a watching observer the opportunity to disable the overall shipping module.
            //
            $this->notify('NOTIFY_SHIPPING_LETTERPACKPLUS_UPDATE_STATUS', [], $this->enabled);
        }
    }

    public function quote($method = ''): array
    {
        global $order, $shipping_num_boxes;

        if ($shipping_num_boxes > 1) {
            $BQTY = ' x ' . $shipping_num_boxes;
        } else {
            $BQTY = '';
        }
        $this->quotes = array('id' => $this->code,
                              'module' => MODULE_SHIPPING_LETTERPACKPLUS_TEXT_TITLE . $BQTY,
                              'methods' => array(array('id' => $this->code,
                                                       'title' => MODULE_SHIPPING_LETTERPACKPLUS_TEXT_WAY,
                                                       'cost' => MODULE_SHIPPING_LETTERPACKPLUS_COST*$shipping_num_boxes)));
        if ($this->tax_class > 0) {
            $this->quotes['tax'] = zen_get_tax_rate($this->tax_class, $order->delivery['country']['id'], $order->delivery['zone_id']);
        }

        if (!empty($this->icon)) $this->quotes['icon'] = zen_image($this->icon, $this->title, $width = '', $height = '', $parameters = ' style="vertical-align: middle"');
        return $this->quotes;
    }

    public function check()
    {
        global $db;
        if (!isset($this->_check)) {
            $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_SHIPPING_LETTERPACKPLUS_STATUS'");
            $this->_check = $check_query->RecordCount();
        }
        return $this->_check;
    }

    public function install(): void
    {
        global $db;
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Letter Pack Plus shipping', 'MODULE_SHIPPING_LETTERPACKPLUS_STATUS', 'True', 'Do you want to offer Letter Pack Plus rate shipping?', '6', '0', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Enable or Disable Letter Pack Plus shipping method for some categories', 'MODULE_SHIPPING_LETTERPACKPLUS_CATEGORIES', 'Disable', 'Do you want to enable or disable Letter Pack Plus shipping for some categories?', '6', '0', 'zen_cfg_select_option(array(\'Enable\', \'Disable\'), ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('Enable/Disable categories IDs list', 'MODULE_SHIPPING_LETTERPACKPLUS_CAT_LIST', '', 'Comma separated list of categoies IDs to be enabled or disabled, depending on above option.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Enable or Disable Letter Pack Plus shipping method for some products', 'MODULE_SHIPPING_LETTERPACKPLUS_PRODUCTS', 'Disable', 'Do you want to enable or disable Letter Pack Plus shipping for some products?', '6', '0', 'zen_cfg_select_option(array(\'Enable\', \'Disable\'), ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('Enable/Disable products IDs list', 'MODULE_SHIPPING_LETTERPACKPLUS_PROD_LIST', '', 'Comma separated list of products IDs to be enables or disabled, depending on above option.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable multi-boxing for this Method', 'MODULE_SHIPPING_LETTERPACKPLUS_MULTIBOX', 'None', 'Do you want to add new parcels when limit is reached and on what basis? Options are:<br>None - No multi-boxing<br>Size - Add new boxes when size limit is reached', '6', '0', 'zen_cfg_select_option(array(\'None\', \'Size\'), ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, val_function, date_added) values ('Shipping Cost', 'MODULE_SHIPPING_LETTERPACKPLUS_COST', '600', 'The shipping cost for all orders using this shipping method.', '6', '0', '" . '{"error":"TEXT_POSITIVE_FLOAT","id":"FILTER_VALIDATE_FLOAT","options":{"options":{"min_range":0}}}'  . "', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum shipping weight', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_WEIGHT', '4', 'Maximum weight that can be ship with this method.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner length', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_LENGTH', '31', 'Maximum length of envelope inside volume.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner width', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_WIDTH', '25', 'Maximum width of envelope inside volume.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner height', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_HEIGHT', '6', 'Maximum height of envelope inside volume.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner girth', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_GIRTH', '60', 'Maximum girth of envelope inside volume.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Tax Class', 'MODULE_SHIPPING_LETTERPACKPLUS_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', '6', '0', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Tax Basis', 'MODULE_SHIPPING_LETTERPACKPLUS_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br>Shipping - Based on customers Shipping Address<br>Billing Based on customers Billing address<br>Store - Based on Store address if Billing/Shipping Zone equals Store zone', '6', '0', 'zen_cfg_select_option(array(\'Shipping\', \'Billing\', \'Store\'), ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Shipping Zone', 'MODULE_SHIPPING_LETTERPACKPLUS_ZONE', '0', 'If a zone is selected, only enable this shipping method for that zone.', '6', '0', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_SHIPPING_LETTERPACKPLUS_SORT_ORDER', '0', 'Sort order of display.', '6', '0', now())");
    }

    public function keys(): array
    {
        return [
            'MODULE_SHIPPING_LETTERPACKPLUS_STATUS',
            'MODULE_SHIPPING_LETTERPACKPLUS_CATEGORIES',
            'MODULE_SHIPPING_LETTERPACKPLUS_CAT_LIST',
            'MODULE_SHIPPING_LETTERPACKPLUS_PRODUCTS',
            'MODULE_SHIPPING_LETTERPACKPLUS_PROD_LIST',
            'MODULE_SHIPPING_LETTERPACKPLUS_MULTIBOX',
            'MODULE_SHIPPING_LETTERPACKPLUS_COST',
            'MODULE_SHIPPING_LETTERPACKPLUS_MAX_WEIGHT',
            'MODULE_SHIPPING_LETTERPACKPLUS_MAX_LENGTH',
            'MODULE_SHIPPING_LETTERPACKPLUS_MAX_WIDTH',
            'MODULE_SHIPPING_LETTERPACKPLUS_MAX_HEIGHT',
            'MODULE_SHIPPING_LETTERPACKPLUS_MAX_GIRTH',
            'MODULE_SHIPPING_LETTERPACKPLUS_TAX_CLASS',
            'MODULE_SHIPPING_LETTERPACKPLUS_TAX_BASIS',
            'MODULE_SHIPPING_LETTERPACKPLUS_ZONE',
            'MODULE_SHIPPING_LETTERPACKPLUS_SORT_ORDER',
        ];
    }
}

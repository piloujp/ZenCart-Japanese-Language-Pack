<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: pilou2/piloujp 2025 March 11 Modified in v2.1.0 $
**/

class nekoposu  extends ZenShipping
{
    public function __construct()
    {
        $this->code = 'nekoposu';
        $this->title = MODULE_SHIPPING_NEKOPOSU_TEXT_TITLE;
        $this->description = MODULE_SHIPPING_NEKOPOSU_TEXT_DESCRIPTION;
        $this->sort_order = defined('MODULE_SHIPPING_NEKOPOSU_SORT_ORDER') ? MODULE_SHIPPING_NEKOPOSU_SORT_ORDER : null;
        if (null === $this->sort_order) return;

        $Pversion = zen_get_plugin_version('Yamato');
        $this->icon = (!empty($Pversion)) ? HTTPS_SERVER . DIR_WS_CATALOG . 'zc_plugins/Yamato/' . $Pversion . '/catalog/includes/templates/default/images/icons/shipping_yamato.gif' : '';
        $this->tax_class = MODULE_SHIPPING_NEKOPOSU_TAX_CLASS;
        $this->tax_basis = MODULE_SHIPPING_NEKOPOSU_TAX_BASIS;

        // disable only when entire cart is free shipping
        if (zen_get_shipping_enabled($this->code)) {
            $this->enabled = (MODULE_SHIPPING_NEKOPOSU_STATUS == 'True');
        }

        $this->update_status();
    }

    /**
     * Perform various checks to see whether this module should be visible
    **/
    public function update_status()
    {
        global $order, $db, $shipping_weight, $box_sizes_array;

        if ($this->enabled === false || IS_ADMIN_FLAG === true) {
            return;
        }

        if (!empty($box_sizes_array)) {
            $girth = $box_sizes_array[0][0] + $box_sizes_array[0][1] + $box_sizes_array[0][2];
            // disable if too big 
            if (IS_ADMIN_FLAG == false && ($box_sizes_array[0][0] > MODULE_SHIPPING_NEKOPOSU_MAX_LENGTH || $box_sizes_array[0][1] > MODULE_SHIPPING_NEKOPOSU_MAX_WIDTH || $box_sizes_array[0][2] > MODULE_SHIPPING_NEKOPOSU_MAX_HEIGHT || $girth > MODULE_SHIPPING_NEKOPOSU_MAX_GIRTH || $shipping_weight > MODULE_SHIPPING_NEKOPOSU_MAX_WEIGHT)) { 
                $this->enabled = false;
            }
        }

        $this->checkEnabledForZone(MODULE_SHIPPING_NEKOPOSU_ZONE);

        if ($this->enabled) {
            // -----
            // Give a watching observer the opportunity to disable the overall shipping module.
            //
            $this->notify('NOTIFY_SHIPPING_NEKOPOSU_UPDATE_STATUS', [], $this->enabled);
        }
    }

    public function quote($method = ''): array
    {
        global $order, $box_sizes_array;

        $this->quotes = ['id' => $this->code,
                         'module' => MODULE_SHIPPING_NEKOPOSU_TEXT_TITLE,
                         'methods' => [['id' => $this->code,
                                        'title' => MODULE_SHIPPING_NEKOPOSU_TEXT_WAY,
                                        'cost' => MODULE_SHIPPING_NEKOPOSU_COST
                                      ]]
                        ];
        if ($this->tax_class > 0) {
            $this->quotes['tax'] = zen_get_tax_rate($this->tax_class, $order->delivery['country']['id'], $order->delivery['zone_id']);
        }

        if (!empty($this->icon)) {
            $this->quotes['icon'] = zen_image($this->icon, $this->title, $width = '', $height = '', $parameters = ' style="vertical-align: middle"');
        }

        if (empty($box_sizes_array) || $box_sizes_array[0][0] == 0 || $box_sizes_array[0][1] == 0 || $box_sizes_array[0][2] == 0) {
            $this->quotes['error'] = MODULE_SHIPPING_YAMATO_TEXT_DIMENSION_MISSING;
        }

        return $this->quotes;
    }

    public function check()
    {
        global $db;
        if (!isset($this->_check)) {
            $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_SHIPPING_NEKOPOSU_STATUS'");
            $this->_check = $check_query->RecordCount();
        }
        return $this->_check;
    }

    public function install(): void
    {
        global $db;
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Nekoposu shipping method', 'MODULE_SHIPPING_NEKOPOSU_STATUS', 'True', 'Do you want to offer Nekoposu rate shipping?', '6', '0', 'zen_cfg_select_option([\'True\', \'False\'], ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Enable or Disable Nekoposu shipping method for some categories', 'MODULE_SHIPPING_NEKOPOSU_CATEGORIES', 'Disable', 'Do you want to enable or disable Nekoposu shipping for some categories?', '6', '0', 'zen_cfg_select_option([\'Enable\', \'Disable\'], ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('Enable/Disable categories IDs list', 'MODULE_SHIPPING_NEKOPOSU_CAT_LIST', '', 'Comma separated list of categoies IDs to be enabled or disabled, depending on above option.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Enable or Disable Nekoposu shipping method for some products', 'MODULE_SHIPPING_NEKOPOSU_PRODUCTS', 'Disable', 'Do you want to enable or disable Nekoposu shipping for some products?', '6', '0', 'zen_cfg_select_option([\'Enable\', \'Disable\'], ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('Enable/Disable products IDs list', 'MODULE_SHIPPING_NEKOPOSU_PROD_LIST', '', 'Comma separated list of products IDs to be enables or disabled, depending on above option.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, val_function, date_added) values ('Shipping Cost', 'MODULE_SHIPPING_NEKOPOSU_COST', '385', 'The shipping cost for all orders using this shipping method.', '6', '0', '" . '{"error":"TEXT_POSITIVE_FLOAT","id":"FILTER_VALIDATE_FLOAT","options":{"options":{"min_range":0}}}'  . "', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum shipping weight', 'MODULE_SHIPPING_NEKOPOSU_MAX_WEIGHT', '1', 'Maximum weight that can be ship with this method.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner length', 'MODULE_SHIPPING_NEKOPOSU_MAX_LENGTH', '33.5', 'Maximum length of envelope inside volume.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner width', 'MODULE_SHIPPING_NEKOPOSU_MAX_WIDTH', '22.5', 'Maximum width of envelope inside volume.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner height', 'MODULE_SHIPPING_NEKOPOSU_MAX_HEIGHT', '2.8', 'Maximum height of envelope inside volume.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner girth', 'MODULE_SHIPPING_NEKOPOSU_MAX_GIRTH', '58', 'Maximum girth of envelope inside volume.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Tax Class', 'MODULE_SHIPPING_NEKOPOSU_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', '6', '0', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Tax Basis', 'MODULE_SHIPPING_NEKOPOSU_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br>Shipping - Based on customers Shipping Address<br>Billing Based on customers Billing address<br>Store - Based on Store address if Billing/Shipping Zone equals Store zone', '6', '0', 'zen_cfg_select_option([\'Shipping\', \'Billing\', \'Store\'], ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Shipping Zone', 'MODULE_SHIPPING_NEKOPOSU_ZONE', '0', 'If a zone is selected, only enable this shipping method for that zone.', '6', '0', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_SHIPPING_NEKOPOSU_SORT_ORDER', '0', 'Sort order of display.', '6', '0', now())");
    }

    public function keys(): array
    {
        return [
            'MODULE_SHIPPING_NEKOPOSU_STATUS',
            'MODULE_SHIPPING_NEKOPOSU_CATEGORIES',
            'MODULE_SHIPPING_NEKOPOSU_CAT_LIST',
            'MODULE_SHIPPING_NEKOPOSU_PRODUCTS',
            'MODULE_SHIPPING_NEKOPOSU_PROD_LIST',
            'MODULE_SHIPPING_NEKOPOSU_COST',
            'MODULE_SHIPPING_NEKOPOSU_MAX_WEIGHT',
            'MODULE_SHIPPING_NEKOPOSU_MAX_LENGTH',
            'MODULE_SHIPPING_NEKOPOSU_MAX_WIDTH',
            'MODULE_SHIPPING_NEKOPOSU_MAX_HEIGHT',
            'MODULE_SHIPPING_NEKOPOSU_MAX_GIRTH',
            'MODULE_SHIPPING_NEKOPOSU_TAX_CLASS',
            'MODULE_SHIPPING_NEKOPOSU_TAX_BASIS',
            'MODULE_SHIPPING_NEKOPOSU_ZONE',
            'MODULE_SHIPPING_NEKOPOSU_SORT_ORDER',
        ];
    }
}

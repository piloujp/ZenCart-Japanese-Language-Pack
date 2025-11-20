<?php
/**
 * @copyright Copyright 2003-2025 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: pilou2/piloujp 2025 March 24 Modified in v2.1.0 $
**/

use Zencart\Plugins\Catalog\Yubin\_Yupack;

class yupack extends ZenShipping
{
    /**
     * $yupack_countries is the country number->code Yupack is shipping
     * @var array
    **/
    public $yupack_countries;
    /**
     * $yupack_countries_nbr is country number Yupack is shipping
     * @var array
    **/
    public $yupack_countries_nbr;

    /**
     * constructor
     *
     * @return yupack
    **/
    public function __construct()
    {
        global $order, $db;

        $this->code = 'yupack';
        $this->title = MODULE_SHIPPING_YUPACK_TEXT_TITLE;
        $this->description = MODULE_SHIPPING_YUPACK_TEXT_DESCRIPTION;
        $this->sort_order = defined('MODULE_SHIPPING_YUPACK_SORT_ORDER') ? MODULE_SHIPPING_YUPACK_SORT_ORDER : null;
        if (null === $this->sort_order) return;

        $Pversion = zen_get_plugin_version('Yubin');
        $this->icon = (!empty($Pversion)) ? HTTPS_SERVER . DIR_WS_CATALOG . 'zc_plugins/Yubin/' . $Pversion . '/catalog/includes/templates/default/images/icons/shipping_yupack.png' : '';
        $this->tax_class = MODULE_SHIPPING_YUPACK_TAX_CLASS;
        $this->tax_basis = MODULE_SHIPPING_YUPACK_TAX_BASIS;
        // disable only when entire cart is free shipping
        if (zen_get_shipping_enabled($this->code)) {
            $this->enabled = (MODULE_SHIPPING_YUPACK_STATUS == 'True');
        }

        $japan_id = zen_country_iso_to_id('JP');
        $this->yupack_countries = array($japan_id => 'JP');
        $this->yupack_countries_nbr = array($japan_id);

        $this->update_status();
    }

    /**
     * Perform various checks to see whether this module should be visible
    **/
    public function update_status()
    {
        global $order, $db;

        if ($this->enabled === false || IS_ADMIN_FLAG === true) {
            return;
        }

        $this->checkEnabledForZone(MODULE_SHIPPING_YUPACK_ZONE);

        if ($this->enabled) {
            // -----
            // Give a watching observer the opportunity to disable the overall shipping module.
            //
            $this->notify('NOTIFY_SHIPPING_YUPACK_UPDATE_STATUS', [], $this->enabled);
        }
    }
    /**
     *  Obtain quote from shipping system/calculations
     *
     * @param string $method
     * @return unknown
    **/
    public function quote($method = ''): array
    {
        global $box_array, $box_sizes_array, $max_shipping_weight;
        global $order;
        global $a_yupack_time;
        global $db;

        if (empty($order->delivery['zone_id']) == true) { return [];}

        $this->quotes = array('id' => $this->code, 'module' => $this->title);
        if (zen_not_null($this->icon)) $this->quotes['icon'] = zen_image($this->icon, $this->title, $width = '', $height = '', $parameters = ' style="vertical-align: middle"');

        $max_shipping_weight = MODULE_SHIPPING_YUPACK_MAX_WEIGHT;
        $country_id = $order->delivery['country']['id'];
        $zone_id    = $order->delivery['zone_id'];

        $shipping_num_boxes = 1;

        if (in_array($country_id, $this->yupack_countries_nbr)) {
            $zoneinfo = $db->Execute("SELECT zone_code FROM " . TABLE_ZONES . " WHERE zone_id = '" . $zone_id . "'");
            $s_zone_code = $zoneinfo->fields['zone_code'];

            // 送料が条件によって無料になってしまう(ここではtotalではなくsubtotalを確認すべき)
            if ( (MODULE_SHIPPING_YUPACK_FREE_SHIPPING != 'True') || ((int)$order->info['subtotal'] < (int)MODULE_SHIPPING_YUPACK_OVER) ) {
                $rate = new _Yupack($this->code, MODULE_SHIPPING_YUPACK_TEXT_WAY_NORMAL, zen_get_zone_code( STORE_COUNTRY,STORE_ZONE,0), STORE_COUNTRY);
                $rate->SetDest($s_zone_code, $this->yupack_countries[$country_id]);
                if (!empty($box_sizes_array)) {
                    $total_boxes_quote = 0;
                    $safefactor = 1.05; // when you build a box you need safety margins
                    for ($b=0; $b < $shipping_num_boxes; $b++) { // loop through boxes
                        $rate->SetWeight($box_array[$b]['box_weight']);
                        $ship_length = ceil($box_sizes_array[$b][0] * $safefactor);
                        $ship_width = ceil($box_sizes_array[$b][1] * $safefactor);
                        $ship_height = ceil($box_sizes_array[$b][2] * $safefactor);
                        $rate->SetSize($ship_length, $ship_width, $ship_height);
                        $tmpQuote = $rate->GetQuote(); // id, title, cost | error
                        $box_array[$b]['box_quote'] = $tmpQuote['cost'];
                        $bgirth[$b] = $ship_length + $ship_width + $ship_height;

                        if (isset($tmpQuote['error'])) {
                            $this->quotes['error'] = $tmpQuote['error'];
                        } else {
                            if ($b == 0) {
                                $this->quotes['module'] = $this->title . ' (' . $box_array[$b]['box_weight'] . TEXT_SHIPPING_WEIGHT . ', ' . $bgirth[$b] . 'cm';
                            } else {
                                $this->quotes['module'] .= ', ' . $box_array[$b]['box_weight'] . TEXT_SHIPPING_WEIGHT . ', ' . $bgirth[$b] . 'cm';
                            }
                            if ($b == $shipping_num_boxes-1) {
                                $this->quotes['module'] .= ')';
                            }
                            $total_boxes_quote += $tmpQuote['cost'];
                        }
                    }
                    $tmpQuote['cost'] = $total_boxes_quote;
                } else {
                    $rate->SetSize();
                    $tmpQuote = $rate->GetQuote();
                    $this->quotes['error'] = $tmpQuote['error'];
                    $tmpQuote['cost'] = -1;
                }
                // 手数料
                $tmpQuote['cost'] += MODULE_SHIPPING_YUPACK_HANDLING;
            } else {
                $tmpQuote = array('id' => $this->code, 'title' => MODULE_SHIPPING_YUPACK_TEXT_WAY_NORMAL, 'cost' => 0);
            }

            if (!isset($tmpQuote['error'])) {
                // 配送時刻指定
                $timespec = $this->get_timespec();
                $tmpQuote['option'] = TEXT_TIME_SPECIFY.zen_draw_pull_down_menu('yupack_timespec', $a_yupack_time, $timespec,'style="width: 160px;"');
                $tmpQuote['timespec'] = $timespec;
            }

            $this->quotes['methods'][] = $tmpQuote;

            if ($this->tax_class > 0) {
                $this->quotes['tax'] = zen_get_tax_rate($this->tax_class, $country_id, $zone_id);
            }
        } else {
            $this->quotes['error'] = MODULE_SHIPPING_YUPACK_TEXT_NOTAVAILABLE;
        }
        return $this->quotes;
    }

    // 時刻を指定するプルダウンメニューの'value'を返す
    protected function get_timespec()
    {
        global $a_yupack_time;
        global $shipping;

        $selected = $a_yupack_time[0]['id'];
        if ( isset($_POST['yupack_timespec']) ) {
            $selected = $_POST['yupack_timespec'];
        } elseif ( is_array($shipping) ) {
            list($module, $method) = explode('_', $shipping['id']);
            if ($module == $this->code) {
                $selected = $shipping['timespec'];
            }
        }
        return $selected;
    }

    /**
     * Check to see whether module is installed
     *
     * @return unknown
    **/
    public function check()
    {
        global $db;
        if (!isset($this->_check)) {
            $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_SHIPPING_YUPACK_STATUS'");
            $this->_check = $check_query->RecordCount();
        }
        return $this->_check;
    }

    /**
     * Install the shipping module and its configuration settings
     *
    **/
    public function install(): void
    {
        global $db;
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Enable Yu-Pack shipping method', 'MODULE_SHIPPING_YUPACK_STATUS', 'True', 'Do you want to offer Yu-Pack rate shipping?', '6', '0', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Enable or Disable Yu-Pack shipping method for some categories', 'MODULE_SHIPPING_YUPACK_CATEGORIES', 'Disable', 'Do you want to enable or disable Yu-Pack shipping for some categories?', '6', '0', 'zen_cfg_select_option(array(\'Enable\', \'Disable\'), ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('Enable/Disable categories IDs list', 'MODULE_SHIPPING_YUPACK_CAT_LIST', '', 'Comma separated list of categoies IDs to be enabled or disabled, depending on above option.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Enable or Disable Yu-Pack shipping method for some products', 'MODULE_SHIPPING_YUPACK_PRODUCTS', 'Disable', 'Do you want to enable or disable Yu-Pack shipping for some products?', '6', '0', 'zen_cfg_select_option(array(\'Enable\', \'Disable\'), ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('Enable/Disable products IDs list', 'MODULE_SHIPPING_YUPACK_PROD_LIST', '', 'Comma separated list of products IDs to be enables or disabled, depending on above option.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Handling Fee', 'MODULE_SHIPPING_YUPACK_HANDLING', '0', 'Handling fee for this shipping method.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Max shipping weight', 'MODULE_SHIPPING_YUPACK_MAX_WEIGHT', '30', 'Maximum weight that can be ship with this method.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Max shipping girth', 'MODULE_SHIPPING_YUPACK_MAX_GIRTH', '170', 'Maximum size (girth) that can be ship with this method.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Free shipping settings', 'MODULE_SHIPPING_YUPACK_FREE_SHIPPING', 'False', 'Would you like to activate the free shipping setting?Select False to give priority to other modules [Shipping cost]-[Free options]...', '6', '2', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('Minimum order for free shipping', 'MODULE_SHIPPING_YUPACK_OVER', '50000', 'If you purchase more than the set amount, shipping will be free.', '6', '3', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Tax Class', 'MODULE_SHIPPING_YUPACK_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', '6', '0', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Tax Basis', 'MODULE_SHIPPING_YUPACK_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br>Shipping - Based on customers Shipping Address<br>Billing Based on customers Billing address<br>Store - Based on Store address if Billing/Shipping Zone equals Store zone', '6', '0', 'zen_cfg_select_option(array(\'Shipping\', \'Billing\', \'Store\'), ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Shipping Zone', 'MODULE_SHIPPING_YUPACK_ZONE', '0', 'If a zone is selected, only enable this shipping method for that zone.', '6', '4', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_SHIPPING_YUPACK_SORT_ORDER', '0', 'Sort order of display.', '6', '6', now())");
    }

    /**
     * Internal list of configuration keys used for configuration of the module
     * 
    **/
    public function keys(): array
    {
        return [
            'MODULE_SHIPPING_YUPACK_STATUS',
            'MODULE_SHIPPING_YUPACK_CATEGORIES',
            'MODULE_SHIPPING_YUPACK_CAT_LIST',
            'MODULE_SHIPPING_YUPACK_PRODUCTS',
            'MODULE_SHIPPING_YUPACK_PROD_LIST',
            'MODULE_SHIPPING_YUPACK_HANDLING',
            'MODULE_SHIPPING_YUPACK_MAX_WEIGHT',
            'MODULE_SHIPPING_YUPACK_MAX_GIRTH',
            'MODULE_SHIPPING_YUPACK_FREE_SHIPPING',
            'MODULE_SHIPPING_YUPACK_OVER',
            'MODULE_SHIPPING_YUPACK_TAX_CLASS',
            'MODULE_SHIPPING_YUPACK_TAX_BASIS',
            'MODULE_SHIPPING_YUPACK_ZONE',
            'MODULE_SHIPPING_YUPACK_SORT_ORDER',
        ];
    }
}

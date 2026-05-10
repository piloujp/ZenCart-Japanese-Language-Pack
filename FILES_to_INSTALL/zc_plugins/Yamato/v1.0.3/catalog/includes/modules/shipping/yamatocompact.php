<?php
/**
 * @copyright Copyright 2003-2025 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: pilou2/piloujp 2025 March 24 Modified in v2.1.0 $
**/

use Zencart\Plugins\Catalog\Yamato\_Yamato;

class yamatocompact extends ZenShipping
{
    /**
     * $japan_id is the country number for Japan
     * @var array
     */
    public $japan_id;
    /**
     * $box_enabled public property used to allow use of envelopes for shipping
     */
    public bool $envelope_enabled;
    /**
     * $box_enabled public property used to allow use of boxes for shipping
     */
    public bool $box_enabled;

    /**
     * constructor
     *
     * @return yamatocompact
    **/
    public function __construct()
    {
        global $order, $db;

        $this->code = 'yamatocompact';
        $this->title = MODULE_SHIPPING_YAMATOCOMPACT_TEXT_TITLE;
        $this->description = MODULE_SHIPPING_YAMATOCOMPACT_TEXT_DESCRIPTION;
        $this->sort_order = defined('MODULE_SHIPPING_YAMATOCOMPACT_SORT_ORDER') ? MODULE_SHIPPING_YAMATOCOMPACT_SORT_ORDER : null;
        if (null === $this->sort_order) return;

        $Pversion = zen_get_plugin_version('Yamato');
        $this->icon = (!empty($Pversion)) ? HTTPS_SERVER . DIR_WS_CATALOG . 'zc_plugins/Yamato/' . $Pversion . '/catalog/includes/templates/default/images/icons/shipping_yamato.gif' : '';
        $this->tax_class = MODULE_SHIPPING_YAMATOCOMPACT_TAX_CLASS;
        $this->tax_basis = MODULE_SHIPPING_YAMATOCOMPACT_TAX_BASIS;
        // disable only when entire cart is free shipping
        if (zen_get_shipping_enabled($this->code)) {
            $this->enabled = (MODULE_SHIPPING_YAMATOCOMPACT_STATUS == 'True');
            $this->envelope_enabled = (MODULE_SHIPPING_YAMATOCOMPACT_CONTAINER_STATUS === 'Both' || MODULE_SHIPPING_YAMATOCOMPACT_CONTAINER_STATUS === 'Envelope') ? true : false;
            $this->box_enabled = (MODULE_SHIPPING_YAMATOCOMPACT_CONTAINER_STATUS === 'Both' || MODULE_SHIPPING_YAMATOCOMPACT_CONTAINER_STATUS === 'Box') ? true : false;
        }

        $this->japan_id = (int)zen_country_iso_to_id('JP');

        $this->update_status();
    }

    /**
     * Perform various checks to see whether this module should be visible
    **/
    public function update_status()
    {
        global $order, $db, $box_sizes_array;
        if ($this->enabled === false || IS_ADMIN_FLAG === true) {
            return;
        }

        if (!empty($box_sizes_array)) {
            $girth = $box_sizes_array[0][0] + $box_sizes_array[0][1] + $box_sizes_array[0][2];
            // disable if too big
            if ($this->envelope_enabled === true && ($box_sizes_array[0][0] > MODULE_SHIPPING_YAMATOCOMPACT_ENVELOPE_MAX_LENGTH || $box_sizes_array[0][1] > MODULE_SHIPPING_YAMATOCOMPACT_ENVELOPE_MAX_WIDTH ||
            $box_sizes_array[0][2] > MODULE_SHIPPING_YAMATOCOMPACT_ENVELOPE_MAX_HEIGHT || $girth > MODULE_SHIPPING_YAMATOCOMPACT_ENVELOPE_MAX_GIRTH)) {
                $this->envelope_enabled = false;
            }
            if ($this->box_enabled === true && ($box_sizes_array[0][0] > MODULE_SHIPPING_YAMATOCOMPACT_BOX_MAX_LENGTH || $box_sizes_array[0][1] > MODULE_SHIPPING_YAMATOCOMPACT_BOX_MAX_WIDTH ||
            $box_sizes_array[0][2] > MODULE_SHIPPING_YAMATOCOMPACT_BOX_MAX_HEIGHT || $girth > MODULE_SHIPPING_YAMATOCOMPACT_BOX_MAX_GIRTH)) {
                $this->box_enabled = false;
            }
            if (IS_ADMIN_FLAG === false && ($this->envelope_enabled === false && $this->box_enabled === false)) {
                $this->enabled = false;
            }
        }

        $this->checkEnabledForZone(MODULE_SHIPPING_YAMATOCOMPACT_ZONE);

        if ($this->enabled == true && (int)$order->delivery['country']['id'] !== $this->japan_id) {
            $this->enabled = false;
        }

        if ($this->enabled) {
            // -----
            // Give a watching observer the opportunity to disable the overall shipping module.
            //
            $this->notify('NOTIFY_SHIPPING_YAMATOCOMPACT_UPDATE_STATUS', [], $this->enabled);
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
        global $box_array, $box_sizes_array;
        global $order;
        global $a_yamato_time;
        global $db;

        if (empty($order->delivery['zone_id']) == true) { return [];}

        $this->quotes = ['id' => $this->code, 'module' => $this->title];
        if (zen_not_null($this->icon)) $this->quotes['icon'] = zen_image($this->icon, $this->title, $width = '', $height = '', $parameters = ' style="vertical-align: middle"');

        $country_id = $order->delivery['country']['id'];
        $zone_id = $order->delivery['zone_id'];

        $shipping_num_boxes = 1;

        if ((int)$country_id === $this->japan_id) {
            $zoneinfo = $db->Execute("SELECT zone_code FROM ".TABLE_ZONES." WHERE zone_id = '".$zone_id."'");
            $s_zone_code = $zoneinfo->fields['zone_code'];

            // 送料が条件によって無料になってしまう(ここではtotalではなくsubtotalを確認すべき)
            if ((MODULE_SHIPPING_YAMATOCOMPACT_FREE_SHIPPING != 'True') || ((int)$order->info['subtotal'] < (int)MODULE_SHIPPING_YAMATOCOMPACT_OVER)) {
                $rate = new _Yamato($this->code, MODULE_SHIPPING_YAMATOCOMPACT_TEXT_WAY_NORMAL, zen_get_zone_code( STORE_COUNTRY,STORE_ZONE,0), STORE_COUNTRY);
                $rate->SetDest($s_zone_code, 'JP');
                if (!empty($box_sizes_array)) {
                    $total_boxes_quote = 0;
                    for ($b=0; $b < $shipping_num_boxes; $b++) { // loop through boxes
                        $rate->SetWeight(); // There is actually no weight limit
                        $rate->SetSize($box_sizes_array[$b][0], $box_sizes_array[$b][1], $box_sizes_array[$b][2]);
                        $tmpQuote = $rate->GetQuote(); // id, title, cost | error
                        $box_array[$b]['box_quote'] = $tmpQuote['cost'];
                        $bgirth[$b] = $box_sizes_array[$b][0] + $box_sizes_array[$b][1] + $box_sizes_array[$b][2];
                        if ($this->envelope_enabled && $this->box_enabled) {
                            $container = '';
                        } elseif ($this->envelope_enabled) {
                            $container = MODULE_SHIPPING_YAMATOCOMPACT_TEXT_ENVELOPE;
                        } else {
                            $container = MODULE_SHIPPING_YAMATOCOMPACT_TEXT_BOX;
                        }

                        if (isset($tmpQuote['error'])) {
                            $this->quotes['error'] = $tmpQuote['error'];
                        } else {
                            if ($b == 0) {
                                $this->quotes['module'] = $this->title . ' (' . $box_array[$b]['box_weight'] . TEXT_SHIPPING_WEIGHT . ', ' . $bgirth[$b] . 'cm';
                            } else {
                                $this->quotes['module'] .= ', ' . $box_array[$b]['box_weight'] . TEXT_SHIPPING_WEIGHT . ', ' . $bgirth[$b] . 'cm';
                            }
                            if ($b == $shipping_num_boxes-1) {
                                $this->quotes['module'] .= ')' . $container;
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
                $tmpQuote['cost'] += MODULE_SHIPPING_YAMATOCOMPACT_HANDLING;
            } else {
                $tmpQuote = ['id' => $this->code, 'title' => MODULE_SHIPPING_YAMATOCOMPACT_TEXT_WAY_NORMAL, 'cost' => 0];
            }

            if (!isset($tmpQuote['error'])) {
                // 配送時刻指定
                $timespec = $this->get_timespec();
                $tmpQuote['option'] = TEXT_TIME_SPECIFY . zen_draw_pull_down_menu('yamatocompact_timespec', $a_yamato_time, $timespec,'style="width: 160px;"');
                $tmpQuote['timespec'] = $timespec;
            }

            $this->quotes['methods'][] = $tmpQuote;

            if ($this->tax_class > 0) {
                $this->quotes['tax'] = zen_get_tax_rate($this->tax_class, $country_id, $zone_id);
            }
        } else {
            $this->quotes['error'] = MODULE_SHIPPING_YAMATOCOMPACT_TEXT_NOTAVAILABLE;
        }
        return $this->quotes;
    }

    // 時刻を指定するプルダウンメニューの'value'を返す
    protected function get_timespec()
    {
        global $a_yamato_time;
        global $shipping;

        $selected = $a_yamato_time[0]['id'];
        if (isset($_POST['yamatocompact_timespec'])) {
            $selected = $_POST['yamatocompact_timespec'];
        } elseif (is_array($shipping)) {
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
            $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_SHIPPING_YAMATOCOMPACT_STATUS'");
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
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Enable Yamato Compact shipping method', 'MODULE_SHIPPING_YAMATOCOMPACT_STATUS', 'True', 'Do you want to offer Yamato Compact rate shipping?', '6', '0', 'zen_cfg_select_option([\'True\', \'False\'], ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Use Envelope, box or both', 'MODULE_SHIPPING_YAMATOCOMPACT_CONTAINER_STATUS', 'Both', 'Do you want to use envelopes, boxes or both for shipping?', '6', '0', 'zen_cfg_select_option([\'Envelope\', \'Box\', \'Both\'], ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Enable or Disable Yamato Compact shipping method for some categories', 'MODULE_SHIPPING_YAMATOCOMPACT_CATEGORIES', 'Disable', 'Do you want to enable or disable Yamato Compact shipping for some categories?', '6', '0', 'zen_cfg_select_option([\'Enable\', \'Disable\'], ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('Enable/Disable categories IDs list', 'MODULE_SHIPPING_YAMATOCOMPACT_CAT_LIST', '', 'Comma separated list of categoies IDs to be enabled or disabled, depending on above option.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Enable or Disable Yamato Compact shipping method for some products', 'MODULE_SHIPPING_YAMATOCOMPACT_PRODUCTS', 'Disable', 'Do you want to enable or disable Yamato Compact shipping for some products?', '6', '0', 'zen_cfg_select_option([\'Enable\', \'Disable\'], ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('Enable/Disable products IDs list', 'MODULE_SHIPPING_YAMATOCOMPACT_PROD_LIST', '', 'Comma separated list of products IDs to be enables or disabled, depending on above option.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Handling Fee', 'MODULE_SHIPPING_YAMATOCOMPACT_HANDLING', '0', 'Handling fee for this shipping method.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Envelope max shipping length', 'MODULE_SHIPPING_YAMATOCOMPACT_ENVELOPE_MAX_LENGTH', '32', 'Maximum length that can be ship using the envelope.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Envelope max shipping width', 'MODULE_SHIPPING_YAMATOCOMPACT_ENVELOPE_MAX_WIDTH', '24', 'Maximum width that can be ship using the envelope.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Envelope max shipping height', 'MODULE_SHIPPING_YAMATOCOMPACT_ENVELOPE_MAX_HEIGHT', '2.6', 'Maximum thickness (height) that can be ship using the envelope.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Envelope max shipping girth', 'MODULE_SHIPPING_YAMATOCOMPACT_ENVELOPE_MAX_GIRTH', '56', 'Maximum size (girth) that can be ship using the envelope.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Box max shipping length', 'MODULE_SHIPPING_YAMATOCOMPACT_BOX_MAX_LENGTH', '24.5', 'Maximum length that can be ship using the box.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Box max shipping width', 'MODULE_SHIPPING_YAMATOCOMPACT_BOX_MAX_WIDTH', '19.8', 'Maximum width that can be ship using the box.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Box max shipping height', 'MODULE_SHIPPING_YAMATOCOMPACT_BOX_MAX_HEIGHT', '4.8', 'Maximum thickness (height) that can be ship using the box.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Box max shipping girth', 'MODULE_SHIPPING_YAMATOCOMPACT_BOX_MAX_GIRTH', '49', 'Maximum size (girth) that can be ship using the box.', '6', '0', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Free shipping settings', 'MODULE_SHIPPING_YAMATOCOMPACT_FREE_SHIPPING', 'False', 'Would you like to activate the free shipping setting? Select False to give priority to other modules [Shipping cost]-[Free options]...', '6', '2', 'zen_cfg_select_option([\'True\', \'False\'], ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('Minimum order for free shipping', 'MODULE_SHIPPING_YAMATOCOMPACT_OVER', '50000', 'If you purchase more than the set amount, shipping will be free.', '6', '3', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Tax Class', 'MODULE_SHIPPING_YAMATOCOMPACT_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', '6', '0', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Tax Basis', 'MODULE_SHIPPING_YAMATOCOMPACT_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br>Shipping - Based on customers Shipping - Address<br>Billing Based on customers Billing address<br>Store - Based on Store address if Billing/Shipping Zone equals Store zone', '6', '0', 'zen_cfg_select_option([\'Shipping\', \'Billing\', \'Store\'], ', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Shipping Zone', 'MODULE_SHIPPING_YAMATOCOMPACT_ZONE', '0', 'If a zone is selected, only enable this shipping method for that zone.', '6', '4', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
        $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_SHIPPING_YAMATOCOMPACT_SORT_ORDER', '0', 'Sort order of display.', '6', '6', now())");
    }

    /**
     * Internal list of configuration keys used for configuration of the module
     *
    **/
    public function keys(): array
    {
        return [
            'MODULE_SHIPPING_YAMATOCOMPACT_STATUS',
            'MODULE_SHIPPING_YAMATOCOMPACT_CONTAINER_STATUS',
            'MODULE_SHIPPING_YAMATOCOMPACT_CATEGORIES',
            'MODULE_SHIPPING_YAMATOCOMPACT_CAT_LIST',
            'MODULE_SHIPPING_YAMATOCOMPACT_PRODUCTS',
            'MODULE_SHIPPING_YAMATOCOMPACT_PROD_LIST',
            'MODULE_SHIPPING_YAMATOCOMPACT_HANDLING',
            'MODULE_SHIPPING_YAMATOCOMPACT_ENVELOPE_MAX_LENGTH',
            'MODULE_SHIPPING_YAMATOCOMPACT_ENVELOPE_MAX_WIDTH',
            'MODULE_SHIPPING_YAMATOCOMPACT_ENVELOPE_MAX_HEIGHT',
            'MODULE_SHIPPING_YAMATOCOMPACT_ENVELOPE_MAX_GIRTH',
            'MODULE_SHIPPING_YAMATOCOMPACT_BOX_MAX_LENGTH',
            'MODULE_SHIPPING_YAMATOCOMPACT_BOX_MAX_WIDTH',
            'MODULE_SHIPPING_YAMATOCOMPACT_BOX_MAX_HEIGHT',
            'MODULE_SHIPPING_YAMATOCOMPACT_BOX_MAX_GIRTH',
            'MODULE_SHIPPING_YAMATOCOMPACT_FREE_SHIPPING',
            'MODULE_SHIPPING_YAMATOCOMPACT_OVER',
            'MODULE_SHIPPING_YAMATOCOMPACT_TAX_CLASS',
            'MODULE_SHIPPING_YAMATOCOMPACT_TAX_BASIS',
            'MODULE_SHIPPING_YAMATOCOMPACT_ZONE',
            'MODULE_SHIPPING_YAMATOCOMPACT_SORT_ORDER',
        ];
    }
}

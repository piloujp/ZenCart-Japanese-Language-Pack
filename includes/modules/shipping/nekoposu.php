<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: brittainmark 2022 Sep 05 Modified in v1.5.8 $
 */

  class nekoposu {
    
    /**
     * $_check is used to check the configuration key set up
     * @var int
     */
    protected $_check;
    /**
     * $code determines the internal 'code' name used to designate "this" shipping module
     *
     * @var string
     */
    public $code;
    /**
     * $description is a soft name for this shipping method
     * @var string 
     */
    public $description;
    /**
     * $enabled determines whether this module shows or not... during checkout.
     * @var boolean
     */
    public $enabled;
    /**
     * $icon is the file name containing the Shipping method icon
     * @var string
     */
    public $icon;
    /** 
     * $quotes is an array containing all the quote information for this shipping module
     * @var array
     */
    public $quotes;
    /**
     * $sort_order is the order priority of this shipping module when displayed
     * @var int
     */
    public $sort_order;
    /**
     * $tax_basis is used to indicate if tax is based on shipping, billing or store address.
     * @var string
     */
    public $tax_basis;
    /**
     * $tax_class is the  Tax class to be applied to the shipping cost
     * @var string
     */
    public $tax_class;
    /**
     * $title is the displayed name for this shipping method
     * @var string
     */
    public $title;
    
    function __construct() {
      $this->code = 'nekoposu';
      $this->title = MODULE_SHIPPING_NEKOPOSU_TEXT_TITLE;
      $this->description = MODULE_SHIPPING_NEKOPOSU_TEXT_DESCRIPTION;
      $this->sort_order = defined('MODULE_SHIPPING_NEKOPOSU_SORT_ORDER') ? MODULE_SHIPPING_NEKOPOSU_SORT_ORDER : null;
      if (null === $this->sort_order) return false;

      $this->icon = DIR_WS_TEMPLATE_ICONS . 'shipping_yamato.gif';
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
   */
    function update_status() {
      global $order, $db, $shipping_weight, $box_sizes_array;

      if (!$this->enabled) return;
      if (IS_ADMIN_FLAG === true) return;

      // disable for some master_categories_id 
      if (IS_ADMIN_FLAG == false && ($_SESSION['cart']->in_cart_check('master_categories_id','44') > 0 || $_SESSION['cart']->in_cart_check('master_categories_id','56') > 0)) { 
          $this->enabled = false; 
      }
	  if (!empty($box_sizes_array)) {
		  //echo ' Box size array: ';print_r($box_sizes_array[0]);echo ' Weight: ' . $shipping_weight;
		  $girth = $box_sizes_array[0][0] + $box_sizes_array[0][1] + $box_sizes_array[0][2];
		  // disable if too big 
		  if (IS_ADMIN_FLAG == false && ($box_sizes_array[0][0] > MODULE_SHIPPING_NEKOPOSU_MAX_LENGTH || $box_sizes_array[0][1] > MODULE_SHIPPING_NEKOPOSU_MAX_WIDTH || $box_sizes_array[0][2] > MODULE_SHIPPING_NEKOPOSU_MAX_HEIGHT || $girth > 48 || $shipping_weight > MODULE_SHIPPING_NEKOPOSU_MAX_WEIGHT)) { 
			  $this->enabled = false;
		  }
	  }

      if ((int)MODULE_SHIPPING_NEKOPOSU_ZONE > 0) {
        $check_flag = false;
        $check = $db->Execute("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_SHIPPING_NEKOPOSU_ZONE . "' and zone_country_id = '" . $order->delivery['country']['id'] . "' order by zone_id");
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
    }

    function quote($method = '') {
      global $order;

      $this->quotes = array('id' => $this->code,
                            'module' => MODULE_SHIPPING_NEKOPOSU_TEXT_TITLE,
                            'methods' => array(array('id' => $this->code,
                                                     'title' => MODULE_SHIPPING_NEKOPOSU_TEXT_WAY,
                                                     'cost' => MODULE_SHIPPING_NEKOPOSU_COST)));
      if ($this->tax_class > 0) {
        $this->quotes['tax'] = zen_get_tax_rate($this->tax_class, $order->delivery['country']['id'], $order->delivery['zone_id']);
      }

      if (!empty($this->icon)) $this->quotes['icon'] = zen_image($this->icon, $this->title);

      return $this->quotes;
    }

    function check() {
      global $db;
      if (!isset($this->_check)) {
        $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_SHIPPING_NEKOPOSU_STATUS'");
        $this->_check = $check_query->RecordCount();
      }
      return $this->_check;
    }

    function install() {
      global $db;
// English

      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Nekopos Shipping', 'MODULE_SHIPPING_NEKOPOSU_STATUS', 'True', 'Do you want to offer Nekopos rate shipping?', '6', '0', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, val_function, date_added) values ('Shipping Cost', 'MODULE_SHIPPING_NEKOPOSU_COST', '385', 'The shipping cost for all orders using this shipping method.', '6', '0', '" . '{"error":"TEXT_POSITIVE_FLOAT","id":"FILTER_VALIDATE_FLOAT","options":{"options":{"min_range":0}}}'  . "', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum shipping weight', 'MODULE_SHIPPING_NEKOPOSU_MAX_WEIGHT', '1', 'Maximum weight that can be ship with this method.', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner length', 'MODULE_SHIPPING_NEKOPOSU_MAX_LENGTH', '28', 'Maximum length of envelope inside volume.', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner width', 'MODULE_SHIPPING_NEKOPOSU_MAX_WIDTH', '11', 'Maximum width of envelope inside volume.', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner height', 'MODULE_SHIPPING_NEKOPOSU_MAX_HEIGHT', '2.5', 'Maximum height of envelope inside volume.', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner girth', 'MODULE_SHIPPING_NEKOPOSU_MAX_GIRTH', '48', 'Maximum girth of envelope inside volume.', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Tax Class', 'MODULE_SHIPPING_NEKOPOSU_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', '6', '0', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Tax Basis', 'MODULE_SHIPPING_NEKOPOSU_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br>Shipping - Based on customers Shipping Address<br>Billing Based on customers Billing address<br>Store - Based on Store address if Billing/Shipping Zone equals Store zone', '6', '0', 'zen_cfg_select_option(array(\'Shipping\', \'Billing\', \'Store\'), ', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Shipping Zone', 'MODULE_SHIPPING_NEKOPOSU_ZONE', '0', 'If a zone is selected, only enable this shipping method for that zone.', '6', '0', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_SHIPPING_NEKOPOSU_SORT_ORDER', '0', 'Sort order of display.', '6', '0', now())");

//　Japanese
/*
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('ネコポス配送を有効にする', 'MODULE_SHIPPING_NEKOPOSU_STATUS', 'True', 'ネコポスで発送しますか？', '6', '0', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, val_function, date_added) values ('送料', 'MODULE_SHIPPING_NEKOPOSU_COST', '385', 'この配送方法を使用するすべての注文の配送料。', '6', '0', '" . '{"error":"TEXT_POSITIVE_FLOAT","id":"FILTER_VALIDATE_FLOAT","options":{"options":{"min_range":0}}}'  . "', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('最大出荷重量', 'MODULE_SHIPPING_NEKOPOSU_MAX_WEIGHT', '1', 'この方法で出荷できる最大重量。', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('最大内部長さ', 'MODULE_SHIPPING_NEKOPOSU_MAX_LENGTH', '28', 'エンベロープ内容積の最大長。', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('最大内幅', 'MODULE_SHIPPING_NEKOPOSU_MAX_WIDTH', '11', '封筒の内容積の最大幅。', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('最大内高', 'MODULE_SHIPPING_NEKOPOSU_MAX_HEIGHT', '2.5', 'エンベロープ内容積の最大高さ。', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('最大内周', 'MODULE_SHIPPING_NEKOPOSU_MAX_GIRTH', '48', 'エンベロープ内容積の最大周囲。', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('税種別', 'MODULE_SHIPPING_NEKOPOSU_TAX_CLASS', '0', '配送料金に適用される税種別を選んでください。', '6', '0', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('課税標準', 'MODULE_SHIPPING_NEKOPOSU_TAX_BASIS', 'Shipping', '配送料はどのような基準で計算されますか。オプションは：<br>配送 - 顧客の配送先住所に基づく<br>請求 - 顧客に基づく 請求先住所<br>ストア - 請求/配送ゾーンがストア ゾーンと等しい場合、ストアの住所に基づく。', '6', '0', 'zen_cfg_select_option(array(\'Shipping\', \'Billing\', \'Store\'), ', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('配送地域', 'MODULE_SHIPPING_NEKOPOSU_ZONE', '0', '配送地域を選択すると選択された地域のみで利用可能となります。', '6', '0', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('表示の整列順', 'MODULE_SHIPPING_NEKOPOSU_SORT_ORDER', '0', '表示の整列順を設定できます。', '6', '0', now())");
*/
  }

    function remove() {
      global $db;
      $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key like 'MODULE\_SHIPPING\_NEKOPOSU\_%'");
    }

    function keys() {
      return array('MODULE_SHIPPING_NEKOPOSU_STATUS', 'MODULE_SHIPPING_NEKOPOSU_COST', 'MODULE_SHIPPING_NEKOPOSU_MAX_WEIGHT', 'MODULE_SHIPPING_NEKOPOSU_MAX_LENGTH', 'MODULE_SHIPPING_NEKOPOSU_MAX_WIDTH', 'MODULE_SHIPPING_NEKOPOSU_MAX_HEIGHT', 'MODULE_SHIPPING_NEKOPOSU_MAX_GIRTH', 'MODULE_SHIPPING_NEKOPOSU_TAX_CLASS', 'MODULE_SHIPPING_NEKOPOSU_TAX_BASIS', 'MODULE_SHIPPING_NEKOPOSU_ZONE', 'MODULE_SHIPPING_NEKOPOSU_SORT_ORDER');
    }
  }

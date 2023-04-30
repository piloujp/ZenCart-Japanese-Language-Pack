<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: brittainmark 2022 Sep 05 Modified in v1.5.8 $
 */

  class letterpackplus {
    
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
      $this->code = 'letterpackplus';
      $this->title = MODULE_SHIPPING_LETTERPACKPLUS_TEXT_TITLE;
      $this->description = MODULE_SHIPPING_LETTERPACKPLUS_TEXT_DESCRIPTION;
      $this->sort_order = defined('MODULE_SHIPPING_LETTERPACKPLUS_SORT_ORDER') ? MODULE_SHIPPING_LETTERPACKPLUS_SORT_ORDER : null;
      if (null === $this->sort_order) return false;

      $this->icon = DIR_WS_TEMPLATE_ICONS . 'shipping_letterpackplus.gif';
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
   */
    function update_status() {
      global $order, $db, $shipping_weight, $multiboxes, $box_sizes_array, $max_shipping_weight, $max_size_array;
	  
      if (!$this->enabled) return;
      if (IS_ADMIN_FLAG === true) return;

      // disable for some master_categories_id 
/*      if (IS_ADMIN_FLAG == false && ($_SESSION['cart']->in_cart_check('master_categories_id','44') > 0 || $_SESSION['cart']->in_cart_check('master_categories_id','56') > 0)) { 
          $this->enabled = false; 
      }
*/
	  $multiboxes = MODULE_SHIPPING_LETTERPACKPLUS_MULTIBOX;
	  $max_shipping_weight = MODULE_SHIPPING_LETTERPACKPLUS_MAX_WEIGHT;
	  $max_size_array = array('Max_length' => MODULE_SHIPPING_LETTERPACKPLUS_MAX_LENGTH, 'Max_width' => MODULE_SHIPPING_LETTERPACKPLUS_MAX_WIDTH, 'Max_height' => MODULE_SHIPPING_LETTERPACKPLUS_MAX_HEIGHT, 'Max_girth' => MODULE_SHIPPING_LETTERPACKPLUS_MAX_GIRTH);
	  if (!empty($box_sizes_array)) {
		  //echo ' Box size array: ';print_r($box_sizes_array[0]);echo ' Weight: ' . $shipping_weight;
		  $girth = $box_sizes_array[0][0] + $box_sizes_array[0][1] + $box_sizes_array[0][2];
		  //echo ' Girth : ' . $girth;
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
	  //$multiboxes = 'None';
	  //$shipping_num_boxes = 1;
    }

    function quote($method = '') {
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
                                                     'cost' => ((int)MODULE_SHIPPING_LETTERPACKPLUS_COST*$shipping_num_boxes))));
      if ($this->tax_class > 0) {
        $this->quotes['tax'] = zen_get_tax_rate($this->tax_class, $order->delivery['country']['id'], $order->delivery['zone_id']);
      }

      if (!empty($this->icon)) $this->quotes['icon'] = zen_image($this->icon, $this->title, $width = '', $height = '', $parameters = ' style="vertical-align: middle"');
      return $this->quotes;
    }

    function check() {
      global $db;
      if (!isset($this->_check)) {
        $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_SHIPPING_LETTERPACKPLUS_STATUS'");
        $this->_check = $check_query->RecordCount();
      }
      return $this->_check;
    }

    function install() {
      global $db;
// English

      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Letter Pack Plus Shipping', 'MODULE_SHIPPING_LETTERPACKPLUS_STATUS', 'True', 'Do you want to offer Letter Pack Plus rate shipping?', '6', '0', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable multi-boxing for this Method', 'MODULE_SHIPPING_LETTERPACKPLUS_MULTIBOX', 'None', 'Do you want to add new parcels when limit is reached and on what basis? Options are:<br>None - No multi-boxing<br>Size - Add new boxes when size limit is reached', '6', '0', 'zen_cfg_select_option(array(\'None\', \'Size\'), ', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, val_function, date_added) values ('Shipping Cost', 'MODULE_SHIPPING_LETTERPACKPLUS_COST', '520', 'The shipping cost for all orders using this shipping method.', '6', '0', '" . '{"error":"TEXT_POSITIVE_FLOAT","id":"FILTER_VALIDATE_FLOAT","options":{"options":{"min_range":0}}}'  . "', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum shipping weight', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_WEIGHT', '4', 'Maximum weight that can be ship with this method.', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner length', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_LENGTH', '31', 'Maximum length of envelope inside volume.', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner width', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_WIDTH', '25', 'Maximum width of envelope inside volume.', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner height', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_HEIGHT', '6', 'Maximum height of envelope inside volume.', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Maximum inner girth', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_GIRTH', '60', 'Maximum girth of envelope inside volume.', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Tax Class', 'MODULE_SHIPPING_LETTERPACKPLUS_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', '6', '0', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Tax Basis', 'MODULE_SHIPPING_LETTERPACKPLUS_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br>Shipping - Based on customers Shipping Address<br>Billing Based on customers Billing address<br>Store - Based on Store address if Billing/Shipping Zone equals Store zone', '6', '0', 'zen_cfg_select_option(array(\'Shipping\', \'Billing\', \'Store\'), ', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Shipping Zone', 'MODULE_SHIPPING_LETTERPACKPLUS_ZONE', '0', 'If a zone is selected, only enable this shipping method for that zone.', '6', '0', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_SHIPPING_LETTERPACKPLUS_SORT_ORDER', '0', 'Sort order of display.', '6', '0', now())");

//　Japanese
/*
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('レターパックプラス配送を有効にする', 'MODULE_SHIPPING_LETTERPACKPLUS_STATUS', 'True', 'レターパックプラスでの発送を希望しますか？', '6', '0', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('マルチボックス化を有効にする', 'MODULE_SHIPPING_LETTERPACKPLUS_MULTIBOX', 'None', '制限に達したときに新しい区画を追加しますか？何に基づいて？オプションは次のとおりです。<br>なし - マルチボクシングなし<br>寸法 - 寸法制限に基づく新しいボックス', '6', '0', 'zen_cfg_select_option(array(\'None\', \'Size\'), ', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, val_function, date_added) values ('送料', 'MODULE_SHIPPING_LETTERPACKPLUS_COST', '520', 'この配送方法を使用するすべての注文の配送料。', '6', '0', '" . '{"error":"TEXT_POSITIVE_FLOAT","id":"FILTER_VALIDATE_FLOAT","options":{"options":{"min_range":0}}}'  . "', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('最大出荷重量', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_WEIGHT', '4', 'この方法で出荷できる最大重量。', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('最大内部長さ', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_LENGTH', '31', '封筒内容積の最大長。', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('最大内幅', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_WIDTH', '25', '封筒の内容積の最大幅。', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('最大内高', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_HEIGHT', '6', '封筒内容積の最大高さ。', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('最大内周', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_GIRTH', '60', '封筒内容積の最大周囲。', '6', '0', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('税種別', 'MODULE_SHIPPING_LETTERPACKPLUS_TAX_CLASS', '0', '配送料金に適用される税種別を選んでください。', '6', '0', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('課税標準', 'MODULE_SHIPPING_LETTERPACKPLUS_TAX_BASIS', 'Shipping', '配送料はどのような基準で計算されますか。オプションは：<br>配送 - 顧客の配送先住所に基づく<br>請求 - 顧客に基づく 請求先住所<br>ストア - 請求/配送ゾーンがストア ゾーンと等しい場合、ストアの住所に基づく。', '6', '0', 'zen_cfg_select_option(array(\'Shipping\', \'Billing\', \'Store\'), ', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('配送地域', 'MODULE_SHIPPING_LETTERPACKPLUS_ZONE', '0', '配送地域を選択すると選択された地域のみで利用可能となります。', '6', '0', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('表示の整列順', 'MODULE_SHIPPING_LETTERPACKPLUS_SORT_ORDER', '0', '表示の整列順を設定できます。', '6', '0', now())");
*/
  }

    function remove() {
      global $db;
      $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key like 'MODULE\_SHIPPING\_LETTERPACKPLUS\_%'");
    }

    function keys() {
      return array('MODULE_SHIPPING_LETTERPACKPLUS_STATUS', 'MODULE_SHIPPING_LETTERPACKPLUS_MULTIBOX', 'MODULE_SHIPPING_LETTERPACKPLUS_COST', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_WEIGHT', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_LENGTH', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_WIDTH', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_HEIGHT', 'MODULE_SHIPPING_LETTERPACKPLUS_MAX_GIRTH', 'MODULE_SHIPPING_LETTERPACKPLUS_TAX_CLASS', 'MODULE_SHIPPING_LETTERPACKPLUS_TAX_BASIS', 'MODULE_SHIPPING_LETTERPACKPLUS_ZONE', 'MODULE_SHIPPING_LETTERPACKPLUS_SORT_ORDER');
    }
  }

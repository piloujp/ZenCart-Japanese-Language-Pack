<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: brittainmark 2022 Sep 05 Modified in v1.5.8 $
 * @version $Id: pilou2 2023 feb 03 modified in v1.5.8 $
 */
/**
 * Enter description here...
 * Japanese International epacket shipping module - 国際eパケット
 */
class jpparcelepack extends base {

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
    /**
     * $jpparcelepack_countries is the country number->code epacket is shipping
     * @var array
     */
    public $jpparcelepack_countries;
    /**
     * $jpparcelepack_countries_nbr is country number (107) epacket is shipping
     * @var array
     */
    public $jpparcelepack_countries_nbr;
    /**
     * $country_code is country ISO 2 letters code epacket is shipping
     * @var int
     */
    public $country_code;
    
  /**
   * constructor
   *
   * @return jpparcelepack
   */
  function __construct() {
    global $order,$db;

    $this->code = 'jpparcelepack';
    $this->title = MODULE_SHIPPING_JPPARCELEPACK_TEXT_TITLE;
    $this->description = MODULE_SHIPPING_JPPARCELEPACK_TEXT_DESCRIPTION;
    $this->sort_order = defined('MODULE_SHIPPING_JPPARCELEPACK_SORT_ORDER') ? MODULE_SHIPPING_JPPARCELEPACK_SORT_ORDER : null;
    if (null === $this->sort_order) return false;

    $this->icon = ''; //DIR_WS_TEMPLATE_ICONS . 'shipping_jpparcelepack.gif';
//    $this->tax_class = MODULE_SHIPPING_JPPARCELEPACK_TAX_CLASS;
//    $this->tax_basis = MODULE_SHIPPING_JPPARCELEPACK_TAX_BASIS;
    // disable only when entire cart is free shipping
    if (zen_get_shipping_enabled($this->code)) {
      $this->enabled = (MODULE_SHIPPING_JPPARCELEPACK_STATUS == 'True');
    }

    $this->jpparcelepack_countries = array(107 => 'JP');
    $this->jpparcelepack_countries_nbr = array(107);

    $this->update_status();
  }

  /**
   * Perform various checks to see whether this module should be visible
   */
  function update_status() {
    global $order, $db;
    if (!$this->enabled) return;
    if (IS_ADMIN_FLAG === true) return;

      // disable for some master_categories_id 
      if (IS_ADMIN_FLAG == false && ($_SESSION['cart']->in_cart_check('master_categories_id','44') > 0 || $_SESSION['cart']->in_cart_check('master_categories_id','56') > 0)) { 
          $this->enabled = false; 
      }

    if ((int)MODULE_SHIPPING_JPPARCELEPACK_ZONE > 0) {
      $check_flag = false;
      $check = $db->Execute("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_SHIPPING_JPPARCELEPACK_ZONE . "' and zone_country_id = '" . (int)$order->delivery['country']['id'] . "' order by zone_id");
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
      if ( $this->enabled == true ) {
        $countries = $db->Execute("SELECT countries_iso_code_2 FROM " . TABLE_COUNTRIES . " WHERE countries_id = '" . (int)$order->delivery['country']['id'] . "' ORDER BY countries_name");
        $countries_values = $countries->fields;
        $this->country_code = $countries_values['countries_iso_code_2'];
        if ($this->country_code == STORE_COUNTRY) {
          $this->enabled = false;
        }
      }
  }
  /**
   *  Obtain quote from shipping system/calculations
   *
   * @param string $method
   * @return unknown
   */
    function quote() {
      global $shipping_weight, $shipping_num_boxes;
      global $order;
      global $cart;
      global $db;

      $this->quotes = array('id' => $this->code, 'module' => $this->title);
      if (zen_not_null($this->icon)) $this->quotes['icon'] = zen_image($this->icon, $this->title);

		if ($this->country_code != 'JP') {
          if ( (MODULE_SHIPPING_JPPARCELEPACK_FREE_SHIPPING != 'True') || ((int)$cart->show_total() < (int)MODULE_SHIPPING_JPPARCELEPACK_OVER) ) {
              include_once(DIR_WS_CLASSES . '_jpparcel.php');
              $rate = new _JpParcel($this->code, MODULE_SHIPPING_JPPARCELEPACK_TEXT_WAY_NORMAL, $this->country_code);
              $rate->SetWeight($shipping_weight);
              $tmpQuote = $rate->GetQuote(); // id, title, cost | error

              if (isset($tmpQuote['error'])) {
                  $this->quotes['error'] = $tmpQuote['error'];
              } else {
                  $this->quotes['module'] = $this->title . ' (' . $shipping_num_boxes . ' x ' . $shipping_weight . 'kg)';

                  $tmpQuote['cost'] *= $shipping_num_boxes;
                  // 手数料
                  $tmpQuote['cost'] += MODULE_SHIPPING_JPPARCELEPACK_HANDLING;
              }
          } else {
              $tmpQuote = array('id' => $this->code, 'title' => MODULE_SHIPPING_JPPARCELEPACK_TEXT_WAY_NORMAL, 'cost' => 0);
          }

          $this->quotes['methods'][] = $tmpQuote;

          if ($this->tax_class > 0) {
              $this->quotes['tax'] = zen_get_tax_rate($this->tax_class, $country_id, $zone_id);
          }
        } else {
            $this->quotes['error'] = MODULE_SHIPPING_JPPARCELEPACK_TEXT_NOTAVAILABLE;
        }
        return $this->quotes;
  }

  /**
   * Check to see whether module is installed
   *
   * @return unknown
   */
  function check() {
    global $db;
    if (!isset($this->_check)) {
      $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_SHIPPING_JPPARCELEPACK_STATUS'");
      $this->_check = $check_query->RecordCount();
    }
    return $this->_check;
  }
  /**
   * Install the shipping module and its configuration settings
   *
   */
  function install() {
    global $db;
// English

    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Enable EMS Method', 'MODULE_SHIPPING_JPPARCELEPACK_STATUS', 'True', 'Do you want to offer EMS rate shipping?', '6', '0', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Handling Fee', 'MODULE_SHIPPING_JPPARCELEPACK_HANDLING', '0', 'Handling fee for this shipping method.', '6', '0', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Free shipping settings', 'MODULE_SHIPPING_JPPARCELEPACK_FREE_SHIPPING', 'False', 'Would you like to activate the free shipping setting?Select False to give priority to other modules [Shipping cost]-[Free options]...', '6', '2', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('Minimum order for free shipping', 'MODULE_SHIPPING_JPPARCELEPACK_OVER', '50000', 'If you purchase more than the set amount, shipping will be free.', '6', '3', now())");
//    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Tax Class', 'MODULE_SHIPPING_JPPARCELEPACK_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', '6', '0', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(', now())");
//    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Tax Basis', 'MODULE_SHIPPING_JPPARCELEPACK_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br>Shipping - Based on customers Shipping Address<br>Billing Based on customers Billing address<br>Store - Based on Store address if Billing/Shipping Zone equals Store zone', '6', '0', 'zen_cfg_select_option(array(\'Shipping\', \'Billing\', \'Store\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Shipping Zone', 'MODULE_SHIPPING_JPPARCELEPACK_ZONE', '0', 'If a zone is selected, only enable this shipping method for that zone.', '6', '4', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_SHIPPING_JPPARCELEPACK_SORT_ORDER', '0', 'Sort order of display.', '6', '6', now())");

//　Japanese
/*
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('EMS 配送を有効にする', 'MODULE_SHIPPING_JPPARCELEPACK_STATUS', 'True', 'EMS配送を提供したいですか？', '6', '0', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('取扱い手数料', 'MODULE_SHIPPING_JPPARCELEPACK_HANDLING', '0', 'この配送方法の手数料です。', '6', '0', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('送料無料設定', 'MODULE_SHIPPING_JPPARCELEPACK_FREE_SHIPPING', 'False', '送料無料設定を有効にしますか? [合計モジュール]-[送料]-[送料無料設定]を優先する場合は False を選んでください.', '6', '2', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('送料を無料にする購入金額設定', 'MODULE_SHIPPING_JPPARCELEPACK_OVER', '50000', '設定金額以上をご購入の場合は送料を無料にします.', '6', '3', now())");
//    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('税種別', 'MODULE_SHIPPING_JPPARCELEPACK_TAX_CLASS', '0', '配送料金に適用される税種別を選んでください。', '6', '0', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(', now())");
//    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('課税標準', 'MODULE_SHIPPING_JPPARCELEPACK_TAX_BASIS', 'Shipping', '配送料はどのような基準で計算されますか。オプションは：<br>配送 - 顧客の配送先住所に基づく<br>請求 - 顧客に基づく 請求先住所<br>ストア - 請求/配送ゾーンがストア ゾーンと等しい場合、ストアの住所に基づく。', '6', '0', 'zen_cfg_select_option(array(\'Shipping\', \'Billing\', \'Store\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('配送地域', 'MODULE_SHIPPING_JPPARCELEPACK_ZONE', '0', '配送地域を選択すると選択された地域のみで利用可能となります。', '6', '4', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('表示の整列順', 'MODULE_SHIPPING_JPPARCELEPACK_SORT_ORDER', '0', '表示の整列順を設定できます。', '6', '6', now())");
*/
  }
  /**
   * Remove the module and all its settings
   *
   */
    function remove() {
      global $db;
      $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key like 'MODULE\_SHIPPING\_JPPARCELEPACK\_%'");
    }

  /**
   * Internal list of configuration keys used for configuration of the module
   * 
   * @return unknown
   */
  function keys() {
    return array('MODULE_SHIPPING_JPPARCELEPACK_STATUS', 'MODULE_SHIPPING_JPPARCELEPACK_HANDLING','MODULE_SHIPPING_JPPARCELEPACK_FREE_SHIPPING', 'MODULE_SHIPPING_JPPARCELEPACK_OVER', 'MODULE_SHIPPING_JPPARCELEPACK_ZONE', 'MODULE_SHIPPING_JPPARCELEPACK_SORT_ORDER');
  }
}

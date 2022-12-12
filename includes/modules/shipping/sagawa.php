<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: brittainmark 2022 Sep 05 Modified in v1.5.8 $
 */
/**
 * Enter description here...
 *
 */
class sagawa extends base {

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
     * $sagawa_countries is the country number->code Sagawa is shipping
     * @var array
     */
    public $sagawa_countries;
    /**
     * $sagawa_countries_nbr is country number (107) Sagawa is shipping
     * @var array
     */
    public $sagawa_countries_nbr;
    
  /**
   * constructor
   *
   * @return sagawa
   */
  function __construct() {
    global $order,$db;

    $this->code = 'sagawa';
    $this->title = MODULE_SHIPPING_SAGAWA_TEXT_TITLE;
    $this->description = MODULE_SHIPPING_SAGAWA_TEXT_DESCRIPTION;
    $this->sort_order = defined('MODULE_SHIPPING_SAGAWA_SORT_ORDER') ? MODULE_SHIPPING_SAGAWA_SORT_ORDER : null;
    if (null === $this->sort_order) return false;

    $this->icon = DIR_WS_TEMPLATE_ICONS . 'shipping_sagawa.gif';
//    $this->tax_class = MODULE_SHIPPING_SAGAWA_TAX_CLASS;
//    $this->tax_basis = MODULE_SHIPPING_SAGAWA_TAX_BASIS;
    // disable only when entire cart is free shipping
    if (zen_get_shipping_enabled($this->code)) {
      $this->enabled = (MODULE_SHIPPING_SAGAWA_STATUS == 'True');
    }

    $this->sagawa_countries = array(107 => 'JP');
    $this->sagawa_countries_nbr = array(107);

    $this->update_status();
  }

  /**
   * Perform various checks to see whether this module should be visible
   */
  function update_status() {
    global $order, $db;
    if (!$this->enabled) return;
    if (IS_ADMIN_FLAG === true) return;

    if ((int)MODULE_SHIPPING_SAGAWA_ZONE > 0) {
      $check_flag = false;
      $check = $db->Execute("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_SHIPPING_SAGAWA_ZONE . "' and zone_country_id = '" . (int)$order->delivery['country']['id'] . "' order by zone_id");
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
  /**
   *  Obtain quote from shipping system/calculations
   *
   * @param string $method
   * @return unknown
   */
    function quote() {
      global $shipping_weight, $shipping_num_boxes;
      global $order;
      global $a_sagawa_time;
      global $cart;
      global $db;
      global $slength, $swidth, $sheight, $ssize;

	  if (empty($order->delivery['zone_id']) == true) { return NULL;}

      // Begining of parcel size calculation
      $cube = $maxlength = $maxwidth = $maxheight = $defitems = 0;
      // Retrieving size
      for($x = 0 ; $x < count($order->products) ; $x++ ) {
         $t = $order->products[$x]['id'] ;
         $dim_query = "select products_length, products_height, products_width from " . TABLE_PRODUCTS . " where products_id='$t' and  products_length > '0' and products_height > '0' and  products_width > '0' ";
         $dims = $db->Execute($dim_query);
         if ($dims->RecordCount() > 0) {
         // re-orientate //
         $var = array($dims->fields['products_width'], $dims->fields['products_height'], $dims->fields['products_length']) ; sort($var) ;
         $dims->fields['products_length'] = $var[2] ; $dims->fields['products_width'] = $var[1] ;  $dims->fields['products_height'] = $var[0] ;

         $cube = $cube + ($dims->fields['products_width'] * $dims->fields['products_height'] * $dims->fields['products_length'] * $order->products[$x]['qty']) ;
         $maxheight = $maxheight + $dims->fields['products_height'];

       	 if ($dims->fields['products_width'] >  $maxwidth) { $maxwidth  = $dims->fields['products_width'] ; }
       	 if ($dims->fields['products_length'] > $maxlength) { $maxlength = $dims->fields['products_length'] ; }
       	 if ($dims->fields['products_height'] > $maxheight) { $maxheight = $dims->fields['products_height'] ; }
       	 }
         else { // get track of default cubes for non assigned items //
			$defitems = $defitems + $order->products[$x]['qty']  ;
       	    if($maxwidth == 0) {$maxwidth = $swidth ;}
       	    if($maxheight == 0) {$maxheight = $sheight ;}
       	    if($maxlength == 0) {$maxlength = $slength ;}
       	 }
        }

      //  summarise the two cubes (default x items, plus explicit defined - note we use the max lengths & widths
      //  for this rather than the defaults because a small default still needs to be stacked by height
          $cube = $cube + ($maxwidth * $sheight * $maxlength * $defitems)  ;
      //    echo "C $cube - W $maxwidth - H $sheight - L $maxlength - I $defitems<br>";

      //  calculate our height (assumes products are stacked one atop the other)
      //    $x = round(($cube / ( $maxlength * $maxwidth)),2)  ;
          $x = round($maxheight,1);

          if($x > 240 ) {  //  maximum allowed
          $maxlength = 240 ;   // so we set our length to maximum allowed
          $x = round(($cube / ( $maxlength * $maxwidth)),2)  ; // then recalculate new height
          }

      //  now find the shortest 2 sides (for girth)
      //    $var = array($x, $maxlength, $maxwidth) ;
      //    sort($var) ;
      //    if(($var[0] * 1) + ($var[1] * 1) + $var[2] > 240 ) {   if($debug == 1) { echo "Girth exceeded1: $shipping_num_boxes " ; print_r($var) ;}
      //    $maxwidth = intval($var[1] / 2) ;  $shipping_num_boxes++ ; // chop it in half and send it two boxes. /
      //    $x = $var[0] ;
      //    }

      //  use our new parcel dimensions
         $swidth = $maxwidth ; $sheight = $x ; $slength = $maxlength; $ssize = $slength + $swidth + $sheight;

      //  save it for display purposes on quote form (this way I don't need to hack another system file)
      //$_SESSION['swidth'] = $swidth ; $_SESSION['sheight'] = $sheight ;
      //$_SESSION['slength'] = $slength ; $_SESSION['boxes'] = $shipping_num_boxes ;  

      //return to original file      

      $this->quotes = array('id' => $this->code,
                            'module' => $this->title);
      if (zen_not_null($this->icon)) $this->quotes['icon'] = zen_image($this->icon, $this->title);
      $country_id = $order->delivery['country']['id'];
      $zone_id    = $order->delivery['zone_id'];

      if (in_array($country_id, $this->sagawa_countries_nbr)) {
          $zoneinfo = $db->Execute("SELECT zone_code FROM ".TABLE_ZONES." WHERE zone_id = '".$zone_id."'");
          $a_zonevalues = $zoneinfo->fields;
          $s_zone_code = $a_zonevalues['zone_code'];

          // 送料が条件によって無料になってしまう(ここではtotalではなくsubtotalを確認すべき)
          if ( (MODULE_SHIPPING_SAGAWA_FREE_SHIPPING != 'True') || ((int)$order->info['subtotal'] < (int)MODULE_SHIPPING_SAGAWA_OVER) ) {
              include_once(DIR_WS_CLASSES . '_sagawa.php');
              $rate = new _Sagawa($this->code, MODULE_SHIPPING_SAGAWA_TEXT_WAY_NORMAL,
                                zen_get_zone_code( STORE_COUNTRY,STORE_ZONE,0), STORE_COUNTRY);
              $rate->SetDest($s_zone_code, $this->sagawa_countries[$country_id]);
              $rate->SetWeight($shipping_weight);
              $rate->SetSize($slength, $swidth, $sheight);
              $tmpQuote = $rate->GetQuote(); // id, title, cost | error

              if (isset($tmpQuote['error'])) {
                  $this->quotes['error'] = $tmpQuote['error'];
              } else {
                  $this->quotes['module'] = $this->title
                      . ' (' . $shipping_num_boxes . ' x ' . round($shipping_weight / $shipping_num_boxes,3) . 'kg, '. $ssize . 'cm)';

                  $tmpQuote['cost'] *= $shipping_num_boxes;
                  // 手数料
                  $tmpQuote['cost'] += MODULE_SHIPPING_SAGAWA_HANDLING;
              }
          } else {
              $tmpQuote = array('id' => $this->code, 'title' => MODULE_SHIPPING_SAGAWA_TEXT_WAY_NORMAL, 'cost' => 0);
          }

          if (!isset($tmpQuote['error'])) {
              // 配送時刻指定
              $timespec = $this->get_timespec();
              $tmpQuote['option'] = TEXT_TIME_SPECIFY.zen_draw_pull_down_menu('sagawa_timespec', $a_sagawa_time, $timespec,'style="width: 115px;"');
              $tmpQuote['timespec'] = $timespec;
          }

          $this->quotes['methods'][] = $tmpQuote;

          if ($this->tax_class > 0) {
              $this->quotes['tax'] = zen_get_tax_rate($this->tax_class, $country_id, $zone_id);
          }
        } else {
            $this->quotes['error'] = MODULE_SHIPPING_SAGAWA_TEXT_NOTAVAILABLE;
        }
        return $this->quotes;
  }

    // 時刻を指定するプルダウンメニューの'value'を返す
    function get_timespec() {
        global $a_sagawa_time;
        global $shipping;

        $selected = $a_sagawa_time[0]['id'];
        if ( isset($_POST['sagawa_timespec']) ) {
            $selected = $_POST['sagawa_timespec'];
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
   */
  function check() {
    global $db;
    if (!isset($this->_check)) {
      $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_SHIPPING_SAGAWA_STATUS'");
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

    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES ('Enable sagawa Method', 'MODULE_SHIPPING_SAGAWA_STATUS', 'True', 'Do you want to offer sagawa rate shipping?', '6', '0', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Handling Fee', 'MODULE_SHIPPING_SAGAWA_HANDLING', '0', 'Handling fee for this shipping method.', '6', '0', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Free shipping settings', 'MODULE_SHIPPING_SAGAWA_FREE_SHIPPING', 'False', 'Would you like to activate the free shipping setting?Select False to give priority to other modules [Shipping cost]-[Free options]...', '6', '2', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('Minimum order for free shipping', 'MODULE_SHIPPING_SAGAWA_OVER', '50000', 'If you purchase more than the set amount, shipping will be free.', '6', '3', now())");
//    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Tax Class', 'MODULE_SHIPPING_SAGAWA_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', '6', '0', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(', now())");
//    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Tax Basis', 'MODULE_SHIPPING_SAGAWA_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br>Shipping - Based on customers Shipping Address<br>Billing Based on customers Billing address<br>Store - Based on Store address if Billing/Shipping Zone equals Store zone', '6', '0', 'zen_cfg_select_option(array(\'Shipping\', \'Billing\', \'Store\'), ', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Shipping Zone', 'MODULE_SHIPPING_SAGAWA_ZONE', '0', 'If a zone is selected, only enable this shipping method for that zone.', '6', '4', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_SHIPPING_SAGAWA_SORT_ORDER', '0', 'Sort order of display.', '6', '6', now())");

// Japanese
/*
    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('佐川急便の配送を有効にする', 'MODULE_SHIPPING_SAGAWAEX_STATUS', 'True', '佐川急便の配送を提供しますか？', '6', '0', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('取扱い手数料', 'MODULE_SHIPPING_SAGAWAEX_HANDLING', '0', '送料に適用する取扱手数料を設定できます。', '6', '1', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('送料無料設定', 'MODULE_SHIPPING_SAGAWAEX_FREE_SHIPPING', 'False', '送料無料設定を有効にしますか? [合計モジュール]-[送料]-[送料無料設定]を優先する場合は False を選んでください。', '6', '2', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
      $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('送料を無料にする購入金額設定', 'MODULE_SHIPPING_SAGAWAEX_OVER', '5000', '設定金額以上をご購入の場合は送料を無料にします。', '6', '3', now())");
//    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('税種別', 'MODULE_SHIPPING_SAGAWAEX_TAX_CLASS', '0', '配送料金に適用される税種別を選んでください。', '6', '3', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(', now())");
//    $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('課税標準', 'MODULE_SHIPPING_SAGAWA_TAX_BASIS', 'Shipping', '配送料はどのような基準で計算されますか。オプションは：<br>配送 - 顧客の配送先住所に基づく<br>請求 - 顧客に基づく 請求先住所<br>ストア - 請求/配送ゾーンがストア ゾーンと等しい場合、ストアの住所に基づく。', '6', '0', 'zen_cfg_select_option(array(\'Shipping\', \'Billing\', \'Store\'), ', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('配送地域', 'MODULE_SHIPPING_SAGAWAEX_ZONE', '0', '配送地域を選択すると選択された地域のみで利用可能となります。', '6', '5', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
      $db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('表示の整列順', 'MODULE_SHIPPING_SAGAWAEX_SORT_ORDER', '0', '表示の整列順を設定できます。数字が小さいほど上位に表示されます。', '6', '6', now())");
*/
  }
  /**
   * Remove the module and all its settings
   *
   */
    function remove() {
      global $db;
      $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key like 'MODULE\_SHIPPING\_SAGAWA\_%'");
    }

  /**
   * Internal list of configuration keys used for configuration of the module
   * 
   * @return unknown
   */
  function keys() {
    return array('MODULE_SHIPPING_SAGAWA_STATUS', 'MODULE_SHIPPING_SAGAWA_HANDLING','MODULE_SHIPPING_SAGAWA_FREE_SHIPPING', 'MODULE_SHIPPING_SAGAWA_OVER', 'MODULE_SHIPPING_SAGAWA_ZONE', 'MODULE_SHIPPING_SAGAWA_SORT_ORDER');
  }

//  function help() {
//       return array('link' => 'https://docs.zen-cart.com/user/shipping/table/');
//  }
}

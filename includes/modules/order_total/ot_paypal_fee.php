<?php
/**
 * ot_paypal_fee order-total module
 *
 * @package orderTotal
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */
/**
 * PAYPAL-FEE Order Totals Module
 *
 */

  class ot_paypal_fee {

   /**
     * $_check is used to check the configuration key set up
     * @var int
     */
    protected $_check;
    /**
     * $code determines the internal 'code' name used to designate "this" order module
     * @var string
     */
    public $code;
    /**
     * $description is a soft name for this order total method
     * @var string 
     */
    public $description;
    /**
     * $enabled determines whether this module shows or not... during checkout.
     * @var boolean
     */
    public $enabled;
    /**
     * $sort_order is the order priority of this order total module when displayed
     * @var int
     */
    public $sort_order;
    /**
     * $title is the displayed name for this order total method
     * @var string
     */
    public $title;
    /**
     * $output is an array of the display elements used on checkout pages
     * @var array
     */
    public $output = [];

    function __construct() {
      $this->code = 'ot_paypal_fee';
      $this->title = MODULE_ORDER_TOTAL_PAYPAL_TITLE;
      $this->description = MODULE_ORDER_TOTAL_PAYPAL_DESCRIPTION;
//      $this->enabled = ((MODULE_ORDER_TOTAL_PAYPAL_STATUS == 'true') ? true : false);
//      $this->sort_order = MODULE_ORDER_TOTAL_PAYPAL_SORT_ORDER;
      $this->enabled = (defined('MODULE_ORDER_TOTAL_PAYPAL_STATUS') && MODULE_ORDER_TOTAL_PAYPAL_STATUS == 'true');
      $this->sort_order = defined('MODULE_ORDER_TOTAL_PAYPAL_SORT_ORDER') ? MODULE_ORDER_TOTAL_PAYPAL_SORT_ORDER : null;
      if (null === $this->sort_order) return false;

      $this->output = array();
    }

    function process() {
      global $order, $currencies, $paypal_cost;
      $orderTotal = $order->info['total'];
      if (MODULE_ORDER_TOTAL_PAYPAL_STATUS == 'true') {
        //check if payment method is PayPal.
        if (isset($_SESSION['payment']) && $_SESSION['payment'] == 'paypalwpp') {
            $japan_id = zen_country_iso_to_id('JP');
            switch ($orderTotal) {
                case ($orderTotal <= 300000):
                if ($order->delivery['country']['id'] == $japan_id) {
                    $paypal_cost = (($orderTotal*MODULE_ORDER_TOTAL_PAYPAL_FEE0JP/100)+MODULE_ORDER_TOTAL_PAYPAL_FIXEDFEE)/(1-(MODULE_ORDER_TOTAL_PAYPAL_FEE0JP/100));
                } else {
                    $paypal_cost = (($orderTotal*MODULE_ORDER_TOTAL_PAYPAL_FEE0/100)+MODULE_ORDER_TOTAL_PAYPAL_FIXEDFEE)/(1-(MODULE_ORDER_TOTAL_PAYPAL_FEE0/100));}
                    break;
                case (($orderTotal > 300000) && ($orderTotal <= 1000000)):
                if ($order->delivery['country']['id'] == $japan_id) {
                    $paypal_cost = (($orderTotal*MODULE_ORDER_TOTAL_PAYPAL_FEE3000JP/100)+MODULE_ORDER_TOTAL_PAYPAL_FIXEDFEE)/(1-(MODULE_ORDER_TOTAL_PAYPAL_FEE3000JP/100));
                } else {
                    $paypal_cost = (($orderTotal*MODULE_ORDER_TOTAL_PAYPAL_FEE3000/100)+MODULE_ORDER_TOTAL_PAYPAL_FIXEDFEE)/(1-(MODULE_ORDER_TOTAL_PAYPAL_FEE3000/100));}
                    break;
                case (($orderTotal > 1000000) && ($orderTotal <= 10000000)):
                if ($order->delivery['country']['id'] == $japan_id) {
                    $paypal_cost = (($orderTotal*MODULE_ORDER_TOTAL_PAYPAL_FEE10000JP/100)+MODULE_ORDER_TOTAL_PAYPAL_FIXEDFEE)/(1-(MODULE_ORDER_TOTAL_PAYPAL_FEE10000JP/100));
                } else {
                    $paypal_cost = (($orderTotal*MODULE_ORDER_TOTAL_PAYPAL_FEE10000/100)+MODULE_ORDER_TOTAL_PAYPAL_FIXEDFEE)/(1-(MODULE_ORDER_TOTAL_PAYPAL_FEE10000/100));}
                    break;
                case ($orderTotal > 10000000):
                if ($order->delivery['country']['id'] == $japan_id) {
                    $paypal_cost = (($orderTotal*MODULE_ORDER_TOTAL_PAYPAL_FEE100000JP/100)+MODULE_ORDER_TOTAL_PAYPAL_FIXEDFEE)/(1-(MODULE_ORDER_TOTAL_PAYPAL_FEE100000JP/100));
                } else {
                    $paypal_cost = (($orderTotal*MODULE_ORDER_TOTAL_PAYPAL_FEE100000/100)+MODULE_ORDER_TOTAL_PAYPAL_FIXEDFEE)/(1-(MODULE_ORDER_TOTAL_PAYPAL_FEE100000/100));}
                    break;
                default:
                $paypal_cost = (($orderTotal*MODULE_ORDER_TOTAL_PAYPAL_FEE0/100)+MODULE_ORDER_TOTAL_PAYPAL_FIXEDFEE)/(1-(MODULE_ORDER_TOTAL_PAYPAL_FEE0/100));
                break;
            }
            $order->info['total'] += $paypal_cost;
            $this->output[] = array('title' => $this->title . ':',
                                      'text' => $currencies->format($paypal_cost, true,  $order->info['currency'], $order->info['currency_value']),
                                      'value' => $paypal_cost);
        }
      }
    }
    
    function check() {
      global $db;
      if (!isset($this->_check)) {
        $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_ORDER_TOTAL_PAYPAL_STATUS'");
        $this->_check = $check_query->RecordCount();
      }

      return $this->_check;
    }

    function keys() {
      return array('MODULE_ORDER_TOTAL_PAYPAL_STATUS', 'MODULE_ORDER_TOTAL_PAYPAL_SORT_ORDER', 'MODULE_ORDER_TOTAL_PAYPAL_FEE0JP', 'MODULE_ORDER_TOTAL_PAYPAL_FEE0', 'MODULE_ORDER_TOTAL_PAYPAL_FEE3000JP', 'MODULE_ORDER_TOTAL_PAYPAL_FEE3000', 'MODULE_ORDER_TOTAL_PAYPAL_FEE10000JP', 'MODULE_ORDER_TOTAL_PAYPAL_FEE10000', 'MODULE_ORDER_TOTAL_PAYPAL_FEE100000JP', 'MODULE_ORDER_TOTAL_PAYPAL_FEE100000', 'MODULE_ORDER_TOTAL_PAYPAL_FIXEDFEE');
    }

    function install() {
		global $db;
		if ($_SESSION['language'] == 'japanese') {
		// Japanese
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('PayPal手数料を有効にする', 'MODULE_ORDER_TOTAL_PAYPAL_STATUS', 'true', 'PayPal手数料を表示しますか？', '6', '1','zen_cfg_select_option(array(\'true\', \'false\'), ', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('表示順', 'MODULE_ORDER_TOTAL_PAYPAL_SORT_ORDER', '450', '表示順を設定します。 最下位が最初に表示されます。', '6', '2', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('３０万円未満の料金の手数料（日本）', 'MODULE_ORDER_TOTAL_PAYPAL_FEE0JP', '3.6', '０　～　３０万円の支払いに対する PayPal 手数料 (%)-日本', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('３０万円未満の料金の手数料', 'MODULE_ORDER_TOTAL_PAYPAL_FEE0', '4.1', '０ ～ ３０万円の支払いに対する PayPal 手数料 (%)', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('３０万円～１００万円の料金の手数料（日本）', 'MODULE_ORDER_TOTAL_PAYPAL_FEE3000JP', '3.4', '３０万 ～ １００万円の支払いに対する PayPal 手数料 (%)-日本', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('３０万円～１００万円の料金の手数料', 'MODULE_ORDER_TOTAL_PAYPAL_FEE3000', '3.9', '３０万 ～ １００万円の支払いに対する PayPal 手数料 (%)', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('１００万円～１０００万円の料金の手数料（日本）', 'MODULE_ORDER_TOTAL_PAYPAL_FEE10000JP', '3.2', '１００万 ～ １０００万円の支払いに対する PayPal 手数料 (%)-日本', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('１００万円～１０００万円の料金の手数料', 'MODULE_ORDER_TOTAL_PAYPAL_FEE10000', '3.7', '１００万 ～ １０００万円の支払いに対する PayPal 手数料 (%)', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('１０００万円以上の料金の手数料（日本）', 'MODULE_ORDER_TOTAL_PAYPAL_FEE100000JP', '2.9', '１０００万円以上の支払いに対する PayPal 手数料 (%)-日本', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('１０００万円以上の料金の手数料', 'MODULE_ORDER_TOTAL_PAYPAL_FEE100000', '3.4', '１０００万円以上の支払いに対する PayPal 手数料 (%)', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('固定料金', 'MODULE_ORDER_TOTAL_PAYPAL_FIXEDFEE', '40', 'PayPal固定料金', '6', '3', now())");
		} else {
		// English
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Display PayPal fees', 'MODULE_ORDER_TOTAL_PAYPAL_STATUS', 'true', 'Do you want this module to display?', '6', '1','zen_cfg_select_option(array(\'true\', \'false\'), ', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_ORDER_TOTAL_PAYPAL_SORT_ORDER', '450', 'Sort order of display.', '6', '2', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for less than 300 000JPY in Japan', 'MODULE_ORDER_TOTAL_PAYPAL_FEE0JP', '3.6', 'PayPal fee in % for payment between 0 and 300 000 JPY in Japan', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for less than 300 000JPY', 'MODULE_ORDER_TOTAL_PAYPAL_FEE0', '4.1', 'PayPal fee in % for payment between 0 and 300 000 JPY', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for 300 000 to 1 000 000JPY in Japan', 'MODULE_ORDER_TOTAL_PAYPAL_FEE3000JP', '3.4', 'PayPal fee in % for payment between 300 001 and 1 000 000 JPY in Japan', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for 300 000 to 1 000 000JPY', 'MODULE_ORDER_TOTAL_PAYPAL_FEE3000', '3.9', 'PayPal fee in % for payment between 300 001 and 1 000 000 JPY', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for 1 000 000 to 10 000 0000JPY in Japan', 'MODULE_ORDER_TOTAL_PAYPAL_FEE10000JP', '3.2', 'PayPal fee in % for payment between 1 000 001 and 10 000 000 JPY in Japan', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for 1 000 000 to 10 000 0000JPY', 'MODULE_ORDER_TOTAL_PAYPAL_FEE10000', '3.7', 'PayPal fee in % for payment between 1 000 001 and 10 000 000 JPY', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for more than 10 000 0000JPY in Japan', 'MODULE_ORDER_TOTAL_PAYPAL_FEE100000JP', '2.9', 'PayPal fee in % for payment over 10 000 001 JPY in Japan', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for more than 10 000 0000JPY', 'MODULE_ORDER_TOTAL_PAYPAL_FEE100000', '3.4', 'PayPal fee in % for payment over 10 000 001 JPY', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fixed Fee', 'MODULE_ORDER_TOTAL_PAYPAL_FIXEDFEE', '40', 'PayPal fixed fee', '6', '3', now())");
		}
   }

    function remove() {
      global $db;
      $keys = '';
      $keys_array = $this->keys();
      $keys_size = sizeof($keys_array);
      for ($i=0; $i<$keys_size; $i++) {
        $keys .= "'" . $keys_array[$i] . "',";
      }
      $keys = substr($keys, 0, -1);

      $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key in (" . $keys . ")");
    }
  }

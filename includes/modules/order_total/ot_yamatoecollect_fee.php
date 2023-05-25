<?php
/**
 * ot_yamatoecollect_fee order-total module
 *
 * @package orderTotal
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */
/**
 * YAMATOECOLLECT-FEE Order Totals Module
 *
 */

  class ot_yamatoecollect_fee {

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
      $this->code = 'ot_yamatoecollect_fee';
      $this->title = MODULE_ORDER_TOTAL_YAMATOECOLLECT_TITLE;
      $this->description = MODULE_ORDER_TOTAL_YAMATOECOLLECT_DESCRIPTION;
//      $this->enabled = ((MODULE_ORDER_TOTAL_YAMATOECOLLECT_STATUS == 'true') ? true : false);
//      $this->sort_order = MODULE_ORDER_TOTAL_YAMATOECOLLECT_SORT_ORDER;
      $this->enabled = (defined('MODULE_ORDER_TOTAL_YAMATOECOLLECT_STATUS') && MODULE_ORDER_TOTAL_YAMATOECOLLECT_STATUS == 'true');
      $this->sort_order = defined('MODULE_ORDER_TOTAL_YAMATOECOLLECT_SORT_ORDER') ? MODULE_ORDER_TOTAL_YAMATOECOLLECT_SORT_ORDER : null;
      if (null === $this->sort_order) return false;

      $this->output = array();
    }

    function process() {
      global $order, $currencies, $yamatoecollect_cost;
      $orderTotal = $order->info['total'];
      if (MODULE_ORDER_TOTAL_YAMATOECOLLECT_STATUS == 'true') {
        //check if payment method is COD for Yamato.
        if (isset($_SESSION['payment']) && $_SESSION['payment'] == 'yamatoecollect') {
       	switch ($orderTotal) {
			case ($orderTotal <= (10000-MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE10000)) :
				$yamatoecollect_cost = MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE;
				break;
			case (($orderTotal > (10000-MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE10000)) && ($orderTotal <= (30000-MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE30000))):
				$yamatoecollect_cost = MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE10000;
				break;
			case (($orderTotal > (30000-MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE30000)) && ($orderTotal <= (55000-MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE55000))):
				$yamatoecollect_cost = MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE30000;
				break;
			case (($orderTotal > (55000-MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE55000)) && ($orderTotal <= (100000-MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE100000))):
				$yamatoecollect_cost = MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE55000;
				break;
			case (($orderTotal > (100000-MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE100000))):
				$yamatoecollect_cost = MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE100000;
				break;
									}
           $order->info['total'] += $yamatoecollect_cost;
        $this->output[] = array('title' => $this->title . ':',
                                  'text' => $currencies->format($yamatoecollect_cost, true,  $order->info['currency'], $order->info['currency_value']),
                                  'value' => $yamatoecollect_cost);
        }
      }
    }
    
    function check() {
      global $db;
      if (!isset($this->_check)) {
        $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_STATUS'");
        $this->_check = $check_query->RecordCount();
      }

      return $this->_check;
    }

    function keys() {
      return array('MODULE_ORDER_TOTAL_YAMATOECOLLECT_STATUS', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_SORT_ORDER', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE10000', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE30000', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE55000', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE100000');
    }

    function install() {
		global $db;
		if ($_SESSION['language'] == 'japanese') {
		// Japanese
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('ヤマト代金引換モジュールを有効にする', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_STATUS', 'true', 'ヤマト運輸の代引き手数料を表示しますか？', '6', '1','zen_cfg_select_option(array(\'true\', \'false\'), ', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('表示順', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_SORT_ORDER', '461', '表示順を設定します。 最下位が最初に表示されます。', '6', '2', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('１万円未満の代金引換手数料', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE', '330', 'ヤマト宅急便ト代引手数料、代金引換の場合０円～１万円', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('会計１万円～３万円の代引手数料', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE10000', '440', 'ヤマト宅急便代引手数料、代金引換の場合１万円～３万円', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('会計３万～５万５の代引手数料', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE30000', '660', 'ヤマト宅急便代引手数料、代金引換の場合３万円～５万５千円', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('会計５万５円～１０万円の代引手数料', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE55000', '880', 'ヤマト宅急便代引手数料代、代金引換の場合５万５千円～１０万円', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('会計１０万円以上の代引手数料', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE100000', '1320', 'ヤマト宅急便代引手数料、代金引換の場合１０万円以上', '6', '3', now())");
		} else {
		// English
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Display YAMATOECOLLECT', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_STATUS', 'true', 'Do you want this module to display?', '6', '1','zen_cfg_select_option(array(\'true\', \'false\'), ', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_SORT_ORDER', '461', 'Sort order of display.', '6', '2', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for less than 10000 JPY', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE', '330', 'Yamato fee for COD payment between 0 and 10000 Yens', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for 10000 to 30000 JPY', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE10000', '440', 'Yamato fee for COD payment between 10000 and 30000 Yens', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for 30000 to 55000 JPY', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE30000', '660', 'Yamato fee for COD payment between 30001 and 55 000 Yens', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for 55000 to 100000 JPY', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE55000', '880', 'Yamato fee for COD payment between 55001 and 100 000 Yens', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for more than 100000 JPY', 'MODULE_ORDER_TOTAL_YAMATOECOLLECT_FEE100000', '1320', 'Yamato fee for COD payment over 100 001 Yens', '6', '3', now())");
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

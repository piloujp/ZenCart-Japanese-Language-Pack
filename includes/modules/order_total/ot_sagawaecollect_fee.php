<?php
/**
 * ot_sagawaecollect_fee order-total module
 *
 * @package orderTotal
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */
/**
 * SAGAWAECOLLECT-FEE Order Totals Module
 *
 */

  class ot_sagawaecollect_fee {

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
      $this->code = 'ot_sagawaecollect_fee';
      $this->title = MODULE_ORDER_TOTAL_SAGAWAECOLLECT_TITLE;
      $this->description = MODULE_ORDER_TOTAL_SAGAWAECOLLECT_DESCRIPTION;
      $this->enabled = (defined('MODULE_ORDER_TOTAL_SAGAWAECOLLECT_STATUS') && MODULE_ORDER_TOTAL_SAGAWAECOLLECT_STATUS == 'true');
      $this->sort_order = defined('MODULE_ORDER_TOTAL_SAGAWAECOLLECT_SORT_ORDER') ? MODULE_ORDER_TOTAL_SAGAWAECOLLECT_SORT_ORDER : null;
      if (null === $this->sort_order) return false;

      $this->output = array();
    }

    function process() {
      global $order, $currencies, $sagawaecollect_cost;
      $orderTotal = $order->info['total'];
      if (MODULE_ORDER_TOTAL_SAGAWAECOLLECT_STATUS == 'true') {
        //check if payment method is COD for Sagawa.
        if (isset($_SESSION['payment']) && $_SESSION['payment'] == 'sagawaecollect') {
       	switch ($orderTotal) {
			case ($orderTotal <= (10000-MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE10000)) :
				$sagawaecollect_cost = MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE;
				break;
			case (($orderTotal > (10000-MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE10000)) && ($orderTotal <= (30000-MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE30000))):
				$sagawaecollect_cost = MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE10000;
				break;
			case (($orderTotal > (30000-MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE30000)) && ($orderTotal <= (55000-MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE55000))):
				$sagawaecollect_cost = MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE30000;
				break;
			case (($orderTotal > (55000-MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE55000)) && ($orderTotal <= (100000-MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE100000))):
				$sagawaecollect_cost = MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE55000;
				break;
			case (($orderTotal > (100000-MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE100000)) && ($orderTotal <= (300000-MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE300000))):
				$sagawaecollect_cost = MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE100000;
				break;
			case (($orderTotal > (300000-MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE300000))):
				$sagawaecollect_cost = MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE300000;
				break;
									}
           $order->info['total'] += $sagawaecollect_cost;
        $this->output[] = array('title' => $this->title . ':',
                                  'text' => $currencies->format($sagawaecollect_cost, true,  $order->info['currency'], $order->info['currency_value']),
                                  'value' => $sagawaecollect_cost);
        }
      }
    }
    
    function check() {
      global $db;
      if (!isset($this->_check)) {
        $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_STATUS'");
        $this->_check = $check_query->RecordCount();
      }

      return $this->_check;
    }

    function keys() {
      return array('MODULE_ORDER_TOTAL_SAGAWAECOLLECT_STATUS', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_SORT_ORDER', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE10000', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE30000', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE55000', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE100000', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE300000');
    }

    function install() {
		global $db;
		if ($_SESSION['language'] == 'japanese') {
		// Japanese
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('佐川急便の代金引換を有効にする', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_STATUS', 'true', '佐川急便の代引き手数料を表示しますか？', '6', '1','zen_cfg_select_option(array(\'true\', \'false\'), ', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('表示順', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_SORT_ORDER', '462', '表示順を設定します。 最下位が最初に表示されます。', '6', '2', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('会計１万円未満の代引手数料', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE', '330', '佐川急便代引手数料、代金引換の場合０円～１万円', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('会計１万円～３万円の代引手数料', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE10000', '440', '佐川急便代引手数料、代金引換の場合１万円～３万円', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('会計３万～５万５の代引手数料', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE30000', '660', '佐川急便代引手数料、代金引換の場合３万円～５万５千円', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('会計５万５円～１０万円の代引手数料', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE55000', '880', '佐川急便代引手数料代、代金引換の場合５万５千円～１０万円', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('会計１０万円～３０万円の代引手数料', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE100000', '1320', '佐川急便代引手数料、代金引換の場合１０万円～３０万円', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('会計３０万円以上の代引手数料', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE300000', '2420', '佐川急便代引手数料、代金引換の場合３０万円以上', '6', '3', now())");
		} else {
		// English
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Display SAGAWAECOLLECT', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_STATUS', 'true', 'Do you want this module to display?', '6', '1','zen_cfg_select_option(array(\'true\', \'false\'), ', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_SORT_ORDER', '462', 'Sort order of display.', '6', '2', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for less than 10000 JPY', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE', '330', 'Sagawa fee for COD payment between 0 and 10000 Yens', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for 10000 to 30000 JPY', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE10000', '440', 'Sagawa fee for COD payment between 10000 and 30000 Yens', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for 30000 to 55000 JPY', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE30000', '660', 'Sagawa fee for COD payment between 30001 and 55 000 Yens', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for 55000 to 100000 JPY', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE55000', '880', 'Sagawa fee for COD payment between 55001 and 100 000 Yens', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for 100000 to 300000JPY', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE100000', '1320', 'Sagawa fee for COD payment between 100 001 Yens and 300 000 Yens', '6', '3', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Fee for 300000 to 500000JPY', 'MODULE_ORDER_TOTAL_SAGAWAECOLLECT_FEE300000', '2420', 'Sagawa fee for COD payment over 300 001 Yens', '6', '3', now())");
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

<?php
/**
 * YAMATOECOLLECT Payment Module
 *
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: brittainmark 2022 Sep 09 Modified in v1.5.8 $
 */
  class yamatoecollect { 

    /**
     * $_check is used to check the configuration key set up
     * @var int
     */
    protected $_check;
    /**
     * $code determines the internal 'code' name used to designate "this" payment module
     * @var string
     */
    public $code;
    /**
     * $description is a soft name for this payment method
     * @var string 
     */
    public $description;
    /**
     * $enabled determines whether this module shows or not... during checkout.
     * @var boolean
     */
    public $enabled;
    /**
     * $order_status is the order status to set after processing the payment
     * @var int
     */
    public $order_status;
    /**
     * $title is the displayed name for this order total method
     * @var string
     */
    public $title;
    /**
     * $sort_order is the order priority of this payment module when displayed
     * @var int
     */
    public $sort_order;

// class constructor
    function __construct() {
      global $order;

      $this->code = 'yamatoecollect';
      $this->title = MODULE_PAYMENT_YAMATOECOLLECT_TEXT_TITLE;
      $this->description = MODULE_PAYMENT_YAMATOECOLLECT_TEXT_DESCRIPTION;
      $this->sort_order = defined('MODULE_PAYMENT_YAMATOECOLLECT_SORT_ORDER') ? MODULE_PAYMENT_YAMATOECOLLECT_SORT_ORDER : null;
      $this->enabled = (defined('MODULE_PAYMENT_YAMATOECOLLECT_STATUS') && MODULE_PAYMENT_YAMATOECOLLECT_STATUS == 'True');
      if (null === $this->sort_order) return false;
      if (defined('MODULE_PAYMENT_YAMATOECOLLECT_ORDER_STATUS_ID') && (int)MODULE_PAYMENT_YAMATOECOLLECT_ORDER_STATUS_ID > 0) {
        $this->order_status = MODULE_PAYMENT_YAMATOECOLLECT_ORDER_STATUS_ID;
      }

      if (is_object($order)) $this->update_status();
    }

// class methods
    function update_status() {
      global $order, $db;

      if ($this->enabled && (int)MODULE_PAYMENT_YAMATOECOLLECT_ZONE > 0 && isset($order->delivery['country']['id'])) {
        $check_flag = false;
        $check = $db->Execute("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_YAMATOECOLLECT_ZONE . "' and zone_country_id = '" . (int)$order->delivery['country']['id'] . "' order by zone_id");
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

// disable the module if the order only contains virtual products
      if ($this->enabled == true) {
        if ($order->content_type != 'physical' || (substr_count($_SESSION['shipping']['id'], 'yamato') == 0)) {
          $this->enabled = false;
        }
      }

      // other status checks?
      if ($this->enabled) {
        // other checks here
		if ($order->info['total'] > MODULE_PAYMENT_YAMATOECOLLECT_LIMIT) {
			$this->enabled = false;
		}
      }
    }

    function javascript_validation() {
      return false;
    }

    function selection() {
      return array('id' => $this->code,
                   'module' => $this->title);
    }

    function pre_confirmation_check() {
      return false;
    }

    function confirmation() {
      return false;
    }

    function process_button() {
      return false;
    }

    function before_process() {
      return false;
    }

    function after_process() {
      return false;
    }

    function get_error() {
      return false;
    }

    function check() {
      global $db;
      if (!isset($this->_check)) {
        $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_YAMATOECOLLECT_STATUS'");
        $this->_check = $check_query->RecordCount();
      }
      return $this->_check;
    }

    function install() {
		global $db, $messageStack;
		if ($_SESSION['language'] == 'japanese') {
		// Japanese
			if (defined('MODULE_PAYMENT_YAMATOECOLLECT_STATUS')) {
				$messageStack->add_session('ヤマト代引替えモジュール搭載済み。', 'error');
				zen_redirect(zen_href_link(FILENAME_MODULES, 'set=payment&module=yamatoecollect', 'NONSSL'));
				return 'failed';
			}
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('ヤマト代金引換モジュールを有効にする', 'MODULE_PAYMENT_YAMATOECOLLECT_STATUS', 'True', 'ヤマト便の代金引換払いに対応しますか？', '6', '1', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('支払い地帯', 'MODULE_PAYMENT_YAMATOECOLLECT_ZONE', '0', '地帯が選択されている場合は、その地帯に対してのみこの支払い方法を有効にしてください。', '6', '2', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('お支払い限度額', 'MODULE_PAYMENT_YAMATOECOLLECT_LIMIT', '300000', 'このオプションでの支払いの上限を制限します。', '6', '0', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('表示順', 'MODULE_PAYMENT_YAMATOECOLLECT_SORT_ORDER', '0', '表示順を設定します。 最下位が最初に表示されます。', '6', '0', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('注文ステータスの設定', 'MODULE_PAYMENT_YAMATOECOLLECT_ORDER_STATUS_ID', '0', 'この支払いモジュールで行われた注文のステータスを設定します。', '6', '0', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
		} else {
		// English
			if (defined('MODULE_PAYMENT_YAMATOECOLLECT_STATUS')) {
				$messageStack->add_session('Yamato COD module already installed.', 'error');
				zen_redirect(zen_href_link(FILENAME_MODULES, 'set=payment&module=yamatoecollect', 'NONSSL'));
				return 'failed';
			}
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable Yamato Cash On Delivery Module', 'MODULE_PAYMENT_YAMATOECOLLECT_STATUS', 'True', 'Do you want to accept Yamato Cash On Delivery payments?', '6', '1', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Payment Zone', 'MODULE_PAYMENT_YAMATOECOLLECT_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', '6', '2', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Payment limit max:', 'MODULE_PAYMENT_YAMATOECOLLECT_LIMIT', '300000', 'Limit max for payment with this option.', '6', '0', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort order of display.', 'MODULE_PAYMENT_YAMATOECOLLECT_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', now())");
			$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Set Order Status', 'MODULE_PAYMENT_YAMATOECOLLECT_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', '6', '0', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
		}
   }

    function remove() {
      global $db;
      $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_PAYMENT_YAMATOECOLLECT_STATUS', 'MODULE_PAYMENT_YAMATOECOLLECT_ZONE', 'MODULE_PAYMENT_YAMATOECOLLECT_LIMIT', 'MODULE_PAYMENT_YAMATOECOLLECT_ORDER_STATUS_ID', 'MODULE_PAYMENT_YAMATOECOLLECT_SORT_ORDER');
    }
  }

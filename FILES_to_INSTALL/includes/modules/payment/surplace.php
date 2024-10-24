<?php
/**
 * surplace Payment Module
 *
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: brittainmark 2022 Sep 09 Modified in v1.5.8 $
 */

  class surplace {

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
    /**
     * $email_footer is used to provide specific instructions of this module use to user by email.
     * @var string
     */
    public $email_footer;

// class constructor
    function __construct() {
      global $order;

      $this->code = 'surplace';
      $this->title = MODULE_PAYMENT_SURPLACE_TEXT_TITLE;
      $this->description = MODULE_PAYMENT_SURPLACE_TEXT_DESCRIPTION;
      $this->enabled = (defined('MODULE_PAYMENT_SURPLACE_STATUS') && MODULE_PAYMENT_SURPLACE_STATUS == 'True');
      $this->sort_order = defined('MODULE_PAYMENT_SURPLACE_SORT_ORDER') ? MODULE_PAYMENT_SURPLACE_SORT_ORDER : null;
      if (null === $this->sort_order) return false;
      if (defined('MODULE_PAYMENT_SURPLACE_ORDER_STATUS_ID') && (int)MODULE_PAYMENT_SURPLACE_ORDER_STATUS_ID > 0) {
        $this->order_status = MODULE_PAYMENT_SURPLACE_ORDER_STATUS_ID;
      }

      $this->email_footer = MODULE_PAYMENT_SURPLACE_TEXT_EMAIL_FOOTER;

      if (is_object($order)) $this->update_status();
    }

// class methods
    function update_status() {
      global $order, $db;

      if ($this->enabled && (int)MODULE_PAYMENT_SURPLACE_ZONE > 0 && isset($order->delivery['country']['id'])) {
        $check_flag = false;
        $check = $db->Execute("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_SURPLACE_ZONE . "' and zone_country_id = '" . (int)$order->delivery['country']['id'] . "' order by zone_id");
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
        if ($order->content_type != 'physical' || (substr_count($_SESSION['shipping']['id'], 'storepickup') == 0)) {
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
      return array('title' => MODULE_PAYMENT_SURPLACE_TEXT_DESCRIPTION);
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
        $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_SURPLACE_STATUS'");
        $this->_check = $check_query->RecordCount();
      }
      return $this->_check;
    }

    function install() {
		global $db, $messageStack;
		if ($_SESSION['language'] == 'japanese') {
		// Japanese
			if (defined('MODULE_PAYMENT_SURPLACE_STATUS')) {
				$messageStack->add_session('店頭支払いモジュール搭載済み。', 'error');
				zen_redirect(zen_href_link(FILENAME_MODULES, 'set=payment&module=surplace', 'NONSSL'));
				return 'failed';
			}
		} else {
		// English
			if (defined('MODULE_PAYMENT_SURPLACE_STATUS')) {
				$messageStack->add_session('Paiement at the shop module already installed.', 'error');
				zen_redirect(zen_href_link(FILENAME_MODULES, 'set=payment&module=surplace', 'NONSSL'));
				return 'failed';
			}
		}
		$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable shop payment', 'MODULE_PAYMENT_SURPLACE_STATUS', 'True', 'Do you want to accept payment at the shop?', '6', '1', 'zen_cfg_select_option(array(\'True\', \'False\'), ', now())");
		$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Payment Zone', 'MODULE_PAYMENT_SURPLACE_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', '6', '2', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(', now())");
		$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort order of display.', 'MODULE_PAYMENT_SURPLACE_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', now())");
		$db->Execute("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Set Order Status', 'MODULE_PAYMENT_SURPLACE_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', '6', '0', 'zen_cfg_pull_down_order_statuses(', 'zen_get_order_status_name', now())");
   }

    function remove() {
      global $db;
      $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
	  return array('MODULE_PAYMENT_SURPLACE_STATUS', 'MODULE_PAYMENT_SURPLACE_ZONE', 'MODULE_PAYMENT_SURPLACE_SORT_ORDER', 'MODULE_PAYMENT_SURPLACE_ORDER_STATUS_ID');
    }
  }

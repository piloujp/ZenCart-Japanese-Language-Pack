<?php
/**
 * shipping class
 *
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: brittainmark 2022 Oct 06 Modified in v1.5.8 $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}
/**
 * shipping class
 * Class used for interfacing with shipping modules
 *
 */
class shipping extends base
{
    /**
     * $enabled allows notifier to turn off shipping method
     * @var boolean
     */
    public $enabled;
    /**
     * $modules is an array of installed shipping module names can be altered by notifier
     * @var array
     */
    public $modules;
    /**
     * $abort_legacy_calculations allows a notifier to enable the calculate_boxes_weight_and_tare method
     * @var boolean
     */
    public $abort_legacy_calculations;

    public function __construct($module = null)
    {
        global $PHP_SELF, $messageStack, $languageLoader;

        if (defined('MODULE_SHIPPING_INSTALLED') && !empty(MODULE_SHIPPING_INSTALLED)) {
            $this->modules = explode(';', MODULE_SHIPPING_INSTALLED);
        }
        $this->notify('NOTIFY_SHIPPING_CLASS_GET_INSTALLED_MODULES', $module);

        if (empty($this->modules)) {
            return;
        }

        $include_modules = [];

        if (!empty($module) && (in_array(substr($module['id'], 0, strpos($module['id'], '_')) . '.' . substr($PHP_SELF, (strrpos($PHP_SELF, '.')+1)), $this->modules))) {
            $include_modules[] = [
            'class' => substr($module['id'], 0, strpos($module['id'], '_')),
            'file' => substr($module['id'], 0, strpos($module['id'], '_')) . '.' . substr($PHP_SELF, (strrpos($PHP_SELF, '.')+1))
            ];
        } else {
            foreach($this->modules as $value) {
                $class = substr($value, 0, strrpos($value, '.'));
                $include_modules[] = [
                    'class' => $class,
                    'file' => $value
                ];
            }
        }

        for ($i = 0, $n = count($include_modules); $i < $n; $i++) {
            $lang_file = null;
            $module_file = DIR_WS_MODULES . 'shipping/' . $include_modules[$i]['file'];
            if (IS_ADMIN_FLAG === true) {
                $lang_file = zen_get_file_directory(DIR_FS_CATALOG . DIR_WS_LANGUAGES . $_SESSION['language'] . '/modules/shipping/', $include_modules[$i]['file'], 'false');
                $module_file = DIR_FS_CATALOG . $module_file;
            } else {
                $lang_file = zen_get_file_directory(DIR_WS_LANGUAGES . $_SESSION['language'] . '/modules/shipping/', $include_modules[$i]['file'], 'false');
            }
            if ($languageLoader->hasLanguageFile(DIR_FS_CATALOG . DIR_WS_LANGUAGES,  $_SESSION['language'], $include_modules[$i]['file'], '/modules/shipping')) {
                $languageLoader->loadExtraLanguageFiles(DIR_FS_CATALOG . DIR_WS_LANGUAGES,  $_SESSION['language'], $include_modules[$i]['file'], '/modules/shipping');
            } else {
                if (is_object($messageStack)) {
                    if (IS_ADMIN_FLAG === false) {
                        $messageStack->add('checkout_shipping', WARNING_COULD_NOT_LOCATE_LANG_FILE . $lang_file, 'caution');
                    } else {
                        $messageStack->add_session(WARNING_COULD_NOT_LOCATE_LANG_FILE . $lang_file, 'caution');
                    }
                }
                continue;
            }
            $this->enabled = true;
            $this->notify('NOTIFY_SHIPPING_MODULE_ENABLE', $include_modules[$i]['class'], $include_modules[$i]['class']);
            if ($this->enabled) {
                include_once $module_file;
                $GLOBALS[$include_modules[$i]['class']] = new $include_modules[$i]['class'];

                $enabled = $this->check_enabled($GLOBALS[$include_modules[$i]['class']]);
                if ($enabled == false ) {
                    unset($GLOBALS[$include_modules[$i]['class']]);
                }
            }
        }
    }

    public function check_enabled($class)
    {
        $enabled = $class->enabled;
        if (method_exists($class, 'check_enabled_for_zone') && $class->enabled) {
            $enabled = $class->check_enabled_for_zone();
        }
        $this->notify('NOTIFY_SHIPPING_CHECK_ENABLED_FOR_ZONE', [], $class, $enabled);
        if (method_exists($class, 'check_enabled') && $enabled) {
            $enabled = $class->check_enabled();
        }
        $this->notify('NOTIFY_SHIPPING_CHECK_ENABLED', [], $class, $enabled);
        return $enabled;
    }

	public function get_weight_qty_contents()
    {
		global $db;
        $weight_quantity_array = array();
        if (is_array($_SESSION['cart']->contents)) {
            foreach ($_SESSION['cart']->contents as $products_id => $data) {
				$sql = "SELECT products_weight, product_is_always_free_shipping, products_virtual
                    FROM " . TABLE_PRODUCTS . "
                    WHERE products_id = " . (int)$products_id;
				if ($product = $db->Execute($sql)) {
					// adjusted count for free shipping
					if ($product->fields['product_is_always_free_shipping'] != 1 and $product->fields['products_virtual'] != 1) {
						$ind_product_weight = $product->fields['products_weight'];
					} else {
						$ind_product_weight = 0;
					}
				} else {
						$ind_product_weight = 0;
					}
				if (isset($weight_quantity_array[$ind_product_weight])) {
					$indqty = $weight_quantity_array[$ind_product_weight] + $_SESSION['cart']->contents[$products_id]['qty'];
				} else {
					$indqty = $_SESSION['cart']->contents[$products_id]['qty'];
				}
				$weight_quantity_array[$ind_product_weight] = $indqty;
            }
        }
        krsort($weight_quantity_array, SORT_NUMERIC);
		return $weight_quantity_array;
    }

    public function calculate_boxes_weight_and_tare()
    {
        global $total_weight, $shipping_weight, $shipping_quoted, $shipping_num_boxes, $box_array, $total_boxes_weight, $max_shipping_weight;

        $this->abort_legacy_calculations = false;
        $this->notify('NOTIFY_SHIPPING_MODULE_PRE_CALCULATE_BOXES_AND_TARE', [], $total_weight, $shipping_weight, $shipping_quoted, $shipping_num_boxes);
        if ($this->abort_legacy_calculations) {
            return;
        }
		
		$shipping_num_boxes = 1;
        if (is_array($this->modules)) {
            $shipping_quoted = '';
            $shipping_weight = $total_weight;

            $za_tare_array = preg_split("/[:,]/" , str_replace(' ', '', !empty(SHIPPING_BOX_WEIGHT) ? SHIPPING_BOX_WEIGHT : '0:0'));
            $zc_tare_percent= (float)$za_tare_array[0];
            $zc_tare_weight= (float)$za_tare_array[1];

            $za_large_array = preg_split("/[:,]/" , str_replace(' ', '', !empty(SHIPPING_BOX_PADDING) ? SHIPPING_BOX_PADDING : '0:0'));
            $zc_large_percent= (float)$za_large_array[0];
            $zc_large_weight= (float)$za_large_array[1];

            // SHIPPING_BOX_WEIGHT = tare
            // SHIPPING_BOX_PADDING = Large Box % increase
            // SHIPPING_MAX_WEIGHT = Largest package
			if (empty($max_shipping_weight) or $max_shipping_weight >= SHIPPING_MAX_WEIGHT) {
				$max_shipping_weight = SHIPPING_MAX_WEIGHT;
			}

            switch (true) {
                // large box add padding
                case ($max_shipping_weight <= $shipping_weight):
                    $shipping_weight = $shipping_weight + ($shipping_weight*($zc_large_percent/100)) + $zc_large_weight;
                    break;

                default:
                    // add tare weight < large
                    $shipping_weight = $shipping_weight + ($shipping_weight*($zc_tare_percent/100)) + $zc_tare_weight;
                    break;
            }

            // total weight with Tare
            $_SESSION['shipping_weight'] = $shipping_weight;
			$box_number = 1;
			$total_boxes_weight = 0;
            if ($shipping_weight > $max_shipping_weight) { // Split into many boxes
				$weight_qty_array = $this->get_weight_qty_contents(); // function call to make an array of cart items weight : Weight as key and quantity as value (weight => quantity)
				$ItemNumber = array_sum($weight_qty_array);
				Foreach($weight_qty_array as $keys => $values) { // make a simplified array of each cart item weight
					for ($i=1;$i<=$values;$i++) {
						$weight_array[] = $keys;
					}
				}
				$box_array[] = array('box_weight' => 0, 'box_items' => 0, 'box_quote' => 0);
				$max_weight_tare = round(($max_shipping_weight - $zc_large_weight) / (1 + ($zc_large_percent/100)), 2); // compensate for box tare
				// algorithm to calculate number of boxes : Add each item weight starting with bigger ones until max, then add next item to new box, then go to next smaller item and try to add it, and do this loop until end of array.
				for ($k=0; $k < $ItemNumber; $k++) {
					if ($weight_array[$k] > $max_weight_tare) {
						// Echo 'Some item is too heavy (' . $weight_array[$k] . ' Kg) to ship ! Max weight limit is ' . $max_weight_tare . " Kg.\n";
						break;
					}
					for ($j=0; $j < $shipping_num_boxes; $j++) {
						if (($box_array[$j]['box_weight'] + $weight_array[$k]) <= $max_weight_tare) {
							$box_array[$j]['box_weight'] += $weight_array[$k];
							$box_array[$j]['box_items'] += 1;
							break;
						} elseif ($j == $shipping_num_boxes-1 and $box_array[0]['box_weight'] <> 0) {
							$shipping_num_boxes++;
							$box_array[$j+1] = array('box_weight' => 0, 'box_items' => 0, 'box_quote' => 0);
						}
					}
				}
				// end of algorithm
				if (!empty($box_array)) {
					for ($i=0; $i < $shipping_num_boxes; $i++) { // adding tare to each box
						if ($i == $shipping_num_boxes-1) {
							$box_array[$i]['box_weight'] = $box_array[$i]['box_weight'] + ($box_array[$i]['box_weight']*($zc_tare_percent/100)) + $zc_tare_weight; // compensate for box tare
						} else {
							$box_array[$i]['box_weight'] = $box_array[$i]['box_weight'] + ($box_array[$i]['box_weight']*($zc_large_percent/100)) + $zc_large_weight; // compensate for box tare (large)
						}
						$total_boxes_weight += $box_array[$i]['box_weight'];
					}
					$shipping_weight = $total_boxes_weight; // new total shipping weight including tare for each box
				}
/*			Old code for box calculation
//        $shipping_num_boxes = ceil($shipping_weight/SHIPPING_MAX_WEIGHT);
                $zc_boxes = zen_round(($shipping_weight/SHIPPING_MAX_WEIGHT), 2);
                $shipping_num_boxes = ceil($zc_boxes);*/
                $shipping_weight = ceil($shipping_weight*100/$shipping_num_boxes)/100;
            }
        }
        $this->notify('NOTIFY_SHIPPING_MODULE_CALCULATE_BOXES_AND_TARE', [], $total_weight, $shipping_weight, $shipping_quoted, $shipping_num_boxes, $box_array, $total_boxes_weight, $max_shipping_weight);
    }

    public function quote($method = '', $module = '', $calc_boxes_weight_tare = true, $insurance_exclusions = [])
    {
        global $shipping_weight, $uninsurable_value, $max_shipping_weight, $shipping_num_boxes, $box_array;
        $quotes_array = [];
		
		// Stop calculations if one item is over weight limit set in admin
		$heaviest_weight = array_keys($this->get_weight_qty_contents())[0];
		if ($heaviest_weight and $heaviest_weight >= SHIPPING_MAX_WEIGHT) {
		return $quotes_array;
		}

		$shipping_num_boxes = 1;
//        if ($calc_boxes_weight_tare) {
//            $this->calculate_boxes_weight_and_tare();
//        }

        // calculate amount not to be insured on shipping
        $uninsurable_value = (method_exists($this, 'get_uninsurable_value')) ? $this->get_uninsurable_value($insurance_exclusions) : 0;

        if (is_array($this->modules)) {
            $include_quotes = [];

            foreach($this->modules as $value) {
                $class = substr($value, 0, strrpos($value, '.'));
                if (!empty($module)) {
                    if ($module == $class && isset($GLOBALS[$class]) && $GLOBALS[$class]->enabled) {
                        $include_quotes[] = $class;
                    }
                } elseif (isset($GLOBALS[$class]) && $GLOBALS[$class]->enabled) {
                    $include_quotes[] = $class;
                }
            }

            $size = count($include_quotes);
            for ($i = 0; $i < $size; $i++) {
                if (method_exists($GLOBALS[$include_quotes[$i]], 'update_status')) {
                    $GLOBALS[$include_quotes[$i]]->update_status();
                }
                if (false === $GLOBALS[$include_quotes[$i]]->enabled) {
                    continue;
                }
				If (defined('MODULE_SHIPPING_' . strtoupper($GLOBALS[$include_quotes[$i]]->quote($module)['id']) . '_MAX_WEIGHT')) { // check if a max weight constant is defined for this module
					$max_shipping_weight = constant("MODULE_SHIPPING_" . strtoupper($GLOBALS[$include_quotes[$i]]->quote($module)['id']) . "_MAX_WEIGHT");
				}
				$box_array = [];
				if ($calc_boxes_weight_tare) {
					$this->calculate_boxes_weight_and_tare(); // calculates boxes number and their weight with tare
				}
                $save_shipping_weight = $shipping_weight;
                $quotes = $GLOBALS[$include_quotes[$i]]->quote($method);
                if (!isset($quotes['tax']) && !empty($quotes)) {
                    $quotes['tax'] = 0;
                }
                $shipping_weight = $save_shipping_weight;
                if (is_array($quotes)) {
                    $quotes_array[] = $quotes;
                }
            }
        }
        $this->notify('NOTIFY_SHIPPING_MODULE_GET_ALL_QUOTES', $quotes_array, $quotes_array);
        return $quotes_array;
    }

    public function cheapest()
    {
        if (!is_array($this->modules)) {
            return false;
        }
        $rates = [];

        foreach($this->modules as $value) {
            $class = substr($value, 0, strrpos($value, '.'));
            if (isset($GLOBALS[$class]) && is_object($GLOBALS[$class]) && $GLOBALS[$class]->enabled) {
                $quotes = isset($GLOBALS[$class]->quotes) ? $GLOBALS[$class]->quotes : null;
                if (empty($quotes['methods']) || isset($quotes['error'])) {
                    continue;
                }
                $size = count($quotes['methods']);
                for ($i = 0; $i < $size; $i++) {
                    if (isset($quotes['methods'][$i]['cost'])) {
                        $rates[] = [
                            'id' => $quotes['id'] . '_' . $quotes['methods'][$i]['id'],
                            'title' => $quotes['module'] . ' (' . $quotes['methods'][$i]['title'] . ')',
                            'cost' => $quotes['methods'][$i]['cost'],
                            'module' => $quotes['id']
                        ];
                    }
                }
            }
        }

        $cheapest = false;
        $size = count($rates);
        for ($i = 0; $i < $size; $i++) {
            if ($cheapest !== false) {
                // never quote storepickup as lowest - needs to be configured in shipping module
                if ($rates[$i]['cost'] < $cheapest['cost'] && $rates[$i]['module'] !== 'storepickup') {
                    // -----
                    // Give a customized shipping module the opportunity to exclude itself from being quoted
                    // as the cheapest.  The observer must set the $exclude_from_cheapest to specifically
                    // (bool)true to be excluded.
                    //
                    $exclude_from_cheapest = false;
                    $this->notify('NOTIFY_SHIPPING_EXCLUDE_FROM_CHEAPEST', $rates[$i]['module'], $exclude_from_cheapest);
                    if ($exclude_from_cheapest === true) {
                        continue;
                    }
                    $cheapest = $rates[$i];
                }
            } elseif ($size === 1 || $rates[$i]['module'] !== 'storepickup') {
                $cheapest = $rates[$i];
            }
        }
        $this->notify('NOTIFY_SHIPPING_MODULE_CALCULATE_CHEAPEST', $cheapest, $cheapest, $rates);
        return $cheapest;
    }
}

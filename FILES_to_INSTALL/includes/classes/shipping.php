<?php
/**
 * shipping class
 *
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: lat9 2024 Aug 26 Modified in v2.1.0-alpha2 $
 */
use Zencart\FileSystem\FileSystem;
use Zencart\ResourceLoaders\ModuleFinder;
use Zencart\Traits\NotifierManager;

if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

/**
 * shipping class
 * Class used for interfacing with shipping modules
 *
 */
class shipping
{
    use NotifierManager;

    /**
     * $enabled public property used by notifiers to allow notifier to turn off a shipping method when querying available modules
     */
    public bool $enabled;
    /**
     * $modules is an array of installed shipping module names; notifier hook exists to alter if needed
     */
    public array $modules;
    /**
     * $abort_legacy_calculations public property allows a notifier to intercept the calculate_boxes_weight_and_tare method
     */
    public bool $abort_legacy_calculations;
    /**
     * Initialized modules whose status is "enabled"
     */
    protected array $initialized_modules = [];

    public function __construct($module = null)
    {
        if (defined('MODULE_SHIPPING_INSTALLED') && !empty(MODULE_SHIPPING_INSTALLED)) {
            $this->modules = explode(';', MODULE_SHIPPING_INSTALLED);
        }
        $this->notify('NOTIFY_SHIPPING_CLASS_GET_INSTALLED_MODULES', $module);

        if (empty($this->modules)) {
            return;
        }

        $this->initialize_modules($module);
    }

    /**
     * Load language files and check "enabled" configuration status of each module.
     * If $module is specified, limits the initialization to just that module; else processes all "installed" modules listed in Admin.
     */
    protected function initialize_modules($module = null): void
    {
        global $messageStack, $languageLoader, $installedPlugins, $weight_qty_sizes_array, $weight_array, $sizes_array, $max_items, $multiboxes;

        // -----
        // Locate all shipping modules, looking in both /includes/modules/shipping
        // and for those provided by zc_plugins.  Note that any module provided by a
        // zc_plugin overrides the processing present in any 'base' file.
        //
        $moduleFinder = new ModuleFinder('shipping', new Filesystem());
        $modules_found = $moduleFinder->findFromFilesystem($installedPlugins);

        $modules_to_quote = [];

        $module_name = (empty($module)) ? '0' : substr($module['id'], 0, strpos($module['id'], '_'));
        if (!empty($module) && in_array($module_name . '.php', $this->modules) && isset($modules_found[$module_name])) {
            $modules_to_quote[] = [
                'class' => $module_name,
                'file' => $module_name . '.php',
            ];
        } else {
            foreach ($this->modules as $value) {
                $class = pathinfo($value, PATHINFO_FILENAME);
                $modules_to_quote[] = [
                    'class' => $class,
                    'file' => $value,
                ];
            }
        }

        foreach ($modules_to_quote as $quote_module) {
            if (!$languageLoader->loadModuleLanguageFile($_SESSION['language'], $quote_module['file'], 'shipping')) {
                $language_dir = (IS_ADMIN_FLAG === false) ? DIR_WS_LANGUAGES : (DIR_FS_CATALOG . DIR_WS_LANGUAGES);
                $lang_file = zen_get_file_directory($language_dir . $_SESSION['language'] . '/modules/shipping/', $quote_module['file'], 'false');

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

            $this->notify('NOTIFY_SHIPPING_MODULE_ENABLE', $quote_module['class'], $quote_module['class']);
            if ($this->enabled && isset($modules_found[$quote_module['file']])) {
                include_once DIR_FS_CATALOG . $modules_found[$quote_module['file']] . $quote_module['file'];
                $GLOBALS[$quote_module['class']] = new $quote_module['class']();

                $enabled = $this->check_enabled($GLOBALS[$quote_module['class']]);
                if ($enabled === false) {
                    unset($GLOBALS[$quote_module['class']]);
                } else {
                    $this->initialized_modules[] = $quote_module['class'];
                }
            }
        }
		
		$multiboxes = 'None';
		$max_item_length = 0;
		$max_item_width = 0;
		$max_item_height = 0;
		$max_item_girth = 0;
		$weight_qty_sizes_array = $this->get_weight_qty_sizes(); // function call to make an array of cart items including id, weight, quantity, length, width, height, girth and volume ordered by weight
		foreach($weight_qty_sizes_array as $keys => $datas) { // make simplified arrays, one for cart items weight and another for cart items dimensions
			$sorted_sizes_array = array($datas['length'], $datas['width'], $datas['height']);
			rsort($sorted_sizes_array,SORT_NUMERIC);
			$sorted_sizes_array[] = $datas['vol'];
			$sorted_sizes_array[] = $datas['id'];
			$sorted_sizes_array[] = $datas['qty'];
			$sizes_array[] = $sorted_sizes_array;
			$weight_array[] = array($datas['id'], $datas['weight'], $datas['qty']);
			if ($sorted_sizes_array[0] > $max_item_length) {
				$max_item_length = $sorted_sizes_array[0];
			}
			if ($sorted_sizes_array[1] > $max_item_width) {
				$max_item_width = $sorted_sizes_array[1];
			}
			if ($sorted_sizes_array[2] > $max_item_height) {
				$max_item_height = $sorted_sizes_array[2];
			}
			if ($datas['girth'] > $max_item_girth) {
				$max_item_girth = $datas['girth'];
			}
		}
		$max_items = array($max_item_length, $max_item_width, $max_item_height, $max_item_girth);
		$colvol = array_column($sizes_array, 3);
		array_multisort($colvol, SORT_DESC, $sizes_array);
		$this->calculate_boxes_weight_and_tare();
		$this->get_box_size();
    }

    public function getInitializedModules(): array
    {
        return $this->initialized_modules;
    }

    /**
     * NOTE: Could eventually replace zen_count_shipping_modules() function
     */
    public function countEnabledModules(): int
    {
        return count($this->initialized_modules);
    }

    /**
     * Check whether a module is enabled for the active checkout zone
     */
    public function check_enabled($module_class): bool
    {
        $enabled = $module_class->enabled;
        if (method_exists($module_class, 'check_enabled_for_zone') && $module_class->enabled) {
            $enabled = $module_class->check_enabled_for_zone();
        }
        $this->notify('NOTIFY_SHIPPING_CHECK_ENABLED_FOR_ZONE', [], $module_class, $enabled);

        if (method_exists($module_class, 'check_enabled') && $enabled) {
            $enabled = $module_class->check_enabled();
        }
        $this->notify('NOTIFY_SHIPPING_CHECK_ENABLED', [], $module_class, $enabled);

        return !empty($enabled);
    }

	// calculate box size with data from $weight_qty_sizes_array and or $sizes_array
	public function get_box_size()
    {
		global $weight_qty_sizes_array, $shipping_num_boxes, $sizes_array, $box_array, $max_size_array, $multiboxes, $box_sizes_array;
		
		if (empty($multiboxes)) {$multiboxes = 'None';}
		if ($multiboxes == 'Size') {
			$items_size_array[0] = $sizes_array;
		} elseif ($shipping_num_boxes > 1) {
			$items_size_array = array();
			for ($i =0; $i < $shipping_num_boxes; $i++) { // make an array of items for each box
				foreach($sizes_array as $key => $value) {
					if (in_array($sizes_array[$key][4], array_column($box_array[$i]['items_ref'], 'ref'))) {
						$items_size_array[$i][] = $value;
					}
				}
				//$sort_col = array_column($items_size_array[$i], 0); // column 'length'
				$sort_col = array_column($items_size_array[$i], 3); // column 'vol'
				array_multisort($sort_col, SORT_DESC, $items_size_array[$i]); // array ordered by above column
			}
		} else {
			$items_size_array[0] = $sizes_array;
			$shipping_num_boxes = 1;
		}
		// Begining of parcel size calculation
		$box_length = $box_width = $box_height = $sum_height = $count_height = 0;
		foreach($weight_qty_sizes_array as $keys => $datas) { // calculate default height for empty height items using mean value of items with defined sizes.
			if ($datas['height'] > 0) {
				$sum_height += $datas['height'];
				$count_height++;
			}
		}
		if ($sum_height > 0) { // calculate average/default if not null
			$ave_height = ceil($sum_height / $count_height);
		} else {
			return; // if there is no dimension
		}
		$box_sizes_array = array();
		$new_box_height = array();
		$add_box = 0;
		if ($multiboxes == 'Size') {
			$iter = 1;
		} else {
			$iter = $shipping_num_boxes;
		}
		for ($i =0; $i < $iter; $i++) {
			$maxlength = $maxwidth = $maxheight = $defitems = 0;
			if ($multiboxes == 'Size' and !empty($max_size_array)) {
				$maxlength = $max_size_array['Max_length'];
				$maxwidth = $max_size_array['Max_width'];
				$maxheight = $max_size_array['Max_height'];
			}
			foreach($items_size_array[$i] as $key => $value) { // loop to find maximum items dimensions
				if ($items_size_array[$i][$key][3] > 0) { // if volume not null
					if ($items_size_array[$i][$key][0] > $maxlength) {
						$maxlength = $items_size_array[$i][$key][0];
					}
					if ($items_size_array[$i][$key][1] > $maxwidth) {
						$maxwidth  = $items_size_array[$i][$key][1];
					}
					if ($items_size_array[$i][$key][2] > $maxheight) {
						$maxheight = $items_size_array[$i][$key][2];
					}
				} else { // get track of default sizes for non assigned items
					$defitems ++;
					$items_size_array[$i][$key][0] = ($items_size_array[$i][$key][0] == 0) ? $maxlength : $items_size_array[$i][$key][0]; 
					$items_size_array[$i][$key][1] = ($items_size_array[$i][$key][1] == 0) ? $maxwidth : $items_size_array[$i][$key][1]; 
					$items_size_array[$i][$key][2] = ($items_size_array[$i][$key][2] == 0) ? $ave_height : $items_size_array[$i][$key][2]; 
				}
			}
			$zero_rate = ($defitems == 0) ? 2 : $box_array[$i]['box_items']/$defitems;
			if($maxlength == 0 or $maxwidth == 0 or $maxheight == 0 or $zero_rate < 2) {
				return; // too many items lack dimensions
			}
			// begining of algorithm to calculate box size using size_array which has been ordered from largest volume to smallest one.
			// Items are stacked on each other (height) but if they are smaler than half max length or max width they are put side by side.
			$prev_height = 0;
			$box_height = 0;
			$long = 0;
			$larg = 0;
			foreach($items_size_array[$i] as $keys => $datas) {
				for ($q=0; $q < $datas[5]; $q++) {
					switch (true) {
					case (($datas[0] <= intval($maxlength / 2)) and ($datas[1] <= intval($maxwidth / 2))):
						if ($prev_height == 0) {
							if ($multiboxes == 'Size' and ($box_height + $datas[2]) >= $maxheight) {
								$add_box = 1;
								break;
							} else {
								$box_height += $datas[2];
								$long = 1;
								$larg = 1;
								$prev_height = $datas[2];
							}
						} elseif ($long == 1 and $larg == 1) {
							if ($multiboxes == 'Size' and ($box_height + $datas[2] - $prev_height) >= $maxheight) {
								$add_box = 1;
								break;
							} else {
								if (($datas[2] - $prev_height) > 0) {
									$box_height += $datas[2] - $prev_height;
									$prev_height = $datas[2];
								}
								$long = 1;
								$larg = 1;
							}
						} elseif ($long == 1) {
							if ($multiboxes == 'Size' and ($box_height + $datas[2] - $prev_height) >= $maxheight) {
								$add_box = 1;
								break;
							} else {
								if (($datas[2] - $prev_height) > 0) {
									$box_height += $datas[2] - $prev_height;
									$prev_height = $datas[2];
								}
								$long = 0;
								$larg = 1;
							}
						} elseif ($larg == 1) {
							if ($multiboxes == 'Size' and ($box_height + $datas[2] - $prev_height) >= $maxheight) {
								$add_box = 1;
								break;
							} else {
								if (($datas[2] - $prev_height) > 0) {
									$box_height += $datas[2] - $prev_height;
									$prev_height = $datas[2];
								}
								$long = 1;
								$larg = 0;
							}
					   }
						break;
					case (($datas[0] <= intval($maxlength / 2)) and ($datas[1] > intval($maxwidth / 2))):
						if ($prev_height == 0) {
							if ($multiboxes == 'Size' and ($box_height + $datas[2]) >= $maxheight) {
								$add_box = 1;
								break;
							} else {
								$box_height += $datas[2];
								$long = 1;
								$larg = 0;
								$prev_height = $datas[2];
							}
						} elseif ($long == 1 and $larg == 1) {
							if ($multiboxes == 'Size' and ($box_height + $datas[2] - $prev_height) >= $maxheight) {
								$add_box = 1;
								break;
							} else {
								if (($datas[2] - $prev_height) > 0) {
									$box_height += $datas[2] - $prev_height;
									$prev_height = $datas[2];
								}
								$long = 1;
								$larg = 1;
							}
						}  elseif ($long == 1) {
							if ($multiboxes == 'Size' and ($box_height + $datas[2] - $prev_height) >= $maxheight) {
								$add_box = 1;
								break;
							} else {
								if (($datas[2] - $prev_height) > 0) {
									$box_height += $datas[2] - $prev_height;
								}
								$long = 0;
								$larg = 0;
								$prev_height = 0;
							}
						} elseif ($larg == 1) {
							if ($multiboxes == 'Size' and ($box_height + $datas[2]) >= $maxheight) {
								$add_box = 1;
								break;
							} else {
								$box_height += $datas[2];
								$long = 1;
								$larg = 0;
								$prev_height = $datas[2];
							}
					   }
						break;
					case (($datas[0] > intval($maxlength / 2)) and ($datas[1] <= intval($maxwidth / 2))):
						if ($prev_height == 0) {
							if ($multiboxes == 'Size' and ($box_height + $datas[2]) >= $maxheight) {
								$add_box = 1;
								break;
							} else {
								$box_height += $datas[2];
								$long = 0;
								$larg = 1;
								$prev_height = $datas[2];
							}
						} elseif ($long == 1 and $larg == 1) {
							if ($multiboxes == 'Size' and ($box_height + $datas[2] - $prev_height) >= $maxheight) {
								$add_box = 1;
								break;
							} else {
								if (($datas[2] - $prev_height) > 0) {
									$box_height += $datas[2] - $prev_height;
									$prev_height = $datas[2];
								}
								$long = 1;
								$larg = 1;
							}
						}  elseif ($long == 1) {
							if ($multiboxes == 'Size' and ($box_height + $datas[2]) >= $maxheight) {
								$add_box = 1;
								break;
							} else {
								$box_height += $datas[2];
								$long = 0;
								$larg = 1;
								$prev_height = $datas[2];
							}
						} elseif ($larg == 1) {
							if ($multiboxes == 'Size' and ($box_height + $datas[2] - $prev_height) >= $maxheight) {
								$add_box = 1;
								break;
							} else {
								if (($datas[2] - $prev_height) > 0) {
									$box_height += $datas[2] - $prev_height;
								}
								$long = 0;
								$larg = 0;
								$prev_height = 0;
							}
					   }
						break;
					default:
						if ($multiboxes == 'Size' and ($box_height + $datas[2]) >= $maxheight) {
							$add_box = 1;
							break;
						} else {
							$box_height += $datas[2];
							$long = 0;
							$larg = 0;
							$prev_height = 0;
						}
					}
					if ($add_box == 1) {
						$new_box_height[] = $box_height;
						$prev_height = $box_height = $long = $larg = 0;
						$add_box = 0;
					}
				}
			}
			for ($c = 0; $c < count($new_box_height); $c++) {
				$box_sizes_array[] = array($maxlength, $maxwidth, $new_box_height[$c]);
				if ($c > 0) {
					$shipping_num_boxes++;
				}
			}
			$box_sizes_array[] = array($maxlength, $maxwidth, $box_height);
		}
		return $box_sizes_array;
	}

	// return an array filled with id, weight, qty, length, width, height, girth and volume of each item in cart.
	public function get_weight_qty_sizes()
    {
		global $db;
        $weight_quantity_sizes_array = array();
        if (is_array($_SESSION['cart']->contents)) {
            foreach ($_SESSION['cart']->contents as $products_id => $data) {
				$sql = "SELECT products_weight, products_length, products_width, products_height, product_is_always_free_shipping, products_virtual
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
				$weight_quantity_sizes_array[] = ['id' => $products_id, 'weight' => $ind_product_weight, 'qty' => $_SESSION['cart']->contents[$products_id]['qty'], 'length' => $product->fields['products_length'], 'width' => $product->fields['products_width'], 'height' => $product->fields['products_height'], 'girth' => $product->fields['products_length']+$product->fields['products_width']+$product->fields['products_height'], 'vol' => $product->fields['products_length']*$product->fields['products_width']*$product->fields['products_height']];
            }
        }
		$col_weight = array_column($weight_quantity_sizes_array, 'weight');
		array_multisort($col_weight, SORT_DESC, $weight_quantity_sizes_array); // ordered by descending weight
		return $weight_quantity_sizes_array;
    }

    /**
     * Legacy package calculation
     * Rudimentarily takes the sum of all weights and then divides into number of boxes required based on admin-configured max weight per box.
     * Includes adding tare/padding percentage based on box size.
     * DOES NOT TAKE PACKAGE DIMENSIONS INTO ACCOUNT.
     */
    public function calculate_boxes_weight_and_tare()
    {
        global $total_weight, $shipping_weight, $shipping_quoted, $shipping_num_boxes, $box_array, $total_boxes_weight, $max_shipping_weight, $weight_array, $sizes_array, $max_item_length, $multiboxes;

        $this->abort_legacy_calculations = false;
        $this->notify('NOTIFY_SHIPPING_MODULE_PRE_CALCULATE_BOXES_AND_TARE', [], $total_weight, $shipping_weight, $shipping_quoted, $shipping_num_boxes);
        if ($this->abort_legacy_calculations) {
            return;
        }

		if (empty($multiboxes)) {$multiboxes = 'None';}
        if (!empty($this->modules)) {
            $shipping_quoted = '';
            $shipping_num_boxes = 1;
            $shipping_weight = $total_weight;

            $za_tare_array = preg_split("/[:,]/", str_replace(' ', '', !empty(SHIPPING_BOX_WEIGHT) ? SHIPPING_BOX_WEIGHT : '0:0'));
            $zc_tare_percent = (float)$za_tare_array[0];
            $zc_tare_weight = (float)$za_tare_array[1];

            $za_large_array = preg_split("/[:,]/", str_replace(' ', '', !empty(SHIPPING_BOX_PADDING) ? SHIPPING_BOX_PADDING : '0:0'));
            $zc_large_percent = (float)$za_large_array[0];
            $zc_large_weight = (float)$za_large_array[1];

            // SHIPPING_BOX_WEIGHT = tare
            // SHIPPING_BOX_PADDING = Large Box % increase
            // SHIPPING_MAX_WEIGHT = Largest package

			if (empty($max_shipping_weight) or $max_shipping_weight >= SHIPPING_MAX_WEIGHT) {
				$max_shipping_weight = SHIPPING_MAX_WEIGHT;
			}

            switch (true) {
                // large box add padding
                case ($max_shipping_weight <= $shipping_weight):
                    $shipping_weight = $shipping_weight + ($shipping_weight * ($zc_large_percent / 100)) + $zc_large_weight;
                    break;

                default:
                    // add tare weight < large
                    $shipping_weight = $shipping_weight + ($shipping_weight * ($zc_tare_percent / 100)) + $zc_tare_weight;
                    break;
            }

            // total weight with Tare
            $_SESSION['shipping_weight'] = $shipping_weight;
			$total_boxes_weight = 0;
            if ($shipping_weight > $max_shipping_weight and $multiboxes == 'Weight') { // Split into many boxes
				$ItemNumber = count($weight_array);
				$box_array[] = array('box_weight' => '0', 'box_items' => '0', 'items_ref' => array());
				$max_weight_tare = round(($max_shipping_weight - $zc_large_weight) / (1 + ($zc_large_percent/100)), 2); // compensate for box tare
				// algorithm to calculate number of boxes : Add each item weight starting with bigger ones until max weight is reached, then add next item to new box, then go to next smaller item and try to add it, and do this loop until end of array.
				for ($k=0; $k < $ItemNumber; $k++) {
					if ($weight_array[$k][1] > $max_weight_tare) {
						// Echo 'Some item is too heavy (' . $weight_array[$k][1] . ' Kg) to ship ! Max weight limit is ' . $max_weight_tare . " Kg.\n";
						break;
					}
					$qty_per_box =0;
					for ($i=0; $i < $weight_array[$k][2]; $i++) {
					for ($j=0; $j < $shipping_num_boxes; $j++) {
						if (($box_array[$j]['box_weight'] + $weight_array[$k][1]) <= $max_weight_tare) {
							$box_array[$j]['box_weight'] += $weight_array[$k][1];
							$box_array[$j]['box_items'] += 1;
							$qty_per_box++;
							if ($qty_per_box == 1) {
								$box_array[$j]['items_ref'][] = array('ref' => $weight_array[$k][0], 'qty' => $qty_per_box);
							} else {
								$box_array[$j]['items_ref']['qty'] = $qty_per_box;
							}
							break;
						} elseif ($j == $shipping_num_boxes-1 and $box_array[0]['box_weight'] != 0) {
							$shipping_num_boxes++;
							$box_array[$j+1] = array('box_weight' => '0', 'box_items' => '0', 'items_ref' => array());
							$qty_per_box =0;
						}
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
                $shipping_weight = ceil($shipping_weight*100/$shipping_num_boxes)/100;
            } else {
				$tot_items = 0;
				$item_ref = array();
				foreach ($weight_array as $key => $value) {
					$tot_items += $value[2];
					$item_ref[] = array('ref' => $value[0], 'qty' => $value[2]);
				}
				$box_array[] = array('box_weight' => $shipping_weight, 'box_items' => $tot_items , 'items_ref' => $item_ref);
			}
        }
        $this->notify('NOTIFY_SHIPPING_MODULE_CALCULATE_BOXES_AND_TARE', [], $total_weight, $shipping_weight, $shipping_quoted, $shipping_num_boxes, $box_array, $total_boxes_weight, $max_shipping_weight);
		return $box_array;
    }

    /**
     * Cycle through all enabled shipping modules and prepare quotes for all methods supported by those modules
     *
     * @param $method - If specified, limit to re-quoting the specified method
     * @param $module - If specified, limit to re-quoting for the specified module
     * @param $calc_boxes_weight_tare - Do box/tare calculations?
     * @param $insurance_exclusions - Pass rules for excluding from insurance calculations; requires customization.
     * @return array
     */
    public function quote($method = '', $module = '', $calc_boxes_weight_tare = true, $insurance_exclusions = []): array
    {
        global $shipping_weight, $uninsurable_value, $max_shipping_weight, $shipping_num_boxes, $weight_array, $box_array, $box_sizes_array, $multiboxes, $max_items, $max_size_array;
        $quotes_array = [];
		
		// Stop calculations if one item is over weight limit set in admin
		$heaviest_item = $weight_array[0][1];
		if ($heaviest_item and $heaviest_item >= SHIPPING_MAX_WEIGHT) {
		return $quotes_array;
		}

		$shipping_num_boxes = 1;
        // calculate amount not to be insured on shipping
        $uninsurable_value = (method_exists($this, 'get_uninsurable_value')) ? $this->get_uninsurable_value($insurance_exclusions) : 0;

        if (!empty($this->modules)) {
            $modules_to_quote = [];

            foreach ($this->modules as $value) {
                $class = pathinfo($value, PATHINFO_FILENAME);
                if (!empty($module)) {
                    if ($module === $class && isset($GLOBALS[$class]) && $GLOBALS[$class]->enabled) {
                        $modules_to_quote[] = $class;
                    }
                } elseif (isset($GLOBALS[$class]) && $GLOBALS[$class]->enabled) {
                    $modules_to_quote[] = $class;
                }
            }

            foreach ($modules_to_quote as $quoting_module) {
                if (method_exists($GLOBALS[$quoting_module], 'update_status')) {
                    $GLOBALS[$quoting_module]->update_status();
                }
                if (false === $GLOBALS[$quoting_module]->enabled) {
                    continue;
                }
				if (!empty($GLOBALS[$quoting_module]->quote($module)['id']) && defined('MODULE_SHIPPING_' . strtoupper($GLOBALS[$quoting_module]->quote($module)['id']) . '_MAX_WEIGHT')) { // check if a max weight constant is defined for this module
					$max_shipping_weight = constant("MODULE_SHIPPING_" . strtoupper($GLOBALS[$quoting_module]->quote($module)['id']) . "_MAX_WEIGHT");
				} else {
					$max_shipping_weight = NULL;
				}
				if (!empty($GLOBALS[$quoting_module]->quote($module)['id']) && defined('MODULE_SHIPPING_' . strtoupper($GLOBALS[$quoting_module]->quote($module)['id']) . '_MAX_LENGTH')) { // check if a max length constant is defined for this module
					$max_length = constant("MODULE_SHIPPING_" . strtoupper($GLOBALS[$quoting_module]->quote($module)['id']) . "_MAX_LENGTH");
				} else {
					$max_length = NULL;
				}
				if (!empty($GLOBALS[$quoting_module]->quote($module)['id']) && defined('MODULE_SHIPPING_' . strtoupper($GLOBALS[$quoting_module]->quote($module)['id']) . '_MAX_WIDTH')) { // check if a max width constant is defined for this module
					$max_width = constant("MODULE_SHIPPING_" . strtoupper($GLOBALS[$quoting_module]->quote($module)['id']) . "_MAX_WIDTH");
				} else {
					$max_width = NULL;
				}
				if (!empty($GLOBALS[$quoting_module]->quote($module)['id']) && defined('MODULE_SHIPPING_' . strtoupper($GLOBALS[$quoting_module]->quote($module)['id']) . '_MAX_HEIGHT')) { // check if a max height constant is defined for this module
					$max_height = constant("MODULE_SHIPPING_" . strtoupper($GLOBALS[$quoting_module]->quote($module)['id']) . "_MAX_HEIGHT");
				} else {
					$max_height = NULL;
				}
				if (!empty($GLOBALS[$quoting_module]->quote($module)['id']) && defined('MODULE_SHIPPING_' . strtoupper($GLOBALS[$quoting_module]->quote($module)['id']) . '_MAX_GIRTH')) { // check if a max girth constant is defined for this module
					$max_girth = constant("MODULE_SHIPPING_" . strtoupper($GLOBALS[$quoting_module]->quote($module)['id']) . "_MAX_GIRTH");
				} else {
					$max_girth = NULL;
				}
				if (!empty($max_length) && !empty($max_width) && !empty($max_height) && !empty($max_girth)) {
					$max_size_array = array('Max_length' => $max_length, 'Max_width' => $max_width, 'Max_height' => $max_height, 'Max_girth' => $max_girth);
				} else {
					$max_size_array = array();
				}
				if (!empty($GLOBALS[$quoting_module]->quote($module)['id']) && defined('MODULE_SHIPPING_' . strtoupper($GLOBALS[$quoting_module]->quote($module)['id']) . '_MULTIBOX')) { // check if a MULTIBOX constant is defined for this module
					$multiboxes = constant("MODULE_SHIPPING_" . strtoupper($GLOBALS[$quoting_module]->quote($module)['id']) . "_MULTIBOX");
					if ((count($max_size_array) > 0) && $multiboxes != 'None') {
						if ($max_items[0] >= $max_size_array['Max_length'] || $max_items[1] >= $max_size_array['Max_width'] || $max_items[2] >= $max_size_array['Max_height'] || $max_items[3] >= $max_size_array['Max_girth']) {
							continue;
						}
					}
				} else {
					$multiboxes = 'None';
				}
				$box_array = array();
				$this->calculate_boxes_weight_and_tare(); // calculates boxes number and their weight with tare and put results in $box_array
				$this->get_box_size(); // calculates boxes dimensions
                $save_shipping_weight = $shipping_weight;
                $quotes = $GLOBALS[$quoting_module]->quote($method);
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

    /**
     * Determine cheapest-available shipping method.
     * Excludes store-pickup unless store-pickup is the only option
     */
    public function cheapest(): array|bool
    {
        if (empty($this->modules)) {
            return false;
        }

        $rates = [];
        $exclude_storepickup_module = false;
        foreach ($this->modules as $value) {
            $class = pathinfo($value, PATHINFO_FILENAME);
            if (isset($GLOBALS[$class]) && is_object($GLOBALS[$class]) && $GLOBALS[$class]->enabled) {
                $quotes = $GLOBALS[$class]->quotes ?? null;
                if (empty($quotes['methods']) || isset($quotes['error'])) {
                    continue;
                }

                foreach ($quotes['methods'] as $method) {
                    if (isset($method['cost'])) {
                        $rates[] = [
                            'id' => $quotes['id'] . '_' . $method['id'],
                            'title' => $quotes['module'] . ' (' . $method['title'] . ')',
                            'cost' => $method['cost'],
                            'module' => $quotes['id'],
                        ];

                        if ($quotes['id'] !== 'storepickup') {
                            $exclude_storepickup_module = true;
                        }
                    }
                }
            }
        }

        $cheapest = false;
        foreach ($rates as $rate) {
            if ($cheapest !== false) {
                // never quote storepickup as lowest, unless it's the only active module - needs to be configured in shipping module
                if ($rate['cost'] < $cheapest['cost']) {
                    if ($exclude_storepickup_module === true && $rate['module'] === 'storepickup') {
                        continue;
                    }

                    // -----
                    // Give a customized shipping module the opportunity to exclude itself from being quoted as the cheapest.
                    // The observer must set the $exclude_from_cheapest to (bool)true to be excluded.
                    //
                    $exclude_from_cheapest = false;
                    $this->notify('NOTIFY_SHIPPING_EXCLUDE_FROM_CHEAPEST', $rate['module'], $exclude_from_cheapest);
                    if ($exclude_from_cheapest === true) {
                        continue;
                    }
                    $cheapest = $rate;
                }
            } elseif ($exclude_storepickup_module === false || $rate['module'] !== 'storepickup') {
                $cheapest = $rate;
            }
        }
        $this->notify('NOTIFY_SHIPPING_MODULE_CALCULATE_CHEAPEST', $cheapest, $cheapest, $rates);
        return $cheapest;
    }
}

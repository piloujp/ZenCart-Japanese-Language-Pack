<?php
class zcObserverLetterpacklite extends base
{
    public function __construct()
    {
        global $current_page_base;
        $this->attach(
            $this,
            [
                'NOTIFY_SHIPPING_LETTERPACKLITE_UPDATE_STATUS',
            ]
        );
    }

    protected function update(&$class, $eventID, $not_used, &$enabled)
    {
        $cat_list = (!empty(MODULE_SHIPPING_LETTERPACKLITE_CAT_LIST)) ? explode(',', MODULE_SHIPPING_LETTERPACKLITE_CAT_LIST) : [-1];
        $prod_list = (!empty(MODULE_SHIPPING_LETTERPACKLITE_PROD_LIST)) ? explode(',', MODULE_SHIPPING_LETTERPACKLITE_PROD_LIST) : [-1];
        if (!empty($cat_list) && !empty($prod_list)) {
            $products = $_SESSION['cart']->get_products();
            switch (true) {
                case MODULE_SHIPPING_LETTERPACKLITE_CATEGORIES === 'Disable' && MODULE_SHIPPING_LETTERPACKLITE_PRODUCTS === 'Disable':
                    foreach($products as $product) {
                        if (in_array($product["category"], $cat_list) || in_array($product['id'], $prod_list)) {
                            $enabled = false;
                            return;
                        }
                    }
                    break;
                case MODULE_SHIPPING_LETTERPACKLITE_CATEGORIES === 'Disable' && MODULE_SHIPPING_LETTERPACKLITE_PRODUCTS === 'Enable':
                    foreach($products as $product) {
                        if (in_array($product["category"], $cat_list) && !in_array($product['id'], $prod_list)) {
                            $enabled = false;
                            return;
                        }
                    }
                    break;
                case MODULE_SHIPPING_LETTERPACKLITE_CATEGORIES === 'Enable' && MODULE_SHIPPING_LETTERPACKLITE_PRODUCTS === 'Disable':
                    foreach($products as $product) {
                        if (!in_array($product["category"], $cat_list) || in_array($product['id'], $prod_list)) {
                            $enabled = false;
                            return;
                        }
                    }
                    break;
                case MODULE_SHIPPING_LETTERPACKLITE_CATEGORIES === 'Enable' && MODULE_SHIPPING_LETTERPACKLITE_PRODUCTS === 'Enable':
                    foreach($products as $product) {
                        if (!in_array($product["category"], $cat_list) && !in_array($product['id'], $prod_list)) {
                            $enabled = false;
                            return;
                        }
                    }
                    break;
            }
        }
    }
}
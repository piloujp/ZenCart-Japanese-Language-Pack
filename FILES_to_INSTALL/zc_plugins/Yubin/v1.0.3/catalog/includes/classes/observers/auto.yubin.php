<?php
class zcObserverYubin extends base
{
    public function __construct()
    {
        $this->attach(
            $this,
            [
                'NOTIFY_SHIPPING_JPPARCELAIR_UPDATE_STATUS',
                'NOTIFY_SHIPPING_JPPARCELEMS_UPDATE_STATUS',
                'NOTIFY_SHIPPING_JPPARCELSEA_UPDATE_STATUS',
                'NOTIFY_SHIPPING_LETTERPACKLITE_UPDATE_STATUS',
                'NOTIFY_SHIPPING_LETTERPACKPLUS_UPDATE_STATUS',
                'NOTIFY_SHIPPING_YUPACK_UPDATE_STATUS',
                'NOTIFY_SHIPPING_YUPACKCHILLED_UPDATE_STATUS',
            ]
        );
    }

    protected function update(&$class, string $eventID, array $not_used, bool &$enabled): void
    {
        $cat_list_constant = constant('MODULE_SHIPPING_' . strtoupper($class->code) . '_CAT_LIST');
        $prod_list_constant = constant('MODULE_SHIPPING_' . strtoupper($class->code) . '_PROD_LIST');
        $cat_constant = constant('MODULE_SHIPPING_' . strtoupper($class->code) . '_CATEGORIES');
        $prod_constant = constant('MODULE_SHIPPING_' . strtoupper($class->code) . '_PRODUCTS');
        
        $cat_list = (!empty($cat_list_constant)) ? explode(',', $cat_list_constant) : [-1];
        $prod_list = (!empty($prod_list_constant)) ? explode(',', $prod_list_constant) : [-1];
        if (!empty($cat_list) && !empty($prod_list)) {
            $products = $_SESSION['cart']->get_products();
            switch (true) {
                case $cat_constant === 'Disable' && $prod_constant === 'Disable':
                    foreach($products as $product) {
                        if (in_array($product["category"], $cat_list) || in_array($product['id'], $prod_list)) {
                            $enabled = false;
                            return;
                        }
                    }
                    break;
                case $cat_constant === 'Disable' && $prod_constant === 'Enable':
                    foreach($products as $product) {
                        if (in_array($product["category"], $cat_list) && !in_array($product['id'], $prod_list)) {
                            $enabled = false;
                            return;
                        }
                    }
                    break;
                case $cat_constant === 'Enable' && $prod_constant === 'Disable':
                    foreach($products as $product) {
                        if (!in_array($product["category"], $cat_list) || in_array($product['id'], $prod_list)) {
                            $enabled = false;
                            return;
                        }
                    }
                    break;
                case $cat_constant === 'Enable' && $prod_constant === 'Enable':
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
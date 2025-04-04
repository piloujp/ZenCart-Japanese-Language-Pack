<?php
class zcObserverJpparcelems extends base
{
    public function __construct()
    {
        global $current_page_base;
        $this->attach(
            $this,
            [
                'NOTIFY_SHIPPING_JPPARCELEMS_UPDATE_STATUS',
            ]
        );
    }

    protected function update(&$class, $eventID, $not_used, &$enabled)
    {
/*        $products = $_SESSION['cart']->get_products();
        foreach($products as $product) {
            // disable for some categorie ids ($product['category']) or product ids ($product['id'])
            if ($product['category'] == 44 || $product['category'] == 56 || $product['id'] == 27) {
                $enabled = false;
                return;
            }
        }*/
    }
}
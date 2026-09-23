<?php
// -----
// Part of the "Customer Loyalty Discount", a Zen Cart order-total module.
//
// Last updated: v3.0.0 (renamed from ot_loyalty_discount.php)
//
$define = [
    'MODULE_LOYALTY_DISCOUNT_TITLE' => '継続利用割引',
    'MODULE_LOYALTY_DISCOUNT_DESCRIPTION' => '顧客ロイヤリティ割引',

    // -----
    // %1$s is replaced by the discount percentage.
    // %2$s is *conditionally* replaced by MODULE_LOYALTY_DISCOUNT_SHIPPING_TEXT or MODULE_LOYALTY_DISCOUNT_SHIPPING_WITH_TAX_TEXT, based on configuration
    // %3$s is *conditionally* replaced by MODULE_LOYALTY_DISCOUNT_TAX_TEXT, based on configuration
    //
    'MODULE_LOYALTY_DISCOUNT_INFO' => 'これまでのご利用実績に基づき、今回の注文は商品代金%2$s%3$s %1$s 割引となります。',
        'MODULE_LOYALTY_DISCOUNT_SHIPPING_TEXT' => 'および送料の',
        'MODULE_LOYALTY_DISCOUNT_SHIPPING_WITH_TAX_TEXT' => '、送料',
        'MODULE_LOYALTY_DISCOUNT_TAX_TEXT' => '、および関連する税金に対して',
// bof constant configuration titles and descriptions for order total module ot_loyalty_discount
    'CFGTITLE_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_STATUS' => '割引を有効にしますか？',
    'CFGDESC_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_STATUS' => 'ロイヤリティ割引を有効にしますか？',
    'CFGTITLE_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_SORT_ORDER' => '表示順',
    'CFGDESC_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_SORT_ORDER' => '表示の並び順。',
    'CFGTITLE_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_INC_SHIPPING' => '送料は含めますか？',
    'CFGDESC_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_INC_SHIPPING' => '注文の送料を割引の計算に含めるべきでしょうか？',
    'CFGTITLE_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_INC_TAX' => '税金を含めますか？',
    'CFGDESC_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_INC_TAX' => '注文の税金、商品、および（任意で）送料を、割引の計算に含めるべきでしょうか？',
    'CFGTITLE_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_CALC_TAX' => '税額を再計算しますか？',
    'CFGDESC_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_CALC_TAX' => '割引後の金額に基づいて、注文の税額を再計算します。<b>注：</b> この設定は、割引を注文の税額にも適用するよう指定している場合にのみ使用されます。',
    'CFGTITLE_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_CUMORDER_PERIOD' => '累計注文期間',
    'CFGDESC_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_CUMORDER_PERIOD' => '累積注文合計を計算する期間を設定します。',
    'CFGTITLE_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_TABLE' => '割引率',
    'CFGDESC_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_TABLE' => '上記で設定した期間における、累積注文合計額のしきい値と割引率を設定します。<br><br>デフォルト値（<code>1000:5,1500:7.5,2000:10</code>）では、顧客に対して以下の割引が適用されます。<ol><li>合計額が1000を超えると5%の割引。</li><li>合計額が1500を超えると7.5%の割引。</li><li>合計額が2000を超えると10%の割引。</li></ol>',
    'CFGTITLE_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_ORDER_STATUS' => '対象となる注文のステータス',
    'CFGDESC_MODULE_ORDER_TOTAL_LOYALTY_DISCOUNT_ORDER_STATUS' => '割引率を決定するために使用される累積注文合計の一部となる、以前に発注された注文の注文ステータス ID を特定します。<ol><li>エントリが空の場合、以前に発注された<b>すべて</b>の注文が合計されます。</li><li>エントリが<em>単一</em>の ID の場合、その値以上の注文ステータスを持つ注文は含まれません。</li><li>それ以外の場合、エントリは注文ステータス ID のカンマ区切りリストと、 そのリストに<em>現在の</em>注文ステータスを持つ注文が含まれます。</li></ol>',
// eof constant configuration titles and descriptions for order total module ot_loyalty_discount
];
return $define;

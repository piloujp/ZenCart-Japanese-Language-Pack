<?php
$define = [
    'MODULE_SHIPPING_TABLE_TEXT_TITLE' => '配送料金表方式',
    'MODULE_SHIPPING_TABLE_TEXT_DESCRIPTION' => '配送料金表方式',
    'MODULE_SHIPPING_TABLE_TEXT_WAY' => '最良の方法',
    // bof constant configuration titles and descriptions for table shipping
    'CFGTITLE_MODULE_SHIPPING_TABLE_STATUS' => '配送料金表方式の送料を有効にする',
    'CFGDESC_MODULE_SHIPPING_TABLE_STATUS' => '配送料金表方式の送料を提供しますか？',
    'CFGTITLE_MODULE_SHIPPING_TABLE_COST' => '配送料金表',
    'CFGDESC_MODULE_SHIPPING_TABLE_COST' => '送料は、商品の合計金額または重量、または商品の個数に基づいて決まります。例：25:850,50:550 など。２５個までは８５０、２５個から５０個までは５５０などです。<br>25:850,35:5%,40:950,10000:7%などのパーセンテージ金額を使用して、注文合計のパーセンテージ値を請求することもできます。',
    'CFGTITLE_MODULE_SHIPPING_TABLE_MODE' => '送料計算方法',
    'CFGDESC_MODULE_SHIPPING_TABLE_MODE' => '配送料は、注文した商品の合計重量、注文した商品の合計価格、または注文した商品の合計数に基づいて計算されます。',
    'CFGTITLE_MODULE_SHIPPING_TABLE_HANDLING' => '手数料',
    'CFGDESC_MODULE_SHIPPING_TABLE_HANDLING' => 'この配送方法の手数料。',
    'CFGTITLE_MODULE_SHIPPING_TABLE_HANDLING_METHOD' => '手数料は注文ごとまたは箱ごとにかかります',
    'CFGDESC_MODULE_SHIPPING_TABLE_HANDLING_METHOD' => '手数料は注文ごとに請求しますか、それとも箱ごとに請求しますか？',
    'CFGTITLE_MODULE_SHIPPING_TABLE_TAX_CLASS' => '税種別',
    'CFGDESC_MODULE_SHIPPING_TABLE_TAX_CLASS' => '配送料金に適用される税種別を選んでください。',
    'CFGTITLE_MODULE_SHIPPING_TABLE_TAX_BASIS' => '税金計算基準',
    'CFGDESC_MODULE_SHIPPING_TABLE_TAX_BASIS' => '配送税はどのような基準で計算されますか？オプションは次のとおりです：<br>配送（Shipping） - 顧客の配送先住所に基づ。く<br>請求（Billing） - 顧客の請求先住所に基づきます。<br>ストア（Store） - 請求/配送ゾーンがストア ゾーンと等しい場合は、ストアの住所に基づきます。',
    'CFGTITLE_MODULE_SHIPPING_TABLE_ZONE' => '配送地域',
    'CFGDESC_MODULE_SHIPPING_TABLE_ZONE' => '配送地域を選択すると選択された地域のみで利用可能となります。',
    'CFGTITLE_MODULE_SHIPPING_TABLE_SORT_ORDER' => '表示の整列順',
    'CFGDESC_MODULE_SHIPPING_TABLE_SORT_ORDER' => '表示の整列順を設定できます。数字が小さいほど上位に表示されます。',
    // eof constant configuration titles and descriptions for table shipping
];

return $define;
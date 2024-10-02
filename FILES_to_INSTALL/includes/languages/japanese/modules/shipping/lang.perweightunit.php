<?php
$define = [
    'MODULE_SHIPPING_PERWEIGHTUNIT_TEXT_TITLE' => '重量単位',
    'MODULE_SHIPPING_PERWEIGHTUNIT_TEXT_DESCRIPTION' => '重量単位',
    'MODULE_SHIPPING_PERWEIGHTUNIT_TEXT_WAY' => '最良の方法',
    // bof constant configuration titles and descriptions for perweightunit shipping
    'CFGTITLE_MODULE_SHIPPING_PERWEIGHTUNIT_STATUS' => '重量単位の送料を有効にする',
    'CFGDESC_MODULE_SHIPPING_PERWEIGHTUNIT_STATUS' => '重量単位の送料を提供しますか？<br><br>製品数量 * 単位（商品重量） * 単位あたりのコスト',
    'CFGTITLE_MODULE_SHIPPING_PERWEIGHTUNIT_COST' => '１ユニットあたりの配送料',
    'CFGDESC_MODULE_SHIPPING_PERWEIGHTUNIT_COST' => '注意：この配送モジュールを使用する場合は、「配送/梱包」の風袋設定を確認し、最大重量を価格に対応できる高さに設定してから、小型パッケージと大型パッケージの設定を調整して、価格も追加するようにしてください。<br><br>この配送方法を使用する注文では、配送料は「商品数量 * 単位（商品重量） * 単位あたりのコスト」に基づいて決定されます。',
    'CFGTITLE_MODULE_SHIPPING_PERWEIGHTUNIT_HANDLING' => '手数料',
    'CFGDESC_MODULE_SHIPPING_PERWEIGHTUNIT_HANDLING' => 'この配送方法の手数料。',
    'CFGTITLE_MODULE_SHIPPING_PERWEIGHTUNIT_HANDLING_METHOD' => '手数料は注文ごとまたは箱ごとにかかります',
    'CFGDESC_MODULE_SHIPPING_PERWEIGHTUNIT_HANDLING_METHOD' => '手数料は注文ごとに請求しますか、それとも箱ごとに請求しますか？',
    'CFGTITLE_MODULE_SHIPPING_PERWEIGHTUNIT_TAX_CLASS' => '税種別',
    'CFGDESC_MODULE_SHIPPING_PERWEIGHTUNIT_TAX_CLASS' => '配送料金に適用される税種別を選んでください。',
    'CFGTITLE_MODULE_SHIPPING_PERWEIGHTUNIT_TAX_BASIS' => '税金計算基準',
    'CFGDESC_MODULE_SHIPPING_PERWEIGHTUNIT_TAX_BASIS' => '配送税はどのような基準で計算されますか？オプションは次のとおりです：<br>配送（Shipping） - 顧客の配送先住所に基づ。く<br>請求（Billing） - 顧客の請求先住所に基づきます。<br>ストア（Store） - 請求/配送ゾーンがストア ゾーンと等しい場合は、ストアの住所に基づきます。',
    'CFGTITLE_MODULE_SHIPPING_PERWEIGHTUNIT_ZONE' => '配送地域',
    'CFGDESC_MODULE_SHIPPING_PERWEIGHTUNIT_ZONE' => '配送地域を選択すると選択された地域のみで利用可能となります。',
    'CFGTITLE_MODULE_SHIPPING_PERWEIGHTUNIT_SORT_ORDER' => '表示の整列順',
    'CFGDESC_MODULE_SHIPPING_PERWEIGHTUNIT_SORT_ORDER' => '表示の整列順を設定できます。数字が小さいほど上位に表示されます。',
    // eof constant configuration titles and descriptions for perweightunit shipping
];

return $define;

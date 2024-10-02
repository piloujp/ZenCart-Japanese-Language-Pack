<?php
$define = [
    'MODULE_SHIPPING_FREEOPTIONS_TEXT_TITLE' => '配送料無料オプション',
    'MODULE_SHIPPING_FREEOPTIONS_TEXT_DESCRIPTION' => '
無料オプションは他の配送モジュールが表示されている時に配送料無料オプションを表示するために使用します。
常に表示、注文合計金額、注文重量または注文点数を基準に設定できます。
この無料オプションモジュールは配送料無料が表示されているときは見えません。<br /><br />
合計を>= 0.00 and <= 0.00に設定すると配送料無料以外の全てのモジュールに有効になります。<br /><br />
注意: 合計、重量、点数の全ての設定を空欄にするとこのモジュールを無効になります。<br /><br />
注意: 配送料無料オプションは重量０で無料に設定されていると表示されません。配送料無料モジュールを参照してください',
    'MODULE_SHIPPING_FREEOPTIONS_TEXT_WAY' => '配送料無料',
    // bof constant configuration titles and descriptions for freeoptions shipping
    'CFGTITLE_MODULE_SHIPPING_FREEOPTIONS_STATUS' => '配送料無料オプションを有効にする',
    'CFGDESC_MODULE_SHIPPING_FREEOPTIONS_STATUS' => '配送料無料オプションは、他の配送モジュールが表示されているときに無料配送オプションを表示するために使用されます。それは以下に基づきます：「常に表示」、「注文合計」、「注文重量」、または「注文商品数」。「無料配送業者」が表示されているときは、配送料無料オプションモジュールは表示されません。<br><br>合計を >= 0.00 かつ <= 何もない （空白のまま）に設定すると、このモジュールがアクティブになり、無料配送 - freeshipper を除くすべての配送モジュールが表示されます。<br><br>注意：合計、重量、アイテム数のすべての設定を空白のままにすると、このモジュールは非アクティブになります。<br><br>注意：送料無料オプションは、「重量 0 は送料無料」に基づいて送料無料が使用されている場合は表示されません。参照：freeshipper<br><br>「配送料無料オプション」の料金で配送を提供しますか？',
    'CFGTITLE_MODULE_SHIPPING_FREEOPTIONS_COST' => '送料',
    'CFGDESC_MODULE_SHIPPING_FREEOPTIONS_COST' => '送料は￥０になります。',
    'CFGTITLE_MODULE_SHIPPING_FREEOPTIONS_HANDLING' => '手数料',
    'CFGDESC_MODULE_SHIPPING_FREEOPTIONS_HANDLING' => 'この配送方法の手数料。',
    'CFGTITLE_MODULE_SHIPPING_FREEOPTIONS_TOTAL_MIN' => '合計 >=',
    'CFGDESC_MODULE_SHIPPING_FREEOPTIONS_TOTAL_MIN' => '合計金額以上の場合、送料無料：',
    'CFGTITLE_MODULE_SHIPPING_FREEOPTIONS_TOTAL_MAX' => '合計 <=',
    'CFGDESC_MODULE_SHIPPING_FREEOPTIONS_TOTAL_MAX' => '合計金額が以下の金額以下の場合、送料無料となります：',
    'CFGTITLE_MODULE_SHIPPING_FREEOPTIONS_WEIGHT_MIN' => '重量 >=',
    'CFGDESC_MODULE_SHIPPING_FREEOPTIONS_WEIGHT_MIN' => '重量が次の値を超える場合、送料無料：',
    'CFGTITLE_MODULE_SHIPPING_FREEOPTIONS_WEIGHT_MAX' => '重量 <=',
    'CFGDESC_MODULE_SHIPPING_FREEOPTIONS_WEIGHT_MAX' => '重量が以下の場合、送料無料となります:',
    'CFGTITLE_MODULE_SHIPPING_FREEOPTIONS_ITEMS_MIN' => '商品数 >=',
    'CFGDESC_MODULE_SHIPPING_FREEOPTIONS_ITEMS_MIN' => '商品数が以下の数を超える場合、送料無料となります：',
    'CFGTITLE_MODULE_SHIPPING_FREEOPTIONS_ITEMS_MAX' => '商品数 <=',
    'CFGDESC_MODULE_SHIPPING_FREEOPTIONS_ITEMS_MAX' => '商品数が以下の数より少ない場合、送料無料となります：',
    'CFGTITLE_MODULE_SHIPPING_FREEOPTIONS_TAX_CLASS' => '税種別',
    'CFGDESC_MODULE_SHIPPING_FREEOPTIONS_TAX_CLASS' => '配送料金に適用される税種別を選んでください。',
    'CFGTITLE_MODULE_SHIPPING_FREEOPTIONS_TAX_BASIS' => '税金計算基準',
    'CFGDESC_MODULE_SHIPPING_FREEOPTIONS_TAX_BASIS' => '配送税はどのような基準で計算されますか？オプションは次のとおりです：<br>配送（Shipping） - 顧客の配送先住所に基づ。く<br>請求（Billing） - 顧客の請求先住所に基づきます。<br>ストア（Store） - 請求/配送ゾーンがストア ゾーンと等しい場合は、ストアの住所に基づきます。',
    'CFGTITLE_MODULE_SHIPPING_FREEOPTIONS_ZONE' => '配送地域',
    'CFGDESC_MODULE_SHIPPING_FREEOPTIONS_ZONE' => '配送地域を選択すると選択された地域のみで利用可能となります。',
    'CFGTITLE_MODULE_SHIPPING_FREEOPTIONS_SORT_ORDER' => '表示の整列順',
    'CFGDESC_MODULE_SHIPPING_FREEOPTIONS_SORT_ORDER' => '表示の整列順を設定できます。数字が小さいほど上位に表示されます。',
    // eof constant configuration titles and descriptions for freeoptions shipping
];

return $define;
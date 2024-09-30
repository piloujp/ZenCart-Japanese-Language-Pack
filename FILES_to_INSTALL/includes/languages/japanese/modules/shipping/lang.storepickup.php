<?php
$define = [
    'MODULE_SHIPPING_STOREPICKUP_TEXT_TITLE' => '店頭で受け取り',
    'MODULE_SHIPPING_STOREPICKUP_TEXT_DESCRIPTION' => '店頭で直接お受け取り。',
    'MODULE_SHIPPING_STOREPICKUP_TEXT_WAY' => 'ウォークイン',
    'MODULE_SHIPPING_STOREPICKUP_MULTIPLE_WAYS' => '',
//bof constant configuration titles and descriptions for storepickup Shipping
    'CFGTITLE_MODULE_SHIPPING_STOREPICKUP_STATUS' => 'ネコポス配送を有効にする',
    'CFGDESC_MODULE_SHIPPING_STOREPICKUP_STATUS' => 'ネコポスで発送しますか？',
    'CFGTITLE_MODULE_SHIPPING_STOREPICKUP_LOCATIONS_LIST' => '受け取り場所',
    'CFGDESC_MODULE_SHIPPING_STOREPICKUP_LOCATIONS_LIST' => '場所のリストをセミコロン（；）で区切って入力します。<br>必要に応じて、コンマと金額を追加して、場所ごとに手数料/追加料金を指定できます。金額が指定されていない場合は、次の設定の一般的な送料の金額が適用されます。<br><br>例:<br>本社;新宿店;渋谷店;千代田店;港店;<br>中野店,100;豊島店,100;文京店,100;中央店,100<br>太田店,300;葛飾店,400<br>多言語での使用については、このモジュールの言語ファイルの define-設定を参照してください。',
    'CFGTITLE_MODULE_SHIPPING_STOREPICKUP_COST' => '送料',
    'CFGDESC_MODULE_SHIPPING_STOREPICKUP_COST' => 'この配送方法を使用するすべての注文の配送料。',
    'CFGTITLE_MODULE_SHIPPING_STOREPICKUP_TAX_CLASS' => '税種別',
    'CFGDESC_MODULE_SHIPPING_STOREPICKUP_TAX_CLASS' => '配送料金に適用される税種別を選んでください。',
    'CFGTITLE_MODULE_SHIPPING_STOREPICKUP_TAX_BASIS' => '課税標準',
    'CFGDESC_MODULE_SHIPPING_STOREPICKUP_TAX_BASIS' => '配送料はどのような基準で計算されますか。オプションは：<br>配送 - 顧客の配送先住所に基づく<br>請求 - 顧客に基づく 請求先住所<br>ストア - 請求/配送ゾーンがストア ゾーンと等しい場合、ストアの住所に基づく。',
    'CFGTITLE_MODULE_SHIPPING_STOREPICKUP_ZONE' => '配送地域',
    'CFGDESC_MODULE_SHIPPING_STOREPICKUP_ZONE' => '配送地域を選択すると選択された地域のみで利用可能となります。',
    'CFGTITLE_MODULE_SHIPPING_STOREPICKUP_SORT_ORDER' => '表示の整列順',
    'CFGDESC_MODULE_SHIPPING_STOREPICKUP_SORT_ORDER' => '表示の整列順を設定できます。数字が小さいほど上位に表示されます。',
//eof constant configuration titles and descriptions for storepickup Shipping
];

// MODULE_SHIPPING_STOREPICKUP_MULTIPLE_WAYS は、言語ごとに複数の場所/メソッドを定義するためのものです。 これは、買い物客がストアのデフォルト以外の言語を選択した場合にのみ使用されます。
// MODULE_SHIPPING_STOREPICKUP_MULTIPLE_WAYS 定義の内容は、名前が変更されているだけで、管理者の配送モジュールの設定にある複数の場所と同じである必要があります。
// 一般的な形式は次のとおりです:
// "Location One, 5.00; Location Two, 3.50; Location Three, 0.00"
// "Location One, Location Two, Location Three"
// または、言語に関係なく、単に管理者で定義されているのと同じテキストを使用する場合は空白のままにします。
// ヒント: デフォルト言語の場合は、これを空白のままにしておく必要があります。そうしないと、「管理者設定」フィールドは使用されません。

return $define;

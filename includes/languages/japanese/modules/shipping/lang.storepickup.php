<?php
$define = [
    'MODULE_SHIPPING_STOREPICKUP_TEXT_TITLE' => '店頭で受け取り',
    'MODULE_SHIPPING_STOREPICKUP_TEXT_DESCRIPTION' => '店頭で直接お受け取り。',
    'MODULE_SHIPPING_STOREPICKUP_TEXT_WAY' => 'ウォークイン',
    'MODULE_SHIPPING_STOREPICKUP_MULTIPLE_WAYS' => '',
];

// MODULE_SHIPPING_STOREPICKUP_MULTIPLE_WAYS は、言語ごとに複数の場所/メソッドを定義するためのものです。 これは、買い物客がストアのデフォルト以外の言語を選択した場合にのみ使用されます。
// MODULE_SHIPPING_STOREPICKUP_MULTIPLE_WAYS 定義の内容は、名前が変更されているだけで、管理者の配送モジュールの設定にある複数の場所と同じである必要があります。
// 一般的な形式は次のとおりです:
// "Location One, 5.00; Location Two, 3.50; Location Three, 0.00"
// "Location One, Location Two, Location Three"
// または、言語に関係なく、単に管理者で定義されているのと同じテキストを使用する場合は空白のままにします。
// ヒント: デフォルト言語の場合は、これを空白のままにしておく必要があります。そうしないと、「管理者設定」フィールドは使用されません。

return $define;

<?php
$define = [
    'MODULE_PAYMENT_MONEYORDER_TEXT_TITLE' => '小切手／マネーオーダー',
    'MODULE_PAYMENT_MONEYORDER_TEXT_DESCRIPTION' => '顧客は支払いを郵送することができます。 注文確認メールでは、次のことを求められます。 <br><br>小切手またはマネーオーダーの支払い先は次のとおりです：<br>' . (defined('MODULE_PAYMENT_MONEYORDER_PAYTO') ? zen_config('MODULE_PAYMENT_MONEYORDER_PAYTO') : '<br>(あなたの店名)') . '<br><br>お支払いは次の宛先に郵送してください：<br>' . nl2br(zen_config('STORE_NAME_ADDRESS'), false) . '<br><br>' . 'ご注文は、支払いを受け取るまで発送されません。',
    'MODULE_PAYMENT_MONEYORDER_REMINDER' => '小切手または為替小切手の表面に、注文番号を必ずご記入ください。',
    'MODULE_PAYMENT_MONEYORDER_TEXT_MISSING_INFO' => '（未設定 - 支払い情報が必要です）',
    'MODULE_PAYMENT_MONEYORDER_TEXT_EMAIL_FOOTER' => '小切手または郵便為替の受取人は以下のとおりにしてください：' . "\n\n" . zen_config('MODULE_PAYMENT_MONEYORDER_PAYTO', '') . "\n\n" . 'お支払いは下記まで郵送してください：' . "\n" . zen_config('STORE_NAME_ADDRESS') . "\n\n" . 'お支払いの確認が取れ次第、ご注文商品を発送いたします。',
// bof constant configuration titles and descriptions for payment module moneyorder
    'CFGTITLE_MODULE_PAYMENT_MONEYORDER_STATUS' => '小切手／マネーオーダーを有効にする',
    'CFGDESC_MODULE_PAYMENT_MONEYORDER_STATUS' => '小切手／マネーオーダーを受け取りますか？',
    'CFGTITLE_MODULE_PAYMENT_MONEYORDER_PAYTO' => '支払先：',
    'CFGDESC_MODULE_PAYMENT_MONEYORDER_PAYTO' => '支払いの受取人は誰ですか？',
    'CFGTITLE_MODULE_PAYMENT_MONEYORDER_SORT_ORDER' => '表示順',
    'CFGDESC_MODULE_PAYMENT_MONEYORDER_SORT_ORDER' => '表示順を設定します。 最下位が最初に表示されます。',
    'CFGTITLE_MODULE_PAYMENT_MONEYORDER_ZONE' => '支払い地帯',
    'CFGDESC_MODULE_PAYMENT_MONEYORDER_ZONE' => '地帯が選択されている場合は、その地帯に対してのみこの支払い方法を有効にしてください。',
    'CFGTITLE_MODULE_PAYMENT_MONEYORDER_ORDER_STATUS_ID' => '注文ステータスの設定',
    'CFGDESC_MODULE_PAYMENT_MONEYORDER_ORDER_STATUS_ID' => 'この支払いモジュールで行われた注文のステータスを設定します。',
// eof constant configuration titles and descriptions for payment module moneyorder
];
return $define;

<?php
$define = [
    'MODULE_PAYMENT_MONEYORDER_TEXT_TITLE' => '小切手／マネーオーダー',
    'MODULE_PAYMENT_MONEYORDER_TEXT_DESCRIPTION' => '顧客は支払いを郵送することができます。 注文確認メールでは、次のことを求められます。 <br><br>小切手またはマネーオーダーの支払い先は次のとおりです：<br>' . (defined('MODULE_PAYMENT_MONEYORDER_PAYTO') ? MODULE_PAYMENT_MONEYORDER_PAYTO : '<br>(your store name)') . '<br><br>お支払いは次の宛先に郵送してください：<br>' . nl2br(STORE_NAME_ADDRESS) . '<br><br>' . 'ご注文は、支払いを受け取るまで発送されません。',
// bof constant configuration titles and descriptions for payment module moneyorder
    'CFGTITLE_MODULE_PAYMENT_MONEYORDER_STATUS' => '小切手／マネーオーダーを有効にする',
    'CFGDESC_MODULE_PAYMENT_MONEYORDER_STATUS' => '小切手／マネーオーダーを受け取りますか？',
    'CFGTITLE_MODULE_PAYMENT_MONEYORDER_ZONE' => '支払い地帯',
    'CFGDESC_MODULE_PAYMENT_MONEYORDER_ZONE' => '地帯が選択されている場合は、その地帯に対してのみこの支払い方法を有効にしてください。',
    'CFGTITLE_MODULE_PAYMENT_MONEYORDER_ORDER_STATUS_ID' => '注文ステータスの設定',
    'CFGDESC_MODULE_PAYMENT_MONEYORDER_ORDER_STATUS_ID' => 'この支払いモジュールで行われた注文のステータスを設定します。',
    'CFGTITLE_MODULE_PAYMENT_MONEYORDER_SORT_ORDER' => '表示順',
    'CFGDESC_MODULE_PAYMENT_MONEYORDER_SORT_ORDER' => '表示順を設定します。 最下位が最初に表示されます。',
    'CFGTITLE_MODULE_PAYMENT_MONEYORDER_PAYTO' => '支払先：',
    'CFGDESC_MODULE_PAYMENT_MONEYORDER_PAYTO' => '支払いの受取人は誰ですか？',
// eof constant configuration titles and descriptions for payment module moneyorder
];
if (defined('MODULE_PAYMENT_MONEYORDER_STATUS')) {
    $define['MODULE_PAYMENT_MONEYORDER_TEXT_EMAIL_FOOTER'] = "小切手またはマネーオーダーの支払い先は次のとおりです：\n\n" . MODULE_PAYMENT_MONEYORDER_PAYTO . "\n\nお支払いは次の宛先に郵送してください：\n" . STORE_NAME_ADDRESS . "\n\nご注文は、支払いを受け取るまで発送されません。";
}

return $define;

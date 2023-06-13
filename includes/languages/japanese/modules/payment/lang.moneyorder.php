<?php
$define = [
    'MODULE_PAYMENT_MONEYORDER_TEXT_TITLE' => '小切手／マネーオーダー',
    'MODULE_PAYMENT_MONEYORDER_TEXT_DESCRIPTION' => '顧客は支払いを郵送することができます。 注文確認メールでは、次のことを求められます。 <br><br>小切手またはマネーオーダーの支払い先は次のとおりです：<br>' . (defined('MODULE_PAYMENT_MONEYORDER_PAYTO') ? MODULE_PAYMENT_MONEYORDER_PAYTO : '<br>(your store name)') . '<br><br>お支払いは次の宛先に郵送してください：<br>' . nl2br(STORE_NAME_ADDRESS) . '<br><br>' . 'ご注文は、支払いを受け取るまで発送されません。',
];
if (defined('MODULE_PAYMENT_MONEYORDER_STATUS')) {
    $define['MODULE_PAYMENT_MONEYORDER_TEXT_EMAIL_FOOTER'] = "小切手またはマネーオーダーの支払い先は次のとおりです：\n\n" . MODULE_PAYMENT_MONEYORDER_PAYTO . "\n\nお支払いは次の宛先に郵送してください：\n" . STORE_NAME_ADDRESS . "\n\nご注文は、支払いを受け取るまで発送されません。";
}

return $define;

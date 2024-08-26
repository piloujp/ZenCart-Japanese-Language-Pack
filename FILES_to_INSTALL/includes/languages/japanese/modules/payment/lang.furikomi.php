<?php
$define = [
	'MODULE_PAYMENT_FURIKOMI_TEXT_TITLE' => '振込',
	'MODULE_PAYMENT_FURIKOMI_TEXT_DESCRIPTION' => "<br>以下の口座に振り込んで下さい:<br><pre>\n銀行名：     " . (defined('MODULE_PAYMENT_FURIKOMI_BANKNAM') ? MODULE_PAYMENT_FURIKOMI_BANKNAM : 'Bank name') . "\n支店名：     " . (defined('MODULE_PAYMENT_FURIKOMI_BANKBRANCH') ? MODULE_PAYMENT_FURIKOMI_BANKBRANCH : 'Branch name') . "\n口座番号：   " . (defined('MODULE_PAYMENT_FURIKOMI_ACCNUM') ? MODULE_PAYMENT_FURIKOMI_ACCNUM : 'Account number') . "\n預金科目：   " . (defined('MODULE_PAYMENT_FURIKOMI_ACCTYPE') ? MODULE_PAYMENT_FURIKOMI_ACCTYPE : 'Account type') . "\n口座名義人： " . (defined('MODULE_PAYMENT_FURIKOMI_ACCNAM') ? MODULE_PAYMENT_FURIKOMI_ACCNAM : 'Account name') . '</pre><p>ご注文ありがとう御座いました。入金確認後、商品を送ります。',
//  "\nSWIFTコード：" . MODULE_PAYMENT_FURIKOMI_SWIFT .
//  "\n".
//  "\n銀行名：     " . MODULE_PAYMENT_FURIKOMI_BANKNAM2 .
//  "\n支店名：     " . MODULE_PAYMENT_FURIKOMI_BANKBRANCH2 .
//  "\n口座番号：   " . MODULE_PAYMENT_FURIKOMI_ACCNUM2 .
//  "\n預金科目：   " . MODULE_PAYMENT_FURIKOMI_ACCTYP2E .
//  "\n口座名義人： " . MODULE_PAYMENT_FURIKOMI_ACCNAM2 .
//  "\nSWIFTコード：" . MODULE_PAYMENT_FURIKOMI_SWIFT2 .
];
if (defined('MODULE_PAYMENT_FURIKOMI_STATUS')) {
	$define['MODULE_PAYMENT_FURIKOMI_TEXT_EMAIL_FOOTER'] = "以下の口座に振り込んで下さい:\n\n" . "\n銀行名：     " . MODULE_PAYMENT_FURIKOMI_BANKNAM . "\n支店名：     " . MODULE_PAYMENT_FURIKOMI_BANKBRANCH . "\n口座番号：   " . MODULE_PAYMENT_FURIKOMI_ACCNUM . "\n預金科目：   " . MODULE_PAYMENT_FURIKOMI_ACCTYPE . "\n口座名義人： " . MODULE_PAYMENT_FURIKOMI_ACCNAM . "\n\nご注文ありがとう御座いました。入金確認後、商品を送ります。\n";
//  "\nSWIFTコード：" . MODULE_PAYMENT_FURIKOMI_SWIFT .
//  "\n".
//  "\n銀行名：     " . MODULE_PAYMENT_FURIKOMI_BANKNAM2 .
//  "\n支店名：     " . MODULE_PAYMENT_FURIKOMI_BANKBRANCH2 .
//  "\n口座番号：   " . MODULE_PAYMENT_FURIKOMI_ACCNUM2 .
//  "\n預金科目：   " . MODULE_PAYMENT_FURIKOMI_ACCTYP2E .
//  "\n口座名義人： " . MODULE_PAYMENT_FURIKOMI_ACCNAM2 .
//  "\nSWIFTコード：" . MODULE_PAYMENT_FURIKOMI_SWIFT2 .
}

return $define;

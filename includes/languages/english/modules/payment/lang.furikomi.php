<?php
$define = [
	'MODULE_PAYMENT_FURIKOMI_TEXT_TITLE' => 'Direct Bank Deposit',
	'MODULE_PAYMENT_FURIKOMI_TEXT_DESCRIPTION' => '<BR>Please use the following details to transfer your total order value:<br><pre>' . "\nBank Name:    " . (defined('MODULE_PAYMENT_FURIKOMI_BANKNAM') ? MODULE_PAYMENT_FURIKOMI_BANKNAM : 'Bank name') . "\nBranch Name:  " . (defined('MODULE_PAYMENT_FURIKOMI_BANKBRANCH') ? MODULE_PAYMENT_FURIKOMI_BANKBRANCH : 'Branch name') . "\nAccount No.:  " . (defined('MODULE_PAYMENT_FURIKOMI_ACCNUM') ? MODULE_PAYMENT_FURIKOMI_ACCNUM : 'Account number') . "\nAccount type: " . (defined('MODULE_PAYMENT_FURIKOMI_ACCTYPE') ? MODULE_PAYMENT_FURIKOMI_ACCTYPE : 'Account type') . "\nAccount Name: " . (defined('MODULE_PAYMENT_FURIKOMI_ACCNAM') ? MODULE_PAYMENT_FURIKOMI_ACCNAM : 'Account name') . '</pre><p>Thanks for your order which will ship after we receive payment in the above account.',
	//  "\nSwift Code:   " . MODULE_PAYMENT_FURIKOMI_SWIFT .
//  "\n".
//  "\nBank Name:    " . MODULE_PAYMENT_FURIKOMI_BANKNAM2 .
//  "\nBranch Name:  " . MODULE_PAYMENT_FURIKOMI_BANKBRANCH2 .
//  "\nAccount No.:  " . MODULE_PAYMENT_FURIKOMI_ACCNUM2 .
//  "\nAccount type: " . MODULE_PAYMENT_FURIKOMI_ACCTYPE2 .
//  "\nAccount Name: " . MODULE_PAYMENT_FURIKOMI_ACCNAM2 .
//  "\nSwift Code:   " . MODULE_PAYMENT_FURIKOMI_SWIFT2 .
];
if (defined('MODULE_PAYMENT_FURIKOMI_STATUS')) {
	$define['MODULE_PAYMENT_FURIKOMI_TEXT_EMAIL_FOOTER'] = "Please use the following details to transfer your total order value:\n\n\nBank Name:    " . MODULE_PAYMENT_FURIKOMI_BANKNAM . "\nBranch Name:  " . MODULE_PAYMENT_FURIKOMI_BANKBRANCH . "\nAccount No.:  " . MODULE_PAYMENT_FURIKOMI_ACCNUM . "\nAccount type: " . MODULE_PAYMENT_FURIKOMI_ACCTYPE . "\nAccount Name: " . MODULE_PAYMENT_FURIKOMI_ACCNAM . "\n\nThanks for your order which will ship after we receive payment in the above account.\n";
//  "\nSwift Code:   " . MODULE_PAYMENT_FURIKOMI_SWIFT .
//  "\n".
//  "\nBank Name:    " . MODULE_PAYMENT_FURIKOMI_BANKNAM2 .
//  "\nBranch Name:  " . MODULE_PAYMENT_FURIKOMI_BANKBRANCH2 .
//  "\nAccount No.:  " . MODULE_PAYMENT_FURIKOMI_ACCNUM2 .
//  "\nAccount type: " . MODULE_PAYMENT_FURIKOMI_ACCTYPE2 .
//  "\nAccount Name: " . MODULE_PAYMENT_FURIKOMI_ACCNAM2 .
//  "\nSwift Code:   " . MODULE_PAYMENT_FURIKOMI_SWIFT2 .
}

return $define;

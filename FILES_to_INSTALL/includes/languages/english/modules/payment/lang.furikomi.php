<?php
$define = [
    'MODULE_PAYMENT_FURIKOMI_TEXT_TITLE' => 'Direct Bank Deposit',
    'MODULE_PAYMENT_FURIKOMI_TEXT_DESCRIPTION' => '<BR>Please use the following details to transfer your total order value:<br><pre>'
    . "\nBank Name:    " . zen_config('MODULE_PAYMENT_FURIKOMI_BANKNAME', 'Bank name')
    . "\nBranch Name:  " . zen_config('MODULE_PAYMENT_FURIKOMI_BANKBRANCH', 'Branch name')
    . "\nAccount No.:  " . zen_config('MODULE_PAYMENT_FURIKOMI_ACCNUM', 'Account number')
    . "\nAccount type: " . zen_config('MODULE_PAYMENT_FURIKOMI_ACCTYPE', 'Account type')
    . "\nAccount Name: " . zen_config('MODULE_PAYMENT_FURIKOMI_ACCNAM', 'Account name')
//    . "\nSwift Code:   " . zen_config('MODULE_PAYMENT_FURIKOMI_SWIFT', 'Swift Code')
//    . "\n\nOther account choice:"
//    . "\nBank Name:    " . zen_config('MODULE_PAYMENT_FURIKOMI_BANKNAME2', 'Bank name')
//    . "\nBranch Name:  " . zen_config('MODULE_PAYMENT_FURIKOMI_BANKBRANCH2', 'Branch name')
//    . "\nAccount No.:  " . zen_config('MODULE_PAYMENT_FURIKOMI_ACCNUM2', 'Account number')
//    . "\nAccount type: " . zen_config('MODULE_PAYMENT_FURIKOMI_ACCTYPE2', 'Account type')
//    . "\nAccount Name: " . zen_config('MODULE_PAYMENT_FURIKOMI_ACCNAM2', 'Account name')
//    . "\nSwift Code:   " . zen_config('MODULE_PAYMENT_FURIKOMI_SWIFT2', 'Swift Code')
    . '</pre><p>Thanks for your order which will ship after we receive payment in the above account.',
    'MODULE_PAYMENT_FURIKOMI_TEXT_MISSING_INFO' => '(not configured - Missing transfer data)',
];
if (defined('MODULE_PAYMENT_FURIKOMI_STATUS')) {
    $define['MODULE_PAYMENT_FURIKOMI_TEXT_EMAIL_FOOTER'] = "Please use the following details to transfer your total order value:\n"
    . "\nBank Name:    " . zen_config('MODULE_PAYMENT_FURIKOMI_BANKNAME')
    . "\nBranch Name:  " . zen_config('MODULE_PAYMENT_FURIKOMI_BANKBRANCH')
    . "\nAccount No.:  " . zen_config('MODULE_PAYMENT_FURIKOMI_ACCNUM')
    . "\nAccount type: " . zen_config('MODULE_PAYMENT_FURIKOMI_ACCTYPE')
    . "\nAccount Name: " . zen_config('MODULE_PAYMENT_FURIKOMI_ACCNAM')
//    . "\nSwift Code:   " . zen_config('MODULE_PAYMENT_FURIKOMI_SWIFT')
//    . "\nOther account choice:"
//    . "\nBank Name:    " . zen_config('MODULE_PAYMENT_FURIKOMI_BANKNAME2')
//    . "\nBranch Name:  " . zen_config('MODULE_PAYMENT_FURIKOMI_BANKBRANCH2')
//    . "\nAccount No.:  " . zen_config('MODULE_PAYMENT_FURIKOMI_ACCNUM2')
//    . "\nAccount type: " . zen_config('MODULE_PAYMENT_FURIKOMI_ACCTYPE2')
//    . "\nAccount Name: " . zen_config('MODULE_PAYMENT_FURIKOMI_ACCNAM2')
//    . "\nSwift Code:   " . zen_config('MODULE_PAYMENT_FURIKOMI_SWIFT2')
    . "\n\nThanks for your order which will ship after we receive payment in the above account.\n";
}

return $define;

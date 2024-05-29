<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Zen4All 2020 Aug 20 New in v1.5.8-alpha $
*/

$define = [
    'HEADING_TITLE' => 'Send a ' . '%%TEXT_GV_NAME%%' . ' To Customers',
    'TEXT_FROM' => 'From:',
    'TEXT_TO' => 'Email To:',
    'TEXT_TO_CUSTOMERS' => 'To Customer Lists:',
    'TEXT_TO_EMAIL' => 'or To an Email Address:',
    'TEXT_TO_EMAIL_NAME' => 'Name (optional):',
    'TEXT_TO_EMAIL_INFO' => 'Choose a list from the above drop-down or use the following fields for sending a single email.',
    'TEXT_SUBJECT' => 'Subject:',
    'TEXT_AMOUNT' => '%%TEXT_GV_NAME%%' . ' Value:',
    'ERROR_GV_AMOUNT' => 'Enter a number using a decimal point for fractions eg.: 25.00.',
    'TEXT_AMOUNT_INFO' => '%%ERROR_GV_AMOUNT%%',
    'TEXT_HTML_MESSAGE' => 'HTML Message:',
    'TEXT_MESSAGE' => 'Text-Only Message:',
    'TEXT_MESSAGE_INFO' => '<p>Optionally include a specific message, inserted prior to the standard ' . '%%TEXT_GV_NAME%%' . ' email text.</p>',
    'NOTICE_EMAIL_SENT_TO' => 'Notice: %1$s email(s) sent to %2$s',
    'ERROR_NO_CUSTOMER_SELECTED' => 'Error: No Customer selected.',
    'ERROR_NO_AMOUNT_ENTERED' => 'Error: Certificate Value invalid.',
    'ERROR_NO_SUBJECT' => 'Error: no Email Subject entered.',
    'TEXT_GV_ANNOUNCE' => '��؂Ȃ��q�l�ł��邠�Ȃ��ɁA%s��' . '%%TEXT_GV_NAME%%' . '�𑡂�܂��B',
    'TEXT_GV_TO_REDEEM_TEXT' => '�ȉ��̃����N����' . '%%TEXT_GV_NAME%%' . "\n\n ". '%1$s%2$s' . "\n\n" . '�̈������s�����A' . STORE_NAME . " URL: " . HTTP_CATALOG_SERVER . DIR_WS_CATALOG . "\n" . ' �ł̂��x�����葱���y�[�W�ŁA�M�t�g�������R�[�h %2$s ����͂��Ă����p���������B',
    'TEXT_GV_TO_REDEEM_HTML' => '<a href="%1$s%2$s">�������N���b�N���ăM�t�g��������' . '%%TEXT_GV_NAME%%' . '</a> ���邩�A<a href="' . HTTP_CATALOG_SERVER . DIR_WS_CATALOG . '">' . STORE_NAME . '</a> �ł̂��x�����葱���y�[�W�ŃM�t�g�������R�[�h <strong>%2$s</strong> ����͂��Ă����p���������B',
];

return $define;

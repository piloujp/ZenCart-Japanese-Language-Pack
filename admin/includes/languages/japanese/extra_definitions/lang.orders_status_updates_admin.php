<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Zcwilt 2020 Jun 02 New in v1.5.8-alpha $
*/

$define = [
    'OSH_EMAIL_SEPARATOR' => '------------------------------------------------------',
    'OSH_EMAIL_TEXT_SUBJECT' => 'ご注文受付状況のお知らせ',
    'OSH_EMAIL_TEXT_ORDER_NUMBER' => 'ご注文受付番号:',
    'OSH_EMAIL_TEXT_INVOICE_URL' => 'ご注文受付状況詳細:',
    'OSH_EMAIL_TEXT_DATE_ORDERED' => 'ご注文日:',
    'OSH_EMAIL_TEXT_COMMENTS_UPDATE' => '<em>[ご連絡事項] </em>',
    'OSH_EMAIL_TEXT_STATUS_UPDATED' => 'ご注文状況は次のようになっております。' . "\n",
    'OSH_EMAIL_TEXT_STATUS_NO_CHANGE' => '受付状況は変更されてません:' . "\n",
    'OSH_EMAIL_TEXT_STATUS_LABEL' => '<strong>現在の受付状況:</strong> %s' . "\n\n",
    'OSH_EMAIL_TEXT_STATUS_CHANGE' => '<strong>過去の受付状況:</strong> %1$s, <strong>新しい受付状況:</strong> %2$s' . "\n\n",
    'OSH_EMAIL_TEXT_STATUS_PLEASE_REPLY' => 'ご質問などがございましたら、このメールにご返信ください。' . "\n",
];

return $define;

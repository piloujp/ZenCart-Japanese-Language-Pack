<?php
$define = [
    'OSH_EMAIL_SEPARATOR' => '------------------------------------------------------',
    'OSH_EMAIL_TEXT_SUBJECT' => 'ご注文の処理ステータスが更新されました',
    'OSH_EMAIL_TEXT_ORDER_NUMBER' => 'ご注文番号:',
    'OSH_EMAIL_TEXT_INVOICE_URL' => 'ご注文詳細URL:',
    'OSH_EMAIL_TEXT_DATE_ORDERED' => 'ご注文日:',
    'OSH_EMAIL_TEXT_COMMENTS_UPDATE' => '<em>ご注文に関するメッセージ: </em>',
    'OSH_EMAIL_TEXT_STATUS_UPDATED' => 'お客様のご注文の処理ステータスが更新されました:' . "\n",
    'OSH_EMAIL_TEXT_STATUS_NO_CHANGE' => 'お客様のご注文の処理ステータスが変更されませんでした:' . "\n",
    'OSH_EMAIL_TEXT_STATUS_LABEL' => '<strong>現在の処理状況: </strong> %s' . "\n\n",
    'OSH_EMAIL_TEXT_STATUS_CHANGE' => '<strong>以前のステータス:</strong> %1$s, <strong>新しいステータス:</strong> %2$s' . "\n\n",
    'OSH_EMAIL_TEXT_STATUS_PLEASE_REPLY' => 'ご質問等がある場合には、このメールに返信してください。' . "\n",
    'SEND_EXTRA_ORDERS_STATUS_ADMIN_EMAILS_TO_SUBJECT' => '[注文処理ステータス]',
];

return $define;
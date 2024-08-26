<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2024 May 27 Modified in v2.1.0-alpha1 $
*/

$define = [
    'HEADING_TITLE' => '顧客を指定して ' . '%%TEXT_GV_NAME%%' . ' をメールで送信',
    'TEXT_FROM' => '差出人:',
    'TEXT_TO' => '宛て先:',
    'TEXT_TO_CUSTOMERS' => '送信先顧客グループ:',
    'TEXT_TO_EMAIL' => 'もしくは、個別のアドレス:',
    'TEXT_TO_EMAIL_NAME' => '名前 (オプション):',
    'TEXT_TO_EMAIL_INFO' => '<span class="smallText">上部のドロップダウンリストから、送信先顧客をグループで指定するか、下部のフィールドに個別のメールアドレスを直接入力します。</span>',
    'TEXT_SUBJECT' => '件名:',
    'TEXT_AMOUNT' => '%%TEXT_GV_NAME%%' . ' 引換額:',
    'ERROR_GV_AMOUNT' => '分数には小数点を使用して数値を入力してください。例えば： 25.00。',
    'TEXT_AMOUNT_INFO' => '%%ERROR_GV_AMOUNT%%',
    'TEXT_HTML_MESSAGE' => 'HTML形式コメント:',
    'TEXT_MESSAGE' => 'テキスト形式コメント:',
    'TEXT_MESSAGE_INFO' => '<p>必要に応じて、標準の' . '%%TEXT_GV_NAME%%' . 'メールテキストの前に特定のメッセージを追加できます。</p>',
    'NOTICE_EMAIL_SENT_TO' => '注意: %1s 件のメールを %2s に送信します。',
    'ERROR_NO_CUSTOMER_SELECTED' => 'エラー： 顧客が選択されていません。',
    'ERROR_NO_AMOUNT_ENTERED' => 'エラー：引換額が正しく指定されていません。',
    'ERROR_NO_SUBJECT' => 'エラー： 件名が入力されていません。',
    'TEXT_GV_ANNOUNCE' => '大切なお客様であるあなたに、%sの' . '%%TEXT_GV_NAME%%' . 'を贈ります。',
    'TEXT_GV_TO_REDEEM_TEXT' => '以下のリンクから' . '%%TEXT_GV_NAME%%' . "\n\n ". '%1$s%2$s' . "\n\n" . 'の引換を行うか、' . STORE_NAME . " URL: " . HTTP_CATALOG_SERVER . DIR_WS_CATALOG . "\n" . ' でのお支払い手続きページで、ギフト券引換コード %2$s を入力してご利用ください。',
    'TEXT_GV_TO_REDEEM_HTML' => '<a href="%1$s%2$s">ここをクリックしてギフト券を引換' . '%%TEXT_GV_NAME%%' . '</a> するか、<a href="' . HTTP_CATALOG_SERVER . DIR_WS_CATALOG . '">' . STORE_NAME . '</a> でのお支払い手続きページでギフト券引換コード <strong>%2$s</strong> を入力してご利用ください。',
];

return $define;

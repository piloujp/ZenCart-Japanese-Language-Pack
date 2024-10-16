<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2024 May 27 Modified in v2.1.0-alpha1 $
*/

$define = [
    'EMAIL_LOGO_ALT_TITLE_TEXT' => 'Zen Cart! The Art of E-commerce',
    'EMAIL_LOGO_FILENAME' => 'header.jpg',
    'EMAIL_LOGO_WIDTH' => '550',
    'EMAIL_LOGO_HEIGHT' => '110',
    'EMAIL_EXTRA_HEADER_INFO' => '',
    'EMAIL_ORDER_UPDATE_MESSAGE' => '',
    'OFFICE_FROM' => '差出人：',
    'OFFICE_EMAIL' => 'メールアドレス：',
    'OFFICE_USE' => '会社での利用のみ：',
    'OFFICE_LOGIN_NAME' => 'ログイン名：',
    'OFFICE_LOGIN_EMAIL' => 'ログインメールアドレス：',
    'OFFICE_LOGIN_PHONE' => '電話：',
    'OFFICE_IP_ADDRESS' => 'IPアドレス：',
    'OFFICE_HOST_ADDRESS' => 'ホスト名：',
    'OFFICE_DATE_TIME' => '日付・時間：',
    'EMAIL_DISCLAIMER' => 'このメールアドレスは、あなたもしくはあなたのお客様からいただいたものです。このメールに心当たりがない方は、お手数ですが %s までお知らせください。',
    'EMAIL_SPAM_DISCLAIMER' => 'このメールは「特定電子メールの送信の適正化等に関する法律」に準拠して送信されました。購読削除を希望される場合は、差出人アドレスにリクエストいただければ速やかに対処いたします。',
    'EMAIL_FOOTER_COPYRIGHT' => 'Copyright (c) ' . date('Y') . ' <a href="https://www.zen-cart.com">Zen Cart</a>. Powered by <a href="https://www.zen-cart.com">Zen Cart</a>',
    'SEND_EXTRA_GV_ADMIN_EMAILS_TO_SUBJECT' => '[ギフト券]',
    'SEND_EXTRA_DISCOUNT_COUPON_ADMIN_EMAILS_TO_SUBJECT' => '[クーポン券]',
    'SEND_EXTRA_ORDERS_STATUS_ADMIN_EMAILS_TO_SUBJECT' => '[ご注文状況]',
    'TEXT_UNSUBSCRIBE' => '\n\nこのメールマガジンとショップからのお知らせを購読解除するには以下のリンクをクリック： \n',
    'OFFICE_IP_TO_HOST_ADDRESS' => '不可能',
    'TEXT_EMAIL_SUBJECT_ADMIN_USER_ADDED' => '管理者への警告 : 新しい管理者が追加されました。',
    'TEXT_EMAIL_MESSAGE_ADMIN_USER_ADDED' => '管理者への警告 : ショップに新しい管理者アカウント（%1$s）が追加されました。' . "\n" . '追加実行管理者は%2$sです。' . "\n\n" . 'もしユーザーに心当たりがない場合は、すぐにサイトのセキュリティなどの確認を行って下さい。',
    'TEXT_EMAIL_SUBJECT_ADMIN_USER_DELETED' => '管理者への警告 : 管理者アカウントが削除されました。',
    'TEXT_EMAIL_MESSAGE_ADMIN_USER_DELETED' => '管理者への警告 : 管理者アカウント（%1$s）が削除されました。 ' . "\n" . '削除実行管理者：%2$s。' . "\n\n" . 'もしこの変更に心当たりがない場合は、すぐにサイトのセキュリティなどの確認を行って下さい。',
    'TEXT_EMAIL_SUBJECT_ADMIN_USER_CHANGED' => '管理者への警告 : 管理ユーザーの詳細情報が変更されました。',
    'TEXT_EMAIL_SUBJECT_ADMIN_MFA_DELETED' => '管理者アラート: 管理者ユーザーの多要素認証が無効になっています。',
    'TEXT_EMAIL_MESSAGE_ADMIN_MFA_DELETED' => '管理上の警告: 管理者ユーザー（%1$s）の多要素認証設定は%2$sによって無効にされました。' . "\n\n" . 'あなたまたは権限のある管理者がこの変更を開始したのではない場合は、サイトのセキュリティを直ちに確認することをお勧めします。',
    'TEXT_EMAIL_SUBJECT_ADMIN_MFA_EXEMPTED' => '管理者への警告: 管理者ユーザーの多要素認証は EXEMPT（免除）としてマークされています。',
    'TEXT_EMAIL_MESSAGE_ADMIN_MFA_EXEMPTED' => '管理上の警告: 管理者ユーザー（%1$s）の多要素認証設定は%2$sによって免除されました。' . "\n\n" . 'あなたまたは権限のある管理者がこの変更を開始していない場合は、サイトのセキュリティを直ちに確認することをお勧めします。',
    'TEXT_EMAIL_SUBJECT_ADMIN_MFA_UNEXEMPTED' => '管理者アラート: 管理者ユーザーの多要素認証は NO LONGER EXEMPT（免除されなくなりました）としてマークされています。',
    'TEXT_EMAIL_MESSAGE_ADMIN_MFA_UNEXEMPTED' => '管理上の警告: 管理者ユーザー（%1$s）の多要素認証設定は、%2$sによって NO LONGER EXEMPT（免除されなくなりました）としてマークされました。' . "\n\n" . 'あなたまたは権限のある管理者がこの変更を開始していない場合は、サイトのセキュリティを直ちに確認することをお勧めします。',
    'TEXT_EMAIL_ALERT_ADM_EMAIL_CHANGED' => '管理者への警告 : 管理者（%1$s）のメールアドレスが（%2$s）から（%3$s）に変更されました。' . "\n" . '変更管理者：（%4$s）',
    'TEXT_EMAIL_ALERT_ADM_NAME_CHANGED' => '管理者への警告 : 管理者アカウント（%1$s）の管理者名が（%2$s）から（%3$s）に変更されました。' . "\n" . ' 管理者名変更管理者：（%4$s）',
    'TEXT_EMAIL_ALERT_ADM_PROFILE_CHANGED' => '管理者への警告 : 管理者アカウント（%1$s）の管理グループが（%2$s）から（%3$s）に変更されました。' . "\n" . '変更者：（%4$s）',
];

return $define;

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
    'TEXT_EMAIL_SUBJECT_ADMIN_USER_ADDED' => 'Admin Alert: New admin user added.',
    'TEXT_EMAIL_MESSAGE_ADMIN_USER_ADDED' => 'Administrative alert: A new admin user (%1$s) has been ADDED to your store by %2$s.' . "\n\n" . 'If you or an authorized administrator did not initiate this change, it is advised that you verify your site security immediately.',
    'TEXT_EMAIL_SUBJECT_ADMIN_USER_DELETED' => 'Admin Alert: An admin user has been deleted.',
    'TEXT_EMAIL_MESSAGE_ADMIN_USER_DELETED' => 'Administrative alert: An admin user (%1$s) has been DELETED from your store by %2$s.' . "\n\n" . 'If you or an authorized administrator did not initiate this change, it is advised that you verify your site security immediately.',
    'TEXT_EMAIL_SUBJECT_ADMIN_USER_CHANGED' => 'Admin Alert: Admin user details have been changed.',
    'TEXT_EMAIL_SUBJECT_ADMIN_MFA_DELETED' => 'Admin Alert: MFA for an admin user has been disabled.',
    'TEXT_EMAIL_MESSAGE_ADMIN_MFA_DELETED' => 'Administrative alert: MFA settings for an admin user (%1$s) have been DISABLED by %2$s.' . "\n\n" . 'If you or an authorized administrator did not initiate this change, it is advised that you verify your site security immediately.',
    'TEXT_EMAIL_SUBJECT_ADMIN_MFA_EXEMPTED' => 'Admin Alert: MFA for an admin user has been marked as EXEMPT.',
    'TEXT_EMAIL_MESSAGE_ADMIN_MFA_EXEMPTED' => 'Administrative alert: MFA settings for an admin user (%1$s) have been EXEMPTED by %2$s.' . "\n\n" . 'If you or an authorized administrator did not initiate this change, it is advised that you verify your site security immediately.',
    'TEXT_EMAIL_SUBJECT_ADMIN_MFA_UNEXEMPTED' => 'Admin Alert: MFA for an admin user has been marked as NO LONGER EXEMPT.',
    'TEXT_EMAIL_MESSAGE_ADMIN_MFA_UNEXEMPTED' => 'Administrative alert: MFA settings for an admin user (%1$s) have been marked as NO LONGER EXEMPT by %2$s.' . "\n\n" . 'If you or an authorized administrator did not initiate this change, it is advised that you verify your site security immediately.',
    'TEXT_EMAIL_ALERT_ADM_EMAIL_CHANGED' => 'Admin alert: Admin user (%1$s) email address has been changed from (%2$s) to (%3$s) by (%4$s)',
    'TEXT_EMAIL_ALERT_ADM_NAME_CHANGED' => 'Admin alert: Admin user (%1$s) username has been changed from (%2$s) to (%3$s) by (%4$s)',
    'TEXT_EMAIL_ALERT_ADM_PROFILE_CHANGED' => 'Admin alert: Admin user (%1$s) security profile has been changed from (%2$s) to (%3$s) by (%4$s)',
];

return $define;

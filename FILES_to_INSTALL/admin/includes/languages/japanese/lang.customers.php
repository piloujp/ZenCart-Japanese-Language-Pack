<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: lat9 2024 Sep 20 Modified in v2.1.0-beta1 $
*/

$define = [
    'HEADING_TITLE' => '顧客管理',
    'TABLE_HEADING_FIRSTNAME' => '名',
	'TABLE_HEADING_FIRSTNAME_KANA' => '名ふりがな',
    'TABLE_HEADING_LASTNAME' => '姓',
	'TABLE_HEADING_LASTNAME_KANA' => '姓ふりがな',
    'TABLE_HEADING_ACCOUNT_CREATED' => '登録日',
    'TABLE_HEADING_LOGIN' => '最終ログイン日',
    'TABLE_HEADING_REGISTRATION_IP' => '登録IP',
    'TABLE_HEADING_PRICING_GROUP' => '割引顧客グループ',
    'TABLE_HEADING_AUTHORIZATION_APPROVAL' => '顧客ステータス',
    'TABLE_HEADING_GV_AMOUNT' => 'ギフト券残高',
    'TEXT_DATE_ACCOUNT_CREATED' => '登録日:',
    'TEXT_DATE_ACCOUNT_LAST_MODIFIED' => '更新日:',
    'TEXT_INFO_DATE_LAST_LOGON' => '最終ログイン日:',
    'TEXT_INFO_NUMBER_OF_LOGONS' => 'ログイン回数:',
    'TEXT_LAST_LOGIN_IP' => '最終ログイン IP:',
    'TEXT_REGISTRATION_IP' => '登録 IP:',
    'TEXT_INFO_COUNTRY' => '国名:',
    'TEXT_INFO_NUMBER_OF_REVIEWS' => 'レビュー投稿数:',
    'TEXT_DELETE_INTRO' => 'この顧客を本当に削除しますか?',
    'TEXT_DELETE_REVIEWS' => 'レビューも削除(投稿数 %s)',
    'TEXT_INFO_HEADING_DELETE_CUSTOMER' => '顧客を削除',
    'TEXT_INFO_NUMBER_OF_ORDERS' => '注文数:',
    'TEXT_INFO_LIFETIME_VALUE' => '顧客生涯価値:',
    'TEXT_INFO_LAST_ORDER' => '最近の注文:',
    'TEXT_INFO_ORDERS_TOTAL' => '合計:',
    'CUSTOMERS_REFERRAL' => '会員登録時に入力された紹介コード<br />初めて利用した割引きクーポンコード',
    'TEXT_INFO_GV_AMOUNT' => 'ギフト券残高',
    'ENTRY_NONE' => 'なし',
    'TABLE_HEADING_COMPANY' => '会社名',
    'TEXT_INFO_HEADING_RESET_CUSTOMER_PASSWORD' => '顧客のパスワードをリセットする',
    'TEXT_PWDRESET_INTRO' => 'この顧客に対するパスワードをリセットするには、新しいパスワードを入力したのち、以下で「承認」してください。新しいパスワードは、新しいパスワードは、会員登録時の通常のパスワード規則に準拠している必要があります。',
    'TEXT_CUST_NEW_PASSWORD' => '新しいパスワード:',
    'TEXT_CUST_CONFIRM_PASSWORD' => '新しいパスワード（確認）:',
    'ERROR_PWD_TOO_SHORT' => 'エラー：ショップで指定されているパスワードの最低文字数を満たしていません。',
    'SUCCESS_PASSWORD_UPDATED' => 'パスワードを更新しました。',
    'EMAIL_CUSTOMER_PWD_CHANGE_MESSAGE' => 'あなたのパスワードがショップの管理者によって変更されました。新しいパスワード： ',
    'EMAIL_CUSTOMER_PWD_CHANGE_SUBJECT' => 'パスワードのリセット',
    'EMAIL_CUSTOMER_PWD_CHANGE_MESSAGE_FOR_ADMIN' => '顧客のパスワードのリセットを行いました： ' . "\n" . '%1$s' . "\n\n" . '管理者ID: %2$s',
    'CUSTOMERS_AUTHORIZATION' => '顧客の承認ステータス',
    'CUSTOMERS_AUTHORIZATION_0' => '承認済み',
    'CUSTOMERS_AUTHORIZATION_1' => '未承認 - ブラウズするために認可が必要',
    'CUSTOMERS_AUTHORIZATION_2' => '未承認 - 価格が非表示でのブラウズは可能',
    'CUSTOMERS_AUTHORIZATION_3' => '未承認 - 価格が表示されたブラウズが可能ですが、商品の購入は出来ません',
    'CUSTOMERS_AUTHORIZATION_4' => '禁止 - ログインも買い物もできません。',
    'ERROR_CUSTOMER_APPROVAL_CORRECTION1' => '警告: ショップはブラウズなしに設定されています。顧客は「未承認 - ブラウズ無し」に設定されています。',
    'ERROR_CUSTOMER_APPROVAL_CORRECTION2' => '警告: ショップは価格無しでのブラウズに設定されています。顧客は「未承認 - 価格非表示でのブラウズ」に設定されています。',
    'EMAIL_CUSTOMER_STATUS_CHANGE_MESSAGE' => 'お客様の顧客ステータスが更新されました。ご愛顧に感謝いたします。またのご来店をお待ちしております。',
    'EMAIL_CUSTOMER_STATUS_CHANGE_SUBJECT' => '顧客ステータスの更新',
    'ADDRESS_BOOK_TITLE' => 'アドレス帳確認',
    'PRIMARY_ADDRESS' => '（標準の配送先）',
    'TEXT_MAXIMUM_ENTRIES' => '<span class="coming"><strong>注:</strong></span>アドレス帳は %s 件まで登録が可能です。',
    'TEXT_INFO_ADDRESS_BOOK_COUNT' => ' | <a href="%1$s">%2$s件の登録</a>',
    'TEXT_INFO_ADDRESS_BOOK_COUNT_SINGLE' => '',
    'EMP_BUTTON_PLACEORDER_ALT' => 'この顧客への注文を作成',
    'EMP_BUTTON_PLACEORDER' => '注文作成',
    'TEXT_CUSTOMER_GROUPS' => '顧客グループ',
    'TABLE_HEADING_WHOLESALE_LEVEL' => '卸売レベル',
    'TEXT_WHOLESALE_LEVEL' => '卸売レベル：',
    'HELPTEXT_WHOLESALE_LEVEL' => '小売顧客の場合は 0 を入力し、卸売顧客の場合は「卸売価格レベル」を入力します。顧客は、卸売価格レベルを持つことも、割引価格グループの一部になることもできますが、両方を所有することはできません。',

    // -----
    // Added, since used by zen_prepare_country_zones_pull_down
    //
    'PLEASE_SELECT' => '選択してください',
    'TYPE_BELOW' => '以下に選択肢を入力してください...',

];

return $define;

<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piloujp 2024 Feb 06 Modified in v2.0.0-alpha1 $
*/

$define = [
    'HEADING_TITLE' => '注文管理',
    'HEADING_TITLE_DETAILS' => '注文詳細',
    'HEADING_TITLE_SEARCH' => '注文ID:',
    'HEADING_TITLE_STATUS' => 'ステータス:',
    'HEADING_TITLE_SEARCH_DETAIL_ORDERS_PRODUCTS' => '商品名や商品ID、商品型番での検索',
    'HEADING_TITLE_SEARCH_ALL' => '検索: ',
    'HEADING_TITLE_SEARCH_PRODUCTS' => '商品検索: ',
    'TEXT_RESET_FILTER' => '検索フィルタをリセット',
    'TABLE_HEADING_PAYMENT_METHOD' => '支払方法<br>配送方法',
    'TABLE_HEADING_ORDERS_ID' => 'ID',
    'TEXT_BILLING_SHIPPING_MISMATCH' => '請求先と配送先が違います',
    'TABLE_HEADING_ZONE_INFO' => '区域',
    'TABLE_HEADING_ORDER_TOTAL' => '注文合計',
    'TABLE_HEADING_DATE_PURCHASED' => '注文日',
    'TABLE_HEADING_TYPE' => '注文タイプ',
    'TABLE_HEADING_QUANTITY' => '数量',
    'TABLE_HEADING_UPDATED_BY' => '更新作業者',
    'ENTRY_CUSTOMER' => '顧客名:',
    'ENTRY_CUSTOMER_ADDRESS' => '顧客住所:<br><i class="fa-solid fa-2x fa-user"></i>',
    'ENTRY_SHIPPING_ADDRESS' => '配送先住所:<br><i class="fa-solid fa-2x fa-truck"></i>',
    'ENTRY_BILLING_ADDRESS' => '請求先住所:<br><i class="fa-regular fa-2x fa-credit-card"></i>',
    'ENTRY_PAYMENT_METHOD' => '支払方法:',
    'ENTRY_CURRENCY_VALUE' => '通貨価値:',
    'ENTRY_CREDIT_CARD_TYPE' => 'クレジットカード種別:',
    'ENTRY_CREDIT_CARD_OWNER' => 'クレジットカード所有者:',
    'ENTRY_CREDIT_CARD_NUMBER' => 'クレジットカード番号:',
    'ENTRY_CREDIT_CARD_CVV' => 'クレジットカーCVV番号:',
    'ENTRY_CREDIT_CARD_EXPIRES' => 'クレジットカード有効期限:',
    'TEXT_ADDITIONAL_PAYMENT_OPTIONS' => '追加の支払い処理オプションのためにクリックして下さい',
    'ENTRY_SHIPPING' => '配送:',
    'ENTRY_STATUS' => 'ステータス:',
    'ENTRY_NOTIFY_CUSTOMER' => '処理状況を顧客に通知:',
    'ENTRY_NOTIFY_COMMENTS' => 'コメントをメールに含める:',
    'TEXT_INFO_HEADING_DELETE_ORDER' => '削除日',
    'TEXT_INFO_DELETE_INTRO' => 'この注文を本当に削除しますか?',
    'TEXT_INFO_RESTOCK_PRODUCT_QUANTITY' => '在庫数を元に戻す',
    'TEXT_DATE_ORDER_CREATED' => '注文日:',
    'TEXT_DATE_ORDER_LAST_MODIFIED' => '更新日:',
    'TEXT_INFO_PAYMENT_METHOD' => '支払方法:',
    'TEXT_ALL_ORDERS' => '全ての注文',
    'EMAIL_SEPARATOR' => '------------------------------------------------------',
    'EMAIL_TEXT_SUBJECT' => 'ご注文受付状況のお知らせ',
    'EMAIL_TEXT_ORDER_NUMBER' => 'ご注文受付番号:',
    'EMAIL_TEXT_INVOICE_URL' => 'ご注文についての情報を下記URLでご覧いただけます。:',
    'EMAIL_TEXT_DATE_ORDERED' => 'ご注文日:',
    'EMAIL_TEXT_COMMENTS_UPDATE' => '<em>[ご連絡事項]: </em>',
    'EMAIL_TEXT_STATUS_UPDATED' => 'ご注文状況は次のようになっております。:' . "\n",
    'EMAIL_TEXT_STATUS_LABEL' => '<strong>現在の受付状況:</strong> %s' . "\n\n",
    'EMAIL_TEXT_STATUS_PLEASE_REPLY' => 'ご質問などがございましたら、このメールにご返信ください。' . "\n",
    'ERROR_ORDER_DOES_NOT_EXIST' => 'エラー: 注文が存在しません。',
    'SUCCESS_ORDER_UPDATED' => '成功: 注文状態が更新されました。',
    'WARNING_ORDER_NOT_UPDATED' => '警告: 注文状態は何も更新されませんでした。',
    'TEXT_INFO_ATTRIBUTE_FREE' => '&nbsp;-&nbsp;<span class="alert">無料</span>',
    'TEXT_DOWNLOAD' => 'ダウンロード',
    'TEXT_DOWNLOAD_TITLE' => 'オーダーのダウンロード状態',
    'TEXT_DOWNLOAD_STATUS' => '状態',
    'TEXT_DOWNLOAD_FILENAME' => 'ファイルネーム',
    'TEXT_DOWNLOAD_MAX_DAYS' => '日数',
    'TEXT_DOWNLOAD_MAX_COUNT' => 'カウント',
    'TEXT_DOWNLOAD_AVAILABLE' => 'ダウンロード可能',
    'TEXT_DOWNLOAD_EXPIRED' => '期限切れ',
    'TEXT_DOWNLOAD_MISSING' => 'サーバー上にありません。',
    'TEXT_EXTENSION_NOT_UNDERSTOOD' => '拡張子 %s は、利用できません',
    'TEXT_FILE_NOT_FOUND' => 'ファイルが見つかりません',
    'IMAGE_ICON_STATUS_CURRENT' => '状態 - 利用可能',
    'IMAGE_ICON_STATUS_EXPIRED' => '状態 - 期限切れ',
    'IMAGE_ICON_STATUS_MISSING' => '状態 - 不明',
    'SUCCESS_ORDER_UPDATED_DOWNLOAD_ON' => 'ダウンロードに成功しました。',
    'SUCCESS_ORDER_UPDATED_DOWNLOAD_OFF' => '無効なダウンロードです。',
    'TEXT_MORE' => '…',
    'TEXT_INFO_IP_ADDRESS' => 'IPアドレス: ',
    'TEXT_DELETE_CVV_FROM_DATABASE' => 'データベースからCVVを削除',
    'TEXT_DELETE_CVV_REPLACEMENT' => '削除',
    'TEXT_MASK_CC_NUMBER' => 'この数にマスクをかけてください',
    'TEXT_INFO_EXPIRED_DATE' => '有効期限:<br>',
    'TEXT_INFO_EXPIRED_COUNT' => '有効数:<br>',
    'TABLE_HEADING_CUSTOMER_COMMENTS' => 'お客様からの<br>連絡事項',
    'TEXT_COMMENTS_YES' => 'お客様からの連絡事項－有り',
    'TEXT_COMMENTS_NO' => 'お客様からの連絡事項－無し',
    'TEXT_CUSTOMER_LOOKUP' => '<i class="fa fa-search"></i> 顧客情報を表示',
    'TEXT_INVALID_ORDER_STATUS' => '<span class="alert">(無効な注文ステータス)</span>',
    'BUTTON_TO_LIST' => '注文一覧表示',
    'SELECT_ORDER_LIST' => '注文IDを指定して移動:',
    'TEXT_MAP_CUSTOMER_ADDRESS' => 'Googleマップで表示',
    'TEXT_MAP_SHIPPING_ADDRESS' => 'Googleマップで表示',
    'TEXT_MAP_BILLING_ADDRESS' => 'Googleマップで表示',
    'TEXT_EMAIL_LANGUAGE' => '注文時の言語：%s',
    'SUCCESS_EMAIL_SENT' => '%s メールを顧客に送信',
    'WARNING_PAYMENT_MODULE_DOESNT_EXIST' => "注文の支払いモジュール (%s) は利用できなくなりました。",
    'WARNING_PAYMENT_MODULE_NOTIFICATIONS_DISABLED' => '注文の支払いモジュール (%s) の構成が変更されました。この注文については、払い戻し、承認、キャプチャ、または無効化を行うことはできません。',
];

return $define;

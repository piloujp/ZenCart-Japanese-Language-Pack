<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9.
// Copyright (C) 2013-2022, Vinos de Frutas Tropicales.  All rights reserved.
//
$define = [
    'NAVBAR_TITLE_1' => 'チェックアウト',
    'NAVBAR_TITLE_2' => 'ご注文の確認',

    'HEADING_TITLE' => '注文を確定して確認する',

    'HEADING_BILLING_ADDRESS' => '請求/支払い情報',
    'HEADING_DELIVERY_ADDRESS' => '配送情報',
    'HEADING_SHIPPING_METHOD' => '配送方法：',
    'HEADING_PAYMENT_METHOD' => '支払方法：',
    'HEADING_PRODUCTS' => 'ショッピングカートの内容',
    'HEADING_TAX' => '税',
    'HEADING_ORDER_COMMENTS' => '特別な指示または注文コメント',
// no comments entered
    'NO_COMMENTS_TEXT' => 'なし',

    'BILLING_ADDRESS' => '（請求先住所） ',
    'SHIPPING_ADDRESS' => '（お届け先の住所） ',

    'CAUTION_SHIPPING_CHANGED' => '配送先住所が変更されたため、配送料金が再計算されました。',
    'ERROR_INVALID_SHIPPING_SELECTION' => '配送の選択が無効です。別の配送を選択してください。',
    'ERROR_PLEASE_RESELECT_SHIPPING_METHOD' => '利用可能な配送オプションが変更されました。ご希望の配送方法を再度選択してください。',

    'NO_JAVASCRIPT_MESSAGE' => 'JavaScript が有効になっていません。注文を処理するには、以下の確認ボタンをクリックしてください。',
    'CHECKOUT_ONE_CONFIRMATION_LOADING' => 'confirmation_one_loading.gif',
    'CHECKOUT_ONE_CONFIRMATION_LOADING_ALT' => 'お待ちください ...',
    'ERROR_NOJS_ORDER_CHANGED' => 'ご注文の詳細が変更されました。現在の値を確認して再度送信してください。',

    'ERROR_INVALID_TEMPORARY_ENTRIES' => '入力した情報の一部が正しくありません。再入力してください。',

// -----
// If your store uses a payment method that needs "additional time" to process (like "Ceon Manual Card"), you can add some instructions
// to your customers on the checkout_one_confirmation page letting them know that the processing might take a while!
//
    'CHECKOUT_ONE_CONFIRMATION_INSTRUCTIONS' => '',
];
return $define;

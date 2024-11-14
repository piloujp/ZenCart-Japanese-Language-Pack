<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9
// Copyright (C) 2013-2022, Vinos de Frutas Tropicales.  All rights reserved.
//
// Last updated for OPC v2.4.2.
//
$define = [
    // when free shipping for orders over $XX.00 is active
    'FREE_SHIPPING_TITLE' => '送料無料',
    'FREE_SHIPPING_DESCRIPTION' => '%s以上のご注文は送料無料',

    'ERROR_GUEST_CHECKOUT_PAGE_DISALLOWED' => 'このページにアクセスするには、登録済みのアカウントが必要です。<a href="' . zen_href_link(FILENAME_LOGIN, '', 'SSL') . '">ログイン</a> ページを使用してアカウントを作成できます。',
    'WARNING_GUEST_CHECKOUT_NOT_AVAILABLE' => '申し訳ございませんが、ゲストチェックアウトは一時的にご利用いただけません。ログインするか、アカウントを作成してチェックアウトを続行してください。',

    'WARNING_GUEST_NO_GCS' => '<b>注意</b>： ギフト券を購入するには、当店のアカウントを持っている（または作成する）必要があります。',
    'WARNING_GUEST_GCS_RESET' => '<em>チェックアウト</em>を続行すると、「ゲストチェックアウト」中に入力した情報はすべて失われます。',
    'WARNING_GUEST_REMOVE_GC' => '「ゲスト チェックアウト」を続行するには、「チェックアウト」ボタンまたはリンクをクリックする前に、ショッピング カートからギフト券を削除してください。',

// -----
// This constant is used when an order's temporary shipping address has been overridden by paypalwpp's
// processing and identifies the address that was overridden by paypalwpp.  The message is both
// displayed to the customer and recorded as a customer-visible orders-status-history record.
//
    'WARNING_PAYPAL_SENDTO_CHANGED' => '入力した配送先住所（%s）は、PayPal で選択した住所に置き換えられました。ご注文内容を確認し、更新が必要な場合はご連絡ください。',
    'WARNING_PAYPALWPP_TOTAL_CHANGED' => 'PayPal で選択した配送先住所に基づいて、注文の合計金額が変更されました。注文内容を確認して、再度送信してください。',

// -----
// This language-constant can be used in the store's update to /includes/modules/[YOUR_TEMPLATE/]information.php
// to point the customer to the order_status page link.
//
    'BOX_INFORMATION_ORDER_STATUS' => '注文状況',
];
return $define;

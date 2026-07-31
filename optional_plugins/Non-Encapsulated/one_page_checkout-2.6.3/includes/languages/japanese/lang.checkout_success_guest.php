<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 (cindy@vinosdefrutastropicales.com).
// Copyright (C) 2018-2023, Vinos de Frutas Tropicales.  All rights reserved.
//
// Last updated for OPC v2.4.6
//
$define = [
    'TEXT_SEE_ORDERS_GUEST' => 'この注文のステータスを確認するには、<a href="' . zen_href_link(FILENAME_ORDER_STATUS, '', 'SSL') . '">注文ステータス</a> ページにアクセスし、この注文番号とメール アドレスを入力してください。',

    'TEXT_GUEST_ADD_PWD_TO_CREATE_ACCT' => '<em>（オプション）</em> この注文で提供した情報を使用してアカウントを作成する場合は、そのアカウントにアクセスするためのパスワードを作成してください。',

    'ERROR_GUEST_ACCOUNT_CREATION_FAILED' => '永久アカウントを作成できませんでした。',
];
return $define;

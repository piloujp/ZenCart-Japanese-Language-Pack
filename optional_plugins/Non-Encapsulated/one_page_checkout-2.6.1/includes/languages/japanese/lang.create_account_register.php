<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9
// Copyright (C) 2018-2026, Vinos de Frutas Tropicales.  All rights reserved.
//
// Last updated: OPC v2.6.0
//
$define = [
    'NAVBAR_TITLE_REGISTER' => 'アカウント登録',
    'TEXT_INSTRUCTIONS' => '<strong class="note">注：</strong> すでにアカウントをお持ちの場合は、<a href="%s">ログイン</a> ページからログインしてください。ご注文の準備が整いましたら、住所の詳細をお伺いします。',
    'ENTRY_EMAIL_ADDRESS_CONFIRM' => 'Eメール確認：',
    'ENTRY_EMAIL_FORMAT' => 'メールの形式：',
    'BUTTON_SUBMIT_REGISTER_ALT' => '登録する',

    'HEADING_CONTACT_DETAILS' => '連絡先',

    'ENTRY_EMAIL_MISMATCH_ERROR' => '<em>メール</em>と<em>メールの確認</em>のエントリが一致しません。',
    'ENTRY_EMAIL_MISMATCH_ERROR_JS' => '* 「電子メール」と「電子メールの確認」のエントリが一致しません。',

    // -----
    // Set the placeholder for the telephone number for registered-account creations.  The value's set
    // to '*' if the configuration setting isn't available or isn't 'empty'; an empty string otherwise.
    //
    'TEXT_TELEPHONE_PLACEHOLDER' => (defined('CHECKOUT_ONE_REGISTERED_ACCT_TELEPHONE_MIN') && empty(CHECKOUT_ONE_REGISTERED_ACCT_TELEPHONE_MIN)) ? '' : '*',
];
return $define;

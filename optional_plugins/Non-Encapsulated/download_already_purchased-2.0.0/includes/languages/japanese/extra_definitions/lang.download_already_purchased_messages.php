<?php
// -----
// Part of the "Download Already Purchased" plugin created by lat9.
// Copyright (C) 2017-2025, Vinos de Frutas Tropicales
//
// NOTE:  These messages make use of the PHP variable-ordering (to make translations easier); make sure that you ARE NOT
// enclosing the message text using double-quotes ("), since the $ in the variable name will be improperly interpreted
// as a PHP variable!
//

// -----
// This messages, issued by the plugin's "extra_cart_action" and "observer" processing, lets the customer know that they've got an
// active download link, so they don't need to re-purchase.  For each message, there's one form used by the cart-action and one
// used by the observer; the following "sprintf" variables are used in these messages:
//
// %1$s ... The name of the download product, as retrieved from the orders_products table.
// %2$s ... Either a link to the associated account_history_info page to reference the associated customer order or a link to the contact_us page.
//
return [
    'DAP_MESSAGE_DOWNLOAD_AVAILABLE_NOT_ADDED' => '<em>%1$s</em> の有効なダウンロードがあります。ダウンロードにアクセスするには、<a href="%2$s">ここ</a> をクリックしてください。製品はカートに追加されませんでした。',

    'DAP_MESSAGE_DOWNLOAD_EXPIRED_CALL_US_NOT_ADDED' => '以前 <em>%1$s</em> を購入されましたが、ダウンロード リンクの有効期限が切れています。<a href="%2$s">お問い合わせ</a>いただければ、ダウンロードを再度有効にします。製品はカートに追加されませんでした。',

    'DAP_MESSAGE_DOWNLOAD_AVAILABLE_REMOVED' => '<em>%1$s</em> の有効なダウンロードがあります。ダウンロードにアクセスするには、<a href="%2$s">ここ</a> をクリックしてください。製品は保存したカートから削除されました。',

    'DAP_MESSAGE_DOWNLOAD_EXPIRED_CALL_US_REMOVED', '以前 <em>%1$s</em> を購入されましたが、ダウンロード リンクの有効期限が切れています。<a href="%2$s">お問い合わせ</a>いただければ、ダウンロードを再度有効にいたします。製品はカートから削除されました。',
];

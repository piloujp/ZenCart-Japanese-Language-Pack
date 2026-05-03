<?php
// -----
// Part of the Ty Package Tracker plugin, v4.0.0 and later.  Provides integration with the
// admin's Customers :: Orders and Edit Orders display and update of an order's tracking information.
//
// Last updated: v5.0.0
//

// -----
// Various language definitions, used for both the Customers::Orders and EditOrders notifications.
//
$define = [
    'TABLE_HEADING_TRACKING_ID' => '追跡ID',
    'TABLE_HEADING_CARRIER_NAME' => '運送会社',
    'ENTRY_ADD_TRACK' => 'トラッキングIDを追加',
    'EMAIL_TEXT_COMMENTS_TRACKING_UPDATE' => 'ご注文いただいた商品は近日中に発送いたします。',

    // -----
    // Used to sprintf the carrier-name (%1$s), tracking-id (%2$s) and the carrier-link (%3$s) into the to-be-sent tracking-update email.
    //
    'EMAIL_TEXT_TRACKID_UPDATE' => "\n\n" . 'あなたの%1$sトラッキングIDは%2$sです' . "\n" . '<br>パッケージを追跡するには、<a href=\"%3$s\">ここをクリック</a>してください。' . "\n" . '<br>上記のリンクが機能しない場合は、次の URL アドレスをコピーして Web ブラウザに貼り付けます。' . "\n" . '<br>%3$s' . "\n\n" . '<br><br>追跡情報がウェブサイトに表示されるまで最大２４時間かかる場合があります。' . "\n<br>",

    // -----
    // Defines the label used for the plugin's configuration settings.
    //
    'BOX_CONFIGURATION_TY_PACKAGE_TRACKER' => 'Ty パッケージトラッカー',
];
return $define;

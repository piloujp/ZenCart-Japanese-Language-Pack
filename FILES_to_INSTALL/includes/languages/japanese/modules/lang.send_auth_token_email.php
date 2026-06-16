<?php
/**
 * @copyright Copyright 2003-2025 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: lat9 2025 Sep 24 New in v2.2.0 $
 *
 * @since ZC v2.2.0
 */
$define = [
    'EMAIL_AUTH_TOKEN_SUBJECT' => zen_config('STORE_NAME') . ' - アカウントを有効化',
    'EMAIL_AUTH_TOKEN_BODY' => "アカウントを有効にするには、以下のリンクをクリックするか、リンク全体をコピーしてブラウザに貼り付けてください:\n\n%1\$s\n\nこのリンクは %2\$u 分で有効期限が切れます。",

    'SUCCESS_AUTH_TOKEN_SENT' => 'アカウントのメールアドレス（%1$s）にメールが送信されました。メールに記載されている手順に従ってアカウントを有効化してください。また、迷惑メールフォルダもご確認ください。',
];
return $define;

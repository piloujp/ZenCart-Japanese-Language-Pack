<?php

// change this to match your store's theme colour
// You can define this in your /includes/extra_datafiles/site_specific_overrides.php file to avoid editing this file directly.
$password_reset_email_button_colour ??= '#00BCE4';

// Simple sanitization
$password_reset_email_button_colour = htmlspecialchars(substr($password_reset_email_button_colour, 0, 32), ENT_QUOTES);

$define = [
    'NAVBAR_TITLE_1' => 'ログイン',
    'NAVBAR_TITLE_2' => 'パスワードを忘れたら',
    'HEADING_TITLE' => 'パスワードをお忘れですか?',

    'TEXT_MAIN' => '以下のメールアドレスを入力すると、パスワードをリセットする方法についての手順が送信されます。',

    'EMAIL_PASSWORD_RESET_SUBJECT' => STORE_NAME . ' - パスワードのリセット',

    'EMAIL_PASSWORD_RESET_BODY' =>
        "こんにちは,\n\n" .
        "お客様の%2\$sアカウントのパスワードリセット依頼を受け取りました。\n\n" .
        "新しいパスワードを選択するには、以下のリンクをクリックしてください：\n\n" .
        "%3\$s\n\n" .
        "このリンクはパスワードリセット専用です。ご自身でリクエストされていない場合は、このメールを無視していただいて構いません。パスワードは変更されません。\n\n" .
        "セキュリティ上の理由から、このリクエストはIPアドレスから送信されました： %1\$s\n\n" .
        "敬具、\n" .
        STORE_NAME . "\n",

    'EMAIL_PASSWORD_RESET_HTML' =>
        '<p>こんにちは,</p>' .
        '<p>お客様の%2\$sアカウントのパスワードリセット依頼を受け取りました。</p>' .
        '<p>新しいパスワードを選択するには、以下のリンクをクリックしてください：</p>' .
        '<p><a href="%3$s" style="display:inline-block;padding:10px 16px;background:' . $password_reset_email_button_colour . ';color:#ffffff;text-decoration:none;border-radius:4px;font-weight:bold;">パスワードをリセット</a></p>' .
        '<p>または、このリンクをブラウザにコピー＆ペーストしてください：<br><a href="%3$s">%3$s</a></p>' .
        '<p>このリンクはパスワードリセット専用です。ご自身でリクエストされていない場合は、このメールを無視していただいて構いません。パスワードは変更されません。</p>' .
        '<p>セキュリティ上の理由から、このリクエストはIPアドレスから送信されました： %1$s</p>' .
        '<p>敬具、<br>' .
        '%2$s' .
        '</p>',

    'SUCCESS_PASSWORD_RESET_SENT' =>
        'ありがとうございます。そのメールアドレスが弊社のシステムに登録されている場合は、そのメールアドレス宛にパスワード復旧手順をお送りいたします。しばらく経っても届かない場合は、迷惑メールフォルダをご確認ください。',
];

return $define;

<?php
$define = [
    'NAVBAR_TITLE_1' => 'ログイン',
    'NAVBAR_TITLE_2' => 'パスワードを忘れたら',
    'HEADING_TITLE' => 'パスワードをお忘れですか?',
    'TEXT_MAIN' => 'ご登録されたメールアドレスを入力してください。パスワードを再発行しメールでお送りします。',
    'EMAIL_PASSWORD_REMINDER_SUBJECT' => STORE_NAME . ' - 新しいパスワード',
    'EMAIL_PASSWORD_REMINDER_BODY' => 'IPアドレス' . $_SERVER['REMOTE_ADDR']  . 'から新しいパスワードの申請を受け付けました。' . "\n\n" . '\'' . STORE_NAME . '\'への新しいパスワードは' . "\n\n" . '   %s' . "\n\nです。\n\n新しいパスワードでログインした後、「マイページ」でご自分でご希望のパスワードに変更できます。",
    'SUCCESS_PASSWORD_SENT' => '新しいパスワードをご登録のメールアドレス宛に送信しました。',
];

return $define;

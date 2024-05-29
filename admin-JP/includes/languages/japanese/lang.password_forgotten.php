<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Zcwilt 2020 Jun 02 New in v1.5.8-alpha $
*/

$define = [
    'HEADING_TITLE' => 'パスワード再発行',
    'TEXT_ADMIN_EMAIL' => '管理者メールアドレス',
    'TEXT_ADMIN_USERNAME' => '管理者ユーザー名',
    'TEXT_BUTTON_REQUEST_RESET' => 'パスワードをリセットする',
    'TEXT_BUTTON_LOGIN' => 'ログイン',
    'TEXT_BUTTON_CANCEL' => 'キャンセル',
    'ERROR_WRONG_EMAIL' => '入力されたメールアドレスが間違っています。',
    'ERROR_WRONG_EMAIL_NULL' => '正しく入力してください。',
    'MESSAGE_PASSWORD_SENT' => 'パスワードリセットを実行しました。入力したメールアドレスがデータベースの管理者アカウントと一致する場合は、新しいパスワードがそのメールアドレスに送信されます。<br>メールを確認して、[ログイン]から、発行された新しい仮パスワードでログインしてください。</p>',
    'TEXT_EMAIL_SUBJECT_PWD_RESET' => 'パスワード再発行のご依頼がありました',
    'TEXT_EMAIL_MESSAGE_PWD_RESET' => '%1$s から新しいパスワードの発行要請がありました。' . "\n\n" . '新しい仮パスワード:' . "\n\n" . '%2$s' . "\n\nログイン画面にて仮パスワードを入力後、新しいパスワードを設定して下さい。\n\nこの仮パスワードは24時間で期限切れになります。\n\n\n",
    'TEXT_EMAIL_SUBJECT_PWD_FAILED_RESET' => 'アクセス警告！',
    'TEXT_EMAIL_MESSAGE_PWD_FAILED_RESET' => "%s による管理者パスワードリセットの試みは失敗しました。\n\n入力されたメールアドレスもしくは、ユーザー名が正しくありません。\n\nもし、同じ電子メール アドレスを使っている管理者アカウントがある場合は、パスワード再設定を間違いなく行うために、アカウント毎に固有の電子メール アドレスを割り当てることを検討してください。",
];

return $define;

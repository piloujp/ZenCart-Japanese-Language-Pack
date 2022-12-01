<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Scott C Wilson 2022 Jan 11 New in v1.5.8-alpha $
*/

$define = [
    'HEADING_TITLE' => '管理者ログイン',
    'HEADING_TITLE_EXPIRED' => '管理者ログイン - パスワードは有効期限切れになりました。',
    'TEXT_SUBMIT' => '送信',
    'TEXT_ADMIN_PASS' => '管理者パスワード: ',
    'TEXT_ADMIN_OLD_PASSWORD' => '現在のパスワード:',
    'TEXT_ADMIN_NEW_PASSWORD' => '新しいパスワード:',
    'TEXT_ADMIN_CONFIRM_PASSWORD' => '新しいパスワード(確認用):',
    'ERROR_WRONG_LOGIN' => 'ユーザIDまたはパスワードが間違っています。',
    'ERROR_SECURITY_ERROR' => 'ログイン時にセキュリティエラーが発生しました。',
    'TEXT_PASSWORD_FORGOTTEN' => 'パスワードをお忘れですか ',
    'LOGIN_EXPIRY_NOTICE' => '',
    'ERROR_PASSWORD_EXPIRED' => '注: パスワードは有効期限切れになりました。新しいパスワードを選択して下さい。パスワードは<strong>半角英数字を混在させ、7文字以上でなければなりません。</strong>',
    'TEXT_TEMPORARY_PASSWORD_MUST_BE_CHANGED' => 'セキュリティ上の理由で、パスワードを変更していただく必要があります。新しいパスワードをご入力下さい。<br />パスワードは <strong>半角英数字を混在させ、7文字以上でなければなりません。</strong>',
    'SUCCESS_PASSWORD_UPDATED' => 'パスワードが更新されました',
    'TEXT_EMAIL_SUBJECT_LOGIN_FAILURES' => '管理ログイン失敗通知',
    'TEXT_EMAIL_MULTIPLE_LOGIN_FAILURES' => '重要なお知らせ: 管理アカウントへの複数回の不成功ログインがありました。 管理アカウントの保護、及び、システム・セキュリティのために、6度ログインに失敗すると、最低30分間ログインがロックされ、その後30分以内に正しいパスワードを入力しても、ログインすることはできません。 この状態で、さらにログインを試みた場合、ロックされる時間がさらに30分追加されます。 この間は、パスワードのリセットなども行うことができません。 ご迷惑をおかけし、申し訳ありません。\n\n最後のログインはこのIPアドレスからアクセスされました: %s。\n\n\n',
    'EXPIRED_DUE_TO_SSL' => '注：サイトが非SSL（安全性が低い）からSSL保護（安全性が高い）に変更されたため、パスワードは期限切れになりました。 SSL保護された環境でパスワードを変更することは、セキュリティを強化するための重要なステップです。 ご不便をかけて申し訳ありません。 標準パスワードの有効期限規則が適用されます。',
];

return $define;

<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2024 Mar 23 New in v2.1.0-alpha1 $
*/

$define = [
    'HEADING_TITLE' => '管理者ログインの確認',
    'TEXT_MFA_INTRO' => '以下の認証アプリからのOTPコード（ワンタイム パスワード）を入力してください。',
    'TEXT_MFA_BOTTOM' => '認証アプリにアクセスできなくなった場合は、ストアの所有者にお問い合わせください。',
    'TEXT_SUBMIT' => '送信',
    'TEXT_MFA_INPUT' => 'コードを入力する',
    'TEXT_MFA_SELECT' => '多要素認証の方法を選択します。',
    'ERROR_WRONG_CODE' => '入力したトークンは無効です。',
    'ERROR_SECURITY_ERROR' => 'ログインしようとしたときにセキュリティ エラーが発生しました。',
    'TEXT_ERROR_ATTEMPTED_MFA_LOGIN_WITHOUT_CSRF_TOKEN' => '多要素認証の検証中に無効な CSRF (クロスサイト リクエスト フォージェリ) トークンが発生しました。',
    'TEXT_ERROR_ATTEMPTED_ADMIN_MFA_LOGIN_WITH_INVALID_CODE' => '二要素認証中の無効な MFA トークン (多要素認証)',
];

return $define;

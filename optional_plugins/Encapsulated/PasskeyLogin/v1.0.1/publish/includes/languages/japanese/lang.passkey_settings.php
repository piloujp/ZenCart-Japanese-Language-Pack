<?php
/**
 * Module: PasskeyLogin
 *
 * @requires    Zen Cart 2.1.0 or later, PHP 8.0+ with OpenSSL
 * @author      Marcopolo
 * @copyright   2026
 * @license     GNU General Public License (GPL) - https://www.zen-cart.com/license/2_0.txt
 * @version     1.0.0
 * @updated     08-23-2026
 * @github      https://github.com/CcMarc/PasskeyLogin
 */
// Language file for the passkey_settings page. PUBLISHED by the installer
// into includes/languages/english/; deploy changes by reinstalling.
$define = [
    'NAVBAR_TITLE' => 'パスキー',
    'HEADING_TITLE' => 'パスキー',
    'PKL_PAGE_INTRO' => 'パスキーを使用すると、パスワードを入力する代わりに、指紋、顔認証、またはデバイスのPINを使ってサインインできます。パスキーはデバイスやパスキープロバイダーによって保護され、暗号技術を用いてこのサイトと紐付けられています。これにより、秘密鍵の情報を当社のシステムに保存することなく、フィッシング攻撃に強い安全なサインインが可能になります。',
    'PKL_PAGE_NONE_YET' => 'まだパスキーを追加していません。',
    'PKL_PAGE_MAX_REACHED' => 'このアカウントのパスキー数が上限に達しました。新しいパスキーを追加する前に、既存のものを一つ削除してください。',
    'PKL_PAGE_UNAVAILABLE' => '現在、パスキーでのサインインはご利用いただけません。後ほど改めてお試しください。',
    'PKL_BACK_TO_ACCOUNT' => 'マイアカウントに戻る',
    'PKL_BUTTON_ADD' => 'パスキーを追加する',
    'PKL_BUTTON_SAVE_NAME' => '保存名',
    'PKL_BUTTON_REMOVE' => '削除',
    'PKL_BUTTON_REMOVE_YES' => 'はい、削除します',
    'PKL_BUTTON_CANCEL' => 'キャンセル',
    'PKL_CONFIRM_REMOVE' => 'このパスキーを削除しますか？削除すると、そのパスキーではサインインできなくなります。',
    'PKL_LABEL_ADDED' => '追加した',
    'PKL_LABEL_LAST_USED' => '最後に使用',
    'PKL_JS_UNSUPPORTED' => 'お使いのブラウザはパスキーに対応していません。引き続き、他の方法でサインインできます。',
    'PKL_JS_GENERIC' => 'パスキーの設定中に問題が発生しました。もう一度お試しください。',
    'PKL_JS_CANCELLED' => 'パスキーの設定がキャンセルされました。いつでも再度お試しいただけます。',
    'PKL_JS_ALREADY' => 'このデバイスには、すでにお客様のアカウントのパスキーが登録されています。',
    'PKL_JS_WORKING' => 'デバイスに表示される指示に従って、パスキーの設定を完了してください。',
    'PKL_SUCCESS_REMOVED' => 'パスキーが削除されました。',
    'PKL_SUCCESS_RENAMED' => 'パスキー名が更新されました。',
    'PKL_ERROR_MAX_KEYS' => 'このアカウントのパスキーの最大数に達しました。',
    'PKL_ERROR_REG_FAILED' => 'そのパスキーを確認できませんでした。もう一度お試しください。',
    'PKL_ERROR_ALREADY_REGISTERED' => 'そのパスキーは、すでにお客様のアカウントに登録されています。',
    'PKL_ERROR_LOGIN_FAILED' => 'そのパスキーではサインインできませんでした。別のサインイン方法をお試しください。',
    'PKL_ERROR_UNKNOWN_PASSKEY' => 'そのパスキーは、こちらのサイトのアカウントに紐付いていません。削除された可能性があります。別の方法でサインインし、アカウントページから新しいパスキーを追加してください。',
    'PKL_ERROR_BANNED' => 'このアカウントではサインインできません。サポートが必要な場合は、ストアにお問い合わせください。',
    'PKL_ERROR_RATE' => 'この接続からのパスキー試行回数が多すぎます。しばらく待ってから再度試すか、別のサインイン方法を使用してください。',
    'PKL_ERROR_SERVER' => 'パスキーによるサインインは一時的に利用できません。別のサインイン方法をご利用ください。',
    'PKL_ERROR_METHOD' => 'ページを再読み込みして、もう一度お試しください。',
    'PKL_ERROR_LOGIN_REQUIRED' => 'パスキーを管理するには、サインインしてください。',
    'PKL_DEFAULT_LABEL_PREFIX' => 'パスキーが追加されました',
    'PKL_LABEL_DEVICE_PHONE' => 'スマートフォンまたはタブレット',
    'PKL_LABEL_DEVICE_KEY' => 'セキュリティキー',
    'PKL_LABEL_DEVICE_THIS' => 'このデバイス',
];
return $define;

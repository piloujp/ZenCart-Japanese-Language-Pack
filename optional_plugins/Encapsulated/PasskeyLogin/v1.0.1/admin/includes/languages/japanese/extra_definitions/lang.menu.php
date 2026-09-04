<?php
/**
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piloujp 2026 Aug 27 Modified in v2.2.2 $
*/

$define = [
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_PASSKEYLOGIN' => 'パスキーログイン',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_PASSKEYLOGIN' => 'パスワードを入力する代わりに、パスキー（Face ID、指紋認証、Windows Hello、またはセキュリティキー）を使用してサインインできるようにします。WebAuthn標準を採用しています。パスキーはログインページのブラウザの自動入力機能に表示されるため、パスキーを使用しない顧客に対して余分なボタンが追加されることはありません。',
// Admin configuration
    'CFGTITLE_PKL_ENABLED' => 'パスキーでのログインを有効にする',
    'CFGDESC_PKL_ENABLED' => 'マスタースイッチ。これが無効（false）の場合、このプラグインはどのページにも一切影響を及ぼしません。',
    'CFGTITLE_PKL_NUDGE_ENABLED' => '登録を促す通知を表示する',
    'CFGDESC_PKL_NUDGE_ENABLED' => '「マイアカウント」ページに、パスキー未設定の顧客に対してパスキーの追加を促すバナーを1回だけ表示します。顧客はこのバナーを永続的に非表示にすることができます。',
    'CFGTITLE_PKL_MAX_KEYS_PER_CUSTOMER' => '顧客あたりのパスキーの最大数',
    'CFGDESC_PKL_MAX_KEYS_PER_CUSTOMER' => '一つのアカウントで保持できるパスキーの数。一般的なユーザーは1〜2台のデバイスを登録します。',
    'CFGTITLE_PKL_RATE_IP_HOUR' => 'IPあたりの時間単価上限',
    'CFGDESC_PKL_RATE_IP_HOUR' => 'IPアドレスごとの1時間あたりの最大パスキーチャレンジリクエスト数。制限を無効にするには0に設定してください。',
    'CFGTITLE_PKL_RP_ID' => '信頼できるパーティ識別子の置き換え',
    'CFGDESC_PKL_RP_ID' => '通常は空欄のままにします。登録可能なドメインは自動的に導出され、これによりステージング用サブドメインが本番環境のパスキーを共有できるようになります。`.co.uk` のようなマルチパートTLDの場合にのみ、明示的に指定してください。',
    'CFGTITLE_PKL_RP_NAME' => '信頼できるパーティの表示名',
    'CFGDESC_PKL_RP_NAME' => 'ブラウザのパスキーのプロンプトに表示されます。ストア名を使用する場合は空欄にしてください。',
    'CFGTITLE_PKL_DEBUG_LOG' => 'デバッグログ出力',
    'CFGDESC_PKL_DEBUG_LOG' => 'このオプションを有効にすると、JSON形式の行がlogs/passkey_login_debug.logファイルに書き込まれます。通常動作モードでは無効にしてください。',
    'CFGTITLE_PKL_VERSION' => '「パスキーログイン」バージョン',
    'CFGDESC_PKL_VERSION' => 'インストール済みのプラグインバージョン。自動的に管理されます。',
// Configuration_group
    'CFG_GRP_TITLE_PASSKEY_LOGIN' => 'パスキーでログイン',
    'CFG_GRP_DESC_PASSKEY_LOGIN' => 'パスキー（WebAuthn）によるサインイン設定',
];

return $define;

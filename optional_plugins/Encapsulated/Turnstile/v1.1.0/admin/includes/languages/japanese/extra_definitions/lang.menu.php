<?php

/**
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piloujp 2026 Oct 14 Modified in v3.3.0-dev $
*/

$pluginForumUrl = 'https://www.zen-cart.com/threads/207429';
$pluginGithubUrl = 'https://github.com/dbltoe/Cloudflare_Turnstile';

$ButtonGap = '4px';
$ButtonStyle = ' target="_blank" rel="noopener noreferrer" class="btn btn-primary" role="button" style="margin:0 ' . $ButtonGap . ' 0 0;padding-left:8px;padding-right:8px"';

$ButtonsLinks =
    '<div style="margin:10px 0 0;padding:0 0 0 ' . $ButtonGap . '">'
    . '<a href="' . (defined('DIR_WS_CATALOG') ? DIR_WS_CATALOG : '/') . 'zc_plugins' . str_replace(dirname(__DIR__, 7), '', dirname(__DIR__, 5)) . '/readme.html"' . $ButtonStyle . '>お読みください</a>'
    . '<a href="' . $pluginForumUrl . '"' . $ButtonStyle . '>フォーラム</a>'
    . '<a href="' . $pluginGithubUrl . '"' . $ButtonStyle . '>GitHub</a>'
    . '</div>';

$define = [
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_TURNSTILE' => 'Cloudflareの回転式ゲート',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_TURNSTILE' => 'アカウント作成フォーム（「アカウント作成」ページ、ログインページ内の新規顧客用フォーム、「ワンページ・チェックアウト」の登録フォーム）および「お問い合わせ」フォームに、Cloudflareの無料ボット対策ツール「Turnstile」を追加します。認証が欠落している場合や認証に失敗した場合は、送信を拒否します。テンプレートファイルの変更は一切不要です。「一般設定　> Cloudflare Turnstile」の項目にサイトキー（Site Key）とシークレットキー（Secret Key）を入力するまでは、機能は有効になりません。'
    . $ButtonsLinks,
// Turnstile - configuration
    'CFGTITLE_TURNSTILE_STATUS' => 'Cloudflare Turnstileを有効にしますか？',
    'CFGDESC_TURNSTILE_STATUS' => 'マスタースイッチ。<strong>true</strong>に設定すると、以下で選択したフォームに対してTurnstileチェックが有効になり、チェックがない場合やチェックに失敗した場合は送信が拒否されます。以下の両方のキーが入力されるまでは、何も動作しません。<strong>false</strong>に設定すると、アンインストールすることなく機能を無効にできます。',
    'CFGTITLE_TURNSTILE_SITE_KEY' => 'サイトキー：',
    'CFGDESC_TURNSTILE_SITE_KEY' => 'CloudflareダッシュボードのTurnstileから取得した<strong>サイトキー（Site Key）</strong>です。このサイトのドメインがホスト名に含まれているウィジェット用のものであり、公開情報としてページ上に表示されます。',
    'CFGTITLE_TURNSTILE_SECRET_KEY' => 'シークレットキー：',
    'CFGDESC_TURNSTILE_SECRET_KEY' => '同じウィジェットに対応する<strong>シークレットキー</strong>です。各送信内容を検証するために、サーバーからCloudflareに対してのみ送信されます。',
    'CFGTITLE_TURNSTILE_CREATE_ACCOUNT' => 'アカウント作成を保護する',
    'CFGDESC_TURNSTILE_CREATE_ACCOUNT' => 'アカウントを作成するすべてのフォーム（「アカウント作成」ページ、ログインページ内の新規顧客用フォーム、および「ワンページ・チェックアウト」の登録フォーム）をチェックします。',
    'CFGTITLE_TURNSTILE_CONTACT_US' => '「お問い合わせ」を保護する',
    'CFGDESC_TURNSTILE_CONTACT_US' => '「お問い合わせ」フォームからメールが送信される前に、その内容を確認します。',
// Turnstile - configuration_group
    'CFG_GRP_TITLE_CLOUDFLARE_TURNSTILE' => '%%BOX_CONFIGURATION_TURNSTILE%%',
    'CFG_GRP_DESC_CLOUDFLARE_TURNSTILE' => '%%BOX_CONFIGURATION_TURNSTILE%%設定',
];

return $define;

<?php
/**
 * @copyright Copyright 2003-2025 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piloujp 2025 June 25 Modified in v2.1.0 $
*/

$define = [
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_ACCESSBLOCKER' => 'アクセスブロッカー',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_ACCESSBLOCKER' => 'このドロップイン プラグインは、ストアに管理者レベルのコントロールを提供し、ask_a_question、contact_us、create_account、login、OPC guest-checkout ページで提供されるアクションをブロック (または制限) できるようにします。',
// Admin configuration
    'CFGTITLE_ACCESSBLOCK_ENABLED' => 'アクセスブロッカーを有効にしますか？',
    'CFGDESC_ACCESSBLOCK_ENABLED' => '有効にすると、プラグインは、ipdata.co サービスによって識別された「脅威」や、以下に識別される追加要素に基づいて、ストアの <code>ask_a_question</code>、<code>contact_us</code>、<code>create_account</code>、<code>login</code> ページへの不要なアクセスをブロックします。<br><br>デフォルト： <b>false</b>',
    'CFGTITLE_ACCESSBLOCK_IPDATA_API_KEY' => 'ipData サービス： API キー',
    'CFGDESC_ACCESSBLOCK_IPDATA_API_KEY' => '<a href=\"https://ipdata.co/registration.html\" target=\"_blank\" rel=\"noreferrer\">ipData</a> サービスから取得したAPIキーを入力してください。ipdata.coの情報を使用しない場合は、この設定を空白のままにしてください。<br>',
    'CFGTITLE_ACCESSBLOCK_USE_EU_ENDPOINT' => 'ipdata.co EU エンドポイントを使用しますか？',
    'CFGDESC_ACCESSBLOCK_USE_EU_ENDPOINT' => '<br>脅威リクエストにipdata.co EUエンドポイントを使用するかどうかを指定します。<em>true</em>に設定すると、送信されたエンドユーザーデータがEU域内に留まるよう、専用のEUエンドポイントが使用されます。<br><br>デフォルト： <b>false</b>',
    'CFGTITLE_ACCESSBLOCK_RESTRICT_THREAT_ACCESS' => '脅威によるアクセスを完全に制限しますか？',
    'CFGDESC_ACCESSBLOCK_RESTRICT_THREAT_ACCESS' => '<br>脅威が検出された場合、アクセス ブロッカーが「HTTP 410 (Gone)」を強制してアクセスを<b>完全に</b>制限するかどうかを示します。<br><br>デフォルト: <b>false</b>',
    'CFGTITLE_ACCESSBLOCK_BLOCKED_COUNTRIES' => 'ブロック対象：国',
    'CFGDESC_ACCESSBLOCK_BLOCKED_COUNTRIES' => 'ブロックする国の２文字のISO国コードをカンマ区切りで入力してください。これらの国から発信されるすべてのIPアドレスがブロックされます。<br><br><b>注:</b> <em>ipData Service: API Key</em>が設定されていない場合、この設定は適用されません。',
    'CFGTITLE_ACCESSBLOCK_BLOCKED_ORGS' => 'ブロック対象：組織',
    'CFGDESC_ACCESSBLOCK_BLOCKED_ORGS' => 'ブロックする「組織」（<code>ipData</code> レスポンスに基づく）をカンマ区切りのリストで入力します。IP アドレスに関連付けられた組織に、ここで入力した文字列のいずれかが<em>含まれている</em>場合、アクセスはブロックされます。<br><br><b>注：</b> <em>ipData サービス： API キー</em>が設定されていない場合、この設定は適用されません。',
    'CFGTITLE_ACCESSBLOCK_BLOCKED_IPS' => 'ブロック基準： IPアドレス',
    'CFGDESC_ACCESSBLOCK_BLOCKED_IPS' => 'ブロックする<em>特定の</em>IPアドレスをカンマ区切りのリストで入力してください。IPアドレスの上位セグメントのみ（例：<code>192.168.1.</code>）を入力すると、一致するすべてのIPアドレス（例：<code>192.168.1.0-192.168.1.255</code>）がブロックされます。',
    'CFGTITLE_ACCESSBLOCK_WHITELISTED_IPS' => 'IPアドレス： ホワイトリスト',
    'CFGDESC_ACCESSBLOCK_WHITELISTED_IPS' => 'カンマ区切りのリストを使用して、<em>特定の</em>IPアドレスを<em>無条件に有効</em>にします。IPアドレスの上位セグメントのみ（例：<code>192.168.1.</code>）を入力すると、一致するすべてのIPアドレス（例：<code>192.168.1.0-192.168.1.255</code>）は、ipdata.coによってスレッドとして識別されていてもブロックされません。',
    'CFGTITLE_ACCESSBLOCK_BLOCKED_HOSTS' => 'ブロック基準：ホストアドレス',
    'CFGDESC_ACCESSBLOCK_BLOCKED_HOSTS' => 'ブロックする「ホストアドレス」をカンマ区切りのリストで入力してください。IPアドレスの発信元ホストアドレスに、ここに入力した文字列のいずれかが含まれている場合、アクセスはブロックされます。',
    'CFGTITLE_ACCESSBLOCK_BLOCKED_EMAILS' => 'ブロック方法：メールアドレス',
    'CFGDESC_ACCESSBLOCK_BLOCKED_EMAILS' => 'ブロックする「メールアドレス」をカンマ区切りのリストで入力してください。入力したメールアドレスに、ここに入力した文字列のいずれかが<em>含まれている</em>場合、アクセスはブロックされます。<br><br>特定のメールアドレス（<code>joe@example.com</code>）またはメールドメイン全体（<code>@example.com</code>）へのアクセスをブロックできます。',
    'CFGTITLE_ACCESSBLOCK_WHITELISTED_EMAILS' => 'メールアドレス：ホワイトリスト',
    'CFGDESC_ACCESSBLOCK_WHITELISTED_EMAILS' => '無条件に有効にする「メールアドレス」を、カンマ区切りのリストで入力してください。入力したメールアドレスに、ここに入力した文字列のいずれかが<em>含まれている</em>場合、アクセスは<em>ブロックされません</em>。<br><br>特定のメールアドレス（<code>joe@example.com</code>）またはメールドメイン全体（<code>@example.com</code>）のアクセスを有効にできます。',
    'CFGTITLE_ACCESSBLOCK_BLOCKED_PHRASES' => 'ブロック基準：メッセージキーワード',
    'CFGDESC_ACCESSBLOCK_BLOCKED_PHRASES' => '<code>contact_us</code> メッセージ内でブロックする単語を、カンマ区切りのリストで入力してください。ここに入力した単語のいずれかがメッセージに含まれている場合、関連する <em>contact-us</em> メールは送信されません。',
    'CFGTITLE_ACCESSBLOCK_DEBUG' => 'デバッグを有効にしますか？',
    'CFGDESC_ACCESSBLOCK_DEBUG' => '有効にすると、プラグインによって拒否されたアクセスの月次ログ <code>/logs/accesses_blocked_YYYY_mm.log</code> が作成されます。',
];

return $define;

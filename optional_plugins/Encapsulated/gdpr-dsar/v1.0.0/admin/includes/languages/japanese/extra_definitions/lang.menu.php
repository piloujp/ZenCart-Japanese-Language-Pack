<?php
/**
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piloujp 2026 Mar 29 Modified in v2.2.1 $
*/

$define = [
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_GDPR_DSAR' => 'GDPR / DSAR マネージャー',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_GDPR_DSAR' => 'アカウント専用のデータ主体アクセス要求（DSAR）の受付、管理者による審査済みの処理、エクスポート配信、消去ワークフロー、および同意ログ記録。',
// Admin configuration
    'CFGTITLE_GDPR_DSAR_ENABLE' => 'GDPR/DSARプラグインを有効にしますか？',
    'CFGDESC_GDPR_DSAR_ENABLE' => '顧客側のDSARリクエストと管理者処理ツールを有効にする。',
    'CFGTITLE_GDPR_DSAR_EXPORT_EXPIRY_DAYS' => 'エクスポートリンクの有効期限（日数）',
    'CFGDESC_GDPR_DSAR_EXPORT_EXPIRY_DAYS' => 'エクスポート用ダウンロードリンクの有効期限が切れるまでの日数。',
    'CFGTITLE_GDPR_DSAR_MAX_ACTIVE_REQUESTS_PER_TYPE' => 'タイプごとの最大アクティブリクエスト数',
    'CFGDESC_GDPR_DSAR_MAX_ACTIVE_REQUESTS_PER_TYPE' => '顧客がDSARの種類ごとに持つことができるアクティブなリクエストの最大数。',
    'CFGTITLE_GDPR_DSAR_EXPORT_STORAGE_RELATIVE' => 'エクスポートストレージフォルダ',
    'CFGDESC_GDPR_DSAR_EXPORT_STORAGE_RELATIVE' => '生成されたエクスポート用ZIPファイルを保存するために使用される、カタログルートからの相対パス。',
    'CFGTITLE_GDPR_DSAR_SEND_CUSTOMER_EMAILS' => '顧客へのDSARライフサイクルメールを送信しますか？',
    'CFGDESC_GDPR_DSAR_SEND_CUSTOMER_EMAILS' => 'DSAR（データ主体アクセス要求）が提出、承認、却下、完了した際に、顧客に通知を送信します。',
    'CFGTITLE_GDPR_DSAR_NOTIFY_ADMIN_NEW_REQUEST' => '新しいDSARリクエストについて管理者に通知しますか？',
    'CFGDESC_GDPR_DSAR_NOTIFY_ADMIN_NEW_REQUEST' => '顧客が新しいDSARリクエストを送信した際に、店舗オーナーに通知メールを送信する。',
    'CFGTITLE_GDPR_DSAR_SLA_DAYS' => 'DSAR SLA目標（日数）',
    'CFGDESC_GDPR_DSAR_SLA_DAYS' => '管理者による監視において、DSARリクエストが期限切れとみなされるまでの目標日数。',
];

return $define;

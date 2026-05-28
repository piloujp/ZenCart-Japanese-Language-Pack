<?php
/**
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: lat9 2026 Mar 17 Modified in v2.2.1 $
*/
$define = [
    'HEADING_TITLE' => 'プラグインの管理',

    'ERROR_CANT_REMOVE_DIR' => 'ディレクトリを削除できませんでした： %s',
    'ERROR_INVALID_SYNTAX' => '構文が無効なため、テーブルを識別できません：',
    'ERROR_NOT_FOUND_IN_SQL_FUNCTIONS_MAP' => 'SQLステートメントを確認してください。SQL 関数マップが見つかりません：',
    'ERROR_REMOVE_FILES_CANT_DELETE' => 'Unable to remove file: %s',
    'ERROR_REMOVE_FILES_CONTEXT' => 'Invalid context supplied (%s), it must be either "catalog" or "admin".',
    'ERROR_SQL_PATCH' => 'SQL インストールの処理中にエラーが発生しました。　',
    'ERROR_UNKNOWN_FAILURE' => 'プラグインは%sアクションを拒否しましたが、その理由を示すメッセージは表示しませんでした。',
        'ERROR_UNKNOWN_FAILURE_DISABLE' => '無効にする',
        'ERROR_UNKNOWN_FAILURE_ENABLE' => '有効にする',
        'ERROR_UNKNOWN_FAILURE_INSTALL' => 'インストール',
        'ERROR_UNKNOWN_FAILURE_UNINSTALL' => 'アンインストール',
        'ERROR_UNKNOWN_FAILURE_UPGRADE' => 'アップグレード',

    'TABLE_HEADING_FILE_SPACE' => 'ファイルサイズ',
    'TABLE_HEADING_KEY' => 'プラグイン Key',
    'TABLE_HEADING_NAME' => '名称',
    'TABLE_HEADING_VERSION_INSTALLED' => 'バージョン',

    'TEXT_ALL_STATUSES' => '全て',
    'TEXT_CLEANUP' => 'クリーンアップ',
    'TEXT_CLEANUP_ERROR' => 'ファイルの許可を確認してください。一部のディレクトリが削除されませんでした',
    'TEXT_CLEANUP_SUCCESS' => 'ディレクトリが正常に削除されました',
    'TEXT_CONFIRM' => '確認',
    'TEXT_CONFIRM_DISABLE' => '本当にこのプラグインを無効にしますか？',
    'TEXT_CONFIRM_ENABLE' => '本当にこのプラグインを有効にしますか？',
    'TEXT_CONFIRM_UNINSTALL' => '本当にこのプラグインをアンインストールしますか？',
    'TEXT_CONFIRM_UPGRADE' => '本当にこのプラグインをアップグレードしますか？',
    'TEXT_DISABLE' => '無効',
    'TEXT_DISABLE_SUCCESS' => 'プラグインを無効にしました',
    'TEXT_ENABLE' => '有効',
    'TEXT_ENABLE_SUCCESS' => 'プラグインを有効にしました',
    'TEXT_INFO_CLEANUP' => '不要なプラグイン バージョンのディレクトリを削除',
    'TEXT_INFO_CONFIRM_CLEAN' => 'クリーンアップ/削除するバージョン ディレクトリを確認してください',
    'TEXT_INFO_DESCRIPTION' => '<strong>プラグインの説明：</strong>',
    'TEXT_INFO_SELECT_CLEAN' => '削除したいバージョンを選択してください',
    'TEXT_INFO_UPGRADE' => 'アップグレードしたいバージョンを選択してください。',
    'TEXT_INFO_UPGRADE_CONFIRM' => 'アップグレードするバージョン %s',
    'TEXT_INFO_UPGRADE_WARNING' => '',
    'TEXT_INSTALL' => 'インストール',
    'TEXT_INSTALL_SUCCESS' => 'プラグインが正常にインストールされました',
    'TEXT_INSTALLED_DISABLED' => 'インストール済み（無効）',
    'TEXT_INSTALLED_ENABLED' => 'インストール済み（有効）',
    'TEXT_LABEL_STATUS' => '状態：　',
    'TEXT_NEW_PLUGIN_DOWNLOAD_AVAILABLE' => '新しいバージョン%1$sは、<a target="_blank" rel="noreferrer" href="https://www.zen-cart.com/downloads.php?do=file&id=%2$s">サポート フォーラム</a>からダウンロードできます。',
    'TEXT_NOT_INSTALLED' => '未インストール',
    'TEXT_PLUGIN_AUTHOR' => '<strong>作成者：</strong> %s',
    'TEXT_PLUGIN_DOWNLOAD_PAGE' => '<a target="_blank" rel="noreferrer" href="https://www.zen-cart.com/downloads.php?do=file&id=%s">プラグインダウンロードページ</a>',
    'TEXT_UNINSTALL' => 'アンインストール',
    'TEXT_UNINSTALL_SUCCESS' => 'プラグインが正常にアンインストールされました',
    'TEXT_UPGRADE' => 'アップグレード',
    'TEXT_UPGRADE_AVAILABLE' => 'アップグレードが可能です',
    'TEXT_UPGRADE_SUCCESS' => 'プラグインが正常にアップグレードされました',
    'TEXT_VERSION_INSTALLED' => '<strong>インストール済みバージョン：</strong>%s',

    'WARNING_NONENCAPSULATED_REMOVAL' => '<b>注意：</b>このプラグインをインストールすると、非カプセル化バージョンによって提供されるファイル（存在する場合）が<b>完全に</b>削除されます。',
    'WARNING_TEMPLATE_IS_ACTIVE' => 'このプラグインには、<a href="%1$s">%2$s</a>ツールによって現在選択されているテンプレートが含まれています。別のテンプレートを選択する前にプラグインをアンインストールすると、予期せぬ結果が生じる可能性があります。',
];

return $define;

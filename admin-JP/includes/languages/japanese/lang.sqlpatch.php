<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: torvista 2022 Feb 26 New in v1.5.8-alpha $
*/

$define = [
    'HEADING_TITLE' => 'SQLパッチのインストール',
    'HEADING_INFO' => 'SQL Query Executor を使用すると、スクリプトをテキストエリアに貼り付けるか、スクリプトを含むテキスト ファイルをアップロードすることで、SQL クエリをデータベースで直接実行できます。プラグイン用のフィールドの手動インストールと、独自の修正/追加を目的としています。',
    'HEADING_WARNING_INSTALLSCRIPTS' => '注: ZenCartのデータベースアップグレードは、このページからは実行できません。<br />新しい <strong>zc_install</strong> フォルダをアップロードし、そこからアップグレードを実行して下さい。',
    'HEADING_WARNING' => 'スクリプトの実行前にデータベースのフルバックアップを行ってください',
    'TEXT_QUERY_RESULTS' => 'クエリの結果:',
    'TEXT_ENTER_QUERY_STRING' => 'クエリ文を貼り付けて <br />実行してください。&nbsp;&nbsp;<br /><br />必ず「;」で<br />終わってください。',
    'TEXT_QUERY_FILENAME' => 'ファイルから<br />読み込む:',
    'ERROR_NOTHING_TO_DO' => 'エラー: クエリ、またはクエリファイルがありません',
    'SQLPATCH_HELP_TEXT' => 'SQL Query Executor を使用すると、スクリプトをテキストエリアに貼り付けるか、スクリプトを含むテキスト ファイルをアップロードすることで、SQL クエリを直接実行できます。',
    'REASON_TABLE_ALREADY_EXISTS' => 'Tableを作成することができません。既に存在しています。',
    'REASON_TABLE_DOESNT_EXIST' => 'Tableを消去することができません。存在していません。',
    'REASON_TABLE_NOT_FOUND' => 'Tableがないため消去することができません。',
    'REASON_CONFIG_KEY_ALREADY_EXISTS' => 'configuration_keyを挿入できません。既に存在しています',
    'REASON_COLUMN_ALREADY_EXISTS' => 'カラムを追加できません、既に存在しています',
    'REASON_COLUMN_DOESNT_EXIST_TO_DROP' => '存在しないためカラムを削除できません。',
    'REASON_COLUMN_DOESNT_EXIST_TO_CHANGE' => '存在しないためカラムを変更することができません',
    'REASON_PRODUCT_TYPE_LAYOUT_KEY_ALREADY_EXISTS' => 'prod-type-layout configuration_keyを祖運有することができません。既に存在しています。',
    'REASON_INDEX_DOESNT_EXIST_TO_DROP' => 'テーブル %2$s のインデックス %1$s は存在しないため削除できません。',
    'REASON_PRIMARY_KEY_DOESNT_EXIST_TO_DROP' => '存在しないためTable上のprimary keyを削除できません',
    'REASON_INDEX_ALREADY_EXISTS' => 'インデックス %1$s は既に存在するため、テーブル %2$s に追加できません。',
    'REASON_PRIMARY_KEY_ALREADY_EXISTS' => 'primary keyをtableに追加できません。既に存在しています',
    'REASON_NO_PRIVILEGES' => 'User '.DB_SERVER_USERNAME.'@'.DB_SERVER.' データベースへの権限がありません '.DB_DATABASE.'.',
    'ERROR_RENAME_TABLE' => 'RENAME TABLE コマンドは、SQLパッチツールでは利用できません。代わりに phpMyAdmin などをご利用ください。',
    'ERROR_LINE_INCOMPLETE' => 'クエリが不完全です：終了のセミコロンがありません。',
    'TEXT_EXECUTE_SUCCESS' => '成功： %u 件のステートメントが処理されました。',
    'ERROR_EXECUTE_FAILED' => 'クエリ失敗： %u 件のステートメントが処理されました。',
    'ERROR_EXECUTE_IGNORED' => '注意： %u 件のステートメントが無視されました。データベーステーブル "upgrade_exceptions" より、詳しい情報をご確認ください。',
    'TEXT_UPLOADQUERY_SUCCESS' => '成功： %u 件のステートメントが、ファイルアップロードで処理されました。',
    'ERROR_UPLOADQUERY_FAILED' => 'クエリ失敗： %u 件のステートメントが、ファイルアップロードで処理されました。',
    'ERROR_UPLOADQUERY_IGNORED' => '注意： %u 件のステートメントが、ファイルアップロードで無視されました。データベーステーブル "upgrade_exceptions" より、詳しい情報をご確認ください。',
];

return $define;

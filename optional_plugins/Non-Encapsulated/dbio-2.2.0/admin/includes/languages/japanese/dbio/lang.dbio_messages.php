<?php
// -----
// Part of the DataBase I/O Manager (aka DbIo) plugin, created by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2015-2020, Vinos de Frutas Tropicales.
// These definitions are used by this sequencing class as well as the report-specific handlers.

$define = [
    //-Use the "section symbol" (??) as the invalid-character replacement
    'DBIO_INVALID_CHAR_REPLACEMENT' => 167,
    // Messages used by the DbIo class.
    'DBIO_FORMAT_TEXT_NO_DESCRIPTION' => 'この DbIo ハンドラーには説明がありません。',
    'DBIO_MESSAGE_NO_HANDLERS_FOUND' => 'DbIo ハンドラーが見つからないため、レポートを生成できません。',
    'DBIO_FORMAT_MESSAGE_NO_HANDLER' => 'DbIo ハンドラー クラス ファイル %s がありません。',
    'DBIO_FORMAT_MESSAGE_NO_CLASS' => 'ハンドラー ファイル %2$s に「%1$s」という名前の DbIo ハンドラー クラスがありません。',
    'DBIO_MESSAGE_EXPORT_NOT_INITIALIZED' => 'エクスポートが中止されました：以前にハンドラーが指定されていません。',
    'DBIO_MESSAGE_IMPORT_NOT_INITIALIZED' => 'インポートが中止されました：以前にハンドラーが指定されていません。',
    'DBIO_FORMAT_MESSAGE_EXPORT_NO_FP' => 'エクスポートが中止されました。出力ファイル %s の作成に失敗しました。',
    'DBIO_EXPORT_NOTHING_TO_DO' => 'DbIo エクスポート：要求された条件に一致するレコードがありませんでした。',
    'DBIO_FORMAT_MESSAGE_IMPORT_FILE_MISSING' => 'インポートが中止されました：入力ファイル (%s) がありません。',
    'DBIO_WARNING_ENCODING_ERROR' => 'DbIo インポート：入力を ' . CHARSET . '　にエンコードできませんでした。',
    'DBIO_ERROR_NO_HANDLER' => 'DbIo エクスポート。DbIo ハンドラーは構成されていません。',
    'DBIO_ERROR_EXPORT_NO_LANGUAGE' => 'DbIo エクスポート。ストアに言語コード「%s」が設定されていません。',
    'DBIO_ERROR_NO_PHP_MBSTRING' => "DbIo では &quot;php-mbstring&quot; 拡張機能を読み込む必要があります。Web ホストに連絡して、その拡張機能をインストールするように依頼してください。",
    'DBIO_ERROR_MISSING_DIRECTORY' => "ディレクトリ（%s）が見つかりませんでした。これが修正されるまで、DbIo 操作は実行できません。",
    'DBIO_ERROR_DIRECTORY_NOT_WRITABLE' => "ディレクトリ（%s）は書き込み可能ではありません。この問題が解決されるまで、DbIo 操作は実行できません。",
    // Messages used by the DbIoHandler class
    'DBIO_MESSAGE_IMPORT_MISSING_HEADER' => 'インポートが中止されました：入力ファイルのヘッダー情報がありません。',
    'DBIO_FORMAT_MESSAGE_IMPORT_MISSING_KEY' => 'インポートが中止されました：キー列（%s）がありません。',
     //-Used to prefix processing messages with errors
    'DBIO_TEXT_ERROR' => 'エラー： ',
     // Messages used by the DbIoHandler class    
    'DBIO_MESSAGE_KEY_CONFIGURATION_ERROR' => '選択したハンドラーのキー構成にエラーがあるため、ハンドラーは使用できません。',
    'DBIO_ERROR_HANDLER_MISSING_FUNCTION' => '現在のハンドラー（%1$s）には（必須の）　"%2$s" 関数がありません。インポートは許可されません。',
    'DBIO_ERROR_HEADER_MISSING_KEYS' => '現在のインポート ファイルにはこれらの（%s）必須列がないため、インポートは許可されません。',
    'DBIO_ERROR_HANDLER_NO_COMMANDS' => '現在のインポート ファイルは DbIo コマンドを使用していますが、ハンドラーはそれをサポートしていないため、インポートは許可されません。',
    'DBIO_ERROR_HANDLER_VERSION_MISMATCH' => '選択したハンドラー（%1$s）のバージョンが一致しないため、ハンドラーは使用できません。',
    'DBIO_ERROR_MULTIPLE_COMMAND_COLUMNS' => 'インポートがキャンセルされました：入力に複数の v_dbio_command 列が見つかりました。',
];

return $define;

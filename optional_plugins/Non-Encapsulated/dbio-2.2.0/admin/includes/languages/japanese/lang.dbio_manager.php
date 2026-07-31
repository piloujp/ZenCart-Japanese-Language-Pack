<?php

declare(strict_types=1);

// -----
// Part of the DataBase Import/Export (aka DbIo) plugin, created by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2016-2025, Vinos de Frutas Tropicales.
//
// Last updated: DbIo v2.0.2
//
$define = [
    'HEADING_TITLE' => 'データベース I/O（DbIo）マネージャー',

    'TEXT_ALL_ORDERS_STATUS_VALUES' => 'すべての値',

    'TEXT_IS_EXPORT_ONLY' => '「%s」 DbIo ハンドラーはインポート アクションをサポートしていません。',

    'TEXT_SCOPE_PUBLIC' => 'パブリック',
    'TEXT_SCOPE_PRIVATE' => 'プライベート',

    'TEXT_FORMAT_CONFIG_INFO' => 'このセクションには、DbIoマネージャの動作に影響する現在の設定が表示されます。DbIo設定の値は、<a href="%s">ここ</a>をクリックして変更できます。',
    'TEXT_DBIO_SETTINGS' => 'DbIo設定',
    'TEXT_CSV_DELIMITER' => 'CSV：区切り文字',
    'TEXT_CSV_ENCLOSURE' => 'CSV：エンクロージャ（囲み）',
    'TEXT_CSV_ESCAPE' => 'CSV：エスケープ文字',
    'TEXT_CSV_ENCODING' => 'CSV：エンコーディング',
    'TEXT_CSV_DATE_FORMAT' => 'CSV：インポート日付形式',
    'TEXT_FILE_DEFAULT_SORT_ORDER' => 'デフォルトのファイル並べ替え順序',
    'TEXT_ALLOW_DUPLICATE_MODELS' => '製品：重複モデルを許可する',
    'TEXT_AUTO_CREATE_CATEGORIES' => '製品： カテゴリを自動的に作成',
    'TEXT_INSERT_REQUIRES_COMMAND' => '製品：製品の作成にはコマンドが必要',
    'TEXT_MAX_EXECUTION' => '最大実行時間',
    'TEXT_SPLIT_RECORD_COUNT' => '分割レコード数',
    'TEXT_DEBUG_ENABLED' => 'デバッグ有効',
    'TEXT_DATE_FORMAT' => '表示/ログ日付形式',
    'TEXT_DBIO_SYSTEM_SETTINGS' => 'システム設定',
    'TEXT_MAX_UPLOAD_FILE_SIZE' => 'アップロードファイルの最大サイズ',
    'TEXT_CHARSET' => '内部文字エンコーディング',
    'TEXT_DB_CHARSET' => 'データベースの文字エンコーディング',
    'TEXT_DEFAULT_LANGUAGE' => 'デフォルト言語',
    'TEXT_CHOOSE_HANDLER' => '使用するハンドラーを選択してください：',

    'LEGEND_EXPORT' => '輸出',
    'LEGEND_CONFIGURATION' => '構成',
    'LEGEND_FILE_ACTIONS' => 'ファイルアクション',
    'LEGEND_FILE_UPLOADS' => 'ファイルのアップロード',

    'TEXT_INSTRUCTIONS' => '<b><i>DbIo Manager</i></b> は、カンマ区切り値 (CSV) ファイルを使用してデータベース情報のエクスポートと、条件付きインポートを可能にするハンドラーを提供します。以下のドロップダウンリストから使用するハンドラーを選択すると、フィルターやテンプレートのカスタマイズオプションなどのハンドラーの機能が表示されます。<br><br>詳細については、プラグインの <a href="https://github.com/lat9/dbio/wiki" target="_blank" rel="noreferrer noopener">Wiki 記事</a> を参照してください。',

    'DBIO_BUTTON_DELETE' => '消去',
    'DBIO_BUTTON_DELETE_TITLE' => '現在選択されているファイルをサーバーから削除するには、ここをクリックしてください。',
    'DBIO_BUTTON_GO' => '実行',
    'DBIO_BUTTON_GO_TITLE' => '以下で選択したファイルに対して選択したアクションを実行するには、ここをクリックしてください。',
    'TEXT_AUTO_DOWNLOAD' => '生成後すぐにエクスポートをダウンロード',
    'BUTTON_EXPORT' => '輸出',
    'BUTTON_EXPORT_TITLE' => '選択した DbIo レポートに関連付けられた情報をエクスポートするには、ここをクリックしてください。',
    'BUTTON_UPLOAD' => 'アップロード',
    'BUTTON_UPLOAD_TITLE' => '選択したファイルをアップロードするにはここをクリックしてください。',

    'TEXT_FILE_ACTION_DELETE_INSTRUCTIONS' => '以下のファイルをサーバーから削除できます。削除するファイルを選択し、「削除」ボタンをクリックしてください。',

    'TEXT_SHOW_HIDE_FILTERS' => 'クリックすると、<strong>すべての</strong>ハンドラのフィルターを表示（または非表示）できます。フィルターが非表示になっている場合、現在のエクスポートには適用されません。',
    'TEXT_BUTTON_MANAGE_CUSTOMIZATION' => 'テンプレートの管理',
    'LABEL_CHOOSE_CUSTOMIZATION' => 'テンプレートを選択：',
    'TEXT_ALL_FIELDS' => 'すべてのフィールド',
    'TEXT_ALL_FIELDS_DESCRIPTION' => '現在のエクスポートには、現在のハンドラーでサポートされているすべてのフィールドが含まれます。',

    'DBIO_FORM_SUBMISSION_ERROR' => 'フォーム送信時に不足している値がありました。もう一度お試しください。',

    'TEXT_NO_DBIO_FILES_AVAILABLE' => '<em>%s</em> ハンドラーに使用できるインポート/エクスポート ファイルはありません。',
    'ERROR_FILENAME_MISMATCH' => '現在のハンドラー（%1$s）に関連付けられているアップロード ファイル（例: <em>dbio.%1$s.*.csv</em>）を選択してください。',
    'TEXT_UPLOAD_FOR_IMPORT_ONLY' => '<em>%s</em> ハンドラーはファイルのインポートをサポートしていないため、ファイルのアップロードは無効になっています。',
    'TEXT_CHOOSE_ACTION' => '以下で選択したファイルに対して実行するアクションを選択してください。',
    'TEXT_FILE_UPLOAD_INSTRUCTIONS' => '<em>DbIo マネージャー</em>を使用して、コンピューターからファイル（拡張子 %2$s のみ）をアップロードしてインポートすることもできます。現在のハンドラー（%1$s）で処理可能なファイル（例：<em>dbio.%1$s.*.csv</em>）を選択し、「アップロード」ボタンをクリックしてください。',
    'TEXT_CHOOSE_FILE' => 'あなたのファイル：',

    'DBIO_ACTION_PLEASE_SELECT' => '選択してください',
    'DBIO_ACTION_SPLIT' => 'スプリット',
    'DBIO_ACTION_DELETE' => '消去',
    'DBIO_ACTION_FULL_IMPORT' => 'インポート（フル）',
    'DBIO_ACTION_CHECK_IMPORT' => 'インポート（チェックのみ）',
    'DBIO_ACTION_DOWNLOAD' => 'ダウンロード',

    'TEXT_FILE_ACTION_INSTRUCTIONS' =>
    '次のファイル関連のアクションはサポートされていますが、現在のハンドラーによって制限される可能性があります：' . PHP_EOL .
    '<ol>' . PHP_EOL .
    '   <li><strong>%%DBIO_ACTION_SPLIT%%</strong>：ストアの現在の <b>分割レコード数</b> 設定を使用して .CSV ファイルを複数のファイルに分割し、大きなエクスポートをセクションに分けてダウンロードできるようにします。</li>' . PHP_EOL .
    '   <li><strong>%%DBIO_ACTION_DOWNLOAD%%</strong>：選択したファイル（.csv または .log）をコンピューターにダウンロードして確認します。</li>' . PHP_EOL .
    '   <li><strong>%%DBIO_ACTION_FULL_IMPORT%%</strong>：このアクションは、選択したハンドラーがインポートをサポートしている場合にのみ有効になり、選択した .csv ファイルを使用してデータベースに変更を加えます。</li>' . PHP_EOL .
    '   <li><strong>%%DBIO_ACTION_CHECK_IMPORT%%</strong>：このアクションは、選択したハンドラーがインポートをサポートしている場合にのみ有効になります。これにより、「フル」インポートを実行した際に発生するデータベースアクションを確認できます。データベースへの変更は発生しません。完了すると、DbIoの分析を含むログファイルが生成されます。</li>' . PHP_EOL .
    '</ol>' . PHP_EOL .
    'アクションと関連ファイルを選択し、「実行」ボタンをクリックします。' . PHP_EOL,

    'HEADING_CHOOSE_FILE' => 'ファイルを選択',
    'HEADING_FILENAME' => 'ファイル名',
    'HEADING_BYTES' => 'バイト',
    'HEADING_LAST_MODIFIED' => '最終更新日',
    'HEADING_DELETE' => '消去？',

    'TEXT_SORT_NAME_ASC' => 'ファイル名で昇順に並べ替えるには、ここをクリックします',
    'TEXT_SORT_NAME_DESC' => 'ファイル名の降順で並べ替えるには、ここをクリックします。',
    'TEXT_SORT_SIZE_ASC' => 'ファイルサイズで昇順に並べ替えるには、ここをクリックしてください',
    'TEXT_SORT_SIZE_DESC' => 'ファイルサイズで降順に並べ替えるには、ここをクリックしてください',
    'TEXT_SORT_DATE_ASC' => 'ファイルの日付で昇順に並べ替えるには、ここをクリックします',
    'TEXT_SORT_DATE_DESC' => 'ファイルの日付で降順に並べ替えるには、ここをクリックします',

    'TEXT_VIEW_STATS' => 'インポートの詳細を表示',
    'TEXT_IMPORT_LAST_STATS' => '最後のDbIoインポートの詳細を表示するにはここをクリックしてください',

    'ERROR_CHOOSE_FILE_ACTION' => '「%s」という名前のファイルに対して実行するアクションを選択してください。',

    'SUCCESSFUL_FILE_IMPORT' => 'ファイル「%1$s」からの DbIo インポートが正常に完了しました。%2$u 件のレコードが処理されました。',
    'CAUTION_FILE_IMPORT' => 'ファイル「%1$s」からの DbIo インポートは %2$u 件のエラーと %3$u 件の警告を伴って完了しました。%4$u 件のレコードが挿入または更新されました。',

    'ERROR_CANT_DELETE_FILE' => '要求されたファイル（%s）は削除されませんでした。ファイルが見つからなかったか、権限が適切に設定されていません。',
    'SUCCESS_FILE_DELETED' => '要求されたファイル（%s）は正常に削除されました。',

    'ERROR_CANT_SPLIT_FILE_OPEN_ERROR' => '要求されたファイル（%s）は分割されなかったため、開くことができませんでした。',
    'ERROR_CREATING_SPLIT_FILE' => '分割操作中にエラーが発生しました。ファイル（%s）を作成できませんでした。',
    'ERROR_WRITING_SPLIT_FILE' => '分割ファイル（%1$s）のレコード #%2$u の書き込み中にエラーが発生しました。',
    'ERROR_SPLIT_INPUT_NOT_AT_EOF' => '分割入力ファイル (%s) の読み取り中に不明なエラーが発生しました。操作はキャンセルされました。',
    'WARNING_FILE_TOO_SMALL_TO_SPLIT' => 'ファイル (%1$s) には分割するレコード数（%2$u）が少なすぎます。',
    'FILE_SUCCESSFULLY_SPLIT' => 'ファイル（%1$s）は %2$u 個のチャンクに正常に分割されました。',

    'ERROR_FILE_IS_EXPORT_ONLY' => 'ファイル（%s）はインポートされませんでした。このファイルはエクスポート専用レポートに関連付けられています。.',
    'ERROR_UNKNOWN_TEMPLATE' => '要求した DbIo テンプレートが見つかりませんでした。もう一度お試しください。',
    'DBIO_MGR_EXPORT_SUCCESSFUL' => '%1$s の %2$s へのエクスポートが正常に完了し、%3$u 件のレコードが作成されました。.',

    'ERROR_NO_FILE_TO_UPLOAD' => 'アップロードするファイルが選択されていません。もう一度お試しください。',
    'FILE_UPLOADED_SUCCESSFULLY' => 'ファイル %s は正常にアップロードされました。',

    'DBIO_CANT_OPEN_FILE' => "ダウンロードに失敗しました。ファイル「%s」が存在しません。",

    //-The count of files selected is inserted between these two messages
    'JS_MESSAGE_OK2DELETE_PART1' => '選択した ',
    'JS_MESSAGE_OK2DELETE_PART2' => ' つのファイルをサーバーから完全に削除してもよろしいですか？',
    'JS_MESSAGE_NO_FILES_SELECTED' => '削除するファイルが選択されていません。もう一度お試しください。',
    'JS_MESSAGE_CHOOSE_ACTION' => '選択したファイルに対して実行するアクションを選択してください。',

    'LAST_STATS_LEAD_IN' => '現在の管理セッションで最後にインポートされたファイルの統計：',
    'LAST_STATS_FILE_NAME' => 'インポートファイル名：',
    'LAST_STATS_OPERATION' => '操作：',
    'LAST_STATS_RECORDS_READ' => '読み取られた記録：',
    'LAST_STATS_RECORDS_INSERTED' => '挿入されたレコード：',
    'LAST_STATS_RECORDS_UPDATED' => '更新された記録：',
    'LAST_STATS_WARNINGS' => '警告：',
    'LAST_STATS_ERRORS' => 'エラー：',
    'LAST_STATS_PARSE_TIME' => '解析時間：',
    'LAST_STATS_MESSAGES_EXIST' => '上記のアクションによって次の警告/エラーが生成されました：',

    'DBIO_SELECT_ALL' => 'すべて選択',
    'DBIO_SELECT_ALL_TITLE' => 'すべて選択するにはここをクリック',
    'DBIO_UNSELECT_ALL' => 'すべて選択解除',
    'DBIO_UNSELECT_ALL_TITLE' => 'すべて選択解除するにはここをクリック',
];

return $define;

<?php

$define = [
    'CFGTITLE_DBIO_MODULE_VERSION' => 'バージョン/リリース日',
    'CFGDESC_DBIO_MODULE_VERSION' => 'データベース I/O マネージャー（DbIo）のバージョン番号とリリース日。',
    'CFGTITLE_DBIO_CSV_DELIMITER' => 'CSV：区切り文字',
    'CFGDESC_DBIO_CSV_DELIMITER' => 'DbIo CSVファイル内の列を区切るために使用される単一の文字を入力します。タブ文字を区切り文字として使用するには、「<b>TAB</b>」と入力します。（デフォルト：<b>,</b>）',
    'CFGTITLE_DBIO_CSV_ENCLOSURE' => 'CSV：囲む',
    'CFGDESC_DBIO_CSV_ENCLOSURE' => 'DbIo CSV ファイル内のフィールドを囲むために使用される一つの文字を入力します。（デフォルト：<b>\"</b>）',
    'CFGTITLE_DBIO_CSV_ESCAPE' => 'CSV：エスケープ',
    'CFGDESC_DBIO_CSV_ESCAPE' => 'DbIo CSV ファイル内でエスケープ文字として使用される一つの文字を入力します。（デフォルト：<b>バックスラッシュ</b>）',
    'CFGTITLE_DBIO_CHARSET' => 'CSV：エンコーディング',
    'CFGDESC_DBIO_CHARSET' => 'DbIo CSVファイルに関連付けられるエンコーディングの種類を選択します。Microsoft&reg; Excelを使用する場合は、<b>latin1</b>を選択してください。（デフォルト：<b>utf8</b>）。',
    'CFGTITLE_DBIO_IMPORT_DATE_FORMAT' => 'CSV：インポート日付形式',
    'CFGDESC_DBIO_IMPORT_DATE_FORMAT' => 'DbIo CSV ファイルの <em>date</em> フィールドと <em>datetime</em> フィールドに使用する形式を選択します。（デフォルト：<b>m-d-y</b>）',
    'CFGTITLE_DBIO_MAX_EXECUTION_TIME' => '最大実行時間（秒）',
    'CFGDESC_DBIO_MAX_EXECUTION_TIME' => 'DbIo 操作の最大実行時間を秒単位で入力します（デフォルト：60）。',
    'CFGTITLE_DBIO_SPLIT_RECORD_COUNT' => '分割ファイル：レコード数',
    'CFGDESC_DBIO_SPLIT_RECORD_COUNT' => 'サーバーのインポート操作でタイムアウトが発生した場合や、エクスポートした .csv ファイルが大きすぎて一度にダウンロードできない場合など、.csv ファイルを複数の小さなファイルに分割すると問題が発生することがあります。<em>データベース I/O マネージャー</em>を使用して、これらのファイルを分割するレコード数（デフォルト：2000）を入力してください。',
    'CFGTITLE_DBIO_FILE_SORT_DEFAULT' => 'デフォルトのファイル並べ替え順序',
    'CFGDESC_DBIO_FILE_SORT_DEFAULT' => '<em>データベース I/O マネージャー</em>が検出した I/O ファイルを表示する際に使用するデフォルトの並べ替え順序を、次のいずれかから選択します。<br><br><b>1a</b>：ファイル名、昇順<br><b>1d</b>：ファイル名、降順<br><b>2a</b>：ファイル サイズ、昇順<br><b>2d</b>：ファイル サイズ、降順<br><b>3a</b>：ファイル日付、昇順<br><b>3d</b>：ファイル日付、降順（デフォルト）',
    'CFGTITLE_DBIO_DEBUG' => 'デバッグを有効にしますか？',
    'CFGDESC_DBIO_DEBUG' => 'DbIoデバッグを有効にするか（true）、無効にするか（false、デフォルト）を指定します。有効にすると、<b>すべての</b>I/Oステータスがストアの/YOUR_ADMIN/dbio/logsフォルダ内の<em>dbio-*.log</em>ファイルに書き込まれます。',
    'CFGTITLE_DBIO_DEBUG_DATE_FORMAT' => 'デバッグ日付形式',
    'CFGDESC_DBIO_DEBUG_DATE_FORMAT' => 'すべての DbIo ログ エントリにタイムスタンプを付けるために使用される書式設定文字列を入力します。',
    'CFGTITLE_DBIO_PRODUCTS_AUTO_CREATE_CATEGORIES' => '<em>商品</em>：インポート時にカテゴリを自動作成しますか？',
    'CFGDESC_DBIO_PRODUCTS_AUTO_CREATE_CATEGORIES' => '<em>DbIo</em> は、<em>商品</em> のインポート時に欠落しているカテゴリをどのように処理しますか？欠落しているカテゴリを自動的に生成するには <b>Yes</b> を選択します。カテゴリが以前に存在しなかった場合に商品のインポートを禁止するには <b>No</b>（デフォルト）を選択します。',
    'CFGTITLE_DBIO_PRODUCTS_INSERT_REQUIRES_COMMAND' => '<em>商品</em>：商品の作成にはコマンドが必要ですか？',
    'CFGDESC_DBIO_PRODUCTS_INSERT_REQUIRES_COMMAND' => '商品のインポートには DbIo <code>ADD</code> コマンドが必要ですか？一致する products_id や products_model が見つからない場合に商品の作成を許可するには、<b>No</b>（デフォルト）を選択します。<br><br><code>ADD</code> コマンドが存在しない限り、新しい商品を生成する商品インポートを禁止するには、<b>Yes</b> を選択します。',
];

return $define;
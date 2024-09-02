<?php
/**
 *  zca_bootstrap_colors.php
 *
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version Author: rbarbour (ZCAdditions.com)  7/01/2018 06:00 AM Modified ZCA-BS-COLORS
 *
 * BOOTSTRAP v3.6.2
 */
define('HEADING_TITLE','ZCA Bootstrap Colors');

define('TEXT_INFORMATION', 'テンプレートの v3.5.2 以降に追加された色は、アップグレード時に「未設定」に初期化されるため、ストアは使用前にこれらの値をその配色と一致するように設定できます。「未設定」が許容値であることを示す色<b>のみ</b>がその値を使用する必要があります。 そうしないと、CSS カラーリングを作成するストアフロントのスクリプトによって無効な CSS が生成されてしまいます。<br><br><b>注：</b>現在構成されている値がデフォルトの場合、<em>「値」</em>列は空になります。');

define('TEXT_INFO_EDIT_INTRO', '必要な変更を行ってください');
define('TEXT_INFO_DATE_ADDED', '追加日:');
define('TEXT_INFO_LAST_MODIFIED', '最終更新日：');

define('TABLE_HEADING_CONFIGURATION_TITLE', 'タイトル');
define('TABLE_HEADING_CONFIGURATION_DEFAULT', 'デフォルト');
define('TABLE_HEADING_CONFIGURATION_VALUE', '価値');
define('TABLE_HEADING_NOT_SET_OK', '「未設定」でいいですか？');
define('TABLE_HEADING_ACTION', 'アクション');

// BOF SQL file
define('BUTTON_DOWNLOAD_SQL', 'SQLをダウンロード');
// EOF SQL file

// BOF CSV file
define('BUTTON_DOWNLOAD_CSV', 'CSVをダウンロード');
define('BUTTON_UPLOAD_CSV', 'CSVのアップロード');
define('TEXT_QUERY_FILENAME','ファイルをアップロードする：');

define('CSV_HEADER_KEY', 'キー');
define('CSV_HEADER_VALUE', '値');
define('CSV_HEADER_TITLE', 'タイトル');
define('CSV_HEADER_DEFAULT', 'デフォルト');

define('UPLOAD_FILE_PROCESSED_ALL_OK', "ファイルが処理されました。 %s 件の更新はすべて成功しました。");
define('UPLOAD_FILE_PROCESSED_SOME_OK', "ファイルが処理されました。 %s 件（%s件中）の更新が成功しました。");

define('UPLOAD_SUCCESS', '成功：');
define('UPLOAD_WARNING', '警告：');
define('UPLOAD_FAILED', '失敗した：');
define('MISSING_CONFIGURATION', 'ZCA Bootstrap Colors 設定が見つかりません。');
define('NO_CSV_FILE', 'CSV ファイルが指定されていないか空です。');
define('CSV_FILE_MALFORMED', 'CSVファイルの形式が不正です。');
// EOF CSV file

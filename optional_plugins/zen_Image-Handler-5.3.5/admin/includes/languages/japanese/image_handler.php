<?php
/**
 * mod Image Handler
 * Previously /admin/includes/languages/english/extra_definitions/bmz_image_handler.php
 * english language definitions for image handler
 *
 * @author  Tim Kroeger (original author)
 * @copyright Copyright 2005-2006
 * @license http://www.gnu.org/licenses/gpl.txt GNU General Public License V2.0
 * @version $Id: bmz_image_handler.php,v 2.0 Rev 8 2010-05-31 23:46:5 DerManoMann Exp $
 * Last modified by webchills and cjones 2012-03-10 17:46:50
 * Last modified by lat9 2022-11-16, IH v5.3.1
 */
define('IH_VERSION_VERSION', 'バージョン');
define('IH_VERSION_NOT_FOUND', 'イメージ ハンドラー情報が見つかりません。');
define('IH_REMOVE', 'イメージ ハンドラーをアンインストールします。（最初にサイトとデータベースをバックアップしてください）');
define('IH_VIEW_CONFIGURATION', 'イメージ ハンドラー構成の表示');
define('IH_CLEAR_CACHE', '画像キャッシュをクリアする');
define('IH_CACHE_CLEARED', '画像キャッシュがクリアされました。');

define('IH_SOURCE_TYPE', 'ソース画像の種類');
define('IH_SOURCE_IMAGE', 'ソース画像');
define('IH_SMALL_IMAGE', 'デフォルトの画像');
define('IH_MEDIUM_IMAGE', '商品イメージ');

define('IH_ADD_NEW_IMAGE', '新しい画像を追加');
define('IH_NEW_NAME_DISCARD_IMAGES', '新しい名前を使用し、追加の画像を破棄します');
define('IH_NEW_NAME_COPY_IMAGES', '新しい名前を使用し、追加の画像をコピーします');
define('IH_KEEP_NAME', '古い名前と追加の画像を保持する');
define('IH_DELETE_FROM_DB_ONLY', 'データベースのみから画像参照を削除します');

define('IH_HEADING_TITLE', 'Image Handler（イメージ ハンドラー）<sup>5</sup>');
define('IH_HEADING_TITLE_PRODUCT_SELECT','画像を管理する商品を選択してください。');

define('TABLE_HEADING_PHOTO_NAME', '画像名');
define('TABLE_HEADING_BASE_SIZE', 'ベースイメージ');
define('TABLE_HEADING_SMALL_SIZE','小さい画像');
define('TABLE_HEADING_MEDIUM_SIZE', '中画像');
define('TABLE_HEADING_LARGE_SIZE','大きな画像');
define('TABLE_HEADING_ACTION', 'アクション');
define('TABLE_HEADING_FILETYPE', 'ファイルの種類');

define('TEXT_PRODUCT_INFO', '商品');
define('TEXT_PRODUCTS_MODEL', 'モデル');
define('TEXT_PRICE', '価格');
define('TEXT_IMAGE_BASE_DIR', '画像ディレクトリ');
define('TEXT_NO_IMAGE_DEFINED', 'この商品の画像は現在定義されていません。'); //- When the product's configured image is an empty string.
define('TEXT_NO_PRODUCT_IMAGES', 'この商品の画像（%s）に一致するものが見つかりませんでした。');  //- %s is filled in with the product's non-empty image name.
define('TEXT_PRODUCT_IMAGE_NOT_SUPPORTED', '商品の画像（%s）拡張子は、イメージ ハンドラーではサポートされていません。');   //- %s is filled in with the product's non-empty image name.
define('TEXT_CLICK_TO_ENLARGE', '拡大するにはクリックしてください');

define('TEXT_INFO_IMAGE_INFO', '画像情報');
define('TEXT_INFO_NAME', 'ファイル名');
define('TEXT_INFO_FILE_TYPE', 'ファイルの種類');
define('TEXT_INFO_EDIT_PHOTO', '<em>メイン</em>画像を編集する');
define('TEXT_INFO_EDIT_ADDL_PHOTO', '画像<em>追加</em>を編集します');
define('TEXT_INFO_NEW_PHOTO', '新しい<em>メイン</em>画像');
define('TEXT_INFO_NEW_ADDL_PHOTO', '新しい<em>追加</em>画像');
define('TEXT_INFO_IMAGE_BASE_NAME', '画像ベース名 (オプション)');
define('TEXT_INFO_AUTOMATIC_FROM_DEFAULT', '自動 (元の画像から)');
define('TEXT_INFO_MAIN_DIR', 'メインディレクトリ');
define('TEXT_INFO_BASE_DIR', 'メイン画像ディレクトリ');
define('TEXT_INFO_NEW_DIR', '画像用の新しいディレクトリを選択または定義します。');
define('TEXT_INFO_IMAGE_DIR', '画像ディレクトリ');
define('TEXT_INFO_OR', 'か');
define('TEXT_INFO_AUTOMATIC', '自動');
define('TEXT_INFO_IMAGE_SUFFIX', '画像の接尾辞 (オプション)');
define('TEXT_INFO_USE_AUTO_SUFFIX','特定のサフィックスを入力するか、自動サフィックス生成のために空のままにします。');
define('TEXT_INFO_DEFAULT_IMAGE', 'ベース画像ファイル');
define('TEXT_INFO_DEFAULT_IMAGE_HELP', '基本画像が必要です。 中サイズまたは大サイズの<em>異なる</em>画像がアップロードされる場合、その画像は最小のものとみなされます。');
define('TEXT_INFO_IMAGE_NOT_SUPPORTED', 'この商品の画像タイプは、Image Handler でサポートされていません。 追加のアクションは実行できません。');
define('TEXT_INFO_CLICK_TO_ADD_MAIN', 'この商品の新しい<em>メイン</em>画像を追加するには、「画像を追加」ボタンをクリックします。');
define('TEXT_INFO_CLICK_TO_ADD_ADDL', '[画像を追加] ボタンをクリックして、この商品に新しい<em>追加</em>画像を追加します。');
define('TEXT_INFO_CONFIRM_DELETE', '<em>%s</em> 画像の削除を確認します');
    define('TEXT_MAIN', 'メイン');
    define('TEXT_ADDITIONAL', '追加');
define('TEXT_INFO_CONFIRM_DELETE_SURE', 'この画像のすべてのサイズを削除してもよろしいですか？');
define('TEXT_INFO_SELECT_ACTION', 'アクションの選択');

define('TEXT_NOT_NEEDED', '不要');    //-Displayed for the 'Medium'-sized additional images
define('TEXT_TABLE_CAPTION_INSTRUCTIONS', "<b>注：</b>商品の追加画像は「小」および「大」 サイズ<em>のみ</em>で<em>自動的</em>に作成され、<b>中画像</b>には「" . TEXT_NOT_NEEDED . "」と表示されます。ストアフロントがこれらの画像 (または商品のメイン画像) に他の画像サイズを使用している場合、それらの画像は「オンデマンド」で作成 (およびキャッシュ) されます。");

define('TEXT_MSG_FILE_NOT_FOUND', 'このファイルは存在しません。');
define('TEXT_MSG_ERROR_RETRIEVING_IMAGESIZE', '画像サイズを決定できませんでした');
define('TEXT_MSG_AUTO_BASE_ERROR', 'デフォルトファイルを使用しない自動ベース選択。');
define('TEXT_MSG_INVALID_BASE_ERROR', '画像のベース名が無効であるか、ベース画像が見つかりません。');
define('TEXT_MSG_AUTO_REPLACE',  '基本名、新しい名前内の不正な文字を自動的に置き換えます：');
define('TEXT_MSG_INVALID_SUFFIX', '画像の接尾辞が無効です。');
define('TEXT_MSG_IMAGE_TYPES_NOT_SAME_ERROR', '画像の種類は同じではありません。 画像はアップロード<b>されていません</b>。');
define('TEXT_MSG_DEFAULT_REQUIRED_FOR_RESIZE', '自動サイズ変更にはデフォルトの画像が必要です。');
define('TEXT_MSG_NO_DEFAULT', '<b>ベース画像ファイル</b> がアップロードされていません。 もう一度試してください。');
define('TEXT_MSG_NO_DEFAULT_ON_NAME_CHANGE', 'メイン画像を更新して名前を変更する場合は、「ベース」画像を指定する必要があります。');
define('TEXT_MSG_INVALID_EXTENSION', 'アップロードされた「%1$s」は、 画像ファイルの拡張子（%2$s）はサポートされていません。 拡張子は（%3$s）のいずれかである必要があります。');
    define('TEXT_BASE', 'ベース');
    define('TEXT_MEDIUM', '中');
    define('TEXT_LARGE', '大');
define('TEXT_MSG_FILE_EXISTS', 'ファイルが存在します（%s）！ベース名またはサフィックスのいずれかを変更してください。');
define('TEXT_MSG_INVALID_SQL', 'SQL クエリを完了できません。');
define('TEXT_MSG_NOCREATE_IMAGE_DIR', '画像ディレクトリを作成できません。');
define('TEXT_MSG_NOCREATE_MEDIUM_IMAGE_DIR', '中サイズの画像ディレクトリを作成できません。');
define('TEXT_MSG_NOCREATE_LARGE_IMAGE_DIR', '大きなサイズの画像ディレクトリを作成できません。');
define('TEXT_MSG_NOPERMS_IMAGE_DIR', '画像ディレクトリの権限を設定できません。');
define('TEXT_MSG_NOPERMS_MEDIUM_IMAGE_DIR', '中サイズの画像ディレクトリの権限を設定できません。');
define('TEXT_MSG_NOPERMS_LARGE_IMAGE_DIR', '大きいサイズの画像ディレクトリの権限を設定できません。');
define('TEXT_MSG_NAME_TOO_LONG_ERROR', '画像ファイル名「%1$s」は長すぎてデータベースに保存できません。 %2$u 文字以下の名前を選択してください。');
define('TEXT_MSG_NO_SUFFIXES_FOUND', '01 ～ _99 の範囲で未使用の追加画像サフィックスが見つかりませんでした。');
define('TEXT_MSG_NO_FILE_UPLOADED', '<b>ベース画像ファイル</b> が選択されていません。 もう一度試してください。');

define('TEXT_MSG_NOUPLOAD_DEFAULT', 'デフォルトの画像ファイルをアップロードできません。');
define('TEXT_MSG_NORESIZE', '画像のサイズを変更できません');
define('TEXT_MSG_NOCOPY_LARGE', '大きな画像ファイルをコピーできません。');
define('TEXT_MSG_NOCOPY_MEDIUM', '中サイズの画像ファイルをコピーできません。');
define('TEXT_MSG_NOCOPY_DEFAULT', 'デフォルトの画像ファイルをコピーできません。');
define('TEXT_MSG_NOPERMS_LARGE', '大きな画像ファイルの権限を設定できません。');
define('TEXT_MSG_NOPERMS_MEDIUM', '中サイズの画像ファイルのアクセス許可を設定できません。');
define('TEXT_MSG_NOPERMS_DEFAULT', 'デフォルトの画像ファイルの権限を設定できません。');
define('TEXT_MSG_IMAGE_SAVED', '画像は正常に保存されました。');
define('TEXT_MSG_LARGE_DELETED', '大きな画像（%s）は正常に削除されました。');
define('TEXT_MSG_NO_DELETE_LARGE', '大きな画像（%s）を削除できません。権限を確認してください。');
define('TEXT_MSG_MEDIUM_DELETED', '媒体画像（%s）は正常に削除されました。');
define('TEXT_MSG_NO_DELETE_MEDIUM', '中サイズの画像（%s）を削除できません。権限を確認してください。');
define('TEXT_MSG_DEFAULT_DELETED', '基本画像（%s）は正常に削除されました。');
define('TEXT_MSG_NO_DELETE_DEFAULT', '基本画像（%s）を削除できません。権限を確認してください。');
define('TEXT_MSG_NO_DEFAULT_FILE_FOUND', '基本画像（%s）が見つからなかったため、削除できませんでした。');

define('TEXT_MSG_IMAGE_DELETED', '画像（%s）は正常に削除されました。');
define('TEXT_MSG_IMAGE_NOT_FOUND', '画像（%s）が見つかりませんでした。');
define('TEXT_MSG_IMAGE_NOT_DELETED', '画像（%s）を削除できません。 権限を確認してください。');

define('TEXT_MSG_IMPORT_SUCCESS', 'インポートが成功しました：');
define('TEXT_MSG_IMPORT_FAILURE', 'インポートの失敗：');

// image manager
define('IH_IMAGE_NEW_FILE', 'クリックしてこの商品に新しい画像を追加します');
define('IH_IMAGE_EDIT', 'クリックしてこの画像を編集します');
define('TEXT_MEDIUM_FILE_IMAGE', '中画像ファイル（オプション）');
define('TEXT_LARGE_FILE_IMAGE', '大きな画像ファイル（オプション）');

// ih menu
define('IH_MENU_MANAGER', '画像マネージャー');
define('IH_MENU_ADMIN', '管理ツール');
define('IH_MENU_ABOUT', '概要／ヘルプ');
define('IH_MENU_PREVIEW', 'プレビュー');

define('IH_RESIZE_INSTRUCTIONS_HEADING', 'イメージハンドラー<sup>5</sup>が%sアクティブ化されました。');
    define('IH_RESIZE_NOT', '非');    //- Replaces %s above if IH Resizing is disabled; empty string, otherwise.
define('IH_RESIZE_INSTRUCTIONS', '画像のサイズ変更を%sにするには、下のボタンをクリックしてください。');
    define('IH_RESIZE_DISABLE', '無効');
    define('IH_RESIZE_ENABLE', '有効');
define('IH_BUTTON_RESIZE_TOGGLE', '設定の切り替え');

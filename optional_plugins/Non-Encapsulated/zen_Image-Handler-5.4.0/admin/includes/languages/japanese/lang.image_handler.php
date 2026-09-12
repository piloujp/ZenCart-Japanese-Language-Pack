<?php
/**
 * mod Image Handler, v5.4.0
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
$define = [
    'IH_VERSION_VERSION' => 'バージョン',
    'IH_VERSION_NOT_FOUND' => 'イメージ ハンドラー情報が見つかりません。',
    'IH_REMOVE' => 'イメージ ハンドラーをアンインストールします。（最初にサイトとデータベースをバックアップしてください）',
    'IH_VIEW_CONFIGURATION' => 'イメージ ハンドラー構成の表示',
    'IH_CLEAR_CACHE' => '画像キャッシュをクリアする',
    'IH_CACHE_CLEARED' => '画像キャッシュがクリアされました。',

    'IH_SOURCE_TYPE' => 'ソース画像の種類',
    'IH_SOURCE_IMAGE' => 'ソース画像',
    'IH_SMALL_IMAGE' => 'デフォルトの画像',
    'IH_MEDIUM_IMAGE' => '商品イメージ',

    'IH_ADD_NEW_IMAGE' => '新しい画像を追加',
    'IH_NEW_NAME_DISCARD_IMAGES' => '新しい名前を使用し、追加の画像を破棄します',
    'IH_NEW_NAME_COPY_IMAGES' => '新しい名前を使用し、追加の画像をコピーします',
    'IH_KEEP_NAME' => '古い名前と追加の画像を保持する',
    'IH_DELETE_FROM_DB_ONLY' => 'データベースのみから画像参照を削除します',

    'IH_HEADING_TITLE' => 'イメージ ハンドラー<sup>5</sup>',
    'IH_HEADING_TITLE_PRODUCT_SELECT' => '画像を管理する商品を選択してください。',

    'TABLE_HEADING_PHOTO_NAME' => '画像名',
    'TABLE_HEADING_BASE_SIZE' => 'ベースイメージ',
    'TABLE_HEADING_SMALL_SIZE' => '小さい画像',
    'TABLE_HEADING_MEDIUM_SIZE' => '中画像',
    'TABLE_HEADING_LARGE_SIZE' => '大きな画像',
    'TABLE_HEADING_ACTION' => 'アクション',
    'TABLE_HEADING_FILETYPE' => 'ファイルの種類',

    'TEXT_PRODUCT_INFO' => '商品',
    'TEXT_PRODUCTS_MODEL' => 'モデル',
    'TEXT_PRICE' => '価格',
    'TEXT_IMAGE_BASE_DIR' => '画像ディレクトリ',
    'TEXT_NO_IMAGE_DEFINED' => 'この商品の画像は現在定義されていません。',
    'TEXT_NO_PRODUCT_IMAGES' => 'この商品の画像（%s）に一致するものが見つかりませんでした。',
    'TEXT_PRODUCT_IMAGE_NOT_SUPPORTED' => '商品の画像（%s）拡張子は、イメージ ハンドラーではサポートされていません。',
    'TEXT_CLICK_TO_ENLARGE' => '拡大するにはクリックしてください',

    'TEXT_INFO_IMAGE_INFO' => '画像情報',
    'TEXT_INFO_NAME' => 'ファイル名',
    'TEXT_INFO_FILE_TYPE' => 'ファイルの種類',
    'TEXT_INFO_EDIT_PHOTO' => '<em>メイン</em>画像を編集する',
    'TEXT_INFO_EDIT_ADDL_PHOTO' => '画像<em>追加</em>を編集します',
    'TEXT_INFO_NEW_PHOTO' => '新しい<em>メイン</em>画像',
    'TEXT_INFO_NEW_ADDL_PHOTO' => '新しい<em>追加</em>画像',
    'TEXT_INFO_IMAGE_BASE_NAME' => '画像ベース名 (オプション)',
    'TEXT_INFO_AUTOMATIC_FROM_DEFAULT' => '自動 (元の画像から)',
    'TEXT_INFO_MAIN_DIR' => 'メインディレクトリ',
    'TEXT_INFO_BASE_DIR' => 'メイン画像ディレクトリ',
    'TEXT_INFO_NEW_DIR' => '画像用の新しいディレクトリを選択または定義します。',
    'TEXT_INFO_IMAGE_DIR' => '画像ディレクトリ',
    'TEXT_INFO_OR' => 'か',
    'TEXT_INFO_AUTOMATIC' => '自動',
    'TEXT_INFO_IMAGE_SUFFIX' => '画像の接尾辞 (オプション)',
    'TEXT_INFO_USE_AUTO_SUFFIX' => '特定のサフィックスを入力するか、自動サフィックス生成のために空のままにします。',
    'TEXT_INFO_DEFAULT_IMAGE' => 'ベース画像ファイル',
    'TEXT_INFO_DEFAULT_IMAGE_HELP' => '基本画像が必要です。 中サイズまたは大サイズの<em>異なる</em>画像がアップロードされる場合、その画像は最小のものとみなされます。',
    'TEXT_INFO_IMAGE_NOT_SUPPORTED' => 'この商品の画像タイプは、Image Handler でサポートされていません。 追加のアクションは実行できません。',
    'TEXT_INFO_CLICK_TO_ADD_MAIN' => 'この商品の新しい<em>メイン</em>画像を追加するには、「画像を追加」ボタンをクリックします。',
    'TEXT_INFO_CLICK_TO_ADD_ADDL' => '[画像を追加] ボタンをクリックして、この商品に新しい<em>追加</em>画像を追加します。',
    'TEXT_INFO_CONFIRM_DELETE' => '<em>%s</em> 画像の削除を確認します',
    'TEXT_MAIN' => 'メイン',
    'TEXT_ADDITIONAL' => '追加',
    'TEXT_INFO_CONFIRM_DELETE_SURE' => 'この画像のすべてのサイズを削除してもよろしいですか？',
    'TEXT_INFO_SELECT_ACTION' => 'アクションの選択',

    'TEXT_NOT_NEEDED' => '不要',

    'TEXT_MSG_FILE_NOT_FOUND' => 'このファイルは存在しません。',
    'TEXT_MSG_ERROR_RETRIEVING_IMAGESIZE' => '画像サイズを決定できませんでした',
    'TEXT_MSG_AUTO_BASE_ERROR' => 'デフォルトファイルを使用しない自動ベース選択。',
    'TEXT_MSG_INVALID_BASE_ERROR' => '画像のベース名が無効であるか、ベース画像が見つかりません。',
    'TEXT_MSG_AUTO_REPLACE' => '基本名、新しい名前内の不正な文字を自動的に置き換えます：',
    'TEXT_MSG_INVALID_SUFFIX' => '画像の接尾辞が無効です。',
    'TEXT_MSG_IMAGE_TYPES_NOT_SAME_ERROR' => '画像の種類は同じではありません。 画像はアップロード<b>されていません</b>。',
    'TEXT_MSG_DEFAULT_REQUIRED_FOR_RESIZE' => '自動サイズ変更にはデフォルトの画像が必要です。',
    'TEXT_MSG_NO_DEFAULT' => '<b>ベース画像ファイル</b> がアップロードされていません。 もう一度試してください。',
    'TEXT_MSG_NO_DEFAULT_ON_NAME_CHANGE' => 'メイン画像を更新して名前を変更する場合は、「ベース」画像を指定する必要があります。',
    'TEXT_MSG_INVALID_EXTENSION' => 'アップロードされた「%1$s」は、 画像ファイルの拡張子（%2$s）はサポートされていません。 拡張子は（%3$s）のいずれかである必要があります。',
    'TEXT_BASE' => 'ベース',
    'TEXT_MEDIUM' => '中',
    'TEXT_LARGE' => '大',
    'TEXT_MSG_FILE_EXISTS' => 'ファイルが存在します（%s）！ベース名またはサフィックスのいずれかを変更してください。',
    'TEXT_MSG_INVALID_SQL' => 'SQL クエリを完了できません。',
    'TEXT_MSG_NOCREATE_IMAGE_DIR' => '画像ディレクトリを作成できません。',
    'TEXT_MSG_NOCREATE_MEDIUM_IMAGE_DIR' => '中サイズの画像ディレクトリを作成できません。',
    'TEXT_MSG_NOCREATE_LARGE_IMAGE_DIR' => '大きなサイズの画像ディレクトリを作成できません。',
    'TEXT_MSG_NOPERMS_IMAGE_DIR' => '画像ディレクトリの権限を設定できません。',
    'TEXT_MSG_NOPERMS_MEDIUM_IMAGE_DIR' => '中サイズの画像ディレクトリの権限を設定できません。',
    'TEXT_MSG_NOPERMS_LARGE_IMAGE_DIR' => '大きいサイズの画像ディレクトリの権限を設定できません。',
    'TEXT_MSG_NAME_TOO_LONG_ERROR' => '画像ファイル名「%1$s」は長すぎてデータベースに保存できません。 %2$u 文字以下の名前を選択してください。',
    'TEXT_MSG_NO_SUFFIXES_FOUND' => '01 ～ _99 の範囲で未使用の追加画像サフィックスが見つかりませんでした。',
    'TEXT_MSG_NO_FILE_UPLOADED' => '<b>ベース画像ファイル</b> が選択されていません。 もう一度試してください。',

    'TEXT_MSG_NOUPLOAD_DEFAULT' => 'デフォルトの画像ファイルをアップロードできません。',
    'TEXT_MSG_NORESIZE' => '画像のサイズを変更できません',
    'TEXT_MSG_NOCOPY_LARGE' => '大きな画像ファイルをコピーできません。',
    'TEXT_MSG_NOCOPY_MEDIUM' => '中サイズの画像ファイルをコピーできません。',
    'TEXT_MSG_NOCOPY_DEFAULT' => 'デフォルトの画像ファイルをコピーできません。',
    'TEXT_MSG_NOPERMS_LARGE' => '大きな画像ファイルの権限を設定できません。',
    'TEXT_MSG_NOPERMS_MEDIUM' => '中サイズの画像ファイルのアクセス許可を設定できません。',
    'TEXT_MSG_NOPERMS_DEFAULT' => 'デフォルトの画像ファイルの権限を設定できません。',
    'TEXT_MSG_IMAGE_SAVED' => '画像は正常に保存されました。',
    'TEXT_MSG_LARGE_DELETED' => '大きな画像（%s）は正常に削除されました。',
    'TEXT_MSG_NO_DELETE_LARGE' => '大きな画像（%s）を削除できません。権限を確認してください。',
    'TEXT_MSG_MEDIUM_DELETED' => '媒体画像（%s）は正常に削除されました。',
    'TEXT_MSG_NO_DELETE_MEDIUM' => '中サイズの画像（%s）を削除できません。権限を確認してください。',
    'TEXT_MSG_DEFAULT_DELETED' => '基本画像（%s）は正常に削除されました。',
    'TEXT_MSG_NO_DELETE_DEFAULT' => '基本画像（%s）を削除できません。権限を確認してください。',
    'TEXT_MSG_NO_DEFAULT_FILE_FOUND' => '基本画像（%s）が見つからなかったため、削除できませんでした。',

    'TEXT_MSG_IMAGE_DELETED' => '画像（%s）は正常に削除されました。',
    'TEXT_MSG_IMAGE_NOT_FOUND' => '画像（%s）が見つかりませんでした。',
    'TEXT_MSG_IMAGE_NOT_DELETED' => '画像（%s）を削除できません。 権限を確認してください。',

    'TEXT_MSG_IMPORT_SUCCESS' => 'インポートが成功しました：',
    'TEXT_MSG_IMPORT_FAILURE' => 'インポートの失敗：',

// image manager
    'IH_IMAGE_NEW_FILE' => 'クリックしてこの商品に新しい画像を追加します',
    'IH_IMAGE_EDIT' => 'クリックしてこの画像を編集します',
    'TEXT_MEDIUM_FILE_IMAGE' => '中画像ファイル（オプション）',
    'TEXT_LARGE_FILE_IMAGE' => '大きな画像ファイル（オプション）',

// ih menu
    'IH_MENU_MANAGER' => '画像マネージャー',
    'IH_MENU_ADMIN' => '管理ツール',
    'IH_MENU_ABOUT' => '概要／ヘルプ',
    'IH_MENU_PREVIEW' => 'プレビュー',

    'IH_RESIZE_INSTRUCTIONS_HEADING' => 'イメージハンドラー<sup>5</sup>が%sアクティブ化されました。',
    'IH_RESIZE_NOT' => '非',
    'IH_RESIZE_INSTRUCTIONS' => '画像のサイズ変更を%sにするには、下のボタンをクリックしてください。',
    'IH_RESIZE_DISABLE' => '無効',
    'IH_RESIZE_ENABLE' => '有効',
    'IH_BUTTON_RESIZE_TOGGLE' => '設定の切り替え',
];

$define['TEXT_TABLE_CAPTION_INSTRUCTIONS'] = '<b>注：</b>商品の追加画像は「小」および「大」 サイズ<em>のみ</em>で<em>自動的</em>に作成され、<b>中画像</b>には「' . $define['TEXT_NOT_NEEDED'] . '」と表示されます。ストアフロントがこれらの画像 (または商品のメイン画像) に他の画像サイズを使用している場合、それらの画像は「オンデマンド」で作成 (およびキャッシュ) されます。';

return $define;

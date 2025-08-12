<?php

declare(strict_types=1);

/**
 * Plugin: Image Checker
 * @link https://github.com/torvista/Zen_Cart-Image_Checker
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @updated 03 August 2025 torvista
 */

$define = [
    'HEADING_TITLE' => '画像チェッカー',
    'TEXT_IMAGES_DIRECTORY' => '画像パス：' . DIR_FS_CATALOG_IMAGES,
    'TEXT_INTRO' => '<p>「画像の問題」：商品には画像が定義されていますが、その画像が見つからないか、定義された画像のファイルタイプが正しくありません。</p><p>フィルターはデフォルトで有効になっており、有効なカテゴリ/商品のみを確認できます。</p>',
    'TEXT_LIST_TYPE' => 'チェック：',
    'TEXT_CATEGORIES' => 'カテゴリー',
    'TABLE_HEADING_PRODUCTS' => '商品',
    'TEXT_FILTERS' => 'フィルター：',
    'TEXT_LIST_ALL' => 'すべて表示',
    'TEXT_LIST_DISABLED' => '無効な商品を表示する（画像に問題あり）',
    'TEXT_LIST_NO_IMAGES' => '画像が定義されていない商品を表示する',
    'TEXT_ENTRIES_CHECKED' => '検証済み商品： ',
    'TEXT_IMAGE_PROBLEMS' => '画像の問題：',
    'TEXT_QUERY_LIMITED' => '結果は <b>%s</b> 項目に制限されます。</b>',
    'TEXT_RESULTS_COUNT' => '%1$s をチェックしました： %2$s。',
    'TEXT_NO_ERRORS_FOUND' => '画像エラーは見つかりませんでした。<br>画像が定義されているすべてのエントリは、正しい拡張子（ファイルタイプ）を持ち、一般的なウェブ画像形式である既存の画像ファイルを参照します。',
    'ERROR_NO_ERROR' => 'ok',
    'ERROR_NO_IMAGE_DEFINED' => '画像が定義されていません',
    'ERROR_IMAGE_NOT_FOUND' => '画像が見つかりません',
    'ERROR_NOT_IMAGE' => 'ファイル名は <b>%s</b> ですが、有効な画像ではありません（getimagesize による）',
    'ERROR_IMAGE_FORMAT' => '画像の名前には <b>%1$s</b> 拡張子が付けられていますが、実際は <b>%2$s</b> です。',
    'ERROR_NOT_COMMON_FORMAT' => '<b>%s</b> ファイルは、ウェブ画像で一般的に使用されるタイプではありません（PNG/GIF/JPG/WEBP または BMP に変更してください）。',
    'TABLE_HEADING_ENTRY' => 'エントリ',
    'TABLE_HEADING_NAME' => '商品名',
    'TABLE_HEADING_IMAGE' => '画像',
    'TABLE_HEADING_RESULT' => '結果',
    'TEXT_EDIT_CATEGORY' => 'カテゴリを編集',
    'TEXT_EDIT_PRODUCT' => '商品を編集',
    'TEXT_NO_CATEGORIES_FOUND' => '一致するカテゴリが見つかりません。',
    'TEXT_NO_PRODUCTS_FOUND' => '一致する商品が見つかりません。',
];

return $define;

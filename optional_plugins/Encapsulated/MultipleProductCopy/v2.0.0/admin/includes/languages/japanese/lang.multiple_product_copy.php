<?php

declare(strict_types=1);

/**
 * part of the Multiple Product Copy Plugin
 * @link https://github.com/torvista/Zen_Cart-Multiple_Products_Copy_Move_Delete
 * @copyright Copyright 2025 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @author torvista, Ajeh
 * @version $Id: torvista 2025-04-20
 */

$define = [
    'HEADING_TITLE' => '複数商品のコピー／移動／削除',

// SELECTIONS page 1
    'TEXT_COPY_AS_LINK' => 'リンクされた商品をコピーする ',
    'TEXT_COPY_AS_DUPLICATE' => '商品を複製としてコピーする（新商品）',
    'TEXT_COPY_AS_DUPLICATE_ENABLE' => '新商品を有効にする',
    'TEXT_COPY_ATTRIBUTES' => '属性をコピー',
    'TEXT_COPY_METATAGS' => 'メタタグをコピー',
    'TEXT_COPY_LINKED_CATEGORIES' => 'リンクされたカテゴリをコピー',
    'TEXT_COPY_DISCOUNTS' => '数量割引をコピーする',
    'TEXT_COPY_SPECIALS' => '特別価格をコピー',
    'TEXT_COPY_FEATURED' => 'おすすめ商品の設定をコピー',
    'TEXT_ALL_CATEGORIES' => 'すべてのカテゴリー', // this constant declared earlier to be used subsequently

    'TEXT_MOVE_TO' => '商品を移動する',
    'TEXT_MOVE_PRODUCTS_INFO_SEARCH_CATEGORY' => '<p>検索が検索カテゴリに制限されている場合：<br>リンクされた商品は現在のカテゴリからリンク解除され、ターゲット カテゴリにリンクされます。<br>マスター カテゴリ内の商品のマスターカテゴリ ID は、ターゲットカテゴリの ID に変更されます。</p>',

    'TEXT_MOVE_PRODUCTS_INFO_SEARCH_GLOBAL' => '<p>検索が<strong>制限されていない</strong>場合（"%%TEXT_ALL_CATEGORIES%%"）：<br>選択されたすべての商品のマスターカテゴリーIDがターゲットカテゴリーのIDに変更されます。商品リンクは変更されません。',
    'TEXT_TARGET_CATEGORY' => '対象カテゴリー（コピー／移動用）：',

    'TEXT_COPY_AS_DELETE_SPECIALS' => '商品からスペシャルを削除する',
    'TEXT_COPY_AS_DELETE_LINKED' => 'リンクされた商品を削除する',
    'TEXT_COPY_AS_DELETE_ALL' => 'すべての商品を削除',
    'TEXT_COPY_AS_DELETE_ALL_INFO' => 'このオプションを使用すると、複数の商品を一括で永久削除できます。いずれかの商品（リンク商品／マスター商品）を選択すると、その商品の<span style="text-decoration: underline">すべてのインスタンス</span>（マスター商品とリンク商品の両方）が削除されます。慎重に使用し、事前にデータベースの検証済みバックアップを作成してください。',

// Search Criteria
    'TEXT_ENTER_CRITERIA' => '検索／フィルター条件：',
    'TEXT_PRODUCTS_CATEGORY' => 'カテゴリで検索：',
    'TEXT_INCLUDE_SUBCATS' => 'サブカテゴリを含める',
    'TEXT_ENTER_SEARCH_KEYWORDS' => '次のキーワード（商品のモデル、名前、メーカー名）を含む商品を検索します',
    'TEXT_SEARCH_DESCRIPTIONS' => '商品の説明でも検索',
    'TEXT_PRODUCTS_MANUFACTURER' => 'メーカー',
    'TEXT_ALL_MANUFACTURERS' => 'すべてのメーカー',
    'ENTRY_MIN_PRICE' => '店舗（表示）価格 &gt;= ',
    'ENTRY_MAX_PRICE' => '店舗（表示）価格 &lt;= ',
    'ENTRY_MAX_PRODUCT_QUANTITY' => '商品数量 &lt;= ',
    'ENTRY_SHOW_IMAGES' => '画像を表示しますか？',
    'ENTRY_AUTO_CHECK' => '一致する商品をすべて自動的に選択しますか？',
    'ENTRY_RESULTS_ORDER_BY' => '結果を並べ替える：',
//constant name suffix TEXT_ORDER_BY_?? auto-defined by option name
    'TEXT_ORDER_BY_ID' => '商品ID',
    'TEXT_ORDER_BY_MANUFACTURER' => 'メーカー',
    'TEXT_ORDER_BY_MODEL' => 'モデル',
    'TEXT_ORDER_BY_NAME' => '商品名',
    'TEXT_ORDER_BY_PRICE' => '価格',
    'TEXT_ORDER_BY_QUANTITY' => '量',
    'TEXT_ORDER_BY_STATUS' => '状態',

    'TEXT_TIPS' => '<h2>注記：</h2>
<h3>検索中：</h3>
<ul><li>現在ターゲットカテゴリーに存在する商品は、検索結果から自動的に除外されます。</li>
<li>カテゴリまたはメーカーのいずれかが選択されている場合、またはストア価格フィールドの一つに値が入力されている場合は、検索キーワードを空白のままにすることができます。</li>
<li>特定の金額より高い／低い価格のすべての商品を検索する場合は、ストア価格フィールドの <strong>一つ</strong> のみを使用して検索できます。</li>
<li>ストア価格エントリの小数点記号は、<strong>必ず</strong>「.」（小数点）である必要があります。例: <b>49.99</b></li></ul>
<h3>重複（新規）商品としてコピー：</h3>
<ul><li>属性はオプションでコピーできます。ただし、ダウンロードの場合、ダウンロードファイル名はコピーされません。</li>
<li>レビューはコピーされません。</li></ul>
<h3>商品の削除</h3>
<h4>すべてのカテゴリから商品を完全に削除します：</h4>
<ul><li>削除は永久的であり、元に戻すことはできません</li>
<li>商品のメイン画像が重複していない場合は、メイン画像（中サイズと大サイズ）も削除されます。追加画像と追加大サイズ画像は削除されません。</li></ul>
<h4>１つのカテゴリからリンクされた商品を削除します：</h4>
<ul><li>１つのカテゴリから削除すると、そのカテゴリから商品のリンクが解除されます。</li>
<li>そのカテゴリが商品のマスターカテゴリの ID である場合、商品は削除されません。</li></ul>',

//RESULTS page 2
    'TEXT_PRODUCTS_FOUND' => '一致する商品が %u 個見つかりました。',
    'WARNING_MAX_INPUT_VARS_LIMIT' => '警告：検索結果は%1$u個の商品に制限されています。さらに多くの商品を選択するには、PHP環境パラメータ「max_input_vars」（現在は「%2$u」）の値を増やす必要があります。',
// Search Critera summary
    'TEXT_SEARCH_RESULT_CATEGORY' => '検索カテゴリ： %s',
    'TEXT_SEARCH_RESULT_KEYWORDS' => '検索キーワード： "%s"',
    'TEXT_SEARCH_RESULT_MANUFACTURER' => 'メーカーを検索: %s',
    'TEXT_SEARCH_RESULT_MIN_PRICE' => '検索価格 > %s',
    'TEXT_SEARCH_RESULT_MAX_PRICE' => '検索価格 < %s',
    'TEXT_SEARCH_RESULT_QUANTITY' => '検索数量 < %u',
    'TEXT_SEARCH_RESULT_TARGET' => '対象カテゴリ： "%2$s" ID#%1$u',
    'TEXT_EXISTING_PRODUCTS_NOT_SHOWN' => 'ターゲットカテゴリにまだ存在しない一致する商品のみがリストされます。',
    'TABLE_HEADING_SELECT' => '選択済み',
    'TEXT_TOGGLE_ALL' => 'すべて切り替え',
    'TABLE_HEADING_PRODUCTS_ID' => 'ID',
    'TABLE_HEADING_IMAGE' => '画像',
    'TABLE_HEADING_STATUS' => '状態',
    'IMAGE_ICON_STATUS_ON_EDIT_PRODUCT' => '商品が有効になっています -> 商品を編集',
    'IMAGE_ICON_STATUS_OFF_EDIT_PRODUCT' => '商品は無効です -> 商品を編集',

    'TABLE_HEADING_CATEGORY' => 'カテゴリー内',
    'TABLE_HEADING_LINKED_MASTER' => 'リンクされた%1$s<br>マスター%2$s',
    'TABLE_HEADING_MASTER_CATEGORY' => 'マスターカテゴリー',
    'IMAGE_ICON_MASTER' => 'マスターカテゴリの商品',
    'IMAGE_ICON_LINKED_EDIT_LINKS' => '商品がリンクされています -> リンクマネージャーで編集',
    'IMAGE_ICON_NOT_LINKED_EDIT_LINKS' => '商品がリンクされていません -> リンクマネージャーで編集',

    'TEXT_PRODUCT_MASTER_CATEGORY_CHANGE' => 'この商品を移動する／マスターカテゴリを変更する',
    'TEXT_PRODUCT_SPECIAL_EDIT' => 'この特別価格を編集',

    'TABLE_HEADING_NAME' => '商品名',
    'TABLE_HEADING_PRICE' => '店舗価格',
    'TABLE_HEADING_QUANTITY' => '量',
    'TABLE_HEADING_MFG' => 'メーカー',

    'IMAGE_ICON_EDIT_LINKS' => 'リンク／マスターカテゴリの編集',
//'IMAGE_ICON_CATEGORY_LINKED' => 'リンクされたカテゴリ：%2$s ID#%1$u。リンクマネージャで編集',

    'BUTTON_RETRY' => '検索を変更',
    'BUTTON_CATEGORY_LISTING_SEARCH' => '商品一覧 - 検索カテゴリ',
    'BUTTON_CATEGORY_LISTING_TARGET' => '商品一覧 - 対象カテゴリー',

//RESULTS
    'TEXT_DELETE_LINKED' => 'カテゴリー「%2$s」ID#%1$u',
    'TEXT_DELETE_LINKED_INFO' => '',
    'TEXT_INCLUDED_SUBCATS' => '含まれるサブカテゴリ:',
    'TEXT_DISABLED' => '無効',
//CONFIRM page 3
    'BUTTON_NEW_SEARCH' => '新しい検索',

//Confirm Copy as Linked/Copy as Duplicate
    'TEXT_PRODUCTS_COPIED_TO_LINK' => '%1$u 個の商品がカテゴリー「%3$s」ID#%2$u にリンクされています',
    'TEXT_PRODUCTS_COPIED_TO_DUPLICATE' => '%1$u 個の商品がカテゴリ「%3$s」ID#%2$u に重複しています',
//Confirm Moved
//'TEXT_PRODUCTS_MOVED_TO' => '%1$u 個の商品がカテゴリ「%3$s」ID#%2$u に移動されました',

//Confirm Copy Duplicates
//these four constants used in copy_product_confirm
//if (!defined('TEXT_DUPLICATE_IDENTIFIER')) {
    'TEXT_DUPLICATE_IDENTIFIER' => '【コピー】',
//}
    'TEXT_COPY_AS_DUPLICATE_ATTRIBUTES' => '商品 ID#%1$u から重複する商品 ID#%2$u に属性がコピーされました',
    'TEXT_COPY_AS_DUPLICATE_METATAGS' => '言語 ID#%1$u のメタタグが商品 ID#%2$u から重複した商品 ID#%3$u にコピーされました',
    'TEXT_COPY_AS_DUPLICATE_CATEGORIES' => 'リンクされたカテゴリ ID#%1$u が商品 ID#%2$u からコピーされ、商品 ID#%3$u が重複しました',
    'TEXT_COPY_AS_DUPLICATE_DISCOUNTS' => '商品 ID#%1$u から重複した商品 ID#%2$u に割引をコピーしました',
//these two constants used in move_product_confirm
    'TEXT_PRODUCT_MOVED' => '商品ID#%1$uをカテゴリID#%2$uに移動しました',
    'TEXT_PRODUCT_MASTER_CATEGORY_RESET' => '商品 ID#%1$u のマスター カテゴリ ID がカテゴリ ID#%2$u に変更されました',

    'TEXT_COPY_AS_DUPLICATE_SPECIALS' => '特別価格は商品 ID#%1$u から商品 ID#%2$u にコピーされ、重複しています',
    'TEXT_COPY_AS_DUPLICATE_FEATURED' => 'おすすめ設定を商品 ID#%1$u から重複する商品 ID#%2$u にコピーしました',

//Confirm Move
    'TEXT_PRODUCTS_MOVED_TO' => '%1$u 個の商品がカテゴリ ID#%2$u「%3$s」に移動されました',

//Confirm Delete Specials
    'TEXT_SPECIALS_DELETED_FROM' => '特別価格が %u 商品から削除されました。',

//Confirm Delete
    'TEXT_PRODUCTS_DELETED' => '%u 個の商品が削除されました。',

// Errors
    'ERROR_ILLEGAL_OPTION' => '無効なオプション／オプションが設定されていません。',
    'ERROR_NO_TARGET_CATEGORY' => 'ターゲットカテゴリが選択されていません。',
    'ERROR_TARGET_CATEGORY_HAS_SUBCATEGORY' => 'コピー／移動は許可されていません：ターゲットカテゴリ「%2$s」ID#%1$u にはサブカテゴリが含まれています',
    'ERROR_SEARCH_CATEGORY_HAS_SUBCATEGORY' => 'コピー／移動は許可されていません：検索カテゴリ「%2$s」ID#%1$uにはサブカテゴリが含まれています',
    'ERROR_SAME_CATEGORIES' => '検索カテゴリとターゲット カテゴリは同じです："%2$s" ID#%1$u!',
    'ERROR_NO_PRODUCTS_IN_CATEGORY' => 'カテゴリ「%2$s」ID#%1$u に商品が見つかりません',
    'ERROR_OR_SUBS' => '、またはサブカテゴリ。',
    'ERROR_INVALID_KEYWORDS' => '無効なキーワード',
    'ERROR_NO_PRODUCTS_FOUND' => '「%2$s」ID#%1$u に商品が見つかりません',
    'ERROR_SEARCH_CRITERIA_REQUIRED' => '検索条件が設定されていません。検索カテゴリ／キーワード／メーカー／価格フィールドを設定してください。',
    'ERROR_ARRAY_COUNTS' => '検索で選択された商品の合計数を示すPOST値が設定されていません。これは、選択された商品に対してPHPのmax_input_varsの上限（現在%u）が不足していることが原因と考えられます。この上限はホスティング会社によって引き上げられる可能性があり、選択された商品の２倍以上にする必要があります。',
    'ERROR_NO_SELECTION' => '商品が選択されていません。リストから少なくとも一つの商品を選択する必要があります。',
    'ERROR_CHECKBOXES_NOT_ARRAY' => '選択されたチェックボックスは配列ではありません。',
    'ERROR_CHECKBOX_ID' => '選択されたチェックボックスは商品ID#%uを参照しています。この商品IDは見つかりません。',
    'ERROR_COPY_DUPLICATE_NO_DUP_ID' => '商品 ID#%1$u をカテゴリ ID#%2$u にコピー複製したときに、「copy_product_confirm.php」から重複／新しい商品 ID が返されませんでした。',
    'TEXT_NO_MATCHING_PRODUCTS_FOUND' => '検索条件に一致する商品が見つからなかったか、一致するすべての商品がすでに対象カテゴリに存在します。',
];

return $define;

<?php
// -----
// Part of the "Product Options Stock Manager" plugin by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2015-2024 Vinos de Frutas Tropicales
//
// Last updated:  POSM v5.0.0
//
$define = [
    'HEADING_TITLE' => '商品オプションの在庫管理 - すべて表示',

    'TEXT_LAST_UPDATED' => '最終更新日：　',

    'TEXT_POS_INSTRUCTIONS' => "デフォルトでは、このツールは、数量が <em>オプションの在庫： 再注文レベル</em>（現在は" . POSM_STOCK_REORDER_LEVEL . "）以下のオプションの組み合わせ（バリアントなど）を持つ商品のみを表示します。<a href=\"" . zen_href_link (FILENAME_PRODUCTS_OPTIONS_STOCK) . "\">商品オプション在庫マネージャ</a>によって現在管理されている<b>すべての</b>商品を表示するには、下のチェックボックスをオンにして、<samp>実行</samp>ボタンを押します。<br><br><b>バリアント名</b>列は、<span class=\"option-name\">オプション名</span>： <span class=\"value-name\">オプション値名</span>のようにフォーマットされます。在庫が少ないバリエーションは、<span class=\"out-of-stock\">これ</span>のように強調表示されます。<br><br>重複を報告するように <em>POSM</em> の重複モデル処理を設定した場合、<span style=\"color: red; \">赤い境界線</span> がある <b>バリアント モデル</b> エントリは、商品の定義内または別の<em>POSM</em>オプションの組み合わせ内で重複しています。詳細については、<a href=\"" . zen_href_link (FILENAME_POSM_FIND_DUPLICATE_MODELNUMS) . "\"><em>ツール :: POSM: 重複モデルの検索</em></a>を参照してください。<br><br>",
    'TEXT_POS_INSTRUCTIONS2' => "複数のアイテムの数量を変更し、「更新」ボタンをクリックしてすべての変更を適用するか、<b>商品名</b>リンクをクリックしてその商品のオプションの在庫を管理できます。",

    'POSM_TEXT_PRODUCT_NAME' => '商品名',
    'POSM_TEXT_VARIANT_MODEL' => 'バリアントモデル',
    'POSM_TEXT_OPTIONS_LIST' => 'バリアント名',
    'TEXT_POS_STOCK_QUANTITY' => '量',

    'BUTTON_GO' => '実行',

    'TEXT_UPDATE_ALT' => '変更されたすべての値を更新するには、ここをクリックしてください。',

    'TEXT_CHECK_TO_VIEW_ALL' => '管理されている<em>すべて</em>のバリアントを表示しますか？',

    'POSM_VIEW_ALL_UPDATED' => '選択した更新が正常に処理されました。',

    'POSM_VIEW_ALL_NO_PRODUCTS_TO_LIST' => '表示する管理対象商品はありません。',
    'POSM_TEXT_DISPLAY_NUMBER_OF_PRODUCTS' => '<b>%u</b> から <b>%u</b> を表示しています（<b>%u</b>商品中）',

    'ERROR_MISSING_INPUTS' => '更新リクエストを処理できませんでした。サイトの PHP 設定値 <code>post_max_size</code> (現在は %1$s) および/または <code>max_input_size</code> (現在は %2$s) を増やす必要があります。',
];
return $define;

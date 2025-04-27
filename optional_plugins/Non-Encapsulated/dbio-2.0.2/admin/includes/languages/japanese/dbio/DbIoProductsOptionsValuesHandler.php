<?php
// -----
// Part of the DataBase Import/Export (aka DbIo) plugin, created by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2016-2025, Vinos de Frutas Tropicales.
//

// -----
// Defines the handler's descriptive text.
//
define(
    'DBIO_PRODUCTSOPTIONSVALUES_DESCRIPTION',
    'このレポート形式は、<code>products_options_values</code> テーブル内の<b>すべての</b>フィールドのインポート/エクスポートをサポートしています。このレポートを使用して、ストアの商品オプションの値に関する情報を追加または変更してください。DbIo CSV の一つのレコードは、一つの言語固有の商品オプション値に対応します。' .
    '<br><br>' .
    '<b>注記：</b>' .
    '<ol>' .
        '<li>エクスポートには、<code>v_products_options_id</code> と <code>v_products_options_name</code> という2つの追加フィールドが含まれます。オプション名はレコードのインポートでは使用されません（必須ではありません）が、オプションIDは<b>使用されます</b>。その値は <code>products_options_values_to_products_options</code> テーブルにレコードを作成する際に使用されます。</li>' .
        '<li>新しいオプション値を追加するには、<code>v_products_options_values_id</code> 列を <code>0</code> に設定します。</li>' .
    '</ol>'
);

<?php
// -----
// Part of the DataBase Import/Export (aka DbIo) plugin, created by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2015-2017, Vinos de Frutas Tropicales.
//

$define = [
    // Defines the handler's descriptive text.
    'DBIO_PRODUCTS_DESCRIPTION' => 'このレポート形式は、「products」テーブルと「products_description」テーブル内の<b>すべての</b>フィールド（製品の基本情報）のインポート/エクスポートをサポートしています。提供されているフィルターを使用することで、製品のステータス、メーカー、またはカテゴリツリーに基づいてレポートの出力を絞り込むことができます。',
    // Definitions that are used for the export-filters, displayed on Tools->Database I/O Manager
    'DBIO_PRODUCTS_FILTERS_LABEL' => '出力を選択したメーカーまたはカテゴリに絞り込みます。Ctrlキーを押しながらクリックすることで複数のオプションを選択/選択解除できます。すべてのオプションを選択解除すると、すべてのメーカーとカテゴリが出力されます。',
    'DBIO_PRODUCTS_MANUFACTURERS_LABEL' => 'メーカーを制限：',
    'DBIO_PRODUCTS_CATEGORIES_LABEL' => 'カテゴリを制限',
    'DBIO_PRODUCTS_STATUS_LABEL' => '商品ステータス：',
    'DBIO_PRODUCTS_TEXT_STATUS_ENABLED' => '有効のみ',
    'DBIO_PRODUCTS_TEXT_STATUS_DISABLED' => '無効のみ',
    'DBIO_PRODUCTS_TEXT_STATUS_ALL' => 'すべてのステータス',
];

return $define;

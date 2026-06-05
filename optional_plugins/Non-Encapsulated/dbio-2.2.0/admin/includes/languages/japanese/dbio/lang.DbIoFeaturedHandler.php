<?php
// -----
// Part of the DataBase Import/Export (aka DbIo) plugin, created by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2015-2025, Vinos de Frutas Tropicales.

$define = [
    // Defines the handler's descriptive text.
    'DBIO_FEATURED_DESCRIPTION' => 'このレポート形式では、「featured」テーブル内のすべてのフィールドと <em>注目の商品</em> 情報のインポート/エクスポートがサポートされています。<br><br><b>注意</b><ol><li>インポートを成功させるには、少なくとも <code>v_products_id</code> 列が存在している必要があります。</li><li>インポート時に指定する <code>v_products_id</code> は、有効な製品に関連付けられている必要があります。</li><li>特定の products_id に対して <b>REMOVE</b> を指定した <code>v_dbio_command</code> 列を含めることで、製品をおすすめ製品から削除できます。</li></ol>',
];

return $define;

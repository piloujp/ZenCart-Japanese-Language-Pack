<?php
// -----
// Part of the DataBase I/O Manager (aka DbIo) plugin, created by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2015-2024, Vinos de Frutas Tropicales.
//
// Last updated: DbIo v2.0.1

$define = [
    // Defines the handler's descriptive text.
    'DBIO_PRODUCTSATTRIBSBASIC_DESCRIPTION' => 'このレポート形式は、基本的な商品属性値のインポート/エクスポートをサポートしています。関連商品の<b>モデル番号</b>でインデックス付けされたレポートには、商品/商品オプションのペアごとに1つのレコードが含まれます。オプション固有の値は、ストアのデフォルト言語を使用して、^ 文字で区切られます。<br><br><b>注：</b><ol><li>「インポート」アクションを正常に完了するには、ストアの商品ごとに一意のモデル番号が必要です。</li><li>関連属性レコードを正常にインポートするには、すべてのオプション名とオプション値の名前が<b>データベース内に既に存在している必要があります</b>。</li><li><b>正常に追加されるのは、<i>新しい</i></b>オプションの組み合わせのみです。</li></ol>',
];

return $define;

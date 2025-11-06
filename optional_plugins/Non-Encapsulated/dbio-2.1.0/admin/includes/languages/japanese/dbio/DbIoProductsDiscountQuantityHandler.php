<?php
// -----
// Part of the DataBase Import/Export (aka DbIo) plugin, created by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2018, Vinos de Frutas Tropicales.
//

// -----
// Defines the handler's descriptive text.
//
define('DBIO_PRODUCTSDISCOUNTQUANTITY_DESCRIPTION', 'このレポート形式では、商品の数量割引情報に関連付けられた <code>products</code> テーブルおよび <code>products_discount_quantity</code> テーブル内のフィールドのインポート/エクスポートがサポートされています。商品のエクスポート レコードには参照値として <code>v_products_model</code> が含まれますが、インポートでは使用されません。一致するインポート レコードは、レコードの <code>v_products_id</code> 列のみに基づきます。<br><br>各商品の数量割引情報が指定されている場合は、<code>q:p[;q:p]...</code> としてフォーマットされます。ここで、<b>q</b> は、<b>p</b> 割引価格を実現する一意の商品数量です。<br><br>商品の <code>products_discount_type</code> 値は、次のいずれかになります <ol start="0"><li><b>None</b>： 割引なし;定義された割引数量はすべて削除されます。</li><li><b>Percentage</b>： 価格はパーセンテージ割引です。</li><li><b>Actual Price</b>： 価格は実際に割引された価格です。</li><li><b>Amount Off</b>： 指定された価格は固定額の割引です。</li></ol><br>商品の <code>products_discount_type_from</code> 値は、次のいずれかになります。<ol start="0"><li><b>Price</b>： パーセンテージまたは割引額は、商品の「通常」価格から割引されます。</li><li><b>Special</b>： パーセンテージまたは割引額は、商品の「特別」価格から割引されます。</li></ol>');

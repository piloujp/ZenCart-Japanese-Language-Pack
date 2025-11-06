<?php
// -----
// Part of the DataBase Import/Export (aka DbIo) plugin, created by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2016-2020, Vinos de Frutas Tropicales.
//

// -----
// Defines the handler's descriptive text.
//
define('DBIO_PRODUCTSATTRIBSRAW_DESCRIPTION', 'このレポート形式は、<code>products_attributes</code> テーブルと <code>products_attributes_download</code> テーブル内の <b>すべての</b> フィールドのインポート/エクスポートをサポートしており、ストアの商品属性に関する情報を追加または変更できます。商品からオプション/値のペアを削除するには、<code>v_dbio_command</code> 列を <b>REMOVE</b> に設定します。<br><br>CSV ファイルの 1 行は、1 つの商品固有の属性に対応します。属性関連情報を正常にインポートするには、すべての商品オプションと商品オプション値のエントリがデータベースに事前に存在している必要があります。<br><br>エクスポートには、出力が読みやすくなるよう、ストアのデフォルト言語で各オプションとオプション値の名前が含まれます。これらの値はインポート アクションには使用されません。');

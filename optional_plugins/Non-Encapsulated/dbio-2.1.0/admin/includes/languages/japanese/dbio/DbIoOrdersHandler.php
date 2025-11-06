<?php
// -----
// Part of the DataBase Import/Export (aka DbIo) plugin, created by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2016-2017, Vinos de Frutas Tropicales.
//

// -----
// Defines the handler's descriptive text.
//
define ('DBIO_ORDERS_DESCRIPTION', 'このレポート形式では、「orders」テーブル内のすべてのフィールドのエクスポートのみがサポートされています。この情報には、関連製品やその属性は含まれません。フィルターを使用することで、注文のステータス、注文IDの範囲、または日付の範囲に基づいてレポートの出力を絞り込むことができます。');

// -----
// Definitions that are used for the export-filters, displayed on Tools->Database I/O Manager
//
define ('DBIO_ORDERS_ORDERS_STATUS_LABEL', 'エクスポートに含める注文のステータスを選択します。');
define ('DBIO_ORDERS_ORDERS_ID_RANGE_LABEL', 'エクスポートする注文ID値の範囲を選択してください。両方のフィールドを空白のままにすると、<b>すべての</b>注文ID値が選択されます。');
define ('DBIO_ORDERS_ORDERS_ID_MIN_LABEL', '最小値（含む）：');
define ('DBIO_ORDERS_ORDERS_ID_MAX_LABEL', '最大値（含む）：');

define ('DBIO_ORDERS_ORDERS_DATE_RANGE_LABEL', 'エクスポートする注文日の範囲を選択してください。日付はYYYY-MM-DD形式で入力してください。両方のフィールドを空白のままにすると、<b>すべての</b>注文日が選択されます。');
define ('DBIO_ORDERS_ORDERS_DATE_MIN_LABEL', '開始日：');
define ('DBIO_ORDERS_ORDERS_DATE_MAX_LABEL', '終了日：');

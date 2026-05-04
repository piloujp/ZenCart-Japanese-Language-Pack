<?php
// -----
// Part of the "Product Options Stock Manager" plugin by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2014-2024 Vinos de Frutas Tropicales
//
$define = [
    'HEADING_TITLE' => '商品のオプションの在庫： 属性別に在庫を変換',

    'TEXT_INSTRUCTIONS' => 'このツールを使用して、既存の <em>属性別在庫 (SBA)</em> データベース テーブルを、関連する <em>商品オプション在庫（POSM）</em> データベース テーブルに変換します。<em>POSM</em>ではすべてのオプションの組み合わせを指定する必要があるため、<em>SBA</em> の組み合わせの一部は「変換可能」ではない可能性があることに注意してください。以下の表示を参照してください。ステータス列にオプションが欠落しているか不明な商品が表示されている場合、その <em>SBA</em> レコードは変換されません。<br><br><strong>Note:</strong>「送信」ボタンをクリックすると、POSM 構成内の既存のエントリがすべて削除されます。',

    'ERROR_NO_SBA_TABLE' => '変換できません - <em>products_with_attributes_stock</em> データベース テーブルがありません。',

    'TEXT_FORM_INSTRUCTIONS' => '以下の情報を確認し、[<em>送信</em>] ボタンをクリックして、<em>SBA</em> エントリを対応する <em>POSM</em> エントリに変換します。',
    'BUTTON_ALT_TEXT' => 'データベーステーブルを変換するにはここをクリックしてください',

    'TEXT_MISSING_OPTIONS' => '<span class="missing">&cross; オプションがありません（%s）</span>',
    'TEXT_UNSUPPORTED_OPTION_TYPE' => '<span class="missing">&cross; オプション ID (%1$u) はサポートされていないオプション タイプ (%2$u) を使用しています</span>',
    'TEXT_MISSING_PRODUCT' => '<span class="missing">&cross; 商品が存在しません</span>',
    'TEXT_OK' => '<span class="ok">&check;</span>',

    'TABLE_HEADING_STOCK_ID' => 'ストックID',
    'TABLE_HEADING_QUANTITY' => '量',
    'TABLE_HEADING_MODEL' => 'モデル',
    'TABLE_HEADING_STATUS' => '状態',

    'MESSAGE_CONVERTED_OK' => '<em>属性別の在庫</em>エントリが、対応する<em>商品オプションの在庫</em>に正常に変換されました。',
    'MESSAGE_CONVERTED_MISSING' => '以下の情報を確認してください。<em>属性別在庫</em>エントリの一部を変換できませんでした。',

    'JS_MESSAGE_ARE_YOU_SURE' => 'この操作により、POSM テーブルがリセットされ、SBA 変換された情報のみが含まれるようになります。続行してもよろしいですか？',
];
return $define;

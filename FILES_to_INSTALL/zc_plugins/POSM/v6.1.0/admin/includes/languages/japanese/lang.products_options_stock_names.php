<?php
// -----
// Part of the "Product Options Stock Manager" plugin by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2014-2024 Vinos de Frutas Tropicales
//
// Last updated: POSM v5.0.0
//
$define = [
    'HEADING_TITLE' => "商品のオプションの在庫管理: 在庫切れラベルの管理",
    'TEXT_INSTRUCTIONS' => 'このページを使用して、<em>Products\' Options\' Stock</em> プラグインによって管理されている商品に関連付けるテキスト ラベルを定義および管理します。商品に割り当てたラベルは、オプションの組み合わせが「在庫切れ」の場合に顧客に表示されます。特殊記号<b>[date]</b>を使用して、（オプションで）関連する株式関連の日付を挿入する場所を指定します。',

    'TABLE_HEADING_NAME_ID' => 'ラベルID',
    'TABLE_HEADING_LABEL_NAME' => 'ラベル名',
    'TABLE_HEADING_ACTION' => 'アクション',

    'BUTTON_MANAGE' => '管理',
    'BUTTON_MANAGE_ALT' => '「商品オプションの在庫」を管理するにはここをクリックしてください',

    'TEXT_INFO_EDIT_INTRO' => '必要な変更を行ってください',
    'TEXT_INFO_LABEL_NAME' => 'ラベル名：',
    'TEXT_INFO_INSERT_INTRO' => '新しい「在庫切れラベル」を入力してください。',
    'TEXT_INFO_DELETE_INTRO' => 'この「在庫切れラベル」を削除してもよろしいですか？',
    'TEXT_INFO_HEADING_NEW' => '新しい「在庫切れラベル」',
    'TEXT_INFO_HEADING_EDIT' => '「在庫切れラベル」を編集する',
    'TEXT_INFO_HEADING_DELETE' => '「在庫切れラベル」を削除します',

    'CAUTION_NO_LABEL_NAMES_FOUND' => '「在庫切れラベル」は見つかりませんでした。',
    'MESSAGE_ERROR_NO_ID' => '操作のIDがありません。',
    'ERROR_USED_IN_OPTIONS_STOCK' => 'ストックラベル「<b>%s</b>」は一つ以上の商品のオプションで使用されており、削除できません。',
    'ERROR_DATE_MULTI_LANG' => '<b>[date]</b>記号が存在する場合は、すべての言語の値で使用する必要があります。',
    'ERROR_COMMA_IN_NAME' => 'ストックの<b>ラベル名</b>にはカンマ（,）を含めることはできません。再入力してください。',
    'ERROR_NAME_TOO_LONG' => '在庫ラベル「<b>%s</b>」の文字数が多すぎます。再入力してください。',
];
return $define;

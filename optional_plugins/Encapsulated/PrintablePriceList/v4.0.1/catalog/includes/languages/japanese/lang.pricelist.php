<?php
// -----
// Part of the "Printable Price List" plugin for Zen Cart.
// $Id: pricelist.php, 2006 paulm
//
$define = [
    'TABLE_HEADING_PRODUCTS' => '商品',
    'TABLE_HEADING_MODEL' => 'モデル',
    'TABLE_HEADING_MANUFACTURER' => 'メーカー',
    'TABLE_HEADING_WEIGHT' => '重さ',
    'TABLE_HEADING_PRICE_INC' => '税込 ',
    'TABLE_HEADING_PRICE_EX' => '税抜き ',
    'TABLE_HEADING_NOTES_A' => '注釈（A）',
    'TABLE_HEADING_NOTES_B' => '注釈（B）',

    'TEXT_PL_PAGE' => 'ページ： ',
    'TEXT_PL_HEADER_TITLE' => '%s 印刷用な価格表',
    'TEXT_PL_HEADER_TITLE_PRINT' => '印刷用な価格表： %s',
    'TEXT_PL_SCREEN_INTRO' => '%s つの製品を表示しています。詳細な製品情報についてはリンクをクリックしてください。',
    'TEXT_PL_NOTHING_FOUND' => '検索に一致する製品またはカテゴリがありません。別の選択を行ってください。',

    'STORE_NAME_ADDRESS_PL' => str_replace("\n", ' - ', STORE_NAME_ADDRESS),
    'TEXT_PL_AVAIL_TILL' => '特別オファーの有効期限： ',
    'TEXT_PL_SPECIAL' => '特別オファー ',
    'TEXT_PL_PRODUCT_HAS_NO_PRICE' => '--',
    'TEXT_PL_CATEGORIES' => 'すべてのカテゴリー',
    'NAVBAR_TITLE' => '印刷用な価格表',
    'TABLE_HEADING_SOH' => '在庫', // bmoroney
    'TABLE_HEADING_ADDTOCART' => 'カートに追加',//Added by Vartan Kat for Add to cart button
    'PL_TEXT_GROUP_NOT_ALLOWED' => '申し訳ありませんが、このリストを表示する権限がありません。',
    'PL_PRINT_ME' => 'このページを印刷',

    'TEXT_OPTIONS_AVAILABLE' => '利用可能なオプション：',
    'TEXT_INCL' => '-',
    'TEXT_OPTION_IS_FILE' => 'ファイルのアップロード',
    'TEXT_OPTION_IS_TEXT' => 'テキスト入力',
    'TEXT_OPTION_IS_PER_WORD' => '、単語あたり',
    'TEXT_OPTION_FREE_WORDS' => '、%u単語無料。',   //-%u is filled in with the number of free words
    'TEXT_OPTION_IS_PER_LETTER' => '、１文字あたり',
    'TEXT_OPTION_FREE_LETTERS' => '、3文字無料。',   //-%u is filled in with the number of free letters
];
return $define;

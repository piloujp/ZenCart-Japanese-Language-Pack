<?php
// -----
// Part of the "Product Options Stock Manager" plugin by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2015-2024 Vinos de Frutas Tropicales
//
// Last updated: POSM v5.0.0
// -----
// Based on the Find Duplicate Models plugin (https://www.zen-cart.com/downloads.php?do=file&id=1323) by swguy.
//
$define = [
    'HEADING_TITLE' => 'POSM：重複モデルの検索',
    'HEADING_PRODUCTS_LINK' => '商品リンク',
    'HEADING_POSM_LINK' => 'POSM リンク',
    'HEADING_PRODUCTS_MODEL' => '商品モデル', 
    'HEADING_POSM_MODEL' => 'POSM モデル',
    'HEADING_PRODUCTS_NAME' => '商品名',
    'HEADING_PRODUCTS_DISABLED' => '商品は有効になっていますか？',

    'INSTRUCTIONS' => 'このツールを使用して、ストアの商品内の重複するモデル番号を識別します。基本商品の定義で設定されているものと、<em>POSM</em> 設定のオプション組み合わせモデルの両方として設定されます。デフォルトでは、レポートには<em>有効な</em>商品のみが含まれます。<em>無効な</em> 商品を含めるには、下のチェックボックスをオンにして、<b>実行</b> ボタンをクリックします。<br><br><strong>注：</strong>重複レポートに１つの商品がリストされている場合、その商品には、基本商品と同じモデル番号を持つ<em>POSM</em>オプションの組み合わせがあります。',
    'NO_DUPS_FOUND' => 'おめでとうございます。すべてのモデル番号は一意です。', 

    'INCLUDE_DISABLED' => '無効な商品を含めますか？',
    'POSM_MODEL_IS_EMPTY' => '- 空の -',

    'BUTTON_GO' => '実行',

    'DUPS_UNMANAGED_UNMANAGED' => 'モデルが重複している管理対象外商品（管理対象外商品内）',
    'DUPS_UNMANAGED_MANAGED' => 'モデルが重複している管理対象外商品（管理対象商品内）',
    'DUPS_MANAGED_MANAGED' => 'モデルが重複している管理対象商品（管理対象商品内）',
];
return $define;

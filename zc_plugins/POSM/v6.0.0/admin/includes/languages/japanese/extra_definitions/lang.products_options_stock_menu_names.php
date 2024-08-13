<?php
// -----
// Part of the "Product Options Stock" plugin by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2014-2024 Vinos de Frutas Tropicales
//
// Last updated: POSM 5.0.0
//
$define = [
    'BOX_REPORTS_PRODUCTS_OPTIONS_STOCK' => '商品オプション別売上',
    'BOX_CATALOG_PRODUCTS_OPTIONS_STOCK' => 'オプションの在庫を管理する',
    'BOX_CATALOG_PRODUCTS_OPTIONS_STOCK_VIEW_ALL' => 'オプションの在庫 - すべて表示',
    'BOX_LOCALIZATION_PRODUCTS_OPTIONS_STOCK' => '在庫切れラベル',
    'BOX_CONFIGURATION_PRODUCTS_OPTIONS_STOCK' => 'オプションの在庫マネージャー',
    'BOX_TOOLS_CONVERT_SBA2POSM' => 'SBA を POSM に変換する',
    'BOX_TOOLS_POSM_FIND_DUPMODELS' => 'POSM: 重複モデルの検索',

    // -----
    // Used by the initialization script, when checking that the EO function file contains the "proper" notifiers,
    // when checking for "expired" back-in-stock dates and messaging installation or updates.
    //
    'POSM_EO_DOWNLEVEL' => '現在インストールされている<em>注文編集</em>バージョン（v%s）は<em>商品オプション在庫マネージャ</em>をサポートしていません。EO v4.2.0 以降に更新してください。',
    'POSM_BIS_DATES_EXPIRED' => '一つ以上の再入荷日が有効期限内です（%1$u日）。詳細については、<a href="%2$s">こちら</a>をクリックしてください。',
    'POSM_INSTALLED' => '商品のオプションのストック マネージャー、バージョン %s が正常にインストールされました。',
    'POSM_UPDATED' => '商品のオプションの在庫マネージャがバージョン %1$s から %2$s に正常に更新されました。',

    // -----
    // Used on the categories page as alt-text for the options-stock indicator icons.
    //
    'POS_ALT_PRODUCT_HAS_OPTIONS_STOCK' => '商品には在庫オプションがあります',
    'POS_ALT_PRODUCT_HAS_OPTIONS_NO_STOCK' => '商品にはオプションがありますが、在庫がありません',

    // -----
    // Used by the admin-level options' stock observer to report that one or more stock records have been removed.
    //
    'CAUTION_REMOVING_OPTIONS_STOCK' => 'この操作により、%u 個の商品のオプションの在庫記録が削除されました。',

    // -----
    // Used by the admin-level options' stock observer to report that one or more stock records were copied.
    'SUCCESS_COPYING_OPTIONS_STOCK' => '%u 個の商品のオプションの在庫記録がコピーされました。',

    // -----
    // Used by Catalog->Manage Options' Stock to notify the admin user when the re-order level has been found to be invalid.
    //
    'CAUTION_POSM_REORDER_LEVEL' => "<em>オプションの在庫： 再注文レベル</em>設定に無効な値（%s）が含まれていたため、値は０にリセットされました。",

    // -----
    // Used by both Catalog->Manage Options' Stock and the "View All" tool to alert the admin to a disallowed duplicate model number and to provide
    // sort-by model number.
    //
    'ERROR_DUPLICATE_MODEL_FOUND' => 'モデル番号（<em>%s</em>）はすでに使用されているため、この情報を保存するには変更する必要があります。',
    'JSCRIPT_ERROR_DUPLICATE_MODEL' => "'このモデル番号（'+modelNum+'）はすでに使用されているため、この情報を保存するには変更する必要があります。'",
    'ERROR_MODEL_TOO_LONG' => '入力したモデル番号（%s）の文字数が多すぎます。再入力してください。',
    'ERROR_INVALID_QUANTITY' => 'バリアントの数量値は数値で負でない必要があります。再入力してください。',

    'POSM_TEXT_SORT_BY' => 'オプションの組み合わせを次の基準で並べ替えます：',
    'POSM_TEXT_SORT_BY_MODEL_ASC' => 'モデル番号、A-Z',
    'POSM_TEXT_SORT_BY_MODEL_DESC' => 'モデル番号、Z-A',
    'POSM_TEXT_SORT_BY_DEFINITION' => "属性の並び順",

    // -----
    // Used by  incudes/javascript/attributes_controller_posm.php.
    //
    'POSM_JS_CAUTION_OPTION_REMOVAL' => '注意！\n\nこの製品の属性は、製品オプション在庫マネージャーによって管理されます。\n\nこのオプションの削除を確認すると、**すべての**管理対象オプションが削除され、製品の数量が 0 に設定されます。',
    'POSM_JS_CAUTION_ATTRIBUTE_REMOVAL' => '注意！\n\nこの製品の属性は、製品オプション在庫マネージャーによって管理されます。\n\nこの属性の削除を確認すると、%u 個の管理オプションが削除され、それに応じて製品の数量が更新されます。',
];
return $define;

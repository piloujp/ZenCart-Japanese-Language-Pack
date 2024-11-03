<?php
// -----
// Part of the VAT4EU plugin by Cindy Merkin a.k.a. lat9 (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2017-2024 Vinos de Frutas Tropicales
//
// Last updated: v3.2.0
//
$define = [
    'VAT4EU_TEXT_MESSAGE_INSTALLED' => '<em>VAT Mod</em> プラグインの v%s が正常にインストールされました。',
    'VAT4EU_TEXT_MESSAGE_UPDATED' => '<em>VAT4EU</em> プラグインが v%1$s から v%2$s に正常に更新されました。',

    'VAT4EU_GB_COUNTRY_REMOVED' => '国「GB」は、VAT4EU の <em>EU 諸国</em> リストから削除されました。',

    'BOX_CONFIG_VAT4EU' => 'EU諸国のVAT',

    // -----
    // These two definitions are used in different spots.
    //
    // 1) VAT4EU_ENTRY_VAT_NUMBER is used during VAT Number "gathering" and should not be an empty string.
    // 2) VAT4EU_DISPLAY_VAT_NUMBER is used when formatting an address-block with a previously-entered VAT Number.
    //    If you don't want to precede the actual VAT Number with that text, just set the value to ''; otherwise,
    //    remember to keep the final space so that there's separation from the text and the actual VAT Number!
    //
    'VAT4EU_ENTRY_VAT_NUMBER' => 'VAT番号：',
    'VAT4EU_DISPLAY_VAT_NUMBER' => 'VAT番号： ',

    'VAT4EU_ENTRY_OVERRIDE_VALIDATION' => 'VAT 検証オーバーライド：',

    'VAT4EU_CUSTOMERS_HEADING' => 'VAT番号',

    'VAT4EU_ENTRY_VAT_MIN_ERROR' => '<span class="errorText">少なくとも %u 文字。</span>',
    'VAT4EU_ENTRY_VAT_PREFIX_INVALID' => '<span class="errorText">アドレスは <em>%2$s</em> にあるため、<b>%1$s</b> で始まる必要があります。</span>',
    'VAT4EU_ENTRY_VAT_INVALID_CHARS' => '<span class="errorText">無効な文字が検出されました。</span>',
    'VAT4EU_ENTRY_VAT_VIES_INVALID' => '<span class="errorText">VIES 検証に失敗しました。</span>',
    'VAT4EU_ENTRY_VAT_REQUIRED' => '<span class="errorText">この項目は必須です</span>',

    // -----
    // Used as in the title attribute when displaying VAT Numbers' status in Customers->Customers.
    //
    'VAT4EU_ADMIN_OVERRIDE' => '管理者によって上書きされました',
    'VAT4EU_VIES_OK' => 'VIESによる検証済み',
    'VAT4EU_NOT_VALIDATED' => '管理者による検証が必要',
    'VAT4EU_VIES_NOT_OK' => 'VIES により無効と判定されました',

    // -----
    // Used as the title attribute for the heading sorts in Customers->Customers.
    //
    'VAT4EU_SORT_ASC' => 'ステータスで昇順に並べ替え',
    'VAT4EU_SORT_DESC' => 'ステータスで降順に並べ替え',

    // -----
    // Issued during Edit Orders processing if the admin has changed either the VAT Number or its
    // validation status.
    //
    'VAT4EU_EO_CUSTOMER_UPDATE_REQUIRED' => '<em>VAT 番号</em>またはそのステータスが <em>この注文のみ</em>変更されました。この変更を今後の購入に利用できるように、顧客情報を編集してください。',
];
return $define;

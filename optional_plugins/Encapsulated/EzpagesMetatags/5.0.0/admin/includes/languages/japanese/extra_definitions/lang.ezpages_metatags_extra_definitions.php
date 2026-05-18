<?php
// -----
// Part of the EZ-Pages Metatags plugin, v5.0.0+, provided by lat9
//
// Copyright (C) 2015-2026, Vinos de Frutas Tropicales
//
$define = [
    //- Used for the labels associated with the ezpages' data-entry screen.
    'EZPAGES_METATAGS_TITLE_LABEL' => 'メタデータタイトル：',
    'EZPAGES_METATAGS_KEYWORDS_LABEL' => 'メタデータキーワード：',
    'EZPAGES_METATAGS_DESC_LABEL' => 'メタデータの説明：',

    // -----
    // Used to form the metatags' icon-link on the EZ-Pages listing.
    //
    // %1$s ... Filled in with the link to the current EZ-Page.
    // %2$s ... Filled in with either 'on' or 'off', depending on the page's metatags status.
    // %3$s ... Filled in with the title-text, depending on the page's metatags status.
    //
    'EZPAGES_METATAGS_ICON' =>
        '<a class="btn btn-sm btn-default btn-metatags-%2$s" href="%1$s" role="button" title="%3$s">' .
            '<i class="fa-solid align-middle fa-asterisk" aria-hidden="true"></i>' .
        '</a>',
    'EZPAGES_METATAGS_ICON_TITLE_ON' => '編集：メタタグがあります',
    'EZPAGES_METATAGS_ICON_TITLE_OFF' => '編集：メタタグなし',
];
return $define;

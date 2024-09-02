<?php
/*
 * BOOTSTRAP v3.7.2
 */
// -----
// Part of the Bootstrap template, defining commonly-used phrases and phrases unique to the bootstrap template.
//
$define = [
    'BOOTSTRAP_PLEASE_SELECT' => '選んでください ...',
    'BOOTSTRAP_CURRENT_ADDRESS' => ' （現在選択中）',

// -----
// Additional buttons.
//
    'BUTTON_BACK_TO_TOP_TITLE' => 'トップに戻る',

// -----
// Used on the products_all and product listing for the alpha-filter dropdown.
// Note: Defined in multiple language files for zc158 and zc200!
//
    'TEXT_SHOW' => 'フィルタリング条件:',

// -----
// Used during checkout and on various address-rendering pages.
//
    'TEXT_SELECT_OTHER_PAYMENT_DESTINATION' => 'この注文の請求書を別の場所に配送する場合は、ご希望の請求先住所を選択してください。',
    'TEXT_SELECT_OTHER_SHIPPING_DESTINATION' => 'この注文を別の場所に配送する場合は、ご希望の配送先住所を選択してください。',
    'NEW_ADDRESS_TITLE' => '新しい住所を入力してください',
    'TEXT_PRIMARY_ADDRESS' => ' （主要住所）',
    'PRIMARY_ADDRESS' => ' （主要住所）',
    'TABLE_HEADING_ADDRESS_BOOK_ENTRIES' => 'アドレス帳のエントリから選択',

// -----
// Used on the product*_info pages.
//
    'TEXT_MULTIPLE_IMAGES' => ' 追加画像 ',
    'TEXT_SINGLE_IMAGE' => ' 拡大画像 ',
    'PREV_NEXT_FROM' => ' from ',
    'IMAGE_BUTTON_PREVIOUS' => '前',
    'IMAGE_BUTTON_NEXT' => '次',
    'IMAGE_BUTTON_RETURN_TO_PRODUCT_LIST' => '商品リストに戻る',
    'MODAL_ADDL_IMAGE_PLACEHOLDER_ALT' => '%s のモーダル追加画像',   //- %s is filled in with the product's name

// -----
// Used on the product_music_info page.
//
    'TEXT_ARTIST_URL' => '詳細については、アーティストの<a href="%s" target="_blank">ウェブページ</a>をご覧ください。',
    'TEXT_PRODUCT_RECORD_COMPANY' => 'レコード会社：',

// -----
// Used on the shopping_cart page.
//
    'TEXT_CART_MODAL_HELP' => '[ヘルプ （？）]',
    'HEADING_TITLE_CART_MODAL' => 'ビジターカート / メンバーカート',
    'TEXT_CART_ARIA_HEADING_DELETE_COLUMN' => 'この列のアイコンをクリックすると、カートから削除されます。',
    'TEXT_CART_ARIA_HEADING_UPDATE_COLUMN' => 'この列のアイコンをクリックすると、カート内の数量が更新されます。',

// -----
// Used on various pages that display the cart's contents.
//
    'SUB_TITLE_TOTAL' => '合計：',

// -----
// Used by various product listing pages, e.g. SNAF.
//
    // -----
    // The two image-heading constants are used when a site chooses to display listings
    // in table-mode (PRODUCT_LISTING_COLUMNS_PER_ROW is set to '1').  If your site wants
    // the image-heading to *always* be displayed, set the TABLE_HEADING_IMAGE value to
    // the text you desire.  If that value is set to an empty string, then a screen-reader-only
    // heading is used along with the TABLE_HEADING_IMAGE_SCREENREADER value.
    //
    'TABLE_HEADING_IMAGE' => '',
    'TABLE_HEADING_IMAGE_SCREENREADER' => '商品イメージ',

    'TABLE_HEADING_PRODUCTS' => '商品名',
    'TABLE_HEADING_MANUFACTURER' => 'メーカー',
    'TABLE_HEADING_PRICE' => '価格',
    'TABLE_HEADING_WEIGHT' => '重さ',
    'TABLE_HEADING_BUY_NOW' => '今すぐ購入',
    'TEXT_NO_PRODUCTS' => 'このカテゴリには商品がありません。',
    'TEXT_NO_PRODUCTS2' => 'このメーカーから入手可能な商品はありません。',

// -----
// Used by various /modalboxes
//
    'TEXT_MODAL_CLOSE' => '閉',
    'TEXT_MORE_INFO' => '[詳細情報]',
    'ARIA_REVIEW_STAR' => 'スター',
    'ARIA_REVIEW_STARS' => 'スター',

// -----
// Overriding definition for the login page, removing unwanted javascript.
//
    'TEXT_VISITORS_CART' => '<strong>備考：</strong>以前に買い物をしたことがあり、カートに何かを残した場合は、便宜上、再度ログインすると統合されます。',

// -----
// Used by the (optional) AJAX search feature.
//
    'TEXT_AJAX_SEARCH_TITLE' => '簡単検索はこちらから…',
    'TEXT_AJAX_SEARCH_PLACEHOLDER' => '検索...',
    'TEXT_AJAX_SEARCH_RESULTS' => '合計 %u 件の結果が見つかりました。',
    'TEXT_AJAX_SEARCH_VIEW_ALL' => 'すべて見る',

// -----
// ARIA label text, used in the common header.
//
    'TEXT_HEADER_ARIA_LABEL_NAVBAR' =>'ナビゲーションバー',
    'TEXT_HEADER_ARIA_LABEL_LOGO' => 'サイトのロゴ',

// -----
// <h1> text for index pages where the 'normal' heading-text isn't used by a
// store ... for accessibility.
//
// Note: For zc200, this constant will be in /includes/languages/english/lang.index.php.
//
    'HEADING_TITLE_SCREENREADER' => '以下の追加コンテンツを参照してください',
];
return $define;

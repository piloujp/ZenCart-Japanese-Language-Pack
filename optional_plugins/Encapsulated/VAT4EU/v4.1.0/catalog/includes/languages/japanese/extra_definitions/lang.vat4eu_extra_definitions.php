<?php
// -----
// Part of the VAT4EU plugin by Cindy Merkin a.k.a. lat9 (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2017-2026 Vinos de Frutas Tropicales
//
// Last updated: v4.1.0
//
$define = [
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

    // -----
    // These definitions are used by tpl_modules_vat4eu_display.php's link to the popup_vat4eu_formats page.
    //
    'VAT4EU_CHANGE_IN_ADDRESS_BOOK' => 'この注文に使用する「VAT 番号」を変更するには、<a href="%s">アドレス帳</a>の値を更新してから、チェックアウトに戻ってください。',
    'VAT4EU_MODAL_TITLE' => 'VAT識別番号の構造',

    'VAT4EU_ENTRY_VAT_MIN_ERROR' => '<em>VAT 番号</em> には、少なくとも' . VAT4EU_MIN_LENGTH . '文字が含まれている必要があります。',
    'VAT4EU_ENTRY_VAT_PREFIX_INVALID' => '住所が <em>%2$s</em> にあるため、<em>VAT 番号</em> は <b>%1$s</b> で始まる必要があります。',
    'VAT4EU_ENTRY_REQUIRED_ERROR' => '<em>VAT 番号</em>は必須フィールドです。',

    'VAT4EU_VAT_NOT_VALIDATED' => '入力された <em>VAT 番号</em> を検証できませんでした。値を再入力するか、<a href="' . zen_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">お問い合わせ</a>ください。',
    'VAT4EU_APPROVAL_PENDING' => '<em>VAT 番号</em> (%s) が検証されると、条件に該当する注文には自動的に <em>VAT 免除</em> が適用されます。ご質問がございましたら、<a href="' . zen_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">お問い合わせ</a>ください。',

    'VAT4EU_MESSAGE_YOUR_VAT_REFUND' => 'ご注文は %s の <em>VAT 払い戻し</em>の対象となります。',     //- The $s is the formatted monetary amount of the refund

    'VAT4EU_TEXT_VAT_REFUND' => 'VAT払い戻し：',
];
return $define;

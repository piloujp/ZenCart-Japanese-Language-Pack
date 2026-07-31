<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9.
// Copyright (C) 2013-2024, Vinos de Frutas Tropicales.  All rights reserved.
//
// Last updated for OPC v2.5.0
//
$define = [
    'NAVBAR_TITLE_1' => 'チェックアウト',
    'NAVBAR_TITLE_2' => '配送/お支払い方法を選択し、ご注文を確定してください',

    'HEADING_TITLE' => 'チェックアウト',
    'BUTTON_SAVE_CHANGES_ALT' => '変更を保存',
    'BUTTON_SAVE_CHANGES_TITLE' => 'この住所に加えた変更を保存する',
    'BUTTON_CANCEL_CHANGES_ALT' => 'キャンセル',
    'BUTTON_CANCEL_CHANGES_TITLE' => 'この住所に加えられたすべての変更をキャンセルします',

    'TEXT_ADD_TO_ADDRESS_BOOK' => 'アドレス帳に追加',
    'TITLE_ADD_TO_ADDRESS_BOOK' => 'この住所をアドレス帳に追加するには、このボックスにチェックを入れてください',

    'TITLE_CONTACT_INFORMATION' => '連絡先',
    'ENTRY_EMAIL_ADDRESS_CONF' => 'Eメール確認：',
    'ENTRY_EMAIL_ADDRESS_CONF_TEXT' => '*',
    'ERROR_EMAIL_MUST_MATCH_CONFIRMATION' => '<em>メール アドレス</em> は <em>メールの確認</em> の値と一致する必要があります。',
    'TEXT_CONTACT_INFORMATION' => 'この情報は、この注文に関してお客様に連絡するためだけに使用されます。',

    'TEXT_SELECT_FROM_SAVED_ADDRESSES' => '保存した住所から選択',

    'TABLE_HEADING_SHIPPING_ADDRESS' => 'お届け先の住所',
    'TEXT_CHOOSE_SHIPPING_DESTINATION' => 'ご注文は上記の住所に発送されます。または、「<em>住所の変更</em>」ボタンをクリックして配送先住所を変更することもできます。',
    'TITLE_SHIPPING_ADDRESS' => 'お届け先の住所：',

    'TABLE_HEADING_SHIPPING_METHOD' => '配送方法：',
    'TEXT_CHOOSE_SHIPPING_METHOD' => '',
    'TITLE_PLEASE_SELECT' => '選択してください',
    'TEXT_ENTER_SHIPPING_INFORMATION' => 'これは現在、この注文で使用できる唯一の配送方法です。',
    'TITLE_NO_SHIPPING_AVAILABLE' => '現時点では利用できません',
    'TEXT_NO_SHIPPING_AVAILABLE' => '<span class="alert">申し訳ございませんが、現時点ではお客様の地域への発送は行っておりません。</span><br>別の手配についてはお問い合わせください。',

    'TABLE_HEADING_COMMENTS' => '特別な指示またはコメント',

    'ERROR_PLEASE_RESELECT_SHIPPING_METHOD' => '利用可能な配送オプションまたは選択した配送方法の価格が変更されました。希望する配送方法を再度選択/確認してください。',
    'ERROR_UNKNOWN_SHIPPING_SELECTION' => '不明な配送方法が送信されました。ストアオーナーにお問い合わせください。',
    'ERROR_INVALID_REQUEST' => '不明なリクエストを受信しました。ストアのオーナーに問い合わせてください。',

    'ERROR_AJAX_SHIPPING_SELECTION' => '選択された配送方法が理解できませんでした。ストアオーナーにお問い合わせください。',

// -----
// These definitions are prepended to any address-value-related error message as an indication
// of which address-field is being referenced.
//
    'ERROR_IN_BILLING' => '[請求]： ',
    'ERROR_IN_SHIPPING' => '[配送]： ',

// -----
// This message is used by OPC's observer and AJAX classes when the base OPC class indicates an error that requires
// a full page-reload, implying that something got "out of sync" in the OPC class' records.  Unlike
// the JS_ type messages, single quotes don't need (or want) to be double-escaped!
//
// If a customer receives this message during checkout, there's a PHP Warning logged to indicate
// the underlying issue.
//
    'ERROR_OPC_ADDRESS_INVALID' => '申し訳ございませんが、この注文の住所の 1 つ以上を検証できませんでした。確認して、必要に応じて再入力してください。',

// -----
// NOTE: The following constants are used in the page's jscript_main.php file as javascript text literals or
// for messages displayed to the customer during AJAX processing issues (displayed in a 'alert'.
//
// If you want to include single-quotes in a value, you'll need to specify them as \\\'; for a new-line,
// use \n.  Just be sure to keep a constant's string within a set of single-quotes and you should be good-to-go!
//
    'JS_ERROR_SESSION_TIMED_OUT' => '申し訳ありませんが、セッションがタイムアウトしました。\n\nカート内のアイテムは保存されており、次回ログイン時に復元されます。',
    'JS_ERROR_OPC_NOT_ENABLED' => '迅速なチェックアウト プロセスは一時的にご利用いただけません。代替のチェックアウト プロセスにリダイレクトされます。',

    'JS_ERROR_AJAX_TIMEOUT' => 'ご注文の詳細を更新するのは通常より少し時間がかかっています。',
    'JS_ERROR_AJAX_SHIPPING_TIMEOUT' => 'ご注文の送料を更新するのは通常より少し時間がかかっています。',
    'JS_ERROR_AJAX_PAYMENT_TIMEOUT' => 'ご注文の支払い方法の更新に通常より少し時間がかかっています。',
    'JS_ERROR_AJAX_SET_ADDRESS_TIMEOUT' => 'ご注文の住所を設定するのに通常より少し時間がかかっています。',
    'JS_ERROR_AJAX_RESTORE_ADDRESS_TIMEOUT' => 'ご注文の住所の値を復元するのに通常より少し時間がかかっています。',
    'JS_ERROR_AJAX_VALIDATE_ADDRESS_TIMEOUT' => 'ご注文の住所詳細の確認に通常より少し時間がかかっています。',

    'JS_ERROR_AJAX_RESTORE_CUSTOMER_TIMEOUT' => '顧客の詳細を復元するのに通常より少し時間がかかっています。',
    'JS_ERROR_AJAX_VALIDATE_CUSTOMER_TIMEOUT' => '顧客の詳細を確認するのに通常より少し時間がかかっています。',

    'JS_ERROR_CONTACT_US' => ' このメッセージを閉じてもう一度お試しください。\n\nこのメッセージが引き続き表示される場合は、お問い合わせください。',

    'ERROR_NO_SHIPPING_SELECTED' => '注文を確認する前に、注文の配送方法を選択する必要があります。',
    'TITLE_BILLING_ADDRESS' => '請求先住所：',
    'TITLE_BILLING_SHIPPING_ADDRESS' => '請求先/発送先住所：',

// -----
// This definition is used on the default page display when there is a javascript/jQuery error (or when javascript is disabled).
// The customer can't checkout via the OPC so we'll give them a link through which they can access the
// "normal" 3-page checkout process.
//
// NOTE: The %s value in the link is filled in by the checkout_one page's template to contain
// a link back to the checkout_shipping page with OPC disabled.
//
    'TEXT_NOSCRIPT_JS_ERROR' => '申し訳ございませんが、迅速なチェックアウト プロセスはご利用いただけません。<a href="%s">ここ</a> をクリックして、代替チェックアウト プロセスをご利用ください。',

// ----- From checkout_payment -----

    'TABLE_HEADING_BILLING_ADDRESS' => '請求先住所',
    'TEXT_SELECTED_BILLING_DESTINATION' => '請求先住所は上に表示されています。請求先住所はクレジットカードの明細書に記載されている住所と一致している必要があります。<em>住所の変更</em> ボタンをクリックすると、請求先住所を変更できます。',

    'TABLE_HEADING_PAYMENT_METHOD' => '支払方法',
    'TEXT_SELECT_PAYMENT_METHOD' => 'この注文の支払い方法を選択してください。',
    'TEXT_ENTER_PAYMENT_INFORMATION' => '',

    'TITLE_NO_PAYMENT_OPTIONS_AVAILABLE' => '現時点では利用できません',
    'TEXT_NO_PAYMENT_OPTIONS_AVAILABLE' => '<span class="alert">申し訳ございませんが、現在お客様の地域からの支払いは受け付けておりません。</span><br />別の方法についてはお問い合わせください。',

    'TABLE_HEADING_CONDITIONS' => '<span class="termsconditions">利用規約</span>',
    'TEXT_CONDITIONS_DESCRIPTION' =>  '<span class="termsdescription">以下のボックスにチェックを入れて、この注文に適用される利用規約を承認してください。利用規約は <a href="' . zen_href_link(FILENAME_CONDITIONS, '', 'SSL') . '"><span class="pseudolink">こちら</span></a>でご覧いただけます。</span>',
    'TEXT_CONDITIONS_CONFIRM' => '<span class="termsiagree">私はこの注文に拘束される利用規約を読み、同意します。</span>',

    'TEXT_CHECKOUT_AMOUNT_DUE' => '支払総額： ',
    'TEXT_YOUR_TOTAL' => '合計金額',

// ----- From checkout_confirmation -----
    'HEADING_BILLING_ADDRESS' => '請求/支払い情報',
    'HEADING_DELIVERY_ADDRESS' => '配送情報',
    'HEADING_SHIPPING_METHOD' => '配送方法：',
    'HEADING_PAYMENT_METHOD' => '支払方法：',
    'HEADING_PRODUCTS' => 'ショッピングカートの内容',
    'HEADING_TAX' => '税',
    'HEADING_ORDER_COMMENTS' => '特別な指示または注文コメント',
// no comments entered
    'NO_COMMENTS_TEXT' => 'なし',

    'TEXT_USE_BILLING_FOR_SHIPPING' =>  '発送先住所は請求先住所と同じですか？',
    'ALT_TEXT_APPLY_DEDUCTION' => '適用する',

    'TEXT_CONFIRMATION_EMAILS_SENT_TO' => 'この注文の確認は <b>%s</b> に電子メールで送信されます。',  //-The %s is filled in with the customer's email address

// -----
// You can modify this definition to change the name of the image-button/alt-text used to confirm the customer's order.
//
    'BUTTON_IMAGE_CHECKOUT_ONE_CONFIRM' => 'button_confirm_order.gif',
    'BUTTON_CHECKOUT_ONE_CONFIRM_ALT' => '注文の確認',

    'BUTTON_IMAGE_CHECKOUT_ONE_REVIEW' => 'button_continue_checkout.gif',
    'BUTTON_CHECKOUT_ONE_REVIEW_ALT' => '注文の確認',

    'CHECKOUT_ONE_LOADING' => 'confirmation_one_loading.gif',
    'CHECKOUT_ONE_LOADING_ALT' => 'お待ちください ...',

// -----
// Use these definitions to set any messages you might want to convey to your customers on the checkout-one page.
//
    // -----
    // This constant defines the instructions you want displayed at the very top of the "checkout_one" page, before the form entry.
    //
    'TEXT_CHECKOUT_ONE_TOP_INSTRUCTIONS' => '', //-Displayed within a set of <p>...</p> tags if not empty.

    // -----
    // These constants define the instructions that are inserted below the shopping-cart/totals and above the "confirm order" button.
    //
    'TEXT_CHECKOUT_ONE_INSTRUCTION_LABEL' => '下部の指示', //-Displays as the "legend" value for the fieldset that surrounds the message below
    'TEXT_CHECKOUT_ONE_INSTRUCTIONS' => '下部の指示',      //-Displayed within a set of <p>...</p> tags if not empty
];
return $define;

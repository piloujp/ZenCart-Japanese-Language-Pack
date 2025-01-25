<?php
// -----
// Language constants used by the /admin/edit_orders.php processing (Edit Orders).
//
// Last modified v5.0.0
//
$define = [
// Page / Section Headings and common button names and other constants.
    'BUTTON_ADD' => '追加',
    'BUTTON_CHOOSE' => '選ぶ',
    'BUTTON_CLOSE' => '閉じる',
    'BUTTON_COMMIT_CHANGES' => '変更を検証する',
    'BUTTON_RECALCULATE' => '再計算',

    'HEADING_TITLE' => '注文を編集する',
    'HEADING_TITLE_SEARCH' => '注文ID：',
    'HEADING_TITLE_STATUS' => '状態：',
    'HEADING_TITLE_ADD_PRODUCT' => '注文に商品を追加する',

    'TEXT_LABEL_TAX' => '税（％）：',
    'TEXT_MODAL_CHANGES_TITLE' => '注文の変更',
    'TEXT_ORDER_TOTAL_ADDED' => '%1$s が追加されました： %2$s',
    'TEXT_ORDER_TOTAL_REMOVED' => '%1$s が削除されました： %2$s',
    'TEXT_ORIGINAL_ORDER' => '元の注文',
    'TEXT_ORIGINAL_VALUE' => 'オリジナル： <code>%s</code>',           //- Tooltip string
    'TEXT_OSH_CHANGED_VALUES' => 'これらの値は次の順序で変更されました：',
    'TEXT_OT_CHANGES' => '注文合計の変更',
    'TEXT_PRODUCT_CHANGES' => '商品の変更',
    'TEXT_UPDATED_ORDER' => '更新された注文',
    'TEXT_VALUE_CHANGED' => '%1$s は %2$s から %3$s に変更されました',   //- Used by the AJAX processing and for OSH record
    'TEXT_VALUE_UNKNOWN' => '不明 [%s]',  //- %s is filled in with the unknown 'entity'
    'TEXT_SHIPPING_TAX_RATE_INITIALIZED' => '注文の配送税率は %s に初期化されました。',

// Table Headings
    'TABLE_HEADING_STATUS_HISTORY' => '注文状況履歴とコメント',
    'TABLE_HEADING_COMMENTS' => 'コメント',
    'TABLE_HEADING_CUSTOMERS' => '顧客',
    'TABLE_HEADING_ORDER_TOTAL' => '注文合計',
    'TABLE_HEADING_DATE_PURCHASED' => '購入日',
    'TABLE_HEADING_STATUS' => '状態',
    'TABLE_HEADING_ACTION' => 'アクション',
    'TABLE_HEADING_QUANTITY' => '数量',
    'TABLE_HEADING_PRODUCTS' => '製品',
    'TABLE_HEADING_TAX' => '税',
    'TABLE_HEADING_TOTAL' => '合計',
    'TABLE_HEADING_UNIT_PRICE' => '単価', //- Also used for add/update product modals
    'TABLE_HEADING_UNIT_PRICE_NET' => '単価（税抜）',   //- Also used for add/update product modals
    'TABLE_HEADING_UNIT_PRICE_GROSS' => '単価（税込）',   //- Also used for add/update product modals
    'TABLE_HEADING_TOTAL_PRICE' => '合計金額',
    'TABLE_HEADING_CUSTOMER_NOTIFIED' => '顧客への通知',
    'TABLE_HEADING_DATE_ADDED' => '追加日',
    'TABLE_HEADING_UPDATED_BY' => '更新者',

// Order Address Entries
    'BUTTON_MAP_ADDRESS' => '地図住所',

    'ENTRY_CUSTOMER' => '顧客情報',
    'ENTRY_CUSTOMER_NAME' => '名前',
    'ENTRY_CUSTOMER_COMPANY' => '会社',
    'ENTRY_CUSTOMER_ADDRESS' => '丁目番地番号',
    'ENTRY_CUSTOMER_SUBURB' => '建物名',
    'ENTRY_CUSTOMER_CITY' => '市区町村',
    'ENTRY_CUSTOMER_STATE' => '都道府県',
    'ENTRY_CUSTOMER_POSTCODE' => '郵便番号',
    'ENTRY_CUSTOMER_COUNTRY' => '国',
    'ENTRY_SHIPPING_ADDRESS' => 'お届け先の住所：',
    'ENTRY_BILLING_ADDRESS' => '請求先住所：',
    'ENTRY_TELEPHONE_NUMBER' => '電話：',       //- Shortening for modal-display; default is 'Telephone Number:'

    'TEXT_MODAL_ADDRESS_HEADER' => '注文の %s を変更しています', //- %s is filled in with one the the 'xxx Address:' values, above
    'TEXT_STOREPICKUP_NO_SHIP_ADDR' => '注文は店舗で受け取るもので、配送先住所は指定されません。',
    'TEXT_VIRTUAL_NO_SHIP_ADDR' => '注文には<code>仮想</code>商品のみが含まれ、配送先住所は含まれません。',

    'PLEASE_SELECT' => '選択してください',
    'TYPE_BELOW' => '以下に選択肢を入力してください...',

// Order Payment Entries and Additional Infomation
    'ENTRY_CREDIT_CARD_TYPE' => 'クレジットカードの種類：',
    'ENTRY_CREDIT_CARD_OWNER' => 'クレジットカード所有者：',
    'ENTRY_CREDIT_CARD_NUMBER' => 'クレジットカード番号：',
    'ENTRY_CREDIT_CARD_EXPIRES' => 'クレジットカードの有効期限：',
    'ENTRY_CURRENCY_VALUE' => '通貨値（%s）：',   //- %s is filled in with the order's currency-code
    'ENTRY_IS_GUEST_ORDER' => 'ゲスト注文ですか？',
    'ENTRY_PAYMENT_METHOD' => '支払方法：',
    'ENTRY_PAYMENT_MODULE' => '支払いモジュールコード:',
    'ENTRY_PURCHASE_ORDER_NUMBER' => '注文書：',
    'ENTRY_IS_WHOLESALE' => '卸売注文ですか？',
    'ENTRY_CUSTOMER_WHOLESALE' => '卸売顧客ですか？',
    'ENTRY_CUSTOMER_TAX_EXEMPT' => '免税対象顧客ですか？',

    'TEXT_PANEL_HEADER_ADDL_INFO' => '追加情報',

// Order Status Entries
    'BUTTON_ADD_COMMENT' => '新しいコメント',
    'BUTTON_ADD_COMMENT_ALT' => 'この注文のコメントを追加または確認する',  //- Also used for the modal form's heading!
    'BUTTON_REMOVE' => '消去',
    'BUTTON_REVIEW_COMMENT' => 'コメントを確認する',

    'ENTRY_STATUS' => '状態：',
    'ENTRY_CURRENT_STATUS' => '現在のステータス： ',
    'ENTRY_NOTIFY_CUSTOMER' => '顧客に通知：',
    'ENTRY_NOTIFY_COMMENTS' => 'コメントを追加：',

    'TEXT_COMMENT_ADDED' => '注文に対するコメント',

// Email Entries
    'EMAIL_SEPARATOR' => '------------------------------------------------------',

    'EMAIL_TEXT_COMMENTS_UPDATE' => '<em>ご注文に関するコメントは次のとおりです： </em>',
    'EMAIL_TEXT_DATE_ORDERED' => '注文日：',
    'EMAIL_TEXT_INVOICE_URL' => '詳細な請求書：',
    'EMAIL_TEXT_ORDER_NUMBER' => '注文番号：',
    'EMAIL_TEXT_STATUS_LABEL' => '%s' . "\n\n",
    'EMAIL_TEXT_STATUS_PLEASE_REPLY' => 'ご質問がございましたら、このメールに返信してください。' . "\n",
    'EMAIL_TEXT_STATUS_UPDATED' => 'ご注文は次のステータスに更新されました：' . "\n",
    'EMAIL_TEXT_SUBJECT' => '注文の更新',

// Success, Warning, and Error Messages
    'ERROR_ADDRESS_COUNTRY_NOT_FOUND' => '注文番号 %u は編集できません。注文内の 1 つ以上の住所で、ストアに認識されていない国が使用されています。問題が解決されるまで、税金と一部の配送モジュールは正しく機能しない可能性があります。<br><br>これは通常、管理者が「<b>場所 / 税金 :: 国</b>」ツールを使用して国を削除、名前変更、または無効にした場合に発生します。この問題は、次のいずれかの方法で修正できます。<ul><li>国（および名前）を Zen Cart データベースに再度追加します。</li><li>注文を編集できるようにするには、国を一時的に再度有効にします。</li></ul>',
    'ERROR_CANT_DETERMINE_TAX_RATES' => '注文番号%uは税率を決定できないため編集できません。',
    'ERROR_DISPLAY_PRICE_WITH_TAX' => 'Zen Cart が' . (DISPLAY_PRICE_WITH_TAX_ADMIN !== 'true' ? '税込' : '税抜') . '価格を表示するように設定されました。 このページは現在' . (DISPLAY_PRICE_WITH_TAX !== 'true' ? '税込み' : '税抜き') . 'の価格を表示しています。両方の設定が同じになるまで注文を編集することはできません。',
    'ERROR_NO_PRODUCT_TAX_DESCRIPTION' => '注文番号%1$uは編集できません。<em>%2$s</em>税率（%3$s%%）の税金の説明が見つかりませんでした。',
    'ERROR_NO_SHIPPING_TAX_DESCRIPTION' => '注文番号 %1$u は編集できません。配送税率（%2$s%%）の税金の説明が見つかりませんでした。',
    'ERROR_ORDER_DOES_NOT_EXIST' => '注文が存在しません。',
    'ERROR_PRODUCT_ATTRIBUTE_DOES_NOT_EXIST' => '注文番号%1$uは編集できません。オプション名/値（%2$s [#%3$u]/%4$s [#%5$u]）は製品（%6$s [#%7$u]）には適用されません。',
    'ERROR_PRODUCT_DOES_NOT_EXIST' => '注文番号%1$uは編集できません。商品（%2$s [#%3$u]）は存在しません。',
    'ERROR_SHIPPING_TAX_RATE_MISSING' => '注文番号 %u は編集できません。配送税率は以前に記録されていません。',
    'ERROR_ZEN_ADD_TAX_ROUNDING' => "「<em>注文の編集</em>」の使用を有効にするには、ストアの <code>zen_add_tax</code> 機能を更新する必要があります。",

    'SUCCESS_ORDER_UPDATED' => '注文番号%u が正常に更新されました。',

    'WARNING_INSUFFICIENT_PRODUCT_STOCK' => '<em>%1$s</em> の在庫が不足しています。%3$s の在庫がある、%2$s をリクエストしました。',
    'WARNING_NO_UPDATES_TO_ORDER' => '更新するものはありません。この注文に対する変更は記録されませんでした。',
    'WARNING_ORDER_COUPON_BAD' => '警告：注文のクーポンコード（%s）は無効です。注文を更新すると、そのクーポンに関連付けられた割引がすべて削除されます。',
    'WARNING_ORDER_NOT_UPDATED' => '警告：変更するものはありません。注文は更新されませんでした。',
    'WARNING_ORDER_QTY_OVER_MAX' => '警告：要求された数量が注文に許可されている最大数量を超えました。追加された数量は注文ごとに許可されている最大数量まで削減されました。',

// Order Totals Display
    'ERROR_OT_NOT_INSTALLED' => '選択された注文合計（%s）はインストールされていないため、更新できません。',

    'TEXT_CHOOSE_SHIPPING_MODULE' => '配送モジュールを選択してください：',
    'TEXT_COMMAND_TO_DELETE_CURRENT_COUPON_FROM_ORDER' => '消去',     //- ALWAYS uppercased!
    'TEXT_COUPON_LINK_TITLE' => 'クーポンの条件を見る',
    'TEXT_LABEL_COUPON_CODE' => 'クーポンコード：',
    'TEXT_LABEL_METHOD' => '方法：',
    'TEXT_LABEL_MODULE' => 'モジュール：',
    'TEXT_LABEL_TITLE' => 'タイトル：',
    'TEXT_LABEL_VALUE' => '価値：',
    'TEXT_OT_ADD_MODAL_TITLE' => '注文合計を追加（%s）',
    'TEXT_OT_UPDATE_MODAL_TITLE' => '注文合計の編集（%s）',    //- %s is filled in with the order-total's class, e.g. ot_shipping

// Adding/updating a product
    'ERROR_PRODUCT_NOT_FOUND' => '要求された商品（%s）は注文に存在しません。',
    'ERROR_MODEL_TOO_LONG' => '「モデル」の値は %u 文字より長くすることはできません。',
    'ERROR_NAME_TOO_LONG' => '「名前」の値は %u 文字を超えてはなりません。',
    'ERROR_NO_MATCHING_PRODUCT' => 'ご要望に一致する製品が見つかりませんでした。もう一度お試しください。',
    'ERROR_PRICE_INVALID' => '商品価格および/または一回限りの料金は、０以上の数値である必要があります。',
    'ERROR_QTY_INSUFFICIENT' => '商品の数量（%s）が不足しています。',
    'ERROR_QTY_INVALID' => '商品の数量は数値であり、０以上である必要があります。',
    'ERROR_TAX_RATE_INVALID' => '商品の税率は０から１００までの数値である必要があります。',

    'TEXT_ADD_NEW_PRODUCT' => '商品を追加',        //- Used for button text
    'TEXT_ATTRIBUTES_ONE_TIME_CHARGE' => '1回限りの料金：',
    'TEXT_ATTRIBUTES_READONLY' => ' （r/o）',
    'TEXT_ATTRIBUTES_UNKNOWN_OPTION_TYPE' => '不明なオプションタイプ（%u）',

    'TEXT_FILE_UPLOAD_NOT_SUPPORTED' => 'ファイルのアップロードはサポートされていません',

    'TEXT_LABEL_NAME' => '名前：',
    'TEXT_LABEL_MODEL' => 'モデル：',
    'TEXT_LABEL_QTY_AVAIL' => '在庫数量：',
    'TEXT_LABEL_QTY' => '数量：',

    'TEXT_PRODUCT_ADD_MODAL_TITLE' => '注文に商品を追加する',
    'TEXT_PRODUCT_ATTRIBUTES' => '商品属性',
    'TEXT_PRODUCT_BEING_ADDED' => '商品が注文に追加されています。',
    'TEXT_PRODUCT_CHOOSE_BY_CATEGORY' => 'カテゴリーで選ぶ',
    'TEXT_PRODUCT_CHOOSE_BY_ID' => '商品IDで選択',
    'TEXT_PRODUCT_CHOOSE_BY_SEARCH' => '商品名/モデル検索で選ぶ',
    'TEXT_PRODUCT_CHOOSE_SUBTITLE' => '商品を選択',
    'TEXT_PRODUCT_NEW_MODAL_TITLE' => '新商品',
    'TEXT_PRODUCT_NEW_SELECT_CHOOSE' => '以下のリストから製品を選択し、「選択」ボタンをクリックしてください。',
    'TEXT_PRODUCT_UPDATE_MODAL_TITLE' => '商品の更新',

    'TEXT_SELECT_PRODUCT' => '商品を選択：',

    //- These three constants define the message to be recorded for products' changes. All 3
    //  use the same sprintf values:
    //
    // %1$s (qty), %2$s (name), %3$s (model), %4$s (final price), %5$s (tax rate)
    //
    'TEXT_STATUS_PRODUCT_ADDED' => '追加されました： %1$s x %2$s [%3$s] @ %4$s （税率 %5$s%%）',
    'TEXT_STATUS_PRODUCT_CHANGED' => '一部の商品詳細が次のように変更されました： %1$s x %2$s [%3$s] @ %4$s （税率 %5$s%%）',
    'TEXT_STATUS_PRODUCT_REMOVED' => '削除： %1$s x %2$s [%3$s] @ %4$s （税率 %5$s%%）',

// Navigation Display
    'BUTTON_TO_LIST' => '注文リスト',
    'DETAILS' => '詳細',
    'IMAGE_ORDER_DETAILS' => '注文の詳細を表示',
    'SELECT_ORDER_LIST' => '注文へジャンプ:',

// Required for various added zen_cart functions
    'PULL_DOWN_DEFAULT' => '国を選択してください',

    'TEXT_UNKNOWN_TAX_RATE_MANUAL' => '消費税（%s%%）',
    'TEXT_UNKNOWN_TAX_RATE' => '消費税',

// Other elements
    'PAYMENT_CALC_METHOD' => '商品の価格設定方法を選択してください：',
        'PAYMENT_CALC_MANUAL' => '編集を有効にする',
        'PAYMENT_CALC_AUTOSPECIALS' => '編集は禁止されています',
    'PRODUCT_PRICES_CALC_AUTOSPECIALS' => ' <b>注意：</b>商品の価格は<em>自動的に</em>計算され、編集することはできません。',
    'PRODUCT_PRICES_CALC_MANUAL' => ' <b>注意：</b>商品の価格は編集可能です。',

    'EO_MESSAGE_ADDRESS_UPDATED' => '注文の%1$sアドレスが次のものから更新されました：',   //-%1$s: The type of address (see below) that was updated
        'EO_CUSTOMER' => 'お客様',
        'EO_BILLING' => '請求する',
        'EO_DELIVERY' => '配達',
        'EO_MESSAGE_ORDER_UPDATED' => '注文は「注文の編集」を通じて更新されました。 ',
    'EO_MESSAGE_PRICING_AUTO' => '特別価格なしで価格が自動的に計算されました。',
    'EO_MESSAGE_PRICING_AUTOSPECIALS' => '特別価格を使用して価格が自動的に計算されました。',
    'EO_MESSAGE_PRICING_MANUAL' => '価格は手動で提供されました。',

    'EO_MESSAGE_PRODUCT_ADDED' => '%1$s x "%2$s" を注文に追加しました',   //-%1$s: The product quantity, %2$s: The product name
    'EO_MESSAGE_PRODUCT_ATTRIBS_ADDED' => '、オプション付き（%s）',

    'TEXT_PANEL_HEADER_UPDATE_INFO' => '注文更新情報',
];
return $define;

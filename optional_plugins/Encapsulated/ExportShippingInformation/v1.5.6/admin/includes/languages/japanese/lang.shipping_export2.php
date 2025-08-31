<?php
/**
 * Exports Order / Shipping Information From Zen Cart in various chosen formats
 *
 * @package Export Shipping and Order Information
 * @copyright Copyright 2009, Eric Leuenberger http://www.zencartoptimization.com
 * @copyright Portions Copyright 2003-2006 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: shipping_export.php, v 1.3.2 08.05.2010 11:41 Eric Leuenberger econcepts@zencartoptimization.com$
 * Thanks to dhcernese and Scott Wilson (That Software Guy) for contributing various portions that contained several bug-fixes.
 */
//  $Id: lang.shipping_export.php  2025-08-29 Piloujp $

$define = [
    'HEADING_SHIPPING_EXPORT_TITLE' => '配送と注文情報のエクスポート',
    'HEADING_ADDITIONAL_FIELDS_TITLE' => '追加フィールドとオプション',
    'HEADING_CUSTOM_DATE_TITLE' => 'カスタム日付範囲',
    'HEADING_PREVIOUS_EXPORTS_TITLE' => '以前に含まれていた輸出',

    'TEXT_CUSTOM_DATE' => 'これはオプションのコンポーネントであり、より柔軟に対応できます。両方のフィールドを空白のままにすると、前回のエクスポートが完了してからのすべての注文がエクスポートされます（デフォルト）。すでにダウンロードされている日付範囲の注文を含める場合は、以下の 2 つのボックスに入力する必要があります。',
    'TEXT_PREVIOUS_EXPORTS2' => '以前にエクスポートした注文を含める。' ,
    'TEXT_PREVIOUS_EXPORTS' => 'デフォルトでは、エクスポート ファイルには、まだエクスポートされていない注文のみが含まれます。すでにダウンロードされている日付範囲の注文を含める場合は、以下のチェックボックスをオンにしてください。この機能を日付範囲機能と組み合わせると、さらに柔軟性が高まります。',
    'TEXT_VIDEO_TUTORIAL' => 'このモジュールの使用方法に関するビデオ チュートリアルを表示するには、<a href="http://www.zencartoptimization.com/2007/06/14/video-tutorial-export-shipping-and-order-information-from-zen-cart/" target="_blank"><strong><u>http://www.zencartoptimization.com</u></strong></a> にアクセスしてください。<br><br>',
    'TEXT_RUNIN_TEST' => 'テストモードで実行するかどうかを選択します。テストモードでは、注文を「エクスポート済み」としてマークせずにエクスポートできます。これにより、再度エクスポートできるようになります。<br>',
    'TEXT_ADDITIONAL_FIELDS' => '以下のエクスポートに追加する <strong>追加フィールドを選択</strong>します。追加フィールドはリストされた順序でエクスポートされます。<br>',
    'TEXT_FILE_LAYOUT' => '<strong>エクスポートするファイルレイアウトを選択</strong><br>',
    'TEXT_SHIPPING_EXPORT_INSTRUCTIONS' =>'このページを使用して、Zen Cart 注文の配送情報を CSV 形式でエクスポートし、外部プログラムで使用することができます。<br><br>
        データは画面に表示されている順序でエクスポートされ、ヘッダー行の情報が含まれます。各ファイルには処理日に基づいて動的に名前が付けられるため、ユーザー側で簡単に記録を保存できます。
        <br><br>
        <strong>特徴</strong>
        <ul>
        <li>追加のフィールドをエクスポートする機能。これを行うには、エクスポート ファイルに追加するフィールドのボックスにチェックマークを付けます。</li>
        <li>２つの異なるファイル形式でエクスポートするオプション
        <ul>
        <li>１行あたり１つの注文（デフォルト）</li>
        <li>１行につき１つの商品</li>
        </ul>
        </li>
        <li>「テスト」モードで実行します。システムで注文を「エクスポート済み」としてマークせずに、テストエクスポートを実行できます。</li>
        </ul>
        <br>
        <span style="color: #ff0000"><strong>*</strong></span><strong>「完全な商品詳細」エクスポートに関する注意事項</strong><br>
        「完全な製品詳細」をエクスポートすることを選択した場合、次のフィールドがここに記載されている形式でエクスポートされます。<br>
        <em>商品の量、製品のモデル、製品名、製品の優先順位、製品の属性の表示、法定価格、税額</em>。<br><br>
        <strong>サンプルの「完全な製品詳細」エクスポート：</strong> このインストールには、参照用にいくつかのサンプル エクスポートファイルが含まれています。これらのファイルは、使用されたエクスポートの種類に応じて名前が付けられています。
        <br><br>
        <u>知らせ</u><br>
        システムは、まだエクスポートされていない出荷注文情報を検索して見つけます。レコードが見つからない場合、「エクスポート」ボタンは表示されません（つまり、エクスポートする情報がある場合にのみ表示されます）。
        <br><br>
    ',

    'TEXT_RUNIN_TEST_FIELD' => 'テストモードで実行',
    'TEXT_SPLIT_NAME_FIELD' => '名と姓を別々のフィールドにエクスポートします。',
    'TEXT_PREVIOUS_EXPORTS_FIELD' => 'すでにダウンロードされた注文をエクスポートに含めます。',
    'TEXT_HEADER_ROW_FIELD' => 'エクスポートにヘッダー行を含める',
    'TEXT_EMAIL_EXPORT_FORMAT' => 'エクスポートファイル形式の種類：',
    'TEXT_FILE_LAYOUT_OPR_FIELD' => '１行につき１つの注文',
    'TEXT_FILE_LAYOUT_PPR_FIELD' => '１行につき１つの商品',
    'TEXT_SHIPPING_METHOD_FIELD' => '配送方法',
    'TEXT_SHIPPING_TOTAL_FIELD' => '配送合計',
    'TEXT_PHONE_NUMBER_FIELD' => '電話番号',
    'TEXT_ORDER_TOTAL_FIELD' => '注文合計',
    'TEXT_ORDER_DATE_FIELD' => '注文日',
    'TEXT_ORDER_COMMENTS_FIELD' => '１次注文コメント／メモ',
    'TEXT_PRODUCT_DETAILS_FIELD' => '商品の詳細',
    'TEXT_TAX_AMOUNT_FIELD' => '注文税額',
    'TEXT_SUBTOTAL_FIELD' => '注文小計',
    'TEXT_DISCOUNT_FIELD' => '注文の割引',
    'TEXT_PAYMENT_METHOD_FIELD' => '支払方法',
    'TEXT_ORDER_STATUS_FIELD' => '注文状況',
    'TEXT_ISO_COUNTRY2_FIELD' => 'ISO 国コード（２文字）',
    'TEXT_ISO_COUNTRY3_FIELD' => 'ISO 国コード（３文字）',
    'TEXT_STATE_ABBR_FIELD' => '都道府県略称コード',

    'TEXT_SPIFFY_START_DATE_FIELD' => '開始日：',
    'TEXT_SPIFFY_END_DATE_FIELD' => '終了日:<br>（含む）',
    // Email Definitions
    'EMAIL_EXPORT_SUBJECT' => '' . STORE_NAME . 'の処理注文。',
    'EMAIL_EXPORT_BODY' => '添付されているのは、' . STORE_NAME . 'からの最新の注文セットです。ご質問がある場合はお問い合わせください。',
    'EMAIL_EXPORT_ADDRESS' => 'メールアドレス@ドメインドットコム' ,  // to send to multiple addresses separate each email with a comma. Example:  firstemail@somedomain.com,secondemail@somedomain.com
    //Automatic email options
    'HEADING_AUTOMATIC_EMAIL_OPTION_TITLE' => '<strong>自動メールオプション</strong>',
    'TEXT_AUTOMATIC_EMAIL_OPTION_FIELD' => 'ファイルをサーバーに保存し、サプライヤーに自動的に電子メールを送信します。<br>（サーバーに保存しない場合は、ファイルをコンピューターにダウンロードするように求められます。）',
    'TEXT_EMAIL_EXPORT_ADDRESS_FIELD' => 'サプライヤーのメールアドレス：',
    'TEXT_EMAIL_EXPORT_SUBJECT_FIELD' => 'メールの件名：',
    //Order status update and options
    'HEADING_UPDATE_ORDER_STATUS_TITLE' => '<strong>エクスポート時に注文ステータスを更新する</strong><br>（これが設定されている場合、エクスポートが成功した後、注文ステータスはここで選択した内容に更新されます。）',
    'TEXT_UPDATE_ORDER_STATUS_FIELD' => 'エクスポート後の注文ステータスを次のように設定します。',
    'HEADING_ORDER_STATUS_OPTIONS_TITLE' => '<strong>注文状況のエクスポートオプション</strong> ',
    'TEXT_ORDER_STATUS_OPTIONS_ANY_FIELD' => '注文ステータス',
    'TEXT_ORDER_STATUS_OPTIONS_ASSIGNED_FIELD' => '割り当てられた注文ステータス（以下から選択）',
    //Orders infos listing hearder titles
    'HEADING_ORDER_INFOS_ORDER_ID' => '注文ID',
    'HEADING_ORDER_INFOS_EMAIL' => 'メール',
    'HEADING_ORDER_INFOS_CUSTOMER_NAME' => '顧客名',
    'HEADING_ORDER_INFOS_COMPANY' => '会社',
    'HEADING_ORDER_INFOS_DELIVERY_STREET' => '住所１',
    'HEADING_ORDER_INFOS_DELIVERY_SUBURB' => '住所２',
    'HEADING_ORDER_INFOS_DELIVERY_CITY' => '市区町村',
    'HEADING_ORDER_INFOS_POST_CODE' => '郵便番号',
    'HEADING_ORDER_INFOS_STATE' => '都道府県',
    'HEADING_ORDER_INFOS_COUNTRY' => '国名',
    'ERROR_ORDER_INFOS_NO_DATA' => '<b>新しい注文は見つかりませんでした。</b>',
    // Submit button
    'SUBMIT_BUTTON_ORDER_INFOS_EXPORT' => 'Excel スプレッドシートにエクスポート',
    // Check / Uncheck all
    'CHECK_BUTTON_ORDER_INFOS_EXPORT' => 'すべてチェック/チェック解除',
];

return $define;


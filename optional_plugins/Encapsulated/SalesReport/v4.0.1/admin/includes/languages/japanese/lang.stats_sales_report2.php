<?php
/**
 * Sales Report II, v4.0.0
 *
 * The language file contains all the text that appears on the report. The first set of
 * configuration defines actually impact the report's output and behavior.
 *
 * @author     Frank Koehl (PM: BlindSide)
 * @author     Conor Kerr <conor.kerr_zen-cart@dev.ceon.net>
 * @updated by stellarweb to work with version 1.5.0 02-29-12
 * @updated by lat9 for continued operation under zc155/zc156, 20190622
 * @copyright  Portions Copyright 2003-2006 Zen Cart Development Team
 * @copyright  Portions Copyright 2003 osCommerce
 * @license    http://www.gnu.org/copyleft/gpl.html   GNU Public License V2.0
 */

$defines = [
    //////////////////////////////////////////////////////////
    // DISPLAY EMPTY TIMEFRAME LINES
    // Setting this define to false will disable displaying
    // a timeframe line if that timeframe is empty.  By
    // default, an empty timeframe displays the value of the
    // define TEXT_NO_DATA.
    //
    // Be aware, if this is enabled and your search yields
    // no results at all, the screen will look as if no search
    // was performed (which is why this is enabled by default).
    //
    // Note: This is a change from previous versions where false enabled
    // the display and true disabled the display!
    //
    'DISPLAY_EMPTY_TIMEFRAMES' => true,

    //////////////////////////////////////////////////////////
    // REPORTING A SUBSET OF CUSTOMERS / PRODUCTS
    // By checking the boxes to 'Only Include Specific customers
    // or Products (SEARCH_SPECIFIC_CUSTOMERS/PRODUCTS),
    // only orders for those customers / products will be
    // included in the result. By default, the included customers/
    // products will be printed above the results table. If this
    // gets too long, this printout can be disabled with
    // the DISPLAY booleans below.
    //
    // If you often want a specific product, you can set a
    // default here, e.g.:
    // define('INCLUDE_PRODUCTS', '10, 15');
    //
    'INCLUDE_PRODUCTS' => '',
    'INCLUDE_CUSTOMERS' => '',
    'DISPLAY_TABLE_HEADING_CUSTOMERS' => true,
    'DISPLAY_TABLE_HEADING_PRODUCTS' => true,
    'TEXT_CUSTOMER_TABLE_HEADING' => ' この顧客の注文： ',  //Prefix used to print before customer name(s) when filtering by customer

    //////////////////////////////////////////////////////////
    // PRODUCT MANUFACTURERS COLUMN
    // Setting this define to true will display the
    // manufacturer on each product line item, and will default
    // to the value of TEXT_NONE if there is no manufacturer.
    // False will remove the manufacturer column from the report.
    //
    'DISPLAY_MANUFACTURER' => false,

    //////////////////////////////////////////////////////////
    // ONE-TIME FEES COLUMN
    // If your store does not have *any* one-time fees on its
    // products, you can disable displaying the column.
    //
    // Note that this switch does not affect math calculations,
    // so if you happen to have a product with fees attached,
    // they will still be accounted for and appear in the total.
    //
    'DISPLAY_ONE_TIME_FEES' => false,

    //////////////////////////////////////////////////////////
    // DECIMAL PLACES IN AVERAGES
    // Sets the number of decimal places displayed in averages
    // on timeframe statistics display
    //
    'NUM_DECIMAL_PLACES' => 2,

    //////////////////////////////////////////////////////////
    // TIMEFRAME DATE DISPLAY
    // Note:  Other constants moved to the main processing file for v3.2.1.
    //
    'DATE_SPACER' => ' ～<br>&nbsp;&nbsp;&nbsp;',

    //////////////////////////////////////////////////////////
    // EXCLUDE SPECIFIED PRODUCTS
    // Prevents specified products from appearing on the sales
    // report at all.  **ADDING PRODUCTS TO THIS DEFINE WILL
    // IMPACT TOTALS CALCULATIONS!**
    //
    // The value of the product will be excluded from totals
    // for gc_sold, gc_sold_qty, goods, num_products, and
    // diff_products.
    //
    // The values for gc_used, gc_used_qty, discount,
    // discount_qty, tax, and shipping all come from the
    // orders_total table, and so CANNOT be excluded based
    // on product ID.
    //
    // If an order is made up entirely of excluded products,
    // and has no shipping, discounts, tax, or used gift
    // certificates, it will have a total of 0.  In this
    // situation, the order will not be displayed in the results.
    //
    // EXAMPLE:     'EXCLUDE_PRODUCTS' => serialize([25, 14, 43]) );
    //
    'EXCLUDE_PRODUCTS' => serialize([]),

    /*
    ** LANGUAGE DEFINES
    */
    // Search menu heading
    'PAGE_HEADING' => '売上レポート II',
    'HEADING_TITLE_SEARCH' => '1. データの収集とフィルタリング',
    'HEADING_TITLE_SORT' => '2. 結果の並べ替えと指定',
    'HEADING_TITLE_PROCESS' => '3. レポートを生成する',
    'SEARCH_TIMEFRAME' => '時間枠',
    'SEARCH_TIMEFRAME_DAY' => ' 毎日',
    'SEARCH_TIMEFRAME_WEEK' => ' 毎週',
    'SEARCH_TIMEFRAME_MONTH' => ' 月次',
    'SEARCH_TIMEFRAME_YEAR' => ' 毎年',
    'SEARCH_TIMEFRAME_SORT' => '時間枠の並べ替え',
    'SEARCH_DATE_PRESET' => '日付範囲の事前設定',
    'SEARCH_DATE_CUSTOM' => 'カスタム日付範囲',
    'SEARCH_DATE_TODAY' => ' 今日（%s）',
    'SEARCH_DATE_YESTERDAY' => ' 昨日（%s）',
    'SEARCH_DATE_LAST_MONTH' => ' 先月（%s）',
    'SEARCH_DATE_THIS_MONTH' => ' 今月（%s）',
    'SEARCH_DATE_LAST_YEAR' => ' 昨年（%s）',
    'SEARCH_DATE_LAST_12_MONTHS' => ' 過去１２か月',
    'SEARCH_DATE_YTD' => ' 年初来（%s）',
    'SEARCH_START_DATE' => '開始日',
    'SEARCH_END_DATE' => '終了日（含む）',
    'SEARCH_DATE_FORMAT' => 'yyyy/mm/dd',
    'SEARCH_DATE_TARGET' => '...の検索日',
    'SEARCH_PAYMENT_METHOD' => '支払方法',
    'SEARCH_PAYMENT_METHOD_OMIT' => '省略する支払い方法',
    'SEARCH_CURRENT_STATUS' => '現在の注文状況',
    'SEARCH_EXCLUDED_STATUS' => '省略する注文ステータス',
    'SEARCH_SPECIFIC_CUSTOMERS' => '特定の顧客 ID のみを含める（カンマ区切りのリスト）',
    'SEARCH_SPECIFIC_PRODUCTS' => '特定の商品 ID のみを含める（カンマ区切りのリスト）',
    'SEARCH_MANUFACTURER' => '商品メーカー',
    'SEARCH_DETAIL_LEVEL' => '表示される情報',
    'SEARCH_OUTPUT_FORMAT' => '出力フォーマット',
    'SEARCH_SORT_PRODUCT' => '商品を並べ替える...',
    'SEARCH_SORT_ORDER' => '注文を並べ替えるには…',
    'SEARCH_SORT_THEN' => '次に並べ替えます...',
    'BUTTON_SEARCH' => 'お金がどこに行くのかを見せてください！（検索）',
    'BUTTON_DEFAULT_SEARCH' => 'クイック検索',
    'SEARCH_WAIT_TEXT' => '処理中です。お待​​ちください...',

    // Form element text
    // radio buttons
    'RADIO_DATE_TARGET_PURCHASED' => '購入順に並べ替え',
    'RADIO_DATE_TARGET_STATUS' => '割り当てられたステータス（以下から選択）',
    'RADIO_TIMEFRAME_SORT_ASC' => '古いものを上に',
    'RADIO_TIMEFRAME_SORT_DESC' => '最新のものを上に表示',
    'RADIO_LI_SORT_ASC' => '上昇',
    'RADIO_LI_SORT_DESC' => '降順',

    // dropdown menus
    'SELECT_DETAIL_TIMEFRAME' => '時間枠合計',
    'SELECT_DETAIL_PRODUCT' => '&nbsp;+ 商品詳細',
    'SELECT_DETAIL_ORDER' => '&nbsp;+ 注文の詳細',
    'SELECT_DETAIL_MATRIX' => '時間枠統計',
    'SELECT_OUTPUT_DISPLAY' => '画面表示',
    'SELECT_OUTPUT_PRINT' => '印刷形式',
    'SELECT_OUTPUT_CSV' => 'CSVエクスポート',
    'SELECT_PRODUCT_ID' => '商品ID',
    'SELECT_QUANTITY' => '量',
    'SELECT_LAST_NAME' => '顧客名',

    // checkboxes
    'CHECKBOX_AUTO_PRINT' => ' レポートを自動的に印刷する',
    'CHECKBOX_CSV_HEADER' => ' １行目の列タイトル',
    'CHECKBOX_NEW_WINDOW' => ' 結果を新しいウィンドウで開く',
    'CHECKBOX_VALIDATE_TOTALS' => ' 注文合計検証列を表示する',
    'CHECKBOX_DISPLAY_EMAIL_ADDRESS' => ' 顧客のメールアドレスを表示しますか？',

    // Report Column Headings
    // Timeframe
    'TABLE_HEADING_TIMEFRAME' => '時間枠',
    'TABLE_HEADING_NUM_ORDERS' => '注文数',
    'TABLE_HEADING_NUM_PRODUCTS' => '商品数',
    'TABLE_HEADING_TOTAL_GOODS' => '商品価値',
    'TABLE_HEADING_TAX' => '税',
    'TABLE_HEADING_GOODS_TAX' => '商品税',
    'TABLE_HEADING_ORDER_RECORDED_TAX' => '注文記録の税金',
    'TABLE_HEADING_SHIPPING' => '配送',
    'TABLE_HEADING_DISCOUNTS' => '割引',
    'TABLE_HEADING_GC_SOLD' => 'ギフト券の販売数',
    'TABLE_HEADING_GC_USED' => '使用されたギフト券',
    'TABLE_HEADING_TOTAL' => '合計',
    'TABLE_FOOTER_TIMEFRAMES' => ' 時間枠',

    // Order Line Items
    'TABLE_HEADING_ORDERS_ID' => '注文ID',
    'TABLE_HEADING_CUSTOMER' => 'お客様',
    'TABLE_HEADING_EMAIL_ADDRESS' => '電子メールアドレス',
    'TABLE_HEADING_COUNTRY' => '国',
    'TABLE_HEADING_STATE' => '都道府県',
    'TABLE_HEADING_ORDER_TOTAL' => '注文合計',
    'TABLE_HEADING_ORDER_TOTAL_VALIDATION' => '注文合計の有効性',

    // Product Line Items
    'TABLE_HEADING_PRODUCT_ID' => '商品ID',
    'TABLE_HEADING_PRODUCT_NAME' => '商品名',
    'TABLE_HEADING_PRODUCT_ATTRIBUTES' => '属性',
    'TABLE_HEADING_MANUFACTURER' => 'メーカー',
    'TABLE_HEADING_MODEL_NO' => 'モデル番号',
    'TABLE_HEADING_BASE_PRICE' => '基本価格',
    'TABLE_HEADING_FINAL_PRICE' => '最終価格',
    'TABLE_HEADING_QUANTITY' => '数量',
    'TABLE_HEADING_ONETIME_CHARGES' => '1回限りの料金',
    'TABLE_HEADING_PRODUCT_TOTAL' => '商品合計',

    // Data Matrix
    'MATRIX_GENERAL_STATS' => '一般的な統計',
    'MATRIX_ORDER_REVENUE' => '総収益',
    'MATRIX_ORDER_PRODUCT_COUNT' => '総製品数',
    'MATRIX_LARGEST' => '最大注文：',
    'MATRIX_SMALLEST' => '最小注文数： ',
    'MATRIX_AVERAGES' => '平均',
    'MATRIX_AVG_ORDER' => '&nbsp;注文金額',
    'MATRIX_AVG_PROD_ORDER' => '&nbsp;注文あたりの商品数',
    'MATRIX_AVG_PROD_ORDER_DIFF' => '&nbsp;注文ごとに異なる商品',
    'MATRIX_AVG_ORDER_CUST' => '&nbsp;顧客あたりの注文数',
    'MATRIX_ORDER_STATS' => '注文統計',
    'MATRIX_TOTAL_PAYMENTS' => 'お支払い方法',
    'MATRIX_TOTAL_CC' => 'クレジットカード',
    'MATRIX_TOTAL_SHIPPING' => '配送方法',
    'MATRIX_TOTAL_CURRENCIES' => '使用通貨',
    'MATRIX_TOTAL_CUSTOMERS' => 'ユニークな顧客',
    'MATRIX_PRODUCT_STATS' => '商品統計',
    'MATRIX_PRODUCT_SPREAD' => '製品の普及',
    'MATRIX_PRODUCT_REVENUE_RATIO' => '総収益 %',
    'MATRIX_PRODUCT_QUANTITY_RATIO' => '合計数量 %',

    // CSV Export
    'CSV_FILENAME_PREFIX' => 'sales_',
    'CSV_HEADING_START_DATE' => '開始日',
    'CSV_HEADING_END_DATE' => '終了日',
    'CSV_HEADING_LAST_NAME' => '姓',
    'CSV_HEADING_FIRST_NAME' => '名',
    'CSV_HEADING_COUNTRY' => '国',
    'CSV_HEADING_STATE' => '都道府県',
    'CSV_SEPARATOR' => ',',
    'CSV_NEWLINE' => "\n",

    // Print Format
    'PRINT_DATE_TO' => ' それまで ',
    'PRINT_DATE_TARGET' => '日付 ',
    'PRINT_TIMEFRAMES' => '%s 並べ替えられた時間枠 %s',
    'PRINT_DATE_PURCHASED' => '注文作成日',
    'PRINT_DATE_STATUS' => 'ステータスが割り当てられた日付',
    'PRINT_ORDER_STATUS' => '%s [%s]',
    'PRINT_PAYMENT_METHOD' => '支払方法：',
    'PRINT_CURRENT_STATUS' => '現在の注文状況：',
    'PRINT_DETAIL_LEVEL' => '表示中 ',

    // javascript pop-up alert window
    'ALERT_JS_HIGHLIGHT' => '#FF40CF',
    'ALERT_MSG_START' => '選択内容に１つ以上のエラーがあります：',
    'ALERT_DATE_INVALID_LENGTH' => '> 日付の長さは１０文字である必要があります。 ',
    'ALERT_DATE_INVALID' => '> 有効な日付ではありません： ',
    'ALERT_MSG_FINISH' => '問題を修正して、検索を再送信してください。',

    // Other text defines
    'ERROR_MISSING_REQ_INFO' => 'エラー： 必須フィールドが空です',
    'ALT_TEXT_SORT_ASC' => '昇順で並べ替える',
    'ALT_TEXT_SORT_DESC' => '降順で並べ替える',
    'TEXT_REPORT_TIMESTAMP' => '報告時間： ',
    'TEXT_PARSE_TIME' => '解析時間: %s 秒',
    'TEXT_EMPTY_SELECT' => '（関係ない）',
    'TEXT_QTY' => '| 数量： ',
    'TEXT_DIFF' => ' | 差分： ',
    'TEXT_SAME' => '| （同じ）',
    'TEXT_SAME_ONE' => '| --',
    'TEXT_PRINT_FORMAT' => 'レポートを印刷形式で表示する',
    'TEXT_NO_DATA' => '-- 時間枠内に注文がありません --',

    // Buttons
    'BUTTON_TIMEFRAME_PRESET' => 'プリセットを選択',
    'BUTTON_TIMEFRAME_CUSTOM' => 'カスタムを選択',
];

// -----
// Some of the language definitions reuse the main definitions; add them separately since
// they're not defined at this point.
//
$defines['ALERT_CSV_CONFLICT'] = '> CSV出力は ' . $defines['SELECT_DETAIL_MATRIX'] . ' 表示では使用できません。';
$defines['ERROR_CSV_CONFLICT'] = 'CSV 出力は <em>' . $defines['SELECT_DETAIL_MATRIX'] . '</em> 表示では使用できません。レポート オプションを再度選択してください。';
$defines['TEXT_PRINT_FORMAT_TITLE'] = 'ヒント： \'' . $defines['PAGE_HEADING'] . '\' をクリックすると表示ビューに戻ります';

return $defines;

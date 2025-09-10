<?php
/**
 * Monthly Sales and Tax Summary mod for Zen Cart
 * Version 3.0.0
 * @copyright Portions Copyright 2004-2025 Zen Cart Team
 * @author Vinos de Frutas Tropicales (lat9)

  By SkipWater <skip@ccssinc.net> 11.24.2011
  With modifications by lat9: Copyright (c) 2013-2022 Vinos de Frutas Tropicales

  Powered by Zen-Cart (www.zen-cart.com)
  Portions Copyright (c) 2006 The Zen Cart Team

  Released under the GNU General Public License
  available at www.zen-cart.com/license/2_0.txt
  or see "license.txt" in the downloaded zip 

  DESCRIPTION: Monthly Sales Report
*/
$define = [
    'STATS_MONTHLY_SALES_DEBUG' => 'off', //  Enables (on) or disables (off) the ability of the plugin to create a debug trace file (myDEBUG-sms.log) in the /logs directory.

    'SMS_VERSION' => 'v3.0.0',

    'HEADING_TITLE' => '月次売上・税金集計表',
    'HEADING_SUBTITLE' => '%sの売上データを表示しています',
    'HEADING_SUBTITLE_STATUS' => '、注文状況は%sです。',    //-%s is filled in with the name of the orders-status selected
    'HEADING_SUBTITLE_STATE' => 'そして、この状態： %s',
    'HEADING_TITLE_STATUS' => '状態：',
    'TEXT_ALL_ORDERS' => 'すべての注文',
    'HEADING_TITLE_STATE' => '都道府県：',
    'TEXT_ALL_STATES' => 'すべての都道府県',
    'TEXT_NOTHING_FOUND' => 'この日付/ステータス選択では収入はありません。',
    'TEXT_BUTTON_REPORT_INVERT' => '逆順表示',
    'TEXT_BUTTON_REPORT_PRINT' => '印刷',
    'TEXT_BUTTON_REPORT_SAVE' => 'CSVを保存する',
    'TEXT_BUTTON_REPORT_BACK_DESC' => '月別まとめに戻る',
    'TEXT_BUTTON_REPORT_INVERT_DESC' => '行を上下に反転する',
    'TEXT_BUTTON_REPORT_PRINT_DESC' => '印刷用ウィンドウでレポートを表示する',
    'TEXT_BUTTON_REPORT_HELP_DESC' => 'このレポートについて、およびその機能の使い方について',
    'TEXT_BUTTON_REPORT_GET_DETAIL' => '今月の日次レポートを見るにはこちらをクリックしてください',

    'TABLE_HEADING_YEAR' => '年',
    'TABLE_HEADING_MONTH' => '月',
    'TABLE_HEADING_DAY' => '日',
    'TABLE_HEADING_INCOME' => '総収入',
    'TABLE_HEADING_SALES' => '商品販売',
    'TABLE_HEADING_NONTAXED' => '非課税売上',
    'TABLE_HEADING_TAXED' => '課税売上',
    'TABLE_HEADING_TAX_COLL' => '徴収された税金',
    'TABLE_HEADING_SHIPHNDL' => '送料と手数料',
    'TABLE_HEADING_LOWORDER' => '少額注文手数料',
    'TABLE_HEADING_VOUCHER' => 'ギフト券',
    'TABLE_HEADING_COUPON' => 'クーポン',
    'TABLE_HEADING_OTHER' => '他の',
    'TABLE_FOOTER_YEAR' => '年',

    // -----
    // Language constants used by the report's AJAX handler (/includes/classes/ajax/zcAjaxMonthlySales.php).
    //
    'SMS_AJAX_ORDER_ID' => '注文番号',
    'SMS_AJAX_DATE_PURCHASED' => '購入日',
    'SMS_AJAX_TAX_DESCRIPTION' => '税金の説明',
    'SMS_AJAX_TAX' => '税',
    'SMS_AJAX_TAX_TOTAL' => '合計：',

    'SMS_AJAX_TITLE_MONTHLY' => '%2$u年%1$sの注文履歴を見る',      //-Uses monthname (%1$s), year (%2$u)
    'SMS_AJAX_TITLE_DAILY' => '%3$u年%2$s%1$u日の注文履歴を表示する',   //-Uses day (%1$u), monthname (%2$s) and year (%3%u)

    'HELP_CLOSE' => '閉じる',
    'HELP_CONTENT_HEADER' => '月次売上報告書を利用する',
];

$table_heading_income = $define['TABLE_HEADING_INCOME'];
$table_heading_sales = $define['TABLE_HEADING_SALES'];
$table_heading_nontaxed = $define['TABLE_HEADING_NONTAXED'];
$table_heading_taxed = $define['TABLE_HEADING_TAXED'];
$table_heading_tax_coll = $define['TABLE_HEADING_TAX_COLL'];
$table_heading_shiphndl = $define['TABLE_HEADING_SHIPHNDL'];
$table_heading_loworder = $define['TABLE_HEADING_LOWORDER'];
$table_heading_voucher = $define['TABLE_HEADING_VOUCHER'];
$table_heading_coupon = $define['TABLE_HEADING_COUPON'];
$table_heading_other = $define['TABLE_HEADING_OTHER'];
$sms_version = $define['SMS_VERSION'];

/**
 * -----
 * I know, naughty HTML contained in language definitions, but there's no equivalent of a
 * define-page in the admin :-( - lat9
 *
 * Be careful about editing this out. If you want to use a define, create a variable and 
 * assign the constant there. THEN use the new variable where you want to put the constant.
 * Otherwise... uhh... look up how PHP Heredocs work. (keep the first line as is and keep 
 * the EOF; at the end on its own separate line.
 * - retched
 */
$define['HELP_CONTENT_HTML'] =<<<EOF

<h2>店舗活動状況を月別に報告する</h2>
<p>レポートメニューからこのレポートを選択すると、最初に店舗データベースに登録されているすべての注文に関する月次売上推移が一覧表示されます。各月の売上データは1行にまとめられ、店舗の売上総額とその内訳、さらに税金、送料・手数料、最低注文額手数料、クーポン、ギフト券などの金額が一覧表示されます。ただし、店舗設定で該当機能が無効になっている場合は、最低注文額手数料、クーポン、ギフト券に関する項目はレポートに表示されず、それらの金額は「その他」として扱われます。</p>
<p>最上段は今月のデータ、その下の各行には、過去の各月の店舗の注文履歴がまとめられています。各年度のデータの下には合計行があり、レポートの各列の年間合計値が示されています。表示順序を逆順にしたい場合は、画面上部のフォームエリアにある「逆順表示」のチェックボックスにチェックを入れ、「実行」ボタンをクリックしてください。</p>
<h2>日別での月次概要レポートを作成する</h2>
<p>各行の左側に表示されている月の名称をクリックすると、その月の活動状況を日単位でまとめた一覧が表示されます。日単位の表示画面から月単位の表示画面に戻るには、画面左下にある「戻る」ボタンをクリックしてください。</p>
<h2>各列が何を意味するのか</h2>
<p>左端の列には、対象期間の月と年が記載されています。その右側の列には、以下のような情報が左から順に記載されています：</p><ul>
<li><b>$table_heading_income</b> &mdash; すべての注文の合計金額。これは、当該期間中に発生したすべての注文金額の総計です。</li>
<li><b>$table_heading_sales</b> &mdash; 期間中に購入された商品の総売上金額。これは、各商品の最終価格（割引額を差し引いた金額）に購入数量を乗算した値の合計です。</li>
<li><b>$table_heading_nontaxed</b> &mdash; 非課税の商品販売額の小計。</li>
<li><b>$table_heading_taxed</b> &mdash; 課税対象となる商品の売上金額の小計。</li>
<li><b>$table_heading_tax_coll</b> &mdash; 顧客から徴収した税金総額（送料に課される税金を含む）。</li>
<li><b>$table_heading_shiphndl </b> &mdash; 集計された送料と手数料の合計金額。</li></ul><p>最後に、以下のオプション項目が表示されます。</p><ul>
<li><b>$table_heading_loworder</b> &mdash; 店舗が低額注文手数料を設定している場合は、その手数料も含まれます。</li>
<li><b>$table_heading_voucher</b> &mdash; 店舗がギフト券を扱っている場合、ギフト券利用時の手数料は別途発生します。</li>
<li><b>$table_heading_coupon</b> &mdash; 店舗がクーポン機能を有効にしている場合、クーポンによる割引額。</li>
<li><b>$table_heading_other</b> &mdash; その他の、主要項目以外の合計金額（例：送料保険など）。</li>
</ul>
<h2>ステータス別レポート概要の選択</h2>
<p>特定の注文ステータスに関する月別または日別の概要情報を表示するには、レポート画面右上にあるドロップダウンメニューから該当するステータスを選択してください。ストアの設定によっては、「保留中」や「発送済み」などのステータスが表示される場合があります。このステータスを変更すると、レポートが再計算され、更新された内容が表示されます。</p>
<h2>税金の詳細を表示する</h2>
<p>レポートの各行に表示されている税額の項目は、モーダルウィンドウへのリンクとなっており、そこには課税対象となる税目の名称とそれぞれの金額が表示されます。</p>
<h2>レポートの印刷</h2>
<p>印刷に適した画面でレポートを表示するには、「印刷」ボタンをクリックしてください。店舗名とヘッダー情報が表示されることで、どの注文が選択されたのか、そしてレポートがいつ作成されたのかが明確になります。</p>
<h2>レポートデータをファイルに保存する</h2>
<p>レポートのデータをローカルファイルに保存するには、レポート上部の「CSVとして保存」ボタンをクリックしてください。レポートデータはテキストファイルとしてブラウザにダウンロードされ、「ファイルの保存」ダイアログボックスが表示されますので、保存先を選択してください。このファイルはCSV（カンマ区切り値）形式で、レポートの各行が1行ずつ記述されており、各行のデータはカンマで区切られています。このファイルは、ExcelやQuattro Proなどの一般的なスプレッドシートソフトや統計解析ツールに、簡単に正確にインポートできます。ファイル名には、レポート名、選択したステータス、そしてレポート作成日時が自動的に設定されます。</p>
<p>$sms_version</p>
EOF;

return $define;

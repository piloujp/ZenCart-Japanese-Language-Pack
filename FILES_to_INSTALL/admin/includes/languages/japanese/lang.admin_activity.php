<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: torvista 2022 Jun 12 New in v1.5.8-alpha $
*/

$define = [
    'HEADING_TITLE' => '管理者活動ログマネージャー',
    'HEADING_SUB1' => 'ログの表示／エクスポート',
    'HEADING_SUB2' => 'ログ履歴の消去',
    'TEXT_ACTIVITY_EXPORT_FORMAT' => 'エクスポートファイル形式：',
    'TEXT_ACTIVITY_EXPORT_FILENAME' => '輸出ファイル名：',
    'TEXT_ACTIVITY_EXPORT_SAVETOFILE' => 'サーバー上のファイルに保存しますか？（それ以外の場合は、このウィンドウから直接ダウンロードするためにストリームされます）',
    'TEXT_ACTIVITY_EXPORT_DEST' => '保存先：',
    'SUCCESS_EXPORT_ADMIN_ACTIVITY_LOG' => 'エクスポートが完了しました。',
    'FAILURE_EXPORT_ADMIN_ACTIVITY_LOG' => '警告：エクスポートに失敗しました。保存先のファイルへの書き込むことができません。',
    'TEXT_INSTRUCTIONS' => '<u>説明</u><br>このページを使用して、Zen Cart&reg; 管理者のユーザー アクセス アクティビティを CSV ファイルにエクスポートし、アーカイブすることができます。<br>
サイトへの不正アクセスや、不正に使用された場合などに、調査を行うため、ログデータを保存しておく必要があります。<br>これはPCIコンプライアンスの必要条件です。<br>
<ol><li>表示かエクスポートかを選択します。</li>
<li>エクスポートファイル名を入力します。（.csv、.txt、.htm、.html、.xml のいずれかで終わる必要があります）</li>
<li>「保存」をクリックして続行します。</li>
<li>ブラウザの機能に応じて、ファイルを保存するか開くかを選択します。</li></ol>',
    'TEXT_INFO_ADMIN_ACTIVITY_LOG' => '<strong>管理者の活動ログをデータベースから削除します。<br>警告： この更新を行う前バックアップを必ず取ってください!</strong><br>管理者のアクティビティログは管理者の活動履歴を記録したものです。<br>ログは非常に多くなっていく為、速やかにきれいにしていく必要があります。<br>警告は60日で50,000件ほど溜まります<br><span class="alert">注：PCI コンプライアンスのために、12ヵ月分の管理活動ログ履歴を保持することを要求されます。<br>ログデータを一掃する前に、上の『エクスポートCSV』から、管理活動ログ履歴を保存を行って下さい。</span>',
    'TEXT_ADMIN_LOG_PLEASE_CONFIRM_ERASE' => '<strong><span class="alert">警告!： あなたは、データベースから重要な電算機処理監査記録を削除しようとしています。</span></strong><br>リセットに進む前に、データベースなどにログ履歴のバックアップ保存をしているか、まず確認しなければなりません。<br>ログデータを保存することに関しての法的責任を理解したうえで、ログの削除に進んでください。<br><br>責任を理解したうえで、リセットボタンをクリックしログの削除を行います：<br>',
    'SUCCESS_CLEAN_ADMIN_ACTIVITY_LOG' => '管理アクティビティ ログの消去が<strong>完了</strong>しました',
    'TEXT_NO_RECORDS_FOUND' => '指定された条件でのログデータは見つかりませんでした。',
    'TEXT_EXPORTFORMAT0' => 'HTML としてエクスポート（画面表示に最適）',
    'TEXT_EXPORTFORMAT1' => 'CSV にエクスポート（スプレッドシートへのインポートに最適）',
    'TEXT_EXPORTFORMAT2' => 'TXTにエクスポート',
    'TEXT_EXPORTFORMAT3' => 'XMLにエクスポート',
    'TEXT_ACTIVITY_EXPORT_FILTER' => '出力したいログデータ：',
    'TEXT_EXPORTFILTER0' => '重大度レベルに関係なく、すべてのログデータ。',
    'TEXT_EXPORTFILTER1' => '情報：一般的なログ情報',
    'TEXT_EXPORTFILTER2' => 'お知らせ：定期的にレビューする必要がある重要な情報',
    'TEXT_EXPORTFILTER3' => '警告：毎日レビューする必要があるアクティビティ',
    'TEXT_EXPORTFILTER4' => '注意と警告（レビューのための一般的な組み合わせ）。',
    'TEXT_ACTIVITY_EXPORT_FILTER_USER' => '管理者ユーザーでフィルタ：',
    'TEXT_EXPORTFILTER_USER' => 'すべての管理者ユーザー',
    'TEXT_INTERPRETING_LOG_DATA' => '<p><strong>ログデータの解釈</strong></p>
<ul>
<li><strong>重要度</strong>：ログに対して与えられている重要度の内容は以下のとおりです。
  <ul>
  <li><strong>「全般情報」</strong>は、一般的な操作情報です。特別に注意すべき情報は含まれていないかも知れません。</li>
  <li><strong>「注意」</strong>は、上位の権限により行われた操作内容をあらわします。　新たに管理者が追加されたり、支払モジュールが追加されるなどの操作が含まれます。　ここでは、スクリプトタグやインラインフレームの組込みなど危険性を含んだコンテンツを、商品ページやカテゴリページなどに掲載したことを見つける事が出来るため、不満を持った作業担当者や、サイトに侵入した悪意のある第三者などにより行われた悪意のある行為を特定するのに役立ちます。<br>不正な行為が行われた形跡などの異常が無いかどうかを、定期的に確認すべきです。</li>
  <li><strong>「警告」 </strong>は、 支払モジュールの削除や、管理者の削除などの重要な事象を意味します。これらの操作は、すぐに対応しなければ、解決不能なトラブルを発生させる可能性があるものです。出来る限り頻繁に、毎日でも確認すべきです。</li>
  </ul>
</li>
<li><strong>admin_user</strong>：各管理者に付与されている管理者ID番号です。ログインしていない場合には、0になります。</li>
<li><strong>page_accessed</strong>：表示されている画面のページ名です。どのような操作が行われているかのヒントになります。</li>
<li><strong>parameters</strong>：ページを表示させた際のURLです。利用者がどのような操作を行おうとしたのかをより詳しく知る助けになります。</li>
<li><strong>flagged</strong>：もし、これが 1になっていたら、「postdata」のフィールドに記録されている内容を詳しく調査して、不正なスクリプトや iframe など、危険性のあるコンテンツが含まれていないかを確認すべきであることを意味します。疑わしいコンテンツに関する説明は、「attention」フィールドに有ります。</li>
<li><strong>attention</strong>：フラグが立てられている場合には、「postdata」フィールドで確認する必要がある疑わしい活動の種類に関する提案が含まれます。</li>
<li><strong>logmessage</strong>：これには、特定のモジュールのインストールなどの際に発生した操作についてシステムによって記録されたメッセージが含まれています。</li>
<li><strong>postdata</strong>：悪意のある操作が疑われる場合に備えて、内容を簡単に確認できるように生のPOSTデータが含まれています（一部の機密性の高い情報は削除されています）。</li>
</ul>',
];

return $define;

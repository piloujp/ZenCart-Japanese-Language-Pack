<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2024 May 27 Modified in v2.1.0-alpha1 $
*/

$define = [
    'HEADING_TITLE' => 'EZ-Pages',
    'TABLE_HEADING_PAGES' => 'ページタイトル',
    'TABLE_HEADING_VSORT_ORDER' => 'サイドボックスの整列順',
    'TABLE_HEADING_HSORT_ORDER' => 'フッターの並べ替え順',
    'TEXT_PAGES_TITLE' => 'ページタイトル:',
    'TEXT_PAGES_HTML_TEXT' => 'HTML コンテンツ:',
    'TEXT_PAGES_STATUS_CHANGE' => 'ステータスの変更: %s',
    'TEXT_INFO_DELETE_INTRO' => 'このページを本当に削除しますか？',
    'SUCCESS_PAGE_INSERTED' => '成功: このページは挿入されました',
    'SUCCESS_PAGE_UPDATED' => '成功: このページは更新されました',
    'SUCCESS_PAGE_REMOVED' => '成功: このページは削除されました',
    'SUCCESS_PAGE_STATUS_UPDATED' => '成功: このページのステータスは更新されました',
    'ERROR_PAGE_TITLE_REQUIRED' => 'エラー: ページタイトルが必要です.',
    'ERROR_UNKNOWN_STATUS_FLAG' => 'エラー: ステータス不明のフラグです',
    'ERROR_MULTIPLE_HTML_URL' => 'エラー: 各々のリンクに対して複数の設定を適用しています<br>: HTML コンテンツ -or- 内部リンク URL -or- 外部リンク URL　どれか一つのみ設定してください',
    'TABLE_HEADING_STATUS_HEADER' => 'ヘッダー:',
    'TABLE_HEADING_STATUS_SIDEBOX' => 'サイドボックス:',
    'TABLE_HEADING_STATUS_FOOTER' => 'フッター:',
    'TABLE_HEADING_STATUS_MOBILE' => '携帯：',
    'TABLE_HEADING_STATUS_TOC' => 'グルーピング:',
    'TABLE_HEADING_CHAPTER' => 'グループID:',
    'TABLE_HEADING_VISIBLE' => '表示:',
    'TABLE_HEADING_MOBILE_EXPLANATION' => 'モバイル メニューにリンクとして表示しますか? モバイル対応のリンクは、並べ替え順序とタイトルで並べ替えられます。',
    'TABLE_HEADING_PAGE_OPEN_NEW_WINDOW' => '新しいウィンドウを開く:',
    'TABLE_HEADING_PAGE_IS_VISIBLE' => 'ページを表示:',
    'TABLE_HEADING_PAGE_IS_VISIBLE_EXPLANATION' => ' ヘッダー、フッター、またはサイドボックスにリンクされていない場合でも、ページにアクセスできます。<br>
    （ただし、表示とヘッダー、フッター、サイドボックスのすべての設定がオフになっている場合、ページを表示しようとする訪問者にはページが見つかりませんという応答が返されます。）',
    'TEXT_DISPLAY_NUMBER_OF_PAGES' => ' <b>%1$d</b> から <b>%2$d</b> を表示(<b>%3$d</b> ページ中)',
    'IMAGE_NEW_PAGE' => '新規ページ',
    'TEXT_INFO_PAGES_ID' => 'ID: ',
    'TEXT_INFO_PAGES_ID_SELECT' => 'ページを選択 ...',
    'TEXT_HEADER_SORT_ORDER' => '順番:',
    'TEXT_SIDEBOX_SORT_ORDER' => '順番:',
    'TEXT_FOOTER_SORT_ORDER' => '順番:',
    'TEXT_MOBILE_SORT_ORDER' => '順番:',
    'TEXT_TOC_SORT_ORDER' => '順番:',
    'TEXT_CHAPTER' => 'グループID:',
    'TABLE_HEADING_CHAPTER_PREV_NEXT' => 'グループID:&nbsp;<br>',
    'TEXT_HEADER_SORT_ORDER_EXPLAIN' => 'ヘッダーの整列順はヘッダーが一列に作られている時にのみ使用されます; 整列順はゼロより大きい数値を設定してください',
    'TEXT_SIDEBOX_ORDER_EXPLAIN' => 'サイドボックスの整列順はサイドボックスが垂直に並べられている時にのみ使用されます; 整列順はゼロより大きい数値を設定してください。',
    'TEXT_FOOTER_ORDER_EXPLAIN' => 'フッターの整列順はフッターが一列に作られている時にのみ使用されます; 整列順はゼロより大きい数値を設定してください',
    'TEXT_TOC_SORT_ORDER_EXPLAIN' => 'グループ整列順はコンテンツブロックのエリアが一列に垂直に並んでいる時のみ使用できます。整列順はゼロより大きい数値を設定してください。',
    'TEXT_CHAPTER_EXPLAIN' => 'グルーピングを使用して、ページをグループ化し自動的に目次を表示させることができます。同じグループIDをもつページ同士がグループ化されます。整列順はグループ内での目次の表示順を指定します。',
    'TEXT_ALT_URL' => '内部リンクURL:',
    'TEXT_ALT_URL_EXPLAIN' => '内部リンクURLが指定されるとHTML コンテンツは無視され、内部リンクはリンクとして使用されるURLに変換されます。<br>例: index.php?main_page=reviews<br>マイページの例: index.php?main_page=account',
    'TEXT_ALT_URL_EXTERNAL' => '外部リンク URL:',
    'TEXT_ALT_URL_EXTERNAL_EXPLAIN' => '外部リンクURLが指定されるとHTML コンテンツは無視され、外部リンクはリンクとして使用されるURLに変換されます。<br>外部リンクへの例: https://www.zen-cart.com',
    'TEXT_SORT_CHAPTER_TOC_TITLE_INFO' => '表示順: ',
    'TEXT_SORT_CHAPTER_TOC_TITLE' => 'グループ',
    'TEXT_SORT_HEADER_TITLE' => 'ヘッダー',
    'TEXT_SORT_SIDEBOX_TITLE' => 'サイドボックス',
    'TEXT_SORT_FOOTER_TITLE' => 'フッター',
    'TEXT_SORT_MOBILE_TITLE' => '携帯',
    'TEXT_SORT_PAGE_TITLE' => 'ページタイトル',
    'TEXT_SORT_PAGE_ID_TITLE' => 'ページID, タイトル',
    'TEXT_PAGE_TITLE' => 'タイトル:',
    'TEXT_WARNING_MULTIPLE_SETTINGS' => '<strong>警告: 複数のリンク定義</strong>',
];

return $define;

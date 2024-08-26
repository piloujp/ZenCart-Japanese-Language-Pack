<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: pilou2 2023 June 18 New in v1.5.8a $
*/


$define = [
    'HEADING_TITLE' => 'デバッグログファイルの表示',
    'TABLE_HEADING_FILENAME' => 'ファイル名',
    'TABLE_HEADING_MODIFIED' => '変更された日付',
    'TABLE_HEADING_FILESIZE' => 'ファイルサイズ（バイト）',
    'TABLE_HEADING_DELETE' => '消去？',
    'TABLE_HEADING_ACTION' => 'アクション',
    'BUTTON_DELETE_SELECTED' => '選択を削除します',
    'DELETE_SELECTED_ALT' => '選択したファイルをすべて削除します',
    'BUTTON_DELETE_ALL' => 'すべて削除',
    'DELETE_ALL_ALT' => '表示されているファイルをすべて削除します',
    'ICON_INFO_VIEW' => 'このファイルの内容を表示する',
    'DISPLAY_DEBUG_LOGS_ONLY' => 'デバッグログのみを表示しますか？',
    'TEXT_HEADING_INFO' => 'ファイルの内容',
    'TEXT_MOST_RECENT' => '最新の',
    'TEXT_OLDEST' => '最古の',
    'TEXT_SMALLEST' => '最小',
    'TEXT_LARGEST' => '最大',
    'TEXT_INSTRUCTIONS' => '<br><br><em>昇順</em>または<em>降順</em>リンクのいずれかをクリックすると、ファイルを昇順または降順（最終変更日またはファイルサイズのいずれかに基づいて）に並べ替えることができます。%7$s アイコンをクリックすると、関連ファイルの内容が表示されます。選択したファイルの最初の %1$u バイトのみが読み取られます。 ファイルが「サイズ超過」の場合、<em>ファイル サイズ</em>が<span class="bigfile">この</span>のように強調表示されます。<br><br><strong> すべて削除</strong>ボタンは、現在表示されているすべてのファイルを削除します。 [<strong>選択したファイルを削除</strong>] をクリックすると、チェックボックスがオンになっているファイルのみが削除されます。<br><br>現在、 <code>%5$s</code> プレフィックスを持つ %2$s %3$u/%4$u ログ ファイルを表示していますが、<code>%6$s</code> と一致しません。<br>',
    'JS_MESSAGE_DELETE_ALL_CONFIRM' => 'これらの「+n+」ファイルを削除してもよろしいですか？',
    'JS_MESSAGE_DELETE_SELECTED_CONFIRM' => '「+selected」選択したファイルを削除してもよろしいですか？',
    'WARNING_NOT_SECURE' => '<span class="errorText">注：SSL が有効になっていません。 このページから表示するファイルの内容は暗号化されないため、セキュリティ上のリスクが生じる可能性があります。</span>',
    'WARNING_NO_FILES_SELECTED' => '削除するファイルが選択されていません！',
    'WARNING_SOME_FILES_DELETED' => '警告： %u のみ（%u ログ ファイルのうち）が削除されました。 権限を確認してください。',
    'SUCCESS_FILES_DELETED' => '%u 個のログ ファイルが削除されました。',
];

return $define;

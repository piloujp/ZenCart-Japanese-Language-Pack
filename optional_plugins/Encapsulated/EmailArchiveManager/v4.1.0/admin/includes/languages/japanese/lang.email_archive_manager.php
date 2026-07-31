<?php
/**
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2026 Jul 31  Plugin version 4.0 $
 */

$define = [
    'HEADING_TITLE' => 'メールアーカイブ管理',

    'HEADING_SEARCH_INSTRUCT' =>  '以下の条件を任意に組み合わせて検索することができます...',

    'HEADING_MODULE_SELECT' =>  'モジュールで絞り込む：',
    'HEADING_SEARCH_TEXT' =>  '検索する文章：',
    'HEADING_SEARCH_TEXT_FILTER' =>  '現在の検索フィルター：',
    'HEADING_START_DATE' =>  '開始日：',
    'HEADING_END_DATE' =>  '終了日：',
    'HEADING_DATE_RANGE' =>  '期間：',
    'HEADING_PRINT_FORMAT' =>  '結果を印刷用形式で表示しますか？',
    'HEADING_ONLY_ERRORS' => 'エラーがある場合のみ',
    'HEADING_TRIM_INSTRUCT' =>  '～より古いメールを削除する',

    'TOOLTIP_SEARCH_TEXT' => '検索対象：受取人の氏名と住所、メールの件名、メールのHTMLおよびテキストコンテンツ、およびエラーメッセージ。',
    'TOOLTIP_ONLY_ERRORS' => 'メールの送信を試みた際にエラーが発生したレコードのみを表示します。',

    'HEADING_TEXT_INSTEAD' =>  '安全のためテキストモードで表示しています。HTMLには悪意のあるコードが含まれている可能性があります。',

    'TABLE_HEADING_EMAIL_DATE' =>  '送信日',
    'TABLE_HEADING_CUSTOMERS_NAME' =>  '顧客名',
    'TABLE_HEADING_CUSTOMERS_EMAIL' =>  '電子メールアドレス',
    'TABLE_HEADING_EMAIL_FORMAT' =>  '形式',
    'TABLE_HEADING_EMAIL_SUBJECT' =>  '件名',
    'TABLE_HEADING_EMAIL_ERRORINFO' => 'エラー情報',
    'TABLE_FORMAT_TEXT' =>  'TEXT',
    'TABLE_FORMAT_HTML' =>  'HTML',

    'TEXT_TRIM_ARCHIVE' =>  'メールアーカイブを整理する...',
    'TEXT_ARCHIVE_ID' =>  'アーカイブ #%d',
    'TEXT_ALL_MODULES' =>  'すべてのモジュール',
    'TEXT_DISPLAY_NUMBER_OF_EMAILS' =>  '<b>%1$d</b> ～ <b>%2$d</b> を表示（全 <b>%3$d</b> 通のメール）',
    'TEXT_EMAIL_MODULE' =>  'モジュール：',
    'TEXT_EMAIL_TO' =>  'に：',
    'TEXT_EMAIL_FROM' =>  'から：',
    'TEXT_EMAIL_DATE_SENT' =>  '送信済み：',
    'TEXT_EMAIL_SUBJECT' =>  '件名：',
    'TEXT_EMAIL_EXCERPT' =>  'メッセージの抜粋：',
    'TEXT_EMAIL_ERRORINFO' => 'エラー情報：',
    'TEXT_EMAIL_NUMBER' =>  'メール番号',

    'TEXT_NO_ARCHIVE_RECORDS_FOUND' =>  '一致するレコードは見つかりませんでした。',

    'RADIO_1_MONTH' =>  ' １ヶ月',
    'RADIO_6_MONTHS' =>  ' ６ヶ月',
    'RADIO_1_YEAR' =>  ' １２ヶ月',

    'TEXT_DROPDOWN_DATE_SELECT_ALL' =>  '全期間',
    'TEXT_DROPDOWN_DATE_SELECT_7_DAYS' =>  '過去７日間',
    'TEXT_DROPDOWN_DATE_SELECT_30_DAYS' =>  '過去３０日間',
    'TEXT_DROPDOWN_DATE_SELECT_3_MONTHS' =>  '過去３ヶ月間',
    'TEXT_DROPDOWN_DATE_SELECT_LAST_YEAR' =>  '昨年',

    'TEXT_RESEND_PREFIX' => '再送：',
    'TRIM_CONFIRM_WARNING' =>  '警告： これにより、アーカイブからメールが完全に削除されます。<br>よろしいですか？',
    'POPUP_CONFIRM_RESEND' =>  'このメッセージを再送信してもよろしいですか？',
    'POPUP_CONFIRM_DELETE' =>  'このメッセージを削除してもよろしいですか？',
    'SUCCESS_TRIM_ARCHIVE' =>  '成功： %s より古いメールが削除されました。',
    'SUCCESS_EMAIL_RESENT' =>  '成功： メール #%1$s が %2$s に再送信されました。',

    'IMAGE_ICON_HTML' =>  ' HTMLメッセージを表示',
    'IMAGE_ICON_TEXT' =>  'テキストメッセージを表示',
    'IMAGE_ICON_RESEND' =>  'メッセージを再送する',
    'IMAGE_ICON_EMAIL' =>  'メールの宛先',
    'IMAGE_ICON_DELETE' =>  'メッセージを削除',

    'SEND_NEW_EMAIL' =>  '新しいメールを送信する',
    'BUTTON_SEARCH_ARCHIVE' =>  'アーカイブを検索',
    'BUTTON_TRIM_CONFIRM' =>  'メールを削除する',
    'BUTTON_CANCEL' =>  'キャンセル',
    'BUTTON_RESET_SEARCH_ARCHIVE' =>  'リセット',
];

return $define;

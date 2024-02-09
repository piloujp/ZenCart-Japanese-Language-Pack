<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piloujp 2024 Feb 06 Modified in v2.0.0-alpha1 $
*/

$define = [
    'HEADING_TITLE' => '特価商品の管理',
    'TEXT_ADD_SPECIAL_SELECT' => '商品を選択して特価商品に追加',
    'TEXT_ADD_SPECIAL_PID' => '商品IDを指定して特価商品に追加',
    'TEXT_SEARCH_SPECIALS' => '登録済み特価商品から検索',
    'TEXT_SPECIAL_ACTIVE' => '特価有効',
    'TEXT_SPECIAL_INACTIVE' => '特価無効',
    'TEXT_SPECIAL_STATUS_BY_DATE' => '日付を指定してステータスを設定',
    'TEXT_SPECIALS_PRODUCT' => '商品名:',
    'TEXT_SPECIALS_SPECIAL_PRICE' => '特別価格:',
    'TEXT_SPECIALS_EXPIRES_DATE' => '適用終了日:',
    'TEXT_SPECIALS_AVAILABLE_DATE' => '適用開始日:',
    'TEXT_INFO_NEW_PRICE' => '新価格：',
    'TEXT_INFO_ORIGINAL_PRICE' => '元の価格：',
    'TEXT_INFO_DISPLAY_PRICE' => '表示価格：',
    'TEXT_INFO_STATUS_CHANGED' => 'ステータス変更日：',
    'TEXT_INFO_HEADING_DELETE_SPECIALS' => '特価商品を削除',
    'TEXT_INFO_DELETE_INTRO' => 'この特価商品を本当に削除しますか?',
    'WARNING_SPECIALS_PRE_ADD_PID_EMPTY' => '警告：商品IDが指定されていません。',
    'WARNING_SPECIALS_PRE_ADD_PID_DUPLICATE' => '警告：商品ID#%u は既に特価に登録済みです。',
    'WARNING_SPECIALS_PRE_ADD_PID_NO_EXIST' => '警告：商品ID#%u は存在していません。',
    'WARNING_SPECIALS_PRE_ADD_PID_GIFT' => '警告：商品ID#%u は「' . '%%TEXT_GV_NAME%%' . '」です。',
    'TEXT_INFO_HEADING_PRE_ADD_SPECIALS' => '商品IDからの特価商品の登録',
    'TEXT_INFO_PRE_ADD_INTRO' => '沢山の商品の中から、手動で商品IDを入力することによって、特価商品を追加できます。<br><br>商品数が膨大になれば、ページの読み込みやドロップダウンからの選択は手間がかかるため、商品IDから入力するこの方法が最適です。',
    'TEXT_PRE_ADD_PRODUCTS_ID' => '追加したい商品のIDを入力: ',
    'TEXT_SPECIALS_PRICE_NOTES_HEAD' => '<b>注意：</b>', 
    'TEXT_SPECIALS_PRICE_NOTES_BODY' => '<li>特別価格を税別の「新しい価格」で指定している場合、小数値がある場合は "." （小数点）を使ってください。例：<b>49.99</b>。計算された値引き率がショップ側の特別価格の横に表示されます。</li><li>特別価格を「値引き率」で指定する場合、% 記号を使って、値引き分のパーセンテージを入力してください。例：<b>20%</b>。</li><li>適用開始日/適用終了日の指定は必須ではありません。適用終了日を空欄にした場合、特価の適用は終了しません。</li><li>日付がセットされた場合、ステータスは日付判定によって自動的に　有効化/無効化 されます。</li>',
    'ERROR_INVALID_ACTIVE_DATE' => '「アクティブ」 日付が無効です。再入力してください。',
    'ERROR_INVALID_EXPIRES_DATE' => '「期限切れ」 日付が無効です。再入力してください。',
];

return $define;

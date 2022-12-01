<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Steve 2022 Feb 08 New in v1.5.8-alpha $
*/

$define = [
    'HEADING_TITLE_ATRIB' => '商品属性',
    'TABLE_HEADING_DOWNLOAD' => 'ダウンロード商品:',
    'TABLE_TEXT_FILENAME' => 'ファイル名:',
    'TABLE_TEXT_MAX_DAYS' => 'ダウンロード期限:',
    'TABLE_TEXT_MAX_COUNT' => '最大ダウンロード回数:',
    'TEXT_WARNING_OF_DELETE' => 'このオプションにリンクされた商品・オプション値があります。削除するとエラーが出る可能性があります。',
    'TEXT_OK_TO_DELETE' => 'このオプションにリンクされた商品・オプション値はありません。削除可能です。',
    'ATTRIBUTE_POSSIBLE_OPTIONS_VALUE_WARNING_DUPLICATE' => '可能な複製オプション値が追加されました(Possible Duplicate Options Value Added)。',
    'TEXT_DOWNLOADS_DISABLED' => 'NOTE: ダウンロード機能オフ',
    'TABLE_TEXT_MAX_DAYS_SHORT' => 'ダウンロード期限:',
    'TABLE_TEXT_MAX_COUNT_SHORT' => 'ダウンロード可能回数:',
    'TEXT_SORT' => ' Order: ',
    'TEXT_OPTION_VALUE_COMMENTS' => 'コメント: ',
    'TEXT_OPTION_VALUE_SIZE' => '表示サイズ: ',
    'TEXT_OPTION_VALUE_MAX' => '最長: ',
    'TEXT_ATTRIBUTES_IMAGE' => '属性の画像見本:',
    'TEXT_ATTRIBUTES_IMAGE_DIR' => '属性の画像ディレクトリ:',
    'TEXT_ATTRIBUTES_FLAGS' => '属性<br>フラグ:',
    'TEXT_ATTRIBUTES_DISPLAY_ONLY' => '使用目的<br>表示のみ:',
    'TEXT_ATTRIBUTES_IS_FREE' => '属性は無料<br>商品が無料の際は:',
    'TEXT_ATTRIBUTES_DEFAULT' => 'デフォルト属性<br>マーク・選択されているもの:',
    'TEXT_ATTRIBUTE_IS_DISCOUNTED' => '同じディスカウントを適用<br>商品に使用:',
    'TEXT_PRODUCT_OPTIONS_INFO' => '商品オプションの追加設定',
    'TEXT_OPTION_VALUE_COPY_ALL' => '<strong>オプション情報一括登録<br>指定されたオプション名とオプション値を持っている商品に対して</strong>',
    'TEXT_INFO_OPTION_VALUE_COPY_ALL' => '現在登録されているオプション名とオプション値を利用して情報を追加したい対象商品を指定し、条件に適合する全ての商品にオプション情報を一括登録します。',
    'TEXT_SELECT_OPTION_FROM' => '適合するオプション名:',
    'TEXT_SELECT_OPTION_VALUES_FROM' => '適合するオプション値:',
    'TEXT_SELECT_OPTION_TO' => '追加するオプション名:',
    'TEXT_SELECT_OPTION_VALUES_TO' => '追加するオプション値:',
    'TEXT_SELECT_OPTION_VALUES_TO_CATEGORIES_ID' => '空欄にしておくか、更新したい商品のカテゴリーIDを入力してください',
    'TEXT_OPTION_VALUE_COPY_OPTIONS_TO' => '<strong>オプション情報一括登録 - 登録済み詳細情報の利用<br /></strong>',
    'TEXT_INFO_OPTION_VALUE_COPY_OPTIONS_TO' => '指定されたオプション名をすでに持っている商品に対して、オプション情報を追加します。<br>また追加したいオプション情報に関して、既に<strong>オプションによる価格や重量などの設定</strong>が済んでいる商品があれば、その商品IDを指定する事でそれらの設定情報も合わせてコピーする事ができます。<br>
<strong>利用例:</strong>「オプション名:サイズ」を持っているすべての商品に、「オプション名:色、オプション値:赤」を追加<br>
<strong>利用例:</strong>「オプション名:サイズ」を持っているすべての商品に、「オプション名:色、オプション値:赤」を商品ID：34の商品で登録されている設定値と共に追加<br>
<strong>利用例:</strong>「オプション名:サイズ」を持っているカテゴリID：65内の全ての商品に、「オプション名:色、オプション値:赤」を商品ID：34の商品で登録されている設定値と共に追加<br>',
    'TEXT_SELECT_OPTION_TO_ADD_TO' => '適合するオプション名:',
    'TEXT_SELECT_OPTION_FROM_ADD' => '追加するオプション名:',
    'TEXT_SELECT_OPTION_VALUES_FROM_ADD' => '追加するオプション値:',
    'TEXT_SELECT_OPTION_FROM_PRODUCTS_ID' => 'コピーしたいオプション詳細情報を持った商品ID、無い場合は空欄:',
    'TEXT_INFO_FROM' => ' から: ',
    'TEXT_INFO_TO' => ' へ: ',
    'ERROR_OPTION_VALUES_COPIED' => 'エラー: 無効なオプション名とオプション値です',
    'ERROR_OPTION_VALUES_COPIED_MISMATCH' => 'エラー: 選択されたオプション名とオプション値が適合しません。',
    'ERROR_OPTION_VALUES_NONE' => 'エラー: コピーするものがありません',
    'SUCCESS_OPTION_VALUES_COPIED' => 'コピーは成功しました! ',
    'ERROR_OPTION_VALUES_COPIED_MISMATCH_PRODUCTS_ID' => 'エラー: Products ID#のオプション名とオプション値が失われています',
    'TEXT_OPTION_VALUE_DELETE_ALL' => '<strong>オプション情報一括削除<br />指定されたオプション名とオプション値を持っている商品から</strong>',
    'TEXT_INFO_OPTION_VALUE_DELETE_ALL' => '商品に登録されている指定されたオプション情報をすべての商品から一括削除します。',
    'TEXT_SELECT_DELETE_OPTION_FROM' => '適合するオプション名:',
    'TEXT_SELECT_DELETE_OPTION_VALUES_FROM' => '適合するオプション値:',
    'ERROR_OPTION_VALUES_DELETE_MISMATCH' => 'エラー: 選択されたオプション名とオプション値が適合しません',
    'SUCCESS_OPTION_VALUES_DELETE' => '削除に成功しました： ',
    'LABEL_FILTER' => 'フィルタリングするオプション値を選択',
    'TEXT_DISPLAY_NUMBER_OF_OPTION_VALUES' => '<b>%d</b> 件目から <b>%d</b> 件目を表示（全 <b>%d</b> 件のオプション値）',
    'TEXT_SHOW_ALL' => 'すべて表示',
];

return $define;

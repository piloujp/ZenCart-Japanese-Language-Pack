<?php
// -----
// Part of the "Product Options Stock Manager" plugin by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2014-2024 Vinos de Frutas Tropicales
//
// Last updated: POSM v5.0.0
//

// -----
// Since languages are loaded via a class method, need to globalize $db.
//
global $db;
$lowstock_option = $db->Execute(
    "SELECT configuration_group_id, configuration_id
       FROM " . TABLE_CONFIGURATION . " 
      WHERE configuration_key = 'POSM_STOCK_REORDER_LEVEL'
      LIMIT 1"
);
$lowstock_value_link = zen_href_link(FILENAME_CONFIGURATION, 'gID=' . $lowstock_option->fields['configuration_group_id'] . '&cID=' . $lowstock_option->fields['configuration_id'] . '&action=edit');

$text_pos_identifier = '(*)';
$text_oos_label = 'Out-of-Stock Label';
$define = [
    'HEADING_TITLE' => '商品オプション在庫管理',
    'TEXT_POS_IDENTIFIER' => $text_pos_identifier,
    'TEXT_PRODUCT_DISABLED_IDENTIFIER' => '【無効】',
    'TEXT_LAST_UPDATED' => '最終更新日：',
    'TEXT_POS_INSTRUCTIONS' => "まず、商品を表示するカテゴリを選択します (デフォルト: <em>すべての商品</em>)。カテゴリ名の後にアスタリスク (*) が付いている場合、そのカテゴリには 1 つ以上の商品 (必ずしも属性が付いているとは限りません) が含まれます。無効な商品を含めるように表示をフィルタリングし、各商品のモデル番号が商品のドロップダウン選択に含まれているかどうかを確認できます。商品の並べ替え順序は、次のドロップダウン選択によって制御されます。これら 4 つの選択肢は、管理者ログイン セッションで「記憶」されます。<br><br>次に、オプションの在庫を管理する商品を以下のドロップダウン リストから選択します。商品名の後に <b>" . $text_pos_identifier . "</b> が続く場合、その商品には現在管理されているオプションがあります。商品のオプションの組み合わせの数量が" . POSM_STOCK_REORDER_LEVEL . "以下であるか、在庫切れの有効期限が近い場合、ドロップダウン リスト内で商品名が<span class=\"out-of-stock\">強調表示</span>されます。<br><br><strong>注記：</strong>商品オプションは、オプションの並べ替え順序（<a href=\"" . zen_href_link(FILENAME_OPTIONS_NAME_MANAGER) . "\">カタログ :: オプション名マネージャ</a> で定義）を使用して（左から右へ）表示されます。<em>属性の並べ替え順序</em>で並べ替えると、商品のオプションの組み合わせの値が、値の並べ替え順序 (<a href=\"" . zen_href_link(FILENAME_ATTRIBUTES_CONTROLLER) . "\">カタログ :: 属性コントローラー</a> で定義) を使用して (上から下へ) 表示されます。複数のオプション名またはオプション値で同じソート順序が使用される場合、オプションはさらに名前の昇順でソートされます。<br><br>「商品のモデルを含めるか?」ボックスをチェックしたかどうかに応じて、商品を名前またはモデル番号で並べ替えることができます。<br><br>",

    'TEXT_POS_INSERT' => '「追加」または「設定」ボタンを使用して、選択した商品の一つ以上のオプションの組み合わせを挿入または更新します。「追加」ボタンは、指定した数量を既存のオプションの組み合わせに<em>追加</em>し、「設定」ボタンは、既存の組み合わせの数量を<em>置き換え</em>ます。選択したすべての組み合わせを追加するかどうかを確認するポップアップ確認が表示されます。<br><br>',

    'TEXT_POS_INSTRUCTIONS2' => "商品に一つ以上のオプションの組み合わせがある場合、それらはリストとして表示されます。<ol><li>オプションの組み合わせの在庫レベルが、設定された低在庫レベル（現在は <a href=\"$lowstock_value_link\">" . POSM_STOCK_REORDER_LEVEL . "</a>）以下である場合、組み合わせの「数量」入力に<span class=\"out-of-stock\">赤い枠線</span> が表示されます。</li><li>オプションの組み合わせの再入荷日が「リマインダー期間」（現在は" . POSM_BIS_DATE_REMINDER. "日数以上）内であるか、または「リマインダー期間」を過ぎている場合は、エントリの行全体に<span class=\"bg-warning\">警告背景</span> が表示されます。</li><li>オプションの組み合わせまたは値に <span class=\"removed\">取り消し線マークアップ付き</span> と表示されている場合、そのオプションの組み合わせまたは値は商品から削除されています。不明なオプションの組み合わせまたは値の数量を更新することはできませんが、削除することはできます。</li><li>いずれかの「更新」ボタンをクリックすると、すべてのオプションの組み合わせ数量とモデルが更新されます。</li><li>いずれかの「削除」ボタンをクリックすると、「削除しますか?」ボックスがチェックされているオプションの組み合わせがすべて削除されます。一つ以上の「削除しますか?」ボックスがチェックされている場合、削除を確認するポップアップ メッセージが表示されます。</li><li>重複を報告するように<em>POSM</em>の重複モデル処理を設定している場合、<span class=\"dup-model\">赤い枠線</span>が付いた<b>オプション モデル/SKU</b> エントリは、商品の定義内または別の<em>POSM</em>オプションの組み合わせ内で重複しています。詳細については、<a href=\"" . zen_href_link(FILENAME_POSM_FIND_DUPLICATE_MODELNUMS) . "\"><em>ツール::POSM: 重複モデルの検索</em></a>を参照してください。</li></ol>",

    'TEXT_POS_OPTIONS_ADDED' => 'オプション記録が作成されてから、この商品に一つ以上のオプションが追加されました。既存のオプション記録に追加する新しいオプションごとに値を選択し、「挿入」ボタンをクリックしてください。既存のレコードの数量は同じままです。<br><br>',

    'TEXT_POS_STOCK_QUANTITY' => '数量',
    'TEXT_CURRENT_TOTAL' => '総数：　%u',
    'TEXT_POS_REMOVE' => '取り除く？',
    'TABLE_HEADING_CHECK_UNCHECK' => 'すべて/なし？',
    'TEXT_ADD_TO_QUANTITY' => '追加',
    'TEXT_REPLACE_QUANTITY' => '設定',
    'TEXT_ALL' => '* （全て）',
    'TEXT_OPTION_MODEL' => 'オプション モデル/SKU',
    'TEXT_OOS_LABEL' => $text_oos_label,
    'TEXT_OOS_DATE' => '再入荷日<br><span class="smaller">YYYY-MM-DD で入力</span>',
    'TEXT_NONE_DEFINED' => '-- 定義なし --',
    'TEXT_PLEASE_SELECT' => '選択してください...',
    'TEXT_ALL_CATEGORIES' => 'すべてのカテゴリー',
    'TEXT_CHOOSE_CATEGORY' => 'カテゴリから商品を表示:',
    'TEXT_CHOOSE_PRODUCT' => '管理する商品を選択してください:',
    'TEXT_NO_PRODUCTS_IN_CATEGORY' => '選択したカテゴリには、管理可能なオプションを持つ商品が存在しません。',

    'TEXT_MODEL_DEFAULT' => 'デフォルトに設定しますか？',
    'TEXT_MODEL_DEFAULT_TITLE' => '現在空の値にこのモデル番号を使用しますか？',

    'BUTTON_DEFINE_LABELS' => 'ラベルを定義する',
    'BUTTON_DEFINE_LABELS_ALT' => '在庫切れ商品に使用するラベルを定義するにはここをクリックしてください',
    'BUTTON_VIEW_ALL' => 'すべて表示',
    'BUTTON_VIEW_ALL_ALT' => '管理対象商品すべてを一ページに表示するには、ここをクリックしてください',
    'BUTTON_GO' => '実行',

    'TEXT_INCLUDE_DISABLED' => '無効な商品を含めますか？',
    'TEXT_INCLUDE_MODEL' => '商品のモデルを含めますか？',

    'BUTTON_UPDATE' => '更新',
    'TEXT_UPDATE_ALT' => 'すべての数量とモデル番号を更新するには、ここをクリックしてください。',
    'BUTTON_REMOVE' => '削除',
    'TEXT_REMOVE_ALT' => '選択したオプションの組み合わせを削除するには、ここをクリックしてください。',

    'TEXT_SINGLE_LABEL_NAME' => '<b>注意：</b>　&quot;' . $text_oos_label . '&quot;（<em><b>%1$s</b></em>）は一つだけ定義されています。このラベルは、在庫切れのすべての <em>POSM</em> 管理商品に使用されます。',

    'ERROR_INVALID_DATE' => '<strong>在庫切れ日</strong>は、YYYY-MM-DD 形式で有効な日付を入力する必要があります。',
    'ERROR_INVALID_FORM_VALUES' => 'フォームの送信で無効な値が見つかりました（コード %s）。',
    'SUCCESS_QUANTITY_UPDATED' => '一つ以上のオプションの在庫数量とモデル番号が更新されました。',
    'SUCCESS_NEW_OPTION_CREATED' => '一つ以上の新しいオプションの在庫記録が作成または更新されました。',
    'WARNING_DUPLICATE_COMBINATION' => '選択したオプションの組み合わせを持つ記録は既に存在します。',
    'SUCCESS_OPTION_RECORDS_REMOVED' => '%u オプション レコードが正常に削除されました。',
    'SUCCESS_OPTIONS_ADDED' => '既存のオプション記録に新しいオプションが追加されました。',
    'ERROR_MISSING_INPUTS' => '更新リクエストを処理できませんでした。サイトの PHP 設定値 <code>post_max_size</code> (現在は %1$s) および/または <code>max_input_size</code> (現在は %2$s) を増やす必要があります。',

    'JS_MESSAGE_DELETE_ALL_CONFIRM' => 'これらの\'+n+\'オプション記録を削除してもよろしいですか？',
    'JS_MESSAGE_INSERT_NEW_CONFIRM' => 'このアクションにより\'+items+\'オプションの組み合わせが挿入されます。続行しますか？',
    'JS_MESSAGE_INSERT_MULTIPLE_CONFIRM' => 'このアクションにより\'+items+\'オプションの組み合わせが挿入される可能性があります。現在のすべての組み合わせの数量は\'+add_replace+\'になります。続行しますか？',
    'JS_MESSAGE_UPDATED' => '\'+quantity+\' によって更新されました',
    'JS_MESSAGE_REPLACED' => '交換された',
    'JS_MESSAGE_DELETE_SELECTED_CONFIRM' => '\'+selected+\'個の選択されたオプションの組み合わせを削除してもよろしいですか?',
    'WARNING_NO_FILES_SELECTED' => '削除するオプションの組み合わせが選択されませんでした。',
    'JS_MESSAGE_CONFIRM_MODEL_DEFAULT' => '商品の基本モデル番号（%s）を\'+emptyModels+\'オプションに適用します。続行しますか？', //- %s is the product's base model
];
return $define;

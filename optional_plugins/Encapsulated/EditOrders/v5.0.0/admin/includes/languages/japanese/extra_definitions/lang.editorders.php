<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piloujp 2025 Jan 18 Modified in v2.1.0 $
*/

$define = [
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_EDITORDERS' => '注文を編集',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_EDITORDERS' => '注文編集 (EO<sup>5</sup>) は、管理ユーザーが顧客の注文を編集できるようにする Zen Cart 管理モジュールです。詳細については、<a href="https://github.com/lat9/edit_orders/wiki" target="_blank" rel="noopener noreferrer">ウィキ</a> の「注文編集」を参照してください。',
// Admin configuration
    'CFGTITLE_EO_ADDRESSES_DISPLAY_ORDER' => '住所、表示順序',
    'CFGDESC_EO_ADDRESSES_DISPLAY_ORDER' => '<em>注文編集</em>では、左から右にどのような順序で注文の住所を表示する必要がありますか？<b>CSB</b> を選択すると、<em>顧客</em>、<em>配送</em>、<em>請求</em> の順に表示されます。<b>CBS</b> を選択すると、<em>顧客</em>、<em>請求</em>、<em>配送</em> の順に表示されます。',
    'CFGTITLE_EO_TOTAL_RESET_DEFAULT' => '更新時に合計をリセット - デフォルト',
    'CFGDESC_EO_TOTAL_RESET_DEFAULT' => '<em>更新前に合計をリセット</em>チェックボックスのデフォルト値を選択します。ストアで税金関連の再計算を実行する注文合計モジュール（「グループ価格設定」など）を使用している場合は、この値を<b>オン</b>に設定します。',
    'CFGTITLE_EO_SHIPPING_DROPDOWN_STRIP_TAGS' => '配送モジュール名からタグを削除しますか？',
    'CFGDESC_EO_SHIPPING_DROPDOWN_STRIP_TAGS' => '有効にすると、配送モジュールのタイトルにある HTML および PHP タグが、配送ドロップダウン メニューに表示されるテキストから削除されます。<br><br>タイトルに部分的なタグや壊れたタグがある場合、予想よりも多くのテキストが削除される可能性があります。その場合は、影響を受ける配送モジュールを更新するか、このオプションを無効にする必要があります。',
    'CFGTITLE_EO_PRODUCT_PRICE_CALC_METHOD' => '製品価格の計算方法',
    'CFGDESC_EO_PRODUCT_PRICE_CALC_METHOD' => '注文が更新されたときに「EO」が製品価格を計算するために使用する <em>方法</em> を、次のいずれかから選択します：<ol><li><b>自動スペシャル</b>：各製品価格は、ストアフロントで注文した場合と同様に再計算されます。製品に属性がある場合は、製品の属性を変更すると、関連する製品価格が自動的に更新されます。</li><li><b>手動</b>：各製品価格は、製品の <b><i>管理者が入力した価格</i></b> に基づきます。</li><li><b>選択</b>：製品価格の計算方法は、チェックボックスの「チェック」によって注文ごとに異なります。使用されるデフォルトの方法は、<em>製品価格計算 &mdash; デフォルト</em> 設定によって定義されます。</li></ol>',
    'CFGTITLE_EO_PRODUCT_PRICE_CALC_DEFAULT' => '製品価格計算 &mdash; デフォルト',
    'CFGDESC_EO_PRODUCT_PRICE_CALC_DEFAULT' => '商品価格の計算方法が <b>選択</b> の場合、どの方法を <em>デフォルト</em> の方法として使用する必要がありますか？',
    'CFGTITLE_EO_STATUS_HISTORY_DISPLAY_ORDER' => 'ステータス履歴の表示順序',
    'CFGDESC_EO_STATUS_HISTORY_DISPLAY_ORDER' => '<em>注文の編集</em>で注文のステータス履歴レコードを表示する方法を、記録されたとおりに表示（<b>昇順</b>）するか、最新のものから表示（<b>降順</b>）するかを選択します。',
    'CFGTITLE_EO_CUSTOMER_NOTIFICATION_DEFAULT' => 'ステータス更新：顧客通知のデフォルト',
    'CFGDESC_EO_CUSTOMER_NOTIFICATION_DEFAULT' => '注文にコメントが追加されたときに顧客に通知を送信するかどうかを指定するラジオ ボタンに使用するデフォルトを選択します。',
    'CFGTITLE_EO_SHOW_EDIT_ORDER_ICON' => '注文リストに注文編集アイコンを表示しますか？',
    'CFGDESC_EO_SHOW_EDIT_ORDER_ICON' => '注文リストの各注文に編集アイコンを表示しますか？デフォルト：<b>はい</b>',
    'CFGTITLE_EO_SHOW_EDIT_ORDER_BUTTON' => 'サイドボックスのボタンの位置を編集',
    'CFGDESC_EO_SHOW_EDIT_ORDER_BUTTON' => '現在選択されている注文のサイドボックス表示で、注文情報に対してどの位置に <em>編集</em> ボタンを表示しますか? デフォルト：<b>両方</b>',
    'CFGTITLE_EO_DEBUG_ACTION_LEVEL' => 'デバッグアクションレベル',
    'CFGDESC_EO_DEBUG_ACTION_LEVEL' => '有効にすると、注文編集によるアクションの実行時に追加のデバッグ情報がログ ファイルに保存されます。<br><br>デバッグを有効にすると、多数のログ ファイルが作成され、サーバーのパフォーマンスに悪影響を与える可能性があります。絶対に必要な場合にのみ有効にしてください。',
];

return $define;

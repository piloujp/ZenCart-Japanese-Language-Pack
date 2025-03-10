<?php
$define = [
    'MODULE_ORDER_TOTAL_PRIORITY_HANDLING_TITLE' => '優先処理',
    'MODULE_ORDER_TOTAL_PRIORITY_HANDLING_DESCRIPTION' => '優先処理',
    'MODULE_ORDER_TOTAL_PRIORITY_HANDLING_TEXT_DESCR' => '注文を急いでください! このオプションの処理を選択するには、下の「優先処理を追加」の横にあるボックスをクリックします。「続行」をクリックすると、優先処理料金が合計金額に追加されます。',
    'MODULE_ORDER_TOTAL_PRIORITY_HANDLING_TEXT_ENTER_CODE' => '優先処理の追加：',
    'MODULE_ORDER_TOTAL_PRIORITY_HANDLING_YES' => 'はい',
    'MODULE_ORDER_TOTAL_PRIORITY_HANDLING_NO' => 'いいえ',
// Beginning of constant configuration titles and descriptions for order total module ot_priority_handling
    'CFGTITLE_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_STATUS' => '優先処理モジュールを有効にする',
    'CFGDESC_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_STATUS' => 'このモジュールを有効にしますか？',
    'CFGTITLE_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_SORT_ORDER' => '並び替え順',
    'CFGDESC_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_SORT_ORDER' => '表示の並び替え順。',
    'CFGTITLE_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_TYPE' => '優先取扱手数料タイプ',
    'CFGDESC_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_TYPE' => '手数料をカート小計のパーセンテージにするか、または以下の階層として指定するかを指定します',
    'CFGTITLE_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_PER' => '手数料： パーセンテージ',
    'CFGDESC_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_PER' => '手数料として請求する小計の割合を入力します。',
    'CFGTITLE_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_FEE' => '手数料： 手数料区分',
    'CFGDESC_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_FEE' => '手数料の増分を入力してください。手数料は次のようになります:<br>（小計/価格帯） ｘ 手数料帯',
    'CFGTITLE_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_INCREMENT' => '手数料： 価格帯 ',
    'CFGDESC_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_INCREMENT' => '価格帯の増分を入力します。定額料金体系を設定するには、ここに大きな値を入力し、上の料金帯に定額料金を入力します。たとえば、常に１０００円を請求し、注文が通常１００００円程度である場合は、ここに５０００００を入力し、料金帯ボックスに１０００円を入力します。',
    'CFGTITLE_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_OVER' => '手数料： 価格帯上限',
    'CFGDESC_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_OVER' => '価格帯の上限を入力します。たとえば、デフォルト値では、カートの小計が￥１０００００に達するまで、￥１００００ごとに￥５０の料金が課され、最大￥５００になります。',
    'CFGTITLE_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_TAX_CLASS' => '税区分',
    'CFGDESC_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_TAX_CLASS' => '手数料が課税対象となる場合は、適用される税金の区分を選択します。',
    'CFGTITLE_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_TAX_INLINE' => '税金表示',
    'CFGDESC_MODULE_ORDER_TOTAL_PRIORITY_HANDLING_TAX_INLINE' => '税金（上記参照）を、上記クラスの税金小計行に追加することも、手数料行に追加することもできます。どの行に追加すればよいですか？',
// eof constant configuration titles and descriptions for order total module ot_priority_handling
];
return $define;

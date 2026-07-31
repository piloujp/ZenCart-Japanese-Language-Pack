<?php
// -----
// Gather any Miscellaneous Cost for an order, an order-total created by lat9 (https://vinosdefrutastropicales.com)
//
// Last updated: EO 5.0.0
//
$define = [
    'MODULE_ORDER_TOTAL_MISC_COST_TITLE' => '雑費',
    'MODULE_ORDER_TOTAL_MISC_COST_DESCRIPTION' => '注文に関連する雑費。',
// bof constant configuration titles and descriptions for ot_misc_cost
    'CFGTITLE_MODULE_ORDER_TOTAL_MISC_COST_STATUS' => 'このモジュールはインストールされています。',
    'CFGDESC_MODULE_ORDER_TOTAL_MISC_COST_STATUS' => '',
    'CFGTITLE_MODULE_ORDER_TOTAL_MISC_COST_SORT_ORDER' => '表示順',
    'CFGDESC_MODULE_ORDER_TOTAL_MISC_COST_SORT_ORDER' => '表示順を設定します。',
    'CFGTITLE_MODULE_ORDER_TOTAL_MISC_COST_CHANGE_TITLE' => 'タイトルの変更を許可する',
    'CFGDESC_MODULE_ORDER_TOTAL_MISC_COST_CHANGE_TITLE' => '注文の編集時にモジュールのタイトルを変更できるようにする',
    'CFGTITLE_MODULE_ORDER_TOTAL_MISC_COST_TAX_CLASS' => '税種別',
    'CFGDESC_MODULE_ORDER_TOTAL_MISC_COST_TAX_CLASS' => '「その他の費用（Miscellaneous Cost）」には、以下の税区分を使用してください。この注文合計額に税を適用する場合は、以下の点に注意してください。<ol><li><em>Sort Order</em>（表示順序）を <code>ot_coupon</code> の値よりも大きく設定する。</li><li><em>Sort Order</em>（表示順序）を <code>ot_tax</code> の値よりも小さく設定する。</li></ol>',
// eof constant configuration titles and descriptions for ot_misc_cost
];
return $define;

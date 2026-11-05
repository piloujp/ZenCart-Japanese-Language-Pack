<?php

$define = [
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_AJAXADDTOCART' => 'Ajaxによるカート追加',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_AJAXADDTOCART' => 'ページを再読み込みすることなく、AJAXを使用して商品をカートに追加できます。管理画面から設定可能です。' .
    '<div class="buttons my-2">' .
    '<a class="btn btn-primary btn-sm" href="' . DIR_WS_CATALOG . 'zc_plugins/AjaxAddToCart/' . basename(dirname(__DIR__, 5)) . '/readme.html " target="_blank"><i class="fa fa-book"></i> はじめにお読みください</a> ' .
    '<a class="btn btn-info btn-sm" href="https://github.com/zenexpert/ajax-add-to-cart" target="_blank"><i class="fa-solid fa-code-branch"></i> GitHub</a> ' .
    '<a class="btn btn-success btn-sm" href="" target="_blank"><i class="fa fa-comments"></i> フォーラム</a>' .
    '</div>',
// AjaxAddToCart - configuration
    'CFGTITLE_AJAX_ADD_TO_CART_STATUS' => 'Ajaxによるカート追加を有効にする',
    'CFGDESC_AJAX_ADD_TO_CART_STATUS' => 'Ajaxによるカート追加機能を有効または無効にしますか？',
    'CFGTITLE_AJAX_ADD_TO_CART_FORM_SELECTOR' => 'フォームセレクター',
    'CFGDESC_AJAX_ADD_TO_CART_FORM_SELECTOR' => '「カートに追加」フォーム用のjQueryセレクター。',
    'CFGTITLE_AJAX_ADD_TO_CART_BUTTON_SELECTOR' => 'ボタンセレクター',
    'CFGDESC_AJAX_ADD_TO_CART_BUTTON_SELECTOR' => 'フォーム内の送信ボタンを対象とするjQueryセレクター。',
    'CFGTITLE_AJAX_ADD_TO_CART_LINK_SELECTOR' => 'リンクセレクター',
    'CFGDESC_AJAX_ADD_TO_CART_LINK_SELECTOR' => '「今すぐ購入」の直接リンク用jQueryセレクター',
    'CFGTITLE_AJAX_ADD_TO_CART_CART_COUNT_SELECTOR' => 'カート内数量選択ツール',
    'CFGDESC_AJAX_ADD_TO_CART_CART_COUNT_SELECTOR' => 'カート内の商品数を表示する要素のjQueryセレクター（該当なしの場合は空欄にしてください）。',
    'CFGTITLE_AJAX_ADD_TO_CART_CART_TOTAL_SELECTOR' => 'カート合計セレクター',
    'CFGDESC_AJAX_ADD_TO_CART_CART_TOTAL_SELECTOR' => 'カートの合計金額を表示する要素のjQueryセレクター（該当なしの場合は空欄にしてください）。',
    'CFGTITLE_AJAX_ADD_TO_CART_SIDEBOX_SELECTOR' => 'サイドボックス・セレクター',
    'CFGDESC_AJAX_ADD_TO_CART_SIDEBOX_SELECTOR' => 'ショッピングカートのサイドボックス・ラッパー用jQueryセレクター。',
    'CFGTITLE_AJAX_ADD_TO_CART_IN_CART_SELECTOR' => 'カート内セレクター',
    'CFGDESC_AJAX_ADD_TO_CART_IN_CART_SELECTOR' => '商品詳細ページにある「カート内の数量」要素のjQueryセレクター。',
    'CFGTITLE_AJAX_ADD_TO_CART_IN_CART_PARENT' => 'カート内親タグ',
    'CFGDESC_AJAX_ADD_TO_CART_IN_CART_PARENT' => '「カート内の数量」要素がまだ存在しない場合に挿入される、親ラッパーのjQueryセレクター。',
// AjaxAddToCart - configuration_group
    'CFG_GRP_TITLE_AJAX_ADD_TO_CART' => '%%BOX_CONFIGURATION_AJAX_ADD_TO_CART%%',
    'CFG_GRP_DESC_PAJAX_ADD_TO_CART' => '「%%BOX_CONFIGURATION_AJAX_ADD_TO_CART%%」プラグインの設定',
];

return $define;

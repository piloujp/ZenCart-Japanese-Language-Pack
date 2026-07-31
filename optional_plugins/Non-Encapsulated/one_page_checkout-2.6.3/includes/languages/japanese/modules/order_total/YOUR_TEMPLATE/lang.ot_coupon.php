<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 (cindy@vinosdefrutastropicales.com).
// Copyright (C) 2022-2026, Vinos de Frutas Tropicales.  All rights reserved.
//
// Last updated for OPC v2.6.2
//
$define = [];
if (zen_config('CHECKOUT_ONE_ENABLED') === 'true') {
    $define['MODULE_ORDER_TOTAL_COUPON_REDEEM_INSTRUCTIONS'] = '<p>下の割引コードボックスにクーポンコードを入力してください。右側のボタンをクリックするか、注文を送信すると、クーポンが合計金額に適用され、注文の表示に反映されます。注意： 注文ごとに１つのクーポンのみ使用できます。</p>';
}
return $define;

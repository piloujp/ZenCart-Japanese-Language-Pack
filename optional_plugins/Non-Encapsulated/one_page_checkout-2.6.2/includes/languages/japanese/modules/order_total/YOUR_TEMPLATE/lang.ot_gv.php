<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 (cindy@vinosdefrutastropicales.com).
// Copyright (C) 2022-2026, Vinos de Frutas Tropicales.  All rights reserved.
//
// Last updated for OPC v2.6.2
//
$define = [];
if (zen_config('CHECKOUT_ONE_ENABLED') === 'true') {
    $define['MODULE_ORDER_TOTAL_GV_REDEEM_INSTRUCTIONS'] = '<p>すでにアカウントにある' . TEXT_GV_NAME . 'の資金を使用するには、「金額を適用」というボックスに適用する金額を入力します。支払い方法を選択し、ページの下部にある送信ボタンをクリックして、注文に資金を適用する必要があります。</p><p>新しい' . TEXT_GV_NAME . 'を利用する場合は、「割引コード」の横にあるボックスに番号を入力してください。右側のボタンをクリックすると、利用した金額がアカウントに追加されます。</p>';
}
return $define;

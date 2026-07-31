<?php
// -----
// Part of the One-Page Checkout plugin, provided under GPL 2.0 license by lat9 (cindy@vinosdefrutastropicales.com).
// Copyright (C) 2013-2026, Vinos de Frutas Tropicales.  All rights reserved.
//
// Last updated: OPC v2.6.0
//
$defines = [
    'BOX_TOOLS_CHECKOUT_ONE' => 'ワンページチェックアウト設定',

    'ERROR_ACTION_INVALID_FOR_GUEST_CUSTOMER' => '要求されたアクション（%s）は、<em>One-Page Checkout</em> ゲスト顧客に対して実行できません。',
    'ERROR_STORESIDE_CONFIG' => '<em>One-Page Checkout</em> プラグインは無効になっています。プラグインが適切に動作するにはファイル「%s」が必要です。',

    'ICON_GUEST_ALT' => 'ゲストチェックアウト',

    'TEXT_GUEST_CHECKOUT' => 'ゲストチェックアウトで注文',
    'TEXT_OPC_INSTALLED' => '<em>One-Page Checkout</em> プラグイン「%s」が正常にインストールされました。',
    'TEXT_OPC_UPDATED' => '<em>One-Page Checkout</em> プラグインが「%1$s」から「%2$s」に正常にアップグレードされました。',
];

$defines['ICON_GUEST_CHECKOUT'] = '<i class="fa fa-user-secret" aria-hidden="true" title="' . $defines['ICON_GUEST_ALT'] . '"></i>';

return $defines;

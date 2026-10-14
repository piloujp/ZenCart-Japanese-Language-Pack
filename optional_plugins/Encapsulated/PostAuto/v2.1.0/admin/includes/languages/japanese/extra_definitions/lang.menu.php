<?php

/**
 * @copyright Copyright 2003-2026 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piloujp 2026 Oct 14 Modified in v3.3.0-dev $
*/

$define = [
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_POSTAUTO' => '郵便番号で自動入力',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_POSTAUTO' => 'このプラグインは、郵便番号が入力されると、フォームのフィールドに都道府県、市区町村、および（データが利用可能な場合）番地を自動入力します。' .
    '<div class="buttons my-2">' .
    '<a class="btn btn-primary btn-sm" href="' . DIR_WS_CATALOG . 'zc_plugins/PostAuto/' . basename(dirname(__DIR__, 5)) . '/readme.html " target="_blank"><i class="fa fa-book"></i> はじめにお読みください</a> ' .
    '<a class="btn btn-info btn-sm" href="https://github.com/piloujp/Postcode_auto" target="_blank"><i class="fa fa-github-square"></i> GitHub</a> ' .
    '<a class="btn btn-success btn-sm" href="https://www.zen-cart.com/threads/205577" target="_blank"><i class="fa fa-comments"></i> フォーラム</a>' .
    '</div>',
];

return $define;

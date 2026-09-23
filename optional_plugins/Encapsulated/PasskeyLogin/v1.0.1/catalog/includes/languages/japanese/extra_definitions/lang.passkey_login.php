<?php
/**
 * Module: PasskeyLogin
 *
 * @requires    Zen Cart 2.1.0 or later, PHP 8.0+ with OpenSSL
 * @author      Marcopolo
 * @copyright   2026
 * @license     GNU General Public License (GPL) - https://www.zen-cart.com/license/2_0.txt
 * @version     1.0.0
 * @updated     08-23-2026
 * @github      https://github.com/CcMarc/PasskeyLogin
 */
// Storefront language constants, array format for the 2.x plugin language
// loader. The legacy define file sits alongside for older loaders; edit
// HERE to change the customer-facing copy.
$define = [
    'PKL_TILE_LABEL' => 'パスキー',
    'PKL_NUDGE_TITLE' => '次回はより素早くサインインする',
    'PKL_NUDGE_TEXT' => 'パスキーを追加して、指紋、顔、またはデバイスのPINでサインインしましょう。パスワードの入力や暗記は不要です。',
    'PKL_NUDGE_ADD_BUTTON' => 'パスキーを追加する',
    'PKL_NUDGE_DISMISS' => '結構です',
];
return $define;

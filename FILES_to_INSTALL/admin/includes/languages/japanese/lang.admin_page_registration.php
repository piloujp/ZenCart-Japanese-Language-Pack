<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Scott C Wilson 2022 Jan 11 New in v1.5.8-alpha $
*/

$define = [
    'HEADING_TITLE' => '管理ページの登録',
    'TEXT_PAGE_KEY' => 'ページキー',
    'TEXT_LANGUAGE_KEY' => 'ページ名',
    'TEXT_MAIN_PAGE' => 'ページのファイル名',
    'TEXT_PAGE_PARAMS' => 'ページの変数',
    'TEXT_MENU_KEY' => 'メニュー',
    'TEXT_DISPLAY_ON_MENU' => 'メニューに表示しますか？',
    'TEXT_EXAMPLE_PAGE_KEY' => '(例： myModPageName)',
    'TEXT_EXAMPLE_LANGUAGE_KEY' => '(例： BOX_MY_MOD_PAGE_NAME)',
    'TEXT_EXAMPLE_MAIN_PAGE' => '(例： FILENAME_PAGE_NAME)',
    'TEXT_EXAMPLE_PAGE_PARAMS' => '(例： option=1 のように指定するか、通常は空欄でかまいません',
    'TEXT_SELECT_MENU' => '-メニューを選択してください-',
    'ERROR_PAGE_KEY_NOT_ENTERED' => 'ページキーが入力されていません。管理画面では全てのページに対してユニークなページキーが必要です。',
    'ERROR_PAGE_KEY_ALREADY_EXISTS' => '指定されたページキーは既に利用されています。ページキーは必ずユニークなものを指定してください。',
    'ERROR_LANGUAGE_KEY_NOT_ENTERED' => 'ランゲージキーが入力されていません。管理画面では全てのページに対してメニューリンクに表示するランゲージキーが必要です。',
    'ERROR_LANGUAGE_KEY_HAS_NOT_BEEN_DEFINED' => '指定されたランゲージキーは定義されていません。入力内容が正しいか再度確認してください。',
    'ERROR_MAIN_PAGE_NOT_ENTERED' => 'ページのファイル名が入力されていません。',
    'ERROR_FILENAME_HAS_NOT_BEEN_DEFINED' => '指定されたファイル名は存在していません。入力内容が正しいか再度確認してください。',
    'ERROR_MENU_NOT_CHOSEN' => 'メニューが選択されていません。メニューに表示させない場合でも、新しいページはメニューに紐付ける必要があります。',
    'SUCCESS_ADMIN_PAGE_REGISTERED' => '管理者ページの登録が完了しました。',
];

return $define;

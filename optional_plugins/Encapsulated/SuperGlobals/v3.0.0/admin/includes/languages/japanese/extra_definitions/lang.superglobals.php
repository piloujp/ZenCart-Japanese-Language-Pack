<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2004, 2011 The zen-cart developers                     |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//  $Id: superglobals.php 1105 2011-08-07 22:05:35Z lat9 $
//
return [
    'BOX_CONFIGURATION_SUPERGLOBALS' => 'スーパーグローバル（Superglobals）',
// Plugin title
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_SUPERGLOBALS' => 'スーパーグローバル',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_SUPERGLOBALS' => 'Super Globals は、変数の評価を容易にする開発者向けツールです。',
// Admin configuration
    'CFGTITLE_SHOW_SUPERGLOBALS' => 'スーパーグローバルを有効にする（カタログ）',
    'CFGDESC_SHOW_SUPERGLOBALS' => 'true の場合、スーパーグローバルはページの下部にあるショップに表示されます（以下の設定によって異なります）。',
    'CFGTITLE_SHOW_SUPERGLOBALS_ADMIN' => 'スーパーグローバルを有効にする（管理）',
    'CFGDESC_SHOW_SUPERGLOBALS_ADMIN' => 'true の場合、スーパーグローバルはページ上部の管理画面に表示されます（以下の設定によって異なります）。',
    'CFGTITLE_SHOW_SUPERGLOBALS_POPUP' => 'ポップアップでスーパーグローバルを表示',
    'CFGDESC_SHOW_SUPERGLOBALS_POPUP' => 'true の場合、スーパーグローバルは JavaScript を使用してポップアップ ウィンドウに表示されます。JavaScript を使用しない、または使用できない場合は false に設定し、スーパーグローバルは各ページの下部に表示されます。',
    'CFGTITLE_SHOW_SUPERGLOBALS_TO_ALL' => 'スーパーグローバルを全員に表示する（IP チェックなし）',
    'CFGDESC_SHOW_SUPERGLOBALS_TO_ALL' => 'true の場合、スーパーグローバルはすべての訪問者に表示されます（セキュリティ リスク）。',
    'CFGTITLE_SHOW_SUPERGLOBALS_IP' => '許可された IP アドレスのリスト（カンマ区切りのリスト）',
    'CFGDESC_SHOW_SUPERGLOBALS_IP' => '許可された IP アドレスのコンマ区切りリストを入力します。デフォルト設定： 127.0.0.1,1,::1 （localhost）',
    'CFGTITLE_SHOW_SUPERGLOBALS_MAX_LEVEL' => '最大再帰レベル',
    'CFGDESC_SHOW_SUPERGLOBALS_MAX_LEVEL' => '最大再帰レベルを入力します。デフォルト設定：１２。これにより、再帰の場合に無限ループが防止されます（$GLOBALS 再帰は自動的に検出されます）。０は最大再帰レベルの保護を無効にします。',
    'CFGTITLE_SHOW_SUPERGLOBALS_ALL' => '$GLOBALS を表示（すべてのグローバルを表示）',
    'CFGDESC_SHOW_SUPERGLOBALS_ALL' => 'すべてのグローバルとすべてのスーパー グローバルの内容を表示します。有効にすると、スーパー グローバルを表示するための以下の設定が上書きされます。',
    'CFGTITLE_SHOW_SUPERGLOBALS_QUERYCACHE' => 'queryCache オブジェクトを表示しますか？',
    'CFGDESC_SHOW_SUPERGLOBALS_QUERYCACHE' => '<b>$GLOBALS を表示</b>が true に設定されている場合、queryCache オブジェクトの内容を表示しますか？有効にすると、$GLOBALS のフォーマットに必要な時間に影響します。',
    'CFGTITLE_SHOW_SUPERGLOBALS_FILTER_HTTP' => 'HTTP_ 変数をフィルタリングする',
    'CFGDESC_SHOW_SUPERGLOBALS_FILTER_HTTP' => 'true の場合、<em>非推奨</em>の HTTP_ 変数は除外されます（推奨）。',
    'CFGTITLE_SHOW_SUPERGLOBALS_EXCLUSIONS' => 'スーパーグローバルの除外',
    'CFGDESC_SHOW_SUPERGLOBALS_EXCLUSIONS' => 'このフィールドを使用して、<b>$GLOBALS を表示</b> が true に設定されている場合に表示しないスーパー グローバルを（パックされたコンマ区切りのリストを使用して）識別します。これらの変数は通常、関連情報を含まない大きな配列です。<br />デフォルト： <em>configuration,saniGroup1,main_category_tree</em>',
    'CFGTITLE_SHOW_SUPERGLOBALS_GET' => '$_GET を表示',
    'CFGDESC_SHOW_SUPERGLOBALS_GET' => 'この変数の内容を表示します。',
    'CFGTITLE_SHOW_SUPERGLOBALS_POST' => '$_POST を表示',
    'CFGDESC_SHOW_SUPERGLOBALS_POST' => 'この変数の内容を表示します。',
    'CFGTITLE_SHOW_SUPERGLOBALS_COOKIE' => '$_COOKIE を表示',
    'CFGDESC_SHOW_SUPERGLOBALS_COOKIE' => 'この変数の内容を表示します。',
    'CFGTITLE_SHOW_SUPERGLOBALS_REQUEST' => '$_REQUEST を表示',
    'CFGDESC_SHOW_SUPERGLOBALS_REQUEST' => 'この変数の内容を表示します。',
    'CFGTITLE_SHOW_SUPERGLOBALS_SESSION' => '$_SESSION を表示',
    'CFGDESC_SHOW_SUPERGLOBALS_SESSION' => 'この変数の内容を表示します。',
    'CFGTITLE_SHOW_SUPERGLOBALS_SERVER' => '$_SERVER を表示',
    'CFGDESC_SHOW_SUPERGLOBALS_SERVER' => 'この変数の内容を表示します。',
    'CFGTITLE_SHOW_SUPERGLOBALS_ENV' => '$_ENV を表示',
    'CFGDESC_SHOW_SUPERGLOBALS_ENV' => 'この変数の内容を表示します。',
    'CFGTITLE_SHOW_SUPERGLOBALS_FILES' => '$_FILES を表示',
    'CFGDESC_SHOW_SUPERGLOBALS_FILES' => 'この変数の内容を表示します。',
    'CFGTITLE_SHOW_SUPERGLOBALS_GET_DEFINED_CONSTANTS' => '定義された定数を表示',
    'CFGDESC_SHOW_SUPERGLOBALS_GET_DEFINED_CONSTANTS' => '定義されたすべての定数を表示します（必要な場合にのみオンにしてください。ページ ビューが遅くなります）。',
    'CFGTITLE_SHOW_SUPERGLOBALS_GET_INCLUDED_FILES' => '含まれるファイルを表示',
    'CFGDESC_SHOW_SUPERGLOBALS_GET_INCLUDED_FILES' => '含まれる（および必要な）すべてのファイルを表示します。',
];

return $define;
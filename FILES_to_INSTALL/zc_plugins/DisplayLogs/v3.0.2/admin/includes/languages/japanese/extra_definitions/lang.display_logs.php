<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piloujp 2024 Aug 30 Modified in v2.1.0-alpha1 $
*/

$define = [
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_DISPLAYLOGS' => 'ログ表示',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_DISPLAYLOGS' => 'Zen Cart ログ ファイルを表示および管理します。',
// Display Logs - configuration
    'CFGTITLE_DISPLAY_LOGS_MAX_DISPLAY' => 'ログ表示： 最大表示',
    'CFGDESC_DISPLAY_LOGS_MAX_DISPLAY' => '表示するログの最大数を指定します。（デフォルト： <b>20</b>）',
    'CFGTITLE_DISPLAY_LOGS_MAX_FILE_SIZE' => 'ログ表示： 最大ファイルサイズ',
    'CFGDESC_DISPLAY_LOGS_MAX_FILE_SIZE' => '表示するファイルの最大サイズを指定します。（デフォルト： <b>80000</b>）',
    'CFGTITLE_DISPLAY_LOGS_INCLUDED_FILES' => 'ログ表示： 含まれるファイルのプレフィックス',
    'CFGDESC_DISPLAY_LOGS_INCLUDED_FILES' => '表示に含めるログ ファイルの <em>プレフィックス</em> をパイプ文字（|）で区切って指定します。間に挟まれたスペースは処理コードによって削除されます。',
    'CFGTITLE_DISPLAY_LOGS_EXCLUDED_FILES' => 'ログ表示： 除外されるファイルプレフィックス',
    'CFGDESC_DISPLAY_LOGS_EXCLUDED_FILES' => '表示から除外するログ ファイルのプレフィックスをパイプ文字 (|) で区切って指定します。間に挟まれたスペースは処理コードによって削除されます。',
];

return $define;

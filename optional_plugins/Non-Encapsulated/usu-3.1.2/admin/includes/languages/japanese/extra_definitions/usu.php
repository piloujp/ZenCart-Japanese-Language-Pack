<?php
/**
 * Part of Ultimate URLs for Zen Cart, v3.1.0+.
 *
 * @copyright Copyright 2019, 2023  Cindy Merkin (vinosdefrutastropicales.com)
 * @copyright Copyright 2013 - 2015 Andrew Ballanger
 * @license http://www.gnu.org/licenses/gpl.txt GNU GPL V3.0
 */
define('BOX_CONFIGURATION_USU', '究極のURL');
define('BOX_CONFIGURATION_USU_UNINSTALL', '究極のURL をアンインストールする');

// Messages used on the configuration page
define('USU_PLUGIN_WARNING_SHORT_WORDS', '<em>短い単語をフィルター</em>設定に入力された値（<b>%s</b>）は正の整数ではありません。設定はデフォルトで <b>0</b> に設定されています。');
define('USU_PLUGIN_WARNING_CATEGORY_DIR', '<em>カテゴリをディレクトリとして表示</em>設定は、<code>full</code>設定が<em>代替 URL 形式</em>の<code>parent</code>設定と互換性がないため、<code>short</code>に変更されました。');
define('USU_PLUGIN_WARNING_FORMAT', '<em>代替 URL の形式</em>の設定は、その <code>parent</code>設定が <code>full</code> の <em>カテゴリをディレクトリとして表示</em>設定と互換性がないため、<code>original</code>に変更されました。');

define('USU_INSTALLED_SUCCESS', BOX_CONFIGURATION_USU . '、v%s が正常にインストールされました。');
define('USU_UPDATED_SUCCESS', BOX_CONFIGURATION_USU . ' が v%1$s から v%2$s に正常に更新されました。');

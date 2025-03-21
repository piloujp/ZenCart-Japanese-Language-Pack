<?php
/**
 * Sitemap XML Feed
 *
 * Last updated: v4.0.2
 *
 * @package Sitemap XML Feed
 * @copyright Copyright 2005-2016 Andrew Berezin eCommerce-Service.com
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @link http://www.sitemaps.org/
 * @version $Id: sitemapxml.php, v 3.8 07.07.2016 12:39:33 AndrewBerezin $
 */
global $current_page;   //- Needed for zc158 since language files are now loaded by a class

$define = [
    'HEADING_TITLE' => 'サイトマップ XML',
    'TEXT_SITEMAPXML_TIPS_HEAD' => 'ヒント',
    'TEXT_SITEMAPXML_TIPS_TEXT' => '<p>このソフトウェアのサイトマップを管理する方法の詳細については、このページを <a href="' . zen_href_link($current_page, zen_get_all_get_params()) . '">再読み込み</a> してください。</p>',
    'TEXT_SITEMAPXML_INSTRUCTIONS_HEAD' => 'サイトマップを作成／更新する',
    'TEXT_SITEMAPXML_CHOOSE_PARAMETERS_REBUILD' => 'すべての sitemap*.xml ファイルを再構築してください。',

    'ERROR_SITEMAPXML_TOKEN_INVALID_HDR' => 'サイトマップを作成できません',
    'ERROR_SITEMAPXML_TOKEN_INVALID_MESSAGE' => '指定した実行トークン（%1$s）に無効な文字が含まれています。',

    'WARNING_SITEMAPXML_FORCE_COOKIE_USE' => '設定 <samp>セッション::Cookie の使用を強制する</samp>を <b>False</b> に変更するまで、検索エンジンはサイトマップをクロールできません。',

    'TEXT_SITEMAPXML_ROBOTS_HDR' => 'サイトの <code>robots.txt</code> ファイル',
    'SUCCESS_SITEMAPXML_ROBOTS_TXT_OK' => 'サイトの <code>robots.txt</code> が検索エンジンを <code>%1$s</code> サイトマップ XML に誘導しています。',
    'WARNING_SITEMAPXML_NO_ROBOTS_FILE' => 'あなたのサイトには <code>robots.txt</code> ファイルがありません。検索エンジンはサイトマップを見つけることができません。',
    'WARNING_SITEMAPXML_NO_ROBOTS_TEXT' => 'サイトの <code>robots.txt</code> ファイルは、検索エンジンにサイトマップ XML ファイルを指定していません。robots.txt ファイルに <code>Sitemap: %1$s</code> を追加することを検討してください。',

    'TEXT_SITEMAPXML_PLUGINS_LIST' => 'サイトマッププラグイン',
    'TEXT_SITEMAPXML_PLUGINS_LIST_SELECT' => '生成するサイトマップを選択',

    'TEXT_SITEMAPXML_FILE_LIST' => 'サイトマップファイルリスト',
    'TEXT_SITEMAPXML_FILE_LIST_TABLE_FNAME' => '名前',
    'TEXT_SITEMAPXML_FILE_LIST_TABLE_FSIZE' => 'サイズ',
    'TEXT_SITEMAPXML_FILE_LIST_TABLE_FTIME' => '最終更新日',
    'TEXT_SITEMAPXML_FILE_LIST_TABLE_FPERMS' => '権限',
    'TEXT_SITEMAPXML_FILE_LIST_TABLE_TYPE' => 'タイプ',
    'TEXT_SITEMAPXML_FILE_LIST_TABLE_ITEMS' => 'アイテム',
    'TEXT_SITEMAPXML_FILE_LIST_TABLE_COMMENTS' => 'コメント',
    'TEXT_SITEMAPXML_FILE_LIST_TABLE_ACTION' => 'アクション',

    'TEXT_SITEMAPXML_IMAGE_POPUP_ALT' => '新しいウィンドウでサイトマップを開く',
    'TEXT_SITEMAPXML_RELOAD_WINDOW' => 'ファイルリストを更新',

    'TEXT_SITEMAPXML_FILE_LIST_COMMENTS_READONLY' => '読み取り専用！！！',
    'TEXT_SITEMAPXML_FILE_LIST_COMMENTS_IGNORED' => '無視',

    'TEXT_SITEMAPXML_FILE_LIST_TYPE_URLSET' => 'URLセット',
    'TEXT_SITEMAPXML_FILE_LIST_TYPE_SITEMAPINDEX' => 'サイトマップインデックス',
    'TEXT_SITEMAPXML_FILE_LIST_TYPE_UNDEFINED' => '未定義！！！',

    'TEXT_ACTION_VIEW_FILE' => '表示',
    'TEXT_ACTION_TRUNCATE_FILE' => '切り捨て',
    'TEXT_ACTION_TRUNCATE_FILE_CONFIRM' => '本当にファイル %s を切り捨てますか？',
    'TEXT_ACTION_DELETE_FILE' => '削除',
    'TEXT_ACTION_DELETE_FILE_CONFIRM' => '本当にファイル %s を削除しますか？',

    'TEXT_MESSAGE_FILE_ERROR_OPENED' => 'ファイル %s を開くときにエラーが発生しました',
    'TEXT_MESSAGE_FILE_TRUNCATED' => 'ファイル %s が切り捨てられました',
    'TEXT_MESSAGE_FILE_DELETED' => 'ファイル %s が削除されました',
    'TEXT_MESSAGE_FILE_ERROR_DELETED' => 'ファイル %s の削除中にエラーが発生しました',
];

if (defined('SITEMAPXML_SITEMAPINDEX')) {
    $sitemapindex_http_link = HTTP_CATALOG_SERVER . DIR_WS_CATALOG . SITEMAPXML_SITEMAPINDEX . '.xml';
    $define['SITEMAPXML_SITEMAPINDEX_HTTP_LINK'] = $sitemapindex_http_link;
    $define['TEXT_SITEMAPXML_TIPS_TEXT'] =
        '<p>サイトマップの詳細については、<strong><a href="https://sitemaps.org/" target="_blank" rel="noopener noreferrer" class="splitPageLink">[Sitemaps.org]</a></strong> をご覧ください。</p>
        <p>サイトマップが生成されたら、それを認識させる必要があります。</p>
        <ol>
            <li>アカウントを登録またはログインしてください：<strong><a href="https://www.google.com/webmasters/tools/home" target="_blank" rel="noopener noreferrer" class="splitPageLink">[Google]</a></strong>、<strong><a href="https://ssl.bing.com/webmaster" target="_blank" rel="noopener noreferrer" class="splitPageLink">[Bing]</a></strong>。</li>
            <li>サイトマップ <code>' . $sitemapindex_http_link . '</code> を検索エンジンの送信インターフェースから送信します <strong><a href="https://www.google.com/webmasters/tools/home" target="_blank" rel="noopener noreferrer" class="splitPageLink">[Google]</a></strong>。</li>
            <li><a href="' . HTTP_CATALOG_SERVER . DIR_WS_CATALOG . 'robots.txt' . '" target="_blank" class="splitPageLink">robots.txt</a> ファイルでサイトマップの場所を指定します（<a href="https://sitemaps.org/protocol.php#submit_robots" target="_blank" rel="noopener noreferrer" class="splitPageLink">詳細...</a>）：<code>サイトマップ：' . $sitemapindex_http_link . '</code></li>
        </ol>
        <p>サイトマップを <em>自動的に</em> 更新するには、ホストのコントロールパネルから Cron ジョブを設定する必要があります。</p>
        <p>生成を cron ジョブとして実行するには（たとえば午前５時）、次の例に似たものを作成する必要があります。</p>
        <samp>0 5 * * * GET \'https://your_domain/index.php?main_page=sitemapxml&amp;rebuild=yes%1$s\'</samp><br>
        <samp>0 5 * * * wget -q \'https://your_domain/index.php?main_page=sitemapxml&amp;rebuild=yes%1$s\' -O /dev/null</samp><br>
        <samp>0 5 * * * curl -s \'https://your_domain/index.php?main_page=sitemapxml&amp;rebuild=yes%1$s\'</samp><br>
        <samp>0 5 * * * php -f &lt;path to shop&gt;/cgi-bin/sitemapxml.php rebuild=yes%2$s</samp><br>';
}
return $define;

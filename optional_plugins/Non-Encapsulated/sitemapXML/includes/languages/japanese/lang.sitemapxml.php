<?php
/**
 * Sitemap XML Feed
 *
 * @package Sitemap XML Feed
 * @copyright Copyright 2005-2015 Andrew Berezin eCommerce-Service.com
 * @copyright Copyright 2003-2015 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @link http://www.sitemaps.org/
 * @version $Id: sitemapxml.php, v 3.8 07.07.2016 12:39:33 AndrewBerezin $
 */
$define = [
    'NAVBAR_TITLE' => 'サイトマップ XML',
    'HEADING_TITLE' => 'SiteMapXML (' . SITEMAPXML_VERSION . ')',

    'TEXT_EXECUTION_TIME' => '合計：実行時間 %s、DB クエリ %s、DB クエリ時間 %s。',
    'TEXT_TOTAL_SITEMAP' => '合計：ファイル %s、項目 %s（%s バイト）、実行時間 %s、DB クエリ %s、DB クエリ時間 %s。',
    'TEXT_FILE_SITEMAP_INFO' => 'ファイル <a href="%s" target="_blank">%s</a>。%s 項目が書き込まれました (%s バイト)、ファイル サイズ： %s バイト',
    'TEXT_WRITTEN' => '%s 項目が書き込まれました（%s バイト）、ファイル サイズ： %s バイト',

    'TEXT_URL_FILE' => 'URL - ',
    'TEXT_INCLUDE_FILE' => '含む ',
    'TEXT_FILE_NOT_CHANGED' => '変更なし - 既存のファイルを使用する',
    'TEXT_FAILED_TO_OPEN' => 'ファイル「%s」を開けませんでした！！！',
    'TEXT_FAILED_TO_CREATE' => 'ファイル「%s」を作成できません。権限を効果的に変更するには、Web ホストのコントロール パネル/ファイル マネージャーを使用する必要がある場合があります。',
    'TEXT_FAILED_TO_CHMOD' => 'ファイル「%s」は読み取り専用です。権限を効果的に変更するには、Web ホストのコントロール パネル/ファイル マネージャーを使用する必要がある場合があります。',

    'TEXT_HEAD_SITEMAP_INDEX' => 'サイトマップインデックス',
    'TEXT_HEAD_SITEMAP_INDEX_NONE' => 'サイトマップ インデックスが生成されませんでした：サイトマップが見つかりません（プラグインが選択されていません）',

    'TEXT_ERROR_CURL_NOT_FOUND' => 'CURL 関数が見つかりません - ping／チェック URL 関数に必要です',
    'TEXT_ERROR_CURL_INIT' => 'cURL エラー：cURL を初期化します',
    'TEXT_ERROR_CURL_EXEC' => 'cURL エラー：「<b>%s</b>」が「%s」を読み込んでいます',
    'TEXT_ERROR_CURL_NO_HTTPCODE' => 'cURL エラー：http_code が「%s」を読み取れません',
    'TEXT_ERROR_CURL_ERR_HTTPCODE' => 'cURL エラー：エラー http_code 「<b>%s</b>」が「%s」を読み取り中',
    'TEXT_ERROR_CURL_0_DOWNLOAD' => 'cURL エラー：「%s」の読み取り時にダウンロードサイズがゼロです',
    'TEXT_ERROR_CURL_ERR_DOWNLOAD' => 'cURL エラー：ページサイズ「%s」未満を読み取っています。ダウンロード = %s、コンテンツの長さ = %s。',

    'TEXT_HEAD_PRODUCTS' => '商品サイトマップ',
    'TEXT_HEAD_CATEGORIES' => 'カテゴリーサイトマップ',
    'TEXT_HEAD_CATS2MAN' => 'カテゴリからメーカーサイトマップ',
    'TEXT_HEAD_MANUFACTURERS' => 'メーカーサイトマップ',
    'TEXT_HEAD_MAINPAGE' => 'メインページ サイトマップ',
    'TEXT_HEAD_EZPAGES' => 'Ezpages サイトマップ',
    'TEXT_HEAD_REVIEWS' => 'レビューサイトマップ',
    'TEXT_HEAD_PRODUCTS_REVIEWS' => '商品レビューサイトマップ',
    'TEXT_HEAD_TESTIMONIALS' => 'お客様の声マネージャーサイトマップ',

    'TEXT_HEAD_NEWS' => 'ニュースサイトマップ',
    'TEXT_HEAD_NEWS_ARTICLES' => 'ニュース記事サイトマップ',

    'TEXT_HEAD_PRODUCTS_VIDEO' => '商品ビデオサイトマップ',

    'TEXT_ERRROR_EZPAGES_OUTOFBASE' => 'EZ ページは無視されました（基本 URL 外）：<b>%s</b>（%s）',
    'TEXT_ERRROR_EZPAGES_ROBOTS' => 'EZ-Page は無視されました（ROBOTS_PAGES_TO_SKIP で見つかりました）：<b>%s</b>（%s）',

    'TEXT_HEAD_BOXNEWS' => 'ニュースボックスマネージャーサイトマップ',
];
return $define;

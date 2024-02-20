<?php
/**
 * Page Template
 *
 * This page is auto-displayed if the configure.php file cannot be read properly.
 * It is intended simply to recommend clicking on the zc_install link to begin installation.
 *
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @license https://www.zen-cart.com/license/2_0.txt GNU Public License v2.0
 * @version $Id: mc12345678 2023 Jul 09 Modified in v2.0.0-alpha1 $
 */
$relPath = (file_exists('includes/templates/template_default/images/logo.gif')) ? '' : '../';
$instPath = (file_exists('zc_install/index.php')) ? 'zc_install/index.php' : (file_exists('../zc_install/index.php') ? '../zc_install/index.php' : '');
$docsPath = (file_exists('docs/index.html')) ? 'docs/index.html' : (file_exists('../docs/index.html') ? '../docs/index.html' : '');
?>
<!DOCTYPE html>
<html <?php echo defined('HTML_PARAMS') ? HTML_PARAMS : '';?>>
  <head>
    <title>System Setup Required</title>
    <meta content="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="authors" content="The Zen Cart&reg; Team and others">
    <meta name="generator" content="shopping cart program by Zen Cart&reg;, http://www.zen-cart.com">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
          background: #fff;
          color: #777;
          font: 16px/1 -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
          font-weight: 200;
          margin: 10px auto;
          padding: 0 2rem;
        }

        h1 {
          font-size: 2.25rem;
          font-weight: 100;
          color: #000;
          letter-spacing: 1px;
          margin: 3rem 0 1.5rem;
        }

        h2 {
          font-size: 2rem;
          border-bottom: 1px solid #e3e3e3;
          font-weight: 300;
          margin: 2.25rem 0 1rem;
          padding: 0.5rem 0 1rem;
        }

        h3 {
          font-size: 1.5rem;
          font-weight: 400;
          color: #606060;
          margin: 1.75rem 0 0.25rem 0;
        }

        h4 {
          font-size: 1.25rem;
          font-weight: 300;
          margin: 1.25rem 0 0.25rem 0;
          color: maroon;
          font-variant: small-caps;
        }

        h5, h6 {
          font-weight: 700;
        }

        h5 {
          font-size: 1.25rem;
        }

        h6 {
          font-size: 1rem;
        }

        h5, h6, ol, p, ul {
          margin: 0 0 1rem 0;
        }

        ul {
          list-style-type: square;
        }

        ol {
          list-style-type: upper-roman;
        }

        ol, p, ul {
          line-height: 1.5;
        }

        ol, ul {
          padding: 0;
        }

        ol li, ul li {
          margin-left: 1.125rem;
        }

        ol.noteList {
          list-style-type: lower-alpha;
          font-size: small;
        }

        ul.noStyle, ol.noStyle {
          list-style-type: none;
        }

        a {
          color: #0080ff;
          font-weight: 300;
          text-decoration: none;
        }

        a:visited {
          color: #0080ff;
        }

        em {
          color: #444;
          font-weight: 500;
          font-style: italic;
        }

        .img-center {
          display: inline-block;
          max-width: 100%;
        }

        .no-left-margin {
          margin-left: 0;
        }

        .errorDetails {
          color: red;
          font-weight: 300;
        }

        .add-shadow {
          -webkit-box-shadow: 4px 10px 41px 0px rgba(161, 161, 161, 0.75);
             -moz-box-shadow: 4px 10px 41px 0px rgba(161, 161, 161, 0.75);
                  box-shadow: 4px 10px 41px 0px rgba(161, 161, 161, 0.75);
        }

        .prime-string {
          font-size: 2.5rem;
          font-weight: bold;
        }

        .bold-string {
          font-weight: bold;
        }

        .small-string, .back-to-top, .appInfo {
          font-size: small;
        }

        .back-to-top, .appInfo {
          text-align: center;
        }

        .back-to-top {
          margin: 2rem 0 2rem 0;
        }

        .back-to-top a {
          text-decoration: none;
        }

        .appInfo {
          margin: 4rem 0 2rem 0;
          color: #888;
        }

        .zenData {
          margin: 2rem 0 0 0;
        }

        @media screen and (min-width: 1200px) {
          body {
            font-size: 1.75rem;
          }
          h2 {
            font-size: 2.25rem;
          }
          h1 {
            font-size: 4.0rem;
            margin-top: 5rem;
          }
        }

        @media screen and (max-width: 1199px) {
          .small-string, .small-string a {
            font-size: 1.20rem;
          }
          .prime-string, .prime-string a {
            font-size: 1.75rem;
            font-weight: 500;
          }
        }

        @media screen and (max-width: 991px) {
          .alert {
            padding: 1rem;
            margin: 1rem 1rem 1rem 1rem;
          }
        }
    </style>
  </head>

  <body>
  <div class="container">
    <img src="<?php echo $relPath; ?>includes/templates/template_default/images/logo.gif" alt="Zen Cart&reg; Header Logo" title="Zen Cart&reg; Header Logo" class="h-img">
    <h1>ゼンカートへようこそ<sup>&reg;</sup></h1>
    <div>
      <h2>このページは１つ以上の理由で表示されています</h2>
      <ol>
        <li>
		  Zen Cart<sup>&reg;</sup>を<strong>初めて使用し</strong>、通常のインストール手順がまだ完了していません。
          <br>
          このような場合は、
          <?php if ($instPath) { ?>
            <a href="<?php echo $instPath; ?>">ここをクリックして</a>ンストールを開始してください。
          <?php } else { ?>
			FTP プログラムを使用して「zc_install」フォルダーをアップロードし、ブラウザーで「zc_install/index.php」を実行する（または、このページをリロードしてリンクを表示する）必要があります。
          <?php } ?>
          <br><br>
        </li>
        <li>
		  Zen Cart<sup>&reg;</sup> を使用するのは<strong>初めてではありません</strong>し、以前に通常のインストール手順を完了していることになります。
          <br>
          これがあなたの場合は...
          <br>
          <ul style='list-style-type:square'>
            <li>
			  <tt><strong>「/includes/configure.php」</strong></tt>および/または<tt><strong>「/admin/includes/configure.php」</strong></tt>ファイルには、無効な<em>パス</em>情報および/または無効な<em>データベース接続情報</em>が含まれています。
            <br>
            </li>
            <li>
              最近、configure.php ファイルを編集した場合、またはサイトを別のフォルダーまたは別のサーバーに移動した場合は、すべての設定を確認し、サーバーの正しい値に更新する必要があります。
              <br>
            </li>
            <li>
              さらに、configure.php ファイルの権限が変更されている場合は、ファイルを読み取るには権限が低すぎる可能性があります。
              <br>
            </li>
            <li>
              または、configure.php ファイルが見つからない可能性があります。
              <br>
            </li>
            <li>
              または、Web ホスティングプロバイダーが最近サーバーの PHP 構成を変更した（またはバージョンをアップグレードした）場合、同様に問題が発生している可能性があります。
              <br>
            </li>
            <li>
			  サポートが必要な場合は、Zen Cart<sup>&reg;</sup> Web サイトの<a href="https://docs.zen-cart.com" rel="noopener" target="_blank">オンライン ドキュメント</a>エリアを参照してください（英語のみ）。
            </li>
          </ul>
        </li>
        <?php if (isset($problemString) && $problemString != '') { ?>
          <br>
          <li>
            追加の<strong>*重要*</strong> の詳細：<span class="errorDetails"><?php echo $problemString; ?></span>
          </li>
        <?php } ?>
      </ol>
    </div>
    <div>
      <h2>インストールを開始するには：</h2>
      <ol>
          <?php if ($docsPath) { ?>
          <li>
            インストール ドキュメントは、<a href="<?php echo $docsPath; ?>">ここをクリック</a>して読むことができます。
          </li>
        <?php } else { ?>
          <li>
			インストール ドキュメントは通常、Zen Cart&reg; 配布ファイル/zip の /docs フォルダーにあります。ドキュメントは、<a href="https://docs.zen-cart.com" rel="noopener" target="_blank">オンライン ヘルプ</a>からも入手できます（英語のみ）。
          </li>
        <?php } ?>
        <?php if ($instPath) { ?>
          <li>
            Web ブラウザで<a href="<?php echo $instPath; ?>">zc_install/index.php</a>に移動します。
          </li>
        <?php } else { ?>
          <li>
			FTP プログラムを使用して「zc_install」フォルダーをアップロードし、ブラウザーで<a href="<?php echo $instPath; ?>">zc_install/index.php</a>を実行する（または、このページをリロードしてリンクを表示する）必要があります。
          </li>
        <?php } ?>
        <li>
		  問題が発生した場合は、Zen Cart<sup>&reg;</sup> Web サイトの<a href="https://docs.zen-cart.com" rel="noopener" target="_blank">オンラインヘルプ</a>エリアを参照してください（英語のみ）。
        </li>
      </ol>
    </div>
    <section id="footerBlock">
      <div class="appInfo">
        <p>
          Zen Cart&reg;由来: Copyright 2003 osCommerce
          <br><br>
          このプログラムは役立つことを期待して配布されていますが、いかなる保証もありません。
          <br>
		  商品性または特定目的への適合性の暗黙の保証はなく、
          <br>
          GNU 一般公衆利用許諾書のバージョン 2 に基づいて再配布可能です。
        <p>
        <p>
          <img src="./docs/osi-certified-120x100.png" alt="O S I Certified">
          <br>
          このソフトウェアは OSI 認定のオープンソース ソフトウェアです。
          <br>
          OSI Certified は、Open Source Initiative の認証マークです。
        <p>
        <p class="zenData">
          Copyright 2003 - <?php echo date('Y'); ?> Zen Ventures, LLC
          <br><br>
          Zen Cart&reg;
          <br>
          <a href="https://www.zen-cart.com" rel="noopener" target="_blank">www.zen-cart.com</a>
        </p>
      </div>
    </section> <!-- End footerBlock //-->
  </div>
  </body>
</html>

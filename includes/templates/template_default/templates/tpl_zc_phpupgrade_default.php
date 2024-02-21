<?php
/**
 * PHP Upgrade Template Page
 *
 * This page is auto-displayed if the PHP version is too old.
 * It's primarily intended to be a friendlier face than just a blank page
 * which would appear if incompatible PHP expectations were triggered.
 * This way someone installing Zen Cart on an ancient PHP version will at least
 * know this basic need and be able to make the change before proceeding.
 *
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @license https://www.zen-cart.com/license/2_0.txt GNU Public License v2.0
 * @version $Id: mc12345678 2023 Jul 09 Modified in v2.0.0-alpha1 $
 */
$relPath = (file_exists('includes/templates/template_default/images/logo.gif')) ? '' : '../';
include 'includes/version.php';
?>
<!DOCTYPE html>
<html <?php echo HTML_PARAMS; ?>>
  <head>
    <title>PHP Version Upgrade Required</title>
    <meta content="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="authors" content="The Zen Cart&reg; Team and others">
    <meta name="generator" content="shopping cart program by Zen Cart&reg;, https://www.zen-cart.com">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
    <img src="<?php echo $relPath; ?>includes/templates/template_default/images/logo.gif" alt="Zen Cart&reg; Header Logo" title="Zen Cart&reg; Header Logo" class="h_image">
    <h1>Zen Cart へようこそ<sup>&reg;</sup></h1>
    <div>
      <h2>Zen Cart をぜひご利用いただきたいのですが、お使いのサーバーには互換性がありません。</h2>
        <p>PHP のバージョン（<?php echo PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION;?>）が古すぎて、必要な最新の PHP 機能をサポートできません。</p>
        <p>現在、Zen Cart バージョン <?php echo PROJECT_VERSION_MAJOR . '.' . PROJECT_VERSION_MINOR; ?> を使用しています。</p>
        <p>Zen Cart を使用するには、PHP バージョンをアップグレードする必要があります。</p>
        <p>サポートされている PHP バージョンについては、<a href="https://www.zen-cart.com/requirements" rel="noopener" target="_blank">Web サイト</a>を参照してください。</p>
        <br><br>
    </div>
    <section id="footerBlock">
      <div class="appInfo">
        <p>
          Zen Cart&reg; 由来: Copyright 2003 osCommerce
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

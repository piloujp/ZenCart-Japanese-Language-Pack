<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piloujp 2024 Oct 16 Modified in v2.1.0-beta1 $
*/

$define = [
    'CFGTITLE_IH_RESIZE' => 'IH による画像のサイズ変更',    'CFGDESC_IH_RESIZE' => '-no- (古い Zen Cart の動作) を選択するか、-yes- を選択して自動サイズ変更と画像キャッシュを有効にします。 --Remarque : Si vous sélectionnez -no-, tous les paramètres d\'image spécifiques au gestionnaire d\'images ne seront pas disponibles, notamment : 画像ファイルの種類、背景色、圧縮、画像ホバー、透かしの選択。 ImageMagick を使用する場合は、「<em>includes/extra_configures/bmz_image_handler_conf.php</em>」 で<strong>変換</strong>実行可能ファイルの場所を指定する必要があります。',
    'CFGTITLE_IH_VERSION' => 'IH版',    'CFGDESC_IH_VERSION' => '現在インストールされている<em>イメージ ハンドラー</em>のバージョンを表示します。',
    'CFGTITLE_IH_CACHE_NAMING' => 'IHキャッシュファイルの命名規則',    'CFGDESC_IH_CACHE_NAMING' => '<br><code>bmz_cache</code> ディレクトリ内のサイズ変更されたイメージに名前を付けるために「<em>イメージ ハンドラー</em>」によって使用されるメソッドを選択します。<br><br><em>Hashed</em>： 「MD5」ハッシュを使用してファイル名を生成します。この方法では、元のファイルを視覚的に識別するのが難しい場合があります。<br><br><em>Readable</em>： これは、<em>IH</em> の新規インストール、またはハードコードされたイメージ リンクを持たないアップグレードされたインストールの場合に適しています。<br><br><em>Mirrored</em>： <em>Readable</em> と似ていますが、「<code>bmz_cache</code>」のディレクトリ構造は元のイメージのサブディレクトリ構造を反映しています。',
];

return $define;

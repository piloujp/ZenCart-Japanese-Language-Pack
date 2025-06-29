<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piloujp 2024 Oct 16 Modified in v2.1.0-beta1 $
*/

$define = [
    'CFGTITLE_IH_RESIZE' => 'IH による画像のサイズ変更',    'CFGDESC_IH_RESIZE' => '-no- (古い Zen Cart の動作) を選択するか、-yes- を選択して自動サイズ変更と画像キャッシュを有効にします。 --Remarque : Si vous sélectionnez -no-, tous les paramètres d\'image spécifiques au gestionnaire d\'images ne seront pas disponibles, notamment : 画像ファイルの種類、背景色、圧縮、画像ホバー、透かしの選択。 ImageMagick を使用する場合は、「<em>includes/extra_configures/bmz_image_handler_conf.php</em>」 で<strong>変換</strong>実行可能ファイルの場所を指定する必要があります。',
    'CFGTITLE_SMALL_IMAGE_FILETYPE' => 'IH 小さな画像ファイルタイプ',
    'CFGDESC_SMALL_IMAGE_FILETYPE' => '-jpg-、-gif-、-png-、-webp- のいずれかを選択します。Internet Explorer の古いバージョン (v6.0 以前) では、透明な領域のある -png- 画像の表示に問題があります。Internet Explorer の古いバージョンをサポートする必要がある場合は、透過性のために -gif- を使用することをお勧めします。ただし、透過性には -png- の方がはるかに優れた形式です。大きい画像には -jpg- または -png- を使用してください。-no_change- は古い Zen-Cart の動作で、小さい画像にはアップロードした画像と同じファイル拡張子を使用します。',
    'CFGTITLE_SMALL_IMAGE_BACKGROUND' => '小さなIH画像の背景',
    'CFGDESC_SMALL_IMAGE_BACKGROUND' => '透明部分のあるアップロード画像を変換した場合、その部分は指定した色になります。透明部分を維持するには -transparent- に設定します。',
    'CFGTITLE_SMALL_IMAGE_QUALITY' => 'IH 小さな画像圧縮品質',
    'CFGDESC_SMALL_IMAGE_QUALITY' => '小さい jpg 画像の希望する画質を、０から１００までの小数値で指定します。値が高いほど画質は良くなりますが、より多くのスペースを必要とします。デフォルトは８５で、特別なニーズがない限りは問題ありません。',
    'CFGTITLE_WATERMARK_SMALL_IMAGES' => 'IH 小さな画像の透かし',
    'CFGDESC_WATERMARK_SMALL_IMAGES' => '透かしのない小さな画像ではなく、透かしの入った小さな画像を表示する場合は、「-yes-」に設定します。',
    'CFGTITLE_MEDIUM_IMAGE_FILETYPE' => 'IH 中画像ファイルタイプ',
    'CFGDESC_MEDIUM_IMAGE_FILETYPE' => '-jpg-、-gif-、-png-、-webp のいずれかを選択します。Internet Explorer の古いバージョン (v6.0 以前) では、透明な領域のある -png- 画像の表示に問題があります。Internet Explorer の古いバージョンをサポートする必要がある場合は、透明性のために -gif- を使用することをお勧めします。ただし、透明性には -png- の方がはるかに優れた形式です。大きい画像には -jpg- または -png- を使用します。-no_change- は古い Zen-Cart の動作で、アップロードされた画像と同じファイル拡張子を中サイズの画像に使用します。',
    'CFGTITLE_MEDIUM_IMAGE_BACKGROUND' => 'IH 中画像の背景',
    'CFGDESC_MEDIUM_IMAGE_BACKGROUND' => '透明部分のあるアップロード画像を変換した場合、その部分は指定した色になります。透明部分を維持するには -transparent- に設定します。',
    'CFGTITLE_MEDIUM_IMAGE_QUALITY' => 'IH 中画像圧縮品質',
    'CFGDESC_MEDIUM_IMAGE_QUALITY' => '中サイズの jpg 画像の希望する画質を、０から１００までの小数値で指定します。値が高いほど画質は良くなりますが、より多くのスペースを必要とします。デフォルトは８５で、特別なニーズがない限りは問題ありません。',
    'CFGTITLE_WATERMARK_MEDIUM_IMAGES' => 'IH 中画像透かし',
    'CFGDESC_WATERMARK_MEDIUM_IMAGES' => '透かしなしの中サイズの画像ではなく、透かし入りの中サイズの画像を表示する場合は、「-yes-」に設定します。',
    'CFGTITLE_LARGE_IMAGE_FILETYPE' => 'IH 大きな画像ファイルタイプ',
    'CFGDESC_LARGE_IMAGE_FILETYPE' => '-jpg-、-gif-、-png-、-webp- のいずれかを選択します。Internet Explorer -v6.0 以前- では、透明な領域のある -png- 画像の表示に問題が発生します。古いバージョンの Internet Explorer をサポートする必要がある場合は、透明性のために -gif- を使用することをお勧めします。ただし、透明性には -png- の方がはるかに優れた形式です。大きい画像には -jpg- または -png- を使用します。-no_change- は古い zen-cart の動作で、大きい画像にはアップロードされた画像と同じファイル拡張子を使用します。',
    'CFGTITLE_LARGE_IMAGE_BACKGROUND' => 'IH 大きな画像の背景',
    'CFGDESC_LARGE_IMAGE_BACKGROUND' => '透明部分のあるアップロード画像を変換した場合、その部分は指定した色になります。透明部分を維持するには -transparent- に設定します。',
    'CFGTITLE_LARGE_IMAGE_QUALITY' => 'IH 大きな画像圧縮品質',
    'CFGDESC_LARGE_IMAGE_QUALITY' => '大きな jpg 画像の希望する画質を、０から１００までの小数値で指定します。値が高いほど画質は良くなりますが、より多くのスペースを必要とします。デフォルトは８５で、特別なニーズがない限りは問題ありません。',
    'CFGTITLE_WATERMARK_LARGE_IMAGES' => 'IH 大きな画像の透かし',
    'CFGDESC_WATERMARK_LARGE_IMAGES' => '透かしのない大きな画像ではなく、透かしのある大きな画像を表示する場合は、「-yes-」に設定します。',
    'CFGTITLE_LARGE_IMAGE_MAX_WIDTH' => 'IH 大きな画像の最大幅',
    'CFGDESC_LARGE_IMAGE_MAX_WIDTH' => '大きな画像の最大幅を指定します。幅と高さが空または０に設定されている場合、大きな画像のサイズ変更は行われません。',
    'CFGTITLE_LARGE_IMAGE_MAX_HEIGHT' => 'IH 大きな画像の最大高さ',
    'CFGDESC_LARGE_IMAGE_MAX_HEIGHT' => '大きな画像の最大の高さを指定します。幅と高さが空または 0 に設定されている場合、大きな画像のサイズ変更は行われません。',
    'CFGTITLE_WATERMARK_GRAVITY' => 'IH 透かし位置',
    'CFGDESC_WATERMARK_GRAVITY' => '画像のキャンバスに対する透かしの位置を選択します。デフォルトは <strong>Center</Strong> です。',
    'CFGTITLE_IH_VERSION' => 'IH 版',    'CFGDESC_IH_VERSION' => '現在インストールされている<em>イメージ ハンドラー</em>のバージョンを表示します。',
    'CFGTITLE_IH_CACHE_NAMING' => 'IHキャッシュファイルの命名規則',    'CFGDESC_IH_CACHE_NAMING' => '<br><code>bmz_cache</code> ディレクトリ内のサイズ変更されたイメージに名前を付けるために「<em>イメージ ハンドラー</em>」によって使用されるメソッドを選択します。<br><br><em>Hashed</em>： 「MD5」ハッシュを使用してファイル名を生成します。この方法では、元のファイルを視覚的に識別するのが難しい場合があります。<br><br><em>Readable</em>： これは、<em>IH</em> の新規インストール、またはハードコードされたイメージ リンクを持たないアップグレードされたインストールの場合に適しています。<br><br><em>Mirrored</em>： <em>Readable</em> と似ていますが、「<code>bmz_cache</code>」のディレクトリ構造は元のイメージのサブディレクトリ構造を反映しています。',
];

return $define;

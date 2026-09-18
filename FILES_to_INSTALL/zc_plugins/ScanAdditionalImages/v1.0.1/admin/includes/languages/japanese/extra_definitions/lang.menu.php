<?php
$define = [
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_SCANADDITIONALIMAGES' => 'データベース用の追加商品画像ファイルをスキャン',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_SCANADDITIONALIMAGES' => 'サーバー上で見つかった追加画像と一致する従来のファイル名パターンを製品にリンクするためのツール。',
    'CFGTITLE_ADDITIONAL_IMAGES_MODE' => '追加画像ファイル名の一致パターン',
    'CFGDESC_ADDITIONAL_IMAGES_MODE' => '「ファイル名マッチングモード」では、次の二つの形式で「_」サフィックスを使用できます：<br>「strict」= 常に「_」サフィックスを使用する<br>「legacy」= サブディレクトリでのみ「_」サフィックスを使用する<br>（v210 より前は legacy がデフォルトでした）<br>デフォルト = strict',
];

return $define;

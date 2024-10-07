<?php
$define = [
    'MODULE_SHIPPING_YAMATO_TEXT_TITLE' => 'ヤマト運輸(宅急便)、１－４日',
    'MODULE_SHIPPING_YAMATO_TEXT_DESCRIPTION' => '宅急便配送設定',
    'MODULE_SHIPPING_YAMATO_TEXT_WAY_NORMAL' => '宅急便、代引きは可能です。',
    'MODULE_SHIPPING_YAMATO_TEXT_WAY_COOL' => 'クール宅急便',
    'MODULE_SHIPPING_YAMATO_TEXT_WAY_TOP' => '超速宅急便',
    'MODULE_SHIPPING_YAMATO_TEXT_NOTAVAILABLE' => 'このサービスは、選択された地域間では提供されません。',
    'MODULE_SHIPPING_YAMATO_TEXT_OVERSIZE' => '重量またはサイズが制限を超えています。',
    'MODULE_SHIPPING_YAMATO_TEXT_ILLEGAL_ZONE' => '指定された都道府県が正しくありません。',
    'MODULE_SHIPPING_YAMATO_TEXT_OUT_OF_AREA' => '配達区域外です。',
//bof constant configuration titles and descriptions for Yamato Shipping
    'CFGTITLE_MODULE_SHIPPING_YAMATO_STATUS' => 'ヤマト運輸(宅急便)の配送を有効にする',
    'CFGDESC_MODULE_SHIPPING_YAMATO_STATUS' => 'ヤマト運輸(宅急便)の配送を提供しますか？',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_HANDLING' => '取扱い手数料',
    'CFGDESC_MODULE_SHIPPING_YAMATO_HANDLING' => '送料に適用する取扱手数料を設定できます。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_MAX_WEIGHT' => '最大出荷重量',
    'CFGDESC_MODULE_SHIPPING_YAMATO_MAX_WEIGHT' => 'この方法で出荷できる最大重量。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_MAX_GIRTH' => '最大出荷胴回り',
    'CFGDESC_MODULE_SHIPPING_YAMATO_MAX_GIRTH' => '封筒の内部容積の３辺の合計の最大値。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_FREE_SHIPPING' => '送料無料設定',
    'CFGDESC_MODULE_SHIPPING_YAMATO_FREE_SHIPPING' => '送料無料設定を有効にしますか？ [合計モジュール]-[送料]-[送料無料設定]を優先する場合は False を選んでください。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_OVER' => '送料を無料にする購入金額設定',
    'CFGDESC_MODULE_SHIPPING_YAMATO_OVER' => '設定金額以上をご購入の場合は送料を無料にします。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_TAX_CLASS' => '税種別',
    'CFGDESC_MODULE_SHIPPING_YAMATO_TAX_CLASS' => '配送料金に適用される税種別を選んでください。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_TAX_BASIS' => '課税標準',
    'CFGDESC_MODULE_SHIPPING_YAMATO_TAX_BASIS' => '配送料はどのような基準で計算されますか。オプションは：<br>配送 - 顧客の配送先住所に基づく<br>請求 - 顧客に基づく 請求先住所<br>ストア - 請求/配送ゾーンがストア ゾーンと等しい場合、ストアの住所に基づく。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_ZONE' => '配送地域',
    'CFGDESC_MODULE_SHIPPING_YAMATO_ZONE' => '配送地域を選択すると選択された地域のみで利用可能となります。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_SORT_ORDER' => '表示の整列順',
    'CFGDESC_MODULE_SHIPPING_YAMATO_SORT_ORDER' => '表示の整列順を設定できます。数字が小さいほど上位に表示されます。',
//eof constant configuration titles and descriptions for Yamato Shipping
];
$GLOBALS['a_yamato_time']=array(
  array('id'=>'希望なし','text'=>'希望なし'),
  array('id'=>'午前中','text'=>'午前中'),
  array('id'=>'１４時～１６時','text'=>'１４時～１６時'),
  array('id'=>'１６時～１８時','text'=>'１６時～１８時'),
  array('id'=>'１８時～２０時','text'=>'１８時～２０時'),
  array('id'=>'１９時～２１時','text'=>'１９時～２１時'),
);
return $define;
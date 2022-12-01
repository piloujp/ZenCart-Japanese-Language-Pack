<?php
$define = [
    'MODULE_SHIPPING_YAMATO_TEXT_TITLE' => 'ヤマト運輸(宅急便)、1-3日',
    'MODULE_SHIPPING_YAMATO_TEXT_DESCRIPTION' => '宅急便の配送料金',
    'MODULE_SHIPPING_YAMATO_TEXT_WAY_NORMAL' => '宅急便、代引きは可能です。',
    'MODULE_SHIPPING_YAMATO_TEXT_WAY_COOL' => 'クール宅急便',
    'MODULE_SHIPPING_YAMATO_TEXT_WAY_TOP' => '超速宅急便',
    'MODULE_SHIPPING_YAMATO_TEXT_NOTAVAILABLE' => 'このサービスは、選択された地域間では提供されません。',
    'MODULE_SHIPPING_YAMATO_TEXT_OVERSIZE' => '重量またはサイズが制限を超えています。',
    'MODULE_SHIPPING_YAMATO_TEXT_ILLEGAL_ZONE' => '指定された都道府県が正しくありません。',
    'MODULE_SHIPPING_YAMATO_TEXT_OUT_OF_AREA' => '配達区域外です。',
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
<?php
$define = [
	'MODULE_SHIPPING_YUPACK_TEXT_TITLE' =>        'ゆうパック、1-3日',
	'MODULE_SHIPPING_YUPACK_TEXT_DESCRIPTION' =>  'ゆうパックの配送料金',
	'MODULE_SHIPPING_YUPACK_TEXT_WAY_NORMAL' =>   '郵便局',
	'MODULE_SHIPPING_YUPACK_TEXT_WAY_COOL' =>     'チルドゆうパック',
	'MODULE_SHIPPING_YUPACK_TEXT_WAY_TOP' =>      '超速宅急便',
	'MODULE_SHIPPING_YUPACK_TEXT_NOTAVAILABLE' => 'このサービスは、選択された地域間では提供されません。',
	'MODULE_SHIPPING_YUPACK_TEXT_OVERSIZE' =>     '重量またはサイズが制限を超えています。',
	'MODULE_SHIPPING_YUPACK_TEXT_ILLEGAL_ZONE' => '指定された都道府県が正しくありません。',
	'MODULE_SHIPPING_YUPACK_TEXT_OUT_OF_AREA' =>  '配達区域外です。',
];
$GLOBALS['a_yupack_time']=array(
  array('id'=>'希望なし','text'=>'希望なし'),
  array('id'=>'午前中','text'=>'午前中'),
  array('id'=>'１２時～１４時','text'=>'１２時～１４時'),
  array('id'=>'１４時～１６時','text'=>'１４時～１６時'),
  array('id'=>'１６時～１８時','text'=>'１６時～１８時'),
  array('id'=>'１８時～２０時','text'=>'１８時～２０時'),
  array('id'=>'２０時～２１時','text'=>'２０時～２１時'),
);
return $define;
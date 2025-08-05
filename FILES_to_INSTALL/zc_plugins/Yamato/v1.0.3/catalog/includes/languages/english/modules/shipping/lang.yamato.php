<?php
$define = [
    'MODULE_SHIPPING_YAMATO_TEXT_TITLE' => 'Yamato Express 1-4 days',
    'MODULE_SHIPPING_YAMATO_TEXT_DESCRIPTION' => 'Yamato Express\' settings',
    'MODULE_SHIPPING_YAMATO_TEXT_WAY_NORMAL' => 'Standard (COD possible)',
    'MODULE_SHIPPING_YAMATO_TEXT_NOTAVAILABLE' => 'Service is not available between the areas.',
    'MODULE_SHIPPING_YAMATO_TEXT_OVERSIZE' => 'Weight or size exceeds limits',
    'MODULE_SHIPPING_YAMATO_TEXT_ILLEGAL_ZONE' => 'Illegal zone.',
    'MODULE_SHIPPING_YAMATO_TEXT_OUT_OF_AREA' => 'Out of delivery area.',
    'MODULE_SHIPPING_YAMATO_TEXT_DIMENSION_MISSING' => 'Error, some product dimension is missing!',
];
$GLOBALS['a_yamato_time']=array(
  array('id'=>'None','text'=>'None'),
  array('id'=>'Morning (until 12)','text'=>'Morning (until 12)'),
  array('id'=>'14h-16h','text'=>'14h-16h'),
  array('id'=>'16h-18h','text'=>'16h-18h'),
  array('id'=>'18h-20h','text'=>'18h-20h'),
  array('id'=>'19h-21h','text'=>'19h-21h'),
);
return $define;
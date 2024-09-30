<?php
$define = [
	'MODULE_SHIPPING_JPPARCELEMS_TEXT_TITLE' =>        '国際スピード郵便',
	'MODULE_SHIPPING_JPPARCELEMS_TEXT_DESCRIPTION' =>  '国際スピード郵便（EMS）による配送料金',
	'MODULE_SHIPPING_JPPARCELEMS_TEXT_WAY_NORMAL' =>   'EMS（４~１０日）',
	'MODULE_SHIPPING_JPPARCELEMS_TEXT_NOTAVAILABLE' => '要求のあったサービスは、選択された地域間では提供されません。',
//bof constant configuration titles and descriptions for jpParcelems Shipping
    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_STATUS' => 'EMS 配送を有効にする',
    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_STATUS' => 'EMS配送を提供したいですか？',
    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_HANDLING' => '取扱い手数料',
    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_HANDLING' => '送料に適用する取扱手数料を設定できます。',
    'CFGTITLE_MODULE_SHIPPING_JPPARCELAIR_MULTIBOX' => 'マルチボックス化を有効にする',
    'CFGDESC_MODULE_SHIPPING_JPPARCELAIR_MULTIBOX' => '制限に達したときに新しい区画を追加しますか？何に基づいて？オプションは次のとおりです。<br>None - マルチボクシングなし<br>Weight - 重量制限に基づく新しいボックス',
    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_MAX_WEIGHT' => '最大出荷重量',
    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_MAX_WEIGHT' => 'この方法で出荷できる最大重量。',
    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_FREE_SHIPPING' => '送料無料設定',
    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_FREE_SHIPPING' => '送料無料設定を有効にしますか？ [合計モジュール]-[送料]-[送料無料設定]を優先する場合は False を選んでください。',
    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_OVER' => '送料を無料にする購入金額設定',
    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_OVER' => '設定金額以上をご購入の場合は送料を無料にします。',
//    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_TAX_CLASS' => '税種別',
//    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_TAX_CLASS' => '配送料金に適用される税種別を選んでください。',
//    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_TAX_BASIS' => '課税標準',
//    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_TAX_BASIS' => '配送料はどのような基準で計算されますか。オプションは：<br>配送 - 顧客の配送先住所に基づく<br>請求 - 顧客に基づく 請求先住所<br>ストア - 請求/配送ゾーンがストア ゾーンと等しい場合、ストアの住所に基づく。',
    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_ZONE' => '配送地域',
    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_ZONE' => '配送地域を選択すると選択された地域のみで利用可能となります。',
    'CFGTITLE_MODULE_SHIPPING_JPPARCELEMS_SORT_ORDER' => '表示の整列順',
    'CFGDESC_MODULE_SHIPPING_JPPARCELEMS_SORT_ORDER' => '表示の整列順を設定できます。数字が小さいほど上位に表示されます。',
//eof constant configuration titles and descriptions for jpParcelems Shipping
];
return $define;
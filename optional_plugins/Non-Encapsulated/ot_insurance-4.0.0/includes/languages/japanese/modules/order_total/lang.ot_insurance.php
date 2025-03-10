<?php
/**
 * Order Total Module
 *
 * @package - Optional Insurance
 * @copyright Copyright 2007 Numinix Technology http://www.numinix.com
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: ot_insurance.php 2 2008-05-13 01:39:19Z numinix $
 */
$define = [
    'MODULE_ORDER_TOTAL_INSURANCE_TITLE' => '配送保険',
    'MODULE_ORDER_TOTAL_INSURANCE_DESCRIPTION' => '配送保険',
    'MODULE_ORDER_TOTAL_INSURANCE_TEXT_ENTER_CODE' => 'この注文に保険をかけますか？',
    'MODULE_ORDER_TOTAL_INSURANCE_ADD' => '保険（%s）を追加しますか？',
    'MODULE_ORDER_TOTAL_INSURANCE_ADD_YES' => 'はい',
    'MODULE_ORDER_TOTAL_INSURANCE_ADD_NO' => 'いいえ',
// Beginning of constant configuration titles and descriptions for order total module ot_insurance
    'CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_STATUS' => '保険モジュールを有効にする',
    'CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_STATUS' => 'このモジュールを有効にしますか？これを完全にオフにするには、このオプションと下のオプションの両方を false に設定する必要があります。',
    'CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_SORT_ORDER' => '並び替え順',
    'CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_SORT_ORDER' => '表示の並べ替え順序。注：小計よりも大きくする必要があります。',
    'CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_TABLE' => 'テーブル料金を使用しますか？',
    'CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_TABLE' => 'テーブル料金を使用しますか？',
    'CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_TYPE' => '代替保険タイプ',
    'CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_TYPE' => '<b>テーブル料金</b>を使用しない場合は、カートの小計のパーセンテージで請求しますか、それとも特定の金額で請求しますか？',
    'CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_PER' => 'パーセンテージ保険',
    'CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_PER' => 'パーセント計算で使用されます。保険金額を計算するためにカートの小計に何パーセントを適用する必要がありますか？',
    'CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_FEE' => '保険料率',
    'CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_FEE' => '金額と<b>表料金</b>の計算に使用されます。<b>増分金額ごと</b>に請求する金額はいくらですか？',
    'CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_INCREMENT' => '増分額',
    'CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_INCREMENT' => '金額と表レートの計算で使用します。<b>保険料率</b>が適用される増分金額を指定します。たとえば、増分金額が <var>100</var> で、レートが <var>.50</var> の場合、保険料は合計の￥１００００ごとに￥５０として計算されます。',
    'CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_OVER' => '手数料免除額',
    'CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_OVER' => '金額計算で使用します。保険計算から免除される合計金額に設定します。つまり、１００未満のすべての注文を免除し、すでに保険をかけている場合は１００に設定します。',
    'CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_TAX_CLASS' => '税区分',
    'CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_TAX_CLASS' => '保険料には以下の税区分を適用します。',
    'CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_VIRTUAL' => '仮想製品には保険料はかかりません',
    'CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_VIRTUAL' => 'カートが仮想製品のみの場合は保険料を請求しません',
    'CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_GV' => 'ギフト券の保険料は無料',
    'CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_GV' => 'カートがギフト券のみの場合は保険料を請求しません',
    'CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_FREE_SHIPPING' => '送料無料で保険料はかかりません',
    'CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_FREE_SHIPPING' => '送料無料の商品（gv および仮想商品を含む）の保険を計算しない',
    'CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_REQUIRED' => '必要保険金額',
    'CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_REQUIRED' => 'X 円を超える金額に対して配送保険を自動的に請求する',
];

global $db;
$geozones = $db->Execute("SELECT * FROM " . TABLE_GEO_ZONES);
$num_zones = $geozones->RecordCount();

for ($i = 1; $i <= $num_zones; $i++) {
    if ($i === 1) {
        $define['CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_ZONE_' . $i] = '保険ゾーン ' . $i;
        $define['CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_ZONE_' . $i] = 'ゾーンが選択されている場合は、そのゾーンに対してのみこの保険を有効にします（注：このフィールドは表外の料金にも使用します）。';
    } else {
        $define['CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_ZONE_' . $i] = '保険ゾーン ' . $i;
        $define['CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_ZONE_' . $i] = 'ゾーンが選択されている場合は、そのゾーンに対してのみこの保険を有効にします。';
    }
    $define['CFGTITLE_MODULE_ORDER_TOTAL_INSURANCE_COST_' . $i] = 'ゾーン ' . $i . ' 保険表';
    $define['CFGDESC_MODULE_ORDER_TOTAL_INSURANCE_COST_' . $i] = '保険料は商品の合計金額に基づきます。例：25:8.50,50:5.50 など。２５までは８.５、５０までは５.５０など。';
}
// eof constant configuration titles and descriptions for order total module ot_insurance

return $define;

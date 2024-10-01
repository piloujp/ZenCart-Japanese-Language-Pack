<?php
$define = [
    'MODULE_ORDER_TOTAL_COUPON_TITLE' => '割引クーポン',
    'MODULE_ORDER_TOTAL_COUPON_HEADER' => TEXT_GV_NAMES . '/割引クーポン',
    'MODULE_ORDER_TOTAL_COUPON_DESCRIPTION' => '割引クーポン',
    'MODULE_ORDER_TOTAL_COUPON_TEXT_ENTER_CODE' => TEXT_GV_REDEEM,
    'MODULE_ORDER_TOTAL_COUPON_REDEEM_INSTRUCTIONS' => '<p>クーポンコードをお持ちの場合は、『引換コード』の入力枠に入力してください。クーポン値引は、下部の「続ける」をクリックした後に合計に対して適用されます。
</p><p>※一度の注文で利用できるクーポンは一つだけです。（クーポンを削除する場合には remove と入力してから「続ける」ボタンを押してください。</p>',
    'MODULE_ORDER_TOTAL_COUPON_TEXT_CURRENT_CODE' => '現在の引換コード: ',
    'TEXT_COMMAND_TO_DELETE_CURRENT_COUPON_FROM_ORDER' => 'REMOVE',
    'TEXT_REMOVE_REDEEM_COUPON' => '割引クーポンの利用を取り消しました。',
    'MODULE_ORDER_TOTAL_COUPON_INCLUDE_ERROR' => ' Setting Include tax = true, should only happen when recalculate = None',
//bof constant configuration titles and descriptions for ot_coupon
    'CFGTITLE_MODULE_ORDER_TOTAL_COUPON_STATUS' => 'このモジュールはインストールされています',
//    'CFGDESC_MODULE_ORDER_TOTAL_COUPON_STATUS' => '',
    'CFGTITLE_MODULE_ORDER_TOTAL_COUPON_SORT_ORDER' => '表示順',
    'CFGDESC_MODULE_ORDER_TOTAL_COUPON_SORT_ORDER' => '表示順を設定します。 最下位が最初に表示されます。',
    'CFGTITLE_MODULE_ORDER_TOTAL_COUPON_INC_SHIPPING' => '送料込み',
    'CFGDESC_MODULE_ORDER_TOTAL_COUPON_INC_SHIPPING' => '計算に配送料を含める。',
    'CFGTITLE_MODULE_ORDER_TOTAL_COUPON_INC_TAX' => '税込',
    'CFGDESC_MODULE_ORDER_TOTAL_COUPON_INC_TAX' => '計算には税金を含めます。',
    'CFGTITLE_MODULE_ORDER_TOTAL_COUPON_CALC_TAX' => '税金を再計算',
    'CFGDESC_MODULE_ORDER_TOTAL_COUPON_CALC_TAX' => '税金の再計算方法。',
    'CFGTITLE_MODULE_ORDER_TOTAL_COUPON_TAX_CLASS' => '税区分',
    'CFGDESC_MODULE_ORDER_TOTAL_COUPON_TAX_CLASS' => '割引クーポンを「クレジット ノート」として扱う場合は、次の税金クラスを使用します。',
//eof constant configuration titles and descriptions for ot_coupon
];

$define['MODULE_ORDER_TOTAL_COUPON_REMOVE_INSTRUCTIONS'] = '<p>割引クーポンの利用を取り消すには「REMOVE」と入力してEnterあるいはReturnキーを押して下さい。</p>';

return $define;

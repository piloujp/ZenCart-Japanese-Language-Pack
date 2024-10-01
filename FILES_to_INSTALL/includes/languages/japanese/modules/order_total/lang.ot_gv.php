<?php
$define = [
    'MODULE_ORDER_TOTAL_GV_TITLE' => TEXT_GV_NAMES,
    'MODULE_ORDER_TOTAL_GV_HEADER' => TEXT_GV_NAMES . '/ギフト券',
    'MODULE_ORDER_TOTAL_GV_DESCRIPTION' => TEXT_GV_NAMES,
    'MODULE_ORDER_TOTAL_GV_USER_PROMPT' => 'ご利用額: ',
    'MODULE_ORDER_TOTAL_GV_TEXT_ENTER_CODE' => TEXT_GV_REDEEM,
    'TEXT_INVALID_REDEEM_AMOUNT' => '入力された適用金額がギフト券残額に合いません。もう一度入力してください。',
    'MODULE_ORDER_TOTAL_GV_USER_BALANCE' => 'ご利用可能残額: ',
    'MODULE_ORDER_TOTAL_GV_REDEEM_INSTRUCTIONS' => '<p>すでにお客様のアカウントに登録済みのギフト券をお使いになるには「ご利用額」の欄にお使いになる金額を入力し、「続ける」ボタンをクリックするとショッピングカートに適用されます</p><p><em>新しい</em>ギフト券を引き換える場合は、引換コードを入力してください。「続ける」ボタンをクリックすると額面がお客様のアカウントに追加されます。</p>',
    'MODULE_ORDER_TOTAL_GV_INCLUDE_ERROR' => ' Setting Include tax = true, should only happen when recalculate = None',
//bof constant configuration titles and descriptions for ot_gv
    'CFGTITLE_MODULE_ORDER_TOTAL_GV_STATUS' => 'このモジュールはインストールされています',
//    'CFGDESC_MODULE_ORDER_TOTAL_GV_STATUS' => '',
    'CFGTITLE_MODULE_ORDER_TOTAL_GV_SORT_ORDER' => '表示順',
    'CFGDESC_MODULE_ORDER_TOTAL_GV_SORT_ORDER' => '表示順を設定します。 最下位が最初に表示されます。',
    'CFGTITLE_MODULE_ORDER_TOTAL_GV_QUEUE' => '購入をキューに入れる',
    'CFGDESC_MODULE_ORDER_TOTAL_GV_QUEUE' => 'ギフト券の購入をキューに入れますか？',
    'CFGTITLE_MODULE_ORDER_TOTAL_GV_SHOW_QUEUE_IN_ADMIN' => '管理者ヘッダーにキューを表示しますか？',
    'CFGDESC_MODULE_ORDER_TOTAL_GV_SHOW_QUEUE_IN_ADMIN' => '管理者のすべてのページにキュー ボタンを表示しますか?<br>（キューに何もない場合は自動的に非表示になり、この設定に関係なく、[注文] 画面に自動的に表示されます）',
    'CFGTITLE_MODULE_ORDER_TOTAL_GV_INC_SHIPPING' => '送料込み',
    'CFGDESC_MODULE_ORDER_TOTAL_GV_INC_SHIPPING' => '割引計算の前に配送料を金額に含めますか？',
    'CFGTITLE_MODULE_ORDER_TOTAL_GV_INC_TAX' => '税込',
    'CFGDESC_MODULE_ORDER_TOTAL_GV_INC_TAX' => '割引計算前の金額に税金を含めますか？',
    'CFGTITLE_MODULE_ORDER_TOTAL_GV_CALC_TAX' => '税金を再計算',
    'CFGDESC_MODULE_ORDER_TOTAL_GV_CALC_TAX' => '税金の再計算方法。',
    'CFGTITLE_MODULE_ORDER_TOTAL_GV_TAX_CLASS' => '税区分',
    'CFGDESC_MODULE_ORDER_TOTAL_GV_TAX_CLASS' => 'ギフト券をクレジットノートとして扱う場合は、次の税金クラスを使用します。',
    'CFGTITLE_MODULE_ORDER_TOTAL_GV_CREDIT_TAX' => '税込クレジット',
    'CFGDESC_MODULE_ORDER_TOTAL_GV_CREDIT_TAX' => 'アカウントに入金する際に、購入したギフト券に税金を追加します。',
    'CFGTITLE_MODULE_ORDER_TOTAL_GV_ORDER_STATUS_ID' => '注文ステータスの設定',
    'CFGDESC_MODULE_ORDER_TOTAL_GV_ORDER_STATUS_ID' => 'GVが全額支払いをカバーする注文のステータスを設定する。',
    'CFGTITLE_MODULE_ORDER_TOTAL_GV_SPECIAL' => 'ギフト券の特別販売を許可する',
    'CFGDESC_MODULE_ORDER_TOTAL_GV_SPECIAL' => 'ギフト券を特別販売できるようにしますか？',
//eof constant configuration titles and descriptions for ot_gv
];

return $define;

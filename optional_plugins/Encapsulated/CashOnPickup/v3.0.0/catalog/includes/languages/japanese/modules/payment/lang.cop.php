<?php
/**
 * Cash on Pickup: storefront and Modules > Payment text.
 *
 * @package  CashOnPickup
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License V2.0
 */

$define = [
    'MODULE_PAYMENT_COP_TEXT_TITLE' => '受け取り時現金払い',
    'MODULE_PAYMENT_COP_TEXT_DESCRIPTION' => 'お客様は、注文品を受け取る際に現金で支払います。この選択肢は、配送方法として「店舗受け取り」が選ばれた場合にのみ、チェックアウト画面に表示されます。',
    'MODULE_PAYMENT_COP_TEXT_NEEDS_STOREPICKUP' => '<br><br><strong>「モジュール」＞「配送」において「店舗受け取り」が有効になっていないため、お客様にはこの決済方法は表示されません。</strong>',
    'MODULE_PAYMENT_COP_TEXT_ALREADY_INSTALLED' => '「受け取り時現金払い」はすでに導入済みです。',
// bof constant configuration titles and descriptions for payment module cop
    'CFGTITLE_MODULE_PAYMENT_COP_STATUS' => '「受け取り時現金払い」モジュールを有効にする',
    'CFGDESC_MODULE_PAYMENT_COP_STATUS' => 'お客様が注文品を受け取る際に、現金での支払いを受け付けますか？この選択肢は、配送方法として「店舗受け取り」が選ばれた場合にのみ、チェックアウト画面に表示されます。',
    'CFGTITLE_MODULE_PAYMENT_COP_ZONE' => '支払い地帯',
    'CFGDESC_MODULE_PAYMENT_COP_ZONE' => '地帯が選択されている場合は、その地帯に対してのみこの支払い方法を有効にしてください。',
    'CFGTITLE_MODULE_PAYMENT_COP_GUEST' => 'ゲストチェックアウトを許可する',
    'CFGDESC_MODULE_PAYMENT_COP_GUEST' => '「ワンページチェックアウト」を利用するゲスト（アカウントを持たない購入者）が、「店頭受取時の現金払い」を選択できるようにしますか？ゲストにはアカウントがないため、この機能はデフォルトでは無効になっています。利用可能にするには、設定を有効にする必要があります。',
    'CFGTITLE_MODULE_PAYMENT_COP_ORDER_STATUS_ID' => '注文ステータスの設定',
    'CFGDESC_MODULE_PAYMENT_COP_ORDER_STATUS_ID' => 'この支払いモジュールで行われた注文のステータスを設定します。',
    'CFGTITLE_MODULE_PAYMENT_COP_SORT_ORDER' => '表示順',
    'CFGDESC_MODULE_PAYMENT_COP_SORT_ORDER' => '表示順を設定します。 最下位が最初に表示されます。',
// eof constant configuration titles and descriptions for payment module cop
];

return $define;

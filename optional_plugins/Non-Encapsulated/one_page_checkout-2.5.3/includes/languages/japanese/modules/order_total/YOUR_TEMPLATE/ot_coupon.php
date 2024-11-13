<?php
/**
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Scott C Wilson 2020 Apr 10 Modified in v1.5.7 $
 */

  define('MODULE_ORDER_TOTAL_COUPON_TITLE', '割引クーポン');
  define('MODULE_ORDER_TOTAL_COUPON_HEADER', TEXT_GV_NAMES . '/割引クーポン');
  define('MODULE_ORDER_TOTAL_COUPON_DESCRIPTION', '割引クーポン');
  define('MODULE_ORDER_TOTAL_COUPON_TEXT_ENTER_CODE', TEXT_GV_REDEEM);

//-bof-one_page_checkout-lat9  *** 1 of 1 ***
if (defined ('CHECKOUT_ONE_ENABLED') && CHECKOUT_ONE_ENABLED === 'true') {
  define('MODULE_ORDER_TOTAL_COUPON_REDEEM_INSTRUCTIONS', '<p>下の割引コード ボックスにクーポン コードを入力してください。右側のボタンをクリックするか、注文を送信すると、クーポンが合計金額に適用され、注文の表示に反映されます。注意： 注文ごとに１つのクーポンのみ使用できます。</p>');
} else {
  define('MODULE_ORDER_TOTAL_COUPON_REDEEM_INSTRUCTIONS', '<p>クーポン コードを下の割引コード ボックスに入力してください。クーポンは合計金額に適用され、[続行] をクリックするとカートに反映されます。注意：１回の注文につきクーポンは１つしか使用できません。</p>');
}
//-eof-one_page_checkout-lat9  *** 1 of 1 ***

  define('MODULE_ORDER_TOTAL_COUPON_TEXT_CURRENT_CODE', '現在の引き換えコード： ');
  define('TEXT_COMMAND_TO_DELETE_CURRENT_COUPON_FROM_ORDER', 'REMOVE');
  define('MODULE_ORDER_TOTAL_COUPON_REMOVE_INSTRUCTIONS', '<p>この注文から割引クーポンを削除するには、クーポン コードを次のコードに置き換えます： ' . TEXT_COMMAND_TO_DELETE_CURRENT_COUPON_FROM_ORDER . '</p>');
  define('TEXT_REMOVE_REDEEM_COUPON', 'リクエストにより割引クーポンが削除されました！');
  define('MODULE_ORDER_TOTAL_COUPON_INCLUDE_ERROR', '税込み価格 = true の設定は、再計算 = None の場合にのみ発生します。');

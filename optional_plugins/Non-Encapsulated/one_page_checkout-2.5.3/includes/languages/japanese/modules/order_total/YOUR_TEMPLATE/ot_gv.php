<?php
/**
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Scott C Wilson 2019 Jul 20 Modified in v1.5.7 $
 */

  define('MODULE_ORDER_TOTAL_GV_TITLE', TEXT_GV_NAMES);
  define('MODULE_ORDER_TOTAL_GV_HEADER', TEXT_GV_NAMES . '/割引券');
  define('MODULE_ORDER_TOTAL_GV_DESCRIPTION', TEXT_GV_NAMES);
  define('MODULE_ORDER_TOTAL_GV_USER_PROMPT', '適用量： ');
  define('MODULE_ORDER_TOTAL_GV_TEXT_ENTER_CODE', TEXT_GV_REDEEM);
  define('TEXT_INVALID_REDEEM_AMOUNT', '適用しようとした金額とギフト券の残高が一致していないようです。もう一度お試しください。');
  define('MODULE_ORDER_TOTAL_GV_USER_BALANCE', '利用可能残高： ');
  
//-bof-one_page_checkout-lat9  *** 1 of 1 ***
if (defined('CHECKOUT_ONE_ENABLED') && CHECKOUT_ONE_ENABLED == 'true') {
  define('MODULE_ORDER_TOTAL_GV_REDEEM_INSTRUCTIONS', '<p>すでにアカウントにあるギフト券の資金を使用するには、「金額を適用」というボックスに適用したい金額を入力します。支払い方法を選択し、ページの下部にある送信ボタンをクリックして、注文に資金を適用する必要があります。<em>新しい</em>ギフト券を利用する場合は、「割引コード」の横にあるボックスに番号を入力してください。右側のボタンをクリックすると、利用した金額がアカウントに追加されます。</p>');
} else {
  define('MODULE_ORDER_TOTAL_GV_REDEEM_INSTRUCTIONS', '<p>すでにアカウントにあるギフト券の資金を使用するには、「金額を適用」というボックスに適用したい金額を入力します。支払い方法を選択し、「続行」ボタンをクリックして資金をショッピング カートに適用します。<em>新しい</em>ギフト券を利用する場合は、「引き換えコード」の横のボックスに番号を入力してください。「続行」ボタンをクリックすると、引き換えた金額がアカウントに追加されます。</p>');
}
//-eof-one_page_checkout-lat9  *** 1 of 1 ***
  define('MODULE_ORDER_TOTAL_GV_INCLUDE_ERROR', ' 税込み価格 = true の設定は、再計算 = None の場合にのみ発生します。');

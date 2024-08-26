<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Scott C Wilson 2022 Jul 22 Modified in v1.5.8-alpha2 $
*/

$define = [
    'HEADING_TITLE' => 'クーポン券の商品/カテゴリ別の利用制限設定',
    'HEADING_TITLE_CATEGORY' => 'カテゴリ別の利用制限',
    'HEADING_TITLE_PRODUCT' => '商品別の利用制限',
    'SUB_HEADING_COUPON_NAME' => 'クーポン券 &quot;%1$s&quot; [%2$u] への利用制限',  //-%1$s = coupon-name, %2$u = coupon_id
    'TABLE_HEADING_CATEGORY_ID' => 'カテゴリ ID',
    'TABLE_HEADING_CATEGORY_NAME' => 'カテゴリ名',
    'TABLE_HEADING_PRODUCT_ID' => '商品 ID',
    'TABLE_HEADING_RESTRICT' => '利用制限',
    'TABLE_HEADING_RESTRICT_REMOVE' => '削除',
    'IMAGE_REMOVE' => 'この利用制限を削除',
    'TEXT_ALL_CATEGORIES' => '全カテゴリ',
    'TEXT_ALL_PRODUCTS_ADD' => 'カテゴリ内の全商品を追加する',
    'TEXT_ALL_PRODUCTS_REMOVE' => 'カテゴリ内の全商品を削除する',
    'TEXT_INFO_ADD_DENY_ALL' => '<strong>『カテゴリ内の全商品を追加する』を選択した場合、指定されたカテゴリ内の、まだ制限が設定されていない商品だけが、選択された許可状態で追加されます。<br />『カテゴリ内の全商品を削除する』を選択した場合、指定されたカテゴリ内の商品のうち、許可、もしくは不許可の商品だけが削除されます。</strong>',
    'ERROR_DISCOUNT_COUPON_DEFINED_CATEGORY' => 'カテゴリは適用できませんでした。',
    'ERROR_DISCOUNT_COUPON_DEFINED_PRODUCT' => '商品は適用できませんでした。',
    'HEADER_MANUFACTURER_NAME' => '<br> -- OR -- <br>' . 'メーカー名: ',
    'TEXT_ALL_MANUFACTURERS_ADD' => 'すべてのメーカー商品を追加する',
    'TEXT_ALL_MANUFACTURERS_REMOVE' => 'すべてのメーカー商品を削除する',
    'ERROR_RESET_CATEGORY_MANUFACTURER' => 'カテゴリとメーカーによるフィルタがリセットされました。両方同時に指定することは出来ません。',
    'TEXT_PULLDOWN_ALLOW' => '許可',
    'TEXT_PULLDOWN_DENY' => '不許可',
    'TEXT_SUBMIT_CATEGORY_ADD' => '追加',
    'TEXT_SUBMIT_PRODUCT_UPDATE' => '更新',
    'TEXT_STATUS_TOGGLE' => 'トグル切替',
    'TEXT_STATUS_TOGGLE_TITLE' => 'クリックする都度、制限のステータスが切り替わります',
    'TEXT_ALLOWED' => '利用を許可する商品またはカテゴリ',
    'TEXT_DENIED' => '利用を許可しない商品またはカテゴリ',
    'TEXT_NO_CATEGORY_RESTRICTIONS' => 'カテゴリへの利用制限は有りません',
    'TEXT_NO_PRODUCT_RESTRICTIONS' => '商品への利用制限は有りません',
];

return $define;

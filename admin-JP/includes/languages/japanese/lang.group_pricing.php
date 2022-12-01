<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: torvista 2022 Feb 14 New in v1.5.8-alpha $
*/

$define = [
    'HEADING_TITLE' => '割引顧客グループの管理',
    'TABLE_HEADING_GROUP_NAME' => 'グループ名',
    'TABLE_HEADING_GROUP_AMOUNT' => '割引率(%)',
    'TEXT_HEADING_NEW_PRICING_GROUP' => '新しい割引顧客グループ',
    'TEXT_HEADING_EDIT_PRICING_GROUP' => '割引顧客グループを編集',
    'TEXT_HEADING_DELETE_PRICING_GROUP' => '割引顧客グループを削除',
    'TEXT_NEW_INTRO' => '新しいグループについての情報を入力してください',
    'TEXT_DELETE_INTRO' => 'このグループを本当に削除しますか?',
    'TEXT_DELETE_PRICING_GROUP' => 'この割引顧客グループを削除しますか？',
    'TEXT_DELETE_WARNING_GROUP_MEMBERS' => '<b>警告:</b> %s人の顧客がこのカテゴリーにまだリンクしています。',
    'TEXT_GROUP_PRICING_NAME' => 'グループ名: ',
    'TEXT_GROUP_PRICING_AMOUNT' => '割引率(%): ',
    'TEXT_CUSTOMERS' => 'グループ内の顧客数:',
    'ERROR_GROUP_PRICING_CUSTOMERS_EXIST' => 'エラー: 顧客がまだこのグループに残っています。このグループにいるメンバーを確認し、本当に消去していいのか確認してください',
    'ERROR_MODULE_NOT_CONFIGURED' => '注意: 割引顧客グループの定義が存在しますが、まだのモジュールが有効になっていません。<br>管理画面＞モジュール＞OrderTotal＞メンバーの割引（もしくは割引顧客グループ）をからインストールするか、設定を行ってください',
];

return $define;

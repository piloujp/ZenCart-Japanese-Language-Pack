<?php
/*
 * This file is part of the "Onetime Discount" order total module for Zen Cart.
 *
 * "Onetime Discount" is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation version 2 of the License.
 *
 * "Onetime Discount" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with "Onetime Discount". If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU GPL V2.0
 * @author Andrew Ballanger
 */
$define = [
    'MODULE_ORDER_TOTAL_ONETIME_DISCOUNT_TITLE' => 'ワンタイム割引',
    'MODULE_ORDER_TOTAL_ONETIME_DISCOUNT_DESCRIPTION' => '注文に１回限りの割引が適用されます',
// bof constant configuration titles and descriptions for ot_onetime_discount
    'CFGTITLE_MODULE_ORDER_TOTAL_ONETIME_DISCOUNT_STATUS' => 'このモジュールはインストールされています。',
    'CFGDESC_MODULE_ORDER_TOTAL_ONETIME_DISCOUNT_STATUS' => '',
    'CFGTITLE_MODULE_ORDER_TOTAL_ONETIME_DISCOUNT_SORT_ORDER' => '表示順',
    'CFGDESC_MODULE_ORDER_TOTAL_ONETIME_DISCOUNT_SORT_ORDER' => '表示順を設定します。',
    'CFGTITLE_MODULE_ORDER_TOTAL_ONETIME_DISCOUNT_CHANGE_TITLE' => 'タイトルの変更を許可する',
    'CFGDESC_MODULE_ORDER_TOTAL_ONETIME_DISCOUNT_CHANGE_TITLE' => '注文の編集時にモジュールのタイトルを変更できるようにする',
    'CFGTITLE_MODULE_ORDER_TOTAL_ONETIME_DISCOUNT_DEDUCTION_ONLY' => '控除のみを有効にしますか？',
    'CFGDESC_MODULE_ORDER_TOTAL_ONETIME_DISCOUNT_DEDUCTION_ONLY' => 'このモジュールは、注文金額からの<em>減額のみ</em>を行うようにすべきでしょうか？<b>true</b>に設定すると、入力された値（正・負を問わず）は注文金額から差し引かれます。一方、そうでない場合は、このモジュールを使用して注文金額への加算と減額の両方を行うことができます。デフォルト：<em>true</em>。',
// eof constant configuration titles and descriptions for ot_onetime_discount
];

return $define;

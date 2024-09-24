<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2024 May 27 Modified in v2.1.0-alpha1 $
*/

$define = [
    'HEADING_TITLE_MODULES_PAYMENT' => '支払いモジュールの設定',
    'HEADING_TITLE_MODULES_SHIPPING' => '配送モジュールの設定',
    'HEADING_TITLE_MODULES_ORDER_TOTAL' => '注文合計モジュールの設定',
    'TABLE_HEADING_ORDERS_STATUS' => '注文ステータス',
    'TEXT_MODULE_DIRECTORY' => 'モジュールディレクトリ:',
    'ERROR_MODULE_FILE_NOT_FOUND' => 'エラー：対応する言語ファイルが存在していないため、モジュールを読み込むことができませんでした：',
    'TEXT_EMAIL_SUBJECT_ADMIN_SETTINGS_CHANGED' => '警告：オンラインストアの管理設定が変更されました。',
    'TEXT_EMAIL_MESSAGE_ADMIN_SETTINGS_CHANGED' => 'このメールは、Zen Cartの管理画面にて設定変更を行った際に送られる自動送信メールです: ' . "\n\n" . '注意: 管理画面の [%1$s] モジュールの設定が、Zen Cartのadminユーザー%2$sによって変更されました。' . "\n\n" . 'もし、この変更に記憶がなかった場合は、すぐに設定を変更された方がいいでしょう。' . "\n\n" . 'この変更が周知のことであれば、このメールは無視しても構いません。',
    'TEXT_EMAIL_MESSAGE_ADMIN_MODULE_INSTALLED' => 'このメールは、Zen Cartの管理画面にて設定変更を行った際に送られる自動送信メールです: ' . "\n\n" . '注意: 管理画面の設定が変更されました。[%1$s] モジュールがZen Cartのadminユーザー%2$sによってインストールされました。' . "\n\n" . 'もし、この変更に記憶がなかった場合は、すぐに設定を変更された方がいいでしょう。' . "\n\n" . 'この変更が周知のことであれば、このメールは無視しても構いません。',
    'TEXT_EMAIL_MESSAGE_ADMIN_MODULE_REMOVED' => 'このメールは、Zen Cartの管理画面にて設定変更を行った際に送られる自動送信メールです: ' . "\n\n" . '注意: 管理画面の設定が変更されました。 [%1$s] モジュールがZen Cartのadminユーザー%2$sによってアンインストールされました。' . "\n\n" . 'もし、この変更に記憶がなかった場合は、すぐに設定を変更された方がいいでしょう。' . "\n\n" . 'この変更が周知のことであれば、このメールは無視しても構いません。',
    'TEXT_DELETE_INTRO' => 'このモジュールをアンインストールしてもよろしいでしょうか？',
    'TEXT_WARNING_SSL_EDIT' => '警告：<a href="https://docs.zen-cart.com/user/installing/enable_ssl/"target="_blank">セキュリティ上の理由により、管理画面がSSL対応するまで、このモジュールに対する編集が無効になっています。</a>.',
    'TEXT_WARNING_SSL_INSTALL' => 'ALERT: <a href="https://docs.zen-cart.com/user/installing/enable_ssl/" target="_blank">セキュリティ上の理由により、管理画面がSSL対応するまで、このモジュールは無効になっています。',
    'TEXT_POSITIVE_INT' => '%s は、0 以上の整数値でなければなりません',
    'TEXT_POSITIVE_FLOAT' => '%s は、0以上の少数値でなければなりません',
//bof constant configuration titles and descriptions for Yamato Shipping
    'CFGTITLE_MODULE_SHIPPING_YAMATO_STATUS' => 'ヤマト運輸(宅急便)の配送を有効にする',
    'CFGDESC_MODULE_SHIPPING_YAMATO_STATUS' => 'ヤマト運輸(宅急便)の配送を提供しますか？',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_HANDLING' => '取扱い手数料',
    'CFGDESC_MODULE_SHIPPING_YAMATO_HANDLING' => '送料に適用する取扱手数料を設定できます。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_MAX_WEIGHT' => '最大出荷重量',
    'CFGDESC_MODULE_SHIPPING_YAMATO_MAX_WEIGHT' => 'この方法で出荷できる最大重量。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_MAX_GIRTH' => '最大出荷胴回り',
    'CFGDESC_MODULE_SHIPPING_YAMATO_MAX_GIRTH' => 'この方法で発送できる最大サイズ（胴回り）です。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_FREE_SHIPPING' => '送料無料設定',
    'CFGDESC_MODULE_SHIPPING_YAMATO_FREE_SHIPPING' => '送料無料設定を有効にしますか？ [合計モジュール]-[送料]-[送料無料設定]を優先する場合は False を選んでください。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_OVER' => '送料を無料にする購入金額設定',
    'CFGDESC_MODULE_SHIPPING_YAMATO_OVER' => '設定金額以上をご購入の場合は送料を無料にします。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_TAX_CLASS' => '税種別',
    'CFGDESC_MODULE_SHIPPING_YAMATO_TAX_CLASS' => '配送料金に適用される税種別を選んでください。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_TAX_BASIS' => '課税標準',
    'CFGDESC_MODULE_SHIPPING_YAMATO_TAX_BASIS' => '配送料はどのような基準で計算されますか。オプションは：<br>配送 - 顧客の配送先住所に基づく<br>請求 - 顧客に基づく 請求先住所<br>ストア - 請求/配送ゾーンがストア ゾーンと等しい場合、ストアの住所に基づく。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_ZONE' => '配送地域',
    'CFGDESC_MODULE_SHIPPING_YAMATO_ZONE' => '配送地域を選択すると選択された地域のみで利用可能となります。',
    'CFGTITLE_MODULE_SHIPPING_YAMATO_SORT_ORDER' => '表示の整列順',
    'CFGDESC_MODULE_SHIPPING_YAMATO_SORT_ORDER' => '表示の整列順を設定できます。数字が小さいほど上位に表示されます。',
//eof constant configuration titles and descriptions for Yamato Shipping
//bof constant configuration titles and descriptions for Sagawa Shipping
    'CFGTITLE_MODULE_SHIPPING_SAGAWA_STATUS' => '佐川急便の配送を有効にする',
    'CFGDESC_MODULE_SHIPPING_SAGAWA_STATUS' => '佐川急便の配送を提供しますか？',
    'CFGTITLE_MODULE_SHIPPING_SAGAWA_HANDLING' => '取扱い手数料',
    'CFGDESC_MODULE_SHIPPING_SAGAWA_HANDLING' => '送料に適用する取扱手数料を設定できます。',
    'CFGTITLE_MODULE_SHIPPING_SAGAWA_MAX_WEIGHT' => '最大出荷重量',
    'CFGDESC_MODULE_SHIPPING_SAGAWA_MAX_WEIGHT' => 'この方法で出荷できる最大重量。',
    'CFGTITLE_MODULE_SHIPPING_SAGAWA_MAX_GIRTH' => '最大出荷胴回り',
    'CFGDESC_MODULE_SHIPPING_SAGAWA_MAX_GIRTH' => 'この方法で発送できる最大サイズ（胴回り）です。',
    'CFGTITLE_MODULE_SHIPPING_SAGAWA_FREE_SHIPPING' => '送料無料設定',
    'CFGDESC_MODULE_SHIPPING_SAGAWA_FREE_SHIPPING' => '送料無料設定を有効にしますか？ [合計モジュール]-[送料]-[送料無料設定]を優先する場合は False を選んでください。',
    'CFGTITLE_MODULE_SHIPPING_SAGAWA_OVER' => '送料を無料にする購入金額設定',
    'CFGDESC_MODULE_SHIPPING_SAGAWA_OVER' => '設定金額以上をご購入の場合は送料を無料にします。',
    'CFGTITLE_MODULE_SHIPPING_SAGAWA_TAX_CLASS' => '税種別',
    'CFGDESC_MODULE_SHIPPING_SAGAWA_TAX_CLASS' => '配送料金に適用される税種別を選んでください。',
    'CFGTITLE_MODULE_SHIPPING_SAGAWA_TAX_BASIS' => '課税標準',
    'CFGDESC_MODULE_SHIPPING_SAGAWA_TAX_BASIS' => '配送料はどのような基準で計算されますか。オプションは：<br>配送 - 顧客の配送先住所に基づく<br>請求 - 顧客に基づく 請求先住所<br>ストア - 請求/配送ゾーンがストア ゾーンと等しい場合、ストアの住所に基づく。',
    'CFGTITLE_MODULE_SHIPPING_SAGAWA_ZONE' => '配送地域',
    'CFGDESC_MODULE_SHIPPING_SAGAWA_ZONE' => '配送地域を選択すると選択された地域のみで利用可能となります。',
    'CFGTITLE_MODULE_SHIPPING_SAGAWA_SORT_ORDER' => '表示の整列順',
    'CFGDESC_MODULE_SHIPPING_SAGAWA_SORT_ORDER' => '表示の整列順を設定できます。数字が小さいほど上位に表示されます。',
//eof constant configuration titles and descriptions for Sagawa Shipping
//bof constant configuration titles and descriptions for YuPack Shipping
    'CFGTITLE_MODULE_SHIPPING_YUPACK_STATUS' => 'ゆうパック配送を有効にする',
    'CFGDESC_MODULE_SHIPPING_YUPACK_STATUS' => 'ゆうパック運輸(宅急便)の配送を提供しますか？',
    'CFGTITLE_MODULE_SHIPPING_YUPACK_HANDLING' => '取扱い手数料',
    'CFGDESC_MODULE_SHIPPING_YUPACK_HANDLING' => '送料に適用する取扱手数料を設定できます。',
    'CFGTITLE_MODULE_SHIPPING_YUPACK_MAX_WEIGHT' => '最大出荷重量',
    'CFGDESC_MODULE_SHIPPING_YUPACK_MAX_WEIGHT' => 'この方法で出荷できる最大重量。',
    'CFGTITLE_MODULE_SHIPPING_YUPACK_MAX_GIRTH' => '最大出荷胴回り',
    'CFGDESC_MODULE_SHIPPING_YUPACK_MAX_GIRTH' => 'この方法で発送できる最大サイズ（胴回り）です。',
    'CFGTITLE_MODULE_SHIPPING_YUPACK_FREE_SHIPPING' => '送料無料設定',
    'CFGDESC_MODULE_SHIPPING_YUPACK_FREE_SHIPPING' => '送料無料設定を有効にしますか？ [合計モジュール]-[送料]-[送料無料設定]を優先する場合は False を選んでください。',
    'CFGTITLE_MODULE_SHIPPING_YUPACK_OVER' => '送料を無料にする購入金額設定',
    'CFGDESC_MODULE_SHIPPING_YUPACK_OVER' => '設定金額以上をご購入の場合は送料を無料にします。',
    'CFGTITLE_MODULE_SHIPPING_YUPACK_TAX_CLASS' => '税種別',
    'CFGDESC_MODULE_SHIPPING_YUPACK_TAX_CLASS' => '配送料金に適用される税種別を選んでください。',
    'CFGTITLE_MODULE_SHIPPING_YUPACK_TAX_BASIS' => '課税標準',
    'CFGDESC_MODULE_SHIPPING_YUPACK_TAX_BASIS' => '配送料はどのような基準で計算されますか。オプションは：<br>配送 - 顧客の配送先住所に基づく<br>請求 - 顧客に基づく 請求先住所<br>ストア - 請求/配送ゾーンがストア ゾーンと等しい場合、ストアの住所に基づく。',
    'CFGTITLE_MODULE_SHIPPING_YUPACK_ZONE' => '配送地域',
    'CFGDESC_MODULE_SHIPPING_YUPACK_ZONE' => '配送地域を選択すると選択された地域のみで利用可能となります。',
    'CFGTITLE_MODULE_SHIPPING_YUPACK_SORT_ORDER' => '表示の整列順',
    'CFGDESC_MODULE_SHIPPING_YUPACK_SORT_ORDER' => '表示の整列順を設定できます。数字が小さいほど上位に表示されます。',
//eof constant configuration titles and descriptions for YuPack Shipping
];

return $define;

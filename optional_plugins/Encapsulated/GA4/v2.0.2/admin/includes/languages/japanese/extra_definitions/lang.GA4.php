<?php
/**
 * @copyright Copyright 2003-2025 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piloujp 2025 Feb 19 Modified in v2.1.0 $
*/

$define = [
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_GA4' => 'Google アナリティクス GA4',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_GA4' => 'レポート用の Google アナリティクス ４ へのリンク',
// Admin configuration
    'CFGTITLE_GA4_ANALYTICS_VERSION' => 'プラグインバージョン',
    'CFGDESC_GA4_ANALYTICS_VERSION' => 'インストールされた <em>GA4 アナリティクス</em>バージョン。',
    'CFGTITLE_GA4_ANALYTICS_TRACKING_ID' => 'GA4 アナリティクス測定 ID',
    'CFGDESC_GA4_ANALYTICS_TRACKING_ID' => '<br>Google にサイトを登録したときに提供された GA4 アナリティクスの <em>測定 ID</em> または Google タグ マネージャーの <em>コンテナ ID</em> を入力します。GA4 ID は <code>G-</code> で始まり、GTM ID は <code>GTM-</code> で始まります。この値を空の文字列（デフォルト）に設定すると、<em>GA4 アナリティクス</em>プラグインが無効になります。<br>',
    'CFGTITLE_GA4_ANALYTICS_VARIANT_SEPARATOR' => '商品バリエーションのセパレーター',
    'CFGDESC_GA4_ANALYTICS_VARIANT_SEPARATOR' => 'ストアに複数の属性を持つ商品がある場合は、属性付き商品の <code>item_variant</code> プロパティの区切り文字として使用する文字列を指定します。デフォルト：<code>|</code>。<br>',
    'CFGTITLE_GA4_ANALYTICS_DEBUG_MODE' => 'デバッグモードを有効にしますか？',
    'CFGDESC_GA4_ANALYTICS_DEBUG_MODE' => '<b>すべての</b> GA4 イベントをデバッグ モードで送信しますか? これは、GA4 インストールのデバッグに役立ちます。デフォルト: <b>false</b>。',
    'CFGTITLE_GA4_ANALYTICS_ITEM_ID_VALUE' => '<code>item_id</code>パラメータ値を選択',
    'CFGDESC_GA4_ANALYTICS_ITEM_ID_VALUE' => '<br>GA4 イベントに商品が含まれている場合、<code>item_id</code> パラメータにはどのような値を使用する必要がありますか？<code>products_id</code> を選択した場合、商品のモデル（その値が空でない場合）が、以下で指定したフィールド名に配置されます。デフォルト：<code>products_model</code>。',
    'CFGTITLE_GA4_ANALYTICS_DEBUG_IP_LIST' => 'デバッグモード、IP リスト',
    'CFGDESC_GA4_ANALYTICS_DEBUG_IP_LIST' => '特定の IP アドレスに対してのみデバッグモードを有効にする場合は、カンマ区切りのリスト（間にスペースを入れてもかまいません）を使用して、ここでそれらの IP アドレスを入力します。このフィールドを空のままにしておくと（デフォルト）、デバッグモードは<b>すべての</b> IP アドレスに適用されます。<br>',
    'CFGTITLE_GA4_ANALYTICS_ITEM_MODEL_FIELD' => '<code>products_model</code>フィールド名を選択します',
    'CFGDESC_GA4_ANALYTICS_ITEM_MODEL_FIELD' => '上記の設定で <code>products_id</code> を選択した場合は、製品モデルを配置するイベント フィールドの名前を指定します。デフォルト（<code>ep.item_model</code>）は、Google 管理コンソールで「表示が困難」になる可能性があります。組み込みの GA4 フィールドを再利用する代替案としては、<code>item_list_id</code> と <code>item_list_name</code> があります。<br>',
];

return $define;

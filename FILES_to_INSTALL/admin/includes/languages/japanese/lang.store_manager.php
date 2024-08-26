<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Scott C Wilson 2022 Jan 11 New in v1.5.8-alpha $
*/

$define = [
    'HEADING_TITLE' => 'ショップ管理者用ツール',
    'SUCCESS_PRODUCT_UPDATE_SORT_ALL' => '<strong>成功</strong>: 属性の並び順を更新しました',
    'SUCCESS_PRODUCT_UPDATE_PRODUCTS_PRICE_SORTER' => '<strong>成功</strong>: 商品価格のソート値を更新しました。',
    'SUCCESS_PRODUCT_UPDATE_PRODUCTS_VIEWED' => '<strong>成功</strong>: 「商品の閲覧回数ランキング」を0にリセットしました',
    'SUCCESS_PRODUCT_UPDATE_PRODUCTS_ORDERED' => '<strong>Successful</strong> 商品の順番をゼロのリセット',
    'SUCCESS_UPDATE_ALL_MASTER_CATEGORIES_ID' => '<strong>成功</strong>: リンクされた商品のためのマスターカテゴリをリセットしました',
    'SUCCESS_UPDATE_COUNTER' => '<strong>成功</strong> カウンタを以下の値に更新しました: ',
    'ERROR_CONFIGURATION_KEY_NOT_FOUND' => '<strong>エラー:</strong> 一致する設定キー(Configuration Keys)が見つかりません...',
    'ERROR_CONFIGURATION_KEY_NOT_ENTERED' => '<strong>エラー:</strong> 検索のための設定キーかテキストが入力されていません ... 検索を中止しました',
    'TEXT_INFO_COUNTER_UPDATE' => '<strong>ヒットカウンターの更新</strong><br>統計の「ヒットカウンター」の値を変更：',
    'TEXT_INFO_PRODUCTS_PRICE_SORTER_UPDATE' => '<strong>全ての商品の表示価格情報の並びを更新します</strong><br>定価ではなく販売価格に準じて商品を価格順で表示出来るようになります: ',
    'TEXT_INFO_PRODUCTS_VIEWED_UPDATE' => '<strong>全ての商品の閲覧数をリセット</strong><br>商品の閲覧回数のカウントを 0 にリセットします',
    'TEXT_INFO_PRODUCTS_ORDERED_UPDATE' => '<strong>全ての商品の注文回数をリセット</strong><br>商品の注文回数のカウントを 0 にリセットします',
    'TEXT_INFO_MASTER_CATEGORIES_ID_UPDATE' => '<strong>全ての商品のマスタカテゴリIDを強制リセット</strong><br>注意：全ての商品に対して、登録カテゴリの一番初めのものを強制的に「マスタカテゴリ」に指定しなおします。',
    'TEXT_NEW_ORDERS_ID' => '次回の注文ID：',
    'TEXT_INFO_SET_NEXT_ORDER_NUMBER' => '<strong>次回の注文IDを指定</strong><br>注意：既にデータベースに存在している注文IDよりも小さい値を設定することは出来ません。',
    'TEXT_MSG_NEXT_ORDER' => '次回の注文オーダーIDは %s と設定されました。',
    'TEXT_MSG_NEXT_ORDER_MAX' => '既存注文に準じた形での次の注文番号は: %s になります。',
    'TEXT_MSG_NEXT_ORDER_TOO_LARGE' => 'データベースの制限により、2000000000より大きい値を設定することはできません。',
    'TEXT_INFO_DATABASE_OPTIMIZE' => '<strong>データベースの最適化</strong><br>記録の削除によってできた無駄なスペースを削除する為に、データベースを最適化して下さい。<br>データ更新が頻繁なサイトでは、毎月あるいは毎週行っても良いでしょう。<br>（アクセスが少なく、管理画面からの作業を行っていない時間帯での実施を推奨）',
    'TEXT_INFO_OPTIMIZING_DATABASE_TABLES' => 'データベーステーブルの最適化処理中です。　これには数分間かかります。　処理が完了したら前の画面にもどりますのでそのままお待ちください。',
    'SUCCESS_DB_OPTIMIZE' => 'データベーステーブル最適化が完了しました。',
    'TEXT_INFO_PURGE_DEBUG_LOG_FILES' => '<strong>デバッグログのクリーニング</strong><br><strong>重要: </strong>Zen CartはデバッグのためにPHPエラーメッセージを記録します。また、多くの支払いモジュールでは問題を診断するためにデバッグデータを記録するように設定できます。 <br>この削除処理を実施することで、 /cache フォルダ内に保存されていた PHPエラーや支払モジュールなどの『すべてのログが永久に削除』されます。',
    'SUCCESS_CLEAN_DEBUG_FILES' => 'デバッグログファイルが削除されました。',
];

return $define;

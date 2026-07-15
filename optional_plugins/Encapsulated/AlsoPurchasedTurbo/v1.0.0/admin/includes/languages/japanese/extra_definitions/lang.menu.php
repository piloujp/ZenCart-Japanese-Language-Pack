<?php

$define = [
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_ALSOPURCHASEDTURBO' => '同時購入「ターボ版」',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_ALSOPURCHASEDTURBO' => '標準の「この商品を買った人はこんな商品も買っています」機能を、事前計算された商品ペア・テーブルを使用する仕組みに置き換えます。これにより、商品ページを表示するたびに発生していた負荷の高い `orders_products` テーブルの自己結合（セルフジョイン）が不要になります。推奨商品は実際の購買傾向に基づいてランク付けされ、チェックアウト時の処理（オブザーバー）によって常に最新の状態に保たれます。コアファイルやテンプレートの変更は一切不要で、ストア既存の表示レイアウトもそのまま維持されます。',
// Admin configuration
    'CFGTITLE_APT_ENABLED' => '同時購入「ターボ版」を有効にしますか？',
    'CFGDESC_APT_ENABLED' => '<b>true</b>に設定すると、商品ページでは事前に計算されたペアテーブルから推奨情報が読み込まれ、新規注文の際にはチェックアウト時にそのテーブルが更新されます。<b>false</b>に設定すると、このプラグインがインストールされていない場合と同様に、標準の「一緒に購入された商品」のクエリが使用されます。<br>表示件数や列のレイアウトについては、「設定」>「商品情報」にある標準設定（<code>MIN_DISPLAY_ALSO_PURCHASED</code>、<code>MAX_DISPLAY_ALSO_PURCHASED</code>、列数）が引き続き適用されます。',
    'CFGTITLE_APT_RANKING' => 'おすすめランキング',
    'CFGDESC_APT_RANKING' => '<b>親和性 (Affinity):</b> 本商品と最も頻繁に併せて購入されている商品（関連性の高い順／推奨）。<br><b>直近性 (Recency):</b> 直近で併せて購入された商品（実際の購買行動に最も近い）。<br><b>ランダム (Random):</b> 併せて購入された商品からランダムに選定。',
    'CFGTITLE_APT_FALLBACK_STOCK' => '商品に対となるデータがない場合、通常のクエリにフォールバックしますか？',
    'CFGDESC_APT_FALLBACK_STOCK' => 'この設定が <b>true</b> であり、かつ表示中の商品に対応する行がペアテーブルに存在しない場合（初期シード処理の完了前など）、その商品について「一緒に購入された商品」を特定するクエリが実行され、ストアフロントの表示内容が損なわれないようにします。シード処理が完了した大規模なストアでは、この設定を <b>false</b> にすることで、ペアが設定されていない商品に関するクエリ実行のコストを発生させないようにできます。',
    'CFGTITLE_APT_DEBUG_LOG' => 'デバッグログを有効にする',
    'CFGDESC_APT_DEBUG_LOG' => '診断情報を <code>logs/also_purchased_turbo_debug.log</code> に書き込みます。ストアフロントのレンダリングごとにJSON形式の1行（商品ID、使用データソース、ランキングモード、取得行数、クエリ実行時間）が記録され、チェックアウト時のキャプチャでは注文と商品の組み合わせに関する処理が記録されます。商品ページが閲覧されるたびにログが増加するため、トラブルシューティングを行っている間のみ有効にしてください。ログファイルはいつでも安全に削除できます。',
    'CFGTITLE_APT_SEED_PROGRESS' => 'シードの進捗状況（自動管理）',
    'CFGDESC_APT_SEED_PROGRESS' => '過去のシーディング処理に関する内部管理用データです。「Tools > Also Purchased Turbo」によって管理されているため、手動で編集しないでください。空欄＝未処理、数値＝次に処理する orders_id、<code>done</code>＝シーディング完了。',
// Configuration_group
    'CFG_GRP_TITLE_ALSO_PURCHASED_TURBO' => '同時購入「ターボ版」',
    'CFG_GRP_DESC_ALSO_PURCHASED_TURBO' => '同時購入「ターボ版」事前計算型レコメンデーションエンジンの設定の設定。',
];

return $define;

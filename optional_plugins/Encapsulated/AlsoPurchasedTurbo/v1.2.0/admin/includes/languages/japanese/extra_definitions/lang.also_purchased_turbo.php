<?php
/**
 * Module: AlsoPurchasedTurbo
 *
 * @requires    Zen Cart 2.2.2 or later, PHP 8.0+ recommended
 * @author      Marcopolo
 * @copyright   2026
 * @license     GNU General Public License (GPL) - https://www.zen-cart.com/license/2_0.txt
 * @version     1.2.0
 * @updated     07-26-2026
 * @github      https://github.com/CcMarc/AlsoPurchasedTurbo
 */
$define = [
    'BOX_TOOLS_ALSO_PURCHASED_TURBO' => '同時購入「ターボ版」',
    'BOX_CONFIGURATION_ALSO_PURCHASED_TURBO' => '同時購入「ターボ版」',

    'APT_HEADING_TITLE' => '同時購入「ターボ版」',
    'APT_HEADING_SUBTITLE' => '事前計算された「同時購入された商品」のレコメンデーション',

    'APT_PANEL_STATUS' => 'エンジンの状態',
    'APT_PANEL_SHIMS' => 'テンプレートの統合',
    'APT_PANEL_DISPLAY_SETTINGS' => '表示設定（Zen Cartの共有設定）',
    'APT_PANEL_PLUGIN_SETTINGS' => 'プラグイン設定',
    'APT_PANEL_MAINTENANCE' => 'メンテナンス',

    'APT_TEXT_STATUS' => '状態',
    'APT_TEXT_ENABLED' => '有効',
    'APT_TEXT_DISABLED' => '無効',
    'APT_TEXT_PAIR_ROWS' => 'ペアの数',
    'APT_TEXT_PRODUCTS_COVERED' => 'おすすめ商品',
    'APT_TEXT_TABLE_SIZE' => 'ディスク上のテーブルサイズ',
    'APT_TEXT_TABLE_SIZE_RECLAIMABLE' => '（%s は内部的に再利用可能 ～ 以下の「テーブルの最適化」を参照）',
    'APT_TEXT_SEED_STATE' => '歴史的シード',
    'APT_TEXT_SEED_DONE' => '完了',
    'APT_TEXT_SEED_NOT_STARTED_SHORT' => '未開始',
    'APT_TEXT_SEED_NOT_STARTED' => '商品ページでは、デフォルトの基本的な仕組みが使用されています。',
    'APT_TEXT_SEED_IN_PROGRESS_SHORT' => '進行中',
    'APT_TEXT_SEED_IN_PROGRESS' => '処理対象の次の注文ID： %s（最大 %s 中）。',
    'APT_TEXT_LAST_PRUNE' => '最新の清掃',
    'APT_TEXT_LAST_OPTIMIZE' => '最新の最適化',
    'APT_TEXT_LAST_OPTIMIZE_NEVER' => '一度も実行されません。',
    'APT_TEXT_LAST_OPTIMIZE_DETAIL' => '%1$s ～　テーブルは現在ディスク上で %2$s （%3$s が解放されました）',
    'APT_TEXT_LAST_PRUNE_NEVER' => '一度も実行されません。',
    'APT_TEXT_LAST_PRUNE_DETAIL' => '%1$s ～　%2$s &rarr; %3$s 行（%4$s 件を削除、製品ごとの上限 %5$s）',

    'APT_TEXT_SHIMS_EXPLAIN' => 'アクティブなテンプレートにおいて、併せて購入されたデータエンジンがどのように組み込まれているかを示します。「OK」および「統合型」は、いずれもこのプラグインがデータを提供することを意味します。',
    'APT_TEXT_SHIM_OK' => 'OK',
    'APT_TEXT_SHIM_MISSING_SHORT' => 'ない',
    'APT_TEXT_SHIM_MISSING' => 'このテンプレートは標準の動作を使用しています。以下の「テンプレートのシムを修復」を使用してください。',
    'APT_TEXT_SHIM_FOREIGN_SHORT' => 'カスタマイズ',
    'APT_TEXT_SHIM_FOREIGN' => '同時購入「ターボ版」非対応のカスタマイズされたモジュールが存在します～このテンプレートでは同時購入「ターボ版」は有効ではありません。',
    'APT_TEXT_SHIM_INTEGRATED_SHORT' => '統合型',
    'APT_TEXT_SHIM_INTEGRATED' => 'このテンプレートは、本プラグインのペア・テーブルを読み込む独自の表示機能を備えています。',

    'APT_TEXT_DISPLAY_SETTINGS_EXPLAIN' => 'Zen Cartの「この商品を買った人はこんな商品も買っています」に関する標準設定（「最小値」「最大値」「商品情報」の設定グループ）です。その設定は、標準モジュールと本プラグインの双方に適用され、ここでの変更は共通の値に反映されます。',
    'APT_TEXT_MIN_DISPLAY' => 'ボックスを表示するために必要な最小限の商品数',
    'APT_TEXT_MAX_DISPLAY' => '表示する最大商品数',
    'APT_TEXT_COLUMNS' => 'ー行あたりの列数（0 = ボックスなし）',
    'APT_BUTTON_SAVE_DISPLAY' => '保存',
    'APT_TEXT_DISPLAY_SETTINGS_SAVED' => '表示設定が保存されました。',

    'APT_TEXT_SETTING_ENABLED' => 'エンジン有効 (APT_ENABLED)',
    'APT_TEXT_SETTING_RANKING' => 'ランキング (APT_RANKING)',
    'APT_TEXT_SETTING_FALLBACK' => '在庫照会のフォールバック (APT_FALLBACK_STOCK)',
    'APT_TEXT_SETTING_DEBUG' => 'デバッグログ (APT_DEBUG_LOG)',
    'APT_TEXT_SETTING_MAX_PAIRS' => '商品ごとの最大ペア数 (APT_MAX_PAIRS_PER_PRODUCT)',

    'APT_BUTTON_PRUNE' => 'ペアテーブルを剪定する（上位のペアを保持する）',
    'APT_HELP_PRUNE' => '各商品を、その「%s」個の最も強力なペア（ランキングは APT_RANKING に準拠）に絞り込みます。ストアフロントにはごく一部しか表示されないため、大規模なストアでは、見た目に影響を与えることなくテーブルサイズを大幅に縮小できる可能性があります。処理は分割して実行され、自動的に継続されるため、いつでも安全に実行可能です。シード処理の完了後に自動的に実行されます。',
    'APT_TEXT_PRUNE_DISABLED' => 'プルーニング（不要なデータの削除）は無効になっています（製品ごとに保存されるペアの最大数が0に設定されています）。一般設定 > 同時購入「ターボ版」で上限を設定してください。',
    'APT_TEXT_PRUNE_CHUNK_DONE' => '整理中...商品 ID %1$s を処理中（これまでに %2$s 行を削除）。自動的に続行します...',
    'APT_TEXT_PRUNE_COMPLETE' => '剪定完了：%s組の行を削除しました。各商品は最大で%s組を保持するようになりました。',
    'APT_TEXT_SEED_PRUNE_CHAIN' => '新規にシードされたテーブルを整理するため、不要なペアの削除が自動的に開始されます...',

    'APT_BUTTON_OPTIMIZE' => 'テーブルの最適化（ディスク領域の解放）',
    'APT_HELP_OPTIMIZE' => 'ディスク上のペアテーブルを再構築します。InnoDBは削除された行の領域をOSに返さずテーブルスペース内に保持するため、大規模な削除（プルーニング）を行っても、最適化されるまではファイルサイズが大きいままとなります。現在のサイズ： %1$s、内部的に再利用可能な領域： %2$s。大規模なテーブルでは数分かかる場合がありますが、再構築中もストアフロントは稼働し続けます。',
    'APT_TEXT_OPTIMIZE_CONFIRM_JS' => '今すぐペアテーブルを再構築しますか？大きなテーブルの場合、数分かかることがあります。',
    'APT_TEXT_OPTIMIZE_DONE' => '最適化が完了しました。ペアテーブルは現在ディスク上で %1$s です（%2$s が解放されました）。',
    'APT_TEXT_PRUNE_OPTIMIZE_HINT' => 'その削除処理により、多数の行が削除されました。InnoDBではディスク領域が自動的に解放されることはありません。テーブルファイルを縮小するには、以下の「テーブルの最適化（ディスク領域の解放）」を実行してください。',
    'APT_BUTTON_EDIT_PLUGIN_SETTINGS' => '設定で編集 &raquo; 同時購入「ターボ版」',

    'APT_BUTTON_SEED' => '注文履歴からシード／再開',
    'APT_HELP_SEED' => '既存のオーダーからペア テーブルを分割して構築（または構築を再開）し、自動的に続行します。いつでも安全に実行できます。すでにカウントされている注文は、再構築しない限り二重にカウントされません。',
    'APT_BUTTON_REBUILD' => '切り詰めて、ゼロから再構築する',
    'APT_HELP_REBUILD' => 'ペアテーブルを空にし、完全な注文履歴から再構築します。注文の一括インポートや削除を行った後や、生のSQLで注文を書き込むツールによってデータの不整合（ドリフト）が生じている疑いがある場合に使用してください。',
    'APT_BUTTON_PURGE' => '削除された商品のペアを削除する',
    'APT_HELP_PURGE' => 'カタログに存在しなくなった商品を参照しているペア行を削除します。削除された商品は、いずれにせよ表示されることはありません（ストアフロントのクエリは有効な商品のテーブルを参照するため）。この処理は、単に行の領域を解放するものです。',
    'APT_BUTTON_REPAIR_SHIMS' => 'テンプレートのシムを修復',
    'APT_HELP_REPAIR_SHIMS' => '有効なテンプレート（テンプレートの切り替え後など）について、不足しているシム（shim）を再作成します。カスタマイズされたモジュールが上書きされることはありません。これらについては、テンプレート統合パネルに「バックアップして引き継ぐ」という個別のボタンが用意されています。',

    'APT_TEXT_REBUILD_CONFIRM_JS' => 'ペアテーブルを切り詰めて、ゼロから再構築しますか？',
    'APT_TEXT_SEED_GUARD' => 'ペアテーブルには既に %s 行のデータが存在しますが、シード進捗ポインタが見当たりません（通常、再インストール後に発生します）。この状態でシード処理を行うと既存のデータが重複してカウントされてしまうため、処理は開始されませんでした。テーブルが既に完成している場合は、何もする必要はありません（ステータスは「完了」に設定されています）。ゼロから再構築を行う場合は、「Truncate and rebuild（切り捨てて再構築）」を使用してください。',
    'APT_TEXT_SEED_CHUNK_DONE' => '注文 %s から %s までを処理しました。自動的に続行します…',
    'APT_TEXT_SEED_COMPLETE' => '初期化が完了しました。%s組の行が、現在%s個の商品を対象としています。',
    'APT_TEXT_REBUILD_RESET' => 'ペアテーブルが切り詰められました。注文履歴の最初から再構築を開始します。',
    'APT_TEXT_PURGED' => '削除された商品を参照していた %s 件のペア行を削除しました。',
    'APT_TEXT_SHIMS_REPAIRED' => 'シムの修復が完了しました。テンプレート統合パネルを確認してください。',

    'APT_BUTTON_TAKEOVER' => 'バックアップと引き継ぎ',
    'APT_TEXT_TAKEOVER_CONFIRM_JS' => 'テンプレート %s 用のカスタマイズ済みモジュールをバックアップし（アンインストール時に復元されます）、代わりに同時購入「ターボ版」シムをインストールしますか？',
    'APT_TEXT_TAKEOVER_OK' => 'テンプレート「%s」：カスタマイズされたモジュールが also_purchased_products.pre-APT.php.bak としてバックアップされ、APTシムがインストールされました。',
    'APT_TEXT_TAKEOVER_FAILED' => 'テンプレート「%s」：カスタマイズされたモジュールをバックアップできませんでした。',
    'APT_TEXT_TAKEOVER_BACKUP_EXISTS' => 'テンプレート「%s」：カスタマイズされたモジュールと同じ場所に、既存の .pre-APT.php.bak バックアップファイルが存在します。引き継ぎを行う前に、手動で解決してください。',
    'APT_TEXT_SHIM_WRITE_FAILED' => 'バックアップは成功しましたが、%s へのシム（shim）の書き込みに失敗しました。バックアップはそのまま残されています。権限を確認して再試行してください。',
    'APT_TEXT_DIR_NOT_WRITABLE' => 'ディレクトリ %s は Web サーバーユーザーによる書き込みができません。',
    'APT_TEXT_PERMS_UNCLEAR' => '理由は不明～ %s の所有者および権限を確認してください',
];

return $define;

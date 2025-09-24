<?php

$define = [
    'HEADING_TITLE' => '追加の商品画像をスキャンしてデータベースにロードします',
    'TEXT_MAIN' => 'Zen Cart が「追加の」商品画像を処理する方法は、商品に一つの「メイン」画像を割り当て、次に一緒に表示する追加の画像を個別に割り当てることです。<br>
Y商品に追加の画像を割り当てるには、次の 2 つの方法があります：<br>
１）管理画面の商品編集ページで、商品ごとに直接、追加画像をアップロード（および削除）できます。ファイル名を気にしたり、パターンに合わせて画像ファイル名を変更したりする必要はありません。そのためには、<strong>管理 > 設定 > 画像 > 追加画像のファイル名一致パターン</strong>設定が<strong>Database</strong>に設定されている必要があります。<br>
２） FTP では、規定の<a href="https://docs.zen-cart.com/user/images/image_filename_conventions/" target="_blank">命名規則</a>に従ってすべての追加画像ファイル名を指定し、そのパターンによってストアフロントでその商品に表示される追加画像が自動的に選択されるようにします。<br><br>
このツールは、画像ディレクトリ/サブディレクトリをスキャンして既にアップロードされている画像を探し、それらをデータベースに挿入して対応する商品に割り当てることで、方法２から方法１に切り替えるように設計されています。<br>
メインの商品画像名（例：my-main-product-image.jpg）を参照として使用し、<a href="https://docs.zen-cart.com/user/images/image_filename_conventions/" target="_blank">一致する名前とサフィックス</a>（例：my-main-product-image_anytext.jpg）を持つ他の画像を追加画像としてその商品に割り当てます。<br>
データベースエントリが作成され、すべての商品画像管理を管理者の商品編集ページから実行できるようになります。<br>画像の変更やアップロードは行われません。',
    'TEXT_TIP_1' => 'ヒント：このツールは複数回実行できます。重複した商品画像の割り当てはスキップされるため、ベンダーからのアップデート提供後など、後から画像を追加した場合でも、このツールを再実行しても問題ありません。ただし、このツールはファイル名が命名規則（上記のリンクを参照）に一致する画像のみを取得する点にご注意ください。',
    'TEXT_STEP_1' => 'ステップ１：データをバックアップする',
    'TEXT_STEP_1_DETAIL' => '続行する前に、データベースと画像の完全なバックアップがあることを確認してください。このツールは破壊的ではありませんが、今こそすべてのバックアップを確実に取得しておくことをお勧めします。',
    'TEXT_STEP_2' => 'ステップ２：スキャンを開始する',
    'TEXT_STEP_2_DETAIL' => 'スキャンプロセスを開始するには、下の「スキャンを開始」ボタンをクリックします。',
    'TEXT_STEP_3' => 'ステップ３：完了',
    'TEXT_STEP_3_DETAIL' => '処理が完了すると、メッセージログエリアに表示されます。その後、商品とカテゴリーの画像がストアフロントに正しく表示されていることを確認してください。<br><br>
これらのデータベース追跡画像を使用するには、<strong>管理-&gt;構成-&gt;画像-&gt;追加画像ファイル名一致パターン</strong>設定を <strong>Database</strong> に設定する必要があることに注意してください。そのため、このツールを初めて実行する場合は、必ずその設定を変更してください。そうしないと、管理商品編集ページで追加画像を管理できなくなります。',
    'BUTTON_START_SCANNING' => 'スキャンを開始',
    'TEXT_SETTINGS' => '設定',
    'TEXT_TOGGLE_SECTION' => '（セクションを切り替える）',
    'TEXT_START_AT' => '開始位置（デフォルト 0）',
    'TEXT_BATCH_SIZE' => 'バッチサイズ（デフォルト10、最大50）',
    'TEXT_SETTINGS_HELP' => '必要な場合のみ調整してください。値は<strong>スキャン開始</strong>を押すと一度だけ読み込まれます。バッチサイズを小さくすると効率が向上し、タイムアウトを回避できます。',
    'TEXT_PROGRESS' => '進捗',
    'TEXT_TOTAL_PRODUCTS_WITH_IMAGES' => '画像付き商品の合計数',
    'TEXT_CUMULATIVE_PROCESSED' => '累積処理数',
    'TEXT_CUMULATIVE_INSERTED' => '累積追加画像が挿入されました',
    'TEXT_PRODUCTS_REMAINING' => 'スキャンする残りの商品',
    'TEXT_THIS_BATCH_FOUND' => 'このバッチ - 見つかったレコード',
    'TEXT_THIS_BATCH_INSERTED' => 'このバッチ - 挿入された画像',
    'TEXT_MESSAGE_LOG' => 'メッセージログ',
    'TEXT_RUNNING' => '実行中...',
    'TEXT_IDLE' => 'アイドル',

    'TEXT_STARTED_WITH' => '開始位置=',
    'TEXT_WITH_BATCH_SIZE' => 'で開始、バッチサイズ=',
    'ERROR_EMPTY_RESPONSE' => '空または無効な応答（2xx）。中止します。',
    'TEXT_ERROR' => 'エラー：    ',
    'TEXT_SERVER_ENDED' => 'サーバーが終了を要求しました。',
    'TEXT_MISSING_RESPONSE' => '応答が残りません。中止します。',
    'TEXT_WARNING' => '警告： ',

    'TEXT_STATUS_FOUND' => 'バッチ完了。見つかりました： ',
    'TEXT_STATUS_PRODUCTS' => '検査対象商品： ',
    'TEXT_STATUS_IMAGES' => '挿入された画像： ',
    'TEXT_STATUS_REMAINING' => '残り： ',

    'TEXT_COMPLETED' => 'すべての作業が完了しました（残り = 0）。',
    'TEXT_NETWORK_ERROR' => 'ネットワークエラー、タイムアウト、またはリクエストが中止されました。（HTTPエラー）バッチサイズを小さくしてみてください。',
    'TEXT_HTTP_ERROR' => 'HTTPエラー ',
    'TEXT_CANCELLED' => 'ユーザーによりキャンセルされました。',
];

return $define;

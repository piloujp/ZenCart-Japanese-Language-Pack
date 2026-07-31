<?php

$define = [
    'HEADING_TITLE' => '言語マネージャー',
    'NAVBAR_TITLE' => '言語マネージャー',

    // Create Pack Section
    'BUTTON_CREATE_NEW_PACK' => '新しい言語パックを作成する',
    'TEXT_NEW_LANGUAGE_SOURCE' => 'ソース言語:',
    'TEXT_NEW_LANGUAGE_TARGET' => '対象言語（小文字）：',
    'TEXT_PLACEHOLDER_LANG_CODE' => '例：french',
    'TEXT_TITLE_LOWERCASE' => '小文字のみ',
    'BUTTON_CREATE' => '作成',

    // Selector Section
    'TEXT_TARGET_TEMPLATE' => 'ターゲットテンプレート：',
    'TEXT_TARGET_TEMPLATE_LIVE' => 'ライブストア',
    'TEXT_TARGET_LANGUAGE' => '言語：',
    'TEXT_FILE_TO_EDIT' => '編集するファイル：',
    'TEXT_CHOOSE_FILE' => '-- ファイルを選択 --',

    // Modes & Legends
    'TEXT_MODE_BASIC' => '基本モード',
    'TEXT_MODE_ADVANCED' => '上級者 / 開発者',
    'TEXT_SEARCH_PLACEHOLDER' => '検索キーまたはテキスト...',
    'TEXT_LINKED_LANGUAGE_SUGGESTION' => '<strong>提案：</strong>言語　<code>%s</code> は、ストア設定の <strong>%s</strong> テンプレートにリンクされています。',
    'TEXT_LINKED_LANGUAGE_CURRENT' => '現在、次のオーバーライドを編集しています： <em>%s</em>',
    'TEXT_LINKED_LANGUAGE_SWITCH' => '%s に切り替える',

    // Legends
    'TEXT_LEGEND_BASIC_TITLE' => '基本モード：',
    'TEXT_LEGEND_BASIC_DESC' => '通常通りテキストを入力してください。引用符と特殊文字は自動的に処理されます。',
    'TEXT_LEGEND_BASIC_NOTE' => '注：複雑な値（定数など）は、エラー防止のため、このモードではロックされます。編集するには、「詳細」モードに切り替えてください。',

    'TEXT_LEGEND_ADVANCED_TITLE' => '詳細モード：',
    'TEXT_LEGEND_ADVANCED_DESC' => '生の PHP コードを編集しています。',
    'TEXT_LEGEND_ADVANCED_RULES' => '<span class="text-danger">ルール：</span>引用符（例： <code>\'言葉\'</code>）または有効な PHP 構文（例： <code>\'ようこそ \' . STORE_NAME</code>）を含める必要が<strong>あります</strong>。',

    // Table
    'TABLE_HEADING_KEY' => 'キー',
    'TABLE_HEADING_ORIGINAL' => 'オリジナル（生のコード）',
    'TABLE_HEADING_OVERRIDE' => 'あなたのオーバーライド',
    'TEXT_RAW_PHP' => '（生のPHP）',
    'TEXT_COMPLEX_LOCKED' => '複雑なPHP（編集するには詳細モードに切り替えます）',
    'TEXT_CONTAINS_TOKEN' => '警告： %s が含まれています',
    'TEXT_USE_DEFAULT' => 'デフォルトを使用する',
    'TEXT_USE_DEFAULT_LABEL' => '元の値を使用するにはチェックを入れます（オーバーライドを削除します）',

    'BUTTON_SAVE_CHANGES' => '変更を保存',

    // Messages & Errors (Create Pack)
    'ERROR_LANGUAGE_NAME_REQUIRED' => 'エラー：言語名が必要です。',
    'ERROR_CATALOG_LANG_EXISTS' => 'エラー：カタログ言語「%s」は既に存在します。',
    'ERROR_SOURCE_CATALOG_NOT_FOUND' => 'エラー：ソース カタログ ファイル（%s）が見つかりません。',
    'ERROR_SOURCE_ADMIN_NOT_FOUND' => 'エラー：ソース管理ファイル（%s）が見つかりません。複製できません。',
    'ERROR_COPY_CATALOG_LOADER' => 'エラー：カタログローダーをコピーできませんでした。',
    'ERROR_COPY_ADMIN_LOADER' => 'エラー：管理ローダーをコピーできませんでした。',
    'ERROR_SYNTAX_ERROR' => '構文エラーのためファイルは保存されませんでした。',
    'ERROR_CANT_CREATE_DIR' => 'エラー：ディレクトリを作成できませんでした ',
    'ERROR_CHECK_PERMISSIONS' => '書き込みエラー：次の権限を確認してください：',
    'TEXT_SUCCESS_SAVED' => '%s オーバーライドを次の場所に正常に保存しました：',
    'TEXT_OVERRIDES_REMOVED' => 'すべてのオーバーライドが削除されました。ファイルは削除されました。',
    'PHP_SYNTAX_ERROR' => '：構文エラー',
    'ERROR_PLUGIN_PATH_INVALID' => 'セキュリティエラー：無効なプラグインパス',
    'ERROR_PLUGIN_PATH_INVALID_RELATIVE' => 'エラー：プラグインファイルの相対パス構造を判別できませんでした。',
    'ERROR_INVALID_FILE_EDIT' => 'ファイル名が無効です。%1$s を編集しようとしていますが、システムでは %2$s のみが許可されています。',
    'ERROR_BASE_FILE_NOT_FOUND' => 'エラー：ベース言語ファイルが見つかりません： %s',

    'SUCCESS_CATALOG_CREATED' => 'カタログ ファイルが正常に作成されました。',
    'SUCCESS_ADMIN_CREATED' => '管理ファイルが正常に作成されました。',
    'SUCCESS_LANG_PACK_READY' => '言語パック「%s」が準備完了です。ローカリゼーション＞言語で追加できます。',
];

return $define;

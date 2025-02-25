<?php

$define = [
    'CFG_GRP_TITLE_USU' => '究極のURL',
// Ultimate URLs configuration settings
    'CFGTITLE_USU_ENABLED' => '代替 URL を有効にしますか？',
    'CFGDESC_USU_ENABLED' => 'これは、代替 URL の生成を有効（<b>true</b>）または無効（<b>false</b>）にするグローバル設定です。',
    'CFGTITLE_USU_DEBUG' => 'デバッグログを有効にしますか？',
    'CFGDESC_USU_DEBUG' => '有効にすると、追加のデバッグ情報がログファイル（<code>/logs/usu-{adm-}yyyymmmdd-hhmmss.log</code>）に保存されます。<br><br>デバッグを有効にすると、多数のログ ファイルが作成され、サーバーのパフォーマンスに悪影響を与える可能性があります。絶対に必要な場合にのみ有効にしてください。',
    'CFGTITLE_USU_CPATH' => 'cPathパラメータを生成する',
    'CFGDESC_USU_CPATH' => 'デフォルトでは、Zen Cart は商品ページの cPath パラメータを生成します。リンクされた商品を正しいカテゴリに保持するために使用されます。自動モードでは、cPath は必要な場合にのみ追加されます。',
    'CFGTITLE_USU_END' => '代替URLは以下で終わります',
    'CFGDESC_USU_END' => 'URL を特定のサフィックスで終わらせたい場合は、ここで追加します。一般的なサフィックスは「.html」、「.htm」です。生成された URL にサフィックスを追加しない場合は、このフィールドを空白のままにします。',
    'CFGTITLE_USU_FORMAT' => '代替 URL の形式',
    'CFGDESC_USU_FORMAT' => '一般的に生成される形式のリストから選択できます。<br><br><b>オリジナル：</b><ul><li><i>カテゴリ：</i> category-name-c-34</li><li><i>商品：</i> product-name-p-54</li></ul><b>カテゴリの親：</b><ul><li><i>カテゴリ：</i> parent-category-name-c-34</li><li><i>商品：</i> parent-product-name-p-54</li></ul>',
    'CFGTITLE_USU_CATEGORY_DIR' => 'カテゴリをディレクトリとして表示',
    'CFGDESC_USU_CATEGORY_DIR' => '一般的に生成される形式のリストから選択できます。<br><b>オフ：</b> ディレクトリとしてカテゴリを表示しないようにします<br><br><b>短縮：</b> 「代替 URL の形式」の設定を使用します<br><br><b>完全：</b> 完全なカテゴリパスを使用します<br><br>',
    'CFGTITLE_USU_REMOVE_CHARS' => '問題のある文字を削除する',
    'CFGDESC_USU_REMOVE_CHARS' => 'これにより、生成された URL から特定の問題のある文字を削除できます。<br><br><i>非英数字：</i> は、すべての非英数字を削除します<br><i>句読点：</i> は、すべての句読点を削除します',
    'CFGTITLE_USU_FILTER_PCRE' => 'PCREフィルタールールを入力',
    'CFGDESC_USU_FILTER_PCRE' => 'この設定では、PCRE ルールを使用して URL をフィルタリングします。<br><br>このフィルタは、文字変換と特殊文字の削除の前に実行されます。URL にダッシュ - を使用する場合は、スペースを１つ使用します。正規表現で文字をエスケープするには、単一の \\ ではなく \\\\ を使用します。<br><br>形式は、<b>find1=>replace1,find2=>replace2</b> の形式である必要があります。',
    'CFGTITLE_USU_FILTER_SHORT_WORDS' => '短い単語をフィルタリング',
    'CFGDESC_USU_FILTER_SHORT_WORDS' => 'この設定により、生成された URL から「短い単語」、つまり指定された値以下の長さの単語がフィルタリングされます。すべての単語を含めるには、値 <b>0</b> を使用します。',
    'CFGTITLE_USU_FILTER_PAGES' => '代替URLを次のページに制限する',
    'CFGDESC_USU_FILTER_PAGES' => 'ここで指定することで、書き換えるページを制限できます。ページを指定しない場合は、すべてのページが書き換えられます。<br><br>形式はカンマ区切りのリスト（間にスペースがあってもかまいません）で、<b>page1,page2,page3</b> または <b>page1, page2, page3</b> の形式にする必要があります。',
    'CFGTITLE_USU_ENGINE' => 'URLエンジンを選択',
    'CFGDESC_USU_ENGINE' => '使用する URL エンジンを選択します。',
    'CFGTITLE_USU_REDIRECT' => '自動リダイレクトを有効にしますか？',
    'CFGDESC_USU_REDIRECT' => 'これにより、自動リダイレクト コードがアクティブになり、古い URL の 301 ヘッダーが新しい URL に送信されます。',
    'CFGTITLE_USU_VERSION' => 'プラグインバージョン',
    'CFGDESC_USU_VERSION' => '現在インストールされている <em>USU</em> のバージョン。',
];

return $define;

<?php

$define = [
    'CFGTITLE_LOG_MANAGER_KEEP_DAYS' => 'ログ マネージャー：保存日数',
    'CFGDESC_LOG_MANAGER_KEEP_DAYS' => 'ストアの <b>logs</b> ディレクトリに <code>.log</code> ファイル拡張子を持つファイルを保持する最大日数を入力します。<br><br>入力した値が０以外の場合、その相対日付より前に作成されたファイルはすべてストアのファイル以外の場合、その相対日付より前に作成されたファイルはすべてストアのファイル システムから<b>完全に削除</b>されます。<br>',
    'CFGTITLE_LOG_MANAGER_KEEP_THESE' => 'ログマネージャ：保存するログ',
    'CFGDESC_LOG_MANAGER_KEEP_THESE' => '経過日数に関係なく、<b><i>保持</i></b> するログ ファイルの名前プレフィックスをコンマで区切って入力します。<br><br>入力する値は、大文字と小文字が区別されます。つまり、<em>zcInstall</em> は <em>zcinstall</em> とは異なります。デフォルト設定（<code>zcInstall</code>）では、<code>/logs/zcInstall*.log</code> に一致するファイルは、作成日に関係なく保持されます。<br>',
];

return $define;
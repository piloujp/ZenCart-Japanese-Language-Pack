<?php
$define = [
    'NAVBAR_TITLE' => 'タイムアウト',
    'HEADING_TITLE' => '接続を切断させていただきました',
    'HEADING_TITLE_LOGGED_IN' => '申し訳ありませんが動作を実行することができません。 ',
    'TEXT_INFORMATION' => '<p>ご注文手続き中に一定時間が超過したため、セキュリティ上の理由から自動的にログアウトさせていただきました。</p>
<p>お客様のショッピングカートの内容は保存されていますので、お手続きが完了していない場合は再度ログインしてください。</p><p>手続きが完了したご注文内容をご覧になる場合' . (DOWNLOAD_ENABLED == 'true' ? '、またはダウンロード商品をダウンロードされる場合' : '') . 'は、<a href="' . zen_href_link(FILENAME_ACCOUNT) . '">マイページ</a>からお入りください。</p>',
    'TEXT_INFORMATION_LOGGED_IN' => 'ログインしているのでお買い物をお続けいただけます。メニューから行き先をお選び下さい。',
    'HEADING_RETURNING_CUSTOMER' => 'ログイン',
];

return $define;

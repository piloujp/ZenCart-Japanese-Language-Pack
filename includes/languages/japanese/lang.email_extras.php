<?php
$define = [
    'EMAIL_LOGO_ALT_TITLE_TEXT' => 'Zen Cart! The Art of E-commerce',
    'EMAIL_LOGO_FILENAME' => 'header.jpg',
    'EMAIL_LOGO_WIDTH' => '550',
    'EMAIL_LOGO_HEIGHT' => '110',
    'EMAIL_EXTRA_HEADER_INFO' => '',
    'OFFICE_FROM' => '<strong>差出人:</strong>',
    'OFFICE_EMAIL' => '<strong>メール:</strong>',
    'OFFICE_USE' => '<strong>事務欄:</strong>',
    'OFFICE_LOGIN_NAME' => '<strong>ログイン名:</strong>',
    'OFFICE_LOGIN_EMAIL' => '<strong>ログイン用メールアドレス:</strong>',
    'OFFICE_LOGIN_PHONE' => '<strong>電話番号:</strong>',
    'OFFICE_LOGIN_FAX' => '<strong>Fax:</strong>',
    'OFFICE_IP_ADDRESS' => '<strong>IPアドレス:</strong>',
    'OFFICE_HOST_ADDRESS' => '<strong>ホストアドレス:</strong>',
    'OFFICE_DATE_TIME' => '<strong>日時:</strong>',
    'EMAIL_TEXT_TELEPHONE' => '電話番号: ',
    'EMAIL_DISCLAIMER' => 'このメールは当ショップに登録されたお客様に対してお送りしています。お心当たりが無いようでしたら大変お手数ですがメールにて %s までご連絡ください。',
    'EMAIL_SPAM_DISCLAIMER' => 'このメールは当ショップに登録され、購読を希望された方にお届けしています。配信停止を希望される方は、お手数ですがこちらのメールアドレスまでご連絡下さい。',
    'EMAIL_ORDER_MESSAGE' => '',
    'EMAIL_FOOTER_COPYRIGHT' => 'Copyright (c) ' . date('Y') . ' <a href="' . zen_href_link(FILENAME_DEFAULT) . '">' . STORE_NAME . '</a>. Powered by <a href="https://www.zen-cart.com" target="_blank">Zen Cart</a>',
    'TEXT_UNSUBSCRIBE' => "\n\nメールマガジンの購読を解除される場合は、こちらのリンクをクリックして下さい: \n",
    'EMAIL_ADVISORY' => '-----' . "\n" . '「<strong>重要:</strong>
お客様の個人情報保護、および迷惑行為防止のために' . "\n" . '
当ショップを経由して送信されるメールはショップ管理者が' . "\n" . '
通信記録として保存しています。' . "\n" . '
もしこのメールにお心当たりがないようでしたら、' . "\n" . '
大変お手数ですがメールにて' . STORE_OWNER_EMAIL_ADDRESS . "\n" .'
までご連絡くださいますようお願いいたします。」' . "\n\n",
    'EMAIL_ADVISORY_INCLUDED_WARNING' => '<strong>このサイトを経由して送信される全てのEメールの末尾に以下のメッセージが付加されます:</strong>',
    'SEND_EXTRA_CREATE_ACCOUNT_EMAILS_TO_SUBJECT' => '[アカウント作成]',
    'SEND_EXTRA_GV_CUSTOMER_EMAILS_TO_SUBJECT' => '[ギフト券の贈呈]',
    'SEND_EXTRA_NEW_ORDERS_EMAILS_TO_SUBJECT' => '[新規注文]',
    'EMAIL_TEXT_SUBJECT_LOWSTOCK' => '警告: 在庫が少なくなりました',
    'SEND_EXTRA_LOW_STOCK_EMAIL_TITLE' => '在庫警告レポート: ',
];

return $define;

<?php
$define = [
    'HEADING_TITLE' => 'アカウント認証が保留中です...',
    'HEADING_TITLE_ACTIVATE' => 'メールを確認してください - 承認保留中',

    'CUSTOMERS_AUTHORIZATION_TEXT_INFORMATION' => 'あなたのアカウントは承認のために審査中です。',
    'CUSTOMERS_AUTHORIZATION_STATUS_TEXT' => '承認手続きの状況を確認するには、こちらをクリック：',

    'SUCCESS_AUTHORIZED' => 'アカウントのショッピングが承認されました。このサイトで他のブラウザウィンドウが開いている可能性がありますが、閉じていただいても大丈夫です。',

    'TEXT_EXPIRED' => '**期限切れ**',
    'TEXT_HERE' => 'ここ',          //- Used in the '_RESEND' data's anchor links
    'TEXT_INFORMATION_ACTIVATE' =>  //- %1$s (email address)
        'アカウントを有効化するためのリンクを記載したメールを%1$sに送信しました。リンクをクリックしてアカウントの有効化を続行してください。',
    'TEXT_INFORMATION_LINK_ACTIVE' => 'リンクの有効期限までの残り時間：',
    'TEXT_INFORMATION_LINK_EXPIRED' => 'リンクの有効期限が切れています。',
    'TEXT_INFORMATION_RESEND' =>    //- %1$s (an anchor link to resend the token), %2$s (a link to the account_edit page)
        'メールが届いていませんか？上記のメールアドレスが正しいことをご確認ください。正しい場合（またはリンクの有効期限が切れている場合）は、「%1$s」をクリックして再送信してください。そうでない場合は、「%2$s」をクリックしてメールアドレスを変更してください。',
];

global $auth_token_info;
$define['NAVBAR_TITLE'] = (($auth_token_info ?? false) === false) ? $define['HEADING_TITLE'] : $define['HEADING_TITLE_ACTIVATE'];

return $define;

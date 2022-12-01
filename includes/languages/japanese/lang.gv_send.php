<?php
$define = [
    'HEADING_TITLE' => TEXT_GV_NAME . '送信',
    'HEADING_TITLE_CONFIRM_SEND' => TEXT_GV_NAME . '送信の確認',
    'HEADING_TITLE_COMPLETED' => TEXT_GV_NAME . 'を送信しました',
    'NAVBAR_TITLE' => '' . TEXT_GV_NAME . '送信',
    'EMAIL_SUBJECT' => STORE_NAME . 'からのメッセージ',
    'HEADING_TEXT' => '<br>以下のフォームに' . TEXT_GV_NAME . 'のお受取人情報などをご記入ください。<br>' . TEXT_GV_NAME . 'についての詳しい情報は<a href="' . zen_href_link(FILENAME_GV_FAQ).'">' . GV_FAQ . '</a>でご覧になれます。<br>',
    'ENTRY_MESSAGE' => 'メッセージ:',
    'ENTRY_AMOUNT' => '金額:',
    'ERROR_ENTRY_TO_NAME_CHECK' => 'お受取人のお名前が入力されていません。',
    'ERROR_ENTRY_AMOUNT_CHECK' => TEXT_GV_NAME . 'の金額が正しく入力されていません。もう一度やり直して下さい。',
    'ERROR_ENTRY_EMAIL_ADDRESS_CHECK' => 'Eメールアドレスが正しく入力されていないようです。もう一度やり直して下さい。',
    'MAIN_MESSAGE' => TEXT_GV_NAME . ' %s分を%s様(%s)に送ります。訂正が必要な場合は<strong>編集</strong>ボタンをクリックしてください。<br><br>送信するメッセージ:<br><br>',
    'SECONDARY_MESSAGE' => '%s 様<br><br>' . '%sの' . TEXT_GV_NAME . 'が%s様から贈られました。',
    'PERSONAL_MESSAGE' => '%s様からのメッセージ:',
    'TEXT_SUCCESS' => TEXT_GV_NAME . 'の送信に成功しました。',
    'TEXT_SEND_ANOTHER' => '他に' . TEXT_GV_NAME . 'を贈りますか?',
    'EMAIL_GV_TEXT_SUBJECT' => '%sさんからのギフト',
    'EMAIL_SEPARATOR' => '----------------------------------------------------------------------------------------',
    'EMAIL_GV_TEXT_HEADER' => '' . TEXT_GV_NAME . '(%s)が',
    'EMAIL_GV_FROM' => '%s様から' . TEXT_GV_NAME . 'が贈られました。',
    'EMAIL_GV_MESSAGE' => 'メッセージ：',
    'EMAIL_GV_SEND_TO' => '%s様、こんにちは。',
    'EMAIL_GV_REDEEM' => '以下のURLをクリックすると、この' . TEXT_GV_NAME . 'を引き換えることができます。また、当ショップで直接' . TEXT_GV_REDEEM . ': %s を入力していただくことでも引き換えることもできます。' . "\n\n" . '',
    'EMAIL_GV_VISIT' => 'または',
    'EMAIL_GV_FIXED_FOOTER' => '上記のURLをクリックしてもうまく' . TEXT_GV_NAME . 'の引き換えができない場合は' . "\n" .
                                'お手数ですがこの' . TEXT_GV_NAME . 'の' . TEXT_GV_REDEEM . 'を当ショップにて入力してください。',
    'EMAIL_GV_SHOP_FOOTER' => '',
];

return $define;

<?php
//rmh referral begin
$define = [
    'ENTRY_SOURCE' => '私たちのことをどこで知りましたか：',
    'ENTRY_SOURCE_ERROR' => '当社について最初に知ったきっかけを選択してください。',
    'ENTRY_SOURCE_OTHER' => '（「その他」の場合は詳細を記入してください）',
    'ENTRY_SOURCE_OTHER_ERROR' => '当社について最初に知ったきっかけを入力してください。',
    'PULL_DOWN_SOURCES' => 'ソースを選択してください',
    'PULL_DOWN_OTHER' => 'その他 - （詳細を記入してください）',
    'ENTRY_SOURCE_TEXT' => '',
    'ENTRY_SOURCE_OTHER_TEXT'  => '',
];
if (defined('REFERRAL_REQUIRED') && REFERRAL_REQUIRED === 'true') {
    $define['ENTRY_SOURCE_TEXT'] = '*';
    $define['ENTRY_SOURCE_OTHER_TEXT'] = '*';
}
return $define;
//rmh referral end

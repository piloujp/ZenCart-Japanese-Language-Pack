<?php
// -----
// Part of the "Clone Template" plugin for Zen Cart v1.5.8 or later (now an encapsulated plugin).
//
// Last updated: v2.0.0
//
// Copyright (c) 2016-2023, Vinos de Frutas Tropicales (lat9)
//
$define = [
    'HEADING_TITLE' => 'テンプレートの複製<span style="font-size: smaller;">（%s）</span>',
    'TEXT_DESCRIPTION' => '<p>このツールを使用すると、既存のテンプレートを「複製」または削除できます。</p>',

    'TEXT_INSTRUCTIONS_CLONE' => '<p>テンプレートが「複製」されると、ソース テンプレートのすべての <em>テンプレート オーバーライド</em>ファイルと<b>レイアウト ボックス コントローラ</b>設定が新しいテンプレートにコピーされます。</p><p><b>新しいテンプレートの表示名</b>フィールドに入力した名前は、<strong>ツール -> テンプレートの選択</strong>ページで新しいテンプレートを識別します。</p>',

    'TEXT_INSTRUCTIONS_REMOVE' => '追加の（コアではない）テンプレートに関連付けられたすべてのテンプレート オーバーライドファイルを削除できます。',
    'TEXT_NOTHING_TO_REMOVE' => '削除できる追加のテンプレートはありません。コアの <em>classic</em> テンプレートと <em>responsive_classic</em> テンプレートは削除できません。',

    'TEXT_TEMPLATE_SOURCE' => 'ソーステンプレートディレクトリ名： ',
    'TEXT_TEMPLATE_TARGET' => '新しいテンプレートディレクトリ名： ',
    'TEXT_TEMPLATE_TARGET_NAME' => '新しいテンプレートの表示名： ',
    'CLONE_TEMPLATE_GO_ALT' => 'このテンプレートを複製するにはここをクリックしてください',

    'TEXT_TEMPLATE_REMOVE_SOURCE' => '削除するテンプレートファイル: ',
    'CLONE_TEMPLATE_GO_REMOVE_ALT' => '選択したテンプレートのファイルを削除するにはここをクリックしてください',

    'TEXT_TEMPLATE_CLONED' => ' このテンプレートは%2$sに%1$sから複製されました。',  //-%1$s (source template folder), %2$s (date of the cloning)

    'ERROR_TEMPLATE_TARGET_BLANK' => '<b>新しいテンプレートディレクトリ名</b>フィールドは空白にできません。値を入力してください。',
    'ERROR_TEMPLATE_TARGET_INVALID_CHARS' => '<b>新しいテンプレートディレクトリ名</b>フィールドには、英数字（a-z、A-Z、0-9）またはアンダースコア（_）のみを含めることができます。もう一度お試しください。',
    'ERROR_TEMPLATE_TARGET_NAME_BLANK' => '<b>新しいテンプレートの表示名</b>フィールドは空白にできません。値を入力してください。',
    'ERROR_TEMPLATE_TARGET_NAME_INVALID_CHARS' => '<b>新しいテンプレートの表示名</b>フィールドには、英数字（a-z、A-Z、0-9）またはアンダースコア（_）のみを含めることができます。もう一度お試しください。',
    'ERROR_TEMPLATE_TARGET_NAME_DUPLICATE' => '<b>新しいテンプレートの表示名</b>は既に存在します。新しい名前を入力してください。',

    'MESSAGE_COPYING_FILES' => '%1$s から %2$s にファイルをコピーしています',
    'MESSAGE_REMOVING_FILES' => '%s からファイルを削除しています',

    'MESSAGE_FILE_LOG' => '&nbsp;&nbsp;&nbsp;この処理によって実行されたアクションは %s に記録されます。',

    'JS_CONFIRMATION_MESSAGE' => 'この操作により、対象のテンプレートフォルダ内の同じ名前のファイルがすべて上書きされます。続行しますか？',
    'JS_CONFIRM_REMOVAL_MESSAGE' => 'この操作により、選択したテンプレートのすべてのテンプレートオーバーライドファイルが削除されます。続行しますか？',

    // -----
    // These constants are used to log (both on display and to file) the files copied by the plugin.
    //
    'LOG_FOLDER_FILES_FOUND' => 'フォルダ %2$s から %1$u 個のファイルをコピーしています ...',     //-%1$u (number of files), %2$s (folder name),
    'LOG_FOLDER_CREATED' => '&nbsp;&nbsp;&nbsp;ディレクトリ %s を作成しています',           //-%s (folder name)
    'LOG_COPYING_FILE' => '&nbsp;&nbsp;&nbsp;%1$s を %2$s にコピーしています',              //-%1$s (source file) => %2$s (target file)

    // -----
    // These constants are used to log (both on display and to file) the files removed by the plugin
    //
    'LOG_FOLDER_REMOVE_FILES_FOUND' => 'フォルダ %2$s から %1$u 個のファイルを削除しています ...', //-%1$u (number of files), %2$s (folder name)
    'LOG_FOLDER_REMOVED' => '&nbsp;&nbsp;&nbsp;ディレクトリ %s を削除しています',               //-%s (folder name)
    'LOG_REMOVING_FILE' => '&nbsp;&nbsp;&nbsp;%s を削除しています',                          //-%s (file name)
];

return $define;

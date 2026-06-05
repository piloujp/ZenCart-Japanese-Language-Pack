<?php

declare(strict_types=1);

// -----
// Part of the DataBase Import/Export (aka DbIo) plugin, created by Cindy Merkin (cindy@vinosdefrutastropicales.com)
//
// Last updated: DbIo v2.0.2
//
// Copyright (c) 2017-2025, Vinos de Frutas Tropicales.
//
$define = [
    'HEADING_TITLE' => 'DbIo%s テンプレートを構成する',

    'TEXT_SCOPE_PUBLIC' => 'パブリック',
    'TEXT_SCOPE_PRIVATE' => 'プライベート',
    'TEXT_SYSTEM_UPDATE' => 'システム',
    'TEXT_UNKNOWN_ADMIN' => '未知',

    'HEADING_TITLE_EDIT' => '<em>%s</em> ハンドラーのテンプレートを編集しています。',
    'HEADING_TITLE_NEW' => '<em>%s</em> ハンドラーの新しいテンプレートを作成しています。',
    'HEADING_TITLE_COPY' => '<em>%s</em> ハンドラーに定義されたテンプレートをコピーしています。',

    'HEADING_SCOPE' => '範囲',
    'HEADING_TEMPLATE_NAME' => 'テンプレート名',
    'HEADING_DESCRIPTION' => '説明',
    'HEADING_UPDATED_BY' => '最終更新者',
    'HEADING_LAST_UPDATE' => '最終更新日',
    'HEADING_ACTION' => 'アクション',

    'COLUMN_HEADING_SCOPE' => 'テンプレートのスコープ：',
    'INSTRUCTIONS_SCOPE' => 'DbIo テンプレートは、自分だけが使用できるプライベートにするか、または承認されたすべての管理者ユーザーが使用できるパブリックにすることができます。',
    'COLUMN_HEADING_NAME' => 'テンプレート名：',
    'INSTRUCTIONS_NAME' => 'テンプレートベースの<b>エクスポート</b>を実行すると、テンプレート名がエクスポートファイル名の一部となります。テンプレート名には英数字とアンダースコア（_）のみを使用してください。選択したテンプレート名が、利用可能なテンプレートの範囲内で一意である必要があります。',
    'COLUMN_HEADING_DESCRIPTION' => 'テンプレートの説明：',
    'INSTRUCTIONS_DESCRIPTION' => 'テンプレートの説明（HTMLは不可）を参考に、テンプレートの目的を明確にしましょう。ストアでサポートされている言語ごとに説明をカスタマイズできます。',
    'COLUMN_HEADING_CHOOSE_FIELDS' => 'テンプレートフィールドを選択：',
    'COLUMN_HEADING_COPY_FIELDS' => 'テンプレートフィールド：',
    'INSTRUCTIONS_CHOOSE' => 'このテンプレートで使用可能なフィールド（左側）から選択したフィールド（右側）に移動できます。Ctrlキーを押しながらマウスで追加フィールドをクリックすると、複数のフィールドを一度に選択できます。<br><br>このテンプレートのフィールドを選択したら、ボタンを使用してカスタマイズしたリスト内でフィールドを上下に移動できます。このテンプレートを<b>エクスポート</b>操作に使用すると、生成される.CSVファイルには、指定した順序で列が含まれます。',
    'INSTRUCTIONS_CHOOSE_COPY' => 'テンプレートをコピーすると、コピーされたテンプレートには、以前に設定されたフィールドが最初から含まれています。テンプレートをコピーしたら、コピーしたテンプレートを編集してフィールドを調整できます。すべてのフィールドが表示されない場合は、マウスを使ってドロップダウンリストを下にドラッグし、すべてのフィールドが表示されるまで移動してください。',

    'NO_TEMPLATES_EXIST' => '現在、テンプレートは定義されていません。「新しいテンプレート」ボタンを使用してテンプレートを追加してください。',
    'TEXT_ENTER_REPORT_DESCRIPTION_HERE' => 'ここにレポートの説明を入力します。',

    'BUTTON_EDIT' => '編集',
    'BUTTON_EDIT_TITLE' => 'このテンプレートを編集するにはここをクリックしてください',
    'BUTTON_COPY' => 'コピー',
    'BUTTON_COPY_TITLE' => 'このテンプレートをコピーするにはここをクリック',
    'BUTTON_REMOVE' => '削除',
    'BUTTON_REMOVE_TITLE' => 'このテンプレートを完全に削除するにはここをクリックしてください',
    'BUTTON_NEW' => '新しいテンプレート',
    'BUTTON_NEW_TITLE' => '現在のハンドラーの新しい DbIo テンプレートを作成するには、ここをクリックしてください',

    'BUTTON_INSERT' => '挿入',
    'BUTTON_INSERT_TITLE' => '新しいDbIoテンプレートを作成するにはここをクリックしてください',
    'BUTTON_UPDATE' => '更新',
    'BUTTON_UPDATE_TITLE' => 'このDbIoテンプレートを更新するにはここをクリックしてください',
    'BUTTON_RETURN' => 'DbIoマネージャー',
    'BUTTON_RETURN_TITLE' => 'DbIo マネージャーのメインページに戻るにはここをクリックしてください',
    'BUTTON_CANCEL' => 'キャンセル',
    'BUTTON_CANCEL_TITLE' => '現在の操作をキャンセルするにはここをクリックしてください',

    'INSTRUCTIONS_MAIN' => 'このページを使用して、DbIo の <em>%1$s</em> ハンドラーのエクスポート テンプレートをカスタマイズします。このハンドラーでサポートされるフィールドのサブセットを選択し、それらのフィールドが関連する.csvファイルの列にエクスポートされる順序をカスタマイズできます。詳細については、こちらの<a href="https://github.com/lat9/dbio/wiki/Manage-DbIo-Templates" target="_blank" rel="noreferrer noopener">Wiki記事</a>をご覧ください。' .
    '<br><br>' .
    'テンプレートのスコープは、すべての管理者ユーザーが使用できる <b>' . TEXT_SCOPE_PUBLIC . '</b>、または自分だけが使用できる <b>' . TEXT_SCOPE_PRIVATE . '</b> のいずれかになります。テンプレートを使用してエクスポートアクションをカスタマイズする場合、この名前はエクスポートされたCSVファイルの名前の一部になります（例：<code>dbio.%1$s.template_name.datetime_string</code>）。ここで入力した説明は、テンプレートを選択したときにメインの<strong>データベースI/Oマネージャー</strong>画面に表示され、テンプレートの機能を確認するのに役立ちます。',

    'ERROR_UNKNOWN_HANDLER' => '不明なハンドラー名が指定されました。もう一度お試しください。',
    'ERROR_TEMPLATE_NAME_EXISTS' => '「%3$s」テンプレート（「%2$s」という名前）は、<em>%1$s</em>ハンドラに既に存在します。別の名前を選択してください。',
    'ERROR_TEMPLATE_NAME_INVALID_CHARS' => '入力したテンプレート名に無効な文字が含まれています。英数字とアンダースコアのみを使用して、名前を再入力してください。',
    'ERROR_TEMPLATE_NAME_TOO_LONG' => '入力したテンプレート名の文字数が多すぎます。%u 文字以内で再入力してください。',
    'ERROR_TEMPLATE_NO_FIELDS' => 'この DbIo テンプレートには、カスタマイズされたフィールドを少なくとも１つ選択してください。',
    'SUCCESS_TEMPLATE_ADDED' => '<em>%s</em> という名前の DbIo テンプレートが正常に追加されました。',
    'SUCCESS_TEMPLATE_UPDATED' => '<em>%s</em> という名前の DbIo テンプレートが正常に更新されました。',
    'SUCCESS_TEMPLATE_REMOVED' => '<em>%s</em> という名前の DbIo テンプレートが正常に削除されました。',

    'JS_MESSAGE_CONFIRM_REMOVE' => 'このテンプレートを完全に削除してもよろしいですか？',
    'JS_MESSAGE_NAME_CANT_BE_EMPTY' => 'テンプレート名フィールドは空にできません。',
    'JS_MESSAGE_NAME_TOO_LONG' => 'テンプレート名フィールドは %u 文字以内にしてください。',
    'JS_MESSAGE_AT_LEAST_ONE_FIELD' => 'テンプレートのカスタマイズには少なくとも１つのフィールドを含める必要があります。',
    'JS_MESSAGE_ERRORS_EXIST' => 'フォームの入力にいくつか変更を加える必要があります：',
    'JS_MESSAGE_TRY_AGAIN' => '修正してもう一度お試しください。',
];

return $define;

<?php
// -----
// Part of the DataBase Import/Export (aka DbIo) plugin, created by Cindy Merkin (cindy@vinosdefrutastropicales.com)
//
// Last updated: DbIo v2.0.2
//
// Copyright (c) 2017-2025, Vinos de Frutas Tropicales.
//
define('HEADING_TITLE', 'DbIo%s テンプレートを構成する');

define('TEXT_SCOPE_PUBLIC', 'パブリック');
define('TEXT_SCOPE_PRIVATE', 'プライベート');
define('TEXT_SYSTEM_UPDATE', 'システム');
define('TEXT_UNKNOWN_ADMIN', '未知');

define('HEADING_TITLE_EDIT', '<em>%s</em> ハンドラーのテンプレートを編集しています。');
define('HEADING_TITLE_NEW', '<em>%s</em> ハンドラーの新しいテンプレートを作成しています。');
define('HEADING_TITLE_COPY', '<em>%s</em> ハンドラーに定義されたテンプレートをコピーしています。');

define('HEADING_SCOPE', '範囲');
define('HEADING_TEMPLATE_NAME', 'テンプレート名');
define('HEADING_DESCRIPTION', '説明');
define('HEADING_UPDATED_BY', '最終更新者');
define('HEADING_LAST_UPDATE', '最終更新日');
define('HEADING_ACTION', 'アクション');

define('COLUMN_HEADING_SCOPE', 'テンプレートのスコープ：');
define('INSTRUCTIONS_SCOPE', 'DbIo テンプレートは、自分だけが使用できるプライベートにするか、または承認されたすべての管理者ユーザーが使用できるパブリックにすることができます。');
define('COLUMN_HEADING_NAME', 'テンプレート名：');
define('INSTRUCTIONS_NAME', 'テンプレートベースの<b>エクスポート</b>を実行すると、テンプレート名がエクスポートファイル名の一部となります。テンプレート名には英数字とアンダースコア（_）のみを使用してください。選択したテンプレート名が、利用可能なテンプレートの範囲内で一意である必要があります。');
define('COLUMN_HEADING_DESCRIPTION', 'テンプレートの説明：');
define('INSTRUCTIONS_DESCRIPTION', 'テンプレートの説明（HTMLは不可）を参考に、テンプレートの目的を明確にしましょう。ストアでサポートされている言語ごとに説明をカスタマイズできます。');
define('COLUMN_HEADING_CHOOSE_FIELDS', 'テンプレートフィールドを選択：');
define('COLUMN_HEADING_COPY_FIELDS', 'テンプレートフィールド：');
define('INSTRUCTIONS_CHOOSE', 'このテンプレートで使用可能なフィールド（左側）から選択したフィールド（右側）に移動できます。Ctrlキーを押しながらマウスで追加フィールドをクリックすると、複数のフィールドを一度に選択できます。<br><br>このテンプレートのフィールドを選択したら、ボタンを使用してカスタマイズしたリスト内でフィールドを上下に移動できます。このテンプレートを<b>エクスポート</b>操作に使用すると、生成される.CSVファイルには、指定した順序で列が含まれます。');
define('INSTRUCTIONS_CHOOSE_COPY', 'テンプレートをコピーすると、コピーされたテンプレートには、以前に設定されたフィールドが最初から含まれています。テンプレートをコピーしたら、コピーしたテンプレートを編集してフィールドを調整できます。すべてのフィールドが表示されない場合は、マウスを使ってドロップダウンリストを下にドラッグし、すべてのフィールドが表示されるまで移動してください。');

define('NO_TEMPLATES_EXIST', '現在、テンプレートは定義されていません。「新しいテンプレート」ボタンを使用してテンプレートを追加してください。');
define('TEXT_ENTER_REPORT_DESCRIPTION_HERE', 'ここにレポートの説明を入力します。');

define('BUTTON_EDIT', '編集');
define('BUTTON_EDIT_TITLE', 'このテンプレートを編集するにはここをクリックしてください');
define('BUTTON_COPY', 'コピー');
define('BUTTON_COPY_TITLE', 'このテンプレートをコピーするにはここをクリック');
define('BUTTON_REMOVE', '削除');
define('BUTTON_REMOVE_TITLE', 'このテンプレートを完全に削除するにはここをクリックしてください');
define('BUTTON_NEW', '新しいテンプレート');
define('BUTTON_NEW_TITLE', '現在のハンドラーの新しい DbIo テンプレートを作成するには、ここをクリックしてください');

define('BUTTON_INSERT', '挿入');
define('BUTTON_INSERT_TITLE', '新しいDbIoテンプレートを作成するにはここをクリックしてください');
define('BUTTON_UPDATE', '更新');
define('BUTTON_UPDATE_TITLE', 'このDbIoテンプレートを更新するにはここをクリックしてください');
define('BUTTON_RETURN', 'DbIoマネージャー');
define('BUTTON_RETURN_TITLE', 'DbIo マネージャーのメインページに戻るにはここをクリックしてください');
define('BUTTON_CANCEL', 'キャンセル');
define('BUTTON_CANCEL_TITLE', '現在の操作をキャンセルするにはここをクリックしてください');

define('INSTRUCTIONS_MAIN',
    'このページを使用して、DbIo の <em>%1$s</em> ハンドラーのエクスポート テンプレートをカスタマイズします。このハンドラーでサポートされるフィールドのサブセットを選択し、それらのフィールドが関連する.csvファイルの列にエクスポートされる順序をカスタマイズできます。詳細については、こちらの<a href="https://github.com/lat9/dbio/wiki/Manage-DbIo-Templates" target="_blank" rel="noreferrer noopener">Wiki記事</a>をご覧ください。' .
    '<br><br>' .
    'テンプレートのスコープは、すべての管理者ユーザーが使用できる <b>' . TEXT_SCOPE_PUBLIC . '</b>、または自分だけが使用できる <b>' . TEXT_SCOPE_PRIVATE . '</b> のいずれかになります。テンプレートを使用してエクスポートアクションをカスタマイズする場合、この名前はエクスポートされたCSVファイルの名前の一部になります（例：<code>dbio.%1$s.template_name.datetime_string</code>）。ここで入力した説明は、テンプレートを選択したときにメインの<strong>データベースI/Oマネージャー</strong>画面に表示され、テンプレートの機能を確認するのに役立ちます。'
);

define('ERROR_UNKNOWN_HANDLER', '不明なハンドラー名が指定されました。もう一度お試しください。');
define('ERROR_TEMPLATE_NAME_EXISTS', '「%3$s」テンプレート（「%2$s」という名前）は、<em>%1$s</em>ハンドラに既に存在します。別の名前を選択してください。');
define('ERROR_TEMPLATE_NAME_INVALID_CHARS', '入力したテンプレート名に無効な文字が含まれています。英数字とアンダースコアのみを使用して、名前を再入力してください。');
define('ERROR_TEMPLATE_NAME_TOO_LONG', '入力したテンプレート名の文字数が多すぎます。%u 文字以内で再入力してください。');
define('ERROR_TEMPLATE_NO_FIELDS', 'この DbIo テンプレートには、カスタマイズされたフィールドを少なくとも１つ選択してください。');
define('SUCCESS_TEMPLATE_ADDED', '<em>%s</em> という名前の DbIo テンプレートが正常に追加されました。');
define('SUCCESS_TEMPLATE_UPDATED', '<em>%s</em> という名前の DbIo テンプレートが正常に更新されました。');
define('SUCCESS_TEMPLATE_REMOVED', '<em>%s</em> という名前の DbIo テンプレートが正常に削除されました。');

define('JS_MESSAGE_CONFIRM_REMOVE', 'このテンプレートを完全に削除してもよろしいですか？');
define('JS_MESSAGE_NAME_CANT_BE_EMPTY', 'テンプレート名フィールドは空にできません。');
define('JS_MESSAGE_NAME_TOO_LONG', 'テンプレート名フィールドは %u 文字以内にしてください。');
define('JS_MESSAGE_AT_LEAST_ONE_FIELD', 'テンプレートのカスタマイズには少なくとも１つのフィールドを含める必要があります。');
define('JS_MESSAGE_ERRORS_EXIST', 'フォームの入力にいくつか変更を加える必要があります：');
define('JS_MESSAGE_TRY_AGAIN', '修正してもう一度お試しください。');

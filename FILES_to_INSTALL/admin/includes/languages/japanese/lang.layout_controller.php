<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2024 May 27 Modified in v2.1.0-alpha1 $
*/

$define = [
    'HEADING_TITLE' => 'サイドボックスの表示設定',
    'TEXT_CURRENTLY_VIEWING' => '現在閲覧中:',
    'TEXT_THIS_IS_PRIMARY_TEMPLATE' => '（メイン）',
    'TABLE_HEADING_BOXES_PATH' => 'ボックスパス: ',
    'TEXT_WARNING_NEW_BOXES_FOUND' => '警告：新しいボックスが見つかりました：',
    'TEXT_ORIGINAL_DEFAULTS' => '[オリジナル/マスター Zen Cart デフォルト]',
    'TEXT_CAUTION_EDITING_NOT_LIVE_TEMPLATE' => '注意: 顧客が使用するメイン テンプレートではないテンプレートの設定を編集しています。',

    'TEXT_HEADING_MISSING_BOXES' => '不足しているボックス',
    'BUTTON_REMOVE_SELECTED' => '選択を削除',
    'TEXT_NO_BOXES_TO_REMOVE' => '欠落しているサイドボックスは削除対象として選択されませんでした。',
    'BUTTON_REMOVE_BOXES' => 'ボックスを削除',
    'BUTTON_CLOSE' => '閉じる',

    'TEXT_INFO_HEADING_DELETE_BOX' => '不足しているサイドボックスを削除する',
    'TEXT_INFO_DELETE_MISSING_LAYOUT_BOX_NOTE' => '注意: これによってファイルが削除されるわけではなく、正しいディレクトリに追加することでいつでもボックスを再度追加できます。<br><br><strong>削除するボックス: </strong>',
    'SUCCESS_BOX_DELETED' => 'ボックスは削除されました:',

    'TEXT_RESET_SETTINGS' => '設定をリセット',
    'TEXT_INFO_RESET_TEMPLATE_SORT_ORDER' => 'ボックスのステータス/並べ替え設定をリセットします: ',
    'TEXT_INFO_RESET_TEMPLATE_SORT_ORDER_NOTE' => 'これによってボックスが削除されることはありません。他のテンプレートのボックスと一致するボックスのステータス/並べ替え順序のみがリセットされます。',
    'TEXT_SETTINGS_COPY_FROM' => 'ステータス/並べ替え設定のコピー元: ',
    'TEXT_SETTINGS_COPY_TO' => 'コピー先: ',
    'SUCCESS_BOX_RESET' => '[%1$s] の設定は [%2$s] の現在の設定にリセットされました。',
    'TEXT_ERROR_INVALID_RESET_SUBMISSION' => 'エラー: 無効なリセット選択',

    'TEXT_INSTRUCTIONS' => 'デバイスにマウスがある場合は、ボックスをドラッグ アンド ドロップして、アクティブな列の位置内での列の位置や並べ替え順序を変更できます。マウスがない場合は、上矢印アイコンと下矢印アイコンを使用して、ボックスの位置や並べ替え順序を変更します。<i class="fa-solid fa-xmark"></i> アイコンを使用すると、アクティブなボックスを非アクティブなグループにすばやく移動できます。',
    'BUTTON_SHOW_NOTES' => '注を表示',
    'BUTTON_HIDE_NOTES' => '注を非表示',
    'TEXT_NOTES' => '注:',
    'TEXT_NOTE1_OPT' => 'ストアフロントでの（%1$s）ボックスの表示は、%2$s テンプレートに <em>大きく依存</em> します。詳細については、テンプレートの作成者に確認してください。',
    'TEXT_NOTE1' => 'ボックスを移動すると、ボタンが表示され、それをクリックすると、行ったすべての変更が保存されます。',
    'TEXT_NOTE2' => 'ボックスの並べ替え順序は選択を保存するときに計算されるため、指定する必要はありません。',
    'TEXT_NOTE3' => 'すべての非アクティブなボックスは同じ並べ替え順序で保存されるため、アルファベット順に表示されます。',
    'TEXT_NOTE4' => '非アクティブなグループ内でボックスを移動することは変更とはみなされません。',
    'TEXT_NOTE5' => '変更を加えてこのツールから移動した場合、変更が保存されていないことがブラウザに表示されます。',

    'TEXT_COLUMN_DISABLED' => '列が無効になっています',
    'TEXT_DISABLED_MESSAGE' => 'この列への変更は保存されますが、ストアフロントには表示されません。設定::レイアウト設定の関連設定を参照してください。',
    'TEXT_HEADING_MAIN_PAGE_BOXES' => 'メインページボックス',
    'TEXT_HEADING_ACTIVE_LEFT' => 'アクティブな左列ボックス',
    'TEXT_HEADING_ACTIVE_RIGHT' => 'アクティブな右列ボックス',
    'TEXT_HEADING_INACTIVE_LEFT_RIGHT' => '非アクティブなメインページボックス',
    'TEXT_HEADING_HEADER_BOXES' => 'ヘッダーボックス',
    'TEXT_HEADING_FOOTER_BOXES' => 'フッターボックス',
    'TEXT_HEADING_MOBILE_BOXES' => 'モバイルメニューボックス',
    'TEXT_HEADING_ACTIVE_BOXES' => 'アクティブボックス',
    'TEXT_HEADING_INACTIVE_BOXES' => '非アクティブなボックス',
    'BUTTON_SHOW' => '表示',
    'BUTTON_HIDE' => '非表示',

    'TEXT_MOVE_BOX_UP' => '%1$s を %2$s ボックス内へ上に移動します。',
    'TEXT_MOVE_BOX_DOWN' => '%1$s を %2$s ボックス内で下に移動します。',
    'TEXT_MOVE_BOX_UNUSED' => '%1$s を非アクティブな %2$s ボックスに移動します。',
        'TEXT_MOVE_MAIN_PAGE_COLUMN' => 'メインページ',  //- Used as %2$s value in above three phrases
        'TEXT_MOVE_HEADER_COLUMN' => 'ヘッダー',        //- Used as %2$s value in the above three phrases
        'TEXT_MOVE_FOOTER_COLUMN' => 'フッター',        //- Used as %2$s value in the above three phrases
        'TEXT_MOVE_MOBILE_COLUMN' => 'モバイルメニュー',   //- Used as %2$s value in the above three phrases
    'BUTTON_SAVE_CHANGES' => '変更を保存',
    'SUCCESS_BOX_UPDATED' => 'ボックス設定の更新に成功しました。: ',
];

return $define;

<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piloujp 2024 Aug 30 Modified in v2.1.0-alpha1 $
*/

$define = [
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_POSM' => '商品オプションの在庫マネージャー',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_POSM' => 'このプラグインを使用すると、サイトで商品と属性の組み合わせ（「製品バリアント」または「属性別在庫」とも呼ばれます）に基づいて商品の在庫レベルとモデル番号を割り当てることができます。',
// POSM - configuration
    'CFGTITLE_POSM_ENABLE' => '一般：商品のオプションの在庫管理を有効にしますか？',
    'CFGDESC_POSM_ENABLE' => 'ストアフロントの商品オプションの在庫処理を有効にしますか？',
    'CFGTITLE_POSM_DUPLICATE_MODELNUMS' => '一般：重複したモデル番号',
    'CFGDESC_POSM_DUPLICATE_MODELNUMS' => '管理レベルのツールは重複するモデル番号をどのように処理しますか? 次のいずれかを選択します。<ol><li><b>Allow</b>（デフォルト）：メッセージなし、保存を許可します。</li><li><b>Disallow</b>：メッセージを発行します。保存は許可されません。</li><li><b>Message-Only</b>：メッセージを発行し、保存を許可します。</li></ol>',
    'CFGTITLE_POSM_DIVIDER_COLOR' => '一般：区切り線の色',
    'CFGDESC_POSM_DIVIDER_COLOR' => '「商品の管理::商品オプション在庫管理」で区切りに使用する背景色を入力します。',
    'CFGTITLE_POSM_STOCK_REORDER_LEVEL' => '一般: オプションの在庫再注文レベル',
    'CFGDESC_POSM_STOCK_REORDER_LEVEL' => 'オプションの在庫がある製品の低在庫レベルを入力します。この値は、「<em>商品の管理::オプションの在庫を管理する</em>」内で低在庫オプションを強調表示するために使用され、<em>「一般設定＞メールの設定＞在庫わずかになったらメール送信</em>」が有効になっている場合は、それらのメールを送信する在庫レベルを決定します。<br><br><strong>注意：</strong>入力する値は、数字（０～９）<em>のみ</em>で構成されている必要があります。',
    'CFGTITLE_POSM_BIS_DATE_REMINDER' => '一般: 再入荷予定日のお知らせ',
    'CFGDESC_POSM_BIS_DATE_REMINDER' => '店舗で <em>POSM</em> の再入荷ラベルを使用して入手可能日を記載している場合は、日付が近づいたときにリマインダーを受け取る必要があるかもしれません。有効期限の<b>何日前に</b>通知を発行するかを指定します。リマインダーが不要な場合は、値を０（デフォルト）に設定します。',
    'CFGTITLE_POSM_OPTIONS_TYPES_TO_MANAGE' => '一般： 管理するオプションの種類は？',
    'CFGDESC_POSM_OPTIONS_TYPES_TO_MANAGE' => '管理するオプションの種類を、カンマで区切られたパックされたリストを使用して入力します。現在、ドロップダウン/選択（0）とラジオ（2）のオプションの種類のみがサポートされています。',
    'CFGTITLE_POSM_OPTIONAL_OPTION_TYPES_LIST' => '一般: オプションの<em>オプション タイプ リスト</em>',
    'CFGDESC_POSM_OPTIONAL_OPTION_TYPES_LIST' => '製品のオプションの組み合わせが管理されているかどうかを判断するときに無視するオプションの種類を、パックされたコンマ区切りのリストを使用して入力します。<br><br>組み込みの Zen Cart オプションタイプは、ドロップダウン/選択（0)、テキスト（1）、ラジオ（2）、チェックボックス（3）、ファイル（4）、読み取り専用（5）です。',
    'CFGTITLE_POSM_OPTIONAL_OPTION_NAMES_LIST' => '一般： オプションの<em>オプション名</em>リスト',
    'CFGDESC_POSM_OPTIONAL_OPTION_NAMES_LIST' => 'ストアのオプション製品オプションのリストを入力します。オプション ID 値をコンマで区切ってパックしたリストを使用します。ここで識別するオプションに関連付けられたすべてのオプション値は、製品のオプションの組み合わせが管理されているかどうかを判断するときに無視されます。<br><br>この値を「オプション オプション タイプ リスト」と組み合わせて使用​​して、ストアのオプションの組み合わせ構成を調整します。',
    'CFGTITLE_POSM_SHOW_STOCK_MESSAGES' => '在庫状況表示： メッセージを表示しますか？',
    'CFGDESC_POSM_SHOW_STOCK_MESSAGES' => 'POSM の在庫あり/在庫切れメッセージが表示される場所（ストアのみ、管理のみ、両方、またはどちらでもない）を選択します。<br><br>「<b>Stor only</b>」または「<b>Both</b>」を選択した場合、このステータスは、ショッピングカート、チェックアウト確認、アカウント履歴情報ページで顧客に表示されます。この設定とは独立して動作する、以下の<em>従属属性: 在庫ステータス表示設定</em>も参照してください。<br><br>「<b>Admin only</b>」または「<b>Both</b>」を選択した場合、在庫/在庫切れのメッセージが「顧客-&gt;注文」の詳細表示、請求書、梱包明細書内に表示されます。',
    'CFGTITLE_POSM_SHOW_UNMANAGED_OPTIONS_STATUS' => '在庫状況表示： 管理されていないオプションのメッセージ？',
    'CFGDESC_POSM_SHOW_UNMANAGED_OPTIONS_STATUS' => '店舗側の処理には、POSM で管理されていない製品の在庫あり/在庫切れメッセージを含める必要がありますか？<b>true</b>に設定すると、管理されていない製品の在庫数に応じてメッセージが表示されます。<br>０より大きい場合は在庫あり、それ以外の場合はデフォルトの在庫切れメッセージ（PRODUCTS_OPTIONS_STOCK_NOT_IN_STOCK）が表示されます。',
    'CFGTITLE_POSM_SHOW_IN_STOCK_MESSAGE' => '在庫状況の表示：「在庫あり」ステータスを含めますか？',
    'CFGDESC_POSM_SHOW_IN_STOCK_MESSAGE' => 'ステータス表示が有効になっている場合は、「在庫あり」の製品ステータスの表示を含めるかどうかを選択します。<b>false</b> に設定すると、「在庫切れ」メッセージのみが表示されます。',
    'CFGTITLE_POSM_ADMIN_MODEL_WIDTH' => '管理： モデル番号フィールドの幅',
    'CFGDESC_POSM_ADMIN_MODEL_WIDTH' => 'この設定を使用して、「商品の管理::オプションの在庫を管理する」および「商品の管理::オプションの在庫 — すべて表示」に表示される<em>オプション モデル/SKU</em> フィールドの幅を制御します。有効な CSS "幅" 値（9em（デフォル）または9px）を入力します。<br><br><b>注：</b>データベースで定義されたフィールド幅を使用するには、設定を空白のままにします。<br>',
    'CFGTITLE_POSM_DEPENDENT_ATTRS_ENABLE' => '依存属性： 有効',
    'CFGDESC_POSM_DEPENDENT_ATTRS_ENABLE' => 'プラグインの依存属性処理を有効にする必要があるかどうかを識別します。',
    'CFGTITLE_POSM_DEPENDENT_ATTRS_PLEASE_CHOOSE' => '依存属性： 「選択してください」を挿入しますか？',
    'CFGDESC_POSM_DEPENDENT_ATTRS_PLEASE_CHOOSE' => 'プラグインの依存属性処理で、製品のドロップダウン オプションに「選択してください」選択を挿入するかどうかを指定します。<em>false</em> の場合、各属性の最初のオプション値は「選択してください&hellip;」タイプの値であると見なされます。<br><br><b>注意：</b>商品にドロップダウンオプションが一つしかない場合、この設定は<b>適用されません</b>。',
    'CFGTITLE_POSM_DEPENDENT_ATTRS_SHOW_MODEL' => '依存属性： モデル番号を表示しますか？',
    'CFGDESC_POSM_DEPENDENT_ATTRS_SHOW_MODEL' => 'プラグインの依存属性処理に、最終的な選択可能な属性のオプションの各属性値のモデル番号を含める必要があるかどうかを識別します。<br><br><strong>注意：</strong> モデル番号は、その値が空の文字列<b>でない場合にのみ</b>含まれます。',
    'CFGTITLE_POSM_DEPENDENT_ATTRS_STOCK_STATUS' => '依存属性： 在庫状況を表示しますか？',
    'CFGDESC_POSM_DEPENDENT_ATTRS_STOCK_STATUS' => 'プラグインの依存属性処理に、最終的な選択可能な属性のオプションの各属性値の在庫あり/在庫切れステータスを含める必要があるかどうかを指定します。<br><br><strong>注意：</strong> 「在庫あり」ステータスは、「在庫状況表示: 在庫状況を含める？」が <b>true</b> に設定されている場合に<b>のみ</b>含まれます。',
    'CFGTITLE_POSM_DEPENDENT_ATTRS_STOCK_STATUS_QTY' => '依存属性： ステータスに在庫数量を表示しますか？',
    'CFGDESC_POSM_DEPENDENT_ATTRS_STOCK_STATUS_QTY' => '「従属属性: 在庫状況の表示」と「在庫状況の表示: 在庫状況を含めるか？」が両方とも <b>true</b> の場合、オプションの組み合わせが在庫にあるときに在庫数量を表示しますか？',
    'CFGTITLE_POSM_ATTRIBUTE_WRAPPER_SELECTOR' => '従属属性： 外部セレクタ',
    'CFGDESC_POSM_ATTRIBUTE_WRAPPER_SELECTOR' => '単一のオプションに関連付けられた<b>すべての</b>要素をラップする<b>外側の</b> CSS セレクター（デフォルト：空の文字列）を識別します。<br><br><b>注意：</b><ol><li>Zen Cart に組み込まれている <code>responsive_classic</code> および <code>template_default</code> テンプレート（およびそれらのクローン）の場合、この値は <em>.attribBlock</em> に設定する必要があります。</li><li><code>bootstrap</code> テンプレート（およびそのクローン）の場合、この値は空の文字列に設定する必要があります。</li></ol>',
    'CFGTITLE_POSM_ATTRIBUTE_SELECTOR' => '依存属性： 内部セレクタ',
    'CFGDESC_POSM_ATTRIBUTE_SELECTOR' => '少なくとも各オプションの名前を含む <b>内部</b> CSS セレクター（デフォルト： <em>.wrapperAttribsOptions</em>）を識別します。<br><br><b>注:</b> この値は、カスタムテンプレートで属性の表示形式が変更された場合にのみ変更する必要があります。',
    'CFGTITLE_POSM_OPTION_NAME_SELECTOR' => '依存属性： オプション名セレクター',
    'CFGDESC_POSM_OPTION_NAME_SELECTOR' => '現在のオプションの名前を含む要素を識別する CSS セレクター（デフォルト： <em>.optionName</em>）を識別します。<br><br><b>注:</b> この値は、カスタムテンプレートで属性の表示形式が変更された場合にのみ変更する必要があります。',
    'CFGTITLE_POSM_ATTRIBUTE_IMAGE_SELECTOR' => '依存属性： 属性画像セレクター',
    'CFGDESC_POSM_ATTRIBUTE_IMAGE_SELECTOR' => '構成されている場合、各属性の画像をラップする CSS セレクター（デフォルト： <em>.attribImg</em>）を識別します。<br><br><b>注:</b> この値は、カスタムテンプレートで属性の表示形式が変更された場合にのみ変更する必要があります。',
    'CFGTITLE_POSM_USE_MINIFIED_JSCRIPT' => '依存属性： 縮小されたスクリプト ファイルを使用しますか？',
    'CFGDESC_POSM_USE_MINIFIED_JSCRIPT' => 'プラグインの「依存属性」処理で jQuery スクリプトの縮小バージョンを読み込む必要があるかどうかを識別し、商品ページのページ読み込み時間を短縮します。',
    'CFGTITLE_POSM_VIEW_ALL_MODEL_UPDATE' => 'すべて表示： モデル番号の更新を許可しますか？',
    'CFGDESC_POSM_VIEW_ALL_MODEL_UPDATE' => '「<em>商品の管理::オプションの在庫を管理する</em>」の「すべて表示」処理で、管理されているバリアントのモデル番号を更新できるようにしますか？ <b>false</b> に設定すると、モデル番号は表示されますが更新できません。製品ごとにモデル番号を更新する必要があります。',
    'CFGTITLE_POSM_MAX_PRODUCTS_VIEW_ALL' => 'すべて表示： １ページあたりの最大商品数',
    'CFGDESC_POSM_MAX_PRODUCTS_VIEW_ALL' => '「<em>すべて表示</em>」ツールの１ページに表示する商品の最大数を入力します。',
    'CFGTITLE_POSM_CART_DISPLAY_MODEL_NUMBERS' => 'ショッピングカート： モデル番号を表示しますか？',
    'CFGDESC_POSM_CART_DISPLAY_MODEL_NUMBERS' => '<code>shopping_cart</code> ページに商品のモデル番号を表示しますか？ <code>true</code> を選択した場合、モデル番号が空でない場合、商品のモデル番号が名前に追加されて表示されます<br>例： 「製品名 [モデル]」。',
    'CFGTITLE_POSM_ENABLE_DEBUG' => 'デバッグを有効にしますか？',
    'CFGDESC_POSM_ENABLE_DEBUG' => '有効にすると、POSM 処理によって、ストアのログ ディレクトリ内の myDEBUG-POSM-*.log ファイル（ストア側のアクションの場合）または myDEBUG-POSM-adm-*.log ファイル（管理側のアクションの場合）にデバッグ情報が書き込まれます。',
// POSM - configuration_group
    'CFG_GRP_TITLE_PRODUCTS_OPTIONS_STOCK_MANAGER' => '%%BOX_CONFIGURATION_PRODUCTS_OPTIONS_STOCK%%',
    'CFG_GRP_DESC_PRODUCTS_OPTIONS_STOCK_MANAGER' => 'Configuration du %%BOX_CONFIGURATION_PRODUCTS_OPTIONS_STOCK%%',
];

return $define;

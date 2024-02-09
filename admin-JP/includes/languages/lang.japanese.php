<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: piloujp 2024 Feb 06 Modified in v2.0.0-alpha1 $
*/

@setlocale(LC_TIME, ['ja_JP', 'ja_JP.utf8', 'ja', 'Japanese.932']);

$define = [
    'ADMIN_NAV_DATE_TIME_FORMAT' => '%Y %m %d %A %X',
    'ARIA_PAGINATION_' => '',
    'ARIA_PAGINATION_CURRENTLY_ON' => ', 現在 %s ページ目を表示中',
    'ARIA_PAGINATION_CURRENT_PAGE' => '現在のページ',
    'ARIA_PAGINATION_ELLIPSIS_NEXT' => '次のページグループを取得',
    'ARIA_PAGINATION_ELLIPSIS_PREVIOUS' => '前のページグループを取得',
    'ARIA_PAGINATION_GOTO' => '移動 > ',
    'ARIA_PAGINATION_NEXT_PAGE' => '次のページへ',
    'ARIA_PAGINATION_PAGE_NUM' => 'ページ %s',
    'ARIA_PAGINATION_PREVIOUS_PAGE' => '前のページへ',
    'ARIA_PAGINATION_ROLE_LABEL_FOR' => '%s ページ',
    'ARIA_PAGINATION_ROLE_LABEL_GENERAL' => 'ページ切り替え',
    'ATTRIBUTE_POSSIBLE_OPTIONS_NAME_WARNING_DUPLICATE' => '重複する可能性のあるオプション名が追加されました',
    'ATTRIBUTE_POSSIBLE_OPTIONS_VALUE_WARNING_DUPLICATE' => '重複する可能性のあるオプションの値が追加されました',
    'ATTRIBUTE_WARNING_DUPLICATE' => '属性の重複 - 属性は追加されませんでした',
    'ATTRIBUTE_WARNING_DUPLICATE_UPDATE' => '重複する属性が存在します - 属性は変更されませんでした',
    'ATTRIBUTE_WARNING_INVALID_MATCH' => '属性オプションとオプション値が一致しません - 属性が追加されませんでした',
    'ATTRIBUTE_WARNING_INVALID_MATCH_UPDATE' => '属性オプションとオプション値が一致しません - 属性は変更されませんでした',
    'BOX_ADMIN_ACCESS_LOGS' => '管理操作ログ',
    'BOX_ADMIN_ACCESS_PAGE_REGISTRATION' => '管理ページの登録',
    'BOX_ADMIN_ACCESS_PROFILES' => '管理グループの権限設定',
    'BOX_ADMIN_ACCESS_USERS' => '管理者の設定',
    'BOX_CATALOG_CATEGORIES_ATTRIBUTES_CONTROLLER' => 'オプション属性の管理',
    'BOX_CATALOG_CATEGORIES_ATTRIBUTES_DOWNLOADS_MANAGER' => 'ダウンロード商品の管理',
    'BOX_CATALOG_CATEGORIES_OPTIONS_NAME_MANAGER' => 'オプション名の管理',
    'BOX_CATALOG_CATEGORIES_OPTIONS_VALUES_MANAGER' => 'オプション値の管理',
    'BOX_CATALOG_CATEGORIES_PRODUCTS' => 'カテゴリ・商品の管理',
    'BOX_CATALOG_CATEGORY' => 'カテゴリ',
    'BOX_CATALOG_FEATURED' => 'おすすめ商品の管理',
    'BOX_CATALOG_MANUFACTURERS' => 'メーカーの管理',
    'BOX_CATALOG_PRODUCT' => '商品',
    'BOX_CATALOG_PRODUCTS_EXPECTED' => '入荷予定商品の管理',
    'BOX_CATALOG_PRODUCTS_PRICE_MANAGER' => '商品価格の管理',
    'BOX_CATALOG_PRODUCTS_TO_CATEGORIES' => 'カテゴリ登録',
    'BOX_CATALOG_PRODUCT_OPTIONS_NAME' => 'オプション名の並び順設定',
    'BOX_CATALOG_PRODUCT_OPTIONS_VALUES' => 'オプション値の並び順設定',
    'BOX_CATALOG_PRODUCT_TYPES' => '商品タイプの管理',
    'BOX_CATALOG_REVIEWS' => 'レビューの管理',
    'BOX_CATALOG_SALEMAKER' => 'セールの管理(SALE Maker)',
    'BOX_CATALOG_SPECIALS' => '特価商品の管理',
    'BOX_CONFIGURATION_ALL_LISTING' => '全商品リストの設定',
    'BOX_CONFIGURATION_ATTRIBUTE_OPTIONS' => '商品属性の設定',
    'BOX_CONFIGURATION_CREDIT_CARDS' => 'クレジットカードの設定',
    'BOX_CONFIGURATION_CUSTOMER_DETAILS' => '顧客アカウントの設定',
    'BOX_CONFIGURATION_DEFINE_PAGE_STATUS' => '定番ページの表示設定',
    'BOX_CONFIGURATION_EMAIL_OPTIONS' => 'メールの設定',
    'BOX_CONFIGURATION_EZPAGES_SETTINGS' => 'EZ-Pagesの設定s',
    'BOX_CONFIGURATION_FEATURED_LISTING' => 'おすすめ商品リストの設定',
    'BOX_CONFIGURATION_GV_COUPONS' => 'ギフト券・クーポン券の設定',
    'BOX_CONFIGURATION_GZIP_COMPRESSION' => 'GZip圧縮の設定',
    'BOX_CONFIGURATION_IMAGES' => '画像の設定',
    'BOX_CONFIGURATION_INDEX_LISTING' => 'トップページの表示設定',
    'BOX_CONFIGURATION_LAYOUT_SETTINGS' => 'レイアウトの設定',
    'BOX_CONFIGURATION_LOGGING' => 'ログの設定',
    'BOX_CONFIGURATION_MAXIMUM_VALUES' => '最大値の設定',
    'BOX_CONFIGURATION_MINIMUM_VALUES' => '最小値の設定',
    'BOX_CONFIGURATION_MY_STORE' => 'ショップ全般の設定',
    'BOX_CONFIGURATION_NEW_LISTING' => '新着商品リストの設定',
    'BOX_CONFIGURATION_PRODUCT_INFO' => '商品ページの設定',
    'BOX_CONFIGURATION_PRODUCT_LISTING' => '商品リストの設定',
    'BOX_CONFIGURATION_REGULATIONS' => '規約関連の設定',
    'BOX_CONFIGURATION_SESSIONS' => 'セッション管理の設定',
    'BOX_CONFIGURATION_SHIPPING_PACKAGING' => '配送料・パッケージの設定',
    'BOX_CONFIGURATION_STOCK' => '在庫の設定',
    'BOX_CONFIGURATION_WEBSITE_MAINTENANCE' => 'レイアウトの設定',
    'BOX_COUPON_ADMIN' => 'クーポン券の管理',
    'BOX_COUPON_RESTRICT' => 'クーポン券の規制',
    'BOX_CUSTOMERS_CUSTOMERS' => '顧客管理',
    'BOX_CUSTOMERS_CUSTOMER_GROUPS' => '顧客グループ',
    'BOX_CUSTOMERS_GROUP_PRICING' => '割引顧客グループの管理',
    'BOX_CUSTOMERS_INVOICE' => '納品書',
    'BOX_CUSTOMERS_ORDERS' => '注文管理',
    'BOX_CUSTOMERS_PACKING_SLIP' => '配送票',
    'BOX_CUSTOMERS_PAYPAL' => 'PayPal IPN',
    'BOX_ENTRY_COUNTER' => 'ヒット数:',
    'BOX_ENTRY_COUNTER_DATE' => 'ヒット数カウント開始日:',
    'BOX_GV_ADMIN_MAIL' => '' . '%%TEXT_GV_NAMES%%' . 'をメール送付',
    'BOX_GV_ADMIN_QUEUE' => '承認待ち' . '%%TEXT_GV_NAMES%%',
    'BOX_GV_ADMIN_SENT' => '%%TEXT_GV_NAMES%%' . 'の送付記録',
    'BOX_HEADING_ADMIN_ACCESS' => '管理者の設定',
    'BOX_HEADING_CATALOG' => '商品の管理',
    'BOX_HEADING_CONFIGURATION' => '一般設定',
    'BOX_HEADING_CUSTOMERS' => '顧客・注文の管理',
    'BOX_HEADING_EXTRAS' => 'その他',
    'BOX_HEADING_GV_ADMIN' => 'クーポン券',
    'BOX_HEADING_LOCALIZATION' => 'ローカライズ',
    'BOX_HEADING_LOCATION_AND_TAXES' => '地域・税率設定',
    'BOX_HEADING_MODULES' => 'モジュール',
    'BOX_HEADING_PRODUCT_TYPES' => '商品タイプ',
    'BOX_HEADING_REPORTS' => '販促レポート',
    'BOX_HEADING_TOOLS' => '追加設定・ツール',
    'BOX_LOCALIZATION_CURRENCIES' => '通貨設定',
    'BOX_LOCALIZATION_LANGUAGES' => '言語設定',
    'BOX_LOCALIZATION_ORDERS_STATUS' => '注文ステータス設定',
    'BOX_MODULES_ORDER_TOTAL' => '注文合計',
    'BOX_MODULES_PAYMENT' => '支払い',
    'BOX_MODULES_PLUGINS' => 'プラグインの管理',
    'BOX_MODULES_SHIPPING' => '配送',
    'BOX_REPORTS_CUSTOMERS_REFERRALS' => '顧客紹介の状況',
    'BOX_REPORTS_ORDERS_TOTAL' => '顧客別の売上ランキング',
    'BOX_REPORTS_PRODUCTS_LOWSTOCK' => '顧客別の売上ランキング',
    'BOX_REPORTS_PRODUCTS_PURCHASED' => '商品の販売数ランキング',
    'BOX_REPORTS_PRODUCTS_VIEWED' => '商品の閲覧回数ランキング',
    'BOX_TAXES_COUNTRIES' => '国名設定',
    'BOX_TAXES_GEO_ZONES' => '地域定義設定',
    'BOX_TAXES_TAX_CLASSES' => '税種別設定',
    'BOX_TAXES_TAX_RATES' => '税率設定',
    'BOX_TAXES_ZONES' => '地域設定',
    'BOX_TOOLS_BANNER_MANAGER' => 'バナーの管理',
    'BOX_TOOLS_DEFINE_CONDITIONS' => 'ご利用規約',
    'BOX_TOOLS_DEFINE_PAGES_EDITOR' => '定番ページの編集',
    'BOX_TOOLS_DEVELOPERS_TOOL_KIT' => '開発者用ツール',
    'BOX_TOOLS_EZPAGES' => 'EZ-ページ',
    'BOX_TOOLS_LAYOUT_CONTROLLER' => 'サイドボックスの表示設定',
    'BOX_TOOLS_MAIL' => 'メールの送信',
    'BOX_TOOLS_NEWSLETTER_MANAGER' => 'メールマガジンの管理',
    'BOX_TOOLS_SERVER_INFO' => 'サーバ情報のチェック',
    'BOX_TOOLS_SQLPATCH' => 'SQLパッチのインストール',
    'BOX_TOOLS_STORE_MANAGER' => 'ショップ管理ツール',
    'BOX_TOOLS_TEMPLATE_SELECT' => 'テンプレートの設定',
    'BOX_TOOLS_WHOS_ONLINE' => 'オンラインユーザのチェック',
    'BUTTON_ADD_PRODUCT_TYPES_SUBCATEGORIES_OFF' => 'サブカテゴリを対象とせず制限を追加',
    'BUTTON_ADD_PRODUCT_TYPES_SUBCATEGORIES_ON' => 'サブカテゴリも対象として制限を追加',
    'BUTTON_NEXT_ALT' => '次の商品',
    'BUTTON_PREVIOUS_ALT' => '前の商品',
    'BUTTON_PRODUCTS_TO_CATEGORIES' => 'カテゴリリンクマネージャー',
    'CATEGORY_ADDRESS' => 'ご住所',
    'CATEGORY_COMPANY' => '会社名',
    'CATEGORY_CONTACT' => 'ご連絡先',
    'CATEGORY_HAS_SUBCATEGORIES' => '注意：カテゴリにサブカテゴリがあります。<br>商品を追加できません。',
    'CATEGORY_OPTIONS' => 'オプション',
    'CATEGORY_PERSONAL' => 'アカウント',
    'CHARSET' => 'utf-8',
    'CONFIGURATION_MENU_ENTRIES_TO_SORT_BY_NAME' => '1',
    'CONNECTION_TYPE_UNKNOWN' => '\'%s\'は、URL を生成するための有効な接続タイプではありません' . PHP_EOL . '%s' . PHP_EOL,
    'DATE_FORMAT' => 'Y/m/d',
    'DATE_FORMAT_DATE_PICKER' => 'yy-mm-dd',
    'DATE_FORMAT_LONG' => '%Y年%m月%d日（%a）',
    'DATE_FORMAT_SHORT' => '%Y/%m/%d',
    'DATE_FORMAT_SPIFFYCAL' => 'yyyy/MM/dd',
    'DATE_TIME_FORMAT' => '%%DATE_FORMAT_SHORT%%' . ' %H:%M:%S',
    'DEDUCTION_TYPE_DROPDOWN_0' => '値引き額',
    'DEDUCTION_TYPE_DROPDOWN_1' => '率（%）',
    'DEDUCTION_TYPE_DROPDOWN_2' => '新しい価格',
    'DEFINE_LANGUAGE' => '言語ファイル管理',
    'EDITOR_NONE' => 'プレーンテキスト',
    'EMAIL_SALUTATION' => '',
    'EMAIL_SEND_FAILED' => 'エラー: "%s"へのメール送信が失敗しました <%s> 件名: "%s"',
    'ENTRY_CITY' => '市区町村：',
    'ENTRY_CITY_ERROR' => '&nbsp;<span class="errorText">' . ENTRY_CITY_MIN_LENGTH . '文字以上</span>',
    'ENTRY_COMPANY' => '会社名：',
    'ENTRY_COMPANY_ERROR' => '',
    'ENTRY_COUNTRY' => '国名：',
    'ENTRY_COUNTRY_ERROR' => '',
    'ENTRY_DATE_OF_BIRTH' => '生年月日：',
    'ENTRY_DATE_OF_BIRTH_ERROR' => '&nbsp;<span class="errorText">（記入例： 1980/05/21）</span>',
    'ENTRY_DATE_PURCHASED' => '購入日：',
    'ENTRY_EMAIL_ADDRESS' => 'E-Mail アドレス：',
    'ENTRY_EMAIL_ADDRESS_CHECK_ERROR' => '&nbsp;<span class="errorText">このメールアドレスは不正です。</span>',
    'ENTRY_EMAIL_ADDRESS_ERROR' => '&nbsp;<span class="errorText">' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . '文字以上</span>',
    'ENTRY_EMAIL_ADDRESS_ERROR_EXISTS' => '&nbsp;<span class="errorText">このメールアドレスは既に登録されています。</span>',
    'ENTRY_EMAIL_HTML_DISPLAY' => 'HTML',
    'ENTRY_EMAIL_PREFERENCE' => 'メールフォーマット設定：',
    'ENTRY_EMAIL_TEXT_DISPLAY' => 'テキスト形式',
    'ENTRY_FAX_NUMBER' => 'Fax番号：',
    'ENTRY_FIRST_NAME' => '名：',
    'ENTRY_FIRST_NAME_ERROR' => '&nbsp;<span class="errorText">' . ENTRY_FIRST_NAME_MIN_LENGTH . '文字以上</span>',
    'ENTRY_FIRST_NAME_KANA' => '名ふりがな：',
    'ENTRY_FIRST_NAME_KANA_ERROR' => '&nbsp;<span class="errorText">' . ENTRY_FIRST_NAME_MIN_LENGTH . '文字以上</span>',
    'ENTRY_GENDER' => '性別：',
    'ENTRY_GENDER_ERROR' => '&nbsp;<span class="errorText">必須です</span>',
    'ENTRY_LAST_NAME' => '姓：',
    'ENTRY_LAST_NAME_ERROR' => '&nbsp;<span class="errorText">' . ENTRY_LAST_NAME_MIN_LENGTH . '文字以上</span>',
    'ENTRY_LAST_NAME_KANA' => '姓ふりがな：',
    'ENTRY_LAST_NAME_KANA_ERROR' => '&nbsp;<span class="errorText">' . ENTRY_LAST_NAME_MIN_LENGTH . '文字以上</span>',
    'ENTRY_NAME_KANA' => 'ふりがな： ',
    'ENTRY_NEWSLETTER' => 'メールマガジン：',
    'ENTRY_NEWSLETTER_NO' => '購読しない',
    'ENTRY_NEWSLETTER_YES' => '購読する',
    'ENTRY_NOTHING_TO_SEND' => 'メッセージの入力内容がありません。',
    'ENTRY_ORDER_ID' => '注文番号',
    'ENTRY_PASSWORD_CHANGE_ERROR' => '<strong>新しいパスワードを設定できませんでした。</strong><br>',
    'ENTRY_POST_CODE' => '郵便番号：',
    'ENTRY_POST_CODE_ERROR' => '&nbsp;<span class="errorText">' . ENTRY_POSTCODE_MIN_LENGTH . '文字以上</span>',
    'ENTRY_PRICING_GROUP' => '割引顧客グループ',
    'ENTRY_SHIP_TO' => 'お届け先：',
    'ENTRY_SOLD_TO' => 'ご購入者：',
    'ENTRY_STATE' => '都道府県：',
    'ENTRY_STATE_ERROR' => '&nbsp;<span class="errorText">必須</span>',
    'ENTRY_STREET_ADDRESS' => '番地 建物名：',
    'ENTRY_STREET_ADDRESS_ERROR' => '&nbsp;<span class="errorText">' . ENTRY_STREET_ADDRESS_MIN_LENGTH . '文字以上</span>',
    'ENTRY_SUBURB' => '住所2：',
    'ENTRY_SUBURB_ERROR' => '',
    'ENTRY_TELEPHONE_NUMBER' => '電話番号：',
    'ENTRY_TELEPHONE_NUMBER_ERROR' => '&nbsp;<span class="errorText">' . ENTRY_TELEPHONE_MIN_LENGTH . '文字以上</span>',
    'ERROR_ADMIN_SECURITY_WARNING' => '警告: 管理者ログインが安全ではありません ... 初期ログイン設定の Admin admin がまだ残っているか、demo demoonly が、まだ削除されていないか、変更されていません。<br />セキュリティのためにすぐにこれらの管理者設定を変更してください。',
    'ERROR_CANNOT_DELETE_CUSTOMER_GROUP_DUE_TO_LINKED_CUSTOMERS' => 'エラー： %s の顧客がまだ割り当てられており、オーバーライドが指定されていないため、グループを削除できません。',
    'ERROR_CANNOT_LINK_TO_SAME_CATEGORY' => 'エラー： 同じカテゴリ内に商品リンクすることはできません。',
    'ERROR_CANNOT_MOVE_CATEGORY_TO_CATEGORY_SELF' => 'エラー： 同じカテゴリにカテゴリを移動することはできません！ ID: ',
    'ERROR_CANNOT_MOVE_CATEGORY_TO_PARENT' => 'エラー： サブカテゴリ内に親カテゴリを動かすことはできません。',
    'ERROR_CANNOT_MOVE_PRODUCT_TO_CATEGORY_SELF' => 'エラー： 同一カテゴリです。商品を移動することはできません。',
    'ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST' => 'エラー： カタログ画像ディレクトリが存在していません。: ' . DIR_FS_CATALOG_IMAGES,
    'ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE' => 'エラー： カタログ画像ディレクトリに書き込み権限がありません。: ' . DIR_FS_CATALOG_IMAGES,
    'ERROR_CATEGORY_HAS_PRODUCTS' => 'エラー： カテゴリ内に商品が登録されています!<br><br>カテゴリ登録作業のため仮に許可されていますが、一つのカテゴリに対して商品とカテゴリの両方を登録する事はできません！',
    'ERROR_CONTACTING_PROJECT_VERSION_SERVER' => 'エラー：バージョン管理サーバーにアクセスできませんでした。',
    'ERROR_CURRENCY_INVALID' => 'エラー： %s (%s) に対する %s を使った為替レートが更新されませんでした。 通貨コードは正しく設定されていますか？',
    'ERROR_DATABASE_MAINTENANCE_NEEDED' => '<a href="https://docs.zen-cart.com/user/troubleshooting/error_71_maintenance_required/" rel="noopener" target="_blank">ERROR 0071 データベースに問題があるようです。 メンテナンスが必要です。</a>',
    'ERROR_DEFINE_OPTION_NAMES' => '警告： オプション名の定義がされていません。',
    'ERROR_DEFINE_OPTION_VALUES' => '警告： オプション値の定義がされていません。',
    'ERROR_DEFINE_PRODUCTS' => '警告： 商品の定義がされていません。',
    'ERROR_DEFINE_PRODUCTS_MASTER_CATEGORIES_ID' => '警告： マスターカテゴリのIDはこの商品に設定されていません。',
    'ERROR_DESTINATION_DOES_NOT_EXIST' => 'エラー：送り先が存在しません。%s',
    'ERROR_DESTINATION_NOT_WRITEABLE' => 'エラー： 送り先が書き込み不可になっています。%ss',
    'ERROR_DIRECTORY_NOT_REMOVEABLE' => 'エラー：指定のディレクトリを削除できませんでした。サーバーのパミッション設定による制限のため、FTPを使ってディレクトリを削除する必要があるかもしれません。',
    'ERROR_EDITOR_NOT_FOUND' => '「マイ ストア」で現在選択されている HTML エディタ（%s）は使用できません。サイトの既定のエディターは、その選択内容を使用可能な HTML エディターに更新するまではプレーンテキストになります。',
    'ERROR_EDITORS_FOLDER_NOT_FOUND' => '\'マイ ストア\' で HTML エディタが選択されていますが、\'/editors/\' フォルダが見つかりません。選択を無効にするか、エディタ ファイルを \''.DIR_WS_CATALOG.'editors/\' フォルダに移動してください。',
    'ERROR_FILETYPE_NOT_ALLOWED' => 'エラー： ファイルアップロードが許可されていません。%s',
    'ERROR_FILE_NOT_REMOVEABLE' => 'エラー：指定されたファイルを削除できませんでした。 サーバーのパミッション設定の問題の可能性があります。FTPを使って手動で削除してください。',
    'ERROR_FILE_NOT_SAVED' => 'エラー: アップロードしたファイルは保存されませんでした。',
    'ERROR_FILE_TOO_BIG' => '警告：ファイルのサイズが許可されたサイズを超えています。画像ファイルの設定をご確認ください。',
    'ERROR_MODULE_REMOVAL_PROHIBITED' => 'エラー：モジュールの削除が禁止されています：',
    'ERROR_NOTHING_SELECTED' => '何も選択されていません ... 変更されていません',
    'ERROR_NO_DATA_TO_SAVE' => 'エラー：送信されたデータには何も含まれていませんでした。変更内容は何も保存されていません！ ご利用中のブラウザ、もしくはインターネット接続に問題があるかもしれません。',
    'ERROR_NO_DEFAULT_CURRENCY_DEFINED' => 'エラー：デフォルトの通貨が設定されていません。「ローカライズ」->「通貨設定」から設定してください。',
    'ERROR_ORDER_WEIGHT_ZERO_STATUS' => '<strong>警告：</strong> 配送料無料に重量0が設定されているので、配送料無料モジュールは無効です',
    'ERROR_PASSWORDS_NOT_MATCHING' => 'パスワードとパスワード(確認用)は同じでなければなりません。',
    'ERROR_PASSWORD_RULES' => 'パスワードは半角英数字を混在させ、%s 文字以上でなければなりません。現在のパスワードと直近4つのパスワードは使用できません。パスワードは、90日おきに期限切れになり、新しいパスワードの入力を求められるようになります。',
    'ERROR_PAYMENT_MODULES_NOT_DEFINED' => '注: 支払いモジュールが起動していません。モジュールから支払いをクリックし、設定してください。',
    'ERROR_SHIPPING_CONFIGURATION' => '<strong>配送設定エラー!</strong>',
    'ERROR_SHIPPING_MODULES_NOT_DEFINED' => '注: 配送モジュールが起動していません。モジュールから配送をクリックし、設定してください。',
    'ERROR_SHIPPING_ORIGIN_ZIP' => '<strong>警告:</strong> ショップの郵便番号が設定されていません。',
    'ERROR_TOKEN_EXPIRED_PLEASE_RESUBMIT' => 'エラー：データの処理中にエラーがありました。 もう一度情報を再提出してください。',
    'ERROR_UNABLE_TO_DISPLAY_SERVER_INFORMATION' => '申し訳ありません。 PHP 設定情報を表示することが出来ません。ご利用のサーバーでは、php.ini の[disable_functions] 設定において、[phpinfo] が利用できない様に設定されているようです。',
    'ERROR_USPS_STATUS' => '<strong>警告：</strong>USPS 出荷モジュールにユーザー名がないか、PRODUCTION ではなく TEST に設定されていて機能しません。<br>USPS の配送見積もりを取得できない場合は、USPS に連絡して、運用サーバーで Web ツール アカウントを有効にしてください。 1-800-344-7779 か icustomercare@usps.com',
    'FEMALE' => '女性',
    'HEADER_ALT_TEXT' => 'Admin Powered by Zen Cart :: The Art of E-Commerce',
    'HEADER_LOGO_IMAGE' => 'logo.gif',
    'HEADER_LOGO_WIDTH' => '192',
    'HEADER_LOGO_HEIGHT' => '68',
    'HEADER_TITLE_ACCOUNT' => 'マイアカウント',
    'HEADER_TITLE_LOGOFF' => 'ログオフ',
    'HEADER_TITLE_ONLINE_CATALOG' => 'オンラインショップ',
    'HEADER_TITLE_SUPPORT_SITE' => 'サポート',
    'HEADER_TITLE_TOP' => '管理者ホーム',
    'HEADER_TITLE_VERSION' => 'バージョン',
    'HEADING_TITLE_VAL' => 'オプション値',
    'HEADING_TITLE_SEARCH_DETAIL' => '検索： ',
    'HEADING_TITLE_SEARCH_DETAIL_REPORTS' => '商品ID検索（コンマ区切り）',
    'HEADING_TITLE_SEARCH_DETAIL_REPORTS_NAME_MODEL' => '商品名・型番で検索',
    'HELPTEXT_WHOLESALE_POPUP_TITLE' => '卸売価格の設定',
    'HELPTEXT_WHOLESALE_PRICES' => '小売価格のみの場合は 0 を入力します。 それ以外の場合は、卸売価格レベルをマイナス記号 (-) で区切って入力します。 価格レベルは、固定金額またはパーセントオフのいずれかです。 たとえば、「2.00-10%-1.00」の場合、レベル 1 の顧客には 2.00、レベル 2 の顧客には 10% オフ、レベル 3 以上の顧客には 1.00 の価格が与えられます。',
    'HTML_PARAMS' => 'dir="ltr" lang="ja"',
    'ICON_COPY_TO' => '複製',
    'ICON_CROSS' => '偽(False)',
    'ICON_DELETE' => '削除',
    'ICON_EDIT' => '編集',
    'ICON_EDIT_METATAGS' => 'Metaタグ編集',
    'ICON_ERROR' => 'エラー',
    'ICON_FOLDER' => 'フォルダ',
    'ICON_MOVE' => '移動',
    'ICON_PREVIEW' => 'プレビュー',
    'ICON_SELECTED' => '選択された行',
    'ICON_STATISTICS' => '統計',
    'ICON_SUCCESS' => '成功',
    'ICON_TICK' => '真(True)',
    'ICON_WARNING' => '警告',
    'IMAGE_ADD_BLANK_DISCOUNTS' => DISCOUNT_QTY_ADD . '空白の割引数量を追加',
    'IMAGE_BACK' => '戻る',
    'IMAGE_CANCEL' => 'キャンセル',
    'IMAGE_CATEGORY' => 'カテゴリー',
    'IMAGE_CONFIRM' => '確認',
    'IMAGE_COPY' => 'コピー',
    'IMAGE_COPY_TO' => '複製',
    'IMAGE_DEFINE_ZONES' => '地域設定',
    'IMAGE_DELETE' => '削除',
    'IMAGE_DETAILS' => '詳細',
    'IMAGE_DISPLAY' => '表示',
    'IMAGE_EDIT' => '編集',
    'IMAGE_EDIT_ATTRIBUTES' => '商品オプション編集',
    'IMAGE_EDIT_PRODUCT' => '並び順更新',
    'IMAGE_EMAIL' => 'Ｅメール',
    'IMAGE_FORGET_ONLY' => '忘れるだけ',
    'IMAGE_GIFT_QUEUE' => '処理待ち ' . '%%TEXT_GV_NAME%%',
    'IMAGE_GO' => 'ゴ',
    'IMAGE_ICON_INFO' => '情報',
    'IMAGE_ICON_LINKED' => '製品がリンクされています',
    'IMAGE_ICON_STATUS_GREEN' => '有効',
    'IMAGE_ICON_STATUS_OFF' => 'ステータス - 無効',
    'IMAGE_ICON_STATUS_ON' => 'ステータス - 有効',
    'IMAGE_ICON_STATUS_RED' => '無効',
    'IMAGE_ICON_STATUS_RED_EZPAGES' => 'エラー：　入力された URL/コンテンツ タイプが多すぎます',
    'IMAGE_ICON_STATUS_RED_LIGHT' => '無効にする',
    'IMAGE_INSERT' => '挿入',
    'IMAGE_INSTALL_FEATURED' => 'おすすめ商品情報を追加',
    'IMAGE_INSTALL_SPECIAL' => '特別価格情報を追加',
    'IMAGE_LIST' => 'リスト',
    'IMAGE_MODULE_HELP' => 'モジュールのヘルプ',
    'IMAGE_MODULE_INSTALL' => 'モジュールのインストール',
    'IMAGE_MODULE_REMOVE' => 'モジュールのアンインストール',
    'IMAGE_MOVE' => '移動',
    'IMAGE_NEW_BANNER' => '新しいバナー',
    'IMAGE_NEW_CATEGORY' => '新しいカテゴリー',
    'IMAGE_NEW_COUNTRY' => '新しい国名',
    'IMAGE_NEW_CURRENCY' => '新しい通貨',
    'IMAGE_NEW_LANGUAGE' => '新しい言語',
    'IMAGE_NEW_NEWSLETTER' => '新しいメールマガジン',
    'IMAGE_NEW_PRODUCT' => '新しい商品',
    'IMAGE_NEW_SALE' => '新しいセール',
    'IMAGE_NEW_TAX_CLASS' => '新しい税種別',
    'IMAGE_NEW_TAX_RATE' => '新税率',
    'IMAGE_NEW_ZONE' => '新しい地域',
    'IMAGE_OPTION_NAMES' => 'オプション名の管理',
    'IMAGE_OPTION_VALUES' => 'オプション値の管理',
    'IMAGE_ORDER' => '注文',
    'IMAGE_ORDERS' => '注文',
    'IMAGE_ORDERS_INVOICE' => '納品書',
    'IMAGE_ORDERS_PACKINGSLIP' => '配送票',
    'IMAGE_PREVIEW' => 'プレビュー',
    'IMAGE_PRODUCTS_PRICE_MANAGER' => '商品価格の管理',
    'IMAGE_PRODUCTS_TO_CATEGORIES' => '複数カテゴリリンク設定',
    'IMAGE_RELEASE' => '償 ' . '%%TEXT_GV_NAME%%' . 'をリリースする',
    'IMAGE_REMOVE_FEATURED' => 'おすすめ商品情報を削除する',
    'IMAGE_REMOVE_SPECIAL' => '特別価格を削除する',
    'IMAGE_RESET' => 'リセット',
    'IMAGE_RESET_PWD' => 'パスワードをリセット',
    'IMAGE_SAVE' => '保存',
    'IMAGE_SELECT' => '選択',
    'IMAGE_SEND' => '送信',
    'IMAGE_SEND_EMAIL' => 'メール送信',
    'IMAGE_SUBMIT' => '送信',
    'IMAGE_TAX_RATES' => '税率',
    'IMAGE_UPDATE' => '更新',
    'IMAGE_UPDATE_CURRENCIES' => '為替レート更新',
    'IMAGE_UPDATE_PRICE_CHANGES' => '商品価格の更新',
    'IMAGE_UPLOAD' => 'アップロード',
    'IMAGE_VIEW' => '表示する',
    'JS_COUNTRY' => '* 国番号を選択する必要があります。\n',
    'JS_ERROR' => 'エラー： フォームの内容にエラーがあります。\n以下の内容を確認してください。\n\n',
    'JS_ERROR_SUBMITTED' => 'フォームは既に送信済みです。 OKを押して、処理が完了するまでお待ちください。',
    'JS_GENDER' => '* 性別を選択してください。\n',
    'JS_STATE' => '* 都道府県を入力してください。\n',
    'JS_STATE_SELECT' => '-- 選択してください --',
    'MALE' => '男性',
    'MENU_CATEGORIES_TO_SORT_BY_NAME' => 'レポート,ツール',
    'NONE' => '無し',
    'NOT_INSTALLED_TEXT' => 'インストールされていません',
    'OTHER_IMAGE_CALL_FOR_PRICE' => 'call_for_prices.png',
    'OTHER_IMAGE_PRICE_IS_FREE' => 'free.png',
    'PAYMENT_MODULE_GV' => 'GV/DC',     //- 注：　この値は、ストアフロントの lang.japanese.phpでも定義されています。これが変更された場合は、必ず両方を更新してください！
    'PHP_DATE_TIME_FORMAT' => 'm/d/Y H:i:s',
    'PLEASE_SELECT' => '選択してください...',
    'PLUGIN_INSTALL_SQL_FAILURE' => 'データベースエラーが発生しています',
    'PREVNEXT_BUTTON_NEXT' => '[次&nbsp;&raquo;]',
    'PREVNEXT_BUTTON_PREV' => '[&laquo;&nbsp;前]',
    'PREVNEXT_TITLE_NEXT_PAGE' => '次のページ',
    'PREVNEXT_TITLE_NEXT_SET_OF_NO_PAGE' => '次の %d ページ分のセット',
    'PREVNEXT_TITLE_PAGE_NO' => 'ページ %d',
    'PREVNEXT_TITLE_PREVIOUS_PAGE' => '前のページ',
    'PREVNEXT_TITLE_PREV_SET_OF_NO_PAGE' => '前の %d ページ分のセット',
    'PREV_NEXT_PRODUCT' => '商品： ',
    'PRODUCTS_PRICE_IS_CALL_FOR_PRICE_TEXT' => '価格 問い合せ',
    'PRODUCTS_PRICE_IS_FREE_TEXT' => '価格無料',
    'PRODUCTS_QUANTITY_MAX_TEXT_LISTING' => '最大：',
    'PRODUCTS_QUANTITY_MIN_TEXT_LISTING' => '最小：',
    'PRODUCTS_QUANTITY_UNIT_TEXT_LISTING' => '単位：',
    'PRODUCT_PRICE_DISCOUNT_AMOUNT' => '&nbsp;オフ',
    'PRODUCT_PRICE_DISCOUNT_PERCENTAGE' => '% オフ',
    'PRODUCT_PRICE_DISCOUNT_PREFIX' => '割引額：&nbsp;',
    'PRODUCT_PRICE_SALE' => 'セール：&nbsp;',
    'PRODUCTS_ATTRIBUTES_ADDING' => '新しい属性の追加',
    'PRODUCTS_ATTRIBUTES_DELETE' => '削除中',
    'PRODUCTS_ATTRIBUTES_EDITING' => '編集',
    'RESET_ADMIN_ACTIVITY_LOG' => '管理人のログ記録をリセットするため、管理人画面へ移動します。',
    'STORE_HOME' => 'ショップホーム：',
    'SUCCESS_CATEGORY_MOVED' => '成功： カテゴリは正常に移動しました。',
    'SUCCESS_FILE_SAVED_SUCCESSFULLY' => '成功： アップロードされたファイルが保存されました。%s',
    'SUCCESS_PRODUCT_UPDATE_SORT' => '商品の並べ替え順の更新に成功しました　－　ID#　',
    'TABLE_ATTRIBUTES_QTY_PRICE_PRICE' => '価格',
    'TABLE_ATTRIBUTES_QTY_PRICE_QTY' => '数量',
    'TABLE_HEADING_ACTION' => 'アクション',
    'TABLE_HEADING_AVAILABLE_DATE' => '使用可能日',
    'TABLE_HEADING_ACTIVE_FROM' => '有効日',
    'TABLE_HEADING_COMMENTS' => 'コメント',
    'TABLE_HEADING_CONFIGURATION_TITLE' => 'タイトル',
    'TABLE_HEADING_CONFIGURATION_VALUE' => '設定値',
    'TABLE_HEADING_COUNTRY_NAME' => '国',
    'TABLE_HEADING_CUSTOMERS' => 'お客様',
    'TABLE_HEADING_CUSTOMER_NOTIFIED' => '顧客通知',
    'TABLE_HEADING_DATE_ADDED' => '追加日',
    'TABLE_HEADING_EXPIRES_DATE' => '有効期限',
    'TABLE_HEADING_ID' => 'ID',
    'TABLE_HEADING_MODEL' => '型番',
    'TABLE_HEADING_MODULE' => 'モジュール',
    'TABLE_HEADING_MODULES' => 'モジュール',
    'TABLE_HEADING_NEWSLETTERS' => 'メールマガジン',
    'TABLE_HEADING_NUMBER' => 'ID#',
    'TABLE_HEADING_NO' => 'いいえ',
    'TABLE_HEADING_OPTION_NAME' => 'オプション名',
    'TABLE_HEADING_OPTION_PRICE' => '価格',
    'TABLE_HEADING_OPTION_PRICE_W' => '卸売価格',
    'TABLE_HEADING_OPTION_PRICE_PREFIX' => '接頭',
    'TABLE_HEADING_OPTION_VALUE' => 'オプション値',
    'TABLE_HEADING_OPTION_NAME_MAX' => 'オプション名最大',
    'TABLE_HEADING_OPTION_NAME_SIZE' => 'オプション名 サイズ',
    'TABLE_HEADING_OPTION_SORT_ORDER' => 'オプション順',
    'TABLE_HEADING_OPTION_TYPE' => 'オプションの種類',
    'TABLE_HEADING_OPTION_VALUE_MAX' => 'オプション値 最大',
    'TABLE_HEADING_OPTION_VALUE_SIZE' => 'オプション値 サイズ',
    'TABLE_HEADING_OPTION_VALUE_SORT_ORDER' => 'デフォルトの順序',
    'TABLE_HEADING_OPTION_WEIGHT_PREFIX' => '接頭',
    'TABLE_HEADING_OPTION_WEIGHT' => '重さ',
    'TABLE_HEADING_PRICE' => '価格',
    'TABLE_HEADING_PRICE_EXCLUDING_TAX' => '価格（税別）',
    'TABLE_HEADING_PRICE_INCLUDING_TAX' => '価格（税込）',
    'TABLE_HEADING_PRODUCT' => '商品',
    'TABLE_HEADING_PRODUCTS' => '商品',
    'TABLE_HEADING_PRODUCTS_ID' => '商品 ID',
    'TABLE_HEADING_PRODUCTS_MODEL' => '型番',
    'TABLE_HEADING_PRODUCTS_NAME' => '商品名',
    'TABLE_HEADING_PRODUCTS_PRICE' => '価格/特別/セール',
    'TABLE_HEADING_HAS_WHOLESALE_PRICE' => '卸売価格が設定されています',
    'TABLE_HEADING_SALE_DATE_END' => '終了日',
    'TABLE_HEADING_SALE_DATE_START' => '開始日',
    'TABLE_HEADING_SALE_DEDUCTION' => '控除',
    'TABLE_HEADING_SALE_NAME' => 'セール名',
    'TABLE_HEADING_SENT' => '送信済',
    'TABLE_HEADING_SIZE' => 'サイズ',
    'TABLE_HEADING_SORT_ORDER' => '順',
    'TABLE_HEADING_STATUS' => '状況',
    'TABLE_HEADING_STOCK' => '在庫',
    'TABLE_HEADING_TAX' => '税',
    'TABLE_HEADING_TOTAL' => '合計',
    'TABLE_HEADING_TOTAL_EXCLUDING_TAX' => '合計 （税別）',
    'TABLE_HEADING_TOTAL_INCLUDING_TAX' => '合計 （税込）',
    'TABLE_HEADING_YES' => 'はい',
    'TEXT_ACTIVITY_LOG_ACCESSED' => '管理者アクティビティ ログにアクセスしました。 出力形式: %s。 フィルタ: %s。 %s',
    'TEXT_ADMIN_NAME' => 'ユーザー名',
    'TEXT_ADMIN_TAB_PREFIX' => 'Admin',
	'TEXT_ASC' => '昇順',
    'TEXT_ATTRIBUTE_COPY_INSERTING' => 'オプションID #%u を商品ID# %u から商品ID #%u にコピーしました。',
    'TEXT_ATTRIBUTE_COPY_SKIPPING' => 'オプションID #%u の、商品ID #%u へのコピーをスキップしました。',
    'TEXT_ATTRIBUTE_COPY_UPDATING' => 'オプションID #%u を商品ID #%u から更新しました。',
    'TEXT_ATTRIBUTES_INSERT_INFO' => '<strong>属性設定を定義し、挿入を押して適用します</strong>',
    'TEXT_ATTRIBUTE_PRICE_BASE_INCLUDED' => '基本料金に含める<br>属性別価格の場合',
    'TEXT_AVAILABLE_DATE' => '使用可能日：',
    'TEXT_BANNERS_BANNER_CLICKS' => 'バナーのクリック数',
    'TEXT_BANNERS_BANNER_VIEWS' => 'バナー閲覧数',
    'TEXT_BOOLEAN_VALIDATE' => '値はブール値または同等である必要があります。',
    'TEXT_BUTTON_RESET_ACTIVITY_LOG' => '管理人のログ記録をリセットする。',
    'TEXT_CALL_FOR_PRICE' => '価格はお問い合わせください',
    'TEXT_CANCEL' => 'キャンセル',
    'TEXT_CATEGORIES_PRODUCTS' => '商品カテゴリを選択してください',
    'TEXT_CATEGORIES_PRODUCTS_SORT_ORDER_INFO' => 'カテゴリ/商品 並び順： ',
    'TEXT_CATEGORIES_STATUS_INFO_OFF' => '<span class="alert">*カテゴリは無効です</span>',
    'TEXT_CHARGES_LETTERS' => '料金計算結果：',
    'TEXT_CHARGES_WORD' => '料金計算結果：',
    'TEXT_CHECK_ALL' => '全てにチェック',
    'TEXT_CLOSE_WINDOW' => '【閉じる】',
    'TEXT_CONFIRM_PASSWORD' => 'パスワードを認証する',
    'TEXT_COPY_ATTRIBUTES_CONDITIONS' => '<strong>既存の商品属性をどのように処理する必要がありますか？</strong>',
    'TEXT_COPY_ATTRIBUTES_DELETE' => '<strong>最初に</strong>削除してから、新しい属性をコピーします',
    'TEXT_COPY_ATTRIBUTES_IGNORE' => '既存の属性を<strong>無視し</strong、新しい属性のみを追加します',
    'TEXT_COPY_ATTRIBUTES_UPDATE' => '新しい設定/価格で既存の属性を<strong>更新</strong>します',
    'TEXT_CURRENT_VER_IS' => '現在使用している：',
    'TEXT_CUSTOMER' => 'お客様',
    'TEXT_DEFAULT' => 'デフォルト',
    'TEXT_DELETE_IMAGE' => '画像を削除しますか？',
    'TEXT_DESC' => '降順',
    'TEXT_DISCOUNT_COUPON' => '割引券',
    'TEXT_DISPLAY_NUMBER_OF_BANNERS' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_CATEGORIES' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_COUNTRIES' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_COUPONS' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_CURRENCIES' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_CUSTOMERS' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_FEATURED' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_GENERIC' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_GIFT_VOUCHERS' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_GROUPS' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_LANGUAGES' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_MANUFACTURERS' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_NEWSLETTERS' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_OPTIONS' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_ORDERS' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_ORDERS_STATUS' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_PRICING_GROUPS' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_PRODUCTS' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_PRODUCTS_DOWNLOADS_MANAGER' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_PRODUCTS_EXPECTED' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_PRODUCT_TYPES' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_REVIEWS' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_SALES' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_SPECIALS' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_TAX_CLASSES' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_TAX_RATES' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_GEO_ZONES' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_TEMPLATES' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DISPLAY_NUMBER_OF_ZONES' => '<b>%d</b>件を表示（全<b>%d</b>件）',
    'TEXT_DOCS_HELP' => 'Zen Cart ドキュメンテーション サイトで利用可能なヘルプ',
    'TEXT_DOWNLOADABLE_PRODUCTS_MISCONFIGURED' => '一部のダウンロード可能な商品を構成すると、すべてのカート項目の送料が無料になります。[管理] > [カタログ] > [ダウンロード マネージャー] を参照してください。',
    'TEXT_EDITOR_INFO' => 'テキストエディタ',
    'TEXT_EMAIL' => 'メールする',
    'TEXT_EMAIL_ADDRESS_VALIDATE' => '入力されたテキストは、受け入れ可能なメール アドレスとして認識されませんでした、例: 名前 &lt;email@domain&gt; または &lt;email@domain&gt; またはコンマで区切られたこれらの任意の組み合わせ。再入力してください。認識できない値は削除されました。',
    'TEXT_EMAIL_ADDRESS_VALIDATE_SINGLE' => '入力されたテキストは、電子メール アドレス (email@domain) として認識されませんでした。再入力してください。認識できない値は削除されました。',
    'TEXT_ERROR_ATTEMPTED_ADMIN_LOGIN_WITHOUT_CSRF_TOKEN' => 'CSRFトークンを持たないログインの試み。',
    'TEXT_ERROR_ATTEMPTED_ADMIN_LOGIN_WITHOUT_USERNAME' => 'ユーザー名を入力しないログインの試み。',
    'TEXT_ERROR_ATTEMPTED_TO_LOG_IN_TO_LOCKED_ACCOUNT' => 'ロックされたアカウントへのログインの試み：',
    'TEXT_ERROR_FAILED_ADMIN_LOGIN_FOR_USER' => '管理者ログインに失敗しました： ',
    'TEXT_ERROR_INCORRECT_PASSWORD_DURING_RESET_FOR_USER' => 'パスワードリセットを行っている間に行われた不正なパスワード入力の対象： ',
    'TEXT_EZPAGES_STATUS_FOOTER_ADMIN' => '警告: EZ-PAGES FOOTER - 管理人IPのみ有効になっています。',
    'TEXT_EZPAGES_STATUS_HEADER_ADMIN' => '警告: EZ-PAGES HEADER - 管理人IPのみ有効になっています。',
    'TEXT_EZPAGES_STATUS_SIDEBOX_ADMIN' => '警告: EZ-PAGES SIDEBOX - 管理人IPのみ有効になっています。',
    'TEXT_FIELD_REQUIRED' => '&nbsp;<span class="fieldRequired">* 必須</span>',
    'TEXT_FREE' => '無料',
    'TEXT_FREE_SHIPPING_EDIT' => '警告：「常に送料無料」を選択すると、配送先指定の必要な送料無料商品となります。<br>注文される商品がすべて「常に送料無料」商品である場合のために「配送モジュール」で「配送料無料」を有効にする必要があります。',
    'TEXT_FREE_SHIPPING_PREVIEW' => '警告：この商品は、配送先指定の必要な送料無料商品として登録されます。<br>注文される商品がすべて「常に送料無料」商品である場合のために「配送モジュール」で「配送料無料」を有効にする必要があります。',
    'TEXT_GROUP_ALL' => '-- 全て --',
    'TEXT_HIDDEN' => '非表示',
    'TEXT_HIDE' => '隠す',
    'TEXT_ID' => 'ID',
    'TEXT_IMAGES_DELETE' => '<strong>画像を削除しますか？</strong> 注: 商品画像としては削除されますが、サーバーから画像が削除されるわけではありません。',
    'TEXT_IMAGES_OVERWRITE' => '<br><strong>既存のオプション画像を上書きしますか？</strong>',
    'TEXT_IMAGE_CURRENT' => '画像名： ',
    'TEXT_IMAGE_MANUAL' => '<strong>または、サーバーから既存の画像ファイル名を入力して下さい。　ファイル名：</strong>',
    'TEXT_IMAGE_NONEXISTENT' => '画像ファイルが有りません',
    'TEXT_IMAGE_OVERWRITE_WARNING' => '警告: 属性見本画像をアップロードしましたが、上書きできませんでした。 ',
    'TEXT_INFO_ATTRIBUTES_FEATURES_UPDATES' => '<strong>全ての商品のオプションの並び順を更新</strong><br>オプション値の設定で指定した「デフォルトの表示順」に合わせます:<br>',
    'TEXT_INFO_CURRENCY_UPDATED' => '%s (%s) の為替レートは、%s 経由で %s に正常に更新されました。',
    'TEXT_INFO_DATE_ADDED' => '追加日：',
    'TEXT_INFO_EDIT_INTRO' => '必要な変更を加えてください',
    'TEXT_INFO_ID' => ' ID# ',
    'TEXT_INFO_LAST_MODIFIED' => '最終更新日：',
    'TEXT_INFO_MASTER_CATEGORIES_ID' => '<strong>注意： マスターカテゴリは、商品カテゴリ毎にセールなどの価格設定をするような場合に使用します。</strong>',
    'TEXT_INFO_META_TAGS_USAGE' => '<strong>注意：</strong> 「定義済みタグライン」は[meta_tags.php]ファイル内で定義されています。',
    'TEXT_INFO_NO_EDIT_AVAILABLE' => '編集できません',
    'TEXT_INFO_OPTION_NAMES_VALUES_COPIER_STATUS' => 'オプション一括設定メニューは現在非表示です',
    'TEXT_INFO_SEARCH_DETAIL_FILTER' => '検索フィルタ： ',
    'TEXT_INFO_SEARCH_FILTER_REPOPULATE' => '検索用語の再入力： ',
    'TEXT_INFO_SEARCH_FILTER_RESTRICT_IDS' => '検索を製品/カテゴリ IDs に限定する',
    'TEXT_INFO_SET_MASTER_CATEGORIES_ID' => '無効のマスターカテゴリ ID',
    'TEXT_LEGEND' => '凡例： ',
    'TEXT_LEGEND_LINKED' => 'リンクされた商品',
    'TEXT_LEGEND_META_TAGS' => 'メタタグの定義：',
    'TEXT_LEGEND_STATUS_OFF' => 'ステータス - オフ',
    'TEXT_LEGEND_STATUS_ON' => 'ステータス - オン',
    'TEXT_LETTERS_FREE' => ' 文字無料 ',
    'TEXT_LINKED_PRODUCTS' => 'リンクされた商品：',
    'TEXT_MASTER_CATEGORIES_ID' => '商品マスターカテゴリ：',
    'TEXT_MODEL' => '型番：',
    'TEXT_NEW_PRODUCT' => 'カテゴリ中の商品: &quot;%s&quot;',
    'TEXT_NO' => 'いいえ',
    'TEXT_NOEMAIL' => 'メールしない',
    'TEXT_NONE' => '--なし--',
    'TEXT_NO_ORDER_HISTORY' => '注文履歴はありません。',
    'TEXT_OPTION_ID' => 'オプション ID',
    'TEXT_OPTION_NAME' => 'オプション名',
    'TEXT_PASSWORD' => 'パスワード',
    'TEXT_PER_LETTER' => '<br>文字単位料金： ',
    'TEXT_PER_WORD' => '<br>語句単位料金： ',
    'TEXT_PRICED_BY_ATTRIBUTES' => 'オプションによる価格設定',
    'TEXT_PROCESSED' => '　処理済み。',
    'TEXT_PRODUCT_AVAILABLE' => '有効',
    'TEXT_PRODUCT_IS_PRICED_BY_ATTRIBUTE' => 'ハイ',
    'TEXT_PRODUCT_NOT_AVAILABLE' => '無効',
    'TEXT_PRODUCT_NOT_PRICED_BY_ATTRIBUTE' => 'いいえ',
    'TEXT_PRODUCTS' => '商品：',
    'TEXT_PRODUCTS_ID' => '商品 ID# ',
    'TEXT_PRODUCTS_IMAGE_MANUAL' => '<br><strong>または、サーバーから既存の画像ファイル名を入力して下さい。　ファイル名：</strong>',
    'TEXT_PRODUCTS_MIX_OFF' => '*オプション含まず',
    'TEXT_PRODUCTS_MIX_ON' => '*オプション込み',
    'TEXT_PRODUCTS_MODEL' => '商品型番：',
    'TEXT_PRODUCTS_STATUS_INFO_OFF' => '<span class="alert">*商品は無効です</span>',
    'TEXT_PRODUCT_POPUP_BUTTON' => '<i class="fa-solid fa-comment-dots"></i>',
    'TEXT_PRODUCT_POPUP_TITLE' => '注文商品',
    'TEXT_PRODUCT_TO_VIEW' => '商品を選択し、表示ボタンを押してください。',
    'TEXT_PRODUCT_WEIGHT_UNIT' => 'kg',
    'TEXT_RESULT_PAGE' => '%sページ （全%dページ）',
    'TEXT_SALEMAKER_IMMEDIATELY' => 'すぐに',
    'TEXT_SALEMAKER_NEVER' => '一度もない',
    'TEXT_SET_DEFAULT' => 'デフォルトとして設定',
    'TEXT_SHOW_GV_QUEUE' => '%s 承認待ち ',
    'TEXT_SHOW_OPTION_NAMES_VALUES_COPIER_OFF' => 'オプション一括設定メニュー - 非表示',
    'TEXT_SHOW_OPTION_NAMES_VALUES_COPIER_ON' => 'オプション一括設定メニュー - 表示',
    'TEXT_SORT_CATEGORIES_NAME' => 'カテゴリ名順',
    'TEXT_SORT_CATEGORIES_SORT_ORDER_CATEGORIES_NAME' => 'カテゴリの並び順＞カテゴリ名順',
    'TEXT_SORT_ORDER' => '順',
    'TEXT_SORT_PRODUCTS_MODEL' => '型番順',
    'TEXT_SORT_PRODUCTS_NAME' => '商品名順',
    'TEXT_SORT_PRODUCTS_PRICE' => '価格昇順＞商品名順',
    'TEXT_SORT_PRODUCTS_PRICE_DESC' => '価格降順＞商品名順',
    'TEXT_SORT_PRODUCTS_QUANTITY' => '在庫数昇順＞商品名順',
    'TEXT_SORT_PRODUCTS_QUANTITY_DESC' => '在庫数降順＞商品名順',
    'TEXT_SORT_PRODUCTS_SORT_ORDER_PRODUCTS_NAME' => '商品の並び順＞商品名順',
    'TEXT_STATUS_WARNING' => '<strong>注意：</strong>日付を設定しておくと、ステータスが自動的にオン・オフになります。',
	'TEXT_TIME_SPECIFY' => 'お届け時間帯： ',
    'TEXT_TOP' => 'トップ',
    'TEXT_UNCHECK_ALL' => 'チェックを外す',
    'TEXT_UNKNOWN' => '不明',
    'TEXT_UPDATE_SORT_ORDERS_OPTIONS' => '<strong>オプション値のデフォルトからの属性のソート順の更新</strong> ',
    'TEXT_UPLOAD_DIR' => 'ディレクトリにアップロード：',
    'TEXT_VALID_CATEGORIES_ID' => 'カテゴリー ID',
    'TEXT_VERSION_CHECK_BUTTON' => '新しいバージョンの確認',
    'TEXT_VERSION_CHECK_CURRENT' => 'お使いのバージョンの Zen Cart&reg; 現在のようです。',
    'TEXT_VERSION_CHECK_DOWNLOAD' => 'ダウンロードする',
    'TEXT_VERSION_CHECK_NEW_PATCH' => '<span class="alertVersionNew">利用可能な新しいパッチ：</span> v',
    'TEXT_VERSION_CHECK_NEW_VER' => '<span class="alertVersionNew">利用可能な新しいバージョン：</span> v',
    'TEXT_VERSION_CHECK_PATCH' => 'パッチ',
    'TEXT_VIRTUAL_EDIT' => '警告：「バーチャル商品」を選択すると、送料無料-送付設定をスキップする商品となります。<br>注文される商品がすべて「バーチャル商品」である場合「配送情報」画面は表示されません。',
    'TEXT_VIRTUAL_PREVIEW' => '警告： この商品は、送料無料-送付設定をスキップする商品として登録されます。<br>注文される商品がすべて「バーチャル商品」である場合「配送情報」画面は表示されません。',
    'TEXT_VISIBLE' => '表示',
    'TEXT_WARNING_HTML_DISABLED' => '<span class = "main">注意： あなたはテキスト形式のメールを使っています。HTML形式のメールを送りたい場合は一般設定→メールの設定で「メール送信にMIME HTMLを使用」オプションを設定してください。</span>',
    'TEXT_WORDS_FREE' => ' 語無料 ',
    'TEXT_YES' => 'はい',
    'WARNING_ADMIN_ACTIVITY_LOG_DATE' => '警告: ログが2ヶ月蓄積されています。定期的なリセットをお勧めします。',
    'WARNING_ADMIN_ACTIVITY_LOG_RECORDS' => '警告: 管理人のログ記録が50,000件以上に達しました。定期的なリセットをお勧めします。',
    'WARNING_ADMIN_DOWN_FOR_MAINTENANCE' => '<strong>警告：</strong> サイトは現在メンテナンス中のため閉鎖されています。<br>注意： メンテナンス時には、Paymentや送料のモジュールテストを行なうことはできません。',
    'WARNING_ATTRIBUTE_COPY_INVALID_ID' => 'Warning: Attribute Copy to Product ID#%u aborted. Invalid ID',
    'WARNING_ATTRIBUTE_COPY_NO_ATTRIBUTES' => '警告：オプション情報のコピーを中止しました。コピー元の商品IDにはオプションが存在していません #%u, "%s"。',
    'WARNING_ATTRIBUTE_COPY_SAME_ID' => '警告：オプション情報のコピーを中止しました。商品ID #%u から商品ID#%u (同じ商品ID) にはコピーできません。',
    'WARNING_CATEGORY_DOES_NOT_EXIST' => '警告：カテゴリ ID#%u は無効です。存在しません。',
    'WARNING_CONFIG_FILE_WRITEABLE' => '警告：設定ファイル：%sincludes/configure.php。セキュリティ上の危険性を含んでいます。このファイルに対して正しいパミッション設定を行ってください。（読み取り専用、CHMOD 644 か 444 推奨） <a href="https://docs.zen-cart.com/user/miscellaneous/configure/" rel="noopener" target="_blank">FAQをご参照ください。</a>',
    'WARNING_COULD_NOT_LOCATE_LANG_FILE' => '警告：言語ファイルが見つかりません：',
    'WARNING_DATABASE_VERSION_OUT_OF_DATE' => 'データベースのパッチレベルを上げる必要があります。ツール->' . '%%BOX_TOOLS_SERVER_INFO%%' . 'を見てください。',
    'WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT' => '警告： ダウンロード商品用のディレクトリが存在していません：' . DIR_FS_DOWNLOAD . '。 このディレクトリが正しく準備されるまで、ダウンロード商品は動作しません。',
    'WARNING_EMAIL_SYSTEM_DEVELOPER_EMAIL' => '警告：全てのメールは（"DEVELOPER_OVERRIDE_EMAIL_ADDRESS" で設定されている） %s に送信されます。',
    'WARNING_EMAIL_SYSTEM_DEVELOPER_OVERRIDE' => '警告：メールの送信は、開発者用スイッチ"DEVELOPER_OVERRIDE_EMAIL_STATUS" が "false" にセットされているため無効になっています。',
    'WARNING_EMAIL_SYSTEM_DISABLED' => '警告：メール送信サブシステムが無効です。管理画面の「一般設定」＞「メールの設定」で有効にするまで、メールは送信されません。',
    'WARNING_FILE_UPLOADS_DISABLED' => '警告： このPHPではファイルアップロードがサポートされていません。iniファイルを修正してください。',
    'WARNING_INSTALL_DIRECTORY_EXISTS' => 'セキュリティ 警告： インストールディレクトリがまだ残っています： %s。セキュリティ上の理由から、このディレクトリを削除してください。',
    'WARNING_NO_FILE_UPLOADED' => '警告： アップロードファイルが指定されていません。',
    'WARNING_PRIMARY_SERVER_FAILED' => '警告：第１為替サーバー (%s) が %s (%s) の更新に失敗しました。　第2為替サーバーを試みています。',
    'WARNING_REVIEW_ROGUE_ACTIVITY' => '警告：XSS 活動の可能性があります。ログを確認してください：',
    'WARNING_SESSION_AUTO_START' => '警告： session.auto_start が有効になっています。　-　php.ini ファイルでこの設定を無効にしてください。（設定変更を有効にするためには、webサーバの再起動が必要かも知れません。',
    'WARNING_SQL_CACHE_DIRECTORY_NON_EXISTENT' => '警告： SQLキャッシュディレクトリが存在していません： ' . DIR_FS_SQL_CACHE . '. このディレクトリが作られるまで、SQLキャッシュは動作しません。',
    'WARNING_SQL_CACHE_DIRECTORY_NOT_WRITEABLE' => '警告： SQLキャッシュディレクトリに書き込みが出来ません。 ' . DIR_FS_SQL_CACHE . '. 正しくパミッションの設定が行われるまで、SQLキャッシュは動作しません。',
    'WARNING_WELCOME_DISCOUNT_COUPON_EXPIRES_IN' => '警告！ ウェルカムメールのクーポン券は、%s日で期限切れになります。',
    'WHOS_ONLINE_ACTIVE_NO_CART_TEXT' => 'カートなしで有効',
    'WHOS_ONLINE_ACTIVE_TEXT' => 'カートで有効',
    'WHOS_ONLINE_INACTIVE_NO_CART_TEXT' => 'カートなしで非有効',
    'WHOS_ONLINE_INACTIVE_TEXT' => 'カートで非有効',
    '_APRIL' => '4月',
    '_AUGUST' => '8月',
    '_DECEMBER' => '12月',
    '_FEBRUARY' => '2月',
    '_JANUARY' => '1月',
    '_JULY' => '7月',
    '_JUNE' => '6月',
    '_MARCH' => '3月',
    '_MAY' => '5月',
    '_NOVEMBER' => '11月',
    '_OCTOBER' => '10月',
    '_SEPTEMBER' => '9月',
];
return $define;

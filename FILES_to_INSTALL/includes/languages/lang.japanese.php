<?php
// -----
// Since the languages are now loaded via classes, the $locales definition
// needs to be globalized for use in payment-methods (e.g. paypalwpp) and
// other processing.
//
global $locales;
$locales = ['ja_JP', 'ja_JP.utf8', 'ja', 'Japanese.932'];
@setlocale(LC_TIME, $locales);

$define = [
    'ARIA_DELETE_ITEM_FROM_CART' => 'カートからこの商品を削除',
    'ARIA_EDIT_QTY_IN_CART' => 'カート内の数量を変更',
    'ARIA_PAGINATION_' => '',
    'ARIA_PAGINATION_CURRENTLY_ON' => ', 表示中のページ %s',
    'ARIA_PAGINATION_CURRENT_PAGE' => '現在のページ',
    'ARIA_PAGINATION_ELLIPSIS_NEXT' => '次のページグループを取得',
    'ARIA_PAGINATION_ELLIPSIS_PREVIOUS' => '前のページグループを取得',
    'ARIA_PAGINATION_GOTO' => 'Go to ',
    'ARIA_PAGINATION_NEXT_PAGE' => '次のページへ',
    'ARIA_PAGINATION_PAGE_NUM' => 'ページ %s',
    'ARIA_PAGINATION_PREVIOUS_PAGE' => '前のページへ',
    'ARIA_PAGINATION_ROLE_LABEL_FOR' => '%s ページ',
    'ARIA_PAGINATION_ROLE_LABEL_GENERAL' => 'ページ切替',
    'ARIA_QTY_ADD_TO_CART' => 'カートに入れる数量を入力してください',
    'ASK_A_QUESTION' => '商品について問い合わせる',
    'ATTRIBUTES_PRICE_DELIMITER_PREFIX' => ' ( ',
    'ATTRIBUTES_PRICE_DELIMITER_SUFFIX' => ' )',
    'ATTRIBUTES_WEIGHT_DELIMITER_PREFIX' => ' (',
    'ATTRIBUTES_WEIGHT_DELIMITER_SUFFIX' => ') ',
    'BOX_HEADING_BANNER_BOX' => 'スポンサー',
    'BOX_HEADING_BANNER_BOX2' => 'ご存じですか?',
    'BOX_HEADING_BANNER_BOX_ALL' => 'スポンサー',
    'BOX_HEADING_BESTSELLERS' => 'ベストセラー',
    'BOX_HEADING_BRANDS' => 'ブランド別に購入',
    'BOX_HEADING_CATEGORIES' => 'カテゴリ',
    'BOX_HEADING_CURRENCIES' => '通貨',
    'BOX_HEADING_CUSTOMER_ORDERS' => '最近のご注文',
    'BOX_HEADING_FEATURED_CATEGORIES' => '注目のカテゴリー',
    'BOX_HEADING_FEATURED_PRODUCTS' => 'おすすめ',
    'BOX_HEADING_INFORMATION' => 'インフォメーション',
    'BOX_HEADING_LANGUAGES' => '言語',
    'BOX_HEADING_LINKS' => '&nbsp;&nbsp;[詳細]',
    'BOX_HEADING_MANUFACTURERS' => 'メーカー',
    'BOX_HEADING_MANUFACTURER_INFO' => '商品情報',
    'BOX_HEADING_MORE_INFORMATION' => '追加情報',
    'BOX_HEADING_NOTIFICATIONS' => 'お知らせメール',
    'BOX_HEADING_REVIEWS' => 'レビュー',
    'BOX_HEADING_SEARCH' => '商品検索',
    'BOX_HEADING_SHOPPING_CART' => 'カートの中身',
    'BOX_HEADING_SPECIALS' => '特価商品',
    'BOX_HEADING_WHATS_NEW' => '新着商品',
    'BOX_INFORMATION_ABOUT_US' => '会社概要',
    'BOX_INFORMATION_ACCESSIBILITY' => 'アクセシビリティ',
    'BOX_INFORMATION_CONDITIONS' => 'ご利用規約',
    'BOX_INFORMATION_CONTACT' => 'お問い合わせ',
    'BOX_INFORMATION_DISCOUNT_COUPONS' => '割引クーポン',
    'BOX_INFORMATION_ORDER_STATUS' => '注文の状況',
    'BOX_INFORMATION_PAGE_2' => 'ページ 2',
    'BOX_INFORMATION_PAGE_3' => 'ページ 3',
    'BOX_INFORMATION_PAGE_4' => 'ページ 4',
    'BOX_INFORMATION_PRIVACY' => '個人情報保護方針',
    'BOX_INFORMATION_SHIPPING' => '配送と返品について',
    'BOX_INFORMATION_SITE_MAP' => 'サイトマップ',
    'BOX_INFORMATION_UNSUBSCRIBE' => 'メールマガジン登録解除',
    'BOX_MANUFACTURER_INFO_HOMEPAGE' => '%s Webサイト',
    'BOX_MANUFACTURER_INFO_OTHER_PRODUCTS' => '他の商品',
    'BOX_NOTIFICATIONS_NOTIFY' => '<strong>%s</strong>についてのお知らせメールを受け取る',
    'BOX_NOTIFICATIONS_NOTIFY_REMOVE' => '<strong>%s</strong>についてのお知らせメールを受け取らない',
    'BOX_REVIEWS_NO_REVIEWS' => '商品のレビューはまだありません。',
    'BOX_REVIEWS_TEXT_OF_5_STARS' => '%s点 / 5点満点',
    'BOX_REVIEWS_WRITE_REVIEW' => 'この商品のレビューを書く',
    'BOX_SEARCH_ADVANCED_SEARCH' => '詳細検索',
    'BOX_SHOPPING_CART_EMPTY' => 'カートは空です',
    'CAPTION_UPCOMING_PRODUCTS' => 'これらの商品は近日入荷予定です',
    'CART_ITEMS' => 'カートの中身: ',
    'CART_QUANTITY_SUFFIX' => '&nbsp;x ',
    'CART_SHIPPING_METHOD_ADDRESS' => 'ご住所:',
    'CART_SHIPPING_METHOD_ALL_DOWNLOADS' => '- ダウンロード',
    'CART_SHIPPING_METHOD_FREE_TEXT' => '配送料無料',
    'CART_SHIPPING_METHOD_RATES' => '料金',
    'CART_SHIPPING_METHOD_TEXT' => '配送方法',
    'CART_SHIPPING_METHOD_TO' => '配送先: ',
    'CART_SHIPPING_OPTIONS' => '送料計算',
    'CART_SHIPPING_QUOTE_CRITERIA' => '送料は下記住所に基づき計算しております。',
    'CATEGORIES_BOX_HEADING_FEATURED_CATEGORIES' => '注目のカテゴリー...',
    'CATEGORIES_BOX_HEADING_FEATURED_PRODUCTS' => 'おすすめ商品...',
    'CATEGORIES_BOX_HEADING_PRODUCTS_ALL' => '全商品...',
    'CATEGORIES_BOX_HEADING_SPECIALS' => '特価商品 ...',
    'CATEGORIES_BOX_HEADING_WHATS_NEW' => '新着商品...',

    'CATEGORY_COMPANY' => '会社名（会社でご利用の場合）',
    'CATEGORY_PERSONAL' => '個人情報',
    'CHARSET' => 'UTF-8',
    'DATE_FORMAT' => 'Y/m/d',
    'DATE_FORMAT_LONG' => '%Y年%m月%d日(%a)',
    'DATE_TIME_FORMAT_WITHOUT_SECONDS' => '%Y/%m/%d %H:%M',
    'DB_ERROR_NOT_CONNECTED' => 'エラー - データベースに接続できません',
    'DOB_FORMAT_STRING' => 'yyyy/mm/dd',
    'DOWNLOADS_CONTROLLER_ON_HOLD_MSG' => '注意:お支払いが完了するまで商品のダウンロードはできません。',
    'EMAIL_GREET' => '様',
    'EMAIL_SALUTATION' => '',
    'EMAIL_SEND_FAILED' => 'エラー: Eメールの送信に失敗しました。宛先: "%1$s" <%2$s> 件名: "%3$s"',
    'EMPTY_CART_TEXT_NO_QUOTE' => 'セッションの有効期限が切れました．．．送料見積もりの​​ためにショッピングカートを更新してください...',
    'EMP_SHOPPING_FOR_MESSAGE' => '現在のお届け先 %1$s (%2$s).',
    'ENTRY_CITY' => '市町村区:',
    'ENTRY_CITY_ERROR' => '市町村区名は最低' . ENTRY_CITY_MIN_LENGTH . ' 文字以上入力してください。',
    'ENTRY_CITY_TEXT' => '*',
    'ENTRY_COMPANY' => '会社名 部署名:',
    'ENTRY_COMPANY_ERROR' => '会社名 部署名を入力して下さい。',
    'ENTRY_COMPANY_TEXT' => '',
    'ENTRY_COUNTRY' => '国名:',
    'ENTRY_COUNTRY_ERROR' => 'プルダウンメニューから国名を選択してください',
    'ENTRY_COUNTRY_TEXT' => '*',
    'ENTRY_CUSTOMERS_REFERRAL' => '照会コード:',
    'ENTRY_DATE_FROM' => '開始日：',
    'ENTRY_DATE_OF_BIRTH' => '誕生日:',
    'ENTRY_DATE_OF_BIRTH_ERROR' => '生年月日は正しいですか？私たちのシステムでは、次の形式の日付が必要です： YYYY/MM/DD （1970/05/21）',
    'ENTRY_DATE_OF_BIRTH_TEXT' => '誕生日は「1970/05/21」（西暦/月/日）の書式で入力してください。',
    'ENTRY_DATE_TO' => '終了日：',
    'ENTRY_EMAIL' => 'メールアドレス:',
    'ENTRY_EMAIL_ADDRESS' => 'メールアドレス：',
    'ENTRY_EMAIL_ADDRESS_CHECK_ERROR' => 'メールアドレスが正しく入力されていないようです。',
    'ENTRY_EMAIL_ADDRESS_ERROR' => 'メールアドレスは半角で' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . '文字以上入力してください。',
    'ENTRY_EMAIL_ADDRESS_ERROR_EXISTS' => 'このメールアドレスはすでに登録されています。このメールアドレスでログインされるか、違うアドレスでアカウントを登録してください。',
    'ENTRY_EMAIL_ADDRESS_TEXT' => '*',
    'ENTRY_EMAIL_CONTENT_CHECK_ERROR' => 'メッセージの入力がされていないようです。メッセージの欄にお問い合わせ内容を記入して下さい。',
    'ENTRY_EMAIL_HTML_DISPLAY' => 'HTML形式',
    'ENTRY_EMAIL_NAME_CHECK_ERROR' => 'お名前に間違えございませんか？お名前は最低' . ENTRY_FIRST_NAME_MIN_LENGTH . '文字入力してください。',
    'ENTRY_EMAIL_TEXT_DISPLAY' => 'テキスト形式',
    'ENTRY_ENQUIRY' => 'メッセージ:',
    'ENTRY_FAX_NUMBER' => 'FAX 番号：',
    'ENTRY_FAX_NUMBER_TEXT' => '',
    'ENTRY_FIRST_NAME' => '名:',
    'ENTRY_FIRST_NAME_ERROR' => '名は最低' . ENTRY_FIRST_NAME_MIN_LENGTH . '文字以上入力してください。',
    'ENTRY_FIRST_NAME_TEXT' => '*',
    'ENTRY_FIRST_NAME_KANA' => '名ふりがな:',
    'ENTRY_FIRST_NAME_KANA_ERROR' => '名ふりがなは最低' . ENTRY_FIRST_NAME_MIN_LENGTH . '文字以上入力してください。',
    'ENTRY_FIRST_NAME_KANA_TEXT' => '*',
    'ENTRY_GENDER' => '性別：',
    'ENTRY_GENDER_ERROR' => '性別を選択してください',
    'ENTRY_GENDER_TEXT' => '*',
    'ENTRY_INCLUDE_SUBCATEGORIES' => 'サブカテゴリを含める',
    'ENTRY_LAST_NAME' => '姓：',
    'ENTRY_LAST_NAME_ERROR' => '姓は最低' . ENTRY_LAST_NAME_MIN_LENGTH . '文字以上入力してください',
    'ENTRY_LAST_NAME_TEXT' => '*',
    'ENTRY_LAST_NAME_KANA' => '姓ふりがな：',
    'ENTRY_LAST_NAME_KANA_ERROR' => '姓ふりがなは最低' . ENTRY_LAST_NAME_MIN_LENGTH . '文字以上入力してください',
    'ENTRY_LAST_NAME_KANA_TEXT' => '*',
    'ENTRY_NAME' => 'お名前：',
    'ENTRY_NEWSLETTER' => 'メールマガジンを購読する。',
    'ENTRY_NEWSLETTER_TEXT' => '',
    'ENTRY_NICK' => 'フォーラムニックネーム:',
    'ENTRY_NICK_DUPLICATE_ERROR' => 'このニックネームはすでに使われています。',
    'ENTRY_NICK_TEXT' => '*',
    'ENTRY_PASSWORD' => 'パスワード',
    'ENTRY_PASSWORD_CONFIRMATION' => 'パスワードの確認:',
    'ENTRY_PASSWORD_CONFIRMATION_TEXT' => '*',
    'ENTRY_PASSWORD_CURRENT' => '現在のパスワード:',
    'ENTRY_PASSWORD_CURRENT_TEXT' => '*',
    'ENTRY_PASSWORD_ERROR' => 'パスワードは最低' . ENTRY_PASSWORD_MIN_LENGTH . '文字以上入力してください',
    'ENTRY_PASSWORD_ERROR_NOT_MATCHING' => 'パスワードの確認欄は同じパスワードを再入力してください',
    'ENTRY_PASSWORD_NEW' => '新しいパスワード:',
    'ENTRY_PASSWORD_NEW_ERROR' => '新しいパスワードは半角英数字で' . ENTRY_PASSWORD_MIN_LENGTH . '文字以上入力してください',
    'ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING' => 'パスワードの確認欄は新しいパスワードを再入力してください',
    'ENTRY_PASSWORD_NEW_TEXT' => '*',
    'ENTRY_PASSWORD_TEXT' => '* (半角英数字で最低' . ENTRY_PASSWORD_MIN_LENGTH . '文字以上)',
    'ENTRY_POST_CODE' => '郵便番号:',
    'ENTRY_POST_CODE_ERROR' => '郵便番号は最低' . ENTRY_POSTCODE_MIN_LENGTH . '文字以上入力してください',
    'ENTRY_POST_CODE_TEXT' => '*',
    'ENTRY_PRICE_FROM' => '価格開：',
    'ENTRY_PRICE_TO' => '価格至：',
    'ENTRY_RECIPIENT_NAME' => '受取人の氏名：',
    'ENTRY_REQUIRED_SYMBOL' => '*',
    'ENTRY_STATE' => '都道府県:',
    'ENTRY_STATE_ERROR' => '都道府県名は最低' . ENTRY_STATE_MIN_LENGTH . '文字以上入力してください',
    'ENTRY_STATE_ERROR_SELECT' => 'プルダウンメニューから都道府県を選択してください',
    'ENTRY_STATE_TEXT' => '*',
    'ENTRY_STREET_ADDRESS' => '番地 建物名:',
    'ENTRY_STREET_ADDRESS_ERROR' => '番地 建物名は最低' . ENTRY_STREET_ADDRESS_MIN_LENGTH . '文字以上入力してください',
    'ENTRY_STREET_ADDRESS_TEXT' => '*',
    'ENTRY_SUBURB' => '住所2:',
    'ENTRY_SUBURB_TEXT' => '',
    'ENTRY_TELEPHONE_NUMBER' => '電話番号:',
    'ENTRY_TELEPHONE_NUMBER_ERROR' => '電話番号は最低' . ENTRY_TELEPHONE_MIN_LENGTH . '文字以上入力してください',
    'ENTRY_TELEPHONE_NUMBER_TEXT' => '*',
    'ERROR_AT_LEAST_ONE_INPUT' => 'At least one of the fields in the search form must be entered.',
    'ERROR_CART_UPDATE' => '<strong>ご注文内容を更新してください ...</strong> ',
    'ERROR_CONDITIONS_NOT_ACCEPTED' => 'ご利用規約に同意される場合はチェックボックスをクリックしてください。',
    'ERROR_CORRECTIONS_HEADING' => '以下の内容に修正が必要です: <br>',
    'ERROR_CUSTOMERS_ID_INVALID' => 'アカウント情報が確認できませんでした。<br>ログインか、アカウント登録を行って下さい。',
    'ERROR_DATABASE_MAINTENANCE_NEEDED' => '<a href="https://docs.zen-cart.com/user/troubleshooting/error_71_maintenance_required/" rel="noopener" target="_blank">ERROR 0071 There appears to be a problem with the database. Maintenance is required.</a>',
    'ERROR_DESTINATION_DOES_NOT_EXIST' => 'エラー: 保存ディレクトリが存在しません',
    'ERROR_DESTINATION_NOT_WRITEABLE' => 'エラー:  保存ディレクトリが書き込み可能になっていません',
    'ERROR_FILETYPE_NOT_ALLOWED' => 'エラー: このファイルタイプは許可されていません',
    'ERROR_FILE_NOT_SAVED' => 'エラー:  ファイルが保存されていません',
    'ERROR_FILE_TOO_BIG' => '警告: アップロードファイルが大きすぎます。<br>注文可能ですけど、アップロードのヘルプについては、サイトにお問い合わせください',
    'ERROR_INVALID_FROM_DATE' => '開始日が無効です。',
    'ERROR_INVALID_KEYWORDS' => '無効なキーワード。',
    'ERROR_INVALID_TO_DATE' => '無効終了日。',
    'ERROR_MAXIMUM_QTY' => '数量を変更しました - 一度にお求めいただける最大数がカートに入っています。<br>',
    'ERROR_MISSING_SEARCH_OPTIONS' => '検索オプションがありません',
    'ERROR_NO_PAYMENT_MODULE_SELECTED' => 'お支払い方法を選択してください。',
    'ERROR_PRICE_FROM_MUST_BE_NUM' => '価格開は数字でなければなりません。',
    'ERROR_PRICE_TO_LESS_THAN_PRICE_FROM' => '価格終了は、価格開始以上である必要があります。',
    'ERROR_PRICE_TO_MUST_BE_NUM' => '価格至は数字でなければなりません。',
    'ERROR_PRIVACY_STATEMENT_NOT_ACCEPTED' => '個人情報保護方針に同意される場合はチェックボックスをクリックしてください。',
    'ERROR_PRODUCT' => '<br>商品名: ',
    'ERROR_PRODUCT_ATTRIBUTES' => '<br>商品名: ',
    'ERROR_PRODUCT_OPTION_SELECTION' => '<br> ... 無効なオプションが選択されています ',
    'ERROR_PRODUCT_QUANTITY_MAX' => ' ... 最大個数エラー - ',
    'ERROR_PRODUCT_QUANTITY_MAX_SHOPPING_CART' => ' ... 最大個数エラー - ',
    'ERROR_PRODUCT_QUANTITY_MIN' => '　... 最小個数エラー - ',
    'ERROR_PRODUCT_QUANTITY_MIN_SHOPPING_CART' => ' ... 最小個数エラー - ',
    'ERROR_PRODUCT_QUANTITY_ORDERED' => '<br> ご注文数量: ',
    'ERROR_PRODUCT_QUANTITY_UNITS' => ' ... 購入単位エラー - ',
    'ERROR_PRODUCT_QUANTITY_UNITS_SHOPPING_CART' => ' ... 購入単位エラー - ',
    'ERROR_PRODUCT_STATUS_SHOPPING_CART' => '<br>あいにくこの商品は現在取り扱っておりません。<br>ショッピングカートから取り除かせていただきました。',
    'ERROR_PRODUCT_STATUS_SHOPPING_CART_ATTRIBUTES' => '<br>あいにくこの商品は現在取り扱っておりません。<br>ショッピングカートから取り除かせていただきました。',
    'ERROR_QUANTITY_ADJUSTED' => 'カートに追加された数量が調整されました。ご希望の商品は小ロットでのご用意がございません。 商品の数量:<br>',
    'ERROR_QUANTITY_CHANGED_FROM' => 'から変更されました：　',
    'ERROR_QUANTITY_CHANGED_TO' => 'に変更 ',
    'ERROR_TEXT_COUNTRY_DISABLED_PLEASE_CHANGE' => '申し訳ありません。現在  "%s" のご住所での支払い、配送に対応しておりません。ご注文手続きを進めるには住所情報を変更なさってください。',
    'ERROR_TO_DATE_LESS_THAN_FROM_DATE' => '終了日は開始日以上である必要があります。',
    'FAILED_TO_ADD_UNAVAILABLE_PRODUCTS' => '選択された製品は現在購入できません...',
    'FEMALE' => '女性',
    'FOOTER_TEXT_BODY' => 'Copyright &copy; ' . date('Y') . ' <a href="' . zen_href_link(FILENAME_DEFAULT) . '">' . STORE_NAME . '</a>. Powered by <a href="https://www.zen-cart.com" rel="noopener noreferrer" target="_blank">Zen Cart</a>',
    'FORM_REQUIRED_INFORMATION' => '* 必須項目',
    'FREE_SHIPPING_DESCRIPTION' => '%s以上お買い上げの場合、配送料が無料になります。',
    'HEADING_ADDRESS_INFORMATION' => 'ご住所',
    'HEADING_BILLING_ADDRESS' => 'ご請求先住所',
    'HEADING_DELIVERY_ADDRESS' => 'お届け先',
    'HEADING_DOWNLOAD' => 'ファイルをダウンロードするにはダウンロードボタンを押してポップアップメニューから「ディスクに保存」を選択してください。',
    'HEADING_ORDER_COMMENTS' => '連絡事項がございましたらご記入ください。',
    'HEADING_ORDER_DATE' => 'ご注文日:',
    'HEADING_ORDER_HISTORY' => '履歴とコメント',
    'HEADING_ORDER_NUMBER' => 'ご注文番号　#%s',
    'HEADING_PAYMENT_METHOD' => 'お支払い方法',
    'HEADING_PRODUCTS' => '商品',
    'HEADING_QUANTITY' => '数量',
    'HEADING_SEARCH_HELP' => '検索ヘルプ',
    'HEADING_SHIPPING_METHOD' => '配送方法',
    'HEADING_TAX' => '税額',
    'HEADING_TOTAL' => '総額',
    'HTML_PARAMS' => 'dir="ltr" lang="ja"',
    'ICON_ERROR_ALT' => 'エラー',
    'ICON_IMAGE_ERROR' => 'error.png',
    'ICON_IMAGE_SUCCESS' => 'success.png',
    'ICON_IMAGE_TINYCART' => 'cart.gif',
    'ICON_IMAGE_TRASH' => 'small_delete.png',
    'ICON_IMAGE_UPDATE' => 'button_update_cart.png',
    'ICON_IMAGE_WARNING' => 'warning.png',
    'ICON_SUCCESS_ALT' => '成功',
    'ICON_TINYCART_ALT' => 'こちらをクリックして、この商品をカートに追加してください。',
    'ICON_TRASH_ALT' => 'このアイコンをクリックして、カートからアイテムを削除します。',
    'ICON_UPDATE_ALT' => 'ボックス内の数字を強調表示し、数量を修正してこのボタンをクリックして、数量を変更します。',
    'ICON_WARNING_ALT' => '警告',
    'IMAGE_ALT_PREFIX' => '（画像用）',
    'IMAGE_ALT_TEXT_NO_TITLE' => '一般的なイメージ',
    'JS_ERROR' => 'フォームの処理中にエラーが発生しました。\n\n次の項目を訂正してください:\n\n',
    'JS_ERROR_NO_PAYMENT_MODULE_SELECTED' => '* お支払い方法を選択してください。',
    'JS_ERROR_SUBMITTED' => '入力フォームは既に送信されています。OK ボタンをクリックして処理が完了するまでお待ちください。',
    'JS_REVIEW_RATING' => '* 商品の評価を選択してください。',
    'JS_REVIEW_TEXT' => '* レビューの文章が短すぎます。最低' . REVIEW_TEXT_MIN_LENGTH . '文字以上入力してください。',
    'LANGUAGE_CURRENCY' => 'JPY',
    'MALE' => '男性',
    'META_TAG_PRODUCTS_PRICE_IS_FREE_TEXT' => '無料!',
    'MORE_INFO_TEXT' => '商品詳細へ',
    'NOT_LOGGED_IN_TEXT' => 'ログインをしていません',
    'ORDER_HEADING_DIVIDER' => '&nbsp;-&nbsp;',
    'OTHER_BOX_NOTIFY_REMOVE_ALT' => 'この商品を削除する',
    'OTHER_BOX_NOTIFY_YES_ALT' => 'この商品の最新情報を希望する',
    'OTHER_BOX_WRITE_REVIEW_ALT' => 'この商品のレビューを書く',
    'OTHER_DOWN_FOR_MAINTENANCE_ALT' => '当ショップは現在メンテナンス中です。また後ほどお越し下さい。',
    'OTHER_IMAGE_BLACK_SEPARATOR' => 'pixel_black.gif',
    'OTHER_IMAGE_BOX_NOTIFY_REMOVE' => 'box_products_notifications_remove.gif',
    'OTHER_IMAGE_BOX_NOTIFY_YES' => 'box_products_notifications.gif',
    'OTHER_IMAGE_BOX_WRITE_REVIEW' => 'box_write_review.gif',
    'OTHER_IMAGE_CALL_FOR_PRICE' => 'call_for_prices.png',
    'OTHER_IMAGE_CUSTOMERS_AUTHORIZATION' => 'customer_authorization.gif',
    'OTHER_IMAGE_CUSTOMERS_AUTHORIZATION_ALT' => '承認手続き中です...',
    'OTHER_IMAGE_DOWN_FOR_MAINTENANCE' => 'down_for_maintenance.png',
    'OTHER_IMAGE_PRICE_IS_FREE' => 'free.png',
    'OTHER_IMAGE_REVIEWS_RATING_STARS_FIVE' => 'stars_5_small.png',
    'OTHER_IMAGE_REVIEWS_RATING_STARS_FOUR' => 'stars_4_small.png',
    'OTHER_IMAGE_REVIEWS_RATING_STARS_ONE' => 'stars_1_small.png',
    'OTHER_IMAGE_REVIEWS_RATING_STARS_THREE' => 'stars_3_small.png',
    'OTHER_IMAGE_REVIEWS_RATING_STARS_TWO' => 'stars_2_small.png',
    'OTHER_REVIEWS_RATING_STARS_FIVE_ALT' => '☆☆☆☆☆',
    'OTHER_REVIEWS_RATING_STARS_FOUR_ALT' => '☆☆☆☆',
    'OTHER_REVIEWS_RATING_STARS_ONE_ALT' => '☆',
    'OTHER_REVIEWS_RATING_STARS_THREE_ALT' => '☆☆☆',
    'OTHER_REVIEWS_RATING_STARS_TWO_ALT' => '☆☆',
    'OUT_OF_STOCK_CANT_CHECKOUT' => ' ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' の印がついた商品は在庫切れ、あるいはご注文数に在庫が不足してします。<br>おそれいりますが(' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ')印のついた商品のご注文数量を変更お願いいたします。',
    'OUT_OF_STOCK_CAN_CHECKOUT' => ' ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . 'の印がついた商品は在庫切れです。<br>在庫切れ商品はバックオーダーとなります。',
    'PAGE_ACCOUNT' => 'マイページ',
    'PAGE_ACCOUNT_EDIT' => '登録情報',
    'PAGE_ACCOUNT_HISTORY' => 'ご注文履歴',
    'PAGE_ACCOUNT_NOTIFICATIONS' => 'メールマガジン登録',
    'PAGE_ADDRESS_BOOK' => 'アドレス帳',
    'PAGE_ADVANCED_SEARCH' => '詳細検索',
    'PAGE_CHECKOUT_SHIPPING' => '精算',
    'PAGE_FEATURED' => '特徴',
    'PAGE_PRODUCTS_ALL' => '全製品',
    'PAGE_PRODUCTS_NEW' => '新着商品',
    'PAGE_REVIEWS' => 'レビュー',
    'PAGE_SHOPPING_CART' => 'ショッピングカート',
    'PAGE_SPECIALS' => '特価商品',
    'PAYMENT_JAVASCRIPT_DISABLED' => 'JavaScript が無効に設定されているため、注文手続きを進めることが出来ません。　手続きを進めるには有効にする必要があります。',
    'PAYMENT_METHOD_GV' => 'ギフト券/クーポン',
    'PAYMENT_MODULE_GV' => 'GV/DC',
    'PLEASE_SELECT' => '選択して下さい。',
    'PREVNEXT_BUTTON_NEXT' => '[次へ&nbsp;&gt;&gt;]',
    'PREVNEXT_BUTTON_PREV' => '[&lt;&lt;&nbsp;前へ]',
    'PREVNEXT_TITLE_NEXT_PAGE' => '次のページ',
    'PREVNEXT_TITLE_NEXT_SET_OF_NO_PAGE' => '次の%dページ',
    'PREVNEXT_TITLE_PAGE_NO' => '%dページ',
    'PREVNEXT_TITLE_PREVIOUS_PAGE' => '前のページ',
    'PREVNEXT_TITLE_PREV_SET_OF_NO_PAGE' => '前の%dページ',
    'PREV_NEXT_PRODUCT' => '商品 ',
    'PRIMARY_ADDRESS_TITLE' => 'お客様の住所',
    'PRODUCTS_ORDER_QTY_TEXT' => 'カートに追加: ',
    'PRODUCTS_ORDER_QTY_TEXT_IN_CART' => 'カート内の数量: ',
    'PRODUCTS_PRICE_IS_CALL_FOR_PRICE_TEXT' => '価格問い合わせ',
    'PRODUCTS_PRICE_IS_FREE_TEXT' => '無料です!',
    'PRODUCTS_QUANTITY_MAX_TEXT_LISTING' => '最大:',
    'PRODUCTS_QUANTITY_MIN_TEXT_LISTING' => '最小:',
    'PRODUCTS_QUANTITY_UNIT_TEXT_LISTING' => '購入単位:',
    'PRODUCT_PRICE_DISCOUNT_AMOUNT' => '&nbsp;off',
    'PRODUCT_PRICE_DISCOUNT_PERCENTAGE' => '% off',
    'PRODUCT_PRICE_DISCOUNT_PREFIX' => '値引額：&nbsp;',
    'PRODUCT_PRICE_SALE' => '特価:&nbsp;',
    'PRODUCT_PRICE_WHOLESALE' => 'あなたの価格：&nbsp;',
    'PULL_DOWN_ALL' => '選択してください',
    'PULL_DOWN_ALL_RESET' => '- リセット - ',
    'PULL_DOWN_DEFAULT' => '国名を選択してください',
    'PULL_DOWN_MANUFACTURERS' => '- リセット -',
    'PULL_DOWN_SHIPPING_ESTIMATOR_SELECT' => '選択してください',
    'SEND_TO_TEXT' => '電子メールの送信先:',
    'SET_AS_PRIMARY' => 'お客様の住所を設定する',
    'SUCCESS_ADDED_TO_CART_PRODUCT' => 'カートに商品が追加されました。',
    'SUCCESS_ADDED_TO_CART_PRODUCTS' => '選択された商品が、カートに追加されました。',
    'SUCCESS_FILE_SAVED_SUCCESSFULLY' => '成功:  ファイルが保存されました',
    'TABLE_ATTRIBUTES_QTY_PRICE_PRICE' => '金額',
    'TABLE_ATTRIBUTES_QTY_PRICE_QTY' => '数量',
    'TABLE_HEADING_ADDRESS_DETAILS' => '住所',
    'TABLE_HEADING_BUY_NOW' => 'カートに追加',
    'TABLE_HEADING_BYTE_SIZE' => 'ファイルサイズ',
    'TABLE_HEADING_CREDIT_PAYMENT' => 'ご利用可能なクレジットカード',
    'TABLE_HEADING_DATE_EXPECTED' => '予定日',
    'TABLE_HEADING_DATE_OF_BIRTH' => '年齢の確認',
    'TABLE_HEADING_DOWNLOAD_COUNT' => '残り',
    'TABLE_HEADING_DOWNLOAD_DATE' => 'リンク有効期限',
    'TABLE_HEADING_DOWNLOAD_FILENAME' => 'ファイル名',
    'TABLE_HEADING_FEATURED_PRODUCTS' => 'おすすめ商品',
    'TABLE_HEADING_IMAGE' => '商品画像',
    'TABLE_HEADING_LOGIN_DETAILS' => 'ログイン',
    'TABLE_HEADING_MANUFACTURER' => 'メーカー',
    'TABLE_HEADING_MODEL' => '商品型番',
    'TABLE_HEADING_NEW_PRODUCTS' => '%sの新着商品',
    'TABLE_HEADING_PHONE_FAX_DETAILS' => '連絡先',
    'TABLE_HEADING_PRICE' => '価格',
    'TABLE_HEADING_PRIVACY_CONDITIONS' => '個人情報保護方針について',
    'TABLE_HEADING_PRODUCTS' => '商品名',
    'TABLE_HEADING_PRODUCT_NAME' => '品名',
    'TABLE_HEADING_QUANTITY' => '数量',
    'TABLE_HEADING_REFERRAL_DETAILS' => '紹介ですか?',
    'TABLE_HEADING_SHIPPING_ADDRESS' => 'お届け先',
    'TABLE_HEADING_SPECIALS_INDEX' => '%s: 今月の特価品',
    'TABLE_HEADING_STATUS_COMMENTS' => 'コメント',
    'TABLE_HEADING_STATUS_DATE' => '日付',
    'TABLE_HEADING_STATUS_ORDER_STATUS' => '状況',
    'TABLE_HEADING_TOTAL' => '合計',
    'TABLE_HEADING_UPCOMING_PRODUCTS' => '入荷予定商品',
    'TABLE_HEADING_WEIGHT' => '重量',
    'TABLE_HEADING_FEATURED_CATEGORIES' => '注目のカテゴリー',
    'TEXT_ADMIN_DOWN_FOR_MAINTENANCE' => 'お知らせ: ただいまメンテナンス作業のためサイトを休止しています。',
    'TEXT_ALL_CATEGORIES' => '全カテゴリ',
    'TEXT_ALL_MANUFACTURERS' => '全メーカー',
    'TEXT_ALSO_PURCHASED_PRODUCTS' => 'この商品をお求めの方は、他にこのような商品もお求めになっています。',
    'TEXT_APPROVAL_REQUIRED' => '<strong>注意:</strong>  ご投稿いただいたレビューはショップ管理者の確認後に掲載されます。',
    'TEXT_ASCENDINGLY' => '昇順',
    'TEXT_ATTRIBUTES_PRICE_WAS' => ' [は: ',
    'TEXT_ATTRIBUTES_QTY_PRICES_HELP' => '数量値引',
    'TEXT_ATTRIBUTES_QTY_PRICES_ONETIME_HELP' => '基本数量値引',
    'TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK' => 'まとめ購入割引があります',	
    'TEXT_ATTRIBUTE_IS_FREE' => ' 今なら: 無料]',
    'TEXT_AUTHORIZATION_PENDING_BUTTON_REPLACE' => '承認手続き中',
    'TEXT_AUTHORIZATION_PENDING_CHECKOUT' => 'ご注文手続きを進めることが出来ません - お客様のアカウントを確認中',
    'TEXT_AUTHORIZATION_PENDING_PRICE' => '価格はログイン後',
    'TEXT_BANNER_BOX' => '当ショップのスポンサーにもお立ち寄りください。',
    'TEXT_BANNER_BOX2' => '是非チェックしてください!',
    'TEXT_BANNER_BOX_ALL' => '当ショップのスポンサーにもお立ち寄りください。',
    'TEXT_BASE_PRICE' => '基本商品価格: ',
    'TEXT_BEFORE_DOWN_FOR_MAINTENANCE' => 'お知らせ: メンテナンス作業のためまもなくサイトを休止いたします。　予定日時：',
    'TEXT_BY' => ' by ',
    'TEXT_CALL_FOR_PRICE' => '価格問い合わせ商品',
    'TEXT_CCVAL_ERROR_INVALID_DATE' => '入力されたクレジットカードの有効期限は無効です。ご確認の上もう一度入力してください。',
    'TEXT_CCVAL_ERROR_INVALID_NUMBER' => '入力されたクレジットカードのカード番号は無効です。ご確認の上もう一度入力してください。',
    'TEXT_CCVAL_ERROR_UNKNOWN_CARD' => 'カード番号の最初の４桁: %s が間違いでなければ、当ショップではこのカードのお取り扱いができません。番号が間違っているようでしたらもう一度入力してください。',
    'TEXT_CHARGES_LETTERS' => '金額の計算結果:',
    'TEXT_CHARGES_WORD' => '金額の計算結果:',
    'TEXT_CLICK_TO_ENLARGE' => '拡大表示',
    'TEXT_CLOSE_WINDOW_IMAGE' => ' - 画像をクリックして閉じる',
    'TEXT_COUPON_GV_RESTRICTION_ZONES' => '使用可能地域制限があります。',
    'TEXT_COUPON_HELP_DATE' => 'このクーポンは%1$s ～ %2$s の間に限り有効です。',
    'TEXT_COUPON_HELP_HEADER' => 'ご入力の割引クーポン引換コード',
    'TEXT_COUPON_HELP_MINORDER' => '%s以上お求めいただかないとこのクーポンはご利用いただけません。',
    'TEXT_COUPON_LINK_TITLE' => 'クーポンのステータスをご確認ください',
    'TEXT_CURRENT_CLOSE_WINDOW' => '[ ウィンドウを閉じる ]',
    'TEXT_CURRENT_REVIEWS' => '現在のレビュー:',
    'TEXT_DATE_ADDED' => 'この商品は %s に登録されました。',
    'TEXT_DATE_ADDED_LISTING' => '追加日:',
    'TEXT_DATE_AVAILABLE' => 'この商品は %s に入荷予定です。',
    'TEXT_DESCENDINGLY' => '降順',
    'TEXT_DISPLAY_NUMBER_OF_ORDERS' => '<strong>%1$d</strong>から<strong>%2$dd</strong> を表示中 (ご注文数: <strong>%3$d</strong>)',
    'TEXT_DISPLAY_NUMBER_OF_PRODUCTS' => '<strong>%1$d</strong>から<strong>%2$d</strong> を表示中 (商品の数: <strong>%3$d</strong>)',
    'TEXT_DISPLAY_NUMBER_OF_PRODUCTS_ALL' => '<strong>%1$d</strong>から<strong>%2$d</strong>を表示中 (全商品の数:<strong>%3$dd</strong>)',
    'TEXT_DISPLAY_NUMBER_OF_PRODUCTS_FEATURED_PRODUCTS' => '<strong>%1$d</strong>から<strong>%2$d</strong>を表示中 (おすすめ商品の数:<strong>%3$d</strong>)',
    'TEXT_DISPLAY_NUMBER_OF_PRODUCTS_NEW' => '<strong>%1$d</strong>から<strong>%2$d</strong> を表示中 (新着商品の数: <strong>%3$d</strong>)',
    'TEXT_DISPLAY_NUMBER_OF_REVIEWS' => '<strong>%1$d</strong>から<strong>%2$dd</strong> を表示中 (レビュー数: <strong>%3$d</strong>)',
    'TEXT_DISPLAY_NUMBER_OF_SPECIALS' => '<strong>%1$d</strong>から<strong>%2$d</strong> を表示中 (特価商品の数: <strong>%3$d</strong>)',
    'TEXT_DOWNLOADS_UNLIMITED' => '無制限',
    'TEXT_DOWNLOADS_UNLIMITED_COUNT' => '--- *** ---',
    'TEXT_ERROR' => 'エラーがおこりました',
    'TEXT_ERROR_OPTION_FOR' => 'オプション: ',
    'TEXT_EZPAGES_STATUS_FOOTER_ADMIN' => '警告: EZ-PAGES フッター - 管理者IPだけに表示',
    'TEXT_EZPAGES_STATUS_HEADER_ADMIN' => '警告: EZ-PAGES ヘッダー - 管理者IPだけに表示',
    'TEXT_EZPAGES_STATUS_SIDEBOX_ADMIN' => '警告: EZ-PAGES サイドボックス - 管理者IPだけに表示',
    'TEXT_FIELD_REQUIRED' => '&nbsp;<span class="alert">*</span>',
    'TEXT_FILESIZE_BYTES' => ' bytes',
    'TEXT_FILESIZE_KBS' => ' KB',
    'TEXT_FILESIZE_MEGS' => ' MB',
    'TEXT_FILESIZE_UNKNOWN' => '不明',
    'TEXT_FOOTER_DISCOUNT_QUANTITIES' => '* 割引は表記オプションにより異なります',
    'TEXT_GV_NAME' => 'ギフト券',
    'TEXT_GV_NAMES' => 'ギフト券',
    'TEXT_GV_REDEEM' => '引き換えコード',
    'TEXT_HEADER_DISCOUNTS_OFF' => 'まとめ購入割引はご利用いただけません...',
    'TEXT_HEADER_DISCOUNT_PRICES_ACTUAL_PRICE' => 'まとめ購入割引適用後価格',
    'TEXT_HEADER_DISCOUNT_PRICES_AMOUNT_OFF' => 'まとめ購入割引価格',
    'TEXT_HEADER_DISCOUNT_PRICES_PERCENTAGE' => 'まとめ購入割引価格',
    'TEXT_INFO_SORT_BY' => '表示順: ',
    'TEXT_INFO_SORT_BY_RECOMMENDED' => 'おすすめ',
    'TEXT_INFO_SORT_BY_PRODUCTS_DATE' => '登録日 - 旧～新',
    'TEXT_INFO_SORT_BY_PRODUCTS_DATE_DESC' => '登録日 - 新～旧',
    'TEXT_INFO_SORT_BY_PRODUCTS_MODEL' => '商品型番',
    'TEXT_INFO_SORT_BY_PRODUCTS_NAME' => '商品名',
    'TEXT_INFO_SORT_BY_PRODUCTS_NAME_DESC' => '商品名 - 降順',
    'TEXT_INFO_SORT_BY_PRODUCTS_PRICE' => '価格 - 低～高',
    'TEXT_INFO_SORT_BY_PRODUCTS_PRICE_DESC' => '価格 - 高～低',
    'TEXT_INVALID_COUPON_ORDER_LIMIT' => 'クーポン "%1$s" がご利用いただける注文可能な商品点数 (%2$u) を超えています。',
    'TEXT_INVALID_COUPON_PRODUCT' => 'クーポン「%1$s」はショッピングカート内のどの商品にも有効ではありません。',
    'TEXT_INVALID_FINISHDATE_COUPON' => 'クーポン「%1$s」は現在無効です（期限切れ %2$s）。',
    'TEXT_INVALID_REDEEM_COUPON' => '無効なクーポンコードです',
    'TEXT_INVALID_REDEEM_COUPON_MINIMUM' => 'クーポン「%1$s」を利用するには、少なくとも%2$sを使う必要があります。',
    'TEXT_INVALID_SELECTION' => ' 選択は無効です。:  ',
    'TEXT_INVALID_STARTDATE_COUPON' => 'クーポン「%1$s」は%2$sまで使用できません。',
    'TEXT_INVALID_USER_INPUT' => '入力してください<br>',
    'TEXT_INVALID_USES_COUPON' => 'クーポン「%1$s」は既に最大許容回数 (%2$u) 使用されています。',
    'TEXT_INVALID_USES_USER_COUPON' => 'クーポン「%1$s」を顧客あたり最大許容回数 (%2$u) 使用しました。',
    'TEXT_LETTERS_FREE' => ' 無料文字数',
    'TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE' => '価格をご覧になるにはログインしてください',
    'TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE_SHOWROOM' => '閲覧のみ',
    'TEXT_LOGIN_FOR_PRICE_PRICE' => '価格はログイン後',
    'TEXT_LOGIN_FOR_PRICE_PRICE_SHOWROOM' => '',
    'TEXT_LOGIN_TO_SHOP_BUTTON_REPLACE' => 'ログイン',
    'TEXT_MANUFACTURER' => 'メーカー:',
    'TEXT_MAXIMUM_CHARACTERS_ALLOWED' => ' 最大文字数',
    'TEXT_MORE_INFORMATION' => 'より詳しい情報はこの商品の<a href="%s" target="_blank">Webページ</a>へ。',
    'TEXT_NO_ALL_PRODUCTS' => '商品はまもなく登録されますので、また後ほどご覧ください。',
    'TEXT_NO_CAT_RESTRICTIONS' => 'この割引クーポンは全カテゴリ対象です。',
    'TEXT_NO_CAT_TOP_ONLY_DENY' => 'このクーポンには商品による利用制限が設定されています。',
    'TEXT_NO_FEATURED_PRODUCTS' => 'おすすめ商品はまもなく登録されますので、また後ほどご覧ください。',
    'TEXT_NO_NEW_PRODUCTS' => '新着商品はまもなく登録されますので、また後ほどご覧ください。',
    'TEXT_NO_PROD_RESTRICTIONS' => 'この割引クーポンは全商品対象です。',
    'TEXT_NO_PROD_SALES' => 'この割引クーポンはセール商品には適用されません。',
    'TEXT_NO_SHIPPING_AVAILABLE_ESTIMATOR' => '申し訳ございませんが、この注文を表示された住所に配送するためのオンライン オプションはありません。<br><br>最新の見積もりを入手するには、ログインするか、ご希望の配送先住所を編集してください。<br><br>それでも見積もりが利用できない場合は、別の手配をするために当社までご連絡ください。',
    'TEXT_NO_REVIEWS' => '商品のレビューはまだありません。',
    'TEXT_NUMBER_SYMBOL' => '# ',
    'TEXT_OF_5_STARS' => '',
    'TEXT_ONETIME_CHARGES' => '*基本料 = ',
    'TEXT_ONETIME_CHARGES_EMAIL' => "\t" . '*基本料 = ',
    'TEXT_ONETIME_CHARGE_DESCRIPTION' => ' 基本料金が適用されます',
    'TEXT_ONETIME_CHARGE_SYMBOL' => ' *',
    'TEXT_OPTION_DIVIDER' => '&nbsp;-&nbsp;',
    'TEXT_OUT_OF_STOCK' => '在庫切れ',
    'TEXT_PASSWORD_FORGOTTEN' => 'パスワードをお忘れですか?',
    'TEXT_PER_LETTER' => '<br>1文字につき: ',
    'TEXT_PER_WORD' => '<br>1つの語句につき: ',
    'TEXT_PRICE' => '価格:',
    'TEXT_PRIVACY_CONDITIONS_CONFIRM' => '個人情報保護方針に同意します。',
    'TEXT_PRIVACY_CONDITIONS_DESCRIPTION' => '個人情報保護方針に同意される場合はチェックボックスをクリックしてください。内容はこちらでご覧いただけます。<a href="' . zen_href_link(FILENAME_PRIVACY) . '"><span class="pseudolink">個人情報保護方針</span></a>.',
    'TEXT_PRODUCTS_LISTING_ALPHA_SORTER' => '',
    'TEXT_PRODUCTS_LISTING_ALPHA_SORTER_NAMES' => '商品名での絞込み ...',
    'TEXT_PRODUCTS_LISTING_ALPHA_SORTER_NAMES_RESET' => '-- リセット --',
    'TEXT_PRODUCTS_MIX_OFF' => '*オプション複合不可',
    'TEXT_PRODUCTS_MIX_OFF_SHOPPING_CART' => '*単位内オプション複合不可<br>',
    'TEXT_PRODUCTS_MIX_ON' => 'オプション複合可',
    'TEXT_PRODUCTS_MIX_ON_SHOPPING_CART' => '*単位内オプション複合可<br>',
    'TEXT_PRODUCTS_QUANTITY' => '在庫:',
    'TEXT_PRODUCTS_WEIGHT' => '重量:',
    'TEXT_PRODUCT_ALL_LISTING_MULTIPLE_ADD_TO_CART' => '追加: ',
    'TEXT_PRODUCT_FEATURED_LISTING_MULTIPLE_ADD_TO_CART' => '追加: ',
    'TEXT_PRODUCT_LISTING_MULTIPLE_ADD_TO_CART' => '追加: ',
    'TEXT_PRODUCT_MANUFACTURER' => 'メーカー: ',
    'TEXT_PRODUCT_MODEL' => '商品型番: ',
    'TEXT_PRODUCT_NEW_LISTING_MULTIPLE_ADD_TO_CART' => '追加: ',
    'TEXT_PRODUCT_NOT_FOUND' => '商品が見つかりませんでした。',
    'TEXT_PRODUCT_OPTIONS' => '選択してください: ',
    'TEXT_PRODUCT_QUANTITY' => ' 在庫数',
    'TEXT_PRODUCT_WEIGHT' => '重量: ',
    'TEXT_PRODUCT_WEIGHT_UNIT' => ' kg',
    'TEXT_REMOVE_REDEEM_COUPON_ZONE' => '入力された割引クーポンコードは、お客様のご住所ではご利用いただけません。',
    'TEXT_RESULT_PAGE' => '',
    'TEXT_REVIEW_BY' => 'by %s',
    'TEXT_REVIEW_DATE_ADDED' => '登録日: %s',
    'TEXT_SEARCH_HELP' => '(1)より正確に検索をしたい場合には、「AND」か「OR」、またはその両方で複数のキーワードを区切ることができます。<br><br><ul><li>「マイクロソフト AND マウス」と入力すると、両方のキーワードを含む商品を検索します。</li><li>「マウス OR キーボード」と入力すると、どちらかのキーワードを含む商品を検索します。</li></ul>(2)いくつかのキーワードを引用符(")で囲むと、その文字列に正確に一致するものだけを検索します。<br><br><ul><li>"ノート型 パソコン"と入力すると、その文字列を正確に含んだ商品を検索します。</li></ul>(3)これらの検索ルールは、括弧でくくることで、より複雑な指定が可能です。<br><br><ul><li>「マイクロソフト AND (キーボード OR マウス OR "visual basic")」と入力すると、「マイクロソフト」を含み、かつ「キーボード」か「マウス」か「visual basic」を含む商品を検索します。</li></ul>',
    'TEXT_SEARCH_HELP_LINK' => '検索ヘルプ [?]',
    'TEXT_SEARCH_IN_DESCRIPTION' => '製品説明で検索',
    'TEXT_SHIPPING_BOXES' => '個口',
    'TEXT_SHIPPING_WEIGHT' => ' kg',
    'TEXT_SHOWCASE_ONLY' => 'お問い合わせ',
    'TEXT_SORT_PRODUCTS' => '商品の並べ替え ',
	'TEXT_TIME_SPECIFY' => 'お届け時間帯： ',
    'TEXT_TOP' => 'トップ',
    'TEXT_TOTAL_AMOUNT' => '&nbsp;&nbsp;金額: ',
    'TEXT_TOTAL_ITEMS' => '合計点数: ',
    'TEXT_TOTAL_WEIGHT' => '&nbsp;&nbsp;重量: ',
    'TEXT_UNKNOWN_TAX_RATE' => '税率不明',
    'TEXT_VALID_COUPON' => '割引クーポンを引き換えました',
    'TEXT_WORDS_FREE' => ' 無料語数 ',
    'TEXT_YOUR_IP_ADDRESS' => 'IPアドレス: ',
    'TYPE_BELOW' => '以下の選択肢を入力...',
    'WARNING_COULD_NOT_LOCATE_LANG_FILE' => '警告: 言語ファイルを確認できませんでした。　ファイル：',
    'WARNING_NO_FILE_UPLOADED' => '警告:  何もアップロードされていません。',
    'WARNING_PRODUCT_QUANTITY_ADJUSTED' => '商品数量が購入可能な残り在庫数にあわせて変更されました。',
    'WARNING_SHOPPING_CART_COMBINED' => '注意: カート内には、前回のログイン時にカートに入れた商品も含まれております。<br>お支払い手続きに進む前に、必ずご確認下さい。',
];

// Definitions that require references to other definitions
    $define['ATTRIBUTES_QTY_PRICE_SYMBOL'] = zen_image(DIR_WS_TEMPLATE_ICONS . 'icon_status_green.gif', $define['TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK'], 10, 10) . '&nbsp;';
    $define['BOX_HEADING_GIFT_VOUCHER'] = $define['TEXT_GV_NAME'] . ' アカウント';
    $define['BOX_INFORMATION_GV'] = $define['TEXT_GV_NAME'] . ' よくある質問';
    $define['ENTRY_EMAIL_PREFERENCE'] = 'ニュースレターと電子メールの詳細';
    if (ACCOUNT_NEWSLETTER_STATUS === '0') {
       $define['ENTRY_EMAIL_PREFERENCE'] = 'メールの詳細';
    }
    $define['ERROR_NO_INVALID_REDEEM_GV'] = '無効 ' . $define['TEXT_GV_NAME'] . ' ' . $define['TEXT_GV_REDEEM'];
    $define['ERROR_NO_REDEEM_CODE'] = '' . $define['TEXT_GV_REDEEM'] . 'が入力されていません。';
    $define['ERROR_REDEEMED_AMOUNT'] = '引き換えに成功しました ';
    $define['GV_FAQ'] = $define['TEXT_GV_NAME'] . ' よくある質問';
    $define['TABLE_HEADING_CREDIT'] = '利用可能なクレジット';
    $define['TEXT_AVAILABLE_BALANCE'] = 'あなたの' . $define['TEXT_GV_NAME'] . 'アカウント';
    $define['TEXT_BALANCE_IS'] = 'お客様の' . $define['TEXT_GV_NAME'] . '残高: ';
    $define['TEXT_COUPON_GV_RESTRICTION'] = '<p class="smallText">割引クーポンは' . $define['TEXT_GV_NAMES'] . 'をお買い求めの際はご利用いただけない場合があります。一回のご注文につき一つのクーポンがご利用いただけます。</p>';
    $define['TEXT_SEND_OR_SPEND'] = 'お客様の' . $define['TEXT_GV_NAME'] . 'アカウントに残高があります。 お使いいただくことも、どなたかに送ることもできます。送る場合は下記のボタンをクリックしてください。';
    $define['VOUCHER_BALANCE'] = $define['TEXT_GV_NAME'] . ' 残高 ';

return $define;

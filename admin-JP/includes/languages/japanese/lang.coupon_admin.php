<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Scott C Wilson 2022 Jan 09 New in v1.5.8-alpha $
*/

$define = [
    'HEADING_TITLE' => 'クーポンの管理',
    'HEADING_TITLE_STATUS' => 'ステータス : ',
    'TEXT_COUPON' => 'クーポン名:',
    'TEXT_COUPON_ALL' => '全てのクーポン',
    'TEXT_COUPON_ACTIVE' => '有効なクーポン',
    'TEXT_COUPON_INACTIVE' => '無効なクーポン',
    'TEXT_SUBJECT' => '件名:',
    'TEXT_UNLIMITED' => '無制限',
    'TEXT_FROM' => '差出人:',
    'TEXT_FREE_SHIPPING' => '送料無料',
    'TEXT_MESSAGE' => '本文:',
    'TEXT_RICH_TEXT_MESSAGE' => '本文(HTML形式):',
    'TEXT_CONFIRM_DELETE' => 'このクーポンを本当に削除しますか？',
    'TEXT_SEE_RESTRICT' => '制限を適用する',
    'TEXT_COUPON_ANNOUNCE' => 'ありがとうございます。クーポンを提供いたします。',
    'TEXT_TO_REDEEM' => '商品購入時にこのクーポンを使用することができます。支払情報を入力するときに下記のクーポンコードを指定してください。',
    'TEXT_VOUCHER_IS' => 'クーポン コード ',
    'TEXT_REMEMBER' => 'クーポン コードをなくさないよう安全な場所に保存してください。',
    'TEXT_VISIT' => '%s にお越しください',
    'TEXT_COUPON_HELP_DATE' => '<p><p>このクーポンは %s から %s までの間、有効です</p></p>',
    'HTML_COUPON_HELP_DATE' => '<p><p>このクーポンは %s から %s までの間、有効です</p></p>',
    'CUSTOMER_ID' => '顧客 ID',
    'CUSTOMER_NAME' => '顧客名',
    'REDEEM_DATE' => '引き換え日付',
    'IP_ADDRESS' => 'IP アドレス',
    'TEXT_REDEMPTIONS' => '引き換え',
    'TEXT_REDEMPTIONS_TOTAL' => '合計',
    'TEXT_REDEMPTIONS_CUSTOMER' => '顧客',
    'TEXT_NO_FREE_SHIPPING' => '無料配送しない',
    'NOTICE_EMAIL_SENT_TO' => '注意: メールの送信先: %s',
    'ERROR_NO_CUSTOMER_SELECTED' => 'エラー: 選択された顧客は存在しません。',
    'ERROR_NO_SUBJECT' => 'エラー: 件名が入力されていません。',
    'COUPON_NAME' => 'クーポン名',
    'COUPON_AMOUNT' => 'クーポンの額',
    'TEXT_COUPON_PRODUCT_COUNT_PER_ORDER' => '注文毎',
    'TEXT_COUPON_PRODUCT_COUNT_PER_PRODUCT' => '対象アイテム毎',
    'COUPON_CODE' => 'クーポン コード',
    'COUPON_STARTDATE' => '開始日',
    'COUPON_FINISHDATE' => '終了日',
    'COUPON_RESTRICTIONS' => '利用制限',
    'COUPON_FREE_SHIP' => '送料無料',
    'COUPON_DESC' => 'クーポンの説明 <br>(顧客は見ることができます。)',
    'COUPON_MIN_ORDER' => 'クーポン利用最低額',
    'COUPON_TOTAL' => '利用最低額の計算方法: ',
    'TEXT_COUPON_TOTAL_PRODUCTS' => '対象商品',
    'TEXT_COUPON_TOTAL_PRODUCTS_BASED' => '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(クーポンの利用制限で対象商品に指定された商品の合計金額)',
    'TEXT_COUPON_TOTAL_ORDER' => '全ての商品',
    'TEXT_COUPON_TOTAL_ORDER_BASED' => '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(クーポン対象商品かどうかにかかわり無く、全ての商品の合計金額)',
    'COUPON_USES_COUPON' => 'クーポンごとの利用数',
    'COUPON_USES_USER' => '顧客ごとの利用数',
    'COUPON_REFERRER' => '有効なリファラー',
    'COUPON_REFERRER_EXISTS' => 'クーポン \'%s\' (id %d) は参照元 \'%s\' にすでに存在します',
    'COUPON_PRODUCTS' => '有効な商品のリスト',
    'COUPON_CATEGORIES' => '有効なカテゴリのリスト',
    'DATE_CREATED' => '作成日',
    'DATE_MODIFIED' => '更新日',
    'TEXT_HEADING_NEW_COUPON' => '新しいクーポンを作成する',
    'TEXT_NEW_INTRO' => '新しいクーポン情報を入力してください。<br>',
    'COUPON_ZONE_RESTRICTION' => '使用可能地域制限',
    'TEXT_COUPON_ZONE_RESTRICTION' => 'クーポンが使用可能な地域を制限します。',
    'COUPON_ORDER_LIMIT' => '直前の注文から何日以内であれば有効: ',
    'COUPON_ORDER_LIMIT_HELP' => '指定日数以内に前回の注文を行っている場合のみ、クーポンを有効にします。指定しない場合には空欄。',
    'COUPON_IS_VALID_FOR_SALES' => 'セール商品へのクーポン適用:',
    'TEXT_COUPON_IS_VALID_FOR_SALES' => 'セール商品に対しても、クーポンを適用する',
    'TEXT_COUPON_IS_VALID_FOR_SALES_EMAIL' => 'セール商品に対しても、クーポンを適用する',
    'TEXT_NO_COUPON_IS_VALID_FOR_SALES' => 'セール商品には、クーポンを適用しない',
    'TEXT_NO_COUPON_IS_VALID_FOR_SALES_EMAIL' => 'セール商品には、クーポンを適用しない',
    'ERROR_NO_COUPON_AMOUNT' => 'クーポンの額が入力されていません。',
    'ERROR_NO_COUPON_NAME' => 'クーポン名が入力されていません。 ',
    'ERROR_COUPON_EXISTS' => 'このクーポン コードは既に存在します。',
    'COUPON_NAME_HELP' => '作成するクーポンの名称',
    'COUPON_AMOUNT_HELP' => 'クーポンを利用したときの引き換え額 「%」を最後につけた場合は割引率のパーセンテージ',
    'COUPON_CODE_HELP' => 'クーポンコードを入力してください。空白の場合は自動で生成されます。',
    'COUPON_STARTDATE_HELP' => 'クーポンが有効になる日付',
    'COUPON_FINISHDATE_HELP' => 'クーポンの有効期限の日付',
    'COUPON_FREE_SHIP_HELP' => 'クーポンの効果を配送料を無料にする。<BR>ノート： クーポン値引が「送料該当分の金額」として発生します。',
    'COUPON_DESC_HELP' => '顧客向けの説明文',
    'COUPON_MIN_ORDER_HELP' => 'クーポンが有効な場合の最低利用額',
    'COUPON_TOTAL_HELP' => '「クーポン利用最低額」を指定した場合、クーポンが有効になる注文額に達したかどうかを判断する基準として、クーポンの利用制限設定のルールに準じてクーポン対象商品だけの合計をベースにしますか？それとも注文される全ての商品の合計金額をベースにしますか？<br>注意：「全ての商品」を対象にした場合でも、クーポンが適用されるためには、クーポン対象商品が最低一つカートに含まれている必要があります。',
    'COUPON_SALE_HELP' => '<i>クーポンを適用しない</i> を選択した場合、セールもしくは特価商品は値引き対象から除外され、最低注文数にも含まれません。',
    'COUPON_USES_COUPON_HELP' => 'クーポンの最大利用回数。空白の場合は無制限になります。',
    'COUPON_USES_USER_HELP' => 'クーポンの最大利用回数。空白の場合は無制限になります。',
    'COUPON_REFERRER_HELP' => '訪問時にクーポンを自動的に適用するドメイン (カンマ区切り)。 例えば 「jills-blog.com」または「bobsbits.com,thisandthat.com」。',
    'COUPON_BUTTON_PREVIEW' => 'プレビュー',
    'COUPON_BUTTON_CONFIRM' => '確定',
    'COUPON_ACTIVE' => 'ステータス',
    'COUPON_START_DATE' => '利用開始日',
    'COUPON_EXPIRE_DATE' => '有効期限',
    'TEXT_INFO_DUPLICATE_MANAGEMENT' => '<strong>グループクーポン管理</strong><br><br>複製元になるクーポンをクリックして選択してください<br>現在選択されてるクーポン： <strong>%s</strong><br>',
    'ERROR_DISCOUNT_COUPON_WELCOME' => 'この割引クーポンはウェルカムクーポンに選択されているため、削除できません。<br /><br />ウェルカムクーポンの選択を変更後に、削除を行って下さい。',
    'SUCCESS_COUPON_DISABLED' => '成功! 割引クーポンは削除されました ...',
    'TEXT_COUPON_NEW' => 'コピーで新しく作成するクーポンのクーポンコードを指定してください。',
    'ERROR_DISCOUNT_COUPON_DUPLICATE' => '警告! 指定されたクーポンコードは既に存在します。コピー処理を取りやめました。',
    'TEXT_CONFIRM_COPY' => 'このクーポンを複製して新しいクーポンを作成しますか？作成する場合は[保存]ボタンを押してください。',
    'SUCCESS_COUPON_DUPLICATE' => '成功! 割引クーポンは複製されました ...<br><br>必ずクーポン名と日付を確認・変更して下さい ...',
    'WARNING_COUPON_DUPLICATE' => '警告！クーポンは作成されていません。作成するクーポンの数が指定されていませんでした。',
    'WARNING_COUPON_DUPLICATE_FAILED' => '警告！ クーポンの複製に失敗しました',
    'TEXT_COUPON_COPY_INFO' => 'クーポンをグループで一括複製します',
    'TEXT_COUPON_COPY_DUPLICATE' => '次のクーポンをベースにして新しいクーポンをグループで生成します: ',
    'TEXT_COUPON_COPY_DUPLICATE_CNT' => 'いくつのクーポンを生成しますか？',
    'TEXT_CONFIRM_DELETE_DUPLICATE' => '指定されたベースクーポンコードに前方一致する全てのクーポンをグループで削除します。<br>例）<strong>%s</strong> を指定した場合、<strong>%s</strong>から始まるすべてのクーポンが削除対象となります。',
    'TEXT_COUPON_DELETE_DUPLICATE' => '次のコード始まる全てのクーポンを削除: ',
    'TEXT_DISCOUNT_COUPON_EMAIL' => 'クーポンをメールで送信',
    'TEXT_DISCOUNT_COUPON_CONFIRM_DELETE' => '本当にクーポンを削除しますか？',
    'TEXT_DISCOUNT_COUPON_CONFIRM_RESTORE' => '本当にクーポンを復元にしますか？',
    'TEXT_DISCOUNT_COUPON_EDIT' => 'クーポンを編集',
    'TEXT_DISCOUNT_COUPON_DELETE' => 'クーポンを削除',
    'TEXT_DISCOUNT_COUPON_DEACTIVATED' => '非活動化: ',
    'TEXT_DISCOUNT_COUPON_RESTORE' => 'クーポンを復元',
    'TEXT_DISCOUNT_COUPON_RESTRICT' => 'クーポンの利用制限',
    'TEXT_DISCOUNT_COUPON_REPORT' => 'クーポンの利用状況',
    'TEXT_DISCOUNT_COUPON_COPY' => 'クーポンの複製',
    'TEXT_DISCOUNT_COUPON_COPY_MULTIPLE' => 'グループクーポンの一括複製',
    'TEXT_DISCOUNT_COUPON_DELETE_MULTIPLE' => 'グループクーポンの一括削除',
    'TEXT_DISCOUNT_COUPON_REPORT_MULTIPLE' => 'グループクーポンの利用状況',
    'TEXT_DISCOUNT_COUPON_DOWNLOAD' => 'グループクーポンコードのダウンロード',
    'REDEEM_ORDER_ID' => '注文ID #',
    'SUCCESS_COUPON_REACTIVATE' => 'クーポンは有効になりました',
    'TEXT_CONFIRM_REACTIVATE' => '本当にこのクーポンを復元しますか？<br>注意： クーポンを復元しても、有効期限の開始日/終了日の指定は変わりません。<br>また、このクーポンが既に利用されている場合、クーポンごとの利用数制限や顧客ごとの利用数制限などの履歴も変わりません。',
    'SUCCESS_COUPON_FOUND' => 'クーポンが見つかりました！',
    'ERROR_COUPON_NOT_FOUND' => 'クーポンが見つかりません！',
    'ERROR_NO_COUPON_CODE' => 'クーポンコードが入力されていません！',
    'ERROR_NO_COUPONS' => 'クーポンがありません',
];

return $define;

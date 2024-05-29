<?php
$define = [
    'MODULE_PAYMENT_PAYPALWPP_TEXT_ADMIN_TITLE_EC' => 'PayPal（ペイパル）エクスプレスチェックアウト',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_ADMIN_TITLE_PRO20' => 'PayPal Express Checkout (Pro 2.0 Payflow Edition) (UK)',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_ADMIN_TITLE_PF_EC' => 'PayPal Payflow Pro - Gateway',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_ADMIN_TITLE_PF_GATEWAY' => 'PayPal Express Checkout via Payflow Pro',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_DESCRIPTION' => '<strong>PayPal</strong>',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_TITLE' => 'クレジットカード',
    'MODULE_PAYMENT_PAYPALWPP_EC_TEXT_TITLE' => 'PayPal',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_EC_HEADER' => 'PayPalで早くて安全な決済を:',
    'MODULE_PAYMENT_PAYPALWPP_EC_TEXT_TYPE' => 'PayPalエクスプレスチェックアウト',
    'MODULE_PAYMENT_PAYPALWPP_DP_TEXT_TYPE' => 'PayPal Direct Payment',
    'MODULE_PAYMENT_PAYPALWPP_PF_TEXT_TYPE' => 'Credit Card',
    'MODULE_PAYMENT_PAYPALWPP_ERROR_HEADING' => '申し訳ありません、こちらのクレジットカードは取り扱いできません。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CARD_ERROR' => '入力されたクレジットカード情報にエラーが含まれています。入力内容をご確認の上、再度お試しください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CREDIT_CARD_FIRSTNAME' => 'カード名義名:',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CREDIT_CARD_LASTNAME' => 'カード名義姓:',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CREDIT_CARD_OWNER' => 'カード所有者:',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CREDIT_CARD_TYPE' => 'クレジットカードタイプ:',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CREDIT_CARD_NUMBER' => 'クレジットカード番号:',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CREDIT_CARD_EXPIRES' => '有効期限:',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CREDIT_CARD_ISSUE' => 'クレジットカード発行日:',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CREDIT_CARD_CHECKNUMBER' => 'CVV番号:',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CREDIT_CARD_CHECKNUMBER_LOCATION' => '(お手元のカードの裏側に記載されています)',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_DECLINED' => 'ご指定のカードは受け付けられませんでした。別のカードでお試しいただくか、カード発行会社様に詳細をお問い合わせください。',
    'MODULE_PAYMENT_PAYPALWPP_INVALID_RESPONSE' => 'ご指定のカードは受け付けられませんでした。別の支払方法を選択して再度お試しいただくか、ショップまでお問い合わせください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_GEN_ERROR' => '決済手続きの処理中にエラーが発生しました。別の支払方法を選択して再度お試しいただくか、ショップまでお問い合わせください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_EMAIL_ERROR_MESSAGE' => 'ショップ担当者様,' . "\n" . 'PayPalエクスプレスチェックアウトを使った処理の際にエラーが発生しました。お客様画面には、"エラー番号"だけを表示しています。エラーの詳細は以下のとおりです。' . "\n\n",
    'MODULE_PAYMENT_PAYPALWPP_TEXT_EMAIL_ERROR_SUBJECT' => '警告: PayPalエクスプレスチェックアウトエラー',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_ADDR_ERROR' => '入力された住所情報は正しくないようです。他の住所を選択するか追加して再度お試しください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CONFIRMEDADDR_ERROR' => 'PayPalで選択された住所は確認済み住所ではありません。PayPal画面に戻って、確認済み住所を選択するか追加して再度お試しください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_INSUFFICIENT_FUNDS_ERROR' => 'PayPalは支払手続きを行う事が出来ませんでした。別の支払方法を選択なさるか、PayPalの設定で支払オプションの内容を確認した上で再度お試しください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_PAYPAL_DECLINED' => '申し訳ありません。PayPalで手続が却下され、お客様からPayPalカスタマーサービスに詳細を確認なさるようにお伝えする指示を受けました。ご注文手続きを進めるためには、今回は他の支払い方法を選択していただくようお願いいたいます。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_ERROR' => 'クレジットカードの処理手続きでエラーが発生しました。別の支払方法を選択してお試しいただくか、ショップまでお問い合わせください。',
    'MODULE_PAYMENT_PAYPALWPP_FUNDING_ERROR' => 'お支払い資金に問題; Paypal.com サイトから直接' . STORE_OWNER_EMAIL_ADDRESS . 'に対してお支払いを行ってください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_BAD_CARD' => 'ご不便をおかけして申し訳ありません。入力いただいたクレジットカードは当店では取り扱っておりません。別のカードをご利用いただきますようお願いいたします。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_BAD_LOGIN' => 'お客様のアカウント情報確認時に問題が発生しました。再度お試しください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_JS_CC_OWNER' => '* カード名義は最低 ' . CC_OWNER_MIN_LENGTH . ' 文字以上必要です。\n',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_JS_CC_NUMBER' => '* カード番号は最低 ' . CC_NUMBER_MIN_LENGTH . ' 文字以上必要です。\n',
    'MODULE_PAYMENT_PAYPALWPP_ERROR_AVS_FAILURE_TEXT' => '警告：住所情報チェックに失敗しました。',
    'MODULE_PAYMENT_PAYPALWPP_ERROR_CVV_FAILURE_TEXT' => '警告：クレジットカード CVV番号チェックに失敗しました。',
    'MODULE_PAYMENT_PAYPALWPP_ERROR_AVSCVV_PROBLEM_TEXT' => ' ご注文はショップ管理者による確認のため、保留状態になっています。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_UNILATERAL' => ' - 手続きを進めるためには、先にPaypalのAPI認証情報を登録する必要があります。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_STATE_ERROR' => 'あなたのアカウントに登録されている州が正しくありません。アカウント設定を開いて修正してください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_NOT_WPP_ACCOUNT_ERROR' => 'ご不便をおかけして申し訳ありません。支払手続きは行われていません。ショップオーナーがPaypalアカウントに設定しているのは、PayPal Website Payments Pro account もしくは PayPal gateway services ではありません。注文を続けるには、別の支払方法を選択してください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_SANDBOX_VS_LIVE_ERROR' => 'ご不便をおかけして申し訳ありません。PayPalアカウントの認証手続きが完了していないか、API情報が正しくありません。手続きを完了させる事が出来ませんでした。問題を解決するようにショップ運営者まで連絡してください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_WPP_BAD_COUNTRY_ERROR' => '申し訳ありません。 -- ショップ管理者が設定している PayPalアカウントは、現在 Website Payments Pro が利用できない国のものです。注文を完了させるには、別の支払方法を選択なさってください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_NOT_CONFIGURED' => '<span class="alert">&nbsp;(注意: モジュールがまだ設定されていません)</span>',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_GETDETAILS_ERROR' => '取引情報詳細の取得で問題が発生しました。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_TRANSSEARCH_ERROR' => '指定された条件に当てはまる取引を検索するのに問題が発生しました。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_VOID_ERROR' => '取引の取り消し処理に問題があります。 ',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_REFUND_ERROR' => '指定された金額での返金処理に問題があります。 ',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_AUTH_ERROR' => '取引の承認処理に問題があります。 ',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CAPT_ERROR' => '取引の取り消し処理に問題があります。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_REFUNDFULL_ERROR' => '返金処理のリクエストがペイパルに拒否されました。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_INVALID_REFUND_AMOUNT' => '一部返金処理のリクエストを行いましたが、金額が指定されていませんでした。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_REFUND_FULL_CONFIRM_ERROR' => '全額返金処理のリクエストを行いましたが「確認」のチェックが行われておりませんでした。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_INVALID_AUTH_AMOUNT' => '取引承認のリクエストを行いましたが、金額が指定されていませんでした。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_INVALID_CAPTURE_AMOUNT' => '回収処理のリクエストを行いましたが金額が指定されていませんでした。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CAPTURE_FULL_CONFIRM_ERROR' => '回収処理をリクエストされましたが、「確認」ボックスにチェックが入っていませんでした。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_REFUND_INITIATED' => 'PayPalに対して%1$sの返金処理を実行しました。 取引ID: %21$s。ブラウザ画面の再読み込みを行い注文ステータスとステータス更新履歴のコメントが更新されている事を確認してください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_AUTH_INITIATED' => 'PayPalに対して%sへの承認処理を実行しました。ブラウザ画面の再読み込みを行い注文ステータスとステータス更新履歴のコメントが更新されている事を確認してください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CAPT_INITIATED' => 'PayPalに対して%1$sへの回収処理を実行しました。受取ID: %2$s。ブラウザ画面の再読み込みを行い注文ステータスとステータス更新履歴のコメントが更新されている事を確認してください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_VOID_INITIATED' => 'PayPalへの取引承認取り消しのリクエストが実行されました。取引ID: %s。ブラウザ画面の再読み込みを行い注文ステータスとステータス更新履歴のコメントが更新されている事を確認してください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_GEN_API_ERROR' => '通信エラーが発生しました。 詳細については、APIリファレンスガイドか取引ログをご確認ください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_INVALID_ZONE_ERROR' => 'ご不便をお掛けして申し訳ありません。現在お住まいの地域ではペイパルを利用してのご注文を行う事ができません。お手数ですがその他の支払い方法でご注文ください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_ORDER_ALREADY_PLACED_ERROR' => '注文が重複送信された模様です。マイページの注文履歴で対象の注文の状態を御確認ください。もしPaypal での支払いが完了しているにもかかわらず、注文データが見つからない場合には、ショップで状況を確認して問題を解決するため「問合せフォーム」を使ってご連絡ください。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_BUTTON_ALTTEXT' => 'ここをクリックして PayPalエクスプレスチェックアウト',
    'MODULE_PAYMENT_PAYPALWPP_EC_BUTTON_IMG' => 'https://www.paypalobjects.com/webstatic/en_US/btn/btn_checkout_pp_142x27.png',
    'MODULE_PAYMENT_PAYPALWPP_EC_BUTTON_SM_IMG' => 'https://www.paypalobjects.com/en_US/i/btn/btn_xpressCheckoutsm.gif',
    'MODULE_PAYMENT_PAYPALWPP_MARK_BUTTON_TXT' => 'PayPal(ペイパル)でお支払い',
    'MODULE_PAYMENT_PAYPALEC_MARK_BUTTON_IMG' => 'https://www.paypalobjects.com/en_US/i/btn/btn1_for_hub.gif',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_VOID_CONFIRM_CHECK' => '確認',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_VOID_CONFIRM_ERROR' => '取引承認の取り消しのリクエストを行いましたが「確認」のチェックが行われておりませんでした。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_AUTH_FULL_CONFIRM_CHECK' => '確認',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_AUTH_CONFIRM_ERROR' => '取引承認のリクエストを行いましたが「確認」のチェックが行われておりませんでした。',
    'MODULE_PAYMENT_PAYPAL_ENTRY_FIRST_NAME' => '名:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_LAST_NAME' => '姓:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_BUSINESS_NAME' => '事業名:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_ADDRESS_NAME' => '表示名:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_ADDRESS_STREET' => '番地 マンション・アパート名:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_ADDRESS_CITY' => '市町村区:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_ADDRESS_STATE' => '都道府県:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_ADDRESS_ZIP' => '郵便番号:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_ADDRESS_COUNTRY' => '国名:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_EMAIL_ADDRESS' => '支払人メールアドレス:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_EBAY_ID' => 'Ebay ID:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_PAYER_ID' => '支払人 ID:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_PAYER_STATUS' => '支払人ステータス:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_ADDRESS_STATUS' => '住所ステータス:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_PAYMENT_TYPE' => '支払タイプ:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_PAYMENT_STATUS' => '支払ステータス:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_PENDING_REASON' => '保留事由:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_INVOICE' => '通知:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_PAYMENT_DATE' => '支払日:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_CURRENCY' => '通貨:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_GROSS_AMOUNT' => '総合計:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_PAYMENT_FEE' => '支払手数料:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_EXCHANGE_RATE' => '通貨換算レート:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_CART_ITEMS' => '商品点数:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_TXN_TYPE' => '取引タイプ:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_TXN_ID' => '取引ID:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_PARENT_TXN_ID' => '親取引ID:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_REFUND_TITLE' => '<strong>返金</strong>',
    'MODULE_PAYMENT_PAYPAL_ENTRY_REFUND_FULL' => 'この取引に対して全額返金を希望する場合には、ここをクリック:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_REFUND_BUTTON_TEXT_FULL' => '全額返金実行',
    'MODULE_PAYMENT_PAYPAL_ENTRY_REFUND_BUTTON_TEXT_PARTIAL' => '一部返金実行',
    'MODULE_PAYMENT_PAYPAL_ENTRY_REFUND_TEXT_FULL_OR' => '<br />... もしくは、返金金額を入力',
    'MODULE_PAYMENT_PAYPAL_ENTRY_REFUND_PAYFLOW_TEXT' => '入力 ',
    'MODULE_PAYMENT_PAYPAL_ENTRY_REFUND_PARTIAL_TEXT' => '返金金額をここに入力して「一部返金実行」をクリック',
    'MODULE_PAYMENT_PAYPAL_ENTRY_REFUND_SUFFIX' => '*一部返金を行ってしまうと、その後全額返金が出来なくなるかも知れません。<br />*残額いっぱいまでは、一部返金は何度でも行う事が出来ます。',
    'MODULE_PAYMENT_PAYPAL_ENTRY_REFUND_TEXT_COMMENTS' => '<strong>顧客に表示を通知:</strong>',
    'MODULE_PAYMENT_PAYPAL_ENTRY_REFUND_DEFAULT_MESSAGE' => 'ショップ管理者による返金。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_REFUND_FULL_CONFIRM_CHECK' => '確認: ',
    'MODULE_PAYMENT_PAYPAL_ENTRY_COMMENTS' => 'システムコメント: ',
    'MODULE_PAYMENT_PAYPALWPP_ENTRY_PROTECTIONELIG' => '適正保護:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_AUTH_TITLE' => '<strong>注文承認手続き</strong>',
    'MODULE_PAYMENT_PAYPAL_ENTRY_AUTH_PARTIAL_TEXT' => 'この注文の一部承認を希望する場合には、ここに金額を入力：',
    'MODULE_PAYMENT_PAYPAL_ENTRY_AUTH_BUTTON_TEXT_PARTIAL' => '承認する',
    'MODULE_PAYMENT_PAYPAL_ENTRY_AUTH_SUFFIX' => '',
    'MODULE_PAYMENT_PAYPAL_ENTRY_CAPTURE_TITLE' => '<strong>決済確定承認手続き</strong>',
    'MODULE_PAYMENT_PAYPAL_ENTRY_CAPTURE_FULL' => 'この注文に対する全額もしくは一部の回収を承認したい場合、回収金額を入力してこの注文に対する最終回収処理かどうかを選択してください。回収処理を実行する前に確認用チェックボックスにチェックを入れてください。<br />',
    'MODULE_PAYMENT_PAYPAL_ENTRY_CAPTURE_BUTTON_TEXT_FULL' => '回収実行',
    'MODULE_PAYMENT_PAYPAL_ENTRY_CAPTURE_AMOUNT_TEXT' => '回収金額',
    'MODULE_PAYMENT_PAYPAL_ENTRY_CAPTURE_FINAL_TEXT' => 'これは最終的な回収処理ですか？',
    'MODULE_PAYMENT_PAYPAL_ENTRY_CAPTURE_SUFFIX' => '',
    'MODULE_PAYMENT_PAYPAL_ENTRY_CAPTURE_TEXT_COMMENTS' => '<strong>顧客に表示を知らせる:</strong>',
    'MODULE_PAYMENT_PAYPAL_ENTRY_CAPTURE_DEFAULT_MESSAGE' => 'ご注文ありがとうございました。',
    'MODULE_PAYMENT_PAYPALWPP_TEXT_CAPTURE_FULL_CONFIRM_CHECK' => '確認: ',
    'MODULE_PAYMENT_PAYPAL_ENTRY_VOID_TITLE' => '<strong>取引承認の取り消し</strong>',
    'MODULE_PAYMENT_PAYPAL_ENTRY_VOID' => '取引承認の取り消しを行う場合、以下に「取引ID」を入力し「確認」にチェックを入れてから『取り消し実行』ボタンを押してください:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_VOID_TEXT_COMMENTS' => '<strong>顧客に表示するコメント:</strong>',
    'MODULE_PAYMENT_PAYPAL_ENTRY_VOID_DEFAULT_MESSAGE' => 'いつも当店をお引き立ていただきありがとうございます。またのご来店をお待ちしております。',
    'MODULE_PAYMENT_PAYPAL_ENTRY_VOID_BUTTON_TEXT_FULL' => '取り消し実行',
    'MODULE_PAYMENT_PAYPAL_ENTRY_VOID_SUFFIX' => '',
    'MODULE_PAYMENT_PAYPAL_ENTRY_TRANSSTATE' => 'Trans. State:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_AUTHCODE' => 'Auth. Code:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_AVSADDR' => 'AVS Address match:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_AVSZIP' => 'AVS ZIP match:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_CVV2MATCH' => 'CVV2 match:',
    'MODULE_PAYMENT_PAYPAL_ENTRY_DAYSTOSETTLE' => 'Days to Settle:',
    'EMAIL_EC_ACCOUNT_INFORMATION' => 'ご注文内容確認のための、アカウントログイン情報は以下のとおりです:',
    'MODULES_PAYMENT_PAYPALWPP_LINEITEM_TEXT_ONETIME_CHARGES_PREFIX' => '一括払い',
    'MODULES_PAYMENT_PAYPALWPP_LINEITEM_TEXT_SURCHARGES_SHORT' => 'サーチャージ',
    'MODULES_PAYMENT_PAYPALWPP_LINEITEM_TEXT_SURCHARGES_LONG' => '取り扱い手数料と、適用される費用',
    'MODULES_PAYMENT_PAYPALWPP_LINEITEM_TEXT_DISCOUNTS_SHORT' => '値引',
    'MODULES_PAYMENT_PAYPALWPP_LINEITEM_TEXT_DISCOUNTS_LONG' => '割引クーポン、ギフト券などが適用された状態で、クレジットカードが適用されました。',
    'MODULES_PAYMENT_PAYPALDP_TEXT_EMAIL_FMF_SUBJECT' => '不正利用チェックステータスの注文: ',
    'MODULES_PAYMENT_PAYPALDP_TEXT_EMAIL_FMF_INTRO' => 'これは新規の注文で利用された支払に対して、Paypalの不正利用チェックチームにより支払情報の再確認をするよう取引にフラグが立てられた事を自動でお知らせするものです。通常、この再確認処理には 36時間程度が掛かります。支払手続きの再確認が完了するまで、商品を出荷しないように強くお勧めいたします。Paypal アカウントにログインして最近の取引履歴より、この注文に対する最新状況を確認できます。',
    'MODULES_PAYMENT_PAYPALWPP_TEXT_BLANK_ADDRESS' => '問題発生: 申し訳ありません。PayPalから想定外の空白の住所が送信されて来ました。<br />ご注文を完了させるためには、以下の当ショップの会員登録ボタンより住所情報をご登録ください。その後、支払方法として改めて PayPalをお選びいただいて注文手続きを進めてください。ご不便をおかけして申し訳ありません。万が一、注文手続きで問題が発生する場合には、「お問い合わせ」より、問題の詳細を当店までお知らせいただけると幸いです。ご注文に関しての問題の解決と共に、再発防止のために努めさせていただきます。ご協力に感謝いたします。',
    'MODULES_PAYMENT_PAYPALWPP_AGGREGATE_CART_CONTENTS' => 'ショッピングカート内の全てのアイテム（ショップ内で詳細を御確認いただくか、レシートを御確認ください）。',
];

if (IS_ADMIN_FLAG === true) {
    if (!isset($define['MODULE_PAYMENT_PAYPALWPP_MODULE_MODE'])) {
        $define['MODULE_PAYMENT_PAYPALWPP_MODULE_MODE'] = 'undefined';
    }
    $define['MODULE_PAYMENT_PAYPALWPP_TEXT_ADMIN_DESCRIPTION'] = '<strong>PayPalエクスプレスチェックアウト</strong>%s<br>' . (substr($define['MODULE_PAYMENT_PAYPALWPP_MODULE_MODE'], 0, 7) == 'Payflow' ? '<a href="https://manager.paypal.com/loginPage.do?partner=ZenCart" rel="noreferrer noopener" target="_blank">PayPalアカウントを設定</a>' : '<a href="https://www.paypal.com" rel="noopener" target="_blank">PayPalアカウントを設定</a>') . '<br><br><font color="green">設定手順:</font><br><span class="alert">1. </span><a href="https://www.zen-cart.com/partners/paypal-ec" rel="noopener" target="_blank">ここをクリックして PayPal に新規アカウント登録。</a><br>' .
        (defined('MODULE_PAYMENT_PAYPALWPP_STATUS') ? '' : '... 次に上部の『インストール』をクリックして PayPalエクスプレスチェックアウトを有効にします。<br><a href="https://www.zen-cart.com/getpaypal" rel="noopener" target="_blank">さらに詳細なヘルプをご希望の場合には、こちらの FAQ をご利用ください</a><br>') .
        ($define['MODULE_PAYMENT_PAYPALWPP_MODULE_MODE'] == 'PayPal' && (!isset(define['MODULE_PAYMENT_PAYPALWPP_APISIGNATURE']) || $define['MODULE_PAYMENT_PAYPALWPP_APISIGNATURE'] === '') ? '<br><span class="alert">2. </span><strong>API アクセス情報</strong> の確認。<br> （ <a href="https://www.paypal.com/us/cgi-bin/webscr?cmd=_get-api-signature&generic-flow=true" rel="noopener" target="_blank">ここをクリックして「API署名」</a>を表示します。） この画面からAPIアクセスに必要な設定情報を取得します。<br> このモジュールに利用には、ペイパルより提供される「APIユーザー名」「APIパスワード」「署名」などをモジュールの設定項目に入力する必要があります。' : (substr($define['MODULE_PAYMENT_PAYPALWPP_MODULE_MODE'], 0, 7) == 'Payflow' && (!isset($define['MODULE_PAYMENT_PAYPALWPP_PFUSER']) || $define['MODULE_PAYMENT_PAYPALWPP_PFUSER'] == '') ? '<span class="alert">2. </span><strong>PAYFLOW資格情報</strong> このモジュールでは、下の 4 つのフィールドに <strong>PAYFLOW パートナー + ベンダー + ユーザー + パスワードの設定</strong>を入力する必要があります。 これらは、Payflow システムと通信し、アカウントへのトランザクションを承認するために使用されます。' : '<span class="alert">2. </span>以下のユーザー名/パスワードなどに適切なセキュリティ データを入力したことを確認してください。')) .
        ($define['MODULE_PAYMENT_PAYPALWPP_MODULE_MODE'] == 'PayPal' ? '<br><br><span class="alert">3. </span>次に「即時支払い通知」より <strong>即時支払い通知（IPN）</strong>:<br>の項目を有効にします", select <em>Instant Payment Notification Preferences</em><ul style="margin-top: 0.5em;"><li>IPNメッセージを受信する（有効）にチェックを入れます。</li><li>もし、まだURLの指定を行っていない場合には通知URLの項目に以下のURLを入力します:<br><nobr><pre>' . str_replace('index.php?main_page=index', 'ipn_main_handler.php', zen_catalog_href_link(FILENAME_DEFAULT)) . '</pre></nobr></li></ul>' : '') .
        '<font color="green"><hr><strong>動作条件:</strong></font><br><hr>*このシステムの稼働には、80番ポートと443番ポートでのゲートウェイ接続を行うため<strong>CURL</strong> が使われます。利用サーバーでCURLがSSLを使えるように設定してください。<br><hr>';
}

return $define;

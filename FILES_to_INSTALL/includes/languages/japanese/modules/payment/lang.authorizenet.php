<?php
$define = [
    'MODULE_PAYMENT_AUTHORIZENET_TEXT_ADMIN_TITLE' => 'Authorize.net',
    'MODULE_PAYMENT_AUTHORIZENET_TEXT_CATALOG_TITLE' => 'クレジットカード',
	'MODULE_PAYMENT_AUTHORIZENET_TEXT_TYPE' => 'カードタイプ：',
    'MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_OWNER' => 'カード名義:',
    'MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_NUMBER' => 'カード番号:',
    'MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_EXPIRES' => '有効期限:',
    'MODULE_PAYMENT_AUTHORIZENET_TEXT_CVV' => 'CVV番号：',
    'MODULE_PAYMENT_AUTHORIZENET_TEXT_POPUP_CVV_LINK' => 'これは何ですか？',
    'MODULE_PAYMENT_AUTHORIZENET_TEXT_JS_CC_OWNER' => '* カード名義は' . CC_OWNER_MIN_LENGTH . '文字以上必要です。\n',
    'MODULE_PAYMENT_AUTHORIZENET_TEXT_JS_CC_NUMBER' => '* カード番号は' . CC_NUMBER_MIN_LENGTH . '文字以上必要です。\n',
    'MODULE_PAYMENT_AUTHORIZENET_TEXT_JS_CC_CVV' => '* クレジットカードの裏面にある３桁または４桁の CVV 番号を入力する必要があります。\n',
    'MODULE_PAYMENT_AUTHORIZENET_TEXT_ERROR_MESSAGE' => 'クレジットカードの処理にエラーが発生しました. もう一度試してください。',
    'MODULE_PAYMENT_AUTHORIZENET_TEXT_DECLINED_MESSAGE' => 'クレジットカードの受付が拒否されました。他のクレジットカードを試すか詳細を加盟クレジット会社へ問い合わせてください。',
    'MODULE_PAYMENT_AUTHORIZENET_TEXT_ERROR' => 'クレジットカード エラー！',
// bof constant configuration titles and descriptions for order payment authorizenet
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_STATUS' => 'Authorize.net モジュールを有効にする',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_STATUS' => 'この支払いモジュールを有効にしますか？',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_LOGIN' => 'ログインID',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_LOGIN' => 'Authorize.net アカウントに使用される API ログイン ID。',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_TXNKEY' => 'トランザクションキー',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_TXNKEY' => 'トランザクションデータを送信するために使用されるトランザクションキー。<br><a href="https://support.authorize.net/s/article/How-do-I-obtain-my-API-Login-ID-and-Transaction-Key" rel="noopener" target="_blank">API ログイン ID とトランザクション キーを取得する方法</a>を参照してください。',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_SECURITYKEY' => 'セキュリティキー',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_SECURITYKEY' => 'トランザクションの検証に使用されるセキュリティキー（１２８文字）。<br>手順については、<a href="https://support.authorize.net/s/article/What-is-a-Signature-Key" rel="noopener" target="_blank">署名キーとは</a>を参照してください。',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_TESTMODE' => '支払いアクション',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_TESTMODE' => '注文の処理に使用されるトランザクション モード。<br><strong>Production=</strong>実際のアカウント認証情報を使用したライブ処理<br><strong>Test=</strong>実際のアカウント認証情報を使用したシミュレーション<br><strong>Sandbox=</strong>特別なサンドボックス トランザクション キーを使用して、トランザクション応答の成功/失敗の特別なテストを実行します（developer.authorize.net 経由でサンドボックス資格情報を取得します）',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_CURRENCY' => '取引通貨',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_CURRENCY' => 'Authnet Gateway アカウントはどの通貨を受け入れるように設定されていますか？<br>（他の通貨での購入は、ストア管理の為替レートを使用して、送信前にこの通貨に事前変換されます。）',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_METHOD' => '取引方法',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_METHOD' => '注文の処理に使用される取引方法',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_AUTHORIZATION_TYPE' => '承認タイプ',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_AUTHORIZATION_TYPE' => '送信されたクレジットカード取引を承認のみにするか、またはすぐにキャプチャしますか？',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_USE_CVV' => 'CVV番号をリクエストする',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_USE_CVV' => '顧客にカードのCVV番号を尋ねますか？',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_EMAIL_CUSTOMER' => '顧客通知',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_EMAIL_CUSTOMER' => 'Authorize.Net は顧客に領収書を電子メールで送信する必要がありますか？',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_ZONE' => '支払い地帯',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_ZONE' => '地帯が選択されている場合は、その地帯に対してのみこの支払い方法を有効にしてください。',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_ORDER_STATUS_ID' => '注文ステータスの設定',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_ORDER_STATUS_ID' => 'この支払いモジュールで行われた注文のステータスを設定します。<br><strong>おすすめ：処理中</strong>',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_SORT_ORDER' => '表示順',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_SORT_ORDER' => '表示順を設定します。 最下位が最初に表示されます。',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_GATEWAY_MODE' => 'ゲートウェイモード',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_GATEWAY_MODE' => '顧客のクレジットカード情報はどこで収集されますか?<br><strong>オンサイト</strong> = ここ (SSL が必要)<br><strong>オフサイト</strong> = authorize.net サイト',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_STORE_DATA' => 'データベースストレージを有効にする',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_STORE_DATA' => 'ゲートウェイ通信データをデータベースに保存しますか？',
    'CFGTITLE_MODULE_PAYMENT_AUTHORIZENET_DEBUGGING' => 'デバッグモード',
    'CFGDESC_MODULE_PAYMENT_AUTHORIZENET_DEBUGGING' => 'デバッグモードを有効にしますか？失敗したトランザクションの完全な詳細ログがストア所有者に電子メールで送信されます。',
// eof constant configuration titles and descriptions for payment module authorizenet
];

if (defined('MODULE_PAYMENT_AUTHORIZENET_STATUS') && MODULE_PAYMENT_AUTHORIZENET_STATUS == 'True') {
    $define['MODULE_PAYMENT_AUTHORIZENET_TEXT_DESCRIPTION'] = '<a rel="noreferrer noopener" target="_blank" href="https://account.authorize.net/">Authorize.net Merchant Login</a>' . (MODULE_PAYMENT_AUTHORIZENET_TESTMODE != 'Production' ? '<br><br>テスト情報：<br><b>自動承認クレジットカード番号：</b><br>Visa#: 4007000000027<br>MC#: 5424000000000015<br>Discover#: 6011000000000012<br>AMEX#: 370000000000002<br><br><b>注記：</b>これらのクレジットカード番号は、ライブ モードでは拒否され、テスト モードでは承認されます。有効期限には任意の将来の日付を使用でき、CVV コードには任意の３桁または４桁（AMEX）の数字を使用できます。<br><br><b>自動拒否クレジットカード番号：</b><br><br>カード番号： 4222222222222<br><br>このカード番号は、テスト目的で拒否通知を受信するために使用できます。' : '') . '<br><br><strong>設定</strong><br>Authorize.net マーチャント プロファイルの「応答」と「受領」および「リレー」の URL 設定は空白のままにしておくことができます。または、必要に応じて「リレー URL」を https://your_domain.com/foldername/index.php?main_page=checkout_process を指すように設定することもできます。<br><br>これに問題がある場合は、詳細なセットアップ手順については、<a href="https://docs.zen-cart.com/user/payment/authorizenet_sim/" rel="noreferrer noopener" target="_blank">SIM セットアップに関する FAQ 記事</a>を参照してください。';
} else {
    $define['MODULE_PAYMENT_AUTHORIZENET_TEXT_DESCRIPTION'] = '<a rel="noreferrer noopener" target="_blank" href="https://reseller.authorize.net/application?resellerId=10023">アカウント登録はこちらをクリック</a><br><br><a rel="noreferrer noopener" target="_blank" href="https://account.authorize.net/">Authorize.net マーチャントエリアにログインするにはクリックしてください</a><br><br><strong>要件：</strong><br><hr>*<strong>Authorize.net アカウント</strong>(サインアップするには上記のリンクを参照してください)<br>*<strong>Authorize.net のユーザー名とトランザクションキー</strong>は、マーチャントエリアから入手できます。<br><br>詳細なセットアップ手順については、<a href="https://docs.zen-cart.com/user/payment/authorizenet_sim/" rel="noreferrer noopener" target="_blank">SIM セットアップに関する FAQ 記事</a>を参照してください。';
}
return $define;

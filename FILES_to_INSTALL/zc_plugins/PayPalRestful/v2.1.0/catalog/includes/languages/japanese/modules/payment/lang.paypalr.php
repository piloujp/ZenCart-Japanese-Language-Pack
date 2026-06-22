<?php
/**
 * Language definitions for the paypalr (PayPal Restful Api) payment module.
 *
 * Last updated: v2.1.0
 */
$define = [
    'MODULE_PAYMENT_PAYPALR_TEXT_TITLE' => 'ペイパル支払い',
        'MODULE_PAYMENT_PAYPALR_SUBTITLE' => '（<b>ペイパルウォレット</b>または<b>クレジットカード</b>のいずれかをご利用ください）',
    'MODULE_PAYMENT_PAYPALR_TEXT_TITLE_ADMIN' => 'ペイパル支払い（RESTful）',
    'MODULE_PAYMENT_PAYPALR_TEXT_DESCRIPTION' => '<strong>ペイパル</strong>',
    'MODULE_PAYMENT_PAYPALR_TEXT_TYPE' => 'ペイパル支払い',

    // -----
    // Configuration-related errors displayed during the payment module's admin configuration.
    //
    'MODULE_PAYMENT_PAYPALR_ERROR_NO_CURL' => 'CURL がインストールされていないため、使用できません。',
    'MODULE_PAYMENT_PAYPALR_ERROR_CREDS_NEEDED' => '<b>%s</b> サイトに有効な資格情報を提供しない限り、<var>paypalr</var> 支払いモジュールを有効にすることはできません。',
    'MODULE_PAYMENT_PAYPALR_ERROR_INVALID_CREDS' => '<var>paypalr</var> 支払いモジュールの <b>%s</b> 資格情報が無効です。',
    'MODULE_PAYMENT_PAYPALR_AUTO_DISABLED' => ' 支払いモジュールは自動的に無効になりました。',

    // -----
    // Storefront messages.
    //
    'MODULE_PAYMENT_PALPALR_PAYING_WITH_PAYPAL' => 'ペイパルウォレットで支払う',     //- Used by the confirmation method, when paying via PayPal Checkout (paypal)
    'MODULE_PAYMENT_PAYPALR_TEXT_NOTIFICATION_MISSING' => '現在、%s のお支払いを処理できません。サポートが必要な場合はお問い合わせください。',  //- %s filled in with MODULE_PAYMENT_PAYPALR_TEXT_TITLE
    'MODULE_PAYMENT_PAYPALR_TEXT_GENERAL_ERROR' => '現在、%s のお支払いを処理できません。サポートが必要な場合はお問い合わせください。',      //- %s filled in with MODULE_PAYMENT_PAYPALR_TEXT_TITLE
    'MODULE_PAYMENT_PAYPALR_TEXT_STATUS_MISMATCH' => 'お支払いリクエストを処理できませんでした。',
    'MODULE_PAYMENT_PAYPALR_TEXT_PLEASE_NOTE' => 'ご注意ください：',
    'MODULE_PAYMENT_PAYPALR_UNSUPPORTED_BILLING_COUNTRY' => '請求先住所の国はペイパルでサポートされていないため、クレジットカードでの支払いはできません。',
    'MODULE_PAYMENT_PAYPALR_UNSUPPORTED_SHIPPING_COUNTRY' => '配送先の国はペイパルでサポートされていないため、この支払い方法は使用できません。',

    // -----
    // Storefront text used to compose an 'after_process' customer-visible note in the
    // order's status-history.  Added for v1.0.5.
    //
    'MODULE_PAYMENT_PAYPALR_TRANSACTION_ID' => '取引ID： ',  //- Should end with a space
    'MODULE_PAYMENT_PAYPALR_TRANSACTION_TYPE' => '支払いタイプ：ペイパルチェックアウト (%s)',  //- %s filled in with either 'paypal' or 'card'
    'MODULE_PAYMENT_PAYPALR_TRANSACTION_PAYMENT_STATUS' => '支払い状況： ',  //- Should end with a space
    'MODULE_PAYMENT_PAYPALR_TRANSACTION_AMOUNT' => '金額： ',  //- Should end with a space
    // Added for v1.2.0:
    'MODULE_PAYMENT_PAYPALR_BUYER_EMAIL' => '購入者のメールアドレス: ',  //- Should end with a space
    'MODULE_PAYMENT_PAYPALR_FUNDING_SOURCE' => '資金源: ',  //- Should end with a space

    // -----
    // Used by the payment module's javascript_validation method.
    //
    'MODULE_PAYMENT_PAYPALR_TEXT_JS_CC_OWNER' => '* カード所有者の名前は少なくとも ' . CC_OWNER_MIN_LENGTH . ' 文字である必要があります。\n',
    'MODULE_PAYMENT_PAYPALR_TEXT_JS_CC_NUMBER' => '* クレジットカード番号は少なくとも ' . CC_NUMBER_MIN_LENGTH . ' 文字である必要があります。\n',
    'MODULE_PAYMENT_PAYPALR_TEXT_JS_CC_CVV' => '* クレジットカードの裏面（American Expressの場合は表面）にある3桁または4桁のCVV番号を入力する必要があります。\n',

    // -----
    // Constants used when processing credit-cards
    //
    'MODULE_PAYMENT_PAYPALR_CC_OWNER' => 'クレジットカード名義人氏名：',
    'MODULE_PAYMENT_PAYPALR_CC_TYPE' => 'クレジットカードの種類：',
    'MODULE_PAYMENT_PAYPALR_CC_NUMBER' => 'クレジットカード番号：',
    'MODULE_PAYMENT_PAYPALR_CC_EXPIRES' => 'クレジットカードの有効期限：',
    'MODULE_PAYMENT_PAYPALR_CC_CVV' => 'CVV番号：',

    'MODULE_PAYMENT_PAYPALR_TEXT_CVV_LENGTH' => '<var>%2$s</var>で終わる %1$s カードの <em>CVV 番号</em>は%3$u桁の長さにする必要があります。',  //- %1$s is the card type, , %2$s is the last-r, %3$u is the CVV length
    'MODULE_PAYMENT_PAYPALR_TEXT_BAD_CARD' => '申し訳ございませんが、入力されたクレジットカードの種類は弊社では受け付けておりません。別のクレジットカードをご利用ください。',

    'MODULE_PAYMENT_PAYPALR_TEXT_CC_ERROR' => 'クレジットカードの処理中にエラーが発生しました。',
    'MODULE_PAYMENT_PAYPALR_TEXT_CARD_DECLINED' => '<var>%s</var> で終わるカードは拒否されました。',     //- %s is the last-4 of the card-number.
    'MODULE_PAYMENT_PAYPALR_TEXT_DECLINED_REASON_UNKNOWN' => 'このメッセージが引き続き表示される場合は、理由コード「%s」を添えてお問い合わせください。', //- %s is ['processor_response']['response_code']

    'MODULE_PAYMENT_PAYPALR_TEXT_TRY_AGAIN' => 'もう一度お試しいただくか、別のお支払い方法を選択するか、サポートにお問い合わせください。',

    'MODULE_PAYMENT_PAYPALR_CARD_PROCESSING' => 'カードでお支払いいただくことで、PayPal.com で利用可能な %s に従って、お客様のデータがペイパルによって処理されることに同意することになります。',  //- %s is filled in with a link
    'MODULE_PAYMENT_PAYPALR_PAYPAL_PRIVACY_STMT' => 'ペイパルプライバシー ポリシー',
    'MODULE_PAYMENT_PAYPALR_PAYPAL_PRIVACY_LINK' => 'https://www.paypal.com/jp/legalhub/privacy-full',

    // -----
    // Store owner/admin alert-email messages.
    //
    'MODULE_PAYMENT_PAYPALR_ALERT_SUBJECT' => '警告：ペイパルチェックアウト（%s）',    //- %s is an additional error descriptor, see below
        'MODULE_PAYMENT_PAYPALR_ALERT_SUBJECT_CONFIGURATION' => '構成',
        'MODULE_PAYMENT_PAYPALR_ALERT_SUBJECT_ORDER_ATTN' => '注文には注意が必要',
        'MODULE_PAYMENT_PAYPALR_ALERT_SUBJECT_UNKNOWN_DENIAL' => '拒否理由不明',
        'MODULE_PAYMENT_PAYPALR_ALERT_SUBJECT_LOST_STOLEN_CARD' => '紛失/盗難/不正カード',
        'MODULE_PAYMENT_PAYPALR_ALERT_SUBJECT_TOTAL_MISMATCH' => '計算の不一致',
        'MODULE_PAYMENT_PAYPALR_ALERT_SUBJECT_CONFIRMATION_ERROR' => '支払い方法の選択を確認',

    'MODULE_PAYMENT_PAYPALR_ALERT_ORDER_CREATION' => 'ペイパルの応答ステータスが「%2$s」であるため、注文番号 %1$u のステータスは強制的に「処理待ち」になりました。',
    'MODULE_PAYMENT_PAYPALR_ALERT_MISSING_OBSERVER' => '支払いモジュールのオブザーバー（auto.paypalrestful.php）が読み込まれませんでした。支払いモジュールは無効になっています。',
    'MODULE_PAYMENT_PAYPALR_ALERT_MISSING_NOTIFICATIONS' => 'order_total.php クラスで必要な通知が適用されなかったため、支払いモジュールは注文を行うことができません。',
    'MODULE_PAYMENT_PAYPALR_ALERT_MISSING_ROOT_FILES' => '必要なルートディレクトリファイル（%s）が見つかりません。ファイルシステムの権限を確認してください。',
    'MODULE_PAYMENT_PAYPALR_ALERT_ORDER_CREATE' => '注文を開始しようとしたときにペイパルからエラーが返されました。礼儀として、エラーコードのみが顧客に表示されました。エラーの詳細は以下に表示されます。' . "\n\n",
    'MODULE_PAYMENT_PAYPALR_ALERT_TOTAL_MISMATCH' => '注文の総額と内訳に矛盾が見つかりました。注文は、商品と費用の内訳が含まれないままペイパルに送信されています。',
    'MODULE_PAYMENT_PAYPALR_ALERT_CONFIRMATION_ERROR' => 'ペイパルウォレットから顧客の支払い選択を確認しようとしたときに、ペイパルから処理できない返品を受け取りました。',
    'MODULE_PAYMENT_PAYPALR_ALERT_EXTERNAL_TXNS' => '注文番号 %u のステータスを確認してください。ペイパル取引は支払いモジュールの処理外で追加されました。',

    // -----
    // Alert messages for unknown "DECLINED" reasons and lost/stolen/fraudulent cards.
    // -----

    // -----
    // %1$s: ['processor_response']['response_code']
    // %2$s: $_SESSION['customer_first_name']
    // %3$s: $_SESSION['customer_last_name']
    // $4%u: $_SESSION['customer_id']
    //
    'MODULE_PAYMENT_PAYPALR_ALERT_UNKNOWN_DENIAL' =>
        'ペイパルは、クレジットカード支払いが拒否されたため、不明な応答コード（%1$s）を返しました。' . "\n\n" .
        '支払いは %2$s %3$s（顧客 ID %4$u）によって試行されました。カードの詳細は次のとおりです：' . "\n\n",

    // -----
    // %1$s: One of the two language constants that follow.
    // %2$s: $_SESSION['customers_ip_address']
    // %3$s: $_SESSION['customer_first_name']
    // %4$s: $_SESSION['customer_last_name']
    // $5%u: $_SESSION['customer_id']
    //
    'MODULE_PAYMENT_PAYPALR_ALERT_LOST_STOLEN_CARD' =>
        'IP アドレス %2$s から %1$s カードを使用してクレジットカード支払いが試行されました。' . "\n\n" .
        '支払いは %3$s %4$s（顧客 ID %5$u）によって試行されました。カードの詳細は次のとおりです：' . "\n\n",
    'MODULE_PAYMENT_PAYPALR_CARD_LOST' => '紛失または盗難',
    'MODULE_PAYMENT_PAYPALR_CARD_FRAUDULENT' => '不正',

    // -----
    // For these messages, %1$s is the card-type and %2$s is the last-4 of the card-number.
    //
    'MODULE_PAYMENT_PAYPALR_TEXT_CC_EXPIRED' => '<var>%2$s</var> で終わる %1$s カードの有効期限が切れています。',
    'MODULE_PAYMENT_PAYPALR_TEXT_INSUFFICIENT_FUNDS' => '<var>%2$s</var> で終わる %1$s カードの資金が不足しています。',
    'MODULE_PAYMENT_PAYPALR_TEXT_CVV_FAILED' => '%1$s カードに入力した「CVV 番号」（<var>%2$s</var> で終わる）が正しくありません。',

    // -----
    // $1$s ... MODULE_PAYMENT_PAYPALR_TEXT_TITLE
    // $2%s ... The error-code returned by PayPal.
    //
    'MODULE_PAYMENT_PAYPALR_TEXT_CREATE_ORDER_ISSUE' => '現在、%1$s のお支払いを処理できません。サポートが必要な場合は、次のコードを添えてお問い合わせください： <b>%2$s</b>.',

    // -----
    // Buttons on checkout_payment page; see https://www.paypal.com/bm/webapps/mpp/logo-center for additional information.
    //
    'MODULE_PAYMENT_PAYPALR_BUTTON_ALTTEXT' => 'ペイパルウォレットで支払うにはここをクリックしてください',
    'MODULE_PAYMENT_PAYPALR_BUTTON_COLOR' => 'YELLOW',   //- One of WHITE, YELLOW, GREY or BLUE; defaults to YELLOW.
        'MODULE_PAYMENT_PAYPALR_BUTTON_IMG_YELLOW' => 'https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/optimize/44_Yellow_PayPal_Pill_Button.png',
        'MODULE_PAYMENT_PAYPALR_BUTTON_IMG_GREY' => 'https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/optimize/44_Grey_PayPal_Pill_Button.png',
        'MODULE_PAYMENT_PAYPALR_BUTTON_IMG_BLUE' => 'https://www.paypalobjects.com/digitalassets/c/website/marketing/apac/C2/logos-buttons/optimize/44_Blue_PayPal_Pill_Button.png',
        'MODULE_PAYMENT_PAYPALR_BUTTON_IMG_WHITE' => 'https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-150px.png',

    'MODULE_PAYMENT_PAYPALR_CHOOSE_PAYPAL' => 'ペイパルウォレット：',
    'MODULE_PAYMENT_PALPALR_CHOOSE_CARD' => 'クレジットカード：',
    'MODULE_PAYMENT_PAYPALR_LOGO_SVG' => "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAxcHgiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAxMDEgMzIiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaW5ZTWluIG1lZXQiIHhtbG5zPSJodHRwOiYjeDJGOyYjeDJGO3d3dy53My5vcmcmI3gyRjsyMDAwJiN4MkY7c3ZnIj48cGF0aCBmaWxsPSIjMDAzMDg3IiBkPSJNIDEyLjIzNyAyLjggTCA0LjQzNyAyLjggQyAzLjkzNyAyLjggMy40MzcgMy4yIDMuMzM3IDMuNyBMIDAuMjM3IDIzLjcgQyAwLjEzNyAyNC4xIDAuNDM3IDI0LjQgMC44MzcgMjQuNCBMIDQuNTM3IDI0LjQgQyA1LjAzNyAyNC40IDUuNTM3IDI0IDUuNjM3IDIzLjUgTCA2LjQzNyAxOC4xIEMgNi41MzcgMTcuNiA2LjkzNyAxNy4yIDcuNTM3IDE3LjIgTCAxMC4wMzcgMTcuMiBDIDE1LjEzNyAxNy4yIDE4LjEzNyAxNC43IDE4LjkzNyA5LjggQyAxOS4yMzcgNy43IDE4LjkzNyA2IDE3LjkzNyA0LjggQyAxNi44MzcgMy41IDE0LjgzNyAyLjggMTIuMjM3IDIuOCBaIE0gMTMuMTM3IDEwLjEgQyAxMi43MzcgMTIuOSAxMC41MzcgMTIuOSA4LjUzNyAxMi45IEwgNy4zMzcgMTIuOSBMIDguMTM3IDcuNyBDIDguMTM3IDcuNCA4LjQzNyA3LjIgOC43MzcgNy4yIEwgOS4yMzcgNy4yIEMgMTAuNjM3IDcuMiAxMS45MzcgNy4yIDEyLjYzNyA4IEMgMTMuMTM3IDguNCAxMy4zMzcgOS4xIDEzLjEzNyAxMC4xIFoiPjwvcGF0aD48cGF0aCBmaWxsPSIjMDAzMDg3IiBkPSJNIDM1LjQzNyAxMCBMIDMxLjczNyAxMCBDIDMxLjQzNyAxMCAzMS4xMzcgMTAuMiAzMS4xMzcgMTAuNSBMIDMwLjkzNyAxMS41IEwgMzAuNjM3IDExLjEgQyAyOS44MzcgOS45IDI4LjAzNyA5LjUgMjYuMjM3IDkuNSBDIDIyLjEzNyA5LjUgMTguNjM3IDEyLjYgMTcuOTM3IDE3IEMgMTcuNTM3IDE5LjIgMTguMDM3IDIxLjMgMTkuMzM3IDIyLjcgQyAyMC40MzcgMjQgMjIuMTM3IDI0LjYgMjQuMDM3IDI0LjYgQyAyNy4zMzcgMjQuNiAyOS4yMzcgMjIuNSAyOS4yMzcgMjIuNSBMIDI5LjAzNyAyMy41IEMgMjguOTM3IDIzLjkgMjkuMjM3IDI0LjMgMjkuNjM3IDI0LjMgTCAzMy4wMzcgMjQuMyBDIDMzLjUzNyAyNC4zIDM0LjAzNyAyMy45IDM0LjEzNyAyMy40IEwgMzYuMTM3IDEwLjYgQyAzNi4yMzcgMTAuNCAzNS44MzcgMTAgMzUuNDM3IDEwIFogTSAzMC4zMzcgMTcuMiBDIDI5LjkzNyAxOS4zIDI4LjMzNyAyMC44IDI2LjEzNyAyMC44IEMgMjUuMDM3IDIwLjggMjQuMjM3IDIwLjUgMjMuNjM3IDE5LjggQyAyMy4wMzcgMTkuMSAyMi44MzcgMTguMiAyMy4wMzcgMTcuMiBDIDIzLjMzNyAxNS4xIDI1LjEzNyAxMy42IDI3LjIzNyAxMy42IEMgMjguMzM3IDEzLjYgMjkuMTM3IDE0IDI5LjczNyAxNC42IEMgMzAuMjM3IDE1LjMgMzAuNDM3IDE2LjIgMzAuMzM3IDE3LjIgWiI+PC9wYXRoPjxwYXRoIGZpbGw9IiMwMDMwODciIGQ9Ik0gNTUuMzM3IDEwIEwgNTEuNjM3IDEwIEMgNTEuMjM3IDEwIDUwLjkzNyAxMC4yIDUwLjczNyAxMC41IEwgNDUuNTM3IDE4LjEgTCA0My4zMzcgMTAuOCBDIDQzLjIzNyAxMC4zIDQyLjczNyAxMCA0Mi4zMzcgMTAgTCAzOC42MzcgMTAgQyAzOC4yMzcgMTAgMzcuODM3IDEwLjQgMzguMDM3IDEwLjkgTCA0Mi4xMzcgMjMgTCAzOC4yMzcgMjguNCBDIDM3LjkzNyAyOC44IDM4LjIzNyAyOS40IDM4LjczNyAyOS40IEwgNDIuNDM3IDI5LjQgQyA0Mi44MzcgMjkuNCA0My4xMzcgMjkuMiA0My4zMzcgMjguOSBMIDU1LjgzNyAxMC45IEMgNTYuMTM3IDEwLjYgNTUuODM3IDEwIDU1LjMzNyAxMCBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA2Ny43MzcgMi44IEwgNTkuOTM3IDIuOCBDIDU5LjQzNyAyLjggNTguOTM3IDMuMiA1OC44MzcgMy43IEwgNTUuNzM3IDIzLjYgQyA1NS42MzcgMjQgNTUuOTM3IDI0LjMgNTYuMzM3IDI0LjMgTCA2MC4zMzcgMjQuMyBDIDYwLjczNyAyNC4zIDYxLjAzNyAyNCA2MS4wMzcgMjMuNyBMIDYxLjkzNyAxOCBDIDYyLjAzNyAxNy41IDYyLjQzNyAxNy4xIDYzLjAzNyAxNy4xIEwgNjUuNTM3IDE3LjEgQyA3MC42MzcgMTcuMSA3My42MzcgMTQuNiA3NC40MzcgOS43IEMgNzQuNzM3IDcuNiA3NC40MzcgNS45IDczLjQzNyA0LjcgQyA3Mi4yMzcgMy41IDcwLjMzNyAyLjggNjcuNzM3IDIuOCBaIE0gNjguNjM3IDEwLjEgQyA2OC4yMzcgMTIuOSA2Ni4wMzcgMTIuOSA2NC4wMzcgMTIuOSBMIDYyLjgzNyAxMi45IEwgNjMuNjM3IDcuNyBDIDYzLjYzNyA3LjQgNjMuOTM3IDcuMiA2NC4yMzcgNy4yIEwgNjQuNzM3IDcuMiBDIDY2LjEzNyA3LjIgNjcuNDM3IDcuMiA2OC4xMzcgOCBDIDY4LjYzNyA4LjQgNjguNzM3IDkuMSA2OC42MzcgMTAuMSBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA5MC45MzcgMTAgTCA4Ny4yMzcgMTAgQyA4Ni45MzcgMTAgODYuNjM3IDEwLjIgODYuNjM3IDEwLjUgTCA4Ni40MzcgMTEuNSBMIDg2LjEzNyAxMS4xIEMgODUuMzM3IDkuOSA4My41MzcgOS41IDgxLjczNyA5LjUgQyA3Ny42MzcgOS41IDc0LjEzNyAxMi42IDczLjQzNyAxNyBDIDczLjAzNyAxOS4yIDczLjUzNyAyMS4zIDc0LjgzNyAyMi43IEMgNzUuOTM3IDI0IDc3LjYzNyAyNC42IDc5LjUzNyAyNC42IEMgODIuODM3IDI0LjYgODQuNzM3IDIyLjUgODQuNzM3IDIyLjUgTCA4NC41MzcgMjMuNSBDIDg0LjQzNyAyMy45IDg0LjczNyAyNC4zIDg1LjEzNyAyNC4zIEwgODguNTM3IDI0LjMgQyA4OS4wMzcgMjQuMyA4OS41MzcgMjMuOSA4OS42MzcgMjMuNCBMIDkxLjYzNyAxMC42IEMgOTEuNjM3IDEwLjQgOTEuMzM3IDEwIDkwLjkzNyAxMCBaIE0gODUuNzM3IDE3LjIgQyA4NS4zMzcgMTkuMyA4My43MzcgMjAuOCA4MS41MzcgMjAuOCBDIDgwLjQzNyAyMC44IDc5LjYzNyAyMC41IDc5LjAzNyAxOS44IEMgNzguNDM3IDE5LjEgNzguMjM3IDE4LjIgNzguNDM3IDE3LjIgQyA3OC43MzcgMTUuMSA4MC41MzcgMTMuNiA4Mi42MzcgMTMuNiBDIDgzLjczNyAxMy42IDg0LjUzNyAxNCA4NS4xMzcgMTQuNiBDIDg1LjczNyAxNS4zIDg1LjkzNyAxNi4yIDg1LjczNyAxNy4yIFoiPjwvcGF0aD48cGF0aCBmaWxsPSIjMDA5Y2RlIiBkPSJNIDk1LjMzNyAzLjMgTCA5Mi4xMzcgMjMuNiBDIDkyLjAzNyAyNCA5Mi4zMzcgMjQuMyA5Mi43MzcgMjQuMyBMIDk1LjkzNyAyNC4zIEMgOTYuNDM3IDI0LjMgOTYuOTM3IDIzLjkgOTcuMDM3IDIzLjQgTCAxMDAuMjM3IDMuNSBDIDEwMC4zMzcgMy4xIDEwMC4wMzcgMi44IDk5LjYzNyAyLjggTCA5Ni4wMzcgMi44IEMgOTUuNjM3IDIuOCA5NS40MzcgMyA5NS4zMzcgMy4zIFoiPjwvcGF0aD48L3N2Zz4",

    // -----
    // Admin messages, from an order's display, viewing the PayPal transaction history.
    //
    'MODULE_PAYMENT_PAYPALR_TEXT_GETDETAILS_ERROR' => 'ペイパル取引の詳細を取得中に問題が発生しました。',
    'MODULE_PAYMENT_PAYPALR_NO_RECORDS' => '注文番号 %2$u のデータベースに「%1$s」レコードが見つかりませんでした。',
    'MODULE_PAYMENT_PAYPALR_EXTERNAL_ADDITION' => 'ペイパル取引が支払いモジュールの処理外で追加されました。注文のステータスが正しいことを確認してください。',

    // -----
    // Used during the admin's display of the payment transactions on an
    // order's detailed view.
    //
    'MODULE_PAYMENT_PAYPALR_NO_RECORDS_FOUND' => 'この注文のペイパル取引はデータベースに記録されません。',

    'MODULE_PAYMENT_PAYPALR_TXN_TABLE_CAPTION' => 'ペイパル取引',
    'MODULE_PAYMENT_PAYPALR_PAYMENTS_TABLE_CAPTION' => '決済された支払い',
    'MODULE_PAYMENT_PAYPALR_PAYMENTS_TABLE_NOTE' => '注意： 払い戻し手数料はペイパルによって返金されます。',
    'MODULE_PAYMENT_PAYPALR_PAYMENTS_NONE' => '現在決済済みの支払いはありません。',
    'MODULE_PAYMENT_PAYPALR_PAYMENTS_TOTAL' => '決済総額：',
    'MODULE_PAYMENT_PAYPALR_NAME_EMAIL_ID' => '支払人名 / メールアドレス / 支払人ID',
    'MODULE_PAYMENT_PAYPALR_PAYER_ID' => '支払人ID：',
    'MODULE_PAYMENT_PAYPALR_PAYER_STATUS' => '支払人のステータス：',
    'MODULE_PAYMENT_PAYPALR_PAYMENT_TYPE' => '支払い方法：',
    'MODULE_PAYMENT_PAYPALR_PAYMENT_STATUS' => '支払い状況：',
    'MODULE_PAYMENT_PAYPALR_PENDING_REASON' => '保留中の理由：',
    'MODULE_PAYMENT_PAYPALR_INVOICE' => '請求書：',
    'MODULE_PAYMENT_PAYPALR_PAYMENT_DATE' => '支払日：',
    'MODULE_PAYMENT_PAYPALR_GROSS_AMOUNT' => '総額：',
    'MODULE_PAYMENT_PAYPALR_PAYMENT_FEE' => '支払手数料：',
    'MODULE_PAYMENT_PAYPALR_SETTLE_AMOUNT' => '決済金額：',
    'MODULE_PAYMENT_PAYPALR_EXCHANGE_RATE' => '為替レート：',

    'MODULE_PAYMENT_PAYPALR_TXN_TYPE' => 'トランザクションタイプ：',
    'MODULE_PAYMENT_PAYPALR_TXN_ID' => 'トランザクションID：',
    'MODULE_PAYMENT_PAYPALR_TXN_PARENT_TXN_ID' => '親トランザクションID / トランザクションID：',
    'MODULE_PAYMENT_PAYPALR_ACTION' => 'アクション',
        'MODULE_PAYMENT_PAYPALR_ACTION_DETAILS' => '詳細',
        'MODULE_PAYMENT_PAYPALR_ACTION_REAUTH' => '再承認',
        'MODULE_PAYMENT_PAYPALR_ACTION_VOID' => '無効にする',
        'MODULE_PAYMENT_PAYPALR_ACTION_CAPTURE' => 'キャプチャする',
        'MODULE_PAYMENT_PAYPALR_ACTION_REFUND' => '払い戻し',
    'MODULE_PAYMENT_PAYPALR_TXN_STATUS' => 'トランザクションステータス',

    'MODULE_PAYMENT_PAYPALR_CONFIRM' => '確認する',
    'MODULE_PAYMENT_PAYPALR_DAYSTOSETTLE' => '決済までの日数：',
    'MODULE_PAYMENT_PAYPALR_AMOUNT' => '金額：',
    'MODULE_PAYMENT_PAYPALR_CUSTOMER_NOTE' => '顧客メモ：',
    'MODULE_PAYMENT_PAYPALR_DATE_CREATED' => '作成日：',
    'MODULE_PAYMENT_PAYPALR_AMOUNT_RANGE' => '%1$s 1.00 から %1$s %2$s までの金額を入力してください。',
    'MODULE_PAYMENT_PAYPALR_NOTES' => '注：',

    // -----
    // Constants used in the "Details" modal.
    //
    'MODULE_PAYMENT_PAYPALR_DETAILS_TITLE' => 'ペイパル取引の詳細（%s）',    //- %s is one of the following two strings
        'MODULE_PAYMENT_PAYPALR_DETAILS_TYPE_PAYPAL' => 'ペイパルウォレット',
        'MODULE_PAYMENT_PAYPALR_DETAILS_TYPE_CARD' => 'クレジットカード',
    'MODULE_PAYMENT_PAYPALR_BUYER_INFO' => '購入者情報',
    'MODULE_PAYMENT_PAYPALR_PAYER_NAME' => '支払人名：',
    'MODULE_PAYMENT_PAYPALR_PAYER_EMAIL' => '支払人のメールアドレス：',
    'MODULE_PAYMENT_PAYPALR_BUSINESS_NAME' => '会社名：',
    'MODULE_PAYMENT_PAYPALR_ADDRESS_NAME' => '発送先名：',
    'MODULE_PAYMENT_PAYPALR_ADDRESS_STREET' => '番地：',
    'MODULE_PAYMENT_PAYPALR_ADDRESS_CITY' => '市区町村：',
    'MODULE_PAYMENT_PAYPALR_ADDRESS_STATE' => '都道府県：',
    'MODULE_PAYMENT_PAYPALR_ADDRESS_ZIP' => '郵便番号：',
    'MODULE_PAYMENT_PAYPALR_ADDRESS_COUNTRY' => '国：',
    'MODULE_PAYMENT_PAYPALR_SELLER_INFO' => '販売者情報',
    'MODULE_PAYMENT_PAYPALR_CART_ITEMS' => 'カートのアイテム：',
    'MODULE_PAYMENT_PAYPALR_MERCHANT_NAME' => '販売者名：',
    'MODULE_PAYMENT_PAYPALR_MERCHANT_EMAIL' => '販売者のメールアドレス：',
    'MODULE_PAYMENT_PAYPALR_MERCHANT_ID' => '販売者ID：',
    'MODULE_PAYMENT_PAYPALR_SELLER_PROTECTION' => '販売者保護：',
    'MODULE_PAYMENT_PAYPALR_PROCESSOR_RESPONSE' => 'プロセッサの応答：',
        'MODULE_PAYMENT_PAYPALR_AVS_CODE' => 'AVS コード（%s）',
        'MODULE_PAYMENT_PAYPALR_RESPONSE_CODE' => '応答コード（%s）',
        'MODULE_PAYMENT_PAYPALR_CVV_CODE' => 'CVV コード（%s）',
    'MODULE_PAYMENT_PAYPALR_AUTH_RESULT' => '認証結果：',
        'MODULE_PAYMENT_PAYPALR_LIABILITY' => '責任の移転（%s）',
        'MODULE_PAYMENT_PAYPALR_AUTH_STATUS' => '認証ステータス（%s）',
        'MODULE_PAYMENT_PAYPALR_ENROLL_STATUS' => '登録ステータス（%s）',
    'MODULE_PAYMENT_PAYPALR_AMOUNT_MISMATCH' => '注文金額の不一致： %s',    //- %s is the base order-calculation amount/currency-code
    'MODULE_PAYMENT_PAYPALR_CALCULATED_AMOUNT' => '計算金額：',
    'MODULE_PAYMENT_PAYPALR_INVOICE_NUMBER' => '請求書番号：',

    // -----
    // Constants used in the "Refunds" modal.
    //
    'MODULE_PAYMENT_PAYPALR_REFUND_TITLE' => '支払いの払い戻し',
    'MODULE_PAYMENT_PAYPALR_REFUND_INSTRUCTIONS' => 'キャプチャされた支払いの全部または一部を払い戻すことができます。',
        'MODULE_PAYMENT_PAYPALR_REFUND_NOTE1' => '<em>全額</em>払い戻しでは、キャプチャされた支払いの残りの未払い残高が払い戻されます。',
        'MODULE_PAYMENT_PAYPALR_REFUND_NOTE2' => '<em>部分的</em>払い戻しでは、キャプチャされた支払いの一部が払い戻されます。',
        'MODULE_PAYMENT_PAYPALR_REFUND_NOTE3' => '残りの未払い残高まで、複数回の<em>部分的</em>払い戻しを発行できます。',
    'MODULE_PAYMENT_PAYPALR_REFUND_CAPTURE_ID' => 'キャプチャトランザクションID：',
    'MODULE_PAYMENT_PAYPALR_REMAINING_TO_REFUND' => '払い戻し残高：',
    'MODULE_PAYMENT_PAYPALR_REFUND_AMOUNT' => '返金金額：',
    'MODULE_PAYMENT_PAYPALR_REFUND_FULL' => '全額返金ですか？',
    'MODULE_PAYMENT_PAYPALR_REFUND_DEFAULT_MESSAGE' => 'ストア管理者によって返金されました。',

    'MODULE_PAYMENT_PAYPALR_REFUND_PARAM_ERROR' => 'この注文の支払いを払い戻す際に無効なパラメータ（CP %u）が指定されました。もう一度お試しください。',
    'MODULE_PAYMENT_PAYPALR_REFUND_ERROR' => '取引の払い戻し中に問題が発生しました。',

    'MODULE_PAYMENT_PAYPALR_REFUND_COMPLETE' => '%s の金額の払い戻しが完了しました。',

    // -----
    // Constants used in the "Re-Authorize" modal.
    //
    'MODULE_PAYMENT_PAYPALR_REAUTH_TITLE' => '注文の再承認',
    'MODULE_PAYMENT_PAYPALR_REAUTH_INSTRUCTIONS' => '資金がまだ利用可能であることを確認するために、最初の３日間の支払期限が切れた後に支払いを再承認することができます。',
        'MODULE_PAYMENT_PAYPALR_REAUTH_NOTE1' => '２９日間の承認期間内であれば、以前に発行された承認の３日間の有効期間が終了した後も、複数の再承認を発行できます。',
        'MODULE_PAYMENT_PAYPALR_REAUTH_NOTE2' => '最初の承認日から３０日が経過した場合は、最初の承認を再行うのではなく、承認済みの支払いを作成する必要があります。',
        'MODULE_PAYMENT_PAYPALR_REAUTH_NOTE3' => '再承認された支払い自体には、３日間の新しい支払期限があります。',
        'MODULE_PAYMENT_PAYPALR_REAUTH_NOTE4' => '承認された支払いは、元の承認金額（%s）の最大 115%% まで、７５米ドルを超える増額なしで<em>１回</em>再承認できます。',

    'MODULE_PAYMENT_PAYPALR_REAUTH_ORIGINAL' => '元の金額：',
    'MODULE_PAYMENT_PAYPALR_REAUTH_NEW_AMOUNT' => '承認金額：',
    'MODULE_PAYMENT_PAYPALR_REAUTH_DAYS_FROM_LAST' => '前回の承認からの日数：',
    'MODULE_PAYMENT_PAYPALR_REAUTH_NOT_POSSIBLE' => '履行期間が有効なため、注文を再承認することはできません。',

    'MODULE_PAYMENT_PAYPALR_REAUTH_PARAM_ERROR' => 'この注文を再承認しようとしたときに無効なパラメータ（CP %u）が指定されました。もう一度お試しください。',
    'MODULE_PAYMENT_PAYPALR_REAUTH_ERROR' => '取引の承認中に問題が発生しました。',
    'MODULE_PAYMENT_PAYPALR_REAUTH_TOO_SOON' => '再承認は、最初の承認日から４日目から２９日目までの間に１回のみ許可されます。',

    'MODULE_PAYMENT_PAYPALR_REAUTH_COMPLETE' => '%s の金額の再承認が完了しました。',

    // -----
    // Constants used in the "Capture" modal.
    //
    'MODULE_PAYMENT_PAYPALR_CAPTURE_TITLE' => '承認を取得する',
    'MODULE_PAYMENT_PAYPALR_CAPTURE_INSTRUCTIONS' => 'この注文の未払い資金の全部または一部をキャプチャするには、以下の「金額」を入力し、これが注文の <b>最終</b> キャプチャであるかどうかを指定して、「キャプチャ」ボタンをクリックします。',
    'MODULE_PAYMENT_PAYPALR_CAPTURE_FINAL_TEXT' => '最終捕獲？',
    'MODULE_PAYMENT_PAYPALR_CAPTURE_REMAINING' => '残りの資金を獲得しますか？',
    'MODULE_PAYMENT_PAYPALR_CAPTURED_SO_FAR' => '以前にキャプチャされたもの：',
    'MODULE_PAYMENT_PAYPALR_REMAINING_TO_CAPTURE' => '残りキャプチャ：',
    'MODULE_PAYMENT_PAYPALR_CAPTURE_DEFAULT_MESSAGE' => 'ご注文ありがとうございます。',

    'MODULE_PAYMENT_PAYPALR_CAPTURE_PARAM_ERROR' => 'この注文の資金をキャプチャしようとしたときに無効なパラメータ（CP %u）が指定されました。もう一度お試しください。',
    'MODULE_PAYMENT_PAYPALR_CAPTURE_ERROR' => 'トランザクションのキャプチャ中に問題が発生しました。',
    'MODULE_PAYMENT_PAYPALR_CAPTURE_AMOUNT' => '残りの資金をキャプチャする場合を除き、キャプチャ金額はゼロより大きくなければなりません。',

    'MODULE_PAYMENT_PAYPALR_CAPTURE_NO_REMAINING' => 'この注文の承認済み資金はすべて正常に獲得されました。',
    'MODULE_PAYMENT_PAYPALR_CAPTURE_COMPLETE' => '注文番号%uの支払いが完了しました。',
    'MODULE_PAYMENT_PAYPALR_PARTIAL_CAPTURE' => '部分的にキャプチャされました。',
    'MODULE_PAYMENT_PAYPALR_FINAL_CAPTURE' => '最終キャプチャ。',

    // -----
    // Constants used in the "Void" modal.
    //
    'MODULE_PAYMENT_PAYPALR_VOID_TITLE' => '承認を無効にする',
    'MODULE_PAYMENT_PAYPALR_VOID_INSTRUCTIONS' => 'この取引を無効にするには、以下の入力フィールドに「承認 ID」を入力/コピーし、「無効にする」ボタンをクリックしてください。',
    'MODULE_PAYMENT_PAYPALR_VOID_AUTH_ID' => '認証ID：',
    'MODULE_PAYMENT_PAYPALR_VOID_DEFAULT_MESSAGE' => '取引は無効になりました。',

    'MODULE_PAYMENT_PAYPALR_VOID_PARAM_ERROR' => 'この注文の承認を無効にしようとしたときに無効なパラメータが指定されました。もう一度お試しください。',
    'MODULE_PAYMENT_PAYPALR_VOID_BAD_AUTH_ID' => '注文の<em>プライマリ</em>承認のみを無効にできます。もう一度お試しください。',
    'MODULE_PAYMENT_PAYPALR_VOID_ERROR' => '取引を無効にする際に問題が発生しました。',
    'MODULE_PAYMENT_PAYPALR_VOID_MEMO' => '取引は%1$sによって無効にされました。',
    'MODULE_PAYMENT_PAYPALR_VOID_INVALID_TXN_ID' => '入力したトランザクション ID（%1$s）が見つかりませんでした。もう一度お試しください。',
    'MODULE_PAYMENT_PAYPALR_VOID_COMPLETE' => '注文番号%uの支払い承認が無効になりました。',

// bof constant configuration titles and descriptions for payment module paypalr
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_VERSION' => 'モジュールバージョン',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_VERSION' => '現在インストールされているモジュールのバージョン。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_STATUS' => 'この支払いモジュールを有効にしますか？',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_STATUS' => 'この支払いモジュールを有効にしますか？この支払いモジュールを削除する予定だが、このモジュールを使用して行われた注文に対して管理アクションを実行する必要がある場合には、<b>廃止</b> 設定を使用します。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_SERVER' => '環境',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_SERVER' => '<b>ライブ: </b> ライブトランザクションの処理に使用<br><b>サンドボックス: </b> 開発者およびテスト用',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_CLIENTID_L' => 'クライアント ID（ライブ）',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_CLIENTID_L' => '<b>ライブ</b>サイトの*API アクセス*のペイパル API 署名設定からの <em>クライアント ID</em>。<b>ライブ</b>環境を使用する場合に必要です。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_SECRET_L' => 'クライアントシークレット（ライブ）',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_SECRET_L' => '<b>ライブ</b>サイトの*API アクセス*の下にあるペイパル API 署名設定からの <em>クライアント シークレット</em>。<b>ライブ</b>環境を使用する場合に必要です。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_CLIENTID_S' => 'クライアント ID（サンドボックス）',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_CLIENTID_S' => '<b>サンドボックス</b> サイトの *API アクセス* のペイパル API 署名設定の <em>クライアント ID</em>。<b>サンドボックス</b> 環境を使用する場合に必要です。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_SECRET_S' => 'クライアントシークレット（サンドボックス）',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_SECRET_S' => '<b>サンドボックス</b> サイトの *API アクセス* のペイパル API 署名設定からの <em>クライアント シークレット</em>。<b>サンドボックス</b> 環境を使用する場合に必要です。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_SORT_ORDER' => '表示順',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_SORT_ORDER' => '表示順を設定します。 最下位が最初に表示されます。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_ZONE' => '支払い地帯',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_ZONE' => '地帯が選択されている場合は、その地帯に対してのみこの支払い方法を有効にしてください。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_ORDER_STATUS_ID' => '注文ステータスの設定',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_ORDER_STATUS_ID' => '支払いが正常に<em>キャプチャ</em>された注文のステータスをこのステータスに設定します。<br>推奨: <b>処理中[2]</b><br>',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_ORDER_PENDING_STATUS_ID' => '未払い注文ステータスを設定する',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_ORDER_PENDING_STATUS_ID' => '支払いが正常に<em>承認</em>された注文のステータスをこのステータスに設定します。<br>推奨: <b>処理待ち[1]</b><br>',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_REFUNDED_STATUS_ID' => '払い戻し注文ステータスの設定',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_REFUNDED_STATUS_ID' => '<em><b>全額</b>返金された</em>注文のステータスをこのステータスに設定します。<br>推奨: <b>処理待ち[1]</b><br>',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_VOIDED_STATUS_ID' => '無効注文ステータスを設定する',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_VOIDED_STATUS_ID' => '<em>無効化された</em>注文のステータスをこのステータスに設定します。<br>推奨: <b>処理待ち[1]</b><br>',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_HELD_STATUS_ID' => '保留注文ステータスの設定',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_HELD_STATUS_ID' => 'レビューのために保留されている注文のステータスをこのステータスに設定します。<br>推奨: <b>処理待ち[1]</b><br>',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_BRANDNAME' => 'ペイパルのストア（ブランド）名',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_BRANDNAME' => 'ペイパルログイン ページに表示されるストアの名前。空白の場合は、ストア名が使用されます。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_TRANSACTION_MODE' => '支払いアクション',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_TRANSACTION_MODE' => '支払いはどのように受け取りたいですか？<br><strong>デフォルト：最終販売</strong><br>「認証のみ」を選択した場合は、支払いを確定するためにペイパルによる確認が必要になります。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_CURRENCY' => '取引通貨',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_CURRENCY' => 'ペイパルへの注文はどの通貨で送信すればよいですか？<br>注意： サポートされていない通貨がペイパルに送信された場合、<em>代替通貨</em>に自動的に変換されます。<br><strong>デフォルト：選択された通貨</strong>',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_CURRENCY_FALLBACK' => '代替通貨',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_CURRENCY_FALLBACK' => '<b>取引通貨</b>が<em>選択された通貨</em>に設定されている場合、顧客が選択した通貨がペイパルでサポートされていない場合に、どの通貨を代替として使用する必要がありますか？<br><b>デフォルト： USD</b>',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_SCA_ALWAYS' => '<b>すべての</b>トランザクションで 3D セキュアをトリガーしますか？',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_SCA_ALWAYS' => 'SCA 要件に関係なく、<b>すべての</b>トランザクションに対して 3D Secure をトリガーするには、<var>true</var> を選択します。<br><br><b>デフォルト</b>：<var>false</var>',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_ACCEPT_CARDS' => 'クレジットカードは使えますか？',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_ACCEPT_CARDS' => '支払いモジュールはクレジットカードによる支払いを受け入れる必要がありますか？<var>ライブ</var> トランザクションを実行する場合、カード支払いを受け入れるには、<var>https</var> プロトコルを使用するようにストアフロントを設定する必要があります。<br><br>ストアで One-Page Checkout を使用している場合は、クレジットカードでの支払いをアカウント所有者に制限できます。<br><b>デフォルト： false</b>',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_HANDLING_OT' => '注文合計に<var>手数料</var>を記載する',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_HANDLING_OT' => 'カンマ区切りのリスト（間にスペースを入れてもかまいません）を使用して、注文に <em>手数料</em> 要素を追加する <code>ot_loworderfee</code> 以外の注文合計モジュールを指定します。モジュールがない場合は、設定を空の文字列のままにします（デフォルト）。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_INSURANCE_OT' => '注文合計に<var>保険</var>をリストする',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_INSURANCE_OT' => '注文に <em>保険</em> 要素を追加する注文合計モジュールを、コンマ区切りのリスト（間にスペースがあってもかまいません）を使用して指定します。モジュールがない場合は、設定を空の文字列のままにします（デフォルト）。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_DISCOUNT_OT' => '注文合計に <var>割引</var> をリストする',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_DISCOUNT_OT' => 'カンマ区切りのリスト（間にスペースを入れてもかまいません）を使用して、注文に <em>割引</em> 要素を追加する注文合計モジュール（<code>ot_coupon</code>、<code>ot_gv</code>、<code>ot_group_pricing</code> 以外）を指定します。モジュールがない場合は、設定を空の文字列のままにします（デフォルト）。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_DEBUGGING' => 'デバッグモード',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_DEBUGGING' => 'デバッグモードを有効にしますか？失敗したトランザクションの完全な詳細ログがストア所有者に電子メールで送信されます。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_SOFT_DESCRIPTOR' => 'ペイパルのストア（サブブランド）識別子',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_SOFT_DESCRIPTOR' => '顧客のクレジットカード明細書には、会社名が<code>PAYPAL*(yourname)*(your-sub-brand-name)</code>と表示されます（(yourname)*(your-sub-brand-name)は最大22文字）。このストアでの購入と他のペイパルでの購入を区別したい場合は、ここにサブブランド名を追加できます。',
    'CFGTITLE_MODULE_PAYMENT_PAYPALR_PAYLATER_MESSAGING' => 'PayLaterメッセージ',
    'CFGDESC_MODULE_PAYMENT_PAYPALR_PAYLATER_MESSAGING' => 'ペイパル後払いのメッセージはどのページに表示しますか？（利用できない地域では自動的に表示されません。USD、GBP、EUR、AUDでのみ利用可能です。）有効にすると、表示されている商品またはカート金額に対する分割払いの低価格が表示されます。これにより、購入決定が早まる可能性があります。<br>無効にするには、すべてのチェックを外してください。',
// eof constant configuration titles and descriptions for payment module paypalr
];

if (IS_ADMIN_FLAG === true) {
    $define['MODULE_PAYMENT_PAYPALR_TEXT_ADMIN_DESCRIPTION'] =
        '<b>ペイパル支払い（RESTful）</b>, v%s<br><br>' .   //- %s is filled in with the current module version
        '<a href="https://www.paypal.com/login" rel="noopener noreferrer" target="_blank">ペイパル<b>ビジネス</b> アカウントを管理する</a><br><br>' .
        '<b>設定手順：</b><br>' .
        '<ol>
            <li><a href="https://github.com/lat9/paypalr/wiki/Creating-PayPal-Credentials" rel="noopener noreferrer" target="_blank">ペイパル認証情報を作成します（英語）。</a></li>
            <li><a href="https://github.com/lat9/paypalr/wiki/Configuring-the-Payment-Module" rel="noopener noreferrer" target="_blank">モジュールの追加設定を構成します。</a></li>
         </ol>' .
        '<p>詳細については、支払いモジュールの GitHub Wiki <a href="https://github.com/lat9/paypalr/wiki" rel="noopener noreferrer" target="_blank">記事</a>を参照してください。</p>';
}

return $define;

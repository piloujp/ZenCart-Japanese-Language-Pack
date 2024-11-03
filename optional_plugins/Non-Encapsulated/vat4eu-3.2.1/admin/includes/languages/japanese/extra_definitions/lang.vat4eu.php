<?php
$define = [
    'CFG_GRP_TITLE_VAT4EU_PLUGIN' => 'EU 諸国向けの VAT プラグイン（VAT4EU）';
    'CFGTITLE_VAT4EU_MODULE_VERSION' => 'プラグインのバージョンとリリース日',
    'CFGDESC_VAT4EU_MODULE_VERSION' => '「EU 諸国向け VAT (VAT4EU)」の現在のバージョンとリリース日。',
    'CFGTITLE_VAT4EU_EU_COUNTRIES' => '欧州連合諸国リスト',
    'CFGDESC_VAT4EU_EU_COUNTRIES' => 'このコンマ区切りのリストは、EU 加盟国を 2 文字の ISO コードで識別します。スペースも使用できます。通常、このリストを変更する必要はありません。このリストは、加盟国が EU に加盟したり EU から脱退したりするときに提供されます。<br><br><b>デフォルト</b>： AT, BE, BG, CY, CZ, DE, DK, EE, GR, ES, FI, FR, HR, HU, IE, IT, LT, LU, LV, MT, NL, PL, PT, RO, SE, SI, SK',
    'CFGTITLE_VAT4EU_ENABLED' => 'ストアフロントでの処理を有効にしますか？',
    'CFGDESC_VAT4EU_ENABLED' => 'この設定が「true」で、<em>構成 :: 顧客詳細 :: 会社</em> も <b>true</b> に設定されている場合、<em>VAT4EU</em> 処理が有効になります。',
    'CFGTITLE_VAT4EU_REQUIRED' => 'VAT番号は必須ですか？',
    'CFGDESC_VAT4EU_REQUIRED' => '<em>VAT 番号</em>は<b>必須</b>フィールドである必要がありますか？',
    'CFGTITLE_VAT4EU_MIN_LENGTH' => '最小 VAT 番号の長さ',
    'CFGDESC_VAT4EU_MIN_LENGTH' => '入力された VAT 番号の最小長を識別します。これは、入力値の事前チェックとして使用されます。このチェックを無効にするには、値を <em>0</em> に設定します。',
    'CFGTITLE_VAT4EU_IN_COUNTRY_REFUND' => '国内購入に対して <em>VAT 払い戻し</em> を有効にしますか？',
    'CFGDESC_VAT4EU_IN_COUNTRY_REFUND' => 'ストアの所在国の住所による購入には、<em>VAT 払い戻し</em>が適用されますか？',
    'CFGTITLE_VAT4EU_VALIDATION' => '<em>VAT 番号</em> の検証',
    'CFGDESC_VAT4EU_VALIDATION' => '顧客に VAT 払い戻しを許可する前に、<em>VAT 番号</em> を検証する必要があります。ストアで使用する検証方法を次のいずれかから選択します。<br><br><b>Customer</b> ... 顧客の更新時にTVA番号を検証します<br><b>Admin</b> ... 管理者のアクションによってのみ TVA 番号が検証されます。<br>',
    'CFGTITLE_VAT4EU_UNVERIFIED' => 'VAT番号： 「未検証」インジケータ',
    'CFGDESC_VAT4EU_UNVERIFIED' => '<em>VAT 番号</em>を入力したが、その番号がまだ検証されていない場合に顧客に表示するインジケーターを指定します。<br><br>デフォルト： <b>*</b>',
    'CFGTITLE_VAT4EU_DEBUG' => 'デバッグを有効にしますか？',
    'CFGDESC_VAT4EU_DEBUG' => 'プラグインの <em>デバッグ</em> モードを有効にする必要がありますか？有効にすると、各 VAT 検証要求と応答が /logs/VatValidate.log に記録されます。',
];

return $define;
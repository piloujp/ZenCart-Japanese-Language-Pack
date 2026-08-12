<?php
/**
 * @copyright Copyright 2003-2025 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: lat9 2025 Sep 24 New in v2.2.0 $
 *
 * @since ZC v2.2.0
 */
$store_name = zen_config('STORE_NAME');
$store_owner_email_address = zen_config('STORE_OWNER_EMAIL_ADDRESS');
$define = [
    'EMAIL_SUBJECT' => $store_name . 'へようこそ',
    'EMAIL_GREET_MR' => '%s様' . "\n\n",
    'EMAIL_GREET_MS' => '%s様' . "\n\n",
    'EMAIL_GREET_NONE' => '%s様' . "\n\n",
    'EMAIL_WELCOME' => '謹啓　この度は<strong>' . $store_name . 'にご登録いただきありがとうございました。</strong>',
    'EMAIL_SEPARATOR' => '--------------------',
    'EMAIL_COUPON_INCENTIVE_HEADER' => 'ご登録いただいたお礼に次回<strong>' . $store_name . '</strong>をご利用の際にお使い' . "\n" .'いただける「割引クーポン」をお送りします!' . "\n\n",
    'EMAIL_COUPON_REDEEM' => 'クーポンコード： <strong>%s</strong>' . "\n\n" . 'この割引クーポンをお使いになるには、お買い物' . "\n" . 'の精算時に上記コードを入力してください。' . "\n\n",
    'EMAIL_GV_INCENTIVE_HEADER' => '本日に限り %sの' . TEXT_GV_NAME . 'をお送りします!' . "\n",
    'EMAIL_GV_REDEEM' => 'The ' . TEXT_GV_NAME . ' ' . TEXT_GV_REDEEM . ' は：%s ' . "\n\n" . 'お客様が当ショップで商品をお選びになった後、精算時に「' . TEXT_GV_REDEEM . 'を入力していただくことでお使いいただけます。',
    'EMAIL_GV_LINK' => '下記のリンクから今すぐ引き換えることもできます：' . "\n",
    'EMAIL_GV_LINK_OTHER' => 'お客様ご自身のアカウントに' . TEXT_GV_NAME . 'を追加しておけば、ご自分で' . TEXT_GV_NAME . 'をお使いいただけます。またお知り合いの方にプレゼントすることもできます。' . "\n\n",
    'EMAIL_TEXT' => $store_name . ' のアカウントが作成されました。以下の機能が利用できます:' . "\n\n<ul>" . '<li><strong>注文履歴</strong> - 注文の詳細を表示します。</li>' . "\n\n" . '<li><strong>カートの永続化</strong> - カートに追加した商品は、削除または購入されるまでカートに残ります。</li>' . "\n\n" . '<li><strong>住所録</strong> - 追加の住所を定義します (たとえば、ギフトを送る場合)。</li>' . "\n\n" . '<li><strong>商品レビュー</strong> - 当社の製品に関するご意見を他のお客様と共有します。</li>' . "\n\n</ul>",
    'EMAIL_CONTACT' => '当ショップのオンラインサービスで何かご不明な点がございましたら、Eメールにてお気軽にお問い合わせ下さい：<a href="mailto:' . $store_owner_email_address . '">'. $store_owner_email_address ." </a>\n\n",
    'EMAIL_GV_CLOSURE' => '謹白' . "\n\n店長 " . zen_config('STORE_OWNER') . "\n\n". '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'.HTTP_SERVER . DIR_WS_CATALOG ."</a>\n\n",
    'EMAIL_DISCLAIMER_NEW_CUSTOMER' => 'このメールアドレスは、お客様ご自身によって当ショップに登録されました。もしアカウント登録をされた覚えがない場合には、お手数ですが %s までご連絡ください。',
];
return $define;

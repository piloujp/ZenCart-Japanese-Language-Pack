<?php
/**
 * @copyright Copyright 2003-2025 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: lat9 2025 Sep 24 New in v2.2.0 $
 *
 * @since ZC v2.2.0
 */
$define = [
    'EMAIL_SUBJECT' => STORE_NAME . 'へようこそ',
    'EMAIL_GREET_MR' => '%s様' . "\n\n",
    'EMAIL_GREET_MS' => '%s様' . "\n\n",
    'EMAIL_GREET_NONE' => '%s様' . "\n\n",
    'EMAIL_WELCOME' => '<strong>' . STORE_NAME . '</strong>へようこそ。',
    'EMAIL_SEPARATOR' => '--------------------',
    'EMAIL_COUPON_INCENTIVE_HEADER' => 'おめでとうございます！当オンラインショップでの次回のお買い物をより充実したものにしていただくため、お客様だけのためにご用意した割引クーポンの詳細を以下にご案内いたします。' . "\n\n",
    'EMAIL_COUPON_REDEEM' => '割引クーポンをご利用になるには、チェックアウト時に「' . TEXT_GV_REDEEM . '」コードを入力してください： <strong>%s</strong>' . "\n\n",
    'EMAIL_GV_INCENTIVE_HEADER' => '本日はお立ち寄りいただきありがとうございます。%s分の「' . TEXT_GV_NAME . '」をお送りいたしました！' . "\n",
    'EMAIL_GV_REDEEM' => TEXT_GV_NAME . ' ' . TEXT_GV_REDEEM . ' は %s です。' . "\n\n" . 'ストアで商品を選んだ後、チェックアウト時に「' . TEXT_GV_REDEEM . '」を入力できます。',
    'EMAIL_GV_LINK' => 'または、こちらのリンクから今すぐご利用いただけます：' . "\n",
    'EMAIL_GV_LINK_OTHER' => 'アカウントに「' . TEXT_GV_NAME . '」を追加すると、ご自身で利用したり、ご友人に送ったりすることができます！' . "\n\n",
    'EMAIL_TEXT' => 'これで、「' . STORE_NAME . '」のアカウントが作成されました。このアカウントでは、以下のサービスが利用可能です：' . "\n\n<ul>" . '<li><strong>注文履歴</strong> - 注文の詳細を確認できます。</li>' . "\n\n" . '<li><strong>永続的なカート</strong> - カートに追加した商品は、削除または購入されるまでそのまま残ります。</li>' . "\n\n" . '<li><strong>アドレス帳</strong> - 追加の配送先住所を登録できます（ギフトの送付など）。</li>' . "\n\n" . '<li><strong>商品レビュー</strong> - 当店の商品に関するご意見を、他のお客様と共有できます。</li>' . "\n\n</ul>",
    'EMAIL_CONTACT' => '当社のオンラインサービスに関するお問い合わせは、ストア運営者までメールにてご連絡ください：<a href="mailto:' . STORE_OWNER_EMAIL_ADDRESS . '">' . STORE_OWNER_EMAIL_ADDRESS . "</a>\n\n",
    'EMAIL_GV_CLOSURE' => "\n" . '敬具' . "\n\n" . STORE_OWNER . "\n店主\n\n" . '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . HTTP_SERVER . DIR_WS_CATALOG . "</a>\n\n",
    'EMAIL_DISCLAIMER_NEW_CUSTOMER' => 'このメールアドレスは、お客様ご自身、または当社のお客様から提供されたものです。アカウントの登録を行っていない場合や、誤ってこのメールを受け取ったと思われる場合は、%s 宛てにメールをお送りください。',
];
return $define;

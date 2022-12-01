<?php
$define = [
    'HEADING_CVV' => 'CVVとは?',
    'TEXT_CVV_HELP1' => 'Visa、Mastercard、Discoverカード照合番号(CVV)<br><br>
                    お客様の情報保護のため、カード照合番号(CVV)を記入してください。<br><br>
                    カード照合番号(CVV)はカードの裏面の署名欄に記入されている3桁の数字です。
                    カード番号の下3桁か、その後に記載されています。<br>' . zen_image(DIR_WS_TEMPLATE_ICONS . 'cvv2visa.gif'),
    'TEXT_CVV_HELP2' => 'American Expressカード照合番号(CVV)<br><br>
                    お客様の情報保護のため、カード照合番号(CVV)を記入してください。<br><br>
                    American Expressのカード照合番号は表面の4桁の番号です。
                    カード番号の下4桁かその後にある数字です。<br>' . zen_image(DIR_WS_TEMPLATE_ICONS . 'cvv2amex.gif'),
    'TEXT_CLOSE_CVV_WINDOW' => 'ウィンドウを閉じる[x]',
];

return $define;

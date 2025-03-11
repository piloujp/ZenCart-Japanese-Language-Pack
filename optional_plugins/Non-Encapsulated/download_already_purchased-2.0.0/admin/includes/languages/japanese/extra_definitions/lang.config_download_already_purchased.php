<?php

$define = [
    'CFGTITLE_DOWNLOAD_ALREADY_PURCHASED_MESSAGING' => 'ダウンロードはすでに購入済み：メッセージング',
    'CFGDESC_DOWNLOAD_ALREADY_PURCHASED_MESSAGING' => '<br>顧客に製品のダウンロードを以前購入したことを通知する方法を、次のいずれかで選択します。<ol><li><strong>無効：</strong> 特別な処理はありません。ダウンロードは、メッセージなしでいつでも再購入できます。</li><li><strong>有効期限切れ時に連絡：</strong> 製品のダウンロードの有効期限のステータスに関係なく、アイテムを再購入することはできません。ダウンロードの有効期限が切れていない場合、顧客は注文情報ページにリダイレクトされ、アクティブなダウンロード リンクが表示されます。期限切れの場合は、顧客が以前に製品を購入しており、ダウンロードをリセットするにはストアに連絡する必要があることを示すメッセージが表示されます。</li><li><strong>有効期限を強制：</strong> ダウンロードの有効期限が切れていない場合、アイテムを再購入することはできません。代わりに、顧客は注文情報ページにリダイレクトされ、アクティブなダウンロード リンクが表示されます。期限切れの場合は、顧客は製品を再購入できます。</li></ol>',
    'CFGTITLE_DOWNLOAD_ALREADY_PURCHASED_EXCLUDE_PRODUCTS' => 'すでに購入済みのダウンロード：製品の除外',
    'CFGDESC_DOWNLOAD_ALREADY_PURCHASED_EXCLUDE_PRODUCTS' => '<br>「すでに購入済み」の処理から除外する製品 ID 値のコンマ区切りリストを入力します。',
    'CFGTITLE_DOWNLOAD_ALREADY_PURCHASED_EXCLUDE_CATEGORIES' => '購入済みのダウンロード：カテゴリの除外',
    'CFGDESC_DOWNLOAD_ALREADY_PURCHASED_EXCLUDE_CATEGORIES' => '<br>関連製品を「購入済み」処理から除外するカテゴリ ID 値のコンマ区切りリストを入力します。',
];

return $define;
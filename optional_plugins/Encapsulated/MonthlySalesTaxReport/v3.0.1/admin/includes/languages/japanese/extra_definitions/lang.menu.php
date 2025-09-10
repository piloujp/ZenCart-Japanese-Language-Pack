<?php

$define = [
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_MONTHLYSALESTAXREPORT' => '月次売上および税金集計表',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_MONTHLYSALESTAXREPORT' => 'このレポートは、月次または日次の合計を要約して表示します。<ul><li>総収入（注文合計額）</li><li>選択した期間内のすべての注文の小計</li><li>非課税売上小計</li><li>課税対象売上小計</li><li>徴収された税金</li><li>送料・手数料</li><li>注文手数料が低い（手数料が発生する場合）</li><li>ギフト券（またはその他の注文合計金額に加算される項目がある場合）</li></ul><br>このデータは「orders」テーブルと「orders_total」テーブルから取得されています。',
];

return $define;

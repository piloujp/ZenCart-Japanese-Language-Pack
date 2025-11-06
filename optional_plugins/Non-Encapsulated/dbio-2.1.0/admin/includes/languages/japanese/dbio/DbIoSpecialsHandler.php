<?php
// -----
// Part of the DataBase Import/Export (aka DbIo) plugin, created by Cindy Merkin (cindy@vinosdefrutastropicales.com)
// Copyright (c) 2020, Vinos de Frutas Tropicales.
//

// -----
// Defines the handler's descriptive text.
//
define('DBIO_SPECIALS_DESCRIPTION', 'このレポート形式は、<code>specials</code> テーブル内のすべてのフィールドと Specials Products 情報のインポート/エクスポートをサポートしています。<br><br><b>注</b><ol><li>インポートを成功させるには、少なくとも <code>v_products_id</code> 列と <code>v_specials_new_products_price</code> 列が存在している必要があります。</li><li>インポート時に指定された <code>v_products_id</code> は、有効な商品に関連付けられている必要があります。</li><li><code>v_specials_new_products_price</code> 値には、特定の販売価格（例：５９９）または割引率（例：７.５％）を指定できます。割引率の特別価格は、商品の現在の基本価格を使用して計算されます。</li><li><b>Modules::Order Total::Gift Certificates</b> が有効になっていて、ギフト カードを特別価格に設定できるように構成されていない限り、そのような商品を特別価格に設定することはできません。</li><li>商品の特別価格は、特定の products_id に対して <b>REMOVE</b> を指定した <code>v_dbio_command</code> 列を含めることで、データベースから削除できます。</li></ol>');

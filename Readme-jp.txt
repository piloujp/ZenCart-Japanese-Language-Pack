Zen Cart v1.5.8 Japanese language pack installation information (オリジナルリリース2022-11-11) by Pilou2.

この言語パックには、日本語ファイルだけでなく、コア ファイルとデータベースの変更が含まれており、ふりがな、商品寸法、バーコードを使用する可能性が追加されています。
これにより、日本のヤマト便、ネコポス、佐川急便、日本郵便ゆうパック、レターパック ライト、レターパック プラス、および EMS サービスを利用できます。配送、支払い、および注文の合計モジュール ファイルが含まれています。
このセットにより、日本で Zen Cart を使用できるようになります。日本に顧客がいて日本人ではない場合、管理インターフェースを英語のままにしておくか、完全に翻訳された環境が必要な場合は日本語に設定できます。インストール時に選択する必要があります。

翻訳のほとんどは、もう存在しない Zen-Cart.jp のメンバーの作品です。
ふりがなと日本の配送モジュールを追加し、寸法に基づいた配送料を設定するというアイデアは 10 年以上前のものですが、Zen Cart v1.5.8 で再設計されました。
日本では名前の漢字の読み方が地域によって大きく異なるため、管理者側でもフリガナは非常に便利です。
日本の配送方法の料金は、荷物のサイズに基づいており、重量制限もあります。固定料金の配送でもサイズ制限がありますので、正確な見積もりを提供するために商品の寸法が必要です。
そして、三つの主要な運送会社はすべて、配達時間の選択も提供しています。これらのパラメータがデータベースに追加されたのはそのためです。もちろん、いくつかのコア ファイルが大幅に変更されています。
バーコードだけは実は日本語版とは関係ありませんが、、コア ファイルの変更が既に存在するため、これを追加するのにそれほど労力は必要ありませんでした。


インストール：
---------
---------
いつものように、既存のカート ファイルとデータベースのバックアップを作成することから始めましょう。
Zen Cart v1.5.8 にこのパックをインストールするには、次の手順を実行する必要があります。Zen Cart が v1.5.7 から v1.5.8 に大幅に変更されたため、古いバージョンとは互換性がないことに注意してください。

データベース：
---------
PhpMyAdmin などのユーティリティを使用して SQL ファイルをアップロードするか、コピー アンド ペーストを使用して SQL クエリを直接実行します。SQL ファイルは sql フォルダーにあります。

'mysql_japanese_install.sql'
そのファイルには、この日本語パックの基本的なデータベースの変更です。テーブル orders、address_book、customers にふりがな、電話番号、FAX 番号、配達時間の新しいフィールドが追加され、商品テーブルの寸法とバーコードのフィールドが追加されました。新しい注文ステータス、住所形式、漢字とローマ字の日本語ゾーンなど、いくつかの追加構成データがあります。
これは、すべてが機能するためにインストールする必要がある唯一のファイルです。 その他の sql ファイルはオプションです。

'mysql_japanese_admin_menu.sql'
このファイルは、データベースに保持されている管理メニューを日本語に翻訳します。完全に日本語の管理インターフェースが必要な場合にのみ必要です。
'mysql_english_admin_menu.sql'
管理メニューを英語に戻す必要がある場合は、このファイルを使用してください。


ファイル、ケース １： 元の Zen Cart 1.5.8 の新規インストール。
--------------

- Zen Cart v1.5.8 を更新、プラグイン、またはその他の変更なしで新規インストールした場合は、すべてのストアフロント サイド ファイル（フォルダー：電子メール、画像、インクルード）をカートにコピーして、既存のファイルを上書きすることができます。
- 管理者の場合、管理者側で使用する言語を選択し、適切なフォルダーをカートの管理者フォルダーにコピーする必要があります：
	英語 ----> admin-EN の内容を your_admin フォルダーにコピーし、必要に応じてファイルを置き換えます。
	日本語 --> admin-JP の内容を your_admin フォルダーにコピーし、必要に応じてファイルを置き換えます。
	両方をコピーしないでください！


ファイル、ケース ２： プラグイン付きの Zen Cart 1.5.8、最新バージョンで更新/アップグレードされたもの、または 1.5.7 などの古いバージョンからアップグレードされたもの。
--------------

最初に管理言語を選択し、適切なフォルダーを使用します。英語の場合は admin-EN、日本語の場合は admin-JP で、もう一方は破棄します。どちらもフリガナと他店側の日本語機能をサポートしています。

- 以下に示すように、すべての新しいファイルをカートにコピーします：

	'...(\admin-XX to YourAdminFolderName)\includes\extra_configures\function_zen_date_raw.php'
	'...(\admin-XX to YourAdminFolderName)\includes\functions\extra_functions\japanese_local_calendar.php'
	'...(\admin-XX to YourAdminFolderName)\includes\languages\lang.japanese.php'
	'...(\admin-XX to YourAdminFolderName)\includes\languages\japanese\' すべてのフォルダ コンテンツ

	'...\images\' すべてのフォルダ コンテンツ
	
	'...\includes\classes\_jpparcel.php'
	'...\includes\classes\_sagawa.php'
	'...\includes\classes\_yamato.php'
	'...\includes\classes\_yupack.php'
	
	'...\includes\extra_configures\function_zen_date_raw.php'
	
	'...\includes\languages\lang.japanese.php'
	'...\includes\languages\english\modules\' すべてのフォルダ コンテンツ
	'...\includes\languages\japanese\' すべてのフォルダ コンテンツ
	
	'...\includes\modules\order_total\' すべてのフォルダ コンテンツ
	'...\includes\modules\payment\' すべてのフォルダ コンテンツ
	'...\includes\modules\shipping\' すべてのフォルダ コンテンツ
	
	'...\includes\templates\responsive_classic\images\icons\' すべてのフォルダ コンテンツ
	'...\includes\templates\template_default\buttons\english\button_update_cart.png'
	'...\includes\templates\template_default\buttons\japanese\' すべてのフォルダ コンテンツ
	'...\includes\templates\template_default\images\icons\' すべてのフォルダ コンテンツ

- 以下に示すように、Winmerge などのツールを使用して、他のすべてのファイルをマージします：

	ADMIN 英語または日本語：
	'...(\admin-XX to YourAdminFolderName)\customers.php'
	'...(\admin-XX to YourAdminFolderName)\stats_sales_report_graphs.php'
	'...(\admin-XX to YourAdminFolderName)\includes\header.php
	'...(\admin-XX to YourAdminFolderName)\includes\languages\lang.english.php'
	'...(\admin-XX to YourAdminFolderName)\includes\languages\english\lang.customers.php'
	'...(\admin-XX to YourAdminFolderName)\includes\languages\english\lang.product.php'
	'...(\admin-XX to YourAdminFolderName)\includes\languages\english\extra_definitions\lang.orders_status_updates_admin.php'
	'...(\admin-XX to YourAdminFolderName)\includes\modules\update_product.php'
	'...(\admin-XX to YourAdminFolderName)\includes\modules\document_general\collect_info.php'
	'...(\admin-XX to YourAdminFolderName)\includes\modules\document_product\collect_info.php'
	'...(\admin-XX to YourAdminFolderName)\includes\modules\product\collect_info.php'
	'...(\admin-XX to YourAdminFolderName)\includes\modules\product_free_shipping\collect_info.php'
	'...(\admin-XX to YourAdminFolderName)\includes\modules\product_music\collect_info.php'
	
	ADMIN 日本語のみ：
	'...(\admin-JP to YourAdminFolderName)\includes\functions\extra_functions\add_cookie_path_switch.php'

	CATALOG:
	'...\email\email_template_checkout.html'
	'...\email\email_template_coupon.html'
	'...\email\email_template_direct_email.html'
	'...\email\email_template_gv_mail.html'
	'...\email\email_template_gv_queue.html'
	'...\email\email_template_newsletters.html'
	'...\email\email_template_order_status.html'
	'...\email\email_template_product_notification.html'
	'...\includes\classes\Customer.php'
	'...\includes\classes\order.php'
	'...\includes\classes\shipping.php'
	'...\includes\functions\functions_addresses.php'
	'...\includes\functions\functions_dates.php'
	'...\includes\functions\functions_general_shared.php'
	'...\includes\functions\functions_osh_update.php'
	'...\includes\languages\lang.english.php'
	'...\includes\languages\english\lang.checkout_process.php'
	'...\includes\languages\english\responsive_classic\lang.index.php'
	'...\includes\modules\checkout_new_address.php'
	'...\includes\modules\create_account.php'
	'...\includes\modules\pages\account_edit\header_php.php'
	'...\includes\modules\pages\address_book_process\header_php.php'
	'...\includes\modules\pages\checkout_shipping\header_php.php'
	'...\includes\modules\pages\create_account_success\header_php.php'
	'...\includes\templates\responsive_classic\templates\tpl_ajax_checkout_confirmation_default.php'
	'...\includes\templates\responsive_classic\templates\tpl_checkout_confirmation_default.php'
	'...\includes\templates\template_default\templates\tpl_account_edit_default.php'
	'...\includes\templates\template_default\templates\tpl_account_history_info_default.php'
	'...\includes\templates\template_default\templates\tpl_address_book_default.php'
	'...\includes\templates\template_default\templates\tpl_ajax_checkout_confirmation_default.php'
	'...\includes\templates\template_default\templates\tpl_checkout_confirmation_default.php'
	'...\includes\templates\template_default\templates\tpl_checkout_shipping_default.php'
	'...\includes\templates\template_default\templates\tpl_modules_address_book_details.php'
	'...\includes\templates\template_default\templates\tpl_modules_checkout_address_book.php'
	'...\includes\templates\template_default\templates\tpl_modules_checkout_new_address.php'
	'...\includes\templates\template_default\templates\tpl_modules_create_account.php'

- 管理メニューを日本語にしたい場合にのみ、モジュール (配送、支払い、注文合計) ファイルを編集します。
ファイルの下部にある「インストール機能」で、英語の sql クエリをコメント化し、日本語のクエリをコメント解除します。モジュールをインストールする前に実行する必要があります。 モジュールを既にインストールしている場合は、変更を有効にするためにモジュールをアンインストールしてから再インストールする必要があります。
実際には、１１つの Shipping モジュール、４つの Payment モジュール、３つの Total_Order モジュールがあります。
- モジュールを出荷するためのクラス(_jpparcel.php、_sagawa.php、yamato.php、_yupack.php)を編集します。必要に応じて料金を確認して調整する必要があります。
このパックのリリース以降に変更されている可能性があり、配送会社との契約にも依存します。ゆうパックの場合、ストアの場所によっては新しいカテゴリを設定する必要がある場合があります。

質問がある場合は、サポート フォーラムを利用してください： https://www.zen-cart.com/showthread.php?229157-V158-Japanese-language-pack

アンインストール：
------------
------------
新しく追加されたすべてのファイルを削除します。
バックアップを使用して、マージ/置換されたすべてのファイルの以前のバージョンをコピーして戻します。
追加されたレコードをデータベースから削除するには、phpMyAdmin などのツールで「uninstall.sql」ファイルを使用します。新しく追加されたデータはすべて失われます。
行った可能性のある管理設定を元に戻すことを忘れないでください。


その他の SQL ファイル：
-----------------
-----------------
'mysql_japanese_config.sql'
このファイルは、日本の税金、通貨、およびその他のいくつかの設定のみを行います。それを見て、Zen Cart 管理インターフェイスから設定を行うことをお勧めします。 データベースにすでにデータ/構成が追加されている場合は注意してください。数値はデフォルトではないため、SQLクエリを微調整する必要があります。
設定する必要があるのは、主にデフォルトとして日本語を追加し、次に新しいデフォルト通貨として日本円を追加し、日本の１０％の消費税税率、クラス、および必要なゾーン/地理ゾーンを追加することです。 一部の日本語の名前は一文字しか記述できないため、名と姓の最小長を１に設定することをお勧めします。

'zencart1.5.8_structure_upgraded.sql'
これは、変更後のデータベース構造の単なる DUMP です。 インストールしないでください！古いバージョンからデータを転送して、何が一致しているかを確認する場合に役立ちます。v1.5.8日本語への/からの手動更新にも使用できます...

余分なファイルの修正：
-----------------
-----------------
日本語とは関係なく、修正が必要なファイルが他に二つあります。これらのファイルは v1.5.8 のオリジナル リリースのものであり、新しいリリースで更新される可能性があります。

	'...\admin-XX\includes\modules\dashboard_widgets\OrderStatusDashboardWidget.php'
	管理者のメイン ページの左下にある注文ステータス カテゴリをクリックすると、常に完全な注文リストが表示されます。修正後、選択したステータス カテゴリの注文のみが取得されます。
	
	'...\admin-XX\includes\modules\dashboard_widgets\RecentOrdersDashboardWidget.php'
	新規注文ボックスの管理者メイン ページの右上で、顧客名が２０文字を超える場合にカットされます。 切断を最小限に抑えるために、これを３０に増やしました。

バーションヒストリー：
--------------
v1.0.0 - ２０２２年１１月２３日
オリジナルリリース。

v1.0.1 - ２０２２年１１月２９日
readme ファイルの日本語版を追加しました。
英語の readme ファイルの修正。
ディレクトリ「dashboard_widgets」を適切な場所に移動しました。

v1.1.0 - ２０２２年１２月７日
販売統計グラフの凡例にいくつかの修正を加えて、グラフ オプションに関係なく正しく表示されるようにしました。
日本の地方暦（元号付き）を提供する関数「zen_set_local_calendar()」を追加しました。
	デフォルトでは、管理ヘッダーの日付は次のように表示されます： 2022年（令和4年）12月10日 土曜日 00:43:37 GMT+09:00
	この IntlDate 形式を使用して：'r年（Gy年）MMMMd日 EEEE HH:mm:ss ZZZZ'。この形式は、
	'...YourAdminFolderName\includes\header.php' の 203 行目に関数 zen_set_local_calendar()
	の引数として新しい文字列を追加することで変更できます。

v1.1.5 - ２０２２年１２月１４日
重要なバグ修正：
- 運送モジュールと地域データベース。配送見積もりツールで正常に動作しています。地域データベースを更新するには、JP_zones_updates.sql を使用する必要があります。
- 管理者の Customers.php。顧客データを問題なく更新できるようになりました。
言語ファイルと readme ファイルのいくつかのタイプミスの修正。
新しい日本語の管理ボタンを作成しました。まだ翻訳されていない最後の部分でした。
管理の注文詳細ページのお客様名の下にふりがな表示を追加しました。

v1.1.6 - ２０２３年１月１４日
顧客側のように、管理者のフィールド長設定に応じて dob フィールドが必要かどうかに応じて、customer.php を変更しました。
dob フィールドに関連する言語ファイルのタイプミスを修正。
関数 zen_get_country_zones にフィルターを追加して、日本語の場合は日本のゾーンの日本語名のみを表示し、それ以外の場合は英語の名前を表示します。
日本郵便クラスjpparcel.phpのカテゴリーと料金を更新しました。 クラスは、新しい日本郵便モジュール (近日公開予定) の準備ができています。
すべてのファイルと変数の名前を jppercel... から jpparcel... に変更しました。これには、モジュール ファイルと言語ファイルが含まれます。

v1.1.8 - ２０２３年２月２４日
新しい配送モジュール国際エペケットを追加しました。
すべての日付形式を受け入れるzen_date_rawオーバーライド関数を追加しました。
アカウントを作成するときにFuriganaを保存しないバグを修正します。
EMSが特大ときにバグを修正します。
日本語パックに関連していないが、日本語パックの変更があるファイルでは、少数のZen Cartバグの修正。

v1.2.0 - ２０２３年３月４日
日本郵便の発送モジュール「小包郵便物（航空）」と「小包郵便物（船便）」を追加。
この新しい追加により、追跡付き小包のすべての日本郵便国際サービスが利用可能になります。Covid 19以降、SALシステムは廃止され、追跡を提供しない「スモールパケット」サービスは、多かれ少なかれeパケットに置き換えられました。
マルチボックス機能を備えた新しい配送クラスを使用するように国際配送モジュールをアップグレードしました （二つの国際eパケットは一つのEMSよりも安いなど)。
ゆうパック発送モジュールを更新しました（料金・エリア）。
新しい住所を日本語で入力するためのフォームを含む修正されたテンプレート。 現在は、「姓、名、国、郵便番号、都道府県、市区町村、番地」の形式に従います。
管理者の注文画面でふりがなが空欄の場合、ふりがな「Reading :」が表示されないようにバグを修正しました。
多くのコードのクリーニングと最適化、およびいくつかのバグ修正。

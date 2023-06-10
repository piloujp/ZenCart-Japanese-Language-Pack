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
そのファイルには、この日本語パックのデータベースの変更です。テーブル orders、address_book、customers にふりがな、電話番号、FAX 番号、配達時間の新しいフィールドが追加され、商品テーブルの寸法とバーコードのフィールドが追加されました。新しい注文ステータス、住所形式、漢字とローマ字の日本語ゾーンなど、いくつかの追加構成データがあります。
これは、すべてが機能するためにインストールする必要がある唯一のファイルです。 その他の sql ファイルはオプションです。

'mysql_japanese_admin_menu.sql'
このファイルは、データベースに保持されている管理メニューを日本語に翻訳します。完全に日本語の管理インターフェースが必要な場合にのみ必要です。
'mysql_english_admin_menu.sql'
管理メニューを英語に戻す必要がある場合は、このファイルを使用してください。


ファイル、ケース １： 元の Zen Cart 1.5.8 の新規インストール。
--------------

- Zen Cart v1.5.8 を更新、プラグイン、またはその他の変更なしで新規インストールした場合は、すべてのストアフロント サイド ファイル（フォルダー：email、images、includes）をカートにコピーして下さい「既存のファイルを上書きします」。
- 管理者の場合、管理者側で使用する言語を選択し、適切なフォルダーをカートの管理者フォルダーにコピーする必要があります：
	英語 ----> admin の内容を your_admin フォルダーにコピーし、必要に応じてファイルを置き換えます。
	日本語 --> admin-JP の内容を your_admin フォルダーにコピーし、必要に応じてファイルを置き換えます。
	両方をコピーしないでください！


ファイル、ケース ２： プラグイン付きの Zen Cart 1.5.8、最新バージョンで更新/アップグレードされたもの、または 1.5.7 などの古いバージョンからアップグレードされたもの。
--------------
重要な注意: 一部の日本の出荷モジュール (および支払い、ot_total) が既にインストールされている場合は、アップグレードする前にアンインストールしてください。データベースの混乱を避けます。

最初に管理言語を選択し、適切なフォルダーを使用します。英語の場合は admin、日本語の場合は admin-JP で、もう一方は破棄します。どちらもフリガナと他店側の日本語機能をサポートしています。

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
	'...(\admin-XX to YourAdminFolderName)\includes\functions\html_output.php'
	'...(\admin-XX to YourAdminFolderName)\includes\languages\lang.english.php'
	'...(\admin-XX to YourAdminFolderName)\includes\languages\english\lang.customers.php'
	'...(\admin-XX to YourAdminFolderName)\includes\languages\english\lang.product.php'
	'...(\admin-XX to YourAdminFolderName)\includes\languages\english\extra_definitions\lang.orders_status_updates_admin.php'
	'...(\admin-XX to YourAdminFolderName)\includes\modules\update_product.php'
	'...(\admin-XX to YourAdminFolderName)\includes\modules\dashboard_widgets\RecentOrdersDashboardWidget.php'
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
	'...\includes\functions\html_output.php'
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


ファイルのインストるの次（ケース１とケース２）：
--------------------------------

- モジュールを出荷するためのクラス(_jpparcel.php、_sagawa.php、_yamato.php、_yupack.php)を編集します。必要に応じて料金を確認して調整する必要があります。
このパックのリリース以降に変更されている可能性があり、配送会社との契約にも依存します。ゆうパックの場合、ストアの場所によっては新しいカテゴリを設定する必要がある場合があります。
引用は、次の 3 つの主要な配列に基づいています。
 １つは送料用で、各価格帯の生データとサイズの列「$a_pricerank」があります。 ここで実際に送料が設定されます。
 ２つ目は、送信元の場所と宛先に応じて (最初の範囲で) どの範囲を使用するかを定義するもので、'$a_dist_to_rank' です。コーディング システムは２文字で始まり、それぞれが３番目の配列 ($a_zonemap) で定義された都道府県グループに対応します。１番目は送信場所、２番目は送信先です。次に、この位置の組み合わせの最初の配列で使用する未加工の数値が続きます。
 
これら２つの配列 ('$a_pricerank' と '$a_dist_to_rank') をチェックして、状況に合わせて最終的に設定する必要があります。 残念ながら、ダウンロード可能な見積もり表を提供している運送会社はありませんが、オンラインで確認できます。
ヤマト宅急便：　https://www.kuronekoyamato.co.jp/ytc/search/estimate/ichiran.html
佐川宅急便：　https://www.sagawa-exp.co.jp/send/fare/attention.html
郵便局のゆうパック：　https://www.post.japanpost.jp/service/you_pack/charge/ichiran.html
郵便局の国際郵便：　https://www.post.japanpost.jp/int/charge/list/
郵便局の国際eパケット：　https://www.post.japanpost.jp/int/service/epacket.html
 
質問がある場合は、サポート フォーラムを利用してください： https://www.zen-cart.com/showthread.php?229157-V158-Japanese-language-pack

設定：
----
----
特定の構成のほとんどはインストール時に行われていますが、店舗の場所と郵便番号を設定し、配送モジュールの地域ゾーンを定義し、これらのモジュールと支払いモジュールも設定する必要があります。
ここから始めて、Zen Cart のドキュメントをご覧ください：　https://docs.zen-cart.com/user/new_user_topics/

アンインストール：
------------
------------
新しく追加されたすべてのファイルを削除します。
管理画面で、日本語に関連する地域、通貨、税金を削除します。
バックアップを使用して、マージ/置換されたすべてのファイルの以前のバージョンをコピーして戻します。
追加されたレコードをデータベースから削除するには、phpMyAdmin などのツールで「uninstall.sql」ファイルを使用します。新しく追加されたデータはすべて失われます。
行った可能性のある管理設定を元に戻すことを忘れないでください。


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

v1.2.1 - ２０２３年４月１２日
配送クラスの小包サイズ計算のための新しい改善されたアルゴリズムを追加し、それを使用する配送モジュールを更新しました。
配送モジュールの佐川、ヤマト、ゆうパックのコードと見積もり表を更新して、前回の値上げやその他の変更を反映させました。
マルチボックスのサポートを改善するためのその他の出荷モジュール コードの変更。
インストール手順を更新しました (この readme ファイル)。
SQL クエリ エラーとその他のマイナーなタイプミスを修正しました。
あちらこちらでお掃除。

V1.2.2 - ２０２３年４月３０日
クラス配送は、サイズまたは重量でマルチボックス化できるようになりました。
配送モジュールでアイコンをテキストと揃えました。
データベース設定のためのSQLクエリの変更。
カスタマー リスト ページが表示されない日本語管理者のバグを修正しました。
必要な必須フィールドが少なくなるように、管理者向けの顧客データ編集フォームを変更しました。
最終ファイル Zen Cart v1.5.8a への更新。
Readme ファイルの手順を更新しました。

V1.2.3 - ２０２３年５月１５日
日本の都道府県名 (漢字またはローマ字) のフィルターを更新し、非標準文字を使用する他の言語を除外しないようにしました。
ゾーン テーブルと SQL クエリで日本の都道府県「Guma」のスペルが修正されました。次のクエリを使用してデータベースを修正してください。
UPDATE zones SET zone_name='Gunma' WHERE zone_name='Gumma';
ヤマト、佐川、ゆうパックの日本の配送モジュールクラスにコメントを追加しました。カスタマイズを容易にするために、より類似した構造の例があります。

V1.2.4 - ２０２３年５月２５日
配送、支払い、「注文合計」のすべての日本語モジュールは、管理者の現在の言語、日本語または英語でインストールされます。これが自動化されると、言語を選択するためのファイル編集はもう必要ありません。
日本語の場合、日本の都道府県のプルダウン メニューは標準的な行政順序 (北から南) で表示されます。

V1.2.5 - ２０２３年６月１０日
国地域のプルダウン メニューを表示するコードを、8.0 だけでなく古い MySQL 5.7 データベースでも動作するように変更しました。
SQL ファイルのクリーニングと更新。
インストールおよびアンインストール ファイルが改善され、日本語に必要なデフォルト設定が行われ、アンインストール時にすべてが適切に削除されるようになりました。
admin-EN フォルダーの名前を admin に変更しました。
GitHub ファイルから Zen Cart の最新バージョンに更新されました。
より多くのテンプレートに対応するために、それを使用する出荷モジュールの配達時間フィールドの幅が増加しました。

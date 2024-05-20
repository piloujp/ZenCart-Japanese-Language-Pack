<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: pilou2 2024 Mar 10 Modified in v2.0.1 $
 */

return [
'META_TAG_TITLE' => 'Zen Cart&reg; インストーラ',
'HTML_PARAMS' => 'dir="ltr" lang="ja"',
'ZC_VERSION_STRING' => '%s v%s',
'TEXT_PAGE_HEADING_INDEX' => 'システムチェック',
'TEXT_INDEX_FATAL_ERRORS' => 'インストールを進める前に修正が必要な問題があります',
'TEXT_INDEX_WARN_ERRORS' => 'その他の問題：',
'TEXT_INDEX_WARN_ERRORS_ALT' => '問題点：',
'TEXT_HEADER_MAIN' => 'ヒント: フィールド名をクリックするとヘルプが表示されますので、各フィールドに何を入力すればよいかを確認してください。',
'TEXT_INDEX_HEADER_MAIN' => 'ヒント：エラーや警告のタイトル部分をクリックするとさらに詳しい情報を見ることが出来るかも知れません。',
'TEXT_INSTALLER_CHOOSE_LANGUAGE' => '言語を選択してください',
'TEXT_HELP_CONTENT_CHOOSE_LANG' => 'Zen Cart&reg; は、言語パックを導入することで多言語に対応します。必要な言語パックをインストールするだけで、インストーラを含め、ショップ全体を多言語で運用できるようになります。',
'TEXT_PAGE_HEADING_SYSTEM_SETUP' => 'システムセットアップ',
'TEXT_SYSTEM_SETUP_ADMIN_SETTINGS' => '管理画面設定',
'TEXT_SYSTEM_SETUP_CATALOG_SETTINGS' => 'ショップ画面設定',
'TEXT_SYSTEM_SETUP_ADMIN_SERVER_DOMAIN' => '管理画面サーバードメイン',
'TEXT_SYSTEM_SETUP_ADMIN_SERVER_URL' => '管理画面サーバーURL',
'TEXT_SYSTEM_SETUP_ADMIN_PHYSICAL_PATH' => '管理画面物理パス',
'TEXT_SYSTEM_SETUP_CATALOG_ENABLE_SSL' => 'ショップ画面でSSLを有効にしますか？',
'TEXT_SYSTEM_SETUP_CATALOG_HTTP_SERVER_DOMAIN' => 'ショップ画面 HTTP ドメイン',
'TEXT_SYSTEM_SETUP_CATALOG_HTTP_URL' => 'ショップ画面 HTTP URL',
'TEXT_SYSTEM_SETUP_CATALOG_HTTPS_SERVER_DOMAIN' => 'ショップ画面 HTTPS ドメイン',
'TEXT_SYSTEM_SETUP_CATALOG_HTTPS_URL' => 'ショップ画面 HTTPS URL',
'TEXT_SYSTEM_SETUP_CATALOG_PHYSICAL_PATH' => 'ショップ画面物理パス',
'TEXT_SYSTEM_SETUP_AGREE_LICENSE' => 'ライセンス規約に同意： ',
'TEXT_SYSTEM_SETUP_CLICK_TO_AGREE_LICENSE' => '(GPL2ライセンス規約に同意するなら、チェックを入れてください。 左の項目名をクリックすると、ライセンス内容を表示します。)',
'TEXT_SYSTEM_SETUP_ERROR_DIALOG_TITLE' => '問題があります',
'TEXT_SYSTEM_SETUP_ERROR_DIALOG_CONTINUE' => '変更せずに次に進む',
'TEXT_SYSTEM_SETUP_ERROR_CATALOG_PHYSICAL_PATH' => '%%TEXT_SYSTEM_SETUP_CATALOG_PHYSICAL_PATH%%' .'に問題があります。',
'TEXT_PAGE_HEADING_DATABASE' => 'データベースセットアップ',
'TEXT_DATABASE_HEADER_MAIN' => '注意：この画面で作業を行う前に、利用するMySQLデータベースとデータベースを利用可能な権限を持ったユーザーを作成しておいてください。左の項目名をクリックすると、以下のそれぞれの項目の意味を説明したヘルプが開きます。',
'TEXT_DATABASE_SETUP_SETTINGS' => '基本設定',
'TEXT_DATABASE_SETUP_DB_HOST' => 'データベースホスト名：',
'TEXT_DATABASE_SETUP_DB_USER' => 'データベースユーザー名：',
'TEXT_DATABASE_SETUP_DB_PASSWORD' => 'データベースパスワード：',
'TEXT_DATABASE_SETUP_DB_NAME' => 'データベース名：',
'TEXT_DATABASE_SETUP_DEMO_SETTINGS' => 'デモ用データ',
'TEXT_DATABASE_SETUP_JAPANESE_ADMIN' => '日本語の管理者メニュー',
'TEXT_DATABASE_SETUP_LOAD_DEMO' => 'デモ用データを追加',
'TEXT_DATABASE_SETUP_LOAD_DEMO_DESCRIPTION' => 'デモ用データをデータベースに追加しますか？',
'TEXT_DATABASE_SETUP_LOAD_JAPANESE_ADMIN' => '日本語の管理者メニューをロードする',
'TEXT_DATABASE_SETUP_LOAD_JAPANESE_ADMIN_DESCRIPTION' => '日本語の管理メニューとサブメニューをデータベースにロードします。このメニューは、管理者の言語切り替えによって切り替えることはできません。',
'TEXT_DATABASE_SETUP_ADVANCED_SETTINGS' => '高度な設定',
'TEXT_DATABASE_SETUP_DB_CHARSET' => 'データベース文字セット：',
'TEXT_DATABASE_SETUP_DB_PREFIX' => 'プリフィックス：',
'TEXT_DATABASE_SETUP_SQL_CACHE_METHOD' => 'SQLキャッシュ方法：',
'TEXT_DATABASE_SETUP_JSCRIPT_SQL_ERRORS1' => '<p>SQLインストールファイル実行中にエラーが発生しました',
'TEXT_DATABASE_SETUP_JSCRIPT_SQL_ERRORS2' => '<br>エラーログから詳細を確認してください<p>',
'TEXT_DATABASE_SETUP_CHARSET_OPTION_UTF8MB4' => 'utf8mb4 (デフォルト)',
'TEXT_DATABASE_SETUP_CHARSET_OPTION_UTF8' => 'utf8 (旧フォーマット)',
'TEXT_DATABASE_SETUP_CHARSET_OPTION_LATIN1' => 'latin1 (さらに古いフォーマット)',
'TEXT_DATABASE_SETUP_CACHE_TYPE_OPTION_NONE' => 'キャッシュしない',
'TEXT_DATABASE_SETUP_CACHE_TYPE_OPTION_DATABASE' => 'データベース',
'TEXT_DATABASE_SETUP_CACHE_TYPE_OPTION_FILE' => 'ファイル',
'TEXT_EXAMPLE_DB_HOST' => "大抵の場合 'localhost'",
'TEXT_EXAMPLE_DB_USER' => 'MySQLユーザー名を入力',
'TEXT_EXAMPLE_DB_PWD' => 'MySQLユーザーパスワードを入力',
'TEXT_EXAMPLE_DB_PREFIX' => "大抵の場合、空欄にしておくか 'zen_' を利用",
'TEXT_EXAMPLE_DB_NAME' => 'MySQLデータベース名を入力',
'TEXT_EXAMPLE_CACHEDIR' => '通常は /your/user/home/public_html/zencart/cache に該当するフォルダを指定します',
'TEXT_DATABASE_SETUP_CONNECTION_ERROR_DIALOG_TITLE' => '問題があります',
'TEXT_CREATING_DATABASE' => 'データベースを作成',
'TEXT_LOADING_CHARSET_SPECIFIC' => '文字セット固有のデータのロード中',
'TEXT_LOADING_DEMO_DATA' => 'デモデータを取り込んでいます',
'TEXT_LOADING_JAPANESE_ADMIN' => '日本語の管理者メニューの読み込み',
'TEXT_LOADING_PLUGIN_DATA' => 'インストール済みプラグインのSQLを読み込んでいます',
'TEXT_LOADING_PLUGIN_UPGRADES' => 'プラグインのアップグレードのための SQL のロード',
'TEXT_COULD_NOT_UPDATE_BECAUSE_ANOTHER_VERSION_REQUIRED' => 'バージョン %sにアップデートできませんでした。現在のバージョンは v%sであり、先にバージョンを %s まで上げておく必要があります。',
'TEXT_PAGE_HEADING_ADMIN_SETUP' => '管理画面セットアップ',
'TEXT_ADMIN_SETUP_USER_SETTINGS' => '管理者ユーザー設定',
'TEXT_ADMIN_SETUP_USER_NAME' => 'Admin Superuser 管理者名：',
'TEXT_EXAMPLE_USERNAME' => '例：shop_owner',
'TEXT_ADMIN_SETUP_USER_EMAIL' => 'Admin Superuser メールアドレス：',
'TEXT_EXAMPLE_EMAIL' => '例：my_email@example.com',
'TEXT_ADMIN_SETUP_USER_EMAIL_REPEAT' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; メールアドレスを再入力: ',
'TEXT_ADMIN_SETUP_USER_PASSWORD' => 'Superuser 管理者パスワード：',
'TEXT_ADMIN_SETUP_USER_PASSWORD_HELP' => '<strong>発行された仮パスワードを保存してください！</strong>：以下は Superuser管理者アカウントが暫定的に利用するための仮パスワードです。必ずこのパスワードをメモしておいてください。',
'TEXT_ADMIN_SETUP_ADMIN_DIRECTORY' => '管理画面ディレクトリ：',
'TEXT_ADMIN_SETUP_ADMIN_DIRECTORY_HELP_DEFAULT' => '管理画面用ディレクトリ名を自動変換できませんでした。管理画面にアクセスするためには、管理画面のディレクトリ名を自分で他の名前に変更する必要があります。',
'TEXT_ADMIN_SETUP_ADMIN_DIRECTORY_HELP_NOT_ADMIN_CHANGED' => '管理画面用ディレクトリ名を自動変換できませんでした。既にデフォルトのディレクトリ名から変更されているようです。',
'TEXT_ADMIN_SETUP_ADMIN_DIRECTORY_HELP_CHANGED' => '管理画面用ディレクトリ名は自動的にリネームされます。いかに表示されている新しいディレクトリ名を必ずメモしておいてください。',
'TEXT_PAGE_HEADING_COMPLETION' => 'セットアップが完了しました！',
'TEXT_COMPLETION_HEADER_MAIN' => '',
'TEXT_COMPLETION_INSTALL_COMPLETE' => 'インストールが完了しました。',
'TEXT_COMPLETION_INSTALL_LINKS_BELOW' => '以下のリンクより、ショップ画面や管理画面にアクセスすることが出来ます。',
'TEXT_COMPLETION_UPGRADE_COMPLETE' => 'おめでとうございます。アップグレードが完了しました。',
'TEXT_COMPLETION_ADMIN_DIRECTORY_WARNING' => '管理画面用ディレクトリ名を自動変換できませんでした。管理画面にアクセスするためには、ディレクトリ名リネームする必要があります。',
'TEXT_COMPLETION_INSTALLATION_DIRECTORY_WARNING' => "'zc_install'フォルダを削除してください",
'TEXT_COMPLETION_INSTALLATION_DIRECTORY_EXPLANATION' => "権限を持たない第三者によって上書きインストールされてしまわないように、インストールプログラムの入ったフォルダを必ず削除してください。それまでの間は管理画面にはアクセスすることが出来ません。",
'TEXT_COMPLETION_CATALOG_LINK_TEXT' => 'ショップ側画面',
'TEXT_COMPLETION_ADMIN_LINK_TEXT' => '管理画面',
'TEXT_PAGE_HEADING_DATABASE_UPGRADE' => 'データベースアップグレード',
'TEXT_DATABASE_UPGRADE_HEADER_MAIN' => '',
'TEXT_DATABASE_UPGRADE_STEPS_DETECTED' => '以下のリストは、データベースに必要なアップグレード手順を示しています。',
'TEXT_DATABASE_UPGRADE_LEGEND_UPGRADE_STEPS' => 'ご希望のアップグレード手順を確認してください',
'TEXT_DATABASE_UPGRADE_ADMIN_CREDENTIALS' => '管理者資格 (SuperUser)',
'TEXT_VALIDATION_ADMIN_CREDENTIALS' => 'データベースのアップグレードを承認するには、SuperUser権限を持つ管理者のユーザー名とパスワードを入力する必要があります。',
'TEXT_HELP_TITLE_UPGRADEADMINNAME', '%%TEXT_DATABASE_UPGRADE_ADMIN_CREDENTIALS%%',
'TEXT_HELP_CONTENT_UPGRADEADMINNAME' => 'データベースのアップグレードを承認するには、SuperUser権限を持つ管理者のユーザー名とパスワードを入力する必要があります。<br>これは、管理画面にログインするときに使用するユーザー名とパスワードです。 <br />（FTPパスワードや、サーバのコントロールパネルのパスワードでもありません。あなた自身とサイトのオーナー以外は誰もこのパスワードを知らないはずです。）<br>パスワードが判らなくなって管理画面にログイン出来なくなってしまった場合には、次の記事の手順に従ってパスワードを強制的にリセットすることができます。<a href="https://docs.zen-cart.com/user/troubleshooting/reset_admin_password/" rel="noopener" target="_blank">https://docs.zen-cart.com/user/troubleshooting/reset_admin_password/</a>',
'TEXT_DATABASE_UPGRADE_ADMIN_USER' => 'ユーザー名',
'TEXT_DATABASE_UPGRADE_ADMIN_PASSWORD' => 'パスワード',
'TEXT_HELP_TITLE_UPGRADEADMINPWD' => '管理者パスワードアップグレード',
'TEXT_HELP_CONTENT_UPGRADEADMINPWD', '%%TEXT_HELP_CONTENT_UPGRADEADMINNAME%%',
'TEXT_VALIDATION_ADMIN_PASSWORD' => '有効なパスワードが必要です',
'TEXT_ERROR_ADMIN_CREDENTIALS' => '有効な管理者権限を確認することが出来ませんでした。<br><br>' . '%%TEXT_HELP_CONTENT_UPGRADEADMINNAME%%',
'TEXT_UPGRADE_IN_PROGRESS' => 'アップグレードの実行中です。処理の各ステップの進行状況については、以下に表示されます ...',
'TEXT_UPGRADE_TO_VER_X_COMPLETED' => 'バージョン %s へのアップグレードが完了しました。',
'TEXT_NO_REMAINING_UPGRADE_STEPS' => '問題無いことが確認できました！アップグレードに必要なステップはありません。',
'TEXT_CONTINUE' => '続行する',
'TEXT_CANCEL' => 'キャンセル',
'TEXT_CONTINUE_FIX' => '前に戻って修正する',
'TEXT_REFRESH' => '再読込',
'TEXT_UPGRADE' => 'アップグレード ...',
'TEXT_CLEAN_INSTALL' => 'クリーンインストール',
'TEXT_UPDATE_CONFIGURE' => '設定ファイルを更新',
'TEXT_NAVBAR_SYSTEM_INSPECTION' => 'システムの検査',
'TEXT_NAVBAR_SYSTEM_SETUP' => 'システムセットアップ',
'TEXT_NAVBAR_DATABASE_UPGRADE' => 'データベースアップグレード',
'TEXT_NAVBAR_DATABASE_SETUP' => 'データベースセットアップ',
'TEXT_NAVBAR_ADMIN_SETUP' => '管理者セットアップ',
'TEXT_NAVBAR_COMPLETION' => '完了しました',
'TEXT_INDEX_ALERTS' => '警告',
'TEXT_ERROR_PROBLEMS_WRITING_CONFIGUREPHP_FILES' => 'configure.phpファイルの生成と保存で問題が発生しました。インストールは正しく行われていません！！.<br>詳しい技術的情報は/logs/フォルダにあります。',
'TEXT_ERROR_COULD_NOT_READ_CFGFILE_TEMPLATE' => 'マスタの設定ファイルレイアウトが読み取れませんでした：%s。ファイルが存在し、読み取り可能であることを確認してください。',
'TEXT_ERROR_COULD_NOT_WRITE_CONFIGFILE' => '生成された設定ファイルを書き込めませんでした：%s。ファイルが存在し、書き込み可能であることを確認してください。',
'TEXT_ERROR_STORE_CONFIGURE' => "メインの/includes/configure.phpファイルが存在しないか読み取り出来ない、または書き込みできません",
'TEXT_ERROR_ADMIN_CONFIGURE' => "管理画面用の /admin/includes/configure.phpファイルが存在しないか読み取り出来ない、または書き込みできません",
'TEXT_ERROR_PHP_VERSION' => str_replace(["\n", "\r"], '', 'PHP バージョンが正しくありません。<p>お使いの PHPバージョン (' . PHP_VERSION . ') は、利用できません。</p><p>このバージョンの Zen Cart&reg; は PHP バージョン 8.0 ～ 8.3 と互換性がありますが、8.2.x 以降が推奨されます。<br><a href="https://www.zen-cart.com">www.zen-cart.com</a> のウェブサイトより最新版の Zen Cart&reg;をご確認ください。</p>'),
'TEXT_ERROR_PHP_VERSION_RECOMMENDED' => '最大限のセキュリティと互換性を保つためにはPHP%s以降を使用するべきです。現状のままでもインストールを進めることができます。ただ、あなたのサイトが古いソフトウェアを実行している場合、PCI準拠ではないことを覚えておいてください。',
'TEXT_ERROR_PHP_VERSION_MIN' => 'PHPバージョンは %s以降である必要があります',
'TEXT_ERROR_PHP_VERSION_MAX' => 'PHPバージョンが %s以前である必要があります',
'TEXT_ERROR_MYSQL_SUPPORT' => 'MySQL（mysqli）対応に問題があります。ご利用サーバはPHP用のmysqli extension が欠けているようです。設定を行わなければデータベースに接続することができません。サーバー管理者様にご相談ください。',
'TEXT_ERROR_PDOMYSQL_SUPPORT' => 'MySQL (pdo_mysql) サポートに関する問題。サーバーには PHP の pdo_mysql 拡張機能が欠けているようです。これがないとデータベースに接続できません。サポートが必要な場合は、ホスティング会社に問い合わせてください。',
'TEXT_ERROR_PDOSQLITE_SUPPORT' => 'サーバーには、小規模な一時ストレージとアプリケーションのテストに使用される PHP 用の pdo_sqlite 拡張機能が欠けているようです。サポートが必要な場合は、ホスティング会社に問い合わせてください。',
'TEXT_ERROR_PHPZIP_SUPPORT' => 'サーバーには、デモ データ イメージをインストールするときに zip ファイルを解凍するために使用される PHP の php-zip 拡張子が欠けているようです。サポートが必要な場合は、ホスティング会社に問い合わせてください。',
'TEXT_ERROR_LOG_FOLDER' => '%%DIR_FS_LOGS%%' . ' フォルダに書き込み権限がありません',
'TEXT_ERROR_CACHE_FOLDER' => '%%DIR_FS_SQL_CACHE%%' . ' フォルダに書き込み権限がありません',
'TEXT_ERROR_IMAGES_FOLDER' => '/images/ フォルダに書き込み権限がありません',
'TEXT_ERROR_DEFINEPAGES_FOLDER' => '/includes/languages/english/html_includes/ フォルダに書き込み権限がありません',
'TEXT_ERROR_MEDIA_FOLDER' => '/media/ フォルダに書き込み権限がありません',
'TEXT_ERROR_PUB_FOLDER' => '%%DIR_FS_DOWNLOAD_PUBLIC%%' . ' フォルダに書き込み権限がありません',
'TEXT_ERROR_NGINX_FOLDER' => '/zc_install/includes/nginx_conf/ フォルダーは書き込み可能ではありません',
'TEXT_ERROR_CONFIGURE_REQUIRES_UPDATE' => '現在の configure.phpファイルは、古いバージョンのものであるため、処理を続行する前に更新が必要です。',
'TEXT_ERROR_HTACCESS_SUPPORT' => '「.htaccess」 ファイル対応が有効になっていません。<br>[ <i><b>注意：</b> もし、Nginxを使用している場合は、この問題の解決方法について、このインストールウィザードの<u>最終画面</u>に進んでください。<i> ]',
'TEXT_ERROR_SESSION_SUPPORT' => 'セッションサポートに問題',
'TEXT_ERROR_SESSION_SUPPORT_USE_TRANS_SID' => 'iniファイルで session.use_trans_sid 設定が有効になっています',
'TEXT_ERROR_SESSION_SUPPORT_AUTO_START' => 'iniファイルで session.auto_start 設定が有効になっています',
'TEXT_ERROR_DB_CONNECTION' => 'データベース接続に問題があります',
'TEXT_ERROR_DB_CONNECTION_DEFAULT' => 'データベース接続で問題が発生する可能性',
'TEXT_ERROR_DB_CONNECTION_UPGRADE' => '現在の configure.php の設定に、データベース接続の問題があります',
'TEXT_ERROR_SET_TIME_LIMIT' => 'max_execution_time 設定を無効にしました ',
'TEXT_ERROR_GD' => 'GD Extension が有効になっていません',
'TEXT_ERROR_INTL' => 'INTL 拡張機能が有効になっていません。 日付の処理とローカリゼーションのサポートに必要です。',
'TEXT_ERROR_JSON' => 'JSON 拡張機能が有効になっていません。アプリケーションの多くの部分でデータを解析するために必要です。',
'TEXT_ERROR_FILEINFO' => 'Fileinfo 拡張子が有効になっていません。 ファイルサイズの計算に使用されます。',
'TEXT_ERROR_ZLIB' => 'Zlib Extension が有効になっていません',
'TEXT_ERROR_OPENSSL' => 'Openssl Extension が有効になっていません',
'TEXT_ERROR_CURL' => 'CURL extension に問題があります - PHPが CURL が入っていないと報告しています。',
'TEXT_ERROR_UPLOADS' => 'PHP用の Upload Extension が有効になっていません',
'TEXT_ERROR_XML' => 'PHPの XML Extension が有効になっていません',
'TEXT_ERROR_GZIP' => 'PHPの GZip Extension が有効になっていません<br>[ <i><b>注意：</b> Nginxを使用していてNginx内でGZipを処理している場合、これは関係ないかもしれません。<i> ]',
'TEXT_ERROR_EXTENSION_NOT_LOADED' => '%s extension が読み込まれていないようです',
'TEXT_ERROR_FUNCTION_DOES_NOT_EXIST' => 'PHP function %s が有りません',
'TEXT_ERROR_CURL_LIVE_TEST' => 'ライブサーバに接続する際に CURL が利用できません',
'TEXT_ERROR_HTTPS' => 'ヒント: 可能であれば、SSL証明書をインストールした状態で、 "https://"を使用してインストーラを実行する必要があります。',
'TEXT_ERROR_SUCCESS_EXISTING_CONFIGURE' => '既存の configure.php ファイルが見つかりました。 下の[アップグレード...]を選択すると、インストーラはデータベース構造のアップグレードを試みます。',
'TEXT_ERROR_SUCCESS_EXISTING_CONFIGURE_NO_UPDATE' => '既存の configure.php ファイルが見つかりました。 データベースは最新のようです。 稼働中のライブサイトで作業していますか？ インストールを続行すると、現在のデータベースの内容が消去されます。 本当にインストールしてよろしいですか？',
'TEXT_ERROR_MULTIPLE_ADMINS_NONE_SELECTED' => '複数の管理ディレクトリが存在するようです。古い管理ディレクトリを削除して [更新] をクリックするか、以下の正しい管理ディレクトリを選択して [更新] をクリックしてください。',
'TEXT_ERROR_MULTIPLE_ADMINS_SELECTED' => '複数の管理画面ディレクトリが存在するようです。 古い管理画面ディレクトリを削除して[更新]をクリックするか、または下の正しい管理ディレクトリを選択して[更新]をクリックしてください。',
'TEXT_ERROR_MYSQL_VERSION' => 'サーバー データベースが最小バージョンを満たしていません。 MySQL: %s または MariaDB: %s',
'TEXT_ERROR_SUCCESS_NO_ERRORS' => 'システムにエラーや警告は検出されませんでした。 インストールを続けることができます。',
'TEXT_UPGRADE_INFO' => '%%TEXT_UPGRADE%%：データベースを検査し、現在のバージョンにアップグレードするために必要な手順 (新しいフィールドの追加/既存のフィールドの変更) を提供します。これは非破壊的なプロセスであることを目的としていますが、他のすべての変更と同様、続行する前にデータベースの検証済みのバックアップが利用可能であることを確認する必要があります。',
'TEXT_CLEAN_INSTALL_INFO' => '%%TEXT_CLEAN_INSTALL%%：データベースを新しい状態に戻し、すべてのデータを削除します。オプションで、このプロセスの一部としてデモンストレーション データをロードすることもできます。',
'TEXT_FORM_VALIDATION_REQUIRED' => '必須',
'TEXT_FORM_VALIDATION_AGREE_LICENSE' => 'ライセンス条項に同意する必要があります',
'TEXT_FORM_VALIDATION_CATALOG_HTTPS_URL' => 'まだ現在は一時的にSSLを有効にしていない場合でも、ここにURLを入力が必要です。 取り急ぎは通常のドメイン名を使ってみてください。',
'TEXT_NAVBAR_INSTALLATION_INSTRUCTIONS' => 'インストール手順',
'TEXT_NAVBAR_FORUM_LINK' => 'フォーラム',
'TEXT_HELP_TITLE_HTACCESSSUPPORT' => '.htaccess support',
'TEXT_HELP_CONTENT_HTACCESSSUPPORT' => '".htaccess"ファイルのサポートに問題があるようです。<br>Zen Cartでは通常機密性の高いファイルやフォルダは、付属の ".htaccess"ファイルのセキュリティルールによってブロックされるはずですが、、現在アクセス可能な状態になっています。<br> <br>考えられる原因: 
<ul style="list-style-type:square"><li>WebサーバとしてApacheを使用していない可能性があります（ ".htaccess"ファイルはApache Webサーバに固有のものです）。もしくは、</li><li>".htaccess"のサポートが無効になっているか、設定が間違っているかもしれません。もしくは、</li><li>Zen Cartに標準で付属している ".htaccess"ファイルがサイトにアップロードされていません。<br><strong><i> ".htaccess" のような、"."で始まるファイルは通常「隠しファイル」として扱われるため、FTPソフトの設定でファイルの表示や転送をオフにしていると、これらのファイルのアップロードに失敗することがあります。</i></strong></li></ul><br>
現在の状況でもインストールを続行することはできますが、サイトは本来あるべきものより安全性が低くなるでしょう（Apache Web Serverを使用している場合）。<br><br>Nginx Webサーバーを使用している場合は、このインストールウィザードの[セットアップが完了しました]セクションにある "<strong> Nginxの重要なセキュリティ情報</strong>" に記載されている対応するNginxディレクティブを使用してインストールを進めます。<br><br>どのWebサーバーソフトが使用されているかわからない場合は、Apache Webサーバであると想定して、サーバー管理者に ".htaccess"サポートを有効にするように依頼してください。<br><br>',
'TEXT_HELP_TITLE_FOLDERPERMS' => 'フォルダのパミッション',
'TEXT_HELP_CONTENT_FOLDERPERMS' => 'このフォルダのパミッションが正しく設定されていません。 このフォルダは書き込み可能である必要があります。 フォルダのパミッションの詳細については、 <a href="http://www.zen-cart.com/content.php?51-how-do-i-set-permissions-on-files-folders" target="_blank">http://www.zen-cart.com/content.php?51-how-do-i-set-permissions-on-files-folders</a>を参照ください。',
'TEXT_HELP_TITLE_CONNECTIONDATABASECHECK' => '初期データベース接続',
'TEXT_HELP_CONTENT_CONNECTIONDATABASECHECK' => 'localhost接続を使用してMySQLに接続しようとしました。 一部のホストではMySQLデータベースにIPアドレスまたはホスト名が必要なため、この失敗は必ずしもMySQLが動作していないことを意味するわけではありません。<br> <br>データベースサーバーにlocalhostを使用している場合は、MySQLが正常に動作していることを確認してください。',
'TEXT_HELP_TITLE_CHECKCURL' => '%%TEXT_ERROR_CURL%%',
'TEXT_HELP_CONTENT_CHECKCURL' => 'CURLは、PHPプログラムがショップで決済処理を行ったり、リアルタイムの配送料見積もりを得るために支払いや配送プロバイダーのような外部のサーバーやサービスに接続するのに使われるバックグラウンドプロセスです。 お客様のサーバーでCURL機能をテストしたところ、接続を確立できませんでした。 これはWebサーバの設定に問題があることを示している可能性があります。 あなたのサーバー上でCURLサポートを有効にするための支援を求めてあなたのホスティング会社に連絡してください。<br> <br>あなたがオフライン開発サーバー上でこのサイトを運営している開発者であれば、CURLがこのテストに接続できないのは当然です。 CURLは、オンライン接続が要求されるトランザクションアクティビティのテストを除き、開発目的には必要ありません。',
'TEXT_HELP_TITLE_ADMINSERVERDOMAIN' => '管理画面サーバードメイン',
'TEXT_HELP_CONTENT_ADMINSERVERDOMAIN' => "管理画面にアクセスするためのドメイン名を入力してください。 このアドレスにはHTTPS（SSL）を使用することを強くお勧めします。 サイトでSSLを有効にする方法については、サーバー管理者様にご相談ください。",
'TEXT_HELP_TITLE_ENABLESSLCATALOG' => 'ショップ画面でSSLを有効にしますか？',
'TEXT_HELP_CONTENT_ENABLESSLCATALOG' => "SSL証明書が利用可能な状況であり、Zen Cart＆reg;で利用する場合はこのチェックボックスをオンにします。 ログイン、マイアカウント、チェックアウトなどの機密性の高いページを表示するときに使用します。",
'TEXT_HELP_TITLE_HTTPSERVERCATALOG' => 'ショップ側 HTTPドメイン',
'TEXT_HELP_CONTENT_HTTPSERVERCATALOG' => "ショップURLのドメイン部分を入力してください。 例：http://www.example.com",
'TEXT_HELP_TITLE_HTTPURLCATALOG' => 'ショップ側 HTTP URL',
'TEXT_HELP_CONTENT_HTTPURLCATALOG' => "ショップのURL全体を入力します。 例：http://www.example.com/zencart/",
'TEXT_HELP_TITLE_HTTPSSERVERCATALOG' => 'ショップ側 HTTPS ドメイン',
'TEXT_HELP_CONTENT_HTTPSSERVERCATALOG' => "チェックアウト時にSSLの使用を有効にするために上記のチェックボックスをオンにした場合は、ショップのhttps URLのドメイン部分をここに入力する必要があります。<br>これは通常、次のようなものです。<br> https：//www.example .com <br> https://www.hostingcompany.com/~username <br> https://www.hostingcompany.com/~username/subdomain.com",
'TEXT_HELP_TITLE_HTTPSURLCATALOG' => 'ショップ側 HTTPS URL',
'TEXT_HELP_CONTENT_HTTPSURLCATALOG' => "ショップ側 https URLを入力してください。 これは通常HTTPSドメインと同じで、その後にストアのファイルが保存されているフォルダ名が続きます。 例：https://www.example.com/zencart",
'TEXT_HELP_TITLE_PHYSICALPATH' => 'Zen Cart ショップの物理パス',
'TEXT_HELP_CONTENT_PHYSICALPATH' => "これは、サーバー上で Zen Cart が保存されているディレクトに対する物理パスです。（ご利用サーバーのファイルシステムに準じます）一般的には '/users/home/public_html/zencart'のような形になります。<br>Zen Cart&reg; が動作するために、正しいパスを入力することが重要です。",
'TEXT_HELP_TITLE_DBHOST' => 'データベースホスト',
'TEXT_HELP_CONTENT_DBHOST' => "データベースホストとは何でしょう？　データベースホストは、'localhost'、'db1.myserver.com'などのホスト名の形式、または '192.168.0.1'などのIPアドレスの形式で指定します。 ほとんどのホスティング会社はここで 'localhost'を使用しています。 <br>正しい指定方法は、サーバー管理者にご確認ください。通常この情報はサーバーの管理画面上などで、データベースを作成してユーザーパーミッションを割り当てるためのコントロールパネル画面で確認できます。詳しくはご利用サーバーのマニュアルやFAQドキュメントなどを参照してください。",
'TEXT_HELP_TITLE_DBUSER' => 'データベースユーザー',
'TEXT_HELP_CONTENT_DBUSER' => "データベースへの接続に使用されるMySQLのユーザー名とは何ですか？ ユーザー名は 'myusername_store'のような形で指定されています。<br> PCIへの準拠とセキュリティ保護のため、インターネットに接続されたサーバー上で実行する場合は、ここで 'root'を使用しないでください。<br><br>このMySQLユーザーには、ALTER、CREATE、DELETE、DROP、INDEX、INSERT、LOCK TABLES、SELECT、UPDATE（もしくは、'Grant All'）の権限が必要です。",
'TEXT_HELP_TITLE_DBPASSWORD' => 'データベースパスワード',
'TEXT_HELP_CONTENT_DBPASSWORD' => "このデータベース用に作成したMySQLユーザー名に割り当てられているパスワードは何ですか。",
'TEXT_HELP_TITLE_DBNAME' => 'データベース名',
'TEXT_HELP_CONTENT_DBNAME' => "データを保存するために使用されるデータベース名は何ですか？ データベース名は 'zencart'または 'myaccount_zencart'のような形です。<br>注：Zen Cart＆reg;でインストール作業を進める前に、データベースを作成しておく必要があります。 <br>通常はサーバーのコントロールパネルを使用してMySQLデータベースを作成できます。",
'TEXT_HELP_TITLE_DEMODATA' => '%%TEXT_DATABASE_SETUP_LOAD_DEMO%%',
'TEXT_HELP_CONTENT_DEMODATA' => "デモデータのインストールを選択した場合は、セールス、特価、およびオプションなどを含む基本セットの製品およびカテゴリがインストールされます。 これらは、いろいろな組み合わせの設定方法やショップでの表示内容を確認してみるのに役立ちます。デモ商品は後で（手動で）削除することができますし、デモサンプルで動きが理解できたら、デモデータをインストールしない選択にして、このインストールを再実行すれば、新しいショップのための完全にクリーンなサイトが用意できます。",
'TEXT_HELP_TITLE_DBCHARSET' => 'データベース文字セット',
'TEXT_HELP_CONTENT_DBCHARSET' => "ほぼ全てのショップでは utf8mb4 もしくは utf8 を利用します。<br>特別な理由がない限り utf8mb4 を利用してください。日本語の場合、latin にすると問題が発生する場合があります。",
'TEXT_HELP_TITLE_DBPREFIX' => 'データベーステーブル名プリフィックス',
'TEXT_HELP_CONTENT_DBPREFIX' => "データベーステーブルのプリフィックスとは何ですか？ 例：<strong> zen_ </strong> <br> <strong class = 'alert'>ヒント：プレフィックスが不要な場合は空のままにしてください。</strong> <br />一つのデータベースで複数の Zen Cart 店舗を利用したい場合などは、プレフィックスを利用する事で同じデータベースを共有することが出来ます。",
'TEXT_HELP_TITLE_SQLCACHEMETHOD' => 'SQL キャッシュ方式',
'TEXT_HELP_CONTENT_SQLCACHEMETHOD' => "デフォルト設定は 'none'です。 他にも 'database'または 'file'が選択できます。 サーバーが本当に遅い・重たいと感じ場合は、 'none'を使用してください。 やや忙しいサイトの場合は、 'database'を使用してください。 極端にトラフィックが多い場合は、 'fileを使用してください。'. ",
'TEXT_HELP_TITLE_SQLCACHEDIRECTORY' => 'SQL キャッシュディレクトリ',
'TEXT_HELP_CONTENT_SQLCACHEDIRECTORY' => "ファイルベースのキャッシュに使用するディレクトリを入力します。 利用しているWebサーバ上のディレクトリ/フォルダを指定します。また、Webサーバ（例えばApache）がファイルを書き込めるように、書き込み可能のパミッション設定が必要です。",
'TEXT_HELP_TITLE_ADMINUSER' => 'Superuser管理者名',
'TEXT_HELP_CONTENT_ADMINUSER' => "これがショップ管理者としてのアクセス権限と他の管理者ユーザーアカウントを管理するのに使われるメインの管理者ユーザー名になります。 最上位の全ての管理機能にアクセス可能です。",
'TEXT_HELP_TITLE_ADMINEMAIL' => 'Superuser管理者メールアドレス',
'TEXT_HELP_CONTENT_ADMINEMAIL' => "この電子メールアドレスは、パスワードを忘れた場合のパスワード再発行に使用されます。",
'TEXT_HELP_TITLE_ADMINEMAIL2' => 'メールアドレス再入力',
'TEXT_HELP_CONTENT_ADMINEMAIL2' => "メールアドレスを再入力してください。 入力ミスを見つけるためだけのものです！",
'TEXT_HELP_TITLE_ADMINPASSWORD' => 'Superuser管理者パスワード',
'TEXT_HELP_CONTENT_ADMINPASSWORD' => "『このパスワードを忘れないでください！』　これは、上記で指定した管理ユーザー名に割り当てられている仮のパスワードです。 最初のログイン時には、パスワードを変更するように求められます。（そのタイミングで、覚えやすいパスワードなどに変更できます） 管理者としてログインしている間はいつでも手動で変更できます。<br> <br> <strong>このパスワードを必ずメモしておいてください。管理画面にログインするときに必要になります。</strong>",
'TEXT_HELP_TITLE_ADMINDIRECTORY' => '管理画面ディレクトリ',
'TEXT_HELP_CONTENT_ADMINDIRECTORY' => "security-by-obscurity（隠しておく事もセキュリティ）という考え方に基づいて、管理画面用フォルダの名前を自動的に変更します。 無論これで絶対に安全というわけではありませんが、許可されていない訪問者がサイトを攻撃するのに役立ちます。 自分でフォルダ名を望む名前に変更することもできます。（FTPソフトやサーバーのコントロールパネルにあるファイルマネージャツールなどで、単純にフォルダ名を変更するだけです）",
'TEXT_VERSION_CHECK_NEW_VER' => '新しいバージョンが利用可能です v',
'TEXT_VERSION_CHECK_NEW_PATCH' => '新しいパッチが利用可能です： v',
'TEXT_VERSION_CHECK_PATCH' => 'パッチ',
'TEXT_VERSION_CHECK_DOWNLOAD' => 'ここからダウンロード',
'TEXT_VERSION_CHECK_CURRENT' => 'ご利用の Zen Cart&reg; は最新版です',
'TEXT_ERROR_NEW_VERSION_AVAILABLE' => '<a href="http://www.zen-cart.com/getit">利用可能な新しいバージョンの Zen Cart&reg; が有ります。　こちらからダウンロードできます。</a><a href="http://www.zen-cart.com" style="text-decoration:underline" target="_blank">www.zen-cart.com</a>',
'TEXT_DB_VERSION_NOT_FOUND' => ' %s 用のデータベースが見つかりませんでした！',
'REASON_TABLE_ALREADY_EXISTS' => ' %s テーブルが作成できません。対象が既に存在しています。',
'REASON_TABLE_DOESNT_EXIST' => ' %s テーブルを削除できません。対象が存在していません。',
'REASON_TABLE_NOT_FOUND' => ' %s テーブルが存在していないので、実行できません。',
'REASON_CONFIG_KEY_ALREADY_EXISTS' => 'configuration_key "%s" を追加できません。対象が既に存在しています。',
'REASON_COLUMN_ALREADY_EXISTS' => ' %s カラムを追加できません。対象が既に存在しています。',
'REASON_COLUMN_DOESNT_EXIST_TO_DROP' => ' %s カラムを削除できません。対象が存在していません。',
'REASON_COLUMN_DOESNT_EXIST_TO_CHANGE' => ' %s カラムを変更できません。対象が存在していません。',
'REASON_PRODUCT_TYPE_LAYOUT_KEY_ALREADY_EXISTS' => 'prod-type-layout configuration_key "%s" を追加できません。対象が既に存在しています。',
'REASON_INDEX_DOESNT_EXIST_TO_DROP' => 'index %s （ %s テーブル）を削除できません。対象が存在していません。',
'REASON_PRIMARY_KEY_DOESNT_EXIST_TO_DROP' => ' %s テーブルの primary key を削除できません。対象が存在していません。',
'REASON_INDEX_ALREADY_EXISTS' => 'index %s を %s テーブルに追加できません。対象が既に存在しています。',
'REASON_PRIMARY_KEY_ALREADY_EXISTS' => ' %s テーブルに primary key を追加できません。primary key は既に存在しています。',
'REASON_CONFIG_GROUP_KEY_ALREADY_EXISTS' => 'configuration_group_key "%s" は、すでに存在しているため追加できません',
'REASON_CONFIG_GROUP_ID_ALREADY_EXISTS' => 'configuration_group_id "%s" は、すでに存在しているため追加できません',
'TEXT_COMPLETION_NGINX_TEXT' => "<u>Nginx サーバーについての重要なセキュリティ上の注意点</u>",
'TEXT_HELP_TITLE_NGINXCONF' => "Nginx Web サーバーでセキュリティを保つ",
'TEXT_HELP_CONTENT_NGINXCONF' => '<p>Your Zen Cart installation comes with security measures in a format native to the Apache Webserver. <br>
See below to implement a similar set of measures for the Nginx Webserver.</p>
<hr>
<ul style="list-style-type:square">
<li>Go to your <strong>"zc_install/includes/nginx_conf"</strong> folder and open the following files using a text editor such as notepad or textedit:
  <ul style="list-style-type:circle">
    <li>zencart_ngx_http.conf</li>
    <li>zencart_ngx_server.conf</li>
  </ul>
</li>
<li>Add the contents of <strong>"zencart_ngx_http.conf"</strong> under the <strong>"http"</strong> section of your Nginx configuration file.
  <ul style="list-style-type:circle">
    <li>Edit the caching durations in the <strong>"map"</strong> block to suit as required</li>
  </ul>
</li>
<li>Add the contents of <strong>"zencart_ngx_server.conf"</strong> to the relevant <strong>"server"</strong> block for Zen Cart in your Nginx configuration file.
  <ul style="list-style-type:circle">
    <li>The directives may be used for SSL and/or Non SSL server blocks.</li>
    <li>The directives should be placed at the beginning of the server block before any other location blocks.
      <ul style="list-style-type:none">
        <li>- The order in which the directives appear is important.</li>
        <li>- Do not change this order without fully understanding the directives and implications.</li>
      </ul>
  </ul>
</li>
<li>It is especially critical that these directives appear before any generic php handling location blocks such as ... <br>
  <pre><code>location ~ \.php { <strong>Nginx PHP Handling Directives;</strong> }</code></pre>
  ... or any other location blocks that might be processed before these are.</li>
<li>Instead, edit the <strong>"zencart_php_handler"</strong> location block to match your Nginx PHP Handling Directives.
  <ul style="list-style-type:circle">
    <li>Simply duplicate the contents of your existing PHP handling location block.
      <ul style="list-style-type:none">
        <li>- That is, copy and paste in the equivalent Nginx PHP Handling Directives.</li>
        <li>- If you do not have an existing PHP handling location block, please refer to available guides such as from <a href="https://www.nginx.com/resources/wiki/start/topics/examples/phpfcgi/" rel="noopener" target="_blank"><u>The Nginx Website</u></a>.</li>
      </ul>
    </li>
  </ul>
</li>
<li>If using plugins for "Pretty URLs", insert the relevant directives into the specified block.</li>
<li>Reload Nginx.
  <ul style="list-style-type:circle">
    <li>Do this before closing this dialog box.</li>
    <li>Remember to delete the <strong>"zc_install"</strong> folder when done.
      <ul style="list-style-type:none">
        <li>- Including the <strong>"zc_install/includes/nginx_conf"</strong> folder and its contents.</li>
      </ul>
    </li>
  </ul>
</li>
<ol>
</div>
<div class="alert-box alert"> <strong>IMPORTANT:</strong> These location blocks should be <strong>BEFORE</strong> any other location blocks in your Nginx configuration server block for Zen Cart.</div>
<hr>',
'TEXT_HELP_TITLE_AGREETOTERMS' => '規約に同意する',
'TEXT_HELP_CONTENT_AGREETOTERMS' => '<a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html" rel="noopener" target="_blank">Original GPL 2.0 text</a>
<h2>The GNU General Public License (GPL)</h2>
<h3>Version 2, June 1991</h3>
<tt>
<p> Copyright (C) 1989, 1991 Free Software Foundation, Inc.<br>
  59 Temple Place, Suite 330, Boston, MA 02111-1307 USA</p>
<p> Everyone is permitted to copy and distribute verbatim copies<br>
  of this license document, but changing it is not allowed.</p>
<strong>
<p>Preamble</p>
</strong>
<p>The licenses for most software are designed to take away your freedom to share and change it. By contrast, the GNU General Public License is intended to guarantee your freedom to share and change free software--to make sure the software is free for all its users. This General Public License applies to most of the Free Software Foundation\'s software and to any other program whose authors commit to using it. (Some other Free Software Foundation software is covered by the GNU Library General Public License instead.) You can apply it to your programs, too.</p>
<p>When we speak of free software, we are referring to freedom, not price. Our General Public Licenses are designed to make sure that you have the freedom to distribute copies of free software (and charge for this service if you wish), that you receive source code or can get it if you want it, that you can change the software or use pieces of it in new free programs; and that you know you can do these things.</p>
<p> To protect your rights, we need to make restrictions that forbid anyone to deny you these rights or to ask you to surrender the rights. These restrictions translate to certain responsibilities for you if you distribute copies of the software, or if you modify it.</p>
<p>For example, if you distribute copies of such a program, whether gratis or for a fee, you must give the recipients all the rights that you have. You must make sure that they, too, receive or can get the source code. And you must show them these terms so they know their rights.</p>
<p>We protect your rights with two steps: (1) copyright the software, and (2) offer you this license which gives you legal permission to copy, distribute and/or modify the software.</p>
<p>Also, for each author\'s protection and ours, we want to make certain that everyone understands that there is no warranty for this free software. If the software is modified by someone else and passed on, we want its recipients to know that what they have is not the original, so that any problems introduced by others will not reflect on the original authors\' reputations.</p>
<p>Finally, any free program is threatened constantly by software patents. We wish to avoid the danger that redistributors of a free program will individually obtain patent licenses, in effect making the program proprietary. To prevent this, we have made it clear that any patent must be licensed for everyone\'s free use or not licensed at all.</p>
<p>The precise terms and conditions for copying, distribution and modification follow.</p>
<strong>
<p>TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION</p>
</strong>
<p><strong>0</strong>. This License applies to any program or other work which contains a notice placed by the copyright holder saying it may be distributed under the terms of this General Public License. The "Program", below, refers to any such program or work, and a "work based on the Program" means either the Program or any derivative work under copyright law: that is to say, a work containing the Program or a portion of it, either verbatim or with modifications and/or translated into another language. (Hereinafter, translation is included without limitation in the term "modification".) Each licensee is addressed as "you".</p>
<p>Activities other than copying, distribution and modification are not covered by this License; they are outside its scope. The act of running the Program is not restricted, and the output from the Program is covered only if its contents constitute a work based on the Program (independent of having been made by running the Program). Whether that is true depends on what the Program does.</p>
<p><strong>1</strong>. You may copy and distribute verbatim copies of the Program\'s source code as you receive it, in any medium, provided that you conspicuously and appropriately publish on each copy an appropriate copyright notice and disclaimer of warranty; keep intact all the notices that refer to this License and to the absence of any warranty; and give any other recipients of the Program a copy of this License along with the Program.</p>
<p>You may charge a fee for the physical act of transferring a copy, and you may at your option offer warranty protection in exchange for a fee.</p>
<p> <strong>2</strong>. You may modify your copy or copies of the Program or any portion of it, thus forming a work based on the Program, and copy and distribute such modifications or work under the terms of Section 1 above, provided that you also meet all of these conditions:</p>
<blockquote>
  <p>a) You must cause the modified files to carry prominent notices stating that you changed the files and the date of any change.</p>
  <p>b) You must cause any work that you distribute or publish, that in whole or in part contains or is derived from the Program or any part thereof, to be licensed as a whole at no charge to all third parties under the terms of this License.</p>
  <p>c) If the modified program normally reads commands interactively when run, you must cause it, when started running for such interactive use in the most ordinary way, to print or display an announcement including an appropriate copyright notice and a notice that there is no warranty (or else, saying that you provide a warranty) and that users may redistribute the program under these conditions, and telling the user how to view a copy of this License. (Exception: if the Program itself is interactive but does not normally print such an announcement, your work based on the Program is not required to print an announcement.)</p>
</blockquote>
<p>These requirements apply to the modified work as a whole. If identifiable sections of that work are not derived from the Program, and can be reasonably considered independent and separate works in themselves, then this License, and its terms, do not apply to those sections when you distribute them as separate works. But when you distribute the same sections as part of a whole which is a work based on the Program, the distribution of the whole must be on the terms of this License, whose permissions for other licensees extend to the entire whole, and thus to each and every part regardless of who wrote it.</p>
<p>Thus, it is not the intent of this section to claim rights or contest your rights to work written entirely by you; rather, the intent is to exercise the right to control the distribution of derivative or collective works based on the Program.</p>
<p>In addition, mere aggregation of another work not based on the Program with the Program (or with a work based on the Program) on a volume of a storage or distribution medium does not bring the other work under the scope of this License.</p>
<p><strong>3</strong>. You may copy and distribute the Program (or a work based on it, under Section 2) in object code or executable form under the terms of Sections 1 and 2 above provided that you also do one of the following:</p>
<blockquote>
  <p>a) Accompany it with the complete corresponding machine-readable source code, which must be distributed under the terms of Sections 1 and 2 above on a medium customarily used for software interchange; or,</p>
  <p> b) Accompany it with a written offer, valid for at least three years, to give any third party, for a charge no more than your cost of physically performing source distribution, a complete machine-readable copy of the corresponding source code, to be distributed under the terms of Sections 1 and 2 above on a medium customarily used for software interchange; or,</p>
  <p>c) Accompany it with the information you received as to the offer to distribute corresponding source code. (This alternative is allowed only for noncommercial distribution and only if you received the program in object code or executable form with such an offer, in accord with Subsection b above.)</p>
</blockquote>
<p>The source code for a work means the preferred form of the work for making modifications to it. For an executable work, complete source code means all the source code for all modules it contains, plus any associated interface definition files, plus the scripts used to control compilation and installation of the executable. However, as a special exception, the source code distributed need not include anything that is normally distributed (in either source or binary form) with the major components (compiler, kernel, and so on) of the operating system on which the executable runs, unless that component itself accompanies the executable.</p>
<p>If distribution of executable or object code is made by offering access to copy from a designated place, then offering equivalent access to copy the source code from the same place counts as distribution of the source code, even though third parties are not compelled to copy the source along with the object code.</p>
<p><strong>4</strong>. You may not copy, modify, sublicense, or distribute the Program except as expressly provided under this License. Any attempt otherwise to copy, modify, sublicense or distribute the Program is void, and will automatically terminate your rights under this License. However, parties who have received copies, or rights, from you under this License will not have their licenses terminated so long as such parties remain in full compliance.</p>
<p> <strong>5</strong>. You are not required to accept this License, since you have not signed it. However, nothing else grants you permission to modify or distribute the Program or its derivative works. These actions are prohibited by law if you do not accept this License. Therefore, by modifying or distributing the Program (or any work based on the Program), you indicate your acceptance of this License to do so, and all its terms and conditions for copying, distributing or modifying the Program or works based on it.</p>
<p><strong>6</strong>. Each time you redistribute the Program (or any work based on the Program), the recipient automatically receives a license from the original licensor to copy, distribute or modify the Program subject to these terms and conditions. You may not impose any further restrictions on the recipients\' exercise of the rights granted herein. You are not responsible for enforcing compliance by third parties to this License.</p>
<p><strong>7</strong>. If, as a consequence of a court judgment or allegation of patent infringement or for any other reason (not limited to patent issues), conditions are imposed on you (whether by court order, agreement or otherwise) that contradict the conditions of this License, they do not excuse you from the conditions of this License. If you cannot distribute so as to satisfy simultaneously your obligations under this License and any other pertinent obligations, then as a consequence you may not distribute the Program at all. For example, if a patent license would not permit royalty-free redistribution of the Program by all those who receive copies directly or indirectly through you, then the only way you could satisfy both it and this License would be to refrain entirely from distribution of the Program.</p>
<p>If any portion of this section is held invalid or unenforceable under any particular circumstance, the balance of the section is intended to apply and the section as a whole is intended to apply in other circumstances.</p>
<p>It is not the purpose of this section to induce you to infringe any patents or other property right claims or to contest validity of any such claims; this section has the sole purpose of protecting the integrity of the free software distribution system, which is implemented by public license practices. Many people have made generous contributions to the wide range of software distributed through that system in reliance on consistent application of that system; it is up to the author/donor to decide if he or she is willing to distribute software through any other system and a licensee cannot impose that choice.</p>
<p> This section is intended to make thoroughly clear what is believed to be a consequence of the rest of this License.</p>
<p> <strong>8</strong>. If the distribution and/or use of the Program is restricted in certain countries either by patents or by copyrighted interfaces, the original copyright holder who places the Program under this License may add an explicit geographical distribution limitation excluding those countries, so that distribution is permitted only in or among countries not thus excluded. In such case, this License incorporates the limitation as if written in the body of this License.</p>
<p> <strong>9</strong>. The Free Software Foundation may publish revised and/or new versions of the General Public License from time to time. Such new versions will be similar in spirit to the present version, but may differ in detail to address new problems or concerns.</p>
<p>Each version is given a distinguishing version number. If the Program specifies a version number of this License which applies to it and "any later version", you have the option of following the terms and conditions either of that version or of any later version published by the Free Software Foundation. If the Program does not specify a version number of this License, you may choose any version ever published by the Free Software Foundation.</p>
<p><strong>10</strong>. If you wish to incorporate parts of the Program into other free programs whose distribution conditions are different, write to the author to ask for permission. For software which is copyrighted by the Free Software Foundation, write to the Free Software Foundation; we sometimes make exceptions for this. Our decision will be guided by the two goals of preserving the free status of all derivatives of our free software and of promoting the sharing and reuse of software generally.</p>
<p><strong>NO WARRANTY</strong></p>
<p><strong>11</strong>. BECAUSE THE PROGRAM IS LICENSED FREE OF CHARGE, THERE IS NO WARRANTY FOR THE PROGRAM, TO THE EXTENT PERMITTED BY APPLICABLE LAW. EXCEPT WHEN OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES PROVIDE THE PROGRAM "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU. SHOULD THE PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION.</p>
<p><strong>12</strong>. IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED TO IN WRITING WILL ANY COPYRIGHT HOLDER, OR ANY OTHER PARTY WHO MAY MODIFY AND/OR REDISTRIBUTE THE PROGRAM AS PERMITTED ABOVE, BE LIABLE TO YOU FOR DAMAGES, INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING OUT OF THE USE OR INABILITY TO USE THE PROGRAM (INCLUDING BUT NOT LIMITED TO LOSS OF DATA OR DATA BEING RENDERED INACCURATE OR LOSSES SUSTAINED BY YOU OR THIRD PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER PROGRAMS), EVEN IF SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.</p>
<p><strong>END OF TERMS AND CONDITIONS</strong></p>',
    'TEXT_UPGRADING_TO_VERSION' => 'バージョン %s にアップグレードしています',
    'TEXT_PROGRESS_FINISHED' => '終了した',
];

Zen Cart v1.5.8 Japanese language pack installation information (11-11-2022) by Pilou2.

This language pack includes not only Japanese language files but although core files and database modifications adding possibility to use furigana, products dimension and barcode.
This allows to use japanese Yamato express delivery, Nekopos, Sagawa express delivery, Japan Post Yupack, LetterPack Lite, LetterPack Plus and EMS services. Shipping, payment and order total modules files are included.
This set should allow you to use Zen Cart in Japan. Administration interface can be left in English if you have customers in Japan but are not Japanese, or set to Japanese if you want a fully translated environment. You have to choose at installation time.

Most of the translation is the work of members of Zen-Cart.jp which does not exist anymore.
Ideas of adding furigana and japanese shipping modules with shipping fees based on dimension are more than ten years old but they were redesigned for Zen Cart v1.5.8.
As in Japan reading of name's kanjis varies a lot from one region to another, furigana are really usefull if not necessary on the admin side.
Japan transport methods fees are generally based on parcel size with weight limit, even fixed rate shipping have some size limit. It is why product dimensions are necessary to provide an accurate quote.
All three major transport companies offer delivery time choice too. It is why these parameters have been added to database involving of course heavy modification of some core files.
Only barcode is not really link to japanese version but as there were already core files modification adding this did not required much more efforts.


INSTALL:
-------
-------
As usually, start by doing a backup of your existing cart files and database too!
Here is what you have to do to install this pack over Zen Cart v1.5.8. Beware it is not compatible with older versions due to heavy changes in Zen Cart from v1.5.7 to v1.5.8!

DATABASE:
--------
Use a utility like PhpMyAdmin to upload SQL file or directly run SQL queries using copy and paste. SQL files are in the sql folder.

'mysql_japanese_install.sql'
These are the basic database modification for this japanese pack. It includes new fields for furigana, phone, fax number and delivery time in tables orders, adress_book and customers then fields for dimensions and barcode in table products. There are some added records like new order status, address format and japanese zones in kanji and romaji.
This is the only file you really NEED to INSTALL for everything to work. Other sql files are optionals.

'mysql_japanese_admin_menu.sql'
This one will translate admin menus kept in database into Japanese. Required only if you want a fully Japanese admin interface.
'mysql_english_admin_menu.sql'
If you need to set admin menus back to English, use this file.


FILES Case 1: Original Zen Cart 1.5.8 fresh installation.
------------

- If you have a FRESH INSTALL of Zen Cart v1.5.8 with no update, plugin or other modifications you can just COPY ALL STOREFRONT SIDE FILES (folders email, images, includes) to your cart overwriting existing files.
- For ADMIN you have to CHOOSE which LANGUAGE you want to use on admin side and then COPY APPROPRIATE FOLDER to your cart admin folder:
	English --> Copy content of admin-EN to your admin folder replacing files if necessary.
	Japanese --> Copy content of admin-JP to your admin folder replacing files if necessary.
	DO NOT COPY BOTH OF THEM!


FILES Case 2: Zen Cart 1.5.8 with plugins, updated/upgraded with more recent version or that has been upgraded from older version like 1.5.7.
------------

First choose your admin language and use appropriate folder: admin-EN for English and admin-JP for Japanese admin, discard the other one. Both support furigana and other store side Japanese functionalities.

- COPY all NEW FILES to your cart, as listed below:

	'...(\admin-XX to YourAdminFolderName)\includes\functions\extra_functions\japanese_local_calendar.php
	'...(\admin-XX to YourAdminFolderName)\includes\languages\lang.japanese.php'
	'...(\admin-XX to YourAdminFolderName)\includes\languages\japanese\' all content.

	'...\images\' all content.
	
	'...\includes\classes\_jppercel.php'
	'...\includes\classes\_sagawa.php'
	'...\includes\classes\_yamato.php'
	'...\includes\classes\_yupack.php'
	
	'...\includes\languages\lang.japanese.php'
	'...\includes\languages\english\modules\' all content.
	'...\includes\languages\japanese\' all content.
	
	'...\includes\modules\order_total\' all content.
	'...\includes\modules\payment\' all content.
	'...\includes\modules\shipping\' all content.
	
	'...\includes\templates\responsive_classic\images\icons\' all content.
	'...\includes\templates\template_default\buttons\english\button_update_cart.png'
	'...\includes\templates\template_default\buttons\japanese\' all content.
	'...\includes\templates\template_default\images\icons\' all content.

- MERGE all OTHER FILES using a tool like Winmerge, as listed below:

	ADMIN English OR Japanese:
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
	
	JAPANESE ADMIN ONLY:
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
	'...\includes\functions\functions_addresses.php'
	'...\includes\functions\functions_dates.php'
	'...\includes\functions\functions_general_shared.php'
	'...\includes\functions\functions_osh_update.php'
	'...\includes\languages\lang.english.php'
	'...\includes\languages\english\lang.checkout_process.php'
	'...\includes\languages\english\responsive_classic\lang.index.php'
	'...\includes\languages\modules\checkout_new_address.php'
	'...\includes\languages\modules\create_account.php'
	'...\includes\languages\modules\pages\account_edit\header_php.php'
	'...\includes\languages\modules\pages\address_book_process\header_php.php'
	'...\includes\languages\modules\pages\checkout_shipping\header_php.php'
	'...\includes\languages\modules\pages\create_account_success\header_php.php'
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

- EDIT modules (shipping, payment,order total) FILES only if you want their admin menus in Japanese.
In the 'install function', at the bottom of these files, comment English sql queries and uncomment Japanese ones. You have to do it before installing modules. If you do it after you have to uninstall and re-install modules for changes to take effect.
There are actually 8 Shipping, 4 Payment and 3 Total_Order modules.


UNINSTALL:
---------
---------
Delete all 'newly' added files.
Use your backup to copy back your precedent version for all merged/replaced files.
To remove added records from your database use 'uninstall.sql' file with a tool like phpMyAdmin. All newly added data will be lost.
Don't forget to change back any admin settings you might have done.


Other SQL files:
---------------
---------------
'mysql_japanese_config.sql'
It only does some configuration for Japanese tax, currency and other few things. I will recommend you to just have a look at it and do these config through Zen Cart admin interface. Be careful if you already have some data/config added in your database, you will need to tweak some sql query as numbers are not default anymore.
What you have to set is mainly adding japanese language as default then japanese Yen as new default currency and adding japanese 10% VAT tax rate, class and necessary zones/geo zones. You might want to set minimum length for first name and last name to 1 as some japanese names can be written with one character only.

'zencart1.5.8_structure_upgraded.sql'
It is just a DUMP of the database structure after modification. Do NOT INSTALL! It could be useful if you plan to transfer data from an old version to check what is matching or not. You can use it too for a manual uptadtes to/from v1.5.8 japanese...

Extra files corrections:
-----------------------
-----------------------
There are two other files that needed modifications but had nothing to do with Japanese, one correcting a bug and the other for cosmetic reason. These files are from the original release of v1.5.8 and might be updated on newer release.

	'...(\admin-XX\includes\modules\dashboard_widgets\OrderStatusDashboardWidget.php'
	On the left down side of admin main page, when you click on any order status category it will always bring the full orders list. After correction you get only the orders from status category you choose.
	
	'...(\admin-XX\includes\modules\dashboard_widgets\RecentOrdersDashboardWidget.php'
	On the right up side of admin main page in new orders box, customer name is cut when longer than 20 characters. This was increased to 30 to minimise cutting.

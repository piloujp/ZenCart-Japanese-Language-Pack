SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE address_book (
  address_book_id int NOT NULL,
  customers_id int NOT NULL DEFAULT '0',
  entry_gender char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  entry_company varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  entry_firstname varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  entry_lastname varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  entry_street_address varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  entry_suburb varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  entry_postcode varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  entry_city varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  entry_state varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  entry_country_id int NOT NULL DEFAULT '0',
  entry_zone_id int NOT NULL DEFAULT '0',
  entry_telephone varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  entry_fax varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  entry_firstname_kana varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  entry_lastname_kana varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE address_format (
  address_format_id int NOT NULL,
  address_format varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  address_summary varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE admin (
  admin_id int NOT NULL,
  admin_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  admin_email varchar(96) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  admin_profile int NOT NULL DEFAULT '0',
  admin_pass varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  prev_pass1 varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  prev_pass2 varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  prev_pass3 varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  pwd_last_change_date datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  reset_token varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  last_modified datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  last_login_date datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  last_login_ip varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  failed_logins smallint UNSIGNED NOT NULL DEFAULT '0',
  lockout_expires int NOT NULL DEFAULT '0',
  last_failed_attempt datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  last_failed_ip varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE admin_activity_log (
  log_id bigint NOT NULL,
  access_date datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  admin_id int NOT NULL DEFAULT '0',
  page_accessed varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  page_parameters text COLLATE utf8mb4_unicode_ci,
  ip_address varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  flagged tinyint NOT NULL DEFAULT '0',
  attention mediumtext COLLATE utf8mb4_unicode_ci,
  gzpost mediumblob,
  logmessage mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  severity varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'info'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE admin_menus (
  menu_key varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  language_key varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  sort_order int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE admin_notifications (
  notification_key varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  admin_id int DEFAULT NULL,
  dismissed char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE admin_pages (
  page_key varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  language_key varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  main_page varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  page_params varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  menu_key varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  display_on_menu char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  sort_order int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE admin_pages_to_profiles (
  profile_id int NOT NULL DEFAULT '0',
  page_key varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE admin_profiles (
  profile_id int NOT NULL,
  profile_name varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE authorizenet (
  id int UNSIGNED NOT NULL,
  customer_id int NOT NULL DEFAULT '0',
  order_id int NOT NULL DEFAULT '0',
  response_code int NOT NULL DEFAULT '0',
  response_text varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  authorization_type varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  transaction_id varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  sent longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  received longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  time varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  session_id varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE banners (
  banners_id int NOT NULL,
  banners_title varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  banners_url varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  banners_image varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  banners_group varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  banners_html_text text COLLATE utf8mb4_unicode_ci,
  expires_impressions int DEFAULT '0',
  expires_date datetime DEFAULT NULL,
  date_scheduled datetime DEFAULT NULL,
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  date_status_change datetime DEFAULT NULL,
  status int NOT NULL DEFAULT '1',
  banners_open_new_windows int NOT NULL DEFAULT '1',
  banners_on_ssl int NOT NULL DEFAULT '1',
  banners_sort_order int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE banners_history (
  banners_history_id int NOT NULL,
  banners_id int NOT NULL DEFAULT '0',
  banners_shown int NOT NULL DEFAULT '0',
  banners_clicked int NOT NULL DEFAULT '0',
  banners_history_date datetime NOT NULL DEFAULT '0001-01-01 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE categories (
  categories_id int NOT NULL,
  categories_image varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  parent_id int NOT NULL DEFAULT '0',
  sort_order int DEFAULT NULL,
  date_added datetime DEFAULT NULL,
  last_modified datetime DEFAULT NULL,
  categories_status tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE categories_description (
  categories_id int NOT NULL DEFAULT '0',
  language_id int NOT NULL DEFAULT '1',
  categories_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  categories_description text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE configuration (
  configuration_id int NOT NULL,
  configuration_title text COLLATE utf8mb4_unicode_ci NOT NULL,
  configuration_key varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  configuration_value text COLLATE utf8mb4_unicode_ci NOT NULL,
  configuration_description text COLLATE utf8mb4_unicode_ci NOT NULL,
  configuration_group_id int NOT NULL DEFAULT '0',
  sort_order int DEFAULT NULL,
  last_modified datetime DEFAULT NULL,
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  use_function text COLLATE utf8mb4_unicode_ci,
  set_function text COLLATE utf8mb4_unicode_ci,
  val_function text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE configuration_group (
  configuration_group_id int NOT NULL,
  configuration_group_title varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  configuration_group_description varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  sort_order int DEFAULT NULL,
  visible int DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE counter (
  startdate char(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  counter int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE counter_history (
  startdate char(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  counter int DEFAULT NULL,
  session_counter int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE countries (
  countries_id int NOT NULL,
  countries_name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  countries_iso_code_2 char(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  countries_iso_code_3 char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  address_format_id int NOT NULL DEFAULT '0',
  status tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE count_product_views (
  product_id int NOT NULL DEFAULT '0',
  language_id int NOT NULL DEFAULT '1',
  date_viewed date NOT NULL,
  views int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE coupons (
  coupon_id int NOT NULL,
  coupon_type char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'F',
  coupon_code varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  coupon_amount decimal(15,4) NOT NULL DEFAULT '0.0000',
  coupon_minimum_order decimal(15,4) NOT NULL DEFAULT '0.0000',
  coupon_start_date datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  coupon_expire_date datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  uses_per_coupon int NOT NULL DEFAULT '1',
  uses_per_user int NOT NULL DEFAULT '0',
  restrict_to_products varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  restrict_to_categories varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  restrict_to_customers text COLLATE utf8mb4_unicode_ci,
  coupon_active char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  date_created datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  date_modified datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  coupon_zone_restriction int NOT NULL DEFAULT '0',
  coupon_calc_base tinyint(1) NOT NULL DEFAULT '0',
  coupon_order_limit int NOT NULL DEFAULT '0',
  coupon_is_valid_for_sales tinyint(1) NOT NULL DEFAULT '1',
  coupon_product_count tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE coupons_description (
  coupon_id int NOT NULL DEFAULT '0',
  language_id int NOT NULL DEFAULT '0',
  coupon_name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  coupon_description text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE coupon_email_track (
  unique_id int NOT NULL,
  coupon_id int NOT NULL DEFAULT '0',
  customer_id_sent int NOT NULL DEFAULT '0',
  sent_firstname varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  sent_lastname varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  emailed_to varchar(96) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  date_sent datetime NOT NULL DEFAULT '0001-01-01 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE coupon_gv_customer (
  customer_id int NOT NULL DEFAULT '0',
  amount decimal(15,4) NOT NULL DEFAULT '0.0000'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE coupon_gv_queue (
  unique_id int NOT NULL,
  customer_id int NOT NULL DEFAULT '0',
  order_id int NOT NULL DEFAULT '0',
  amount decimal(15,4) NOT NULL DEFAULT '0.0000',
  date_created datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  ipaddr varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  release_flag char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE coupon_redeem_track (
  unique_id int NOT NULL,
  coupon_id int NOT NULL DEFAULT '0',
  customer_id int NOT NULL DEFAULT '0',
  redeem_date datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  redeem_ip varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  order_id int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE coupon_restrict (
  restrict_id int NOT NULL,
  coupon_id int NOT NULL DEFAULT '0',
  product_id int NOT NULL DEFAULT '0',
  category_id int NOT NULL DEFAULT '0',
  coupon_restrict char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE currencies (
  currencies_id int NOT NULL,
  title varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  code char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  symbol_left varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  symbol_right varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  decimal_point char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  thousands_point char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  decimal_places char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  value decimal(14,6) DEFAULT NULL,
  last_updated datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE customers (
  customers_id int NOT NULL,
  customers_gender char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_firstname varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_lastname varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_dob datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  customers_email_address varchar(96) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_nick varchar(96) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_default_address_id int NOT NULL DEFAULT '0',
  customers_telephone varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  customers_fax varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  customers_password varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_secret varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_newsletter char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  customers_group_pricing int NOT NULL DEFAULT '0',
  customers_email_format varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TEXT',
  customers_authorization int NOT NULL DEFAULT '0',
  customers_referral varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  registration_ip varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  last_login_ip varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_paypal_payerid varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_paypal_ec tinyint UNSIGNED NOT NULL DEFAULT '0',
  customers_firstname_kana varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_lastname_kana varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE customers_basket (
  customers_basket_id int NOT NULL,
  customers_id int NOT NULL DEFAULT '0',
  products_id tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  customers_basket_quantity float NOT NULL DEFAULT '0',
  customers_basket_date_added varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE customers_basket_attributes (
  customers_basket_attributes_id int NOT NULL,
  customers_id int NOT NULL DEFAULT '0',
  products_id tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  products_options_id varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  products_options_value_id int NOT NULL DEFAULT '0',
  products_options_value_text blob,
  products_options_sort_order text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE customers_info (
  customers_info_id int NOT NULL DEFAULT '0',
  customers_info_date_of_last_logon datetime DEFAULT NULL,
  customers_info_number_of_logons int DEFAULT NULL,
  customers_info_date_account_created datetime DEFAULT NULL,
  customers_info_date_account_last_modified datetime DEFAULT NULL,
  global_product_notifications int DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE customers_to_groups (
  id int UNSIGNED NOT NULL,
  group_id int UNSIGNED NOT NULL,
  customer_id int UNSIGNED NOT NULL,
  date_added timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE customer_groups (
  group_id int UNSIGNED NOT NULL,
  group_name varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  group_comment varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  date_added timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE db_cache (
  cache_entry_name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  cache_data mediumblob,
  cache_entry_created int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE email_archive (
  archive_id int NOT NULL,
  email_to_name varchar(96) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  email_to_address varchar(96) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  email_from_name varchar(96) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  email_from_address varchar(96) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  email_subject varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  email_html text COLLATE utf8mb4_unicode_ci NOT NULL,
  email_text text COLLATE utf8mb4_unicode_ci NOT NULL,
  date_sent datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  module varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE ezpages (
  pages_id int NOT NULL,
  alt_url varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  alt_url_external varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  status_header int NOT NULL DEFAULT '1',
  status_sidebox int NOT NULL DEFAULT '1',
  status_footer int NOT NULL DEFAULT '1',
  status_visible int NOT NULL DEFAULT '0',
  status_toc int NOT NULL DEFAULT '1',
  header_sort_order int NOT NULL DEFAULT '0',
  sidebox_sort_order int NOT NULL DEFAULT '0',
  footer_sort_order int NOT NULL DEFAULT '0',
  toc_sort_order int NOT NULL DEFAULT '0',
  page_open_new_window int NOT NULL DEFAULT '0',
  page_is_ssl int NOT NULL DEFAULT '0',
  toc_chapter int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE ezpages_content (
  pages_id int NOT NULL DEFAULT '0',
  languages_id int NOT NULL DEFAULT '1',
  pages_title varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  pages_html_text mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE featured (
  featured_id int NOT NULL,
  products_id int NOT NULL DEFAULT '0',
  featured_date_added datetime DEFAULT NULL,
  featured_last_modified datetime DEFAULT NULL,
  expires_date date NOT NULL DEFAULT '0001-01-01',
  date_status_change datetime DEFAULT NULL,
  status int NOT NULL DEFAULT '1',
  featured_date_available date NOT NULL DEFAULT '0001-01-01'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE files_uploaded (
  files_uploaded_id int NOT NULL,
  sesskey varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  customers_id int DEFAULT NULL,
  files_uploaded_name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Must always have either a sesskey or customers_id';

CREATE TABLE geo_zones (
  geo_zone_id int NOT NULL,
  geo_zone_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  geo_zone_description varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  last_modified datetime DEFAULT NULL,
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE get_terms_to_filter (
  get_term_name varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  get_term_table varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  get_term_name_field varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE group_pricing (
  group_id int NOT NULL,
  group_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  group_percentage decimal(5,2) NOT NULL DEFAULT '0.00',
  last_modified datetime DEFAULT NULL,
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE languages (
  languages_id int NOT NULL,
  name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  code char(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  image varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  directory varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  sort_order int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE layout_boxes (
  layout_id int NOT NULL,
  layout_template varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  layout_box_name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  layout_box_status tinyint(1) NOT NULL DEFAULT '0',
  layout_box_location tinyint(1) NOT NULL DEFAULT '0',
  layout_box_sort_order int NOT NULL DEFAULT '0',
  layout_box_sort_order_single int NOT NULL DEFAULT '0',
  layout_box_status_single tinyint NOT NULL DEFAULT '0',
  plugin_details varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE manufacturers (
  manufacturers_id int NOT NULL,
  manufacturers_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  manufacturers_image varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  date_added datetime DEFAULT NULL,
  last_modified datetime DEFAULT NULL,
  featured tinyint DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE manufacturers_info (
  manufacturers_id int NOT NULL DEFAULT '0',
  languages_id int NOT NULL DEFAULT '0',
  manufacturers_url varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  url_clicked int NOT NULL DEFAULT '0',
  date_last_click datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE media_clips (
  clip_id int NOT NULL,
  media_id int NOT NULL DEFAULT '0',
  clip_type smallint NOT NULL DEFAULT '0',
  clip_filename text COLLATE utf8mb4_unicode_ci NOT NULL,
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  last_modified datetime NOT NULL DEFAULT '0001-01-01 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE media_manager (
  media_id int NOT NULL,
  media_name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  last_modified datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE media_to_products (
  media_id int NOT NULL DEFAULT '0',
  product_id int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE media_types (
  type_id int NOT NULL,
  type_name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  type_ext varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE meta_tags_categories_description (
  categories_id int NOT NULL,
  language_id int NOT NULL DEFAULT '1',
  metatags_title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  metatags_keywords text COLLATE utf8mb4_unicode_ci,
  metatags_description text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE meta_tags_products_description (
  products_id int NOT NULL,
  language_id int NOT NULL DEFAULT '1',
  metatags_title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  metatags_keywords text COLLATE utf8mb4_unicode_ci,
  metatags_description text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE music_genre (
  music_genre_id int NOT NULL,
  music_genre_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  date_added datetime DEFAULT NULL,
  last_modified datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE newsletters (
  newsletters_id int NOT NULL,
  title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  content text COLLATE utf8mb4_unicode_ci NOT NULL,
  content_html text COLLATE utf8mb4_unicode_ci NOT NULL,
  module varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  date_sent datetime DEFAULT NULL,
  status int DEFAULT NULL,
  locked int DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE orders (
  orders_id int NOT NULL,
  customers_id int NOT NULL DEFAULT '0',
  customers_name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_company varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  customers_street_address varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_suburb varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  customers_city varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_postcode varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_state varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  customers_country varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_telephone varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  customers_email_address varchar(96) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  customers_address_format_id int NOT NULL DEFAULT '0',
  delivery_name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  delivery_company varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  delivery_street_address varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  delivery_suburb varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  delivery_city varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  delivery_postcode varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  delivery_state varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  delivery_country varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  delivery_address_format_id int NOT NULL DEFAULT '0',
  billing_name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  billing_company varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  billing_street_address varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  billing_suburb varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  billing_city varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  billing_postcode varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  billing_state varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  billing_country varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  billing_address_format_id int NOT NULL DEFAULT '0',
  payment_method varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  payment_module_code varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  shipping_method varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  shipping_module_code varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  coupon_code varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  cc_type varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  cc_owner varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  cc_number varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  cc_expires varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  cc_cvv blob,
  last_modified datetime DEFAULT NULL,
  date_purchased datetime DEFAULT NULL,
  orders_status int NOT NULL DEFAULT '0',
  orders_date_finished datetime DEFAULT NULL,
  currency char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  currency_value decimal(14,6) DEFAULT NULL,
  order_total decimal(15,4) DEFAULT NULL,
  order_tax decimal(15,4) DEFAULT NULL,
  paypal_ipn_id int NOT NULL DEFAULT '0',
  ip_address varchar(96) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  order_weight float DEFAULT NULL,
  language_code char(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  delivery_telephone varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  delivery_fax varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  billing_telephone varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  billing_fax varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  customers_fax varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  customers_name_kana varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  delivery_name_kana varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  billing_name_kana varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  delivery_timespec varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE orders_products (
  orders_products_id int NOT NULL,
  orders_id int NOT NULL DEFAULT '0',
  products_id int NOT NULL DEFAULT '0',
  products_model varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  products_name varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  products_price decimal(15,4) NOT NULL DEFAULT '0.0000',
  final_price decimal(15,4) NOT NULL DEFAULT '0.0000',
  products_tax decimal(7,4) NOT NULL DEFAULT '0.0000',
  products_quantity float NOT NULL DEFAULT '0',
  onetime_charges decimal(15,4) NOT NULL DEFAULT '0.0000',
  products_priced_by_attribute tinyint(1) NOT NULL DEFAULT '0',
  product_is_free tinyint(1) NOT NULL DEFAULT '0',
  products_discount_type tinyint(1) NOT NULL DEFAULT '0',
  products_discount_type_from tinyint(1) NOT NULL DEFAULT '0',
  products_prid tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  products_weight float DEFAULT NULL,
  products_virtual tinyint(1) DEFAULT NULL,
  product_is_always_free_shipping tinyint(1) DEFAULT NULL,
  products_quantity_order_min float DEFAULT NULL,
  products_quantity_order_units float DEFAULT NULL,
  products_quantity_order_max float DEFAULT NULL,
  products_quantity_mixed tinyint(1) DEFAULT NULL,
  products_mixed_discount_quantity tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE orders_products_attributes (
  orders_products_attributes_id int NOT NULL,
  orders_id int NOT NULL DEFAULT '0',
  orders_products_id int NOT NULL DEFAULT '0',
  products_options varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  products_options_values text COLLATE utf8mb4_unicode_ci NOT NULL,
  options_values_price decimal(15,4) NOT NULL DEFAULT '0.0000',
  price_prefix char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  product_attribute_is_free tinyint(1) NOT NULL DEFAULT '0',
  products_attributes_weight float NOT NULL DEFAULT '0',
  products_attributes_weight_prefix char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  attributes_discounted tinyint(1) NOT NULL DEFAULT '1',
  attributes_price_base_included tinyint(1) NOT NULL DEFAULT '1',
  attributes_price_onetime decimal(15,4) NOT NULL DEFAULT '0.0000',
  attributes_price_factor decimal(15,4) NOT NULL DEFAULT '0.0000',
  attributes_price_factor_offset decimal(15,4) NOT NULL DEFAULT '0.0000',
  attributes_price_factor_onetime decimal(15,4) NOT NULL DEFAULT '0.0000',
  attributes_price_factor_onetime_offset decimal(15,4) NOT NULL DEFAULT '0.0000',
  attributes_qty_prices text COLLATE utf8mb4_unicode_ci,
  attributes_qty_prices_onetime text COLLATE utf8mb4_unicode_ci,
  attributes_price_words decimal(15,4) NOT NULL DEFAULT '0.0000',
  attributes_price_words_free int NOT NULL DEFAULT '0',
  attributes_price_letters decimal(15,4) NOT NULL DEFAULT '0.0000',
  attributes_price_letters_free int NOT NULL DEFAULT '0',
  products_options_id int NOT NULL DEFAULT '0',
  products_options_values_id int NOT NULL DEFAULT '0',
  products_prid tinytext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE orders_products_download (
  orders_products_download_id int NOT NULL,
  orders_id int NOT NULL DEFAULT '0',
  orders_products_id int NOT NULL DEFAULT '0',
  orders_products_filename varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  download_maxdays int NOT NULL DEFAULT '0',
  download_count int NOT NULL DEFAULT '0',
  products_prid tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  products_attributes_id int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE orders_status (
  orders_status_id int NOT NULL DEFAULT '0',
  language_id int NOT NULL DEFAULT '1',
  orders_status_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  sort_order int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE orders_status_history (
  orders_status_history_id int NOT NULL,
  orders_id int NOT NULL DEFAULT '0',
  orders_status_id int NOT NULL DEFAULT '0',
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  customer_notified int DEFAULT '0',
  comments text COLLATE utf8mb4_unicode_ci,
  updated_by varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE orders_total (
  orders_total_id int UNSIGNED NOT NULL,
  orders_id int NOT NULL DEFAULT '0',
  title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  text varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  value decimal(15,4) NOT NULL DEFAULT '0.0000',
  class varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  sort_order int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE paypal (
  paypal_ipn_id int UNSIGNED NOT NULL,
  order_id int UNSIGNED NOT NULL DEFAULT '0',
  txn_type varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  module_name varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  module_mode varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  reason_code varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  payment_type varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  payment_status varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  pending_reason varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  invoice varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  mc_currency char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  first_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  last_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  payer_business_name varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_name varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_street varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_city varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_state varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_zip varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_country varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_status varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  payer_email varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  payer_id varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  payer_status varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  payment_date datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  business varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  receiver_email varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  receiver_id varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  txn_id varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  parent_txn_id varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  num_cart_items tinyint UNSIGNED NOT NULL DEFAULT '1',
  mc_gross decimal(15,4) NOT NULL DEFAULT '0.0000',
  mc_fee decimal(15,4) NOT NULL DEFAULT '0.0000',
  payment_gross decimal(15,4) DEFAULT NULL,
  payment_fee decimal(15,4) DEFAULT NULL,
  settle_amount decimal(15,4) DEFAULT NULL,
  settle_currency char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  exchange_rate decimal(15,4) DEFAULT NULL,
  notify_version varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  verify_sign varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  last_modified datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  memo text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE paypal_payment_status (
  payment_status_id int NOT NULL,
  payment_status_name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE paypal_payment_status_history (
  payment_status_history_id int NOT NULL,
  paypal_ipn_id int NOT NULL DEFAULT '0',
  txn_id varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  parent_txn_id varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  payment_status varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  pending_reason varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE paypal_session (
  unique_id int NOT NULL,
  session_id text COLLATE utf8mb4_unicode_ci NOT NULL,
  saved_session mediumblob NOT NULL,
  expiry int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE paypal_testing (
  paypal_ipn_id int UNSIGNED NOT NULL,
  order_id int UNSIGNED NOT NULL DEFAULT '0',
  custom varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  txn_type varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  module_name varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  module_mode varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  reason_code varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  payment_type varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  payment_status varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  pending_reason varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  invoice varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  mc_currency char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  first_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  last_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  payer_business_name varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_name varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_street varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_city varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_state varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_zip varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_country varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_status varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  payer_email varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  payer_id varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  payer_status varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  payment_date datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  business varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  receiver_email varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  receiver_id varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  txn_id varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  parent_txn_id varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  num_cart_items tinyint UNSIGNED NOT NULL DEFAULT '1',
  mc_gross decimal(7,2) NOT NULL DEFAULT '0.00',
  mc_fee decimal(7,2) NOT NULL DEFAULT '0.00',
  payment_gross decimal(7,2) DEFAULT NULL,
  payment_fee decimal(7,2) DEFAULT NULL,
  settle_amount decimal(7,2) DEFAULT NULL,
  settle_currency char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  exchange_rate decimal(4,2) DEFAULT NULL,
  notify_version decimal(2,1) NOT NULL DEFAULT '0.0',
  verify_sign varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  last_modified datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  memo text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE plugin_control (
  unique_key varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  description text COLLATE utf8mb4_unicode_ci,
  type varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free',
  managed tinyint(1) NOT NULL DEFAULT '0',
  status tinyint(1) NOT NULL DEFAULT '0',
  author varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  version varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  zc_versions text COLLATE utf8mb4_unicode_ci NOT NULL,
  zc_contrib_id int DEFAULT NULL,
  infs tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE plugin_control_versions (
  unique_key varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  version varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  author varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  zc_versions text COLLATE utf8mb4_unicode_ci NOT NULL,
  infs tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE plugin_groups (
  unique_key varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE plugin_groups_description (
  plugin_group_unique_key varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  language_id int NOT NULL DEFAULT '1',
  name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE products (
  products_id int NOT NULL,
  products_type int NOT NULL DEFAULT '1',
  products_quantity float NOT NULL DEFAULT '0',
  products_model varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  products_image varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  products_price decimal(15,4) NOT NULL DEFAULT '0.0000',
  products_virtual tinyint(1) NOT NULL DEFAULT '0',
  products_date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  products_last_modified datetime DEFAULT NULL,
  products_date_available datetime DEFAULT NULL,
  products_weight float NOT NULL DEFAULT '0',
  products_status tinyint(1) NOT NULL DEFAULT '0',
  products_tax_class_id int NOT NULL DEFAULT '0',
  manufacturers_id int DEFAULT NULL,
  products_ordered float NOT NULL DEFAULT '0',
  products_quantity_order_min float NOT NULL DEFAULT '1',
  products_quantity_order_units float NOT NULL DEFAULT '1',
  products_priced_by_attribute tinyint(1) NOT NULL DEFAULT '0',
  product_is_free tinyint(1) NOT NULL DEFAULT '0',
  product_is_call tinyint(1) NOT NULL DEFAULT '0',
  products_quantity_mixed tinyint(1) NOT NULL DEFAULT '0',
  product_is_always_free_shipping tinyint(1) NOT NULL DEFAULT '0',
  products_qty_box_status tinyint(1) NOT NULL DEFAULT '1',
  products_quantity_order_max float NOT NULL DEFAULT '0',
  products_sort_order int NOT NULL DEFAULT '0',
  products_discount_type tinyint(1) NOT NULL DEFAULT '0',
  products_discount_type_from tinyint(1) NOT NULL DEFAULT '0',
  products_price_sorter decimal(15,4) NOT NULL DEFAULT '0.0000',
  master_categories_id int NOT NULL DEFAULT '0',
  products_mixed_discount_quantity tinyint(1) NOT NULL DEFAULT '1',
  metatags_title_status tinyint(1) NOT NULL DEFAULT '0',
  metatags_products_name_status tinyint(1) NOT NULL DEFAULT '0',
  metatags_model_status tinyint(1) NOT NULL DEFAULT '0',
  metatags_price_status tinyint(1) NOT NULL DEFAULT '0',
  metatags_title_tagline_status tinyint(1) NOT NULL DEFAULT '0',
  products_barcode varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  products_length float NOT NULL DEFAULT '0',
  products_width float NOT NULL DEFAULT '0',
  products_height float NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE products_attributes (
  products_attributes_id int NOT NULL,
  products_id int NOT NULL DEFAULT '0',
  options_id int NOT NULL DEFAULT '0',
  options_values_id int NOT NULL DEFAULT '0',
  options_values_price decimal(15,4) NOT NULL DEFAULT '0.0000',
  price_prefix char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  products_options_sort_order int NOT NULL DEFAULT '0',
  product_attribute_is_free tinyint(1) NOT NULL DEFAULT '0',
  products_attributes_weight float NOT NULL DEFAULT '0',
  products_attributes_weight_prefix char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  attributes_display_only tinyint(1) NOT NULL DEFAULT '0',
  attributes_default tinyint(1) NOT NULL DEFAULT '0',
  attributes_discounted tinyint(1) NOT NULL DEFAULT '1',
  attributes_image varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  attributes_price_base_included tinyint(1) NOT NULL DEFAULT '1',
  attributes_price_onetime decimal(15,4) NOT NULL DEFAULT '0.0000',
  attributes_price_factor decimal(15,4) NOT NULL DEFAULT '0.0000',
  attributes_price_factor_offset decimal(15,4) NOT NULL DEFAULT '0.0000',
  attributes_price_factor_onetime decimal(15,4) NOT NULL DEFAULT '0.0000',
  attributes_price_factor_onetime_offset decimal(15,4) NOT NULL DEFAULT '0.0000',
  attributes_qty_prices text COLLATE utf8mb4_unicode_ci,
  attributes_qty_prices_onetime text COLLATE utf8mb4_unicode_ci,
  attributes_price_words decimal(15,4) NOT NULL DEFAULT '0.0000',
  attributes_price_words_free int NOT NULL DEFAULT '0',
  attributes_price_letters decimal(15,4) NOT NULL DEFAULT '0.0000',
  attributes_price_letters_free int NOT NULL DEFAULT '0',
  attributes_required tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE products_attributes_download (
  products_attributes_id int NOT NULL DEFAULT '0',
  products_attributes_filename varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  products_attributes_maxdays int DEFAULT '0',
  products_attributes_maxcount int DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE products_description (
  products_id int NOT NULL,
  language_id int NOT NULL DEFAULT '1',
  products_name varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  products_description text COLLATE utf8mb4_unicode_ci,
  products_url varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  products_viewed int DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE products_discount_quantity (
  discount_id int NOT NULL DEFAULT '0',
  products_id int NOT NULL DEFAULT '0',
  discount_qty float NOT NULL DEFAULT '0',
  discount_price decimal(15,4) NOT NULL DEFAULT '0.0000'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE products_notifications (
  products_id int NOT NULL DEFAULT '0',
  customers_id int NOT NULL DEFAULT '0',
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE products_options (
  products_options_id int NOT NULL DEFAULT '0',
  language_id int NOT NULL DEFAULT '1',
  products_options_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  products_options_sort_order int NOT NULL DEFAULT '0',
  products_options_type int NOT NULL DEFAULT '0',
  products_options_length smallint NOT NULL DEFAULT '32',
  products_options_comment varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  products_options_comment_position smallint NOT NULL DEFAULT '0',
  products_options_size smallint NOT NULL DEFAULT '32',
  products_options_images_per_row int DEFAULT '5',
  products_options_images_style int DEFAULT '0',
  products_options_rows smallint NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE products_options_types (
  products_options_types_id int NOT NULL DEFAULT '0',
  products_options_types_name varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Track products_options_types';

CREATE TABLE products_options_values (
  products_options_values_id int NOT NULL DEFAULT '0',
  language_id int NOT NULL DEFAULT '1',
  products_options_values_name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  products_options_values_sort_order int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE products_options_values_to_products_options (
  products_options_values_to_products_options_id int NOT NULL,
  products_options_id int NOT NULL DEFAULT '0',
  products_options_values_id int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE products_to_categories (
  products_id int NOT NULL DEFAULT '0',
  categories_id int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE product_music_extra (
  products_id int NOT NULL DEFAULT '0',
  artists_id int NOT NULL DEFAULT '0',
  record_company_id int NOT NULL DEFAULT '0',
  music_genre_id int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE product_types (
  type_id int NOT NULL,
  type_name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  type_handler varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  type_master_type int NOT NULL DEFAULT '1',
  allow_add_to_cart char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  default_image varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  last_modified datetime NOT NULL DEFAULT '0001-01-01 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE product_types_to_category (
  product_type_id int NOT NULL DEFAULT '0',
  category_id int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE product_type_layout (
  configuration_id int NOT NULL,
  configuration_title text COLLATE utf8mb4_unicode_ci NOT NULL,
  configuration_key varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  configuration_value text COLLATE utf8mb4_unicode_ci NOT NULL,
  configuration_description text COLLATE utf8mb4_unicode_ci NOT NULL,
  product_type_id int NOT NULL DEFAULT '0',
  sort_order int DEFAULT NULL,
  last_modified datetime DEFAULT NULL,
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00',
  use_function text COLLATE utf8mb4_unicode_ci,
  set_function text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE project_version (
  project_version_id tinyint NOT NULL,
  project_version_key varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  project_version_major varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  project_version_minor varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  project_version_patch1 varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  project_version_patch2 varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  project_version_patch1_source varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  project_version_patch2_source varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  project_version_comment varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  project_version_date_applied datetime NOT NULL DEFAULT '0001-01-01 01:01:01'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Database Version Tracking';

CREATE TABLE project_version_history (
  project_version_id tinyint NOT NULL,
  project_version_key varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  project_version_major varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  project_version_minor varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  project_version_patch varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  project_version_comment varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  project_version_date_applied datetime NOT NULL DEFAULT '0001-01-01 01:01:01'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Database Version Tracking History';

CREATE TABLE query_builder (
  query_id int NOT NULL,
  query_category varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  query_name varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  query_description text COLLATE utf8mb4_unicode_ci NOT NULL,
  query_string text COLLATE utf8mb4_unicode_ci NOT NULL,
  query_keys_list text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Stores queries for re-use in Admin email and report modules';

CREATE TABLE record_artists (
  artists_id int NOT NULL,
  artists_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  artists_image varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  date_added datetime DEFAULT NULL,
  last_modified datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE record_artists_info (
  artists_id int NOT NULL DEFAULT '0',
  languages_id int NOT NULL DEFAULT '0',
  artists_url varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  url_clicked int NOT NULL DEFAULT '0',
  date_last_click datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE record_company (
  record_company_id int NOT NULL,
  record_company_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  record_company_image varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  date_added datetime DEFAULT NULL,
  last_modified datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE record_company_info (
  record_company_id int NOT NULL DEFAULT '0',
  languages_id int NOT NULL DEFAULT '0',
  record_company_url varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  url_clicked int NOT NULL DEFAULT '0',
  date_last_click datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE reviews (
  reviews_id int NOT NULL,
  products_id int NOT NULL DEFAULT '0',
  customers_id int DEFAULT NULL,
  customers_name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  reviews_rating int DEFAULT NULL,
  date_added datetime DEFAULT NULL,
  last_modified datetime DEFAULT NULL,
  reviews_read int NOT NULL DEFAULT '0',
  status int NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE reviews_description (
  reviews_id int NOT NULL DEFAULT '0',
  languages_id int NOT NULL DEFAULT '0',
  reviews_text text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE salemaker_sales (
  sale_id int NOT NULL,
  sale_status tinyint NOT NULL DEFAULT '0',
  sale_name varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  sale_deduction_value decimal(15,4) NOT NULL DEFAULT '0.0000',
  sale_deduction_type tinyint NOT NULL DEFAULT '0',
  sale_pricerange_from decimal(15,4) NOT NULL DEFAULT '0.0000',
  sale_pricerange_to decimal(15,4) NOT NULL DEFAULT '0.0000',
  sale_specials_condition tinyint NOT NULL DEFAULT '0',
  sale_categories_selected text COLLATE utf8mb4_unicode_ci,
  sale_categories_all text COLLATE utf8mb4_unicode_ci,
  sale_date_start date NOT NULL DEFAULT '0001-01-01',
  sale_date_end date NOT NULL DEFAULT '0001-01-01',
  sale_date_added date NOT NULL DEFAULT '0001-01-01',
  sale_date_last_modified date NOT NULL DEFAULT '0001-01-01',
  sale_date_status_change date NOT NULL DEFAULT '0001-01-01'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE sessions (
  sesskey varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  expiry int UNSIGNED NOT NULL DEFAULT '0',
  value mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE specials (
  specials_id int NOT NULL,
  products_id int NOT NULL DEFAULT '0',
  specials_new_products_price decimal(15,4) NOT NULL DEFAULT '0.0000',
  specials_date_added datetime DEFAULT NULL,
  specials_last_modified datetime DEFAULT NULL,
  expires_date date NOT NULL DEFAULT '0001-01-01',
  date_status_change datetime DEFAULT NULL,
  status int NOT NULL DEFAULT '1',
  specials_date_available date NOT NULL DEFAULT '0001-01-01'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE square_payments (
  id int UNSIGNED NOT NULL,
  order_id int UNSIGNED NOT NULL,
  location_id varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  payment_id varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  sq_order varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  action varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE tax_class (
  tax_class_id int NOT NULL,
  tax_class_title varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  tax_class_description varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  last_modified datetime DEFAULT NULL,
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE tax_rates (
  tax_rates_id int NOT NULL,
  tax_zone_id int NOT NULL DEFAULT '0',
  tax_class_id int NOT NULL DEFAULT '0',
  tax_priority int DEFAULT '1',
  tax_rate decimal(7,4) NOT NULL DEFAULT '0.0000',
  tax_description varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  last_modified datetime DEFAULT NULL,
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE template_select (
  template_id int NOT NULL,
  template_dir varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  template_language varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE upgrade_exceptions (
  upgrade_exception_id smallint NOT NULL,
  sql_file varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  reason text COLLATE utf8mb4_unicode_ci,
  errordate datetime DEFAULT NULL,
  sqlstatement text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE whos_online (
  customer_id int DEFAULT NULL,
  full_name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  session_id varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  ip_address varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  time_entry varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  time_last_click varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  last_page_url varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  host_address text COLLATE utf8mb4_unicode_ci NOT NULL,
  user_agent varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE zones (
  zone_id int NOT NULL,
  zone_country_id int NOT NULL DEFAULT '0',
  zone_code varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  zone_name varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE zones_to_geo_zones (
  association_id int NOT NULL,
  zone_country_id int NOT NULL DEFAULT '0',
  zone_id int DEFAULT NULL,
  geo_zone_id int DEFAULT NULL,
  last_modified datetime DEFAULT NULL,
  date_added datetime NOT NULL DEFAULT '0001-01-01 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE address_book
  ADD PRIMARY KEY (address_book_id),
  ADD KEY idx_address_book_customers_id_zen (customers_id);

ALTER TABLE address_format
  ADD PRIMARY KEY (address_format_id);

ALTER TABLE admin
  ADD PRIMARY KEY (admin_id),
  ADD KEY idx_admin_name_zen (admin_name),
  ADD KEY idx_admin_email_zen (admin_email),
  ADD KEY idx_admin_profile_zen (admin_profile);

ALTER TABLE admin_activity_log
  ADD PRIMARY KEY (log_id),
  ADD KEY idx_page_accessed_zen (page_accessed),
  ADD KEY idx_access_date_zen (access_date),
  ADD KEY idx_flagged_zen (flagged),
  ADD KEY idx_ip_zen (ip_address);

ALTER TABLE admin_menus
  ADD UNIQUE KEY menu_key (menu_key);

ALTER TABLE admin_notifications
  ADD UNIQUE KEY notification_key (notification_key);

ALTER TABLE admin_pages
  ADD UNIQUE KEY page_key (page_key);

ALTER TABLE admin_pages_to_profiles
  ADD UNIQUE KEY profile_page (profile_id,page_key),
  ADD UNIQUE KEY page_profile (page_key,profile_id);

ALTER TABLE admin_profiles
  ADD PRIMARY KEY (profile_id),
  ADD UNIQUE KEY idx_profile_name_zen (profile_name);

ALTER TABLE authorizenet
  ADD PRIMARY KEY (id);

ALTER TABLE banners
  ADD PRIMARY KEY (banners_id),
  ADD KEY idx_status_group_zen (status,banners_group),
  ADD KEY idx_expires_date_zen (expires_date),
  ADD KEY idx_date_scheduled_zen (date_scheduled);

ALTER TABLE banners_history
  ADD PRIMARY KEY (banners_history_id),
  ADD KEY idx_banners_id_zen (banners_id);

ALTER TABLE categories
  ADD PRIMARY KEY (categories_id),
  ADD KEY idx_parent_id_cat_id_zen (parent_id,categories_id),
  ADD KEY idx_status_zen (categories_status),
  ADD KEY idx_sort_order_zen (sort_order);

ALTER TABLE categories_description
  ADD PRIMARY KEY (categories_id,language_id),
  ADD KEY idx_categories_name_zen (categories_name);

ALTER TABLE configuration
  ADD PRIMARY KEY (configuration_id),
  ADD UNIQUE KEY unq_config_key_zen (configuration_key),
  ADD KEY idx_key_value_zen (configuration_key,configuration_value(10)),
  ADD KEY idx_cfg_grp_id_zen (configuration_group_id);

ALTER TABLE configuration_group
  ADD PRIMARY KEY (configuration_group_id),
  ADD KEY idx_visible_zen (visible);

ALTER TABLE counter_history
  ADD PRIMARY KEY (startdate);

ALTER TABLE countries
  ADD PRIMARY KEY (countries_id),
  ADD KEY idx_countries_name_zen (countries_name),
  ADD KEY idx_address_format_id_zen (address_format_id),
  ADD KEY idx_iso_2_zen (countries_iso_code_2),
  ADD KEY idx_iso_3_zen (countries_iso_code_3);

ALTER TABLE count_product_views
  ADD PRIMARY KEY (product_id,language_id,date_viewed),
  ADD KEY idx_pid_lang_date_zen (language_id,product_id,date_viewed),
  ADD KEY idx_date_pid_lang_zen (date_viewed,product_id,language_id);

ALTER TABLE coupons
  ADD PRIMARY KEY (coupon_id),
  ADD KEY idx_active_type_zen (coupon_active,coupon_type),
  ADD KEY idx_coupon_code_zen (coupon_code),
  ADD KEY idx_coupon_type_zen (coupon_type);

ALTER TABLE coupons_description
  ADD PRIMARY KEY (coupon_id,language_id);

ALTER TABLE coupon_email_track
  ADD PRIMARY KEY (unique_id),
  ADD KEY idx_coupon_id_zen (coupon_id);

ALTER TABLE coupon_gv_customer
  ADD PRIMARY KEY (customer_id);

ALTER TABLE coupon_gv_queue
  ADD PRIMARY KEY (unique_id),
  ADD KEY idx_cust_id_order_id_zen (customer_id,order_id),
  ADD KEY idx_release_flag_zen (release_flag);

ALTER TABLE coupon_redeem_track
  ADD PRIMARY KEY (unique_id),
  ADD KEY idx_coupon_id_zen (coupon_id);

ALTER TABLE coupon_restrict
  ADD PRIMARY KEY (restrict_id),
  ADD KEY idx_coup_id_prod_id_zen (coupon_id,product_id);

ALTER TABLE currencies
  ADD PRIMARY KEY (currencies_id);

ALTER TABLE customers
  ADD PRIMARY KEY (customers_id),
  ADD KEY idx_email_address_zen (customers_email_address),
  ADD KEY idx_referral_zen (customers_referral(10)),
  ADD KEY idx_grp_pricing_zen (customers_group_pricing),
  ADD KEY idx_nick_zen (customers_nick),
  ADD KEY idx_newsletter_zen (customers_newsletter);

ALTER TABLE customers_basket
  ADD PRIMARY KEY (customers_basket_id),
  ADD KEY idx_customers_id_zen (customers_id);

ALTER TABLE customers_basket_attributes
  ADD PRIMARY KEY (customers_basket_attributes_id),
  ADD KEY idx_cust_id_prod_id_zen (customers_id,products_id(36));

ALTER TABLE customers_info
  ADD PRIMARY KEY (customers_info_id),
  ADD KEY idx_date_created_cust_id_zen (customers_info_date_account_created,customers_info_id);

ALTER TABLE customers_to_groups
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY idx_custid_groupid_zen (customer_id,group_id),
  ADD KEY idx_groupid_custid_zen (group_id,customer_id);

ALTER TABLE customer_groups
  ADD PRIMARY KEY (group_id),
  ADD UNIQUE KEY idx_groupname_zen (group_name);

ALTER TABLE db_cache
  ADD PRIMARY KEY (cache_entry_name);

ALTER TABLE email_archive
  ADD PRIMARY KEY (archive_id),
  ADD KEY idx_email_to_address_zen (email_to_address),
  ADD KEY idx_module_zen (module);

ALTER TABLE ezpages
  ADD PRIMARY KEY (pages_id),
  ADD KEY idx_ezp_status_header_zen (status_header),
  ADD KEY idx_ezp_status_sidebox_zen (status_sidebox),
  ADD KEY idx_ezp_status_footer_zen (status_footer),
  ADD KEY idx_ezp_status_toc_zen (status_toc);

ALTER TABLE ezpages_content
  ADD UNIQUE KEY idx_ezpages_content (pages_id,languages_id),
  ADD KEY idx_lang_id_zen (languages_id);

ALTER TABLE featured
  ADD PRIMARY KEY (featured_id),
  ADD KEY idx_status_zen (status),
  ADD KEY idx_products_id_zen (products_id),
  ADD KEY idx_date_avail_zen (featured_date_available),
  ADD KEY idx_expires_date_zen (expires_date);

ALTER TABLE files_uploaded
  ADD PRIMARY KEY (files_uploaded_id),
  ADD KEY idx_customers_id_zen (customers_id);

ALTER TABLE geo_zones
  ADD PRIMARY KEY (geo_zone_id);

ALTER TABLE get_terms_to_filter
  ADD PRIMARY KEY (get_term_name);

ALTER TABLE group_pricing
  ADD PRIMARY KEY (group_id);

ALTER TABLE languages
  ADD PRIMARY KEY (languages_id),
  ADD KEY idx_languages_name_zen (name);

ALTER TABLE layout_boxes
  ADD PRIMARY KEY (layout_id),
  ADD KEY idx_name_template_zen (layout_template,layout_box_name),
  ADD KEY idx_layout_box_status_zen (layout_box_status),
  ADD KEY idx_layout_box_sort_order_zen (layout_box_sort_order);

ALTER TABLE manufacturers
  ADD PRIMARY KEY (manufacturers_id),
  ADD KEY idx_mfg_name_zen (manufacturers_name);

ALTER TABLE manufacturers_info
  ADD PRIMARY KEY (manufacturers_id,languages_id);

ALTER TABLE media_clips
  ADD PRIMARY KEY (clip_id),
  ADD KEY idx_media_id_zen (media_id),
  ADD KEY idx_clip_type_zen (clip_type);

ALTER TABLE media_manager
  ADD PRIMARY KEY (media_id),
  ADD KEY idx_media_name_zen (media_name(191));

ALTER TABLE media_to_products
  ADD KEY idx_media_product_zen (media_id,product_id);

ALTER TABLE media_types
  ADD PRIMARY KEY (type_id),
  ADD KEY idx_type_name_zen (type_name);

ALTER TABLE meta_tags_categories_description
  ADD PRIMARY KEY (categories_id,language_id);

ALTER TABLE meta_tags_products_description
  ADD PRIMARY KEY (products_id,language_id);

ALTER TABLE music_genre
  ADD PRIMARY KEY (music_genre_id),
  ADD KEY idx_music_genre_name_zen (music_genre_name);

ALTER TABLE newsletters
  ADD PRIMARY KEY (newsletters_id);

ALTER TABLE orders
  ADD PRIMARY KEY (orders_id),
  ADD KEY idx_status_orders_cust_zen (orders_status,orders_id,customers_id),
  ADD KEY idx_date_purchased_zen (date_purchased),
  ADD KEY idx_cust_id_orders_id_zen (customers_id,orders_id),
  ADD KEY idx_status_date_id_zen (orders_status,date_purchased,orders_id);

ALTER TABLE orders_products
  ADD PRIMARY KEY (orders_products_id),
  ADD KEY idx_orders_id_prod_id_zen (orders_id,products_id),
  ADD KEY idx_prod_id_orders_id_zen (products_id,orders_id);

ALTER TABLE orders_products_attributes
  ADD PRIMARY KEY (orders_products_attributes_id),
  ADD KEY idx_orders_id_prod_id_zen (orders_id,orders_products_id);

ALTER TABLE orders_products_download
  ADD PRIMARY KEY (orders_products_download_id),
  ADD KEY idx_orders_id_zen (orders_id),
  ADD KEY idx_orders_products_id_zen (orders_products_id);

ALTER TABLE orders_status
  ADD PRIMARY KEY (orders_status_id,language_id),
  ADD KEY idx_orders_status_name_zen (orders_status_name);

ALTER TABLE orders_status_history
  ADD PRIMARY KEY (orders_status_history_id),
  ADD KEY idx_orders_id_status_id_zen (orders_id,orders_status_id);

ALTER TABLE orders_total
  ADD PRIMARY KEY (orders_total_id),
  ADD KEY idx_ot_orders_id_zen (orders_id),
  ADD KEY idx_ot_class_zen (class),
  ADD KEY idx_oid_class_zen (orders_id,class);

ALTER TABLE paypal
  ADD PRIMARY KEY (paypal_ipn_id,txn_id),
  ADD KEY idx_order_id_zen (order_id);

ALTER TABLE paypal_payment_status
  ADD PRIMARY KEY (payment_status_id);

ALTER TABLE paypal_payment_status_history
  ADD PRIMARY KEY (payment_status_history_id),
  ADD KEY idx_paypal_ipn_id_zen (paypal_ipn_id);

ALTER TABLE paypal_session
  ADD PRIMARY KEY (unique_id),
  ADD KEY idx_session_id_zen (session_id(36));

ALTER TABLE paypal_testing
  ADD PRIMARY KEY (paypal_ipn_id,txn_id),
  ADD KEY idx_order_id_zen (order_id);

ALTER TABLE plugin_control
  ADD PRIMARY KEY (unique_key);

ALTER TABLE plugin_control_versions
  ADD PRIMARY KEY (unique_key,version);

ALTER TABLE plugin_groups
  ADD PRIMARY KEY (unique_key);

ALTER TABLE plugin_groups_description
  ADD PRIMARY KEY (plugin_group_unique_key,language_id);

ALTER TABLE products
  ADD PRIMARY KEY (products_id),
  ADD KEY idx_products_date_added_zen (products_date_added),
  ADD KEY idx_products_status_zen (products_status),
  ADD KEY idx_products_date_available_zen (products_date_available),
  ADD KEY idx_products_ordered_zen (products_ordered),
  ADD KEY idx_products_model_zen (products_model),
  ADD KEY idx_products_price_sorter_zen (products_price_sorter),
  ADD KEY idx_master_categories_id_zen (master_categories_id),
  ADD KEY idx_products_sort_order_zen (products_sort_order),
  ADD KEY idx_manufacturers_id_zen (manufacturers_id);

ALTER TABLE products_attributes
  ADD PRIMARY KEY (products_attributes_id),
  ADD KEY idx_id_options_id_values_zen (products_id,options_id,options_values_id),
  ADD KEY idx_opt_sort_order_zen (products_options_sort_order);

ALTER TABLE products_attributes_download
  ADD PRIMARY KEY (products_attributes_id);

ALTER TABLE products_description
  ADD PRIMARY KEY (products_id,language_id),
  ADD KEY idx_products_name_zen (products_name);

ALTER TABLE products_discount_quantity
  ADD KEY idx_id_qty_zen (products_id,discount_qty);

ALTER TABLE products_notifications
  ADD PRIMARY KEY (products_id,customers_id);

ALTER TABLE products_options
  ADD PRIMARY KEY (products_options_id,language_id),
  ADD KEY idx_lang_id_zen (language_id),
  ADD KEY idx_products_options_sort_order_zen (products_options_sort_order),
  ADD KEY idx_products_options_name_zen (products_options_name);

ALTER TABLE products_options_types
  ADD PRIMARY KEY (products_options_types_id);

ALTER TABLE products_options_values
  ADD PRIMARY KEY (products_options_values_id,language_id),
  ADD KEY idx_products_options_values_name_zen (products_options_values_name),
  ADD KEY idx_products_options_values_sort_order_zen (products_options_values_sort_order);

ALTER TABLE products_options_values_to_products_options
  ADD PRIMARY KEY (products_options_values_to_products_options_id),
  ADD KEY idx_products_options_id_zen (products_options_id),
  ADD KEY idx_products_options_values_id_zen (products_options_values_id);

ALTER TABLE products_to_categories
  ADD PRIMARY KEY (products_id,categories_id),
  ADD KEY idx_cat_prod_id_zen (categories_id,products_id);

ALTER TABLE product_music_extra
  ADD PRIMARY KEY (products_id),
  ADD KEY idx_music_genre_id_zen (music_genre_id),
  ADD KEY idx_artists_id_zen (artists_id),
  ADD KEY idx_record_company_id_zen (record_company_id);

ALTER TABLE product_types
  ADD PRIMARY KEY (type_id),
  ADD KEY idx_type_master_type_zen (type_master_type);

ALTER TABLE product_types_to_category
  ADD KEY idx_category_id_zen (category_id),
  ADD KEY idx_product_type_id_zen (product_type_id);

ALTER TABLE product_type_layout
  ADD PRIMARY KEY (configuration_id),
  ADD UNIQUE KEY unq_config_key_zen (configuration_key),
  ADD KEY idx_key_value_zen (configuration_key,configuration_value(10)),
  ADD KEY idx_type_id_sort_order_zen (product_type_id,sort_order);

ALTER TABLE project_version
  ADD PRIMARY KEY (project_version_id),
  ADD UNIQUE KEY idx_project_version_key_zen (project_version_key);

ALTER TABLE project_version_history
  ADD PRIMARY KEY (project_version_id);

ALTER TABLE query_builder
  ADD PRIMARY KEY (query_id),
  ADD UNIQUE KEY query_name (query_name);

ALTER TABLE record_artists
  ADD PRIMARY KEY (artists_id),
  ADD KEY idx_rec_artists_name_zen (artists_name);

ALTER TABLE record_artists_info
  ADD PRIMARY KEY (artists_id,languages_id);

ALTER TABLE record_company
  ADD PRIMARY KEY (record_company_id),
  ADD KEY idx_rec_company_name_zen (record_company_name);

ALTER TABLE record_company_info
  ADD PRIMARY KEY (record_company_id,languages_id);

ALTER TABLE reviews
  ADD PRIMARY KEY (reviews_id),
  ADD KEY idx_products_id_zen (products_id),
  ADD KEY idx_customers_id_zen (customers_id),
  ADD KEY idx_status_zen (status),
  ADD KEY idx_date_added_zen (date_added);

ALTER TABLE reviews_description
  ADD PRIMARY KEY (reviews_id,languages_id);

ALTER TABLE salemaker_sales
  ADD PRIMARY KEY (sale_id),
  ADD KEY idx_sale_status_zen (sale_status),
  ADD KEY idx_sale_date_start_zen (sale_date_start),
  ADD KEY idx_sale_date_end_zen (sale_date_end);

ALTER TABLE sessions
  ADD PRIMARY KEY (sesskey);

ALTER TABLE specials
  ADD PRIMARY KEY (specials_id),
  ADD KEY idx_status_zen (status),
  ADD KEY idx_products_id_zen (products_id),
  ADD KEY idx_date_avail_zen (specials_date_available),
  ADD KEY idx_expires_date_zen (expires_date);

ALTER TABLE square_payments
  ADD PRIMARY KEY (id);

ALTER TABLE tax_class
  ADD PRIMARY KEY (tax_class_id);

ALTER TABLE tax_rates
  ADD PRIMARY KEY (tax_rates_id),
  ADD KEY idx_tax_zone_id_zen (tax_zone_id),
  ADD KEY idx_tax_class_id_zen (tax_class_id);

ALTER TABLE template_select
  ADD PRIMARY KEY (template_id),
  ADD KEY idx_tpl_lang_zen (template_language);

ALTER TABLE upgrade_exceptions
  ADD PRIMARY KEY (upgrade_exception_id);

ALTER TABLE whos_online
  ADD KEY idx_ip_address_zen (ip_address),
  ADD KEY idx_session_id_zen (session_id),
  ADD KEY idx_customer_id_zen (customer_id),
  ADD KEY idx_time_entry_zen (time_entry),
  ADD KEY idx_time_last_click_zen (time_last_click),
  ADD KEY idx_last_page_url_zen (last_page_url(191));

ALTER TABLE zones
  ADD PRIMARY KEY (zone_id),
  ADD KEY idx_zone_country_id_zen (zone_country_id),
  ADD KEY idx_zone_code_zen (zone_code);

ALTER TABLE zones_to_geo_zones
  ADD PRIMARY KEY (association_id),
  ADD KEY idx_zones_zen (geo_zone_id,zone_country_id,zone_id);


ALTER TABLE address_book
  MODIFY address_book_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE address_format
  MODIFY address_format_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE admin
  MODIFY admin_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE admin_activity_log
  MODIFY log_id bigint NOT NULL AUTO_INCREMENT;

ALTER TABLE admin_profiles
  MODIFY profile_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE authorizenet
  MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE banners
  MODIFY banners_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE banners_history
  MODIFY banners_history_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE categories
  MODIFY categories_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE configuration
  MODIFY configuration_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE configuration_group
  MODIFY configuration_group_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE countries
  MODIFY countries_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE coupons
  MODIFY coupon_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE coupon_email_track
  MODIFY unique_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE coupon_gv_queue
  MODIFY unique_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE coupon_redeem_track
  MODIFY unique_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE coupon_restrict
  MODIFY restrict_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE currencies
  MODIFY currencies_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE customers
  MODIFY customers_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE customers_basket
  MODIFY customers_basket_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE customers_basket_attributes
  MODIFY customers_basket_attributes_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE customers_to_groups
  MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE customer_groups
  MODIFY group_id int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE email_archive
  MODIFY archive_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE ezpages
  MODIFY pages_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE featured
  MODIFY featured_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE files_uploaded
  MODIFY files_uploaded_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE geo_zones
  MODIFY geo_zone_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE group_pricing
  MODIFY group_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE languages
  MODIFY languages_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE layout_boxes
  MODIFY layout_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE manufacturers
  MODIFY manufacturers_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE media_clips
  MODIFY clip_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE media_manager
  MODIFY media_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE media_types
  MODIFY type_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE music_genre
  MODIFY music_genre_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE newsletters
  MODIFY newsletters_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE orders
  MODIFY orders_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE orders_products
  MODIFY orders_products_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE orders_products_attributes
  MODIFY orders_products_attributes_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE orders_products_download
  MODIFY orders_products_download_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE orders_status_history
  MODIFY orders_status_history_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE orders_total
  MODIFY orders_total_id int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE paypal
  MODIFY paypal_ipn_id int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE paypal_payment_status
  MODIFY payment_status_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE paypal_payment_status_history
  MODIFY payment_status_history_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE paypal_session
  MODIFY unique_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE paypal_testing
  MODIFY paypal_ipn_id int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE products
  MODIFY products_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE products_attributes
  MODIFY products_attributes_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE products_options_values_to_products_options
  MODIFY products_options_values_to_products_options_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE product_types
  MODIFY type_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE product_type_layout
  MODIFY configuration_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE project_version
  MODIFY project_version_id tinyint NOT NULL AUTO_INCREMENT;

ALTER TABLE project_version_history
  MODIFY project_version_id tinyint NOT NULL AUTO_INCREMENT;

ALTER TABLE query_builder
  MODIFY query_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE record_artists
  MODIFY artists_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE record_company
  MODIFY record_company_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE reviews
  MODIFY reviews_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE salemaker_sales
  MODIFY sale_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE specials
  MODIFY specials_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE square_payments
  MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE tax_class
  MODIFY tax_class_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE tax_rates
  MODIFY tax_rates_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE template_select
  MODIFY template_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE upgrade_exceptions
  MODIFY upgrade_exception_id smallint NOT NULL AUTO_INCREMENT;

ALTER TABLE zones
  MODIFY zone_id int NOT NULL AUTO_INCREMENT;

ALTER TABLE zones_to_geo_zones
  MODIFY association_id int NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

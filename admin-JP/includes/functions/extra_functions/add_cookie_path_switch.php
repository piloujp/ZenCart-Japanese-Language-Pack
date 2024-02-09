<?php
/**
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: John 2022 Nov 06 Modified in v1.5.8a $
 */
if (!defined('SESSION_USE_ROOT_COOKIE_PATH') || !defined('SESSION_ADD_PERIOD_PREFIX'))
{
  $sql = "SELECT configuration_group_id FROM " . TABLE_CONFIGURATION_GROUP . " 
          WHERE configuration_group_title = 'Sessions'";
  $result = $db->execute($sql);
  if ($result->RecordCount() > 0)
  {
    $id = $result->fields['configuration_group_id'];
  } else 
  {
    $id = 15;    
  }
  if (!defined('SESSION_USE_ROOT_COOKIE_PATH'))
  {
    $sql = "INSERT INTO " . TABLE_CONFIGURATION . " 
           SET configuration_key = 'SESSION_USE_ROOT_COOKIE_PATH',
                sort_order =  '999', 
                configuration_title = 'ルートパスを cookieのパスにする', 
                configuration_value = 'False',
                configuration_description = '通常、Zencart はインストールされいてるディレクトリを cookie のパスとして利用します。しかし、サーバーの中にはそれでは問題が発生するケースが有ります。この設定項目では cookie のパスをショップのディレクトリではなく、サーバーのルートに設定できます。セッションで問題が発生する場合にのみ利用してください。　<strong>デフォルトは False(利用しない）</strong>です。<br><br><strong>この設定を変更するということは、管理画面へのログインに問題が発生していることを意味しますので、一旦ブラウザの cookie をクリアしてください。</strong>' ,
                configuration_group_id = " . (int)$id . ",
                set_function = 'zen_cfg_select_option(array(\'True\', \'False\'), '
                 " ;
    $result = $db->execute($sql);
  }
  if (!defined('SESSION_ADD_PERIOD_PREFIX'))
  {
    $sql = "INSERT INTO " . TABLE_CONFIGURATION . " 
           SET configuration_key = 'SESSION_ADD_PERIOD_PREFIX',
                sort_order =  '999', 
                configuration_title = 'cookie domain の頭にピリオドを追加', 
                configuration_value = 'True',
                configuration_description = '通常、Zencart は cookie domain に対して頭にピリオドをつけます（例：　.www.mydomain.com ）　サーバーの設定によってはそれでは問題が発生するケースが有ります。セッションで問題が発生する場合には、この設定を False にして試してみてください。 <strong>デフォルトは True です。</strong>',
                configuration_group_id = " . (int)$id . ",
                set_function = 'zen_cfg_select_option(array(\'True\', \'False\'), '
                 " ;
    $result = $db->execute($sql);
  }
}

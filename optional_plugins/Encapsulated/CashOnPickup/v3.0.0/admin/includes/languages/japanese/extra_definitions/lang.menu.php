<?php

$copReadmeUrl = (defined('DIR_WS_CATALOG') ? DIR_WS_CATALOG : '/') . 'zc_plugins/CashOnPickup/' . basename(dirname(__DIR__, 5)) . '/readme.html';
$copGithubUrl = 'https://github.com/dbltoe/Cash-on-Pickup-for-Zen-Cart';
$copForumUrl = 'https://www.zen-cart.com/threads/207082?page=1#post-1344942';

if (isset($copInstallerSaysInstalled)) {
    $copIsInstalled = ($copInstallerSaysInstalled === true);
} else {
    $copIsInstalled = false;
    if (defined('IS_ADMIN_FLAG') && IS_ADMIN_FLAG === true && defined('TABLE_PLUGIN_CONTROL') && isset($GLOBALS['db']) && is_object($GLOBALS['db'])) {
        $copControl = $GLOBALS['db']->Execute(
            "SELECT status FROM " . TABLE_PLUGIN_CONTROL
            . " WHERE unique_key = 'CashOnPickup' LIMIT 1"
        );
        $copIsInstalled = !$copControl->EOF && (int)$copControl->fields['status'] !== 0;
    }
}
$copSettingsUrl = $copIsInstalled ? 'index.php?cmd=modules&set=payment&module=cop' : '';

$copGap = '4px';
$copButtonStyle = ' style="margin:0 ' . $copGap . ' 0 0;padding-left:8px;padding-right:8px"';
$copButton = static function ($url, $label, $newTab) use ($copButtonStyle) {
    return '<a href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"'
        . ($newTab ? ' target="_blank" rel="noopener noreferrer"' : '')
        . ' class="btn btn-primary" role="button"' . $copButtonStyle . '>' . $label . '</a>';
};

$copLinks =
    '<div style="margin:10px 0 0;padding:0 0 0 ' . $copGap . '">'
    . $copButton($copReadmeUrl, 'ReadMe', true)
    . ($copSettingsUrl !== '' ? $copButton($copSettingsUrl, 'Settings', false) : '')
    . $copButton($copForumUrl, 'Forum Thread', true)
    . $copButton($copGithubUrl, 'GitHub', true)
    . '</div>';


$define = [
    'ADMIN_PLUGIN_MANAGER_NAME_FOR_CASHONPICKUP' => '受け取り時現金払い',
    'ADMIN_PLUGIN_MANAGER_DESCRIPTION_FOR_CASHONPICKUP' => '注文品を受け取る際に、現金で支払うことができます。このオプションは、標準のチェックアウトまたはワンページチェックアウトにおいて、顧客が配送方法として「店舗受取」を選択した場合にのみ表示されます。こちらからインストールを行い、その後「モジュール > 決済」の項目で有効化および設定を行ってください。'
    . $copLinks,
];

return $define;

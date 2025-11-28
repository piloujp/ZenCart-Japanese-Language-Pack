<?php
use Zencart\PluginSupport\ScriptedInstaller as ScriptedInstallBase;

class ScriptedInstaller extends ScriptedInstallBase
{

    protected function executeInstall()
    {
        zen_deregister_admin_pages(['TarifsView']);
        zen_register_admin_page('TarifsView', 'BOX_MODULES_PRICES_VIEW', 'FILENAME_SHIPPING_PRICES_VIEW', '', 'modules', 'Y');
    }

    // -----
    // Not used, initially, but included for the possibility of future upgrades!
    //
    // Note: This (https://github.com/zencart/zencart/pull/6498) Zen Cart PR must
    // be present in the base code or a PHP Fatal error is generated due to the
    // function signature difference.
    //
    protected function executeUpgrade($oldVersion)
    {
    }

    protected function executeUninstall()
    {
        zen_deregister_admin_pages(['TarifsView']);

        return true;
    }

}

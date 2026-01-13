<?php
use Zencart\PluginSupport\ScriptedInstaller as ScriptedInstallBase;

class ScriptedInstaller extends ScriptedInstallBase
{

    protected function executeInstall()
    {
        global $sniffer;
        
        zen_deregister_admin_pages(['TarifsView']);
        if ($sniffer->table_exists(DB_PREFIX . 'tarifs')) {
            zen_define_default('TABLE_SHIPPING_RATES', DB_PREFIX . 'shipping_rates');
            $this->executeInstallerSql("RENAME TABLE " . DB_PREFIX . " tarifs TO " . TABLE_SHIPPING_RATES);
        }

        zen_deregister_admin_pages(['RatesView']);
        zen_register_admin_page('RatesView', 'BOX_MODULES_PRICES_VIEW', 'FILENAME_SHIPPING_PRICES_VIEW', '', 'modules', 'Y');

        parent::executeInstall();
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
        global $sniffer;

        if ($sniffer->table_exists(DB_PREFIX . 'tarifs')) {
            zen_define_default('TABLE_SHIPPING_RATES', DB_PREFIX . 'shipping_rates');
            $this->executeInstallerSql("RENAME TABLE " . DB_PREFIX . " tarifs TO " . TABLE_SHIPPING_RATES);
        }
        parent::executeUpgrade($oldVersion);
    }

    protected function executeUninstall()
    {
        zen_deregister_admin_pages(['RatesView']);

        parent::executeUninstall();
    }

}

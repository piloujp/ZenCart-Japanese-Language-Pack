<?php
use Zencart\PluginSupport\ScriptedInstaller as ScriptedInstallBase;

class ScriptedInstaller extends ScriptedInstallBase
{
    private array $default_priceranks = [ // Tarification from April 2024
            'N01' => [ 940,1230,1530,1850,2190,2510,3060,3720],
            'N02' => [1060,1350,1650,1970,2310,2630,3730,4500],
            'N03' => [1190,1480,1790,2110,2450,2770,4090,5190],
            'N04' => [1320,1610,1920,2240,2580,2900,4220,5320],
            'N05' => [1320,1940,2580,3230,3900,4550,6970,8620],
            'N06' => [1460,1740,2050,2370,2710,3030,4350,5450],
            'N07' => [1460,2070,2710,3360,4030,4680,7210,8860],
            'N08' => [1610,1900,2200,2520,2860,3180,5380,6700],
            'N09' => [1610,2230,2860,3510,4180,4830,8020,9670],
            'N10' => [1760,2050,2360,2680,3020,3340,5540,6860],
            'N11' => [1760,2380,3020,3670,4340,4990,8290,9940],
            'N12' => [1920,2200,2510,2830,3170,3490,5690,7010],
            'N13' => [1920,2530,3170,3820,4490,5140,8550,10200],
            'N14' => [2070,2360,2670,2990,3330,3650,6180,7770],
            'N15' => [2340,2620,2930,3250,3590,3910,6550,8140],
            'N16' => [2340,2950,3590,4240,4910,5560,9080,10730],
            'N17' => [ 940,1230,1530,1850,2190,2510,3060,3720], // small islands
        ];

        // Based charge for Cool Yamato is same as Yamato takyubin, but limited to 120 size.
        // クール便追加コスト(60,80,100,120)
        // https://www.post.japanpost.jp/service/you_pack/chilled/index.html
    private array $default_coolyamato_surcharge = [275, 330, 440, 715];

    private string $imple_date = '2024-04-01'; // Update this to save a new rates tablbe in database

    private array $default_yamatocompact_priceranks = [ // Only one size
            'N01' => [ 720],
            'N02' => [ 780],
            'N03' => [ 830],
            'N04' => [ 890],
            'N05' => [ 940],
            'N06' => [1000],
            'N07' => [1050],
            'N08' => [1110],
            'N09' => [1160],
            'N10' => [1270],
        ];

    private string $imple_yamatocompact_date = '2024-04-01'; // Update this to save a new rates tablbe in database


    protected function executeInstall()
    {
        if (!$this->purgeOldFiles()) {
            return false;
        }

        global $sniffer;
        zen_define_default('TABLE_TARIFS', DB_PREFIX . 'tarifs');
        if (!$sniffer->table_exists(TABLE_TARIFS)) {
            $this->executeInstallerSql(
                "CREATE TABLE " . TABLE_TARIFS . " (
                    id INT NOT NULL AUTO_INCREMENT,
                    module VARCHAR(32) NOT NULL DEFAULT '',
                    method varchar(32) NOT NULL DEFAULT '',
                    imple_date DATE NOT NULL DEFAULT '0001-01-01',
                    update_date DATETIME NOT NULL DEFAULT '0001-01-01 00:00:00',
                    quote_zone JSON NOT NULL,
                    PRIMARY KEY (id),
                    UNIQUE KEY ship_module (module,method,imple_date) USING BTREE
                );"
            );
        }
        $this->executeInstallerSql(
            "INSERT IGNORE INTO " . TABLE_TARIFS . "
                (module, method, imple_date, update_date, quote_zone)
            VALUES
                ('Yamato', 'Takyubin', '" . $this->imple_date . "', NOW(), '" . json_encode($this->default_priceranks) . "'),
                ('Yamato', 'CoolTakyubin', '" . $this->imple_date . "', NOW(), '" . json_encode($this->default_coolyamato_surcharge) . "'),
                ('Yamato', 'Compact', '" . $this->imple_yamatocompact_date . "', NOW(), '" . json_encode($this->default_yamatocompact_priceranks) . "')
            ;"
        );

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
        $this->executeInstallerSql(
            "INSERT INTO " . TABLE_TARIFS . "
                (module, method, imple_date, update_date, quote_zone)
            VALUES
                ('Yamato', 'Takyubin', '" . $this->imple_date . "', NOW(), '" . json_encode($this->default_priceranks) . "'),
                ('Yamato', 'CoolTakyubin', '" . $this->imple_date . "', NOW(), '" . json_encode($this->default_coolyamato_surcharge) . "'),
                ('Yamato', 'Compact', '" . $this->imple_yamatocompact_date . "', NOW(), '" . json_encode($this->default_yamatocompact_priceranks) . "')
            AS newtarifs
            ON DUPLICATE KEY UPDATE
                quote_zone = newtarifs.quote_zone
            ;"
        );

        parent::executeUpgrade($oldVersion);
    }

    protected function executeUninstall()
    {
        $this->executeInstallerSql(
            "DELETE FROM " . TABLE_CONFIGURATION . "
                WHERE configuration_key LIKE 'MODULE\_SHIPPING\_YAMATO%'
                    OR configuration_key LIKE 'MODULE\_SHIPPING\_COOLYAMATO%'
                    OR configuration_key LIKE 'MODULE\_SHIPPING\_NEKOPOSU%'
                    OR configuration_key LIKE 'MODULE\_PAYMENT\_YAMATOECOLLECT%'
                    OR configuration_key LIKE 'MODULE\_ORDER\_TOTAL\_YAMATOECOLLECT%'
            ;"
        );

        parent::executeUninstall();

        return true;
    }

    protected function purgeOldFiles(): bool
    {
        $filesToDelete = [
            DIR_FS_CATALOG . 'includes/classes/_yamato.php',
            DIR_FS_CATALOG . 'includes/languages/english/modules/shipping/lang.yamato.php',
            DIR_FS_CATALOG . 'includes/languages/japanese/modules/shipping/lang.yamato.php',
            DIR_FS_CATALOG . 'includes/modules/shipping/yamato.php',
            DIR_FS_CATALOG . 'includes/templates/template_default/images/icons/shipping_yamato.gif',
            DIR_FS_CATALOG . 'includes/languages/english/modules/shipping/lang.nekoposu.php',
            DIR_FS_CATALOG . 'includes/languages/japanese/modules/shipping/lang.nekoposu.php',
            DIR_FS_CATALOG . 'includes/modules/shipping/nekoposu.php',
            DIR_FS_CATALOG . 'includes/languages/english/modules/payment/lang.yamatoecollect.php',
            DIR_FS_CATALOG . 'includes/languages/japanese/modules/payment/lang.yamatoecollect.php',
            DIR_FS_CATALOG . 'includes/modules/payment/yamatoecollect.php',
            DIR_FS_CATALOG . 'includes/languages/english/modules/order_total/lang.ot_yamatoecollect_fee.php',
            DIR_FS_CATALOG . 'includes/languages/japanese/modules/order_total/lang.ot_yamatoecollect_fee.php',
            DIR_FS_CATALOG . 'includes/modules/order_total/ot_yamatoecollect_fee.php',
        ];

        $errorOccurred = false;
        foreach ($filesToDelete as $nextFile) {
            if (file_exists($nextFile)) {
                $result = unlink($nextFile);
                if (!$result && file_exists($nextFile)) {
                    $errorOccurred = true;
                    $this->errorContainer->addError(
                        0,
                        sprintf(ERROR_UNABLE_TO_DELETE_FILE, $nextFile),
                        false,
                        // this str_replace has to do DIR_FS_ADMIN before CATALOG because catalog is contained within admin, so results are wrong.
                        // also, '[admin_directory]' is used to obfuscate the admin dir name, in case the user copy/pastes output to a public forum for help.
                        sprintf(ERROR_UNABLE_TO_DELETE_FILE, str_replace([DIR_FS_ADMIN, DIR_FS_CATALOG], ['[admin_directory]/', ''], $nextFile))
                    );
                }
            }
        }
        return !$errorOccurred;
    }
}

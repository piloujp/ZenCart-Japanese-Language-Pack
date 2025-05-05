<?php
use Zencart\PluginSupport\ScriptedInstaller as ScriptedInstallBase;

class ScriptedInstaller extends ScriptedInstallBase
{

    protected function executeInstall()
    {
        if (!$this->purgeOldFiles()) {
            return false;
        }

        $default_priceranks = [ // Tarification from August 2024
        'N01' => [910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420],
        'N02' => [910,1220,1520,2180,2440,2710,2890,3480,4070,5240,6420],
        'N03' => [910,1220,1520,2180,2440,2770,2950,3480,4070,5240,6420],
        'N04' => [910,1220,1520,2180,2440,2830,3010,3600,4120,5300,6420],
        'N05' => [910,1220,1520,2180,2440,2830,3080,3600,4180,5360,6540],
        'N06' => [910,1220,1520,2180,2440,2890,3130,3720,4360,5540,6770],
        'N07' => [910,1220,1520,2180,2440,3240,3540,4300,5070,6540,8070],
        'N08' => [910,1220,1520,2180,2440,3360,3660,4480,5240,6830,8420],
        'N09' => [910,1220,1520,2180,2440,3420,3770,4600,5420,7070,8710],
        'N10' => [1040,1340,1630,2310,2570,2710,3010,3600,4180,5360,6540],
        'N11' => [1040,1340,1630,2310,2570,2830,3010,3600,4180,5360,6540],
        'N12' => [1040,1340,1630,2310,2570,2950,3190,3830,4480,5770,7010],
        'N13' => [1040,1340,1630,2310,2570,3010,3240,3890,4540,5770,7070],
        'N14' => [1040,1340,1630,2310,2570,3130,3360,4070,4710,6130,7480],
        'N15' => [1040,1340,1630,2310,2570,3130,3420,4130,4840,6240,7660],
        'N16' => [1040,1340,1630,2310,2570,3240,3540,4250,5010,6490,7950],
        'N17' => [1040,1340,1630,2310,2570,3360,3660,4480,5240,6830,8420],
        'N18' => [1040,1340,1630,2310,2570,3420,3770,4600,5420,7070,8710],
        'N19' => [1040,1340,1630,2310,2570,3480,3770,4600,5420,7070,8770],
        'N20' => [1040,1340,1630,2310,2570,3480,3830,4730,5540,7240,8950],
        'N21' => [1040,1340,1630,2310,2570,3660,4010,4890,5770,7600,9420],
        'N22' => [1180,1470,1740,2440,2700,3130,3420,4130,4840,6240,7660],
        'N23' => [1180,1470,1740,2440,2700,3240,3540,4250,5010,6490,7950],
        'N24' => [1180,1470,1740,2440,2700,3360,3660,4420,5240,6770,8360],
        'N25' => [1180,1470,1740,2440,2700,3420,3770,4540,5360,7010,8660],
        'N26' => [1180,1470,1740,2440,2700,3480,3830,4660,5480,7180,8830],
        'N27' => [1180,1470,1740,2440,2700,3660,4010,4890,5830,7600,9420],
        'N28' => [1180,1470,1740,2440,2700,3710,4130,5070,5950,7830,9720],
        'N29' => [1180,1470,1740,2440,2700,3710,4130,5070,6010,7890,9770],
        'N30' => [1180,1470,1740,2440,2700,3770,4130,5130,6070,7950,9830],
        'N31' => [1180,1470,1740,2440,2700,4070,4480,5540,7240,8950,10890],
        'N32' => [1300,1590,1880,2570,2830,3480,3830,4660,5480,7180,8830],
        'N33' => [1300,1590,1880,2570,2830,3660,4010,4890,5830,7600,9420],
        'N34' => [1300,1590,1880,2570,2830,4130,4600,5720,6830,9070,11250],
        'N35' => [1300,1590,1880,2570,2830,4130,4600,5720,7370,9070,11300],
        'N36' => [1440,1730,2000,2710,2950,3770,4190,5190,6130,8070,10010],
        'N37' => [1440,1730,2000,2710,2950,3960,4360,5420,6420,8480,10540],
        'N38' => [1440,1730,2000,2710,2950,3890,4300,5360,6360,8360,10360],
        'N39' => [1440,1730,2000,2710,2950,4010,4480,5540,6600,8710,10780],
        'N40' => [1440,1730,2000,2710,2950,4240,4730,5890,7010,9300,11600],
        'N41' => [1440,1730,2000,2710,2950,4240,4780,5890,7840,9360,11720],
        'N42' => [1440,1730,2000,2710,2950,4360,4840,6070,7240,9600,12010],
        'N43' => [1440,1730,2000,2710,2950,4600,5130,6430,7710,10300,12890],
        'N44' => [1570,1840,2130,2830,3090,3960,4360,5420,6420,8480,10540],
        'N45' => [1570,1840,2130,2830,3090,4360,4840,6070,7240,9600,12010],
        'N46' => [1570,1840,2130,2830,3090,4770,5360,6720,8070,10780,13480],
        'N47' => [1700,1960,2240,2950,3210,4300,4840,6010,7130,9480,11830],
        'N48' => [1700,1960,2240,2950,3210,4840,5420,6780,8140,11070,13720],
        'N49' => [1700,1960,2240,2950,3210,4840,5480,6840,8250,11010,13780],
        'N50' => [1700,1960,2240,2950,3210,5130,5780,7780,8770,11770,15360],
        'N51' => [1820,2100,2350,3090,3340,4890,5480,6900,8300,11070,13890],
        'N52' => [1914,2233,3201,4587,6083,10923,13343,18183,23023,32703,42383],
        'N53' => [1914,2233,3201,4807,6512,11352,13772,18612,23452,33132,42812],
        'N54' => [1914,2981,4158,5654,7359,12199,14619,19459,24299,33979,43659],
        'N55' => [1914,2662,3949,6083,8426,13266,15686,20526,25366,35046,44726],
        'N56' => [1914,3080,5016,7260,9493,14333,16753,21593,26433,36113,45793],
        'N57' => [1914,3201,4587,6083,7898,12738,15158,19998,24838,34518,44198],
        'N58' => [1914,3520,4686,7579,10560,15400,17820,22660,27500,37180,46860],
        'N59' => [1950,2220,2480,3220,3480,5420,6130,7720,9300,12540,15780],
        'N60' => [2070,2350,2600,3340,3610,5420,6130,7780,9360,12600,15840],
        'N61' => [2210,2480,2720,3480,3750,5720,6490,8190,9900,13360,16780],
        'N62' => [2210,2480,2720,3480,3750,5950,6780,8600,10420,14080,17720],
        'N63' => [2442,3839,5753,8965,12067,16907,19327,24167,29007,38687,48367],
        'N64' => [2442,4158,6292,9185,12595,17435,19855,24695,29535,39215,48895],
        'N65' => [2552,4807,7579,11220,14740,19580,22000,26840,31680,41360,51040],
        ];

        $imple_date = '2024-08-01'; // Update this to save a new rates tablbe in database

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
                ('Sagawa', 'Express', '" . $imple_date . "', NOW(), '" . json_encode($default_priceranks) . "');"
        );
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
        $this->executeInstallerSql(
            "DELETE FROM " . TABLE_CONFIGURATION . "
                WHERE configuration_key LIKE 'MODULE\_SHIPPING\_SAGAWA%'
                    OR configuration_key LIKE 'MODULE\_PAYMENT\_SAGAWAECOLLECT%'
                    OR configuration_key LIKE 'MODULE\_ORDER\_TOTAL\_SAGAWAECOLLECT%'
            ;"
        );

        return true;
    }

    protected function purgeOldFiles(): bool
    {
        $filesToDelete = [
            DIR_FS_CATALOG . 'includes/classes/_sagawa.php',
            DIR_FS_CATALOG . 'includes/languages/english/modules/shipping/lang.sagawa.php',
            DIR_FS_CATALOG . 'includes/languages/japanese/modules/shipping/lang.sagawa.php',
            DIR_FS_CATALOG . 'includes/modules/shipping/sagawa.php',
            DIR_FS_CATALOG . 'includes/templates/template_default/images/icons/shipping_sagawa.gif',
            DIR_FS_CATALOG . 'includes/languages/english/modules/payment/lang.sagawaecollect.php',
            DIR_FS_CATALOG . 'includes/languages/japanese/modules/payment/lang.sagawaecollect.php',
            DIR_FS_CATALOG . 'includes/modules/payment/sagawaecollect.php',
            DIR_FS_CATALOG . 'includes/languages/english/modules/order_total/lang.ot_sagawaecollect_fee.php',
            DIR_FS_CATALOG . 'includes/languages/japanese/modules/order_total/lang.ot_sagawaecollect_fee.php',
            DIR_FS_CATALOG . 'includes/modules/order_total/ot_sagawaecollect_fee.php',
        ];

        $errorOccurred = false;
        foreach ($filesToDelete as $key => $nextFile) {
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

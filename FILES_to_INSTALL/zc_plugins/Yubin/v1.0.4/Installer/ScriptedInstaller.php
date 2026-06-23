<?php
use Zencart\PluginSupport\ScriptedInstaller as ScriptedInstallBase;

class ScriptedInstaller extends ScriptedInstallBase
{

    protected function executeInstall()
    {
        if (!$this->purgeOldFiles()) {
            return false;
        }

        $default_jpparcelair = [ // 小包郵便物:国際小包、航空便 08-2024 extra charge zone 3 and 4 - International Parcels Air 7-15 days - tracking
            [1,2050,2500,3850,4200,4550],
            [2,2750,3700,6000,6700,7250],
            [3,3450,4900,8150,9200,9950],
            [4,4150,6100,10300,11700,12650],
            [5,4850,7300,12450,14200,15350],
            [6,5550,8500,14600,16700,18050],
            [7,6250,9700,16750,19200,20750],
            [8,6950,10900,18900,21700,23450],
            [9,7650,12100,21050,24200,26150],
            [10,8350,13300,23200,26700,28850],
            [11,8850,13950,24800,28700,30650],
            [12,9350,14600,26400,30700,32450],
            [13,9850,15250,28000,32700,34250],
            [14,10350,15900,29600,34700,36050],
            [15,10850,16550,31200,36700,37850],
            [16,11350,17200,32800,38700,39650],
            [17,11850,17850,34400,40700,41450],
            [18,12350,18500,36000,42700,43250],
            [19,12850,19150,37600,44700,45050],
            [20,13350,19800,39200,46700,46850],
            [21,13850,20450,40800,48700,48650],
            [22,14350,21100,42400,50700,50450],
            [23,14850,21750,44000,52700,52250],
            [24,15350,22400,45600,54700,54050],
            [25,15850,23050,47200,56700,55850],
            [26,16350,23700,48800,58700,57650],
            [27,16850,24350,50400,60700,59450],
            [28,17350,25000,52000,62700,61250],
            [29,17850,25650,53600,64700,63050],
            [30,18350,26300,55200,66700,64850],
        ];

        $default_jpparcelsea = [ // 小包郵便物:国際小包、船便 08-2024 International Parcels Surface 2 - 3 months - tracking
            [1,1800,2100,2500,2600,2700],
            [2,2200,2600,3100,3300,3400],
            [3,2600,3100,3700,4000,4100],
            [4,3000,3600,4300,4700,4800],
            [5,3400,4100,4900,5400,5500],
            [6,3800,4600,5500,6100,6200],
            [7,4200,5100,6100,6800,6900],
            [8,4600,5600,6700,7500,7600],
            [9,5000,6100,7300,8200,8300],
            [10,5400,6600,7900,8900,9000],
            [11,5800,7000,8300,9500,9600],
            [12,6200,7400,8700,10100,10200],
            [13,6600,7800,9100,10700,10800],
            [14,7000,8200,9500,11300,11400],
            [15,7400,8600,9900,11900,12000],
            [16,7800,9000,10300,12500,12600],
            [17,8200,9400,10700,13100,13200],
            [18,8600,9800,11100,13700,13800],
            [19,9000,10200,11500,14300,14400],
            [20,9400,10600,11900,14900,15000],
            [21,9800,11000,12300,15500,15600],
            [22,10200,11400,12700,16100,16200],
            [23,10600,11800,13100,16700,16800],
            [24,11000,12200,13500,17300,17400],
            [25,11400,12600,13900,17900,18000],
            [26,11800,13000,14300,18500,18600],
            [27,12200,13400,14700,19100,19200],
            [28,12600,13800,15100,19700,19800],
            [29,13000,14200,15500,20300,20400],
            [30,13400,14600,15900,20900,21000],
        ];

        $default_jpparcelems = [ // 国際スピード郵便(EMS) 08-2024 extra charge zone 3 and 4 - EMS 4-10 days - tracking
            [0.5,1450,1900,3150,3900,3600],
            [0.6,1600,2150,3400,4180,3900],
            [0.7,1750,2400,3650,4460,4200],
            [0.8,1900,2650,3900,4740,4500],
            [0.9,2050,2900,4150,5020,4800],
            [1.0,2200,3150,4400,5300,5100],
            [1.25,2500,3500,5000,5990,5850],
            [1.5,2800,3850,5550,6600,6600],
            [1.75,3100,4200,6150,7290,7350],
            [2.0,3400,4550,6700,7900,8100],
            [2.5,3900,5150,7750,9100,9600],
            [3.0,4400,5750,8800,10300,11100],
            [3.5,4900,6350,9850,11500,12600],
            [4.0,5400,6950,10900,12700,14100],
            [4.5,5900,7550,11950,13900,15600],
            [5.0,6400,8150,13000,15100,17100],
            [5.5,6900,8750,14050,16300,18600],
            [6.0,7400,9350,15100,17500,20100],
            [7.0,8200,10350,17200,19900,22500],
            [8.0,9000,11350,19300,22300,24900],
            [9.0,9800,12350,21400,24700,27300],
            [10.0,10600,13350,23500,27100,29700],
            [11.0,11400,14350,25600,29500,32100],
            [12.0,12200,15350,27700,31900,34500],
            [13.0,13000,16350,29800,34300,36900],
            [14.0,13800,17350,31900,36700,39300],
            [15.0,14600,18350,34000,39100,41700],
            [16.0,15400,19350,36100,41500,44100],
            [17.0,16200,20350,38200,43900,46500],
            [18.0,17000,21350,40300,46300,48900],
            [19.0,17800,22350,42400,48700,51300],
            [20.0,18600,23350,44500,51100,53700],
            [21.0,19400,24350,46600,53500,56100],
            [22.0,20200,25350,48700,55900,58500],
            [23.0,21000,26350,50800,58300,60900],
            [24.0,21800,27350,52900,60700,63300],
            [25.0,22600,28350,55000,63100,65700],
            [26.0,23400,29350,57100,65500,68100],
            [27.0,24200,30350,59200,67900,70500],
            [28.0,25000,31350,61300,70300,72900],
            [29.0,25800,32350,63400,72700,75300],
            [30.0,26600,33350,65500,75100,77700],
        ];

        // 距離別の価格ランク: ランクコード => 価格(60,80,100,120,140,160,170)
        // https://www.post.japanpost.jp/service/you_pack/charge/ichiran.html
        $default_yupack_pricerank = [ // ２０２４年０８月現在の全ての送料（契約無し）　Full tarafication (no contract) as of August 2024
        'N01' => [820,1130,1450,1770,2120,2450,3000],
        'N02' => [880,1200,1500,1830,2170,2500,3070],
        'N03' => [990,1310,1620,1940,2300,2610,3750],
        'N04' => [1100,1450,1810,2130,2510,2820,3970],
        'N05' => [1150,1440,1780,2080,2440,2750,3890],
        'N06' => [1340,1690,2030,2370,2730,3060,4200],
        'N07' => [1410,1710,2020,2340,2680,3010,4140],
        'N08' => [1450,1810,2160,2490,2860,3180,4350],
        'N09' => [1590,1890,2190,2500,2850,3170,4860],
        'N10' => [1600,1970,2320,2630,3010,3330,5040],
        'N11' => [1740,2040,2350,2650,3010,3330,5030],
        'N12' => [1750,2050,2380,2680,3060,3380,5090],
        ];

        // Based charge for Yupack Chilled is same as Yupack, with 160 corresponding to 150, and 170 not used.
        // クール便追加コスト(60,80,100,120,140,150)
        // https://www.post.japanpost.jp/service/you_pack/chilled/index.html
        $default_yupackchilled_surcharge = [225, 360, 675, 675, 1330, 2100];

        $imple_date = '2024-08-01'; // Update this to save a new rates tablbe in database

        global $sniffer;
        zen_define_default('TABLE_SHIPPING_RATES', DB_PREFIX . 'shipping_rates');
        if (!$sniffer->table_exists(TABLE_SHIPPING_RATES)) {
            $this->executeInstallerSql(
                "CREATE TABLE " . TABLE_SHIPPING_RATES . " (
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
            "INSERT IGNORE INTO " . TABLE_SHIPPING_RATES . "
                (module, method, imple_date, update_date, quote_zone)
            VALUES
                ('Yubin', 'jpparcelair', '" . $imple_date . "', NOW(), '" . json_encode($default_jpparcelair) . "'),
                ('Yubin', 'jpparcelsea', '" . $imple_date . "', NOW(), '" . json_encode($default_jpparcelsea) . "'),
                ('Yubin', 'jpparcelems', '" . $imple_date . "', NOW(), '" . json_encode($default_jpparcelems) . "'),
                ('Yubin', 'Yupack', '" . $imple_date . "', NOW(), '" . json_encode($default_yupack_pricerank) . "'),
                ('Yubin', 'YupackChilled', '" . $imple_date . "', NOW(), '" . json_encode($default_yupackchilled_surcharge) . "')
                ;"
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
                WHERE configuration_key LIKE 'MODULE\_SHIPPING\_JPPARCEL%'
                    OR configuration_key LIKE 'MODULE\_SHIPPING\_YUPACK%'
                    OR configuration_key LIKE 'MODULE\_SHIPPING\_LETTERPACK%'
            ;"
        );

        return true;
    }

    protected function purgeOldFiles(): bool
    {
        $filesToDelete = [
            DIR_FS_CATALOG . 'includes/classes/_yupack.php',
            DIR_FS_CATALOG . 'includes/languages/english/modules/shipping/lang.yupack.php',
            DIR_FS_CATALOG . 'includes/languages/japanese/modules/shipping/lang.yupack.php',
            DIR_FS_CATALOG . 'includes/modules/shipping/yupack.php',
            DIR_FS_CATALOG . 'includes/templates/template_default/images/icons/shipping_yupack.gif',
            DIR_FS_CATALOG . 'includes/classes/_jpparcel.php',
            DIR_FS_CATALOG . 'includes/languages/english/modules/shipping/lang.jpparcel.php',
            DIR_FS_CATALOG . 'includes/languages/japanese/modules/shipping/lang.jpparcel.php',
            DIR_FS_CATALOG . 'includes/languages/english/modules/shipping/lang.jpparcelair.php',
            DIR_FS_CATALOG . 'includes/languages/japanese/modules/shipping/lang.jpparcelair.php',
            DIR_FS_CATALOG . 'includes/languages/english/modules/shipping/lang.jpparcelems.php',
            DIR_FS_CATALOG . 'includes/languages/japanese/modules/shipping/lang.jpparcelems.php',
            DIR_FS_CATALOG . 'includes/languages/english/modules/shipping/lang.jpparcelsea.php',
            DIR_FS_CATALOG . 'includes/languages/japanese/modules/shipping/lang.jpparcelsea.php',
            DIR_FS_CATALOG . 'includes/modules/shipping/jpparcelair.php',
            DIR_FS_CATALOG . 'includes/modules/shipping/jpparcelems.php',
            DIR_FS_CATALOG . 'includes/modules/shipping/jpparcelsea.php',
            DIR_FS_CATALOG . 'includes/languages/english/modules/shipping/lang.letterpacklite.php',
            DIR_FS_CATALOG . 'includes/languages/japanese/modules/shipping/lang.letterpacklite.php',
            DIR_FS_CATALOG . 'includes/languages/english/modules/shipping/lang.letterpackplus.php',
            DIR_FS_CATALOG . 'includes/languages/japanese/modules/shipping/lang.letterpackplus.php',
            DIR_FS_CATALOG . 'includes/modules/shipping/letterpacklite.php',
            DIR_FS_CATALOG . 'includes/modules/shipping/letterpackplus.php',
            DIR_FS_CATALOG . 'includes/templates/template_default/images/icons/shipping_letterpacklite.gif',
            DIR_FS_CATALOG . 'includes/templates/template_default/images/icons/shipping_letterpackplus.gif',
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

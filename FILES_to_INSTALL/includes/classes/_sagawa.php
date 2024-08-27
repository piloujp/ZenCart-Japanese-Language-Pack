<?php
/*
 * Sagawa Class.
 *
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: pilou2/piloujp 2024 Aug 24 Modified in v2.1.0-alpha1 $
 */

/*
    $rate = new _sagawa('sagawa','通常便');
    $rate->SetOrigin('北海道', 'JP');   // 北海道から
    $rate->SetDest('東京都', 'JP');     // 東京都まで
    $rate->SetWeight(10);           // kg
    $quote = $rate->GetQuote();
    print $quote['type'] . "<br>";
    print $quote['cost'] . "\n";
*/
class _Sagawa {
    var $quote;
    var $OriginZone;
    var $OriginCountryCode = 'JP';
    var $DestZone;
    var $DestCountryCode = 'JP';
    var $Weight = 0;
    var $Length = 0;
    var $Width  = 0;
    var $Height = 0;

    // コンストラクタ
    // $id:   module id
    // $titl: module name
    // $zone: 都道府県コード '01'～'47'
    // $country: country code
    function __construct($id, $title, $zone = NULL, $country = NULL) {
        $this->quote = array('id' => $id, 'title' => $title);
        if($zone) {
            $this->SetOrigin($zone, $country);
        }
    }
    // 発送元をセットする
    // $zone: 都道府県コード '01'～'47'
    // $country: country code
    function SetOrigin($zone, $country = NULL) {
        $this->OriginZone = $zone;
        if($country) {
            $this->OriginCountryCode = $country;
        }
    }
    function SetDest($zone, $country = NULL) {
        $this->DestZone = $zone;
        if($country) {
            $this->DestCountryCode = $country;
        }
    }
    function SetWeight($weight) {
        //$this->Weight = $weight;
        $this->Weight = $weight;
    }
    function SetSize($length = NULL, $width = NULL, $height = NULL) {
        if($length) {
            $this->Length = $length;
        }
        if($width) {
            $this->Width = $width;
        }
        if($height) {
            $this->Height = $height;
        }
    }
    // サイズ区分(0～4)を返す
    // 規格外の場合は9を返す
    //
    // 区分  サイズ名  ３辺計   重量
    // ----------------------------------
    // 0     60サイズ  60cmまで  2kgまで
    // 1     80サイズ  80cmまで  5kgまで
    // 2    100サイズ 100cmまで 10kgまで
    // 3    140サイズ 140cmまで 20kgまで
    // 4    160サイズ 160cmまで 30kgまで
    // 5    180サイズ 180cmまで 40kgまで
    // 6    200サイズ 200cmまで 50kgまで
    // 7    220サイズ 220cmまで 50kgまで
    // 8    240サイズ 240cmまで 50kgまで
    // 9    規格外  
    function GetSizeClass() {
        $a_classes = array(
            array(0,  60,  2),  // 区分,３辺計,重量
            array(1,  80,  5),
            array(2, 100, 10),
            array(3, 140, 20),
            array(4, 160, 30),
            array(5, 170, 50),
            array(6, 180, 50),
            array(7, 200, 50),
            array(8, 220, 50),
            array(9, 240, 50),
            array(10, 260, 50)
        );

        $n_totallength = $this->Length + $this->Width + $this->Height;

        //while (list($n_index, $a_limit) = each($a_classes)) {
        foreach ($a_classes as $n_index => $a_limit) {
            if ($n_totallength <= $a_limit[1] && $this->Weight <= $a_limit[2]) {
                return $a_limit[0];
            }
        }
        return -1;  // 規格外
    }
    // 送付元と送付先からキーを作成する
    //
    function GetDistKey() {
        $s_key = '';
        $s_z1 = $this->GetLZone($this->OriginZone);
        $s_z2 = $this->GetLZone($this->DestZone);
        if ( $s_z1 && $s_z2 ) {
            // 地帯コードをアルファベット順に連結する
            if ( ord($s_z1) < ord($s_z2) ) {
                $s_key = $s_z1 . $s_z2;
            } else {
                $s_key = $s_z2 . $s_z1;
            }
        }
        return $s_key;
    }
    // 都道府県コードから地帯コードを取得する
    // $zone: 都道府県コード
    function GetLZone($zone) {
        // 都道府県コードを地帯コード('A'～'M')に変換する
        //  北海道:'A' = 北海道
        //  北東北:'B' = 青森県,岩手県,秋田県
        //  南東北:'C' = 宮城県,山形県,福島県
        //  関東  :'D' = 茨城県,栃木県,群馬県,埼玉県,千葉県,東京都,神奈川県,山梨県
        //  信越  :'E' = 新潟県,長野県
        //  東海  :'F' = 岐阜県,静岡県,愛知県,三重県
        //  北陸  :'G' = 富山県,石川県,福井県
        //  関西  :'H' = 滋賀県,京都府,大阪府,兵庫県,奈良県,和歌山県
        //  中国  :'I' = 鳥取県,島根県,岡山県,広島県,山口県
        //  四国  :'J' = 徳島県,香川県,愛媛県,高知県
        //  北九州:'K' = 福岡県,佐賀県,長崎県,大分県
        //  南九州:'L' = 熊本県,宮崎県,鹿児島県
        //  沖縄  :'M' = 沖縄県 (通常便は配達区域外)
        $a_zonemap = array(
        '北海道'=>'A',
        '青森県'=>'B',
        '岩手県'=>'B',
        '宮城県'=>'C',
        '秋田県'=>'B',
        '山形県'=>'C',
        '福島県'=>'C',
        '茨城県'=>'D',
        '栃木県'=>'D',
        '群馬県'=>'D',
        '埼玉県'=>'D',
        '千葉県'=>'D',
        '東京都'=>'D',
        '神奈川県'=>'D',
        '新潟県'=>'E',
        '富山県'=>'G',
        '石川県'=>'G',
        '福井県'=>'G',
        '山梨県'=>'D',
        '長野県'=>'E',
        '岐阜県'=>'F',
        '静岡県'=>'F',
        '愛知県'=>'F',
        '三重県'=>'F',
        '滋賀県'=>'H',
        '京都府'=>'H',
        '大阪府'=>'H',
        '兵庫県'=>'H',
        '奈良県'=>'H',
        '和歌山県'=>'H',
        '鳥取県'=>'I',
        '島根県'=>'I',
        '岡山県'=>'I',
        '広島県'=>'I',
        '山口県'=>'I',
        '徳島県'=>'J',
        '香川県'=>'J',
        '愛媛県'=>'J',
        '高知県'=>'J',
        '福岡県'=>'K',
        '佐賀県'=>'K',
        '長崎県'=>'K',
        '熊本県'=>'L',
        '大分県'=>'K',
        '宮崎県'=>'L',
        '鹿児島県'=>'L',
        '沖縄県'=>'M'
        );
        return $a_zonemap[$zone];
    }

    function GetQuote() {
        // 距離別の価格ランク: ランクコード => 価格(60,80,100,140,160,180,200,220,240,260) 2023-03 prices HT https://www.sagawa-exp.co.jp/send/fare/attention.html
        $a_pricerank = array(
// サガワ急便との契約によりサイズや重さの制限が変わりますので、「 function GetSizeClass()」で調整が必要です。
// Size and weight restrictions vary depending on the contract with Sagawa Transport, so you will need to adjust them in "function GetSizeClass()".
// 送信元の都道府県の行「/*...」と「*/...」を削除し、契約に合わせて料金を調整して下さい。
// Remove lines '/*...' and '*/...' for the prefecture you send from and adjust rates to your contract.

// //  /////////////////// GetSizeClass array(  0,  1,  2,  3,  4,  5,  6,  7,  8,  9, 10)
// // 北海道から/////////////////////////////( 60,80,100,140,160,180,200,220,240,260   ) サイズ、契約なし、２０２４年８月、税込
/*
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420), // A北海道-A北海道'AA'=>N01
		'N31' => array(1180,1470,1740,2440,2700,4070,4480,5540,7240,8950,10890), // A北海道-B北東北'AB'=>N31
		'N35' => array(1300,1590,1880,2570,2830,4130,4600,5720,7370,9070,11300), // A北海道-C南東北'AC'=>N35
		'N41' => array(1440,1730,2000,2710,2950,4240,4780,5890,7840,9360,11720), // A北海道-D関東  'AD'=>N41
		'N43' => array(1440,1730,2000,2710,2950,4600,5130,6430,7710,10300,12890), // A北海道-E信越  'AE'=>N43
		'N46' => array(1570,1840,2130,2830,3090,4770,5360,6720,8070,10780,13480), // A北海道-F東海  'AF'=>N46
		'N46' => array(1570,1840,2130,2830,3090,4770,5360,6720,8070,10780,13480), // A北海道-G北陸  'AG'=>N46
		'N51' => array(1820,2100,2350,3090,3340,4890,5480,6900,8300,11070,13890), // A北海道-H関西  'AH'=>N51
		'N59' => array(1950,2220,2480,3220,3480,5420,6130,7720,9300,12540,15780), // A北海道-I中国  'AI'=>N59
		'N60' => array(2070,2350,2600,3340,3610,5420,6130,7780,9360,12600,15840), // A北海道-J四国  'AJ'=>N60
		'N61' => array(2210,2480,2720,3480,3750,5720,6490,8190,9900,13360,16780), // A北海道-K北九州'AK'=>N61
		'N62' => array(2210,2480,2720,3480,3750,5950,6780,8600,10420,14080,17720), // A北海道-L南九州'AL'=>N62
		'N65' => array(2552,4807,7579,11220,14740,19580,22000,26840,31680,41360,51040) // A北海道-M沖縄  'AM'=>N65
*/
// // 北東北から//////////////////////////////( 60,80,100,140,160,180,200,220,240,260   ) サイズ、契約なし、２０２４年８月、税込
/*
		'N31' => array(1180,1470,1740,2440,2700,4070,4480,5540,7240,8950,10890), // B北東北-A北海道'AB'=>N31
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420), // B北東北-B北東北'BB'=>N01
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420), // B北東北-C南東北'BC'=>N01
		'N21' => array(1040,1340,1630,2310,2570,3660,4010,4890,5770,7600,9420), // B北東北-D関東  'BD'=>N21
		'N21' => array(1040,1340,1630,2310,2570,3660,4010,4890,5770,7600,9420), // B北東北-E信越  'BE'=>N21
		'N30' => array(1180,1470,1740,2440,2700,3770,4130,5130,6070,7950,9830), // B北東北-F東海  'BF'=>N30
		'N30' => array(1180,1470,1740,2440,2700,3770,4130,5130,6070,7950,9830), // B北東北-G北陸  'BG'=>N30
		'N34' => array(1300,1590,1880,2570,2830,4130,4600,5720,6830,9070,11250), // B北東北-H関西  'BH'=>N34
		'N42' => array(1440,1730,2000,2710,2950,4360,4840,6070,7240,9600,12010), // B北東北-I中国  'BI'=>N42
		'N45' => array(1570,1840,2130,2830,3090,4360,4840,6070,7240,9600,12010), // B北東北-J四国  'BJ'=>N45
		'N48' => array(1700,1960,2240,2950,3210,4840,5420,6780,8140,11070,13720), // B北東北-K北九州'BK'=>N48
		'N50' => array(1700,1960,2240,2950,3210,5130,5780,7780,8770,11770,15360), // B北東北-L南九州'BL'=>N50
		'N64' => array(2442,4158,6292,9185,12595,17435,19855,24695,29535,39215,48895) // B北東北-M沖縄  'BM'=>N64
*/
// // 南東北から//////////////////////////////( 60,80,100,140,160,180,200,220,240,260   ) サイズ、契約なし、２０２４年８月、税込
/*
		'N35' => array(1300,1590,1880,2570,2830,4130,4600,5720,7370,9070,11300), // C南東北-A北海道'AC'=>N35
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420), // C南東北-B北東北'BC'=>N01
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420), // C南東北-C南東北'CC'=>N01
		'N09' => array(910,1220,1520,2180,2440,3420,3770,4600,5420,7070,8710), // C南東北-D関東  'CD'=>N09
		'N09' => array(910,1220,1520,2180,2440,3420,3770,4600,5420,7070,8710), // C南東北-E信越  'CE'=>N09
		'N18' => array(1040,1340,1630,2310,2570,3420,3770,4600,5420,7070,8710), // C南東北-F東海  'CF'=>N18
		'N18' => array(1040,1340,1630,2310,2570,3420,3770,4600,5420,7070,8710), // C南東北-G北陸  'CG'=>N18
		'N28' => array(1180,1470,1740,2440,2700,3710,4130,5070,5950,7830,9720), // C南東北-H関西  'CH'=>N28
		'N37' => array(1440,1730,2000,2710,2950,3960,4360,5420,6420,8480,10540), // C南東北-I中国  'CI'=>N37
		'N44' => array(1570,1840,2130,2830,3090,3960,4360,5420,6420,8480,10540), // C南東北-J四国  'CJ'=>N44
		'N47' => array(1700,1960,2240,2950,3210,4300,4840,6010,7130,9480,11830), // C南東北-K北九州'CK'=>N47
		'N49' => array(1700,1960,2240,2950,3210,4840,5480,6840,8250,11010,13780), // C南東北-L南九州'CL'=>N49
		'N63' => array(2442,3839,5753,8965,12067,16907,19327,24167,29007,38687,48367) // C南東北-M沖縄  'CM'=>N63
*/
// // 関東から//////////////////////////////( 60,80,100,140,160,180,200,220,240,260   ) サイズ、契約なし、２０２４年８月、税込
/*
		'N41' => array(1440,1730,2000,2710,2950,4240,4780,5890,7840,9360,11720), // D関東-A北海道'AD'=>N41
		'N21' => array(1040,1340,1630,2310,2570,3660,4010,4890,5770,7600,9420), // D関東-B北東北'BD'=>N21
		'N09' => array(910,1220,1520,2180,2440,3420,3770,4600,5420,7070,8710), // D関東-C南東北'CD'=>N09
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420), // D関東-D関東  'DD'=>N01
		'N08' => array(910,1220,1520,2180,2440,3360,3660,4480,5240,6830,8420), // D関東-E信越  'DE'=>N08
		'N08' => array(910,1220,1520,2180,2440,3360,3660,4480,5240,6830,8420), // D関東-F東海  'DF'=>N08
		'N08' => array(910,1220,1520,2180,2440,3360,3660,4480,5240,6830,8420), // D関東-G北陸  'DG'=>N08
		'N17' => array(1040,1340,1630,2310,2570,3360,3660,4480,5240,6830,8420), // D関東-H関西  'DH'=>N17
		'N27' => array(1180,1470,1740,2440,2700,3660,4010,4890,5830,7600,9420), // D関東-I中国  'DI'=>N27
		'N33' => array(1300,1590,1880,2570,2830,3660,4010,4890,5830,7600,9420), // D関東-J四国  'DJ'=>N33
		'N38' => array(1440,1730,2000,2710,2950,3890,4300,5360,6360,8360,10360), // D関東-K北九州'DK'=>N38
		'N40' => array(1440,1730,2000,2710,2950,4240,4730,5890,7010,9300,11600), // D関東-L南九州'DL'=>N40
		'N58' => array(1914,3520,4686,7579,10560,15400,17820,22660,27500,37180,46860) // D関東-M沖縄  'DM'=>N58
*/
// // 信越から//////////////////////////////( 60,80,100,140,160,180,200,220,240,260   ) サイズ、契約なし、２０２４年８月、税込
/*
		'N43' => array(1440,1730,2000,2710,2950,4600,5130,6430,7710,10300,12890), // E信越-A北海道'AE'=>N43
		'N21' => array(1040,1340,1630,2310,2570,3660,4010,4890,5770,7600,9420), // E信越-B北東北'BE'=>N21
		'N09' => array(910,1220,1520,2180,2440,3420,3770,4600,5420,7070,8710), // E信越-C南東北'CE'=>N09
		'N08' => array(910,1220,1520,2180,2440,3360,3660,4480,5240,6830,8420), // E信越-D関東  'DE'=>N08
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420), // E信越-E信越  'EE'=>N01
		'N06' => array(910,1220,1520,2180,2440,2890,3130,3720,4360,5540,6770), // E信越-F東海  'EF'=>N06
		'N06' => array(910,1220,1520,2180,2440,2890,3130,3720,4360,5540,6770), // E信越-G北陸  'EG'=>N06
		'N12' => array(1040,1340,1630,2310,2570,2950,3190,3830,4480,5770,7010), // E信越-H関西  'EH'=>N12
		'N26' => array(1180,1470,1740,2440,2700,3480,3830,4660,5480,7180,8830), // E信越-I中国  'EI'=>N26
		'N32' => array(1300,1590,1880,2570,2830,3480,3830,4660,5480,7180,8830), // E信越-J四国  'EJ'=>N32
		'N36' => array(1440,1730,2000,2710,2950,3770,4190,5190,6130,8070,10010), // E信越-K北九州'EK'=>N36
		'N39' => array(1440,1730,2000,2710,2950,4010,4480,5540,6600,8710,10780), // E信越-L南九州'EL'=>N39
		'N58' => array(1914,3520,4686,7579,10560,15400,17820,22660,27500,37180,46860) // E信越-M沖縄  'EM'=>N58
*/
// // 東海から//////////////////////////////( 60,80,100,140,160,180,200,220,240,260   ) サイズ、契約なし、２０２４年８月、税込
/*
		'N46' => array(1570,1840,2130,2830,3090,4770,5360,6720,8070,10780,13480), // F東海-A北海道'AF'=>N46
		'N30' => array(1180,1470,1740,2440,2700,3770,4130,5130,6070,7950,9830), // F東海-B北東北'BF'=>N30
		'N18' => array(1040,1340,1630,2310,2570,3420,3770,4600,5420,7070,8710), // F東海-C南東北'CF'=>N18
		'N08' => array(910,1220,1520,2180,2440,3360,3660,4480,5240,6830,8420), // F東海-D関東  'DF'=>N08
		'N06' => array(910,1220,1520,2180,2440,2890,3130,3720,4360,5540,6770), // F東海-E信越  'EF'=>N06
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420), // F東海-F東海  'FF'=>N01
		'N03' => array(910,1220,1520,2180,2440,2770,2950,3480,4070,5240,6420), // F東海-G北陸  'FG'=>N03
		'N03' => array(910,1220,1520,2180,2440,2770,2950,3480,4070,5240,6420), // F東海-H関西  'FH'=>N03
		'N15' => array(1040,1340,1630,2310,2570,3130,3420,4130,4840,6240,7660), // F東海-I中国  'FI'=>N15
		'N22' => array(1180,1470,1740,2440,2700,3130,3420,4130,4840,6240,7660), // F東海-J四国  'FJ'=>N22
		'N24' => array(1180,1470,1740,2440,2700,3360,3660,4420,5240,6770,8360), // F東海-K北九州'FK'=>N24
		'N28' => array(1180,1470,1740,2440,2700,3710,4130,5070,5950,7830,9720), // F東海-L南九州'FL'=>N28
		'N56' => array(1914,3080,5016,7260,9493,14333,16753,21593,26433,36113,45793) // F東海-M沖縄  'FM'=>N56
*/
// // 北陸から//////////////////////////////( 60,80,100,140,160,180,200,220,240,260   ) サイズ、契約なし、２０２４年８月、税込
/*
		'N46' => array(1570,1840,2130,2830,3090,4770,5360,6720,8070,10780,13480), // G北陸-A北海道'AG'=>N46
		'N30' => array(1180,1470,1740,2440,2700,3770,4130,5130,6070,7950,9830), // G北陸-B北東北'BG'=>N30
		'N18' => array(1040,1340,1630,2310,2570,3420,3770,4600,5420,7070,8710), // G北陸-C南東北'CG'=>N18
		'N08' => array(910,1220,1520,2180,2440,3360,3660,4480,5240,6830,8420), // G北陸-D関東  'DG'=>N08
		'N06' => array(910,1220,1520,2180,2440,2890,3130,3720,4360,5540,6770), // G北陸-E信越  'EG'=>N06
		'N03' => array(910,1220,1520,2180,2440,2770,2950,3480,4070,5240,6420), // G北陸-F東海  'FG'=>N03
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420), // G北陸-G北陸  'GG'=>N01
		'N02' => array(910,1220,1520,2180,2440,2710,2890,3480,4070,5240,6420), // G北陸-H関西  'GH'=>N02
		'N16' => array(1040,1340,1630,2310,2570,3240,3540,4250,5010,6490,7950), // G北陸-I中国  'GI'=>N16
		'N23' => array(1180,1470,1740,2440,2700,3240,3540,4250,5010,6490,7950), // G北陸-J四国  'GJ'=>N23
		'N25' => array(1180,1470,1740,2440,2700,3420,3770,4540,5360,7010,8660), // G北陸-K北九州'GK'=>N25
		'N29' => array(1180,1470,1740,2440,2700,3710,4130,5070,6010,7890,9770), // G北陸-L南九州'GL'=>N29
		'N56' => array(1914,3080,5016,7260,9493,14333,16753,21593,26433,36113,45793) // G北陸-M沖縄  'GM'=>N56
*/
// // 関西から//////////////////////////////( 60,80,100,140,160,180,200,220,240,260   ) サイズ、契約なし、２０２４年８月、税込
/*
		'N51' => array(1820,2100,2350,3090,3340,4890,5480,6900,8300,11070,13890), // H関西-A北海道'AH'=>N51
		'N34' => array(1300,1590,1880,2570,2830,4130,4600,5720,6830,9070,11250), // H関西-B北東北'BH'=>N34
		'N28' => array(1180,1470,1740,2440,2700,3710,4130,5070,5950,7830,9720), // H関西-C南東北'CH'=>N28
		'N17' => array(1040,1340,1630,2310,2570,3360,3660,4480,5240,6830,8420), // H関西-D関東  'DH'=>N17
		'N12' => array(1040,1340,1630,2310,2570,2950,3190,3830,4480,5770,7010), // H関西-E信越  'EH'=>N12
		'N03' => array(910,1220,1520,2180,2440,2770,2950,3480,4070,5240,6420), // H関西-F東海  'FH'=>N03
		'N02' => array(910,1220,1520,2180,2440,2710,2890,3480,4070,5240,6420), // H関西-G北陸  'GH'=>N02
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420), // H関西-H関西  'HH'=>N01
		'N04' => array(910,1220,1520,2180,2440,2830,3010,3600,4120,5300,6420), // H関西-I中国  'HI'=>N04
		'N11' => array(1040,1340,1630,2310,2570,2830,3010,3600,4180,5360,6540), // H関西-J四国  'HJ'=>N11
		'N14' => array(1040,1340,1630,2310,2570,3130,3360,4070,4710,6130,7480), // H関西-K北九州'HK'=>N14
		'N20' => array(1040,1340,1630,2310,2570,3480,3830,4730,5540,7240,8950), // H関西-L南九州'HL'=>N20
		'N55' => array(1914,2662,3949,6083,8426,13266,15686,20526,25366,35046,44726) // H関西-M沖縄  'HM'=>N55
*/
// // 中国から//////////////////////////////( 60,80,100,140,160,180,200,220,240,260   ) サイズ、契約なし、２０２４年８月、税込
/*
		'N59' => array(1950,2220,2480,3220,3480,5420,6130,7720,9300,12540,15780), // I中国-A北海道'AI'=>N59
		'N42' => array(1440,1730,2000,2710,2950,4360,4840,6070,7240,9600,12010), // I中国-B北東北'BI'=>N42
		'N37' => array(1440,1730,2000,2710,2950,3960,4360,5420,6420,8480,10540), // I中国-C南東北'CI'=>N37
		'N27' => array(1180,1470,1740,2440,2700,3660,4010,4890,5830,7600,9420), // I中国-D関東  'DI'=>N27
		'N26' => array(1180,1470,1740,2440,2700,3480,3830,4660,5480,7180,8830), // I中国-E信越  'EI'=>N26
		'N15' => array(1040,1340,1630,2310,2570,3130,3420,4130,4840,6240,7660), // I中国-F東海  'FI'=>N15
		'N16' => array(1040,1340,1630,2310,2570,3240,3540,4250,5010,6490,7950), // I中国-G北陸  'GI'=>N16
		'N04' => array(910,1220,1520,2180,2440,2830,3010,3600,4120,5300,6420), // I中国-H関西  'HI'=>N04
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420), // I中国-I中国  'II'=>N01
		'N10' => array(1040,1340,1630,2310,2570,2710,3010,3600,4180,5360,6540), // I中国-J四国  'IJ'=>N10
		'N05' => array(910,1220,1520,2180,2440,2830,3080,3600,4180,5360,6540), // I中国-K北九州'IK'=>N05
		'N07' => array(910,1220,1520,2180,2440,3240,3540,4300,5070,6540,8070), // I中国-L南九州'IL'=>N07
		'N57' => array(1914,3201,4587,6083,7898,12738,15158,19998,24838,34518,44198) // I中国-M沖縄  'IM'=>N57
*/
// // 四国から//////////////////////////////( 60,80,100,140,160,180,200,220,240,260   ) サイズ、契約なし、２０２４年８月、税込
/*
		'N60' => array(2070,2350,2600,3340,3610,5420,6130,7780,9360,12600,15840), // J四国-A北海道'AJ'=>N60
		'N45' => array(1570,1840,2130,2830,3090,4360,4840,6070,7240,9600,12010), // J四国-B北東北'BJ'=>N45
		'N44' => array(1570,1840,2130,2830,3090,3960,4360,5420,6420,8480,10540), // J四国-C南東北'CJ'=>N44
		'N33' => array(1300,1590,1880,2570,2830,3660,4010,4890,5830,7600,9420), // J四国-D関東  'DJ'=>N33
		'N32' => array(1300,1590,1880,2570,2830,3480,3830,4660,5480,7180,8830), // J四国-E信越  'EJ'=>N32
		'N22' => array(1180,1470,1740,2440,2700,3130,3420,4130,4840,6240,7660), // J四国-F東海  'FJ'=>N22
		'N23' => array(1180,1470,1740,2440,2700,3240,3540,4250,5010,6490,7950), // J四国-G北陸  'GJ'=>N23
		'N11' => array(1040,1340,1630,2310,2570,2830,3010,3600,4180,5360,6540), // J四国-H関西  'HJ'=>N11
		'N10' => array(1040,1340,1630,2310,2570,2710,3010,3600,4180,5360,6540), // J四国-I中国  'IJ'=>N10
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420), // J四国-J四国  'JJ'=>N01
		'N13' => array(1040,1340,1630,2310,2570,3010,3240,3890,4540,5770,7070), // J四国-K北九州'JK'=>N13
		'N19' => array(1040,1340,1630,2310,2570,3480,3770,4600,5420,7070,8770), // J四国-L南九州'JL'=>N19
		'N54' => array(1914,2981,4158,5654,7359,12199,14619,19459,24299,33979,43659) // J四国-M沖縄  'JM'=>N54
*/
// // 北九州から//////////////////////////////( 60,80,100,140,160,180,200,220,240,260   ) サイズ、契約なし、２０２４年８月、税込
/*
		'N61' => array(2210,2480,2720,3480,3750,5720,6490,8190,9900,13360,16780), // K北九州-A北海道'AK'=>N61
		'N48' => array(1700,1960,2240,2950,3210,4840,5420,6780,8140,11070,13720), // K北九州-B北東北'BK'=>N48
		'N47' => array(1700,1960,2240,2950,3210,4300,4840,6010,7130,9480,11830), // K北九州-C南東北'CK'=>N47
		'N38' => array(1440,1730,2000,2710,2950,3890,4300,5360,6360,8360,10360), // K北九州-D関東  'DK'=>N38
		'N36' => array(1440,1730,2000,2710,2950,3770,4190,5190,6130,8070,10010), // K北九州-E信越  'EK'=>N36
		'N24' => array(1180,1470,1740,2440,2700,3360,3660,4420,5240,6770,8360), // K北九州-F東海  'FK'=>N24
		'N25' => array(1180,1470,1740,2440,2700,3420,3770,4540,5360,7010,8660), // K北九州-G北陸  'GK'=>N25
		'N14' => array(1040,1340,1630,2310,2570,3130,3360,4070,4710,6130,7480), // K北九州-H関西  'HK'=>N14
		'N05' => array(910,1220,1520,2180,2440,2830,3080,3600,4180,5360,6540), // K北九州-I中国  'IK'=>N05
		'N13' => array(1040,1340,1630,2310,2570,3010,3240,3890,4540,5770,7070), // K北九州-J四国  'JK'=>N13
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420), // K北九州-K北九州'KK'=>N01
		'N02' => array(910,1220,1520,2180,2440,2710,2890,3480,4070,5240,6420), // K北九州-L南九州'KL'=>N02
		'N53' => array(1914,2233,3201,4807,6512,11352,13772,18612,23452,33132,42812) // K北九州-M沖縄  'KM'=>N53
*/
// // 南九州から//////////////////////////////( 60,80,100,140,160,180,200,220,240,260   ) サイズ、契約なし、２０２４年８月、税込
/*
		'N62' => array(2210,2480,2720,3480,3750,5950,6780,8600,10420,14080,17720), // L南九州-A北海道'AL'=>N62
		'N50' => array(1700,1960,2240,2950,3210,5130,5780,7780,8770,11770,15360), // L南九州-B北東北'BL'=>N50
		'N49' => array(1700,1960,2240,2950,3210,4840,5480,6840,8250,11010,13780), // L南九州-C南東北'CL'=>N49
		'N40' => array(1440,1730,2000,2710,2950,4240,4730,5890,7010,9300,11600), // L南九州-D関東  'DL'=>N40
		'N39' => array(1440,1730,2000,2710,2950,4010,4480,5540,6600,8710,10780), // L南九州-E信越  'EL'=>N39
		'N28' => array(1180,1470,1740,2440,2700,3710,4130,5070,5950,7830,9720), // L南九州-F東海  'FL'=>N28
		'N29' => array(1180,1470,1740,2440,2700,3710,4130,5070,6010,7890,9770), // L南九州-G北陸  'GL'=>N29
		'N20' => array(1040,1340,1630,2310,2570,3480,3830,4730,5540,7240,8950), // L南九州-H関西  'HL'=>N20
		'N07' => array(910,1220,1520,2180,2440,3240,3540,4300,5070,6540,8070), // L南九州-I中国  'IL'=>N07
		'N19' => array(1040,1340,1630,2310,2570,3480,3770,4600,5420,7070,8770), // L南九州-J四国  'JL'=>N19
		'N02' => array(910,1220,1520,2180,2440,2710,2890,3480,4070,5240,6420), // K北九州-L南九州'KL'=>N02
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420), // L南九州-L南九州'LL'=>N01
		'N52' => array(1914,2233,3201,4587,6083,10923,13343,18183,23023,32703,42383) // L南九州-M沖縄  'LM'=>N52
*/
// // 沖縄から//////////////////////////////( 60,80,100,140,160,180,200,220,240,260   ) サイズ、契約なし、２０２４年８月、税込
/*
		'N65' => array(2552,4807,7579,11220,14740,19580,22000,26840,31680,41360,51040), // M沖縄-A北海道'AM'=>N65
		'N64' => array(2442,4158,6292,9185,12595,17435,19855,24695,29535,39215,48895), // M沖縄-B北東北'BM'=>N64
		'N63' => array(2442,3839,5753,8965,12067,16907,19327,24167,29007,38687,48367), // M沖縄-C南東北'CM'=>N63
		'N58' => array(1914,3520,4686,7579,10560,15400,17820,22660,27500,37180,46860), // M沖縄-D関東  'DM'=>N58
		'N58' => array(1914,3520,4686,7579,10560,15400,17820,22660,27500,37180,46860), // M沖縄-E信越  'EM'=>N58
		'N56' => array(1914,3080,5016,7260,9493,14333,16753,21593,26433,36113,45793), // M沖縄-F東海  'FM'=>N56
		'N56' => array(1914,3080,5016,7260,9493,14333,16753,21593,26433,36113,45793), // M沖縄-G北陸  'GM'=>N56
		'N55' => array(1914,2662,3949,6083,8426,13266,15686,20526,25366,35046,44726), // M沖縄-H関西  'HM'=>N55
		'N57' => array(1914,3201,4587,6083,7898,12738,15158,19998,24838,34518,44198), // M沖縄-I中国  'IM'=>N57
		'N54' => array(1914,2981,4158,5654,7359,12199,14619,19459,24299,33979,43659), // M沖縄-J四国  'JM'=>N54
		'N53' => array(1914,2233,3201,4807,6512,11352,13772,18612,23452,33132,42812), // M沖縄-K北九州'KM'=>N53
		'N52' => array(1914,2233,3201,4587,6083,10923,13343,18183,23023,32703,42383), // M沖縄-L南九州'LM'=>N52
		'N01' => array(910,1220,1520,2180,2440,2600,2890,3480,4070,5240,6420) // M沖縄-M沖縄  'MM'=>N01
*/
        );   
        // 地帯 - 地帯間の価格ランク
		// Zone - Price rank between zones
        $a_dist_to_rank = array(

/*北海道 A*/  'AA'=>'N01',
/*北東北 B*/  'AB'=>'N31','BB'=>'N01',
/*南東北 C*/  'AC'=>'N35','BC'=>'N01','CC'=>'N01',
/*  関東 D*/  'AD'=>'N41','BD'=>'N21','CD'=>'N09','DD'=>'N01',
/*  信越 E*/  'AE'=>'N43','BE'=>'N21','CE'=>'N09','DE'=>'N08','EE'=>'N01',
/*  東海 F*/  'AF'=>'N46','BF'=>'N30','CF'=>'N18','DF'=>'N08','EF'=>'N06','FF'=>'N01',
/*  北陸 G*/  'AG'=>'N46','BG'=>'N30','CG'=>'N18','DG'=>'N08','EG'=>'N06','FG'=>'N03','GG'=>'N01',
/*  関西 H*/  'AH'=>'N51','BH'=>'N34','CH'=>'N28','DH'=>'N17','EH'=>'N12','FH'=>'N03','GH'=>'N02','HH'=>'N01',
/*  中国 I*/  'AI'=>'N59','BI'=>'N42','CI'=>'N37','DI'=>'N27','EI'=>'N26','FI'=>'N15','GI'=>'N16','HI'=>'N04','II'=>'N01',
/*  四国 J*/  'AJ'=>'N60','BJ'=>'N45','CJ'=>'N44','DJ'=>'N33','EJ'=>'N32','FJ'=>'N22','GJ'=>'N23','HJ'=>'N11','IJ'=>'N10','JJ'=>'N01',
/*北九州 K*/  'AK'=>'N61','BK'=>'N48','CK'=>'N47','DK'=>'N38','EK'=>'N36','FK'=>'N24','GK'=>'N25','HK'=>'N14','IK'=>'N05','JK'=>'N13','KK'=>'N01',
/*南九州 L*/  'AL'=>'N62','BL'=>'N50','CL'=>'N49','DL'=>'N40','EL'=>'N39','FL'=>'N28','GL'=>'N29','HL'=>'N20','IL'=>'N07','JL'=>'N19','KL'=>'N02','LL'=>'N01',
/*  沖縄 M*/  'AM'=>'N65','BM'=>'N64','CM'=>'N63','DM'=>'N58','EM'=>'N58','FM'=>'N56','GM'=>'N56','HM'=>'N55','IM'=>'N57','JM'=>'N54','KM'=>'N53','LM'=>'N52','MM'=>'N01'
//  ---------------------------------------------------------------------------------------------------------------------------------------------------------------------
//           | A 北海道  | B 北東北  | C 南東北  | D 関東    | E 信越    | F 東海    | G 北陸    | H 関西    | I 中国    | J 四国    | K 北九州 |  L 南九州  |  M 沖縄   |

        );

        $s_key = $this->GetDistKey();
        if ( $s_key ) {
            $s_rank = $a_dist_to_rank[$s_key];
            if ( $s_rank ) {
                $n_sizeclass = $this->GetSizeClass();
                if ($n_sizeclass < 0) {
                    $this->quote['error'] = MODULE_SHIPPING_SAGAWA_TEXT_OVERSIZE;
                } else {
                    $this->quote['cost'] = $a_pricerank[$s_rank][$n_sizeclass];
                }
              //$this->quote['DEBUG'] = ' zone=' . $this->OriginZone . '=>' . $this->DestZone   //DEBUG
              //              . ' cost=' . $a_pricerank[$s_rank][$n_sizeclass];           //DEBUG
            } else {
                $this->quote['error'] = MODULE_SHIPPING_SAGAWA_TEXT_OUT_OF_AREA . '(' . $s_key .')';
            }
        } else {
            $this->quote['error'] = MODULE_SHIPPING_SAGAWA_TEXT_ILLEGAL_ZONE . '(' . $this->OriginZone . '=>' . $this->DestZone . ')';
        }
        return $this->quote;
    }
}
?>
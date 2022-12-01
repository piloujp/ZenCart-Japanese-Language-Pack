<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
/*
  $Id: _sagawa.php 525 2009-03-26 08:10:32Z makiya $

  Sagawa Shipping Calculator.
  Calculate shipping costs.

  2002/03/29 written by TAMURA Toshihiko (tamura@bitscope.co.jp)
  2003/04/10 modified for ms1
  2004/02/27 modified for ZenCart by HISASUE Takahiro ( hisa@flatz.jp )
  2020/02/01 change price list by Bigmouse
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
    // 7    220サイズ 220cmまで 60kgまで
    // 8    240サイズ 240cmまで 70kgまで
    // 9    規格外  
    function GetSizeClass() {
        $a_classes = array(
            array(0,  60,  2),  // 区分,３辺計,重量
            array(1,  80,  5),
            array(2, 100, 10),
            array(3, 140, 20),
            array(4, 160, 30),
            array(5, 170, 50),
            array(6, 180, 60),
            array(7, 200, 80),
            array(8, 220, 100),
            array(9, 240, 140)
//            array(10, 260, 180),
//            array(11, 280, 230),
//            array(12, 300, 280),
//            array(13, 350, 450),
//            array(14, 400, 660)
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
      /*'北海道'=>'A',  
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
        '沖縄県'=>'M'   */
    '北海道'=>'J',  
		'青森県'=>'I',  
		'岩手県'=>'I',  
		'宮城県'=>'I',  
		'秋田県'=>'I',  
		'山形県'=>'I',  
		'福島県'=>'I',  
		'茨城県'=>'H',  
		'栃木県'=>'H',  
		'群馬県'=>'H',  
		'埼玉県'=>'H',  
		'千葉県'=>'H',  
		'東京都'=>'H',  
		'神奈川県'=>'H',  
		'新潟県'=>'F',  
		'富山県'=>'F',  
		'石川県'=>'F',  
		'福井県'=>'F',  
		'山梨県'=>'H',  
		'長野県'=>'G',  
		'岐阜県'=>'F',  
		'静岡県'=>'G',  
		'愛知県'=>'F',  
		'三重県'=>'F',  
		'滋賀県'=>'E',  
		'京都府'=>'E',  
		'大阪府'=>'E',  
		'兵庫県'=>'E',  
		'奈良県'=>'E',  
		'和歌山県'=>'E',  
		'鳥取県'=>'E',  
		'島根県'=>'E',  
		'岡山県'=>'D',  
		'広島県'=>'D',  
		'山口県'=>'D',  
		'徳島県'=>'C',  
		'香川県'=>'C',  
		'愛媛県'=>'C',  
		'高知県'=>'C',  
		'福岡県'=>'B',  
		'佐賀県'=>'B',  
		'長崎県'=>'B',  
		'熊本県'=>'B',  
		'大分県'=>'B',  
		'宮崎県'=>'B',  
		'鹿児島県'=>'B',  
		'沖縄県'=>'A'
        );
        return $a_zonemap[$zone];
    }

    function GetQuote() {
        // 距離別の価格ランク: ランクコード => 価格(60,80,100,140,160)
        /*
        $a_pricerank = array(
        'N01'=>array( 740,1000,1260,1530,1790), // 通常便(01) 近距離
        'N02'=>array( 840,1110,1370,1630,1890), // 通常便(02)   ↑
        'N03'=>array( 950,1210,1470,1740,2000), // 通常便(03)
        'N04'=>array(1050,1320,1580,1840,2100), // 通常便(04)
        'N05'=>array(1160,1420,1680,1950,2210), // 通常便(05)
        'N06'=>array(1260,1530,1790,2050,2310), // 通常便(06)
        'N07'=>array(1370,1630,1890,2160,2420), // 通常便(07)
        'N08'=>array(1470,1740,2000,2260,2520), // 通常便(08)
        'N09'=>array(1580,1840,2100,2370,2630), // 通常便(09)
        'N10'=>array(1680,1950,2210,2470,2730), // 通常便(10)   ↓
        'N11'=>array(1790,2050,2310,2580,2840)  // 通常便(11) 遠距離
        );
        2014/04～
        $a_pricerank = array(
        'N01'=>array( 756,1026,1296,1566,1836), // 通常便(01) 近距離
        'N02'=>array( 864,1134,1404,1674,1944), // 通常便(02)   ↑
        'N03'=>array( 972,1242,1512,1782,2052), // 通常便(03)
        'N04'=>array(1080,1350,1620,1890,2160), // 通常便(04)
        'N05'=>array(1188,1458,1728,1998,2268), // 通常便(05)
        'N06'=>array(1296,1566,1836,2106,2376), // 通常便(06)
        'N07'=>array(1404,1674,1944,2214,2484), // 通常便(07)
        'N08'=>array(1512,1782,2052,2322,2592), // 通常便(08)
        'N09'=>array(1620,1890,2160,2430,2700), // 通常便(09)
        'N10'=>array(1728,1998,2268,2538,2808), // 通常便(10)   ↓
        'N11'=>array(1836,2106,2376,2646,2916)  // 通常便(11) 遠距離
        );
    	//2020-02 修正
        $a_pricerank = array(
            'N01'=>array(770,1045,1386,1848,2068), // 通常便(01) 近距離
            'N02'=>array(880,1155,1496,1958,2178), // 通常便(02)   ↑
            'N03'=>array(990,1265,1606,2068,2288), // 通常便(03)
            'N04'=>array(1100,1375,1716,2178,2398), // 通常便(04)
            'N05'=>array(1210,1485,1826,2288,2508), // 通常便(05)
            'N06'=>array(1320,1595,1936,2398,2618), // 通常便(06)
            'N07'=>array(1430,1705,2046,2508,2728), // 通常便(07)
            'N08'=>array(1540,1815,2156,2618,2838), // 通常便(08)
            'N09'=>array(1650,1925,2266,2728,2948), // 通常便(09)
            'N10'=>array(1760,2035,2376,2838,3058), // 通常便(10)   ↓
            'N11'=>array(1870,2145,2486,2948,3168)  // 通常便(11) 遠距離
            );
        // 地帯 - 地帯間の価格ランク
        // (参照) http://www.sagawa-exp.co.jp/business/budjetserch-j.html
        $a_dist_to_rank = array(
        'AA'=>'N01',
        'AB'=>'N03','BB'=>'N01',
        'AC'=>'N04','BC'=>'N01','CC'=>'N01',
        'AD'=>'N05','BD'=>'N02','CD'=>'N01','DD'=>'N01',
        'AE'=>'N05','BE'=>'N02','CE'=>'N01','DE'=>'N01','EE'=>'N01',
        'AF'=>'N06','BF'=>'N03','CF'=>'N02','DF'=>'N01','EF'=>'N01','FF'=>'N01',
        'AG'=>'N06','BG'=>'N03','CG'=>'N02','DG'=>'N01','EG'=>'N01','FG'=>'N01','GG'=>'N01',
        'AH'=>'N08','BH'=>'N04','CH'=>'N03','DH'=>'N02','EH'=>'N02','FH'=>'N01','GH'=>'N01','HH'=>'N01',
        'AI'=>'N09','BI'=>'N05','CI'=>'N05','DI'=>'N03','EI'=>'N03','FI'=>'N02','GI'=>'N02','HI'=>'N01','II'=>'N01',
        'AJ'=>'N10','BJ'=>'N06','CJ'=>'N06','DJ'=>'N04','EJ'=>'N04','FJ'=>'N03','GJ'=>'N03','HJ'=>'N02','IJ'=>'N02','JJ'=>'N01',
        'AK'=>'N11','BK'=>'N07','CK'=>'N07','DK'=>'N05','EK'=>'N05','FK'=>'N03','GK'=>'N03','HK'=>'N02','IK'=>'N01','JK'=>'N02','KK'=>'N01',
        'AL'=>'N11','BL'=>'N07','CL'=>'N07','DL'=>'N05','EL'=>'N05','FL'=>'N03','GL'=>'N03','HL'=>'N02','IL'=>'N01','JL'=>'N02','KL'=>'N01','LL'=>'N01',
        'AM'=>'',   'BM'=>'',   'CM'=>'',   'DM'=>'',   'EM'=>'',   'FM'=>'',   'GM'=>'',   'HM'=>'',   'IM'=>'',   'JM'=>'',   'KM'=>'',   'LM'=>'',   'MM'=>''
        );
                
        // 距離別の価格ランク: ランクコード => 価格(60,80,100,140,160,180,200,220,240)
        $a_pricerank = array(
        'N01'=>array(400,400,400,500,600,1100,1350,1850,2350,3350,4350,5600,6850,11100,16350), // 通常便(01)  近距離
        'N02'=>array(650,750,950,1280,1630,2130,2380,2880,3380,4380,5380,6630,7880,12130,17380), // 通常便(02)   ↑
        'N03'=>array(670,800,1050,1510,1980,2480,2730,3230,3730,4730,5730,6980,8230,12480,17730), // 通常便(03)
        'N04'=>array(670,800,1050,1680,1930,2430,2680,3180,3680,4680,5680,6930,8180,12430,17680), // 通常便(04)
        'N05'=>array(690,860,1130,1680,2210,2710,2960,3460,3960,4960,5960,7210,8460,12710,17910), // 通常便(05)
        'N06'=>array(690,860,1190,1810,2430,2930,3180,3680,4180,5180,6180,7430,8680,12930,18180), // 通常便(06)
        'N07'=>array(690,840,1110,1670,2200,2700,2950,3450,3950,4950,5950,7200,8450,12700,17950), // 通常便(07)
        'N08'=>array(700,890,1190,1810,2430,2930,3180,3680,4180,5180,6180,7430,8680,12930,18180), // 通常便(08)  ↓
        'N09'=>array(720,940,1340,2050,2790,3290,3540,4040,4540,5540,6540,7790,9040,13290,18540) // 通常便(09) 遠距離
        );
        */
        // 距離別の価格ランク: ランクコード => 価格(60,80,100,140,160,180,200,220) 2018-04-01
        $a_pricerank = array(
        'N01'=>array(500,600,700,800,1200,2200,2450,2950,3450), // 通常便(01)  近距離
        'N02'=>array(700,800,1000,1330,1680,2200,2450,2950,3450), // 通常便(02)   ↑
        'N03'=>array(700,800,1000,1330,1680,2300,2450,2950,3450), // 通常便(03)     
        'N04'=>array(720,850,1100,1560,1880,2750,3000,3650,4300), // 通常便(04)
        'N05'=>array(720,850,1100,1560,1980,2950,3250,4000,4700), // 通常便(05)
        'N06'=>array(740,910,1180,1730,2080,3150,3500,4300,5100), // 通常便(06)
        'N07'=>array(740,910,1240,1860,2280,3400,3800,4700,5600), // 通常便(07)
        'N08'=>array(740,890,1160,1720,2250,3600,4000,5000,5950), // 通常便(08)
        'N09'=>array(750,940,1240,1860,2480,4100,4650,5800,7000), // 通常便(09)  ↓
        'N10'=>array(770,990,1390,2100,2840,5050,5750,7300,8850) // 通常便(10) 遠距離
        );   
        // 地帯 - 地帯間の価格ランク
        // (参照) http://www.sagawa-exp.co.jp/business/budjetserch-j.html
        $a_dist_to_rank = array(
        'AA'=>'N01',
        'AB'=>'N02',
        'AC'=>'N03',
        'AD'=>'N04',
        'AE'=>'N05',
        'AF'=>'N06',
        'AG'=>'N07',
        'AH'=>'N08',
        'AI'=>'N09',
        'AJ'=>'N10'
        );

        $s_key = $this->GetDistKey();
        if ( $s_key ) {
            $s_rank = $a_dist_to_rank[$s_key];
            if ( $s_rank ) {
                $n_sizeclass = $this->GetSizeClass();
                if ($n_sizeclass < 0) {
                    $this->quote['error'] = MODULE_SHIPPING_SAGAWA_TEXT_OVERSIZE;
                } else {
                    $this->quote['cost'] = $a_pricerank[$s_rank][$n_sizeclass]*1.10; //VTA TAX
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

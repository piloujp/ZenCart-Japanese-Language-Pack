<?php
/*
  $Id: _jpparcel.php,v 1.0 2004/06/17 11:28:46 ptosh Exp $

  Japanese Postal Service Shipping Calculator.
  Calculate shipping costs.

  2004/06/17 written by TAMURA Toshihiko (tamura@bitscope.co.jp)
  2006/01/20 mod. for Zen-Cart by Tackmix(master@tackmix.com)
  2008/03/24 add. by kimono(maeda@obitastar.co.jp)
  2023/01/03 modified and updated for Zen Cart v1.5.8 by pilou2

 */
/*
(適応するサービス)
以下の種別に対応して料金を計算する。
-----------------------------------------------
種別                               id
-----------------------------------------------
小形包装物:航空便                  jpparcelairs
小形包装物:船便                    jpparcelseas
国際eパケット                        jpparcelepack
小包郵便物:航空小包                jpparcelair
小包郵便物:船便小包                jpparcelsea
国際スピード郵便(EMS)                jpparcelems
-----------------------------------------------

(使用方法)
    $parcel = new _JpParcel('jpparcelair','航空小包');
    $parcel->SetDest('US');     // アメリカ合衆国まで
    $parcel->SetWeight(10);     // kg
    $quote = $parcel->GetQuote();
    print $quote['title']."(". $quote['id'] . "): cost=" . $quote['cost'] . "<br>\n";
*/
if ( !defined('JPPARCEL') ) {
  define('JPPARCEL', 1);

class _JpParcel {
    public $quote;
    public $DestCountryCode = NULL;
    public $Weight = 0;
    public $Areas = array(
/*	第1地帯  */ 'easia1' => array('CN','TW','KR'),
/* 東アジア   */ 'easia2'   =>array('HK','PH','MO','MN'),
/* 西太平洋   */ 'wpacific'=>array('GU','MP','AS','VI'),
/* 東南アジア */ 'seasia'  =>array('SG','TH','MY','VN','ID','KH','BN','MM','LA'),
/* 西南アジア */ 'swasia'  =>array('IN','LK','NP','PK','BD','BT','MV'),
/* オセアニア */ 'oceania' =>array('AU','CK','SB','NZ','NC','PG','FJ'),
/* 中近東     */ 'mneast'  =>array('AE','IL','IQ','IR','OM','QA','KW','SA','SY','TR','BH','JO','LB'),
/* ヨーロッパ */ 'europe'  =>array('IS','IE','AZ','AD','IT','UA','GB','EE','AT','NL','GG','MK','CY','GR','HR','SM','GE','CH',
                                   'SE','ES','SK','SI','CZ','DK','DE','NO','HU','FI','FR','BY',
                                   'BE','BG','PL','PT','MK','MT','LV','LT','LI','LU','RO','RU'),
/* 北米       */ 'namerica'=>array('CA','PM','MX'),
/* USA       */ 'america'=>array('US'),
/* 中米       */ 'camerica'=>array('SV','BL','MF','CU','CR','JM','TT','PA','BB','HN','PR'),
/* 南米       */ 'samerica'=>array('AR','UY','EC','SV','CO','CL','PY','BR','VE','PE'),
/* アフリカ   */ 'africa'  =>array('DZ','UG','EG','ET','GH','GA','KE','CI','SL','DJ','ZW','SD','SN',
                                   'TZ','TN','TG','NG','BW','MG','ZA','MU','MA','RW','RE'),
    );
    // 小包郵便物の価格ランク: (最大重量(kg),第1地帯,第2地帯,第3地帯,第4地帯)
    public $a_price_parcel = array(
    // 小形包装物:航空便 06-2022
    'jpparcelairs'=>array(
      array(0.1, 350, 480, 510, 750),// 0.1kg以下,第1,第2,第3,第4地帯
      array(0.2, 450, 600, 680, 880),
      array(0.3, 550, 720, 850, 1010),
      array(0.4, 650, 840, 1020, 1140),
      array(0.5, 750, 960, 1190, 1270),
      array(0.6, 850, 1080, 1360, 1400),
      array(0.7, 950, 1200, 1530, 1530),
      array(0.8, 1050, 1320, 1700, 1660),
      array(0.9, 1150, 1440, 1870, 1790),
      array(1.0, 1250, 1560, 2040, 1920),
      array(1.1, 1350, 1680, 2210, 2050),
      array(1.2, 1450, 1800, 2380, 2180),
      array(1.3, 1550, 1920, 2550, 2310),
      array(1.4, 1650, 2040, 2720, 2440),
      array(1.5, 1750, 2160, 2890, 2570),
      array(1.6, 1850, 2280, 3060, 2700),
      array(1.7, 1950, 2400, 3230, 2830),
      array(1.8, 2050, 2520, 3400, 2960),
      array(1.9, 2150, 2640, 3570, 3090),
      array(2.0, 2250, 2760, 3740, 3220),
      ),
    // 小形包装物:船便 06-2022
    'jpparcelseas'=>array(
      array(0.10, 480, 480, 480, 480),// 0.1kg以下,第1,第2,第3,第4地帯
      array(0.25, 570, 570, 570, 570),
      array(0.50, 720, 720, 720, 720),
      array(1.00,1010,1010,1010,1010),
      array(2.00,1600,1600,1600,1600),
      ),
    // 国際eパケット 06-2022
    'jpparcelepack'=>array(
      array(0.1, 690, 790, 820, 1150),// 0.1kg以下,第1,第2,第3,第4地帯
      array(0.2, 780, 910, 1000, 1280),
      array(0.3, 870, 1030, 1180, 1410),
      array(0.4, 960, 1150, 1360, 1540),
      array(0.5, 1050, 1270, 1540, 1670),
      array(0.6, 1140, 1390, 1720, 1800),
      array(0.7, 1230, 1510, 1900, 1930),
      array(0.8, 1320, 1630, 2080, 2060),
      array(0.9, 1410, 1750, 2260, 2190),
      array(1.0, 1500, 1870, 2440, 2320),
      array(1.1, 1590, 1990, 2620, 2450),
      array(1.2, 1680, 2110, 2800, 2580),
      array(1.3, 1770, 2230, 2980, 2710),
      array(1.4, 1860, 2350, 3160, 2840),
      array(1.5, 1950, 2470, 3340, 2970),
      array(1.6, 2040, 2590, 3520, 3100),
      array(1.7, 2130, 2710, 3700, 3230),
      array(1.8, 2220, 2830, 3880, 3360),
      array(1.9, 2310, 2950, 4060, 3490),
      array(2.0, 2400, 3070, 4240, 3620),
      ),
    // 小包郵便物:航空小包 06-2022
    'jpparcelair'=>array(
      array( 1, 2050, 2500, 3850, 4200, 4550),// 1kg以下,第1,第2,第3,第4,第5地帯
      array( 2, 2750, 3700, 6000, 6700, 7250),
      array( 3, 3450, 4900, 8150, 9200, 9950),
      array( 4, 4150, 6100, 10300, 11700, 12650),
      array( 5, 4850, 7300, 12450, 14200, 15350),
      array( 6, 5550, 8500, 14600, 16700, 18050),
      array( 7, 6250, 9700, 16750, 19200, 20750),
      array( 8, 6950, 10900, 18900, 21700, 23450),
      array( 9, 7650, 12100, 21050, 24200, 26150),
      array(10, 8350, 13300, 23200, 26700, 28850),
      array(11, 8850, 13950, 24800, 28700, 30650),
      array(12, 9350, 14600, 26400, 30700, 32450),
      array(13, 9850, 15250, 28000, 32700, 34250),
      array(14, 10350, 15900, 29600, 34700, 36050),
      array(15, 10850, 16550, 31200, 36700, 37850),
      array(16, 11350, 17200, 32800, 38700, 39650),
      array(17, 11850, 17850, 34400, 40700, 41450),
      array(18, 12350, 18500, 36000, 42700, 43250),
      array(19, 12850, 19150, 37600, 44700, 45050),
      array(20, 13350, 19800, 39200, 46700, 46850),
      array(21, 13850, 20450, 40800, 48700, 48650),
      array(22, 14350, 21100, 42400, 50700, 50450),
      array(23, 14850, 21750, 44000, 52700, 52250),
      array(24, 15350, 22400, 45600, 54700, 54050),
      array(25, 15850, 23050, 47200, 56700, 55850),
      array(26, 16350, 23700, 48800, 58700, 57650),
      array(27, 16850, 24350, 50400, 60700, 59450),
      array(28, 17350, 25000, 52000, 62700, 61250),
      array(29, 17850, 25650, 53600, 64700, 63050),
      array(30, 18350, 26300, 55200, 66700, 64850),
      ),
    // 小包郵便物:船便小包 06-2022
    'jpparcelsea'=>array(
      array( 1, 1800, 2100, 2500, 2600, 2700),// 1kg以下,第1,第2,第3,第4,第5地帯
      array( 2, 2200, 2600, 3100, 3300, 3400),
      array( 3, 2600, 3100, 3700, 4000, 4100),
      array( 4, 3000, 3600, 4300, 4700, 4800),
      array( 5, 3400, 4100, 4900, 5400, 5500),
      array( 6, 3800, 4600, 5500, 6100, 6200),
      array( 7, 4200, 5100, 6100, 6800, 6900),
      array( 8, 4600, 5600, 6700, 7500, 7600),
      array( 9, 5000, 6100, 7300, 8200, 8300),
      array(10, 5400, 6600, 7900, 8900, 9000),
      array(11, 5800, 7000, 8300, 9500, 9600),
      array(12, 6200, 7400, 8700, 10100, 10200),
      array(13, 6600, 7800, 9100, 10700, 10800),
      array(14, 7000, 8200, 9500, 11300, 11400),
      array(15, 7400, 8600, 9900, 11900, 12000),
      array(16, 7800, 9000, 10300, 12500, 12600),
      array(17, 8200, 9400, 10700, 13100, 13200),
      array(18, 8600, 9800, 11100, 13700, 13800),
      array(19, 9000, 10200, 11500, 14300, 14400),
      array(20, 9400, 10600, 11900, 14900, 15000),
      array(21, 9800, 11000, 12300, 15500, 15600),
      array(22, 10200, 11400, 12700, 16100, 16200),
      array(23, 10600, 11800, 13100, 16700, 16800),
      array(24, 11000, 12200, 13500, 17300, 17400),
      array(25, 11400, 12600, 13900, 17900, 18000),
      array(26, 11800, 13000, 14300, 18500, 18600),
      array(27, 12200, 13400, 14700, 19100, 19200),
      array(28, 12600, 13800, 15100, 19700, 19800),
      array(29, 13000, 14200, 15500, 20300, 20400),
      array(30, 13400, 14600, 15900, 20900, 21000),
      ),
	// 国際スピード郵便(EMS) 06-2022 extra charge zone 3 and 4
    'jpparcelems'=>array(
      array( 0.5, 1450, 1900, 3150, 3900, 3600),// 0.5kg以下,第1,第2,第3,第4,第5地帯
      array( 0.6, 1600, 2150, 3400, 4180, 3900),
      array( 0.7, 1750, 2400, 3650, 4460, 4200),
      array( 0.8, 1900, 2650, 3900, 4740, 4500),
      array( 0.9, 2050, 2900, 4150, 5020, 4800),
      array( 1.0, 2200, 3150, 4400, 5300, 5100),
      array( 1.25, 2500, 3500, 5000, 5990, 5850),
      array( 1.5, 2800, 3850, 5550, 6600, 6600),
      array( 1.75, 3100, 4200, 6150, 7290, 7350),
      array( 2.0, 3400, 4550, 6700, 7900, 8100),
      array( 2.5, 3900, 5150, 7750, 9100, 9600),
      array( 3.0, 4400, 5750, 8800, 10300, 11100),
      array( 3.5, 4900, 6350, 9850, 11500, 12600),
      array( 4.0, 5400, 6950, 10900, 12700, 14100),
      array( 4.5, 5900, 7550, 11950, 13900, 15600),
      array( 5.0, 6400, 8150, 13000, 15100, 17100),
      array( 5.5, 6900, 8750, 14050, 16300, 18600),
      array( 6.0, 7400, 9350, 15100, 17500, 20100),
      array( 7.0, 8200, 10350, 17200, 19900, 22500),
      array( 8.0, 9000, 11350, 19300, 22300, 24900),
      array( 9.0, 9800, 12350, 21400, 24700, 27300),
      array( 10.0, 10600, 13350, 23500, 27100, 29700),
      array( 11.0, 11400, 14350, 25600, 29500, 32100),
      array( 12.0, 12200, 15350, 27700, 31900, 34500),
      array( 13.0, 13000, 16350, 29800, 34300, 36900),
      array( 14.0, 13800, 17350, 31900, 36700, 39300),
      array( 15.0, 14600, 18350, 34000, 39100, 41700),
      array( 16.0, 15400, 19350, 36100, 41500, 44100),
      array( 17.0, 16200, 20350, 38200, 43900, 46500),
      array( 18.0, 17000, 21350, 40300, 46300, 48900),
      array( 19.0, 17800, 22350, 42400, 48700, 51300),
      array( 20.0, 18600, 23350, 44500, 51100, 53700),
      array( 21.0, 19400, 24350, 46600, 53500, 56100),
      array( 22.0, 20200, 25350, 48700, 55900, 58500),
      array( 23.0, 21000, 26350, 50800, 58300, 60900),
      array( 24.0, 21800, 27350, 52900, 60700, 63300),
      array( 25.0, 22600, 28350, 55000, 63100, 65700),
      array( 26.0, 23400, 29350, 57100, 65500, 68100),
      array( 27.0, 24200, 30350, 59200, 67900, 70500),
      array( 28.0, 25000, 31350, 61300, 70300, 72900),
      array( 29.0, 25800, 32350, 63400, 72700, 75300),
      array( 30.0, 26600, 33350, 65500, 75100, 77700),
      ),
    );

    // コンストラクタ
    // $id:   module id
    // $titl: module name
    // $country: country code
    function __construct($id, $title, $country = NULL) {
        $this->quote = array('id' => $id, 'title' => $title);
        $this->SetDest($country);
    }
    function SetDest($country) {
        if($country) {
            $this->DestCountryCode = $country;
        }
    }
    function SetWeight($weight) {
        $this->Weight = $weight;
    }
    // 国コードをエリア名に変換する
    // 国コードが見つからなければ空文字を返す
    function GetAreaName($contry_code) {
        foreach ($this->Areas as $areaname => $a_country) {
            if ( in_array($contry_code, $a_country) ) {
                return $areaname;
            }
        }
        return '';
    }
    // エリア名から地帯番号(1～4)に変換する
    // $areaname: エリア名
    function GetZoneNo($areaname) {
        $area_to_no = array();

        switch ($this->quote['id']) {
        case 'jpparcelairs':
        case 'jpparcelseas':
        case 'jpparcelepack':
          $area_to_no = array(
            'easia1'   =>1, //中国・韓国・台湾
            'easia2'   =>1, //東アジア
            'wpacific'=>4, //西太平洋
            'seasia'  =>2, //東南アジア
            'swasia'  =>2, //西南アジア
            'oceania' =>2, //オセアニア
            'mneast'  =>2, //中近東
            'europe'  =>2, //ヨーロッパ
            'namerica'=>2, //北米
            'camerica'=>2, //中米
			'america' =>4, //USA
            'samerica'=>3, //南米
            'africa'  =>3, //アフリカ
          );
          break;
        case 'jpparcelair':
        case 'jpparcelsea':
          $area_to_no = array(
            'easia1'   =>1, //中国・韓国・台湾
            'easia2'   =>2, //東アジア
            'wpacific'=>4, //西太平洋
            'seasia'  =>2, //東南アジア
            'swasia'  =>2, //西南アジア
            'oceania' =>3, //オセアニア
            'mneast'  =>3, //中近東
            'europe'  =>3, //ヨーロッパ
            'namerica'=>3, //北米
            'camerica'=>5, //中米
			'america' =>4, //USA
            'samerica'=>5, //南米
            'africa'  =>5, //アフリカ
          );
          break;
        case 'jpparcelems':
          $area_to_no = array(
            'easia1'   =>1, //中国・韓国・台湾
            'easia2'   =>2, //東アジア
            'wpacific'=>4, //西太平洋
            'seasia'  =>2, //東南アジア
            'swasia'  =>2, //西南アジア
            'oceania' =>3, //オセアニア
            'mneast'  =>3, //中近東
            'europe'  =>3, //ヨーロッパ
            'namerica'=>3, //北米
            'camerica'=>5, //中米
            'america' =>4, //USA
            'samerica'=>5, //南米
            'africa'  =>5, //アフリカ
          );
          break;
        }
        return $area_to_no[$areaname];
    }

    function GetQuote() {
        $this->quote['cost'] = 0;
        $areaname = $this->GetAreaName($this->DestCountryCode);
        if ( $areaname ) {
            $no = $this->GetZoneNo($areaname);
            if ( $no ) {
                // 価格ランク: (最大重量(kg),第1地帯,第2地帯,第3地帯,第4地帯,第5地帯)
                foreach($this->a_price_parcel[$this->quote['id']] as $a_set) {
                    if ($this->Weight <= $a_set[0]) {
                        $this->quote['cost'] = $a_set[$no];
                        break;
                    }
                }
                if (!$this->quote['cost']) {
                    $this->quote['error'] = MODULE_SHIPPING_JPPARCEL_TEXT_OVERSIZE;
                }
                // $this->quote['DEBUG'] = ' DestCountryCode=' . $this->DestCountryCode; //DEBUG
            } else {
				// 実際には起こらないはず
                $this->quote['error'] = MODULE_SHIPPING_JPPARCEL_TEXT_ILLEGAL_AREA . '(' . $this->DestCountryCode .')';
            }
        } else {
            $this->quote['error'] = MODULE_SHIPPING_JPPARCEL_TEXT_OUT_OF_AREA . '(' . $this->DestCountryCode . ')';
        }

        return $this->quote;
    }
}

}
?>

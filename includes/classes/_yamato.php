<?php
/*
 * Yamato Class.
 *
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: pilou2/piloujp 2024 Aug 24 Modified in v2.1.0-alpha1 $
 */

/*
	$rate = new _Yamato('yamato','通常便');
	$rate->SetOrigin('北海道', 'JP');   // 北海道から
	$rate->SetDest('東京都', 'JP');     // 東京都まで
	$rate->SetWeight(10);           // kg
	$quote = $rate->GetQuote();
	print $quote['type'] . "<br>";
	print $quote['cost'] . "\n";
*/
class _Yamato {
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
	// 3    120サイズ 120cmまで 15kgまで
	// 4    140サイズ 140cmまで 20kgまで
	// 5    160サイズ 160cmまで 25kgまで
	// 6    180サイズ 180cmまで 30kgまで
	// 7    200サイズ 200cmまで 30kgまで
	// 9    規格外
	function GetSizeClass() {
		$a_classes = array(
			array(0,  60,  2),  // 区分,３辺計,重量
			array(1,  80,  5),
			array(2, 100, 10),
			array(3, 120, 15),
			array(4, 140, 20),
			array(5, 160, 25),
			array(6, 180, 30),
			array(7, 200, 30)
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
		//  北陸  :'F' = 富山県,石川県,福井県
		//  中部  :'G' = 静岡県,愛知県,三重県,岐阜県
		//  関西  :'H' = 京都府,大阪府,滋賀県,奈良県,和歌山県,兵庫県
		//  中国  :'I' = 岡山県,広島県,山口県,鳥取県,島根県
		//  四国  :'J' = 香川県,徳島県,愛媛県,高知県
		//  九州  :'K' = 福岡県,佐賀県,長崎県,大分県,熊本県,宮崎県,鹿児島県
		//  沖縄  :'L' = 沖縄県
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
		'富山県'=>'F',
		'石川県'=>'F',
		'福井県'=>'F',
		'山梨県'=>'D',
		'長野県'=>'E',
		'岐阜県'=>'G',
		'静岡県'=>'G',
		'愛知県'=>'G',
		'三重県'=>'G',
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
		'熊本県'=>'K',
		'大分県'=>'K',
		'宮崎県'=>'K',
		'鹿児島県'=>'K',
		'沖縄県'=>'L'
		);
		return $a_zonemap[$zone];
	}

	function GetQuote() {
		// 距離別の価格ランク: ランクコード => 価格(60,80,100,120,140,160,180,200)
		// (参照) https://www.kuronekoyamato.co.jp/ytc/search/estimate/ichiran.html
		// 2023/10～
		$a_pricerank = array(
// ヤマト運輸との契約によりサイズや重さの制限が変わりますので、「 function GetSizeClass()」で調整が必要です。
// Size and weight restrictions vary depending on the contract with Yamato Transport, so you will need to adjust them in "function GetSizeClass()".
// 送信元の都道府県の行「/*...」と「*/...」を削除し、契約に合わせて料金を調整して下さい。
// Remove lines '/*...' and '*/...' for the prefecture you send from and adjust rates to your contract.


//   /////////////////////////// GetSizeClass array(  0,  1,  2,  3,  4,  5,  6,  7)
//   //  北海道から////////////////////////////////( 60, 80,100,120,140,160,180,200)サイズ
/*
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 北海道:A >北海道:A AA=>N01
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 北海道:A >北東北:B AB=>N03
		'N04' => array(1320,1610,1920,2240,2580,2900,4220,5320), // 北海道:A >南東北:C AC=>N04
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 北海道:A >  関東:D AD=>N06
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 北海道:A >  信越:E AE=>N06
		'N08' => array(1610,1900,2200,2520,2860,3180,5380,6700), // 北海道:A >  北陸:F AF=>N08
		'N08' => array(1610,1900,2200,2520,2860,3180,5380,6700), // 北海道:A >  中部:G AG=>N08
		'N12' => array(1920,2200,2510,2830,3170,3490,5690,7010), // 北海道:A >  関西:H AH=>N12
		'N14' => array(2070,2360,2670,2990,3330,3650,6180,7770), // 北海道:A >  中国:I AI=>N14
		'N14' => array(2070,2360,2670,2990,3330,3650,6180,7770), // 北海道:A >  四国:J AJ=>N14
		'N15' => array(2340,2620,2930,3250,3590,3910,6550,8140), // 北海道:A >  九州:K AK=>N15
		'N16' => array(2340,2950,3590,4240,4910,5560,9080,10730) // 北海道:A >  沖縄:L AL=>N16
*/
   
//   //  北東北から////////////////////////////////( 60, 80,100,120,140,160,180,200)サイズ
/*
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 北東北:B >北海道:A AB=>N03
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 北東北:B >北東北:B BB=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 北東北:B >南東北:C BC=>N01
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 北東北:B >  関東:D BD=>N02
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 北東北:B >  信越:E BE=>N02
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 北東北:B >  北陸:F BF=>N03
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 北東北:B >  中部:G BG=>N03
		'N04' => array(1320,1610,1920,2240,2580,2900,4220,5320), // 北東北:B >  関西:H BH=>N04
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 北東北:B >  中国:I BI=>N06
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 北東北:B >  四国:J BJ=>N06
		'N10' => array(1760,2050,2360,2680,3020,3340,5540,6860), // 北東北:B >  九州:K BK=>N10
		'N13' => array(1920,2530,3170,3820,4490,5140,8550,10200) // 北東北:B >  沖縄:L BL=>N13
*/

//   //  南東北から////////////////////////////////( 60, 80,100,120,140,160,180,200)サイズ   
/*
		'N04' => array(1320,1610,1920,2240,2580,2900,4220,5320), // 南東北:C >北海道:A AC=>N04
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 南東北:C >北東北:B BC=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 南東北:C >南東北:C CC=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 南東北:C >  関東:D CD=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 南東北:C >  信越:E CE=>N01
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 南東北:C >  北陸:F CF=>N02
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 南東北:C >  中部:G CG=>N02
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 南東北:C >  関西:H CH=>N03
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 南東北:C >  中国:I CI=>N06
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 南東北:C >  四国:J CJ=>N06
		'N10' => array(1760,2050,2360,2680,3020,3340,5540,6860), // 南東北:C >  九州:K CK=>N10
		'N11' => array(1760,2380,3020,3670,4340,4990,8290,9940) // 南東北:C >  沖縄:L CL=>N11
*/

//   //  関東から////////////////////////////////( 60, 80,100,120,140,160,180,200)サイズ
/*
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 関東:D >北海道:A AD=>N06
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 関東:D >北東北:B BD=>N02
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 関東:D >南東北:C CD=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 関東:D >  関東:D DD=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 関東:D >  信越:E DE=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 関東:D >  北陸:F DF=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 関東:D >  中部:G DG=>N01
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 関東:D >  関西:H DH=>N02
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 関東:D >  中国:I DI=>N03
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 関東:D >  四国:J DJ=>N03
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 関東:D >  九州:K DK=>N06
		'N07' => array(1460,2070,2710,3360,4030,4680,7210,8860) // 関東:D >  沖縄:L DL=>N07
*/
   
//   //  信越から////////////////////////////////( 60, 80,100,120,140,160,180,200)サイズ
/*
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 信越:E >北海道:A AE=>N06
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 信越:E >北東北:B BE=>N02
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 信越:E >南東北:C CE=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 信越:E >  関東:D DE=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 信越:E >  信越:E EE=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 信越:E >  北陸:F EF=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 信越:E >  中部:G EG=>N01
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 信越:E >  関西:H EH=>N02
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 信越:E >  中国:I EI=>N03
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 信越:E >  四国:J EJ=>N03
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 信越:E >  九州:K EK=>N06
		'N09' => array(1610,2230,2860,3510,4180,4830,8020,9670) // 信越:E >  沖縄:L EL=>N09
*/
   
//   //  北陸から////////////////////////////////( 60, 80,100,120,140,160,180,200)サイズ
/*
		'N08' => array(1610,1900,2200,2520,2860,3180,5380,6700), // 北陸:F >北海道:A AF=>N08
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 北陸:F >北東北:B BF=>N03
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 北陸:F >南東北:C CF=>N02
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 北陸:F >  関東:D DF=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 北陸:F >  信越:E EF=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 北陸:F >  北陸:F FF=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 北陸:F >  中部:G FG=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 北陸:F >  関西:H FH=>N01
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 北陸:F >  中国:I FI=>N02
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 北陸:F >  四国:J FJ=>N02
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 北陸:F >  九州:K FK=>N03
		'N09' => array(1610,2230,2860,3510,4180,4830,8020,9670) // 北陸:F >  沖縄:L FL=>N09
*/
   
//   //  中部から////////////////////////////////( 60, 80,100,120,140,160,180,200)サイズ
/*
		'N08' => array(1610,1900,2200,2520,2860,3180,5380,6700), // 中部:G >北海道:A AG=>N08
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 中部:G >北東北:B BG=>N03
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 中部:G >南東北:C CG=>N02
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 中部:G >  関東:D DG=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 中部:G >  信越:E EG=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 中部:G >  北陸:F FG=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 中部:G >  中部:G GG=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 中部:G >  関西:H GH=>N01
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 中部:G >  中国:I GI=>N02
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 中部:G >  四国:J GJ=>N02
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 中部:G >  九州:K GK=>N03
		'N07' => array(1460,2070,2710,3360,4030,4680,7210,8860) // 中部:G >  沖縄:L GL=>N07
*/
   
//   //  関西から////////////////////////////////( 60, 80,100,120,140,160,180,200)サイズ
/*
		'N12' => array(1920,2200,2510,2830,3170,3490,5690,7010), // 関西:H >北海道:A AH=>N12
		'N04' => array(1320,1610,1920,2240,2580,2900,4220,5320), // 関西:H >北東北:B BH=>N04
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 関西:H >南東北:C CH=>N03
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 関西:H >  関東:D DH=>N02
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 関西:H >  信越:E EH=>N02
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 関西:H >  北陸:F FH=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 関西:H >  中部:G GH=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 関西:H >  関西:H HH=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 関西:H >  中国:I HI=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 関西:H >  四国:J HJ=>N01
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 関西:H >  九州:K HK=>N02
		'N07' => array(1460,2070,2710,3360,4030,4680,7210,8860) // 関西:H >  沖縄:L HL=>N07
*/
   
//   //  中国から////////////////////////////////( 60, 80,100,120,140,160,180,200)サイズ
/*
		'N14' => array(2070,2360,2670,2990,3330,3650,6180,7770), // 中国:I >北海道:A AI=>N14
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 中国:I >北東北:B BI=>N06
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 中国:I >南東北:C CI=>N06
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 中国:I >  関東:D DI=>N03
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 中国:I >  信越:E EI=>N03
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 中国:I >  北陸:F FI=>N02
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 中国:I >  中部:G GI=>N02
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 中国:I >  関西:H HI=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 中国:I >  中国:I II=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 中国:I >  四国:J IJ=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 中国:I >  九州:K IK=>N01
		'N07' => array(1460,2070,2710,3360,4030,4680,7210,8860) // 中国:I >  沖縄:L IL=>N07
*/
   
//   //  四国から////////////////////////////////( 60, 80,100,120,140,160,180,200)サイズ
/*
		'N14' => array(2070,2360,2670,2990,3330,3650,6180,7770), // 四国:J >北海道:A AJ=>N14
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 四国:J >北東北:B BJ=>N06
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 四国:J >南東北:C CJ=>N06
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 四国:J >  関東:D DJ=>N03
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 四国:J >  信越:E EJ=>N03
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 四国:J >  北陸:F FJ=>N02
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 四国:J >  中部:G GJ=>N02
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 四国:J >  関西:H HJ=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 四国:J >  中国:I IJ=>N01
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 四国:J >  四国:J JJ=>N01
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 四国:J >  九州:K JK=>N02
		'N07' => array(1460,2070,2710,3360,4030,4680,7210,8860) // 四国:J >  沖縄:L JL=>N07
*/
   
//   //  九州から////////////////////////////////( 60, 80,100,120,140,160,180,200)サイズ
/*
		'N15' => array(2340,2620,2930,3250,3590,3910,6550,8140), // 九州:K >北海道:A AK=>N15
		'N10' => array(1760,2050,2360,2680,3020,3340,5540,6860), // 九州:K >北東北:B BK=>N10
		'N10' => array(1760,2050,2360,2680,3020,3340,5540,6860), // 九州:K >南東北:C CK=>N10
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 九州:K >  関東:D DK=>N06
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450), // 九州:K >  信越:E EK=>N06
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 九州:K >  北陸:F FK=>N03
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190), // 九州:K >  中部:G GK=>N03
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 九州:K >  関西:H HK=>N02
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 九州:K >  中国:I IK=>N01
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500), // 九州:K >  四国:J JK=>N02
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720), // 九州:K >  九州:K KK=>N01
		'N05' => array(1320,1940,2580,3230,3900,4550,6970,8620) // 九州:K >  沖縄:L KL=>N05
*/
   
//   //  沖縄から////////////////////////////////( 60, 80,100,120,140,160,180,200)サイズ
/*
		'N16' => array(2340,2950,3590,4240,4910,5560,9080,10730), // 沖縄:L >北海道:A AL=>N16
		'N13' => array(1920,2530,3170,3820,4490,5140,8550,10200), // 沖縄:L >北東北:B BL=>N13
		'N11' => array(1760,2380,3020,3670,4340,4990,8290,9940), // 沖縄:L >南東北:C CL=>N11
		'N07' => array(1460,2070,2710,3360,4030,4680,7210,8860), // 沖縄:L >  関東:D DL=>N07
		'N09' => array(1610,2230,2860,3510,4180,4830,8020,9670), // 沖縄:L >  信越:E EL=>N09
		'N09' => array(1610,2230,2860,3510,4180,4830,8020,9670), // 沖縄:L >  北陸:F FL=>N09
		'N07' => array(1460,2070,2710,3360,4030,4680,7210,8860), // 沖縄:L >  中部:G GL=>N07
		'N07' => array(1460,2070,2710,3360,4030,4680,7210,8860), // 沖縄:L >  関西:H HL=>N07
		'N07' => array(1460,2070,2710,3360,4030,4680,7210,8860), // 沖縄:L >  中国:I IL=>N07
		'N07' => array(1460,2070,2710,3360,4030,4680,7210,8860), // 沖縄:L >  四国:J JL=>N07
		'N05' => array(1320,1940,2580,3230,3900,4550,6970,8620), // 沖縄:L >  九州:K KL=>N05
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720) // 沖縄:L >  沖縄:L LL=>N01
*/
		
//		２０２４年０４月以降のすべての送料（契約無し、税込み）　Full tarafication (no contract, tax included) from April 2024
//		契約なし場合は、下にアンコメントしてください　If you have no contract, uncomment lines below
/*
		'N01' => array( 940,1230,1530,1850,2190,2510,3060,3720),
		'N02' => array(1060,1350,1650,1970,2310,2630,3730,4500),
		'N03' => array(1190,1480,1790,2110,2450,2770,4090,5190),
		'N04' => array(1320,1610,1920,2240,2580,2900,4220,5320),
		'N05' => array(1320,1940,2580,3230,3900,4550,6970,8620),
		'N06' => array(1460,1740,2050,2370,2710,3030,4350,5450),
		'N07' => array(1460,2070,2710,3360,4030,4680,7210,8860),
		'N08' => array(1610,1900,2200,2520,2860,3180,5380,6700),
		'N09' => array(1610,2230,2860,3510,4180,4830,8020,9670),
		'N10' => array(1760,2050,2360,2680,3020,3340,5540,6860),
		'N11' => array(1760,2380,3020,3670,4340,4990,8290,9940),
		'N12' => array(1920,2200,2510,2830,3170,3490,5690,7010),
		'N13' => array(1920,2530,3170,3820,4490,5140,8550,10200),
		'N14' => array(2070,2360,2670,2990,3330,3650,6180,7770),
		'N15' => array(2340,2620,2930,3250,3590,3910,6550,8140),
		'N16' => array(2340,2950,3590,4240,4910,5560,9080,10730)
*/
//		契約なし場合は、上にアンコメントしてください　If you have no contract, uncomment precedent line
		);
		// 地帯 - 地帯間の価格ランク
		$a_dist_to_rank = array(
		/* 北海道'A'*/  'AA'=>'N01',
		/* 北東北'B'*/  'AB'=>'N03','BB'=>'N01',
		/* 南東北'C'*/  'AC'=>'N04','BC'=>'N01','CC'=>'N01',
		/* 関東  'D'*/  'AD'=>'N06','BD'=>'N02','CD'=>'N01','DD'=>'N01',
		/* 信越  'E'*/  'AE'=>'N06','BE'=>'N02','CE'=>'N01','DE'=>'N01','EE'=>'N01',
		/* 北陸  'F'*/  'AF'=>'N08','BF'=>'N03','CF'=>'N02','DF'=>'N01','EF'=>'N01','FF'=>'N01',
		/* 中部  'G'*/  'AG'=>'N08','BG'=>'N03','CG'=>'N02','DG'=>'N01','EG'=>'N01','FG'=>'N01','GG'=>'N01',
		/* 関西  'H'*/  'AH'=>'N12','BH'=>'N04','CH'=>'N03','DH'=>'N02','EH'=>'N02','FH'=>'N01','GH'=>'N01','HH'=>'N01',
		/* 中国  'I'*/  'AI'=>'N14','BI'=>'N06','CI'=>'N06','DI'=>'N03','EI'=>'N03','FI'=>'N02','GI'=>'N02','HI'=>'N01','II'=>'N01',
		/* 四国  'J'*/  'AJ'=>'N14','BJ'=>'N06','CJ'=>'N06','DJ'=>'N03','EJ'=>'N03','FJ'=>'N02','GJ'=>'N02','HJ'=>'N01','IJ'=>'N01','JJ'=>'N01',
		/* 九州  'K'*/  'AK'=>'N15','BK'=>'N10','CK'=>'N10','DK'=>'N06','EK'=>'N06','FK'=>'N03','GK'=>'N03','HK'=>'N02','IK'=>'N01','JK'=>'N02','KK'=>'N01',
		/* 沖縄  'L'*/  'AL'=>'N16','BL'=>'N13','CL'=>'N11','DL'=>'N07','EL'=>'N09','FL'=>'N09','GL'=>'N07','HL'=>'N07','IL'=>'N07','JL'=>'N07','KL'=>'N05','LL'=>'N01'
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------
		//              |A 北海道  | B 北東北  | C 南東北  |  D関東    | E信越     | F 北陸    | G中部     | H 近畿    | I 中国    | J 四国    | K 九州    | L沖縄    | 
		
		);

		$s_key = $this->GetDistKey();
		if ( $s_key ) {
			$s_rank = $a_dist_to_rank[$s_key];
			if ( $s_rank ) {
				$n_sizeclass = $this->GetSizeClass();
				if ($n_sizeclass < 0) {
					$this->quote['error'] = MODULE_SHIPPING_YAMATO_TEXT_OVERSIZE;
				} else {
					$this->quote['cost'] = $a_pricerank[$s_rank][$n_sizeclass];
				}
			  //$this->quote['DEBUG'] = ' zone=' . $this->OriginZone . '=>' . $this->DestZone   //DEBUG
			  //              . ' cost=' . $a_pricerank[$s_rank][$n_sizeclass];           //DEBUG
			} else {
				$this->quote['error'] = MODULE_SHIPPING_YAMATO_TEXT_OUT_OF_AREA . '(' . $s_key .')';
			}
		} else {
			$this->quote['error'] = MODULE_SHIPPING_YAMATO_TEXT_ILLEGAL_ZONE . '(' . $this->OriginZone . '=>' . $this->DestZone . ')';
		}
		return $this->quote;
	}
}
?>

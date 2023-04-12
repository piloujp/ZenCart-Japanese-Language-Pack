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
  $Id$

  yupack Shipping Calculator.
  Calculate shipping costs.

  2002/03/29 written by TAMURA Toshihiko (tamura@bitscope.co.jp)
  2003/04/10 modified for ms1
  2004/02/27 modified for ZenCart by HISASUE Takahiro ( hisa@flatz.jp )
  2005/02/15 modified for yupack Transport by HIRAOKA Tadahito ( hira@s-page.net )
  2023/03/04 Modified and updated for zencart v1.5.8 by pilou2

 */

/*
	$rate = new _yupack('yupack','通常便');
	$rate->SetOrigin('北海道', 'JP');   // 北海道から
	$rate->SetDest('東京都', 'JP');     // 東京都まで
	$rate->SetWeight(10);           // kg
	$quote = $rate->GetQuote();
	print $quote['type'] . "<br>";
	print $quote['cost'] . "\n";
*/
class _yupack {
	public $quote;
	public $OriginZone;
	public $OriginCountryCode = 'JP';
	public $DestZone;
	public $DestCountryCode = 'JP';
	public $Weight = 0;
	public $Length = 0;
	public $Width  = 0;
	public $Height = 0;

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
	// 0     60サイズ  60cmまで  30kgまで
	// 1     80サイズ  80cmまで  30kgまで
	// 2    100サイズ 100cmまで 30kgまで
	// 3    120サイズ 120cmまで 30kgまで
	// 4    140サイズ 140cmまで 30kgまで
	// 5    160サイズ 160cmまで 30kgまで
	// 6    170サイズ 170cmまで 30kgまで
	// 7    規格外    
	function GetSizeClass() {
		$a_classes = array(
			array(0,  60,  30),  // 区分,３辺計,重量
			array(1,  80,  30),
			array(2, 100, 30),
			array(3, 120, 30),
			array(4, 140, 30),
			array(5, 160, 30),
			array(5, 170, 30)
		);

		$n_totallength = $this->Length + $this->Width + $this->Height;

		while ( $a_limit =  current($a_classes)) {
			if ($n_totallength <= $a_limit[1] && $this->Weight <= $a_limit[2]) {
				return $a_limit[0];
			}
			next($a_classes);
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
		// 都道府県コードを地帯コード('A'～'L')に変換する
		//  北海道:'A' = 北海道 Hokkaido
		//  東北  :'B' = 青森県,岩手県,秋田県,宮城県,山形県,福島県 Tohoku
		//  関東  :'C' = 茨城県,栃木県,群馬県,埼玉県,千葉県, 神奈川県,山梨県 Kanto
		//  東京  :'D' = 東京都 Tokyo
		//  信越  :'E' = 新潟県,長野県 Shin-etsu
		//  北陸  :'F' = 富山県,石川県,福井県 Holuriku
		//  東海  :'G' = 岐阜県,静岡県,愛知県,三重県 Tokai
		//  近畿  :'H' = 滋賀県,京都府,大阪府,兵庫県,奈良県,和歌山県 Kinki
		//  中国  :'I' = 鳥取県,島根県,岡山県,広島県,山口県 Chugoku
		//  四国  :'J' = 徳島県,香川県,愛媛県,高知県 Shikoku
		//  九州  :'K' = 福岡県,佐賀県,長崎県,大分県,熊本県,宮崎県,鹿児島県 Kyushu
		//  沖縄  :'L' = 沖縄県 Okinawa
		// 北海道、東京、沖縄を除き、上記の地域リストから都道府県を削除して、新しいカテゴリ’M'を作成してください。
		// そして、下のリストに’M’にして下さい。
		$a_zonemap = array(
		'北海道'=>'A',  
		'青森県'=>'B',  
		'岩手県'=>'B',  
		'宮城県'=>'B',  
		'秋田県'=>'B',  
		'山形県'=>'B',  
		'福島県'=>'B',  
		'茨城県'=>'C',  
		'栃木県'=>'C',  
		'群馬県'=>'C',  
		'埼玉県'=>'C',  
		'千葉県'=>'C',  
		'東京都'=>'D',  
		'神奈川県'=>'C',
		'山梨県'=>'C',  
		'新潟県'=>'E',  
		'長野県'=>'E',
		'富山県'=>'F',  
		'石川県'=>'F',  
		'福井県'=>'F', 
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
		'沖縄県'=>'L'/*,
		'Hokkaido'=>'A',  
		'Aomori'=>'B',  
		'Iwate'=>'B',  
		'Miyagi'=>'B',  
		'Akita'=>'B',  
		'Yamagata'=>'B',  
		'Fukushima'=>'B',  
		'Ibaraki'=>'C',  
		'Tochigi'=>'C',  
		'Gunma'=>'C',  
		'Saitama'=>'C',  
		'Chiba'=>'C',  
		'Tokyo'=>'D',  
		'Kanagawa'=>'C',  
		'Yamanashi'=>'C',  
		'Nagano'=>'E',  
		'Niigata'=>'E',  
		'Toyama'=>'F',  
		'Ishikawa'=>'F',  
		'Fukui'=>'F',  
		'Shizuoka'=>'G',  
		'Aichi'=>'G',  
		'Mie'=>'G',  
		'Gifu'=>'G',  
		'Shiga'=>'H',  
		'Kyoto'=>'H',  
		'Osaka'=>'H',  
		'Nara'=>'H',  
		'Hyogo'=>'H',  
		'Wakayama'=>'H',  
		'Tottori'=>'I',  
		'Shimane'=>'I',  
		'Okayama'=>'I',  
		'Hiroshima'=>'I',  
		'Yamaguchi'=>'I',  
		'Tokushima'=>'J',  
		'Kagawa'=>'J',  
		'Ehime'=>'J',  
		'Kochi'=>'J',  
		'Fukuoka'=>'K',  
		'Saga'=>'K',  
		'Nagasaki'=>'K',  
		'Kumamoto'=>'K',  
		'Oita'=>'K',  
		'Miyazaki'=>'K',  
		'Kagoshima'=>'K',  
		'Okinawa'=>'L'*/
		);
		return $a_zonemap[$zone];
	}

	function GetQuote() {
		// 距離別の価格ランク: ランクコード => 価格(60,80,100,120,140,160,170)
		$a_pricerank = array(
		'N01'=>array(810, 1030,1280,1530,1780,2010,2340), // 通常便(01) 近距離
		'N02'=>array(870,1100,1330,1590,1830,2060,2410), // 通常便(02)
		'N03'=>array(970,1200,1440,1690,1950,2160,2530), // 通常便(03)
		'N04'=>array(1030,1290,1570,1830,2110,2320,2700), // 通常便(04)
		'N05'=>array(1100,1310,1560,1800,2060,2270,2640), // 通常便(05)
		'N06'=>array(1230,1510,1770,2050,2310,2540,2910), // 通常便(06)
		'N07'=>array(1300,1530,1760,2020,2260,2490,2850), // 通常便(07)
		'N08'=>array(1350,1630,1900,2170,2440,2660,3060), // 通常便(08)
		'N09'=>array(1430,1650,1890,2140,2390,2610,2980), // 通常便(09)
		'N10'=>array(1470,1730,2010,2270,2550,2770,3160), // 通常便(10)
		'N11'=>array(1540,1750,2000,2240,2500,2720,3100), // 通常便(11)
		'N12'=>array(1550,1760,2010,2270,2550,2770,3160), // 通常便(12) 遠距離
		);
		// 地帯 - 地帯間の価格ランク
		$a_dist_to_rank = array(
		'AA'=>'N01',
		'AB'=>'N05','BB'=>'N02',
		'AC'=>'N08','BC'=>'N02','CC'=>'N02',
		'AD'=>'N08','BD'=>'N02','CD'=>'N02','DD'=>'N01',
		'AE'=>'N08','BE'=>'N02','CE'=>'N02','DE'=>'N02','EE'=>'N02',
		'AF'=>'N09','BF'=>'N03','CF'=>'N02','DF'=>'N02','EF'=>'N02','FF'=>'N02',
		'AG'=>'N09','BG'=>'N03','CG'=>'N02','DG'=>'N02','EG'=>'N02','FG'=>'N02','GG'=>'N01',
		'AH'=>'N11','BH'=>'N05','CH'=>'N03','DH'=>'N03','EH'=>'N03','FH'=>'N02','GH'=>'N02','HH'=>'N02',
		'AI'=>'N11','BI'=>'N08','CI'=>'N05','DI'=>'N05','EI'=>'N05','FI'=>'N03','GI'=>'N03','HI'=>'N02','II'=>'N02',
		'AJ'=>'N11','BJ'=>'N08','CJ'=>'N05','DJ'=>'N05','EJ'=>'N05','FJ'=>'N03','GJ'=>'N03','HJ'=>'N02','IJ'=>'N02','JJ'=>'N02',
		'AK'=>'N11','BK'=>'N11','CK'=>'N07','DK'=>'N07','EK'=>'N07','FK'=>'N05','GK'=>'N05','HK'=>'N03','IK'=>'N02','JK'=>'N02','KK'=>'N02',
		'AL'=>'N12','BL'=>'N12','CL'=>'N08','DL'=>'N08','EL'=>'N10','FL'=>'N10','GL'=>'N08','HL'=>'N08','IL'=>'N06','JL'=>'N08','KL'=>'N04','LL'=>'N01',
//		'AM'=>'N08','BM'=>'N08','CM'=>'N07','DM'=>'N07','EM'=>'N07','FM'=>'N08','GM'=>'N08','HM'=>'N07','IM'=>'N07','JM'=>'N06','KM'=>'N07','LM'=>'N04','MM'=>'N01' // 差出元の都道府県ためにカストムにして下さい。
		);

		$s_key = $this->GetDistKey();
		if ( $s_key ) {
			$s_rank = $a_dist_to_rank[$s_key];
			if ( $s_rank ) {
				$n_sizeclass = $this->GetSizeClass();
				if ($n_sizeclass < 0) {
					$this->quote['error'] = MODULE_SHIPPING_YUPACK_TEXT_OVERSIZE;
				} else {
					$this->quote['cost'] = $a_pricerank[$s_rank][$n_sizeclass];
				}
			  //$this->quote['DEBUG'] = ' zone=' . $this->OriginZone . '=>' . $this->DestZone   //DEBUG
			  //              . ' cost=' . $a_pricerank[$s_rank][$n_sizeclass];           //DEBUG
				if ($this->Weight >= 25) { // 重量ゆうパックは+５１０か+５２０円になります
					if ($s_rank > 8) {
						$omoi = 510;
					} else {
						$omoi = 520;
					}
					$this->quote['cost'] += $omoi;
				}
			} else {
				$this->quote['error'] = MODULE_SHIPPING_YUPACK_TEXT_OUT_OF_AREA . '(' . $s_key .')';
			}
		} else {
			$this->quote['error'] = MODULE_SHIPPING_YUPACK_TEXT_ILLEGAL_ZONE . '(' . $this->OriginZone . '=>' . $this->DestZone . ')';
		}
		return $this->quote;
	}
}
?>

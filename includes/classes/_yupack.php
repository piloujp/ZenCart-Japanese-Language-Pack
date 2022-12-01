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
	// 5    150サイズ 150cmまで 30kgまで
  // 6    規格外    
	function GetSizeClass() {
		$a_classes = array(
			array(0,  60,  30),  // 区分,３辺計,重量
			array(1,  80,  30),
			array(2, 100, 30),
			array(3, 120, 30),
			array(4, 140, 30),
			array(5, 150, 30)
		);

		$n_totallength = $this->Length + $this->Width + $this->Height;

//		while (list($n_index, $a_limit) = each($a_classes)) {
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
		// 都道府県コードを地帯コード('A'～'M')に変換する
		//  北海道:'A' = 北海道
		//  東北  :'B' = 青森県,岩手県,秋田県,宮城県,山形県,福島県
		//  関東  :'C' = 茨城県,栃木県,群馬県,埼玉県,千葉県
		//  東京  :'D' = 東京都
		//  南関東：'E' = 神奈川県,山梨県
		//  信越  :'F' = 新潟県,長野県
		//  北陸  :'G' = 富山県,石川県,福井県
		//  東海  :'H' = 岐阜県,静岡県,愛知県,三重県
		//  近畿  :'I' = 滋賀県,京都府,大阪府,兵庫県,奈良県,和歌山県
		//  中国  :'J' = 鳥取県,島根県,岡山県,広島県,山口県
		//  四国  :'K' = 徳島県,香川県,愛媛県,高知県
		//  九州  :'L' = 福岡県,佐賀県,長崎県,大分県,熊本県,宮崎県,鹿児島県
		//  沖縄  :'M' = 沖縄県
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
		'神奈川県'=>'E',
		'山梨県'=>'E',  
		'新潟県'=>'F',  
		'長野県'=>'F',
		'富山県'=>'G',  
		'石川県'=>'G',  
		'福井県'=>'G', 
		'岐阜県'=>'H',  
		'静岡県'=>'H',  
		'愛知県'=>'H',  
		'三重県'=>'H',  
		'滋賀県'=>'I',  
		'京都府'=>'I',  
		'大阪府'=>'I',  
		'兵庫県'=>'I',  
		'奈良県'=>'I',  
		'和歌山県'=>'I',  
		'鳥取県'=>'J',  
		'島根県'=>'J',  
		'岡山県'=>'J',  
		'広島県'=>'J',  
		'山口県'=>'J',  
		'徳島県'=>'K',  
		'香川県'=>'K',  
		'愛媛県'=>'K',  
		'高知県'=>'K',  
		'福岡県'=>'L',  
		'佐賀県'=>'L',  
		'長崎県'=>'L',  
		'熊本県'=>'L',  
		'大分県'=>'L',  
		'宮崎県'=>'L',  
		'鹿児島県'=>'L',  
		'沖縄県'=>'M',
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
		'Kanagawa'=>'E',  
		'Yamanashi'=>'E',  
		'Nagano'=>'F',  
		'Niigata'=>'F',  
		'Toyama'=>'G',  
		'Ishikawa'=>'G',  
		'Fukui'=>'G',  
		'Shizuoka'=>'H',  
		'Aichi'=>'H',  
		'Mie'=>'H',  
		'Gifu'=>'H',  
		'Shiga'=>'I',  
		'Kyoto'=>'I',  
		'Osaka'=>'I',  
		'Nara'=>'I',  
		'Hyogo'=>'I',  
		'Wakayama'=>'I',  
		'Tottori'=>'J',  
		'Shimane'=>'J',  
		'Okayama'=>'J',  
		'Hiroshima'=>'J',  
		'Yamaguchi'=>'J',  
		'Tokushima'=>'K',  
		'Kagawa'=>'K',  
		'Ehime'=>'K',  
		'Kochi'=>'K',  
		'Fukuoka'=>'L',  
		'Saga'=>'L',  
		'Nagasaki'=>'L',  
		'Kumamoto'=>'L',  
		'Oita'=>'L',  
		'Miyazaki'=>'L',  
		'Kagoshima'=>'L',  
		'Okinawa'=>'M'
		);
		return $a_zonemap[$zone];
	}

	function GetQuote() {
		// 距離別の価格ランク: ランクコード => 価格(60,80,100,120,140,160)
		$a_pricerank = array(
		'N01'=>array(610, 810,1030,1230,1440,1650), // 通常便(01) 近距離
		'N02'=>array(710,930,1130,1340,1540,1750), // 通常便(02)
		'N03'=>array(810,1030,1230,1440,1650,1850), // 通常便(03)
		'N04'=>array(930,1130,1340,1540,1750,1950), // 通常便(04)
		'N05'=>array(1030,1230,1440,1650,1850,2060), // 通常便(05)
		'N06'=>array(1130,1340,1540,1750,1950,2160), // 通常便(06)
		'N07'=>array(1230,1440,1650,1850,2060,2260), // 通常便(07)
		'N08'=>array(1340,1540,1750,1950,2160,2370), // 通常便(08) 遠距離
		);
		// 地帯 - 地帯間の価格ランク
		$a_dist_to_rank = array(
		'AA'=>'N01',
		'AB'=>'N03','BB'=>'N01',
		'AC'=>'N05','BC'=>'N02','CC'=>'N01',
		'AD'=>'N05','BD'=>'N02','CD'=>'N02','DD'=>'N01',
		'AE'=>'N05','BE'=>'N02','CE'=>'N02','DE'=>'N02','EE'=>'N01',
		'AF'=>'N05','BF'=>'N02','CF'=>'N02','DF'=>'N02','EF'=>'N02','FF'=>'N01',
		'AG'=>'N06','BG'=>'N03','CG'=>'N02','DG'=>'N02','EG'=>'N02','FG'=>'N02','GG'=>'N01',
		'AH'=>'N06','BH'=>'N03','CH'=>'N02','DH'=>'N02','EH'=>'N02','FH'=>'N02','GH'=>'N02','HH'=>'N01',
		'AI'=>'N07','BI'=>'N04','CI'=>'N03','DI'=>'N03','EI'=>'N03','FI'=>'N03','GI'=>'N02','HI'=>'N02','II'=>'N01',
		'AJ'=>'N08','BJ'=>'N05','CJ'=>'N04','DJ'=>'N04','EJ'=>'N04','FJ'=>'N04','GJ'=>'N03','HJ'=>'N03','IJ'=>'N02','JJ'=>'N01',
		'AK'=>'N08','BK'=>'N05','CK'=>'N04','DK'=>'N04','EK'=>'N04','FK'=>'N04','GK'=>'N03','HK'=>'N03','IK'=>'N02','JK'=>'N02','KK'=>'N01',
		'AL'=>'N08','BL'=>'N07','CL'=>'N06','DL'=>'N06','EL'=>'N06','FL'=>'N06','GL'=>'N04','HL'=>'N04','IL'=>'N03','JL'=>'N02','KL'=>'N03','LL'=>'N01',
		'AM'=>'N08','BM'=>'N08','CM'=>'N07','DM'=>'N07','EM'=>'N07','FM'=>'N08','GM'=>'N08','HM'=>'N07','IM'=>'N07','JM'=>'N06','KM'=>'N07','LM'=>'N04','MM'=>'N01'
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

<?php
/*
 * Yupack Class.
 *
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: pilou2/piloujp 2023 May 13 Modified in v1.5.8a $
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
		//  信越  :'E' = 新潟県,長野県 Shinetsu
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
		'沖縄県'=>'L'
		);
		return $a_zonemap[$zone];
	}

	function GetQuote() {
		// 距離別の価格ランク: ランクコード => 価格(60,80,100,120,140,160,170)
		// https://www.post.japanpost.jp/service/you_pack/charge/ichiran.html
		$a_pricerank = array(

// ゆうパック運輸との契約によりサイズや重さの制限が変わりますので、「 function GetSizeClass()」で調整が必要です。
// Size and weight restrictions vary depending on the contract with Japan Post, so you will need to adjust them with "function GetSizeClass()".
// 送信元の都道府県の行「/*...」と「*/...」を削除し、契約に合わせて料金を調整して下さい。
// Remove lines '/*...' and '*/...' for the prefecture you send from and adjust rates to your contract.


// ///////////////////////// GetSizeClass array(  0,  1,  2,  3,  4,  5,  5)
// //北海道から////////////////////////////////( 60, 80,100,120,140,160,170)サイズ
/*
		'N01'=>array(999,999,999,999,999,999,999), // 北海道'A'>北海道'A' 'AA'=>'N01'
		'N05'=>array(999,999,999,999,999,999,999), // 北海道'A'>東北'B'   'AB'=>'N05'
		'N08'=>array(999,999,999,999,999,999,999), // 北海道'A'>関東'C'   'AC'=>'N08'
		'N08'=>array(999,999,999,999,999,999,999), // 北海道'A'>東京'D'   'AD'=>'N08'
		'N08'=>array(999,999,999,999,999,999,999), // 北海道'A'>信越'E'   'AE'=>'N08'
		'N09'=>array(999,999,999,999,999,999,999), // 北海道'A'>北陸'F'   'AF'=>'N09'
		'N09'=>array(999,999,999,999,999,999,999), // 北海道'A'>東海'G'   'AG'=>'N09'
		'N11'=>array(999,999,999,999,999,999,999), // 北海道'A'>近畿'H'   'AH'=>'N11'
		'N11'=>array(999,999,999,999,999,999,999), // 北海道'A'>中国'I'   'AI'=>'N11'
		'N11'=>array(999,999,999,999,999,999,999), // 北海道'A'>四国'J'   'AJ'=>'N11'
		'N11'=>array(999,999,999,999,999,999,999), // 北海道'A'>九州'K'   'AK'=>'N11'
		'N12'=>array(999,999,999,999,999,999,999) // 北海道'A'>沖縄'L'   'AL'=>'N12'
*/

// //東北から////////////////////////////////////( 60, 80,100,120,140,160,170)サイズ
/*
		'N05'=>array(999,999,999,999,999,999,999), // 東北'B'>北海道'A' 'AB'=>'N05'
		'N02'=>array(999,999,999,999,999,999,999), // 東北'B'>東北'B'   'BB'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 東北'B'>関東'C'   'BC'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 東北'B'>東京'D'   'BD'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 東北'B'>信越'E'   'BE'=>'N02'
		'N03'=>array(999,999,999,999,999,999,999), // 東北'B'>北陸'F'   'BF'=>'N03'
		'N03'=>array(999,999,999,999,999,999,999), // 東北'B'>東海'G'   'BG'=>'N03'
		'N05'=>array(999,999,999,999,999,999,999), // 東北'B'>近畿'H'   'BH'=>'N05'
		'N08'=>array(999,999,999,999,999,999,999), // 東北'B'>中国'I'   'BI'=>'N08'
		'N08'=>array(999,999,999,999,999,999,999), // 東北'B'>四国'J'   'BJ'=>'N08'
		'N11'=>array(999,999,999,999,999,999,999), // 東北'B'>九州'K'   'BK'=>'N11'
		'N12'=>array(999,999,999,999,999,999,999), // 東北'B'>沖縄'L'   'BL'=>'N12'
		'N01'=>array(999,999,999,999,999,999,999) // 東北'B'>原産地'M'  'BM'=>'N01'
*/

// //関東から////////////////////////////////////( 60, 80,100,120,140,160,170)サイズ
/*
		'N08'=>array(999,999,999,999,999,999,999), // 関東'C'>北海道'A' 'AC'=>'N08'
		'N02'=>array(999,999,999,999,999,999,999), // 関東'C'>東北'B'   'BC'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 関東'C'>関東'C'   'CC'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 関東'C'>東京'D'   'CD'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 関東'C'>信越'E'   'CE'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 関東'C'>北陸'F'   'CF'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 関東'C'>東海'G'   'CG'=>'N02'
		'N03'=>array(999,999,999,999,999,999,999), // 関東'C'>近畿'H'   'CH'=>'N03'
		'N05'=>array(999,999,999,999,999,999,999), // 関東'C'>中国'I'   'CI'=>'N05'
		'N05'=>array(999,999,999,999,999,999,999), // 関東'C'>四国'J'   'CJ'=>'N05'
		'N07'=>array(999,999,999,999,999,999,999), // 関東'C'>九州'K'   'CK'=>'N07'
		'N08'=>array(999,999,999,999,999,999,999), // 関東'C'>沖縄'L'   'CL'=>'N08'
		'N01'=>array(999,999,999,999,999,999,999) // 関東'C'>原産地'M'  'CM'=>'N01'
*/

// //東京から////////////////////////////////////( 60, 80,100,120,140,160,170)サイズ
/*
		'N08'=>array(999,999,999,999,999,999,999), // 東京'D'>北海道'A' 'AD'=>'N08'
		'N02'=>array(999,999,999,999,999,999,999), // 東京'D'>東北'B'   'BD'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 東京'D'>関東'C'   'CD'=>'N02'
		'N01'=>array(999,999,999,999,999,999,999), // 東京'D'>東京'D'   'DD'=>'N01'
		'N02'=>array(999,999,999,999,999,999,999), // 東京'D'>信越'E'   'DE'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 東京'D'>北陸'F'   'DF'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 東京'D'>東海'G'   'DG'=>'N02'
		'N03'=>array(999,999,999,999,999,999,999), // 東京'D'>近畿'H'   'DH'=>'N03'
		'N05'=>array(999,999,999,999,999,999,999), // 東京'D'>中国'I'   'DI'=>'N05'
		'N05'=>array(999,999,999,999,999,999,999), // 東京'D'>四国'J'   'DJ'=>'N05'
		'N07'=>array(999,999,999,999,999,999,999), // 東京'D'>九州'K'   'DK'=>'N07'
		'N08'=>array(999,999,999,999,999,999,999) // 東京'D'>沖縄'L'   'DL'=>'N08'
*/

// //信越から////////////////////////////////////( 60, 80,100,120,140,160,170)サイズ
/*
		'N08'=>array(999,999,999,999,999,999,999), // 信越'E'>北海道'A' 'AE'=>'N08'
		'N02'=>array(999,999,999,999,999,999,999), // 信越'E'>東北'B'   'BE'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 信越'E'>関東'C'   'CE'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 信越'E'>東京'D'   'DE'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 信越'E'>信越'E'   'EE'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 信越'E'>北陸'F'   'EF'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 信越'E'>東海'G'   'EG'=>'N02'
		'N03'=>array(999,999,999,999,999,999,999), // 信越'E'>近畿'H'   'EH'=>'N03'
		'N05'=>array(999,999,999,999,999,999,999), // 信越'E'>中国'I'   'EI'=>'N05'
		'N05'=>array(999,999,999,999,999,999,999), // 信越'E'>四国'J'   'EJ'=>'N05'
		'N07'=>array(999,999,999,999,999,999,999), // 信越'E'>九州'K'   'EK'=>'N07'
		'N10'=>array(999,999,999,999,999,999,999), // 信越'E'>沖縄'L'   'EL'=>'N10'
		'N01'=>array(999,999,999,999,999,999,999) // 信越'E'>原産地'M'  'EM'=>'N01'
*/

// //北陸から///////////////////////////////////( 60, 80,100,120,140,160,170)サイズ
/*
		'N09'=>array(999,999,999,999,999,999,999), // 北陸'F'>北海道'A''AF'=>'N09'
		'N03'=>array(999,999,999,999,999,999,999), // 北陸'F'>東北'B'  'BF'=>'N03'
		'N02'=>array(999,999,999,999,999,999,999), // 北陸'F'>関東'C'  'CF'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 北陸'F'>東京'D'  'DF'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 北陸'F'>信越'E'  'EF'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 北陸'F'>北陸'F'  'FF'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 北陸'F'>東海'G'  'FG'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 北陸'F'>近畿'H'  'FH'=>'N02'
		'N03'=>array(999,999,999,999,999,999,999), // 北陸'F'>中国'I'  'FI'=>'N03'
		'N03'=>array(999,999,999,999,999,999,999), // 北陸'F'>四国'J'  'FJ'=>'N03'
		'N05'=>array(999,999,999,999,999,999,999), // 北陸'F'>九州'K'  'FK'=>'N05'
		'N10'=>array(999,999,999,999,999,999,999), // 北陸'F'>沖縄'L'  'FL'=>'N10'
		'N01'=>array(999,999,999,999,999,999,999) // 北陸'F'>原産地'M'  'FM'=>'N01'
*/

// //東海から///////////////////////////////////( 60, 80,100,120,140,160,170)サイズ
/*
		'N09'=>array(999,999,999,999,999,999,999), // 東海'G'>北海道'A''AG'=>'N09'
		'N03'=>array(999,999,999,999,999,999,999), // 東海'G'>東北'B'  'BG'=>'N03'
		'N02'=>array(999,999,999,999,999,999,999), // 東海'G'>関東'C'  'CG'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 東海'G'>東京'D'  'DG'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 東海'G'>信越'E'  'EG'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 東海'G'>北陸'F'  'FG'=>'N02'
		'N01'=>array(999,999,999,999,999,999,999), // 東海'G'>東海'G'  'GG'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 東海'G'>近畿'H'  'GH'=>'N02'
		'N03'=>array(999,999,999,999,999,999,999), // 東海'G'>中国'I'  'GI'=>'N03'
		'N03'=>array(999,999,999,999,999,999,999), // 東海'G'>四国'J'  'GJ'=>'N03'
		'N05'=>array(999,999,999,999,999,999,999), // 東海'G'>九州'K'  'GK'=>'N05'
		'N08'=>array(999,999,999,999,999,999,999), // 東海'G'>沖縄'L'  'GL'=>'N08'
		'N01'=>array(999,999,999,999,999,999,999) // 東海'G'>原産地'M'  'GM'=>'N01'
*/

// //近畿から///////////////////////////////////( 60, 80,100,120,140,160,170)サイズ
/*
		'N11'=>array(999,999,999,999,999,999,999), // 近畿'H'>北海道'A''AH'=>'N11'
		'N05'=>array(999,999,999,999,999,999,999), // 近畿'H'>東北'B'  'BH'=>'N05'
		'N03'=>array(999,999,999,999,999,999,999), // 近畿'H'>関東'C'  'CH'=>'N03'
		'N03'=>array(999,999,999,999,999,999,999), // 近畿'H'>東京'D'  'DH'=>'N03'
		'N03'=>array(999,999,999,999,999,999,999), // 近畿'H'>信越'E'  'EH'=>'N03'
		'N02'=>array(999,999,999,999,999,999,999), // 近畿'H'>北陸'F'  'FH'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 近畿'H'>東海'G'  'GH'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 近畿'H'>近畿'H'  'HH'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 近畿'H'>中国'I'  'HI'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 近畿'H'>四国'J'  'HJ'=>'N02'
		'N03'=>array(999,999,999,999,999,999,999), // 近畿'H'>九州'K'  'HK'=>'N03'
		'N08'=>array(999,999,999,999,999,999,999), // 近畿'H'>沖縄'L'  'HL'=>'N08'
		'N01'=>array(999,999,999,999,999,999,999) // 近畿'H'>原産地'M'  'HM'=>'N01'
*/

// //中国から///////////////////////////////////( 60, 80,100,120,140,160,170)サイズ
/*
		'N11'=>array(999,999,999,999,999,999,999), // 中国'I'>北海道'A''AI'=>'N11'
		'N08'=>array(999,999,999,999,999,999,999), // 中国'I'>東北'B'  'BI'=>'N08'
		'N05'=>array(999,999,999,999,999,999,999), // 中国'I'>関東'C'  'CI'=>'N05'
		'N05'=>array(999,999,999,999,999,999,999), // 中国'I'>東京'D'  'DI'=>'N05'
		'N05'=>array(999,999,999,999,999,999,999), // 中国'I'>信越'E'  'EI'=>'N05'
		'N03'=>array(999,999,999,999,999,999,999), // 中国'I'>北陸'F'  'FI'=>'N03'
		'N03'=>array(999,999,999,999,999,999,999), // 中国'I'>東海'G'  'GI'=>'N03'
		'N02'=>array(999,999,999,999,999,999,999), // 中国'I'>近畿'H'  'HI'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 中国'I'>中国'I'  'II'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 中国'I'>四国'J'  'IJ'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 中国'I'>九州'K'  'IK'=>'N02'
		'N06'=>array(999,999,999,999,999,999,999), // 中国'I'>沖縄'L'  'IL'=>'N06'
		'N01'=>array(999,999,999,999,999,999,999) // 中国'I'>原産地'M'  'IM'=>'N01'
*/

// //四国から///////////////////////////////////( 60, 80,100,120,140,160,170)サイズ
/*
		'N11'=>array(999,999,999,999,999,999,999), // 四国'J'>北海道'A''AJ'=>'N11'
		'N08'=>array(999,999,999,999,999,999,999), // 四国'J'>東北'B'  'BJ'=>'N08'
		'N05'=>array(999,999,999,999,999,999,999), // 四国'J'>関東'C'  'CJ'=>'N05'
		'N05'=>array(999,999,999,999,999,999,999), // 四国'J'>東京'D'  'DJ'=>'N05'
		'N05'=>array(999,999,999,999,999,999,999), // 四国'J'>信越'E'  'EJ'=>'N05'
		'N03'=>array(999,999,999,999,999,999,999), // 四国'J'>北陸'F'  'FJ'=>'N03'
		'N03'=>array(999,999,999,999,999,999,999), // 四国'J'>東海'G'  'GJ'=>'N03'
		'N02'=>array(999,999,999,999,999,999,999), // 四国'J'>近畿'H'  'HJ'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 四国'J'>中国'I'  'IJ'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 四国'J'>四国'J'  'JJ'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 四国'J'>九州'K'  'JK'=>'N02'
		'N08'=>array(999,999,999,999,999,999,999), // 四国'J'>沖縄'L'  'JL'=>'N08'
		'N01'=>array(999,999,999,999,999,999,999) // 四国'J'>原産地'M'  'JM'=>'N01'
*/

// //九州から///////////////////////////////////( 60, 80,100,120,140,160,170)サイズ
/*
		'N11'=>array(999,999,999,999,999,999,999), // 九州'K'>北海道'A''AK'=>'N11'
		'N11'=>array(999,999,999,999,999,999,999), // 九州'K'>東北'B'  'BK'=>'N11'
		'N07'=>array(999,999,999,999,999,999,999), // 九州'K'>関東'C'  'CK'=>'N07'
		'N07'=>array(999,999,999,999,999,999,999), // 九州'K'>東京'D'  'DK'=>'N07'
		'N07'=>array(999,999,999,999,999,999,999), // 九州'K'>信越'E'  'EK'=>'N07'
		'N05'=>array(999,999,999,999,999,999,999), // 九州'K'>北陸'F'  'FK'=>'N05'
		'N05'=>array(999,999,999,999,999,999,999), // 九州'K'>東海'G'  'GK'=>'N05'
		'N03'=>array(999,999,999,999,999,999,999), // 九州'K'>近畿'H'  'HK'=>'N03'
		'N02'=>array(999,999,999,999,999,999,999), // 九州'K'>中国'I'  'IK'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 九州'K'>四国'J'  'JK'=>'N02'
		'N02'=>array(999,999,999,999,999,999,999), // 九州'K'>九州'K'  'KK'=>'N02'
		'N04'=>array(999,999,999,999,999,999,999), // 九州'K'>沖縄'L'  'KL'=>'N04'
		'N01'=>array(999,999,999,999,999,999,999) // 九州'K'>原産地'M'  'KM'=>'N01'
*/

// //沖縄から///////////////////////////////////( 60, 80,100,120,140,160,170)サイズ
/*
		'N12'=>array(999,999,999,999,999,999,999), // 沖縄'L'>北海道'A''AL'=>'N12'
		'N12'=>array(999,999,999,999,999,999,999), // 沖縄'L'>東北'B'  'BL'=>'N12'
		'N08'=>array(999,999,999,999,999,999,999), // 沖縄'L'>関東'C'  'CL'=>'N08'
		'N08'=>array(999,999,999,999,999,999,999), // 沖縄'L'>東京'D'  'DL'=>'N08'
		'N10'=>array(999,999,999,999,999,999,999), // 沖縄'L'>信越'E'  'EL'=>'N10'
		'N10'=>array(999,999,999,999,999,999,999), // 沖縄'L'>北陸'F'  'FL'=>'N10'
		'N08'=>array(999,999,999,999,999,999,999), // 沖縄'L'>東海'G'  'GL'=>'N08'
		'N08'=>array(999,999,999,999,999,999,999), // 沖縄'L'>近畿'H'  'HL'=>'N08'
		'N06'=>array(999,999,999,999,999,999,999), // 沖縄'L'>中国'I'  'IL'=>'N06'
		'N08'=>array(999,999,999,999,999,999,999), // 沖縄'L'>四国'J'  'JL'=>'N08'
		'N04'=>array(999,999,999,999,999,999,999), // 沖縄'L'>九州'K'  'KL'=>'N04'
		'N01'=>array(999,999,999,999,999,999,999) // 沖縄'L'>沖縄'L'  'LL'=>'N01'
*/

//		２０２３年０５月現在の全ての送料（契約無し）　Full tarafication (no contract) as of May 2023
//		契約なし場合は、下にアンコメントしてください　If you have no contract, uncomment next line
/*
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
		'N12'=>array(1550,1760,2010,2270,2550,2770,3160) // 通常便(12) 遠距離
*/
//		契約なし場合は、上にアンコメントしてください　If you have no contract, uncomment precedent line
		);

		// 地帯 - 地帯間の価格ランク
		$a_dist_to_rank = array(
/* 北海道'A' Hokkaido*/ 'AA'=>'N01',
/*   東北'B' Touhoku */ 'AB'=>'N05','BB'=>'N02',
/*   関東'C' Kantou  */ 'AC'=>'N08','BC'=>'N02','CC'=>'N02',
/*   東京'D' Tokyo   */ 'AD'=>'N08','BD'=>'N02','CD'=>'N02','DD'=>'N01',
/*   信越'E' Shinetu */ 'AE'=>'N08','BE'=>'N02','CE'=>'N02','DE'=>'N02','EE'=>'N02',
/*   北陸'F' Hokuriku*/ 'AF'=>'N09','BF'=>'N03','CF'=>'N02','DF'=>'N02','EF'=>'N02','FF'=>'N02',
/*   東海'G' Toukai  */ 'AG'=>'N09','BG'=>'N03','CG'=>'N02','DG'=>'N02','EG'=>'N02','FG'=>'N02','GG'=>'N02',
/*   近畿'H' Kinki   */ 'AH'=>'N11','BH'=>'N05','CH'=>'N03','DH'=>'N03','EH'=>'N03','FH'=>'N02','GH'=>'N02','HH'=>'N02',
/*   中国'I' Chugoku */ 'AI'=>'N11','BI'=>'N08','CI'=>'N05','DI'=>'N05','EI'=>'N05','FI'=>'N03','GI'=>'N03','HI'=>'N02','II'=>'N02',
/*   四国'J' Shikoku */ 'AJ'=>'N11','BJ'=>'N08','CJ'=>'N05','DJ'=>'N05','EJ'=>'N05','FJ'=>'N03','GJ'=>'N03','HJ'=>'N02','IJ'=>'N02','JJ'=>'N02',
/*   九州'K' Kyusyu  */ 'AK'=>'N11','BK'=>'N11','CK'=>'N07','DK'=>'N07','EK'=>'N07','FK'=>'N05','GK'=>'N05','HK'=>'N03','IK'=>'N02','JK'=>'N02','KK'=>'N02',
/*   沖縄'L' Okinawa */ 'AL'=>'N12','BL'=>'N12','CL'=>'N08','DL'=>'N08','EL'=>'N10','FL'=>'N10','GL'=>'N08','HL'=>'N08','IL'=>'N06','JL'=>'N08','KL'=>'N04','LL'=>'N01',
//  /*出荷元の都道府県。'M' Origin state */ 'AM'=>'N09','BM'=>'N03','CM'=>'N02','DM'=>'N02','EM'=>'N02','FM'=>'N02','GM'=>'N02','HM'=>'N02','IM'=>'N03','JM'=>'N03','KM'=>'N05','LM'=>'N10','MM'=>'N01', // 石川県の例。 Example for Ishilkawa ken.
// 北海道、東京、沖縄の場合はこの行をコメントアウトしてください。違う県の場合は差出元の都道府県ためにカストムにして下さい。上記の'$a_zonemap'配列の状態を'M'に変更することを忘れないでください。
// For Hokkaido, Tokyo and Okinawa don't change anything. For other states, please customize for state of origin. Don't forget to change your state in '$a_zonemap' array above to 'M'.
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
//                     | A 北海道  | B 東北    | C 関東    | D 東京    | E 信越    | F 北陸    | G 東海    | H 近畿    | I 中国    | J 四国    | K 九州    | L 沖縄    | M カスタム|

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

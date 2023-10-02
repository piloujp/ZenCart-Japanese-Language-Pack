<?php
/*
 * Sagawa Class.
 *
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: pilou2/piloujp 2023 May 13 Modified in v1.5.8a $
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
// // 北海道から/////////////////////////////( 60, 80,100,140,160,180,200,220,240,260,   ) サイズ
/*
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // A北海道-A北海道'AA'=>N01
		'N31'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // A北海道-B北東北'AB'=>N31
		'N35'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // A北海道-C南東北'AC'=>N35
		'N42'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // A北海道-D関東  'AD'=>N42
		'N44'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // A北海道-E信越  'AE'=>N44
		'N47'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // A北海道-F東海  'AF'=>N47
		'N47'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // A北海道-G北陸  'AG'=>N47
		'N53'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // A北海道-H関西  'AH'=>N53
		'N54'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // A北海道-I中国  'AI'=>N54
		'N55'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // A北海道-J四国  'AJ'=>N55
		'N56'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // A北海道-K北九州'AK'=>N56
		'N57'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // A北海道-L南九州'AL'=>N57
		'N52'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999) // A北海道-M沖縄  'AM'=>N52
*/
// // 北東北から//////////////////////////////( 60, 80,100,140,160,180,200,220,240,260,   ) サイズ
/*
		'N31'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // B北東北-A北海道'AB'=>N31
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // B北東北-B北東北'BB'=>N01
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // B北東北-C南東北'BC'=>N01
		'N21'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // B北東北-D関東  'BD'=>N21
		'N21'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // B北東北-E信越  'BE'=>N21
		'N30'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // B北東北-F東海  'BF'=>N30
		'N30'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // B北東北-G北陸  'BG'=>N30
		'N34'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // B北東北-H関西  'BH'=>N34
		'N43'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // B北東北-I中国  'BI'=>N43
		'N46'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // B北東北-J四国  'BJ'=>N46
		'N49'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // B北東北-K北九州'BK'=>N49
		'N51'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // B北東北-L南九州'BL'=>N51
		'N51'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999) // B北東北-M沖縄  'BM'=>N51
*/
// // 南東北から//////////////////////////////( 60, 80,100,140,160,180,200,220,240,260,   ) サイズ
/*
		'N35'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // C南東北-A北海道'AC'=>N35
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // C南東北-B北東北'BC'=>N01
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // C南東北-C南東北'CC'=>N01
		'N09'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // C南東北-D関東  'CD'=>N09
		'N09'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // C南東北-E信越  'CE'=>N09
		'N18'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // C南東北-F東海  'CF'=>N18
		'N18'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // C南東北-G北陸  'CG'=>N18
		'N28'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // C南東北-H関西  'CH'=>N28
		'N37'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // C南東北-I中国  'CI'=>N37
		'N45'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // C南東北-J四国  'CJ'=>N45
		'N48'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // C南東北-K北九州'CK'=>N48
		'N50'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // C南東北-L南九州'CL'=>N50
		'N50'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999) // C南東北-M沖縄  'CM'=>N50
*/
// // 関東から//////////////////////////////( 60, 80,100,140,160,180,200,220,240,260,   ) サイズ
/*
		'N42'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // D関東-A北海道'AD'=>N42
		'N21'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // D関東-B北東北'BD'=>N21
		'N09'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // D関東-C南東北'CD'=>N09
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // D関東-D関東  'DD'=>N01
		'N08'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // D関東-E信越  'DE'=>N08
		'N08'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // D関東-F東海  'DF'=>N08
		'N08'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // D関東-G北陸  'DG'=>N08
		'N17'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // D関東-H関西  'DH'=>N17
		'N27'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // D関東-I中国  'DI'=>N27
		'N33'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // D関東-J四国  'DJ'=>N33
		'N38'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // D関東-K北九州'DK'=>N38
		'N41'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // D関東-L南九州'DL'=>N41
		'N41'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999) // D関東-M沖縄  'DM'=>N41
*/
// // 信越から//////////////////////////////( 60, 80,100,140,160,180,200,220,240,260,   ) サイズ
/*
		'N44'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // E信越-A北海道'AE'=>N44
		'N21'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // E信越-B北東北'BE'=>N21
		'N09'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // E信越-C南東北'CE'=>N09
		'N08'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // E信越-D関東  'DE'=>N08
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // E信越-E信越  'EE'=>N01
		'N06'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // E信越-F東海  'EF'=>N06
		'N06'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // E信越-G北陸  'EG'=>N06
		'N12'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // E信越-H関西  'EH'=>N12
		'N26'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // E信越-I中国  'EI'=>N26
		'N32'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // E信越-J四国  'EJ'=>N32
		'N36'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // E信越-K北九州'EK'=>N36
		'N40'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // E信越-L南九州'EL'=>N40
		'N39'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999) // E信越-M沖縄  'EM'=>N39
*/
// // 東海から//////////////////////////////( 60, 80,100,140,160,180,200,220,240,260,   ) サイズ
/*
		'N47'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // F東海-A北海道'AF'=>N47
		'N30'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // F東海-B北東北'BF'=>N30
		'N18'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // F東海-C南東北'CF'=>N18
		'N08'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // F東海-D関東  'DF'=>N08
		'N06'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // F東海-E信越  'EF'=>N06
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // F東海-F東海  'FF'=>N01
		'N03'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // F東海-G北陸  'FG'=>N03
		'N03'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // F東海-H関西  'FH'=>N03
		'N15'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // F東海-I中国  'FI'=>N15
		'N22'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // F東海-J四国  'FJ'=>N22
		'N24'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // F東海-K北九州'FK'=>N24
		'N28'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // F東海-L南九州'FL'=>N28
		'N28'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999) // F東海-M沖縄  'FM'=>N28
*/
// // 北陸から//////////////////////////////( 60, 80,100,140,160,180,200,220,240,260,   ) サイズ
/*
		'N47'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // G北陸-A北海道'AG'=>N47
		'N30'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // G北陸-B北東北'BG'=>N30
		'N18'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // G北陸-C南東北'CG'=>N18
		'N08'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // G北陸-D関東  'DG'=>N08
		'N06'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // G北陸-E信越  'EG'=>N06
		'N03'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // G北陸-F東海  'FG'=>N03
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // G北陸-G北陸  'GG'=>N01
		'N02'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // G北陸-H関西  'GH'=>N02
		'N16'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // G北陸-I中国  'GI'=>N16
		'N23'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // G北陸-J四国  'GJ'=>N23
		'N25'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // G北陸-K北九州'GK'=>N25
		'N29'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // G北陸-L南九州'GL'=>N29
		'N29'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999) // G北陸-M沖縄  'GM'=>N29
*/
// // 関西から//////////////////////////////( 60, 80,100,140,160,180,200,220,240,260,   ) サイズ
/*
		'N53'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // H関西-A北海道'AH'=>N53
		'N34'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // H関西-B北東北'BH'=>N34
		'N28'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // H関西-C南東北'CH'=>N28
		'N17'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // H関西-D関東  'DH'=>N17
		'N12'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // H関西-E信越  'EH'=>N12
		'N03'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // H関西-F東海  'FH'=>N03
		'N02'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // H関西-G北陸  'GH'=>N02
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // H関西-H関西  'HH'=>N01
		'N04'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // H関西-I中国  'HI'=>N04
		'N11'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // H関西-J四国  'HJ'=>N11
		'N14'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // H関西-K北九州'HK'=>N14
		'N20'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // H関西-L南九州'HL'=>N20
		'N20'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999) // H関西-M沖縄  'HM'=>N20
*/
// // 中国から//////////////////////////////( 60, 80,100,140,160,180,200,220,240,260,   ) サイズ
/*
		'N54'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // I中国-A北海道'AI'=>N54
		'N43'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // I中国-B北東北'BI'=>N43
		'N37'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // I中国-C南東北'CI'=>N37
		'N27'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // I中国-D関東  'DI'=>N27
		'N26'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // I中国-E信越  'EI'=>N26
		'N15'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // I中国-F東海  'FI'=>N15
		'N16'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // I中国-G北陸  'GI'=>N16
		'N04'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // I中国-H関西  'HI'=>N04
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // I中国-I中国  'II'=>N01
		'N10'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // I中国-J四国  'IJ'=>N10
		'N05'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // I中国-K北九州'IK'=>N05
		'N07'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // I中国-L南九州'IL'=>N07
		'N07'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999) // I中国-M沖縄  'IM'=>N07
*/
// // 四国から//////////////////////////////( 60, 80,100,140,160,180,200,220,240,260,   ) サイズ
/*
		'N55'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // J四国-A北海道'AJ'=>N55
		'N46'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // J四国-B北東北'BJ'=>N46
		'N45'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // J四国-C南東北'CJ'=>N45
		'N33'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // J四国-D関東  'DJ'=>N33
		'N32'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // J四国-E信越  'EJ'=>N32
		'N22'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // J四国-F東海  'FJ'=>N22
		'N23'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // J四国-G北陸  'GJ'=>N23
		'N11'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // J四国-H関西  'HJ'=>N11
		'N10'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // J四国-I中国  'IJ'=>N10
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // J四国-J四国  'JJ'=>N01
		'N13'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // J四国-K北九州'JK'=>N13
		'N19'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // J四国-L南九州'JL'=>N19
		'N19'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999) // J四国-M沖縄  'JM'=>N19
*/
// // 北九州から//////////////////////////////( 60, 80,100,140,160,180,200,220,240,260,   ) サイズ
/*
		'N56'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // K北九州-A北海道'AK'=>N56
		'N49'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // K北九州-B北東北'BK'=>N49
		'N48'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // K北九州-C南東北'CK'=>N48
		'N38'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // K北九州-D関東  'DK'=>N38
		'N36'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // K北九州-E信越  'EK'=>N36
		'N24'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // K北九州-F東海  'FK'=>N24
		'N25'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // K北九州-G北陸  'GK'=>N25
		'N14'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // K北九州-H関西  'HK'=>N14
		'N05'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // K北九州-I中国  'IK'=>N05
		'N13'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // K北九州-J四国  'JK'=>N13
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // K北九州-K北九州'KK'=>N01
		'N02'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // K北九州-L南九州'KL'=>N02
		'N02'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999) // K北九州-M沖縄  'KM'=>N02
*/
// // 南九州から//////////////////////////////( 60, 80,100,140,160,180,200,220,240,260,   ) サイズ
/*
		'N57'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // L南九州-A北海道'AL'=>N57
		'N51'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // L南九州-B北東北'BL'=>N51
		'N50'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // L南九州-C南東北'CL'=>N50
		'N41'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // L南九州-D関東  'DL'=>N41
		'N40'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // L南九州-E信越  'EL'=>N40
		'N28'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // L南九州-F東海  'FL'=>N28
		'N29'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // L南九州-G北陸  'GL'=>N29
		'N20'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // L南九州-H関西  'HL'=>N20
		'N07'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // L南九州-I中国  'IL'=>N07
		'N19'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // L南九州-J四国  'JL'=>N19
		'N02'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // K北九州-L南九州'KL'=>N02
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // L南九州-L南九州'LL'=>N01
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999) // L南九州-M沖縄  'LM'=>N01
*/
// // 沖縄から//////////////////////////////( 60, 80,100,140,160,180,200,220,240,260,   ) サイズ
/*
		'N52'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // M沖縄-A北海道'AM'=>N52
		'N51'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // M沖縄-B北東北'BM'=>N51
		'N50'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // M沖縄-C南東北'CM'=>N50
		'N41'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // M沖縄-D関東  'DM'=>N41
		'N39'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // M沖縄-E信越  'EM'=>N39
		'N28'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // M沖縄-F東海  'FM'=>N28
		'N29'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // M沖縄-G北陸  'GM'=>N29
		'N20'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // M沖縄-H関西  'HM'=>N20
		'N07'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // M沖縄-I中国  'IM'=>N07
		'N19'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // M沖縄-J四国  'JM'=>N19
		'N02'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // M沖縄-K北九州'KM'=>N02
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999), // M沖縄-L南九州'LM'=>N01
		'N01'=>ArrAy(999,999,999,999,999,999,999,999,999,999,999) // M沖縄-M沖縄  'MM'=>N01
*/
        );   
        // 地帯 - 地帯間の価格ランク
		// Zone - Price rank between zones
        $a_dist_to_rank = array(

/*北海道 A*/  'AA'=>'N01',
/*北東北 B*/  'AB'=>'N31','BB'=>'N01',
/*南東北 C*/  'AC'=>'N35','BC'=>'N01','CC'=>'N01',
/*  関東 D*/  'AD'=>'N42','BD'=>'N21','CD'=>'N09','DD'=>'N01',
/*  信越 E*/  'AE'=>'N44','BE'=>'N21','CE'=>'N09','DE'=>'N08','EE'=>'N01',
/*  東海 F*/  'AF'=>'N47','BF'=>'N30','CF'=>'N18','DF'=>'N08','EF'=>'N06','FF'=>'N01',
/*  北陸 G*/  'AG'=>'N47','BG'=>'N30','CG'=>'N18','DG'=>'N08','EG'=>'N06','FG'=>'N03','GG'=>'N01',
/*  関西 H*/  'AH'=>'N53','BH'=>'N34','CH'=>'N28','DH'=>'N17','EH'=>'N12','FH'=>'N03','GH'=>'N02','HH'=>'N01',
/*  中国 I*/  'AI'=>'N54','BI'=>'N43','CI'=>'N37','DI'=>'N27','EI'=>'N26','FI'=>'N15','GI'=>'N16','HI'=>'N04','II'=>'N01',
/*  四国 J*/  'AJ'=>'N55','BJ'=>'N46','CJ'=>'N45','DJ'=>'N33','EJ'=>'N32','FJ'=>'N22','GJ'=>'N23','HJ'=>'N11','IJ'=>'N10','JJ'=>'N01',
/*北九州 K*/  'AK'=>'N56','BK'=>'N49','CK'=>'N48','DK'=>'N38','EK'=>'N36','FK'=>'N24','GK'=>'N25','HK'=>'N14','IK'=>'N05','JK'=>'N13','KK'=>'N01',
/*南九州 L*/  'AL'=>'N57','BL'=>'N51','CL'=>'N50','DL'=>'N41','EL'=>'N40','FL'=>'N28','GL'=>'N29','HL'=>'N20','IL'=>'N07','JL'=>'N19','KL'=>'N02','LL'=>'N01',
/*  沖縄 M*/  'AM'=>'N52','BM'=>'N51','CM'=>'N50','DM'=>'N41','EM'=>'N39','FM'=>'N28','GM'=>'N29','HM'=>'N20','IM'=>'N07','JM'=>'N19','KM'=>'N02','LM'=>'N01','MM'=>'N01'
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

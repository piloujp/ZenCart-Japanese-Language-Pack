<?php
/*
 * Yupack Class.
 *
 * @copyright Copyright 2003-2025 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: pilou2/piloujp 2025 Mar 24 Modified in v2.1.0 $
 */

/*
    $rate = new _Yupack('yupack','通常便');
    $rate->SetOrigin('北海道', 'JP');   // 北海道から
    $rate->SetDest('東京都', 'JP');     // 東京都まで
    $rate->SetWeight(10);               // kg
    $rate->SetSize(20, 15, 10);         // Length, Width, Height (cm)
    $quote = $rate->GetQuote();
    print $quote['type'] . "<br>";
    print $quote['cost'] . "\n";
*/

namespace Zencart\Plugins\Catalog\Yubin;

class _Yupack {
    public $quote;
    public $OriginZone;
    public $OrigineChio;
    public $OriginCountryCode = 'JP';
    public $DestZone;
    public $DestCountryCode = 'JP';
    public $Weight = 0;
    public $Length = 0;
    public $Width  = 0;
    public $Height = 0;
    private $Surcharge;

    // コンストラクタ
    // $id:   module id
    // $titl: module name
    // $zone: 都道府県
    // $country: country code
    function __construct($id, $title, $zone = NULL, $country = NULL) {
        $this->quote = ['id' => $id, 'title' => $title];
        if($zone) {
            $this->SetOrigin($zone, $country);
        }
        $this->Surcharge = (strtotime('2026-10-01') < strtotime('today') ? 620 : 560);
    }
    // 発送元をセットする
    // $zone: 都道府県
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
    // サイズ区分(0～6)を返す
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
    function GetSizeClass() {
        if ($this->quote['id'] === 'yupackchilled') {
            // https://www.post.japanpost.jp/service/you_pack/chilled/index.html
            $a_classes = [
                [0,  60, 25],  // 区分,３辺計,重量
                [1,  80, 25],
                [2, 100, 25],
                [3, 120, 25],
                [4, 140, 25],
                [5, 150, 25],
            ];
            } else {
            $a_classes = [
                [0,  60,  30],  // 区分,３辺計,重量 [over 25kgs is 重量ゆうパック]
                [1,  80,  30],
                [2, 100, 30],
                [3, 120, 30],
                [4, 140, 30],
                [5, 160, 30],
                [6, 170, 30],
            ];
        }

        if (empty($this->Length) || empty($this->Width) || empty($this->Height)) {
            return -9;
        }
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
        if ($s_z1 && $s_z2) {
            if ($s_z1 === 'M' && $s_z2 != $s_z1) {
                    $s_z1 = $this->OrigineChio;
            }
            // 地帯コードをアルファベット順に連結する
            $s_key = ord($s_z1) <= ord($s_z2) ? $s_z1 . $s_z2 : $s_z2 . $s_z1;
        }
        return $s_key;
    }
    // 都道府県コから地帯コードを取得する
    // $zone: 都道府県
    function GetLZone($zone) {
        // 都道府県を地帯コード('A'～'L')に変換する
        //  北海道:'A' = 北海道 Hokkaido
        //  東北  :'B' = 青森県,岩手県,宮城県,秋田県,山形県,福島県 Tohoku
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
        $a_zonemap = [
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
        '沖縄県'=>'L',
        ];
        if ($zone === $this->OriginZone && !in_array($a_zonemap, ['北海道', '東京都', '沖縄県'])) {
            $this->OrigineChio = $a_zonemap[$zone];
            $a_zonemap[$zone] = 'M';
        }
        return $a_zonemap[$zone];
    }

    function GetQuote() {
        global $db;
        // 距離別の価格ランク: ランクコード => 価格(60,80,100,120,140,160,170)
        // https://www.post.japanpost.jp/service/you_pack/charge/ichiran.html

        $jsonarray = $db->Execute("SELECT quote_zone from " . TABLE_SHIPPING_RATES . " WHERE module = 'Yubin' AND method = 'Yupack' AND imple_date <= NOW() ORDER BY update_date DESC", 1);
        $a_pricerank = json_decode($jsonarray->fields["quote_zone"], true);

        if ($this->quote['id'] === 'yupackchilled') {
            // クール便追加コスト(60,80,100,120,140,150)
            $jsonarraycharges = $db->Execute("SELECT quote_zone from " . TABLE_SHIPPING_RATES . " WHERE module = 'Yubin' AND method = 'YupackChilled' AND imple_date <= NOW() ORDER BY update_date DESC", 1);
            $a_coolcharge = json_decode($jsonarraycharges->fields["quote_zone"], true);
        }

//        $a_pricerank = [
// ゆうパック運輸との契約によりサイズや重さの制限が変わりますので、「 function GetSizeClass()」で調整が必要です。
// Size and weight restrictions vary depending on the contract with Japan Post, so you will need to adjust them with "function GetSizeClass()".
// ///////////////////////// GetSizeClass [  0,  1,  2,  3,  4,  5,  6]

//        ２０２４年０８月現在の全ての送料（契約無し）　Full tarafication (no contract) as of August 2024
/*
        'N01' => [820,1130,1450,1770,2120,2450,3000], // 通常便(01) 近距離
        'N02' => [880,1200,1500,1830,2170,2500,3070], // 通常便(02)
        'N03' => [990,1310,1620,1940,2300,2610,3750], // 通常便(03)
        'N04' => [1100,1450,1810,2130,2510,2820,3970], // 通常便(04)
        'N05' => [1150,1440,1780,2080,2440,2750,3890], // 通常便(05)
        'N06' => [1340,1690,2030,2370,2730,3060,4200], // 通常便(06)
        'N07' => [1410,1710,2020,2340,2680,3010,4140], // 通常便(07)
        'N08' => [1450,1810,2160,2490,2860,3180,4350], // 通常便(08)
        'N09' => [1590,1890,2190,2500,2850,3170,4860], // 通常便(09)
        'N10' => [1600,1970,2320,2630,3010,3330,5040], // 通常便(10)
        'N11' => [1740,2040,2350,2650,3010,3330,5030], // 通常便(11)
        'N12' => [1750,2050,2380,2680,3060,3380,5090], // 通常便(12) 遠距離
*/
//        ];

        // 地帯 - 地帯間の価格ランク
        $a_dist_to_rank = [
/* 北海道'A' Hokkaido*/ 'AA'=>'N01',
/*   東北'B' Touhoku */ 'AB'=>'N05','BB'=>'N02',
/*   関東'C' Kantou  */ 'AC'=>'N07','BC'=>'N02','CC'=>'N02',
/*   東京'D' Tokyo   */ 'AD'=>'N07','BD'=>'N02','CD'=>'N02','DD'=>'N01',
/*   信越'E' Shinetu */ 'AE'=>'N07','BE'=>'N02','CE'=>'N02','DE'=>'N02','EE'=>'N02',
/*   北陸'F' Hokuriku*/ 'AF'=>'N09','BF'=>'N03','CF'=>'N02','DF'=>'N02','EF'=>'N02','FF'=>'N02',
/*   東海'G' Toukai  */ 'AG'=>'N09','BG'=>'N03','CG'=>'N02','DG'=>'N02','EG'=>'N02','FG'=>'N02','GG'=>'N02',
/*   近畿'H' Kinki   */ 'AH'=>'N11','BH'=>'N05','CH'=>'N03','DH'=>'N03','EH'=>'N03','FH'=>'N02','GH'=>'N02','HH'=>'N02',
/*   中国'I' Chugoku */ 'AI'=>'N11','BI'=>'N07','CI'=>'N05','DI'=>'N05','EI'=>'N05','FI'=>'N03','GI'=>'N03','HI'=>'N02','II'=>'N02',
/*   四国'J' Shikoku */ 'AJ'=>'N11','BJ'=>'N07','CJ'=>'N05','DJ'=>'N05','EJ'=>'N05','FJ'=>'N03','GJ'=>'N03','HJ'=>'N02','IJ'=>'N02','JJ'=>'N02',
/*   九州'K' Kyusyu  */ 'AK'=>'N11','BK'=>'N11','CK'=>'N07','DK'=>'N07','EK'=>'N07','FK'=>'N05','GK'=>'N05','HK'=>'N03','IK'=>'N02','JK'=>'N03','KK'=>'N02',
/*   沖縄'L' Okinawa */ 'AL'=>'N12','BL'=>'N12','CL'=>'N08','DL'=>'N08','EL'=>'N10','FL'=>'N10','GL'=>'N08','HL'=>'N08','IL'=>'N06','JL'=>'N08','KL'=>'N04','LL'=>'N01',
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
//                     | A 北海道  | B 東北    | C 関東    | D 東京    | E 信越    | F 北陸    | G 東海    | H 近畿    | I 中国    | J 四国    | K 九州    | L 沖縄
/*出荷元の都道府県。'M' Origin state */ 'MM'=>'N01',

        ];

        $s_key = $this->GetDistKey();
        $this->quote['cost'] = null;
        if ($s_key) {
            $s_rank = $a_dist_to_rank[$s_key];
            if ($s_rank) {
                $n_sizeclass = $this->GetSizeClass();
                if ($n_sizeclass < 0) {
                    $this->quote['error'] = ($n_sizeclass == -1) ? MODULE_SHIPPING_YUPACK_TEXT_OVERSIZE : MODULE_SHIPPING_YUPACK_TEXT_DIMENSION_MISSING;
                } else {
                    $this->quote['cost'] = $a_pricerank[$s_rank][$n_sizeclass] + (!empty($a_coolcharge) ? $a_coolcharge[$n_sizeclass] : 0);
                }
                if ($this->Weight >= 25) { // 重量ゆうパックは+５６０円になります
                    $this->quote['cost'] += $this->Surcharge;
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

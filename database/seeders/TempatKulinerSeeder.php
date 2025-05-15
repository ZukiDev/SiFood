<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TempatKuliner;
use App\Models\PreferensiTempatKuliner;

class TempatKulinerSeeder extends Seeder
{
    public function run(): void
    {
        // Mapping kategori dari CSV ke ID database
        $kategoriMap = [
            'Warung' => 1,    // ID untuk kategori Warung
            'Café' => 2,      // ID untuk kategori Kafe
            'Restoran' => 3,  // ID untuk kategori Restoran
        ];

        $data = [
            // Data Café (10 tempat)
            ['Burger Bangor Express, Geluran Sidoarjo', 'Café', 'Geluran, Sidoarjo', -7.3572634, 112.6934664, 2.4, 4.7, 4.6, 4.7, 51, 4, 'https://maps.app.goo.gl/BnWMSWpTKcLV6nZk9', 'https://gofood.link/a/N9sJ6vS', 'https://r.grab.com/g/6-20250506_230316_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C6XBFBD1JPCHLT', 'https://shopee.co.id/universal-link/now-food/shop/21846084?deep_and_deferred=1&shareChannel=copy_link'],
            ['Roti John Surabaya, Taman', 'Café', 'Taman, Sidoarjo', -7.3591091, 112.6814357, 4.3, 4.8, 4.8, 4.9, 54, 15, 'https://maps.app.goo.gl/dYzAEi1ooBSGe6iZ8', 'https://gofood.link/a/xztmDUQ', 'https://r.grab.com/g/6-20250507_144103_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-CZKHHB4ZGACHC6', 'https://shopee.co.id/universal-link/now-food/shop/727292?deep_and_deferred=1&shareChannel=copy_link'],
            ['Belikopi, Wonocolo', 'Café', 'Wonocolo, Sidoarjo', -7.3445428, 112.6937219, 4.0, 4.8, 4.8, 4.9, 28, 14, 'https://maps.app.goo.gl/bopK9N8A9dhDdzeBA', 'https://gofood.link/a/BPQQHps', 'https://r.grab.com/g/6-20250507_154431_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C2X1C6X3HBXXG2', 'https://shopee.co.id/universal-link/now-food/shop/1503653?deep_and_deferred=1&shareChannel=copy_link'],
            ['Esteh Indonesia, Sepanjang', 'Café', 'Sepanjang, Sidoarjo', -7.3479881, 112.6914229, 4.8, 5.0, 4.8, 4.9, 1, 55, 'https://maps.app.goo.gl/Po659X4rLqnCpFeP7', 'https://gofood.link/a/CsM6udC', 'https://r.grab.com/g/6-20250507_155611_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C243AUVZV6CDEX', 'https://shopee.co.id/universal-link/now-food/shop/20156181?deep_and_deferred=1&shareChannel=copy_link'],
            ['Jus Dragon, Taman', 'Café', 'Taman, Sidoarjo', -7.3633773, 112.6954636, 4.6, 4.7, 4.9, 4.9, 1, 115, 'https://maps.app.goo.gl/PDdM7V2Xu78Lmj7aA', 'https://gofood.link/a/BYm7NyQ', 'https://r.grab.com/g/6-20250507_213841_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C26DWFVHRGJYUE', 'https://shopee.co.id/universal-link/now-food/shop/1605065?deep_and_deferred=1&shareChannel=copy_link'],
            ['Kopi Kenangan, Geluran (DT)', 'Café', 'Geluran, Sidoarjo', -7.3565615, 112.6924838, 3.6, 4.6, 4.7, 4.9, 6, 58, 'https://maps.app.goo.gl/kAjkngQ5QcnvPMt98', 'https://gofood.link/a/P6i3wMs', 'https://r.grab.com/g/6-20250507_221137_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C66CJJN2JKWHNN', 'https://shopee.co.id/universal-link/now-food/shop/21968155?deep_and_deferred=1&shareChannel=copy_link'],
            ['Olala Siap Saji, Taman', 'Café', 'Taman, Sidoarjo', -7.3547374, 112.6960261, 4.8, 5.0, 4.8, 4.8, 47, 6, 'https://maps.app.goo.gl/P5X6TwcNFjHQNobm8', 'https://gofood.link/u/y1xKm', 'https://r.grab.com/g/6-20250508_151234_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C3XWG4D1TKUXLN', 'https://shopee.co.id/universal-link/now-food/shop/20980440?deep_and_deferred=1&shareChannel=copy_link'],
            ['Siklus Kopi, Si Kopi', 'Café', 'Taman, Sidoarjo', -7.3648108, 112.6986551, 5.0, 4.7, 4.3, 4.7, 1, 32, 'https://maps.app.goo.gl/V93zjMA5LRuqyjE97', 'https://gofood.link/u/djyVZ', 'https://r.grab.com/g/6-20250508_154851_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C3BWL4M1MFBVGN', 'https://shopee.co.id/universal-link/now-food/shop/20361068?deep_and_deferred=1&shareChannel=copy_link'],
            ['Patty Boss Burger - Jeruk Gamping, Krian', 'Café', 'Jeruk Gamping, Krian, Sidoarjo', -7.4152563, 112.5828236, 5.0, 4.9, 4.7, 4.9, 15, 6, 'https://maps.app.goo.gl/uvegTHvFCFwqqYuo8', 'https://gofood.link/a/Dr7r155', 'https://r.grab.com/g/6-20250305_145342_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C3DJTZAGMBKJC2', 'https://shopee.co.id/universal-link/now-food/shop/20308268?deep_and_deferred=1&shareChannel=copy_link'],
            ['Mixue Krian, Kemangsen', 'Café', 'Kemangsen, Krian, Sidoarjo', -7.4117761, 112.5724379, 4.3, 4.6, 4.9, 4.9, 1, 38, 'https://maps.app.goo.gl/NdaYwFCut3xfzEj69', 'https://gofood.link/a/L6t8cPE', 'https://r.grab.com/g/6-20250305_145921_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C6MXRRBFVTJUL6', 'https://shopee.co.id/universal-link/now-food/shop/21657685?deep_and_deferred=1&shareChannel=copy_link'],

            // Data Warung (10 tempat)
            ['SeIndonesia (Sei Sapi Dan Ayam), Juanda', 'Warung', 'Juanda, Sidoarjo', -7.3635093, 112.7352553, 3.7, 4.8, 4.8, 4.8, 26, 4, 'https://maps.app.goo.gl/wQdnbgPTzLT93aPV7', 'https://gofood.link/a/Nt2KgCd', 'https://r.grab.com/g/6-20250505_165944_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C62KTN2FTBVHNJ', 'https://shopee.co.id/universal-link/now-food/shop/21856742?deep_and_deferred=1&shareChannel=copy_link'],
            ['Ayam Geprek Joder ka Dhani, Sidoarjo 1', 'Warung', 'Sidoarjo', -7.4571414, 112.7209524, 3.9, 4.7, 4.4, 4.7, 29, 5, 'https://maps.app.goo.gl/ZB4xDhxXLq7qoC7fA', 'https://gofood.link/a/K4Wcg7Y', 'https://r.grab.com/g/6-20250505_170817_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C4NXGCDGPB3BLN', 'https://shopee.co.id/universal-link/now-food/shop/21019445?deep_and_deferred=1&shareChannel=copy_link'],
            ['Sego Godhong CakMad', 'Warung', 'Taman, Sidoarjo', -7.3632373, 112.7020222, 4.5, 4.6, 4.8, 4.9, 17, 3, 'https://maps.app.goo.gl/Sipx6gGFCMbrFMC2A', 'https://gofood.link/a/CU2huTj', 'https://r.grab.com/g/6-20250506_153949_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C26UG4CFR7VBA2', 'https://shopee.co.id/universal-link/now-food/shop/20246442?deep_and_deferred=1&shareChannel=copy_link'],
            ['Ayam geprek Arnet, Taman', 'Warung', 'Taman, Sidoarjo', -7.3510401, 112.6785331, 4.1, 4.7, 4.8, 4.8, 48, 12, 'https://maps.app.goo.gl/svJU9ji3EsvgtHuP8', 'https://gofood.link/a/xVbjxC9', 'https://r.grab.com/g/6-20250507_134021_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-CZKFL7NELABHVA', 'https://shopee.co.id/universal-link/now-food/shop/1022311?deep_and_deferred=1&shareChannel=copy_link'],
            ['Ayam Say Cheese, Taman', 'Warung', 'Taman, Sidoarjo', -7.3501172, 112.6871682, 4.9, 4.4, 4.7, 4.8, 20, 17, 'https://maps.app.goo.gl/utG25gnrPbt6C2gJA', 'https://gofood.link/a/xrBkWRS', 'https://r.grab.com/g/6-20250507_153053_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-CZE3RE6VTULWVA', 'https://shopee.co.id/universal-link/now-food/shop/20451732?deep_and_deferred=1&shareChannel=copy_link'],
            ['AYAM GEPREK WOWW, Kedungturi-Taman-Sepanjang', 'Warung', 'Kedungturi, Taman, Sepanjang, Sidoarjo', -7.3500409, 112.7077099, 4.5, 4.9, 4.9, 4.8, 36, 10, 'https://maps.app.goo.gl/8kUzXC91r2ngwH3K9', 'https://gofood.link/a/JDTkpSL', 'https://r.grab.com/g/6-20250507_161113_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C4MDCNMEGXLHAE', 'https://shopee.co.id/universal-link/now-food/shop/21385419?deep_and_deferred=1&shareChannel=copy_link'],
            ['Depot Mie Widjaya, Taman', 'Warung', 'Taman, Sidoarjo', -7.3542105, 112.6820177, 4.1, 4.8, 4.8, 4.8, 21, 1, 'https://maps.app.goo.gl/krU6kau4mHqZT4or9', 'https://gofood.link/a/EX2wUaJ', 'https://r.grab.com/g/6-20250507_161630_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C3TBTTUYUENBBA', 'https://shopee.co.id/universal-link/now-food/shop/20758687?deep_and_deferred=1&shareChannel=copy_link'],
            ['Uri Corndog Palapa, Toserba Palapa Kalijaten', 'Warung', 'Toserba Palapa Kalijaten, Sidoarjo', -7.4463646, 112.7024344, 5.0, 4.7, 4.8, 4.8, 17, 1, 'https://maps.app.goo.gl/yB24DHhkapvLYoPx8', 'https://gofood.link/a/FznH5JQ', 'https://r.grab.com/g/6-20250507_162429_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C3VXRALDR8MFFE', 'https://shopee.co.id/universal-link/now-food/shop/20911053?deep_and_deferred=1&shareChannel=copy_link'],
            ['Indomie Goreng \'Setan Istighfar\', Nangka 1', 'Warung', 'Nangka 1, Sidoarjo', -7.3617922, 112.6941933, 4.2, 4.0, 4.6, 4.8, 72, 10, 'https://maps.app.goo.gl/gVkZQd9w7ng1uDHy5', 'https://gofood.link/a/B8JU7bG', 'https://r.grab.com/g/6-20250507_210843_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C3KDLYBTSBVWNX', 'https://shopee.co.id/universal-link/now-food/shop/20524470?deep_and_deferred=1&shareChannel=copy_link'],
            ['Nasi Bakar Bang Jerry, Taman', 'Warung', 'Taman, Sidoarjo', -7.3617564, 112.6958402, 4.8, 4.9, 4.8, 4.8, 34, 19, 'https://maps.app.goo.gl/dS8WQPHrc6oTHZ5H9', 'https://gofood.link/a/xVdjiA9', 'https://r.grab.com/g/6-20250507_213359_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C2TCAUJJC6LYCA', 'https://shopee.co.id/universal-link/now-food/shop/20080157?deep_and_deferred=1&shareChannel=copy_link'],

            // Data Restoran (10 tempat)
            ['Mie Gacoan, Geluran', 'Restoran', 'Geluran, Sidoarjo', -7.3567666, 112.6931693, 4.6, 4.8, 4.8, 4.8, 19, 29, 'https://maps.app.goo.gl/VcF3qHdSmDpk7YwJ9', 'https://gofood.link/a/JW61WRS', 'https://r.grab.com/g/6-20250505_163833_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C4NDARLVEJDHN6', 'https://shopee.co.id/universal-link/now-food/shop/21404515?deep_and_deferred=1&shareChannel=copy_link'],
            ['McDonald\'s, Sidoarjo-Taman Geluran', 'Restoran', 'Taman Geluran, Sidoarjo', -7.3565365, 112.6929233, 4.4, 4.8, 4.8, 4.9, 135, 19, 'https://maps.app.goo.gl/3rJG8vg9eCvcQ1Xx6', 'https://gofood.link/u/ly3wq', 'https://r.grab.com/g/6-20250505_164648_150664b0b5e54e81840dd212dc1b567a_MEXMPS-IDGFSTI00001n69', 'https://shopee.co.id/universal-link/now-food/shop/1142529?deep_and_deferred=1&shareChannel=copy_link'],
            ['Domino\'s Pizza, Pahlawan Kalijaten Sidoarjo', 'Restoran', 'Pahlawan Kalijaten, Sidoarjo', -7.3535413, 112.6915427, 4.6, 4.8, 4.8, 4.9, 53, 4, 'https://maps.app.goo.gl/BZb12GTA3ccHZEnf7', 'https://gofood.link/a/CvWBtgs', 'https://r.grab.com/g/6-20250505_171644_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C25TG3T3EFJJPA', 'https://shopee.co.id/universal-link/now-food/shop/20189739?deep_and_deferred=1&shareChannel=copy_link'],
            ['Toby\'s, Taman Pondok Jati', 'Restoran', 'Taman Pondok Jati, Sidoarjo', -7.3669681, 112.6956207, 4.5, 4.9, 4.8, 4.8, 43, 10, 'https://maps.app.goo.gl/FM3uAnecX2FSEUSKA', 'https://gofood.link/a/zqURV2o', 'https://r.grab.com/g/6-20250505_172914_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C2DJG2KWVGBCNA', 'https://shopee.co.id/universal-link/now-food/shop/760403?deep_and_deferred=1&shareChannel=copy_link'],
            ['Pizza Hut Delivery - PHD, Geluran Sidoarjo', 'Restoran', 'Geluran, Sidoarjo', -7.3516808, 112.6913483, 4.7, 4.9, 4.8, 4.9, 26, 4, 'https://maps.app.goo.gl/uBFhjBELCT13Rzco7', 'https://gofood.link/u/3da7y', 'https://r.grab.com/g/6-20250506_221102_150664b0b5e54e81840dd212dc1b567a_MEXMPS-AWjYR86X2bMmVZfr_hHb', 'https://shopee.co.id/universal-link/now-food/shop/291732?deep_and_deferred=1&shareChannel=copy_link'],
            ['KFC, Geluran Sidoarjo', 'Restoran', 'Geluran, Sidoarjo', -7.3564923, 112.692588, 4.1, 4.8, 4.6, 4.8, 42, 12, 'https://maps.app.goo.gl/AatFkcNEEEMhgYX39', 'https://gofood.link/a/JueKxb5', 'https://r.grab.com/g/6-20250506_221633_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C4EVJ66BL75ZT2', 'https://shopee.co.id/universal-link/now-food/shop/21382397?deep_and_deferred=1&shareChannel=copy_link'],
            ['Richeese Factory, Taman Sidoarjo', 'Restoran', 'Taman, Sidoarjo', -7.3565405, 112.6923476, 4.8, 4.8, 4.8, 4.9, 84, 22, 'https://maps.app.goo.gl/9UBwsZRGAQiA9vqb6', 'https://gofood.link/a/N9rjGrE', 'https://r.grab.com/g/6-20250506_222309_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C6WJJ4DTJEVTTX', 'https://shopee.co.id/universal-link/now-food/shop/21783957?deep_and_deferred=1&shareChannel=copy_link'],
            ['Mie Mapan, Sepanjang', 'Restoran', 'Sepanjang, Sidoarjo', -7.3546704, 112.691447, 4.6, 5.0, 4.9, 4.9, 43, 23, 'https://maps.app.goo.gl/VD5fsLBCYKEsZJ4A9', 'https://gofood.link/a/zxhbRfU', 'https://r.grab.com/g/6-20250507_133511_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-C2MECFBCRRLFLT', 'https://shopee.co.id/universal-link/now-food/shop/652116?deep_and_deferred=1&shareChannel=copy_link'],
            ['Pizza Hut Delivery - PHD, Geluran Sidoarjo', 'Restoran', 'Geluran, Sidoarjo', -7.3516808, 112.6913483, 4.7, 4.9, 4.8, 4.9, 34, 6, 'https://maps.app.goo.gl/3wZ3YnofHCtVZsRT6', 'https://gofood.link/u/3da7y', 'https://r.grab.com/g/6-20250507_205950_150664b0b5e54e81840dd212dc1b567a_MEXMPS-AWjYR86X2bMmVZfr_hHb', 'https://shopee.co.id/universal-link/now-food/shop/291732?deep_and_deferred=1&shareChannel=copy_link'],
            ['Ayam Bakar Pak "D", Sepanjang', 'Restoran', 'Sepanjang, Sidoarjo', -7.3521988, 112.6912908, 4.2, 4.7, 4.7, 4.8, 30, 4, 'https://maps.app.goo.gl/WKL4UEc1dMzyetxt5', 'https://gofood.link/u/4Y2v', 'https://r.grab.com/g/6-20250507_212455_150664b0b5e54e81840dd212dc1b567a_MEXMPS-6-CZA3FA6UTKTBUE', 'https://shopee.co.id/universal-link/now-food/shop/185639?deep_and_deferred=1&shareChannel=copy_link'],
        ];

        foreach ($data as $item) {
            $tempat = TempatKuliner::create([
                'nama' => $item[0],
                'kategori_id' => $kategoriMap[$item[1]],
                'alamat' => $item[2],
                'latitude' => $item[3],
                'longitude' => $item[4],
            ]);

            PreferensiTempatKuliner::create([
                'tempat_id' => $tempat->tempat_id,
                'rating_google' => $item[5],
                'rating_gofood' => $item[6],
                'rating_grabfood' => $item[7],
                'rating_shopeefood' => $item[8],
                'jumlah_makanan' => $item[9],
                'jumlah_minuman' => $item[10],
                'link_gmaps' => $item[11],
                'link_gofood' => $item[12],
                'link_grabfood' => $item[13],
                'link_shopeefood' => $item[14],
            ]);
        }
    }
}

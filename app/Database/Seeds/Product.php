<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Product extends Seeder
{
    public function run()
    {
        $productModel = new \App\Models\Product();
        $encrypter = \Config\Services::encrypter();
        $data = [
            [
                'id_categoryProduct' => 1,
                'id_shop' => 1,
                'name_product' => $encrypter->encrypt('Gayo Takengon'),
                'description_product' => $encrypter->encrypt('Untuk penggemar kopi arabika dengan profil rasa dark chocolate, produk ini bisa menjadi pilihan. Selain note dark chocolate, Anda juga akan merasakan note brown sugar dan orange zest sehingga menghasilkan perpaduan rasa yang menarik. '),
                'price_product' => 55000,
                'recomended' => True
            ],
            [
                'id_categoryProduct' => 1,
                'id_shop' => 1,
                'name_product' => $encrypter->encrypt('Gayo Aceh'),
                'description_product' => $encrypter->encrypt('Kopi arabika yang di-roasting hingga medium level dan digiling sedang ini merupakan pilihan tepat untuk pour over V60. Ketika menyeduh kopi ini, indra penciuman Anda akan dimanjakan dengan aroma kopi Gayo yang khas. Sementara itu, lidah akan merasakan sensasi citrus yang berpadu dengan brown sugar, dark chocolate, dan sweet. Terbayang, kan, sensasinya?'),
                'price_product' => 60000,
                'recomended' => True
            ],
            [
                'id_categoryProduct' => 1,
                'id_shop' => 1,
                'name_product' => $encrypter->encrypt('Mokka'),
                'description_product' => $encrypter->encrypt('Setelah dijemur di bawah matahari, kopi arabika akan disimpan selama 8 tahun (fermentasi) untuk menurunkan keasaman dan kafeinnya. Dengan demikian, kopi ini memiliki rasa yang lebih lembut dan aman untuk lambung.'),
                'price_product' => 50000,
                'recomended' => False
            ],
            [
                'id_categoryProduct' => 2,
                'id_shop' => 1,
                'name_product' => $encrypter->encrypt('Nescafe Gold'),
                'description_product' => $encrypter->encrypt('Cukup banyak metode manual brewing yang dapat dipilih bila Anda ingin menikmati kopi tanpa ampas. Namun, pada pagi hari yang padat aktivitas, tidak semua orang sempat menyeduh kopi secara manual.'),
                'price_product' => 30000,
                'recomended' => True
            ],
            [
                'id_categoryProduct' => 2,
                'id_shop' => 1,
                'name_product' => $encrypter->encrypt('Excelso Robusta Gold'),
                'description_product' => $encrypter->encrypt('Untuk Anda yang ingin menikmati praktisnya kopi robusta, tetapi ingin merasakan kesegaran kopi optimal, cobalah produk ini. Excelso Robusta Gold dikemas dengan teknologi Aroma Locked sehingga kopi tetap terasa segar saat dinikmati. Selain itu, kopi ini memiliki body yang tidak terlalu tebal dengan notes kacang, sereal, dan cokelat.'),
                'price_product' => 65000,
                'recomended' => False
            ],
            [
                'id_categoryProduct' => 2,
                'id_shop' => 1,
                'name_product' => $encrypter->encrypt('Toraja Rantebua'),
                'description_product' => $encrypter->encrypt('Kopi Toraja Rantebua menambah varian dari kopi Toraja yang sudah ada, seperti Toraja Sapan dan Toraja Kalosi. Kopi jenis ini menghadirkan rasa cokelat dan karamel saat Anda menyeruputnya'),
                'price_product' => 40000,
                'recomended' => False
            ],
            [
                'id_categoryProduct' => 3,
                'id_shop' => 1,
                'name_product' => $encrypter->encrypt('Little Sweet'),
                'description_product' => $encrypter->encrypt('Kopi liberika ini adalah salah satu partner terbaik untuk singkirkan rasa kantuk dalam waktu singkat. Selain rasa manis dan nutty, kopi ini juga diklaim memiliki taste spicy dan smokey, lho! Ditambah dengan adanya aksen mint, mata Anda pun bisa lebih tercelik usai menikmati secangkir kopi liberika ini.'),
                'price_product' => 58000,
                'recomended' => False
            ],
            [
                'id_categoryProduct' => 3,
                'id_shop' => 1,
                'name_product' => $encrypter->encrypt('Gold Dib'),
                'description_product' => $encrypter->encrypt('Anda akan merasakan kombinasi rasa kopi, nangka, dan cokelat saat meneguk kopi liberika ini. Dipadukan dengan adanya hint floral, mulut dan tenggorokan pun terasa fresh usai meminum kopi ini. Layak dicoba untuk Anda yang ingin merasakan lezatnya kopi liberika yang segar di mulut dan kuat rasa nangkanya.'),
                'price_product' => 60000,
                'recomended' => False
            ],
            [
                'id_categoryProduct' => 3,
                'id_shop' => 1,
                'name_product' => $encrypter->encrypt('Coffee Pod'),
                'description_product' => $encrypter->encrypt('Tak ada lagi tidak sempat minum kopi karena terlalu sibuk atau malas menggiling biji kopi. Coffeeso memproduksi kopi liberika dalam kemasan pods. Anda hanya perlu menyiram pods tersebut dengan air panas.'),
                'price_product' => 40000,
                'recomended' => True
            ],
        ];
        for ($i=0; $i < 9; $i++) { 
            $productModel->save($data[$i]);
        }
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $userModel = new \App\Models\User();
        $encrypter = \Config\Services::encrypter();
        $data = [
            [
                'id_shop' => 1,
                'email' => $encrypter->encrypt('bagaskara@gmail.com'),
                'name' => $encrypter->encrypt('bagaskara'),
                'comment' => $encrypter->encrypt('aku sangat suka coffee disini karena sangat gurih'),
                'post' => True,
                'date' => date("Y-m-d H:i:s", strtotime("2024-07-25 15:30:00"))
            ],
            [
                'id_shop' => 1,
                'email' => $encrypter->encrypt('joko@gmail.com'),
                'name' => $encrypter->encrypt('joko'),
                'comment' => $encrypter->encrypt('coffee nya gurih dengan aroma yang khas, aku sukla sekali dengan coffee disini'),
                'post' => True,
                'date' => date("Y-m-d H:i:s", strtotime("2024-07-26 15:30:00"))
            ],
            [
                'id_shop' => 1,
                'email' => $encrypter->encrypt('koko@gmail.com'),
                'name' => $encrypter->encrypt('koko'),
                'comment' => $encrypter->encrypt('coffenya nyaman di lambung , rasanya mantap sekali'),
                'post' => True,
                'date' => date("Y-m-d H:i:s", strtotime("2024-07-27 15:30:00"))
            ],
            [
                'id_shop' => 1,
                'email' => $encrypter->encrypt('daus@gmail.com'),
                'name' => $encrypter->encrypt('daus'),
                'comment' => $encrypter->encrypt('suka banget dengan kopi yang ada disini, pelayanannya juga ramah dan cepat'),
                'post' => True,
                'date' => date("Y-m-d H:i:s", strtotime("2024-07-28 15:30:00"))
            ],
            [
                'id_shop' => 1,
                'email' => $encrypter->encrypt('jawir@gmail.com'),
                'name' => $encrypter->encrypt('jawir'),
                'comment' => $encrypter->encrypt('kopinya b aja , pelayannya juga kurang cepat, bikin ngantuk'),
                'post' => False,
                'date' => date("Y-m-d H:i:s", strtotime("2024-07-29 11:30:00"))
            ],
        ];
        
        foreach ($data as $user) {
            $userModel->save($user);
        }
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoryProduct extends Seeder
{
    public function run()
    {
        $categoryProductModel = new \App\Models\CategoryProduct();
        $encrypter = \Config\Services::encrypter();
        $data = [
            [
                'name_categoryProduct' => $encrypter->encrypt('Arabika')
            ],
            [
                'name_categoryProduct' => $encrypter->encrypt('Robusta')
            ],
            [
                'name_categoryProduct' => $encrypter->encrypt('Liberica')
            ],
        ];
        for ($i=0; $i < 3; $i++) { 
            $categoryProductModel->save($data[$i]);
        }
    }
}

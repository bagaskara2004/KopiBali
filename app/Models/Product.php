<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table            = 'product';
    protected $primaryKey       = 'id_product';
    protected $allowedFields    = ['id_categoryProduct', 'id_shop', 'name_product', 'description_product','photo_product', 'price_product','recomended'];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $encrypter;

    public function __construct()
    {
        parent::__construct();
        $this->encrypter = \Config\Services::encrypter();
    }

    public function recomended() {
        $datas = $this->select('product.name_product,product.description_product,product.photo_product,product.price_product,categoryproduct.name_categoryProduct')->join('categoryproduct','product.id_categoryProduct = categoryproduct.id_categoryProduct')->where('recomended',true)->findAll();
        $results = [];
        foreach ($datas as $data) {
            $results[] = [
                'name' => $this->encrypter->decrypt($data['name_product']),
                'description' => $this->convertDescription($this->encrypter->decrypt($data['description_product'])),
                'photo' => $this->encrypter->decrypt($data['photo_product']),
                'price' => $data['price_product'],
                'category' => $this->encrypter->decrypt($data['name_categoryProduct'])
            ];
        }
        return $results;
    }

    public function convertDescription($teks) {
        $newTeks = '';
        for ($i=0; $i < 100; $i++) { 
            $newTeks .= $teks[$i];  
        }
        return $newTeks.'....';
    }
}

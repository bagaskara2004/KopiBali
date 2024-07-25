<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table            = 'product';
    protected $primaryKey       = 'id_product';
    protected $allowedFields    = ['id_categoryProduct', 'id_shop', 'name_product', 'description_product', 'photo_product', 'price_product', 'recomended'];
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

    public function getAllProduct()
    {
        $datas = $this->select('product.*,categoryproduct.*')->join('categoryproduct', 'product.id_categoryProduct = categoryproduct.id_categoryProduct')->findAll();;
        $results = [];
        foreach ($datas as $data) {
            $results[] = [
                'id_product' => $data['id_product'],
                'name' => $this->encrypter->decrypt($data['name_product']),
                'description' => $this->convertDescription($this->encrypter->decrypt($data['description_product'])),
                'photo' => $this->encrypter->decrypt($data['photo_product']),
                'price' => 'Rp.' . $data['price_product'],
                'category' => $this->encrypter->decrypt($data['name_categoryProduct']),
                'id_category' => $data['id_categoryProduct']
            ];
        }
        return $results;
    }
    public function recomended()
    {
        $datas = $this->select('product.*,categoryproduct.name_categoryProduct')->join('categoryproduct', 'product.id_categoryProduct = categoryproduct.id_categoryProduct')->where('recomended', true)->findAll();
        $results = [];
        foreach ($datas as $data) {
            $results[] = [
                'id_product' => $data['id_product'],
                'name' => $this->encrypter->decrypt($data['name_product']),
                'description' => $this->convertDescription($this->encrypter->decrypt($data['description_product'])),
                'photo' => $this->encrypter->decrypt($data['photo_product']),
                'price' => 'Rp.' . $data['price_product'],
                'category' => $this->encrypter->decrypt($data['name_categoryProduct'])
            ];
        }
        return $results;
    }

    public function convertDescription($teks)
    {
        $newTeks = '';
        for ($i = 0; $i < 100; $i++) {
            $newTeks .= $teks[$i];
        }
        return $newTeks . '....';
    }

    public function getProductById($id)
    {
        $datas = $this->select('product.*,categoryproduct.name_categoryProduct')->join('categoryproduct', 'product.id_categoryProduct = categoryproduct.id_categoryProduct')->find($id);
        if (!$datas) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Product Tidak Ditemukan");
        }
        $results = [
            'name' => $this->encrypter->decrypt($datas['name_product']),
            'description' => $this->encrypter->decrypt($datas['description_product']),
            'photo' => $this->encrypter->decrypt($datas['photo_product']),
            'price' => 'Rp.' . $datas['price_product'],
            'category' => $this->encrypter->decrypt($datas['name_categoryProduct']),
        ];
        return $results;
    }
    public function getProduct()
    {
        $datas = $this->findAll();
        $results = [];
        foreach ($datas as $data) {
            $results[] = [
                'id_product' => $data['id_product'],
                'name_product' => $this->encrypter->decrypt($data['name_product']),
                'description_product' => $this->encrypter->decrypt($data['description_product']),
                'photo_product' => $this->encrypter->decrypt($data['photo_product']),
                'price_product' => 'Rp.' . $data['price_product'],
                'recomended' =>  $data['recomended'],

            ];
        }
        return $results;
    }
    public function saveProduct($data)
    {
        $data['name_product'] = $this->encrypter->encrypt($data['name_product']);
        $data['description_product'] = $this->encrypter->encrypt($data['description_product']);
        $data['photo_product'] = $this->encrypter->encrypt($data['photo_product']);


        return $this->save($data);
    }

    public function updateProduct($id, $data)
    {
        $data['name_product'] = $this->encrypter->encrypt($data['name_product']);
        $data['description_product'] = $this->encrypter->encrypt($data['description_product']);
        $data['photo_product'] = $this->encrypter->encrypt($data['photo_product']);
        return $this->update($id, $data);
    }
    public function getProductCount()
    {
        return $this->countAllResults();
    }
}

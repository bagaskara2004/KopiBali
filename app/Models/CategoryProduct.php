<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryProduct extends Model
{
    protected $table            = 'categoryproduct';
    protected $primaryKey       = 'id_categoryProduct';
    protected $allowedFields    = ['name_categoryProduct'];
    protected $encrypter;

    public function __construct()
    {
        parent::__construct();
        $this->encrypter = \Config\Services::encrypter();
    }

    public function getAllCategoryProduct()
    {
        $datas = $this->findAll();
        $results = [];
        foreach ($datas as $data) {
            $results[] = [
                'id_categoryProduct' => $data['id_categoryProduct'],
                'name_categoryProduct' => $this->encrypter->decrypt($data['name_categoryProduct'])
            ];
        }
        return $results;
    }
    public function saveCategoryProduct($data)
    {
        if (isset($data['name_categoryProduct'])) {
            $data['name_categoryProduct'] = $this->encrypter->encrypt($data['name_categoryProduct']);
        }
        return $this->save($data);
    }

    public function getCategoryProductById($id)
    {
        $data = $this->find($id);
        if ($data) {
            $data['name_categoryProduct'] = $this->encrypter->decrypt($data['name_categoryProduct']);
        }
        return $data;
    }

    public function updateCategoryProduct($id, $data)
    {
        if (isset($data['name_categoryProduct'])) {
            $data['name_categoryProduct'] = $this->encrypter->encrypt($data['name_categoryProduct']);
        }
        return $this->update($id, $data);
    }
}

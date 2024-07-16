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

    public function getAllCategoryProduct() {
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
}

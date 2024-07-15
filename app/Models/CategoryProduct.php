<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryProduct extends Model
{
    protected $table            = 'categoryproduct';
    protected $primaryKey       = 'id_categoryProduct';
    protected $allowedFields    = ['name_categoryProduct'];

    public function __construct()
    {
        parent::__construct();
    }
}

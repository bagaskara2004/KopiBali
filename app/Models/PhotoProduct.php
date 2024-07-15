<?php

namespace App\Models;

use CodeIgniter\Model;

class PhotoProduct extends Model
{
    protected $table            = 'photoproduct';
    protected $primaryKey       = 'id_photoProduct';
    protected $allowedFields    = ['id_product','photo_product'];

    public function __construct()
    {
        parent::__construct();
    }
}

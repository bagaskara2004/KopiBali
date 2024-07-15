<?php

namespace App\Models;

use CodeIgniter\Model;

class Shop extends Model
{
    protected $table            = 'shop';
    protected $primaryKey       = 'id_shop';
    public function __construct()
    {
        parent::__construct();
    }
    
}

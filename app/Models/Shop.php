<?php

namespace App\Models;

use CodeIgniter\Model;

class Shop extends Model
{
    protected $table            = 'shop';
    protected $primaryKey       = 'id_shop';
    protected $allowedFields    = ['name', 'email', 'address', 'telp', 'maps','password','gallery','open','close'];
    protected $useTimestamps = false;
    public function __construct()
    {
        parent::__construct();
    }
    
}

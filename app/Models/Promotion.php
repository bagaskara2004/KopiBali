<?php

namespace App\Models;

use CodeIgniter\Model;

class Promotion extends Model
{
    protected $table            = 'promotion';
    protected $primaryKey       = 'id_promotion';
    
    public function __construct()
    {
        parent::__construct();
    }
}

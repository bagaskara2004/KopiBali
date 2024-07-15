<?php

namespace App\Models;

use CodeIgniter\Model;

class Promotion extends Model
{
    protected $table            = 'promotion';
    protected $primaryKey       = 'id_promotion';
    protected $allowedFields    = ['id_shop','title_promotion','description_promotion','photo_promotion','start_date','end_date'];
    
    public function __construct()
    {
        parent::__construct();
    }
}

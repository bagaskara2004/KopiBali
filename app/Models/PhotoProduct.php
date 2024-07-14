<?php

namespace App\Models;

use CodeIgniter\Model;

class PhotoProduct extends Model
{
    protected $table            = 'photoproduct';
    protected $primaryKey       = 'id_photoProduct';

    public function __construct()
    {
        parent::__construct();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryMedia extends Model
{
    protected $table            = 'categorymedia';
    protected $primaryKey       = 'id_categoryMedia';

    public function __construct()
    {
        parent::__construct();
    }
}

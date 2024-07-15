<?php

namespace App\Models;

use CodeIgniter\Model;

class Media extends Model
{
    protected $table            = 'media';
    protected $primaryKey       = 'id_media';
    protected $allowedFields    = ['id_categoryMedia','id_shop','link_media'];

    public function __construct()
    {
        parent::__construct();
    }
}

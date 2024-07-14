<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'email';
    protected $allowedFields    = ['email', 'id_shop', 'name', 'comment', 'post'];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'date';

    public function __construct()
    {
        parent::__construct();
    }
    
}

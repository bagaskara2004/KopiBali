<?php

namespace App\Models;

use CodeIgniter\Model;

class Shop extends Model
{
    protected $table            = 'shop';
    protected $primaryKey       = 'id_shop';
    protected $allowedFields    = ['name', 'email', 'address', 'telp', 'maps','password','gallery','open','close'];
    protected $useTimestamps = false;
    protected $encrypter;
    
    public function __construct()
    {
        parent::__construct();
        $this->encrypter = \Config\Services::encrypter();
    }

    public function getShopById($id) {
        $data = $this->find($id);
        if (!$data) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $result = [
            'id_shop' => $data['id_shop'],
            'name' => $this->encrypter->decrypt($data['name']),
            'email' => $this->encrypter->decrypt($data['email']),
            'address' => $this->encrypter->decrypt($data['address']),
            'telp' => $this->encrypter->decrypt($data['telp']),
            'maps' => $data['maps'],
            'password' => $this->encrypter->decrypt($data['password']),
            'gallery' => $this->encrypter->decrypt($data['gallery']),
            'open' => $data['open'],
            'close' => $data['close'],
        ];
        return $result;
    }
    
}

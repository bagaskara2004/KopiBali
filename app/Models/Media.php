<?php

namespace App\Models;

use CodeIgniter\Model;

class Media extends Model
{
    protected $table            = 'media';
    protected $primaryKey       = 'id_media';
    protected $allowedFields    = ['id_shop','name_media','link_media'];
    protected $encrypter;

    public function __construct()
    {
        parent::__construct();
        $this->encrypter = \Config\Services::encrypter();
    }

    public function getAllMedia()
    {
        $datas = $this->findAll();;
        $results = [];
        foreach ($datas as $data) {
            $results[] = [
                'name' => $this->encrypter->decrypt($data['name_media']),
                'link' => $this->encrypter->decrypt($data['link_media']),
            ];
        }
        return $results;
    }
}

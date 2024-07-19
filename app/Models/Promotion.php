<?php

namespace App\Models;

use CodeIgniter\Model;

class Promotion extends Model
{
    protected $table            = 'promotion';
    protected $primaryKey       = 'id_promotion';
    protected $allowedFields    = ['id_shop','title_promotion','description_promotion','photo_promotion','start_date','end_date'];
    protected $encrypter;
    
    public function __construct()
    {
        parent::__construct();
        $this->encrypter = \Config\Services::encrypter();
    }

    public function getAllPromotion() {
        $datas = $this->findAll();
        $results = [];
        foreach ($datas as $data) {
            $results[] = [
                'id_promotion' => $data['id_promotion'],
                'id_shop' => $data['id_shop'],
                'title' => $this->encrypter->decrypt($data['title_promotion']),
                'description' => $this->encrypter->decrypt($data['description_promotion']),
                'photo' => $this->encrypter->decrypt($data['photo_promotion']),
                'start' => $data['start_date'],
                'end' => $data['end_date']
            ];
        }
        return $results;
    }

    public function getPhotoPromotion() {
        $datas = $this->select('id_promotion,photo_promotion')->findAll();
        $results = [];
        foreach ($datas as $data) {
            $results[] = [
                'id_promotion' => $data['id_promotion'],
                'photo' => $this->encrypter->decrypt($data['photo_promotion']),
            ];
        }
        return $results;
    }
}

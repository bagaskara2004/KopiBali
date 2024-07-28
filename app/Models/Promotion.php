<?php

namespace App\Models;

use CodeIgniter\Model;

class Promotion extends Model
{
    protected $table            = 'promotion';
    protected $primaryKey       = 'id_promotion';
    protected $allowedFields    = ['id_shop', 'title_promotion', 'description_promotion', 'photo_promotion', 'start_date', 'end_date'];
    protected $encrypter;

    public function __construct()
    {
        parent::__construct();
        $this->encrypter = \Config\Services::encrypter();
    }

    public function getAllPromotion()
    {
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

    public function getPhotoPromotion()
    {
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

    public function getPromotionById($id)
    {
        $datas = $this->find($id);
        if (!$datas) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Promotion Tidak Ditemukan");
        }
        $results = [
            'title' => $this->encrypter->decrypt($datas['title_promotion']),
            'description' => $this->encrypter->decrypt($datas['description_promotion']),
            'photo' => $this->encrypter->decrypt($datas['photo_promotion']),
            'start' => $datas['start_date'],
            'end' => $datas['end_date'],
        ];
        return $results;
    }
    public function savePromotion($data)
    {
        $data['title_promotion'] = $this->encrypter->encrypt($data['title_promotion']);
        $data['description_promotion'] = $this->encrypter->encrypt($data['description_promotion']);
        $data['photo_promotion'] = $this->encrypter->encrypt($data['photo_promotion']);


        return $this->save($data);
    }
    public function updatePromotion($id, $data)
    {
        if (isset($data['title_promotion'])) {
            $data['title_promotion'] = $this->encrypter->encrypt($data['title_promotion']);
        }
        if (isset($data['description_promotion'])) {
            $data['description_promotion'] = $this->encrypter->encrypt($data['description_promotion']);
        }
        if (isset($data['photo_promotion'])) {
            $data['photo_promotion'] = $this->encrypter->encrypt($data['photo_promotion']);
        }

        return $this->update($id, $data);
    }
    public function getPromotionId($id)
    {
        $datas = $this->find($id);
        if (!$datas) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Promotion Tidak Ditemukan");
        }
        $results = [
            'id_promotion' => $datas['id_promotion'],
            'title' => $this->encrypter->decrypt($datas['title_promotion']),
            'description' => $this->encrypter->decrypt($datas['description_promotion']),
            'photo' => $this->encrypter->decrypt($datas['photo_promotion']),
            'start' => $datas['start_date'],
            'end' => $datas['end_date'],
        ];
        return $results;
    }
}

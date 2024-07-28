<?php

namespace App\Models;

use CodeIgniter\Model;

class Media extends Model
{
    protected $table            = 'media';
    protected $primaryKey       = 'id_media';
    protected $allowedFields    = ['id_shop', 'name_media', 'link_media'];
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
                'id_media' => $data['id_media'],
                'name' => $this->encrypter->decrypt($data['name_media']),
                'link' => $this->encrypter->decrypt($data['link_media']),
            ];
        }
        return $results;
    }
    public function saveMedia($data)
    {
        $data['name_media'] = $this->encrypter->encrypt($data['name_media']);
        $data['link_media'] = $this->encrypter->encrypt($data['link_media']);

        return $this->save($data); // Pastikan metode ini mengembalikan true jika berhasil
    }
    public function updateMedia($id, $data)
    {
        $data['name_media'] = $this->encrypter->encrypt($data['name_media']);
        $data['link_media'] = $this->encrypter->encrypt($data['link_media']);
        return $this->update($id, $data);
    }
    public function deleteMedia($id)
    {
        return $this->delete($id);
    }
    public function getMediaById($id)
    {
        $datas = $this->find($id);
        if (!$datas) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Promotion Tidak Ditemukan");
        }
        $results = [
            'id_media' => $datas['id_media'],
            'id_shop' => $datas['id_shop'],
            'name_media' => $this->encrypter->decrypt($datas['name_media']),
            'link_media' => $this->encrypter->decrypt($datas['link_media']),

        ];
        return $results;
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $allowedFields    = ['id_shop', 'email', 'name', 'comment', 'post', 'date'];
    protected $encrypter;


    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        $this->encrypter = \Config\Services::encrypter();
    }

    public function cekUser($email)
    {
        $users = $this->findAll();
        $exist = False;
        foreach ($users as $user) {
            if ($this->encrypter->decrypt($user['email']) == $email) {
                $exist = True;
            }
        }
        return $exist;
    }
    
    public function getAllUser() {
        $users = $this->findAll();
        $results = [];
        foreach ($users as $user) {
            $results[] = [
                'id_user' => $user['id_user'],
                'id_shop' => $user['id_shop'],
                'email' => $this->encrypter->decrypt($user['email']),
                'name' => $this->encrypter->decrypt($user['name']),
                'comment' => $this->encrypter->decrypt($user['comment']),
                'post' => $user['post'],
                'date' => $user['date']
            ];
        }
        return $results;
    }

    public function addUser($nama,$email,$comment)
    {
        $data = [
            'id_shop' => 1,
            'email' => $this->encrypter->encrypt($email),
            'name' => $this->encrypter->encrypt($nama),
            'comment' => $this->encrypter->encrypt($comment),
            'post' => False,
            'date' => date("Y-m-d H:i:s")
        ];
        $this->save($data);
    }
}

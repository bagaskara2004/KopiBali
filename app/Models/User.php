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

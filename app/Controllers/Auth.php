<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => $this->title,
            'navbar' => '<a href="/" class="nav-item nav-link">Home</a><a href="/about" class="nav-item nav-link">About</a><a href="/product" class="nav-item nav-link">Product</a><a href="/gallery" class="nav-item nav-link">Gallery</a>',
            'dataShop' => $this->dataShop,
            'dataMedia' => $this->mediaModel->getAllMedia()
        ];
        return view('Auth/auth.php', $data);
    }

    public function login()
    {
        $validationRules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];
        if ($this->validate($validationRules)) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            if ($data = $this->shopModel->getShopByEmail($email)) {
                if ($data['password'] == $password) {
                    $sesi = [
                        'role' => 'admin',
                        'id_shop' => $data['id_shop'],
                        'name' => $data['name']
                    ];
                    $this->session->set($sesi);
                    return redirect()->to('/overview');
                } else {
                    session()->setFlashdata('erorr', 'Wrong Password');
                    return redirect()->to('/auth');
                }
            } else {
                session()->setFlashdata('erorr', 'Email not found');
                return redirect()->to('/auth');
            }
        } else {
            session()->setFlashdata('erorr', $this->validation->listErrors());
            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/auth');
    }
}

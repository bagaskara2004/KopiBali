<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct(){
        
    }
    public function index()
    {
        $data = [
            'title' => $this->title,
            'navbar' => '<a href="/" class="nav-item nav-link active">Home</a><a href="/about" class="nav-item nav-link">About</a><a href="/product" class="nav-item nav-link">Product</a><a href="/gallery" class="nav-item nav-link">Gallery</a>',
            'dataShop' => $this->dataShop,
            'recomended' => $this->productModel->recomended()
        ];
        return view('User/index.php',$data);
    }

    public function user() {
        $validation = \Config\Services::validation();

        $validationRules = [
            'name' => 'required|min_length[3]|max_length[10]',
            'email' => 'required|valid_email',
            'comment' => 'required|min_length[5]|max_length[100]'
        ];

        if ($this->validate($validationRules)) {
            $nama = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $comment = $this->request->getPost('comment');
            
            if ( $this->userModel->cekUser($email)) {
                session()->setFlashdata('erorr', 'Email is registered');
                return redirect()->to('/');
            }else {
                $this->userModel->addUser($nama,$email,$comment);
                session()->setFlashdata('success', 'Message sent successfully');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('erorr', $validation->listErrors());
            return redirect()->to('/');
        }
    }
}

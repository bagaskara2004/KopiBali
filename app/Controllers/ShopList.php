<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Shop;
use CodeIgniter\HTTP\ResponseInterface;

class ShopList extends BaseController
{
    public function index()
    {
        return view('admin/shopList');
    }

    public function getShops()
    {
        $shopModel = new Shop();
        $shops = $shopModel->findAll();
        return $this->response->setJSON($shops);
    }

    public function save()
    {
        $shopModel = new Shop();

        // Handle file upload
        $file = $this->request->getFile('gallery');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(WRITEPATH . 'Asset', $fileName);
            $galleryPath = 'uploads/' . $fileName;
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to upload file']);
        }

        $password = $this->request->getPost('password');
        if (is_string($password) && !empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid password']);
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address'),
            'telp' => $this->request->getPost('telp'),
            'maps' => $this->request->getPost('maps'),
            'password' => $hashedPassword,
            'gallery' => $galleryPath,
            'open' => $this->request->getPost('open'),
            'close' => $this->request->getPost('close'),
        ];

        if ($shopModel->insert($data)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }
}

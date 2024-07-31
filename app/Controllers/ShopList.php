<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Shop;
use CodeIgniter\HTTP\ResponseInterface;

class ShopList extends BaseController
{
    protected $shopModel;
    protected $encrypter;

    public function __construct()
    {
        $this->shopModel = new Shop();
        $this->encrypter = \Config\Services::encrypter();
    }
    public function index()
    {
        $session = session();
        if (!$session->get('id_shop')) {
            return redirect()->to('/auth');
        }
        $data = ['shop' => $this->dataShop];
        return view('Admin/shopList', $data);
    }



    public function edit($id)
    {
        $shop = $this->shopModel->find($id);
        if (!$shop) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Shop with id $id not found");
        }
        return view('Admin/editShop', ['shop' => $shop]);
    }
    public function update($id)
    {
        $data = $this->request->getPost();


        $data['name'] = $this->encrypter->encrypt($data['name']);
        $data['email'] = $this->encrypter->encrypt($data['email']);
        $data['address'] = $this->encrypter->encrypt($data['address']);
        $data['telp'] = $this->encrypter->encrypt($data['telp']);
        $data['maps'] = $data['maps'];
        $data['password'] = $this->encrypter->encrypt($data['password']);
        $data['open'] = $data['open'];
        $data['close'] = $data['close'];
        $data['gallery'] = $this->encrypter->encrypt($data['gallery']);

        
        $this->shopModel->update($id, $data);
        return redirect()->to('/shoplist')->with('message', 'Shop updated successfully');
    }
}

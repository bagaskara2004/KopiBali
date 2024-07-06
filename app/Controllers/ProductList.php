<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Product;

class ProductList extends BaseController
{
    public function index()
    {
        return view('admin/productList');
    }

    public function getProducts()
    {
        $productModel = new Product();
        $products = $productModel->findAll();

        return $this->response->setJSON(['products' => $products]);
    }

    public function getProduct($id)
    {
        $productModel = new Product();
        $product = $productModel->find($id);

        return $this->response->setJSON($product);
    }

    public function save()
    {
        $productModel = new Product();

        $data = [
            'id_categoryProduct' => $this->request->getPost('id_categoryProduct'),
            'id_shop' => $this->request->getPost('id_shop'),
            'name_product' => $this->request->getPost('name_product'),
            'description_product' => $this->request->getPost('description_product'),
            'price_product' => $this->request->getPost('price_product'),
            'recomended' => $this->request->getPost('recomended'),
        ];

        $productModel->save($data);

        return redirect()->to('/productlist');
    }

    public function update()
    {
        $productModel = new Product();
        $id = $this->request->getPost('id_product');

        $data = [
            'id_categoryProduct' => $this->request->getPost('id_categoryProduct'),
            'id_shop' => $this->request->getPost('id_shop'),
            'name_product' => $this->request->getPost('name_product'),
            'description_product' => $this->request->getPost('description_product'),
            'price_product' => $this->request->getPost('price_product'),
            'recomended' => $this->request->getPost('recomended'),
        ];

        $productModel->update($id, $data);

        return $this->response->setJSON(['status' => 'Product updated']);
    }

    public function delete()
    {
        $productModel = new Product();
        $id = $this->request->getPost('id_product');
        $productModel->delete($id);

        return $this->response->setJSON(['status' => 'Product deleted']);
    }
}

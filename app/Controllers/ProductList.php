<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\Shop;

class ProductList extends BaseController
{


    public function index()
    {
        $session = session();
        if (!$session->get('id_shop')) {
            return redirect()->to('/auth');
        }
        return view('admin/productList');
    }

    public function getProducts()
    {
        $productModel = new Product();
        $products = $productModel->getProduct();

        return $this->response->setJSON(['products' => $products]);
    }

    public function getProductById($id)
    {
        $product = $this->productModel->getProductId($id);
        if ($product) {
            return $this->response->setJSON($product);
        }
        return $this->response->setJSON(['error' => 'Product not found'], ResponseInterface::HTTP_NOT_FOUND);
    }

    public function saveProduct()
    {
        $productModel = new Product();
        $data = $this->request->getPost();
        $photo = $this->request->getFile('photo_product');

        if ($photo->isValid() && !$photo->hasMoved()) {
            $photo->move('photoProduct');
            $data['photo_product'] = $photo->getName();
        }

        $productModel->saveProduct($data);
        return $this->response->setJSON(['status' => 'Product saved']);
    }


    public function delete()
    {
        $productModel = new Product();
        $id = $this->request->getPost('id_product');
        $productModel->delete($id);

        return $this->response->setJSON(['status' => 'Product deleted']);
    }
    public function getCategories()
    {
        $categoryModel = new CategoryProduct();
        $categories = $categoryModel->getAllCategoryProduct();

        return $this->response->setJSON(['categories' => $categories]);
    }


    public function updateProduct()
    {
        $productModel = new Product();
        $id = $this->request->getPost('id_product');
        $data = $this->request->getPost();
        $photo = $this->request->getFile('photo_product');


        if ($photo->isValid() && !$photo->hasMoved()) {
            $photo->move('photoProduct');
            $data['photo_product'] = $photo->getName();
        }


        if ($productModel->updateProduct($id, $data)) {
            return $this->response->setJSON(['status' => 'Product updated']);
        } else {
            return $this->response->setJSON(['status' => 'Update failed'], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



    public function updateRecomended($id)
    {
        $productModel = new Product();
        $data['recomended'] = $this->request->getPost('recomended');
        $productModel->update($id, $data);
        return $this->response->setJSON(['status' => 'success']);
    }
    
}

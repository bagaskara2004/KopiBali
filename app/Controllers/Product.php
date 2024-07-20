<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Product extends BaseController
{
    public function index()
    {
        $data = [
            'title' => $this->title,
            'navbar' => '<a href="/" class="nav-item nav-link">Home</a><a href="/about" class="nav-item nav-link">About</a><a href="/product" class="nav-item nav-link active">Product</a><a href="/gallery" class="nav-item nav-link">Gallery</a>',
            'dataShop' => $this->dataShop,
            'dataCategoryProduct' => $this->categoryProductModel->getAllCategoryProduct(),
            'dataProduct' => $this->productModel->getAllProduct(),
            'dataMedia' => $this->mediaModel->getAllMedia()
        ];
        return view('User/product.php',$data);
    }
    public function detailProduct($id) {
        $data = [
            'title' => $this->title,
            'dataShop' => $this->dataShop,
            'dataProduct' => $this->productModel->getProductById($id),
            'dataMedia' => $this->mediaModel->getAllMedia(),
            'navbar' => '<a href="/" class="nav-item nav-link">Home</a><a href="/about" class="nav-item nav-link">About</a><a href="/product" class="nav-item nav-link">Product</a><a href="/gallery" class="nav-item nav-link">Gallery</a>',
        ];
        return view('User/detailProduct',$data);
    }
}

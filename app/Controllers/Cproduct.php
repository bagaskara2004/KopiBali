<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryProduct;
use CodeIgniter\HTTP\ResponseInterface;

class CProduct extends BaseController
{
    public function index()
    {
        return view('admin/CategoryProduct');
    }

    public function getCategories()
    {
        $categoryModel = new CategoryProduct();
        $categories = $categoryModel->getAllCategoryProduct();

        return $this->response->setJSON(['categories' => $categories]);
    }

    public function getCategory($id)
    {
        $categoryModel = new CategoryProduct();
        $category = $categoryModel->getCategoryProductById($id);

        return $this->response->setJSON($category);
    }

    public function save()
    {
        $categoryModel = new CategoryProduct();

        $data = $this->request->getPost();

        $categoryModel->saveCategoryProduct($data);

        return $this->response->setJSON(['status' => 'Category saved']);
    }

    public function update()
    {
        $categoryModel = new CategoryProduct();
        $id = $this->request->getPost('id_categoryProduct');

        $data = $this->request->getPost();

        $categoryModel->updateCategoryProduct($id, $data);

        return $this->response->setJSON(['status' => 'Category updated']);
    }

    public function delete()
    {
        $categoryModel = new CategoryProduct();
        $id = $this->request->getPost('id_categoryProduct');

        $categoryModel->delete($id);

        return $this->response->setJSON(['status' => 'Category deleted']);
    }
}

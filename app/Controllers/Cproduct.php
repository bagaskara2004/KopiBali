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
        $categories = $categoryModel->findAll();

        return $this->response->setJSON(['categories' => $categories]);
    }

    public function getCategory($id)
    {
        $categoryModel = new CategoryProduct();
        $category = $categoryModel->find($id);

        return $this->response->setJSON($category);
    }

    public function save()
    {
        $categoryModel = new CategoryProduct();

        $data = [
            'name_categoryProduct' => $this->request->getPost('name_categoryProduct')
        ];

        $categoryModel->save($data);

        return $this->response->setJSON(['status' => 'Category saved']);
    }

    public function update()
    {
        $categoryModel = new CategoryProduct();
        $id = $this->request->getPost('id_categoryProduct');

        $data = [
            'name_categoryProduct' => $this->request->getPost('name_categoryProduct')
        ];

        $categoryModel->update($id, $data);

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
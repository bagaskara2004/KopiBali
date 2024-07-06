<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Promotion;

class PromotionList extends BaseController
{
    public function index()
    {
        return view('admin/promotionList');
    }

    public function getPromotions()
    {
        $promotionModel = new Promotion();
        $promotions = $promotionModel->findAll();
        return $this->response->setJSON(['promotions' => $promotions]);
    }

    public function save()
    {
        $promotionModel = new Promotion();

        $data = [
            'title_promotion' => $this->request->getPost('title_promotion'),
            'description_promotion' => $this->request->getPost('description_promotion'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
            'id_shop' => $this->request->getPost('id_shop'),
        ];

        $promotionModel->save($data);

        return $this->response->setJSON(['status' => 'Promotion added']);
    }

    public function update()
    {
        $promotionModel = new Promotion();

        $id = $this->request->getPost('id_promotion');

        $data = [
            'id_shop' => $this->request->getPost('id_shop'),
            'title_promotion' => $this->request->getPost('title_promotion'),
            'description_promotion' => $this->request->getPost('description_promotion'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
        ];

        $promotionModel->update($id, $data);

        return $this->response->setJSON(['status' => 'Promotion updated']);
    }

    public function delete()
    {
        $promotionModel = new Promotion();
        $id = $this->request->getPost('id_promotion');
        $promotionModel->delete($id);

        return $this->response->setJSON(['status' => 'Product deleted']);
    }
}

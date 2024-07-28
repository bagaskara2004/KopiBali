<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Promotion;
use CodeIgniter\HTTP\ResponseInterface;

class PromotionList extends BaseController
{
    public function index()
    {
        return view('admin/promotionList');
    }

    public function getPromotions()
    {
        $promotionModel = new Promotion();
        $promotions = $promotionModel->getAllPromotion();
        return $this->response->setJSON(['promotions' => $promotions]);
    }

    public function getPromotion($id)
    {
        $promotionModel = new Promotion();
        $promotion = $promotionModel->getPromotionId($id);
        return $this->response->setJSON($promotion);
    }

    public function save()
    {
        $promotionModel = new Promotion();
        $data = $this->request->getPost();
        $photo = $this->request->getFile('photo_promotion');

        if ($photo->isValid() && !$photo->hasMoved()) {
            $photo->move('photoPromo');
            $data['photo_promotion'] = $photo->getName();
        }

        $promotionModel->savePromotion($data);
        return $this->response->setJSON(['status' => 'Promotion saved']);
    }

    public function update()
    {
        $promotionModel = new Promotion();
        $id = $this->request->getPost('id_promotion');

        $data = $this->request->getPost();
        $photo = $this->request->getFile('photo_promotion');

        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $photo->move('photoPromo');
            $data['photo_promotion'] = $photo->getName();
        }

        if ($promotionModel->updatePromotion($id, $data)) {
            return $this->response->setJSON(['status' => 'Product updated']);
        }
        return $this->response->setJSON(['error' => 'Failed to update promotion'], ResponseInterface::HTTP_BAD_REQUEST);
    }



    public function delete()
    {
        $promotionModel = new Promotion();
        $id = $this->request->getPost('id_promotion');
        $promotionModel->delete($id);
        return $this->response->setJSON(['status' => 'Promotion deleted']);
    }

   
}

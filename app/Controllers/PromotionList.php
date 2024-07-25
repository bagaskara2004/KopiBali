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
        $promotion = $promotionModel->getPromotionById($id);
        return $this->response->setJSON($promotion);
    }

    public function save()
    {
        $promotionModel = new Promotion();
        $data = $this->request->getPost();
        $photo = $this->request->getFile('photo_promotion');

        if ($photo->isValid() && !$photo->hasMoved()) {
            $photo->move(WRITEPATH . '/public/photoProduct');
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
            $photo->move(WRITEPATH . 'uploads/promotion_photos');
            $data['photo_promotion'] = $photo->getName();
        } else {

            unset($data['photo_promotion']);
        }

        if ($promotionModel->update($id, $data)) {
            echo $this->response->setJSON($data);
        }
        // return $this->response->setJSON(['error' => 'Failed to update promotion'], ResponseInterface::HTTP_BAD_REQUEST);
        echo $this->response->setJSON($data);
    }



    public function delete()
    {
        $promotionModel = new Promotion();
        $id = $this->request->getPost('id_promotion');
        $promotionModel->delete($id);
        return $this->response->setJSON(['status' => 'Promotion deleted']);
    }

    private function uploadFile($fileInput)
    {
        $file = $this->request->getFile($fileInput);
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . '/public/photoProduct', $newName);
            return $newName;
        }
        return null;
    }
}

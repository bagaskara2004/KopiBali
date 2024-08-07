<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Product;

class OverView extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('id_shop')) {
            return redirect()->to('/auth');
        }
        $userModel = new User();
        $productModel = new Product();

        $userCounts = $userModel->getUserCountByMonth();
        $productCount = $productModel->getProductCount();

        $data = [
            'userCounts' => $userCounts,
            'productCount' => $productCount
        ];

        return view('admin/overview', $data);
    }
}

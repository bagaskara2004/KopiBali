<?php

namespace App\Controllers;

class PromotionList extends BaseController
{
    public function index(){
        $data['title'] = $this->title;
        echo view('Admin\promotionList.php', $data);
    }
}


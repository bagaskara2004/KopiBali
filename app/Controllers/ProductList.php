<?php

namespace App\Controllers;

class ProductList extends BaseController
{
    public function index(){
        $data['title'] = $this->title;
        echo view('Admin\productList.php', $data);
    }
}

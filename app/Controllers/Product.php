<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Product extends BaseController
{
    public function index()
    {
        $data['title'] = $this->title;
        return view('User/product.php',$data);
    }
}

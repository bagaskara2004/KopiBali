<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class About extends BaseController
{
    public function index()
    {
        $data['title'] = $this->title;
        return view('User/about.php',$data);
    }
}

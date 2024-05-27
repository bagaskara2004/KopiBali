<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Gallery extends BaseController
{
    public function index()
    {
        $data['title'] = $this->title;
        return view('User/gallery.php',$data);
    }
}

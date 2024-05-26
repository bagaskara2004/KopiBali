<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = $this->title;
        return view('User/index.php',$data);
    }
}

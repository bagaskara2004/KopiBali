<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data['title'] = $this->title;
        return view('Auth/auth.php',$data);
    }
}

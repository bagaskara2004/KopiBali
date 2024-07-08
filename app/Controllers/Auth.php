<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data['title'] = $this->title;
        $data['navbar'] = '<a href="/" class="nav-item nav-link">Home</a><a href="/about" class="nav-item nav-link">About</a><a href="/product" class="nav-item nav-link">Product</a><a href="/gallery" class="nav-item nav-link">Gallery</a>';
        return view('Auth/auth.php',$data);
    }
}

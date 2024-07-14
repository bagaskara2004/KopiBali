<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function __construct(){
        
    }
    public function index()
    {
        $data['navbar'] = '<a href="/" class="nav-item nav-link active">Home</a><a href="/about" class="nav-item nav-link">About</a><a href="/product" class="nav-item nav-link">Product</a><a href="/gallery" class="nav-item nav-link">Gallery</a>';
        $data['title'] = $this->title;
        return view('User/index.php',$data);
    }
}

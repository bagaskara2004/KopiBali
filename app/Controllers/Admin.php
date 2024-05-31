<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(){
        $data['title'] = $this->title;
        return view('Admin/admin.php', $data);
    }
}
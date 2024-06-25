<?php

namespace App\Controllers;

class SubcriptionList extends BaseController
{
    public function index(){
        $data['title'] = $this->title;
        echo view('Admin\subcriptionList.php', $data);
    }
}


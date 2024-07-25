<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(){
        // $session = session();
        // if (!$session->get('id_shop')) {
        //     return redirect()->to('/auth');
        // }
        $data['title'] = $this->title;
        return view('Admin\admin.php', $data);
    }
}
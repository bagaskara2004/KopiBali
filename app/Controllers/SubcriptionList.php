<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class SubcriptionList extends BaseController
{
    public function index() {
        $data['title'] = $this->title;
        echo view('Admin\subcriptionList', $data);
    }

    public function getUser() {
        $usermodel = new User();
        $users = $usermodel->findAll();
        return $this->response->setJSON(['users' => $users]);
    }

    public function deleteUser() {
        $id_user = $this->request->getPost('id_user');
        $usermodel = new User();

        if ($usermodel->delete($id_user)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false], 500);
        }
    }
}

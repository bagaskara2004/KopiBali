<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UserList extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('id_shop')) {
            return redirect()->to('/auth');
        }
        $userModel = new User();
        $data['users'] = $userModel->where('post', 1)->getAllUser();
        return view('admin/userList', $data);
    }
    public function getComment()
    {
        $userModel = new User();

        $data['users'] = $userModel->where('post', 0)->getAllUser();
        return view('admin/commen', $data);
    }

    public function delete()
    {
        $userModel = new User();
        $id_user = $this->request->getPost('id_user');
        $userModel->deleteUser($id_user);
        return redirect()->to('/userlist')->with('message', 'Pengguna berhasil dihapus');
    }
    public function updatePostStatus()
    {
        $userModel = new User();
        $id_user = $this->request->getPost('id_user');
        $status = $this->request->getPost('action');
        $userModel->updatePostStatus($id_user, $status);
        return redirect()->to('/userlist')->with('message', 'Status post pengguna berhasil diperbarui');
    }
}

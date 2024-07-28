<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Media;

class MediaList extends BaseController
{
    protected $mediaModel;

    public function __construct()
    {
        $this->mediaModel = new Media();
    }

    public function index()
    {
        return view('admin/media');
    }

    public function getMedia()
    {
        $media = $this->mediaModel->getAllMedia();
        return $this->response->setJSON(['media' => $media]);
    }

    public function getMediaById($id)
    {
        $media = $this->mediaModel->getMediaById($id);
        return $this->response->setJSON($media);
    }

    public function saveMedia()
    {
        $data = $this->request->getPost();
        $this->mediaModel->saveMedia($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function updateMedia()
    {
        $id = $this->request->getPost('id');
        $data = $this->request->getPost();
        $this->mediaModel->updateMedia($id, $data);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function deleteMedia()
    {
        $logger = \Config\Services::logger();

        try {
            $id = $this->request->getPost('id_media');
            $result = $this->mediaModel->deleteMedia($id);

            if ($result) {
                return $this->response->setJSON(['status' => 'success']);
            } else {
                $logger->error('Delete failed: Media ID not found');
                return $this->response->setJSON(['status' => 'fail', 'message' => 'Delete failed']);
            }
        } catch (\Exception $e) {
            $logger->error('Error occurred: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'An error occurred while deleting media.']);
        }
    }
}

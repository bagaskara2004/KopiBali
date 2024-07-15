<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    protected $title = 'Coffee';
    protected $encrypter;
    protected $shopModel;
    protected $dataShop;
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->shopModel = new \App\Models\Shop();
        $this->encrypter = \Config\Services::encrypter();

        $data = $this->shopModel->first();
        $this->dataShop = [
            'id_shop' => $data['id_shop'],
            'name' => $this->encrypter->decrypt($data['name']),
            'email' => $this->encrypter->decrypt($data['email']),
            'address' => $this->encrypter->decrypt($data['address']),
            'telp' => $this->encrypter->decrypt($data['telp']),
            'maps' => $data['maps'],
            'password' => $this->encrypter->decrypt($data['password']),
            'gallery' => $this->encrypter->decrypt($data['gallery']),
            'open' => $data['open'],
            'close' => $data['close'],
        ];
        // E.g.: $this->session = \Config\Services::session();
    }
}

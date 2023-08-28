<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

class Login_Controller extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_Model');
    }

    public function login_post()
    {
        $login = new Login_Model;

        $email = $this->post('email');
        $pass = $this->post('password');

        $result = $login->checklogin($email, $pass);
        if ($result) {
            $this->response([
                'status' => true,
                'message' => 'login success',
                'id' => $result[0]->id,
                'username' => $result[0]->username,
                'email' => $result[0]->email,
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Login faild '
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}

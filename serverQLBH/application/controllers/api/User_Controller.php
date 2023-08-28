<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

class User_Controller extends RestController
{
       public function __construct()
       {
              parent::__construct();
              $this->load->model('User_model');
       }


       public function index_get()
       {
              $user = new User_model;
              $update_result = $user->get_users();
              $this->response($update_result, 200);
       }


       public function storeuser_post()
       {
              //video
              $user = new User_model;

              $data = [
                     'username' => $this->post('username'),
                     'password' => $this->post('password'),
                     'email' => $this->post('email'),
                     'status' => $this->post('status')
              ];
              $update_result = $user->insertuser($data);
              if ($update_result > 0) {
                     $this->response([
                            'status' => true,
                            'message' => 'New user Created'
                     ], RestController::HTTP_OK);
              } else {
                     $this->response([
                            'status' => false,
                            'message' => 'FAILED to create user '
                     ], RestController::HTTP_BAD_REQUEST);
              }
       }

       public function finduser_get($id)
       {
              $user = new User_model;
              $update_result = $user->edituser($id);
              $this->response($update_result, 200);
       }

       public function updateuser_put($id)
       {
              $user = new User_model;
              $data = [
                     'username' => $this->put('username'),
                     'password' => $this->put('password'),
                     'email' => $this->put('email'),                     
                     'status' => $this->put('status')
              ];
              $update_result = $user->updateuser($id, $data);
              if ($update_result > 0) {
                     $this->response([
                            'status' => true,
                            'message' => ' user Updated'
                     ], RestController::HTTP_OK);
              } else {
                     $this->response([
                            'status' => false,
                            'message' => 'FAILED to Update user '
                     ], RestController::HTTP_BAD_REQUEST);
              }
       }

       public function deleteuser_delete($id)
       {
              $user = new User_model;
              $delete_result = $user->deleteuser($id);
              if ($delete_result > 0) {
                     $this->response([
                            'status' => true,
                            'message' => ' user Deleted'
                     ], RestController::HTTP_OK);
              } else {
                     $this->response([
                            'status' => false,
                            'message' => 'FAILED to Delete user '
                     ], RestController::HTTP_BAD_REQUEST);
              }
       }
};

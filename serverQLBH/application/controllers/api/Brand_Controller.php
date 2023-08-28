<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;
require APPPATH . 'libraries/RestController.php';

class Brand_Controller extends RestController{
	public function __construct()
       {
              parent::__construct();
              $this->load->model('Brand_Model');
       }


       public function index_get()
       {
              $brand = new Brand_Model;
              $update_result = $brand->get_brands();
              $this->response($update_result, 200);
       }

       public function storebrand_post()
       {
              //video
              $brand = new Brand_Model;

              $data = [
                     'title' => $this->post('title'),
                     'slug' => $this->post('slug'),
                     'description' => $this->post('description'),
                     'image' => $this->post('image'),
                     'status' => $this->post('status')

              ];
              $update_result = $brand->insertbrand($data);
              if ($update_result > 0) {
                     $this->response([
                            'status' => true,
                            'message' => 'New Brand Created'
                     ], RestController::HTTP_OK);
              } else {
                     $this->response([
                            'status' => false,
                            'message' => 'FAILED to create Brand '
                     ], RestController::HTTP_BAD_REQUEST);
              }
       }

       public function findbrand_get($id)
       {
              $brand = new Brand_Model;
              $update_result = $brand->editbrand($id);
              $this->response($update_result, 200);
       }

       public function updatebrand_put($id)
       {
              $brand = new Brand_Model;
              $data = [
                     'title' => $this->put('title'),
                     'slug' => $this->put('slug'),
                     'description' => $this->put('description'),                     
                     'status' => $this->put('status'),                     
                     'image' => $this->put('image')
              ];
              $update_result = $brand->updatebrand($id, $data);
              if ($update_result > 0) {
                     $this->response([
                            'status' => true,
                            'message' => ' brand Updated'
                     ], RestController::HTTP_OK);
              } else {
                     $this->response([
                            'status' => false,
                            'message' => 'FAILED to Update brand '
                     ], RestController::HTTP_BAD_REQUEST);
              }
       }

       public function deletebrand_delete($id)
       {
              $brand = new Brand_Model;
              $delete_result = $brand->deletebrand($id);
              if ($delete_result > 0) {
                     $this->response([
                            'status' => true,
                            'message' => ' Brand Deleted'
                     ], RestController::HTTP_OK);
              } else {
                     $this->response([
                            'status' => false,
                            'message' => 'FAILED to Delete Brand '
                     ], RestController::HTTP_BAD_REQUEST);
              }
       }
}

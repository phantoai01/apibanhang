<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

class Category_Controller extends RestController
{
       public function __construct()
       {
              parent::__construct();
              $this->load->model('Category_Model');
       }


       public function index_get()
       {
              $category = new Category_Model;
              $update_result = $category->get_category();
              $this->response($update_result, 200);
       }

       public function storecategory_post()
       {
              $category = new Category_Model;

              $data = [
                     'title' => $this->post('title'),
                     'slug' => $this->post('slug'),
                     'description' => $this->post('description'),
                     'image' => $this->post('image'),
                     'status' => $this->post('status')
              ];
              $update_result = $category->insertcategory($data);
              if ($update_result > 0) {
                     $this->response([
                            'status' => true,
                            'message' => 'New category Created'
                     ], RestController::HTTP_OK);
              } else {
                     $this->response([
                            'status' => false,
                            'message' => 'FAILED to create category '
                     ], RestController::HTTP_BAD_REQUEST);
              }
       }

       public function findcategory_get($id)
       {
              $category = new Category_Model;
              $update_result = $category->editcategory($id);
              $this->response($update_result, 200);
       }

       public function updatecategory_put($id)
       {
              $category = new Category_Model;
              $data = [
                     'title' => $this->put('title'),
                     'slug' => $this->put('slug'),
                     'description' => $this->put('description'),
                     'status' => $this->put('status'),
                     'image' => $this->put('image')
              ];
              $update_result = $category->updatecategory($id, $data);
              if ($update_result > 0) {
                     $this->response([
                            'status' => true,
                            'message' => ' Category Updated'
                     ], RestController::HTTP_OK);
              } else {
                     $this->response([
                            'status' => false,
                            'message' => 'FAILED to Update Category '
                     ], RestController::HTTP_BAD_REQUEST);
              }
       }

       public function deletecategory_delete($id)
       {
              $category = new Category_Model;
              $delete_result = $category->deletecategory($id);
              if ($delete_result > 0) {
                     $this->response([
                            'status' => true,
                            'message' => ' category Deleted'
                     ], RestController::HTTP_OK);
              } else {
                     $this->response([
                            'status' => false,
                            'message' => 'FAILED to Delete category '
                     ], RestController::HTTP_BAD_REQUEST);
              }
       }
}

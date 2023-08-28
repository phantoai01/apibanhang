<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;
require APPPATH . 'libraries/RestController.php';

class Product_Controller extends RestController{
	public function __construct()
       {
              parent::__construct();
              $this->load->model('Product_Model');
       }


       public function index_get()
       {
              $product = new Product_Model;
              $update_result = $product->get_product();
              $this->response($update_result, 200);
       }

       public function storeproduct_post()
       {
              //video
              $product = new Product_Model;

              $data = [
                'title' => $this->post('title'),
                'price' => $this->post('price'),
                'description' => $this->post('description'),
                'category_id' => $this->post('category_id'),
                'brand_id' => $this->post('brand_id'),
                'quantity' => $this->post('quantity'),
                'slug' => $this->post('slug'),
                'status' => $this->post('status'),
                'image' => $this->post('image')
              ];
              $update_result = $product->insertproduct($data);
              if ($update_result > 0) {
                     $this->response([
                            'status' => true,
                            'message' => 'New product Created'
                     ], RestController::HTTP_OK);
              } else {
                     $this->response([
                            'status' => false,
                            'message' => 'FAILED to create product '
                     ], RestController::HTTP_BAD_REQUEST);
              }
       }

       public function findproduct_get($id)
       {
              $product = new Product_Model;
              $update_result = $product->editproduct($id);
              $this->response($update_result, 200);
       }

       public function updateproduct_put($id)
       {
              $product = new Product_Model;
              $data = [
                'title' => $this->put('title'),
                'price' => $this->put('price'),
                'description' => $this->put('description'),
                'category_id' => $this->put('category_id'),
                'brand_id' => $this->put('brand_id'),
                'quantity' => $this->put('quantity'),
                'slug' => $this->put('slug'),
                'status' => $this->put('status'),
                'image' => $this->put('image')
              ];
              $update_result = $product->updateproduct($id, $data);
              if ($update_result > 0) {
                     $this->response([
                            'status' => true,
                            'message' => ' product Updated'
                     ], RestController::HTTP_OK);
              } else {
                     $this->response([
                            'status' => false,
                            'message' => 'FAILED to Update product '
                     ], RestController::HTTP_BAD_REQUEST);
              }
       }

       public function deleteproduct_delete($id)
       {
              $product = new Product_Model;
              $delete_result = $product->deleteproduct($id);
              if ($delete_result > 0) {
                     $this->response([
                            'status' => true,
                            'message' => ' product Deleted'
                     ], RestController::HTTP_OK);
              } else {
                     $this->response([
                            'status' => false,
                            'message' => 'FAILED to Delete product '
                     ], RestController::HTTP_BAD_REQUEST);
              }
       }
}

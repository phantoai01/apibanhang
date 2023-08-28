<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

class Index_Controller extends RestController
{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('Index_Model');
        }

        public function newShipping_post()
        {
                //video
                $index = new Index_Model;

                $data = [
                        'name' => $this->post('name'),
                        'email' => $this->post('email'),
                        'method' => $this->post('method'),
                        'phone' => $this->post('phone'),
                        'address' => $this->post('address')
                ];
                $update_result = $index->NewShipping($data);
                if ($update_result > 0) {
                        $this->response([
                                'status' => true,
                                'message' => 'New Brand NewShipping OK',
                                'ship_id' => $update_result
                        ], RestController::HTTP_OK);
                } else {
                        $this->response([
                                'status' => false,
                                'message' => 'FAILED to NewShipping '
                        ], RestController::HTTP_BAD_REQUEST);
                }
        }
        public function insert_order_detail_post()
        {
                //video
                $index = new Index_Model;
                $data_order_details = [
                        'order_code' => $this->post('order_code'),
                        'product_id' => $this->post('product_id'),
                        'quantity' => $this->post('quantity')
                ];
                $update_result = $index->insert_order_details($data_order_details);
                if ($update_result > 0) {
                        $this->response([
                                'status' => true,
                                'message' => 'New Order detail OK'
                        ], RestController::HTTP_OK);
                } else {
                        $this->response([
                                'status' => false,
                                'message' => 'FAILED to New order Detail '
                        ], RestController::HTTP_BAD_REQUEST);
                }
        }

        public function insert_order_post()
        {
                //video
                $index = new Index_Model;
                $data_order = [
                        'order_code' => $this->post('order_code'),
                        'ship_id' => $this->post('ship_id'),
                        'status' => $this->post('status')
                ];
                $update_result = $index->insert_order($data_order);
                if ($update_result > 0) {
                        $this->response([
                                'status' => true,
                                'message' => 'New Order OK'
                        ], RestController::HTTP_OK);
                } else {
                        $this->response([
                                'status' => false,
                                'message' => 'FAILED to New order '
                        ], RestController::HTTP_BAD_REQUEST);
                }
        }

        public function index_get()
        {
                $product = new Index_Model;
                $update_result = $product->getAllProduct();
                $this->response($update_result, 200);
        }
        public function brandHome_get()
        {
                $brand = new Index_Model;
                $update_result = $brand->getBrandHome();
                $this->response($update_result, 200);
        }
        public function categoryHome_get()
        {
                $category = new Index_Model;
                $update_result = $category->getCategoryHome();
                $this->response($update_result, 200);
        }
        public function AllProduct_get()
        {
                $allproduct = new Index_Model;
                $update_result = $allproduct->getAllProduct();
                $this->response($update_result, 200);
        }
        //category
        public function Category_Product_get($id)
        {
                $allproduct = new Index_Model;
                $update_result = $allproduct->getCategoryProduct($id);
                $this->response($update_result, 200);
        }
        public function getCategoryTitle_get($id)
        {
                $getCategoryTitle = new Index_Model;
                $update_result = $getCategoryTitle->getCategoryTitle($id);
                $this->response($update_result, 200);
        }
        //brand
        public function getBrandProduct_get($id)
        {
                $getBrandProduct = new Index_Model;
                $update_result = $getBrandProduct->getBrandProduct($id);
                $this->response($update_result, 200);
        }
        public function getBrandTitle_get($id)
        {
                $getBrandTitle = new Index_Model;
                $update_result = $getBrandTitle->getBrandTitle($id);
                $this->response($update_result, 200);
        }
        //product
        public function getProductTitle_get($id)
        {
                $getProductTitle = new Index_Model;
                $update_result = $getProductTitle->getProductTitle($id);
                $this->response($update_result, 200);
        }

        public function getProductDetails_get($id)
        {
                $getProductDetails = new Index_Model;
                $update_result = $getProductDetails->getProductDetails($id);
                $this->response($update_result, 200);
        }

        public function categorySlug_get($id)
        {
                $categoryslug = new Index_Model;
                $update_result = $categoryslug->getCategorySlug($id);
                $this->response($update_result, 200);
        }
        public function getMinProductPrice_get($id)
        {
                $getMinProductPrice = new Index_Model;
                $update_result = $getMinProductPrice->getMinProductPrice($id);
                $this->response($update_result, 200);
        }

        public function getMaxProductPrice_get($id)
        {
                $getMaxProductPrice_get = new Index_Model;
                $update_result = $getMaxProductPrice_get->getMaxProductPrice($id);
                $this->response($update_result, 200);
        }
        public function countAllProductByCate_get($id)
        {
                $countAllProductByCate = new Index_Model;
                $update_result = $countAllProductByCate->countAllProductByCate($id);
                $this->response($update_result, 200);
        }
}

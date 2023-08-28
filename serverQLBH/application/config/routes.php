<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//login
$route['login'] = '/api/Login_Controller/login';
// $route['login-customer']['POST'] = 'IndexController/login_customer';
// $route['dang-xuat']['GET'] = 'IndexController/dang_xuat';
// $route['dang-ky']['POST'] = 'IndexController/dang_ky';

//home
$route['home/brand'] = 'api/Index_Controller/brandHome';
$route['home/category'] = 'api/Index_Controller/categoryHome';
$route['home/allproduct'] = 'api/Index_Controller/AllProduct';
$route['home/categoryslug/(:any)'] = 'api/Index_Controller/categorySlug/$1';
//category
$route['home/Category_Product/(:any)'] = 'api/Index_Controller/Category_Product/$1';
$route['home/getCategoryTitle/(:any)'] = 'api/Index_Controller/getCategoryTitle/$1';
//brand
$route['home/getProductDetails/(:any)'] = 'api/Index_Controller/getProductDetails/$1';
$route['home/getProductTitle/(:any)'] = 'api/Index_Controller/getProductTitle/$1';
//product
$route['home/getBrandProduct/(:any)'] = 'api/Index_Controller/getBrandProduct/$1';
$route['home/getBrandTitle/(:any)'] = 'api/Index_Controller/getBrandTitle/$1';
$route['home/getProductDetails/(:any)'] = 'api/Index_Controller/getProductDetails/$1';
$route['home/getMaxProductPrice/(:any)'] = 'api/Index_Controller/getMinProductPrice/$1';
$route['home/getMinProductPrice/(:any)'] = 'api/Index_Controller/getMinProductPrice/$1';
$route['home/product'] = 'api/Index_Controller/index';
//addorder
$route['newshipping/store'] = 'api/Index_Controller/newShipping';
$route['insertorder/store'] = 'api/Index_Controller/insert_order';
$route['insertorderdetail/store'] = 'api/Index_Controller/insert_order_detail';


$route['user'] = 'api/User_Controller/index';
$route['user/store'] = 'api/User_Controller/storeuser';
$route['user/edit/(:any)'] = 'api/User_Controller/finduser/$1';
$route['user/update/(:any)'] = 'api/User_Controller/updateuser/$1';
$route['user/delete/(:any)'] = 'api/User_Controller/deleteuser/$1';

$route['brand'] = 'api/Brand_Controller/index';
$route['brand/store'] = 'api/Brand_Controller/storebrand';
$route['brand/edit/(:any)'] = 'api/Brand_Controller/findbrand/$1';
$route['brand/delete/(:any)'] = 'api/Brand_Controller/deletebrand/$1';
$route['brand/update/(:any)'] = 'api/Brand_Controller/updatebrand/$1';

$route['category'] = 'api/Category_Controller/index';
$route['category/store'] = 'api/Category_Controller/storecategory';
$route['category/edit/(:any)'] = 'api/Category_Controller/findcategory/$1';
$route['category/delete/(:any)'] = 'api/Category_Controller/deletecategory/$1';
$route['category/update/(:any)'] = 'api/Category_Controller/updatecategory/$1';

$route['product'] = 'api/Product_Controller/index';
$route['product/store'] = 'api/Product_Controller/storeproduct';
$route['product/edit/(:any)'] = 'api/Product_Controller/findproduct/$1';
$route['product/delete/(:any)'] = 'api/Product_Controller/deleteproduct/$1';
$route['product/update/(:any)'] = 'api/Product_Controller/updateproduct/$1';

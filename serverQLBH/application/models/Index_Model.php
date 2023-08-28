<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_Model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}
        //đặt hàng
       public function NewShipping($data)
       {
               $this->db->insert('shipping',$data);
               return $ship_id = $this->db->insert_id();
       }

       public function insert_order($data_order)
       {
               return $this->db->insert('orders',$data_order);
       }

       public function insert_order_details($data_order_details)
       {
               return $this->db->insert('order_details',$data_order_details);
       }
        public function getCategoryHome()
        {
                $query = $this->db->get_where('categories',['status'=>1]);//ddkien status = 1
                return $query->result();
        }
        public function getBrandHome()
        {
                $query = $this->db->get_where('brands',['status'=>1]);
                return $query->result();
        }
        public function getAllProduct()
        {
                $query = $this->db->get_where('products',['status'=>1]);
                return $query->result();
        }
        public function countAllProduct()
        {
                return $this->db->count_all('products');
        }

        public function countAllProductByCate($id)
        {
                $this->db->where('category_id',$id);
                $this->db->from('products');
                return $this->db->count_all_results();
        }
        // public function countAllProductByKeyword($keyword)
        // {
        //         $this->db->like('products.title',$keyword);
        //         $this->db->from('products');
        //         return $this->db->count_all_results();
        // }

        public function countAllProductByBra($id)
        {
                $this->db->where('brand_id',$id);
                $this->db->from('products');
                return $this->db->count_all_results();
        }

        public function getCatePagination($id, $limit, $start)
        {
                $this->db->limit($limit, $start);
                $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
                ->from('categories')
                ->join('products','products.category_id=categories.id')
                ->join('brands','brands.id=products.brand_id')
                ->where('products.category_id',$id)
                ->get();
                return $query->result();
        }

        public function getCatekytuPagination($id, $kytu, $limit, $start)
        {
                $this->db->limit($limit, $start);
                $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
                ->from('categories')
                ->join('products','products.category_id=categories.id')
                ->join('brands','brands.id=products.brand_id')
                ->where('products.category_id',$id)
                ->order_by('products.title',$kytu)
                ->get();
                return $query->result();
        }

        public function getCatePricePagination($id, $gia, $limit, $start)
        {
                $this->db->limit($limit, $start);
                $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
                ->from('categories')
                ->join('products','products.category_id=categories.id')
                ->join('brands','brands.id=products.brand_id')
                ->where('products.category_id',$id)
                ->order_by('products.price',$gia)
                ->get();
                return $query->result();
        }
        public function getCatePriceRangePagination($id, $from_price, $to_price, $limit, $start){
                $this->db->limit($limit, $start);
                $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
                ->from('categories')
                ->join('products','products.category_id=categories.id')
                ->join('brands','brands.id=products.brand_id')
                ->where('products.category_id',$id)
                ->where('products.price >=',$from_price)
                ->where('products.price <=',$to_price)
                ->order_by('products.price','asc')
                
                ->get();
                return $query->result();  
        }
        public function getMinProductPrice($id)
        {
                $this->db->select('products.*');
                $this->db->from('products');
                $this->db->select_min('price');
                $this->db->where('products.category_id',$id);
                $this->db->limit(1);
                $query = $this->db->get();
                $result = $query->row();
                return $price = $result->price;
        }
        public function getMaxProductPrice($id)
        {
                $this->db->select('products.*');
                $this->db->from('products');
                $this->db->select_max('price');
                $this->db->where('products.category_id',$id);
                $this->db->limit(1);
                $query = $this->db->get();
                $result = $query->row();
                return $price = $result->price;
        }
        public function getBraPagination($id, $limit, $start)
        {
                $this->db->limit($limit, $start);
                $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
                ->from('categories')
                ->join('products','products.category_id=categories.id')
                ->join('brands','brands.id=products.brand_id')
                ->where('products.brand_id',$id)
                ->get();
                return $query->result();
        }
        
        public function getIndexPagination($limit, $start)
        {
                //$limit là số lượng sản phẩm trên 1 trang,$start là bắt đầu từ trang nào
                $this->db->limit($limit, $start);
                $query =  $this->db->get_where('products',['status'=>1]);
                return $query->result();
        }
        public function getCategoryProduct($id)
        {
                $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
                ->from('categories')
                ->join('products','products.category_id=categories.id')
                ->join('brands','brands.id=products.brand_id')
                ->where('products.category_id',$id)
                ->get();
                return $query->result();
        }
        public function getBrandProduct($id)
        {
                $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
                ->from('categories')
                ->join('products','products.category_id=categories.id')
                ->join('brands','brands.id=products.brand_id')
                ->where('products.brand_id',$id)
                ->get();
                return $query->result();
        }

        public function getProductDetails($id)
        {
                $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
                ->from('categories')
                ->join('products','products.category_id=categories.id')
                ->join('brands','brands.id=products.brand_id')
                ->where('products.id',$id)
                ->get();
                return $query->result();
        }

        public function getInformation($id)
        {
                $query = $this->db->select('customers')
                ->from('customers')
                ->where('customers.id',$id)
                ->get();
                return $query->result();
        }

        public function getCategorySlug($id)
        {
                $this->db->select('categories.*');
                $this->db->from('categories');
                $this->db->limit(1);
                $this->db->where('categories.id',$id);
                $query = $this->db->get();
                $result = $query->row();
                return $title = $result->slug;
        }
        
        public function getCategoryTitle($id)
        {
                $this->db->select('categories.*');
                $this->db->from('categories');
                $this->db->limit(1);
                $this->db->where('categories.id',$id);
                $query = $this->db->get();
                $result = $query->row();
                return $title = $result->title;
        }

        public function getBrandSlug($id)
        {
                $this->db->select('brands.*');
                $this->db->from('brands');
                $this->db->limit(1);
                $this->db->where('brands.id',$id);
                $query = $this->db->get();
                $result = $query->row();
                return $title = $result->slug;
        }
        public function getBrandTitle($id)
        {
                $this->db->select('brands.*');
                $this->db->from('brands');
                $this->db->limit(1);
                $this->db->where('brands.id',$id);
                $query = $this->db->get();
                $result = $query->row();
                return $title = $result->title;
        }

        public function getProductTitle($id)
        {
                $this->db->select('products.*');
                $this->db->from('products');
                $this->db->limit(1);
                $this->db->where('products.id',$id);
                $query = $this->db->get();
                $result = $query->row();
                return $title = $result->title;
        }

        public function getProductBykeyword($keyword)
        {
                $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
                ->from('categories')
                ->join('products','products.category_id=categories.id')
                ->join('brands','brands.id=products.brand_id')
                ->like('products.title',$keyword)
                ->get();
                return $query->result();
        }

        // public function getSearchPagination($keyword, $limit, $start)
        // {
        //         $this->db->limit($limit, $start);//giới hạn

        //         $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
        //         ->from('categories')
        //         ->join('products','products.category_id=categories.id')
        //         ->join('brands','brands.id=products.brand_id')
        //         ->like('products.title',$keyword)
        //         ->get();

        //         return $query->result();
        // }
        
}
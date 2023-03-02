<?php 
class Product_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function getProducts() {
           $this->db->select('products.*,categories.cat_title,subcategories.subcat_title')->from('products')->join('categories', 'categories.ID=products.cat_ID', 'inner');
           $this->db->join('subcategories','subcategories.ID=products.subcat_ID', 'left outer');
           $query=$this->db->order_by("products.ID", "desc")->get();
            return $query->result_array();
        }
        public function getCategoryItemsForHome($args='')
            {
                $final = '';
                $final = array();
               
                $menu =  $this->db->where('show', '1')->get('categories')->result_array();
                // echo "<pre>";var_dump($menu); die;
                foreach ($menu as $menkey ) 
                {
                    // $this->db->where(array('brand_active'=>'1', 'cat_id'=> $menkey['categories_id']));
                    // $query = $this->db->get('brands');
                    // $final['catgory'][$menkey['categories_name']."-".$menkey['categories_id']."-".$menkey['cat_logo']."-".$menkey['category_banner']]['brand'] = $query->result_array();
                    //$final['catgory'][$menkey['categories_name']."-".$menkey['categories_id']."-".$menkey['cat_logo']];
                    
                    
                        /*$ip = $_SERVER['REMOTE_ADDR'];
                          $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
                        echo $details->city; // -> "Mountain View"
                        $cityNames = $details->city;*/


                        $this->db->select('*');
                        $this->db->from('ads');
                        // $this->db->join('users','users.ID=ads.dealer_ID', 'inner');
                        $this->db->where('ads.cat_id_fk', $menkey['ID']);
                        // $this->db->like('users.City', $cityNames);
                         $this->db->order_by('rand()');
                        $this->db->limit(10);
                        //$this->db->last_query(); exit;
                        $final['products'][$menkey['cat_title']."-".$menkey['ID']."-".$menkey['Image']] = $this->db->get()->result_array();
                    
                }
                // echo "<pre>"; var_dump($final); die();
                return $final;
            }
         
        public function getNumActiveProducts() {
           $this->db->where('status',1);
            $query=$this->db->get('products');
            return $query->num_rows();
        }

        public function insertProduct($data) {

            $query=$this->db->insert('products',$data);
            if($query){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function updateProduct($data,$ID) {
           $this->db->where('ID',$ID);
            $query=$this->db->update('products',$data);
            if($query){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function productexistByID($ID)
        {
            $this->db->select('products.*,categories.cat_title,subcategories.subcat_title')->from('products')->join('categories', 'categories.ID=products.cat_ID', 'inner');
            $this->db->join('subcategories','subcategories.ID=products.subcat_ID', 'left outer');
            $this->db->join('users','users.ID=products.dealer_ID', 'inner');

            $query=$this->db->where("products.ID",$ID)->get();
            if($query->num_rows() > 0 ){
                return $query->result_array();
                }  else {
                    return false;
                }

        }
        public function productexistByDealerID($ID,$dealer_ID)
        {
            $this->db->select('products.*,categories.cat_title,subcategories.subcat_title')->from('products')->join('categories', 'categories.ID=products.cat_ID', 'inner');
            $this->db->join('subcategories','subcategories.ID=products.subcat_ID', 'left outer');
            $this->db->join('users','users.ID=products.dealer_ID', 'inner');
            $query=$this->db->where("products.ID",$ID)->where("products.dealer_ID",$dealer_ID)->get();
            if($query->num_rows() > 0 ){
                return $query->result_array();
            }  else {
                return false;
            }

        }

        public  function  productDeleteByDealerID($ID,$dealer_ID)
        {
            $query="delete from products where ID=$ID and dealer_ID=$dealer_ID";
            $delete=$this->db->query($query);
            if($delete){
                return true;
            }else{
                return false;
            }

        }

        public function ActiveProductexistByID($ID)
        {
            $this->db->select('products.*,categories.cat_title,subcategories.subcat_title,users.FirstName,users.LastName,users.Email,users.created_date,users.Telephone,users.City,users.Country,users.State,users.Image as userImage')->from('products')->join('categories', 'categories.ID=products.cat_ID', 'inner');
            $this->db->join('subcategories','subcategories.ID=products.subcat_ID', 'left outer');
            $this->db->join('users','users.ID=products.dealer_ID','inner');
            $query=$this->db->where("products.ID",$ID)->where("products.status",1)->get();
            if($query->num_rows() > 0 ){
                return $query->result_array();
            }  else {
                return false;
            }
        }

        public function getProductByCat($limit,$start,$ID,$isHomepage=0) {
                $this->db->select('products.*,categories.cat_title,subcategories.subcat_title,users.FirstName,users.LastName,users.Email,users.created_date,users.Telephone,users.City,users.Country,users.State,users.Image as userImage')->from('products')->join('categories', 'categories.ID=products.cat_ID', 'inner');
                $this->db->join('subcategories','subcategories.ID=products.subcat_ID', 'left outer');
                $this->db->join('users','users.ID=products.dealer_ID', 'inner');

                if($isHomepage){
                    $this->db->where("products.isHomepage",1);
                }
                $query=$this->db->where("categories.ID",$ID)->where("products.status",1)->limit($limit, $start)->order_by("products.ID", "desc")->get();
                if($query->num_rows() > 0 ){
                    return $query->result_array();
                    }  else {
                        return false;
                    }
            }
        public function getProductReviewById($productId='')
        {
             $this->db->select('*, count(id) AS total_review')->from('ads_review')->where('ads_id_fk', $productId);
             return $this->db->get()->result_array();
        }
        public function getProductBysubCat($limit,$start,$ID) {
            $this->db->select('products.*,categories.cat_title,subcategories.subcat_title,users.FirstName,users.LastName,users.Email,users.created_date,users.Telephone,users.City,users.Country,users.State,users.Image as userImage')->from('products')->join('categories', 'categories.ID=products.cat_ID', 'inner');
            $this->db->join('subcategories','subcategories.ID=products.subcat_ID', 'left outer');
            $this->db->join('users','users.ID=products.dealer_ID', 'inner');

            $query=$this->db->where("subcategories.ID",$ID)->where("products.status",1)->limit($limit, $start)->order_by("products.ID", "desc")->get();
            if($query->num_rows() > 0 ){
                return $query->result_array();
                }  else {
                    return false;
                }
        }

        public function getProductsCountByDealerID($ID) {
            $this->db->select('products.*,categories.cat_title,subcategories.subcat_title')->from('products')->join('categories', 'categories.ID=products.cat_ID', 'inner');
            $this->db->join('subcategories','subcategories.ID=products.subcat_ID', 'inner');
            $query=$this->db->where("products.dealer_ID",$ID)->get();
            return $query->num_rows();

        }
        public function getProductsByDealerID($limit, $start,$ID) {
            $this->db->select('products.*,categories.cat_title,subcategories.subcat_title')->from('products')->join('categories', 'categories.ID=products.cat_ID', 'inner');
            $this->db->join('subcategories','subcategories.ID=products.subcat_ID', 'inner');
            $query=$this->db->where("products.dealer_ID",$ID)->limit($limit, $start)->get();
            if($query->num_rows() > 0 ){
                return $query->result_array();
            }  else {
                return false;
            }
        }
        public function getProductById($id=''){
            $query = "SELECT ads.*, ads_count.count as counts, categories.cat_title  AS categoryName, categories.ID  AS categoryId FROM ads LEFT join ads_count ON (ads.id=ads_count.ads_id_fk) LEFT JOIN categories ON ads.cat_id_fk=categories.ID WHERE ads.id=$id";
            $result = $this->db->query($query);
            return $result->row_array();
        }
       public function deleteProduct($ID)
        {
            $query="delete from products where ID=$ID";
            $delete=$this->db->query($query);
            if($delete){
                return true;
            }else{
                return false;
            }
        }

}
?>
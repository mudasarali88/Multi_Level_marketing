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
           $this->db->limit(2);
           $query=$this->db->order_by("products.ID", "desc")->get();
           // var_dump($this->db->last_query());die;
            return $query->result_array();
        }
        public function getallProducts() {
           $this->db->select('products.*,categories.cat_title,subcategories.subcat_title')->from('products')->join('categories', 'categories.ID=products.cat_ID', 'inner');
           $this->db->join('subcategories','subcategories.ID=products.subcat_ID', 'left outer');
           // $this->db->limit(2);
           $query=$this->db->order_by("products.ID", "desc")->get();
           // var_dump($this->db->last_query());die;
            return $query->result_array();
        }
        public function getCatforDept() {
           $finaldep = '';
           $finaldep = array();
               
           $cat =  $this->db->select('*')->from('categories')->order_by("categories.ID")->get()->result_array();
           foreach ($cat as $ckey) {
               $finaldep['sub_cat'][$ckey['cat_title']."/".$ckey['ID']."/".$ckey['ic_class']] = $this->db->select('*')->from('subcategories')->where('cat_ID',$ckey['ID'])->get()->result_array();
             
           }
           return $finaldep;
        }
        public function getCategoryItemsForHome($args='', $args2='', $args3='', $args4='', $regions)
        {
            if ($regions['country_id'] == '') {
            // var_dump($regions); die;
            $country_id = 0;
            // var_dump($country_id); die;
            }else{
                $country_id = $regions['country_id'];
                }
            if ($regions['state_id'] == '') {
                $state_id = 0;
            }else{
                $state_id = $regions['state_id'];
            }
            if ($regions['city_id'] == '') {
                $city_id = 0;
            }else{
                $city_id = $regions['city_id'];
            }
            $cityId = $city_id;
            
            if (isset($country_id)) {
                if ($country_id == 0) {
                    $op1 = 'OR';
                } else {
                    $op1 = 'AND';
                }
            }
            if (isset($state_id)) {
                if ($state_id == 0) {
                    $op2 = 'OR';
                } else {
                    $op2 = 'AND';
                }
            }
            if (isset($city_id)) {
                if ($city_id == 0) {
                    $op3 = 'OR';
                } else {
                    $op3 = 'AND';
                }
            }
                $final = '';
                $final = array();
               
                $menu =  $this->db->where('show', '1')->get('categories')->result_array();
                foreach ($menu as $menkey ) 
                {
                    $catId = $menkey['ID'];
                    $query = "SELECT ads.*, ads_count.count as counts FROM ads 
                        LEFT JOIN ads_count ON (ads.id=ads_count.ads_id_fk)"
                    . " INNER JOIN country_ads ON (ads.id = country_ads.ads_id_fk)"
                    . " INNER JOIN states_ads ON (ads.id = states_ads.ads_id_fk)"
                    . " INNER JOIN city_ads ON (ads.id = city_ads.ads_id_fk)"
                    . " WHERE ads.status = 1"
                    . " AND country_ads.country_id_fk = $country_id"
                    . " AND states_ads.states_id_fk = $state_id"
                    . " AND city_ads.city_id_fk = $city_id"
                    // . " AND ads.status = 1 AND ads.cat_id_fk = $catId  GROUP BY ads.id ORDER BY ads.ID DESC LIMIT 10";
                    . " AND ads.status = 1 AND ads.cat_id_fk = $catId  ORDER BY ads.ID DESC LIMIT 10";
                    // var_dump($query); die;
                    $result = $this->db->query($query);
                    if ($result->num_rows() > 0) {
                        $final['products'][$menkey['cat_title']."-".$menkey['ID']."-".$menkey['Image']] = $result->result_array();
                        //return $final;
                    }else{
                        $query = "SELECT ads.*, ads_count.count as counts FROM ads inner join ads_count ON (ads.id=ads_count.ads_id_fk) WHERE ads.cat_id_fk = $catId AND ads.isGlobal='1'  ORDER BY ads.id DESC LIMIT 10";
                        $result = $this->db->query($query);
                        if ($result->num_rows() > 0) {
                        $final['products'][$menkey['cat_title']."-".$menkey['ID']."-".$menkey['Image']] = $result->result_array();
                        }else{
                            $final['products'][$menkey['cat_title']."-".$menkey['ID']."-".$menkey['Image']] = FALSE;
                        }
                    }
                }
                // var_dump($final); die;
                return $final;
            }
         
        public function getNumActiveProducts() {
           $this->db->where('active',1);
            $query=$this->db->get('users');
            return $query->num_rows();
        }
         public function getinactiveusers() {
           $this->db->where('active',0);
            $query=$this->db->get('users');
            return $query->num_rows();
        }
         public function totalwithdrawreq() {
           $this->db->where('status',0);
            $query=$this->db->get('withdrawrequest');
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
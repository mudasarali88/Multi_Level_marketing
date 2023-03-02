<?php 
class E_categories_model extends CI_Model {
    
    public function getCategories()
          {

            $this->db->select('*')->from('ecategories');
            $this->db->order_by("cat_order", "asc");
            $query = $this->db->get(); 
            return $query->result_array();
          }
    public function getBasicCategories()
          {

            $this->db->select('*')->from('ecategories');
            $this->db->order_by("ID", "asc")->limit('1');
            $query = $this->db->get(); 
            return $query->row_array();
          }
    public function getsubCategories()
      {
         $this->db->select('esubcategories.*,ecategories.cat_title');
         $this->db->from('esubcategories');
         $this->db->join('ecategories', 'ecategories.ID = esubcategories.cat_ID');
          if($this->uri->segment(3)){
              $this->db->where('cat_ID',$this->uri->segment(3));
          }else{
              $this->db->where('cat_ID',0);
          }

          $this->db->order_by("subcat_order", "asc");
          $query=$this->db->get();
        return $query->result_array();
      }
    public function parentSubcategories()
      {
         $this->db->select('*');
         $this->db->from('esubcategories');
         $this->db->where('isParent','1');
          if($this->uri->segment(3)){
              $this->db->where('cat_ID',$this->uri->segment(3));
          }else{
              $this->db->where('cat_ID',0);
          }

          $this->db->order_by("subcat_order", "asc");
          $query=$this->db->get();
        return $query->result_array();
      }
      
    public function getsubByCategoriesID($cat_ID)
      {
         $this->db->select('esubcategories.*,ecategories.cat_title');
         $this->db->from('esubcategories');
         $this->db->join('ecategories', 'ecategories.ID = esubcategories.cat_ID','inner');
         $this->db->where('esubcategories.cat_ID',$cat_ID);
         $this->db->order_by("subcat_order", "asc");
         $query=$this->db->get();
         // var_dump($this->db->last_query());die;
        return $query->result_array();
      }
      
      
          
    public function insertCategories($data)
          {
           $insert=$this->db->insert('ecategories', $data);
                if($insert){
                    return true;
                }else{
                    return flase;
                }
          }
    public function insertsubCategories($data)
      {
       $insert=$this->db->insert('esubcategories', $data);
            if($insert){
            return true;
            }else{
            return flase;
            }
      }
    public function CategoriesByID($ID)
        {
            $query=$this->db->get_where('ecategories', array('ID' => $ID));
            if($query->num_rows() > 0 ){
            return $query->result_array();
            } else {
                return false;    
            }    
        }
    public function subCategoriesByID($ID)
        {
         
            $this->db->from('esubcategories');
            // $this->db->order_by("subcat_order", "asc");
            $this->db->where(array('ID' => $ID));
            $query=$this->db->get();
            if($query->num_rows() > 0 ){

            return $query->row_array();
            } else {
                return false;    
            }    
        }

    public function updateCategories($data,$ID)
        {		
            $this->db->where('ID',$ID);
            $update=$this->db->update('ecategories', $data);
            if($update){
            return true;
            }else{
            return false;
            }
        }
    public function updatesubCategories($data,$ID)
        {		
            $this->db->where('ID',$ID);
            $update=$this->db->update('esubcategories', $data);

            if($update){
            return true;
            }else{
            return false;
            }
        }

    public function deleteCategories($ID){
        $query="delete from ecategories where ID=$ID";
            $delete=$this->db->query($query);
            if($delete){
                return true;
            }else{
                return false;
            }
         
        }
    public function deletesubCategories($ID){
        $query="delete from esubcategories where ID=$ID";
            $delete=$this->db->query($query);
            if($delete){
                return true;
            }else{
                return false;
            }
         
        }
		  
    
    
}
?>
<?php 
class Categories_model extends CI_Model {
    
    public function getCategories()
          {

            $this->db->select('*')->from('categories');
            $this->db->order_by("cat_order", "asc");
            $query = $this->db->get(); 
            return $query->result_array();
          }
    public function getBasicCategories()
          {

            $this->db->select('*')->from('categories');
            $this->db->order_by("ID", "asc")->limit('1');
            $query = $this->db->get(); 
            return $query->row_array();
          }
    public function getsubCategories()
      {
         $this->db->select('subcategories.*,categories.cat_title');
         $this->db->from('subcategories');
         $this->db->join('categories', 'categories.ID = subcategories.cat_ID');
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
         $this->db->from('subcategories');
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
         $this->db->select('subcategories.*,categories.cat_title');
         $this->db->from('subcategories');
         $this->db->join('categories', 'categories.ID = subcategories.cat_ID','inner');
         $this->db->where('subcategories.cat_ID',$cat_ID);
         $this->db->order_by("subcat_order", "asc");
         $query=$this->db->get();
        return $query->result_array();
      }
      
      
          
    public function insertCategories($data)
          {
           $insert=$this->db->insert('categories', $data);
                if($insert){
                    return true;
                }else{
                    return flase;
                }
          }
    public function insertsubCategories($data)
      {
       $insert=$this->db->insert('subcategories', $data);
            if($insert){
            return true;
            }else{
            return flase;
            }
      }
    public function CategoriesByID($ID)
        {
            $query=$this->db->get_where('categories', array('ID' => $ID));
            if($query->num_rows() > 0 ){
            return $query->result_array();
            } else {
                return false;    
            }    
        }
    public function subCategoriesByID($ID)
        {
         
            $this->db->from('subcategories');
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
            $update=$this->db->update('categories', $data);
            if($update){
            return true;
            }else{
            return false;
            }
        }
    public function updatesubCategories($data,$ID)
        {		
            $this->db->where('ID',$ID);
            $update=$this->db->update('subcategories', $data);

            if($update){
            return true;
            }else{
            return false;
            }
        }

    public function deleteCategories($ID){
        $query="delete from categories where ID=$ID";
            $delete=$this->db->query($query);
            if($delete){
                return true;
            }else{
                return false;
            }
         
        }
    public function deletesubCategories($ID){
        $query="delete from subcategories where ID=$ID";
            $delete=$this->db->query($query);
            if($delete){
                return true;
            }else{
                return false;
            }
         
        }
		  
    
    
}
?>
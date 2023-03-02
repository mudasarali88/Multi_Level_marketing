<?php 
class Coupen_model extends CI_Model {
    
    public function getCoupen()
          {

            $this->db->select('*')->from('coupens');
            $query = $this->db->get(); 
            return $query->result_array();
          }
           public function getState()
          {

            $this->db->select('*')->from('states');
            // $this->db->order_by("cat_order", "asc");
            $query = $this->db->get(); 
            return $query->result_array();
          }
    public function getStates()
      {
         $this->db->select('states.*,countries.name');
         $this->db->from('states');
         $this->db->join('countries', 'countries.ID = states.country_ID');
          if($this->uri->segment(3)){
              $this->db->where('country_ID',$this->uri->segment(3));
          }else{
              $this->db->where('country_ID',0);
          }

          //$this->db->order_by("name", "asc");
          $query=$this->db->get();
        return $query->result_array();
      }
      







// my work start

    public function getStates()
      {
         $this->db->select('*');
         $this->db->from('states');
         $this->db->join('countries', 'countries.ID = states.country_ID');
          if($this->uri->segment(3)){
              $this->db->where('country_ID',$this->uri->segment(3));
          }else{
              $this->db->where('country_ID',0);
          }

          //$this->db->order_by("name", "asc");
          $query=$this->db->get();
        return $query->result_array();
      }







//my work ends










    // public function getStateById($country_id)
    //   {
    //      $this->db->select('states.*,countries.name');
    //      $this->db->from('states');
    //      $this->db->join('countries', 'countries.id = states.country_id','inner');
    //      $this->db->where('states.country_ID',$country_id);
    //     // $this->db->order_by("name", "asc");
    //      $query=$this->db->get();
    //     return $query->result_array();
    //   }
      public function getStateById($id)
        {
         
            $this->db->from('states');
            $this->db->where('id', $id);
            $query=$this->db->get();
            if($query->num_rows() > 0 ){

            return $query->result_array();
            } else {
                return false;    
            }    
        }
      // public function getCityById($state_id)
      // {
      //    $this->db->select('cities.*,states.name');
      //    $this->db->from('cities');
      //    $this->db->join('states', 'states.id = cities.state_id','inner');
      //    $this->db->where('cities.state_id',$state_id);
      //   // $this->db->order_by("name", "asc");
      //    $query=$this->db->get();
      //   return $query->result_array();
      // }
      public function getCity()
      {
         $this->db->select('cities.*,cities.name AS cityName, states.name');
         $this->db->from('cities');
         $this->db->join('states', 'states.id = cities.state_id');
          if($this->uri->segment(4)){
              $this->db->where('state_id',$this->uri->segment(4));
          }else{
              $this->db->where('state_id',0);
          }

          //$this->db->order_by("name", "asc");
          $query=$this->db->get();
        return $query->result_array();
      }

      public function getCityById($state_ID)
      {
         $this->db->select('cities.*,states.name');
         $this->db->from('cities');
         $this->db->join('states', 'states.id = cities.state_id','inner');
         $this->db->where('cities.state_id',$state_id);
         //$this->db->order_by("name", "asc");
         $query=$this->db->get();
        return $query->result_array();
      }
      public function getCityByStateId($stateId='')
      {
        return $this->db->get_where('cities', array('state_id'=>$stateId))->result_array();
      }
     

     
      
      
          
    public function insertCoupen($data)
          {
           $insert=$this->db->insert('coupens', $data);
                if($insert){
                    return true;
                }else{
                    return flase;
                }
          }
    public function insertState($data)
      {
        // var_dump($data); die;
       $insert=$this->db->insert('states', $data);
            if($insert){
            return true;
            }else{
            return flase;
            }
      }
        public function insertCity($data)
      {
       $insert=$this->db->insert('cities', $data);
            if($insert){
            return true;
            }else{
            return flase;
            }
      }
    public function CoupenByID($ID)
        {
            $query=$this->db->get_where('coupens', array('coupenId' => $ID));
            if($query->num_rows() > 0 ){
            return $query->result_array();
            } else {
                return false;    
            }    
        }


    // public function StateById($ID)
    //     {
         
    //         $this->db->from('states');
    //         $this->db->where('country_id', $ID);
    //         $query=$this->db->get();
    //         if($query->num_rows() > 0 ){

    //         return $query->result_array();
    //         } else {
    //             return false;    
    //         }    
    //    }

        public function StateById($id)
        {
            $query=$this->db->get_where('states', array('country_id' => $id));
            if($query->num_rows() > 0 ){
            return $query->result_array();
            } else {
                return false;    
            }    
        }
        public function StateByStateId($id)
        {
            $query=$this->db->get_where('states', array('id' => $id));
            // var_dump($query); die;
            if($query->num_rows() > 0 ){
            return $query->result_array();
            } else {
                return false;    
            }    
        }
         public function CityById($ID)
        {
            $query=$this->db->get_where('cities', array('id' => $ID));
            if($query->num_rows() > 0 ){
            return $query->result_array();
            } else {
                return false;    
            }    
        }
    // public function getStateById($ID)
    //     {
      
    //         $this->db->from('states');
    //         $this->db->where('id', $ID);
    //         $query=$this->db->get();
    //         if($query->num_rows() > 0 ){

    //         return $query->result_array();
    //         } else {
    //             return false;    
    //         }    
    //     }
    public function CitiesByID($id)
        {
         
            $this->db->from('cities');
            $this->db->where('id', $id);
            $query=$this->db->get();
            if($query->num_rows() > 0 ){

            return $query->result_array();
            } else {
                return false;    
            }    
     }
  // public function CitiesById($ID)
  //       {
  //           $query=$this->db->get_where('cities', array('id' => $ID));
  //           if($query->num_rows() > 0 ){
  //           return $query->result_array();
  //           } else {
  //               return false;    
  //           }    
  //       }

    public function updateCoupen($data,$ID)
        {   
            $this->db->where('coupenId',$ID);
            $update=$this->db->update('coupens', $data);
            if($update){
            return true;
            }else{
            return false;
            }
        }
    public function updateState($data,$ID)
        {    
            // var_dump($ID); die();
            $this->db->where('id',$ID);
            $update=$this->db->update('states', $data);



            if($update){
            return true;
            }else{
            return false;
            }
        }

          public function updateCities($data,$ID)
        {   
            $this->db->where('id',$ID);
            $update=$this->db->update('cities', $data);
            //echo $this->db->last_query();
            // exit;
            if($update){
            return true;
            }else{
            return false;
            }
        }

    public function deleteCoupen($ID){
        $query="delete from coupens where coupenId=$ID";
            $delete=$this->db->query($query);
            if($delete){
                return true;
            }else{
                return false;
            }
         
        }
    public function deleteStates($ID){
        $query="delete from states where id=$ID";
            $delete=$this->db->query($query);
            if($delete){
                return true;
            }else{
                return false;
            }
         
        }

        public function deleteCity($ID){
        $query="delete from cities where id=$ID";
            $delete=$this->db->query($query);
            if($delete){
                return true;
            }else{
                return false;
            }
         
        }
      
    
    
}
?>
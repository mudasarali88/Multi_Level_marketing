<?php 
class Admin_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function getAdminList()
		{
                    $query=$this->db->get_where('users',array('IsAdmin'=>1));
                    return $query->result_array();
		}
		public function refferalName($refId='')
        {
            $data = $this->db->select('FirstName, LastName')->from('users')->where('refId', $refId)->get()->row_array();
            $name = $data['FirstName'].' '.$data['LastName'];
            return ($data?$name:'N/A');
        }
       
        public function adminexist($email,$password)
        {
                $query=$this->db->get_where('users', array('email' => $email,'password='=>sha1($password),'IsAdmin'=>1,'active'=>1,'status'=>1) );
                // var_dump($query);
			
                return $query->result_array();
        }
        public function adminexistByID($ID)
        {
                $query=$this->db->get_where('users', array('ID' => $ID,'IsAdmin'=>1));
                if($query->num_rows() > 0 ){
                return $query->result_array();
                }  else {
                    return false;    
                }
                
        }
        public function adminexistByEmail($Email)
        {
                $query=$this->db->get_where('users', array('Email' => $Email,'IsAdmin'=>1));
                if($query->num_rows() > 0 ){
                return $query->result_array();
                }  else {
                    return false;    
                }
                
        }
        public function updateResetLink($reset_link,$Email)
        { 
            $this->db->where('Email',$Email);
            $update=$this->db->update('users', array('verifylink'=> $reset_link));
            if($update){
            return true;
            }else{
            return false;
            }
        }
        
        public function ResetLinkexist($reset_link)
        { 
            $query=$this->db->get_where('users', array('verifylink' => $reset_link));
                if($query->num_rows() > 0 ){
                return $query->result_array();
                }  else {
                    return false;    
                }
        }
        public function changePassBylink($reset_link,$Password) {
            $this->db->where('verifylink',$reset_link);
            $update=$this->db->update('users', array('Password'=>  sha1($Password)));
            if($update){
            return true;
            }else{
            return false;
            }
        }
        
        public function insertAdmin($data)
        {			
                $insert=$this->db->insert('users', $data);
                if($insert){
                return true;
                }else{
                return flase;
                }
        }
		
		
        public function insertSlider($data)
        {           
                $insert=$this->db->insert('slider', $data);
                if($insert){
                return $this->db->insert_id();
                }else{
                return flase;
                }
        }
        
        public function insertSlug($data='')
        {           
            $insert=$this->db->insert('webslugs', $data);
            if($insert){
            return $this->db->insert_id();
            }else{
            return flase;
            }

        }
        public function insertPackage($data='')
        {           
            $insert=$this->db->insert('adspaymentpackages', $data);
            if($insert){
            return $this->db->insert_id();
            }else{
            return flase;
            }

        }
        
        public function insertGif($data='')
        {			
            $insert=$this->db->insert('webgifs', $data);
            if($insert){
            return $this->db->insert_id();;
            }else{
            return flase;
            }

        }
		
        //////////
        public function insertSlugCountry($insert, $arrCoun, $check) {
        if ($check == 1) {
            $this->db->delete('country_slug', array('slug_id_fk' => $insert));
        }
        $length = count($arrCoun);
        for ($i = 0; $i < $length; $i++) {
            $insertQuery = "insert into country_slug (slug_id_fk,country_id_fk)VALUES($insert,$arrCoun[$i])";
            $result = $this->db->query($insertQuery);
        }
    }

    public function insertSlugStates($insert, $arrCoun, $check) {
        if ($check == 1) {
            $this->db->delete('states_slug', array('slug_id_fk' => $insert));
        }
        $length = count($arrCoun);
        for ($i = 0; $i < $length; $i++) {
            $insertQuery = "insert into states_slug (slug_id_fk,states_id_fk)VALUES($insert,$arrCoun[$i])";
            $result = $this->db->query($insertQuery);
        }
    }

    public function insertSlugCity($insert, $arrCoun, $check) {
        if ($check == 1) {
            $this->db->delete('city_slug', array('slug_id_fk' => $insert));
        }
        $length = count($arrCoun);

        for ($i = 0; $i < $length; $i++) {
            $insertQuery = "insert into city_slug (slug_id_fk,city_id_fk)VALUES($insert,$arrCoun[$i])";
            $result = $this->db->query($insertQuery);
        }
    }
    
        public function insertSliderCountry($insert, $arrCoun, $check) {
        if ($check == 1) {
            $this->db->delete('country_slider', array('slider_id_fk' => $insert));
        }
        $length = count($arrCoun);
        for ($i = 0; $i < $length; $i++) {
            $insertQuery = "insert into country_slider (slider_id_fk,country_id_fk)VALUES($insert,$arrCoun[$i])";
            $result = $this->db->query($insertQuery);
        }
    }

    public function insertSliderStates($insert, $arrCoun, $check) {
        if ($check == 1) {
            $this->db->delete('states_slider', array('slider_id_fk' => $insert));
        }
        $length = count($arrCoun);
        for ($i = 0; $i < $length; $i++) {
            $insertQuery = "insert into states_slider (slider_id_fk,states_id_fk)VALUES($insert,$arrCoun[$i])";
            $result = $this->db->query($insertQuery);
        }
    }

    public function insertSliderCity($insert, $arrCoun, $check) {
        if ($check == 1) {
            $this->db->delete('city_slider', array('slider_id_fk' => $insert));
        }
        $length = count($arrCoun);

        for ($i = 0; $i < $length; $i++) {
            $insertQuery = "insert into city_slider (slider_id_fk,city_id_fk)VALUES($insert,$arrCoun[$i])";
            $result = $this->db->query($insertQuery);
        }
    }
        public function insertGifCountry($insert, $arrCoun, $check) {
        if ($check == 1) {
            $this->db->delete('country_gif', array('gif_id_fk' => $insert));
        }
        $length = count($arrCoun);
        for ($i = 0; $i < $length; $i++) {
            $insertQuery = "insert into country_gif (gif_id_fk,country_id_fk)VALUES($insert,$arrCoun[$i])";
            $result = $this->db->query($insertQuery);
        }
    }

    public function insertGifStates($insert, $arrCoun, $check) {
        if ($check == 1) {
            $this->db->delete('states_gif', array('gif_id_fk' => $insert));
        }
        $length = count($arrCoun);
        for ($i = 0; $i < $length; $i++) {
            $insertQuery = "insert into states_gif (gif_id_fk,states_id_fk)VALUES($insert,$arrCoun[$i])";
            $result = $this->db->query($insertQuery);
        }
    }

    public function insertGifCity($insert, $arrCoun, $check) {
        if ($check == 1) {
            $this->db->delete('city_gif', array('gif_id_fk' => $insert));
        }
        $length = count($arrCoun);

        for ($i = 0; $i < $length; $i++) {
            $insertQuery = "insert into city_gif (gif_id_fk,city_id_fk)VALUES($insert,$arrCoun[$i])";
            $result = $this->db->query($insertQuery);
        }
    }
        //////////////
      public function updateAdmin($data,$ID)
        {		
            $this->db->where('ID',$ID);
            $update=$this->db->update('users', $data);
                        // var_dump($this->db->last_query()); die;

            if($update){
            return true;
            }else{
            return false;
            }
        }
        /////

    public function getStateList($id) {
        $query = "Select states.name as name ,states_slug.states_id_fk as id from states_slug INNER join states on(states.id=states_slug.states_id_fk) where states_slug.slug_id_fk =$id ";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getCityList($id) {
        $query = "Select cities.name as name ,city_slug.city_id_fk as id from city_slug INNER join cities on(cities.id=city_slug.city_id_fk) where city_slug.slug_id_fk =$id ";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getCountriesList($id) {
        $query = "Select countries.name as name ,country_slug.country_id_fk as id from country_slug INNER join countries on(countries.id=country_slug.country_id_fk) where country_slug.slug_id_fk =$id ";
        // var_dump($query); die;
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getGifStateList($id) {
        $query = "Select states.name as name ,states_gif.states_id_fk as id from states_gif INNER join states on(states.id=states_gif.states_id_fk) where states_gif.gif_id_fk =$id ";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getGifCityList($id) {
        $query = "Select cities.name as name ,city_gif.city_id_fk as id from city_gif INNER join cities on(cities.id=city_gif.city_id_fk) where city_gif.gif_id_fk =$id ";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getGifCountriesList($id) {
        $query = "Select countries.name as name ,country_gif.country_id_fk as id from country_gif INNER join countries on(countries.id=country_gif.country_id_fk) where country_gif.gif_id_fk =$id ";
        // var_dump($query); die;
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

        ///////
      public function isCurrentPassword($password,$ID)
        {       
            $query=$this->db->get_where('users', array('ID' => $ID,'Password' => $password));
            if($query->num_rows() > 0 ){
            return $query->result_array();
            }  else {
                return false;    
            }
        }
      public function getSiteSettings()
        {		
            $query=$this->db->get('sitesetting');
            if($query->num_rows() > 0 ){
            return  $query->row_array();
            // var_dump($return); die;
            }  else {
                return false;    
            }
        }
      public function deleteAdmin($ID)
        {	
            $query="delete from users where ID=$ID";
            $delete=$this->db->query($query);
            if($delete){
                return true;
            }else{
                return false;
            }
        }

         public function deleteSlider($ID)
        {   
            $query="delete from slider where id=$ID";
            $delete=$this->db->query($query);
            if($delete){
                return true;
            }else{
                return false;
            }
        }
        public function deleteSlug($ID)
        {   
            $query="delete from webslugs where slugId=$ID";
            $delete=$this->db->query($query);
            if($delete){
                return true;
            }else{
                return false;
            }
        }
        public function deletePackage($ID)
        {   
            $query="delete from adspaymentpackages where packageId=$ID";
            $delete=$this->db->query($query);
            if($delete){
                return true;
            }else{
                return false;
            }
        }
        public function deleteGif($ID)
        {   
            $query="delete from webgifs where gifId=$ID";
            $delete=$this->db->query($query);
            if($delete){
                return true;
            }else{
                return false;
            }
        }
        public function getSlug(){
           return $this->db->get('webslugs')->result_array();

        }
        public function getGifs(){
           return $this->db->get('webgifs')->result_array();

        }
        public function getPackages(){
           return $this->db->get('adspaymentpackages')->result_array();

        }
        public function getSlugById($id){
           return $this->db->get_where('webslugs',array('slugId'=>$id))->row_array();

        }
        public function getPackageById($id){
           return $this->db->get_where('adspaymentpackages',array('packageId'=>$id))->row_array();

        }
        public function getGifById($id){
           return $this->db->get_where('webgifs',array('gifId'=>$id))->row_array();

        }
        //////////////////////////////////////////////////
        public function suspend_users($ID,$data)
        {
           $this->db->where('ID',$ID);
            $update=$this->db->update('users', $data);

            if($update){
            return true;
            }else{
            return false;
            }
        }
         public function active_back($ID,$data)
        {
           $this->db->where('ID',$ID);
            $update=$this->db->update('users', $data);

            if($update){
            return true;
            }else{
            return false;
            }
        }
         public function delete_anapprove($ID,$data)
        {
           $this->db->where('ID',$ID);
            $update=$this->db->update('users', $data);

            if($update){
            return true;
            }else{
            return false;
            }
        }
}
?>
<?php
class Blog_model extends CI_Model {

    public  function insertPost($data)
    {
        $insert=$this->db->insert('blog', $data);
        if($insert){
            return true;
        }else{
            return flase;
        }
    }

    public function getPosts(){
        $this->db->select('*')->from('blog');
        $query=$this->db->order_by("ID", "desc")->get();
        return $query->result_array();
    }

    public function getActivePosts($limit, $start){
        $this->db->select('*')->from('blog');
        $this->db->where('status',1);
        $query=$this->db->order_by("ID", "desc")->get();
        return $query->result_array();
    }

    public  function postexistByID($ID){
        $this->db->select('*')->from('blog');
        $query=$this->db->where("ID", $ID)->get();
        if($query->num_rows()){
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function getActivePostbyID($ID){
        $this->db->select('*')->from('blog');
        $query=$this->db->where("ID", $ID)->where('status',1)->get();
        if($query->num_rows()){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function updatePost($data,$ID)
    {
        $this->db->where('ID',$ID);
        $update=$this->db->update('blog', $data);
        if($update){
            return true;
        }else{
            return false;
        }
    }
    public  function getNumActivePost(){
        $this->db->where('status',1);
        $query=$this->db->get('blog');
        return $query->num_rows();
    }

    public function deletePost($ID){
        $query="delete from blog where ID=$ID";
        $delete=$this->db->query($query);
        if($delete){
            return true;
        }else{
            return false;
        }

    }


}
?>
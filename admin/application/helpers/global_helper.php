<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

///////////User info get by ID
function Admininfo($ID)
	{
	$ci =& get_instance();
	$my=$ci->load->database();
	$query=$ci->db->get_where('users', array('ID' => $ID));
         return $query->result_array();	
	}

///////////Check is admin
function IsAdmin($ID)
{
    $ci =& get_instance();
    $my=$ci->load->database();
    $query=$ci->db->get_where('users', array('ID' => $ID,'active'=>1,'IsAdmin'=>1,'status'=>1));
    return $query->result_array();
}

///////////Check is Dealer
function IsDealer($ID)
{
    $ci =& get_instance();
    $my=$ci->load->database();
    $query=$ci->db->get_where('users', array('ID' => $ID,'active'=>1,'IsDealer'=>1,'status'=>1));
    return $query->result_array();
}

/////////// Check is user
function IsUser($ID)
{
    $ci =& get_instance();
    $my=$ci->load->database();
    $query=$ci->db->get_where('users', array('ID' => $ID,'active'=>1,'IsUser'=>1,'status'=>1));
    return $query->result_array();
}
function getsubcat($ID)
{
    $ci =& get_instance();
    $my=$ci->load->database();
    $query=$ci->db->get_where('subcategories', array('cat_ID' => $ID));
    return $query->result_array();
}

 function getSliderList() {
        $ci =& get_instance();
        $my=$ci->load->database();

        $ci->db->from('slider');
        $ci->db->order_by("id", "desc");
        $query=$ci->db->get();
        return $query->result_array();

    }


?>
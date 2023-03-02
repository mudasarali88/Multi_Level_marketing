<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Admin_model');
    }

    public function do_upload()
    {
        $config['upload_path']          = 'assets/images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;
        $imageName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $_FILES['Image']['name']); //remove extension
        $config['file_name'] =$imageName."_".time();

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('Image'))
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
            return false;
        }
        else
        {
            return  $this->upload->data();
        }
    }

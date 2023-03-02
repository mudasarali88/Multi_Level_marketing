<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Blog_model');
    }

    public function index() {
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            $data['categories'] = $this->Categories_model->getCategories();
            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('cat_title', 'title', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('adminpages/categories', $data);
                } else {
                    $insertdata = array('cat_title' => $this->input->post('cat_title')
                    );
                    $insert = $this->Categories_model->insertCategories($insertdata);
                    if ($insert) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Type created</div>');
                        redirect('categories');
                    }
                }////end form validation run
            } else {///if not submit form
                $this->load->view('adminpages/categories', $data);
            }
        } else {//IF NOT login
            redirect('admin/login');
        }
    }

    public function do_upload()
    {
        $config['upload_path']          = 'assets/images/BlogImages';
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
        }else{
            return    $this->upload->data();
        }
    }

    function Viewpost() {
        if($this->session->userdata('loggedin'))
        {
            $data['posts'] = $this->Blog_model->getPosts();
            $this->load->view('adminpages/viewpost',$data);
        }else{
            redirect('admin/login');
        }
    }

    public function addpost()
    {
        if ($this->session->userdata('loggedin')) {
            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('post_title', 'Title', 'trim|required');
                $this->form_validation->set_rules('post_desc', 'Description', 'trim|required');
               if(empty($_FILES['Image']['name'])){
                   $this->form_validation->set_rules('Image', 'Image', 'required');
               }

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('adminpages/addPost');
                    //redirect('admin/AddAdmin');
                } else {
                    if (!empty($_FILES['Image']['name'])) {
                        if ($image = $this->do_upload()) {
                            $img = $image['file_name'];
                        } else {
                            $this->load->view('adminpages/addPost');
                            exit;
                        }
                    } else {
                        $img = '';
                    }

                    $insertdata = array('post_title' => $this->input->post('post_title'),
                        'post_desc' => $this->input->post('post_desc'),
                        'status' => 1,
                        'author_id' =>$this->session->userdata('ID'),
                        'Image' => $img,
                    );
                    $insert = $this->Blog_model->insertPost($insertdata);
                    if ($insert) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Post added.</div>');
                        redirect('blog/addpost');
                    }
                }////end form validation run
            } else {///if not submit form
                $this->load->view('adminpages/addPost');
            }

        } else {
            redirect('admin/login');
        }
    }

    public function Editpost() {
        if($this->session->userdata('loggedin'))
        {
            $data['post']=$this->Blog_model->postexistByID($this->uri->segment(3));
            if($data['post']){
                if ($this->input->post() != NULL) {
                    $this->form_validation->set_rules('post_title', 'Title', 'trim|required');
                    $this->form_validation->set_rules('post_desc', 'Description', 'trim|required');

                    if ($this->form_validation->run() == FALSE) {
                        $this->load->view('adminpages/editPost', $data);
                    } else {
                        if (!empty($_FILES['Image']['name'])) {
                            if ($image = $this->do_upload()) {
                                $img = $image['file_name'];
                            } else {
                                $this->load->view('adminpages/editPost', $data);
                                exit;
                            }
                        } else {
                            $img ='';
                        }
                        $updatedata =array('post_title' => $this->input->post('post_title'),
                            'post_desc' => $this->input->post('post_desc'),
                            'author_id' =>$this->session->userdata('ID'),
                        );

                        if(!empty($img)){
                            $updatedata['Image']=$img;
                        }
                        $update = $this->Blog_model->updatePost($updatedata,$this->uri->segment(3));
                        if ($update) {
                            $this->session->set_flashdata('message', '<div class="alert alert-success">Post updated.</div>');
                            redirect('blog/editPost/'.$this->uri->segment(3));
                        }
                    }////end form validation run
                }else {///if not submit form
                    $this->load->view('adminpages/editPost',$data);
                }}else{
                redirect('blog/Viewpost');
            }}else{
            redirect('admin/login');
        }
    }

    public function deletePost(){
        if($this->session->userdata('loggedin'))
        {
            $delete=$this->Blog_model->deletePost($this->input->post('ID'));
            if($delete){
                echo "<div class='alert alert-success'>Post deleted.</div>";
            }else{
                echo "<div class='alert alert-danger'>Error Occured.</div>";
            }
        }
    }

    public  function statusChange($ID,$status)
    {
            if($this->session->userdata('loggedin'))
            {
            $updatedata=array('status'=>$status);
            $update = $this->Blog_model->updatePost($updatedata,$this->uri->segment(3));
            if ($update) {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Status updated.</div>');
                redirect('blog/Viewpost');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Status updation failed.</div>');
                redirect('blog/Viewpost');
            }}else{
                redirect('admin/login');
            }

      }

}
?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class E_categories extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Categories_model');
        $this->load->model('E_categories_model');
    }

    public function index() {
        // var_dump('expression');die;
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            $data['categories'] = $this->E_categories_model->getCategories();

            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('cat_title', 'title', 'trim|required');
               

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('adminpages/ecategories', $data);
                } else {
                    if (!empty($_FILES['Image']['name'])) {
                            if ($image = $this->do_upload()) {
                                $img = $image['file_name'];
                            } else {
                                $this->load->view('adminpages/ecategories', $data);
                                exit;
                            }
                        } else {
                            $img ='';
                        }

                     $cat_order=is_numeric ($this->input->post('cat_order')) ? $this->input->post('cat_order') : 0;
                    $insertdata = array(
                        'cat_title' => $this->input->post('cat_title'),
                        'ic_class' => $this->input->post('cat_class'),
                                        'cat_order' => $cat_order
                    );
                    // var_dump($insertdata); die();
                    
                    if(!empty($img)){
                            $insertdata['Image']=$img;
                        }

                    $insert = $this->E_categories_model->insertCategories($insertdata);
                    if ($insert) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">category created</div>');
                        redirect('E_categories');
                    }
                }////end form validation run                
            } else {///if not submit form
                $this->load->view('adminpages/ecategories', $data);
            }
        } else {//IF NOT login
            redirect('admin/login');
        }
    }

    public function EditCategories() {
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {

            $data['category'] = $this->Categories_model->CategoriesByID($this->uri->segment(3));
            if ($data['category']) {
                $data['categories'] = $this->Categories_model->getCategories();
                if ($this->input->post() != NULL) {
                    $this->form_validation->set_rules('cat_title', 'title', 'trim|required');

                    if ($this->form_validation->run() == FALSE) {
                        $this->load->view('adminpages/editcategories', $data);
                    } else {
                        
                if (!empty($_FILES['Image']['name'])) {
                    // var_dump()
                            if ($image = $this->do_upload()) {
                                $img = $image['file_name'];
                            } else {
                                $this->load->view('adminpages/categories', $data);
                                exit;
                            }
                        } else {
                            $img ='';
                        }


                    $cat_order=is_numeric ($this->input->post('cat_order')) ? $this->input->post('cat_order') : 0;

                        $updatedata = array('cat_title' => $this->input->post('cat_title'),
                            'cat_order'=>$cat_order,
                            'ic_class'=>$this->input->post('cat_class')
                        );

                        if(!empty($img)){
                            $updatedata['Image']=$img;
                        }

                        // var_dump($updatedata); die;
                        $update = $this->Categories_model->updateCategories($updatedata, $this->uri->segment(3));
                        if ($update) {
                            $this->session->set_flashdata('message', '<div class="alert alert-success">Plan updated</div>');
                            redirect('categories/EditCategories/' . $this->uri->segment(3));
                        }
                    }////end form validation run                
                } else {///if not submit form
                    $this->load->view('adminpages/editcategories', $data);
                }
            } else {///if not valid URL
                redirect('categories');
            }
        } else {//IF NOT login
            redirect('admin/login');
        }
    }

    public function deleteCategories() {
        if ($this->session->userdata('loggedin')) {
            $delete = $this->Categories_model->deleteCategories($this->input->post('ID'));
            if ($delete) {
                echo "<div class='alert alert-success'>Category deleted.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error Occured.</div>";
            }
        }
    }
    public function deletesubCategories() {
        if ($this->session->userdata('loggedin')) {
            $delete = $this->Categories_model->deletesubCategories($this->input->post('ID'));
            if ($delete) {
                echo "<div class='alert alert-success'>Sub Category deleted.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error Occured.</div>";
            }
        }
    }
    public function getsubByCategoriesID() {

            $subcategories = $this->E_categories_model->getsubByCategoriesID($this->input->post('ID'));
            // var_dump(expression);
           echo json_encode($subcategories);
    }
    public function getsubByCategoriesIDforparent() {

            $subcategories = $this->Categories_model->getsubByCategoriesID($this->input->post('ID'));
           echo json_encode($subcategories);
    }
    public function subCategories() {
        // var_dump('expression');die;
         if ($this->session->userdata('loggedin')) {
             //if subcat get by cat_ID
             if($this->uri->segment(3)) {
                 $data['category'] = $this->E_categories_model->CategoriesByID($this->uri->segment(3));
             }
             $data['subcategories'] = $this->E_categories_model->getsubCategories();
             $data['parentSubcategories'] = $this->E_categories_model->parentSubcategories();
            $data['categories'] = $this->E_categories_model->getCategories();

                // var_dump($_POST); die;
            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('subcat_title', 'title', 'trim|required');
                $this->form_validation->set_rules('cat_ID', 'Plan', 'trim|required');
                // $this->form_validation->set_rules('price', 'package Price', 'trim|required');
                // $this->form_validation->set_rules('comission', 'Comission Percentage', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('adminpages/esubcategories', $data);
                } else {

                    if (!empty($_FILES['subcatimage']['name'])) {
                            if ($image = $this->do_uploadSubCatImg()) {
                                $img = $image['file_name'];
                            } else {
                                $this->load->view('adminpages/esubCategories', $data);
                                exit;
                            }
                        } else {
                            $img ='';
                        }

                    $insertdata = array('subcat_title' => $this->input->post('subcat_title'),
                                        'cat_ID' => $this->input->post('cat_ID')
                                        // 'price' =>$this->input->post('price')
                                        // 'comission' =>$this->input->post('comission')
                                        );
                    $insert = $this->E_categories_model->insertsubCategories($insertdata);
                    // var_dump($insertdata); die;
                    if ($insert) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Package created</div>');
                        redirect('categories/esubCategories');
                    }
                }////end form validation run                
            } else {///if not submit form
                // var_dump($data); die;
                $this->load->view('adminpages/esubcategories', $data);
            }
        } else {//IF NOT login
            redirect('admin/login');
        }
    }
    
    public function EditsubCategories() {
         if ($this->session->userdata('loggedin')) {
            $data['categories'] = $this->E_categories_model->getCategories();
            $data['subcategory'] = $this->E_categories_model->subCategoriesByID($this->uri->segment(3));
            if ($data['subcategory']) {
            $data['subcategories'] = $this->E_categories_model->getsubCategories();
            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('subcat_title', 'Package', 'trim|required');
                $this->form_validation->set_rules('cat_ID', 'Plan', 'trim|required');
                $this->form_validation->set_rules('price', 'Package Price', 'trim|required');
                $this->form_validation->set_rules('comission', 'Comission Percentage', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('adminpages/editsubcategories', $data);
                } else {
                    if (!empty($_FILES['subcatimage']['name'])) {
                            if ($image = $this->do_uploadSubCatImg()) {
                                $img = $image['file_name'];
                            } else {
                                $this->load->view('adminpages/categories/subCategories', $data);
                                exit;
                            }
                        } else {
                            $img ='';
                        }
                $subcat_order=is_numeric ($this->input->post('subcat_order')) ? $this->input->post('subcat_order') : 0;

                    $updatedata = array('subcat_title' => $this->input->post('subcat_title'),
                                        'cat_ID' => $this->input->post('cat_ID'),
                                        'price' => $this->input->post('price'),
                                        'comission' =>$this->input->post('comission')
                                        );
                        //var_dump($img); //die;
                    //var_dump($updatedata); die;
                    $updatedata = $this->E_categories_model->updatesubCategories($updatedata,$this->uri->segment(3));
                    if ($updatedata) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Package updated</div>');
                        redirect('categories/EditsubCategories/'.$this->uri->segment(3));
                    }
                }////end form validation run
            } else {///if not submit form
                $this->load->view('adminpages/editsubcategories', $data);
            }
            }else{
            redirect('categories/subCategories');
            }
        } else {//IF NOT login
            redirect('admin/login');
        }
    }


    public function do_upload()
    {
        $config['upload_path']          = 'assets/images/CategoriesImages';
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
    public function do_uploadSubCatImg()
    {
        $config['upload_path']          = 'assets/images/subCategoriesImages';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;
        $imageName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $_FILES['subcatimage']['name']); //remove extension
        $config['file_name'] =$imageName."_".time();
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('subcatimage'))
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
            return false;
        }else{
            return    $this->upload->data();
        }
    }
     public function showDat()
    {
            $data['categories'] = $this->E_categories_model->getCategories();
            $update = array
            (
            'show'    => $this->uri->segment(3)
            );
            $this->db->where('ID',$this->uri->segment(4));
            if ($this->db->update('categories',$update )) {
                redirect('categories');
            {
                redirect('categories?msg=something went wrong');
            
            }

    }





}
}

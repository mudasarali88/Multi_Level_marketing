<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('Categories_model');
        $this->load->model('User_model');
        $this->load->model('E_categories_model');
        
    }
    
    public function index() {
        if($this->session->userdata('loggedin'))
       {

       }else{
           redirect('admin/login');
       }
    }
   
    function Viewproduct() {
      if($this->session->userdata('loggedin'))
       {
        $data['products'] = $this->Product_model->getallProducts();
        // var_dump($data['products']);die;
        $this->load->view('adminpages/viewProduct',$data);
        }else{
           redirect('admin/login');
       } 
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
                // var_dump($this->upload->display_errors()); die;
             $this->session->set_flashdata('message','<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
             redirect("Product/addproduct");
            return false;
            }else{
            // var_dump($config['file_name']); die;
               return    $this->upload->data();
            }
        }
    
    public function addproduct() {
       if($this->session->userdata('loggedin'))
       {
           $data['categories'] = $this->E_categories_model->getCategories();
           $data['dealers'] = $this->User_model->getDealerList();

           if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('product_title', 'Title', 'trim|required');
                $this->form_validation->set_rules('product_desc', 'Description', 'trim|required');
                $this->form_validation->set_rules('cat_ID', 'Category', 'trim|required|numeric');
                $this->form_validation->set_rules('subcat_ID', 'Sub Category', 'trim|required|numeric');
               // $this->form_validation->set_rules('dealer_ID', 'Dealer', 'trim|required|numeric');
               $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
               $this->form_validation->set_rules('isHomepage', 'Homepage product', 'trim|required|numeric');

               if (empty($_FILES['Image']['name']))
                {
                 $this->form_validation->set_rules('Image', 'Image', 'required');
                }
                
                if ($this->form_validation->run() == FALSE) {
                    // var_dump(validation_errors()); die;
                    $this->load->view('adminpages/addProduct', $data);
                    //redirect('admin/AddAdmin');
                } else {
                    if ($_FILES['Image']['name']!='') {
                        if ($image = $this->do_upload()) {
                            $img = $image['file_name'];
                        } else {
                            $this->load->view('adminpages/addProduct', $data);
                            exit;
                        }
                    } else {
                        $img ='';
                    }
                     
            $insertdata =array('product_title' => $this->input->post('product_title'),
                                'price'=>$this->input->post('price'),
                               'cat_ID' => $this->input->post('cat_ID'),
                               'subcat_ID' => $this->input->post('subcat_ID'),
                               'product_desc' => $this->input->post('product_desc'),
                                // 'dealer_ID'=>$this->input->post('dealer_ID'),
                                'isHomepage'=>$this->input->post('isHomepage'),
                                'status'=>1,
                                'Image' => $img,
                               );
            // var_dump($insertdata); die;
                    $insert = $this->Product_model->insertProduct($insertdata);
                    if ($insert) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Product added.</div>');
                        redirect('product/addproduct');
                    }
                }////end form validation run                
            } else {///if not submit form
                $this->load->view('adminpages/addProduct',$data);
            }
       
       }else{
           redirect('admin/login');
       }
    }
    
    public function Editproduct() {
       if($this->session->userdata('loggedin'))
       {
        $data['product']=$this->Product_model->productexistByID($this->uri->segment(3));
        if($data['product']){
       $data['categories'] = $this->Categories_model->getCategories();
       $data['subcategories'] = $this->Categories_model->getsubByCategoriesID($data['product'][0]['cat_ID']);
       $data['dealers'] = $this->User_model->getDealerList();

        if ($this->input->post() != NULL) {
            $this->form_validation->set_rules('product_title', 'Title', 'trim|required');
            $this->form_validation->set_rules('product_desc', 'Description', 'trim|required');
            $this->form_validation->set_rules('cat_ID', 'Category', 'trim|required|numeric');
            $this->form_validation->set_rules('subcat_ID', 'Sub Category', 'trim|required|numeric');
            $this->form_validation->set_rules('dealer_ID', 'Dealer', 'trim|required|numeric');
            $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
            $this->form_validation->set_rules('isHomepage', 'Homepage product', 'trim|required|numeric');



            if ($this->form_validation->run() == FALSE) {
                    $this->load->view('adminpages/editProduct', $data);
                } else {
                    if (!empty($_FILES['Image']['name'])) {
                        if ($image = $this->do_upload()) {
                            $img = $image['file_name'];
                        } else {
                            $this->load->view('adminpages/editProduct', $data);
                            exit;
                        }
                    } else {
                        $img ='';
                    }
            $updatedata =array('product_title' => $this->input->post('product_title'),
                                'cat_ID' => $this->input->post('cat_ID'),
                                'price' => $this->input->post('price'),
                                'subcat_ID' => $this->input->post('subcat_ID'),
                                'product_desc' => $this->input->post('product_desc'),
                                'dealer_ID'=>$this->input->post('dealer_ID'),
                                'isHomepage'=> $this->input->post('isHomepage'),
                                );

                    if(!empty($img)){
                        $updatedata['Image']=$img;
                    }
                    $update = $this->Product_model->updateProduct($updatedata,$this->uri->segment(3));
                    if ($update) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Product updated.</div>');
                        redirect('product/editProduct/'.$this->uri->segment(3));
                    }
                }////end form validation run				
                }else {///if not submit form
                    $this->load->view('adminpages/editProduct',$data);
                }}else{
                redirect('product/Viewproduct');
                 }}else{
                redirect('admin/login');
                }
    }

    public  function  statusChange($ID,$status){
        if($this->session->userdata('loggedin'))
        {
            $updatedata=array('status'=>$status);
            $update = $this->Product_model->updateProduct($updatedata,$this->uri->segment(3));
            if ($update) {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Product status updated.</div>');
                redirect('product/Viewproduct');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Product status updation failed.</div>');
                redirect('product/Viewproduct');
            }

        }else{
            redirect('admin/login');
        }
    }

    public  function  setHomepageProduct($ID,$status){
        if($this->session->userdata('loggedin'))
        {
            $updatedata=array('isHomepage'=>$status);

            $update = $this->Product_model->updateProduct($updatedata,$this->uri->segment(3));
            if ($update) {

                if($status){
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Product added to Home Page .</div>');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Product Removed from Home page.</div>');
                }

                redirect('product/Viewproduct');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Product status updation failed.</div>');
                redirect('product/Viewproduct');
            }

        }else{
            redirect('admin/login');
        }
    }

    public function deleteProduct(){
           if($this->session->userdata('loggedin'))
               {        
                $delete=$this->Product_model->deleteProduct($this->input->post('ID'));
                if($delete){
                    echo "<div class='alert alert-success'>Product deleted.</div>";
                   }else{
                    echo "<div class='alert alert-danger'>Error Occured.</div>";
                    }
                }
        }
       
    
    
}
?>
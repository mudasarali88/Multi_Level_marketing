<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

    function __construct() {
        parent::__construct();
        // $this->load->model('Categories_model');
        $this->load->model('Country_model');
    }

    public function index() {
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            $data['countries'] = $this->Country_model->getCountries();
            // echo "<pre>"; var_dump($data['categories']);
            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('sort_name', 'country_name', 'trim|required');
               

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('adminpages/countries', $data);
                } else {
                    

                     // $cat_order=is_numeric ($this->input->post('cat_order')) ? $this->input->post('cat_order') : 0;
                    $insertdata = array(
                        'sortname' => $this->input->post('sort_name'),
                        'name' => $this->input->post('country_name'),
                        'phonecode' => $this->input->post('phone_code')
                    );
                

                    $insert = $this->Country_model->insertCountries($insertdata);
                    if ($insert) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success"> created Successfully</div>');
                        redirect('country');
                    }
                }////end form validation run				
            } else {///if not submit form
                $this->load->view('adminpages/countries', $data);
            }
        } else {//IF NOT login
            redirect('admin/login');
        }
    }

    public function EditCountries() {
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {

            $data['country'] = $this->Country_model->CountriesByID($this->uri->segment(3));
            if ($data['country']) {
                $data['countries'] = $this->Country_model->getCountries();
                if ($this->input->post() != NULL) {
                    $this->form_validation->set_rules('sort_name', 'country_name', 'trim|required');

                    if ($this->form_validation->run() == FALSE) {
                        $this->load->view('adminpages/editcountries', $data);
                    } else {
                        
               


                    // $cat_order=is_numeric ($this->input->post('cat_order')) ? $this->input->post('cat_order') : 0;

                        $updatedata = array(
                            'sortname' => $this->input->post('sort_name'),
                            'name' => $this->input->post('name'),
                            'phonecode' => $this->input->post('phone_code')
                            // 'cat_order'=>$cat_order
                        );

                       

                        $update = $this->Country_model->updateCountries($updatedata, $this->uri->segment(3));
                        if ($update) {
                            $this->session->set_flashdata('message', '<div class="alert alert-success">Country updated</div>');
                            redirect('country/EditCountries/' . $this->uri->segment(3));
                        }
                    }////end form validation run				
                } else {///if not submit form
                    $this->load->view('adminpages/editcountries', $data);
                }
            } else {///if not valid URL
                redirect('Country');
            }
        } else {//IF NOT login
            redirect('admin/login');
        }
    }

    public function deleteCountries() {
        if ($this->session->userdata('loggedin')) {
            $delete = $this->Country_model->deleteCountries($this->input->post('ID'));
            //var_dump($delete); die();
            if ($delete) {
                echo "<div class='alert alert-success'>Country deleted.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error Occured.</div>";
            }
        }
    }
    public function deleteStates() {
        if ($this->session->userdata('loggedin')) {
            $delete = $this->Country_model->deleteStates($this->input->post('ID'));
            if ($delete) {
                echo "<div class='alert alert-success'>State deleted.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error Occured.</div>";
            }
        }
    }
    public function getsubByCategoriesID() {

            $subcategories = $this->Categories_model->getsubByCategoriesID($this->input->post('ID'));
           echo json_encode($subcategories);
    }
    public function States() {
         if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
             //if subcat get by cat_ID
             if($this->uri->segment(3)) {
                 $data['country'] = $this->Country_model->CountriesByID($this->uri->segment(3));
             }
             $data['stateContry'] = $this->Country_model->StateById($this->uri->segment(3));
              // echo "<pre>";   var_dump($data['subcategories']); die();
            $data['countries'] = $this->Country_model->getCountries();

            if ($this->input->post() != NULL) {
                // echo "1234";
                // exit;
                $this->form_validation->set_rules('state', 'State', 'trim|required');
                $this->form_validation->set_rules('country_ID', 'Country', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('adminpages/states/'.$this->uri->segment(3), $data);
                } else {
                $state_order=is_numeric ($this->input->post('state_order')) ? $this->input->post('state_order') : 0;

                    $insertdata = array('name' => $this->input->post('state'),
                                        'country_id' => $this->input->post('country_ID')
                                        );
                    // var_dump($insertdata); die;
                    $insert = $this->Country_model->insertState($insertdata);
                    if ($insert) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">State  created</div>');
                        redirect('country/states/'.$this->uri->segment(3));
                    }
                }////end form validation run                
            } else {///if not submit form
                $this->load->view('adminpages/states', $data);
            }
        } else {//IF NOT login
            redirect('admin/login');
        }
    }
     public function getCitiesById() {

            $cities = $this->Categories_model->getCityById($this->input->post('id'));
           echo json_encode($cities);
    }
 
    public function Cities() {
         if ($this->session->userdata('loggedin')) {
             //if subcat get by cat_ID
            // var_dump($this->uri->segment(4)); die;
             if($this->uri->segment(3)) {
               // $data['country'] = $this->Country_model->CountriesByID($this->uri->segment(3));
                 $data['state'] = $this->Country_model->StateById($this->uri->segment(3));
                 $data['stateOne'] = $this->Country_model->StateByStateId($this->uri->segment(4));
                 // var_dump($data['state']); duie;
             }
             $data['cityState'] = $this->Country_model->getCity($this->uri->segment(4));
              // echo "<pre>";   var_dump($data['subcategories']); die();
             // echo "<pre>"; print_r($data['cityState']);exit;
            $data['states'] = $this->Country_model->getState();

           //echo "<pre>"; print_r($data['states']);exit;
            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('city', 'city', 'trim|required');
                $this->form_validation->set_rules('state_id', 'state', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('adminpages/cities', $data);
                } else {
                //$city_oder=is_numeric ($this->input->post('name')) ? $this->input->post('name') : 0;

                    $insertdata = array('name' => $this->input->post('city'),
                                        'state_id' => $this->input->post('state_id')
                                        );
                    // var_dump($insertdata); die;
                    $insert = $this->Country_model->insertCity($insertdata);
                    if ($insert) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Inserted Successfully</div>');
                        redirect('country/cities/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
                    }
                }////end form validation run				
            } else {///if not submit form
                $this->load->view('adminpages/cities', $data);
            }
        } else {//IF NOT login
            redirect('admin/login');
        }
   }

   public function deleteCity() {
        if ($this->session->userdata('loggedin')) {
            $delete = $this->Country_model->deleteCity($this->input->post('ID'));
            if ($delete) {
                echo "<div class='alert alert-success'>city deleted.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error Occured.</div>";
            }
        }
    }
    
   
   
public function EditStates() {
         if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {

            $data['country'] = $this->Country_model->getCountries($this->uri->segment(3));
            // $data['subcategory'] = $this->Country_model->CategoriesByID($this->uri->segment(3));
            $data['state'] = $this->Country_model->StateByStateId($this->uri->segment(3));
            // echo "<pre>"; var_dump($data['state']); die();
            if ($data['country']) {
                $data['country'] = $this->Country_model->getCountries();
                if ($this->input->post() != NULL) {
                    
                    $this->form_validation->set_rules('country_id', 'name', 'trim|required');

                    if ($this->form_validation->run() == FALSE) {
                        $this->load->view('adminpages/editstates', $data);
                    } else {
                        
                       
               


                    // $cat_order=is_numeric ($this->input->post('cat_order')) ? $this->input->post('cat_order') : 0;

                        $updatedata = array(
                            'country_id' => $this->input->post('country_id'),
                            'name' => $this->input->post('state'),
                            // 'phonecode' => $this->input->post('phone_code')
                            // 'cat_order'=>$cat_order
                        );
                        // print_r($updatedata);
                        // exit;


                        $update = $this->Country_model->updateState($updatedata, $this->uri->segment(3));
                        // print_r($update);
                        // exit;
                         //echo var_dump($update); die();
                        if ($update) {
                            $this->session->set_flashdata('message', '<div class="alert alert-success">State updated</div>');
                            redirect('country/EditStates/' . $this->uri->segment(3));
                        }
                    }////end form validation run                
                } else {///if not submit form
                    $this->load->view('adminpages/editstates', $data);
                }
            } else {///if not valid URL
                redirect('Country');
            }
        } else {//IF NOT login
            redirect('admin/login');
        }
    }



    public function EditCities() {
         if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {

            $data['category'] = $this->Country_model->StateById($this->uri->segment(3));
            // $data['subcategory'] = $this->Country_model->CategoriesByID($this->uri->segment(3));
            $data['state'] = $this->Country_model->CitiesById($this->uri->segment(5));
            // echo "<pre>"; var_dump($data['state']); die();
            if ($data['category']) {
                $data['categories'] = $this->Country_model->getState();
                if ($this->input->post() != NULL) {
                    $this->form_validation->set_rules('cat_ID', 'name', 'trim|required');

                    if ($this->form_validation->run() == FALSE) {
                        $this->load->view('adminpages/editcities', $data);
                    } else {
                        
               


                    // $cat_order=is_numeric ($this->input->post('cat_order')) ? $this->input->post('cat_order') : 0;

                        $updatedata = array(
                            'state_id' => $this->input->post('cat_ID'),
                            'name' => $this->input->post('name'),
                            // 'phonecode' => $this->input->post('phone_code')
                            // 'cat_order'=>$cat_order
                        );

                       

                        $update = $this->Country_model->updateCities($updatedata, $this->uri->segment(5));
                        // var_dump($update); die();
                        if ($update) {
                            $this->session->set_flashdata('message', '<div class="alert alert-success">City updated</div>');
                            redirect('country/cities/' . $this->uri->segment(3).'/'.$this->uri->segment(4));
                        }
                    }////end form validation run                
                } else {///if not submit form
                    $this->load->view('adminpages/editcities', $data);
                }
            } else {///if not valid URL
                redirect('Country');
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






}

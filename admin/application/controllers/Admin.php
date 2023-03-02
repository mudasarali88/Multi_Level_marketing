<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('User_model');
        $this->load->model('Ads_model', 'ads');
        $this->load->model('country_model');
        $this->load->model('Categories_model');
        $this->load->helper('custome_helper');

    }
	
	public function index()
	{	
            if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')){

                 $this->load->model('Product_model');
                 $this->load->model('blog_model');
                 $data['totalProducts']=$this->Product_model->getNumActiveProducts(); 
                 $data['inactive']=$this->Product_model->getinactiveusers();
                 $data['withdraw']=$this->Product_model->totalwithdrawreq();
                 // var_dump($data['withdraw']);die;
                 $data['totalPosts']=$this->blog_model->getNumActivePost();
                 $data['totalUser']=$this->User_model->getNumActiveUser();
                 // var_dump($data['totalUser']);die;
                $data['totalDealer']=$this->User_model->getNumActiveDealer();

                $this->load->view('adminpages/dashboard',$data);
                }else{
                redirect('admin/login');
                }
	}
    public function login()
	{
          if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')){
            redirect('admin');
            }else{
            $this->load->view('adminpages/login');
            }
	}
    public function logOut()
	{
            if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')){
                $this->session->unset_userdata('loggedin');
                $this->session->unset_userdata('ID');
                $this->session->unset_userdata('IsAdmin');
                redirect('admin/login');
                }else{
                redirect('admin/login');
                }
	}
    public function signupPaymentStts()
    {
        $update['paymentStatus'] = $this->uri->segment(4);
        $this->db->where('ID',$this->uri->segment(3));
        if($this->db->update('users', $update))
        {
            $this->session->set_flashdata('message','Status Updated');
            redirect('admin/AddUser');
        }else{
            $this->session->set_flashdata('message','Status Update fail please try again');
            redirect('admin/AddUser');
        }
    }
    public function userTree()
    {
        if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')){
            //$refId=$this->User_model->userexistByID($this->uri->segment(3));
            $data['title'] = 'User Tree';
            $this->load->view('adminpages/userTree', $data);
        }
        else{
            $this->session->set_flashdata('message','Credential Invalid. Try Again');
            redirect('admin/login');
        }
    }
    public function userTreeAdvance()
    {
        if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')){
            //$refId=$this->User_model->userexistByID($this->uri->segment(3));
            $data['title'] = 'User Tree';
            $this->load->view('adminpages/userTreeAdvance', $data);
        }
        else{
            $this->session->set_flashdata('message','Credential Invalid. Try Again');
            redirect('admin/login');
        }
    }
    public function Adminlogincheck()
	{
		if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin') ){
				redirect('admin');
			}else{
				$this->form_validation->set_rules('email', 'email', 'trim|required');
				$this->form_validation->set_rules('password', 'password', 'trim|required');

				if ($this->form_validation->run() == FALSE){
						redirect('admin/login');
						}else{
						$user = $this->Admin_model->adminexist($this->input->post('email'),$this->input->post('password')); 
                        // var_dump($user); die();
						
						if($user){
							$this->session->set_userdata('loggedin',true);
                            $this->session->set_userdata('IsAdmin',$user[0]['IsAdmin']);
                			$this->session->set_userdata('ID',$user[0]['ID']);
							redirect('admin');
							}else{
								$this->session->set_flashdata('message','Credential Invalid. Try Again');
								redirect('admin/login');
								}
						}//end form validation run
				
			}//else end
	}	
	
    public function forgetpass()
	{
           
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            if ($this->form_validation->run() == FALSE){
               echo "Please enter valide email";
              exit;
            }else{
            $data['user'] = $this->Admin_model->adminexistByEmail($this->input->post('email')); 
			
            if($data['user']){
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $randomString = '';
                    
                    for ($i = 0; $i < 10; $i++) {
                            $randomString .= $characters[rand(0, strlen($characters) - 1)];
                    }

                    $data['resetlink'] = sha1($randomString);
                    $link = $this->Admin_model->updateResetLink($data['resetlink'],$this->input->post('email'));
                    $body=$this->load->view('adminpages/Email_temp', $data,true);
                   
                    /*$this->load->library('email');
                    $config['protocol']    = 'smtp';
                    $config['smtp_host']    = 'ssl://smtp.gmail.com';
                    $config['smtp_port']    = '465';
                    $config['smtp_timeout'] = '7';
                    $config['smtp_user']    = 'client.smtp35@gmail.com';
                    $config['smtp_pass']    = 'Khan21051991';
                    $config['charset']    = 'utf-8';
                    $config['newline']    = "\r\n";
                    $config['mailtype'] = 'html'; // text or html
                    $config['validation'] = TRUE; 
                    $this->email->initialize($config);
                    $this->email->from('noreply@example.com', 'Brands Valley');
                    $this->email->to($this->input->post('email'));
                    $this->email->subject('Reset Password');
                    $this->email->message($body);
                   */
                
                    // php email function
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    // More headers
                    $headers .= 'From: <'.$this->config->item('noreplyemail').'>'."\r\n";
                
                    if(mail($this->input->post('email'),'Reset Password '.$this->config->item('sitename'), $body,$headers)){
                       echo"<div class='alert alert-success'>Please check your email and follow instruction for reset password.</div>";
                        exit;
                    }else{
                        echo"<div class='alert alert-danger'>Password reset failed.Please Try again</div>";
                        exit;
                    }
                    }else{
                    echo "<div class='alert alert-danger'>Your entered email (".$this->input->post('email').") does not exist</div>";
                    exit;         
                    }
            }//end form validation run

	}	
	
    public function resetpassword($link){
           $data['user'] = $this->Admin_model->ResetLinkexist($link);
           
           if ($this->input->post() != NULL) {
               $this->form_validation->set_rules('Password', 'Password', 'trim|required');
                $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|required|matches[Password]');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', 'Failed. Please Try again.');
                  $this->load->view('adminpages/resetpassword', $data);        
                }else{
                    $this->Admin_model->changePassBylink($link,$this->input->post('Password'));
                    $this->session->set_flashdata('messageSuccess', 'Password Changed.');
                    $this->session->set_flashdata('message','');
                    $this->load->view('adminpages/resetpassword', $data);         
                }
           }else{
           $this->load->view('adminpages/resetpassword', $data);
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
                     $this->session->set_flashdata('message','<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
                return false;
				}
                else
                {
                   return  $this->upload->data();
                }
        }

    function  AddDealer()
    {
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            $data['DealerList'] = $this->User_model->getDealerList();
            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('FirstName', 'First Name', 'trim|required');
                $this->form_validation->set_rules('LastName', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('Password', 'Password', 'trim|required');
                $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|required|matches[Password]');
                $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|is_unique[users.Email]');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('adminpages/adddealer', $data);

                } else {
                    if (!empty($_FILES['Image']['name'])) {
                        if ($image = $this->do_upload()) {
                            $img = $image['file_name'];
                        } else {
                            $this->load->view('adminpages/adddealer', $data);
                            exit;
                        }
                    } else {
                        $img = false;
                    }
                    $insertdata = array('FirstName' => $this->input->post('FirstName'),
                        'LastName' => $this->input->post('LastName'),
                        'Email' => $this->input->post('Email'),
                        'Password' => sha1($this->input->post('Password')),
                        'active'=>1,
                        'IsDealer'=>1
                    );
                    if ($img) {
                        $insertdata['Image'] = $img;
                    }
                    $insert = $this->Admin_model->insertAdmin($insertdata);
                    if ($insert) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Dealer Added.</div>');
                        redirect('admin/AddDealer');
                    }
                }////end form validation run
            } else {///if not submit form
                $this->load->view('adminpages/adddealer', $data);
            }
        } else {//IF NOT login
            redirect('admin/login');
        }

    }
    public function EditDealer(){
        if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')){
            $valide=$this->User_model->dealerexistByID($this->uri->segment(3));

            if($valide){
                $data['DealerList']=$this->User_model->getDealerList();

                if($this->input->post()!=NULL){
                    $this->form_validation->set_rules('FirstName', 'First Name', 'trim|required');
                    $this->form_validation->set_rules('LastName', 'Last Name', 'trim|required');
                    $this->form_validation->set_rules('Password', 'Password', 'trim');
                    $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|matches[Password]');
                    if($this->input->post('Email') !=$this->input->post('old_Email')){
                        $is_unique="|is_unique[users.Email]";
                    }else{
                        $is_unique="";
                    }
                    $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email'.$is_unique);
                    if ($this->form_validation->run() == FALSE)
                    {
                        $this->load->view('adminpages/editdealer',$data);
                        //redirect('admin/AddAdmin');
                    }else{
                        if (!empty($_FILES['Image']['name'])) {
                            if($image=$this->do_upload()){
                                $img=$image['file_name'];
                            }else{
                                redirect('admin/EditDealer/'.$this->uri->segment(3));
                                exit;
                            }
                        }else{
                            $img=false;
                        }
                        $data=array('FirstName'=>$this->input->post('FirstName'),
                            'LastName'=>$this->input->post('LastName'),
                            'Email'=>$_POST['Email']
                        );
                        if($img){
                            $data['Image']=$img;
                        }
                        if(!empty(trim($this->input->post('Password'))))
                        {
                            $data['Password']=sha1($this->input->post('Password'));
                        }
                        $update = $this->Admin_model->updateAdmin($data,$this->uri->segment(3),  $this->uri->segment(3));
                        if($update)
                        {
                            $this->session->set_flashdata('message','<div class="alert alert-success">User updated</div>');
                            redirect('admin/EditDealer/'.$this->uri->segment(3));
                        }
                    }////end form validation run
                }else
                {///if not submit form
                    $this->load->view('adminpages/editdealer',$data);
                }
            }else{///if Not valid url
                $this->session->set_flashdata('message','<div class="alert alert-danger">This user does not Exist</div>');
                redirect('admin/AddDealer');
            }
        }else{//IF NOT login
            redirect('admin/login');
        }

    }

    function  statusChange($ID,$status){
        if($this->session->userdata('loggedin'))
        {
            $updatedata=array('status'=>$status);

            $update = $this->Admin_model->updateAdmin($updatedata,$this->uri->segment(3));
            if ($update) {
                if($status){
                    $statustype="Activated";
                }else{
                    $statustype="Banned";
                }

                $this->session->set_flashdata('message', '<div class="alert alert-success">Successfuly!  Account '.$statustype.'.</div>');
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Status updation failed.</div>');
                redirect($_SERVER['HTTP_REFERER']);
            }

        }else{
            redirect('admin/login');
        }

    }


    function  AddUser()
    {
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            $data['UserList'] = $this->User_model->getUserList();
            // var_dump($data['UserList']);die;
            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('FirstName', 'First Name', 'trim|required');
                $this->form_validation->set_rules('LastName', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('Password', 'Password', 'trim|required');
                $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|required|matches[Password]');
                $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|is_unique[users.Email]');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('adminpages/adduser', $data);

                } else {
                    if (!empty($_FILES['Image']['name'])) {
                        if ($image = $this->do_upload()) {
                            $img = $image['file_name'];
                        } else {
                            $this->load->view('adminpages/addadmin', $data);
                            exit;
                        }
                    } else {
                        $img = false;
                    }
                    $insertdata = array('FirstName' => $this->input->post('FirstName'),
                        'LastName' => $this->input->post('LastName'),
                        'Email' => $this->input->post('Email'),
                        'Password' => sha1($this->input->post('Password')),
                        'active'=>1,
                        'IsUser'=>1
                    );
                    if ($img) {
                        $insertdata['Image'] = $img;
                    }
                    $insert = $this->Admin_model->insertAdmin($insertdata);
                    if ($insert) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">User created</div>');
                        redirect('admin/AddUser');
                    }
                }////end form validation run
            } else {///if not submit form
                $this->load->view('adminpages/adduser', $data);
            }
        } else {//IF NOT login
            redirect('admin/login');
        }

    }
    function  unApprovedUser()
    {
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            $data['UserList'] = $this->User_model->getUnapprovedUserList();
            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('FirstName', 'First Name', 'trim|required');
                $this->form_validation->set_rules('LastName', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('Password', 'Password', 'trim|required');
                $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|required|matches[Password]');
                $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|is_unique[users.Email]');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('adminpages/adduser', $data);

                } else {
                    if (!empty($_FILES['Image']['name'])) {
                        if ($image = $this->do_upload()) {
                            $img = $image['file_name'];
                        } else {
                            $this->load->view('adminpages/addadmin', $data);
                            exit;
                        }
                    } else {
                        $img = false;
                    }
                    $insertdata = array('FirstName' => $this->input->post('FirstName'),
                        'LastName' => $this->input->post('LastName'),
                        'Email' => $this->input->post('Email'),
                        'Password' => sha1($this->input->post('Password')),
                        'active'=>1,
                        'IsUser'=>1
                    );
                    if ($img) {
                        $insertdata['Image'] = $img;
                    }
                    $insert = $this->Admin_model->insertAdmin($insertdata);
                    if ($insert) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">User created</div>');
                        redirect('admin/unApprovedUser');
                    }
                }////end form validation run
            } else {///if not submit form
                $this->load->view('adminpages/unApprovedUser', $data);
            }
        } else {//IF NOT login
            redirect('admin/login');
        }

    }
    public function topEarner($value='')
    {
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            $data['UserList'] = $this->User_model->getTopEarner();
            
            $this->load->view('adminpages/topEarner', $data);
            
        } else {//IF NOT login
            redirect('admin/login');
        }

    }
    public function topRefferer($value='')
    {
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            $data['UserList'] = $this->User_model->gettopRefferer();
            
                $this->load->view('adminpages/toprefferer', $data);
           
        } else {//IF NOT login
            redirect('admin/login');
        }

    }
    public function earnings($value='')
    {
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            $data['UserList'] = $this->User_model->getUserList();
            
                $this->load->view('adminpages/earnings', $data);
           
        } else {//IF NOT login
            redirect('admin/login');
        }

    }
    public function withdrawRequest($value='')
    {
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            $data['UserList'] = $this->User_model->getWithdrawRequests();
            
                $this->load->view('adminpages/withdrawRequest', $data);
           
        } else {//IF NOT login
            redirect('admin/login');
        }

    }
    public function withdraw($value='')
    {
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            $data['UserList'] = $this->User_model->getWithdrawtRequess();
            
                $this->load->view('adminpages/withdrawls', $data);
           
        } else {//IF NOT login
            redirect('admin/login');
        }

    }
    public function withdrawProcess($value='')
    {
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            $withdrawid = $this->uri->segment(3);
            $withdrawData = $this->db->get_where('withdrawrequest', array('status'=>0, 'id'=>$withdrawid))->row_array();
            $updateWithdraw = array(
                                'status' => 1
                                );
           $this->db->where('id', $withdrawid);
           $this->db->update('withdrawrequest', $updateWithdraw);

           $userData = $this->User_model->GeneraluserexistByID($withdrawData['userId']);
           $totalBalance = $userData[0]['balance'] - $withdrawData['amount'];
           $totalWithdrawl = $userData[0]['withdrawl'] + $withdrawData['amount'];
           $updateUser = array(
                            'balance'=>$totalBalance,
                            'withdrawl'=>$totalWithdrawl
                        );
           $this->db->where('ID', $userData[0]['ID']);
           $this->db->update('users', $updateUser);
           $this->session->set_flashdata('message','<div class="alert alert-danger">Request Process Successfully</div>');
           redirect('admin/withdrawRequest');
        } else {//IF NOT login
            redirect('admin/login');
        }

    }
    public function UserEarnings($value='')
    {
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            $data['UserList'] = $this->User_model->getEarningDetails($this->uri->segment(3));
            
                $this->load->view('adminpages/earningDetail', $data);
           
        } else {//IF NOT login
            redirect('admin/login');
        }

    }

    public function EditUser(){
        if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')){
            $valide=$this->User_model->userexistByID($this->uri->segment(3));

            if($valide){
                $data['UserList']=$this->User_model->getUserList();
                $data['countryList'] = $this->country_model->getCountries();
                $data['stateList'] = $this->country_model->getState();
                $data['cityList'] = $this->country_model->getAllcity();
                if($this->input->post()!=NULL){
                    //echo "<pre>"; print_r($this->input->post()); die;
                    $this->form_validation->set_rules('FirstName', 'First Name', 'trim|required');
                    $this->form_validation->set_rules('LastName', 'Last Name', 'trim|required');
                    $this->form_validation->set_rules('Password', 'Password', 'trim');
                    $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|matches[Password]');
                    $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|matches[Password]');
                    $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|matches[Password]');
                    $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|matches[Password]');
                    $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|matches[Password]');
                    $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|matches[Password]');
                    $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|matches[Password]');
                    $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|matches[Password]');
                    $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|matches[Password]');
                    $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|matches[Password]');
                    if($this->input->post('Email') !=$this->input->post('old_Email')){
                        $is_unique="|is_unique[users.Email]";
                    }else{
                        $is_unique="";
                    }
                    $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email'.$is_unique);
                    if ($this->form_validation->run() == FALSE)
                    {
                        // var_dump(validation_errors()); die;
                        $this->load->view('adminpages/edituser',$data);
                        //redirect('admin/AddAdmin');
                    }else{
                        if (!empty($_FILES['Image']['name'])) {
                            if($image=$this->do_upload()){
                                $img=$image['file_name'];
                            }else{
                                redirect('admin/EditUser/'.$this->uri->segment(3));
                                exit;
                            }
                        }else{
                            $img=false;
                        }
                        /*$data=array('FirstName'=>$this->input->post('FirstName'),
                            'LastName'=>$this->input->post('LastName'),
                            'Email'=>$_POST['Email'],
                            'Password'=>sha1($this->input->post('Password'))
                        );*/
                        if($img){
                            $data['Image']=$img;
                        }
                        if(!empty(trim($this->input->post('Password'))))
                        {
                            $_POST['Password']=sha1($this->input->post('Password'));
                        }
                        else
                        {
                            unset($_POST['Password']);   
                        }
                        // var_dump($data);die;
                        unset($_POST['old_Email']);
                        unset($_POST['ConfirmPassword']);
                        $update = $this->Admin_model->updateAdmin($this->input->post(),$this->uri->segment(3));
                        // var_dump($this->db->last_query()); die;
                        if($update)
                        {
                            $this->session->set_flashdata('message','<div class="alert alert-success">User updated</div>');
                            redirect('admin/EditUser/'.$this->uri->segment(3));
                        }

                    }////end form validation run
                }else
                {///if not submit form
                    $this->load->view('adminpages/edituser',$data);
                }
            }else{///if Not valid url
                $this->session->set_flashdata('message','<div class="alert alert-danger">This user does not Exist</div>');
                redirect('admin/AddUser');
            }
        }else{//IF NOT login
            redirect('admin/login');
        }

    }
    public function suspend_user()
    {
        $data = array(
            'deletestatus' =>'0' 
        );
       // / var_dump($this->uri->segment(3));die;
        $suspend = $this->Admin_model->suspend_users($this->uri->segment(3),$data);
        redirect('admin/AddUser');
    }
     public function delete_unapprove()
    {
        // var_dump('exdsdsd');die;
        $data = array(
            'active' =>'2' 
        );
       // / var_dump($this->uri->segment(3));die;
        $suspend = $this->Admin_model->delete_anapprove($this->uri->segment(3),$data);
        redirect('admin/unApprovedUser');
    }
    public function active_back()
    {
        $data = array(
            'deletestatus' =>'1' 
        );
       // / var_dump($this->uri->segment(3));die;
        $suspend = $this->Admin_model->active_back($this->uri->segment(3),$data);
        redirect('admin/AddUser');
    }    

        public function AddAdmin() {


        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            $data['AdminList'] = $this->Admin_model->getAdminList();
            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('FirstName', 'First Name', 'trim|required');
                $this->form_validation->set_rules('LastName', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('Password', 'Password', 'trim|required');
                $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|required|matches[Password]');
                $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|is_unique[users.Email]');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('adminpages/addadmin', $data);

                } else {
                    if (!empty($_FILES['Image']['name'])) {
                        if ($image = $this->do_upload()) {
                            $img = $image['file_name'];
                        } else {
                            $this->load->view('adminpages/addadmin', $data);
                            exit;
                        }
                    } else {
                        $img = false;
                    }
                    $insertdata = array('FirstName' => $this->input->post('FirstName'),
                        'LastName' => $this->input->post('LastName'),
                        'Email' => $this->input->post('Email'),
                        'Password' => sha1($this->input->post('Password')),
                        'active'=>1,
                        'IsAdmin'=>1
                        );
                    if ($img) {
                        $insertdata['Image'] = $img;
                    }
                    $insert = $this->Admin_model->insertAdmin($insertdata);
                    if ($insert) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Admin created</div>');
                        redirect('admin/AddAdmin');
                    }
                }////end form validation run				
            } else {///if not submit form
                $this->load->view('adminpages/addadmin', $data);
            }
        } else {//IF NOT login
            redirect('admin/login');
        }
    }



    public function EditAdmin(){
            if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')){
            $valide=$this->Admin_model->adminexistByID($this->uri->segment(3));
            if($valide){
            $data['AdminList']=$this->Admin_model->getAdminList();		
            if($this->input->post()!=NULL){
                    $this->form_validation->set_rules('FirstName', 'First Name', 'trim|required');
                    $this->form_validation->set_rules('LastName', 'Last Name', 'trim|required');
                    $this->form_validation->set_rules('Password', 'Password', 'trim');		
                    $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|matches[Password]');
                    $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
                    if ($this->form_validation->run() == FALSE)
                        {
                                $this->load->view('adminpages/editadmin',$data);
                                //redirect('admin/AddAdmin');
                        }else{
                 if (!empty($_FILES['Image']['name'])) {
                               if($image=$this->do_upload()){
                               $img=$image['file_name'];
                                }else{
                                redirect('admin/EditAdmin/'.$this->uri->segment(3));
                                exit;
                                }
                                }else{
                                    $img=false;
                                 }			
                            $data=array('FirstName'=>$this->input->post('FirstName'),
                                        'LastName'=>$this->input->post('LastName'),
                                        'Email'=>$_POST['Email']
                                       ); 
                            if($img){
                                    $data['Image']=$img;
                                    }
                            if(!empty(trim($this->input->post('Password'))))
                                  {
                                   $data['Password']=sha1($this->input->post('Password')); 
                                  }
                            $update = $this->Admin_model->updateAdmin($data,$this->uri->segment(3));
                            if($update)
                                    {
                                    $this->session->set_flashdata('message','<div class="alert alert-success">Admin updated</div>');
                                    redirect('admin/EditAdmin/'.$this->uri->segment(3));
                                    }
                    }////end form validation run				
			}else
			{///if not submit form
				$this->load->view('adminpages/editadmin',$data);	
			}
                       }else{///if Not valid url
                         $this->session->set_flashdata('message','<div class="alert alert-danger">This user does not Exist</div>');
                         redirect('admin/AddAdmin');
                       }
                       }else{//IF NOT login
					redirect('admin/login');
			}	
		
                }
      
        public function deleteAdmin(){
            // var_dump('expression');die;
           if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin'))
               {        
                $delete=$this->Admin_model->deleteAdmin($this->input->post('ID'));
                if($delete){
                    echo "<div class='alert alert-success'>".$this->input->post('userType')." deleted.</div>";
                   }else{
                    echo "<div class='alert alert-danger'>Error Occured.</div>";
                    }
                }
        }
        public function approveUser(){
           if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin'))
               {
                    $user = $this->User_model->GeneraluserexistByID($this->uri->segment(3));
                    if($user)
                    {
                        $reffererData = $this->User_model->GeneraluserexistByRefId($user['sponsor']);
                        if($reffererData)
                        {
                            $packageData            = $this->Categories_model->subCategoriesByID($user['spackage']);
                            $comissionCalculation   = ($packageData['price']    * $packageData['comission'])/100;
                            $update['balance']      = $comissionCalculation     + $reffererData['balance'];
                            $update['earning']      = $comissionCalculation     + $reffererData['earning'];
                            $update['refCount']     = $reffererData['refCount'] + 1;
                            
                            $this->db->where('ID', $reffererData['ID']);   
                            $this->db->update('users', $update);
                            unset($update);

                            $insertEarning['refferedId']    = $user['ID'];
                            $insertEarning['amount']        = $comissionCalculation;
                            $insertEarning['refererId']     = $reffererData['ID'];
                            $insertEarning['description']   = 'Refferer Comission Tranfered';
                            
                            $this->db->insert('earnings', $insertEarning);

                            unset($insertEarning);
                        }
                        
                        $refChildern = $this->User_model->getActiveUserBySponser($reffererData['refId']);
                         //var_dump($refChildern); die; 
                        if(count($refChildern)==0)
                        {
                            $update['refId']        = strtolower($user['FirstName']).$user['ID'];
                            $update['refId2']       = $reffererData['refId'];
                            $update['active']       = '1';
                            $update['user_level']   = $reffererData['user_level'] + 1;
                            
                            $this->db->where('ID', $user['ID']);
                            $this->db->update('users', $update);
                            unset($update);   
                        }
                        elseif(count($refChildern)==1)
                        {
                            if($refChildern[0]['basicNodeSide'] != $user['basicNodeSide'])
                            {
                                $update['refId']        = strtolower($user['FirstName']).$user['ID'];
                                $update['refId2']       = $reffererData['refId'];
                                $update['active']       = '1';
                                $update['user_level']   = $reffererData['user_level'] + 1;
                                
                                $this->db->where('ID', $user['ID']);
                                $this->db->update('users', $update);
                                unset($update);
                            }
                            else
                            {
                                if($refChildern[0]['basicNodeSide']=='left')
                                {
                                    $update['basicNodeSide']    = 'right';
                                    $update['refId']            = strtolower($user['FirstName']).$user['ID'];
                                    $update['refId2']           = $reffererData['refId'];
                                    $update['active']           = '1';
                                    $update['user_level']       = $reffererData['user_level'] + 1;
                                    
                                    $this->db->where('ID', $user['ID']);
                                    $this->db->update('users', $update);
                                    unset($update);
                                }
                                elseif($refChildern[0]['basicNodeSide']=='right')   
                                {
                                    $update['basicNodeSide']    = 'left';
                                    $update['refId']            = strtolower($user['FirstName']).$user['ID'];
                                    $update['refId2']           = $reffererData['refId'];
                                    $update['active']           = '1';
                                    $update['user_level']       = $reffererData['user_level'] + 1;
                                    
                                    $this->db->where('ID', $user['ID']);
                                    $this->db->update('users', $update);
                                    unset($update);
                                }
                            }                               
                        }
                        elseif(count($refChildern)==2)
                        {
                            //var_dump('expression'); die;
                            $side               = $user['basicNodeSide'];
                            $parentRefId        = $reffererData['refId'];
                            $refLvl             = $reffererData['user_level']+1;
                            $treeNodeParent     = '';
                            while($parentRefId != '')
                            {
                                $treeLeafFinder = $this->User_model->getUserBySponserAndSide($side, $parentRefId);
                                if($treeLeafFinder)
                                {
                                    $parentRefId = $treeLeafFinder['refId'];
                                    $refLvl      = $treeLeafFinder['user_level']+1;
                                }
                                else
                                {
                                    $update['refId']        = strtolower($user['FirstName']).$user['ID'];
                                    $update['active']       = '1';
                                    $update['refId2']       = $parentRefId;
                                    $update['user_level']   = $refLvl + 1;
                                    
                                    $this->db->where('ID', $user['ID']);
                                    $this->db->update('users', $update);
                                    
                                    unset($parentRefId);
                                }
                            }
                        }
                        /////// level completion comission section code
                        /*$usersponsor = $user['refId2'];
                        $i=$user['user_level'];
                        $totalTreeNodes = 0;
                        $lvlCount = 0;
                        while($i >= 1)
                        {

                            $n = $user['user_level'];
                            $totalChildShouldBe = (pow(2, $n))-1;
                            
                            $parentData = $this->User_model->GeneraluserexistByRefId($usersponsor);
                            $this->countNodes($parentData['refId2']);
                            
                            if($totalChildShouldBe == $totalTreeNodes)
                            {
                                if($parentData['active'] == '1' && $parentData['status'] == '1')
                                {
                                    $comissionAmount = ($packageData['price'] * $packageData['comission'])/100;
                                    $update['balance']      = $comissionCalculation     + $parentData['balance'];
                                    $update['earning']      = $comissionCalculation     + $parentData['earning'];
                                    
                                    $this->db->where('ID', $parentData['ID']);
                                    $this->db->update('users', $update);

                                    unset($update);

                                    $insertEarning['amount']        = $comissionAmount;
                                    $insertEarning['refererId']     = $parentData['ID'];
                                    $insertEarning['description']   = 'Level Completion Comission Tranfered';

                                     $this->db->insert('earnings', $insertEarning);

                                     unset($insertEarning);
                                     $usersponsor = $parentData['refId2'];
                                }
                                else
                                {
                                    $usersponsor = $parentData['refId2'];
                                }
                            }
                            else
                            {
                                break;
                            }
                            $i--;
                        }*/
                        redirect('admin/unApprovedUser');
                    } 
                    /*$updateArray['active'] = '1';
                    $this->db->where('ID', $this->uri->segment(3));
                    $delete= $this->db->update('users', $updateArray);
                    // $delete=$this->Admin_model->deleteAdmin($this->input->post('ID'));
                    if($delete){
                        redirect('admin/unApprovedUser');
                       }else{
                        redirect('admin/unApprovedUser');
                        // echo "<div class='alert alert-danger'>Error Occured.</div>";
                        }*/
                }
        }
        private function countNodes($parentid='') 
         {
            /*global $totalTreeNodes;
            global $con;
          $sql="SELECT * FROM users WHERE refId2='$parentid'";
          $result=mysqli_query($con, $sql);*/
          $i=0;
          while (true) {
            $row=$this->db->get_where('users', array('refId2'=>$parentid))->row_array();
            if (!$row) break;
            // if ($i==0) echo "";
            $i=1;
            $totalTreeNodes++;
            echo $totalTreeNodes;
            // echo '';
            countNodes($row['refId2']);
            //echo '</li>';
          }
          // if ($i>0) echo  '';

        }
        public function deleteSlider(){
           if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin'))
               {        
                $delete=$this->Admin_model->deleteSlider($this->input->post('id'));
                if($delete){
                    echo "<div class='alert alert-success'>Slider deleted.</div>";
                   }else{
                    echo "<div class='alert alert-danger'>Error Occured.</div>";
                    }
                }
        }
        public function deleteSlug(){
           if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin'))
               {        
                // var_dump($this->uri->segment(3)); die();
                $delete=$this->Admin_model->deleteSlug($this->uri->segment(3));
                // var_dump($delete);
                if($delete){
                    // echo "<div class='alert alert-success'>Slug deleted.</div>";
                    $this->session->set_flashdata('message','<div class="alert alert-success">Slug deleted.</div>');
                        redirect('admin/HomePageSlug');
                   }else{
                    $this->session->set_flashdata('message','<div class="alert alert-success">slug not deleted.</div>');
                        redirect('admin/HomePageSlug');
                    }
                }
        }
        public function deletePackage(){
           if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin'))
               {        
                // var_dump($this->uri->segment(3)); die();
                $delete=$this->Admin_model->deletePackage($this->uri->segment(3));
                // var_dump($delete);
                if($delete){
                    // echo "<div class='alert alert-success'>Slug deleted.</div>";
                    $this->session->set_flashdata('message','<div class="alert alert-success">Package deleted.</div>');
                        redirect('admin/paymentPackages');
                   }else{
                    $this->session->set_flashdata('message','<div class="alert alert-success">Package not deleted.</div>');
                        redirect('admin/paymentPackages');
                    }
                }
        }
        public function deleteGif(){
           if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin'))
               {        
                // var_dump($this->uri->segment(3)); die();
                $delete=$this->Admin_model->deleteGif($this->uri->segment(3));
                // var_dump($delete);
                if($delete){
                    // echo "<div class='alert alert-success'>Slug deleted.</div>";
                    $this->session->set_flashdata('message','<div class="alert alert-success">Gif Image deleted.</div>');
                        redirect('admin/HomePageGif');
                   }else{
                    $this->session->set_flashdata('message','<div class="alert alert-success">Gif Image not deleted.</div>');
                        redirect('admin/HomePageGif');
                    }
                }
        }




        public function editProfile() {
            if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')){
            if($this->input->post()!=NULL){
                    $this->form_validation->set_rules('FirstName', 'First Name', 'trim|required');
                    $this->form_validation->set_rules('LastName', 'Last Name', 'trim|required');
                    $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
                    if ($this->form_validation->run() == FALSE)
                            {
                                $this->load->view('adminpages/editprofile');
                           
                            }else{						
                                     if (!empty($_FILES['Image']['name'])) {
                                    if($image=$this->do_upload()){
                                        $img=$image['file_name'];	
                                    }else{
                                    $this->load->view('adminpages/editprofile');		
                                    exit;
                                    }
                            }else{
                                    $img=false;
                               }
                            	$data=array('FirstName'=>$this->input->post('FirstName'),
        			    'LastName'=>$this->input->post('LastName'),
                                    'Email'=>$this->input->post('Email')
 				   ); 
                                   if($img){
                                    $data['Image']=$img;
                                    }
                            $update = $this->Admin_model->updateAdmin($data,$this->session->userdata('ID')); 
                            if($update)
                                    {
                                    $this->session->set_flashdata('message','<div class="alert alert-success">Profile updated</div>');
                                    redirect('admin/editProfile');
                                    }
                           }////end form validation run				
			}else
			{///if not submit form
				$this->load->view('adminpages/editprofile');	
			}
                       
                       }else{//IF NOT login
					redirect('admin/login');
			}
            
       }
       
        public function setting(){   
        if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')){
            if($this->input->post()!=NULL){
                $this->form_validation->set_rules('currentPassword', 'Current Password', 'trim|required');      
                $this->form_validation->set_rules('Password', 'Password', 'trim|required');     
                $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|required|matches[Password]');
                if ($this->form_validation->run() == FALSE){
                    $this->load->view('adminpages/setting');
               }else{
                 ///if current password not correct  
            if($this->Admin_model->isCurrentPassword(sha1($this->input->post('currentPassword')),$this->session->userdata('ID'))){
            
            $data=array( 'Password'=>sha1($this->input->post('Password')) ); 
            $update = $this->Admin_model->updateAdmin($data,$this->session->userdata('ID')); 
            if($update)
                    {
                    $this->session->set_flashdata('message','<div class="alert alert-success">Password Changed</div>');
                    redirect('admin/setting');
                    }  
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger">Your Current Password is incorrect</div>');
                $this->load->view('adminpages/setting');
            }
            
             }////end form validation run               
                }else
                {///if not submit form
                        $this->load->view('adminpages/setting');    
                }
               }else{//IF NOT login
                                redirect('admin/login');
                }      
        }
        
        public function webSettings(){   
        if($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin'))
        {
            if($this->input->post()!=NULL)
            {
                $this->form_validation->set_rules('site_name', 'Site Name', 'trim|required');     
                $this->form_validation->set_rules('site_address', 'Site Address', 'trim|required');     
                $this->form_validation->set_rules('customerAdRate', 'Advance Package Comission Rate', 'trim|required');     
                $this->form_validation->set_rules('site_contact', 'Site Contact', 'trim|required');     
                $this->form_validation->set_rules('site_email', 'Site Email', 'trim|required');
                if ($this->form_validation->run() == FALSE){
            // var_dump('expression'); die;
                $this->session->set_flashdata('message','<div class="alert alert-danger">'.validation_errors().'</div>');
                    redirect('admin/webSettings');
               }else{
                 ///if current password not correct  
            // if($this->Admin_model->isCurrentPassword(sha1($this->input->post('currentPassword')),$this->session->userdata('ID'))){
            
            $data=array(
                'site_name'=>$this->input->post('site_name'), 
                'site_address'=>$this->input->post('site_address'), 
                'site_contact'=>$this->input->post('site_contact'), 
                'site_email'=>$this->input->post('site_email'),
                'customerAdRate'=>$this->input->post('customerAdRate')
                /*'employeeSubscrition'=>$this->input->post('employeeSubscrition'),
                'throughEmployeeSubscription'=>$this->input->post('throughEmployeeSubscription'),
                'commissionToEmplyee'=>$this->input->post('commissionToEmplyee')*/
            ); 
            $this->db->where('id', 1);
            $update = $this->db->update('sitesetting', $data); 
            if($update)
                {
                $this->session->set_flashdata('message','<div class="alert alert-success">Setting Updated</div>');
                redirect('admin/webSettings');
                }  
                else
                {
                   $this->session->set_flashdata('message','<div class="alert alert-danger">Setting Updated Fail please try again</div>');
                redirect('admin/webSettings'); 
                }
            // }
            
             }////end form validation run				
            }
            else
            {///if not submit form
                $data['setting'] = $this->Admin_model->getSiteSettings();
                // var_dump($data['setting']);die;
                $this->load->view('adminpages/webSettings', $data);	
            }
        }
        else
        {//IF NOT login
           redirect('admin/login');
        }      
    }
        

  
  public function AddSlider() {
  
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            
            $data['Slider'] = getSliderList();
            $data['topCountry'] = $this->ads->getTopCountry();
            //      $this->load->view('adminpages/slider');     
            if (!empty($_FILES['Image']['name'])) {
                      
                if($image=$this->do_upload()){//success
                    $img=$image['file_name'];   
                }else{

                $this->load->view('adminpages/slider',$data);        
                exit;
                }
            // var_dump($img); die;

            $data1=array( 'image'=> $img);         
            $update = $this->Admin_model->insertSlider($data1);
            if ($update) {
                $country = $this->input->post('country');
                $states = $this->input->post('states');
                $city = $this->input->post('city');
                if ($country != '') {
                    $countryInsert = $this->Admin_model->insertSliderCountry($update, $country, 0);
                }
                if ($states != '') {
                    $statesInsert = $this->Admin_model->insertSliderStates($update, $states, 0);
                }
                if ($city != '') {
                    $cityInsert = $this->Admin_model->insertSliderCity($update, $city, 0);
                }
             }  
            $this->session->set_flashdata('message','<div class="alert alert-success">Slider Added.</div>');
            redirect('admin/AddSlider');

            }else {///if not submit form
                $this->load->view('adminpages/slider',$data);
                }   
            }
        }
        public function changeSliderStatus()
        {
            $update = array(
                        'isGlobal'=>$this->uri->segment(3)
                     );
            $this->db->where('id', $this->uri->segment(4));
            if ($this->db->update('slider', $update)) {
                $this->session->set_flashdata('message','<div class="alert alert-success">Slider Updated.</div>');
            redirect('admin/AddSlider');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger">Slider Not Updated.</div>');
            redirect('admin/AddSlider');
            }
        }
        public function changeSlugGlobalStatus()
        {
            $update = array(
                        'isGlobal'=>$this->uri->segment(3)
                     );
            $this->db->where('slugId', $this->uri->segment(4));
            if ($this->db->update('webslugs', $update)) {
                $this->session->set_flashdata('message','<div class="alert alert-success">Slug Updated.</div>');
            redirect('admin/HomePageSlug');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger">Slug Not Updated.</div>');
            redirect('admin/HomePageSlug');
            }
        }
        public function changeGifGlobalStatus()
        {
            $update = array(
                        'isGlobal'=>$this->uri->segment(3)
                     );
            $this->db->where('gifId', $this->uri->segment(4));
            if ($this->db->update('webgifs', $update)) {
                $this->session->set_flashdata('message','<div class="alert alert-success">Gif Status Updated.</div>');
            redirect('admin/HomePageGif');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger">Gif Status Not Updated.</div>');
            redirect('admin/HomePageGif');
            }
        }
  public function HomePageGif()
  {
      if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            
            $data['gifs'] = $this->Admin_model->getGifs();
            $data['topCountry'] = $this->ads->getTopCountry();
            // var_dump($data['Slug']); die();
            //      $this->load->view('adminpages/slider');     
            if (!empty($_POST)) {
                      
                if (!empty($_FILES['gifImg']['name'])) {
                        if ($image = $this->do_gif_image_upload()) {
                            $img = $image['file_name'];
                            // var_dump($img); die();
                        } else {
                            $this->load->view('admin/HomePageGif', $this->data);
                            exit;
                        }
                    } else {
                        $img = false;
                    }
                $insertdata = array(
                                    'gifTitle'=>$this->input->post('gifTitle'),
                                    'gifImg'=>$img
                                );
            $update = $this->Admin_model->insertGif($insertdata);
            if ($update) {
                $country = $this->input->post('country');
                $states = $this->input->post('states');
                $city = $this->input->post('city');
            // var_dump($update); die;
                if ($country != '') {
                    $countryInsert = $this->Admin_model->insertGifCountry($update, $country, 0);
                }
                if ($states != '') {
                    $statesInsert = $this->Admin_model->insertGifStates($update, $states, 0);
                }
                if ($city != '') {
                    $cityInsert = $this->Admin_model->insertGifCity($update, $city, 0);
                }
             } 

            $this->session->set_flashdata('message','<div class="alert alert-success">Gif Created.</div>');
            redirect('admin/HomePageGif');

            }else {///if not submit form
                $this->load->view('adminpages/homeGif',$data);
                }   
            }
  }
  public function HomePageSlug() {
  
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
			
            $data['Slug'] = $this->Admin_model->getSlug();
            $data['topCountry'] = $this->ads->getTopCountry();
            // var_dump($data['Slug']); die();
			//		$this->load->view('adminpages/slider');		
			if (!empty($_POST)) {
                      
                if (!empty($_FILES['slugImg']['name'])) {
                        if ($image = $this->do_slug_image_upload()) {
                            $img = $image['file_name'];
                            // var_dump($img); die();
                        } else {
                            $this->load->view('admin/HomePageSlug', $this->data);
                            exit;
                        }
                    } else {
                        $img = false;
                    }
                $insertdata = array(
                                    'slugheading'=>$this->input->post('slugheading'),
                                    'slugtext'=>$this->input->post('slugtext'),
                                    'slugImg'=>$img
                                );
            $update = $this->Admin_model->insertSlug($insertdata);
            if ($update) {
                $country = $this->input->post('country');
                $states = $this->input->post('states');
                $city = $this->input->post('city');
            // var_dump($update); die;
                if ($country != '') {
                    $countryInsert = $this->Admin_model->insertSlugCountry($update, $country, 0);
                }
                if ($states != '') {
                    $statesInsert = $this->Admin_model->insertSlugStates($update, $states, 0);
                }
                if ($city != '') {
                    $cityInsert = $this->Admin_model->insertSlugCity($update, $city, 0);
                }
             } 

            $this->session->set_flashdata('message','<div class="alert alert-success">Salogen Created.</div>');
            redirect('admin/HomePageSlug');

			}else {///if not submit form
                $this->load->view('adminpages/webslug',$data);
                }	
			}
        }
        public function do_slug_image_upload() {
            $config['upload_path'] = 'assets/images/slugImages/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 50000;
            $config['max_width'] = 5000;
            $config['max_height'] = 5000;
            $imageName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $_FILES['slugImg']['name']); //remove extension
            $config['file_name'] = $imageName . "_" . time();

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('slugImg')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
                return false;
            } else {
                return $this->upload->data();
            }
        }
        public function do_gif_image_upload() {
            $config['upload_path'] = 'assets/images/gifImages/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 50000;
            $config['max_width'] = 5000;
            $config['max_height'] = 5000;
            $imageName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $_FILES['gifImg']['name']); //remove extension
            $config['file_name'] = $imageName . "_" . time();

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gifImg')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
                return false;
            } else {
                return $this->upload->data();
            }
        }
        public function updateSlag(){
            $id = $this->uri->segment(4);
            $status = array(
                            'slugstatus'=>$this->uri->segment(3)
                            );
            $this->db->where('slugId',$id);
            if($this->db->update('webslugs', $status)){
                $this->session->set_flashdata('message','<div class="alert alert-success">status updated.</div>');
                redirect('admin/HomePageSlug');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-success">Staus not updated Please try again.</div>');
                redirect('admin/HomePageSlug');
            }
            
        }
        public function updatePackage(){
            $id = $this->uri->segment(4);
            $status = array(
                            'status'=>$this->uri->segment(3)
                            );
            $this->db->where('packageId',$id);
            if($this->db->update('adspaymentpackages', $status)){
                $this->session->set_flashdata('message','<div class="alert alert-success">status updated.</div>');
                redirect('admin/paymentPackages');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger">Staus not updated Please try again.</div>');
                redirect('admin/paymentPackages');
            }
            
        }
        public function updateGif(){
            $id = $this->uri->segment(4);
            $status = array(
                            'gifstatus'=>$this->uri->segment(3)
                            );
            // var_dump($status); die;
            $this->db->where('gifId',$id);
            if($this->db->update('webgifs', $status)){
                $this->session->set_flashdata('message','<div class="alert alert-success">status updated.</div>');
                redirect('admin/HomePageGif');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-success">Staus not updated Please try again.</div>');
                redirect('admin/HomePageGif');
            }
            
        }
        public function EditSlug(){
            if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
                $id = $this->uri->segment(3);
                if ($_POST['slugId'] != '') {
                // var_dump($_POST); die();
                        $slugId = $this->input->post('slugId');
                    if (!empty($_FILES['slugImg']['name'])) {
                        if ($image = $this->do_slug_image_upload()) {
                            $img = $image['file_name'];
                            // var_dump($img); die();
                        } else {
                            $this->load->view('admin/HomePageSlug', $this->data);
                            exit;
                        }
                    } else {
                        $img = false;
                    }
                    $update = array(
                        'slugheading'=>$this->input->post('slugheading'),
                        'slugtext'=>$this->input->post('slugtext'),
                        'slugImg'=>$img
                    );
                    $this->db->where('slugId',$slugId);
                    if($this->db->update('webslugs', $update)){
                        $this->session->set_flashdata('message','<div class="alert alert-success">status updated.</div>');
                        redirect('admin/HomePageSlug');
                    }else{
                        $this->session->set_flashdata('message','<div class="alert alert-success">Staus not updated please try again.</div>');
                        redirect('admin/HomePageSlug');
                    }
                }
                $data['slug']= $this->Admin_model->getSlugById($id);
                if($data['slug']){
                    // var_dump($data['slug']['slugId']); die;
                $data['topCountry'] = $this->ads->getTopCountry();
                $data['countryList'] = $this->Admin_model->getCountriesList($data['slug']['slugId']);
                $data['stateList'] = $this->Admin_model->getStateList($data['slug']['slugId']);
                $data['cityList'] = $this->Admin_model->getCityList($data['slug']['slugId']);
                }
                
                $this->load->view('adminpages/editSlug',$data);
            }
        }
        public function EditPackage(){
            if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
                $packageId = $this->uri->segment(3);
                if(!empty($_POST)){

                    $this->form_validation->set_rules('packageTitle', 'package Title', 'required');
                    $this->form_validation->set_rules('duration', 'duration', 'trim|required');
                    $this->form_validation->set_rules('packageCharges', 'Package Charges', 'trim|required');
                    $this->form_validation->set_rules('packageDiscount', 'Package Discount', 'required');
                    $this->form_validation->set_rules('userType', 'User Type', 'trim|required');

                    $update = array(
                        'packageTitle'=>$this->input->post('packageTitle'),
                        'duration'=>$this->input->post('duration'),
                        'packageCharges'=>$this->input->post('packageCharges'),
                        'customerType'=>$this->input->post('userType'),
                        'packageDiscount'=>$this->input->post('packageDiscount'),
                        'status'=>'1'
                    );
                    $this->db->where('packageId',$packageId);
                    if($this->db->update('adspaymentpackages', $update)){
                        $this->session->set_flashdata('message','<div class="alert alert-success">status updated.</div>');
                        redirect('admin/paymentPackages');
                    }else{
                        $this->session->set_flashdata('message','<div class="alert alert-success">Staus not updated please try again.</div>');
                        redirect('admin/paymentPackages');
                    }
                }
                $data['package']= $this->Admin_model->getPackageById($packageId);
                
                // var_dump($data); die;
                $this->load->view('adminpages/editPackage',$data);
            }
        }
        public function EditGif(){
            if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
                $id = $this->uri->segment(3);
                if ($_POST['gifId'] != '') {
                // var_dump($_POST); die();
                        $gifId = $this->input->post('gifId');
                    if (!empty($_FILES['gifImg']['name'])) {
                        if ($image = $this->do_gif_image_upload()) {
                            $img = $image['file_name'];
                            // var_dump($img); die();
                        } else {
                            $this->load->view('admin/HomePageGif', $this->data);
                            exit;
                        }
                    } else {
                        $img = false;
                    }
                    $update = array(
                        'gifTitle'=>$this->input->post('gifTitle'),
                        'gifImg'=>$img
                    );
                    $this->db->where('gifId',$gifId);
                    if($this->db->update('webgif', $update)){
                        $this->session->set_flashdata('message','<div class="alert alert-success">status updated.</div>');
                        redirect('admin/HomePageGif');
                    }else{
                        $this->session->set_flashdata('message','<div class="alert alert-success">Staus not updated please try again.</div>');
                        redirect('admin/HomePageGif');
                    }
                }
                $data['gif']= $this->Admin_model->getGifById($id);
                if($data['gif']){
                $data['topCountry'] = $this->ads->getTopCountry();
                    // var_dump($data['gif']['gifId']); die;
                $data['countryList'] = $this->Admin_model->getGifCountriesList($data['gif']['gifId']);
                $data['stateList'] = $this->Admin_model->getGifStateList($data['gif']['gifId']);
                $data['cityList'] = $this->Admin_model->getGifCityList($data['gif']['gifId']);
                }
                
                $this->load->view('adminpages/editGif',$data);
            }
        }
        public function paymentPackages()
        {
  
        if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) {
            
            $data['packages'] = $this->Admin_model->getPackages();
            if (!empty($_POST)) {
                // var_dump($_POST); die;
                    $this->form_validation->set_rules('packageTitle', 'package Title', 'required');
                    $this->form_validation->set_rules('duration', 'duration', 'trim|required');
                    $this->form_validation->set_rules('packageCharges', 'Package Charges', 'trim|required');
                    $this->form_validation->set_rules('packageDiscount', 'Package Discount', 'required');
                    $this->form_validation->set_rules('userType', 'User Type', 'trim|required');

                if ($this->form_validation->run() == FALSE){}
                $insertdata = array(
                                    'packageTitle'=>$this->input->post('packageTitle'),
                                    'duration'=>$this->input->post('duration'),
                                    'packageCharges'=>$this->input->post('packageCharges'),
                                    'customerType'=>$this->input->post('userType'),
                                    'packageDiscount'=>$this->input->post('packageDiscount'),
                                    'status'=>'1'
                                );
            // $update = ;
            
                if($this->Admin_model->insertPackage($insertdata)){
            $this->session->set_flashdata('message','<div class="alert alert-success">Package Created.</div>');
            redirect('admin/paymentPackages');

            }else
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger">Package Created.</div>');
            redirect('admin/paymentPackages');
            }
            }else {///if not submit form
                $this->load->view('adminpages/payment-packages',$data);
                }   
            }
        }
		


        public function addnewuser()
        {
            if ($this->session->userdata('loggedin') && $this->session->userdata('IsAdmin')) 
            {
                $data['splan']= $this->Categories_model->getBasicCategories();
                $data['packages'] = $this->Categories_model->getsubByCategoriesID($data['splan']['ID']);
                
                if($_POST!="")
                {
                    $this->form_validation->set_rules('FirstName', 'FirstName', 'trim|required');
                    $this->form_validation->set_rules('LastName', 'LastName', 'trim|required');
                    $this->form_validation->set_rules('dob', 'Birthday', 'trim|required');
                    $this->form_validation->set_rules('Telephone', 'Phone Number', 'trim|required');
                    $this->form_validation->set_rules('basicNodeSide', 'Tree Node', 'trim|required');
                    $this->form_validation->set_rules('Password', 'Password', 'trim|required');
                    $this->form_validation->set_rules('sponsor', 'sponsor', 'trim|required');
                    $this->form_validation->set_rules('splan', 'Select Plan', 'trim|required');
                    $this->form_validation->set_rules('spackage', 'Select Package', 'trim|required');
                    if ($this->form_validation->run() == FALSE)
                    {
                        // die(validation_errors());
                            // $this->session->set_flashdata('message','<div class="alert alert-danger">'.validation_errors().'</div>');
                            // redirect('admin/addnewuser');
                    }
                   else
                   {
                    // die('pen di siri');

                        $_POST['Password']=sha1($this->input->post('Password'));
                        $insert=$this->User_model->insertUser($this->input->post());
                         // var_dump($this->db->last_query()); die;
                    }   
                }
                    
                $this->load->view('adminpages/addnewuser', $data);

            }
            else
            {
                redirect(base_url());
            }
        }
}








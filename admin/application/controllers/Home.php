<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $data;

    function __construct() {
        parent::__construct();

        require_once APPPATH . 'third_party/googleApi/Google_Client.php';
        require_once APPPATH . 'third_party/googleApi/contrib/Google_Oauth2Service.php';
        //$this->load->library('facebook');
        require_once APPPATH . 'third_party/facebooksdk/vendor/autoload.php';
        $this->load->model('User_model');
        $this->load->model('Admin_model');
        $this->load->model('Product_model');
        $this->load->model('Blog_model');
        $this->load->library("cart");
        $this->load->model('Categories_model'); 
        $this->load->model('E_categories_model'); 
        $this->load->model('Country_model'); 
        $this->load->model('Ads_model', 'ads');
        $this->data['Categories'] = $this->Categories_model->getCategories();
    }
    private function common()
    {
        
        $this->data['shopByDept']    = $this->User_model->getShopByDept();
        $this->data['categories']    = $this->Categories_model->getCategories();
        $this->data['countries']     = $this->ads->getTopCountry();
        $this->data['department']    = $this->Product_model->getCatforDept();
        
        return $this->data;
    }
    public function index() {

        // $this->data = $this->common();
        // // echo "<pre>";var_dump($this->data['shopByDept']); die;
        // $region = $this->getRigon();
        // // var_dump($region); die;
        // $this->data['title']      = 'Be a Brand ';
        // $this->data['countryName']      = $this->Country_model->CountriesByID($region['country_id']);
        // $this->data['stateName']      = $this->Country_model->StateByStateId($region['state_id']);
        // $this->data['cityName']      = $this->Country_model->CityById($region['city_id']);
       
        // $this->data['description']      = 'Brands Valley is an advertising platform targeting clients either local or international who are looking for all kinds of branding.  ';
       
        // $this->data['keyword']      = 'brands,marketing,advertising,advertisement,ad agency,clients,classifieds,targeted advertising  ';
       
        // $this->data['recent'] = $this->User_model->getRecentAds($region);
        
        // $this->data['slider'] = $this->User_model->getSlider($region);
        // // var_dump($this->data['slider']); die;
        // // $this->data['featured'] = $this->User_model->getAdsForHome(1);
       
        // $this->data['views'] = $this->User_model->getTopViewAdsForHome(1);

        // ///////////
        
        // $reviewsArrayViewed = array();
        // $reviewsArrayFeatured = array();
        // for ($index = 0; $index < count($this->data['featured']); $index++) {
        //     if (isset($this->data['featured'][$index]->id)) {
        //         $this->data['reviews'] = $this->User_model->getcalculateStar($this->data['featured'][$index]->id);
        //         array_push($reviewsArrayFeatured, $this->data['reviews']);
        //     }
        // }
        // for ($index = 0; $index < count($this->data['views']); $index++) {


        //     if (isset($this->data['views'][$index]->id)) {
        //         $this->data['reviews'] = $this->User_model->getcalculateStar($this->data['views'][$index]->id);
        //         array_push($reviewsArrayViewed, $this->data['reviews']);
        //     }
        // }

        // $this->data['reviewsArrayFeatured'] = $reviewsArrayFeatured;
        // $this->data['reviewsArrayViews'] = $reviewsArrayViewed;
        
        // $this->data['products'] = $this->Product_model->getCategoryItemsForHome(10, 0, 16, 1, $region);
        
        // $this->data['webSlug'] = $this->User_model->getWebSlugs($region);
        
        // $this->data['webGif'] = $this->User_model->getWebGifs($region);
        // var_dump($this->data['webGif']); die;
        if($this->session->userdata('loggedin'))
       {
        $data['products'] = $this->Product_model->getProducts();
        // var_dump($data['products']);die;
        $this->load->view('home',$data);
        // $this->load->view('adminpages/viewProduct',$data);
        }else{
           redirect('admin/login');
       } 

    }
    public function viewproduct()
    {
        $this->load->view('single');
    }

    public function allproducts()
    {
        $this->load->view('products');
    }
    


    public function do_upload() {
        $config['upload_path'] = 'assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 50000;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $imageName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $_FILES['Image']['name']); //remove extension
        $config['file_name'] = $imageName . "_" . time();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('Image')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
            return false;
        } else {
            return $this->upload->data();
        }
    }
    public function getProductDetail()
    {
        $id = $this->uri->segment(3);
        
        $data = $this->Product_model->getProductById($id);
        
        echo json_encode($data); 
    }
    public function getProductNameList()
    {
        $cat_id = $this->uri->segment(4);
        $keywords =( $this->uri->segment(3)!=''?$this->uri->segment(3):'-0');
        
        $data = $this->ads->getAdsTitleByCrawler($keywords, $cat_id);
        // var_dump($data); die();
        $option = "";
        if ($data) {
            foreach ($data as $datakey) {
             
           $option .=" <option value='".$datakey['name']."'>";
            }
        }
        else
        {
           $option .=" ";

        }
        
        echo json_encode($option); 
    }
    public function contact() {
        $this->data = $this->common();
        $this->data['title'] = 'Contact Us ';
        $this->data['description']      = 'You can contact us in any way you like, for further information visit our website.';
        $this->data['keyword']      = 'branding,website ads,online ads,brands valley,classifieds,best advertisements,internet marketing,advertising campaigns';
        $this->data['categories'] = $this->Categories_model->getCategories();
        $this->data['countries'] = $this->ads->getTopCountry();

        if ($this->input->post() != NULL) {
            $this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('subject', 'subject', 'trim|required');
            $this->form_validation->set_rules('message', 'message', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger"> Message sending Failed.</div>');
                $this->load->view('contact', $this->data);
            } else {


                /*               $config['protocol']    = $this->config->item('protocol');
                  $config['smtp_host']    = $this->config->item('smtp_host');
                  $config['smtp_port']    = $this->config->item('smtp_port');
                  $config['smtp_timeout'] = $this->config->item('smtp_timeout');
                  $config['smtp_user']    = $this->config->item('smtp_user');
                  $config['smtp_pass']    =$this->config->item('smtp_pass');
                  $config['charset']    = 'utf-8';
                  $config['newline']    = "\r\n";
                  $config['mailtype'] = $this->config->item('mailtype');// text or html
                  $config['validation'] = $this->config->item('validation');

                  $this->load->library('email');
                  $this->email->initialize($config);
                  $this->email->from($this->input->post('email'), 'Brands Valley');
                  $this->email->to($this->config->item('AdminEmail'));
                  $this->email->subject($this->input->post('subject'));
                  $this->email->message($body); */

                $body = "<html>
                         <header>
                         <title></title>
                         </header>
                         <body>
                         <b>Name</b>: " . $this->input->post('name') . "<br>
                         <b>Email</b>: " . $this->input->post('email') . "<br>
                         <b>Message</b>: " . $this->input->post('message') . "<br>
                         <br>
                         <p>This email is comming from BrandsValley.com</p>
                         </body>
                         </html>";

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
                $headers .= 'From: <' . $this->input->post('email') . '>' . "\r\n";

                if (mail($this->config->item('AdminEmail'), $this->input->post('subject'), $body, $headers)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success">
    <strong>Success!</strong> Message sent.</div>');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    //     echo $this->email->print_debugger();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">
    Message sending Failed.</div>');
                }
                $this->load->view('contact', $this->data);
            }
        } else {
            $this->load->view('contact', $this->data);
        }
    }

    public function verifyLink($verifylink) {
        $this->data = $this->common();
        $user = $this->User_model->GeneraluserexistByVirfylink($verifylink);

        if ($user) {
            $this->User_model->updateActivate(1, $user[0]['Email']);
            $this->session->set_flashdata('message', "<div class='alert alert-success'>Your Account has been activiated successfuly.</div>");
            redirect('home/login', $this->data);
            exit;
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger">Invalid link</div>');
            redirect('home/login', $this->data);
        }
    }

    public function SendverifyLink($userID) {
        $this->data = $this->common();
        $this->data['user'] = $this->User_model->GeneraluserexistByID($userID);

        if ($this->data['user']) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < 10; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            $this->data['resetlink'] = sha1($randomString);

            $link = $this->User_model->updateResetLink($this->data['resetlink'], $this->data['user'][0]['Email']);

            $body = $this->load->view('verifyLink_Email_temp', $this->data, true);

             $this->load->library('email');

              $config['protocol']    = $this->config->item('protocol');
              $config['smtp_host']    = $this->config->item('smtp_host');
              $config['smtp_port']    = $this->config->item('smtp_port');
              $config['smtp_timeout'] = $this->config->item('smtp_timeout');
              $config['smtp_user']    = $this->config->item('smtp_user');
              $config['smtp_pass']    =$this->config->item('smtp_pass');
              $config['charset']    = 'utf-8';
              $config['newline']    = "\r\n";
              $config['mailtype'] = $this->config->item('mailtype');// text or html
              $config['validation'] = $this->config->item('validation');


              $this->email->initialize($config);
              $this->email->from($this->config->item('noreplyemail'), $this->config->item('sitename'));
              $this->email->to($this->data['user'][0]['Email']);
              $this->email->subject('Verify Account Link '.$this->config->item('sitename'));

              $this->email->message($body);
             
            // php email function
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From: <' . $this->config->item('noreplyemail') . '>' . "\r\n";


            if (mail($this->data['user'][0]['Email'], 'Verify Account Link ' . $this->config->item('sitename'), $body, $headers)) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'>Please check your email and follow instruction for activate your account.</div>");
                redirect('home/login');
                exit;
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger">Verification email not sent.Please Try again</div>');
                redirect('home/login');
            }
            // echo $this->email->print_debugger();
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger">Verification email not sent. Please Try again</div>');
            redirect('home/login');
        }
    }

    public function facebook_login() {

        /*            if($this->session->userdata('user_loggedin')){

          redirect('/home/dashboard');

         */
        @session_start();
        $fb = new Facebook\Facebook([
            'app_id' => '412317422558097', // Replace {app-id} with your app id
            'app_secret' => '9c4864bc3fa617af7e9bfd02c6eebc1b',
            'default_graph_version' => 'v2.2',
        ]);

        if (isset($_GET['code'])) {

            // Get user facebook profile details


            try {

                $helper = $fb->getRedirectLoginHelper();
                $accessToken = $helper->getAccessToken();


                $object = $fb->get('/me?fields=id,first_name,last_name,email,gender,locale,picture', $accessToken);
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            // Preparing data for database insertion
            $body = (string) $object->getBody();
            $userProfile = json_decode($body);


            $userData['oauth_provider'] = 'facebook';

            $userData['oauth_uid'] = $userProfile->id;

            $userData['first_name'] = $userProfile->first_name;

            $userData['last_name'] = $userProfile->last_name;

            $userData['email'] = $userProfile->email;

            $userData['gender'] = $userProfile->gender;

            $userData['locale'] = $userProfile->locale;

            $userData['profile_url'] = 'https://www.facebook.com/' . $userProfile->id;

            $userData['picture_url'] = $userProfile->picture->data->url;


            $insertdata = array('FirstName' => $userProfile->first_name,
                'LastName' => $userProfile->last_name,
                'Email' => $userProfile->email,
                'Password' => 'Facebook',
                'City' => '',
                'State' => '',
                'ZipCode' => '',
                'Country' => '',
                'Telephone' => '',
                'Fax' => '',
                'gender' => $userProfile->gender,
                'Social_picturelink' => $userProfile->picture->data->url,
                'source' => 'facebook',
                'active' => 1,
                'IsDealer' => 0,
                'IsUser' => 1
            );



            $user = $this->User_model->GetUserByEmail($userProfile->email);


            if ($user == false) {

                $insert = $this->User_model->insertUser($insertdata);

                if ($insert) {

                    $user = $this->User_model->GetUserByEmail($userProfile->email);
                } else {

                    redirect('home/register');
                }
            }



            if ($user and $user[0]['active'] and $user and $user[0]['status']) {

                $this->session->set_userdata('user_loggedin', true);

                $this->session->set_userdata('IsUser', $user[0]['IsUser']);

                $this->session->set_userdata('IsDealer', $user[0]['IsDealer']);

                $this->session->set_userdata('UserID', $user[0]['ID']);

                redirect('home/dashboard');
            } else if ($user and ! $user[0]['active']) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger">Please verify your email address and verify link find in your mail box.or generate link <a href="' . base_url() . 'home/SendverifyLink/' . $user[0]['ID'] . '">Click here</a></div>');

                redirect('home/login');
            } else if ($user and ! $user[0]['status']) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger">Your Account has been blocked by Administrator.</div>');

                redirect('home/login');
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger">

                                Credential Invalid. Try Again.</div>');

                redirect('home/login');
            }



            // Get logout URL
            //  $data['logoutUrl'] = $this->facebook->logout_url();
        } else {
            $helper = $fb->getRedirectLoginHelper();

            $permissions = ['email']; // Optional permissions
            $loginUrl = $helper->getLoginUrl('https://brandsvalley.net/home/facebook_login', $permissions);
            $loginUrl = htmlspecialchars($loginUrl);
            $loginUrl = str_replace("amp;", "", $loginUrl);
            header("Location: $loginUrl");
            exit;
        }
    }

    public function google_login() {
        if ($this->session->userdata('user_loggedin')) {
            redirect('/');
        } else {
            $clientId = '412994844618-fvjajuvp6bfq8fi0dg7b573c8ajqimm9.apps.googleusercontent.com'; //Google client ID
            $clientSecret = 'f05-xVrxSR86MR0PdZcaji_V'; //Google client secret
            $redirectURL = base_url() . 'home/google_login';

            //Call Google API
            $gClient = new Google_Client();
            $gClient->setApplicationName('Login');
            $gClient->setClientId($clientId);
            $gClient->setClientSecret($clientSecret);
            $gClient->setRedirectUri($redirectURL);
            $google_oauthV2 = new Google_Oauth2Service($gClient);

            if (isset($_GET['code'])) {
                $gClient->authenticate($_GET['code']);
                $_SESSION['token'] = $gClient->getAccessToken();
                header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));


                if (isset($_SESSION['token'])) {
                    $gClient->setAccessToken($_SESSION['token']);
                }

                if ($gClient->getAccessToken()) {
                    $userProfile = $google_oauthV2->userinfo->get();

                    $insertdata = array('FirstName' => $userProfile['given_name'],
                        'LastName' => $userProfile['family_name'],
                        'Email' => $userProfile['email'],
                        'Password' => 'Gmail',
                        'City' => '',
                        'State' => '',
                        'ZipCode' => '',
                        'Country' => '',
                        'Telephone' => '',
                        'Fax' => '',
                        'gender' => $userProfile['gender'],
                        'Social_picturelink' => $userProfile['picture'],
                        'source' => 'gmail',
                        'active' => 1,
                        'IsDealer' => 0,
                        'IsUser' => 1
                    );

                    $user = $this->User_model->GetUserByEmail($userProfile['email']);
                    if ($user == false) {
                        $insert = $this->User_model->insertUser($insertdata);
                        if ($insert) {
                            $user = $this->User_model->GetUserByEmail($userProfile['email']);
                        } else {
                            redirect('home/register');
                        }
                    }

                    if ($user and $user[0]['active'] and $user and $user[0]['status']) {
                        $this->session->set_userdata('user_loggedin', true);
                        $this->session->set_userdata('IsUser', $user[0]['IsUser']);
                        $this->session->set_userdata('IsDealer', $user[0]['IsDealer']);
                        $this->session->set_userdata('UserID', $user[0]['ID']);
                        redirect('home/dashboard');
                    } else if ($user and ! $user[0]['active']) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger">Please verify your email address and verify link find in your mail box.or generate link <a href="' . base_url() . 'home/SendverifyLink/' . $user[0]['ID'] . '">Click here</a></div>');
                        redirect('home/login');
                    } else if ($user and ! $user[0]['status']) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger">Your Account has been blocked by Administrator.</div>');
                        redirect('home/login');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger">
                                Credential Invalid. Try Again.</div>');
                        redirect('home/login');
                    }
                }
            } else {
                $url = $gClient->createAuthUrl();
                header("Location: $url");
                exit;
            }
        }
    }

    public function login() {
        $this->data = $this->common();
        if ($this->session->userdata('user_loggedin')) 
        {
            redirect('/');
        } 
        else 
        {
            if ($this->input->post() != NULL) 
            {
                $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
                $this->form_validation->set_rules('password', 'password', 'trim|required');

                if ($this->form_validation->run() == FALSE) 
                {

                    $this->load->view('login', $this->data);
                }  
                else 
                {
                    $user = $this->User_model->isUserexist($this->input->post('email'), sha1($this->input->post('password')));
                    // var_dump($user); die;
                    if($user)
                    {
                        if ($user['status']=='1' && $user['isEmailVarify']=='1') 
                        {
                            $this->session->set_userdata('user_loggedin', true);
                            $this->session->set_userdata('IsUser', $user['IsUser']);
                            $this->session->set_userdata('IsDealer', $user['IsDealer']);
                            $this->session->set_userdata('UserID', $user['ID']);
                            $this->session->set_userdata('User', $user);

                            redirect('home/dashboard');
                        } 
                        else if ($user && $user['isEmailVarify'] == '0') 
                        {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger">Please verify your email address and verify link find in your mail box.or generate link <a href="' . base_url() . 'home/SendSignupVerifyLink/' . $user['ID'] . '">Click here</a></div>');
                        redirect('home/login');
                        } 
                        else if ($user && $user['status']=='0') 
                        {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger">Your Account has been blocked by Administrator.</div>');
                            redirect('home/login');
                        } 
                    }
                    else 
                    {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger">
    Credential Invalid. Try Again.</div>');
                        redirect('home/login');
                
                    }//end form validation run
            } 
        }
            else 
            {
                $this->data['title'] = 'Login';

                $this->load->view('login', $this->data);
            }
    }
}

    public function register() {
        $this->data = $this->common();
        $this->data['title'] = 'Register';
        $this->data['settings'] = $this->Admin_model->getSiteSettings();
        $isDealer = 0;
                    $isUser = 1;
        // echo "<pre>";var_dump($this->data); die;
        if ($this->session->userdata('user_loggedin')) {
            redirect('/');
        } else {
            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('FirstName', 'First Name', 'trim|required');
                $this->form_validation->set_rules('lastName', 'Last Name', 'trim|required');
                $this->form_validation->set_rules('Password', 'Password', 'trim|required');
                $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|required|matches[Password]');
                $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('DOBMonth', 'DOB Month', 'trim|required');
                $this->form_validation->set_rules('DOBDay', 'DOB Day', 'trim|required');
                $this->form_validation->set_rules('DOBYear', 'DOB Year', 'trim|required');
                $this->form_validation->set_rules('city', 'City', 'trim|required');
                $this->form_validation->set_rules('state', 'State', 'trim|required');
                $this->form_validation->set_rules('ZipCode', 'Zip Code', 'trim|required');
                $this->form_validation->set_rules('signupCountry', 'Country', 'trim|required');
                $this->form_validation->set_rules('Telephone', 'Telephone', 'trim|required');
                $this->form_validation->set_rules('Telephone', 'Telephone', 'trim|required');
                $this->form_validation->set_rules('Telephone', 'Telephone', 'trim|required');
                $this->form_validation->set_rules('Telephone', 'Telephone', 'trim|required');
                $this->form_validation->set_rules('accountType', 'account Type', 'trim|required');
                if ($this->input->post('paymentMethod')=='jazzCash') {
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
                $this->form_validation->set_rules('txnId', 'Transaction Id', 'trim|required');
                $this->form_validation->set_rules('depositDate', 'Deposit Date', 'trim|required');
                }
                if ($this->input->post('paymentMethod')=='easyPesa') {
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
                $this->form_validation->set_rules('txnId', 'Transaction Id', 'trim|required');
                $this->form_validation->set_rules('depositDate', 'Deposit Date', 'trim|required');
                }
                if ($this->input->post('paymentMethod')=='uPesa') {
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
                $this->form_validation->set_rules('txnId', 'Transaction Id', 'trim|required');
                $this->form_validation->set_rules('depositDate', 'Deposit Date', 'trim|required');
                }
                if ($this->input->post('paymentMethod')=='ublOmni') {
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
                $this->form_validation->set_rules('txnId', 'Transaction Id', 'trim|required');
                $this->form_validation->set_rules('depositDate', 'Deposit Date', 'trim|required');
                }
                
                if ($this->input->post('paymentMethod')=='Stripe') {
                   /* require_once(base_url()'assets/stripe-php-6.10.4/init.php');
                    $stripe = array(
                          "secret_key"      => "sk_test_BQokikJOvBiI2HlWgH4olfQ2",
                          "publishable_key" => "pk_test_g6do5S237ekq10r65BnxO6S0"
                        );

                        \Stripe\Stripe::setApiKey($stripe['secret_key']);*/
                

                $this->form_validation->set_rules('amount', 'Telephone', 'trim|required');
                $this->form_validation->set_rules('txnId', 'Telephone', 'trim|required');
                $this->form_validation->set_rules('depositDate', 'Telephone', 'trim|required');
                }
                /*                        $this->form_validation->set_rules('RegisterType', 'Register as', 'trim|required'); */

                if ($this->form_validation->run() == FALSE) {
                    $error = validation_errors();

                    $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $error . '</div>');
                    $this->load->view('register', $this->data);
                } else {
                    if (!empty($_FILES['Image']['name'])) {
                        if ($image = $this->do_upload()) {
                            $img = $image['file_name'];
                        } else {
                            $this->load->view('register', $this->data);
                            exit;
                        }
                    } else {
                        $img = false;
                    }
                    $isDealer = 0;
                    $isUser = 1;

                    $insertdata = array(
                        'FirstName' => $this->input->post('FirstName'),
                        'LastName' => $this->input->post('lastName'),
                        'Email' => $this->input->post('Email'),
                        'Password' => sha1($this->input->post('Password')),
                        'CompanyName' => $this->input->post('CompanyName'),
                        'Address' => $this->input->post('address'),
                        'Address2' => $this->input->post('Address2'),
                        'City' => $this->input->post('city'),
                        'State' => $this->input->post('state'),
                        'ZipCode' => $this->input->post('ZipCode'),
                        'Country' => $this->input->post('signupCountry'),
                        'Telephone' => $this->input->post('Telephone'),
                        'Fax' => ($this->input->post('Fax')?$this->input->post('Fax'):''),
                        'active' => 0,
                        'IsDealer' => $isDealer,
                        'IsUser' => $isUser,
                        'DOBMonth' => $this->input->post('DOBMonth'),
                        'DOBDay' => $this->input->post('DOBDay'),
                        'DOBYear' => $this->input->post('DOBYear'),
                        'paymentType' => $this->input->post('paymentMethod'),
                        'amount' => ($this->input->post('amount')?$this->input->post('amount'):0),
                        'txnId' => ($this->input->post('txnId')?$this->input->post('txnId'):0),
                        'depositDate' => ($this->input->post('depositDate')?$this->input->post('depositDate'):0),
                        'paymentStatus' => '0',
                        'accountType' => $this->input->post('accountType'),
                        'cnic' => $this->input->post('cnic'),
                        'invoice' => $this->input->post('invoice')
                    );
                    if ($img) {
                        $insertdata['Image'] = $img;
                    }
                    
                    if ($this->input->post('paymentMethod')=='Paypal') {
                        $cartpost = array(
                              'cartpost' => $this->input->post()
                         );
                        $this->session->set_userdata($cartpost);
                        $this->paypalPaymentAtRegisterTime();
                    }
                    
                    if($this->input->post('userIdSignup')!='')
                    {
                        $insert = $this->User_model->updateUser($insertdata, $this->input->post('userIdSignup'));
                        if($insert){
                            $this->signupPaymentInsert($this->input->post('userIdSignup'));
                            $this->session->set_flashdata('message', '<div class="alert alert-success">Account Created.</div>');
                        $this->SendSignupVerifyLink($insert);
                        redirect('home/register');
                        }
                        else
                        {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger">Account Created Fail please try again .</div>');
                        // $this->SendverifyLink($insert);
                        redirect('home/register');
                        }
                    }else
                    {

                    $insert = $this->User_model->insertUser($insertdata);
                // var_dump($insert); die;
                    }
                    if ($insert) {
                        $this->signupPaymentInsert($insert);
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Account Created.</div>');
                        $this->SendSignupVerifyLink($insert);
                        redirect('home/register');
                    }
                }////end form validation run
            } else {///if not submit form
                $this->load->view('register', $this->data);
            }
        }
    }
    public function paypalPaymentAtRegisterTime($value='')
    {
        // Check if paypal request or response
        if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"]))
        {
            $paypal_email = $this->paypaladminemail();
        
            $return_url = base_url().'home/paypalPaymentAtRegisterTime';
            $cancel_url = base_url().'home/';
            $notify_url = base_url().'home/paypal-Payment';

            $item_name = $this->session->userdata['cartpost']['Item'];
            $cus_name = $this->session->userdata['cartpost']['accountType'];
            $this->data['settings_data'] = $this->Admin_model->getSiteSettings();
            if( $cus_name=='c')
            {
             
            $item_amount = $this->data['settings_data']['customerSubscription'];
            }
           else if( $cus_name=='te')
            {
             
            $item_amount = $this->data['settings_data']['employeeSubscrition'];
            }
            else if( $cus_name=='e')
            {
             
            $item_amount = $this->data['settings_data']['throughEmployeeSubscription'];
            }

            
            $querystring = '';
            
            // Firstly Append paypal account to querystring
            $querystring .= "?business=".urlencode($paypal_email)."&";
            
            // Append amount& currency (£) to quersytring so it cannot be edited in html
            
            //The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
            $querystring .= "item_name=".urlencode($item_name)."&";
            $querystring .= "amount=".urlencode($item_amount)."&";
            
            //loop for posted values and append to querystring
            foreach($this->session->userdata['cartpost'] as $key => $value)
            {
                $value = urlencode(stripslashes($value));
                $querystring .= "$key=$value&";
            }
            
            // Append paypal return addresses
            $querystring .= "return=".urlencode(stripslashes($return_url))."&";
            $querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
            $querystring .= "notify_url=".urlencode($notify_url);
            
            // var_dump($querystring); die;
            // Append querystring with custom field
            //$querystring .= "&custom=".USERID;
            
            // Redirect to paypal IPN
            // print_r('https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);die;
            $pUrl = 'https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring;
    // var_dump($pUrl); die;
             //var_dump($pUrl); die; //https://www.sandbox.paypal.com/cgi-bin/webscr
            header('location:'.$pUrl);
            exit();
        } 
        else 
        {
            $isDealer = 0;
                    $isUser = 1;
            // var_dump($this->session->userdata['cartpost']); die;
            $insertdata = array(
                'FirstName' => $this->session->userdata['cartpost']['FirstName'],
                'LastName' => $this->session->userdata['cartpost']['lastName'],
                'Email' => $this->session->userdata['cartpost']['Email'],
                'Password' => sha1($this->session->userdata['cartpost']['Password']),
                'CompanyName' => $this->session->userdata['cartpost']['CompanyName'],
                'Address' => $this->session->userdata['cartpost']['address'],
                'Address2' => $this->session->userdata['cartpost']['Address2'],
                'City' => $this->session->userdata['cartpost']['city'],
                'State' => $this->session->userdata['cartpost']['state'],
                'ZipCode' => $this->session->userdata['cartpost']['ZipCode'],
                'Country' => $this->session->userdata['cartpost']['signupCountry'],
                'Telephone' => $this->session->userdata['cartpost']['Telephone'],
                'Fax' => ($this->session->userdata['cartpost']['Fax']?$this->session->userdata['cartpost']['Fax']:''),
                'active' => 0,
                'IsDealer' => $isDealer,
                'IsUser' => $isUser,
                'DOBMonth' => $this->session->userdata['cartpost']['DOBMonth'],
                'DOBDay' => $this->session->userdata['cartpost']['DOBDay'],
                'DOBYear' => $this->session->userdata['cartpost']['DOBYear'],
                'paymentType' => $this->session->userdata['cartpost']['paymentMethod'],
                'amount' => $this->session->userdata['cartpost']['paymentAmn'],
                'txnId' => $this->input->post('txn_id'),
                'depositDate' => date('Y-m-d'),
                'paymentStatus' => '1',
                'Image' => ($this->session->userdata['cartpost']['Image']?$this->session->userdata['cartpost']['Image']:''),
                'accountType' => $this->session->userdata['cartpost']['accountType'],
                'cnic' => $this->session->userdata['cartpost']['cnic'],
                'invoice' => $this->session->userdata['cartpost']['invoice']
            );
            
            if($this->session->userdata['cartpost']['userIdSignup']!='')
            {
                $insert = $this->User_model->updateUser($insertdata, $this->session->userdata['cartpost']['userIdSignup']);
                if($insert){
                    $this->signupPaymentInsert($this->session->userdata['cartpost']['userIdSignup']);
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Account Created.</div>');
                $this->SendSignupVerifyLink($insert);
                redirect('home/register');
                }
                else
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Account Created Fail please try again .</div>');
                // $this->SendverifyLink($insert);
                redirect('home/register');
                }
            }else
            {

            $insert = $this->User_model->insertUser($insertdata);
            }
            if ($insert) {
                $this->signupPaymentInsert($insert);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Account Created.</div>');
                $this->SendSignupVerifyLink($insert);
                redirect('home/register');
            }
        } 
    }
    public function signupPaymentInsert($id=70)
    {

        $data = $this->User_model->GeneraluserexistByID($id);
        if($data[0]['txnId'])
        {
            $insertPayment = array(
                'user_id'         =>   $data[0]['ID'],
                'pay_method'      =>   $data[0]['paymentType'],
                'cnic'            =>   $data[0]['cnic'],
                'invoice'         =>   $data[0]['invoice'],
                'pay_date'        =>   $data[0]['depositDate'],
                'paymentStatus'   =>   $data[0]['paymentStatus'],
                'txnId'           =>   $data[0]['txnId'],
                'subscriptionFee' =>   $data[0]['amount']
            );
            $this->db->insert('payment_details', $insertPayment);
        }
    }
    public function SendSignupVerifyLink($id)
    {
        $this->data = $this->common();
        $this->data['user'] = $this->User_model->GeneraluserexistByID($id);
        if ($this->data['user']) {
            $link = base_url().'home/verifySignupEmail/?urlid='.base64_encode($this->data['user'][0]['ID']).'&urlSts='.base64_encode($this->data['user'][0]['isEmailVarify']);
            $body = 'Please Click the below link to Activate Your Account<br>'.$link;
            $this->load->library('email');

              $config['protocol']    = $this->config->item('protocol');
              $config['smtp_host']    = $this->config->item('smtp_host');
              $config['smtp_port']    = $this->config->item('smtp_port');
              $config['smtp_timeout'] = $this->config->item('smtp_timeout');
              $config['smtp_user']    = $this->config->item('smtp_user');
              $config['smtp_pass']    =$this->config->item('smtp_pass');
              $config['charset']    = 'utf-8';
              $config['newline']    = "\r\n";
              $config['mailtype'] = $this->config->item('mailtype');// text or html
              $config['validation'] = $this->config->item('validation');

              $this->email->initialize($config);
              $this->email->from($this->config->item('noreplyemail'), $this->config->item('sitename'));
              $this->email->to($this->data['user'][0]['Email']);
              // $this->email->to('mudasarali88@gmail.com');
              $this->email->subject('Verify Account Link '.$this->config->item('sitename'));

              $this->email->message($body);
                if($this->email->send())
                {
                    $this->session->set_flashdata('message', "<div class='alert alert-success'>Please check your email and follow instruction for activate your account.</div>");
                redirect('home/login');
                exit;
                }
                else{
                    // $this->email->print_debugger(); die;
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Verification email not sent.Please Try again</div>');
                redirect('home/login');
                }
        }
    }
    public function verifySignupEmail()
    {
        $id = base64_decode($this->input->get('urlid'));
        $status = base64_decode($this->input->get('urlSts'));
        
        if($status==0)
        {
            $update['isEmailVarify'] = '1';
            $this->db->where('ID', $id);
            if($this->db->update('users', $update))
            {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Email Verified, Please login here</div>');
                redirect('home/login');
            }
            else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Email verification fail, Please try again</div>');
                redirect('home/login');
            }
        }
        else
        {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Email Already Verified, Please login here</div>');
                redirect('home/login');
        }
        
    }
    public function logout() {
        if (!$this->session->userdata('user_loggedin')) {
            redirect('/');
        } else {
            $this->session->unset_userdata('user_loggedin');
            $this->session->unset_userdata('loggedin');
            $this->session->unset_userdata('ID');
            $this->session->unset_userdata('IsUser');
            $this->session->unset_userdata('IsDealer');
            redirect('home/login');
        }
    }

    public function dashboard() {

       
        $this->data = $this->common();

        if (!$this->session->userdata('user_loggedin')) {
            redirect('/');
        } else {

            $this->data['userinfo'] = $this->User_model->userexistByID($this->session->userdata('UserID'));
            $this->data['states'] = $this->Country_model->StateById($this->data['userinfo'][0]['Country']);
            $this->data['cities'] = $this->Country_model->getCityByStateId($this->data['userinfo'][0]['State']);
            // var_dump($this->data['states']); die;
            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('FirstName', 'First Name', 'trim|required');
                $this->form_validation->set_rules('LastName', 'Last Name', 'trim|required');
                if ($this->input->post('Email') != $this->input->post('oldEmail')) {
                    $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|is_unique[users.Email]');
                    $updatetdata['isEmailVarify'] = '0';
                } else {
                    $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
                }

                $this->form_validation->set_rules('Address', 'Address', 'trim|required');
                $this->form_validation->set_rules('City', 'City', 'trim|required');
                $this->form_validation->set_rules('State', 'State', 'trim|required');
                $this->form_validation->set_rules('ZipCode', 'Zip Code', 'trim|required');
                $this->form_validation->set_rules('Country', 'Country', 'trim|required');
                $this->form_validation->set_rules('Telephone', 'Telephone', 'trim|required');
                /*                        $this->form_validation->set_rules('RegisterType', 'Register as', 'trim|required'); */

                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Please enter  all required field data.</div>');
                    $this->load->view('myaccount', $this->data);
                } else {
                    if (!empty($_FILES['Image']['name'])) {
                        if ($image = $this->do_upload()) {
                            $img = $image['file_name'];
                        } else {
                            $this->load->view('myaccount', $this->data);
                            exit;
                        }
                    } else {
                        $img = false;
                    }
                    $isDealer = 0;
                    $isUser = 1;

                    /* if($this->input->post('RegisterType')){
                      $isDealer=1;
                      }else{
                      $isUser=1;
                      } */

                    $this->session->set_userdata('IsDealer', $isDealer);
                    $this->session->set_userdata('IsUser', $isUser);

                    $updatetdata = array('FirstName' => $this->input->post('FirstName'),
                        'LastName' => $this->input->post('LastName'),
                        'Email' => $this->input->post('Email'),
                        'CompanyName' => $this->input->post('CompanyName'),
                        'Address' => $this->input->post('Address'),
                        // 'Address2' => $this->input->post('Address2'),
                        'City' => $this->input->post('City'),
                        'State' => $this->input->post('State'),
                        'ZipCode' => $this->input->post('ZipCode'),
                        'Country' => $this->input->post('Country'),
                        'Telephone' => $this->input->post('Telephone'),
                        'Fax' => $this->input->post('Fax'),
                        'IsDealer' => $isDealer,
                        'IsUser' => $isUser,
                    );
                    if ($img) {
                        $updatetdata['Image'] = $img;
                    }
                    $update = $this->User_model->updateUser($updatetdata, $this->session->userdata('UserID'));
                    // var_dump($update); die;
                    if ($update) {
                        if ($this->input->post('Email') == $this->input->post('oldEmail')) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Account updated.</div>');
                        redirect('home/dashboard');
                            }
                            else
                            {
                               $this->SendSignupVerifyLink($this->session->userdata('UserID'));
                            // $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|is_unique[users.Email]');
                            }
                        // var_dump('expression'); die;
                        // $this->data['userinfo'] = $this->User_model->userexistByID($this->session->userdata('UserID'));
                    }
                }////end form validation run
            }
            // var_dump($this->data); die;
            $this->load->view('myaccount', $this->data);
        }
    }

    public function setting() {
        $this->data = $this->common();
            $this->data['userinfo'] = $this->User_model->userexistByID($this->session->userdata('UserID'));

        if ($this->session->userdata('user_loggedin')) {
            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('currentPassword', 'Current Password', 'trim|required');
                $this->form_validation->set_rules('Password', 'Password', 'trim|required');
                $this->form_validation->set_rules('ConfirmPassword', 'Password Confirmation', 'trim|required|matches[Password]');
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Try Again</div>');
                    $this->load->view('settings');
                } else {
                    ///if current password not correct
                    if ($this->User_model->isCurrentPassword(sha1($this->input->post('currentPassword')), $this->session->userdata('UserID'))) {

                        $this->data = array('Password' => sha1($this->input->post('Password')));
                        $update = $this->User_model->updateUser($this->data, $this->session->userdata('UserID'));
                        if ($update) {
                            $this->session->set_flashdata('message', '<div class="alert alert-success">Password Changed</div>');
                            redirect('home/setting');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger">Your Current Password is incorrect</div>');
                        $this->load->view('settings', $this->data);
                    }
                }////end form validation run
            } else {///if not submit form
                $this->load->view('settings', $this->data);
            }
        } else {//IF NOT login
            redirect('home/login');
        }
    }
    public function userProfile()
    {
        if ($this->session->userdata('user_loggedin') && $this->session->userdata('IsUser'))
        {
            $data = $this->common();
            $data['userinfo'] = $this->User_model->userexistByID($this->session->userdata('UserID'));
            $data['userCountry'] = $this->Country_model->CountriesByID($data['userinfo'][0]['Country']);
            $data['userState'] = $this->Country_model->StateByStateId($data['userinfo'][0]['State']);
            $data['userCity'] = $this->Country_model->CitiesByID($data['userinfo'][0]['City']);
            $this->load->view('userProfile', $data);
        }
        else
        {
            redirect('home/login');
        }
    }
    public function paymentHistory()
    {
        if ($this->session->userdata('user_loggedin') && $this->session->userdata('IsUser'))
        {
            $data = $this->common();
            $data['userinfo'] = $this->User_model->userexistByID($this->session->userdata('UserID'));
            $data['userCountry'] = $this->Country_model->CountriesByID($data['userinfo'][0]['Country']);
            $data['userState'] = $this->Country_model->StateByStateId($data['userinfo'][0]['State']);
            $data['userCity'] = $this->Country_model->CitiesByID($data['userinfo'][0]['City']);
            $data['paymentHistory'] = $this->User_model->getPaymentHistory($this->session->userdata('UserID'));
            // var_dump($data['paymentHistory']); die;
            $this->load->view('paymentHistory', $data);
        }
        else
        {
            redirect('home/login');
        }
    }
    public function adsHistory()
    {
        if ($this->session->userdata('user_loggedin') && $this->session->userdata('IsUser'))
        {
            $data = $this->common();
            // var_dump('Under Construction'); die;
            $data['userinfo'] = $this->User_model->userexistByID($this->session->userdata('UserID'));
            $data['userAds'] = $this->User_model->getAllAdsWithUserId($this->session->userdata('UserID'));
            
            $this->load->view('adsHistory', $data);
        }
        else
        {
            redirect('home/login');
        }
    }
    public function AddProduct() {
        $this->data = $this->common();
        if ($this->session->userdata('user_loggedin') && $this->session->userdata('IsDealer')) {

            $this->data['categories'] = $this->Categories_model->getCategories();

            if ($this->input->post() != NULL) {
                $this->form_validation->set_rules('product_title', 'Title', 'trim|required');
                $this->form_validation->set_rules('product_desc', 'Description', 'trim|required');
                $this->form_validation->set_rules('cat_ID', 'Category', 'trim|required|numeric');
                $this->form_validation->set_rules('subcat_ID', 'Sub Category', 'trim|required|numeric');
                $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
                if (empty($_FILES['Image']['name'])) {
                    $this->form_validation->set_rules('Image', 'Image', 'required');
                }

                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">All field required. Please try again.</div>');

                    //$this->load->view('AddProduct', $this->data);
                    redirect('home/AddProduct');
                } else {
                    if (!empty($_FILES['Image']['name'])) {
                        if ($image = $this->do_upload()) {
                            $img = $image['file_name'];
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger">Failed.Pelase try again.</div>');
                            redirect('home/AddProduct');
                            //   $this->load->view('AddProduct', $this->data);
                            exit;
                        }
                    } else {
                        $img = '';
                    }

                    $insertdata = array('product_title' => $this->input->post('product_title'),
                        'cat_ID' => $this->input->post('cat_ID'),
                        'subcat_ID' => $this->input->post('subcat_ID'),
                        'price' => $this->input->post('price'),
                        'product_desc' => $this->input->post('product_desc'),
                        'dealer_ID' => $this->session->userdata('UserID'),
                        'status' => 0,
                        'Image' => $img,
                    );
                    $insert = $this->Product_model->insertProduct($insertdata);
                    if ($insert) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Product added successfully.we will aproved after contact with you with in 24 hour.</div>');
                        redirect('home/AddProduct');
                    }
                }////end form validation run
            } else {///if not submit form
                $this->load->view('AddProduct', $this->data);
            }
        } else {
            redirect('home/login');
        }
    }

    public function EditProduct() {
        if ($this->session->userdata('user_loggedin') && $this->session->userdata('IsDealer')) {
            $this->data['product'] = $this->Product_model->productexistByDealerID($this->uri->segment(3), $this->session->userdata('UserID'));
            if ($this->data['product']) {
                $this->data['categories'] = $this->Categories_model->getCategories();
                $this->data['subcategories'] = $this->Categories_model->getsubByCategoriesID($this->data['product'][0]['cat_ID']);

                if ($this->input->post() != NULL) {
                    $this->form_validation->set_rules('product_title', 'Title', 'trim|required');
                    $this->form_validation->set_rules('product_desc', 'Description', 'trim|required');
                    $this->form_validation->set_rules('cat_ID', 'Category', 'trim|required|numeric');
                    $this->form_validation->set_rules('subcat_ID', 'Sub Category', 'trim|required|numeric');
                    $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');

                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger">Updation failed Please fill the required fields.</div>');
                        $this->load->view('editProduct', $this->data);
                    } else {
                        if (!empty($_FILES['Image']['name'])) {
                            if ($image = $this->do_upload()) {
                                $img = $image['file_name'];
                            } else {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger">Updation failed Please try again.</div>');

                                $this->load->view('editProduct', $this->data);
                                exit;
                            }
                        } else {
                            $img = '';
                        }
                        $updatedata = array('product_title' => $this->input->post('product_title'),
                            'cat_ID' => $this->input->post('cat_ID'),
                            'price' => $this->input->post('price'),
                            'subcat_ID' => $this->input->post('subcat_ID'),
                            'product_desc' => $this->input->post('product_desc')
                        );

                        if (!empty($img)) {
                            $updatedata['Image'] = $img;
                        }
                        $update = $this->Product_model->updateProduct($updatedata, $this->uri->segment(3));
                        if ($update) {
                            $this->session->set_flashdata('message', '<div class="alert alert-success">Product updated.</div>');

                            redirect('home/EditProduct/' . $this->uri->segment(3));
                        }
                    }////end form validation run
                } else {///if not submit form
                    $this->load->view('editProduct', $this->data);
                }
            } else {
                redirect('home/MyProducts');
            }
        } else {
            redirect('home/login');
        }
    }

    public function DeleteProduct($ID) {
        if ($this->session->userdata('user_loggedin') && $this->session->userdata('IsDealer')) {
            $this->data['product'] = $this->Product_model->productexistByDealerID($this->uri->segment(3), $this->session->userdata('UserID'));
            if ($this->Product_model->productDeleteByDealerID($this->uri->segment(3), $this->session->userdata('UserID')) && $this->data['product']) {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Product deleted.</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Product delete not deleted please try again.</div>');
            }
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            redirect('home/login');
        }
    }

    public function MyProducts() {
        if ($this->session->userdata('user_loggedin') && $this->session->userdata('IsDealer')) {

            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'home/MyProducts/';
            $config['total_rows'] = $this->data['total_rows'] = $this->Product_model->getProductsCountByDealerID($this->session->userdata('UserID'));
            $config['uri_segment'] = 3;
            $config['num_links'] = 2;
            $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $limit = $config['per_page'] = $perpage = 10;
            $config['full_tag_open'] = '<ul class="pags">';
            $config['full_tag_close'] = '</ul>';
            $config['last_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active noarrow"><a>';
            $config['cur_tag_close'] = '</a></li>';

            $config['next_link'] = '<li></li>';
            $config['prev_link'] = '<li></li>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $this->pagination->initialize($config);

            $this->data['start'] = $start + 1;

            $this->data['totalpage'] = ceil($this->data['total_rows'] / $perpage);

            $this->data['products'] = $this->Product_model->getProductsByDealerID($limit, $start, $this->session->userdata('UserID'));

            $this->data['to'] = count($this->data['products']) + $start;

            $this->load->view('MyProducts', $this->data);
        } else {
            redirect('home/login');
        }
    }

    public function productbyCategory($ID) {
        $this->data = $this->common();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'home/productbyCategory/' . $ID;
        $total_rows = 0;
        if ($getprouct = $this->Product_model->getProductByCat(0, 9999999, $ID)) {
            $total_rows = count($getprouct);
        }
        $config['total_rows'] = $this->data['total_rows'] = $total_rows;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $limit = $config['per_page'] = $perpage = 10;
        $config['full_tag_open'] = '<ul class="pags">';
        $config['full_tag_close'] = '</ul>';
        $config['last_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active noarrow"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $config['next_link'] = '<li></li>';
        $config['prev_link'] = '<li></li>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $this->pagination->initialize($config);

        $this->data['start'] = $start + 1;
        $this->data['totalpage'] = ceil($this->data['total_rows'] / $perpage);
        $this->data['products'] = $this->Product_model->getProductByCat($limit, $start, $ID);
        $this->data['to'] = count($this->data['products']) + $start;
        $this->load->view('productbyCategory', $this->data);
    }

    public function productbySubCategory($ID) {
        $this->data = $this->common();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'home/productbySubCategory/' . $ID;
        $total_rows = 0;
        if ($getprouct = $this->Product_model->getProductBysubCat(0, 9999999, $ID)) {
            $total_rows = count($getprouct);
        }
        $config['total_rows'] = $this->data['total_rows'] = $total_rows;
        $config['uri_segment'] = 4;
        $config['num_links'] = 2;
        $start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $limit = $config['per_page'] = $perpage = 10;
        $config['full_tag_open'] = '<ul class="pags">';
        $config['full_tag_close'] = '</ul>';
        $config['last_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active noarrow"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $config['next_link'] = '<li></li>';
        $config['prev_link'] = '<li></li>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $this->pagination->initialize($config);

        $this->data['start'] = $start + 1;
        $this->data['totalpage'] = ceil($this->data['total_rows'] / $perpage);
        $this->data['products'] = $this->Product_model->getProductBysubCat($limit, $start, $ID);
        $this->data['to'] = count($this->data['products']) + $start;
        $this->load->view('productbysubCategory', $this->data);
    }

    public function alldealer() {
        
    }

    public function aboutus() {
        $this->data = $this->common();
        $this->data['title'] = 'About Us';
         $this->data['description']      = 'Brands valley focus on clients and more focuses on their valued customers to provide the best quality service.';
        $this->data['keyword']      = 'ad agency,clients,classifieds,targeted advertising,marketing and promotion,branding,website ads,online ads';
        $this->data['categories'] = $this->Categories_model->getCategories();
        $this->data['countries'] = $this->ads->getTopCountry();

        $this->load->view('aboutus', $this->data);
    }

    public function TermsofService() {
        $this->data = $this->common();
        $this->data['title'] = 'Terms of Service';

        $this->data['categories'] = $this->Categories_model->getCategories();
        $this->data['countries'] = $this->ads->getTopCountry();

        $this->load->view('TermsofService', $this->data);
    }

    public function Services() {
        $this->data = $this->common();
        $this->data['title'] = 'Advertising and Promoting Services ';
        $this->data['description']      = 'Brands Valley offers a vast area of categories to accompany all kinds of client’s need.';
        $this->data['keyword']      = 'online advertising,advertisement,brands valley,classifieds,targeted advertising,advertising jobs,brandsoftheworld,business promotion';
        $this->data['categories'] = $this->Categories_model->getCategories();
        $this->data['countries'] = $this->ads->getTopCountry();

        $this->load->view('Services', $this->data);
    }

    public function PrivacyPolicy() {
        $this->data = $this->common();
        $this->data['title'] = 'Privacy Policy';
        $this->data['description']      = 'Our company’s privacy policy is the best one you will see in town.';
        $this->data['keyword']      = 'online ads,advertising agents,best ads,website ads,best advertisements,internet marketing,brands valley,branding and promotion';
        $this->data['categories'] = $this->Categories_model->getCategories();
        $this->data['countries'] = $this->ads->getTopCountry();

        $this->load->view('PrivacyPolicy', $this->data);
    }

    public function blog() {
        $this->data = $this->common();
        $this->data['title'] = 'Blog ';
        $this->data['description']      = 'The ultimate Blog to learn new skills of advertising and marketing while promoting your brand.';
        $this->data['keyword']      = 'brands valley,online advertising,advertising agency,cheap advertising,brands,promotion,internet marketing,cheap ads';
        $this->data['categories'] = $this->Categories_model->getCategories();
        $this->data['countries'] = $this->ads->getTopCountry();

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'home/blog/';
        $config['total_rows'] = $this->data['total_rows'] = $this->Blog_model->getNumActivePost();
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $limit = $config['per_page'] = $perpage = 10;
        $config['full_tag_open'] = '<ul class="pags">';
        $config['full_tag_close'] = '</ul>';
        $config['last_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active noarrow"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $config['next_link'] = '<li></li>';
        $config['prev_link'] = '<li></li>';
        $config['first_link'] = false;
        $config['last_link'] = false;

        $this->pagination->initialize($config);

        $this->data['start'] = $start + 1;

        $this->data['totalpage'] = ceil($this->data['total_rows'] / $perpage);

        $this->data['posts'] = $this->Blog_model->getActivePosts($limit, $start);

        $this->data['to'] = count($this->data['posts']) + $start;

        $this->load->view('blog', $this->data);
    }

    public function post($ID) {
        $this->data['categories'] = $this->Categories_model->getCategories();
        $this->data['countries'] = $this->ads->getTopCountry();
        $this->data['post'] = $this->Blog_model->getActivePostbyID($ID);
        if ($this->data['post']) {

            $this->load->view('blogpost', $this->data);
        } else {
            redirect('home/blog');
        }
    }

    public function setRegion() {
        $this->load->helper('cookie');
        $countryName = $this->input->post('country');
        $stateName = $this->input->post('states');
        $cityName = $this->input->post('city');
        $cookie1 = array(
            'name' => 'countryName',
            'value' => $countryName,
            'expire' => '3600',
        );
        $cookie2 = array(
            'name' => 'stateName',
            'value' => $stateName,
            'expire' => '3600',
        );
        $cookie3 = array(
            'name' => 'cityName',
            'value' => $cityName,
            'expire' => '3600',
        );

        if ($countryName != '')
            $this->input->set_cookie($cookie1);
        if ($stateName != '')
            $this->input->set_cookie($cookie2);
        if ($cityName != '')
            $this->input->set_cookie($cookie3);
        redirect('/');
    }

    public function ads($cat_id, $sub_cat_id) {
        $this->load->library('pagination');
        $this->data['categories'] = $this->Categories_model->getCategories();
        $this->data['countries'] = $this->ads->getTopCountry();
        if ($this->input->cookie('countryName', true) == '') {

            $IPaddress = '39.46.114.116'; //$_SERVER['REMOTE_ADDR'];
            $json = file_get_contents("http://ipinfo.io/{$IPaddress}");
            $details = json_decode($json);
            $names = json_decode(file_get_contents("http://country.io/names.json"), true);
            $country_name = $names[$details->country];
            $state_name = $details->region;
            $city_name = $details->city;
            $country_id = $this->User_model->getCountryId($country_name);
            $state_id = $this->User_model->getStateId($state_name, $country_id);
            $city_id = $this->User_model->getCityId($city_name, $state_id);
        } else if ($this->input->cookie('countryName', true) != '' && $this->input->cookie('stateName', true) == '') {
            $IPaddress = '39.46.114.116'; //$_SERVER['REMOTE_ADDR'];
            $json = file_get_contents("http://ipinfo.io/{$IPaddress}");
            $details = json_decode($json);
            $names = json_decode(file_get_contents("http://country.io/names.json"), true);
            $country_name = $names[$details->country];
            $state_name = $details->region;
            $city_name = $details->city;
            $country_idFirst = $this->User_model->getCountryId($country_name);
            $country_idTwo = $this->input->cookie('countryName', true);
            if ($country_idFirst == $country_idTwo) {
                $country_id = $this->input->cookie('countryName', true);
                $state_id = $this->User_model->getStateId($state_name, $country_id);
                $city_id = $this->User_model->getCityId($city_name, $state_id);
            } else {
                $country_id = $this->input->cookie('countryName', true);
                $state_id = '';
                $city_id = '';
            }
        } else {

            $country_id = $this->input->cookie('countryName', true);
            $state_id = $this->input->cookie('stateName', true);
            $city_id = $this->input->cookie('cityName', true);
        }

        $this->data['cat_name'] = $this->User_model->getCategoryName($cat_id);
        $this->data['posts'] = $this->Blog_model->getActivePosts(3, 0);
        $this->data['Newproducts'] = $this->Product_model->getProductByCat(10, 0, 16, 1);
        $this->data['seconhand'] = $this->Product_model->getProductByCat(10, 0, 17, 1);
        $this->data['assess'] = $this->Product_model->getProductByCat(10, 0, 18, 1);
        $this->data['rapairing'] = $this->Product_model->getProductByCat(10, 0, 19, 1);

        //////////////////////////////pagination start/////////////////////////////////

        $config['base_url'] = base_url() . 'home/ads/' . $cat_id . '/' . $sub_cat_id;
        $this->data['total_rows'] = $this->User_model->countGetAdsToShow($country_id, $state_id, $city_id, $cat_id, $sub_cat_id);
        $config['total_rows'] = $this->data['total_rows'][0]->count;
        //print_r($this->data['total_rows']);
        // print_r($config['total_rows']);
        //die;
        $config['uri_segment'] = 5;
        $config['num_links'] = 2;
        $start = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

        $limit = $config['per_page'] = $perpage = 10;
        $config['full_tag_open'] = '<ul class="pags">';
        $config['full_tag_close'] = '</ul>';
        $config['last_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active noarrow"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $config['next_link'] = '<li></li>';
        $config['prev_link'] = '<li></li>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);
        if ($config['total_rows'] > 0) {
            $this->data['start'] = $start + 1;
        } else {
            $this->data['start'] = 0;
        }
        $this->data['totalpage'] = ceil($this->data['total_rows'][0]->count / $perpage);

        $this->data['ads'] = $this->User_model->getAdsToShow($limit, $start, $country_id, $state_id, $city_id, $cat_id, $sub_cat_id);
        $viewsArray = array();
        $reviewsArray = array();

        for ($index = 0; $index < count($this->data['ads']); $index++) {
            if (isset($this->data['ads'][$index]->id)) {
                $this->data['views'] = $this->User_model->getCountViewsAll($this->data['ads'][$index]->id);
                $this->data['reviews'] = $this->User_model->getcalculateStar($this->data['ads'][$index]->id);
                array_push($viewsArray, $this->data['views']);
                array_push($reviewsArray, $this->data['reviews']);
            }
//$this->data['ads'][$index]->id;
        }
        $this->data['title'] = 'Ads';

        $this->data['viewsArray'] = $viewsArray;
        $this->data['reviewsArray'] = $reviewsArray;
        // print_r($viewsArray);
        //die;
        $this->data['pagination'] = $this->pagination->create_links();
        if ($config['total_rows'] > 0) {

            $this->data['to'] = count($this->data['ads']) + $start;
        } else {
            $this->data['to'] = 0;
        }
        // print_r($this->data['to']);
        //die;
        //////////////////////////////pagination end///////////////////////////////////
        $this->load->view('ads', $this->data);
        //print_r($ads);
    }

    public function adsDetail($ads_id) {
        $this->data['title'] = 'Ads';

        $this->data['categories'] = $this->Categories_model->getCategories();
        $this->data['reviews'] = $this->User_model->getReviews($ads_id);
        $count = $this->User_model->getCountViews($ads_id);
        $newCount = $count + 1;
        $updateCount = $this->User_model->updateCountViews($ads_id, $newCount);
        $this->data['countries'] = $this->ads->getTopCountry();
        $this->data['ads'] = $this->User_model->getAdsDetail($ads_id);
        $this->data['contacts'] = $this->User_model->getContactByAds($ads_id);
        // print_r($this->data['ads']);
        //die;
        $this->load->view('adsDetail', $this->data);
    }

    public function searchDetails() {
        $this->data['title'] = 'Search Result';

        $this->load->library('pagination');
        $this->data['categories'] = $this->Categories_model->getCategories();
        $this->data['countries'] = $this->ads->getTopCountry();
        $cat_id = $this->input->get('getCategory');


        if ($this->input->cookie('countryName', true) == '') {

            $IPaddress = $this->input->ip_address(); //$_SERVER['REMOTE_ADDR'];
            $json = $this->curl_get_contents("https://ipinfo.io/$IPaddress/geo");
            // var_dump($json); die;
            $details = json_decode($json);
            $names = json_decode($this->curl_get_contents("http://country.io/names.json"), true);
            $country_name = $names[$details->country];
            $state_name = $details->region;
            $city_name = $details->city;
            $country_id = $this->User_model->getCountryId($country_name);
            $state_id = $this->User_model->getStateId($state_name, $country_id);
            $city_id = $this->User_model->getCityId($city_name, $state_id);
        } else if ($this->input->cookie('countryName', true) != '' && $this->input->cookie('stateName', true) == '') {
            $IPaddress = $this->input->ip_address(); //$_SERVER['REMOTE_ADDR'];
            $json = $this->curl_get_contents("https://ipinfo.io/$IPaddress/geo");
            // var_dump($json); die;
            $details = json_decode($json);
            $names = json_decode($this->curl_get_contents("http://country.io/names.json"), true);
            $country_name = $names[$details->country];
            $state_name = $details->region;
            $city_name = $details->city;
            $country_idFirst = $this->User_model->getCountryId($country_name);
            $country_idTwo = $this->input->cookie('countryName', true);
            if ($country_idFirst == $country_idTwo) {
                $country_id = $this->input->cookie('countryName', true);
                $state_id = $this->User_model->getStateId($state_name, $country_id);
                $city_id = $this->User_model->getCityId($city_name, $state_id);
            } else {
                $country_id = $this->input->cookie('countryName', true);
                $state_id = '';
                $city_id = '';
            }
        } else {
            $country_id = $this->input->cookie('countryName', true);
            // var_dump($country_id); die;
            $state_id = $this->input->cookie('stateName', true);
            $city_id = $this->input->cookie('cityName', true);
        }

        $title = $this->input->get('title');

        //echo $cat_id . " " . $country_id . " " . $state_id . " " . $city_id . " " . $title;
        //die;
        //////////////////////////////pagination start/////////////////////////////////

        $config['base_url'] = base_url() . 'home/searchDetails/';
        $this->data['total_rows'] = $this->User_model->countGetAdsToShowSearch($title, $country_id, $state_id, $city_id, $cat_id);
        $config['total_rows'] = $this->data['total_rows'][0]->count;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $limit = $config['per_page'] = $perpage = 10;
        $config['full_tag_open'] = '<ul class="pags">';
        $config['full_tag_close'] = '</ul>';
        $config['last_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active noarrow"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $config['next_link'] = '<li></li>';
        $config['prev_link'] = '<li></li>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);
        if ($config['total_rows'] > 0) {
            $this->data['start'] = $start + 1;
        } else {
            $this->data['start'] = 0;
        }
        $this->data['totalpage'] = ceil($this->data['total_rows'][0]->count / $perpage);

        $this->data['searchDetail'] = $this->User_model->getSearchDetails($limit, $start, $cat_id, $country_id, $state_id, $city_id, $title);

        $this->data['pagination'] = $this->pagination->create_links();

        if ($config['total_rows'] > 0) {
            $this->data['to'] = count($this->data['searchDetail']) + $start;
        } else {
            $this->data['to'] = 0;
        }

        //////////////////////////////pagination end///////////////////////////////////
        $viewsArray = array();
        $reviewsArray = array();
        for ($index = 0; $index < count($this->data['searchDetail']); $index++) {
            if (isset($this->data['searchDetail'][$index]->id)) {
                $this->data['views'] = $this->User_model->getCountViewsAll($this->data['searchDetail'][$index]->id);
                $this->data['reviews'] = $this->User_model->getcalculateStar($this->data['searchDetail'][$index]->id);
                array_push($viewsArray, $this->data['views']);
                array_push($reviewsArray, $this->data['reviews']);
            }
//$this->data['ads'][$index]->id;
        }
        $this->data['viewsArray'] = $viewsArray;
        $this->data['reviewsArray'] = $reviewsArray;


        $this->load->view('ads', $this->data);
    }

    public function adsReview($ads_id) {

        $data['star'] = $this->input->post('price_rate');
        $data['name'] = $this->input->post('nickname');
        $data['summary'] = $this->input->post('summary');
        $data['message'] = $this->input->post('review_message');
        $data['ads_id_fk'] = $ads_id;
        $data['user_id_fk'] = $this->session->userdata('UserID');
        $review = $this->User_model->adsReviewSubmmit($data);
        if ($review) {

            $this->session->set_flashdata('message', '<div class="alert alert-success">Your review successfuly submitted.</div>');
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger">You review submission failed Try again.</div>');
        }
        redirect(base_url() . 'home/adsDetail/' . $ads_id);
    }

    public function addAds() {
            $this->data['userinfo'] = $this->User_model->userexistByID($this->session->userdata('UserID'));
        if($this->data['userinfo'][0]['paymentStatus']!='1')
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Please Click <a href="'.base_url().'payment">Here</a> to Pay Subscription Charges and avail Premium Account to use this facility</div>');
            redirect('home/dashboard');
        }
        
        $this->data['packages'] = $this->User_model->getpackages();
        
        $this->data['settings'] = $this->Admin_model->getSiteSettings();
        
        $this->data = $this->common();  
        
        $this->data['title']      = 'Be a Brand ';
        
        $this->data['description']      = 'Brands Valley is an advertising platform targeting clients either local or international who are looking for all kinds of branding.  ';
        
        $this->data['keyword']      = 'brands,marketing,advertising,advertisement,ad agency,clients,classifieds,targeted advertising  ';
        
        if ($this->session->userdata('user_loggedin')) {

            $this->load->view('addads', $this->data);
        } else {
            redirect('home/login');
        }
    }

    public function Viewads() {
        $this->data = $this->common();  
        
        if ($this->session->userdata('user_loggedin')) {
             $this->data['title'] = 'Ads';
            $this->data['userinfo'] = $this->User_model->userexistByID($this->session->userdata('UserID'));

            // $this->data['categories'] = $this->Categories_model->getCategories();
            // $this->data['countries'] = $this->ads->getTopCountry();

            // $this->data['ads'] = $this->User_model->getAllAdsWithUserId($this->session->userdata('UserID'));
            $this->load->view('viewads', $this->data);
        } else {
            redirect('home/login');
        }
    }

    public function detailAds($id) {
        if ($this->session->userdata('user_loggedin')) {
            $this->data['title'] = 'Ad Detail';

            $data['Categories'] = $this->Categories_model->getCategories();
            $data['countries'] = $this->ads->getTopCountry();
            $data['adsDetail'] = $this->ads->getAdsDetail($id);
            $data['adsCountry'] = $this->ads->getAdsCountry($id);
            $data['adsStates'] = $this->ads->getAdsStates($id);
            $data['adsCity'] = $this->ads->getAdsCity($id);
            $data['adsContact'] = $this->ads->getAdsContact($id);
            $this->load->view('detailads', $data);
        } else {
            redirect('home/login');
        }
    }
    public function show_product()
    {
        $rigion = $this->getRigon();
        $data = $this->common();

        $data['title']              = 'Be a Brand ';
        
        $data['description']        = 'Brands Valley is an advertising platform targeting clients either local or international who are looking for all kinds of branding.  ';
        
        $data['keyword']            = 'brands,marketing,advertising,advertisement,ad agency,clients,classifieds,targeted advertising  ';
        
        $data['product_detail'] = $this->Product_model->getProductById($this->uri->segment(3));
        
        $data['relatedProduct'] = $this->Product_model->getProductByCat(10,0,$data['product_detail']['categoryId'],$isHomepage=0);
        
        // $data['relatedProducts'] = $this->Product_model->getProductByCats($data['product_detail']['categoryId']);
        
        $data['product_review'] = $this->Product_model->getProductReviewById($this->uri->segment(3));
        
        $data['relatedSubCat'] = $this->Categories_model->getsubByCategoriesID($data['product_detail']['cat_id_fk']);
        // var_dump($data['product_detail']); die();
        // 
        $this->load->view('MainProduct', $data);
    }
    public function search_product()
    {
        $data = $this->common();

        $data['title'] = ' ';
        
         // var_dump('abc'); 
        $this->load->view('SearchedProduct', $data);
    }
    public function cart($args='')
    {
        $page = $this->uri->segment(3);
        $query_string = $this->uri->segment(4);
        $productid = $this->uri->segment(5);
        // var_dump($page); 
        // var_dump($query_string); 
        // var_dump($productid); die();
        $insert_data = array
        (
        'id'            => $this->input->post('id'), 
        'name'          =>  $this->input->post('name'),
        'price'         => ($this->input->post('price')?$this->input->post('price'):'1'),
        'qty'           =>$this->input->post('qty'),
        'options'       => array(
            'img' => $this->input->post('image'),
            'cat_id'        => $this->input->post('cat')
            )
        );
       // echo "<pre>";var_dump($insert_data); die;
       if($this->cart->insert($insert_data))
       {
            // var_dump($this->cart->contents()); die;
            $this->session->set_flashdata('message', '<div class="alert alert-success">Item Added Successfully <a href="'.base_url().'Home/myCart">Visit Cart</a></div>');
         
            redirect(base_url().$page."/".$query_string."/".$productid);
       }
    }
    public function myCart()
    {
         if ($this->session->userdata('user_loggedin')) 
        {
             $data = $this->common();

            $data['title'] = 'My Cart';
            $data['cartItems'] = $this->cart->contents();
            $data['subCat'] = $this->Categories_model->getsubByCategoriesID($catId);
            $data['subCat'] = $this->Coupen_model->empCoupan($catId);
            // var_dump($data['countries']); die;
            $this->load->view('shop', $data);
        } 
        else 
        {
            redirect('Home/login');
        // var_dump($_SESSION);
           
        }
    }
    public function removeItemFromCart($rowId)
    {
        $data=$this->cart->update(array(
        'rowid'=>$rowId,
        'qty'=>0
        ));

        $this->cart->update($data);  
            $this->session->set_flashdata('message', '<div class="alert alert-success">Cart Updated</div>');

        redirect('Home/myCart');
    }
    public function productByCategories()
    {
        $region = $this->getRigon();
        $qryString = $this->uri->segment(3);
        $catId = $this->uri->segment(4);
        $this->load->library('pagination');
        
        $config['base_url'] = base_url() . 'Home/productByCategories/'.$qryString.'/'.$catId;
        $config['total_rows'] = $this->data['total_rows'] = $this->ads->getProductsCountByCatID($catId, $region);

        $limit = $config['per_page'] = $perpage = 10;
        $start = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $config['num_links'] = ceil($config['total_rows']/$perpage);
        $config['full_tag_open'] = '<ul class="pags">';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li  class="active noarrow"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = '<li></li>';
        $config['prev_link'] = '<li></li>';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = true;
        $config['last_link'] = false;
        $config['uri_segment'] = 5;
        
        $this->pagination->initialize($config);
        
        $this->data["links"] = $this->pagination->create_links();
        $this->data['start'] = $start + 1;
        $this->data['products'] = $this->ads->getProductsByCatID($limit, $start, $catId, $region);
        // echo "<pre>";var_dump($this->data['products']); die;
        $this->data['catId'] = $this->data['products'][0]['ID'];
        $this->data['catName'] = $this->data['products'][0]['cat_title'];
        $this->data['subCat'] = $this->Categories_model->getsubByCategoriesID($catId);
        $this->load->view('catProducts', $this->data);
    }
    public function productByBrands(){
        $region = $this->getRigon();

        $catName             =       $this->uri->segment(3);
        $catId               =       $this->uri->segment(4);
        $subcatname          =       $this->uri->segment(5);
        $subcatId            =       $this->uri->segment(6);
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url() . 'Home/productByBrands/'.$catName.'/'.$catId.'/'.$subcatname.'/'.$subcatId;
        
        $config['total_rows'] = $this->data['total_rows'] = $this->ads->getAdsCountBysubCatID($subcatId, $region);
        
        $limit = $config['per_page'] = $perpage = 10;
        
        $start = ($this->uri->segment(7)) ? $this->uri->segment(7) : 0;
        
        $config['num_links'] = ceil($config['total_rows']/$perpage);
        
        $config['full_tag_open'] = '<ul class="pags">';
        
        $config['prev_tag_open'] = '<li>';
        
        $config['prev_tag_close'] = '</li>';
        
        $config['next_tag_open'] = '<li>';
        
        $config['next_tag_close'] = '</li>';
        
        $config['cur_tag_open'] = '<li  class="active noarrow"><a>';
        
        $config['cur_tag_close'] = '</a></li>';
        
        $config['last_tag_open'] = '<li>';
        
        $config['last_tag_close'] = '</li>';
        
        $config['num_tag_open'] = '<li>';

        $config['num_tag_close'] = '</li>';

        $config['next_link'] = '<li></li>';

        $config['prev_link'] = '<li></li>';

        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = true;

        $config['last_link'] = false;

        $config['uri_segment'] = 7;

        $this->pagination->initialize($config);

        $this->data["links"] = $this->pagination->create_links();

        $this->data['products'] = $this->ads->getProductsBysubCatID($limit, $start, $subcatId, $region);

        $this->data['subCat'] = $this->Categories_model->getsubByCategoriesID($catId);

        $this->data['to'] = count($this->data['products']) + $start;

        $this->data['catId'] = $catId;

        $this->data['catName'] = str_replace('-', ' ', $catName);

        $this->load->view('catProducts', $this->data);
    }

    public function search()
    {
        $region = $this->getRigon();
        $catId = $this->input->get('getCategory');
        $title = $this->input->get('browser');
        // var_dump($title); die;
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url() . 'Home/search/?getCategory='.$catId.'&browser='.$title.'/';
        $config['total_rows'] = $this->data['total_rows'] = $this->ads->getProductsCountByCatIDTitle($catId, $title, $region);

        $limit = $config['per_page'] = $perpage = 10;
        $start = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $config['num_links'] = ceil($config['total_rows']/$perpage);
        $config['full_tag_open'] = '<ul class="pags">';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li  class="active noarrow"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = '<li></li>';
        $config['prev_link'] = '<li></li>';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = true;
        $config['last_link'] = false;
        $config['uri_segment'] = 5;
        
        $this->pagination->initialize($config);
        
        $this->data["links"] = $this->pagination->create_links();
        $this->data['start'] = $start + 1;
        $this->data['products'] = $this->ads->getProductsByCatIDTitle($limit, $start, $catId, $title, $region);
        $this->data['catId'] = $this->data['products'][0]['ID'];
        $this->data['catName'] = $this->data['products'][0]['cat_title'];
        $this->data['subCat'] = $this->Categories_model->getsubByCategoriesID($catId);
        $this->load->view('catProducts', $this->data);
    }

    function curl_get_contents($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

    private function getRigon($value='')
    {
        
         $this->load->helper('cookie');
        if ($this->input->cookie('countryName', true) == '') {

            // $IPaddress = '58.27.217.75'; //$_SERVER['REMOTE_ADDR'];
            $IPaddress = $this->input->ip_address(); //$_SERVER['REMOTE_ADDR'];
            // echo $IPaddress; 
            // $json = file_get_contents("http://ipinfo.io/$IPaddress/geo?token=08ea2e684e4f39");
           // $json = file_get_contents("https://ipinfo.io/39.55.185.64/geo");
            $json = $this->curl_get_contents("https://ipinfo.io/$IPaddress/geo");
            // var_dump($json); die;
            $details = json_decode($json);
            // var_dump($details); die;
            // $names = json_decode(file_get_contents("http://country.io/names.json"), true);
            $names = json_decode($this->curl_get_contents("http://country.io/names.json"), true);
            // var_dump($names); die;
            $country_name = $names[$details->country];
            // var_dump($country_name); die;
            $state_name = $details->region;
            $city_name = $details->city;
            $country_id = $this->User_model->getCountryId($country_name);
            $state_id = $this->User_model->getStateId($state_name, $country_id);
            $city_id = $this->User_model->getCityId($city_name, $state_id);
        } else if ($this->input->cookie('countryName', true) != '' && $this->input->cookie('stateName', true) == '') {
            $IPaddress = $this->input->ip_address();; //$_SERVER['REMOTE_ADDR'];
            // $IPaddress = '58.27.217.75'; //$_SERVER['REMOTE_ADDR'];
            // echo "2/<pre>";var_dump($IPaddress); die;

            $json = $this->curl_get_contents("https://ipinfo.io/$IPaddress/geo");
            // var_dump($json); die;
            $details = json_decode($json);
            $names = json_decode($this->curl_get_contents("http://country.io/names.json"), true);
            $country_name = $names[$details->country];
            $state_name = $details->region;
            $city_name = $details->city;
            $country_idFirst = $this->User_model->getCountryId($country_name);
            $country_idTwo = $this->input->cookie('countryName', true);
            if ($country_idFirst == $country_idTwo) {
                $country_id = $this->input->cookie('countryName', true);
                $state_id = $this->User_model->getStateId($state_name, $country_id);
                $city_id = $this->User_model->getCityId($city_name, $state_id);
            } else {
                $country_id = $this->input->cookie('countryName', true);
                $state_id = '';
                $city_id = '';
            }
        } else {
            $country_id = $this->input->cookie('countryName', true);
            // var_dump($country_id); die;
            $state_id = $this->input->cookie('stateName', true);
            $city_id = $this->input->cookie('cityName', true);
        }
        $data['country_id'] = $country_id;
        $data['state_id'] = $state_id;
        $data['city_id'] = $city_id;
        $data['ipAdd'] = $IPaddress;
        return $data;
    }
    public function getStatesByCountryId()
    {
        $country_id = $this->input->post('countryId');
        $stateData = $this->Country_model->StateById($country_id);
        // var_dump($stateData); die;
        $data = array();
        $data[]='<option value=""> - State - </option>';
        if($stateData)
        {
            foreach ($stateData as $stkey) {
                # code...
            $data[] = '<option value="'.$stkey['id'].'">'.$stkey['name'].'</option>';
            }
        }
        // var_dump($data); die;
        echo json_encode(array('data'=>$data));
    }
    public function getCityByStateId()
    {
        $stateId = $this->input->post('stateId');
        $cityData = $this->Country_model->getCityByStateId($stateId);
        // var_dump($stateData); die;
        $data = array();
        $data[]='<option value=""> - City - </option>';
        if($cityData)
        {
            foreach ($cityData as $ctkey) {
                # code...
            $data[] = '<option value="'.$ctkey['id'].'">'.$ctkey['name'].'</option>';
            }
        }
        // var_dump($data); die;
        echo json_encode(array('data'=>$data));
    }
    public function insertSignupData()
    {
        // var_dump($_POST);
         $this->load->library('form_validation');
        
         $this->form_validation->set_rules('FirstName', 'First Name', 'required');
         $this->form_validation->set_rules('lastName', 'Last Name', 'required');
         $this->form_validation->set_rules('signupCity', 'City Name', 'required');
         $this->form_validation->set_rules('signupState', 'State Name', 'required');
         $this->form_validation->set_rules('signupCountry', 'Country Name');
         $this->form_validation->set_rules('Telephone', 'Telephone Field', 'required|exact_length[11]');
         $this->form_validation->set_rules('DOBYear', 'DOB Year ', 'required');
         $this->form_validation->set_rules('DOBDay', 'DOB Day ', 'required');
         $this->form_validation->set_rules('DOBMonth', 'DOB Month ', 'required');
         $this->form_validation->set_rules('address', 'address ', 'required');
         $this->form_validation->set_rules('ZipCode', 'ZipCode ', 'required');
        $this->form_validation->set_rules('Email', 'Email Field', 'required|valid_email');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        $this->form_validation->set_rules('confirm', 'Password Confirmation Field', 'required|matches[Password]');
        if ($this->form_validation->run())
        {
            if(!$this->db->get_where('users', array('Email'=>$this->input->post('Email')))->row_array()){
            $insertArray = array(
                'customerType'=>$this->input->post('customerType'),
                'Email'=>$this->input->post('Email'),
                'Password'=>sha1($this->input->post('Password')),
                'FirstName'=>$this->input->post('FirstName'),
                'LastName'=>$this->input->post('lastName'),
                'City'=>$this->input->post('signupCity'),
                'State'=>$this->input->post('signupState'),
                'ZipCode'=>$this->input->post('ZipCode'),
                'Country'=>$this->input->post('signupCountry'),
                'Telephone'=>$this->input->post('Telephone'),
                'gender'=>$this->input->post('gender'),
                'DOBYear'=>$this->input->post('DOBYear'),
                'DOBDay'=>$this->input->post('DOBDay'),
                'DOBMonth'=>$this->input->post('DOBMonth'),
                'address'=>$this->input->post('address')
            );
            // $this->db->insert('users', $insertArray);
            // var_dump($this->db->last_query()); die;

            if($this->db->insert('users', $insertArray)){
                $data['status']='200';
                $data['id'] = $this->db->insert_id();
            }else{
                $data['status'] = '201';
                $data['id']   = 'qi';       
            }
        }else{
            $data['status'] = '201';
            $data['id']   = 'dup';
        }
        }
        else
        {
           // echo validation_errors(); die;
            $data['status'] = '201';
            $data['id']   = 'fv';
        }
        echo json_encode(array('data'=>$data));
    }
    public function testPage()
    {
        $data = $this->common();
        $this->load->view('testPage', $data);
    }
    private function paypaladminemail()
    {
        return 'mudasarali88-facilitator@gmail.com';
    }
    public function packageajax()
    {
         $result  = $this->User_model->getpackageid($this->input->post('postid'));
         // var_dump($result);die();
         $option = '<option value="">Please Select</option>';
         if($result){

            foreach ($result as $res) {
                $option .= '<option value="'.$res['packageId'].'">'.$res['packageTitle'].'</option>';
            }
         }
         // var_dump($option); die;
         echo  json_encode(array('data' =>$option));
    }
    public function packageById()
    {
         $result  = $this->User_model->getpackageByid($this->input->post('postid'));
         if($result){
         echo  json_encode(array('status'=>'ok', 'data'=>$result));
         }else{

         echo  json_encode(array('status'=>'notok', 'data'=>''));
         }
    }
     
}

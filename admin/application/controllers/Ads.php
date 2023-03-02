<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('Ads_model', 'ads');
        $this->load->model('Categories_model');
        $this->load->model('User_model');
        $this->load->model('Admin_model');
    }

    public function index() {
        if ($this->session->userdata('loggedin')) {
            
        } else {
            redirect('admin/login');
        }
    }

    public function do_upload($image) {
        $config['upload_path'] = 'assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;
        $config['max_width'] = 1024;
        $config['max_height'] = 1024;
        $imageName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $_FILES[$image]['name']); //remove extension
        $config['file_name'] = $imageName . "_" . time();
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($image)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
            return false;
        } else {
            return $this->upload->data();
        }
    }

    function Viewads() {
        if ($this->session->userdata('loggedin')) {
            $data['ads'] = $this->ads->getAllAds();
            $this->load->view('adminpages/viewads', $data);
        } else {
            redirect('admin/login');
        }
    }
    public function globalStatusChange() {
        if ($this->session->userdata('loggedin')) {
            $id = $this->uri->segment(3);
            $status['isGlobal'] = $this->uri->segment(4);
            $this->db->where('id', $id);
            if($this->db->update('ads', $status))
            {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Ads Updated.</div>');
            redirect('ads/viewads', $data);
            }
            else
            {
               $this->session->set_flashdata('message', '<div class="alert alert-danger">Ads updated fail please try again.</div>'); 
            redirect('ads/viewads', $data);
            }

        } else {
            redirect('admin/login');
        }
    }

    public function addAds() {

        
        if ($this->session->userdata('user_loggedin')) {
            $userId = $this->session->userdata('UserID');
            $adminId = 0;
            $sliderImage = 0;
            $globalSet = 0;
        } else if ($this->session->userdata('loggedin')) {
            $userId = $this->session->userdata('ID');
            $adminId = 1;
            $sliderImage = $this->input->post('slider_image');
            $globalSet = $this->input->post('global');
        }


        if ($this->session->userdata('loggedin') || $this->session->userdata('user_loggedin')) {
            $data['categories'] = $this->Categories_model->getCategories();
            $data['topCountry'] = $this->ads->getTopCountry();
            if ($this->input->post() != NULL) {


                if (!empty($_FILES['image_1']['name'])) {
                    $image1 = 'image_1';
                    if ($image = $this->do_upload($image1)) {
                        $img = $image['file_name'];
//                    } else {
//                        $this->load->view('adminpages/addAds', $data);
//                        exit;
                    }
                } else {
                    $img = '';
                }
                if (!empty($_FILES['image_2']['name'])) {
                    $image2 = 'image_2';
                    if ($image = $this->do_upload($image2)) {
                        $img2 = $image['file_name'];
//                    } else {
//                        $this->load->view('adminpages/addAds', $data);
//                        exit;
                    }
                } else {
                    $img2 = '';
                }
                if (!empty($_FILES['image_3']['name'])) {
                    $image3 = 'image_3';
                    if ($image = $this->do_upload($image3)) {
                        $img3 = $image['file_name'];
//                    } else {
//                        $this->load->view('adminpages/addAds', $data);
//                        exit;
                    }
                } else {
                    $img3 = '';
                }
                if (!empty($_FILES['image_4']['name'])) {
                    $image4 = 'image_4';
                    if ($image = $this->do_upload($image4)) {
                        $img4 = $image['file_name'];
//                    } else {
//                        $this->load->view('adminpages/addAds', $data);
//                        exit;
                    }
                } else {
                    $img4 = '';
                }
                if (!empty($_FILES['image_5']['name'])) {
                    $image5 = 'image_5';
                    if ($image = $this->do_upload($image5)) {
                        $img5 = $image['file_name'];
//                    } else {
//                        $this->load->view('adminpages/addAds', $data);
//                        exit;
                    }
                } else {
                    $img5 = '';
                }

                $insertdata = array('name' => $this->input->post('company_name'),
                    'url' => $this->input->post('company_url'),
                    'email' => $this->input->post('email'),
                    'nature_of_bus' => $this->input->post('nature_bus'),
                    'cat_id_fk' => $this->input->post('cat_ID'),
                    'sub_cat_id_fk' => $this->input->post('subcat_ID'),
                    'video_2' => $this->input->post('video_2'),
                    'video_3' => $this->input->post('video_3'),
                    'video_4' => $this->input->post('video_4'),
                    'video_5' => $this->input->post('video_5'),
                    'position_number' => $this->input->post('position_number'),
                    'paytype' => $this->input->post('paytype'),
                    'user_id_fk' => $userId,
                    'isAdmin' => $adminId,
                    'des' => $this->input->post('des'),
                    'longdes' => str_replace("'", "",$_POST['FCKeditor']),
                    'slider_image' => $sliderImage,
                    'isGlobal' => $globalSet,
                    'image_1' => $img,
                    'image_2' => $img2,
                    'image_3' => $img3,
                    'image_4' => $img4,
                    'image_5' => $img5,
                );
                // var_dump($insertdata); 

                $insert = $this->ads->insertAds($insertdata);

                if ($insert) {
                    $country = $this->input->post('country');
                    $states = $this->input->post('states');
                    $city = $this->input->post('city');
                    $contact = $this->input->post('contact');
                    $whats_app = $this->input->post('whats_app');
                    if ($country != '') {
                        $countryInsert = $this->ads->insertCountry($insert, $country, 0);
                    }
                    if ($states != '') {
// $strStat = substr($states, 0, -2);
//$arrStat = explode(",", $strStat);
                        $statesInsert = $this->ads->insertStates($insert, $states, 0);
                    }
                    if ($city != '') {
                        $cityInsert = $this->ads->insertCity($insert, $city, 0);
                    }
                    if ($contact != '') {
                        $arrContact1 = explode(",", $contact);
                        $countryInsert = $this->ads->insertContact($insert, $arrContact1, 0, 0);
                    }
                    if ($whats_app != '') {
                        $arrContact2 = explode(",", $whats_app);
                        $countryInsert = $this->ads->insertContact($insert, $arrContact2, 1, 0);
                    }

                    $paymentMethod = $this->input->post('paymentMethod');
                    $packagetype = $this->input->post('packagetype');
                    $userId = $this->session->userdata('ID');
                    $settings = $this->Admin_model->getSiteSettings();
                    $packageData  = $this->User_model->getpackageByid($packagetype);
                     
                     if ($this->input->post('paytype')=='c') {
                         $adCharges = $settings['customerAdRate'];
                     }
                     else if($this->input->post('paytype')=='e'){
                         $adCharges = $settings['employeeAdRate'];
                     }
                     else if($this->input->post('paytype')=='te'){
                         $adCharges = $settings['customerAdFromEmployeeRate'];

                     }
                     $totalCharges = $adCharges + $packageData['packageCharges'];
                     $discountRate = $packageData['packageDiscount'];
                     $discountAmount = ($totalCharges*$discountRate)/100;
                     $netPayables = $totalCharges  - $discountAmount;
                     $_POST['adId'] = $insert;
                     $_POST['totalCharges'] = $totalCharges;
                     $_POST['discountAmount'] = $discountAmount;
                     $_POST['netPayables'] = $netPayables;
                     if($this->input->post('paytype')=='te'){
                     $commission = ($this->input->post('netPayables')*$settings['commissionToEmplyee'])/100;
                     }else{
                     $commission = '';
                     }
                     $_POST['commission'] = $commission;

                     if ($paymentMethod=='Paypal') 
                     {
                         $cartpost = array(
                              'cartpost' => $this->input->post()
                         );
                        $this->session->set_userdata($cartpost);
                        $this->paypalPaymentAtAdTime();
                     }
                    else 
                    {
                        $paymentArray = array(
                        'user_id' => $this->session->userdata('UserID'),
                        'add_id' => $insert,
                        'pay_method' => $this->input->post('paymentMethod'),
                        'cnic' => $this->input->post('idCard'),
                        'invoice' => $this->input->post('invoice'),
                        'net_pay' => $this->input->post('amount'),
                        'total_amount' => $this->input->post('netPayables'),
                        'discount' => ($this->input->post('discount')?$this->input->post('discount'):0),
                        'txnId' => $this->input->post('txnId'),
                        'pay_date' => date('Y-m-d'),
                        'paymentStatus' => '0',
                        'commisionToUser' => $commission
                        );
                        // var_dump($paymentArray); die;
                        if($this->db->insert('payment_details', $paymentArray))
                        {
                            $this->session->set_flashdata('message', '<div class="alert alert-success">Ads added.</div>');
                            if ($this->session->userdata('user_loggedin')) {
                                redirect('home/addAds');
                            } else if ($this->session->userdata('loggedin')) {
                                redirect('ads/addAds');
                            }
                        }
                    }
                }
            } else {///if not submit form
                if ($this->session->userdata('user_loggedin')) {
                    $this->load->view('addAds', $data);
                } else if ($this->session->userdata('loggedin')) {
                    $this->load->view('adminpages/addAds', $data);
                }
            }
        } else {
            if ($this->session->userdata('user_loggedin')) {
                redirect('home/login');
            } else if ($this->session->userdata('loggedin')) {
                redirect('admin/login');
            }
        }
    }
    ///////////
    private function paypaladminemail()
    {
        return 'mudasarali88-facilitator@gmail.com';
    }

    public function paypalPaymentAtAdTime($value='')
    {
        // Check if paypal request or response
        if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"]))
        {
            $paypal_email = $this->paypaladminemail();
        
            $return_url = base_url().'ads/paypalPaymentAtAdTime';
            $cancel_url = base_url().'ads/paypalPaymentAtAdTime';
            $notify_url = base_url().'ads/paypalPaymentAtAdTime';
            $item_name = $this->session->userdata['cartpost']['Item'];
             
            $item_amount = $this->session->userdata['cartpost']['netPayables'];

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
            
            // Append querystring with custom field
            
            // Redirect to paypal IPN
            // print_r('https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);die;
            $pUrl = 'https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring;
            // var_dump($item_amount);; die; 
             // var_dump($pUrl); die; //https://www.sandbox.paypal.com/cgi-bin/webscr
            header('location:'.$pUrl);
            exit();
        } 
        else 
        {
            var_dump($_POST); die;
            $insertdata = array(
                
                'user_id' => $this->session->userdata('ID'),
                'add_id' => $this->session->userdata['cartpost']['adId'],
                'pay_method' => $this->session->userdata['cartpost']['paymentMethod'],
                'cnic' => $this->session->userdata['cartpost']['idcard'],
                'invoice' => $this->session->userdata['cartpost']['paymentMethod'],
                'net_pay' => $this->session->userdata['cartpost']['netPayables'],
                'total_amount' => $this->session->userdata['cartpost']['totalCharges'],
                'discount' => $this->session->userdata['cartpost']['discountAmount'],
                'txnId' => $this->input->post('txn_id'),
                'pay_date' => date('Y-m-d'),
                'paymentStatus' => '1',
                'commisionToUser' => $this->session->userdata['cartpost']['commission']




            );
            if($this->db->insert('payment_details', $insertdata))
            {
                $updateArray['paymentStatus'] = '1';
                $this->db->where('id', $this->session->userdata['cartpost']['adId']);
                if($this->db->update('ads', $updateArray))
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Payment Successful.</div>');
                redirect('payment');
                }
            }
            
                $insert = $this->User_model->updateUser($insertdata, $this->session->userdata('UserID'));
                if($insert){
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Payment Successful.</div>');
                redirect('payment');
                }
                else
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Payment Fail please try again .</div>');
                redirect('payment');
                }
           
            
        } 
    }
    ///////////////

    public function getCountries() {
        $term = $_GET['term'];
        $getCountries = $this->ads->getAllCountries($term);
        if ($getCountries > 0 && $getCountries != '') {
            echo json_encode($getCountries);
        }
    }

    public function getStates() {
        $term = $_GET['term'];
        $getCountries = $this->ads->getAllStates($term);
        if ($getCountries > 0 && $getCountries != '') {
            echo json_encode($getCountries);
        }
    }

    public function getCities() {
        $term = $_GET['term'];
        $getCountries = $this->ads->getAllCities($term);
        if ($getCountries > 0 && $getCountries != '') {
            echo json_encode($getCountries);
        }
    }

    public function detailAds($id) {
        if ($this->session->userdata('loggedin')) {
            $data['adsDetail'] = $this->ads->getAdsDetail($id);
            $data['adsCountry'] = $this->ads->getAdsCountry($id);
            $data['adsStates'] = $this->ads->getAdsStates($id);
            $data['adsCity'] = $this->ads->getAdsCity($id);
            $data['adsContact'] = $this->ads->getAdsContact($id);
            $this->load->view('adminpages/detailads', $data);
        } else {
            redirect('admin/login');
        }
    }

    public function deleteAdd() {
        if ($this->session->userdata('loggedin')) {
            $delete = $this->ads->deleteAdd($this->input->post('ID'));
            if ($delete) {
                echo "<div class='alert alert-success'>Ads deleted.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error Occured.</div>";
            }
        }
    }

    public function getCountry() {
        if ($this->session->userdata('loggedin')) {
            $list = $this->ads->getCountryList($this->input->post('country'));
            if ($list) {

                echo json_encode($list);
            } else {
                return "Please try again";
            }
        }
    }

    public function getStatesWithCountry() {


        $country_array = $this->input->post('country');
        $type = $this->input->post('type');
        if ($type == 1) {
            $countryList = implode(",", $country_array);
        } else {
            $countryList = $country_array;
        }

        $stateList = $this->ads->getStatesWithCountry($countryList);
        if ($stateList) {
            echo json_encode($stateList);
        } else {
            return "Please try again";
        }
    }

    public function getCitiesWithStates() {

        $states_array = $this->input->post('states');
        $type = $this->input->post('type');
        if ($type == 1) {
            $statesList = implode(",", $states_array);
        } else {
            $statesList = $states_array;
        }
        $cityList = $this->ads->getCitiesWithStates($statesList);
        if ($cityList) {
            echo json_encode($cityList);
        } else {
            return "Please try again";
        }
    }

    public function editAds() {
        if ($this->session->userdata('loggedin') || $this->session->userdata('user_loggedin')) {


            if ($this->session->userdata('user_loggedin')) {
                $sliderImage = 0;
                $globalSet = 0;
            } else if ($this->session->userdata('loggedin')) {
                $sliderImage = $this->input->post('slider_image');
                $globalSet = $this->input->post('global');
            }

            if ($this->uri->segment(3) != '') {
                $ads_id = $this->uri->segment(3);
            } else {
                $ads_id = $this->input->post('ads_id');
            }
            $data['ads'] = $this->ads->adsexistByID($ads_id);

            if ($data['ads']) {
                $data['categories'] = $this->Categories_model->getCategories();
                $data['subcategories'] = $this->Categories_model->getsubByCategoriesID($data['ads']->cat_id_fk);
                $data['topCountry'] = $this->ads->getTopCountry();
                $data['contact'] = $this->ads->getContactList($data['ads']->id);
                $data['countryList'] = $this->ads->getCountriesList($data['ads']->id);
                $data['stateList'] = $this->ads->getStateList($data['ads']->id);
                $data['cityList'] = $this->ads->getCityList($data['ads']->id);
                if ($this->input->post() != NULL) {


                    if (!empty($_FILES['image_1']['name'])) {
                        $image1 = 'image_1';
                        if ($image = $this->do_upload($image1)) {
                            $img = $image['file_name'];
                            echo $img;
//                    } else {
//                        $this->load->view('adminpages/addAds', $data);
//                        exit;
                        }
                    } else {
                        $img = '';
                    }

                    if (!empty($_FILES['image_2']['name'])) {
                        $image2 = 'image_2';
                        if ($image = $this->do_upload($image2)) {
                            $img2 = $image['file_name'];
//                    } else {
//                        $this->load->view('adminpages/addAds', $data);
//                        exit;
                        }
                    } else {
                        $img2 = '';
                    }
                    if (!empty($_FILES['image_3']['name'])) {
                        $image3 = 'image_3';
                        if ($image = $this->do_upload($image3)) {
                            $img3 = $image['file_name'];
//                    } else {
//                        $this->load->view('adminpages/addAds', $data);
//                        exit;
                        }
                    } else {
                        $img3 = '';
                    }
                    if (!empty($_FILES['image_4']['name'])) {
                        $image4 = 'image_4';
                        if ($image = $this->do_upload($image4)) {
                            $img4 = $image['file_name'];
//                    } else {
//                        $this->load->view('adminpages/addAds', $data);
//                        exit;
                        }
                    } else {
                        $img4 = '';
                    }
                    if (!empty($_FILES['image_5']['name'])) {
                        $image5 = 'image_5';
                        if ($image = $this->do_upload($image5)) {
                            $img5 = $image['file_name'];
//                    } else {
//                        $this->load->view('adminpages/addAds', $data);
//                        exit;
                        }
                    } else {
                        $img5 = '';
                    }


                    $updatedata['name'] = $this->input->post('company_name');
                    $updatedata['url'] = $this->input->post('company_url');
                    $updatedata['email'] = $this->input->post('email');
                    $updatedata['nature_of_bus'] = $this->input->post('nature_bus');
                    $updatedata['cat_id_fk'] = $this->input->post('cat_ID');
                    $updatedata['sub_cat_id_fk'] = $this->input->post('subcat_ID');
                    $updatedata['video_2'] = $this->input->post('video_2');
                    $updatedata['video_3'] = $this->input->post('video_3');
                    $updatedata['video_4'] = $this->input->post('video_4');
                    $updatedata['video_5'] = $this->input->post('video_5');
                    $updatedata['position_number'] = $this->input->post('position_number');
                    $updatedata['des'] = $this->input->post('des');
                    $updatedata['slider_image'] = $sliderImage;
                    $updatedata['isGlobal'] = $globalSet;
                    if ($img != '' || $img != '')
                        $updatedata['image_1'] = $img;
                    if (($img2 != '' || $img2 != '') || ($img2 == '' && $updatedata['video_2'] != ''))
                        $updatedata['image_2'] = $img2;
                    if (($img3 != '' || $img3 != '') || ($img3 == '' && $updatedata['video_3'] != ''))
                        $updatedata['image_3'] = $img3;
                    if (($img4 != '' || $img4 != '') || ($img4 == '' && $updatedata['video_4'] != ''))
                        $updatedata['image_4'] = $img4;
                    if (($img5 != '' || $img5 != '') || ($img5 == '' && $updatedata['video_5'] != ''))
                        $updatedata['image_5'] = $img5;
                    $id = $ads_id;

                    $update = $this->ads->updateAds($updatedata, $id);

                    $country = $this->input->post('country');
                    $states = $this->input->post('states');
                    $city = $this->input->post('city');
                    $contact = $this->input->post('contact');
                    $whats_app = $this->input->post('whats_app');
                    if ($country != '') {
                        $countryUpdate = $this->ads->insertCountry($id, $country, 1);
                    }
                    if ($states != '') {
// $strStat = substr($states, 0, -2);
//$arrStat = explode(",", $strStat);
                        $statesUpdate = $this->ads->insertStates($id, $states, 1);
                    }
                    if ($city != '') {
                        $cityUpdate = $this->ads->insertCity($id, $city, 1);
                    }
                    if ($contact != '') {
                        $arrContact1 = explode(",", $contact);
                        $countryupdate = $this->ads->insertContact($id, $arrContact1, 0, 1);
                    }
                    if ($whats_app != '') {
                        $arrContact2 = explode(",", $whats_app);
                        $countryUpdate = $this->ads->insertContact($id, $arrContact2, 1, 1);
                    }
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Ads updated.</div>');

                    if ($this->session->userdata('user_loggedin')) {
                        redirect('home/Viewads');
                    } else if ($this->session->userdata('loggedin')) {
                        redirect('ads/Viewads');
                    }
                } else {
                    if ($this->session->userdata('user_loggedin')) {
                        $data['Categories'] = $this->Categories_model->getCategories();
                        $data['countries'] = $this->ads->getTopCountry();
                        $this->load->view('editAds', $data);
                    } else if ($this->session->userdata('loggedin')) {
                        $this->load->view('adminpages/editAds', $data);
                    }
                }
            } else {
                if ($this->session->userdata('user_loggedin')) {
                    redirect('home/Viewads');
                } else if ($this->session->userdata('loggedin')) {
                    redirect('ads/Viewads');
                }
            }
        } else {
            if ($this->session->userdata('user_loggedin')) {
                redirect('home/login');
            } else if ($this->session->userdata('loggedin')) {
                redirect('admin/login');
            }
        }
    }

    public function changesStatue() {
        if ($this->session->userdata('loggedin')) {
            $data = $this->input->post('status');
            $status = $this->ads->changesStatue($data, $this->input->post('ID'));
        }
    }

}

?>
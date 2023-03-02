<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

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
        $this->load->model('Categories_model');
        $this->load->model('Ads_model', 'ads');
        $this->data['Categories'] = $this->Categories_model->getCategories();
    }


    public function index()
    {
            $this->data['userinfo'] = $this->User_model->userexistByID($this->session->userdata('UserID'));
            if($this->data['userinfo'][0]['paymentStatus']!='0')
            {
                redirect('home/dashboard');
            }
        $this->data['settings'] = $this->Admin_model->getSiteSettings();
        if($this->data['userinfo'][0]['accountType']=='te') {
            $this->data['settings'] = $this->data['settings']['throughEmployeeSubscription'];
        }
        elseif ($this->data['userinfo'][0]['accountType']=='e') {
                 $this->data['settings'] = $this->data['settings']['employeeSubscrition'];
             }  
             elseif($this->data['userinfo'][0]['accountType']=='c') {
                     $this->data['settings'] = $this->data['settings']['customerSubscription'];
                }   
        if ($this->input->post() != NULL) {
            if($this->input->post('paymentMethod')=='Paypal'){
                        $cartpost = array(
                              'cartpost' => $this->input->post()
                         );
                        $this->session->set_userdata($cartpost);
                        $this->paypalPaymentAtRegisterTime();
                    }
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
                if ($this->form_validation->run() == FALSE) {
                    $error = validation_errors();

                    $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $error . '</div>');
                    $this->load->view('payment', $this->data);
                } else {

                    $insertdata = array(
                        'paymentType' => $this->input->post('paymentMethod'),
                        'amount' => ($this->input->post('amount')?$this->input->post('amount'):0),
                        'txnId' => ($this->input->post('txnId')?$this->input->post('txnId'):0),
                        'depositDate' => ($this->input->post('depositDate')?$this->input->post('depositDate'):0),
                        'paymentStatus' => '1'
                    );
                    $insert = $this->User_model->updateUser($insertdata, $this->session->userdata('UserID'));
                    }
                    if ($insert) {
                        $this->signupPaymentInsert($this->session->userdata('UserID'));
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Payment Status Updated.</div>');
                        redirect('payment');
                    }else
                    {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger">Payment Status Update fail please try again.</div>');
                        redirect('payment');
                    }
                }
        $this->load->view('payment-view', $this->data);
	}
    public function signupPaymentInsert($id=0)
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

	public function paymenthistory()
	{
    }

    private function paypaladminemail()
    {
        return 'mudasarali88-facilitator@gmail.com';
    }

    public function paypalPaymentAtRegisterTime($value='')
    {
        // Check if paypal request or response
        if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"]))
        {
            $paypal_email = $this->paypaladminemail();
        
            $return_url = base_url().'payment/paypalPaymentAtRegisterTime';
            $cancel_url = base_url().'payment/';
            $notify_url = base_url().'payment/paypalPaymentAtRegisterTime';
            // var_dump('expression'); die;
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
            
            // Append querystring with custom field
            
            // Redirect to paypal IPN
            // print_r('https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);die;
            $pUrl = 'https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring;
             //var_dump($pUrl); die; //https://www.sandbox.paypal.com/cgi-bin/webscr
            header('location:'.$pUrl);
            exit();
        } 
        else 
        {
            $isDealer = 0;
                    $isUser = 1;
            $insertdata = array(
                
                'paymentType' => $this->session->userdata['cartpost']['paymentMethod'],
                'amount' => $this->session->userdata['cartpost']['paymentAmn'],
                'txnId' => $this->input->post('txn_id'),
                'depositDate' => date('Y-m-d'),
                'paymentStatus' => '1',
            );
            
            
                $insert = $this->User_model->updateUser($insertdata, $this->session->userdata('UserID'));
                if($insert){
                    $this->signupPaymentInsert($this->session->userdata('UserID'));
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

	
}

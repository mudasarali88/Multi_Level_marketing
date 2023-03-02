<?php

class User_model extends CI_Model {

    public function __construct() {
// Call the CI_Model constructor
        parent::__construct();
    }

    public function insertUser($data) {
        $insert = $this->db->insert('users', $data);
        // var_dump($this->db->last_query()); die;
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function updateUser($data, $ID) {
        // var_dump($ID); die;
        $this->db->where('ID', $ID);
        // $update = ;
        if ($this->db->update('users', $data)) {
            return true;
        // var_dump($update); die;
        } else {
            return false;
        }
    }

    public function getDealerList() {

        $query = $this->db->get_where('users', array('IsDealer' => 1));
        return $query->result_array();
    }

    public function dealerexistByID($ID) {
        $query = $this->db->get_where('users', array('ID' => $ID, 'IsDealer' => 1));
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function getPaymentHistory($id)
    {
        if($this->input->post('startDate') && $this->input->post('startDate') != '')
        {
            $this->db->where('pay_date>=', $this->input->post('startDate'));
        }
        if($this->input->post('endDate') && $this->input->post('endDate') != '')
        {
            $this->db->where('pay_date<=', $this->input->post('endDate'));
        }


        return $this->db->select('*')->from('payment_details')->join('ads', 'payment_details.add_id=ads.id', 'left')->where('user_id', $id)->order_by('pay_date', 'asc')->get()->result_array();
    }
    public function getNumActiveDealer() {
        $query = $query = $this->db->get_where('users', array('IsDealer' => 1, 'status', 1));
        return $query->num_rows();
    }

    public function getNumActiveUser() {
        $query = $query = $this->db->get_where('users', array('status', 0));
        return $query->num_rows();
    }

    public function getUserList() {
        $query = $this->db->get_where('users', array('IsUser' => 1, 'active'=>'1'));
        return $query->result_array();
    }
    public function getUnapprovedUserList() {
        $query = $this->db->get_where('users', array('IsUser' => 1, 'active'=>'0'));
        return $query->result_array();
    }
    public function getEarningDetails($id='') {
        $query = $this->db->select('*')->from('earnings')->where(array('earnings.refererId' => $id))->order_by('earnings.ID', 'desc')->get();
        return $query->result_array();
    }
    public function getWithdrawRequests()
    {
         $query = $this->db->select('*, withdrawrequest.amount AS withdrawAmount')->from('withdrawrequest')->join('users', 'withdrawrequest.userId=users.ID')->where(array('withdrawrequest.status' => 0))->order_by('withdrawrequest.id', 'desc')->get();
        return $query->result_array();
    }
    public function getWithdrawtRequess()
    {
         $query = $this->db->select('*, withdrawrequest.amount AS withdrawAmount')->from('withdrawrequest')->join('users', 'withdrawrequest.userId=users.ID')->where(array('withdrawrequest.status' => 1))->order_by('withdrawrequest.id', 'desc')->get();
        return $query->result_array();
    }
    public function getTopEarner() {
        $query = $this->db->limit(10)->order_by('earning', 'desc')->get_where('users', array('IsUser' => 1, 'active'=>'1'));
        return $query->result_array();
    }
    public function gettopRefferer() {
        $query = $this->db->limit(10)->order_by('refCount', 'desc')->get_where('users', array('IsUser' => 1, 'active'=>'1'));
        return $query->result_array();
    }

    public function isUserexist($email, $password) {
        return $this->db->get_where('users', array('Email'=> $email, 'Password'=> $password))->row_array();
    }

    public function GeneraluserexistByID($ID) {
        $query = $this->db->get_where('users', array('ID' => $ID));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function GeneraluserexistByRefId($ID) {
        $query = $this->db->get_where('users', array('refId' => $ID));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function getActiveUserBySponser($ID) {
        $query = $this->db->get_where('users', array('refId2' => $ID, 'active'=>'1'));
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function getUserBySponserAndSide($side, $parentRefId) {
        $query = $this->db->get_where('users', array('refId2' => $parentRefId, 'basicNodeSide' => $side, 'active','1'));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function GetUserByEmail($email) {
        $query = $this->db->get_where('users', array('email' => $email));
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function updateActivate($activate, $Email) {
        $this->db->where('Email', $Email);
        $update = $this->db->update('users', array('active' => $activate));
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function updateResetLink($reset_link, $Email) {
        $this->db->where('Email', $Email);
        $update = $this->db->update('users', array('verifylink' => $reset_link));
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function GeneraluserexistByVirfylink($reset_link) {
        $query = $this->db->get_where('users', array('verifylink' => $reset_link));
        echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function userexistByID($ID) {
        $this->db->select('*')->from('users');
        $this->db->where('ID', $ID);
        $this->db->where('(IsDealer=1 or IsUser=1)');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function isCurrentPassword($password, $ID) {
        $query = $this->db->get_where('users', array('ID' => $ID, 'Password' => $password));

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getCountryId($name) {
        $query = $this->db->get_where('countries', array('name' => $name));
        if ($query->num_rows() > 0) {
            return $query->result()[0]->id;
        } else {
            return false;
        }
    }

    public function getStateId($name, $id) {
        $query = $this->db->get_where('states', array('name' => $name, 'country_id' => $id));
        if ($query->num_rows() > 0) {
            return $query->result()[0]->id;
        } else {
            return false;
        }
    }

    public function getCityId($name, $id) {
        $query = $this->db->get_where('cities', array('name' => $name, 'state_id' => $id));
        if ($query->num_rows() > 0) {
            return $query->result()[0]->id;
        } else {
            return false;
        }
    }

    public function getAdsToShow($limit, $start, $country_id, $state_id, $city_id, $cat_id, $sub_cat_id) {

        if ($country_id == '') {
            $country_id = 0;
        }
        if ($state_id == '') {
            $state_id = 0;
        }
        if ($city_id == '') {
            $city_id = 0;
        }
//echo $cat_id . " " . $country_id . " " . $state_id . " " . $city_id . " " . $title;
//die;
        if (isset($country_id)) {
            if ($country_id == 0) {
                $op1 = 'OR';
            } else {
                $op1 = 'AND';
            }
        }
        if (isset($state_id)) {
            if ($state_id == 0) {
                $op2 = 'OR';
            } else {
                $op2 = 'AND';
            }
        }
        if (isset($city_id)) {
            if ($city_id == 0) {
                $op3 = 'OR';
            } else {
                $op3 = 'AND';
            }
        }

        $query = "Select ads.* FROM ads INNER JOIN country_ads on (ads.id=country_ads.ads_id_fk) INNER JOIN states_ads on (ads.id=states_ads.ads_id_fk) INNER JOIN city_ads On (ads.id=city_ads.ads_id_fk) WHERE ads.cat_id_fk=$cat_id $op1 country_ads.country_id_fk=$country_id $op2 states_ads.states_id_fk=$state_id $op3 city_ads.city_id_fk= $city_id  and ads.sub_cat_id_fk=$sub_cat_id and ads.status=1 ORDER by position_number ASC LIMIT $start, $limit";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            $query = "Select ads.* FROM ads WHERE ads.cat_id_fk = $cat_id and ads.sub_cat_id_fk = $sub_cat_id and ads.status = 1 and isGlobal = 1 ORDER by position_number ASC LIMIT $start, $limit";
            $result = $this->db->query($query);
            if ($result->num_rows() > 0) {
                return $result->result();
            } else {
                return FALSE;
            }
        }
    }

    public function countGetAdsToShow($country_id, $state_id, $city_id, $cat_id, $sub_cat_id) {
        if ($country_id == '') {
            $country_id = 0;
        }
        if ($state_id == '') {
            $state_id = 0;
        }
        if ($city_id == '') {
            $city_id = 0;
        }
//echo $cat_id . " " . $country_id . " " . $state_id . " " . $city_id . " " . $title;
//die;
        if (isset($country_id)) {
            if ($country_id == 0) {
                $op1 = 'OR';
            } else {
                $op1 = 'AND';
            }
        }
        if (isset($state_id)) {
            if ($state_id == 0) {
                $op2 = 'OR';
            } else {
                $op2 = 'AND';
            }
        }
        if (isset($city_id)) {
            if ($city_id == 0) {
                $op3 = 'OR';
            } else {
                $op3 = 'AND';
            }
        }
        $query = "Select count(ads.id) as count FROM ads INNER JOIN country_ads on (ads.id = country_ads.ads_id_fk) INNER JOIN states_ads on (ads.id = states_ads.ads_id_fk) INNER JOIN city_ads On (ads.id = city_ads.ads_id_fk) WHERE ads.cat_id_fk = $cat_id $op1 country_ads.country_id_fk = $country_id $op2 states_ads.states_id_fk = $state_id $op3 city_ads.city_id_fk = $city_id  and ads.sub_cat_id_fk = $sub_cat_id and ads.status = 1 ORDER by position_number ASC";
        $result = $this->db->query($query);
        if ($result->result()[0]->count > 0) {
            return $result->result();
        } else {
            $query = "Select count(ads.id) as count FROM ads WHERE ads.cat_id_fk = $cat_id and ads.sub_cat_id_fk = $sub_cat_id and ads.status = 1 and isGlobal = 1 ORDER by position_number ASC";
            $result = $this->db->query($query);
            if ($result->num_rows() > 0) {
                return $result->result();
            } else {
                return FALSE;
            }
        }
    }

    public function countGetAdsToShowSearch($title, $country_id, $state_id, $city_id, $cat_id) {
        if ($country_id == '') {
            $country_id = 0;
        }
        if ($state_id == '') {
            $state_id = 0;
        }
        if ($city_id == '') {
            $city_id = 0;
        }
//echo $cat_id . " " . $country_id . " " . $state_id . " " . $city_id . " " . $title;
//die;
        if (isset($country_id)) {
            if ($country_id == 0) {
                $op1 = 'OR';
            } else {
                $op1 = 'AND';
            }
        }
        if (isset($state_id)) {
            if ($state_id == 0) {
                $op2 = 'OR';
            } else {
                $op2 = 'AND';
            }
        }
        if (isset($city_id)) {
            if ($city_id == 0) {
                $op3 = 'OR';
            } else {
                $op3 = 'AND';
            }
        }

        $query = "Select count(ads.id) as count FROM ads INNER JOIN country_ads on (ads.id = country_ads.ads_id_fk) INNER JOIN states_ads on (ads.id = states_ads.ads_id_fk) INNER JOIN city_ads On (ads.id = city_ads.ads_id_fk) WHERE ads.cat_id_fk = $cat_id $op1 country_ads.country_id_fk = $country_id $op2 states_ads.states_id_fk = $state_id $op3 city_ads.city_id_fk = $city_id  and ads.nature_of_bus LIKE '%$title%' and ads.status = 1 ORDER by position_number ASC";
        $result = $this->db->query($query);
        if ($result->result()[0]->count > 0) {
            return $result->result();
        } else {
            $query = "Select count(ads.id) as count FROM ads WHERE ads.cat_id_fk = $cat_id and ads.nature_of_bus LIKE '%$title%' and ads.status = 1 and isGlobal = 1 ORDER by position_number ASC";
            $result = $this->db->query($query);
            if ($result->num_rows() > 0) {
                return $result->result();
            } else {
                return FALSE;
            }
        }
    }

    Public function getAdsDetail($id) {
        $query = "
Select ads.*, ads_count.count, categories.cat_title as cat_name, subcategories.subcat_title as sub_cat_name FROM ads INNER JOIN categories on (categories.ID = ads.cat_id_fk) INNER JOIN subcategories on (subcategories.ID = ads.sub_cat_id_fk) INNER JOIN ads_count on (ads_count.ads_id_fk = ads.id) WHERE ads.id = $id and ads_count.ads_id_fk = $id and ads.status = 1 ORDER by ads.position_number ASC";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    Public function getContactByAds($id) {
        $query = "SELECT * FROM contact_list where ads_id_fk = $id and status = 1 ORDER by id ASC";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getSearchDetails($limit, $start, $cat_id, $country_id, $state_id, $city_id, $title) {
        if ($country_id == '') {
            $country_id = 0;
        }
        if ($state_id == '') {
            $state_id = 0;
        }
        if ($city_id == '') {
            $city_id = 0;
        }
//echo $cat_id . " " . $country_id . " " . $state_id . " " . $city_id . " " . $title;
//die;
        if (isset($country_id)) {
            if ($country_id == 0) {
                $op1 = 'OR';
            } else {
                $op1 = 'AND';
            }
        }
        if (isset($state_id)) {
            if ($state_id == 0) {
                $op2 = 'OR';
            } else {
                $op2 = 'AND';
            }
        }
        if (isset($city_id)) {
            if ($city_id == 0) {
                $op3 = 'OR';
            } else {
                $op3 = 'AND';
            }
        }
        if ($cat_id != '' && $title != '') {
            $query = "SELECT ads.* FROM ads"
                    . " INNER JOIN country_ads ON (ads.id = country_ads.ads_id_fk)"
                    . " INNER JOIN states_ads ON (ads.id = states_ads.ads_id_fk)"
                    . " INNER JOIN city_ads ON (ads.id = city_ads.ads_id_fk)"
                    . " where ads.cat_id_fk = $cat_id"
                    . " $op1 country_ads.country_id_fk = $country_id"
                    . " $op2 states_ads.states_id_fk = $state_id"
                    . " $op3 city_ads.city_id_fk = $city_id"
                    . " AND ads.status = 1 AND ads.nature_of_bus LIKE '%$title%' ORDER BY ads.position_number ASC LIMIT $start, $limit";

            $result = $this->db->query($query);
            if ($result->num_rows() > 0) {
                return $result->result();
            } else {
                $query = "Select ads.* FROM ads WHERE ads.cat_id_fk = $cat_id and ads.status = 1 and isGlobal = 1 and  ads.nature_of_bus LIKE '%$title%' ORDER by position_number ASC LIMIT $start, $limit";
                $result = $this->db->query($query);
                if ($result->num_rows() > 0) {
                    return $result->result();
                } else {
                    return FALSE;
                }
            }
        } else {
            return FALSE;
        }
    }

    Public function getCategoryName($id) {
        $query = "SELECT * FROM categories where ID = $id";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    public function getCountViews($ads_id) {
        $query = "SELECT * FROM ads_count where ads_id_fk = $ads_id";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->row()->count;
        } else {
            return FALSE;
        }
    }

    public function getCountViewsAll($ads_id) {
        $query = "SELECT * FROM ads_count where ads_id_fk = $ads_id";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result()[0]->count;
        } else {
            return FALSE;
        }
    }

    public function updateCountViews($ads_id, $count) {
        $query = "SELECT * FROM ads_count where ads_id_fk = $ads_id";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            $this->db->where('ads_id_fk', $ads_id);
            $update = $this->db->update('ads_count', array('count' => $count));
            if ($update) {
                return true;
            } else {
                return false;
            }
        } else {
            $data = array(
                'count' => $count,
                'ads_id_fk' => $ads_id
            );
            $insert = $this->db->insert('ads_count', $data);
            if ($insert) {
                return $this->db->insert_id();
            } else {
                return flase;
            }
        }
    }

    public function getSelectedRegin($table, $id) {
        $query = "SELECT * FROM $table where id = $id";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    public function adsReviewSubmmit($data) {
        $insert = $this->db->insert('ads_review', $data);

        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    public function getReviews($ads_id) {
        $query = "SELECT * FROM ads_review where ads_id_fk = $ads_id limit 10";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getcalculateStar($ads_id) {
        $query = "SELECT SUM(star) as sumstar FROM `ads_review` WHERE ads_id_fk = $ads_id  ";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            $query2 = "SELECT count(star) as countstar FROM `ads_review` WHERE ads_id_fk = $ads_id  ";
            $result2 = $this->db->query($query2);
            $finalResult = $result->row()->sumstar / $result2->row()->countstar;
            return round($finalResult);
        } else {
            return FALSE;
        }
    }

    public function getAdsForHome($cityId) {
        if(!empty($cityId)){
        $query = "SELECT ads.*, ads_count.count as counts FROM ads inner join ads_count ON (ads.id=ads_count.ads_id_fk)  INNER JOIN city_ads ON (ads.id = city_ads.ads_id_fk) WHERE city_ads.city_id_fk = $cityId LIMIT 10";
        }else{
            $query = "SELECT ads.*, ads_count.count as counts FROM ads inner join ads_count ON (ads.id=ads_count.ads_id_fk)  WHERE ads.isGlobal='1' LIMIT 10";
        }
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getTopViewAdsForHome() {
        $query = "SELECT ads.*, ads_count.count as counts FROM ads inner join ads_count ON (ads.id=ads_count.ads_id_fk) ORDER BY ads_count.count DESC LIMIT 10";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getAllAdsWithUserId($user_id) {
        $query = "SELECT ads.*,subcategories.subcat_title, categories.cat_title, payment_details.txnId, payment_details.paymentStatus FROM `ads` inner JOIN categories ON (categories.ID=ads.cat_id_fk) inner JOIN subcategories ON (subcategories.ID=ads.sub_cat_id_fk) LEFT JOIN payment_details ON (ads.id = payment_details.add_id) where ads.user_id_fk=$user_id";
            // var_dump($query); die;
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }


    public function getRecentAds($regions) {
        // $country_id = $state_id = $city_id;
        if ($regions['country_id'] == '') {
            $country_id = 0;
        }else{
            $country_id = $regions['country_id'];
            }
        if ($regions['state_id'] == '') {
            $state_id = 0;
        }else{
            $state_id = $regions['state_id'];
        }
        if ($regions['city_id'] == '') {
            $city_id = 0;
        }else{
            $city_id = $regions['city_id'];
        }
        $cityId = $city_id;
        
        if (isset($country_id)) {
            if ($country_id == 0) {
                $op1 = 'OR';
            } else {
                $op1 = 'AND';
            }
        }
        if (isset($state_id)) {
            if ($state_id == 0) {
                $op2 = 'OR';
            } else {
                $op2 = 'AND';
            }
        }
        if (isset($city_id)) {
            if ($city_id == 0) {
                $op3 = 'OR';
            } else {
                $op3 = 'AND';
            }
        }
        
            $query = "SELECT ads.*, ads_count.count as counts FROM ads 
                        INNER JOIN ads_count ON (ads.id=ads_count.ads_id_fk)"
                    . " INNER JOIN country_ads ON (ads.id = country_ads.ads_id_fk)"
                    . " INNER JOIN states_ads ON (ads.id = states_ads.ads_id_fk)"
                    . " INNER JOIN city_ads ON (ads.id = city_ads.ads_id_fk)"
                    . " WHERE 1 = 1"
                    . " AND country_ads.country_id_fk = $country_id"
                    . " AND states_ads.states_id_fk = $state_id"
                    . " AND city_ads.city_id_fk = $city_id"
                    . " AND ads.status = 1 ORDER BY ads.ID DESC LIMIT 10";


        $result = $this->db->query($query);
        
        if ($result->num_rows() > 0) {
           
            return $result->result();
       
        } else {
            $query = "SELECT ads.*, ads_count.count as counts FROM ads left join ads_count ON (ads.id=ads_count.ads_id_fk) WHERE ads.isGlobal='1' ORDER BY ads.id DESC LIMIT 10";
            // var_dump($query); die;
            $result = $this->db->query($query);
        
        if ($result->num_rows() > 0) {
           
            return $result->result();
       
            }else{
                return FALSE;
            }
        }
    }
    public function getWebSlugs($regions)
    {
        // $country_id = $state_id = $city_id;
        if ($regions['country_id'] == '') {
            $country_id = 0;
        }else{
            $country_id = $regions['country_id'];
            }
        if ($regions['state_id'] == '') {
            $state_id = 0;
        }else{
            $state_id = $regions['state_id'];
        }
        if ($regions['city_id'] == '') {
            $city_id = 0;
        }else{
            $city_id = $regions['city_id'];
        }
        $cityId = $city_id;
        
        if (isset($country_id)) {
            if ($country_id == 0) {
                $op1 = 'OR';
            } else {
                $op1 = 'AND';
            }
        }
        if (isset($state_id)) {
            if ($state_id == 0) {
                $op2 = 'OR';
            } else {
                $op2 = 'AND';
            }
        }
        if (isset($city_id)) {
            if ($city_id == 0) {
                $op3 = 'OR';
            } else {
                $op3 = 'AND';
            }
        }
        $query = "SELECT webslugs.* FROM webslugs "
                . " INNER JOIN country_slug ON (webslugs.slugId = country_slug.slug_id_fk)"
                . " INNER JOIN states_slug ON (webslugs.slugId = states_slug.slug_id_fk)"
                . " INNER JOIN city_slug ON (webslugs.slugId = city_slug.slug_id_fk)"
                . " WHERE 1 = 1"
                . " AND country_slug.country_id_fk = $country_id"
                . " AND states_slug.states_id_fk = $state_id"
                . " AND city_slug.city_id_fk = $city_id"
                . " AND webslugs.slugstatus = '1' ORDER BY webslugs.slugId ASC LIMIT 10";
            $result = $this->db->query($query);
            
            if ($result->num_rows() > 0) {
               
                // var_dump($query); die;
                return $result->result_array();
           
            } else {
                $query = "SELECT webslugs.* FROM webslugs WHERE webslugs.slugstatus = '1' AND webslugs.isGlobal = '1' ORDER BY webslugs.slugId ASC LIMIT 10";
                $result = $this->db->query($query);
            
            if ($result->num_rows() > 0) {
               
                return $result->result_array();
           
                }else{
                    return FALSE;
                }
            }
    }
    public function getWebGifs($regions)
    {
        // $country_id = $state_id = $city_id;
        if ($regions['country_id'] == '') {
            $country_id = 0;
        }else{
            $country_id = $regions['country_id'];
            }
        if ($regions['state_id'] == '') {
            $state_id = 0;
        }else{
            $state_id = $regions['state_id'];
        }
        if ($regions['city_id'] == '') {
            $city_id = 0;
        }else{
            $city_id = $regions['city_id'];
        }
        $cityId = $city_id;
        
        if (isset($country_id)) {
            if ($country_id == 0) {
                $op1 = 'OR';
            } else {
                $op1 = 'AND';
            }
        }
        if (isset($state_id)) {
            if ($state_id == 0) {
                $op2 = 'OR';
            } else {
                $op2 = 'AND';
            }
        }
        if (isset($city_id)) {
            if ($city_id == 0) {
                $op3 = 'OR';
            } else {
                $op3 = 'AND';
            }
        }
        $query = "SELECT webgifs.* FROM webgifs "
                . " INNER JOIN country_gif ON (webgifs.gifId = country_gif.gif_id_fk)"
                . " INNER JOIN states_gif ON (webgifs.gifId = states_gif.gif_id_fk)"
                . " INNER JOIN city_gif ON (webgifs.gifId = city_gif.gif_id_fk)"
                . " WHERE 1 = 1"
                . " AND country_gif.country_id_fk = $country_id"
                . " AND states_gif.states_id_fk = $state_id"
                . " AND city_gif.city_id_fk = $city_id"
                . " AND webgifs.gifstatus = '1' ORDER BY webgifs.gifId ASC";
            $result = $this->db->query($query);
            
            if ($result->num_rows() > 0) {
               
                return $result->result_array();
           
            } else {
                $query = "SELECT webgifs.* FROM webgifs WHERE webgifs.gifstatus = '1' AND webgifs.isGlobal = '1' ORDER BY webgifs.gifId ASC";
                $result = $this->db->query($query);
            
            if ($result->num_rows() > 0) {
               
                return $result->result_array();
           
                }else{
                    return FALSE;
                }
            }
    }
    public function getCityByName($cityName='')
    {
        $qry = "SELECT * FROM cities WHERE name LIKE '%$cityName%'";
        return $this->db->query($qry)->row_array();
    }
    public function getSlider($regions)
    {
        // $country_id = $state_id = $city_id;
        if ($regions['country_id'] == '') {
            $country_id = 0;
        }else{
            $country_id = $regions['country_id'];
            }
        if ($regions['state_id'] == '') {
            $state_id = 0;
        }else{
            $state_id = $regions['state_id'];
        }
        if ($regions['city_id'] == '') {
            $city_id = 0;
        }else{
            $city_id = $regions['city_id'];
        }
        $cityId = $city_id;
        
        if (isset($country_id)) {
            if ($country_id == 0) {
                $op1 = 'OR';
            } else {
                $op1 = 'AND';
            }
        }
        if (isset($state_id)) {
            if ($state_id == 0) {
                $op2 = 'OR';
            } else {
                $op2 = 'AND';
            }
        }
        if (isset($city_id)) {
            if ($city_id == 0) {
                $op3 = 'OR';
            } else {
                $op3 = 'AND';
            }
        }
        $query = "SELECT * FROM slider "
                . " INNER JOIN country_slider ON (slider.id = country_slider.slider_id_fk)"
                . " INNER JOIN states_slider ON (slider.id = states_slider.slider_id_fk)"
                . " INNER JOIN city_slider ON (slider.id = city_slider.slider_id_fk)"
                . " WHERE 1 = 1"
                . " AND country_slider.country_id_fk = $country_id"
                . " AND states_slider.states_id_fk = $state_id"
                . " AND city_slider.city_id_fk = $city_id"
                . " ORDER BY slider.id DESC";
                // var_dump($query); 
                $result = $this->db->query($query);
            
                if ($result->num_rows() > 0) {
                   
                    return $result->result_array();
               
                }else{
                    $query = "SELECT * FROM slider WHERE isGlobal='1' ORDER BY slider.id DESC";
                // var_dump($query); die;
                $result = $this->db->query($query);
                    if ($result->num_rows() > 0) {
                   
                    return $result->result_array();
               
                    }else{
                        return false;
                    }
                }
                
    }

    public function getpackages()
    {
        $query=$this->db->get('adspaymentpackages');
            if($query->num_rows() > 0 ){
            return  $query->result_array();
            // var_dump($return); die;
            }  else {
                return false;    
            }
    }
    public function getpackageid($cus_type)
    {      
        $this->db->where('customerType',$cus_type);
        $query=$this->db->get('adspaymentpackages');
              
              if($query->num_rows() > 0 ){
            return  $query->result_array();
            }  else {
                return false;    
            }
    }
    public function getpackageByid($id)
    {      
        $this->db->where('packageId',$id);
        $query=$this->db->get('adspaymentpackages');
              
              if($query->num_rows() > 0 ){
            return  $query->row_array();
            }  else {
                return false;    
            }
    }

    public function getShopByDept($value='')
    {
        $superArray = array();
        $menu =  $this->db->get('categories')->result_array();
        foreach ($menu as $menkey ) 
        {
            $catId = $menkey['ID'];
            $final['parentCat'][$menkey['cat_title']."-".$menkey['ID']."-".$menkey['Image']] = $this->db->join('categories', 'subcategories.cat_ID=categories.ID')->select('subcategories.*, categories.cat_title, categories.Image')->from('subcategories')->where(array('subcategories.isParent'=>'1', 'subcategories.cat_ID'=>$menkey['ID']))->get()->result_array();
             foreach ($final['parentCat'] as $parentkey => $parenyval)
             {
                foreach ($parenyval as $key => $value) 
                {
                    $superArray['subCat'][$value['ID'].'-'.$value['cat_ID'].'-'.$value['subcat_title'].'-'.$value['cat_title'].'-'.$value['Image']] = $this->db->join('categories', 'subcategories.cat_ID=categories.ID', 'left')->select('subcategories.*, categories.cat_title, categories.Image')->from('subcategories')->where(array('subcategories.isParent'=>'0', 'subcategories.cat_ID'=>$value['cat_ID'], 'subcategories.parentId'=>$value['ID']))->get()->result_array();
                    // $superArray[] = $superFinal; 
                } 
                      
             } 
            
        }  
                    // echo "<pre>";var_dump($superArray); die;
        return $superArray;
    }
}

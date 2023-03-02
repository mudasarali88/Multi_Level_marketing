<?php

class Ads_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }
    public function getAdsTitleByCrawler($keyword="", $catId=''){
        // var_dump($keyword); die();
       return $this->db->select('name')->from('ads')->where('cat_id_fk', $catId)->like('name', $keyword)->get()->result_array();
    }
    public function insertAds($data) {
        $query = $this->db->insert('ads', $data);
        // var_dump($this->db->last_query()); die();
        if ($query) {
            return $insert_id = $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function getAllCountries($term) {

        $query = "SELECT name as label FROM countries WHERE name LIKE '%" . $term . "%' ORDER BY name ASC";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getAllStates($term) {

        $query = "SELECT name as label FROM states WHERE name LIKE '%" . $term . "%' ORDER BY name ASC";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getAllCities($term) {

        $query = "SELECT name as label FROM cities WHERE name LIKE '%" . $term . "%' ORDER BY name ASC";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function insertCountry($insert, $arrCoun, $check) {
        if ($check == 1) {
            $this->db->delete('country_ads', array('ads_id_fk' => $insert));
        }
        $length = count($arrCoun);
        for ($i = 0; $i < $length; $i++) {
            $insertQuery = "insert into country_ads (ads_id_fk,country_id_fk)VALUES($insert,$arrCoun[$i])";
            $result = $this->db->query($insertQuery);
        }
    }

    public function insertStates($insert, $arrCoun, $check) {
        if ($check == 1) {
            $this->db->delete('states_ads', array('ads_id_fk' => $insert));
        }
        $length = count($arrCoun);
        for ($i = 0; $i < $length; $i++) {
            $insertQuery = "insert into states_ads (ads_id_fk,states_id_fk)VALUES($insert,$arrCoun[$i])";
            $result = $this->db->query($insertQuery);
        }
    }

    public function insertCity($insert, $arrCoun, $check) {
        if ($check == 1) {
            $this->db->delete('city_ads', array('ads_id_fk' => $insert));
        }
        $length = count($arrCoun);

        for ($i = 0; $i < $length; $i++) {
            $insertQuery = "insert into city_ads (ads_id_fk,city_id_fk)VALUES($insert,$arrCoun[$i])";
            $result = $this->db->query($insertQuery);
        }
    }

    public function insertContact($insert, $arrCoun, $type, $check) {
        if ($check == 1) {
            $this->db->delete('contact_list', array('ads_id_fk' => $insert, 'contact_type' => $type));
        }
        $length = count($arrCoun);

        for ($i = 0; $i < $length; $i++) {
            $insertQuery = "insert into contact_list (ads_id_fk,contact_number,contact_type)VALUES($insert,$arrCoun[$i],$type)";
            $result = $this->db->query($insertQuery);
        }
    }

    public function getAllAds() {

        $query = "SELECT ads.*,subcategories.subcat_title, categories.cat_title FROM `ads` inner JOIN categories ON (categories.ID=ads.cat_id_fk) inner JOIN subcategories ON (subcategories.ID=ads.sub_cat_id_fk)";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getAdsDetail($ID) {
        $query = "Select * from ads where ID=$ID";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getAdsCountry($ID) {
        $query = "select countries.* from country_ads INNER join countries on (countries.id=country_ads.country_id_fk) where country_ads.ads_id_fk=$ID";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getAdsStates($ID) {
        $query = "select states.* from states_ads INNER join states on (states.id=states_ads.states_id_fk) where states_ads.ads_id_fk=$ID";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getAdsCity($ID) {
        $query = "select cities.* from city_ads INNER join cities on (cities.id=city_ads.city_id_fk) where city_ads.ads_id_fk=$ID";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getAdsContact($ID) {
        $query = "Select * from contact_list where ads_id_fk=$ID";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function deleteAdd($ID) {
        $query = "delete from ads where ID=$ID";
        $delete = $this->db->query($query);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

    public function getTopCountry() {
        $query = "Select * from countries";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getCountryList($country) {
        $query = "Select * from countries where name like '%$country%' ";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getStatesWithCountry($list) {
        $query = "Select * from states where country_id in ($list) ";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getCitiesWithStates($list) {
        $query = "Select * from cities where state_id in ($list) ";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function adsexistByID($id) {
        $query = "Select * from ads where id =$id ";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    public function getContactList($id) {
        $query = "Select * from contact_list where ads_id_fk =$id ";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getStateList($id) {
        $query = "Select states.name as name ,states_ads.states_id_fk as id from states_ads INNER join states on(states.id=states_ads.states_id_fk) where states_ads.ads_id_fk =$id ";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getCityList($id) {
        $query = "Select cities.name as name ,city_ads.city_id_fk as id from city_ads INNER join cities on(cities.id=city_ads.city_id_fk) where city_ads.ads_id_fk =$id ";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function getCountriesList($id) {
        // var_dump($id); die;
        $query = "Select countries.name as name ,country_ads.country_id_fk as id from country_ads INNER join countries on(countries.id=country_ads.country_id_fk) where country_ads.ads_id_fk =$id ";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function updateAds($data, $id) {
        $query = $this->db->where('id', $id);
        $this->db->update('ads', $data);
    }

    public function changesStatue($data, $id) {
        // echo $data;
        if ($data == 0) {
            $data = 1;
        } else {
            $data = 0;
        }
        $query = "update ads set status=$data where id =$id ";
        $result = $this->db->query($query);
    }


    public function getProductsCountByCatID($catId='', $regions) {
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
        
        //////
        $query = "SELECT ads.id FROM ads"
                    . " INNER JOIN categories ON (categories.ID=ads.cat_id_fk)"
                    . " INNER JOIN country_ads ON (ads.id = country_ads.ads_id_fk)"
                    . " INNER JOIN states_ads ON (ads.id = states_ads.ads_id_fk)"
                    . " INNER JOIN city_ads ON (ads.id = city_ads.ads_id_fk)"
                    . " WHERE 1 = 1"
                    . " AND country_ads.country_id_fk = $country_id"
                    . " AND states_ads.states_id_fk = $state_id"
                    . " AND city_ads.city_id_fk = $city_id"
                    . " AND ads.status = 1 AND ads.cat_id_fk = $catId";
                    $result = $this->db->query($query);
                    if ($result->num_rows() > 0) {
                        
                        return $result->num_rows();
                    }else{
                        $query = "SELECT ads.id FROM ads INNER JOIN categories ON (categories.ID=ads.cat_id_fk) WHERE ads.cat_id_fk = $catId AND ads.status='1' AND ads.isGlobal='1'";
                        $result = $this->db->query($query);
                        if ($result->num_rows() > 0) {
                    // var_dump($result->num_rows()); die;
                        return $result->num_rows();
                        }else{
                            return false;
                        }
                    }
        /////////

    }
    public function getProductsCountByCatIDTitle($catId='', $title, $regions) {
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
        
        //////
        $query = "SELECT ads.id FROM ads"
                    . " INNER JOIN categories ON (categories.ID=ads.cat_id_fk)"
                    . " INNER JOIN country_ads ON (ads.id = country_ads.ads_id_fk)"
                    . " INNER JOIN states_ads ON (ads.id = states_ads.ads_id_fk)"
                    . " INNER JOIN city_ads ON (ads.id = city_ads.ads_id_fk)"
                    . " WHERE 1 = 1"
                    . " $op1 country_ads.country_id_fk = $country_id"
                    . " $op2 states_ads.states_id_fk = $state_id"
                    . " $op3 city_ads.city_id_fk = $city_id"
                    . " AND ads.status = 1 AND ads.cat_id_fk = $catId"
                    . " AND ads.status = 1 AND ads.name LIKE '%$title%'";
                    // var_dump($query); die;
                    $result = $this->db->query($query);
                    if ($result->num_rows() > 0) {
                        
                        return $result->num_rows();
                    }else{
                        $query = "SELECT ads.id FROM ads INNER JOIN categories ON (categories.ID=ads.cat_id_fk) WHERE ads.cat_id_fk = $catId AND ads.status='1' AND ads.isGlobal='1' AND ads.name LIKE '%$title%'";
                        $result = $this->db->query($query);
                        if ($result->num_rows() > 0) {
                        return $result->num_rows();
                        }else{
                            return false;
                        }
                    }
        /////////

    }
    public function getAdsCountBysubCatID($subcatId='', $regions) {
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
        
        //
        $query = "SELECT ads.id FROM ads"
                    . " INNER JOIN subcategories ON (subcategories.ID=ads.sub_cat_id_fk)"
                    . " INNER JOIN country_ads ON (ads.id = country_ads.ads_id_fk)"
                    . " INNER JOIN states_ads ON (ads.id = states_ads.ads_id_fk)"
                    . " INNER JOIN city_ads ON (ads.id = city_ads.ads_id_fk)"
                    . " WHERE 1 = 1"
                    . " AND country_ads.country_id_fk = $country_id"
                    . " AND states_ads.states_id_fk = $state_id"
                    . " AND city_ads.city_id_fk = $city_id"
                    . " AND ads.status = 1 AND ads.sub_cat_id_fk = $subcatId";
                    $result = $this->db->query($query);
                    if ($result->num_rows() > 0) {
                        
                        return $result->num_rows();
                    }else{
                        $query = "SELECT ads.id FROM ads INNER JOIN subcategories ON (subcategories.ID=ads.sub_cat_id_fk) WHERE ads.sub_cat_id_fk = $subcatId AND ads.status='1' AND ads.isGlobal='1'";
                        $result = $this->db->query($query);
                        if ($result->num_rows() > 0) {
                    // var_dump($result->num_rows()); die;
                        return $result->num_rows();
                        }else{
                            return false;
                        }
                    }
        ////

    }
    public function getProductsByCatID($limit,$start,$ID, $regions)
    {
        // var_dump()
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
        
        $query = "SELECT ads.*,categories.ID,categories.cat_title FROM ads"
                    . " INNER JOIN categories ON (categories.ID=ads.cat_id_fk)"
                    . " INNER JOIN country_ads ON (ads.id = country_ads.ads_id_fk)"
                    . " INNER JOIN states_ads ON (ads.id = states_ads.ads_id_fk)"
                    . " INNER JOIN city_ads ON (ads.id = city_ads.ads_id_fk)"
                    . " WHERE 1 = 1"
                    . " AND country_ads.country_id_fk = $country_id"
                    . " AND states_ads.states_id_fk = $state_id"
                    . " AND city_ads.city_id_fk = $city_id"
                    . " AND ads.status = 1 AND ads.cat_id_fk = $ID LIMIT $start, $limit";
                    // var_dump($query); die;
                    $result = $this->db->query($query);
                    if ($result->num_rows() > 0) {
                        
                        return $result->result_array();
                    }else{
                        $query = "SELECT ads.*,categories.ID,categories.cat_title FROM ads INNER JOIN categories ON (categories.ID=ads.cat_id_fk) WHERE ads.cat_id_fk = $ID AND ads.status='1' AND ads.isGlobal=1 LIMIT $start, $limit";
                        // var_dump($query); die;
                        $result = $this->db->query($query);
                        if ($result->num_rows() > 0) {
                        return $result->result_array();
                        }else{
                            return false;
                        }
                    }
        /////////
    }
    public function getProductsByCatIDTitle($limit,$start,$ID, $title, $regions)
    {
        // var_dump()
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
        
        $query = "SELECT ads.*,categories.ID,categories.cat_title FROM ads"
                    . " INNER JOIN categories ON (categories.ID=ads.cat_id_fk)"
                    . " INNER JOIN country_ads ON (ads.id = country_ads.ads_id_fk)"
                    . " INNER JOIN states_ads ON (ads.id = states_ads.ads_id_fk)"
                    . " INNER JOIN city_ads ON (ads.id = city_ads.ads_id_fk)"
                    . " WHERE 1 = 1"
                    . " $op1 country_ads.country_id_fk = $country_id"
                    . " $op2 states_ads.states_id_fk = $state_id"
                    . " $op3 city_ads.city_id_fk = $city_id"
                    . " AND ads.status = 1 AND ads.cat_id_fk = $ID AND ads.name LIKE '%$title%' LIMIT $start, $limit";
                    // var_dump($query); die;
                    $result = $this->db->query($query);
                    if ($result->num_rows() > 0) {
                        
                        return $result->result_array();
                    }else{
                        $query = "SELECT ads.*,categories.ID,categories.cat_title FROM ads INNER JOIN categories ON (categories.ID=ads.cat_id_fk) WHERE ads.cat_id_fk = $ID AND ads.status='1' AND ads.isGlobal=1 AND ads.name LIKE '%$title%' LIMIT $start, $limit";
                        // var_dump($query); die;
                        $result = $this->db->query($query);
                        if ($result->num_rows() > 0) {
                        return $result->result_array();
                        }else{
                            return false;
                        }
                    }
        /////////
    }
    public function getProductsBysubCatID($limit,$start,$ID, $regions)
    {
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
        
        ///
        $query = "SELECT ads.*, subcategories.ID, subcategories.subcat_title FROM ads"
                    . " INNER JOIN subcategories ON (ads.sub_cat_id_fk=subcategories.ID)"
                    . " INNER JOIN country_ads ON (ads.id = country_ads.ads_id_fk)"
                    . " INNER JOIN states_ads ON (ads.id = states_ads.ads_id_fk)"
                    . " INNER JOIN city_ads ON (ads.id = city_ads.ads_id_fk)"
                    . " WHERE 1 = 1"
                    . " AND country_ads.country_id_fk = $country_id"
                    . " AND states_ads.states_id_fk = $state_id"
                    . " AND city_ads.city_id_fk = $city_id"
                    . " AND ads.status = 1 AND ads.sub_cat_id_fk = $ID LIMIT $start, $limit";
                    // var_dump($query); die;
                    $result = $this->db->query($query);
                    if ($result->num_rows() > 0) {
                        
                        return $result->result_array();
                    }else{
                        $query = "SELECT ads.*, subcategories.ID,subcategories.subcat_title,subcategories.ID,subcategories.subcat_title FROM ads INNER JOIN subcategories ON (subcategories.ID=ads.sub_cat_id_fk) WHERE ads.sub_cat_id_fk = $ID AND ads.status='1' AND ads.isGlobal='1' LIMIT $start, $limit";
                        $result = $this->db->query($query);
                        if ($result->num_rows() > 0) {
                        return $result->result_array();
                        }else{
                            return false;
                        }
                    }
        ////
    }

}

?>
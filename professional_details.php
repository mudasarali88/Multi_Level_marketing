<?php require_once('inc/header.php');?>
<?php require_once('inc/side.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Profile
        
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content">
         <div class="panel panel-default">
         <div class="panel-body">
             <?php
            $session_username = $_SESSION["username"];
             if(isset($_POST['Submit']))
             {
                $institution_name=$_POST['edu_institutename'];
                $degree=$_POST['education'];
                $city=$_POST['edu_city'];
                $state=$_POST['edu_state'];
                $country=$_POST['edu_country'];
                $year_of_education=$_POST['edu_yop'];
                $type_of_companay=$_POST['occ_type'];
                $company=$_POST['occ_company'];
                $occ_city=$_POST['occ_city'];
                $occ_state=$_POST['occ_state'];
                $occ_country=$_POST['occ_country'];
                $job_description=$_POST['occ_jobdesc'];
                $other_career_info=$_POST['occ_careerinfo'];
                $skills=$_POST['occ_skills'];
             

         $sql = "INSERT INTO users (`institue_name`,`degree`,`ins_city`,`ins_state`,`ins_country`,`year_grad`,`ind`,
           `com_name`,`ind_city`,`ind_state`,`ind_country`,`job_des`,`career_info`,`skills` )
                VALUES ( '$institution_name','$degree','$city','$state','$country','$year_of_education','$type_of_companay',
                '$company','$occ_city','$occ_state','$occ_country','$job_description','$other_career_info','$skills') WHERE username='$session_username'";
               $run=mysqli_query($con,$sql);    
            
             }
             $sql3="SELECT * from users where username='$session_username'";
             $run=mysqli_query($con,$sql3);
             $row=mysqli_fetch_array($run);

             $institution_name = $row['institue_name'];
             $degree=$row['degree'];
             $city=$row['ins_city'];
             $state=$row['ins_state'];
             $country=$row['ins_country'];
             $year_of_education=$row['year_grad'];
             $type_of_companay=$row['ind'];
             $company=$row['com_name'];
             $occ_city=$row['ind_city'];
             $occ_state=$row['ind_state'];
             $occ_country=$row['ind_country'];
             $job_description=$row['job_des'];
             $other_career=$row['career_info'];
             $skills=$row['skills'];

             $update_qry="UPDATE `users` SET  institute_name='$institution_name', $degree=`degree`,$city=`ins_city`, $state=`ins_state`, 
             $country=`ins_country`,$year_of_education=`year_grad`,$type_of_companay=`ind`,
             $company=`com_name`,$occ_city=`ind_city`,$occ_state=`ind_state`,$occ_country=`ind_country`,$job_description=`job_des`,$other_career=`career_info`,$skills=`skills`
              WHERE username = '$session_username'";

             ?>
    
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
        <ul class="nav nav-tabs" role="tablist">
            <li><a href="basic_details.php">Basic</a></li>
            <li  class="active"><a href="professional_details.php">Professional</a></li>
             <li ><a href="subscriptions.php">Subscriptions</a></li>
            <li ><a href="account_settings.php">Account Settings</a></li>
        </ul>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 voffset-2 ">
        You can edit your details below
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 voffset-2 ">
        Fields marked with <span class="mandatory_block">*</span>  are mandatory
    </div>
    <form action="professional_details.php" class="voffset-2" method="post" >
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 voffset-2 ">
            <h3>Education</h3> 
            <div class="form-group">
                <label for="edu_institutename"><span class="mandatory_block">*</span>&nbsp;Institution Name</label>
                <input class="form-control" name="edu_institutename" type="text" id="edu_institutename" placeholder="Institution Name" maxlength="30" value="<?php echo $institution_name?>">
            </div>
            <div class="form-group">
                <label for="education">Degree</label>
                <input class="form-control"  name="education" type="text" id="education" placeholder="Degree"  maxlength="30" value="<?php echo $degree?>">
            </div>
            <div class="form-group">
                <label for="edu_city"><span class="mandatory_block">*</span>City</label>
                <input class="form-control"  name="edu_city" type="text" id="edu_city" placeholder="City" maxlength="30" value="<?php echo $city?>">
            </div>
            <div class="form-group">
                <label for="edu_state">State</label>
                <input class="form-control" name="edu_state" type="text" id="edu_state" placeholder="State" maxlength="30" value="<?php echo $state?>">
            </div>
            <div class="form-group">
                <label for="edu_country"><span class="mandatory_block">*</span>Country</label>
                <select id="edu_country" name="edu_country" class="form-control selectpicker" data-live-search="true">
                    <option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Ascension Island">Ascension Island</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia">Bosnia</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde Islands">Cape Verde Islands</option><option value="Cayman Islands">Cayman Islands</option><option value="Central Africa Republic">Central Africa Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Columbia">Columbia</option><option value="Comoros Island">Comoros Island</option><option value="Congo">Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Democratic Republic of Congo (Zaire)">Democratic Republic of Congo (Zaire)</option><option value="Denmark">Denmark</option><option value="Diego Garcia">Diego Garcia</option><option value="Djibouti">Djibouti</option><option value="Dominica Islands">Dominica Islands</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Faeroe Islands">Faeroe Islands</option><option value="Falkland Islands">Falkland Islands</option><option value="Fiji Islands">Fiji Islands</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="Gabon">Gabon</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guinea Bissau">Guinea Bissau</option><option value="Guinea Republic">Guinea Republic</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Ivory Coast">Ivory Coast</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Korea North">Korea North</option><option value="Korea South">Korea South</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="latvia">latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia (Fyrom)">Macedonia (Fyrom)</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives Republic">Maldives Republic</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Mariana Islands">Mariana Islands</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritius">Mauritius</option><option value="Mayotte Islands">Mayotte Islands</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar (Burma)">Myanmar (Burma)</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue Island">Niue Island</option><option value="Norfolk Island">Norfolk Island</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion Island">Reunion Island</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Samoa (American)">Samoa (American)</option><option value="Samoa (Western)">Samoa (Western)</option><option value="San Marino">San Marino</option><option value="Sao Tome & Principe">Sao Tome & Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovak Republic">Slovak Republic</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="St Helena">St Helena</option><option value="St Kitts & Nevia">St Kitts & Nevia</option><option value="St Lucia">St Lucia</option><option value="Sudan">Sudan</option><option value="Surinam">Surinam</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="The Gambia">The Gambia</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad &  Tobago">Trinidad &  Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks & Caicos Islands">Turks & Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Wallis & Futuna Islands">Wallis & Futuna Islands</option><option value="Yemen Arab Republic">Yemen Arab Republic</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>
                </select>
            </div>
            <div class="form-group">
                <label for="edu_yop">Year of Graduation</label>
                <input  class="form-control" name="edu_yop" type="text" placeholder="Year of Graduation" id="edu_yop" maxlength="30" value="<?php echo $year_of_education?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 voffset-2 ">
            <h3>Occupation</h3>
            <div class="form-group">
                <label for="occ_type">Type of Industry</label>
                <select name="occ_type" id="occ_type" class="form-control selectpicker" data-live-search="true">
                    <option value="Advertising/Marketing/PR">Advertising/Marketing/PR</option><option value="Agriculture">Agriculture</option><option value="Arts">Arts</option><option value="Construction">Construction</option><option value="Consumer Goods">Consumer Goods</option><option value="Corporate Services">Corporate Services</option><option value="Education (includes students)">Education (includes students)</option><option value="Finance/Insurance">Finance/Insurance</option><option value="Government/Military">Government/Military</option><option value="IT/ITES">IT/ITES</option><option value="Legal">Legal</option><option value="Manufacturing">Manufacturing</option><option value="Media/Publishing/Entertainment">Media/Publishing/Entertainment</option><option value="Medical/Pharma/Health Care">Medical/Pharma/Health Care</option><option value="Non-Profit">Non-Profit</option><option value="Recreation">Recreation</option><option value="Scientific">Scientific</option><option value="Service Industry">Service Industry</option><option value="Telecom/Networking">Telecom/Networking</option><option value="Travel/Transportation">Travel/Transportation</option>
                </select>
            </div>
            <div class="form-group">
                <label for="occ_company">Company Name</label>
                <input  class="form-control" placeholder="Company Name" name="occ_company" type="text" id="occ_company" maxlength="30" value="<?php echo $company?>">
            </div>
            <div class="form-group">
                <label for="occ_city">City</label>
                <input class="form-control"  name="occ_city" placeholder="City" type="text" id="occ_city" maxlength="30" value="<?php echo $occ_city?>">
            </div>
            <div class="form-group">
                <label for="occ_state">State</label>
                <input class="form-control"  name="occ_state" placeholder="State" type="text" id="occ_state" maxlength="30" value="<?php echo $occ_state?>">
            </div>
            <div class="form-group">
                <label for="occ_country"><span class="mandatory_block">*</span>Country</label>
                <select id="occ_country"  name="occ_country" placeholder="Country" class="form-control selectpicker span2" data-live-search="true">
                    <option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Ascension Island">Ascension Island</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia">Bosnia</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde Islands">Cape Verde Islands</option><option value="Cayman Islands">Cayman Islands</option><option value="Central Africa Republic">Central Africa Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Columbia">Columbia</option><option value="Comoros Island">Comoros Island</option><option value="Congo">Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Democratic Republic of Congo (Zaire)">Democratic Republic of Congo (Zaire)</option><option value="Denmark">Denmark</option><option value="Diego Garcia">Diego Garcia</option><option value="Djibouti">Djibouti</option><option value="Dominica Islands">Dominica Islands</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Faeroe Islands">Faeroe Islands</option><option value="Falkland Islands">Falkland Islands</option><option value="Fiji Islands">Fiji Islands</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="Gabon">Gabon</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guinea Bissau">Guinea Bissau</option><option value="Guinea Republic">Guinea Republic</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Ivory Coast">Ivory Coast</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Korea North">Korea North</option><option value="Korea South">Korea South</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="latvia">latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia (Fyrom)">Macedonia (Fyrom)</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives Republic">Maldives Republic</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Mariana Islands">Mariana Islands</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritius">Mauritius</option><option value="Mayotte Islands">Mayotte Islands</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar (Burma)">Myanmar (Burma)</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue Island">Niue Island</option><option value="Norfolk Island">Norfolk Island</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion Island">Reunion Island</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Samoa (American)">Samoa (American)</option><option value="Samoa (Western)">Samoa (Western)</option><option value="San Marino">San Marino</option><option value="Sao Tome & Principe">Sao Tome & Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovak Republic">Slovak Republic</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="St Helena">St Helena</option><option value="St Kitts & Nevia">St Kitts & Nevia</option><option value="St Lucia">St Lucia</option><option value="Sudan">Sudan</option><option value="Surinam">Surinam</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="The Gambia">The Gambia</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad &  Tobago">Trinidad &  Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks & Caicos Islands">Turks & Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Wallis & Futuna Islands">Wallis & Futuna Islands</option><option value="Yemen Arab Republic">Yemen Arab Republic</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>
                </select>
            </div>
            <div class="form-group">
                <label for="occ_jobdesc">Job Description</label>
                <textarea class="form-control" rows="3" name="occ_jobdesc" placeholder="Job Description"><?php echo $job_description?></textarea>
            </div>
            <div class="form-group">
                <label for="occ_careerinfo">Other Career info</label>
                <textarea class="form-control" rows="3" name="occ_careerinfo" placeholder="Other Career info" ><?php echo $other_career?></textarea>
            </div>
            <div class="form-group">
                <label for="occ_skills">Skills</label>
                <textarea class="form-control" rows="3" name="occ_skills" placeholder="Skills" ><?php echo $skills?></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input class="btn btn-success btn-block" type="submit" name="Submit" value="Save">
        </div>
    </form>
</div>
</div>
</div>        <br />
        <br />
        <br />
        <br />
        <br />


    </section>
  </div>
  <!-- /.content-wrapper -->
  

<?php require_once('inc/footer.php');?>
<?php require_once('inc/header.php');?>
<?php require_once('inc/side.php'); ?>
<?php //require_once('login_fun.php');
$userData = getUserData();
ob_start();

 if(isset($_POST['save'])){
         $userUpdate = userUpdate();    

}
 
         

  
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Profile
        
      </h1>
      
    </section>

    <!-- Main content -->
    <?php //var_dump($userData); ?>
    <section class="content">
         <div class="panel panel-default">
         <div class="panel-body">
         
                     
    <div class='row'>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="basic_details.php">Settings</a></li>
            <!-- <li ><a href="professional_details.php">Professional</a></li> -->
             <!-- <li ><a href="subscriptions.php">Subscriptions</a></li> -->
            <!-- <li ><a href="account_settings.php">Account Settings</a></li> -->
        </ul>
    </div>  

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 voffset-2">
        <span>You can edit your details below</span>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 voffset-2">
        Fields marked with <span class="mandatory_block">*</span>&nbsp;are mandatory
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <font color="#FF0000"></font>
    </div>
    <form action="basic_details.php" class="voffset-2" enctype="multipart/form-data" method="post">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
            <div class="form-group">
                <label for="firstname"><span class="mandatory_block">*</span>&nbsp;First name</label>
                <input class="form-control" name="firstname" required type="text"  placeholder="First name"  maxlength="30" value="<?=$userData['FirstName']?>">
            </div>
            <div class="form-group">
                <label for="lastname"><span class="mandatory_block">*</span>&nbsp;Last name</label>
                <input class="form-control" name="lastname" type="text" required placeholder="Last name" maxlength="30"  value="<?=$userData['LastName']?>">
            </div>
            <div class="form-group">
                <label>Email</label><br>
                <input class="form-control" readonly name="email" type="text" required placeholder="Last name" maxlength="30"  value="<?=$userData['Email']?>">
                <!-- <input type="file" name="img"> -->

            </div>
            <div class="form-group">
                <label>Telephone</label><br>
                <input class="form-control" name="Telephone" type="text" required placeholder="Last name" maxlength="30"  value="<?=$userData['Telephone']?>">
                <!-- <input type="file" name="img"> -->

            </div>
            <div class="form-group">
                <label class="control-label"><span style="color:red;">*</span>&nbsp; Birthday</label>
                <div class="input-group date" id="datetimePicker">
                    <input type="text"  class="form-control" required data-date-format="MM/DD/YYYY" name="dob" value="<?=$userData['dob']?>">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="address"><span class="mandatory_block">*</span>&nbsp;Address</label>
                <input class="form-control" name="address" required type="text" maxlength="100" placeholder="Address" value="<?=$userData['Address']?>">
                <!-- <input class="form-control" name="address" type="text" maxlength="100" placeholder="Address" value=""> -->
            </div>
            <div class="form-group">
                <label>Upload Photo</label><br>
                <input type="file" name="img">

            </div>
            <div class="form-group form-inline">
                <label for="male"><span class="mandatory_block">*</span>&nbsp;Gender</label>
                <div class="radio">
                    <label>
                        <input id="male" type="radio" name="gender" value="Male" <?=($userData['gender'] == 'Male'?'selected':'')?>  checked />Male &nbsp;&nbsp;&nbsp;
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="gender" value="female" <?=($userData['gender'] == 'Female'?'selected':'')?>  /> Female
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="gender" value="female" <?=($userData['gender'] == 'Others'?'selected':'')?>  /> Others
                    </label>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="country"><span class="mandatory_block">*</span>&nbsp;Country</label>
                <select name="country" required id="country" onchange="return getState(this.value, '');" class="form-control selectpicker span2" data-live-search="true" >
                    <option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Ascension Island">Ascension Island</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia">Bosnia</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde Islands">Cape Verde Islands</option><option value="Cayman Islands">Cayman Islands</option><option value="Central Africa Republic">Central Africa Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Columbia">Columbia</option><option value="Comoros Island">Comoros Island</option><option value="Congo">Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Democratic Republic of Congo (Zaire)">Democratic Republic of Congo (Zaire)</option><option value="Denmark">Denmark</option><option value="Diego Garcia">Diego Garcia</option><option value="Djibouti">Djibouti</option><option value="Dominica Islands">Dominica Islands</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Faeroe Islands">Faeroe Islands</option><option value="Falkland Islands">Falkland Islands</option><option value="Fiji Islands">Fiji Islands</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="Gabon">Gabon</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guinea Bissau">Guinea Bissau</option><option value="Guinea Republic">Guinea Republic</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Ivory Coast">Ivory Coast</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Korea North">Korea North</option><option value="Korea South">Korea South</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="latvia">latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia (Fyrom)">Macedonia (Fyrom)</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives Republic">Maldives Republic</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Mariana Islands">Mariana Islands</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritius">Mauritius</option><option value="Mayotte Islands">Mayotte Islands</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar (Burma)">Myanmar (Burma)</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue Island">Niue Island</option><option value="Norfolk Island">Norfolk Island</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option SELECTED value="Pakistan" selected>Pakistan</option><option value="Palau">Palau</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion Island">Reunion Island</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Samoa (American)">Samoa (American)</option><option value="Samoa (Western)">Samoa (Western)</option><option value="San Marino">San Marino</option><option value="Sao Tome & Principe">Sao Tome & Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovak Republic">Slovak Republic</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="St Helena">St Helena</option><option value="St Kitts & Nevia">St Kitts & Nevia</option><option value="St Lucia">St Lucia</option><option value="Sudan">Sudan</option><option value="Surinam">Surinam</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="The Gambia">The Gambia</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad &  Tobago">Trinidad &  Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks & Caicos Islands">Turks & Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Wallis & Futuna Islands">Wallis & Futuna Islands</option><option value="Yemen Arab Republic">Yemen Arab Republic</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>
                </select>
            </div>
            <div class="form-group">
                <label for="state"><span class="mandatory_block">*</span>&nbsp;State</label>
                <div id="statelistid">
                    <select id="state" required value="pakistan" name="state" class="form-control selectpicker span2" data-live-search="true"><option value="Balochistan">Balochistan</option><option value="KPK">KPK</option><option value="Punjab" selected>Punjab</option><option value="Sindh">Sindh</option></select>
                </div>
            </div>
            <div class="form-group">
                <label for="city"><span class="mandatory_block">*</span>&nbsp;City</label>
                <input class="form-control" required  name="city" type="text" placeholder="City" value="<?=$userData['City']?>">
            </div>


            <div class="form-group">
                <label for="pincode">ZIP/PIN Code</label>
                <input class="form-control" name="pincode" type="text" maxlength="30" value="<?=$userData['ZipCode']?>">
            </div>
            <div class="form-group">
                <label for="languages_spoken">Description</label>
                <textarea class="form-control" name="description" rows="10"><?=$userData['description']?></textarea>
            </div>
            
            
            <!-- <div class="form-group">
                <label for="emailid1">Facebook URL</label>
                <input class="form-control" name="fb" type="url" id="emailid1" maxlength="150" value="<?php echo $facebook_db; ?>">
            </div>
            <div class="form-group">
                <label for="emailid2">Twitter URL</label>
                <input class="form-control" name="twitter" type="url" id="emailid2" maxlength="150" value="<?php echo $twitter_db; ?>">
            </div> -->
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix ">
            <input class="btn btn-success btn-block" type="submit" name="save" value="Save">
        </div>
    </form>
</div></div>
</div>        <br />
        <br />
        <br />
        <br />
        <br />            

    </section>
  </div>
  <!-- /.content-wrapper -->
  


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  

<?php require_once('inc/footer.php');?>
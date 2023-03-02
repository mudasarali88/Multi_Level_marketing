<?php require_once('inc/connect.php');
$allPlans = getAllPlans();
// $allPackage = getAllPackages();
// var_dump(getAllPlans()); die;
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User panel| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>        

<style>
    .panel{
        margin-top:20px;
        -webkit-box-shadow: 0px 4px 10px -3px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 4px 10px -3px rgba(0,0,0,0.75);
        box-shadow: 0px 4px 10px -3px rgba(0,0,0,0.75);
            }
  
    body{
        background-image:url("images/Login-wallpapers.jpg");
        background-repeat:no-repeat; 
        background-position:center; 
        height: 100%; padding:10px;}
</style>
    <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
 <body>            
<?php

if(isset($_POST['submit'])){
  $error = registerNewUser();

}
?>

      <div class="row">
          <div class="col-sm-2 "></div>
        <div class="col-sm-8">
         <div class="panel panel-default">
          <div class="panel-heading text-center"><h2>Register New Account</h2></div>
          <?php    
                 if(isset($error)){
                  echo "<span  class='pull-right' style='color:red'>$error</span>"; }
                    ?>
            <div class="panel-body" >
              <div class="row">
                <div class="col-md-12">
                  <div class = "container">
                        <form class="form-horizontal" action="" method="post" onsubmit="Validate()">
  
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="firstname">First Name:</label>
                              <div class="col-sm-8">
                         
                                <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="fname" required value="<?=$_POST['fname']?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="lname">  Last Name:</label>
                               <div class="col-sm-8">
                               <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" required value="<?=$_POST['lname']?>">
                             </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="lname">  Gender:</label>
                              <div class="col-sm-8">
                                <input type="radio" name="gender" value="Male"  <?=($_POST['gender']=='Male'?'checked':'checked')?>> Male
                                <input type="radio" name="gender" value="Female"  <?=($_POST['gender']=='Female'?'checked':'')?>> Female
                                <input type="radio" name="gender" value="Others"  <?=($_POST['gender']=='Others'?'checked':'')?>> Others
                              </div>
                            </div>
                           <div class="form-group">
                            <label class="control-label col-sm-2" for="lname">  Birthday:</label>
                            <div class="col-sm-8">
                              <div class="row">
                                <div class="col-md-12">
                                  <input  name="dob" id="tbDate" type="date" class="form-control datepicker" required value="<?=$_POST['dob']?>"><br />
                                </div>
                              </div>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="control-label col-sm-2" for="lname"> Phone Number:</label>
                             <div class="col-sm-8">
                              <div class="row">
                             <div class="col-md-4">
                               <input class="form-control" id="phone" name="phonenumber" type="number" required value="<?=$_POST['phonenumber']?>" >
                             </div>
                             <div class="col-md-4"></div>
                           </div>
                          </div>
                          </div>
                         <div class="form-group">
                          <label class="control-label col-sm-2" for="lname">  Email:</label>
                           <div class="col-sm-8">
                           <div class="row">
                             <div class="col-md-6">
                               
                               <input type="text" name="email" placeholder="email.." class="form-control" required value="<?=$_POST['email']?>">
                             </div>
                           </div>
                               <hr>
                         </div>
                             
                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-2" for="website">Tree Node:</label>
                        <div class="col-sm-8">
                          <select  class="form-control" id="treeNodeSide" name="treeNodeSide" required value="<?=$_POST['treeNodeSide']?>">
                            <option value="left">Left</option>
                            <option value="right">Right</option>
                          </select>
                        </div>
                      </div>      
                          <!--username-->
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Password:</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                        </div>
                      </div>
                          <!--password-->
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="reppassword">Retype Password:</label>
                        <div class="col-sm-8">
                          
                          <input type="password" class="form-control" id="confirm_password" placeholder="Retype Password" name="confirm_password" required>
                             <hr>
                        </div>
                          
                      </div>
                          <!--retype password-->
                          <!---sponsor-->
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="sponsor">Sponsor:</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" id="sponsor" placeholder="Refferal ID" name="sponsor" value="<?=$_POST['sponsor']?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2" for="plan">Select Plan:</label>
                        <div class="col-md-8">
                          <select name="splan" class="form-control" id="plan" required>
                            <option value="">Select Plan</option>
                              <?PHP
                              foreach ($allPlans as $rows) {
                                      $selectplan=$rows['cat_title'];
                                      $planId=$rows['ID'];
                              ?>
                              <option value="<?php echo @$planId;  ?>" > <?php echo @$selectplan;?></option>
                              <?php
                              }
                              ?>
                            </select> 
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2" for="plan">Select Package:</label>
                        <div class="col-md-8">
                          <select name="spackage" class="form-control" id="package" required >
                            <option value="">Select Package</option>
                          </select>
                        </div>
                      </div>
                      <div class="text-center">
                          <input type="submit" name="submit" class="btn btn-success" value="Register"> 
                          <a class="btn btn-warning" href="index.php" style="color:white;"> Login </a>
                      </div>
                
                    </form>
                  </div> 
                </div>
              </div>   
            </div>
          </div>   
        </div>
    </body>
  </html>
  <script>
    $(function(){
        $('#plan').change(function(){
          var catId = $(this).val();
          $.post('ajaxfunc.php', {catId:catId}, function(resp){
            resp = $.parseJSON(resp);
            $('#package').html('');
            // $('#package').html('');
            $('#package').html(resp.data);
          // alert(catId);
          }); //post
        })
    }); // onload
  </script>
    



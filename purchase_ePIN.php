<?php require_once('inc/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require_once('inc/side.php'); ?>
<?php require_once('login_fun.php');
  ob_start();
  if (!isset($_SESSION["username"]) ) {
       header('location:index.php');
  	}
   $user_id =$_SESSION["Distributer_id"];
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Purchase ePIn
        
      </h1>
    </section>
    <?php

      if(isset($_POST['submit']))
      {
             // echo $user_id = $_POST['Distributor_id'];
               $noofpins = $_POST['noofpins'];
               $selectedPlans = $_POST['selectedPlans'];
               $inputdate = $_POST['inputdate'];
      $mysqli = "INSERT INTO `purchase` (`user_id`,`ePIN_password`,`Plan`,`Purchase Date`) VALUES('$user_id','$noofpins','$selectedPlans','$inputdate')";
      $run = mysqli_query($con,$mysqli);
      
      }
    ?>
    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="panel panel-body">
                   <form method="post" name="form_epin" id="form_epin">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input type="hidden" name="submit_form" value="1"/>
         <span id="pincost_value" style="display: none">0</span>
            <span id="acbal" style="display: none">0.000</span>
            <div class="form-group">
                
            </div>
                        <div class="form-group">
                <label for="selectedPlansID">Distributor Plan</label>
                <select class="form-control" name="selectedPlans" id="selectedPlansID" onchange="return getCost(this.value, '');" >
                    <option value="">Select Plan</option>
                                        <option>Basic Plan $200</option>
                                        <option>Silver Plan $400</option>
                                        <option>Gold Plan $800</option>
                                        <option>platinum Plan $1000</option>
                                        <option>premium Plan $1600</option>
                                    </select>
            </div>
                  
            <div class="form-group">
                <label for="noofpins">ePIN Password</label>
                <input name="noofpins" class="form-control" maxlength="5"  type="password"  id="noofpins" placeholder="ePIN Paswword"><br>
                <label for="Date">Purchase Date</label>
                <input name="inputdate" class="form-control" maxlength="5"  type="Date"  id="Date" placeholder="">
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Purchase" onclick="checkformpin()"/>
            <input type="reset" name="reset" class="btn btn-warning"  value="Cancel"/>
        </div>
    </form>
            </div>
         </div>
        </div>
    </section>
  </div>
 <?php require_once('inc/footer.php');?>
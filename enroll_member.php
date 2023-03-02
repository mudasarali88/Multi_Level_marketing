<?php require_once('inc/header.php');?>
<?php require_once('inc/side.php'); ?>

<?php require_once('login_fun.php');
ob_start();
if (!isset($_SESSION["username"]) ) {
    header('location:index.php');
}
?>
<?php

if(isset($_POST['submit'])){
    $Distributer_id=@$_POST['Distributer_id'];
    $fname=@$_POST['fname'];
    $lname=@$_POST['lname'];
    $password=@$_POST['password'];
    $confirm_password=@$_POST['confirm_password'];
    $gender=@$_POST['gender'];
    $dob=@$_POST['dob'];
    $email=@$_POST['email'];
    $username=@$_POST['username'];
    $websitename=@$_POST['websitename'];
    $phonenumber=@$_POST['phonenumber'];
    $node=@$_POST['node'];
    $sponsor=@$_POST['sponsor'];
    $splan=@$_POST['splan'];

}
if(!empty($fname) or !empty($lname) or !empty($password) or !empty($confirm_password) or !empty($gender) or !empty($dob) or !empty($email) or !empty($username) or !empty($phonenumber) or !empty($node) or !empty($sponser) or !empty($splane))
{
    $query = "INSERT INTO `users` (`fname`, `lname`, `password`, `gender`, `dob`, `email`, `username`, `phonenumber`, `sponsor`,`splan`,`node`) VALUES ('$fname', '$lname', '$password', '$gender',' $dob', '$email', '$username',' $phonenumber','$sponsor', '$splan', '$node')";

   // if(isset($query)){
     //   header('location:index.php');
       // echo "<span>You are  Registered succefully! click Here to login <a href='index.php'>Login</a></span>";
   // }
    $run = mysqli_query($con,$query);

}


else{
    $error = "All * Fields are required";

}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Register New Member

        </h1>

    </section>

    <!-- Main content -->
    <div class="row">
        <div class="col-sm-2 "></div>
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h2>Register New Account</h2></div>
                <div class="panel-body" >
                    <div class="row">
                        <div class="col-md-12">
                            <div class = "container">

                                <form class="form-horizontal" action="enroll_member.php" method="post" onsubmit="Validate()">

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="firstname">First Name:</label>
                                        <div class="col-sm-6">
                                            <?php
                                            if(isset($error)){
                                                echo "<span  class='pull-right' style='color:red'>$error</span>";}
                                            ?>
                                            <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="fname" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="lname">  Last Name:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" required>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="lname" required>  Gender:</label>
                                        <div class="col-sm-6">
                                            <input type="radio" name="gender" value="Male" > Male
                                            <input type="radio" name="gender" value="Female" > Female
                                            <input type="radio" name="gender" value="Others" > Others
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="lname" required>  Birthday:</label>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-md-6    ">
                                                    <input  name="dob" id="tbDate" type="date" class="form-control datepicker"><br />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!---bithday-->


                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="lname" required> Phone Number:</label>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input class="form-control" id="phone" name="phonenumber" type="number" >
                                                </div>
                                                <div class="col-md-4"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Mobile/cell/code-->



                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="lname">  Email:</label>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <input type="text" name="email" placeholder="email.." class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                        </div>

                                    </div>
                                    <!---email-->




                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="website">Username:</label>
                                        <div class="col-sm-6">

                                            <input type="text" class="form-control" id="website" placeholder="Enter Username.." name="username">
                                        </div>
                                    </div>
                                    <!--username-->
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="password">Password:</label>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                                        </div>
                                    </div>
                                    <!--password-->
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="reppassword">Retype Password:</label>
                                        <div class="col-sm-6">

                                            <input type="password" class="form-control" id="confirm_password" placeholder="Retype Password" name="confirm_password">
                                            <hr>
                                        </div>

                                    </div>
                                    <!--retype password-->
                                    <!---sponsor-->
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="sponsor">Sponsor:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="sponsor" placeholder="Enter Sponsor" name="sponsor">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2" for="plan">Select Plan:</label>
                                        <div class="col-md-4">
                                            <select name="splan" class="form-control" id="plan" >
                                                <!--<option value="">Select NA No. </option>-->
                                                <?PHP
                                                $squery="select * from plan";
                                                $zahid=mysqli_query($con,$squery);
                                                while($rows = mysqli_fetch_array($zahid))
                                                {
                                                    $selectplan=$rows['plan_name'];
                                                    $plan_p=$rows['plan_price'];
                                                    $plan_C=$rows['plan_commission'];


                                                    ?>
                                                    <option value="<?php echo @$selectplan;  ?>"
                                                        <?php {if(@$unational_assembly==@$selectplan) { echo "selected='selected'";  }}?> >
                                                        <?php echo @$selectplan;?></option>
                                                    <?php
                                                }
                                                ?></select>


                                        </div>
                                        <div class="form-group">

                                            <div class="col-md-6 col-sm-12 " >
                                                <label class="control-label" for="lname">  Node:</label>
                                                <input type="radio" name="node" value="Right"> Right
                                                <input type="radio" name="node" value="Left"> Left
                                            </div>
                                        </div>

                                        <!--plans-->

                                    </div>
                                    <!--node-->
                                    <div col-sm-6>
                                    <input type="submit" name="submit" class="btn btn-success " style="padding-left:500px; padding-right:400px;"  value="Create User">
                                    </div>
                                        <br>



                                </form>

                            </div>




                        </div>
                    </div>






                </div>
            </div>


        </div>



    </div>
<!-- /.content-wrapper -->
<?php require_once('inc/footer.php');?>

<?php  require_once('inc/connect.php');
// var_dump('expression'); die; 
      if (isset($_POST['submit'])) 
      {
        // var_dump('expression'); die;
        $error = userRecoverProcess();
      }
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    body#LoginForm{ background-image:url("images/Login-wallpapers.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; height: 100%; padding:10px;}

.form-heading { color:#fff; font-size:23px;}
.panel h2{ color:#444444; font-size:28px; margin:0 0 8px 0;}
.panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
.login-form .form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 4px;
  font-size: 14px;
  height: 50px;
  line-height: 50px;
}
.main-div {
  background: #ffffff none repeat scroll 0 0;
  border-radius: 2px;
  margin: 10px auto 30px;
  max-width: 38%;
  padding: 50px 70px 70px 71px;
}

.login-form .form-group {
  margin-bottom:10px;
}
.login-form{ text-align:center;}
.forgot a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background: #f0ad4e none repeat scroll 0 0;
  border-color: #f0ad4e;
  color: #ffffff;
  font-size: 14px;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0;
}
.forgot {
  text-align: left; margin-bottom:30px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background: #ff9900 none repeat scroll 0 0;
}
.back { text-align: left; margin-top:10px;}
.back a {color: #444444; font-size: 13px;text-decoration: none;}
</style>

<html>
  <head>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<div class="container">
   
<div class="login-form">
<div class="main-div">
   <?=($_GET['msg']!=''?'<p class="text-center alert alert-success">'.$_GET['msg'].'</p>':'')?>
   <?=($_GET['error']!=''?'<p class="text-center alert alert-danger">'.$_GET['error'].'</p>':'')?>
   <?=($error!=''?'<p class="text-center alert alert-danger">'.$error.'</p>':'')?>
     
    <div class="panel">
   <h2>Reset Password</h2>
   <p>Please enter your email and password</p>
   </div>
    <?php if(isset($error)){
    echo "<span class='pull-right' style='color:red;'>$error</span>";
}     
    
    ?>
    <form id="Login" method="post">

        <div class="form-group">


            <input type="text" name="username" class="form-control" id="inputEmail" placeholder="Email" required>

        </div>



        <input type="submit"  name="submit" class="btn btn-primary" value="Recover Password">

    </form>
     <a href="index.php" style="text-align: right;text-decoration: none;">Login</a>

    </div>

</div></div>


</body>
</html>

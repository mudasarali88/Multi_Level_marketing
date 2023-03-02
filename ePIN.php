<?php require_once('inc/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require_once('inc/side.php'); ?>
<?php require_once('login_fun.php');
ob_start();
if (!isset($_SESSION["username"]) ) {
     header('location:index.php');

	}
     $user_id = $_SESSION["Distributer_id"];
  // $s_username=$_SESSION['username'];
    $mysqli="SELECT * from purchase Where user_id='$user_id'";
    $run=mysqli_query($con , $mysqli);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ePIN
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="panel panel-body">
                    <form method="post" name="form2">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>SI No.</th>
                        <th>ePIN Password</th>
                        <th>Plan</th>
                        <th> Purchase Date</th>
                    </tr>

                     <?php
                     //echo $user_id = $_SESSION["Distributer_id"];
                      while ($purchase=mysqli_fetch_assoc($run)) {    
                      echo "<tr>";                 
                        echo "<td>".$purchase['id']."</td>";
                        echo "<td>".$purchase['ePIN_password']."</td>";
                        echo "<td>".$purchase['Plan']."</td>";
                        echo "<td>".$purchase['Purchase Date']."</td>";
                       echo "</tr>";
                         }
                    ?>
                  </table>
            </div>
        </form>
            </div>
         </div>
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
 <?php require_once('inc/footer.php');?>
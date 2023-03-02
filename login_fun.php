<?php   ob_start();
        
        require_once('inc/connect.php');
      
        if(isset($_POST['submit'])){
         $username =mysqli_real_escape_string($con,$_POST["username"]);
         $password =mysqli_real_escape_string($con,$_POST["password"]);
        
         $query = "select * from users Where username ='$username' and password ='$password'";
         $run = mysqli_query($con,$query);
        if(mysqli_num_rows($run) > 0 ){
         $row = mysqli_fetch_array($run);
         $username_db = $row['username'];
         $password_db = $row['password'];
         $id = $row['Distributer_id'];
         $img  = $row["img"];
        
          
         if($username == $username_db and $password == $password_db){
                   
               $_SESSION["username"] = $username_db;
               $_SESSION["password"] = $password_db;
              $_SESSION["Distributer_id"] = $id;
              
             header('location:home.php');
            }
            
         else{
             
             $error = "Wrong username and password";
          }
         
         }
            else{
                $error = "Wrong username and password";
            }
        }
        
          ?>
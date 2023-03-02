<?php
   require_once('login_fun.php');
        ob_start();
        
         $query = "SELECT * FROM users WHERE username = 'hamzamughal'";
         $run=mysqli_query($con,$query);
         $row=mysqli_fetch_array($run);
         $id_db = $row['Distributer_id'];
         $username_db = $row['username'];
         $password_db = $row['password'];
         $fname_db = $row['fname'];
         $lname_db = $row['lname'];
         $gender_db = $row['gender'];
         $dob_db = $row['dob'];
         $email_db = $row['email'];
         $phonenumber_db= $row['phonenumber'];
         $sponsor_db = $row['sponsor'];
         $splan_db = $row['splan'];
         $node_db = $row['node'];
         $address_db = $row['address'];
         $country_db = $row['country'];
         $state_db = $row['state'];
         $city_db = $row['city'];
         $zipcode_db = $row['zipcode'];
         $language_db = $row['language'];
         $facebook_db = $row['facebooklink'];
         $twitter_db = $row['twitterlink'];
        
         //session start from here
 
          echo  $_SESSION['Distributer_id']= $id_db;
     echo    $_SESSION['username'] = $username_db ;
         $_SESSION['password'] = $password_db ;
          $_SESSION['fname']= $fname_db ;
          $_SESSION['lname'] = $lname_db ;
           $_SESSION['gender'] = $gender_db ;
       $_SESSION['dob']  =  $dob_db ;
         $_SESSION['email'] =  $email_db ;
         $_SESSION['phonenumber'] = $phonenumber_db;
        $_SESSION['sponsor'] =  $sponsor_db ;
        $_SESSION['splan']  = $splan_db ;
         $_SESSION['node'] = $node_db;
         $_SESSION['address']= $address_db ;
         $_SESSION['country']  =$country_db ;
          $_SESSION['state'] = $state_db ;
         $_SESSION['city'] = $city_db ;
           $_SESSION['zipcode'] = $zipcode_db ;
         $_SESSION['language'] = $language_db ;
         $_SESSION['facebooklink'] = $facebook_db;
        $_SESSION['twitterlink'] =  $twitter_db ;
     

?>
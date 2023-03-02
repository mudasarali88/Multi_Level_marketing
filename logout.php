<?php
require_once('inc/connect.php');
if($_SESSION['isLogin']==TRUE)
{
	getLogout();
}
else
{
	header('location: index.php');
}
 ?>
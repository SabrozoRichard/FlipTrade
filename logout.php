<?php 

session_start();

if (isset($_SESSION['Fliptrade_userid'])) 
{	
	$_SESSION['Fliptrade_userid'] = NULL;
   	unset($_SESSION['Fliptrade_userid']);
}

   header("Location: login.php");
   die;

 ?>
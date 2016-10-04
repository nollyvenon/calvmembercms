<?php 
//start the session 
session_start(); 
/*		if( file_exists("login.php")){
			header("Location: login.php");
		}else{
			header("Location: adminlogin.php");
		}
*/		
$user = $_SESSION['adminname'];
			   	mysql_query("UPDATE users SET active='n',session_id='' WHERE phone='" . $user . "'");;
//session variable is registered, the user is ready to logout 
session_unset(); 
session_destroy(); 
header("Location: login.php");

		?> 
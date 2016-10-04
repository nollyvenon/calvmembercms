<?php
ob_start();
if(!isset($_SESSION)) session_start(); 
include_once "../../Connections/conn.php";
if(!isset($_SESSION['adminname'])){	

  header("Location:../../login.php");
}$whereConditions = array('id ='=>$id);
$qr = $db->select('userpriv',array('*'),$whereConditions)->results();
$q = $db->count('userpriv',"id ='$id'"); 
		if ($q == 0 ) {	
			echo ('<p>No such information in the Database </p>');
		} else {
			foreach($qr as $row)
			{
				$accttype = $row['accttype'];
				$usergroup = $row['usergroup'];
				
			}
}

$aWhere = array('id'=>"$id"); 
$data1 = $db->delete('userpriv', $aWhere)->affectedRows();
header("Location:manageusgroup.php");
?>
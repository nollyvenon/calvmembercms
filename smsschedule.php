<?php
include_once "Connections/conn.php";
include_once "Connections/functions.php";
include('libs/Smarty.class.php');
$smarty = new Smarty;
			////GET TODAY'S BIRTHDAY MATE, AND SEND BIRTHDAY GREETING TO THEM /////////////
$whereConditions = array('isactive ='=>"1",'and type ='=>"birthday");
$q = $db->select('schedulesmstemplates',array('*'),$whereConditions,'ORDER BY RAND() LIMIT 1')->results();
$content = $q[0]['content'];

		$userpass = $conn->query("select * from smsdrafts WHERE sent='0' AND sendtype='schedule' AND sendtime<DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i:%s')"); 
		$qr = $userpass->fetchAll(PDO::FETCH_ASSOC);
		foreach($qr as $row){	
				  
			    $receiver=$row['receiver'];
				$message = $row['message'];
			$arr1 = explode(',',trim($receiver,', '));
			foreach($arr1 as $cu_phone){
				
 				file_get_contents("http://www.smslive247.com/http/index.aspx?cmd=sendmsg&sessionid=5b422f10&message=$message&sender=CALVARY&sendto=$cu_phone&msgtype=0");
			}
			$conn->exec("UPDATE smsdrafts SET sent='1' where receiver='$receiver'");
		}


?>
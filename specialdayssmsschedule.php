<?php
include_once "Connections/conn.php";
include_once "Connections/functions.php";
include('libs/Smarty.class.php');
$smarty = new Smarty;
			////GET TODAY'S BIRTHDAY MATE, AND SEND BIRTHDAY GREETING TO THEM /////////////
$whereConditions = array('isactive ='=>"1",'and type ='=>"birthday");
$q = $db->select('schedulesmstemplates',array('*'),$whereConditions,'ORDER BY RAND() LIMIT 1')->results();
$content = $q[0]['content'];

		$userpass = $conn->query("select * from members WHERE DATE_FORMAT(cu_dob,'%m-%d') = DATE_FORMAT(NOW(),'%m-%d')"); 
		$qr = $userpass->fetchAll(PDO::FETCH_ASSOC);		
		foreach($qr as $fet){		  
			 $cu_phone=$fet['cu_phone'];
			$contact['firstname'] = $row['cu_first_name'];
			$contact['lastname'] = $row['cu_last_name'];
			$contact[] = $contact;
			$smarty->assign('contact', $contact);
			$output = $smarty->fetch($templatefile);
		
		$content = str_replace(" ","+",$output);
 		file_get_contents("http://www.smslive247.com/http/index.aspx?cmd=sendmsg&sessionid=5b422f10&message=$content&sender=CALVARY&sendto=$cu_phone&msgtype=0");

		}	

			////GET TODAY'S MARRIAGE DAY MATE, AND SEND GREETINGS TO THEM /////////////
$whereConditions = array('isactive ='=>"1",'and type ='=>"marriage");
$q = $db->select('schedulesmstemplates',array('*'),$whereConditions,'ORDER BY RAND() LIMIT 1')->results();
$content = $q[0]['content'];

		$userpass = $conn->query("select * from members WHERE DATE_FORMAT(cu_marriage_date,'%m-%d') = DATE_FORMAT(NOW(),'%m-%d')"); 
		$qr = $userpass->fetchAll(PDO::FETCH_ASSOC);		
		foreach($qr as $fet){		  
			 $cu_phone=$fet['cu_phone'];
			$contact['firstname'] = $row['cu_first_name'];
			$contact['lastname'] = $row['cu_last_name'];
			$contact[] = $contact;
			$smarty->assign('contact', $contact);
			$output = $smarty->fetch($templatefile);
		
		$content = str_replace(" ","+",$output);
 		file_get_contents("http://www.smslive247.com/http/index.aspx?cmd=sendmsg&sessionid=5b422f10&message=$content&sender=CALVARY&sendto=$cu_phone&msgtype=0");

		}
		
					////GET TODAY'S ANNIVERSARY DAY MATE, AND SEND GREETINGS TO THEM /////////////
$whereConditions = array('isactive ='=>"1",'and type ='=>"anniv");
$q = $db->select('schedulesmstemplates',array('*'),$whereConditions,'ORDER BY RAND() LIMIT 1')->results();
$content = $q[0]['content'];

		$userpass = $conn->query("select * from members WHERE DATE_FORMAT(cu_anniv_date,'%m-%d') = DATE_FORMAT(NOW(),'%m-%d')"); 
		$qr = $userpass->fetchAll(PDO::FETCH_ASSOC);		
		foreach($qr as $fet){		  
			 $cu_phone=$fet['cu_phone'];
			$contact['firstname'] = $row['cu_first_name'];
			$contact['lastname'] = $row['cu_last_name'];
			$contact[] = $contact;
			$smarty->assign('contact', $contact);
			$output = $smarty->fetch($templatefile);
		
		$content = str_replace(" ","+",$output);
 		file_get_contents("http://www.smslive247.com/http/index.aspx?cmd=sendmsg&sessionid=5b422f10&message=$content&sender=CALVARY&sendto=$cu_phone&msgtype=0");

		}	

?>
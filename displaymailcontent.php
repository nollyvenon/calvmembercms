<?php
error_reporting(E_STRICT | E_ALL);
include_once "Connections/conn.php";
include_once "Connections/functions.php";
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
include('libs/Smarty.class.php');
$smarty = new Smarty;
			////GET TODAY'S BIRTHDAY MATE, VOUCHER TO SEND AND SEND IT /////////////

$q = $db->select('settings',array('*'))->results();
$MailFromName = $q[0]['MailFromName'];
$MailFromEmail = $q[0]['MailFromEmail'];
$MailReplyToName = $q[0]['MailReplyToName'];
$MailReplyToEmail = $q[0]['MailReplyToEmail'];
$MailHost = $q[0]['MailHost'];//seperate server with comma
$MailUser = $q[0]['MailUser'];
$MailPassword = $q[0]['MailPassword'];
$MailPort = $q[0]['MailPort'];
$BirthEmailTemplate = $q[0]['BirthEmailTemplate'];

					$mail = new PHPMailer;
					$body = file_get_contents('templates\innovative\index.html', dirname(__FILE__));
					$mail->isSMTP();
					$mail->Host = $MailHost;
					$mail->SMTPAuth = true;
					$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
					$mail->Port = $MailPort;
					$mail->Username = $MailUser;
					$mail->Password = $MailPassword;
					$mail->isHTML(true); 

/*CHECK FOR BIRTHDAY MATES AND SEND EMAILS TO THEM*/
$whereConditions = array('isactive ='=>"1",'and type ='=>"birthday");
$q = $db->select('scheduleemailtemplates',array('*'),$whereConditions,'ORDER BY RAND() LIMIT 1')->results();
$body = $q[0]['content'];
$subject = $q[0]['subject'];
$template = $q[0]['template'];
$templatefile = "templates\\".$template."\index.html";
		
		$userpass = $conn->query("select * from members WHERE DATE_FORMAT(cu_dob,'%m-%d') = DATE_FORMAT(NOW(),'%m-%d')"); 
		$qr = $userpass->fetchAll(PDO::FETCH_ASSOC);
		foreach($qr as $row){		  
			    $cu_email=$row['cu_email'];
				$contact['firstname'] = $row['cu_first_name'];
				$contact['lastname'] = $row['cu_last_name'];
				$contact[] = $contact;
				$smarty->assign('contact', $contact);
				$output = $smarty->display($templatefile);
				
		}

?>
<?php
error_reporting(E_STRICT | E_ALL);
include_once "Connections/conn.php";
include_once "Connections/functions.php";
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    include("templates/class.FastTemplate.php3");
    $tpl = new FastTemplate("templates");

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
					$mail->Port = 25;
					$mail->Username = $MailUser;
					$mail->Password = $MailPassword;
					$mail->isHTML(true); 

/*CHECK FOR BIRTHDAY MATES AND SEND EMAILS TO THEM*/
$whereConditions = array('isactive ='=>"1",'and type ='=>"birthday");
$q = $db->select('scheduleemailtemplates',array('*'),"",'ORDER BY RAND() LIMIT 1')->results();
$body = $q[0]['content'];
$subject = $q[0]['subject'];
$template = $q[0]['template'];
$templatefile = "templates\\".$template."\index.html";
	/*	$whereCondition = array(DATE_FORMAT('cu_dob','%m-%d')=>"$curdate");
		$qr = $db->select('members',array('*'),$whereCondition,'order BY cu_id DESC')->results();*/
		
		$userpass = $conn->query("select * from members WHERE DATE_FORMAT(cu_dob,'%m-%d') = DATE_FORMAT(NOW(),'%m-%d')"); 
		$qr = $userpass->fetchAll(PDO::FETCH_ASSOC);
		foreach($qr as $row){		  
			    $cu_email=$row['cu_email'];
				//assign $Phone to FastTemplate instance
				$tpl->assign("Firstname", $row['cu_first_name']);
				$tpl->assign("Lastname", $row['cu_last_name']);
				//$tpl->assign("PHONE", $Phone);
				
				$tpl->define(array(main => "$template/index.html"));
				$tpl->parse(MAIN, "main");
				$maintempl =$tpl->FastPrint();

					$mail->Subject = $subject;
					$mail->msgHTML($maintempl);
					//$mail->msgHTML(file_get_contents($templatefile), dirname(__FILE__));
					//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
					$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';		
		
						$mail->addAddress($row['cu_email'], $row['cu_first_name'].' '.$row['cu_last_name']);
				/*if (!empty($row['cu_image_url'])) {
					$mail->addStringAttachment($row['cu_image_url'], 'YourPhoto.jpg'); //Assumes the image data is stored in the DB
				}*/
				if (!$mail->send()) {
					echo "Mailer Error (" . str_replace("@", "&#64;", $row["cu_email"]) . ') ' . $mail->ErrorInfo . '<br />';
					break; //Abandon sending
				} else {
					echo "Message sent to :" . $row['cu_first_name'].' '.$row['cu_last_name'] . ' (' . str_replace("@", "&#64;", $row['cu_email']) . ')<br />';
				}
		}


/*CHECK FOR ANNIVERSARY AND SEND EMAILS TO THEM*/
/*$whereConditions = array('template_id ='=>$EmailTemplate);
$q = $db->select('annivemailtemplates',array('*'),$whereConditions)->results();*/
$whereConditions = array('isactive ='=>"1",'and type ='=>"anniv");
$q = $db->select('scheduleemailtemplates',array('*'),"",'ORDER BY RAND() LIMIT 1')->results();
$body = $q[0]['content'];
$subject = $q[0]['subject'];
$template = $q[0]['template'];
					
		$userpass = $conn->query("select * from members WHERE DATE_FORMAT(cu_dob,'%m-%d') = DATE_FORMAT(NOW(),'%m-%d')"); 
		$qr = $userpass->fetchAll(PDO::FETCH_ASSOC);
		foreach($qr as $row){		  
				$cu_email=$row['cu_email'];
				//assign $Phone to FastTemplate instance
				$tpl->assign("Firstname", $row['cu_first_name']);
				$tpl->assign("Lastname", $row['cu_last_name']);
				
					$mail->Subject = $subject;
					$mail->msgHTML(file_get_contents($templatefile), dirname(__FILE__));
					//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
					$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

					$mail->addAddress($row['email'], $row['cu_first_name'].' '.$row['cu_last_name']);
				/*if (!empty($row['cu_image_url'])) {
					$mail->addStringAttachment($row['cu_image_url'], 'YourPhoto.jpg'); //Assumes the image data is stored in the DB
				}*/
				if (!$mail->send()) {
					echo "Mailer Error (" . str_replace("@", "&#64;", $row["cu_email"]) . ') ' . $mail->ErrorInfo . '<br />';
					break; //Abandon sending
				} else {
					echo "Message sent to :" . $row['cu_first_name'].' '.$row['cu_last_name'] . ' (' . str_replace("@", "&#64;", $row['cu_email']) . ')<br />';
				}
		}

?>
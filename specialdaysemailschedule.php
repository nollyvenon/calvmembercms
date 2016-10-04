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
					//$body = file_get_contents('templates\innovative\index.html', dirname(__FILE__));
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
//$body = $q[0]['content'];
$subject = $q[0]['subject'];
$template = $q[0]['template'];
$templatefile = "templates\\".$template."\index.html";
		
		$userpass = $conn->query("select * from members WHERE DATE_FORMAT(cu_dob,'%m-%d') = DATE_FORMAT(NOW(),'%m-%d')"); 
		$qr = $userpass->fetchAll(PDO::FETCH_ASSOC);
		foreach($qr as $row){		  
			  echo  $cu_email=$row['cu_email'];
				$contact['firstname'] = $row['cu_first_name'];
				$contact['lastname'] = $row['cu_last_name'];
				$contact[] = $contact;
				$smarty->assign('contact', $contact);
				$output = $smarty->fetch($templatefile);
				
					$mail->Subject = $subject;
					$mail->msgHTML($output);
					//$mail->msgHTML(file_get_contents($templatefile), dirname(__FILE__));
					//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
					$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';		
		
						$mail->addAddress($row['cu_email'], $row['cu_first_name'].' '.$row['cu_last_name']);
				/*if (!empty($row['cu_image_url'])) {
					$mail->addStringAttachment($row['cu_image_url'], 'YourPhoto.jpg'); //Assumes the image data is stored in the DB
				}*/
				
				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: $MailFromName<$MailFromEmail>" . "\r\n";
				mail($cu_email,$subject,$output,$headers);
				/*if (!$mail->send()) {
					echo "Mailer Error (" . str_replace("@", "&#64;", $row["cu_email"]) . ') ' . $mail->ErrorInfo . '<br />';
					break; //Abandon sending
				} else {
					echo "Message sent to :" . $row['cu_first_name'].' '.$row['cu_last_name'] . ' (' . str_replace("@", "&#64;", $row['cu_email']) . ')<br />';
				}*/
		}


/*CHECK FOR ANNIVERSARY AND SEND EMAILS TO THEM*/
/*$whereConditions = array('template_id ='=>$EmailTemplate);
$q = $db->select('annivemailtemplates',array('*'),$whereConditions)->results();*/
$whereConditions = array('isactive ='=>"1",'and type ='=>"anniv");
$q = $db->select('scheduleemailtemplates',array('*'),"",'ORDER BY RAND() LIMIT 1')->results();
//$body = $q[0]['content'];
$subject = $q[0]['subject'];
$template = $q[0]['template'];
$templatefile = "templates\\".$template."\index.html";
					
		$userpass = $conn->query("select * from members WHERE DATE_FORMAT(cu_marriage_date,'%m-%d') = DATE_FORMAT(NOW(),'%m-%d') AND DATE_FORMAT(cu_anniv_date,'%m-%d') = DATE_FORMAT(NOW(),'%m-%d')"); 
		$qr = $userpass->fetchAll(PDO::FETCH_ASSOC);
		foreach($qr as $row){		  
				$cu_email=$row['cu_email'];
				$contact['Firstname'] = $row['cu_first_name'];
				$contact['Lastname'] = $row['cu_last_name'];
				$contact[] = $contact;
				$smarty->assign('contact', $contact);
				$output = $smarty->fetch($templatefile);
				
					$mail->Subject = $subject;
					$mail->msgHTML($output);
					//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
					$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

					$mail->addAddress($row['cu_email'], $row['cu_first_name'].' '.$row['cu_last_name']);
				/*if (!empty($row['cu_image_url'])) {
					$mail->addStringAttachment($row['cu_image_url'], 'YourPhoto.jpg'); //Assumes the image data is stored in the DB
				}*/
				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: $MailFromName<$MailFromEmail>" . "\r\n";
				mail($cu_email,$subject,$output,$headers);
				if (!$mail->send()) {
					echo "Mailer Error (" . str_replace("@", "&#64;", $row["cu_email"]) . ') ' . $mail->ErrorInfo . '<br />';
					break; //Abandon sending
				} else {
					echo "Message sent to :" . $row['cu_first_name'].' '.$row['cu_last_name'] . ' (' . str_replace("@", "&#64;", $row['cu_email']) . ')<br />';
				}
		}

?>
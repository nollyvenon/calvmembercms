<?php
error_reporting(E_STRICT | E_ALL);
include_once "Connections/conn.php";
include_once "Connections/functions.php";
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

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
$EmailTemplate = $q[0]['EmailTemplate'];

					$mail = new PHPMailer;
					$body = $_POST['message'];
					$mail->isSMTP();
					$mail->Host = $MailHost;
					$mail->SMTPAuth = true;
					$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
					$mail->Port = 25;
					$mail->Username = $MailUser;
					$mail->Password = $MailPassword;
					$mail->isHTML(true); 

/*CHECK FOR BIRTHDAY MATES AND SEND EMAILS TO THEM*/
$whereConditions = array('clientid ='=>$sid);
$q = $db->select('birthemailtemplates',array('*'),"",'ORDER BY RAND() LIMIT 1')->results();
$body = $q[0]['content'];
$subject = $q[0]['subject'];

					$mail->Subject = $subject;
					$mail->msgHTML($body);
					//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
					$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
					
		$curdate = date('m-d');
		$whereCondition = array(DATE_FORMAT(cu_dob,'%m-%d')=>"$curdate");
		$qr = $db->select('members',array('*'),$whereCondition,'order BY cu_id DESC')->results();
		foreach($qr as $fet){		  
			 $cu_email=$fet['cu_email'];
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


/*CHECK FOR ANNIVERSARY AND SEND EMAILS TO THEM*/
$whereConditions = array('template_id ='=>$EmailTemplate);
$q = $db->select('annivemailtemplates',array('*'),$whereConditions)->results();
$body = $q[0]['content'];
$subject = $q[0]['subject'];

					$mail->Subject = $subject;
					$mail->msgHTML($body);
					//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
					$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
					
		$curdate = date('m-d');
		$whereCondition = array(DATE_FORMAT(cu_dob,'%m-%d')=>"$curdate");
		$qr = $db->select('members',array('*'),$whereCondition,'order BY cu_id DESC')->results();
		foreach($qr as $fet){		  
			 $cu_email=$fet['cu_email'];
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
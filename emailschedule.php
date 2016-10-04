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
$whereConditions = array('isactive ='=>"1",'and type ='=>"normal");
$q = $db->select('scheduleemailtemplates',array('*'),$whereConditions,'ORDER BY RAND() LIMIT 1')->results();
//$body = $q[0]['content'];
$subject = $q[0]['subject'];
$template = $q[0]['template'];
$templatefile = "templates\\".$template."\index.html";
		
		//$userpass = $conn->query("select * from maildrafts WHERE sent=0 AND sendtype='schedule' AND sendtime<DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i:%s')"); 
		$userpass = $conn->query("select * from maildrafts WHERE sent='0' AND sendtype='schedule' AND sendtime<DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i:%s')"); 
		$qr = $userpass->fetchAll(PDO::FETCH_ASSOC);
		foreach($qr as $row){	
				  
			    $receiver=$row['receiver'];
				$message = $row['message'];
				$subject = $row['subject'];
					$mail->Subject = $subject;
					$mail->msgHTML($message);
					//$mail->msgHTML(file_get_contents($templatefile), dirname(__FILE__));
					//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
					$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';		
			$arr1 = explode(',',trim($receiver,','));
			foreach($arr1 as $cu_email){
				$whereConditions = array('cu_email ='=>"$cu_email");
				$q = $db->select('members',array('*'),$whereConditions)->results();
				$cu_first_name = $q[0]['cu_first_name'];
				$cu_last_name = $q[0]['cu_last_name'];
		
				$mail->addAddress($cu_email, $row['cu_first_name'].' '.$row['cu_last_name']);
				/*if (!empty($row['cu_image_url'])) {
					$mail->addStringAttachment($row['cu_image_url'], 'YourPhoto.jpg'); //Assumes the image data is stored in the DB
				}*/
				
				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: $MailFromName<$MailFromEmail>" . "\r\n";
				mail($cu_email,$subject,$message,$headers);
				/*if (!$mail->send()) {
					echo "Mailer Error (" . str_replace("@", "&#64;", $row["cu_email"]) . ') ' . $mail->ErrorInfo . '<br />';
					break; //Abandon sending
				} else {
					echo "Message sent to :" . $row['cu_first_name'].' '.$row['cu_last_name'] . ' (' . str_replace("@", "&#64;", $row['cu_email']) . ')<br />';
				}*/
			}
			$conn->exec("UPDATE maildrafts SET sent='1' where receiver='$receiver'");
		}


?>
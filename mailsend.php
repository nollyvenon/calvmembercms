<?php
error_reporting(E_STRICT | E_ALL);
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    include("templates/class.FastTemplate.php3");
    $tpl = new FastTemplate("templates");
/*$qr = $db->select('settings',array('*'))->results();
foreach($qr as $row)
			{
				$id = $row['sett_id'];
				$MailFromName = $row['MailFromName'];
				$MailFromEmail = $row['MailFromEmail'];
				$MailReplyToName = $row['MailReplyToName'];
				$MailReplyToEmail = $row['MailReplyToEmail'];
				$MailHost = $row['MailHost'];
				$MailUser = $row['MailUser'];
				$MailPassword = $row['MailPassword'];
				$MailPort = $row['MailPort'];				
			}
*/
$q = $db->select('settings',array('*'))->results();
$MailFromName = $q[0]['MailFromName'];
$MailFromEmail = $q[0]['MailFromEmail'];
$MailReplyToName = $q[0]['MailReplyToName'];
$MailReplyToEmail = $q[0]['MailReplyToEmail'];
$MailHost = $q[0]['MailHost'];//seperate server with comma
$MailUser = $q[0]['MailUser'];
$MailPassword = $q[0]['MailPassword'];
$MailPort = $q[0]['MailPort'];

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

					$mail->Subject = $_POST['subject'];
					//Same body for all messages, so set this before the sending loop
					//If you generate a different body for each recipient (e.g. you're using a templating system),
					//set it inside the loop
					$mail->msgHTML($body);
					//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
					$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

if (isset($_POST['newsgroup'])) {
    $newsgroup = $_POST['newsgroup'];
	foreach ($newsgroup as $newsgroup1){
//save in the archive for future reference
$dataArray2[] = array('email'=>"",'group'=>"$newsgroup1",'grouptype'=>"newsgroup1",'admin'=>"$adminname"); 
$data = $db->insertBatch('mailinglist',$dataArray2,true)->getAllLastInsertId();

	$whereCondition = array('group_id'=>"$newsgroup1");
$qr = $db->select('newslettergroups',array('*'),$whereCondition,'order BY group_id DESC')->results();
foreach($qr as $row)
			{
				$group_name = $row['group_name'];
				$group_email = $row['group_email'];
				$group_list_name = $row['group_list_name'];
			}
			
		$mail->setFrom($group_email, $group_list_name);
		$mail->addReplyTo($group_email, $group_list_name);
		
		try {

			//Connect to the database and select the recipients from your mailing list that have not yet been sent to
			//You'll need to alter this to match your database
			$whereCondition = array('cu_groupid'=>"$groupid");
			$qr = $db->select('members',array('*'),$whereCondition,'order BY cu_id DESC')->results();
			foreach ($result as $row) { //This iterator syntax only works in PHP 5.4+
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
				// Clear all addresses and attachments for next loop
				$mail->clearAddresses();
				$mail->clearAttachments();
				$dataArray = array('sent'=>"true"); 
				$aWhere = array('id'=>$data);
				$data = $db->update('mailinglist', $dataArray, $aWhere)->affectedRows();
				
						echo '<div class=\"alert alert-success fade in\">
							<button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>
							<strong>"Mail Sent Successfully!.
						</div>';
				
			}
				
		} catch (phpmailerException $e) {
			echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
			echo $e->getMessage(); //Boring error messages from anything else!
		}	
	}
}

if (isset($_POST['memlevel'])) {
    $memlevel = $_POST['memlevel'];
	
	//save in the archive for future reference
$dataArray2[] = array('email'=>"",'group'=>"$memlevel",'grouptype'=>"members",'admin'=>"$adminname"); 
$data = $db->insertBatch('mailinglist',$dataArray2,true)->getAllLastInsertId();

		$mail->setFrom($MailFromEmail, $MailFromName);
		$mail->addReplyTo($MailReplyToEmail, $MailReplyToName);
		try {

			//Connect to the database and select the recipients from your mailing list that have not yet been sent to
			//You'll need to alter this to match your database
			$whereCondition = array('cu_mem_level'=>"$memlevel");
			$qr = $db->select('members',array('*'),$whereCondition,'order BY cu_id DESC')->results();
			foreach ($result as $row) { //This iterator syntax only works in PHP 5.4+
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
				// Clear all addresses and attachments for next loop
				$mail->clearAddresses();
				$mail->clearAttachments();
					//Mark it as sent in the DB
				$dataArray = array('sent'=>"true"); 
				$aWhere = array('id'=>$data);
				$data = $db->update('mailinglist', $dataArray, $aWhere)->affectedRows();
				
						echo '<div class=\"alert alert-success fade in\">
							<button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>
							<strong>"Mail Sent Successfully!.
						</div>';				
				
			}
				
		} catch (phpmailerException $e) {
			echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
			echo $e->getMessage(); //Boring error messages from anything else!
		}	
	
}

if (isset($_POST['maristatus'])) {
    $maristatus = $_POST['maristatus'];
$dataArray2[] = array('email'=>"",'group'=>"$maristatus",'grouptype'=>"marital",'admin'=>"$adminname"); 
$data = $db->insertBatch('mailinglist',$dataArray2,true)->getAllLastInsertId();

		$mail->setFrom($MailFromEmail, $MailFromName);
		$mail->addReplyTo($MailReplyToEmail, $MailReplyToName);
		//save in the archive for future reference
		try {

			//Connect to the database and select the recipients from your mailing list that have not yet been sent to
			//You'll need to alter this to match your database
			$whereCondition = array('cu_marital_status'=>"$maristatus");
			$qr = $db->select('members',array('*'),$whereCondition,'order BY cu_id DESC')->results();
			foreach ($result as $row) { //This iterator syntax only works in PHP 5.4+
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
				// Clear all addresses and attachments for next loop
				$mail->clearAddresses();
				$mail->clearAttachments();
					//Mark it as sent in the DB
				$dataArray = array('sent'=>"true"); 
				$aWhere = array('id'=>$data);
				$data = $db->update('mailinglist', $dataArray, $aWhere)->affectedRows();
				
						echo '<div class=\"alert alert-success fade in\">
							<button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>
							<strong>"Mail Sent Successfully!.
						</div>';

				
			}
				
		} catch (phpmailerException $e) {
			echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
			echo $e->getMessage(); //Boring error messages from anything else!
		}	

	
}

		$mail->setFrom($MailFromEmail, $MailFromName);
		$mail->addReplyTo($MailReplyToEmail, $MailReplyToName);

if($mailtype=='pastdraft'){
		try {

			//Connect to the database and select the recipients from your mailing list that have not yet been sent to
			//You'll need to alter this to match your database
			//$whereCondition = array('cu_marital_status'=>"$maristatus");
			$qr = $db->select('members',array('*'),$whereCondition,'order BY cu_id DESC')->results();
			foreach ($result as $row) { //This iterator syntax only works in PHP 5.4+
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
				// Clear all addresses and attachments for next loop
				$mail->clearAddresses();
				$mail->clearAttachments();
					//Mark it as sent in the DB
				$dataArray = array('sent'=>"true"); 
				$aWhere = array('id'=>$data);
				$data = $db->update('mailinglist', $dataArray, $aWhere)->affectedRows();
				
						echo '<div class=\"alert alert-success fade in\">
							<button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>
							<strong>"Mail Sent Successfully!.
						</div>';				
				
			}
				
		} catch (phpmailerException $e) {
			echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
			echo $e->getMessage(); //Boring error messages from anything else!
		}
	
}else if($mailtype=='normal'){
	$email = $_POST['mailto'];
	$mailcc = $_POST['mailcc'];
	$mailbcc = $_POST['mailbcc'];
	$q = $db->select('members',array('*'))->results();
	$fullname = $q[0]['cu_first_name'].' '.$q[0]['cu_last_name'];
	if (strlen($fullname) > 4){
		$mail->addAddress($email, $fullname);
	}else{
		$mail->addAddress($email);		
	}
		$mail->addCC($mailcc);
		$mail->addBCC($mailbcc);
		//Set the subject line
		//$mail->addAttachment('images/phpmailer_mini.png');
		//send the message, check for errors
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			//echo "Message sent!";
						echo '<div class=\"alert alert-success fade in\">
							<button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>
							<strong>"Mail Sent Successfully!.
						</div>';			
		}	
		
		$dataArray2[] = array('email'=>"$email",'group'=>"none",'grouptype'=>"none",'admin'=>"$adminname",'sent'=>"true"); 
		$data = $db->insertBatch('mailinglist',$dataArray2,true)->getAllLastInsertId();

}
						?>
<?php
ob_start();
include_once "Connections/conn.php";
include_once "Connections/functions.php";
$adminname=$_SESSION['adminname'];
if(!isset($_SESSION['adminname'])){	

  header("Location:login.php");
}
?><!DOCTYPE html>
<html class=" ">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Calvary Members' CMS : Mailbox</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">	<!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->




        <!-- CORE CSS FRAMEWORK - START -->
        <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="assets/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


             <link href="assets/plugins/jquery-ui/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/datepicker/css/datepicker.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/multi-select/css/multi-select.css" rel="stylesheet" type="text/css" media="screen"/>

        <!-- CORE CSS TEMPLATE - START -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" "><!-- START TOPBAR -->
    <?php include('header.php');?>
        <!-- END TOPBAR -->
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <?php include('sidebar.php');?>
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Mailbox</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="#"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Messaging</a>
                                    </li>
                                    <li class="active">
                                        <strong>Compose</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-lg-12">
                        <section class="box nobox">
                            <div class="content-body">    <div class="row">

                                    <div class="col-md-3 col-sm-4 col-xs-12">


                                        <a class="btn btn-primary btn-block" href='mail-compose.php'>Compose</a>

                                        <ul class="list-unstyled mail_tabs">
                                            <li class="">
                                                <a href="mail-inbox.php">
                                                    <i class="fa fa-inbox"></i> Inbox <span class="badge badge-primary pull-right">6</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="mail-sent.php">
                                                    <i class="fa fa-send-o"></i> Sent
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="mail-drafts.php">
                                                    <i class="fa fa-edit"></i> Drafts <span class="badge badge-orange pull-right">2</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="mail-important.php">
                                                    <i class="fa fa-star-o"></i> Important
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="mail-trash.php">
                                                    <i class="fa fa-trash-o"></i> Trash
                                                </a>
                                            </li>
                                        </ul>
                                        <br><br>
                                        <a class="btn btn-primary btn-block">Mail Groups</a>
                                        
                                        <ul class="list-unstyled mail_tabs">
          <?php 
		$qr = $db->select('member_groups',array('*'))->results();
		foreach($qr as $fet){
		$group_id=$fet['group_id'];
		$group_name=$fet['group_name'];?>
                                            <li class=""> <input name="newsgroup[]" value="<?= $group_id;?>" type="checkbox"><i class="fa fa-send-o"></i> <?= $group_name; ?> </li>
          <?php } ?>
     <!--     <?php 
		$qr = $db->select('newslettergroups',array('*'))->results();
		foreach($qr as $fet){
		$group_id=$fet['group_id'];
		$group_name=$fet['group_name'];?>
                                            <li class=""> <input name="newsgroup[]" value="<?= $group_id;?>" type="checkbox"><i class="fa fa-send-o"></i> <?= $group_name; ?> </li>
          <?php } ?>-->
                                        </ul>

                                    </div>
				<form action ="#" method="post" enctype="multipart/form-data">
                                    
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <ul class="list-unstyled mail_tabs">
          <?php 
		$qr = $db->select('member_groups',array('*'))->results();
		foreach($qr as $fet){
		$group_id=$fet['group_id'];
		$group_name=$fet['group_name'];?>
                                            <li class=""> <input name="newsgroup[]" value="<?= $group_id;?>" type="checkbox"><i class="fa fa-send-o"></i> <?= $group_name; ?> </li>
          <?php } ?>
     <!--     <?php 
		$qr = $db->select('newslettergroups',array('*'))->results();
		foreach($qr as $fet){
		$group_id=$fet['group_id'];
		$group_name=$fet['group_name'];?>
                                            <li class=""> <input name="newsgroup[]" value="<?= $group_id;?>" type="checkbox"><i class="fa fa-send-o"></i> <?= $group_name; ?> </li>
          <?php } ?>-->
                                        </ul>
                                    </div>

                                    <div class="col-md-9 col-sm-8 col-xs-12">
                                        <div class="mail_content">

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                    <h3 class="mail_head">Compose</h3>
                                                    <i class='fa fa-refresh icon-primary icon-xs icon-orange mail_head_icon'></i>
                                                    <i class='fa fa-search icon-primary icon-xs icon-orange mail_head_icon'></i>
                                                    <i class='fa fa-cog icon-primary icon-xs icon-orange mail_head_icon pull-right'></i>


                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12 mail_view_title">
                
                <?php
				$mailto = $_POST['mailto'];
$mailcc = $_POST['mailcc'];
$mailbcc = $_POST['mailbcc'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$group = $_POST['group'];
$senddate = date('Y-m-d',strtotime($_POST['senddate']));
$sendtime = $_POST['sendtime'];
$senddate1 = $senddate.' '.$sendtime;
$newsgroup = $_POST['newsgroup'];
if ($newsgroup <> ""){
	foreach($_POST['newsgroup'] as $newsgroup1){
		$userpass = $conn->query("select * from members WHERE cu_newsletter_group='$newsgroup1'"); 
		$qr = $userpass->fetchAll(PDO::FETCH_ASSOC);
		foreach($qr as $row){		  
				$cu_email=$row['cu_email'];
			if ($i==1){
				$receiver = $cu_email;
			}else{
				$receiver = $receiver.','.$cu_email;
			}  
			$i++;
		}
	}
}
if ($mailto <> ""){
$receiver = $receiver.','.$mailto;
}
if ($mailcc <> ""){
$receiver = $receiver.','.$mailcc;
}
if ($mailbcc <> ""){
$receiver = $receiver.','.$mailbcc;
}
				if (isset($_POST['save1']) || isset($_POST['save2'])){ //save data for future use
$memkey = md5(uniqid(rand(), true));										
	$dataArray2[] = array('subject'=>"$subject",'receiver'=>"$receiver",'sendtime'=>"$senddate1",'message'=>"$message"); 
$data = $db->insertBatch('maildrafts',$dataArray2)->getAllLastInsertId();	
		if ($data){
		echo "<div class=\"alert alert-warning alert-dismissible fade in\" role=\"alert\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                                            <strong>Draft</strong> Saved successfully!
                                        </div>";
						
		$receiver = "";

	}
				
				}

				if (isset($_POST['send1'] )|| isset($_POST['send2'])){ //send to the assigned
				
			include_once('mailsend.php');
						
				}
				/*if ($_POST['draft1'] || $_POST['draft2']){
	$dataArray2[] = array('sendtime'=>"$sendtime",'receiver'=>"$sendto",'message'=>"$message"); 
	$data = $db->insertBatch('maildrafts',$dataArray2)->getAllLastInsertId();
	if ($data){
		echo '<div class=\"alert alert-success fade in\">
							<button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>
							<strong>"Draft Saved successfully!.
						</div>';

				}
				
			}*/
				if (isset($_POST['schedule'])){ //save data for future use
	$dataArray2[] = array('sendtime'=>"$sendtime",'receiver'=>"$sendto",'message'=>"$message",'sendtype'=>"schedule"); 
	$data = $db->insertBatch('maildrafts',$dataArray2)->getAllLastInsertId();
	if ($data){
		echo '<div class=\"alert alert-success fade in\">
							<button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>
							<strong>"Draft scheduled successfully!.
						</div>';
	}
}
				?>
                                                    <div class='pull-right'>
                                                     <!--   <button name="addgroup" type="button"  class="btn btn-default btn-icon" rel="tooltip" data-color-class="primary" data-animate=" animated fadeIn" data-original-title="Add Group" data-target="#modal-select-newslgroup" data-toggle="modal" >
                                                            <i class="fa fa-users icon-xs"></i>
                                                        </button>-->
                                                      
                                                        <button name="send1" type="submit" class="btn btn-default btn-icon" rel="tooltip" data-color-class="primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Send" data-placement="top">
                                                            <i class="fa fa-paper-plane-o icon-xs"></i>
                                                        </button>
                                                        <button name="save1" type="submit" class="btn btn-default btn-icon" rel="tooltip" data-color-class="primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Save" data-placement="top">
                                                            <i class="fa fa-floppy-o icon-xs"></i>
                                                        </button>
                                                        <button name="trash1" type="submit" class="btn btn-default btn-icon" rel="tooltip" data-color-class="primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Trash" data-placement="top">
                                                            <i class="fa fa-trash-o icon-xs"></i>
                                                        </button>
                                                    </div>

                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 mail_view_info">

                                                    <div class="form-group mail_cc_bcc">
                                                        <label class="form-label" for="field-1">To:</label>
                                                        <span class="desc">e.g. "someemail@example.com"</span>
                                                        <div class="labels"><span class='label label-secondary cc'>CC</span> <span class='label label-secondary bcc'>BCC</span>
                                                        </div>
                                                        <div class="controls">
                                                            <input type="text" name="mailto" class="form-control mail_compose_to" value="" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group mail_compose_cc">
                                                        <label class="form-label" for="field-1">CC:</label>
                                                        <span class="desc">e.g. "someemail@example.com"</span>
                                                        <div class="controls">
                                                            <input type="text" name="mailcc" class="form-control mail_compose_to" value="" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group mail_compose_bcc">
                                                        <label class="form-label" for="field-1">BCC:</label>
                                                        <span class="desc">e.g. "someemail@example.com"</span>
                                                        <div class="controls">
                                                            <input type="text" name="mailbcc" class="form-control mail_compose_to" value="" />
                                                        </div>
                                                    </div>
                                                    
                                                    <label class="form-label" for="field-1">Date & Time (both)</label>
                                                    <div class="row">
                                                        <div class="col-xs-8">
                                                            <input type="text" name="senddate" value="<?= date('D, d F Y');?> " class="form-control datepicker col-md-4" data-format="D, dd MM yyyy">
                                                        </div>
                                                        <div class="col-xs-4" style='padding-left:0px;'>
                                                            <input name="sendtime" type="text" class="form-control timepicker col-md-4" data-template="dropdown" data-show-seconds="true" data-default-time="<?=date('h:i A');?>" data-show-meridian="true" data-minute-step="5" data-second-step="5">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label" for="field-1">Subject:</label>
                                                        <span class="desc">e.g. "Meeting in 1st week"</span>
                                                        <div class="controls">
                                                            <input type="text" name="subject" class="form-control" value="" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label" for="field-1">Message:</label>
                                                        <textarea name="message" class="mail-compose-editor" placeholder="Enter text ..." style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;"></textarea>
                                                    </div>



                                                </div>




                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                    <div class='pull-left'>
                                                        <button name="send2" type="submit" class="btn btn-primary">
                                                            <i class="fa fa-paper-plane-o icon-xs"></i> &nbsp; SEND
                                                        </button>
                                                        <button name="save2" type="submit" class="btn btn-purple">
                                                            <i class="fa fa-floppy-o icon-xs"></i> &nbsp; SAVE
                                                        </button>
                                                        <button name="schedule" type="submit" data-target="#modal-custom-dialog2" class="btn btn-primary" data-toggle="modal">
                                                            <i class="fa fa-bomb icon-xs"></i> &nbsp; SCHEDULE
                                                        </button>
                                                        <button name="trash2" type="reset" class="btn btn-secondary">
                                                            <i class="fa fa-trash-o icon-xs"></i> &nbsp; TRASH
                                                        </button>
                                                    </div>

                                                </div>

		</form>


                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section></div>


                </section>
            </section>
            <!-- END CONTENT -->

                </div>
        <!-- END CONTAINER -->
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


        <!-- CORE JS FRAMEWORK - START --> 
        <script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
        <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 


        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/autosize/autosize.min.js" type="text/javascript"></script><script src="assets/plugins/tagsinput/js/bootstrap-tagsinput.min.js" type="text/javascript"></script> <script src="assets/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

         <script src="assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script> 
		 <script src="assets/plugins/datepicker/js/datepicker.js" type="text/javascript"></script> 
		 <script src="assets/plugins/daterangepicker/js/moment.min.js" type="text/javascript"></script> 
		 <script src="assets/plugins/daterangepicker/js/daterangepicker.js" type="text/javascript"></script> 
		 <script src="assets/plugins/timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script> 
		 <script src="assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script> 
		 <script src="assets/plugins/select2/select2.min.js" type="text/javascript"></script> 
		 <script src="assets/plugins/typeahead/typeahead.bundle.js" type="text/javascript"></script> 
		 <script src="assets/plugins/typeahead/handlebars.min.js" type="text/javascript"></script> 
		 <script src="assets/plugins/multi-select/js/jquery.multi-select.js" type="text/javascript"></script> 
		 <script src="assets/plugins/multi-select/js/jquery.quicksearch.js" type="text/javascript"></script> <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 


<div id="modal-select-newslgroup" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">          
                            <div class="modal-header">
                                <button name="emailclose" type="button" aria-hidden="true"
                                        class="close">&times;</button>

    <h4 class="modal-title">Select A Newsletter/mail Group</h4></div>
                            <div class="modal-body">
<?php
							       $selectFields = array('*');
                                   $qr = $db->select('newslettergroups',$selectFields,'','order BY group_id DESC')->results();
								   foreach($qr as $row)
                                            {				 
											$group_id = $row['group_id'];
											$group_name = $row['group_name'];
				echo "<label><input type='checkbox' name='newsgroup[]' value='$group_id' id='newsgroup_$group_id'> $group_name</label><br>";							
											}

                                   $qr = $db->select('membership_level',$selectFields,'','order BY level_id DESC')->results();
								   foreach($qr as $row)
                                            {				 
											$level_id = $row['level_id'];
											$level_name = $row['level_name'];
				echo "<label> <input type='checkbox' name='memlevel[]' value='$level_id' id='memlevel'> $level_name</label><br>";							
											}
											
                                   $qr = $db->select('maristatus',$selectFields,'','order BY status_id DESC')->results();
								   foreach($qr as $row)
                                            {				 
											$status_id = $row['status_id'];
											$status_name = $row['status_name'];
				echo "<label><input type='checkbox' name='maristatus[]' value='$status_id' id='maristatus'> $status_name</label><br>";							
											}											
											?>
                           </div>
                            <div class="modal-footer">
                           <form id="form1" name="form1" method="post" action="">  
                                <input name="selectgrp" type="submit" class="btn btn-danger" value="Select Group !">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</form>
                            </div>
                        </div>
                    </div>
          </div>
          
<div id="modal-custom-dialog1" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">          
                            <div class="modal-header">
                                <button name="emailclose" type="button" aria-hidden="true"
                                        class="close">&times;</button>

                                <h4 class="modal-title">Select A Newsletter/mail Group</h4></div>
                            <div class="modal-body">Are you sure you want to send to this message, this process is irreversible.<br><br>
                           </div>
                            <div class="modal-footer">
                           <form id="form1" name="form1" method="post" action="">  
                                <input name="deletejobs" type="submit" class="btn btn-danger" value="Send Message !">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</form>
                            </div>
                        </div>
                    </div>
          </div>          










        <!-- General section box modal start -->
        <div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Section Settings</h4>
                    </div>
                    <div class="modal-body">

                        Body goes here...

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="button">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    </body>
</html>




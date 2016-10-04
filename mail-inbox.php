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
        <link href="assets/plugins/icheck/skins/minimal/minimal.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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
                                        <strong>Inbox</strong>
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
<?php
$inboxcnt = $db->count('mailinbox');
$draftcnt = $db->count('maildrafts');
$sentcnt = $db->count('mailsent');
?>
                                        <ul class="list-unstyled mail_tabs">
                                            <li class="active">
                                                <a href="mail-inbox.php">
                                                    <i class="fa fa-inbox"></i> Inbox <span class="badge badge-primary pull-right"><?=$inboxcnt ;?></span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="mail-sent.php">
                                                    <i class="fa fa-send-o"></i> Sent
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="mail-drafts.php">
                                                    <i class="fa fa-edit"></i> Drafts <span class="badge badge-orange pull-right"><?=$draftcnt ;?></span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="mail-trash.php">
                                                    <i class="fa fa-trash-o"></i> Trash
                                                </a>
                                            </li>
                                        </ul>

                                    </div>

                                    <div class="col-md-9 col-sm-8 col-xs-12">
                                        <div class="mail_content">

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                    <h3 class="mail_head">Inbox <sup>(<?=$inboxcnt ;?>)</sup></h3>
                                                    <i class='fa fa-refresh icon-primary icon-xs icon-orange mail_head_icon'></i>
                                                    <i class='fa fa-search icon-primary icon-xs icon-orange mail_head_icon'></i>
                                                    <i class='fa fa-cog icon-primary icon-xs icon-orange mail_head_icon pull-right'></i>


                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                    <div class="pull-left">
                                                        <div class="btn-group mail_more_btn">
                                                            <button type="button" class="btn btn-default"><input type='checkbox' class="iCheck"> All</button>
                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">All</a></li>
                                                                <li><a href="#">Read</a></li>
                                                                <li><a href="#">Unread</a></li>
                                                                <li><a href="#">Starred</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <nav class='pull-right'>
                                                        <ul class="pager mail_nav">
                                                            <li><a href="#"><i class='fa fa-arrow-left icon-xs icon-orange icon-secondary'></i></a></li>
                                                            <li><a href="#"><i class='fa fa-arrow-right icon-xs icon-orange icon-secondary'></i></a></li>
                                                        </ul>
                                                    </nav>
                                                    <?php
													
														if( $limit=""){$limit = 40; }else{$limit = $_POST['limval'];}
															$page=(int)$_GET['page'];
			if(empty($page)){
  			  $page = 1;
			}
			$limit = 40;	 	$page;
		$limitvalue = $page * $limit - ($limit);
		$pageprev = $page -1;
		$page1 = $page + 1;
                                         $qr = $db->select('mailinbox',array('*'),"","order BY inbox_id DESC LIMIT $limitvalue, $limit")->results();
                                         $q = $db->count('mailinbox');

?>
                                                    <span class='pull-right mail_count_nav text-muted'><strong>1</strong> to <strong>20</strong> of <?=$inboxcnt;?></span>

                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12 mail_list">
                                                    <table class="table table-striped table-hover">
                                                    	<?php
                                            if ($q == 0 ) {
                                                echo ('<p>No such information in the Database </p>');
                                            } else {
                                            foreach($qr as $row)
                                            {				
											 $id = $row['inbox_id'];	
											$curdate  = date('Y-m-d');
                                       		$timediff = time() - strtotime($row['timestamp']);
											if ($curdate == date('Y-m-d',strtotime($row['timestamp']))){//same day
												$mailtime  = date('G:i',strtotime($row['timestamp']));			
											}else if($timediff > 60*60*24 and $timediff < 2*60*60*24  ){//second day
												$mailtime = 'Yesterday';
											}else{ //other days
												$mailtime  = date('d M',strtotime($row['timestamp']));														
											}
														?>
                                                        <tr class="unread" id="mail_msg_1">
                                                            <td class=""><input class="iCheck" type="checkbox"></td>
                                                            <td class=""><div class="star"><i class='fa fa-star-o icon-xs icon-orange'></i></div></td>
                                                            <td class=""><a href="mail-view.php?sid=<?= $row['inbox_id'];?>"><?= $row['receiver'];?></a></td>
                                                            <?php    if ($Mailgroup ==""){   ?>
                                                        <td class=""><a href="mail-view.php?sid=<?= $row['inbox_id'];?>&t=inbox"><span class="msgtext"><?= limit_text($row['message'],10);?></span></a></td>
                                                        <?php }else{ 
                                                        $whereConditions = array('group_id ='=>$Mailgroup);
$qr1 = $db->select('newslettergroups',array('*'),$whereConditions)->results();
$group_name = $qr1[0]['group_name'];
?>
                                                        <td class=""><a href="mail-view.php?sid=<?= $row['inbox_id'];?>&t=inbox"><span class="label label-primary"><?= $group_name;?></span>&nbsp;<span class="msgtext"><?= limit_text($row['message'],10);?></span></a></td>
                                                        <?php }  ?>
                                                            <td class="open-view"><span class="msg_time"><?= $mailtime;?></span></td>
                                                        </tr>
                                                        <?php } 
											}?>
                                                    </table>
                                                </div>
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
        <script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 













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




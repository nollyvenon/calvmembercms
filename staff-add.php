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
        <title>Calvary Members' CMS : Add a Staff</title>
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
        <link href="assets/plugins/datepicker/css/datepicker.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" ">
        <!-- START TOPBAR -->
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
                                <h1 class="title">Add a Staff</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="uni-staffs.html">Staff</a>
                                    </li>
                                    <li class="active">
                                        <strong>Add Staff Member</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                                    <form action="#" method="post" enctype="multipart/form-data">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Basic Info</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">
                                        
                                        <?php
									
									if ($_POST['savestaff']){
$id = $_GET['id'];
$fullname = $_POST['fullname'];
$staffdept = $_POST['staffdept'];
$username = $_POST['username'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$level = $_POST['level'];
$dob = $_POST['dob'];
$dateofbirth = $_POST['dateofbirth'];
$position = $_POST['position'];
$phone = $_POST['phone'];
$profimage = $_FILES['profimage'];
$password = generateHash($_POST['password']);
$fbkurl = $_POST['fbkurl'];
$twitterurl = $_POST['twitterurl'];
$googleurl = $_POST['googleurl'];
$memkey = md5(uniqid(rand(), true));									
	$dataArray2[] = array('fullname'=>"$fullname",'dept'=>"$staffdept",'adminname'=>"$username",'level'=>"$level",'gender'=>"$gender",'email'=>"$email",'phone'=>"$phone",'position'=>"$position",'profimage'=>"$profimage",'pwd'=>"$password",'dob'=>"$dob",'fbkurl'=>"$fbkurl",'twitterurl'=>"$twitterurl",'googleurl'=>"$googleurl",'admkey'=>"$memkey"); 
$data = $db->insertBatch('adminu',$dataArray2)->getAllLastInsertId();

if ($profimage != ''){
    $uploaddir = "data/soc-admin/$memkey/";

    if (!is_dir("data/soc-admin/$memkey/")) {
        mkdir("data/soc-admin/$memkey/", 0777, TRUE);
    }	
	
$profimage  = time().$_FILES['profimage']['name'];
  $profimage1 = $uploaddir.$profimage;
	$tmp_file = $_FILES['profimage']['tmp_name'];
	move_uploaded_file($tmp_file, $profimage1);  
	$dataArray = array('profimage'=>"$profimage"); 
$aWhere = array('admkey'=>$memkey);
$db->update('adminu', $dataArray, $aWhere)->affectedRows();
}
                                            if ($data){
                                                echo "<div class=\"btn btn-lg btn-warning btn-block\">Staff added Successfully</div>";
                                            }										
									}
									
									?>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Name</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" name="fullname" value="" class="form-control" id="field-1">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-5">Department</label>
                                                <span class="desc"></span>
                                                <select name="staffdept" id="staffdept" class="form-control">
                  <?php 
		echo "<option value='' selected='selected'> Select a Department </option>";
		$qr = $db->select('staffdept',array('*'))->results();
		foreach($qr as $fet){
		$dept_id=$fet['dept_id'];
		$dept_name=$fet['dept_name'];		
		?>
        <option value="<?= $dept_id;?>" <?php if ($cu_dept==$dept_id) { echo "selected='selected'";} ?>><?= $dept_name;?></option>
        <?php  } ?>
                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-5">Right Type</label>
                                                <span class="desc"></span>
                                                <select name="level" id="level" class="form-control">
                  <?php 
		echo "<option value='' selected='selected'> Assign Right </option>";
		$qr = $db->select('userpriv',array('*'))->results();
		foreach($qr as $fet){
		$accttype=$fet['accttype'];
		$usergroup=$fet['usergroup'];		
		?>
        <option value="<?= $usergroup;?>" <?php if ($cu_usergroup==$usergroup) { echo "selected='selected'";} ?>><?= $accttype;?></option>
        <?php  } ?>
                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Position</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="position" type="text" value="" class="form-control" id="field-1">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="form-label" for="field-5">Date of Birth</label>
                                                <span class="desc">e.g. "04/03/2015"</span>
                                                <div class="controls">
                                                    <input name="dateofbirth" type="text" value="" class="form-control datepicker" data-format="mm/dd/yyyy" value="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-5">Gender</label>
                                                <span class="desc"></span>
                                                <select name="gender" class="form-control">
                                                    <option></option>
                                                    <option >Male</option>
                                                    <option >Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Profile Image</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="profimage" type="file" class="form-control" id="field-5">
                                                </div>
                                            </div>

                                        </div>

                                </div>


                            </div>
                        </section></div>


                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Staff Account Info</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Username</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="username" type="text" value="" class="form-control" id="field-3">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Email</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="email" type="text" value="" class="form-control" id="field-3">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-2">Phone</label>
                                                <span class="desc">e.g. "(234) 253-5353"</span>
                                                <div class="controls">
                                                    <input name="phone" type="text" value="" class="form-control" id="field-2" data-mask="phone"  placeholder="(999) 999-9999">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-2">Password</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="password" type="password" value="" class="form-control" id="field-2">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-2">Confirm Password</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cpassword" type="password"  value="" class="form-control" id="field-21">
                                                </div>
                                            </div>
                                        </div>

                                </div>

                            </div>
                        </section></div>

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Staff Social Media Info</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">

                                            <div class="form-group">
                                                <label class="form-label" for="fbkurl">Facebook URL</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control"  value="" id="fbkurl" name="fbkurl">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="twitterurl">Twitter URL</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" id="twitterurl" name="twitterurl" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="googleurl">Google Plus URL</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" id="googleurl" name="googleurl" class="form-control" >
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                            <div class="text-left">
                                                <input id="savestaff" name="savestaff" type="submit" value="Save Staff" class="btn btn-primary">
                                                <button type="reset" class="btn">Cancel</button>
                                            </div>
                                        </div>

                                    
                                </div>


                            </div>
                        </section></div>
</form>
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
        <script src="assets/plugins/datepicker/js/datepicker.js" type="text/javascript"></script> <script src="assets/plugins/autosize/autosize.min.js" type="text/javascript"></script><script src="assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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




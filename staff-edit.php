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
        <title>Calvary Members' CMS : Edit Staff</title>
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
                                <h1 class="title">Edit Staff</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="uni-staffs.html">Staff</a>
                                    </li>
                                    <li class="active">
                                        <strong>Edit Staff Member</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
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
                                    <form action ="#" method="post">
                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">
                                        
                                        <?php
$id = $_GET['sid'];
$whereCondition = array('admkey'=>"$id");
$qr = $db->select('adminu',array('*'),$whereCondition,'order BY staffid DESC')->results();
$q = $db->count('adminu',"admkey ='$id'"); 
		if ($q == 0 ) {
			echo ('<p>No such information in the Database </p>');		
		} else {
			foreach($qr as $row)
			{
				$id = $row['cu_id'];
				$adminname = $row['adminname'];
				$pwd = $row['pwd'];
				$level = $row['level'];
				$fullname = $row['fullname'];
                $email = $row['email'];
                $cu_dept = $row['dept'];
                $gender = $row['gender'];
                $phone = $row['phone'];
                $dob = $row['dob'];
                $position = $row['position'];
                $profimage = $row['profimage'];
                $admkey = $row['admkey'];
			}
		}
									
									if ($_POST['editstaff']){
$id = $_GET['id'];
$fullname = $_POST['fullname'];
$staffdept = $_POST['staffdept'];
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$dateofbirth = $_POST['dateofbirth'];
$position = $_POST['position'];
$phone = $_POST['phone'];
$profimage = $_FILES['profimage'];
$password = generateHash($_POST['password']);
$fbkurl = $_POST['fbkurl'];
$twitterurl = $_POST['twitterurl'];
$googleurl = $_POST['googleurl'];
	$dataArray2 = array('fullname'=>"$fullname",'dept'=>"$staffdept",'adminname'=>"$username",'gender'=>"$gender",'email'=>"$email",'phone'=>"$phone",'position'=>"$position",'profimage'=>"$profimage",'pwd'=>"$password",'fbkurl'=>"$fbkurl",'twitterurl'=>"$twitterurl",'googleurl'=>"$googleurl"); 
		$aWhere = array('admkey'=>$id);
		 $sql = $db->update('adminu', $dataArray2, $aWhere)->affectedRows();

if ($profimage != ''){
    $uploaddir = "data/soc-admin/$admkey/";

    if (!is_dir("data/soc-admin/$admkey/")) {
        mkdir("data/soc-admin/$admkey/", 0777, TRUE);
    }	
	
$profimage  = time().$_FILES['profimage']['name'];
  $profimage1 = $uploaddir.$profimage;
	$tmp_file = $_FILES['profimage']['tmp_name'];
	move_uploaded_file($tmp_file, $profimage1);  
	$dataArray = array('profimage'=>"$profimage"); 
$aWhere = array('admkey'=>$id);
$db->update('adminu', $dataArray, $aWhere)->affectedRows();
}

if ($_POST['cpassword'] != '' and $_POST['password'] != '' and $_POST['cpassword']==$_POST['password']){
	
	$dataArray = array('pwd'=>"$password"); 
$aWhere = array('admkey'=>$id);
$data = $db->update('adminu', $dataArray, $aWhere)->affectedRows();
}
	
                                            if ($data){
                                                echo "<div class=\"btn btn-lg btn-warning btn-block\">Staff updated Successfully</div>";
                                            }										
									}
									
									?>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Name</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" value="<?= $fullname;?>" name="fullname" class="form-control" id="field-1">
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
                                                <label class="form-label" for="field-1">Position</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="position" type="text"  value="<?= $position;?>" class="form-control" id="field-1">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="form-label" for="field-5">Date of Birth</label>
                                                <span class="desc">e.g. "04/03/2015"</span>
                                                <div class="controls">
                                                    <input name="dateofbirth" type="text"  value="<?= date('d-m-Y',strtotime($dob));?>" class="form-control datepicker" data-format="mm/dd/yyyy">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-5">Gender</label>
                                                <span class="desc"></span>
                                                <select id="gender" name="cu_gender" class="form-control">
                                                    <option></option>
                                                    <option value="Male" <?php if ($gender=='Male') { echo "selected='selected'";} ?>>Male</option>
                                                    <option value="Female" <?php if ($gender=='Female') { echo "selected='selected'";} ?>>Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Profile Image</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                <img src="data/soc-admin/<?= $admkey;?>/<?= $profimage;?>" width="100" height="85" alt=" " />
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
                                <h2 class="title pull-left">Staff Account Info(Change Password)</h2>
                               
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
                                                    <input name="username" type="text" class="form-control" id="field-3"  value="<?= $adminname;?>" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Email</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="email" type="text" value="<?= $email;?>" class="form-control" id="field-3">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-2">Phone</label>
                                                <span class="desc">e.g. "(234) 253-5353"</span>
                                                <div class="controls">
                                                    <input name="phone" type="text" value="<?= $phone;?>" class="form-control" id="field-2" data-mask="phone"  placeholder="(999) 999-9999">
                                                </div>
                                            </div>
                                            <h4>To change password, enter new password</h4>
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
                                                <label class="form-label" for="field-1">Facebook URL</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control"  value="<?php echo $fbkurl;?>" id="fbkurl" name="fbkurl">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Twitter URL</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control"  value="<?php echo $twitterurl;?>" id="twitterurl" name="twitterurl">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Google Plus URL</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control"  value="<?php echo $googleurl;?>" id="googleurl" name="googleurl">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                            <div class="text-left">
                                                <button type="submit" name="editstaff" class="btn btn-primary">Edit Staff</button>
                                                <button type="reset" class="btn">Cancel</button>
                                            </div>
                                        </div>

                                    </form>
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




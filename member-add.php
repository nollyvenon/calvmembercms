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
        <title>Calvary Members' CMS : Add a Member</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">	<!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->

        <script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script> 



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
        		<script type="text/javascript" src="assets/js/jquery-dynamic-form.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){	
				$("#duplicate").dynamicForm("#plus", "#minus", {limit:50, createColor: 'yellow',removeColor: 'red'});
				
			});
			$(document).ready(function(){	
				$("#duplicate2").dynamicForm("#plus", "#minus", {limit:50, createColor: 'yellow',removeColor: 'red'});
				
			});
		</script>
<style>
#regFrame{
    display: none;
}
</style>
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
            <?php
            if (!in_array(9,$allid1)){
                header('Location:restricted.php');
            }?>
            <!--  SIDEBAR - END -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Add a Member</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="#"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Members</a>
                                    </li>
                                    <li class="active">
                                        <strong>Add Member</strong>
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
                                    <?php

									
									if ($_POST['submprofile']){
$id = $_GET['id'];
$cu_title = $_POST['cu_title'];
$cu_first_name = $_POST['cu_first_name'];
$cu_last_name = $_POST['cu_last_name'];
$cu_phone = $_POST['cu_phone'];
$cu_email = $_POST['cu_email'];
$cu_joindate = $_POST['cu_joindate'];
$cu_mem_level = $_POST['cu_mem_level'];
$mem_startdate = $_POST['mem_startdate'];
$mem_enddate = $_POST['mem_enddate'];
$cu_dob = $_POST['cu_dob'];
$cu_gender = $_POST['cu_gender'];
$cu_image_url = $_FILES['cu_image_url'];
$cu_address = $_POST['cu_address'];
$cu_city = $_POST['cu_city'];
$cu_state_of_residence = $_POST['cu_state_of_residence'];
$cu_community = $_POST['cu_community'];
$cu_state_origin = $_POST['cu_state_origin'];
$cu_lga_origin = $_POST['cu_lga_origin'];
$employ_status = $_POST['employ_status'];
$cu_branch = $_POST['cu_branch'];
$cu_cell_unit = $_POST['cu_cell_unit'];
$cu_marital_status = $_POST['cu_marital_status'];
$cu_no_of_child = $_POST['cu_no_of_child'];
$cu_marriage_date = $_POST['cu_marriage_date'];
$cu_demise_death = $_POST['cu_demise_death'];
$cu_occupation = $_POST['cu_occupation'];
$cu_utility = $_POST['cu_utility'];
$cu_profile = $_POST['cu_profile'];
$cu_groupid = $_POST['cu_groupid'];
$cu_exit_date = $_POST['cu_exit_date'];
$cu_transfer_date = $_POST['cu_transfer_date'];
$cu_remark = $_POST['cu_remark'];
$cu_born_again = $_POST['cu_born_again'];
$cu_former_church = $_POST['cu_former_church'];
$cu_nearbusstop = $_POST['cu_nearbusstop'];
$cu_spouse = $_POST['cu_spouse'];
$cu_place_of_work = $_POST['cu_place_of_work'];
$cu_ministry_unit = $_POST['cu_ministry_unit'];
$cu_office_add = $_POST['cu_office_add'];
$cu_next_of_kin = $_POST['cu_next_of_kin'];
$cu_next_of_kin_add = $_POST['cu_next_of_kin_add'];
$password = generateHash($_POST['cu_password']);
$fbkurl = $_POST['fbkurl'];
$twitterurl = $_POST['twitterurl'];
$googleurl = $_POST['googleurl'];
$childname = $_POST['childname'];
$childdob = $_POST['ch_dob'];
$memkey = md5(uniqid(rand(), true));				
//$childname = implode(',', $_POST['childname']);
//$childdob = implode(',', $_POST['ch_dob']);
	$dataArray2[] = array('cu_title'=>"$cu_title",'cu_first_name'=>"$cu_first_name",'cu_last_name'=>"$cu_last_name",'cu_phone'=>"$cu_phone",'cu_gender'=>"$cu_gender",'cu_dob'=>"$cu_dob",'cu_image_url'=>"$cu_image_url",'cu_address'=>"$cu_address",'cu_city'=>"$cu_city",'cu_state_of_residence'=>"$cu_state_of_residence",'cu_community'=>"$cu_community",'cu_state_origin'=>"$cu_state_origin",'cu_lga_origin'=>"$cu_lga_origin",'cu_employ_status'=>"$employ_status",'cu_branch'=>"$cu_branch",'cu_cell_unit'=>"$cu_cell_unit",'cu_marital_status'=>"$cu_marital_status",'cu_no_of_child'=>"$cu_no_of_child",'cu_marriage_date'=>"$cu_marriage_date",'cu_demise_death'=>"$cu_demise_death",'cu_occupation'=>"$cu_occupation",'cu_utility'=>"$cu_utility",'cu_exit_date'=>"$cu_exit_date",'cu_groupid'=>"$cu_groupid",'cu_transfer_date'=>"$cu_transfer_date",'cu_profile'=>"$cu_profile",'cu_remark'=>"$cu_remark",'cu_password'=>"$password",'fbkurl'=>"$fbkurl",'twitterurl'=>"$twitterurl",'googleurl'=>"$googleurl",'memkey'=>"$memkey",'cu_joindate'=>"$cu_joindate",'cu_born_again'=>"$cu_born_again",'cu_former_church'=>"$cu_former_church",'cu_nearbusstop'=>"$cu_nearbusstop",'cu_spouse'=>"$cu_spouse",'cu_place_of_work'=>"$cu_place_of_work",'cu_ministry_unit'=>"$cu_ministry_unit",'cu_office_add'=>"$cu_office_add",'cu_next_of_kin'=>"$cu_next_of_kin",'cu_next_of_kin_add'=>"$cu_next_of_kin_add"); 
$data = $db->insertBatch('members',$dataArray2)->getAllLastInsertId();

foreach($cu_mem_level as $a => $b){
	$dataArray3[] = array('mem_id'=>"$memkey",'mem_type'=>"$cu_mem_level",'mem_startdate'=>"$mem_startdate",'mem_enddate'=>"$mem_enddate"); 
	$data = $db->insertBatch('membershiplogs',$dataArray3)->getAllLastInsertId();
}

foreach($childname as $a => $b){
	$dataArray4[] = array('ch_parent_id'=>"$memkey",'ch_fullname'=>"$childname",'childdob'=>"$childdob"); 
	$data = $db->insertBatch('children',$dataArray4)->getAllLastInsertId();
}
			
if ($cu_image_url != ''){
    $uploaddir = "data/soc-members/$memkey/";

    if (!is_dir("data/soc-members/$memkey/")) {
        mkdir("data/soc-members/$memkey/", 0777, TRUE);
    }	
	
$cu_image_url  = time().$_FILES['cu_image_url']['name'];
  $cu_image_url1 = $uploaddir.$cu_image_url;
	$tmp_file = $_FILES['cu_image_url']['tmp_name'];
	move_uploaded_file($tmp_file, $cu_image_url1);  
	$dataArray = array('cu_image_url'=>"$cu_image_url"); 
$aWhere = array('cu_id'=>$id);
$db->update('members', $dataArray, $aWhere)->affectedRows();
}
                                            if ($data){
                                                echo "<div class=\"btn btn-lg btn-warning btn-block\">Member added Successfully</div>";
                                            }										
									}
									
									?>

                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Title</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" value="<?= $cu_title;?>" class="form-control" id="cu_title" name="cu_title">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">First Name</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" value="<?= $cu_first_name;?>" class="form-control" id="cu_first_name" name="cu_first_name">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Last Name</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" value="<?= $cu_last_name;?>" class="form-control" id="cu_last_name" name="cu_last_name">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Phone</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" value="<?= $cu_phone;?>" class="form-control" id="cu_phone" name="cu_phone">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Email</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" value="<?= $cu_email;?>" class="form-control" id="cu_email" name="cu_email">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Join Date</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input id="cu_joindate" name="cu_joindate" type="text" value="<?= date('d-m-Y',time());?>" class="form-control datepicker" data-format="dd/mm/yyyy" >
                                                </div>
                                            </div>                                            
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Membership</label>
                                           
                                            <div class="form-group col-md-12">
                                              <label class="col-md-5">Membership Type:<span class="required">*</span></label>
                                                  <label class="col-md-3">Start Date:<span class="required">*</span></label>
                                                  <label class="col-md-3">End Date:<span class="required">*</span></label>
                                                  <div id="duplicate2" class="col-md-12">
                                                  
                                                  	<div class="col-md-5 col-xs-4"><select name="cu_mem_level" id="cu_mem_level" class="form-control">
                  <?php 
		echo "<option value='' selected='selected'> Select a Membership Level </option>";
		$qr = $db->select('membership_level',array('*'))->results();
		foreach($qr as $fet){
		$level_id=$fet['level_id'];
		$level_name=$fet['level_name'];		
		?>
        <option value="<?= $level_id;?>" <?php if ($cu_mem_level==$level_id) { echo "selected='selected'";} ?>><?= $level_name;?></option>
        <?php  } ?>
                </select></div>
                                                      <div class="col-md-3 col-xs-6"><input id="mem_startdate" name="mem_startdate" type="text" value="<?= date('d-m-Y',time());?>" class="form-control datepicker" data-format="dd/mm/yyyy"></div>
                                                
                                                        <div class="col-md-3 col-xs-6"><input id="mem_enddate" name="mem_enddate" type="text" value="<?= date('d-m-Y',time());?>" class="form-control datepicker" data-format="dd/mm/yyyy" > </div>
                                                 <div class="col-md-1 col-xs-11"><span><a id="minus" href=""  >[-]</a> <a id="plus" href="">[+]</a></span></div>
                                                 </div>
                                               </div>
                                               
                                            <div class="form-group">
                                                <label class="form-label" for="field-5">Date of Birth</label>
                                                <span class="desc">e.g. "04/03/2015"</span>
                                                <div class="controls">
                                                    <input id="cu_dob" name="cu_dob" type="text" value="<?= date('d-m-Y',time());?>" class="form-control datepicker" data-format="dd/mm/yyyy" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-5">Gender</label>
                                                <span class="desc"></span>
                                                <select id="cu_gender" name="cu_gender" class="form-control">
                                                    <option></option>
                                                    <option value="Male" <?php if ($cu_gender=='Male') { echo "selected='selected'";} ?>>Male</option>
                                                    <option value="Female" <?php if ($cu_gender=='Female') { echo "selected='selected'";} ?>>Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Profile Image</label>
                                                <span class="desc"></span>
                                                <?php  if ($cu_image_url != "" and file_exists("images/campusgists/$cu_image_url")){  ?>
                                       <img class="img-responsive" src="data/soc-members/<?= $cu_image_url;?>" alt="" style="max-width:120px;">
                                          <?php }else{ ?>
                                       <img class="img-responsive" src="data/soc-members/default.jpg" alt="" style="max-width:120px;">                                      
											  
									<?php	  } ?>
                                                <div class="controls">
                                                    <input type="file" id="cu_image_url" name="cu_image_url" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Address</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_address" type="text" value="<?= $cu_address;?>" class="form-control" id="cu_address">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">City</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_city" type="text" value="<?= $cu_city;?>" class="form-control" id="cu_city">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">LGA</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_lga" type="text" value="<?= $cu_lga;?>" class="form-control" id="cu_lga">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">State of Residence</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_state_of_residence" type="text" value="<?= $cu_state_of_residence;?>" class="form-control" id="cu_state_of_residence">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Community</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" name="cu_community" value="<?= $cu_community;?>" class="form-control" id="cu_community">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">State of Origin</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" name="cu_state_origin" value="<?= $cu_state_origin;?>" class="form-control" id="cu_state_origin">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">LGA of Origin</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" name="cu_lga_origin" value="<?= $cu_lga_origin;?>" class="form-control" id="cu_lga_origin">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Employment Status</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <select name="employ_status" id="employ_status" class="form-control">
                  <?php 
		echo "<option value='' selected='selected'> Select Employment Status </option>";
		$qr = $db->select('employment_status',array('*'))->results();
		foreach($qr as $fet){
		$status_id=$fet['status_id'];
		$status_name=$fet['status_name'];		
		?>
        <option value="<?= $status_id;?>" <?php if ($cu_employ_status==$status_id) { echo "selected='selected'";} ?>><?= $status_name;?></option>
        <?php  } ?>
                </select>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Branch</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <select name="cu_branch" id="cu_branch" class="form-control">
                  <?php 
		echo "<option value='' selected='selected'> Select Branch </option>";
		$qr = $db->select('branches',array('*'))->results();
		foreach($qr as $fet){
		$branch_id=$fet['branch_id'];
		$branch_name=$fet['branch_name'];		
		?>
        <option value="<?= $branch_id;?>" <?php if ($cu_branch==$branch_id) { echo "selected='selected'";} ?>><?= $level_name;?></option>
        <?php  } ?>
                </select>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Cell Unit</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_cell_unit" type="text" value="<?= $cu_cell_unit;?>" class="form-control" id="cu_cell_unit">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Marital Status</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                   <select name="cu_marital_status" id="cu_marital_status" class="form-control">
                  <?php 
		echo "<option value='' selected='selected'> Select Status </option>";
		$qr = $db->select('maristatus',array('*'))->results();
		foreach($qr as $fet){
		$status_id=$fet['status_id'];
		$status_name=$fet['status_name'];		
		?>
        <option value="<?= $status_id;?>" <?php if ($cu_marital_status==$status_id) { echo "selected='selected'";} ?>><?= $status_name;?></option>
        <?php  } ?>
                </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Born Again?</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <select name="cu_born_again" id="cu_born_again" class="form-control">
         <option value="True" <?php if (strtoupper($cu_born_again)=='TRUE') { echo "selected='selected'";} ?>>True</option>
         <option value="False" <?php if (strtoupper($cu_born_again)=='FALSE') { echo "selected='selected'";} ?>>False</option>
                </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Former Church</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_former_church" type="text" value="<?= $cu_former_church;?>" class="form-control" id="cu_former_church">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Next Bus Stop</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_nearbusstop" type="text" value="<?= $cu_nearbusstop;?>" class="form-control" id="cu_nearbusstop">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Spouse</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_spouse" type="text" value="<?= $cu_spouse;?>" class="form-control" id="cu_spouse">
                                                </div>
                                            </div>                                           
                                             <div class="form-group">
                                                <label class="form-label" for="field-1">Place of Work</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_place_of_work" type="text" value="<?= $cu_place_of_work;?>" class="form-control" id="cu_place_of_work">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Office Address</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_office_add" type="text" value="<?= $cu_office_add;?>" class="form-control" id="cu_office_add">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Next of Kin</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_next_of_kin" type="text" value="<?= $cu_next_of_kin;?>" class="form-control" id="cu_next_of_kin">
                                                </div>
                                            </div>  
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Next of Kin Address</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_next_of_kin_add" type="text" value="<?= $cu_next_of_kin_add;?>" class="form-control" id="cu_next_of_kin_add">
                                                </div>
                                            </div>                                         
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Ministry Unit</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_ministry_unit" type="text" value="<?= $cu_ministry_unit;?>" class="form-control" id="cu_ministry_unit">
                                                </div>
                                            </div>                                                                                        
                                            <div class="form-group">
                                              <label class="col-md-12">CHILDREN DETAILS:<span class="required">*</span></label>
                                                  <label class="col-md-6">Name:<span class="required">*</span></label>
                                                  <label class="col-md-6">Age:<span class="required">*</span></label>
                                                  <div id="duplicate" class="col-md-12">
                                                      <div class="col-md-6 col-xs-6"><input name="childname" class="form-control" type="text" size="35" /> </div>
                                                
                                                        <div class="col-md-4 col-xs-6"><input id="ch_dob" name="ch_dob" type="text" value="<?= date('d-m-Y',time());?>" class="form-control datepicker" data-format="dd/mm/yyyy" >(in years) </div>
                                                 <div class="col-md-2 col-xs-11"><span><a id="minus" href=""  >[-]</a> <a id="plus" href="">[+]</a></span></div>
                                                 </div>
                                               </div> 
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Marriage Date</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" id="cu_marriage_date" name="cu_marriage_date" value="" class="form-control datepicker" data-format="dd/mm/yyyy">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Demise Date (if applicable)</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" id="cu_demise_death" name="cu_demise_death" value="" class="form-control datepicker" data-format="dd/mm/yyyy">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Occupation</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_occupation" type="text" value="" class="form-control" id="cu_occupation">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Utility</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input name="cu_utility" type="text" value="<?= $cu_utility;?>" class="form-control" id="cu_utility">
                                                </div>
                                            </div> 
                                             <div class="form-group">
                                                <label class="form-label" for="field-1">Transfer Date (if applicable)</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" id="cu_transfer_date" name="cu_transfer_date" value="" class="form-control datepicker" data-format="dd/mm/yyyy">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Exit Date (if applicable)</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" id="cu_exit_date" name="cu_exit_date" value="" class="form-control datepicker" data-format="dd/mm/yyyy">
                                                </div>
                                            </div>
                                          <!--  <div class="form-group">
                                                <label class="form-label" for="field-1">Mail Group (if applicable)</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <select name="cu_groupid" id="cu_groupid" class="form-control">
                  <?php 
		echo "<option value='' selected='selected'> Select Status </option>";
		$qr = $db->select('newslettergroups',array('*'))->results();
		foreach($qr as $fet){
		$group_id=$fet['group_id'];
		$group_name=$fet['group_name'];		
		?>
        <option value="<?= $status_id;?>" <?php if ($cu_groupid==$group_id) { echo "selected='selected'";} ?>><?= $group_name;?></option>
        <?php  } ?>
                </select>
                                                </div>
                                            </div>-->                                            

                                            <div class="form-group">
                                                <label class="form-label" for="field-6">Brief</label>
                                                <span class="desc">e.g. "Enter any size of text description here"</span>
                                                <div class="controls">
                                                    <textarea name="cu_profile" class="form-control autogrow" cols="5" id="cu_profile"><?php echo $cu_profile;?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-6">Remarks</label>
                                                <div class="controls">
                                                    <textarea name="cu_remark" class="form-control autogrow" cols="5" id="cu_remark"><?php echo $cu_remark;?></textarea>
                                                </div>
                                            </div>

                                </div>


                            </div>
                        </section></div>


                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Member Account Info</h2>
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
                                                <label class="form-label" for="field-2">Password</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="password" value="" class="form-control" id="cu_password" name="cu_password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-2">Confirm Password</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="password"  value="" class="form-control" id="cu_password1" name="cu_password1">
                                                </div>
                                            </div>
                                        </div>

                                </div>


                            </div>
                        </section></div>

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Member Social Media Info</h2>
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
                                                    <input type="text" class="form-control"  value="" id="fbkurl" name="fbkurl">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Twitter URL</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" id="twitterurl" name="twitterurl" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Google Plus URL</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" id="googleurl" name="googleurl" class="form-control" >
                                                </div>
                                            </div>

                                        </div>
                                            <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                                <div class="text-left">
                                                    <input id="submprofile" name="submprofile" type="submit" value="Save Member" class="btn btn-primary">
                                                    <button type="button" class="btn">Cancel</button>
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




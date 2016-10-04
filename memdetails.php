<?php
ob_start();
include_once "Connections/conn.php";
include_once "Connections/functions.php";

			  			  $sid=$_GET['sid'];
					   
$whereConditions = array('memkey ='=>$sid);
$selectFields = array('*'); 
$qr = $db->select('members', $selectFields, $whereConditions)->results();
foreach($qr as $row)
			{
				$id = $row['cu_id'];
				$cu_first_name = $row['cu_first_name'];
				$cu_last_name = $row['cu_last_name'];
				$cu_other_name = $row['cu_last_name'];
				$cu_phone = $row['cu_phone'];
				$cu_email = $row['cu_email'];
                $cu_mem_level = $row['cu_mem_level'];
                $cu_dob = $row['cu_dob'];
                $cu_gender = $row['cu_gender'];
                $cu_image_url = $row['cu_image_url'];
                $cu_address = $row['cu_address'];
                $cu_city = $row['cu_city'];
                $memkey = $row['memkey'];
                $cu_state_of_residence = $row['cu_state_of_residence'];
                $cu_community = $row['cu_community'];
                $cu_state_origin = $row['cu_state_origin'];
                $cu_lga_origin = $row['cu_lga_origin'];
                $cu_employ_status = $row['cu_employ_status'];
                $cu_branch = $row['cu_branch'];
                $cu_born_again = $row['cu_born_again'];
                $cu_former_church = $row['cu_former_church'];
                $cu_nearbusstop = $row['cu_nearbusstop'];
                $cu_spouse = $row['cu_spouse'];
                $cu_place_of_work = $row['cu_place_of_work'];
                $cu_ministry_unit = $row['cu_ministry_unit'];
                $cu_office_add = $row['cu_office_add'];
                $cu_next_of_kin = $row['cu_next_of_kin'];
                $cu_next_of_kin_add = $row['cu_next_of_kin_add'];
				$cu_joindate = $row['cu_joindate'];
                $cu_cell_unit = $row['cu_cell_unit'];
                $cu_marital_status = $row['cu_marital_status'];
                $cu_no_of_child = $row['cu_no_of_child'];
                $cu_marriage_date = $row['cu_marriage_date'];
                $cu_demise_death = $row['cu_demise_death'];
                $cu_utility = $row['cu_utility'];
                $cu_profile = $row['cu_profile'];
                $cu_remark = $row['cu_remark'];
                $cu_occupation = $row['cu_occupation'];
                $fbkurl = $row['fbkurl'];
                $twitterurl = $row['twitterurl'];
                $googleurl = $row['googleurl'];
				
			}
			$aWhere = array('status_id'=>$cu_employ_status);
			$q = $db->select('employment_status',array('*'),$aWhere)->results();
			$status_name = $q[0]['status_name'];

				$fullname = $cu_first_name.' '.$cu_last_name;
?><!DOCTYPE html>
<html class=" ">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Calvary Members' CMS : Member Profile</title>
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
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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
                                <h1 class="title">Member Profile</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="soc-members.html">Members</a>
                                    </li>
                                    <li class="active">
                                        <strong>Member Profile</strong>
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
                                        <div class="uprofile-image">
                                            <img src="data/soc-members/<?= $memkey;?>/<?= $cu_image_url;?>" class="img-responsive">
                                        </div>
                                        <div class="uprofile-name">
                                            <h3>
                                                <a href="#"><?= $cu_first_name. ' '.$cu_last_name. ' '.$cu_other_name;?></a>
                                                <!-- Available statuses: online, idle, busy, away and offline -->
                                                <span class="uprofile-status online"></span>
                                            </h3>
                                            <p class="uprofile-title"><?= $cu_first_name. ' '.$cu_last_name. ' '.$cu_other_name;?></p>
                                        </div>
                                        <p class='text-center'><?= $cu_remark;?></p>
                                        <div class="uprofile-buttons">
                                            <a href="sendmessage.php?zz=<?= $id;?>" class="btn btn-md btn-primary">Send Message</a>
                                         <!--   <a class="btn btn-md btn-primary">Add as Friend</a>-->
                                        </div>

                                        <div class=" uprofile-social">
                                            <a href="<?= $fbkurl;?>" class="btn btn-primary btn-md facebook"><i class="fa fa-facebook icon-xs"></i></a>
                                            <a href="<?= $twitterurl;?>" class="btn btn-primary btn-md twitter"><i class="fa fa-twitter icon-xs"></i></a>
                                            <a href="<?= $googleurl;?>" class="btn btn-primary btn-md google-plus"><i class="fa fa-google-plus icon-xs"></i></a>
                                            <a href="<?= $cu_profile;?>" class="btn btn-primary btn-md dribbble"><i class="fa fa-dribbble icon-xs"></i></a>
                                        </div> 

                                    </div>
                                    <div class="col-md-9 col-sm-8 col-xs-12">

                                        <div class="uprofile-content">

                                            <div class="">

                                                <h4>Biography:</h4>
                                                <p><?= $cu_profile;?> </p>
                                                <p>Title: <?= $cu_title;?> </p>
                                                <p>Phone: <?= $cu_phone;?> </p>
                                                <p>Email: <?= $cu_email;?> </p>
                                                <p>Branch: <?= $cu_branch;?> </p>
                                                <p>Address: <?= $cu_address;?> </p>
                                                <p>City: <?= $cu_city;?> </p>
                                                <p>LGA: <?= $cu_lga;?> </p>
                                                <p>State of Residence: <?= $cu_state_of_residence;?> </p>
                                                <p>Cell Unit: <?= $cu_cell_unit;?> </p>
                                                <p>Gender: <?= $cu_gender;?> </p>
                                                <p>Occupation: <?= $cu_occupation;?> </p>
                                                <p>Date of Birth: <?= $cu_dob;?> </p>
                                                <p>Marital Status: <?= $cu_marital_status;?> </p>
                                                <p>Gender: <?= $cu_gender;?> </p>
                                                <p>Join Date: <?= $cu_joindate;?> </p>
                                                <p>Employment Status: <?= $status_name;?> </p>
                                                <p>Born Again: <?= $cu_born_again;?> </p>
                                                <p>Former Church: <?= $cu_former_church;?> </p>
                                                <p>Community: <?= $cu_community;?> </p>
                                                <p>Nearest Bus Stop: <?= $cu_nearbusstop;?> </p>
                                                <p>LGA of Origin: <?= $cu_lga_origin;?> </p>
                                                <p>State of Origin: <?= $cu_state_origin;?> </p>
                                                <p>Spouse: <?= $cu_spouse;?> </p>
                                                <p>Place of Work: <?= $cu_place_of_work;?> </p>
                                                <p>Ministry Unit: <?= $cu_ministry_unit;?> </p>
                                                <p>Place of Work: <?= $cu_place_of_work;?> </p>
                                                <p>Office Address: <?= $cu_office_add;?> </p>
                                                <p>Next of Kin: <?= $cu_next_of_kin;?> </p>
                                                <p>Next of Kin Address: <?= $cu_next_of_kin_add;?> </p>
                                                <p>Address: <?= $cu_place_of_work;?> </p>
                                                
                                               <!-- <br><h4>Profile Activity:</h4>                

                                                <div class="enter_post col-md-12 col-sm-12 col-xs-12">

                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <textarea class="form-control autogrow" id="field-7"  placeholder="What's on your mind?"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="enter_post_btns col-md-12 col-sm-12 col-xs-12">
                                                        <a href="#" class="btn btn-md pull-right btn-primary">Post</a>
                                                        <a href="#" class="btn btn-md pull-right btn-link"><i class="fa fa-image"></i></a>
                                                        <a href="#" class="btn btn-md pull-right btn-link"><i class="fa fa-map-marker"></i></a>
                                                    </div>
                                                </div>-->

                                                <div class="clearfix"></div>


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
        <script src="assets/plugins/autosize/autosize.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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




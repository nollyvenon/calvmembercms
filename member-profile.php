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
                                    <?php
											$sid = $_GET['sid'];
											$whereCondition = array('memkey'=>"$sid");
											$qr = $db->select('members',array('*'),$whereCondition,'order BY cu_id DESC')->results();
											$q = $db->count('members',"memkey ='$sid'"); 
                                            if ($q == 0 ) {
                                                echo ('<p>No such information in the Database </p>');
                                            } else {
											  foreach($qr as $row)
											  {
																$cu_id = $row['cu_id'];
				$cu_first_name = $row['cu_first_name'];
				$cu_last_name = $row['cu_last_name'];
				$cu_phone = $row['cu_phone'];
				$cu_email = $row['cu_email'];
                $cu_mem_level = $row['cu_mem_level'];
                $cu_dob = $row['cu_dob'];
                $cu_gender = $row['cu_gender'];
                $cu_image_url = $row['cu_image_url'];
                $cu_address = $row['cu_address'];
                $cu_city = $row['cu_city'];
                $cu_state_of_residence = $row['cu_state_of_residence'];
                $cu_community = $row['cu_community'];
                $cu_state_origin = $row['cu_state_origin'];
                $cu_lga_origin = $row['cu_lga_origin'];
                $employ_status = $row['employ_status'];
                $cu_branch = $row['cu_branch'];
                $cu_cell_unit = $row['cu_cell_unit'];
                $cu_marital_status = $row['cu_marital_status'];
                $cu_no_of_child = $row['cu_no_of_child'];
                $cu_marriage_date = $row['cu_marriage_date'];
                $cu_demise_death = $row['cu_demise_death'];
                $cu_utility = $row['cu_utility'];
                $cu_profile = $row['cu_profile'];
                $cu_remark = $row['cu_remark'];
                $cu_occupation = $row['cu_occupation'];
				$cu_groupid = $_POST['cu_groupid'];
				$cu_exit_date = $_POST['cu_exit_date'];
				$cu_transfer_date = $_POST['cu_transfer_date'];
				$memkey = $_POST['memkey'];

                $fbkurl = $row['fbkurl'];
                $twitterurl = $row['twitterurl'];
                $googleurl = $row['googleurl'];
												  
												  //get current age
												  $strdob = strtotime($cu_dob);
												  $time = time();
												  $age = ($time - $strdob)/24*60*60;
											  }
											}
											  ?>
                                        <div class="uprofile-image">
                                            <img src="data/soc-members/<?=$cu_image_url;?>" class="img-responsive">
                                        </div>
                                        <div class="uprofile-name">
                                            <h3>
                                                <a href="#"><?= $cu_title.' '.$cu_first_name.' '.$cu_last_name;?></a>
                                                <!-- Available statuses: online, idle, busy, away and offline -->
                                                <span class="uprofile-status online"></span>
                                            </h3>
                                            <p class="uprofile-title"><?= $cu_occupation;?></p>
                                        </div>
                                        <p class='text-center'><?= $cu_remark;?></p>
                                        <div class="uprofile-buttons">
                                            <a href="compose-message.php?sie=<?=$memkey;?>" class="btn btn-md btn-primary">Send Message</a>
                                           <!-- <a class="btn btn-md btn-primary">Add as Friend</a>-->
                                        </div>

                                        <div class=" uprofile-social">
                                            <a href="<?= $fbkurl;?>" class="btn btn-primary btn-md facebook"><i class="fa fa-facebook icon-xs"></i></a>
                                            <a href="<?= $twitterurl;?>" class="btn btn-primary btn-md twitter"><i class="fa fa-twitter icon-xs"></i></a>
                                            <a href="<?= $googleurl;?>" class="btn btn-primary btn-md google-plus"><i class="fa fa-google-plus icon-xs"></i></a>
                                            <a href="#" class="btn btn-primary btn-md dribbble"><i class="fa fa-dribbble icon-xs"></i></a>
                                        </div> 

                                    </div>
                                    <div class="col-md-9 col-sm-8 col-xs-12">

                                        <div class="uprofile-content">

                                            <div class="">

                                                <h4>Biography:</h4>
                                                <p><?= $cu_profile;?>
                                                </p><br>
                                                <!--<h4>Profile Activity:</h4>                

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
                                                </div>

                                                <div class="clearfix"></div>


                                                <div class="uprofile_wall_posts col-md-12 col-sm-12 col-xs-12">
                                                    <div class="pic-wrapper col-md-1 col-sm-1 col-xs-2 text-center">
                                                        <img src="data/profile/avatar-2.png" class="" alt="">
                                                    </div>
                                                    <div class="info-wrapper col-md-11 col-sm-11 col-xs-10">					
                                                        <div class="username">
                                                            <span class="bold">John Smith</span> post in group <span class="bold">work</span>	
                                                        </div>
                                                        <div class="info text-muted">
                                                            "Balance" is a concept based on human perception and the complex nature of the human senses of weight and proportion. Humans can evaluate these visual elements in several situations to find a sense of balance.
                                                        </div>	
                                                        <div class="info-details">
                                                            <ul class="list-unstyled list-inline">
                                                                <li><a href="#" class="text-muted">15 Minutes ago</a></li>
                                                                <li><a href="#" class="text-muted"><i class="fa fa-comment"></i> 584</a></li>
                                                                <li><a href="#" class="text-orange"><i class="fa fa-heart"></i> 12k</a></li>
                                                                <li><a href="#" class="text-info"><i class="fa fa-reply"></i> Reply</a></li>
                                                                <li><a href="#" class="text-warning"><i class="fa fa-star"></i> Favourite</a></li>
                                                                <li><a href="#" class="text-muted">More</a></li>
                                                            </ul>

                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="comment">
                                                            <div class="pic-wrapper col-md-1 col-sm-1 col-xs-2 text-center">
                                                                <img data-src-retina="data/profile/avatar-3.png" data-src="data/profile/avatar-3.png" src="data/profile/avatar-3.png" alt="">
                                                            </div>
                                                            <div class="info-wrapper col-md-11 col-sm-11 col-xs-10">					
                                                                <div class="username">
                                                                    <span class="bold">Fin</span> 
                                                                </div>
                                                                <div class="info text-muted">
                                                                    Perfect info for the project. Great work :)
                                                                </div>	
                                                                <div class="info-details">
                                                                    <ul class="list-unstyled list-inline">
                                                                        <li><a href="#" class="text-muted">10 Minutes ago</a></li>
                                                                        <li><a href="#" class="text-orange"><i class="fa fa-heart-o"></i> Like</a></li>
                                                                        <li><a href="#" class="text-muted">More</a></li>
                                                                    </ul>
                                                                </div>

                                                            </div>	
                                                            <div class="clearfix"></div>						
                                                        </div>

                                                        <div class="clearfix"></div>
                                                        <div class="comment">
                                                            <div class="pic-wrapper col-md-1 col-sm-1 col-xs-2 text-center">
                                                                <img data-src-retina="data/profile/avatar-4.png" data-src="data/profile/avatar-4.png" src="data/profile/avatar-4.png" alt="">
                                                            </div>
                                                            <div class="info-wrapper col-md-11 col-sm-11 col-xs-10">					
                                                                <div class="username">
                                                                    <span class="bold">Arun</span> 
                                                                </div>
                                                                <div class="info text-muted">
                                                                    Keep it up. Much appreciated effort.
                                                                </div>	
                                                                <div class="info-details">
                                                                    <ul class="list-unstyled list-inline">
                                                                        <li><a href="#" class="text-muted">8 Minutes ago</a></li>
                                                                        <li><a href="#" class="text-orange"><i class="fa fa-heart"></i> Liked</a></li>
                                                                        <li><a href="#" class="text-muted">More</a></li>
                                                                    </ul>
                                                                </div>

                                                            </div>	
                                                            <div class="clearfix"></div>						
                                                        </div>

                                                        <div class="comment comment-input">							

                                                            <div class="pic-wrapper col-md-1 col-sm-1 col-xs-2 text-center">
                                                                <img data-src-retina="data/profile/profile.png" data-src="data/profile/profile.png" src="data/profile/profile.png" alt="">
                                                            </div>
                                                            <div class="info-wrapper col-md-11 col-sm-11 col-xs-10">					
                                                                <div class="input-group primary  col-md-6">
                                                                    <input type="text" class="form-control" placeholder="Post a comment">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-rocket"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>	
                                                    <div class="clearfix"></div>						
                                                </div>



                                                <div class="uprofile_wall_posts col-md-12 col-sm-12 col-xs-12">
                                                    <div class="pic-wrapper col-md-1 col-sm-1 col-xs-2 text-center">
                                                        <img src="data/profile/avatar-1.png" class="" alt="">
                                                    </div>
                                                    <div class="info-wrapper col-md-11 col-sm-11 col-xs-10">					
                                                        <div class="username">
                                                            <span class="bold">John Smith</span> post in group <span class="bold">work</span>	
                                                        </div>
                                                        <div class="info text-muted">
                                                            "Balance" is a concept based on human perception and the complex nature of the human senses of weight and proportion. Humans can evaluate these visual elements in several situations to find a sense of balance.
                                                        </div>	
                                                        <div class="info-details">
                                                            <ul class="list-unstyled list-inline">
                                                                <li><a href="#" class="text-muted">15 Minutes ago</a></li>
                                                                <li><a href="#" class="text-muted"><i class="fa fa-comment"></i> 584</a></li>
                                                                <li><a href="#" class="text-orange"><i class="fa fa-heart"></i> 12k</a></li>
                                                                <li><a href="#" class="text-info"><i class="fa fa-reply"></i> Reply</a></li>
                                                                <li><a href="#" class="text-warning"><i class="fa fa-star"></i> Favourite</a></li>
                                                                <li><a href="#" class="text-muted">More</a></li>
                                                            </ul>

                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="comment">
                                                            <div class="pic-wrapper col-md-1 col-sm-1 col-xs-2 text-center">
                                                                <img data-src-retina="data/profile/avatar-2.png" data-src="data/profile/avatar-2.png" src="data/profile/avatar-2.png" alt="">
                                                            </div>
                                                            <div class="info-wrapper col-md-11 col-sm-11 col-xs-10">					
                                                                <div class="username">
                                                                    <span class="bold">Fin</span> 
                                                                </div>
                                                                <div class="info text-muted">
                                                                    Perfect info for the project. Great work :)
                                                                </div>	
                                                                <div class="info-details">
                                                                    <ul class="list-unstyled list-inline">
                                                                        <li><a href="#" class="text-muted">10 Minutes ago</a></li>
                                                                        <li><a href="#" class="text-orange"><i class="fa fa-heart-o"></i> Like</a></li>
                                                                        <li><a href="#" class="text-muted">More</a></li>
                                                                    </ul>
                                                                </div>

                                                            </div>	
                                                            <div class="clearfix"></div>						
                                                        </div>

                                                        <div class="clearfix"></div>
                                                        <div class="comment">
                                                            <div class="pic-wrapper col-md-1 col-sm-1 col-xs-2 text-center">
                                                                <img data-src-retina="data/profile/avatar-3.png" data-src="data/profile/avatar-3.png" src="data/profile/avatar-3.png" alt="">
                                                            </div>
                                                            <div class="info-wrapper col-md-11 col-sm-11 col-xs-10">					
                                                                <div class="username">
                                                                    <span class="bold">Arun</span> 
                                                                </div>
                                                                <div class="info text-muted">
                                                                    Keep it up. Much appreciated effort.
                                                                </div>	
                                                                <div class="info-details">
                                                                    <ul class="list-unstyled list-inline">
                                                                        <li><a href="#" class="text-muted">8 Minutes ago</a></li>
                                                                        <li><a href="#" class="text-orange"><i class="fa fa-heart"></i> Liked</a></li>
                                                                        <li><a href="#" class="text-muted">More</a></li>
                                                                    </ul>
                                                                </div>

                                                            </div>	
                                                            <div class="clearfix"></div>						
                                                        </div>

                                                        <div class="comment comment-input">							

                                                            <div class="pic-wrapper col-md-1 col-sm-1 col-xs-2 text-center">
                                                                <img data-src-retina="data/profile/profile.png" data-src="data/profile/profile.png" src="data/profile/profile.png" alt="">
                                                            </div>
                                                            <div class="info-wrapper col-md-11 col-sm-11 col-xs-10">					
                                                                <div class="input-group primary  col-md-6">
                                                                    <input type="text" class="form-control" placeholder="Post a comment">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-rocket"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>	
                                                    <div class="clearfix"></div>						
                                                </div>-->

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




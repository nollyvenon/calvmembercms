<?php
ob_start();
include_once "Connections/conn.php";
include_once "Connections/functions.php";
$adminname=$_SESSION['adminname'];
if(!isset($_SESSION['adminname'])){	

  header("Location:login.php");
}
	if ($_POST['deletemember']){
       $hiddel = $_POST['hiddel'];
	$aWhere = array('memkey'=>"$hiddel"); 
$data1 = $db->delete('members', $aWhere)->affectedRows();
if ($data1){
	$heifer = "Member deleted successfully.";
}
	}
?><!DOCTYPE html>
<html class=" ">
    <head>

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Calvary Members' CMS : Upcoming Anniversary</title>
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
        <link href="assets/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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
                                <h1 class="title">Members</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="frl-sellers.html">Members</a>
                                    </li>
                                    <li class="active">
                                        <strong>Upcoming Anniversary</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Members</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <!-- ********************************************** -->


                                        <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th><th>First Name</th>
                                                    <th>Last Name</th> 
                                                    <th>Phone</th>
                                                    <th>Email</th> 
                                                   <th class="hidden-xs hidden-sm hidden-lg hidden-md">Address</th> 
                                                    <th class="hidden-xs hidden-sm hidden-lg hidden-md">City</th> 
                                                    <th class="hidden-xs hidden-sm hidden-lg hidden-md">LGA</th> 
                                                    <th class="hidden-xs hidden-sm hidden-lg hidden-md">State</th> 
                                                    <th class="hidden-xs hidden-sm hidden-lg hidden-md">State of Origin</th> 
                                                    <th class="hidden-xs hidden-sm hidden-lg hidden-md">Marital Status</th> 
                                                    <th class="hidden-xs hidden-sm hidden-lg hidden-md">Branch</th> 
                                                    <th class="hidden-xs hidden-sm hidden-lg hidden-md">Member Level</th> 
                                                    <th class="hidden-xs hidden-sm hidden-lg hidden-md">LGA of Origin</th> 
                                                    <th class="hidden-xs hidden-sm hidden-lg hidden-md">Cell unit</th> 
                                                    <th class="hidden-xs hidden-sm hidden-lg hidden-md">Occupation</th> 
                                                    <th class="hidden-xs hidden-sm hidden-lg hidden-md">Exit Date</th> 
                                                    <th class="hidden-xs hidden-sm hidden-lg hidden-md">Transfer Date</th>
                                                    <th class="hidden-xs hidden-sm hidden-lg hidden-md">Gender</th>
                                                    <th>Picture</th> 
                                                    <th width="10%">View</th>
                                                    <th width="10%">Update</th>
                                                    <th width="10%">Delete</th>
                                                 </tr>
                                            </thead>

                                            <tbody>
                                            <?php

             $userpass = $conn->query("SELECT * FROM  members WHERE  DATE_ADD(cu_anniv_date, 
                INTERVAL YEAR(CURDATE())-YEAR(cu_anniv_date)
                         + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(cu_anniv_date),1,0)
                YEAR)  
            BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY);"); 
			$qr = $userpass->fetchAll(PDO::FETCH_ASSOC);

                                            foreach($qr as $row)
                                            {				 $id = $row['cu_id'];

                                            ?>
                                                <tr><td><?php echo $row['cu_id']; ?></td><td><?php echo $row['cu_first_name']; ?></td>
                                                <td><?php echo $row['cu_last_name']; ?></td>
                                                <td><?php echo $row['cu_phone']; ?></td>
                                                <td ><?php echo $row['cu_email']; ?></td>
                                                <td class="hidden-xs hidden-sm hidden-lg hidden-md"><?php echo $row['cu_address']; ?></td>
                                                <td class="hidden-xs hidden-sm hidden-lg hidden-md"><?php echo $row['cu_city']; ?></td>
                                                <td class="hidden-xs hidden-sm hidden-lg hidden-md"><?php echo $row['cu_lga']; ?></td>
                                                <td class="hidden-xs hidden-sm hidden-lg hidden-md"><?php echo $row['cu_state_of_residence']; ?></td>
                                                <td class="hidden-xs hidden-sm hidden-lg hidden-md"><?php echo $row['cu_state_origin']; ?></td>
                                                <td class="hidden-xs hidden-sm hidden-lg hidden-md"><?php echo $row['cu_marital_status']; ?></td>
                                                <td class="hidden-xs hidden-sm hidden-lg hidden-md"><?php echo $row['cu_branch']; ?></td>
                                                <td class="hidden-xs hidden-sm hidden-lg hidden-md"><?php echo $row['cu_mem_level']; ?></td>
                                                <td class="hidden-xs hidden-sm hidden-lg hidden-md"><?php echo $row['cu_lga_origin']; ?></td>
                                                <td class="hidden-xs hidden-sm hidden-lg hidden-md"><?php echo $row['cu_cell_unit']; ?></td>
                                                <td class="hidden-xs hidden-sm hidden-lg hidden-md"><?php echo $row['cu_occupation']; ?></td>
                                                <td class="hidden-xs hidden-sm hidden-lg hidden-md"><?php echo $row['cu_exit_date']; ?></td>
                                                <td class="hidden-xs hidden-sm hidden-lg hidden-md"><?php echo $row['cu_transfer_date']; ?></td>
                                                <td class="hidden-xs hidden-sm hidden-lg hidden-md"><?php echo $row['cu_gender']; ?></td>
                                                <td><img src="data/soc-members/<?php echo $row['memkey']; ?>/<?php echo $row['cu_image_url']; ?>" width="80" height="50" alt=""/></td>
                                                <td width="10%"><a class="btn btn-success" href="memdetails.php?sid=<?php echo $row['memkey']; ?>">View</a></td>
                                                <td width="10%"><a class="btn btn-info" href="member-edit.php?sid=<?php echo $row['cu_id']; ?>">Edit</a></td>
                                                <td width="10%"><a href="#modal-custom-dialog1" class="btn btn-danger" data-toggle="modal" data-id="<?= $row['memkey'];?>">Delete</a></td></tr>
                                            <?php				
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <!-- ********************************************** -->




                                    </div>
                                </div>
                            </div>
                        </section></div>






                </section>
            </section>
            <!-- END CONTENT -->
            
<div id="modal-custom-dialog1" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">          
                            <div class="modal-header">
                           <form id="form1" name="form1" method="post" action="">  
                                <button name="emailclose" type="button" aria-hidden="true"
                                        class="close">&times;</button>

                                <h4 class="modal-title">Delete Member Approval</h4></div>
                            <div class="modal-body">Are you sure you want to delete this member category, this process is irreversible.<br><br>
                            <input name="hiddel" type="hidden">
                           </div>
                            <div class="modal-footer">
                                <input name="deletemember" type="submit" class="btn btn-danger" value="Delete Member!">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</form>
                            </div>
                        </div>
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
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 
<script>
$(document).ready(function(){
    $('#modal-custom-dialog1').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'delmodal.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
			$("input[name='hiddel']").val(data);
            }
        });
     });
});
</script>
    </body>
</html>




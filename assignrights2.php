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
        <title>Calvary Members' CMS : Assign Rights</title>
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
                                <h1 class="title">Assign Rights</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.php"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li class="active">
                                        <strong>Assign Rights</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Assign Rights</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="row">
<form method="post">
            <table  border="0" cellpadding="0" cellspacing="3">
              <tr>
                <td height="33" colspan="2">
                  <?php
if ($_POST['submit']){
		 $ssusergroup= $_GET['ssusergroup'];
  $pageid = $_POST["pageid"];
 echo("Pages chosen: " . count($pageid) . "<br><br>");
 for ($i=0; $i<count($pageid); $i++) { 
		 $totpageid = $totpageid.",". $pageid[$i];
    }
	
	//echo $totpageid;
 $totpageid = substr_replace($totpageid, "", 0, 1);
  $dataArray5 = array('allowedpages'=>"$totpageid"); 
  $aWhere = array('usergroup'=>"$ssusergroup");
  $data = $db->update('userpriv', $dataArray5, $aWhere)->affectedRows(); //update the client's balance

if ($data){
	echo "<span class=error>Staff Account Updated Successfully.</span>";		
}
	}

?></td>
              </tr>
              <tr>
                <td colspan="2" valign="top">
                <?php 
						 $ssusergroup= $_GET['ssusergroup'];
				$whereConditions = array('usergroup ='=>$ssusergroup);
				$qr1 = $db->select('userpriv',array('*'),$whereConditions)->results();
				foreach($qr1 as $row){
					$accttype = $row['accttype'];
					$allid = $row['allowedpages'];
							}
				$allid1=explode(",",$allid);
				//print_r($allid1);
?>
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="9">&nbsp;</td>
                      <td width="328">
                        <?php        //$userpriv =  3;
				if (in_array(1,$allid1))
  { ?>   <input type="checkbox" name="pageid[]" value="1" checked="checked" id="addmemb" /><label for="addmemb">Add Member</label>
                        
                        
                        <?php  } else   { ?>
                        <input type="checkbox" name="pageid[]" value="1"  id="addmemb" /><label for="addmemb">Add Member</label>
                        <?php   } 		?>	                    </td>
                      <td width="12">&nbsp;</td>
                      <td width="328"><?php        
				if (in_array(2,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" value="2" checked="checked" id="viewmemb" />
                        <label for="viewmemb">View Member</label>
                        
                        
                        <?php  } else   { ?>
  <input type="checkbox" name="pageid[]"  value="2"  id="viewmemb" />
                        <label for="viewmemb">View Member</label>
                        <?php   } 		?>
  </td>
                      <td width="12">&nbsp;</td>
                      <td width="328"><?php        
				if (in_array(3,$allid1))
  { ?>    <input type="checkbox" name="pageid[]"  value="3" checked="checked" id="admrights" />
                        <label for="admrights">Admin Rights</label>
                        <?php  } else   { ?>
  <input type="checkbox" name="pageid[]" value="3" id="admrights" />
                        <label for="admrights">Admin Rights</label>
                        <?php   } 		?></td>
                      </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><?php        
				if (in_array(4,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked" value="4" id="addusrgrps" />
                        <label for="addusrgrps">Add User Group</label>
                        <?php  } else   { ?>
  <input type="checkbox" name="pageid[]" value="4" id="addusrgrps" />
                        <label for="addusrgrps">Add User Group</label>  <?php   } 		?></td>
                      <td>&nbsp;</td>
                      <td><?php        
				if (in_array(5,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked" value="5"  id="mngusrgrp" />
                        
                        <label for="mngusrgrp">Manage User Group</label>
                        <?php  } else   { ?>
  <input type="checkbox" name="pageid[]" value="5" id="mngusrgrp" />
                        
                        <label for="mngusrgrp">Manage User Group</label>
  <?php   } 		?></td>
                      <td>&nbsp;</td>
                      <td> <?php        
				if (in_array(18,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked" value="18"  id="viewinv" />
                        
                        <label for="viewinv"></label>
                        <?php  } else   { ?>
  <input type="checkbox" name="pageid[]" value="18" id="viewinv" />
                        
                        <label for="viewinv"></label>
  <?php   } 		?>   </td>
                      </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><?php        
				if (in_array(6,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked"  value="6" id="addmarkt" />
                        <label for="addmarkt">Add Template</label>
                        <?php  } else   { ?>
                        <input type="checkbox" name="pageid[]" value="6" id="addmarkt" />
                        <label for="addmarkt">Add Template</label>
  <?php   } 		?></td>
                      <td>&nbsp;</td>
                      <td><?php        
				if (in_array(7,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked"  value="7" id="viewtempl" />
                        <label for="viewtempl">View Template</label>
                        <?php  } else   { ?>
                        <input type="checkbox" name="pageid[]" value="7" id="viewtempl" />
                        <label for="viewtempl">View Template</label>
  <?php   } 		?></td>
                      <td>&nbsp;</td>
                      <td><?php        
				if (in_array(8,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked"  value="8" id="sendmail" />
                        <label for="addclie">Send Mail</label>
                        <?php  } else   { ?>
                        <input type="checkbox" name="pageid[]" value="8" id="sendmail" />
                        <label for="sendmail">Send Mail</label>
  <?php   } 		?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><?php        
				if (in_array(9,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked" value="9" id="compmail" />
                        
                        <label for="compmail">Compose Mail</label>
                        <?php  } else   { ?>
  <input type="checkbox" name="pageid[]" value="9" id="compmail" />
                        
                        <label for="compmail">Compose Mail</label><?php   } 		?>
                        
  </td>
                      <td>&nbsp;</td>
                      <td><?php        
				if (in_array(10,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked" value="10"  id="mailhist" />
                        
                        <label for="mailhist">Mail History</label>
                        <?php  } else   { ?>
  <input type="checkbox" name="pageid[]" value="10" id="mailhist" />
                        <label for="mailhist">Mail History</label><?php   } 		?>
                        
                        </td>
                      <td>&nbsp;</td>
                      <td><?php        
				if (in_array(11,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked" value="11" id="uplcont" />
                        
                        <label for="uplcont">Send SMS</label>
                        <?php  } else   { ?>
  <input type="checkbox" name="pageid[]" value="11" id="uplcont" />
                        
                        <label for="uplcont">Send SMS</label><?php   } 		?></td>
                      </tr>
                      
                      
                      <tr>
                      <td>&nbsp;</td>
                      <td><?php        
				if (in_array(12,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked" value="12" id="manageslid" />
                        
                        <label for="manageslid">SMS History</label>
                        <?php  } else   { ?>
  <input type="checkbox" name="pageid[]" value="12" id="manageslid" />
                        
                        <label for="manageslid">SMS History</label><?php   } 		?>
                        
  </td>
                      <td>&nbsp;</td>
                      <td><?php        
				if (in_array(13,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked" value="13" id="addgrp" />
                        
                        <label for="addgrp">Add Group</label>
                        <?php  } else   { ?>
  <input type="checkbox" name="pageid[]" value="13" id="addgrp" />
                        
                        <label for="addgrp">Add Group</label><?php   } 		?> </td>
                      <td>&nbsp;</td>
                      <td><?php        
				if (in_array(14,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked" value="14" id="addbranch" />
                        
                        <label for="addbranch">Add Branch</label>
                        <?php  } else   { ?>
  <input type="checkbox" name="pageid[]" value="14" id="addbranch" />
                        
                        <label for="addbranch">Add Branch</label><?php   } 		?>  </td></tr>
                        
                         <tr>
                      <td>&nbsp;</td>
                      <td><?php        
				if (in_array(15,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked" value="15" id="viewrpts" />
                        
                        <label for="viewrpts">View Reports</label>
                        <?php  } else   { ?>
  <input type="checkbox" name="pageid[]" value="15" id="viewrpts" />
                        
                        <label for="viewrpts">View Reports</label><?php   } 		?>
                        
  </td>
                      <td>&nbsp;</td>
                      <td><?php        
				if (in_array(16,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked" value="16" id="viewmap" />
                        
                        <label for="viewmap">View Map</label>
                        <?php  } else   { ?>
  <input type="checkbox" name="pageid[]" value="16" id="viewmap" />
                        
                        <label for="viewmap">View Map</label><?php   } 		?> </td>
                      <td>&nbsp;</td>
                      <td><?php        
				if (in_array(17,$allid1))
  { ?>    <input type="checkbox" name="pageid[]" checked="checked" value="17" id="viewcal" />
                        
                        <label for="viewcal">View Calendar</label>
                        <?php  } else   { ?>
  <input type="checkbox" name="pageid[]" value="17" id="viewcal" />
                        
                        <label for="viewcal">View Calendar</label><?php   } 		?>  </td></tr>
                        
                    
                  </table></td>
                <tr>
                <td width="101" height="24">&nbsp;</td>
                <td width="707"><input type="submit"  class="btn btn-primary" onClick="return checksubmit(this)" name="submit" value="Submit" />
                  <input type="reset" name="Submit2" value="Cancel"  class="btn btn-info" onclick='window.close();' /></td>
              </tr>
            </table>
          </form>                                            
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
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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




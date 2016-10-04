<div class="page-sidebar ">
                <!-- MAIN MENU - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

                    <!-- USER INFO - START -->
                    <div class="profile-info row">

                        <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                            <a href="index.php">
                                <img src="data/soc-admin/<?=$admkey;?>/<?=$profimage;?>" class="img-responsive img-circle">
                            </a>
                        </div>

                        <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                            <h3>
                                <a href="staff-profile.php"><?=$uifullname;?></a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h3>

                            <p class="profile-title">Administrator</p>

                        </div>

                    </div>
                    <!-- USER INFO - END -->



                    <ul class='wraplist'>	


                        <li class="open"> 
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
           <?php
 $myuserpriv =$_SESSION['level'];
if ($myuserpriv == '')
{
     header("Location: login.php");
}
				$whereConditions = array('usergroup ='=>$myuserpriv);
$qr1 = $db->select('userpriv',array('*'),$whereConditions)->results();
$accttype = $qr1[0]['accttype'];
$allowedpages = $qr1[0]['allowedpages'];

 $allid1=explode(",",$allowedpages);
//print_r($allid1);
?>                         
                  <!--      <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-envelope"></i>
                                <span class="title">Messaging</span>
                                <span class="arrow "></span><span class="label label-orange">4</span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="crm-mail-inbox.html" >Inbox</a>
                                </li>
                                <li>
                                    <a class="" href="crm-mail-compose.html" >Compose</a>
                                </li>
                                <li>
                                    <a class="" href="crm-mail-view.html" >View</a>
                                </li>
                            </ul>
                        </li>-->
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-users"></i>
                                <span class="title">Members</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="viewmembers.php" >All Members</a>
                                </li>
                                <li>
                                    <a class="" href="browsemembers.php" >Browse Members</a>
                                </li>
                                <li>
                                    <a class="" href="member-add.php" >Add Member</a>
                                </li>
                                <!--  <li>
                                      <a class="" href="member-edit.php" >Edit Members</a>
                                </li>-->
                            </ul>
                        </li>
                     <!--   <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-phone"></i>
                                <span class="title">Contacts</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="crm-contacts.html" >All Contacts</a>
                                </li>
                                <li>
                                    <a class="" href="crm-contact-add.html" >Add Contact</a>
                                </li>
                                <li>
                                    <a class="" href="crm-contact-edit.html" >Edit Contact</a>
                                </li>
                            </ul>
                        </li>-->
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-edit"></i>
                                <span class="title">Template Design</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="addtemplatedesign.php" >Add Template Design</a>
                                </li>
                                <li>
                                    <a class="" href="edittemplatedesign.php" >Edit Template Design</a>
                                </li>
                                <li>
                                    <a class="" href="viewemailtemplatedesign.php" >View Template Design</a>
                                </li>
                            </ul>
                        </li>

                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-edit"></i>
                                <span class="title">Templates</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="addemailtemplate.php" >Add Template</a>
                                </li>
                                <li>
                                    <a class="" href="editemailtemplates.php" >Edit Template</a>
                                </li>
                                <li>
                                    <a class="" href="viewemailtemplates.php" >View Templates</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class=""> 
                            <a href="calendar.php">
                                <i class="fa fa-calendar"></i>
                                <span class="title">Calendar</span>
                            </a>
                        </li>
                        <li class=""> 
                            <a href="map.php">
                                <i class="fa fa-map-marker"></i>
                                <span class="title">Map</span>
                            </a>
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-bar-chart"></i>
                                <span class="title">Reports</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="searchmembers.php" >By Members</a>
                                </li>
                                <li>
                                    <a class="" href="viewmembers.php" >By Family</a>
                                </li>
                                <li>
                                    <a class="" href="viewmembers.php" >By Location</a>
                                </li>
                                <li>
                                    <a class="" href="viewmembers.php" >By Name</a>
                                </li>
                            </ul>
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-question-circle"></i>
                                <span class="title">Mail/SMS</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                      <!--         <li>
                                    <a class="" href="crm-quotes.html" >Mail Settings</a>
                                </li>-->
                               <li>
                                    <a class="" href="mail-compose.php" >Compose Mail</a>
                                </li>
                               <li>
                                    <a class="" href="mail-drafts.php" >Send Mail</a>
                                </li>
                                <li>
                                    <a class="" href="mail-sent.php" >Mail History</a>
                                </li>
                                <li>
                                    <a class="" href="composesms.php" >Compose SMS</a>
                                </li>
                                <li>
                                    <a class="" href="sendsms.php" >Send SMS</a>
                                </li>
                                <li>
                                    <a class="" href="smshistory.php" >SMS History</a>
                                </li>
                            </ul>
                        </li>
                         <li class="open"> 
                            <a href="mus-upload.php">
                                <i class="fa fa-cloud-upload"></i>
                                <span class="title">Upload</span>
                            </a>
                        </li>
						<li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-user"></i>
                                <span class="title">Utilities</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="addbranch.php" >Add Branch</a>
                                </li>
                                <li>
                                    <a class="" href="addmembergroup.php" >Add Group</a>
                                </li>
                            </ul>
                        </li>                        
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-user"></i>
                                <span class="title">Users</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >                                
                                 <?php 
							if (in_array(4,$allid1)){
				  echo "<li><a href=\"staff-add.php\"><i class=\"glyph-icon icon-chevron-right\"></i>Add Users</a></li>";
			  			} 	
							if (in_array(5,$allid1)){
				  echo "<li><a href=\"staff.php\"><i class=\"glyph-icon icon-chevron-right\"></i>View Users</a></li>";
			  			}
							if (in_array(5,$allid1)){
				  echo "<li><a href=\"viewstaff.php\"><i class=\"glyph-icon icon-chevron-right\"></i>Edit Users</a></li>";
			  			} 	
							if (in_array(6,$allid1)){
				  echo "<li><a href=\"assignrights.php\"><i class=\"glyph-icon icon-chevron-right\"></i>User Rights</a></li>";
			  			}
							if (in_array(7,$allid1)){
				  echo "<li><a href=\"addusergroup.php\"><i class=\"glyph-icon icon-chevron-right\"></i>Add User Group</a></li>";
			  			}  
							if (in_array(8,$allid1)){
				  echo "<li><a href=\"manageusgroup.php\"><i class=\"glyph-icon icon-chevron-right\"></i>Manage User Group</a></li>";
			  			}  
						
							?>
                            </ul>
                        </li>

                    </ul>

                </div>
                <!-- MAIN MENU - END -->



                <div class="project-info">

                    <div class="block1">
                        <div class="data">
                            <span class='title'>Target</span>
                            <span class='total'>80%</span>
                        </div>
                        <div class="graph">
                            <span class="sidebar_orders">...</span>
                        </div>
                    </div>

                    <div class="block2">
                        <div class="data">
                            <span class='title'>Members</span>
                            <span class='total'><?=$membcount;?></span>
                        </div>
                        <div class="graph">
                            <span class="sidebar_visitors">...</span>
                        </div>
                    </div>

                </div>



            </div>
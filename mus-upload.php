<?php
ob_start();
include_once "Connections/conn.php";
include_once "Connections/reformat_text.php";
$adminname=$_SESSION['adminname'];
if(!isset($_SESSION['adminname'])){	

  header("Location:login.php");
}
?><!DOCTYPE html>
<html class=" ">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Calvary Members' CMS : Member Uploader</title>
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
        <link href="assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <style>
		.top30 { margin-top:30px; }
		</style>
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
                                <h1 class="title">Member Uploader</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Member Uploader</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

      <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">      
<?php
if ($_POST['btnBulkUpload']){
// include class file
include 'Excel/reader.php';
$serv = $_GET['ser'];
//initialize upload 
$uploaddir = 'uploads/';
$upfile = basename($_FILES['fileName']['name']);

$pos = strpos($upfile,".",0);
	$ext = trim(substr($upfile,$pos+1,strlen($upfile))," ");
	$upfile = $upfile.$entrydate;
	$uploadfile = $uploaddir . basename($upfile);

		if (move_uploaded_file($_FILES['fileName']['tmp_name'], $uploadfile)) {
		
//		  echo "File is valid, and was successfully uploaded.\n";
		  
		} else {
		  echo "Possible file upload attack!\n";
		}

$sFileName = "uploads/".$upfile;
$data = new Spreadsheet_Excel_Reader();

    $data->setUTFEncoder('iconv');
    $data->setOutputEncoding("CP-1251");
  // $data->setOutputEncoding("UTF-8");
    error_reporting(E_ALL ^ E_NOTICE); 
	
$data->read($sFileName);
$j = 1;


	for ($y = 0; $y <= sizeof($data->sheets); $y++) {
		$feedtitle = html2txt(reformat_text($data->sheets[$y]["cells"][2][3]));
		$feeddesc = html2txt(reformat_text($data->sheets[$y]["cells"][2][4]));
		
	for ($x = 0; $x <= count($data->sheets[$y]["cells"]); $x++) {
		

		$sid =html2txt(reformat_text($data->sheets[$y]["cells"][$x][1]));
		$calvaryid = html2txt(reformat_text($data->sheets[$y]["cells"][$x][2]));
		$fullname = html2txt(reformat_text($data->sheets[$y]["cells"][$x][3]));
		$pieces = explode(" ", $fullname);
		$firstname = $pieces[0];
		//$revpieces = array_reverse($fullname);
		//echo $lastname = trim($revpieces[0]);
		$lastname = trim($pieces[1]);
		
		if (str_word_count($fullname) > 2){
			$othername = trim($pieces[1]);
			$lastname = trim($pieces[2]);
		}
		
		$dob = html2txt(reformat_text($data->sheets[$y]["cells"][$x][4]));
		$stateorigin = html2txt(reformat_text($data->sheets[$y]["cells"][$x][5]));
		$address = html2txt(reformat_text($data->sheets[$y]["cells"][$x][6]));
		$phone = html2txt(reformat_text($data->sheets[$y]["cells"][$x][7]));
		$community = html2txt(reformat_text($data->sheets[$y]["cells"][$x][8]));
		$busstop = html2txt(reformat_text($data->sheets[$y]["cells"][$x][9]));
		$email = html2txt(reformat_text($data->sheets[$y]["cells"][$x][10]));
		$lgaorigin = html2txt(reformat_text($data->sheets[$y]["cells"][$x][11]));
		$gender = html2txt(reformat_text($data->sheets[$y]["cells"][$x][12]));
		$marstatus = html2txt(reformat_text($data->sheets[$y]["cells"][$x][13]));
		$spouse = html2txt(reformat_text($data->sheets[$y]["cells"][$x][14]));
		
		$regdate = html2txt(reformat_text($data->sheets[$y]["cells"][$x][15]));
		$child1 = html2txt(reformat_text($data->sheets[$y]["cells"][$x][16]));
		$child2 = html2txt(reformat_text($data->sheets[$y]["cells"][$x][17]));
		$child3 = html2txt(reformat_text($data->sheets[$y]["cells"][$x][18]));
		$child4 = html2txt(reformat_text($data->sheets[$y]["cells"][$x][19]));
		$child5 = html2txt(reformat_text($data->sheets[$y]["cells"][$x][20]));
		$child6 = html2txt(reformat_text($data->sheets[$y]["cells"][$x][21]));

		for ($chno = 1; $chno <= 6; $chno++) {
			$childname ="$child$chno";
			if (strlen($childname)> 3){
			$dataArray4[] = array('ch_parent_id'=>"$memkey",'ch_fullname'=>"$child$chno"); }
		} 
		$employstatus = html2txt(reformat_text($data->sheets[$y]["cells"][$x][22]));
		if (strtoupper($employstatus) == 'WORKING' || strtoupper($employstatus) == 'EMPLOYED'){
			$employstatus = 1;
		}else if(strtoupper($employstatus) == 'UNEMPLOYED' || strtoupper($employstatus) == 'NONE' || strtoupper($employstatus) == 'NOT-WORKING'){
			$employstatus = 2;
		}else if (strtoupper($employstatus) == 'NYSC'){
			$employstatus = 3;			
		}else if (strtoupper($employstatus) == 'STUDENT'){
			$employstatus = 4;			
		}else{
			$employstatus = 2;			
		}

		$placeofwork = html2txt(reformat_text($data->sheets[$y]["cells"][$x][23]));
		$occup = html2txt(reformat_text($data->sheets[$y]["cells"][$x][24]));
		
		//$demisedeath = html2txt(reformat_text($data->sheets[$y]["cells"][$x][25]));
		
		$officeadd = html2txt(reformat_text($data->sheets[$y]["cells"][$x][26]));
		$nextofkin = html2txt(reformat_text($data->sheets[$y]["cells"][$x][27]));
		$nextofkinadd = html2txt(reformat_text($data->sheets[$y]["cells"][$x][28]));
		$dept = html2txt(reformat_text($data->sheets[$y]["cells"][$x][31]));
		$comment = html2txt(reformat_text($data->sheets[$y]["cells"][$x][34]));
		/*$exitdate = html2txt(reformat_text($data->sheets[$y]["cells"][$x][29]));
		$transfdate = html2txt(reformat_text($data->sheets[$y]["cells"][$x][30]));
   		//$adate = date("Y-m-d", strtotime($data->sheets[$y]['cells'][$x][4])); 
		 $adate = reformat_text($data->sheets[$y]["cells"][$x][4]);
		$ts = mktime(0,0,0,1,$adate-1,1900);
		// So, this would then match Excel's representation:
		 $adate = date("Y-d-m",$ts); 
		$link = reformat_text($data->sheets[$y]["cells"][$x][5]);*/
		$memkey = md5(uniqid(rand(), true));
		
		//$mtime = (date(DATE_RFC822));
		$mtime = date("Y-d-m H:m:s");		
		 
		if (strlen($fullname) > 2){
		  $dataArray1[] = array('cu_first_name'=>"$firstname",'cu_last_name'=>"$lastname",'cu_other_name'=>"$othername",'cu_phone'=>"$phone",'cu_email'=>"$email",'cu_password'=>"",'cu_address'=>"$address",'cu_city'=>"$city",'cu_lga'=>"$lga",'cu_state_of_residence'=>"$stateresid",'cu_state_origin'=>"$stateorigin",'cu_mem_level'=>"$memlevel",'cu_lga_origin'=>"$lgaorigin",'cu_community'=>"$community",'cu_employ_status'=>"$employstatus",'cu_gender'=>"$gender",'cu_dob'=>"$dob",'cu_image_url'=>"$imageurl",'cu_cell_unit'=>"$cellunit",'cu_marital_status'=>"$marstatus",'cu_profile'=>"$profile",'cu_branch'=>"$branch",'cu_no_of_child'=>"$noofchild",'cu_marriage_date'=>"$marrdate",'cu_demise_death'=>"$demisedeath",'cu_occupation'=>"$occup",'cu_utility'=>"$utility",'cu_remark'=>"$remark",'cu_joindate'=>"$regdate",'cu_exit_date'=>"$exitdate",'cu_transfer_date'=>"$transfdate",'cu_spouse'=>"$spouse",'cu_nearbusstop'=>"$busstop",'cu_place_of_work'=>"$placeofwork",'cu_office_add'=>"$officeadd",'cu_next_of_kin'=>"$nextofkin",'cu_next_of_kin_add'=>"$nextofkinadd",'cu_remark'=>"$comment",'cu_sid'=>"$sid",'cu_calvaryid'=>"$calvaryid",'cu_ministry_unit'=>"$dept",'memkey'=>"$memkey");  

		}		
$j++;
	}
	  		$sql = $db->insertBatch('members',$dataArray1)->getAllLastInsertId();	
	
		  $sql1 = $db->insertBatch('children',$dataArray4)->getAllLastInsertId();
}

	  if ($sql){		
		 echo "<div class=\"infobox clearfix infobox-close-wrapper success-bg mrg20B\"> Contents added successfully  </div>";
	  }
}	
?>
                                        <div class="">
                                        
                                            <div class="col-sm-8">
                                            <input name="fileName" class="form-control" type="file">
                                            </div>
                                            <div class="col-sm-8 top15">
                                            <input name="btnBulkUpload" class="btn btn-success"  value="Upload File" type="submit">
                                            </div>
                                        </div>
	</form>


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
        <script src="assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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




<?php
ob_start();
include_once "Connections/conn.php";
include_once "Connections/functions.php";
?><!DOCTYPE html>
<html class=" ">
    <head>

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Calvary Members' CMS : Login Page</title>
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
        <link href="assets/plugins/icheck/skins/square/orange.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" login_page">


        <div class="login-wrapper">
            <div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-0 col-xs-12">
                <h1><a href="#" title="Login Page" tabindex="-1">Calvary Members' CMS</a></h1>

                <form name="loginform" id="loginform" action="" method="post">
                <?php
 if(isset($_POST['submit'])){
  
 global $err;

    $adminname=$_POST['user'];
	$whereConditions = array('adminname ='=>"$adminname", 'or email ='=> "$adminname");
	$qr1 = $db->select('adminu',array('*'),$whereConditions)->results();
	//$db->showQuery();
	//echo $_POST['password'];
	$hashedPassword = $qr1[0]['pwd'];
	echo $pwdver=verify($_POST['password'],$hashedPassword);
	
	if (strlen($adminname) > 4 and ($pwdver == 1)){
	//$db = new PDO( 'mysql:host=localhost;dbname=charlesomo', 'root', '' );
	//echo '1';
	$query = $conn->prepare("select * from adminu where (email='" . $adminname. "' or adminname='" . $adminname. "')");
	//$reccount = $result->fetch();
	$query->execute();
	$results = $query->fetchAll( PDO::FETCH_ASSOC );
		if ($results){
				foreach( $results as $fet ){
					$_SESSION['adminname']=$adminname;
					$_SESSION['uifullname']=$fet['fullname'];
                    $_SESSION['admkey']=$fet['admkey'];
					$_SESSION['pwd'] = $pwd;
					$_SESSION['level'] = $fet['level'];
					
					if( $fet['banned'] == 1){
						header("Location:banned.php");
						exit;
					}
		
				}


			$PHPSESSID = session_id();
			$sesId = session_id();
			 
			//$adminname = $_SESSION['adminname'];
			$sesLifeTime = ini_get("session.gc_maxlifetime");
			$now = time();
		echo "logged in";
			header("location:index.php");
			exit;
	  
	  }else{	 
			  $warning++;
			  $_SESSION['warning'] = $warning;
		  $err="<p class=\"error\"> Your username and password does not match our record.</p>";
			  if ($warningval >= 3) $_SESSION['ustatus'] = 'banned';
		  	  
	  }
	}else{
			echo "Invalid input.";
					$warning++;
					$_SESSION['warning'] = $warning;
			if ($_SESSION['warning'] >= 3) $_SESSION['ustatus'] = 'banned';
			$aWhere = array('adminname'=>$adminname);
			$dataArray2[] = array('banned'=>'1');
 			$data = $db->update('admin', $dataArray, $aWhere)->affectedRows();


	}
}
//			echo $warning;
			
			switch ($warning) {
				  case 1:
					  echo " You've got three more trials.";
					  break;
				  case 2:
					  echo " You've got two more trials.";
					  break;
				  case 3:
					  echo " You've got one last trial. Kindly check the login details properly before you continue.";
					  break;
			  }
  ?>   				
 					 <?php echo $err; ?></p>
                <p> <?php echo $msg; ?></p>
                    <p>
                        <label for="user_login">Username<br />
                            <input type="text" name="user" id="user" class="input" value="" size="20" placeholder="Your Username" /></label>
                    </p>
                    <p>
                        <label for="user_pass">Password<br />
                            <input type="password" name="password" id="password" class="input" value="" size="20" placeholder="Your Password" /></label>
                    </p>
                    <p class="forgetmenot">
                        <label class="icheck-label form-label" for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" class="skin-square-orange" checked> Remember me</label>
                    </p>



                    <p class="submit">
                        <input type="submit" name="submit" id="wp-submit" class="btn btn-orange btn-block" value="Sign In" />
                    </p>
                </form>

          <!--      <p id="nav">
                    <a class="pull-left" href="#" title="Password Lost and Found">Forgot password?</a>
                    <a class="pull-right" href="ui-register.html" title="Sign Up">Sign Up</a>
                </p>-->


            </div>
        </div>





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




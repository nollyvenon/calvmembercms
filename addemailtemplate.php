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
        <title>Calvary Members' CMS : Email Template</title>
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
        <link href="assets/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/uikit/css/uikit.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/uikit/vendor/codemirror/codemirror.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/uikit/css/components/htmleditor.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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
                                <h1 class="title">EMAIL TEMPLATE</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="form-elements.html">Forms</a>
                                    </li>
                                    <li class="active">
                                        <strong>EMAIL TEMPLATE</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>



                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">ADD EMAIL TEMPLATE</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
										<form action="#" method="post">
<?php
	if ($_POST['submit']){			
			$editor1 = $_POST['editor1'];
			$descript = $_POST['descript'];
			$category = $_POST['category'];
			$templdesign = $_POST['templdesign'];
		//	$sid = $_GET['sid'];
			
			$dataArray2[] = array('descript'=>"$descript",'type'=>"$category",'template'=>"$templdesign"); 
			$data = $db->insertBatch('scheduleemailtemplates',$dataArray2)->getAllLastInsertId();
			if ($data){
				echo "<div class=\"btn btn-lg btn-warning btn-block\">Email Template added Successfully</div>";
			}
			
	}
	?>
                                            <div class="form-group">
                                                <label class="form-label" for="field-2">Description/Title/Name</label>
                                                <span class="desc"></span>
                                                <div class="controls">    	<input name="descript" class="form-control" type="text"></div>
                                                </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-2">Category</label>
                                                <span class="desc"></span>
                                                <div class="controls">  <select name="category" id="category" class="form-control">  	<?php 
		echo "<option value='' selected='selected'> Select a Category</option>";
		$qr = $db->select('templatetype',array('*'))->results();
		foreach($qr as $fet){
		$type_id=$fet['type_id'];
		$type_name=$fet['type_name'];		
		?>
        <option value="<?= $level_id;?>" <?php if ($ntype_id==$type_id) { echo "selected='selected'";} ?>><?= $type_name;?></option>
        <?php  } ?>
                </select></div>
                                                </div>
                                                
                                                <div class="form-group">
                                                <label class="form-label" for="field-2">Preferred Template Design</label>
                                                <span class="desc"></span>
                                                <div class="controls">  <select name="templdesign" id="templdesign" class="form-control">  	<?php 
		echo "<option value='' selected='selected'> Select a Template Design</option>";
		$qr = $db->select('emailtemplates',array('*'))->results();
		foreach($qr as $fet){
		$type_id=$fet['type_id'];
		$template_name=$fet['template_name'];		
		$template_folder=$fet['template_folder'];		
		?>
        <option value="<?= $template_folder;?>" <?php if ($ntemplate_folder==$template_folder) { echo "selected='selected'";} ?>><?= $template_name;?></option>
        <?php  } ?>
                </select></div>
                                                </div>

                                           <!-- <div class="form-group">
                                                <label class="form-label" for="field-2">Content</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                        <textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10">

                                        </textarea>
                                                    </div>
                                            </div>-->
                                        <div class="clearfix"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                                <div class="text-left">
                                        <input name="submit" class="btn btn-success" type="submit" id="submit" value="Add Template">
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
        <script src="assets/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script><script src="assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script><script src="assets/plugins/uikit/js/uikit.min.js" type="text/javascript"></script><script src="assets/plugins/uikit/vendor/codemirror/codemirror.js" type="text/javascript"></script><script src="assets/plugins/uikit/vendor/codemirror/codemirror.js" type="text/javascript"></script><script src="assets/plugins/uikit/vendor/codemirror/mode/markdown/markdown.js"></script><script src="assets/plugins/uikit/vendor/codemirror/addon/mode/overlay.js"></script><script src="assets/plugins/uikit/vendor/codemirror/mode/xml/xml.js"></script><script src="assets/plugins/uikit/vendor/codemirror/mode/gfm/gfm.js"></script><script src="assets/plugins/uikit/vendor/marked/marked.min.js" type="text/javascript"></script><script src="assets/plugins/uikit/js/components/htmleditor.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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




<script>

</script>



<script>

</script>


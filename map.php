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
        <title>Calvary Members' CMS : CRM Map</title>
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
                                <h1 class="title">CRM Map</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">CRM Google Map</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <div class="">

                                            <form role="form" method="post" id="address-search">
                                                <div class="input-group primary">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-map-marker"></i>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="Enter address">
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-default">Search</button>
                                                    </span>
                                                </div>
                                            </form>

                                        </div> 
                                        <div class="clearfix"></div><br>

                                        <div class="gmap full-page-google-map">
                                            <div id="map-1"></div>
                                        </div>


                                        <!-- start -->
                                        <div class="clearfix"></div><br>
                                        <div class="map-toolbar">
                                            <div class="row">

                                                <div class="col-sm-8 text-right">

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-warning" id="map-unzoom">-</button>
                                                        <button type="button" class="btn btn-warning" id="map-resetzoom">Reset</button>
                                                        <button type="button" class="btn btn-warning" id="map-zoom">+</button>
                                                    </div>

                                                    &nbsp;

                                                    <a href="#" class="btn btn-info" id="go-sthlm">Go to Ikeja</a>
                                                    <a href="#" class="btn btn-purple" id="go-bln">Go to Lekki</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end -->

                                </div>
                            </div>
                    </div>
                </section></div>



    </section>
</section>
<!-- END CONTENT -->

<div class="chatapi-windows ">


</div>    </div>
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArv9ALhBv6ihfhABHEAkFg0-JHywhtgjM&sensor=false"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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







<script type="text/javascript">
    jQuery(document).ready(function($)
    {
        var map;
        var geocoder = new google.maps.Geocoder();

        var markers = [];
        var iterator = 0;

        var lekki = new google.maps.LatLng(6.470034, 3.619918),
                ikeja = new google.maps.LatLng(6.604077, 3.356933);
			calvary = new google.maps.LatLng(6.568628, 3.282348);

        var neighborhoods = [
            new google.maps.LatLng(6.539095, 3.899189),
            new google.maps.LatLng(6.733483, 3.606678),
            new google.maps.LatLng(6.679279, 3.196751),
            new google.maps.LatLng(6.436779, 2.891880),
            new google.maps.LatLng(6.589691, 3.975150),
            new google.maps.LatLng(6.835311, 3.640217),
            new google.maps.LatLng(6.496894, 3.357933),
        ];

        function initialize()
        {
            var mapOptions = {
                zoom: 16,
                center: calvary
            };

            // Calculate Height
            var el = document.getElementById('map-1'),
                    doc_height =
                    $(document).height() - 10 -
                    $(".main-content > .user-info-navbar").outerHeight() -
                    $(".main-content > .page-title").outerHeight() -
                    $(".google-map-env .map-toolbar").outerHeight();

            // Adjust map height to fit the document contianer
            el.style.height = doc_height + 'px';

            map = new google.maps.Map(el, mapOptions);

            for (var i = 0; i < neighborhoods.length; i++)
            {
                setTimeout(function() {
                    addMarker();
                }, i * 200 + 200);
            }

            // Stockholm Marker
            new google.maps.Marker({
                map: map,
                position: calvary,
                draggable: true
            });
        }

        function addMarker()
        {
            markers.push(new google.maps.Marker({
                position: neighborhoods[iterator],
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP
            }));

            iterator++;
        }

        google.maps.event.addDomListener(window, 'load', initialize);

        // Toolbar
        $("#go-sthlm").on('click', function(ev)
        {
            ev.preventDefault();

            map.panTo(ikeja);
        });

        $("#go-bln").on('click', function(ev)
        {
            ev.preventDefault();

            map.panTo(lekki);
        });

        $("#map-unzoom").on('click', function(ev)
        {
            ev.preventDefault();

            map.setZoom(map.getZoom() - 1);
        });

        $("#map-resetzoom").on('click', function(ev)
        {
            ev.preventDefault();

            map.setZoom(12);
        });

        $("#map-zoom").on('click', function(ev)
        {
            ev.preventDefault();

            map.setZoom(map.getZoom() + 1);
        });

        $("#address-search").submit(function(ev)
        {
            ev.preventDefault();

            var $inp = $(this).find('.form-control'),
                    address = $inp.val().trim();

            $inp.prev().find('i').addClass('fa-spinner fa-spin');

            if (address.length != 0)
            {
                geocoder.geocode({'address': address}, function(results, status)
                {
                    $inp.prev().find('i').removeClass('fa-spinner fa-spin');

                    if (status == google.maps.GeocoderStatus.OK)
                    {
                        map.setCenter(results[0].geometry.location);

                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            draggable: true
                        });

                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
        });
    });
</script>
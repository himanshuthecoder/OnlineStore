<?php
$baseurl=url('/');

// development stage
$theme_sidebar=(Request::has('theme'))?Request::get('theme'):0; // 0,1,2

$dark_global_theme=(Request::has('darktheme'))?true:false;; // true false

/*
    0
    1 dark-sidenav
    2 dark-sidenav navy-sidenav
*/

$sidebar="";
if($theme_sidebar==1)$sidebar="dark-sidenav";
if($theme_sidebar==2)$sidebar="dark-sidenav navy-sidenav";

$body_background = '#f9f9f9b3';

$theme="";
if($dark_global_theme){$theme="-dark";$body_background='#25293a';};
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>{{config('app.name')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Online Store For Online businesses" name="description" />
        <meta content="Himanshu Sharma" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta property="og:title" content="OnlineStore"/>
        <meta property="og:image" content="{{$baseurl}}/custom/images/logo-1-light.png"/>


        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">


        <!-- App css -->
        <link href="{{$baseurl}}/dastone/css/bootstrap{{$theme}}.min.css" id="bootstrap_theme_link" rel="stylesheet" type="text/css" />
        <link href="{{$baseurl}}/dastone/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{$baseurl}}/dastone/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="{{$baseurl}}/dastone/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        <link href="{{$baseurl}}/dastone/css/app{{$theme}}.min.css" id="app_theme_link" rel="stylesheet" type="text/css" />

        <!-- Extra -->
        <!--
            To Shift Sidebar to Right
        <link href="{{$baseurl}}/dastone/css/app-rtl.min.css" rel="stylesheet" type="text/css" />
        -->

        <link href="{{$baseurl}}/dastone/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <link href="{{$baseurl}}/dastone/plugins/animate/animate.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/dragula/dragula.min.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/dropify/css/dropify.min.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/fullcalendar/packages/bootstrap/main.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/fullcalendar/packages/core/main.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/fullcalendar/packages/daygrid/main.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/fullcalendar/packages/list/main.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/fullcalendar/packages/timegrid/main.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/ion-rangeslider/ion.rangeSlider.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/leaflet/leaflet.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/lightbox/magnific-popup.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/lightpick/lightpick.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/nestable/jquery.nestable.min.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/summernote/summernote-bs4.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

        <link href="{{$baseurl}}/dastone/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/treeview/themes/default/style.css" rel="stylesheet" type="text/css">
        <link href="{{$baseurl}}/dastone/plugins/leaflet/leaflet.css" rel="stylesheet">
        <link href="{{$baseurl}}/dastone/plugins/lightpick/lightpick.css" rel="stylesheet" />
        <link href="{{$baseurl}}/dastone/plugins/dropify/css/dropify.min.css" rel="stylesheet">
        <link href="{{$baseurl}}/dastone/plugins/dragula/dragula.min.css" rel="stylesheet" type="text/css" />
        <script src="{{$baseurl}}/dastone/js/jquery.min.js"></script>
        <script src="{{$baseurl}}/dastone/js/jquery.core.js"> </script>

        <style type="text/css">
            @if($dark_global_theme == 'true')
            .select2-search--dropdown{
                background-color: #2e2d4500;
                color: #000;
                border: 1px solid #383e52;
            }
            .select2-search__field{
                background-color: #2e2d4500;
                color: #000;
                border: 1px solid #383e52;
            }
            .select2-results {
                background-color: #2e2d4500;
                color: #000;
                border: 1px solid #383e52;
            }
            .select2-container--default .select2-selection--single{
                background-color: #2e2d4500;
                color: white;
                border: 1px solid #383e52;
            }
            .select2-container--default .select2-selection--multiple{
                background-color: #2e2d4500;
                color: #000;
                border: 1px solid #383e52;
            }
            .select2-container--default .select2-selection--multiple .select2-selection__choice{
                color:#bac1dc;
                background-color: #2e2d4500;
                border-color:#383e52 ;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered
            {
                color: #bac1dc;
            }
            @else
            .select2-container--default .select2-selection--multiple{
                border: 1px solid #e3ebf6;
                min-height: 33px;
            }
            .select2-container--default .select2-selection--single{
                border: 1px solid #e3ebf6;
                min-height: 33px;
            }
            .select2-container--default .select2-selection--multiple{
                border: 1px solid #e3ebf6;
                min-height: 33px;
            }
            .select2-container--default .select2-selection--single{
                border: 1px solid #e3ebf6;
                min-height: 33px;
            }

            .select2-container--default .select2-selection--multiple .select2-selection__choice{
                color:black;
            }

            @endif





        </style>
    </head>

    <body class="{{$sidebar}}" data-layout="vertical">



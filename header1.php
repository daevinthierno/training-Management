<?php
include 'include/config.php';

?>


<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dangote</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="apple-touch-icon" href="assets/image/dangotepp.png"/>
    <link rel="shortcut icon" href="assets/image/dangotepp.png"/>
    <link rel="icon" href="assets/image/dangotepp.png">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.css">
    
    <!-- jvectormap -->
    <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.css">
      <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
     <!-- DataTables -->
     <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="assets/plugins/iCheck/all.css">
    <!-- datatable button css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">

    <!-- Material Design -->
    <link rel="stylesheet" href="assets/dist/css/bootstrap-material-design.css">
    <link rel="stylesheet" href="assets/dist/css/ripples.css">
    <link rel="stylesheet" href="assets/dist/css/MaterialAdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/all-md-skins.css">
    <!-- datatable button css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="http://www.dangote-cement.com" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>DC</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img src="assets/image/dangotesmall.png" alt=""></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="common/login.php"><span class="hidden-xs"><i
                                        class="fa fa-sign-out"></i>&nbsp; LOGIN</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
     <!-- Main content -->
     <div class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">

              <?php 
                  $sql_training = "SELECT DISTINCT theme FROM training";
                  $t_result = mysqli_query($conn,$sql_training);
                  if ($t_result) {
                    # code...
                  $t_num = mysqli_num_rows($t_result);
              ?>
             
              <h3><?php  echo $t_num; } ?></h3>

              <p>Training</p>
            </div>
            <div class="icon">
              <i class="fa fa-opera"></i>
            </div>
            <a href="index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php 
               $sql_dep  = "SELECT  * from department";
               $dep_result = mysqli_query($conn,$sql_dep);
               if($dep_result){
                  $dep_num = mysqli_num_rows($dep_result);
               
              ?>
              <h3><?php echo $dep_num; }?></h3>

              <p>Department</p>
            </div>
            <div class="icon">
              <i class="fa fa-building-o"></i>
            </div>
            <a href="index1.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>12</h3>

              <p>Annual Training</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="index3.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            
              <?php 
               $sql_emp  = "SELECT  * from employee";
               $emp_result = mysqli_query($conn,$sql_emp);
               if($emp_result){
                  $emp_num = mysqli_num_rows($emp_result);
               
              ?>
              <h3><?php echo $emp_num; }?></h3>

              <p>Employee Attendance</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="index2.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        </div>
        <!-- ./col --> 
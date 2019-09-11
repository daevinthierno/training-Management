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
    <link rel="stylesheet" href="<?php echo assets('bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo assets('bower_components/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo assets('bower_components/Ionicons/css/ionicons.min.css') ?>">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
          href="<?php echo assets('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">

    <!-- DataTables -->
    <link rel="stylesheet"
          href="<?php echo assets('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
    
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo assets('plugins/iCheck/all.css') ?>">
    <!-- datatable button css -->
    <link rel="stylesheet" href="<?php echo assets('css/style.css') ?>">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo assets('bower_components/select2/dist/css/select2.min.css') ?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo assets('dist/css/AdminLTE.min.css') ?>">
    <!-- Material Design -->
    <link rel="stylesheet" href="<?php echo assets('dist/css/bootstrap-material-design.min.css') ?>">
    <link rel="stylesheet" href="<?php echo assets('dist/css/ripples.min.css') ?>">
    <link rel="stylesheet" href="<?php echo assets('dist/css/MaterialAdminLTE.min.css') ?>">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo assets('dist/css/skins/all-md-skins.min.css') ?>">

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
        <a href="http://www.dangote.com" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>DC</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img src="<?php echo assets('image/dangotesmall.png') ?>" alt=""></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs"><?= $user['username'] ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="pull-right">
                                <button name="signout" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#signout"><i
                                            class="fa fa-sign-out"></i>&nbsp; Sign out
                                </button>
                                <?php 
                                    if (isset($_POST['signout'])) {
                                        # code...
                                        session_destroy();
                                    }
                                 ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="" class="img-circle"
                     alt="">
            </div>
            <div class="pull-left info">
                <p class="text-bold"><?= $user['username'] ?></p>
                <p>
                    <?php if ($user['PrivilegeID'] === '1'): ?>
                        Administrator
                    <?php elseif ($user['PrivilegeID'] === '2'): ?>
                        HSE
                    <?php endif; ?>
                </p>
                <a href=""></a>
            </div>
        </div>
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="<?php echo getPath() === 'dashboard.php' ? 'bg-gray' : '' ?>"><a
                            href="../common/dashboard.php"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
                <?php if ($user['PrivilegeID'] === '2') : ?>
                    <li class="<?php echo getPath() === 'health.php' ? 'bg-gray' : '' ?>"><a
                                href="../hse/health.php"><i class="fa fa-first-order"></i> HEALTH TALK AWARENESS</a>
                    </li>
                    <li class="<?php echo getPath() === 'safety.php' ? 'bg-gray' : '' ?>"><a
                                href="../hse/safety.php"><i class="fa fa-shield "></i> SAFETY TRAINING</a></li>
                    <li class="<?php echo getPath() === 'toolbox.php' ? 'bg-gray' : '' ?>"><a href="../hse/tool.php"><i
                                    class="fa fa-wrench"></i> TOOL BOX</a></li>
                    <li class="<?php echo getPath() === 'induction.php' ? 'bg-gray' : '' ?>"><a
                                href="../hse/induction.php"><i class="fa fa-book"></i> INDUCTION</a></li>
                <?php elseif ($user['PrivilegeID'] === '1') : ?>
                    <li class="<?php echo getPath() === 'enterprises.php' ? 'bg-gray' : '' ?>"><a
                                href="../admin/enterprises.php"><i class="fa fa-building"></i> ENTERPRISES</a></li>
                    <li class="<?php echo getPath() === 'departments.php' ? 'bg-gray' : '' ?>"><a
                                href="../admin/departments.php"><i class="fa fa-building-o"></i> DEPARTMENTS</a></li>
                    <li class="<?php echo getPath() === 'employees.php' ? 'bg-gray' : '' ?>"><a
                                href="../admin/employees.php"><i class="fa fa-users"></i> EMPLOYEES</a></li>
                    <li class="<?php echo getPath() === 'users.php' ? 'bg-gray' : '' ?>"><a
                                href="../admin/users.php"><i class="fa fa-user-secret"></i> USERS</a></li>
                <?php endif; ?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper"
     style="background: url('<?php echo assets('image/safety_title.png') ?>'); background-size: contain; background-repeat: no-repeat; background-position: center;">
       <!-- Main content -->
        <section class="content">
            <section class="content-header">
                <?php if (isset($_SESSION["flash"])): ?><!-- To generate a message-->
                <?php foreach ($_SESSION["flash"] as $type => $message): ?>
                    <div class="alert alert-<?= $type; ?> alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-label="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i><?php $type; ?></h4><span><?= $message; ?></span>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION["flash"]); ?>
                <?php endif; ?>
                <div class="alert alert-success alert-dismissable" id="alertSuccess" style="display: none">
                    <button type="button" class="close" data-dismiss="alert" aria-label="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i>Success</h4><span id="successMessage"></span>
                </div>
                <div class="alert alert-danger alert-dismissable" id="alertDanger" style="display: none">
                    <button type="button" class="close" data-dismiss="alert" aria-label="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i>Danger</h4><span id="dangerMessage"></span>
                </div>
            </section>

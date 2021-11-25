<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SIRUSUN</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/assets-page/'); ?>img/jpt.png">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?= base_url('assets/'); ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/font-awesome/css/all.min.css" rel="stylesheet">
    <!-- Switcher -->
    <link href="<?= base_url('assets/'); ?>css/bootstrap4-toggle.min.css" rel="stylesheet">
    <!-- lightbox -->
    <link href="<?= base_url('assets/'); ?>css/lightbox/lightbox.min.css" rel="stylesheet">
    <!-- datepicker -->
    <link href="<?= base_url('assets/'); ?>css/bootstrap-datepicker.css" rel="stylesheet">
    <!-- datatables -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="<?= base_url('assets/assets-page/'); ?>img/jpt.png" alt="">
                <small class="brand-title">Si Rusun Disperkimtan Jeneponto</small>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">

                        </div>

                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <span class=""><?= $user['username']; ?></span>
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="<?= base_url('assets/'); ?>app-profile.html" class="dropdown-item">
                                        <i class="fa fa-gear"></i>
                                        <span class="ml-2">Change Password </span>
                                    </a>
                                    <a href="<?= base_url('assets/'); ?>" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
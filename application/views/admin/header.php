<!doctype html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/bootstrap-datepicker/css/datepicker3.css" />

        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/select2/select2.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/jstree/themes/default/style.css" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/stylesheets/theme.css" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/stylesheets/skins/default.css" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/stylesheets/theme-custom.css">

        <!-- Head Libs -->
        <script src="<?php echo base_url() ?>assets/admin/vendor/modernizr/modernizr.js"></script>



        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/dropzone/css/basic.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/dropzone/css/dropzone.css" />
        <script src="<?php echo base_url() ?>assets/admin/vendor/dropzone/dropzone.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/vendor/jquery/jquery.js"></script>
        <!-- JS For Validation -->

        <script type="text/javascript"
        src="<?php echo base_url(); ?>assets/validation/dist/js/formValidation.js"></script>

        <script type="text/javascript"
        src="<?php echo base_url(); ?>assets/validation/dist/js/framework/bootstrap.js"></script>

    </head>
    <body>
        <section class="body">

            <!-- start: header -->
            <header class="header">
                <div class="logo-container">

                    <a href="../" class="logo">
                        <p style="font-size: 22px"><strong><?php echo $this->config->item('app_name'); ?></strong></p>
                        <!--<img src="<?php //echo base_url()   ?>assets/admin/images/logo.png" height="35" alt="Porto Admin" />-->
                    </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <!-- start: search & user box -->
                <div class="header-right">
                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="<?php echo base_url() ?>assets/admin/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                            </figure>
                            <div class="profile-info" data-lock-name="<?php echo $this->session->userdata('username') ?>" data-lock-email="">
                                <span class="name"><?php echo $this->session->userdata('username') ?></span>
                                <span class="role">administrator</span>
                            </div>

                            <i class="fa custom-caret"></i>
                        </a>

                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>

                                <li>
                                    <a role="menuitem" tabindex="-1" href="<?php echo base_url() . 'admin/account/password' ?>"><i class="fa fa-lock"></i> Change password</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="<?php echo base_url() . 'admin/login/logout' ?>"><i class="fa fa-power-off"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end: search & user box -->
            </header>
            <!-- end: header -->

            <div class="inner-wrapper">
                
                
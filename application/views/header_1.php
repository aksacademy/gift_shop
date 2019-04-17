<!DOCTYPE html>
<html lang="zxx">

    <head>

        <!--/tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <!--//tags -->
        <link href="<?php echo base_url() ?>assets/user/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url() ?>assets/user/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url() ?>assets/user/css/font-awesome.css" rel="stylesheet">
        <!--pop-up-box-->
        <link href="<?php echo base_url() ?>assets/user/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
        <!--//pop-up-box-->
        <!-- price range -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/user/css/jquery-ui1.css">
        <!-- fonts -->
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    </head>

    <body>
        <!-- top-header -->
        <div class="header-most-top">
            <p></p>
        </div>
        <!-- //top-header -->
        <!-- header-bot-->
        <div class="header-bot">
            <div class="header-bot_inner_wthreeinfo_header_mid">
                <!-- header-bot-->
                <div class="col-md-4 logo_agile">
                    <h1>
                        <a href="<?php echo base_url() ?>">
                            <span>Gift</span> Shop
                            <img src="<?php echo base_url() ?>assets/user/images/logo2.png" alt=" ">
                        </a>
                    </h1>
                </div>
                <!-- header-bot -->
                <div class="col-md-8 header">
                    <!-- header lists -->
                    <ul>
                        <?php if ($this->session->userdata('customer_id') != null) {
                            ?>
                            <li>

                                <span class="fa fa-user" aria-hidden="true"></span> <?php echo $this->session->userdata('name') . '!!!'; ?>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'order/history' ?>">
                                    <span class="fa fa-truck" aria-hidden="true"></span>Track Order</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'customer/profile' ?>">
                                    <span class="fa fa-user" aria-hidden="true"></span>Edit Profile</a>
                            </li>
                            
                            <li>
                                <a href="<?php echo base_url() ?>login/logout">
                                    <span class="fa fa-power-off" aria-hidden="true"></span>Logout</a>
                            </li>

                        <?php } else { ?>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#myModal1">
                                    <span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a>
                            </li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#myModal2">
                                    <span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a>
                            </li>
                        <?php } ?>

                        <!--<li>
                            <span class="fa fa-phone" aria-hidden="true"></span> +91 8980782486
                        </li>-->

                    </ul>
                    <!-- //header lists -->
                    <!-- search -->
                    
                    <div class="agileits_search">
                        <form action="<?php echo base_url() ?>gift/search" method="post">
                            <input type="search" placeholder="Gift name..." name="title" required="">
                            <button type="submit" class="btn btn-default" aria-label="Left Align">
                                <span class="fa fa-search" aria-hidden="true"> </span>
                            </button>

                        </form>
                    </div>
                    <!-- //search -->
                    <!-- cart details -->
                    <div class="top_nav_right">
                        <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                            <?php
                            if ($this->session->userdata('customer_id') == null) {
                                ?>
                                <button class="w3view-cart" data-toggle="modal" data-target="#myModal1">
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                </button>
                                <?php
                            } else {
                                ?>
                                <button class="w3view-cart" onclick="document.location.href = '<?php echo base_url().'checkout' ?>'">
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                </button>
                                <?php
                            }
                            ?>


                        </div>
                    </div>
                    <!-- //cart details -->
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
<?php
    $action = $this->uri->segment(2);
    $controller = $this->uri->segment(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">

    <meta http-equiv=”X-UA-Compatible” content=”IE=EmulateIE9”>
    <meta http-equiv=”X-UA-Compatible” content=”IE=9”>

    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/cq-favicon.png">
    <title>Cardqueue | Merchant Admin</title>
    <!--Core CSS -->
    <link href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>bower_components/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-timepicker/css/timepicker.css" />
    <link href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-reset.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url();?>assets/js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/clndr.css" rel="stylesheet">
    <!--clock css-->
    <link href="<?php echo base_url();?>assets/js/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/js/morris-chart/morris.css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/css/style-cardqueue.css" rel="stylesheet"/>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      .sortable {
          background-repeat: no-repeat;
          background-position: right center;
      }

      .form-control {
        width: 200px;
      }

      .sortable {
        min-height: auto;
      }

      .fixed-table-toolbar .search {
        border: 0;
        background: transparent;
      }

      .search {
        width: auto;
      }

      #company-logo-canvas {
        width: 100px;
        height: 100px;
        background: url('https://s3-ap-southeast-1.amazonaws.com/cardqueue/Merchant/+default_logo.png') no-repeat center center;
        background-size: cover;
      }

      .top-nav ul.top-menu>li>span {
        -webkit-border-radius: 100px;
        padding: 10px;
        background: none;
        margin-right: 0;
        border: 1px solid #F6F6F6;
        background: #F6F6F6;
      }

      #loader {
          border: 16px solid #f3f3f3;
          border-radius: 50%;
          border-top: 16px solid #1fb5ad;
          width: 120px;
          height: 120px;
          -webkit-animation: spin 2s linear infinite;
          animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }

        #overlay {
          position: fixed; /* Sit on top of the page content */
          display: none; /* Hidden by default */
          width: 100%; /* Full width (cover the whole page) */
          height: 100%; /* Full height (cover the whole page) */
          top: 0; 
          left: 0;
          right: 0;
          bottom: 0;
          background-color: rgba(0,0,0,0.5); /* Black background with opacity */
          z-index: 99999; /* Specify a stack order in case you're using a different order for other elements */
          cursor: pointer; /* Add a pointer on hover */
        }

        #loader-frame{
          position: absolute;
          top: 50%;
          left: 50%;
          font-size: 50px;
          color: white;
          transform: translate(-50%,-50%);
          -ms-transform: translate(-50%,-50%);
        }

  </style>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="<?php echo base_url();?>index.php/dashboard/" class="logo">
        <span style="color: white;">Company Logo</span>
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- inbox dropdown start-->
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-important">4</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">You have 4 Mails</p>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="<?php echo base_url();?>assets/images/avatar-mini.jpg"></span>
                                <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hello, this is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="<?php echo base_url();?>assets/images/avatar-mini-2.jpg"></span>
                                <span class="subject">
                                <span class="from">Jane Doe</span>
                                <span class="time">2 min ago</span>
                                </span>
                                <span class="message">
                                    Nice admin template
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="<?php echo base_url();?>assets/images/avatar-mini-3.jpg"></span>
                                <span class="subject">
                                <span class="from">Tasi sam</span>
                                <span class="time">2 days ago</span>
                                </span>
                                <span class="message">
                                    This is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="<?php echo base_url();?>assets/images/avatar-mini.jpg"></span>
                                <span class="subject">
                                <span class="from">Mr. Perfect</span>
                                <span class="time">2 hour ago</span>
                                </span>
                                <span class="message">
                                    Hi there, its a test
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">See all messages</a>
                </li>
            </ul>
        </li>
        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning">3</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #1 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-danger clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #2 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-success clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #3 overloaded.</a>
                        </div>
                    </div>
                </li>

            </ul>
        </li>
        <!-- notification dropdown end -->
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a href="<?php echo base_url();?>index.php/users/profile">
                <?php
                    if (isset($user_profile->data->user_metadata->name)) {
                        $name = $user_profile->data->user_metadata->name;
                    } else {
                        $name = $user_profile->data->email;
                    }

                    if (isset($user_profile->data->user_metadata->profile_picture)) {
                        $profile_picture = $user_profile->data->user_metadata->profile_picture;
                    } else {
                        $profile_picture = $user_profile->data->picture;
                    }
                ?>
                <img alt="" src="<?php echo $profile_picture;?>">
                <span class="username"><?php echo $name;?></span>
            </a>
        </li>

        <li style="margin-top: 10px;">
            <span class="username"><a href="<?php echo base_url();?>index.php/company/management" style="margin-right: 10px;"> <i class="fa fa-briefcase" aria-hidden="true"></i> Company Management</a> <a href="<?php echo base_url();?>index.php/dashboard/logout"> <i class="fa fa-key" aria-hidden="true"></i> Logout</a></span>
        </li>
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
          <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <?php
                    if ($action == '' and $controller == 'dashboard') {
                ?>
                        <a class="active" href="<?php echo base_url();?>index.php/dashboard">
                            <i class="fa fa-dashboard"></i>
                            <span>HOME</span>
                        </a>
                <?php
                    } else {
                ?>
                        <a href="<?php echo base_url();?>index.php/dashboard">
                            <i class="fa fa-dashboard"></i>
                            <span>HOME</span>
                        </a>
                <?php
                    }
                ?>
            </li>

            <li>
                <?php
                    if ($action == 'messages') {
                ?>
                        <a class="active" href="<?php echo base_url();?>index.php/company/messages">
                            <i class="fa fa-comment"></i>
                            <span>COMPANY MESSAGE</span>
                        </a>
                <?php
                    } else {
                ?>
                        <a href="<?php echo base_url();?>index.php/company/messages">
                            <i class="fa fa-comment"></i>
                            <span>COMPANY MESSAGE</span>
                        </a>
                <?php
                    }
                ?>
            </li>
            
            <li>
                <?php
                    if ($controller == 'card') {
                ?>
                        <a class="active" href="<?php echo base_url();?>index.php/card">
                            <i class="fa fa-credit-card"></i>
                            <span>CARD</span>
                        </a>
                <?php
                    } else {
                ?>
                        <a href="<?php echo base_url();?>index.php/card">
                            <i class="fa fa-credit-card"></i>
                            <span>CARD</span>
                        </a>
                <?php
                    }
                ?>
            </li>

            <li>
              <?php
                    if ($controller == 'order') {
                ?>
                        <a class="active" href="<?php echo base_url();?>index.php/order">
                            <i class="fa fa-shopping-cart"></i>
                            <span>ORDER</span>
                        </a>
                <?php
                    } else {
                ?>
                        <a href="<?php echo base_url();?>index.php/order">
                            <i class="fa fa-shopping-cart"></i>
                            <span>ORDER</span>
                        </a>
                <?php
                    }
                ?>
            </li>

            <li>
              
              <?php
                    if ($controller == 'payment') {
                ?>
                        <a class="active" href="<?php echo base_url();?>index.php/payment">
                            <i class="fa fa-money"></i>
                            <span>PAYMENT</span>
                        </a>
                <?php
                    } else {
                ?>
                        <a href="<?php echo base_url();?>index.php/payment">
                            <i class="fa fa-money"></i>
                            <span>PAYMENT</span>
                        </a>
                <?php
                    }
                ?>
            </li>

            <li>
              <?php
                    if ($controller == 'product') {
                ?>
                        <a class="active" href="<?php echo base_url();?>index.php/product">
                             <i class="fa fa-cube"></i>
                            <span>PRODUCT</span>
                        </a>
                <?php
                    } else {
                ?>
                        <a href="<?php echo base_url();?>index.php/product">
                             <i class="fa fa-cube"></i>
                            <span>PRODUCT</span>
                        </a>
                <?php
                    }
                ?>
            </li>
            
            <li>
              <a href="#">
                <i class="fa fa-server"></i>
                <span>KITCHEN</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>REPORT</span>
              </a>
            </li>
            <li>
                <?php
                    if ($controller == 'finance') {
                ?>
                        <a class="active" href="<?php echo base_url();?>index.php/finance">
                            <i class="fa fa-university"></i>
                            <span>FINANCE</span>
                        </a>
                <?php
                    } else {
                ?>
                        <a href="<?php echo base_url();?>index.php/finance">
                            <i class="fa fa-university"></i>
                            <span>FINANCE</span>
                        </a>
                <?php
                    }
                ?>
            </li>

            <li>
              <?php
                    if ($controller == 'promotion') {
                ?>
                        <a class="active" href="<?php echo base_url();?>index.php/promotion">
                            <i class="fa fa-bullhorn"></i>
                            <span>MARKETING</span>
                        </a>
                <?php
                    } else {
                ?>
                        <a href="<?php echo base_url();?>index.php/promotion">
                            <i class="fa fa-bullhorn"></i>
                            <span>MARKETING</span>
                        </a>
                <?php
                    }
                ?>
            </li>
          </ul>

          <ul class="sidebar-menu" id="nav-accordion">
              <li style="border-top: 1px solid rgba(255,255,255,0.05);">
                <?php

                    if ($controller == 'faq') {
                ?>
                        <a class="active" href="<?php echo base_url();?>index.php/company/faq">
                            <i class="fa fa-question-circle"></i>
                            <span>FAQ</span>
                        </a>
                <?php
                    } else {
                ?>
                        <a href="<?php echo base_url();?>index.php/company/faq">
                            <i class="fa fa-question-circle"></i>
                            <span>FAQ</span>
                        </a>
                <?php
                    }
                ?>
            </li>

            <li>
                <?php
                    if ($controller == 'tos') {
                ?>
                        <a class="active" href="<?php echo base_url();?>index.php/company/tos">
                            <i class="fa fa-exclamation-triangle"></i>
                            <span>Term of Service</span>
                        </a>
                <?php
                    } else {
                ?>
                        <a href="<?php echo base_url();?>index.php/company/tos">
                            <i class="fa fa-exclamation-triangle"></i>
                            <span>Term of Service</span>
                        </a>
                <?php
                    }
                ?>
            </li>
          </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
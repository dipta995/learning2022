<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Meta -->
    <title>Edulogy</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet"> -->

    <!-- Custom & Default Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="style.css">

    <!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
	<![endif]-->

</head>

<body>
    <?php
    include 'Controller/database.php';
    include 'Controller/session.php';
    if (isset($_GET['logout'])) {
        session_destroy();
        echo "<script>window.location='index.php';</script>";
    }

    $role = $_SESSION['role'];
    ?>

    <div id="wrapper">
        <!-- BEGIN # MODAL LOGIN -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Begin # DIV Form -->
                    <div id="div-forms">
                        <form action="search.php" id="login-form">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="flaticon-add" aria-hidden="true"></span>
                            </button>
                            <div class="modal-body">
                                <input class="form-control" type="text" name="search" placeholder="What you are looking for?" required>
                            </div>
                        </form><!-- End # Login Form -->
                    </div><!-- End # DIV Form -->
                </div>
            </div>
        </div>
        <!-- END # MODAL LOGIN -->

        <header class="header">
            <div class="topbar clearfix">
                <div class="container">
                    <div class="row-fluid">
                        <div class="col-md-6 col-sm-6 text-left">
                            <p>
                                <!-- <strong><i class="fa fa-phone"></i></strong> +90 543 123 45 67 &nbsp;&nbsp; -->
                                <strong><i class="fa fa-envelope"></i></strong> <a href="mailto:#">learning@hotmail.com</a>
                            </p>
                        </div><!-- end left -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end topbar -->

            <div class="container">
                <nav class="navbar navbar-default yamm">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="logo-normal">
                            <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""></a>
                        </div>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li class="dropdown hassubmenu">
                                <a href="courses.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Courses <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php
                                    $query = "SELECT * FROM categories where is_active=0 Order By cat_id desc";
                                    $result = $con->query($query);
                                    foreach ($result as $key => $value) {

                                    ?>
                                        <li><a href="course-category.php?cat_id=<?php echo $value['cat_id'] ?>"><?php echo $value['cat_name'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php
                            if (isset($_SESSION['active'])) {

                            ?>
                                <li class="dropdown hassubmenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['first_name'] ?> <span class="fa fa-angle-down"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php if ($_SESSION['role'] == "admin") {
                                            echo '<li><a href="profile.php">Admin</a></li>';
                                        } ?>

                                        <li><a href="my-courses.php">My Courses</a></li>
                                        <li><a href="change-password.php">Change Password</a></li>

                                        <li><a href="?logout=logout">Logout</a></li>

                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li><a href="auth.php">Login</a></li>
                            <?php  } ?>
                            <!-- <li><a href="page-contact.html">Contact</a></li> -->
                            <li class="iconitem"><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header>
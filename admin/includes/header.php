<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/ecommerce_oop/admin/includes/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../libs/bootstrap/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../libs/bootstrap/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    <div class="container-fluid">
        <div id="page-wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php">SB Admin</a>
                    <a class="navbar-brand" href="../../index.php">Home</a>
                </div>


                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            if (isset($_SESSION['user']) && $_SESSION['user']->role == 'admin') {
                                echo 'Hello, ' . $_SESSION['user']->firstname . ' ';
                            } else {
                                Utils::redirect('../index.php');
                            }
                            ?>
                            <i class="fa fa-user"></i>
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li class="divider"></li>
                            <li>
                                <a href="../../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li
                            <?php //if ($active == 'index') echo "class='active'"; ?>
                        >
                            <a href="../index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li
                            <?php //if ($active == 'orders') echo "class='active'"; ?>
                        >
                            <a href="../orders/index.php"><i class="fa fa-fw fa-dashboard"></i>Orders</a>
                        </li>
                        <li
                            <?php //if ($active == 'reports') echo "class='active'"; ?>
                        >
                            <a href="../reports/index.php"><i class="fa fa-fw fa-dashboard"></i>Reports</a>
                        </li>
                        <li
                            <?php //if ($active == 'products') echo "class='active'"; ?>
                        >
                            <a href="../products/index.php"><i class="fa fa-fw fa-bar-chart-o"></i>Products</a>
                        </li>
                        <li
                            <?php //if ($active == 'categories') echo "class='active'"; ?>
                        >
                            <a href="../categories/index.php"><i class="fa fa-fw fa-desktop"></i>Categories</a>
                        </li>
                        <li
                            <?php //if ($active == 'users') echo "class='active'"; ?>
                        >
                            <a href="../users/index.php"><i class="fa fa-fw fa-wrench"></i>Users</a>
                        </li>
                    </ul>

                </div>
                <!-- /.navbar-collapse -->
            </nav>
<?php require_once 'php_action/core.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Stokers</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="custom/css/custom.css">
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">
  <script src="assests/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>
  <script src="assests/bootstrap/js/bootstrap.min.js"></script>


  <link href="custom/css/style.css" rel="stylesheet">
  <link href="custom/css/default.css" id="theme" rel="stylesheet">

</head>

<body class="fix-header">
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top m-b-0">
      <div class="navbar-header">
        <div class="top-left-part">
          <a class="logo" href="dashboard.php">
            <b>
              <img src="../plugins/images/admin-logo.png" alt="home" class="dark-logo" />
              <img src="../plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
            </b>
          </a>
        </div>
        <ul class="nav navbar-top-links navbar-right pull-right">
          <li>
            <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
          </li>
          <li>
            <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
              <input type="text" placeholder="Search..." class="form-control">
              <a href="">
                <i class="fa fa-search"></i>
              </a>
            </form>
          </li>
          <li>
            <a class="profile-pic" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="waves-effect"> <img src="../plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Steave</b></a>
            <ul class="dropdown-menu">
              <li id="topNavLogout"><a href="setting.php"> <i class="glyphicon glyphicon-tasks"></i> Setting</a></li>
              <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
          <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
        </div>
        <ul class="nav" id="side-menu">
          <li style="padding: 70px 0 0;">
            <a href="dashboard.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
          </li>
          <li>
            <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Users</a>
            <ul class="dropdown-menu">
              <li id="topNavAddOrder"><a href="userDetails.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add User</a></li>
              <li id="topNavManageOrder"><a href="userDetails.php?o=manage"> <i class="glyphicon glyphicon-edit"></i> Manage User</a></li>
              <li id="topNavManageOrder"><a href="userDetails.php?o=bank"> <i class="glyphicon glyphicon-piggy-bank"></i> Bank Details</a></li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i>Orders</a>
            <ul class="dropdown-menu">
              <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>
              <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>
            </ul>
          </li>
          <?php if ($_SESSION['role'] == 1) { ?>
            <li>
              <a href="brand.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Brand</a>
            </li>
            <li>
              <a href="categories.php" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i>Category</a>
            </li>
            <li>
              <a href="product.php" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>Product</a>
            </li>
          <?php } ?>
        </ul>
      </div>

    </div>
    <div id="page-wrapper">
      <div class="container-fluid">
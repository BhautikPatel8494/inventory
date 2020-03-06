<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>

<head>

  <title>Stokers</title>

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

</head>

<body>

<div class="row">
  <!-- Vertical navbar -->
  <div class="vertical-nav bg-white" id="sidebar" style="background-color: white;">
    <div class="py-4 px-3 mb-4 bg-light">
      <a href="dashboard">
        <div class="media-body" style="height: 70px;text-align: center;">
          <h4 class="m-0" style="margin-top: 30px;">Stokers</h4>
        </div>
      </a>
    </div>

    <ul class="nav flex-column bg-white mb-0">
      <li id="navDashboard"><a href="dashboard.php"><i class="glyphicon glyphicon-list-alt"></i> Dashboard</a></li>
      <?php if ($_SESSION['role'] == 1) { ?>
        <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-btc"></i> Brand</a></li>
      <?php } ?>
      <?php if ($_SESSION['role'] == 1) { ?>
        <li id="navCategories"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i> Category</a></li>
      <?php } ?>
      <?php if ($_SESSION['role'] == 1) { ?>
        <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> Product </a></li>
      <?php } ?>
      <li class="dropdown" id="navOrder">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Orders <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>
          <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>
        </ul>
      </li>
      <?php if ($_SESSION['role'] == 1) { ?>
        <li class="dropdown" id="navUser">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> Users <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="topNavAddOrder"><a href="userDetails.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add User</a></li>
            <li id="topNavManageOrder"><a href="userDetails.php?o=manage"> <i class="glyphicon glyphicon-edit"></i> Manage User</a></li>
            <li id="topNavManageOrder"><a href="userDetails.php?o=bank"> <i class="glyphicon glyphicon-piggy-bank"></i> Bank Details</a></li>
          </ul>
        </li>
      <?php } ?>

      <li class="dropdown" id="navSetting">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-wrench"></i>Setting <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li id="topNavLogout"><a href="setting.php"> <i class="glyphicon glyphicon-tasks"></i> Setting</a></li>
          <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <div class="container" style="padding-left: 90px;">
<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>

<head>

  <title>Stokers</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- bootstrap -->
  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
  <!-- bootstrap theme-->
  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
  <script src="assests/jquery/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <!-- jquery ui -->
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
  <script src="assests/bootstrap/js/bootstrap.min.js"></script>
  <style>
    /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

    .vertical-nav {
      min-width: 17rem;
      width: 20rem;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
      transition: all 0.4s;
    }

    .page-content {
      width: calc(100% - 17rem);
      margin-left: 17rem;
      transition: all 0.4s;
    }

    /* for toggle behavior */

    #sidebar.active {
      margin-left: -17rem;
    }

    #content.active {
      width: 100%;
      margin: 0;
    }

    @media (max-width: 768px) {
      #sidebar {
        margin-left: -17rem;
      }

      #sidebar.active {
        margin-left: 0;
      }

      #content {
        width: 100%;
        margin: 0;
      }

      #content.active {
        margin-left: 17rem;
        width: calc(100% - 17rem);
      }
    }

    /*
*
* ==========================================
* FOR DEMO PURPOSE
* ==========================================
*
*/

    body {
      background: #599fd9;
      background: -webkit-linear-gradient(to right, #599fd9, #c2e59c);
      background: linear-gradient(to right, #599fd9, #c2e59c);
      min-height: 100vh;
      overflow-x: hidden;
    }

    .separator {
      margin: 3rem 0;
      border-bottom: 1px dashed #fff;
    }

    .text-uppercase {
      letter-spacing: 0.1em;
    }

    .text-gray {
      color: #aaa;
    }
  </style>

</head>

<body>

  <!-- Vertical navbar -->
  <div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
      <div class="media d-flex align-items-center"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
        <div class="media-body">
          <h4 class="m-0">Jason Doe</h4>
          <p class="font-weight-light text-muted mb-0">Web developer</p>
        </div>
      </div>
    </div>

    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>

    <ul class="nav flex-column bg-white mb-0">
      <li id="navDashboard"><a href="dashboard.php"><i class="glyphicon glyphicon-list-alt"></i> Dashboard</a></li>
      <?php if (isset($_SESSION['userId']) && $_SESSION['role'] == 1) { ?>
        <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-btc"></i> Brand</a></li>
      <?php } ?>
      <?php if (isset($_SESSION['userId']) && $_SESSION['role'] == 1) { ?>
        <li id="navCategories"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i> Category</a></li>
      <?php } ?>
      <?php if (isset($_SESSION['userId']) && $_SESSION['role'] == 1) { ?>
        <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> Product </a></li>
      <?php } ?>
      <?php if (isset($_SESSION['userId']) && $_SESSION['role'] == 1) { ?>
        <li class="dropdown" id="navUser">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> Users <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="topNavAddOrder"><a href="userDetails.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add User</a></li>
            <li id="topNavManageOrder"><a href="userDetails.php?o=manage"> <i class="glyphicon glyphicon-edit"></i> Manage User</a></li>
            <li id="topNavManageOrder"><a href="userDetails.php?o=bank"> <i class="glyphicon glyphicon-piggy-bank"></i> Bank Details</a></li>
          </ul>
        </li>
      <?php } ?>
      <li class="dropdown" id="navOrder">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Orders <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>
          <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>
        </ul>
      </li>

      <?php if (isset($_SESSION['userId']) && $_SESSION['role'] == 1) { ?>
        <li id="navReport"><a href="report.php"> <i class="glyphicon glyphicon-check"></i> Report </a></li>
      <?php } ?>
      <li class="dropdown" id="navSetting">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-wrench"></i> <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php if (isset($_SESSION['userId']) && $_SESSION['role'] == 1) { ?>
            <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Setting</a></li>
          <?php } ?>
          <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
        </ul>
      </li>
    </ul>

  </div>



  <!-- <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" style="padding:0px;">
          <img src="logo.png" alt="">
        </a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-right">

          <li id="navDashboard"><a href="dashboard.php"><i class="glyphicon glyphicon-list-alt"></i> Dashboard</a></li>
          <?php if (isset($_SESSION['userId']) && $_SESSION['role'] == 1) { ?>
            <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-btc"></i> Brand</a></li>
          <?php } ?>
          <?php if (isset($_SESSION['userId']) && $_SESSION['role'] == 1) { ?>
            <li id="navCategories"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i> Category</a></li>
          <?php } ?>
          <?php if (isset($_SESSION['userId']) && $_SESSION['role'] == 1) { ?>
            <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> Product </a></li>
          <?php } ?>
          <?php if (isset($_SESSION['userId']) && $_SESSION['role'] == 1) { ?>
            <li class="dropdown" id="navUser">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> Users <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li id="topNavAddOrder"><a href="userDetails.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add User</a></li>
                <li id="topNavManageOrder"><a href="userDetails.php?o=manage"> <i class="glyphicon glyphicon-edit"></i> Manage User</a></li>
                <li id="topNavManageOrder"><a href="userDetails.php?o=bank"> <i class="glyphicon glyphicon-piggy-bank"></i> Bank Details</a></li>
              </ul>
            </li>
          <?php } ?>

          <li class="dropdown" id="navOrder">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Orders <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>
              <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>
            </ul>
          </li>

          <?php if (isset($_SESSION['userId']) && $_SESSION['role'] == 1) { ?>
            <li id="navReport"><a href="report.php"> <i class="glyphicon glyphicon-check"></i> Report </a></li>
          <?php } ?>
          <li class="dropdown" id="navSetting">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-wrench"></i> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <?php if (isset($_SESSION['userId']) && $_SESSION['role'] == 1) { ?>
                <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Setting</a></li>
              <?php } ?>
              <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav> -->




  <div class="container">
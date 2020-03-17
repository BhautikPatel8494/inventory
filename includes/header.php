<?php require_once 'php_action/core.php';

$sql = "SELECT logo, company_name FROM company_details WHERE id = $companyId";

$logoResult = $connect->query($sql);
$logoData = $logoResult->fetch_array();

$logo = $logoData[0];
$companyName = $logoData[1];

if (isset($_SESSION['userId'])) {
  $userId = $_SESSION['userId'];
  $permissionSql = "SELECT * FROM permission WHERE company_id = $companyId AND user_id = $userId";

  $permissionResult = $connect->query($permissionSql);
  $permissionData = $permissionResult->fetch_array();

  $brandAccess = $permissionData[3];
  $catogoryAccess = $permissionData[4];
  $productAccess = $permissionData[5];
  $orderAccess = $permissionData[6];
  $purchaseOrderAccess = $permissionData[7];
  $userAccess = $permissionData[8];
}

?>
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
          <?php if ($_SESSION['role'] == 3) { ?>
            <a class="logo" href="adminDashboard.php">
            <?php } else { ?>
              <a class="logo" href="dashboard.php">
              <?php } ?>
              <b>
                <img src="<?php echo $logo ?>" alt="home" class="light-logo" height="50" width="219" />
              </b>
              </a>
        </div>
        <ul class="nav navbar-top-links navbar-right pull-right">
          <li>
            <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
          </li>
          <li>
            <a class="profile-pic" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="waves-effect"><b class="hidden-xs"><?php echo $companyName ?></b></a>
            <ul class="dropdown-menu">
              <?php
              if ($_SESSION['role'] == 1) { ?>
                <li id="topNavLogout"><a href="setting.php"> <i class="glyphicon glyphicon-tasks"></i> Setting</a></li>
              <?php } ?>
              <li id="topNavLogout"><a href="profile.php"> <i class="glyphicon glyphicon-tasks"></i> Profile</a></li>
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
          <?php if ($_SESSION['role'] == 3) { ?>
            <li style="padding: 70px 0 0;">
              <a href="adminDashboard.php?o=manage" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
            </li>
            <li>
              <a href="package.php" class="waves-effect"><i class="fa fa-gift fa-fw" aria-hidden="true"></i>Package</a>
            </li>
            <li>
              <a href="companyDetails.php?o=manage" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Company</a>
            </li>
          <?php } else { ?>
            <li style="padding: 70px 0 0;">
              <a href="dashboard.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
            </li>
            <?php if ($_SESSION['role'] == 1 || $orderAccess) { ?>
              <li>
                <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i>Sales Orders</a>
                <ul class="dropdown-menu">
                  <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>
                  <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>
                </ul>
              </li>
            <?php }
              if ($_SESSION['role'] == 1 || $orderAccess) { ?>
              <li>
                <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="waves-effect"><i class="fa fa-history  fa-fw" aria-hidden="true"></i>Purchase Orders</a>
                <ul class="dropdown-menu">
                  <li id="topNavAddOrder"><a href="purchaseOrders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>
                  <li id="topNavManageOrder"><a href="purchaseOrders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>
                </ul>
              </li>
            <?php }
              if ($_SESSION['role'] == 1 || $userAccess) { ?>
              <li>
                <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Users</a>
                <ul class="dropdown-menu">
                  <li id="topNavAddOrder"><a href="userDetails.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add User</a></li>
                  <li id="topNavManageOrder"><a href="userDetails.php?o=manage"> <i class="glyphicon glyphicon-edit"></i> Manage User</a></li>
                  <li id="topNavManageOrder"><a href="userDetails.php?o=bank"> <i class="glyphicon glyphicon-piggy-bank"></i> Bank Details</a></li>
                </ul>
              </li>
            <?php }
              if ($_SESSION['role'] == 1 || $brandAccess) { ?>
              <li>
                <a href="brand.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Brand</a>
              </li>
            <?php }
              if ($_SESSION['role'] == 1 || $catogoryAccess) { ?>
              <li>
                <a href="categories.php" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i>Category</a>
              </li>
            <?php }
              if ($_SESSION['role'] == 1 || $productAccess) { ?>
              <li>
                <a href="product.php" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i>Product</a>
              </li>
            <?php }
              if ($_SESSION['role'] == 1) { ?>
              <li>
                <a href="permission.php" class="waves-effect"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>Permission</a>
              </li>
            <?php }
              if ($_SESSION['role'] == 1 || $productAccess) { ?>
              <li>
                <a href="report.php" class="waves-effect"> <i class="fa fa-check-square-o fa-fw" aria-hidden="true"></i> Report </a>
              </li>
              <li>
                <a href="https://app.crisp.chat/website/ede79f9a-2be9-4f53-b681-a13397856670/inbox/" class="waves-effect" target="_blank"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>Chat</a>
              </li>
          <?php }
          } ?>
        </ul>
      </div>

    </div>
    <div id="page-wrapper">
      <div class="container-fluid">
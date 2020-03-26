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

  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="custom/css/custom.css">
  <script src="assests/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="assests/jquery/jquery-ui.min.css">
  <script src="assests/jquery/jquery-ui.min.js"></script>
  <script src="assests/bootstrap/js/bootstrap.min.js"></script>

  <link href="assests/dashboard/style.css" rel="stylesheet">
  <link href="custom/css/style.css" rel="stylesheet">
  <link href="custom/css/default.css" id="theme" rel="stylesheet">

</head>

<body class="fix-header" style="font-size: 15px; font-family: inherit;">
  <section id="container">
    <header class="header black-bg" style="margin-top: -71px; height: 72px; padding: 0px">
      <!--logo start-->
      <?php if ($_SESSION['role'] == 3) { ?>
        <a class="logo" href="adminDashboard.php">
          <b style="height: 50px; width: 229px;">STOK<span>ERS</span></b>
        </a>
      <?php } else { ?>
        <a class="logo" href="dashboard.php">
          <img src="<?php echo $logo ?>" alt="home" class="light-logo" height="50" width="229" />
        </a>
      <?php } ?>
      <!-- <a href="index.html" class="logo"><b>DASH<span>IO</span></b></a> -->
      <div class="sidebar-toggle-box" style="margin-top: 27px; padding-left: 14px; color: white">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo end-->
      <?php if ($_SESSION['role'] != 3) { ?>
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li><a class="logout" href="profile.php" style="margin-top: 25px;">Profile</a></li>
          </ul>
        </div>
      <?php } ?>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php" style="margin-top: 25px;">Logout</a></li>
        </ul>
      </div>
    </header>
  </section>

  <div id="sidebar" class="nav-collapse" style="width: 228px">
    <ul class="sidebar-menu" id="nav-accordion" style="margin-top: -11px">
      <?php
      if ($_SESSION['role'] === 3) { ?>
        <li class="mt">
          <a href="adminDashboard.php?o=manage" class="waves-effect"><i class="fa fa-clock-o fa-fw"></i>Dashboard</a>
        </li>
        <li>
          <a href="package.php" class="waves-effect"><i class="fa fa-gift fa-fw" aria-hidden="true"></i>Package</a>
        </li>
        <li>
          <a href="companyDetails.php?o=manage" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Company</a>
        </li>
      <?php } else { ?>
        <li class="mt" id="dashboard">
          <a class="active" href="dashboard.php"> 
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <?php if ($_SESSION['role'] == 1 || $orderAccess) { ?>
          <li class="sub-menu" id="order">
            <a href="javascript:;" data-toggle="dropdown" role="button">
              <i class="fa fa-columns fa-fw" aria-hidden="true"></i>
              <span>Sales Orders</span>
            </a>
            <ul class="sub">
              <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>
              <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>
            </ul>
          </li>
        <?php }
          if ($_SESSION['role'] == 1 || $purchaseOrderAccess) { ?>
          <li class="sub-menu" id="pOrder">
            <a href="javascript:;" data-toggle="dropdown" role="button">
              <i class="fa fa-user fa-fw" aria-hidden="true"></i>
              <span>Party</span>
            </a>
            <ul class="sub">
              <li id="topNavAddOrder"><a href="addparty.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Party</a></li>
              <li id="topNavManageOrder"><a href="addparty.php?o=manage"> <i class="glyphicon glyphicon-edit"></i> Manage Party</a></li>
            </ul>
          </li>
        <?php }
          if ($_SESSION['role'] == 1 || $purchaseOrderAccess) { ?>
          <li class="sub-menu">
            <a href="javascript:;" data-toggle="dropdown" role="button">
              <i class="fa fa-history  fa-fw" aria-hidden="true"></i>
              <span>Purchaseg Orders</span>
            </a>
            <ul class="sub">
              <li id="topNavAddOrder"><a href="purchaseOrders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>
              <li id="topNavManageOrder"><a href="purchaseOrders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>

            </ul>
          </li>
        <?php }
          if ($_SESSION['role'] == 1 || $userAccess) { ?>
          <li class="sub-menu">
            <a href="javascript:;" data-toggle="dropdown" role="button">
              <i class="fa fa-user fa-fw" aria-hidden="true"></i>
              <span>Employee</span>
            </a>
            <ul class="sub">
              <li id="topNavAddOrder"><a href="userDetails.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add User</a></li>
              <li id="topNavManageOrder"><a href="userDetails.php?o=manage"> <i class="glyphicon glyphicon-edit"></i> Manage User</a></li>
              <li id="topNavManageOrder"><a href="userDetails.php?o=bank"> <i class="glyphicon glyphicon-piggy-bank"></i> Bank Details</a></li>
            </ul>
          </li>
        <?php }
          if ($_SESSION['role'] == 1 || $brandAccess) { ?>
          <li class="sub-menu">
            <a href="brand.php" class="waves-effect"> <i class="fa fa-table fa-fw"></i>Brand</a>
          </li>
        <?php }
          if ($_SESSION['role'] == 1 || $catogoryAccess) { ?>
          <li class="sub-menu">
            <a href="categories.php" class="waves-effect"> <i class="fa fa-font fa-fw"></i>Category</a>
          </li>
        <?php }
          if ($_SESSION['role'] == 1 || $productAccess) { ?>
          <li class="sub-menu">
            <a href="product.php" class="waves-effect"> <i class="fa fa-globe fa-fw"></i>Product</a>
          </li>
        <?php }
          if ($_SESSION['role'] == 1) { ?>
          <li class="sub-menu">
            <a href="permission.php" class="waves-effect"> <i class="fa fa-check-square-o fa-fw"></i> Set Permission</a>
          </li>
          <li class="sub-menu">
            <a href="report.php" class="waves-effect"> <i class="fa fa-book"></i>View Report</a>
          </li>
          <li class="sub-menu">
            <a href="https://app.crisp.chat/website/ede79f9a-2be9-4f53-b681-a13397856670/inbox/" class="waves-effect" target="_blank"><i class="fa fa-comments-o" aria-hidden="true"></i>Chat</a>
          </li>
        <?php } ?>
        <!-- <li class="sub-menu">
          <a href="javascript:;" data-toggle="dropdown" role="button">
            <i class="fa fa-cogs" aria-hidden="true"></i>
            <span>Setting</span>
          </a>
        </li> -->
      <?php }
      ?>
    </ul>
  </div>
  <script type="text/javascript">
    // $(function() {
    //   $('a[data-toggle="dropdown"]').on('click', function(e) {
    //     window.localStorage.setItem('activeTab', $(e.target).attr('href'));
    //   });
    //   var activeTab = window.localStorage.getItem('activeTab');
    //   if (activeTab) {
    //     $('#nav-accordion a[href="' + activeTab + '"]').tab('show');
    //     window.localStorage.removeItem("activeTab");
    //   }
    // });
  </script>

  <script class="include" type="text/javascript" src="assests/dashboard/jquery.dcjqaccordion.2.7.js"></script>
  <script src="assests/dashboard/jquery.scrollTo.min.js"></script>
  <script src="assests/dashboard/common-scripts.js"></script>

  <div id="page-wrapper" style="margin-left: 47px;">
    <section id="main-content">
<?php

require_once 'php_action/db_connect.php';
session_start();

$payment = $_GET['amount'];
$companyId = $_SESSION['company_id'];

if (!$companyId) {
    header('location: http://localhost/inventory-management-system/index.php');
}

if (isset($_POST['pay'])) {
    $packageId = $_POST['packageId'];
    $sql = "INSERT INTO payment (company_id, package_id, status) VALUES ($companyId,$packageId, 1)";

    if ($connect->query($sql) === TRUE) {
        header('location: http://localhost/inventory-management-system/dashboard.php');
    } else {
        header('location: http://localhost/inventory-management-system/index.php');
    }
}


?>

<html>

<head>
    <style>
        body {
            margin-top: 20px;
        }

        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .checkbox.pull-right {
            margin: 0;
        }

        .pl-ziro {
            padding-left: 0px;
        }
    </style>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8" style="padding-top: 200px; padding-left: 400px;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Payment Details
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="payment.php">
                            <div class="form-group">
                                <label for="cardNumber">
                                    CARD NUMBER</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number" required autofocus />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label for="expityMonth">
                                            EXPIRY DATE</label>
                                        <div class="col-xs-6 col-lg-6 pl-ziro">
                                            <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                        </div>
                                        <div class="col-xs-6 col-lg-6 pl-ziro">
                                            <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label for="cvCode">
                                            CV CODE</label>
                                        <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="packageId" value="<?php echo $_GET['id'] ?>" />
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="#"><span class="badge pull-right"><?php echo $payment ?></span> Final Payment</a>
                                </li>
                            </ul>
                            <br />
                            <input type="submit" name="pay" class="btn btn-success btn-lg btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
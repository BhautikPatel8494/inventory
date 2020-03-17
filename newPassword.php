<?php
require_once 'php_action/db_connect.php';

$error = null;
if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    $email = $_GET['email'];
}

if (isset($_POST['newPassword'])) {
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password != $cpassword) {
        $error = 'Not Match';
    } else {
        $newPassword = md5($password);
        $sql = "UPDATE user_details SET password = '$newPassword' WHERE email = '$email'";
        if ($connect->query($sql) === TRUE) {
            header('location: http://localhost/inventory-management-system/login.php?type=user');
        } else {
            echo 'Failed to reset password';
        }
    }
}
?>

<link href="assests/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="assests/bootstrap/js/bootstrap.min.js"></script>
<script src="assests/jquery-ui/jquery-ui.min.js"></script>

<style>
    .form-gap {
        padding-top: 70px;
    }
</style>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">
<div class="form-gap"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Enter New Password !</h2>
                        <p>Enter your new password here.</p>
                        <p>Don't share your password with other.</p>
                        <div class="panel-body">
                            <?php if ($error) { ?>
                                <div class="messages">
                                    <div class="alert alert-warning" role="alert">
                                        <i class="glyphicon glyphicon-exclamation-sign"></i>
                                        Password don't match.
                                    </div>
                                </div>
                            <?php } ?>
                            <form id="register-form" role="form" autocomplete="off" action="newPassword.php" class="form" method="post">

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ruble color-blue"></i></span>
                                        <input id="password" name="password" placeholder="New password" class="form-control" type="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-ruble color-blue"></i></span>
                                        <input id="email" name="cpassword" placeholder="Confirm new password" class="form-control" type="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="email" value="<?php echo $email ?>">
                                    <input name="newPassword" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
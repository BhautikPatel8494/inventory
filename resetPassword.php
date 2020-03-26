<?php
require_once 'php_action/db_connect.php';

$error = null;
if ($_POST) {
    $email = $_POST['email'];
    $sql = "SELECT email 
    FROM (
        SELECT email AS email FROM user_details
        UNION ALL
        SELECT email FROM company_details
    ) a WHERE email = '$email'";
    $checkResult = $connect->query($sql);

    if ($checkResult->num_rows > 0) {
        header('location: http://localhost/inventory-management-system/php_action/user/sendMail.php?email=' . $email);
    } else {
        $error = 'Email does not exist. Please Try to register';
    }
}
?>


<link href="assests/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="assests/bootstrap/js/bootstrap.min.js"></script>
<script src="assests/jquery/jquery-ui.min.js"></script>

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
                        <?php if ($error) { ?>
                            <div class="messages">
                                <div class="alert alert-warning" role="alert">
                                    <i class="glyphicon glyphicon-exclamation-sign"></i>
                                    <?php echo $error; ?>
                                </div>
                            </div>
                        <?php } ?>
                        <h2 class="text-center">Forgot Password?</h2>
                        <p>You can reset your password here.</p>
                        <div class="panel-body">

                            <form id="register-form" role="form" autocomplete="off" action="resetPassword.php" class="form" method="post">

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="email" name="email" placeholder="email address" class="form-control" type="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    <br/>
                                    <a href="index.php">back to home</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
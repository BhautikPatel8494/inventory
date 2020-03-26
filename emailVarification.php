<?php require_once 'php_action/db_connect.php';


if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    $email = $_GET['email'];
}

$error = null;

if (isset($_POST['verify'])) {
    $code = $_POST['verifyCode'];
    $sql = "SELECT * FROM reset_password WHERE email = '$email'";
    $result = $connect->query($sql);

    if ($result->num_rows == 1) {
        $value = $result->fetch_assoc();
        $resetCode = $value['verification_code'];

        if ($resetCode == $code) {
            header('location: http://localhost/inventory-management-system/newPassword.php?email='.$email);
        } else {
            $error = 'Invalid code';
        }
    }
}

?>

<link href="assests/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="assests/bootstrap/js/bootstrap.min.js"></script>
<script src="assests/jquery/jquery-ui.min.js"></script>
<style>
    .jumbotron.text-center {
        height: 17em;
    }

    input.form-control.col-md-6 {
        width: 50%;
        margin-right: 1em;
        display: inline;
    }

    div#notes {
        margin-top: 2%;
        width: 98%;
        margin-left: 1%;
    }

    @media (min-width: 991px) {
        .col-md-9.col-sm-12 {
            margin-left: 12%;
        }
    }
</style>

<div class="container">
    <div class="row">
        <div class="alert alert-success col-md-12" role="alert" id="notes">
            <h4>NOTES</h4>
            <ul>
                <li>You will recieve a verification code on your mail for password reset request. Enter that code below.</li>
                <li>If somehow, you did not recieve the verification email then <a href="resetPassword.php">resend the verification email</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron text-center">
                <?php if ($error) { ?>
                    <div class="messages">
                        <div class="alert alert-warning" role="alert">
                            <i class="glyphicon glyphicon-exclamation-sign"></i>
                            Oopss ! Verification code is invalid. Please enter valid verification code.
                        </div>
                    </div>
                <?php } ?>
                <h2>Enter the verification code</h2>
                <form method="post" action="emailVarification.php">
                    <div class="col-md-9 col-sm-12">
                        <div class="form-group form-group-lg">
                            <input type="text" class="form-control col-md-6 col-sm-6 col-sm-offset-2" name="verifyCode" required>
                            <input type="hidden" name="email" value="<?php echo $email ?>">
                            <input class="btn btn-primary btn-lg col-md-2 col-sm-2" name="verify" type="submit" value="Verify">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
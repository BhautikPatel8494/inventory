<?php
require_once 'php_action/db_connect.php';

session_start();

if (isset($_SESSION['userId'])) {
    header('location: http://localhost/inventory-management-system/dashboard.php');
}

$errors = array();

if (isset($_POST["adminSubmit"])) {

    $username = $_POST['email'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        if ($username == "") {
            $errors[] = "Email is required";
        }

        if ($password == "") {
            $errors[] = "Password is required";
        }
    } else {
        $sql = "SELECT * FROM company_details WHERE email = '$username'";
        $result = $connect->query($sql);

        if ($result->num_rows == 1) {
            $password = md5($password);
            // exists
            $mainSql = "SELECT * FROM company_details WHERE email = '$username' AND password = '$password'";
            $mainResult = $connect->query($mainSql);

            if ($mainResult->num_rows == 1) {
                $value = $mainResult->fetch_assoc();
                $companyId = $value['id'];

                // set session
                $_SESSION['role'] = 1;
                $_SESSION['company_id'] = $companyId;

                header('location: http://localhost/inventory-management-system/dashboard.php');
            } else {

                $errors[] = "Incorrect email/password combination";
            } // /else
        } else {
            $errors[] = "Email doesnot exists";
        } // /else
    } // /else not empty username // password

}

if (isset($_POST["userSubmit"])) {

    $username = $_POST['email'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        if ($username == "") {
            $errors[] = "Email is required";
        }

        if ($password == "") {
            $errors[] = "Password is required";
        }
    } else {
        $sql = "SELECT * FROM user_details WHERE email = '$username'";
        $result = $connect->query($sql);

        if ($result->num_rows == 1) {
            $password = md5($password);
            // exists
            $mainSql = "SELECT * FROM user_details WHERE email = '$username' AND password = '$password'";
            $mainResult = $connect->query($mainSql);

            if ($mainResult->num_rows == 1) {
                $value = $mainResult->fetch_assoc();
                $user_id = $value['id'];
                $companyId = $value['company_id'];

                // set session
                $_SESSION['userId'] = $user_id;
                $_SESSION['role'] = 2;
                $_SESSION['company_id'] = $companyId;

                header('location: http://localhost/inventory-management-system/dashboard.php');
            } else {

                $errors[] = "Incorrect email/password combination";
            } // /else
        } else {
            $errors[] = "Email doesnot exists";
        } // /else
    } // /else not empty username // password

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Stokers | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" href="assests/images/admin.png">
    <link rel="shortcut icon" href="assests/images/visitortitle.png">
    <link rel="stylesheet" href="custom/css/custom.css">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="assests/auth/login/fonts/material-design-iconic-font/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="assests/auth/login/css/style.css">
    <link rel="stylesheet" href="assests/auth/login/css/bootstrap.min.css">

</head>

<body>
    <div class="row mt-4" style="width:100%;">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

            <div class="wrapper" style="height:600px; width:100%">

                <?php if ($_GET['type'] === "user") { ?>
                    <form method="POST" action="login.php?type=user" style="align:center;width:1000px">
                    <?php } else { ?>
                        <form method="POST" action="login.php?type=admin" style="align:center;width:1000px">
                        <?php } ?>
                        <form method="POST" action="login.php?type=user" style="align:center;width:1000px">
                            <div id="wizard" class="text-center" style="padding: 30px 75px 20px; margin-right:0px;">
                                <!-- SECTION 1 -->
                                <img src="assests/images/visitortitle.png" style="height:100px; width:100px" />
                                <h3 class="text-secondary" style="align:center">Login</h3>
                                <section>

                                    <div class="messages">
                                        <?php if ($errors) {
                                            foreach ($errors as $key => $value) {
                                                echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									' . $value . '</div>';
                                            }
                                        } ?>
                                    </div>

                                    <div class="form-row">
                                        <label for="">
                                            E-mail
                                        </label>
                                        <input id="email" type="email" class="form-control" name="email" autofocus>
                                    </div>

                                    <div class="form-row">
                                        <label for="">
                                            Password
                                        </label>
                                        <input id="password" type="password" class="form-control" name="password">
                                        <br /><br /><br />

                                        <div class="">
                                            <?php if ($_GET['type'] === "admin") { ?>
                                                <button type="submit" name="adminSubmit" class="btn btn-primary btn-block" style="width:350px">Submit</button>
                                            <?php } else { ?>
                                                <button type="submit" name="userSubmit" class="btn btn-primary btn-block" style="width:350px">Submit</button>
                                            <?php } ?>
                                        </div>
                                        <br /><br />
                                        <ul class="login-more p-0" style="margin-left:75px">
                                            <span class="txt1">
                                                Forgot
                                            </span>

                                            <a href="resetPassword.php" class="txt2">
                                                Username / Password?
                                            </a>

                                            <div class="text-gray">
                                                <span class="txt1">
                                                    Don’t have an account?
                                                </span>

                                                <?php if ($_GET['type'] === "admin") { ?>

                                                    <a href="register.php?type=admin" class="txt2">
                                                        Sign up
                                                    </a>

                                                <?php } else { ?>
                                                    <a href="register.php?type=user" class="txt2">
                                                        Sign up
                                                    </a>
                                                <?php } ?>
                                            </div>
                                            <a href="index" class="txt2">
                                                Back To Home
                                            </a>

                                        </ul>
                                </section>


                            </div>
                        </form>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
    <script src="assests/auth/login/js/jquery-3.3.1.min.js"></script>

    <!-- JQUERY STEP -->
    <script src="assests/auth/login/js/jquery.steps.js"></script>

    <script src="assests/auth/login/js/main.js"></script>
    <!-- Template created and distributed by Colorlib -->
</body>

</html>
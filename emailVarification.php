<link href="assests/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="assests/bootstrap/js/bootstrap.min.js"></script>
<script src="assests/jquery-ui/jquery-ui.min.js"></script>
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
    <!-- Instructions -->
    <div class="row">
        <div class="alert alert-success col-md-12" role="alert" id="notes">
            <h4>NOTES</h4>
            <ul>
                <li>You will recieve a verification code on your mail for password reset request. Enter that code below.</li>
                <li>If somehow, you did not recieve the verification email then <a href="resetPassword.php">resend the verification email</a></li>
            </ul>
        </div>
    </div>
    <!-- Verification Entry Jumbotron -->
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron text-center">
                <h2>Enter the verification code</h2>
                <form method="post" action="confirm" role="form">
                    <div class="col-md-9 col-sm-12">
                        <div class="form-group form-group-lg">
                            <input type="text" class="form-control col-md-6 col-sm-6 col-sm-offset-2" name="verifyCode" required>
                            <input class="btn btn-primary btn-lg col-md-2 col-sm-2" type="submit" value="Verify">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
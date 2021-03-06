<?php require_once 'php_action/db_connect.php';

if ($_POST) {

	$email = $_POST['email'];
	$password = md5($_POST['Password']);
	$person = $_POST['person_name'];
	$pancard = $_POST['pancard'];
	$building = $_POST['building_no'];
	$street = $_POST['street_name'];
	$landmark = $_POST['landmark'];
	$pincode = $_POST['pincode'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$mobile = $_POST['mobile'];
	$bankName = $_POST['bank_name'];
	$ifsc = $_POST['ifsc_code'];
	$accountName = $_POST['account_name'];
	$branchName = $_POST['branch_name'];
	$accountNo = $_POST['account_no'];

	$sql = "INSERT INTO users (username, password, email, role) VALUES ('$person', '$password', '$email', 2)";

	$result = $connect->query($sql);
	$id = mysqli_insert_id($connect);

	$sql1 = "INSERT INTO user_details (user_id, pancard, building_no, street_name, landmark, pincode, city, state, country, mobile, bank_name, ifsc_code, account_name, branch_name, account_no, name) VALUES ($id, '$pancard', '$building', '$street', '$landmark', '$pincode' ,'$city', '$state', '$country', '$mobile' , '$bankName',  '$ifsc', '$accountName', '$branchName', '$accountNo', '$person')";

	if ($connect->query($sql1) === true) {
		header('location: http://localhost/inventory-management-system/login.php');
	} else {
		echo("Error description: " . mysqli_error($connect));
	}
}

?>

<!DOCTYPE html>
<!-- saved from url=(0101)https://hitechparks.com/web/product/form-wizard-multi-step-form-validation/classic/Format-1/bank.html -->
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GST Mitra | Register</title>
	<link rel="shortcut icon" href="vassets/images/gtitle.png" />

	<!-- Google Font -->
	<link rel="stylesheet" href="assests/regassets/css.css">
	<!-- BootStrap Stylesheet -->
	<link rel="stylesheet" href="assests/regassets/bootstrap.min.css">
	<!-- Font-Awesome Stylesheet -->
	<link rel="stylesheet" href="assests/regassets/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



	<!-- Plugin Custom Stylesheet -->
	<link rel="stylesheet" href="assests/regassets/form-wizard-blue.css">
	<!--*****
		If you need to change the form color then you have to just change the CSS file name!! Do it very simply, like as "form-wizard-red.css" for make it red color. Our template other colors name is there ( black, blue, red, pink, purple, teal, green, yellow, orange, brown, cyan, lime ). Replace the name and make it awesome!!!
		*****-->

	<style type="text/css" media="screen">
		.header-button-group,
		.body-button-group {
			float: left;
			width: 100%;
			height: auto;
			display: block;
			text-align: center;
			overflow: hidden;
		}

		.header-button-group h2,
		.body-button-group h2 {
			font-size: 20px;
			color: #2b2b2b;
			text-transform: uppercase;
			padding: 8px 0;
		}

		.header-button-group button,
		.body-button-group button {
			background: #6753D8;
			padding: 7px 15px;
			color: #fff;
			font-weight: 500;
			text-transform: uppercase;
		}
	</style>



	<style type="text/css"></style>
</head>

<body oncontextmenu="return false;" style="background: url('assests/regassets/images/bg.jpg'); background-size: cover;">


	<!-- main content -->
	<section class="form-box">
		<div class="container">

			<div class="row">
				<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
					<h2></h2>
					<!-- Form Wizard -->
					<div class="form-wizard form-header-modarn form-body-classic">

						<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
							<h3>Register</h3>
							<p>Fill all form field to go next step</p>

							<!-- Form progress -->
							<div class="form-wizard-steps form-wizard-tolal-steps-4">
								<div class="form-wizard-progress">
									<div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 37.25%;"></div>
								</div>
								<!-- Step 1 -->
								<div class="form-wizard-step active">
									<div class="form-wizard-step-icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
									<p>Account</p>
								</div>
								<!-- Step 1 -->

								<!-- Step 2 -->
								<div class="form-wizard-step">
									<div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
									<p>Personal</p>
								</div>
								<!-- Step 2 -->

								<!-- Step 3 -->
								<div class="form-wizard-step">
									<div class="form-wizard-step-icon"><i class="fa fa-university" aria-hidden="true"></i></div>
									<p>Bank</p>
								</div>
								<!-- Step 3 -->

								<!-- Step 4 -->
								<div class="form-wizard-step">
									<div class="form-wizard-step-icon"><i class="fa fa-file-text" aria-hidden="true"></i></div>
									<p>Confirm</p>
								</div>
								<!-- Step 4 -->
							</div>
							<!-- Form progress -->


							<!-- Form Step 1 -->
							<fieldset id="step1" style="display: block;">
								<!-- Progress Bar -->
								<div class="progress">
									<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
									</div>
								</div>
								<!-- Progress Bar -->
								<h4>Account Information: <span>Step 1 - 4</span></h4>
								<div class="form-group">
									<label>Email: <span>*</span></label>
									<input type="email" id="email" name="email" placeholder="admin@gstmitra.com" class="form-control required">
								</div>
								<!-- <div class="form-group">
                    			    <label>User Name: <span>*</span></label>
                                    <input type="text" name="person_name" placeholder="User Name" class="form-control required">
                                </div> -->
								<div class="form-group">
									<label>Password: <span>*</span></label>
									<input type="password" name="Password" placeholder="User Password" class="form-control required">
								</div>
								<div class="form-group">
									<label>Confirm Password: <span>*</span></label>
									<input type="password" name="Confirmpassword" placeholder="Confirm Password" class="form-control required">
								</div>
								<div class="form-wizard-buttons">
									Already have an account ? <a href="login"> Login </a>
									<button type="button" class="btn btn-next">Next</button>
								</div>
							</fieldset>
							<!-- Form Step 1 -->


							<!-- Form Step 2 -->
							<fieldset id="step2">
								<!-- Progress Bar -->
								<div class="progress">
									<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
									</div>
								</div>
								<!-- Progress Bar -->
								<h4>Personal Information : <span>Step 2 - 4</span></h4>
								<div class="form-group">
									<label>Full Name: <span>*</span></label>
									<input type="text" id="person_name" name="person_name" placeholder="Full Name" class="form-control required input-error">
								</div>

								<div style="clear:both;"></div>
								<div class="form-group">
									<label>Pancard No: <span>*</span></label>
									<input type="text" id="pancard" name="pancard" placeholder="CDTYH8767U" class="form-control required input-error">
								</div>
								<div class="form-group">
									<label>Building Number: <span>*</span></label>
									<input type="text" id="building_no" name="building_no" placeholder="E-401" class="form-control required input-error">
								</div>
								<div class="form-group">
									<label>Street Name: <span>*</span></label>
									<input type="text" id="street_name" name="street_name" placeholder="Street Name" class="form-control required input-error">
								</div>
								<div class="form-group">
									<label>Landmark: <span>*</span></label>
									<input type="text" id="landmark" name="landmark" placeholder="Landmark" class="form-control required input-error">
								</div>
								<div class="form-group">
									<label>City: <span>*</span></label>
									<input type="text" id="city" name="city" placeholder="City" class="form-control required input-error">
								</div>
								<div class="form-group">
									<label>Pincode: <span>*</span></label>
									<input type="text" id="pincode" name="pincode" placeholder="000000" class="form-control required input-error">
								</div>
								<div class="form-group">
									<label>State: <span>*</span></label>
									<input type="text" id="state" name="state" placeholder="State" class="form-control required input-error">
								</div>
								<div class="form-group">
									<label>Country: <span>*</span></label>
									<input type="text" id="country" name="country" placeholder="Country" class="form-control required input-error">
								</div>
								<div class="form-group">
									<label>Mobile: <span>*</span></label>
									<input type="text" id="mobile" name="mobile" placeholder="9999999999" class="form-control required input-error">
								</div>

								<div class="form-wizard-buttons">
									<button type="button" class="btn btn-previous">Previous</button>
									<button type="button" class="btn btn-next">Next</button>
								</div>
							</fieldset>
							<!-- Form Step 2 -->


							<!-- Form Step 3 -->
							<fieldset id="step3">
								<!-- Progress Bar -->
								<div class="progress">
									<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
									</div>
								</div>
								<!-- Progress Bar -->
								<h4>Bank Information: <span>Step 3 - 4</span></h4>
								<div class="form-group">
									<label>Bank Name: <span>*</span></label>
									<input type="text" id="bank_name" name="bank_name" placeholder="Bank Name" class="form-control required">
								</div>
								<div class="form-group">
									<label>IFSC Code: <span>*</span></label>
									<input type="text" id="ifsc_code" name="ifsc_code" placeholder="BARO0KAPODA" class="form-control required">
								</div>
								<div class="form-group">
									<label>Account Holder Name: <span>*</span></label>
									<input type="text" id="account_name" name="account_name" placeholder="Account Name" class="form-control required">
								</div>
								<div class="form-group">
									<label>Branch Name: <span>*</span></label>
									<input type="text" id="branch_name" name="branch_name" placeholder="Branch Name" class="form-control required">
								</div>
								<div class="form-group">
									<label>Account Number: <span>*</span></label>
									<input type="text" id="account_no" name="account_no" placeholder="469801*****890" class="form-control required">
								</div>
								<br>
								<div class="form-wizard-buttons">
									<button type="button" class="btn btn-previous">Previous</button>
									<button type="button" class="btn btn-next">Next</button>
								</div>
							</fieldset>
							<!-- Form Step 3 -->


							<!-- Form Step 4 -->
							<fieldset id="step4">
								<!-- Progress Bar -->
								<div class="progress">
									<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
									</div>
								</div>
								<!-- Progress Bar -->
								<h4>Confirm Details: <span>Step 4 - 4</span></h4>
								<div style="clear:both;"></div>
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr>
												<th>Name</th>
												<td id="name"></td>
											</tr>
											<tr>
												<th>Email</th>
												<td id="temail"></td>
											</tr>
											<tr>
												<th>Mobile</th>
												<td id="tmobile"></td>
											</tr>
											<tr>
												<th>Address</th>
												<td id="taddress"></td>
											</tr>
											<tr>
												<th>Pin Code</th>
												<td id="tpincode"></td>
											</tr>
											<tr>
												<th>Country</th>
												<td id="tcountry"></td>
											</tr>
											<tr>
												<th>Bank Name</th>
												<td id="tbank_name"></td>
											</tr>
											<tr>
												<th>Branch Name</th>
												<td id="tbranch_name"></td>
											</tr>
											<tr>
												<th>Account Number</th>
												<td id="taccount_number"></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="form-wizard-buttons">
									<button type="button" class="btn btn-previous">Previous</button>
									<button type="submit" class="btn btn-submit">Submit</button>
								</div>
							</fieldset>
							<!-- Form Step 4 -->

						</form>

					</div>
					<!-- Form Wizard -->
				</div>
			</div>

		</div>
	</section>
	<!-- main content -->


	<!-- Jquery JS -->
	<script src="assests/regassets/jquery-1.11.1.min.js"></script>
	<!-- bootStrap JS -->
	<script src="assests/regassets/bootstrap.min.js"></script>


	<!-- Plugin Custom JS -->
	<script src="assests/regassets/form-wizard.js"></script>
	<!-- Plugin Custom JS -->

	<script type="text/javascript">
		$('#classic').click(function() {
			$('.form-wizard').addClass("form-header-classic").removeClass("form-header-stylist form-header-modarn");
		});

		$('#modarn').click(function() {
			$('.form-wizard').addClass("form-header-modarn").removeClass("form-header-classic form-header-stylist");
		});

		$('#stylist').click(function() {
			$('.form-wizard').addClass("form-header-stylist").removeClass("form-header-classic form-header-modarn");
		});
	</script>



	<script type="text/javascript">
		$('#classic-body').click(function() {
			$('.form-wizard').addClass("form-body-classic").removeClass("form-body-stylist form-body-material");
		});

		$('#material-body').click(function() {
			$('.form-wizard').addClass("form-body-material").removeClass("form-body-classic form-body-stylist");
		});

		$('#stylist-body').click(function() {
			$('.form-wizard').addClass("form-body-stylist").removeClass("form-body-classic form-body-material");
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			// $('#email').blur(function()
			// 	{
			// 		alert();
			// 	}
			// );
			$('.form-wizard .btn-next').on('click', function() {
				var parent_fieldset = $(this).parents('fieldset');

				var step = parent_fieldset.attr('id');
				if (step == "step3") {
					$('#name').text($('#account_name').val());
					$('#temail').text($('#email').val());
					$('#tmobile').text($('#mobile').val());
					$('#taddress').text($('#state').val());
					$('#tpincode').text($('#pincode').val());
					$('#tcountry').text($('#country').val());
					$('#tbank_name').text($('#bank_name').val());
					$('#tbranch_name').text($('#branch_name').val());
					$('#taccount_number').text($('#account_no').val());
				}
			});

			function readURL(input, id) {
				console.log(input);
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function(e) {
						$('#' + id).attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			$(".imgInp").change(function() {
				var id = $(this).data('class');
				readURL(this, id);
			});
		});
	</script>

</body>

</html>
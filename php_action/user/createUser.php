<?php

require_once '../core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {

	$userName = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
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

	$sql1 = "INSERT INTO user_details (email, password, company_id, pancard, building_no, street_name, landmark, pincode, city, state, country, mobile, bank_name, ifsc_code, account_name, branch_name, account_no, name) VALUES ('$email', '$password', $companyId,  '$pancard', '$building', '$street', '$landmark', '$pincode' ,'$city', '$state', '$country', '$mobile' , '$bankName',  '$ifsc', '$accountName', '$branchName', '$accountNo', '$username')";
	if ($connect->query($sql1) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Added";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while adding the members";
	} // /else	

	$connect->close();
	echo json_encode($valid);
} // if in_array 		

<?php

require_once '../core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {
	$user_Id = $_POST['userId'];

	$userName = $_POST['username'];
	$email = $_POST['email'];
	// $password = md5($_POST['password']);
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


	$sql = "UPDATE user_details SET name = '$userName', email = '$email', pancard = '$pancard', building_no = '$building', street_name = '$street', landmark = '$landmark', pincode = '$pincode', city = '$city', state = '$state', country = '$country', mobile = '$mobile', bank_name = '$bankName', ifsc_code = '$ifsc' ,account_name = '$accountName',branch_name = '$branchName' , account_no = '$accountNo' WHERE id = {$user_Id}";

	if ($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";

		header('location: http://localhost/inventory-management-system/userDetails.php?o=manage');
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}
} // /$_POST

$connect->close();

echo json_encode($valid);

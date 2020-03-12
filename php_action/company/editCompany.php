<?php

require_once '../core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {
	$company_Id = $_POST['companyId'];

	$email = $_POST['email'];
	$gstno = $_POST['gstin'];
	$companyName = $_POST['companyName'];
	$ownerName = $_POST['ownerName'];
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
	$access = $_POST['access'];

	$sql = "UPDATE company_details SET company_name = '$companyName', owner_name = '$ownerName', email = '$email', gstno = '$gstno', building_no = '$building', street_name = '$street', landmark = '$landmark', pincode = '$pincode', city = '$city', state = '$state', country = '$country', mobile = '$mobile', bank_name = '$bankName', ifsc_code = '$ifsc' ,account_name = '$accountName',branch_name = '$branchName' , account_no = '$accountNo', access = $access WHERE id = {$company_Id}";

	if ($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

	$connect->close();

	echo json_encode($valid);
}

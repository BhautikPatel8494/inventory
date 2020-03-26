<?php

require_once '../core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {

	$partyname= $_POST['party_name'];
	$personalname= $_POST['personal_name'];
	$bulding= $_POST['bulding_no'];
	$streetname= $_POST['street_name'];
	$landmark= $_POST['landmark'];
	$pincode= $_POST['pincode'];
	$city= $_POST['city'];
	$state= $_POST['state'];
	$country= $_POST['country'];
	$mobile= $_POST['mobile'];
	$gstin= $_POST['gstin'];
	$email	= $_POST['email'];
	$companyId = $_SESSION['company_id'];
	$sql = " INSERT INTO party (party_name, company_id, personal_name, bulding_no, street_name, landmark, pincode, city, state, country, mobile, gstin, email) VALUES ('$partyname', '$companyId', '$personalname', '$bulding', '$streetname', '$landmark', '$pincode', '$city', '$state', '$country', '$mobile', '$gstin', '$email')";

	echo $sql;
	if ($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Added";
		header('location: http://localhost/inventory-management-system/addParty.php?o=manage');
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while adding the members";
	}


	$connect->close();

	echo json_encode($valid);
} // /if $_POST

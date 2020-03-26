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
    $id=$_POST['id'];
	$sql = "UPDATE party SET party_name='$partyname', personal_name='$personalname', bulding_no='$bulding', street_name='$streetname', landmark='$landmark', pincode='$pincode', city='$city', state='$state', country='$country', mobile='$mobile' WHERE id='$id'";	
	if ($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";
		header('location: http://localhost/inventory-management-system/addParty.php?o=manage');
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating the categories";
	}

	$connect->close();

	echo json_encode($valid);
} // /if $_POST

<?php

require_once '../core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {

	$packageName = $_POST['packageName'];
	$rate = $_POST['rate'];
	$discription = $_POST['discription'];
	

	$sql = "INSERT INTO package (name, rate, description) VALUES ('$packageName', '$rate', '$discription')";

	if ($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Added";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while adding the members";
	}


	$connect->close();

	echo json_encode($valid);
} // /if $_POST

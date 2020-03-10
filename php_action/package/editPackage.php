<?php

require_once '../core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {

	$packageName = $_POST['editPackageName'];
	$rate = $_POST['editRate'];
	$description = $_POST['editDiscription'];
	$packageId = $_POST['packageId'];

	$sql = "UPDATE package SET name = '$packageName', rate = '$rate', description = '$description' WHERE id = '$packageId'";

	if ($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while adding the members";
	}

	$connect->close();

	echo json_encode($valid);
} // /if $_POST

<?php

require_once '../core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {
	$orderId = $_POST['orderId'];
	$payAmount = $_POST['payAmount'];
	$paymentType = $_POST['paymentType'];
	$paidAmount = $_POST['paidAmount'];
	$grandTotal  = $_POST['grandTotal'];
	$type  = $_POST['type'];

	$updatePaidAmount = $payAmount + $paidAmount;
	$updateDue = $grandTotal - $updatePaidAmount;

	if ($updateDue > 0) {
		$paymentStatus = 2;
	} else if ($updatePaidAmount == 0) {
		$paymentStatus = 3;
	} else {
		$paymentStatus = 1;
	}

	if ($type == 'sale') {
		$sql = "UPDATE orders SET paid = '$updatePaidAmount', due = '$updateDue', payment_type = '$paymentType', payment_status = '$paymentStatus' WHERE order_id = {$orderId}";
	} else {
		$sql = "UPDATE purchase_order SET paid = '$updatePaidAmount', due = '$updateDue', payment_type = '$paymentType', payment_status = '$paymentStatus' WHERE order_id = {$orderId}";
	}

	if ($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}


	$connect->close();

	echo json_encode($valid);
} // /if $_POST

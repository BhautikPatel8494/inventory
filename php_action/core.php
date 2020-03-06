<?php

session_start();

require_once 'db_connect.php';

// echo $_SESSION['userId'];
$companyId = $_SESSION['company_id'];

if (!$companyId) {
	header('location: http://localhost/inventory-management-system/index.php');
}

$paymentSql = "SELECT * FROM payment WHERE company_id = $companyId";
$mainResult = $connect->query($paymentSql);
if ($mainResult->num_rows == 1) {
	$value = $mainResult->fetch_assoc();
	$status = $value['status'];
	if ($status == 2) {
		if ($_SESSION['userId']) {
			session_destroy();
			header('location: http://localhost/inventory-management-system/notFound.php');
		} else {
			header('location: http://localhost/inventory-management-system/membership.php');
		}
	}
} else {
	if ($_SESSION['userId']) {
		session_destroy();
		header('location: http://localhost/inventory-management-system/notFound.php');
	} else {
		header('location: http://localhost/inventory-management-system/membership.php');
	}
}

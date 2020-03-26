<?php
require_once '../../php_action/db_connect.php';

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		if (isset($_POST['ORDERID'])) {
			echo $_POST['ORDERID'];
		}
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST['ORDERID']))
	{
		echo "Sucsess";
		$packageId = $_GET['packageId'];
		$companyId = $_GET['companyId'];
		$orderId = $_POST['ORDERID'];
		$sql = "INSERT INTO payment (company_id, package_id, orderId, status) VALUES ($companyId ,$packageId, '$orderId', 1)";

		if ($connect->query($sql) === TRUE) {
			header('location: http://localhost/inventory-management-system/dashboard.php');
		} else {
			header('location: http://localhost/inventory-management-system/index.php');
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

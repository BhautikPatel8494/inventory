<?php

require_once '../core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {
	$orderId = $_POST['orderId'];
	$type = $_POST['type'];

	$orderDate = date('Y-m-d', strtotime($_POST['orderDate']));
	$clientName = $_POST['clientName'];
	$clientContact = $_POST['clientContact'];
	$subTotalValue = $_POST['subTotalValue'];
	$vatValue =	$_POST['vatValue'];
	$totalAmountValue = $_POST['totalAmountValue'];
	$discount = $_POST['discount'];
	$grandTotalValue = $_POST['grandTotalValue'];
	$paid = $_POST['paid'];
	$dueValue = $_POST['dueValue'];
	$paymentType = $_POST['paymentType'];
	if ($dueValue > 0) {
		$paymentStatus = 2;
	} else if ($paid == 0) {
		$paymentStatus = 3;
	} else {
		$paymentStatus = 1;
	}
	$gstn = $_POST['gstn'];
	$userid = $_POST['userId'];

	if ($type == "sale") {
		$paymentPlace = $_POST['paymentPlace'];
		$sql = "UPDATE orders SET order_date = '$orderDate', client_name = '$clientName', client_contact = '$clientContact', sub_total = '$subTotalValue', vat = '$vatValue', total_amount = '$totalAmountValue', discount = '$discount', grand_total = '$grandTotalValue', paid = '$paid', due = '$dueValue', payment_type = '$paymentType', payment_status = '$paymentStatus',user_id = '$userid',payment_place = '$paymentPlace' , gstn = '$gstn' WHERE order_id = {$orderId}";
	} else {
		$sql = "UPDATE purchase_order SET order_date = '$orderDate', client_name = '$clientName', client_contact = '$clientContact', sub_total = '$subTotalValue', vat = '$vatValue', total_amount = '$totalAmountValue', discount = '$discount', grand_total = '$grandTotalValue', paid = '$paid', due = '$dueValue', payment_type = '$paymentType', payment_status = '$paymentStatus',user_id = '$userid', gstn = '$gstn' WHERE order_id = {$orderId}";
	}
	$connect->query($sql);

	$readyToUpdateOrderItem = false;
	// add the quantity from the order item to product table
	for ($x = 0; $x < count($_POST['productName']); $x++) {
		//  product table
		$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_id = " . $_POST['productName'][$x] . "";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);

		while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
			// order item table add product quantity
			if ($type == "sale") {
				$orderItemTableSql = "SELECT order_item.quantity FROM order_item WHERE order_item.order_id = {$orderId} AND type = 'sale'";
			} else {
				$orderItemTableSql = "SELECT order_item.quantity FROM order_item WHERE order_item.order_id = {$orderId} AND type = 'purchase'";
			}
			$orderItemResult = $connect->query($orderItemTableSql);
			$orderItemData = $orderItemResult->fetch_row();

			if ($type == "sale") {
				$editQuantity = $updateProductQuantityResult[0] + $orderItemData[0];
			} else {
				$editQuantity = $updateProductQuantityResult[0] - $orderItemData[0];
			}

			$updateQuantitySql = "UPDATE product SET quantity = $editQuantity WHERE product_id = " . $_POST['productName'][$x] . "";
			$connect->query($updateQuantitySql);
		} // while	

		if (count($_POST['productName']) == count($_POST['productName'])) {
			$readyToUpdateOrderItem = true;
		}
	} // /for quantity

	// remove the order item data from order item table
	for ($x = 0; $x < count($_POST['productName']); $x++) {
		if ($type == "sale") {
			$removeOrderSql = "DELETE FROM order_item WHERE order_id = {$orderId} AND type = 'sale'";
		} else {
			$removeOrderSql = "DELETE FROM order_item WHERE order_id = {$orderId} AND type = 'purchase'";
		}
		$connect->query($removeOrderSql);
	} // /for quantity

	if ($readyToUpdateOrderItem) {
		// insert the order item data 
		for ($x = 0; $x < count($_POST['productName']); $x++) {
			$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_id = " . $_POST['productName'][$x] . "";
			$updateProductQuantityData = $connect->query($updateProductQuantitySql);

			while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
				if ($type == "sale") {
					$updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['quantity'][$x];
					// add into order_item
					$orderItemSql = "INSERT INTO order_item (type, order_id, product_id, quantity, rate, total, order_item_status) 
				VALUES ('sale', {$orderId}, '" . $_POST['productName'][$x] . "', '" . $_POST['quantity'][$x] . "', '" . $_POST['rateValue'][$x] . "', '" . $_POST['totalValue'][$x] . "', 1)";
				} else {
					$updateQuantity[$x] = $updateProductQuantityResult[0] + $_POST['quantity'][$x];
					// add into order_item
					$orderItemSql = "INSERT INTO order_item (type, order_id, product_id, quantity, rate, total, order_item_status) 
				VALUES ('purchase', {$orderId}, '" . $_POST['productName'][$x] . "', '" . $_POST['quantity'][$x] . "', '" . $_POST['rateValue'][$x] . "', '" . $_POST['totalValue'][$x] . "', 1)";
				}
				// update product table
				$updateProductTable = "UPDATE product SET quantity = '" . $updateQuantity[$x] . "' WHERE product_id = " . $_POST['productName'][$x] . "";
				$connect->query($updateProductTable);
				$connect->query($orderItemSql);
			} // while	
		} // /for quantity
	}



	$valid['success'] = true;
	$valid['messages'] = "Successfully Updated";

	$connect->close();

	echo json_encode($valid);
} // /if $_POST
// echo json_encode($valid);

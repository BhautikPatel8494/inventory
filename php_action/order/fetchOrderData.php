<?php

require_once '../core.php';

$orderId = $_POST['orderId'];
$type = $_POST['type'];

$valid = array('order' => array(), 'order_item' => array());

if ($type == 'sale') {
	$sql = "SELECT orders.order_id, orders.order_date, orders.client_name, orders.client_contact, orders.sub_total, orders.vat, orders.total_amount, orders.discount, orders.grand_total, orders.paid, orders.due, orders.payment_type, orders.payment_status FROM orders 	
	WHERE orders.order_id = {$orderId}";
} else {
	$sql = "SELECT purchase_order.order_id, purchase_order.order_date, purchase_order.client_name, purchase_order.client_contact, purchase_order.sub_total, purchase_order.vat, purchase_order.total_amount, purchase_order.discount, purchase_order.grand_total, purchase_order.paid, purchase_order.due, purchase_order.payment_type, purchase_order.payment_status FROM purchase_order 	
	WHERE purchase_order.order_id = {$orderId}";
}

$result = $connect->query($sql);
$data = $result->fetch_row();
$valid['order'] = $data;


$connect->close();

echo json_encode($valid);

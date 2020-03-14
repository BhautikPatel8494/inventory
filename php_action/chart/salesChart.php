<?php
require_once '../core.php';

$productWisesql = "SELECT SUM(orders.grand_total) as totalorderItem, orders.order_date FROM orders WHERE orders.company_id = $companyId GROUP BY orders.order_date";
$productWiseQuery = $connect->query($productWisesql);

$data = array();
foreach ($productWiseQuery as $row) {
	$data[] = $row;
}

$connect->close();

echo json_encode($data);
?>
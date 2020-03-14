<?php
require_once '../core.php';

$productWisesql = "SELECT product.product_name, SUM(order_item.quantity) as totalProductSale FROM order_item INNER JOIN product ON order_item.product_id = product.product_id WHERE product.company_id = $companyId GROUP BY order_item.product_id";
$productWiseQuery = $connect->query($productWisesql);

$data = array();
foreach ($productWiseQuery as $row) {
	$data[] = $row;
}

$connect->close();

echo json_encode($data);
?>
<?php

require_once '../core.php';

$sql = "SELECT * FROM permission WHERE company_id = $companyId";

$result = $connect->query($sql);

$output = array('data' => array());
if ($result->num_rows > 0) {

	while ($row = $result->fetch_array()) {
		$userId = $row[2];
		if ($row[3] == 1) {
			$brand = '<button class="label label-success" id="brand" onclick="editPermission(' . $userId . ', brand)">Yes</label>';
		} else {
			$brand = '<button class="label label-danger" id="brand" onclick="editPermission(' . $userId . ', brand)">No</label>';
		}
		if ($row[4] == 1) {
			$category = '<button class="label label-success" id="category" onclick="editPermission(' . $userId . ', category)">Yes</label>';
		} else {
			$category = '<button class="label label-danger" id="category" onclick="editPermission(' . $userId . ', category)">No</label>';
		}
		if ($row[5] == 1) {
			$product = '<button class="label label-success" id="product" onclick="editPermission(' . $userId . ', product)">Yes</label>';
		} else {
			$product = '<button class="label label-danger" id="product" onclick="editPermission(' . $userId . ', product)">No</label>';
		}
		if ($row[6] == 1) {
			$order = '<button class="label label-success" id="orders" onclick="editPermission(' . $userId . ', orders)">Yes</label>';
		} else {
			$order = '<button class="label label-danger" id="orders" onclick="editPermission(' . $userId . ', orders)">No</label>';
		}
		if ($row[7] == 1) {
			$user = '<button class="label label-success" id="user" onclick="editPermission(' . $userId . ', user)">Yes</label>';
		} else {
			$user = '<button class="label label-danger" id="user" onclick="editPermission(' . $userId . ', user)">No</label>';
		}
		// active 
		// $brand = $row[3];
		// $category = $row[4];
		// $product = $row[5];
		// $order = $row[6];
		// $user = $row[7];

		$output['data'][] = array(
			// name
			$userId,
			$brand,
			$category,
			$product,
			$order,
			$user
		);
	} // /while 

} // if num_rows

$connect->close();

echo json_encode($output);
<?php

require_once '../core.php';

// 

$sql = "SELECT * FROM user_details WHERE company_id = $companyId";

$result = $connect->query($sql);

$output = array('data' => array());
if ($result->num_rows > 0) {

	// $row = $result->fetch_array();
	$active = "";

	while ($row = $result->fetch_array()) {
		$userid = $row[0];
		// active 
		$username = $row[18];
		$email = $row[1];
		$building_no = $row[5];
		$street_name = $row[6];
		$landmark = $row[7];
		$pincode = $row[8];
		$city = $row[9];
		$state = $row[10];
		$country = $row[11];
		$mobile = $row[12];

		$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a href="http://localhost/inventory-management-system/userDetails.php?o=edit&i='.$userid.'"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeUserModal" id="removeUserModalBtn" onclick="removeUser(' . $userid . ')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';



		$output['data'][] = array(
			// name
			$username,
			$email,
			$building_no,
			$street_name,
			$landmark,
			$pincode,
			$city,
			$state,
			$country,
			$mobile,
			// button
			$button
		);
	} // /while 

} // if num_rows

$connect->close();

echo json_encode($output);

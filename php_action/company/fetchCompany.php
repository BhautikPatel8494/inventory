<?php

require_once '../core.php';

// 

$sql = "SELECT * FROM company_details";

$result = $connect->query($sql);

$output = array('data' => array());
if ($result->num_rows > 0) {

	while ($row = $result->fetch_array()) {
		$companyWiseId = $row[0];
		// active 
		$companyName = $row[4];
		$email = $row[1];
		$building_no = $row[5];
		$street_name = $row[6];
		$landmark = $row[7];
		$pincode = $row[8];
		$city = $row[9];
		$state = $row[10];
		$country = $row[11];
		$mobile = $row[12];
		$bankName = $row[13];
		$ifsc_code = $row[14];
		$account_name = $row[15];
		$branch_name = $row[16];
		$account_no = $row[17];
		$logo = $row[20];

		if ($row[22] == 1) {
			// activate member
			$activeCompany = "<label class='label label-success'>Active</label>";
		} else {
			// deactivate member
			$activeCompany = "<label class='label label-danger'>Block</label>";
		}

		$button = '<!-- Single button -->
		<a href="http://localhost/inventory-management-system/companyDetails.php?o=edit&i='.$companyWiseId.'"> <i class="glyphicon glyphicon-edit"></i> View</a>';



		$output['data'][] = array(
			// name
			$companyName,
			$email,
			$building_no,
			$street_name,
			$landmark,
			$pincode,
			$city,
			$state,
			$country,
			$mobile,
			$activeCompany,
			$button
		);
	} // /while 

} // if num_rows

$connect->close();

echo json_encode($output);

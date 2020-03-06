<?php



require_once '../core.php';



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
		$bankName = $row[13];
		$ifsc_code = $row[14];
		$account_name = $row[15];
		$branch_name = $row[16];
		$account_no = $row[17];

		$output['data'][] = array(
			// name
			$username,
			$bankName,
			$ifsc_code,
			$account_name,
			$branch_name,
			$account_no
		);
	} // /while 

} // if num_rows

$connect->close();

echo json_encode($output);

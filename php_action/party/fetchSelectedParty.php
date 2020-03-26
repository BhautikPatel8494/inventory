<?php 	

require_once '../core.php';

$partyId = $_POST['partyId'];

$sql = "SELECT id,party_name,personal_name,bulding_no,street_name,landmark,pincode,city,state,country,mobile FROM party WHERE id = $partyId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);



<?php 	

require_once '../core.php';

$packageId = $_POST['packageId'];

$sql = "SELECT * FROM package WHERE id = $packageId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
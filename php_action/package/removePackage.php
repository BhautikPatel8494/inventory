<?php 	

require_once '../core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$packageId = $_POST['packageId'];

if($packageId) { 

 $sql = "DELETE FROM package WHERE id = {$packageId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST
<?php 	

require_once '../core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$userId = $_POST['userId'];

if($userId) { 

$sql = "DELETE FROM user_details WHERE id = {$userId} AND company_id = {$companyId}";

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
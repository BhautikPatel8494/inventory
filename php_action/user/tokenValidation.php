<?php

require_once '../db_connect.php';

$valid['success'] = array('success' => false, 'messages' => array());

$token = $_POST['token'];

if ($token) {

    $sql = "SELECT token FROM company_details WHERE token = '$token'";
    $checkResult = $connect->query($sql);

    if ($checkResult->num_rows > 0) {
        $valid['success'] = true;
        $valid['messages'] = "Valid token";
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Invalid token";
    }

    $connect->close();
    echo json_encode($valid);
}

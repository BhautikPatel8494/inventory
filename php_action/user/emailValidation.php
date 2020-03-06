<?php

require_once '../db_connect.php';

$valid['success'] = array('success' => false, 'messages' => array());

$email = $_POST['email'];

if ($email) {
    $sql = "SELECT email FROM user_details WHERE email = '$email'";
    $checkResult = $connect->query($sql);

    if ($checkResult->num_rows > 0) {
        $valid['success'] = true;
        $valid['messages'] = "Email already exist";
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Valid email";
    }

    $connect->close();
    echo json_encode($valid);
}

<?php
$to = 'cerojob473@sweatmail.com';
$subject = 'Marriage Proposal';
$message = 'Hi Jane, will you marry me?';
$headers = "From: bhautikpatel8494@gmail.com";

if (mail($to, $subject, $message, $headers)) {
    echo 'Your mail has been sent successfully.';
} else {
    echo 'Unable to send email. Please try again.';
}

<?php require_once '../../php_action/db_connect.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
if ($_GET) {
    $email = $_GET['email'];
    $code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    try {
        $message = file_get_contents('mailTemplate.html'); 
        $message = str_replace('%code%', $code, $message); 
        $message = str_replace('%email%', $email, $message); 
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   // Enable verbose debug output
        $mail->isSMTP();                                         // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                // Enable SMTP authentication
        $mail->Username   = 'stokersmanagment@gmail.com';        // SMTP username
        $mail->Password   = 'Stoker1111';                      // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                 // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('stokersmanagment@gmail.com', 'Stoker Managment Pvt ');
        $mail->addAddress($email);

        // Content
        $mail->MsgHTML($message);
        $mail->isHTML(true);
        $mail->CharSet="utf-8";
        $mail->Subject = 'Reset Password Verification';

        if ($mail->send()) {
            $sql = "INSERT INTO reset_password (email, verification_code) VALUES ('$email','$code') ON DUPLICATE KEY UPDATE verification_code='$code'";
            if ($connect->query($sql) === TRUE) {
                header('location: http://localhost/inventory-management-system/emailVarification.php?email=' . $email);
            }
        } else {
            header('location: http://localhost/inventory-management-system/resetPassword.php');
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

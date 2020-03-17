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
if ($_POST) {
    $email = $_POST['email'];
    $code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   // Enable verbose debug output
        $mail->isSMTP();                                         // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                // Enable SMTP authentication
        $mail->Username   = 'bhautikpatel8494@gmail.com';        // SMTP username
        $mail->Password   = 'bhautik@8494';                      // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                 // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('bhautikpatel8494@gmail.com', 'Bhautik Patel');
        $mail->addAddress($email);
        $mail->addReplyTo('info@example.com', 'Information');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Reset Password Verification';
        $mail->Body    = '<!DOCTYPE html>
                            <html>
                            <body>
                                <h1>Your verification code is '.$code.'</h1>
                                <p>Use this code to verify your account.</p>
                            </body>
                            </html>';

        if ($mail->send()) {
            $sql = "INSERT INTO reset_password (email, verification_code) VALUES ('$email','$code')";
            if ($connect->query($sql) === TRUE) {
                header('location: http://localhost/inventory-management-system/emailVarification.php?email='.$email);
            }
        } else {
            header('location: http://localhost/inventory-management-system/resetPassword.php');
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

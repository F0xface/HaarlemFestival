<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

session_start();
$email = $_SESSION['email'];

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$body = "Dear ".$email.", <br> Thanks for your reservation by Haarlem festival.<br> You can find your ticket in the appendix. 
             We look forward seeing you.<br> Send a mail for questions. <br> <br> kind regards, <br><br>Team Haarlem Festival'";
$pdf = include '../Ticket.php';

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'haarlemfestivalgr4@gmail.com';                     // SMTP username
    $mail->Password   = 'Welkom1234';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('haarlemfestivalgr4@gmail.com', 'Team Haarlem Festival');
    $mail->addAddress($email);     // Add a recipient

    // Attachments
    $mail->addStringAttachment($pdf, 'hfticket.pdf');         // Add attachments

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Ticket Haarlem festival';
    $mail->Body    = $body;
    $mail->AltBody = 'Thank you for your reservation, here is your ticket.';

    if ($mail->send()){
        echo 'Message has been sent';
        header("Location: ../../View/ThankYou.php");
        session_destroy();
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


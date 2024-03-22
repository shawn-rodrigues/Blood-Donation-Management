<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\DBMS-Project\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\DBMS-Project\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\DBMS-Project\vendor\phpmailer\phpmailer\src\SMTP.php';
require 'C:\xampp\htdocs\DBMS-Project\vendor\autoload.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host       = 'host6.xhost.co.in';
$mail->SMTPAuth   = true;
$mail->Username   = 'project@coconutplayz.xyz';
$mail->Password   = '123456789';
$mail->SMTPSecure = 'ssl'; // Use 'tls' or 'ssl'
$mail->Port       = 465;   // Adjust the port accordingly

if(isset($_POST['submit'])){

    $name = "SELECT name FROM donors WHERE bgroup = reqbgroup";
    $demail = "SELECT email FROM donors WHERE bgroup = reqbgroup";
    $message = 'We urgently need '.$_POST['reqbgroup'].' for '.$_POST['reason'];

    $mail->setFrom('your-email@example.com', 'Your Name');
    $mail->addAddress($demail, $name);
    $mail->Subject = 'Blood Donation Request';
    $mail->Body    = rawurldecode($message);

    try {
        $mail->send();
        echo 'Email sent successfully';
    } catch (Exception $e) {
        echo 'Error sending email: ', $mail->ErrorInfo;
    }
    

}

?>
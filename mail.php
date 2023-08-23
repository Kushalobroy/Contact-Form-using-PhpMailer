<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
 
try {  
    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];
    }                                 
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com;';                   
    $mail->SMTPAuth   = true;                            
    $mail->Username   = 'karn87470@gmail.com';                
    $mail->Password   = 'unatsufzhimsbvcw';                       
    $mail->SMTPSecure = 'tls';                             
    $mail->Port       = 587; 
 
    $mail->setFrom("$email", 'Contact Form');          
    $mail->addAddress("karn87470@gmail.com", "$name");
      
    $mail->isHTML(true);                                 
    $mail->Subject = 'Contact Form';
    $mail->Body    = "Sender name: $name <br> Sender Email: $email <br> Message : $msg"; 
    $mail->send();
    echo " Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
 
?>
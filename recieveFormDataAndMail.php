<?php
require 'PHPMailerAutoload.php';

//Receive form data from the Flight Booking Form Using either GET or POST
$formData = $_GET;  //$formData is an array containing all received data
//$formData = $_POST;


$mail = new PHPMailer;                                //instantiating new PHPMailer object.

$mail->isSMTP();                                     
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                               
$mail->Username = 'okumucs100@gmail.com';          
$mail->Password = 'Replace With Your Password Here';            
$mail->SMTPSecure = 'tls';                            
$mail->Port = 465;                               

$mail->setFrom('okumucs100@gmail.com', 'Okumu For Flight Booking');
$mail->addAddress('bookings@phoenixbooking.co.ke', 'Bookings');     // Recipient
$mail->addReplyTo('okumucs100@gmail.com', 'Reply To Address');


$mail->isHTML(true);                                

$mail->Subject = 'Flight Booking';

foreach ($formData as $key => $value){
    $formattedData = $key.": ". $value . "\r\n";
}
    
$mail->Body    = 'This is For Data Recieved from Form '. $formattedData;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
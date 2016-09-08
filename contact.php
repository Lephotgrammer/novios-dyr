<?php

require_once('phpmailer/class.phpmailer.php');

// Blank message to start with so we can append to it.
$message = '';

// Check that name & email aren't empty.
if(empty($_POST['name']) || empty($_POST['email'])){
    die('Please ensure name and email are provided.');
}

// Construct the message
$message .= ('Nombre '.$_POST['name']); 
/* $message .= <<<TEXT
    Name: {$_POST['name']}
    Email: {$_POST['email']}
    Number of Guest: {$_POST['numguest']}
    Events: {$_POST['allevents']}
    Attending: {$_POST['attending']}
TEXT; */

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';

$mail->host = 'smtp.google.com';
$mail->Port = 465;
$mail->Username = 'matrimonios.info@gmail.com';
$mail->Password = '987654321s';

$mail->SetFrom('matrimonios.info@gmail.com', 'Matrimonios Info');
$mail->subject = 'Nuevo invitado';
$mail->Body = $message;
$mail->AddAddress('stephanny@laboratoria.cl');

if(!$mail->Send()) {
	die('Error '.$mail->ErrorInfo);
} else {
	echo "Correo enviado";
}

<?php

require 'phpmailer/PHPMailerAutoload.php';

// Blank message to start with so we can append to it.
$message = '';

// Check that name & email aren't empty.
if(empty($_POST['name']) || empty($_POST['email'])){
    die('Please ensure name and email are provided.');
}
$name = $_POST['name'];
$email = $_POST['email'];

// Construct the message
//$message .= ('Nombre '.$_POST['name']); 
$message .= <<<TEXT
    Name: "$name"
    Email: "$email"
TEXT;

$mail = new PHPMailer;

$mail->IsSMTP();
// = 0 in production
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;


$mail->Username = 'matrimonios.info@gmail.com';
$mail->Password = '987654321s';
$mail->SetFrom('matrimonios.info@gmail.com', 'Matrimonios Info');
$mail->Body = $message;

$mail->Subject = 'Nuevo invitado';

$mail->AddAddress('stephanny@laboratoria.cl');

if(!$mail->Send()) {
	die('Error '.$mail->ErrorInfo);
} else {
	echo "Correo enviado";
}
$hola = "kck";

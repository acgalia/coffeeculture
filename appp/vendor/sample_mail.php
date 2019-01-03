<?php

require "autoload.php";

// use PHPMailer\PHPMailer;
// use PHPMailer\Exception;

require "phpmailer/phpmailer/src/PHPMailer.php";
require "phpmailer/phpmailer/src/Exception.php";
require "autoload.php";

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$staff_email = "don.dilidili@gmail.com"; // where the email is comming from
$users_email =  $_SESSION['email'];//Where the email will go
$email_subject = $_SESSION['ref_id'] . " - Order Acknowledgment";
$email_body = "

<h3>Reference Number: " . $_SESSION['ref_id']  . "</h3>

<div class='jumbotron col-12'>
	<label>To</label>
	<p class='mb-3'>$fname $lname</p>

	<label>Contact Number</label>
	<p class='mb-3'>$phone</p>

	<label>Shipping Address</label>
	<p>$shipaddress</p>
	<p>$shipcity . $shipzip</p>
</div>

<div class='card-deck'>
	//loop for every item
	<div class='card'>
		<img class='card-img-top' src='$img_path'>
		<div class='card-body'>
			<h4 class='mt-2 text-center'>$itemname</h4>
			<h5 class='mb-2 text-center'>Quantity: $quantity</h5>
		</div>
		<div class='card-footer'>
			<h5>$subtotal</h5>
		</div>
	</div>
</div>


";

try{
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = $staff_email;
	$mail->Password = "Pacifier15";
	$mail->SMTPSecure = "tls";
	$mail->Port = 587;
	$mail->setFrom($staff_email,"Whiff of Perfume");
	$mail->addAddress($users_email);
	$mail->isHTML(true);
	$mail->Subject = $email_subject;
	$mail->Body = $email_body;
	$mail->send();

	echo "Message sent!";


}catch(Exception $e){
	echo "Error sending message.".$mail->ErrorInfo;
}

?>
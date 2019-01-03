<?php
//phpmailer
// require "../../vendor/phpmailer/phpmailer/src/PHPMailer.php";
// require "../../vendor/phpmailer/phpmailer/src/Exception.php";
// require "../../vendor/autoload.php"; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$parent = dirname(__FILE__,2);
require_once $parent. "../../vendor/autoload.php"; 

$mail = new PHPMailer(true);

// $mail = new PHPMailer\PHPMailer\PHPMailer(true);

$staff_email = "aaron.carmelo.galia@gmail.com"; // where the email is coming from
$users_email =  $_SESSION['email'];//Where the email will go
$email_subject = "CSP2 Order Confirmation";
$email_body = 	"
					<p>Your order has been processed at <strong>$purchase_date</strong> with a transaction code of <strong>$transaction_code.</strong>
						Your items will be shipped at <strong>$ship_address.</strong><br>

					Kindly contact us if there are any problems regarding your order. Have a nice day!</p> <br>
				";

try{
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = $staff_email;
	$mail->Password = "carm3lotot";
	$mail->SMTPSecure = "tls";
	$mail->Port = 587;
	$mail->setFrom($staff_email,"Coffee Culture");
	$mail->addAddress($users_email);
	$mail->isHTML(true);
	$mail->Subject = $email_subject;
	$mail->Body = $email_body;
	$mail->send();

	echo "Message Sent";


}catch(Exception $e){
	echo "Not sent".$mail->ErrorInfo;
}
?>
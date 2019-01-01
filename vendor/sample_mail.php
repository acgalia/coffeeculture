<?php

// use PHPMailer\PHPMailer;
// use PHPMailer\Exception;

require "phpmailer/phpmailer/src/PHPMailer.php";
require "phpmailer/phpmailer/src/Exception.php";
require "autoload.php";

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$staff_email = "aaron.carmelo.galia@gmail.com"; // where the email is coming from
$users_email =  "aaron.carmelo.galia@gmail.com";//Where the email will go
$email_subject = "CSP2 Order Confirmation";
$email_body = "<h3>Reference Number: 11122313454654 - 1213135</h3>";

try{
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = $staff_email;
	$mail->Password = "carm3lotot";
	$mail->SMTPSecure = "tls";
	$mail->Port = 587;
	$mail->setFrom($staff_email,"Company Name");
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

<script type="text/javascript">
	//Transaction NUmber Generator -taken from php online!!!! don't know yet where to use
function generate_trans_number(){
 $ref_number = '';
 $source = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'); 
  
  for($i=0; $i < 16; $i++){
      $index = rand(0,15);
      $ref_number = $ref_number.$source[$index];
    }
  $today = getdate(); //seconds in Unix Epoch
   return $ref_number. "-" . $today[0];
}

//call the function and echo
echo generate_trans_number();
echo "<br>";
echo date("Y-m-d G:i:s"); //date function in php

</script>
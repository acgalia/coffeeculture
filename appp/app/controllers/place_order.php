<?php
session_start();

require_once 'connect.php';

//fetch data
$user_id = $_SESSION['user_id'];
$status_id = 1;
$ship_address = $_POST['ship_address'];
$_SESSION["ship_address"] = $ship_address;
$_SESSION['payment_mode_id'] = $_POST['payment_mode'];
$payment_mode_id = $_SESSION['payment_mode_id'];
$quantity = $_SESSION["quantity"];
$item_id = $_SESSION["item_id"];
$firstname = $_SESSION['firstname'];
// $data = "";

//generate reference number
$random_number = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) ); // random(ish) 5 digit int
$random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)); // random(ish) 5 character string
$transaction_code = $random_number ."-". $random_string;
$_SESSION["transaction_code"] = $transaction_code;

//generate date
$purchase_date = date_default_timezone_set('Asia/Manila');
$purchase_date = date('m/d/Y h:i:s a', time());
$_SESSION["purchase_date"] = $purchase_date;

if($payment_mode_id == 2){
	require_once 'connect.php';
	require_once '../../paypal.php';

}else{

//to insert items in the orders table
$sql = "INSERT INTO orders (user_id, transaction_code, status_id, payment_mode_id)
		VALUES ('$user_id', '$transaction_code', '$status_id', '$payment_mode_id')";
$result = mysqli_query($conn, $sql);
$order_id = mysqli_insert_id($conn);

//to insert items in the order_items table
foreach($_SESSION['cart'] as $item_id=> $quantity) {
	$sql2 = "SELECT * FROM items WHERE id = '$item_id'";
	$result2 = mysqli_query($conn, $sql2);
	if(mysqli_num_rows($result2) > 0){
	   while($row = mysqli_fetch_assoc($result2)){
		   		$sql3 = "";
		   		$price = $row["price"];
		   		$sql3 = "INSERT INTO order_items (quantity, price, order_id, item_id)
					 	 VALUES ('$quantity', '$price', '$order_id','$item_id')";
				$result3 = mysqli_query($conn, $sql3);

				//remove item from cart
				unset($_SESSION["cart"][$item_id]);  

	  	}
	}
}

//phpmailer
require_once 'phpmailer.php';


unset($_SESSION["item_count"]);
unset($_SESSION["cart"]);
header("Location: ../views/confirmation.php");

}


?>
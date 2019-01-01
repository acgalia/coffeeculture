<?php 
	session_start();
	//fetch data
	$user_id = $_SESSION['user_id'];
	$status_id = 1;
	$payment_mode_id = $_SESSION['payment_mode_id'];
	$quantity = $_SESSION["quantity"];
	$item_id = $_SESSION["item_id"];
	$transaction_code = $_SESSION["transaction_code"];
	$purchase_date = $_SESSION["purchase_date"];

	require_once 'connect.php';

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
					//unset($_SESSION["cart"][$item_id]);  

		  	}
		}
	}
	
	//phpmailer
	require_once 'phpmailer.php';
	
	unset($_SESSION["item_count"]);
	unset($_SESSION["cart"]);
	header("Location: ../views/confirmation.php");
?>
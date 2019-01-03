<?php 
	require_once 'connect.php';

	$id = $_POST['id'];
	$status_id = $_POST['status_id'];

	$sql = "UPDATE orders SET status_id = '$status_id' WHERE id = $id";

	$result = mysqli_query($conn, $sql);

	if($result){
		header("Location: ../views/orders.php");
	}
?>
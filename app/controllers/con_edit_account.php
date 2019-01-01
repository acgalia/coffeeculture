<?php 
	require_once 'connect.php';

	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	$sql = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$email', address = '$address' WHERE id = $id";

	$result = mysqli_query($conn, $sql);

	if($result){
		header("Location: ../views/account.php");
	}
?>
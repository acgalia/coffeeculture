<?php
	require_once 'connect.php';
	session_start();
	$id = $_GET['id'];
	$sql = "DELETE FROM items WHERE id = $id";
	$result = mysqli_query($conn, $sql);

	if($result){
		$_SESSION['message'] = "Item was successfully deleted!";
		header("Location: ../views/items.php");
	}

?>
<?php
	require_once 'connect.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM items WHERE id = $id";
	$result = mysqli_query($conn, $sql);

	if($result){
		header("Location: ../views/items.php");
	}

?>
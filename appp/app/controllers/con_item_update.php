<?php 
	require_once 'connect.php';
	session_start();
	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$img_path = $_POST['img_path'];
	$category_id = $_POST['category_id'];

	$sql = "UPDATE items SET name = '$name', price = '$price', description = '$description', img_path = '$img_path', category_id = '$category_id' WHERE id = $id";

	$result = mysqli_query($conn, $sql);

	if($result){
		$_SESSION['message'] = "Item was successfully edited!";
		header("Location: ../views/items.php");
	}
?>

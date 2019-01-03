<?php
require_once 'connect.php';

$name = $_POST['item_name'];
$price = $_POST['item_price'];
$description = $_POST['item_description'];
$img_path = $_POST['img_path'];
$category_id = $_POST['category_id'];

$data = "";

$sql = "INSERT INTO items (name, price, description, img_path, category_id)
		VALUES ('$name', '$price', '$description', '$img_path', '$category_id')";
$result = mysqli_query($conn, $sql);

if($result){
		$data = "Item added";
}

echo $data;
?>
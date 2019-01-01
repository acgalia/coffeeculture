<?php
session_start();

$item_id = $_POST["productId"];
$quantity = $_POST["quantity"];

//update the items for session cart variable
$_SESSION["item_id"] = $item_id;
$_SESSION["quantity"] = $quantity;

$_SESSION["cart"][$item_id] = $quantity;
$_SESSION["item_count"] = array_sum($_SESSION["cart"]);

echo "<span class ='glyphicon glyphicon-shopping cart'></span><i class='fab fa-opencart'></i> Cart <span class = 'badge badge-primary'>". $_SESSION['item_count']."</span>";


?>
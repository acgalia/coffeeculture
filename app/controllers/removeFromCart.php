<?php
session_start();

$id = $_POST["product"];

//unset()
unset($_SESSION["cart"]["$id"]);

$_SESSION["item_count"] = array_sum($_SESSION["cart"]);

echo "
<span class ='glyphicon glyphicon-shopping-cart'></span><i class='fab fa-opencart'></i> Cart <span class='badge'>". $_SESSION['item_count']."</span>";

?>
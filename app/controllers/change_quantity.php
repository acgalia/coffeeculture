<?php 
session_start();

$item_id = $_POST['id'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
// $subTotal = $quantity * $price;
// $grand_total += $subTotal;

$_SESSION["item_id"] = $item_id;
$_SESSION["quantity"] = $quantity;

//$_SESSION["price"] = $price;
//$_SESSION["subTotal"] = number_format("$subTotal", 2);
//$_SESSION["grand_total"] = number_format("$grand_total", 2);

$_SESSION["cart"][$item_id] = $quantity;
$_SESSION["grandtotal"][$item_id] = $quantity * $price;
$_SESSION["item_count"] = array_sum($_SESSION["cart"]);

echo "<span class ='glyphicon glyphicon-shopping cart'></span><i class='fab fa-opencart'></i> Cart <span class = 'badge badge-primary'>". $_SESSION['item_count']."</span>";

// $newprice = $quantity * $price;

//from Don
// session_start();

// $itemid = $_POST["itemid"];
// $quantity = $_POST["quantity"];
// $price = $_POST["price"];

// // update the items for session cart available
// $_SESSION["cart"][$itemid] = $quantity;
// $_SESSION["grandtotal"][$itemid] = $quantity * $price;
// $_SESSION["item_count"] = count($_SESSION["cart"]);

// echo number_format("$_SESSION["grandtotal"][$itemid]",2);
//from Don
?>
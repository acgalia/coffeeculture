<?php
include 'connect.php';
session_start();

$user_id = $_SESSION['user_id'];
$data = "";
					    	
$sql = "SELECT order_items.quantity, order_items.price, items.name, orders.transaction_code, orders.purchase_date FROM ((order_items INNER JOIN items ON order_items.item_id = items.id) INNER JOIN orders ON order_items.order_id = orders.id)  WHERE user_id = '$user_id' ORDER BY orders.purchase_date DESC";
$result = mysqli_query($conn, $sql);						

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$data.="
			<tr>
				<td>$row[transaction_code]</td>
				<td>$row[purchase_date]</td>
				<td>$row[name]</td>
				<td>$row[price]</td>
				<td>$row[quantity]</td>
			</tr>						

			  ";
	}
}
// $sql = "SELECT * FROM orders WHERE ";
echo $data;


?>
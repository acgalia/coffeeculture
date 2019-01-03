<?php
require_once 'connect.php';
session_start();

$user_id = $_SESSION['user_id'];
$data = "";
					    	
$sql = "SELECT order_items.quantity, order_items.price, items.name, orders.transaction_code, orders.purchase_date FROM ((order_items INNER JOIN items ON order_items.item_id = items.id) INNER JOIN orders ON order_items.order_id = orders.id)  WHERE user_id = '$user_id' ORDER BY orders.purchase_date DESC";
$result = mysqli_query($conn, $sql);						

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$data.="
				<div class='card text-center mb-5'>
						 	<div class='card-header bg-dark text-light'>
						    	Transaction Number:  $row[transaction_code]
						  	</div>
						  	<div class='card-body'>
						  		<div>
						  		<small>Date and Time Purchased</small>			    	
						    	<p class='card-text'><strong>$row[purchase_date]</strong></h5>
						    	</div>
						    	<table class='table'>
									<thead class='bg-dark text-light'>
										<tr>
											<th><small>Item</small></th>
											<th><small>Price</small></th>
											<th><small>Quantity</small></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>$row[name]</td>
											<td>$row[price]</td>
											<td>$row[quantity]</td>
										</tr>
									</tbody>
								</table>

						  	</div>
						</div>

			  ";
	}
}
// $sql = "SELECT * FROM orders WHERE ";
echo $data;


?>
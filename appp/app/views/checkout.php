<?php include "../partials/header.php";?>
<?php include "../partials/navbar.php";?>

<?php
$quantity = $_SESSION["quantity"];
$_SESSION["price"] = $price;
?>


<div class="container">
	<h1 class="mb-5 text-center">Checkout</h1>	
	<div class="row mb-5">
	    <div class="col-lg-1"></div>
		<div class="col-lg-6">
			<form action="../controllers/place_order.php" method="post" id="place_order">
			<label>Shipping Address</label>						
			<input type='text' class='form-control mb-3' name='ship_address' value='<?php echo $_SESSION['address']?>'>
		<!-- 	<input type="text" class="form-control mb-3" id="ship_address" placeholder="Address"> -->
		</div>
				
		<div class="col-lg-4 mb-5">
			<label>Payment Method</label>
			<select class="custom-select" name="payment_mode">
		        <option value="1">COD</option>
		        <option value="2">Paypal</option>
		     </select>
		    <!--  <button type="button" class="btn btn-dark mt-3">Place Order Now</button> 	 -->
		</div>
			
	
		<table class="table table-striped mt-3">
           		<thead>
	             <tr>
	               <th scope="col">Item Name</th>
	               <th scope="col">Item Price</th>
	               <th scope="col">Item Quantity</th>
	               <th scope="col">Item Sub-total</th>
	             </tr>
	           </thead>
	           <tbody>
		<?php 

		require "../controllers/connect.php"; 	         
		$data = "";
		$grand_total = 0;
		foreach($_SESSION['cart'] as $item_id=> $quantity) {
   		$sql = "SELECT * FROM items where id = '$item_id' ";
        $result = mysqli_query($conn, $sql);
               if(mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_assoc($result)){
                     $name = $row["name"];
                     $description = $row["description"];
                     $price = $row["price"];
                     $subTotal = $quantity * $price;
                     $grand_total += $subTotal;
                     $_SESSION["grand_total"] = $grand_total;

                       $data .=
                         "
                         
                          <tr>
                          <td>$name</td>
                          <td>$price</td>
                          <td>$quantity</td>
                          <td>". number_format ("$subTotal",2)  ."</td>
                          </tr>

                         ";
                   }
               }
		}


		echo $data;
		//echo "<input id='place_order_btn' type='submit' class='btn btn-dark mt-3' value='Place Order Now'><div><h4 style='color:red;'> Your Total is ₱" . $grand_total . "</h4></div>";
		?>
			<!-- <input id='place_order_btn' type='submit' class='btn btn-dark mt-3' value='Place Order Now'><div><h4 style='color:red;'> Your Total is ₱ <?php echo number_format(($_SESSION["grand_total"]), 2) ?></h4></div>	 -->
			

			</tbody>
			</table>
			<!-- <button type="button" class="btn btn-dark mt-3">Place Order Now</button> -->
			 	
	</div>
</div>
	<div class="container">
		<div class="row">
			<div class="col">
				<div><strong><span>Your total fee is ₱ </span><?php echo number_format(($_SESSION["grand_total"]), 2)?></strong></div>
				<input id='place_order_btn' type='submit' class='btn btn-dark mt-3' value='Place Order Now'><div>
			</div>
		</div>
	</div>
	</form>

   <!-- Footer -->
  
		<?php //include "../partials/footer.php" ;?>




	<!-- jquery first then popper and bootstrap -->
    <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>


    <!--script for register validation  -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>$.validate({lang: 'en'});</script>
    <!--script for register validation  -->

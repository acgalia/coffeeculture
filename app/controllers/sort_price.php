<?php

	require_once 'connect.php';

	$price = $_POST['price'];
	$data = "";
	$sql = "SELECT * FROM items ORDER BY price $price ";
	$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)){
				$data .= "

				<div class='col-md-3 mb-3'>
              				<div class='card h-100 shadow-lg mb-5 bg-white rounded'>
				                <div class='card-header bg-dark text-light'><h6><a href='../views/product.php?name=$row[name]'>$row[name]</a></div> 
				                <div class='card-body p-5'>
                  					<img class='card-img-top' src='$row[img_path]' alt='$row[name]'>           
				                </div>
				                <div class='card-footer'>
				                  <div class='row'>
				                    <h6 class='col-sm-12 text-right'>₱ $row[price]</h6>              
				                    <input class='mb-2 col-sm-12' type='number' min='1' value='1' id='quantity$row[id]'>             
				                    <button class='btn btn-block btn-secondary' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-plus'></i> Add to cart</button>
				                  </div>
				                </div>
				            </div>
				        </div>

				";
			}
		}else{
			$data = "";
		}
	echo $data;
?>


<script type="text/javascript">
	// script for add to cart
  $("button#addToCart").on("click", function(){
  //get the product id
  let productId = $(this).attr("data-id");
  let quantity = $("#quantity" + productId).val();

  // console.log("Product Id:" + productId);
  // console.log("Quantity Id:" + quantity);

  $.ajax({
    url: "../controllers/addToCart.php",
    method: "POST",
    data:
      {
        productId: productId,
        quantity: quantity
      },
    dataType:"text",
      success:function(data){
        $("a[href='cart.php']").html(data);
      }
  })
})
</script>
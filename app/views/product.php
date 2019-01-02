	
<?php
include "../partials/header.php";	
include "../partials/navbar.php";

include '../controllers/connect.php';

	$name = $_GET['name'];

	$sql = " SELECT * FROM items WHERE name = '$name'";

	$result = mysqli_query($conn, $sql);

	$data = "";
	
	if(mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			$data .= "
		<div class='container'>
			<div class='row'>
				<div class='col-lg-2'></div>
				<div class='col-lg-4'>
					<img class='card-img-top' src='$row[img_path]' alt='$row[name]'>   
				</div>
				<div class='col-lg-4'>
					<div class='card-header bg-dark text-light'><h6>$row[name]</div>
					<h6 class='col-sm-9'>$row[description]</h6>
					<h6 class='col-sm-12 text-right'>₱ $row[price]</h6>
					<input class='mb-2 col-sm-12' type='number' min='1' value='1' id='quantity$row[id]'>    
		            <button class='btn btn-block btn-secondary mb-3' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-plus'></i> Add to cart</button>
		            <a class='cont_shop' href='catalog.php'><i class='fas fa-undo-alt'></i> Continue Shopping</a> 
				</div>
				<div class='col-lg-2'></div>

			</div>
		</div>
      				";
		}
	}
	echo $data;



include "../partials/footer.php";
?>

<script type="text/javascript">
	$("button#addToCart").on("click", function(){
  //get the product id
  let productId = $(this).attr("data-id");
  let quantity = $("#quantity" + productId).val();

  console.log("Product Id:" + productId);
  console.log("Quantity Id:" + quantity);
})
</script>


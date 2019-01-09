	
<?php
require_once "../partials/header.php";	
require_once "../partials/navbar.php";

require_once '../controllers/connect.php';

	$name = $_GET['name'];

	$sql = " SELECT * FROM items WHERE name = '$name'";

	$result = mysqli_query($conn, $sql);

	$data = "";
	
	if(mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			$data .= "
		<div class='container-fluid wallpaper8 py-5'>
			<div class='container heightvh'>
				<div class='row'>
					<div class='col-lg-2'></div>
					<div class='col-lg-4'>
						<img class='card-img-top opacity' src='$row[img_path]' alt='$row[name]'>   
					</div>
					<div class='card col-lg-4 opacity3'>
						<div class='card-header bg-dark text-light'><h6>$row[name]</div>
						<h6 class='col-sm-9'>$row[description]</h6>
						<h6 class='col-sm-12 text-right'><strong>₱ $row[price]</strong></h6>
						<input class='mb-2 col-sm-12' type='number' min='1' value='1' id='quantity$row[id]' oninput='this.value = Math.abs(this.value)'>    
			            <button class='btn btn-block btn-secondary mb-3' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-plus'></i> Add to cart</button>
			            <a class='cont_shop' href='catalog.php'><i class='fas fa-undo-alt'></i> <strong>Continue Shopping</strong></a> 
					</div>
					<div class='col-lg-2'></div>

				</div>
			</div>
		</div>
      				";
		}
	}
	echo $data;



require_once "../partials/footer.php";
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


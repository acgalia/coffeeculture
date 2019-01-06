<?php include "../partials/header.php";
	  include "../partials/navbar.php";

	  $grand_total = $_SESSION["grand_total"];

?>
<div class="container-fluid wallpaper pt-5">
	<div class="container opacity">
		<div class="row">
			<div class="col-lg-2"><h4>Transaction History</h4></div>
			<div class="col-lg-10">
				<div class='card text-center mb-5'>
				  	<div class='card-body table-responsive w-auto'>
				    	<table class='table'>
							<thead class='bg-dark text-light'>
								<tr>
									<th><small>Purchase Date</small></th>
									<th><small>Transaction Code</small></th>
									<th><small>Item</small></th>
									<th><small>Price</small></th>
									<th><small>Quantity</small></th>
								</tr>
							</thead>
							<tbody id="transaction">
												
							</tbody>
						</table>
				</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-12 col-sm-12 text-center"><a href="index.php" class="btn btn-dark my-5">Back to Home</a></div>
		</div>
	</div>
</div>

<?php include "../partials/footer.php";?>

<script type="text/javascript">

	function loadCart(){
		$.get("../controllers/con_transaction.php", function(data){
			$("#transaction").html(data);
		});
	}

	$(document).ready(function(){
	loadCart();
	});
</script>
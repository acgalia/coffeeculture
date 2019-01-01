<?php include "../partials/header.php";
	  include "../partials/navbar.php";

	  $grand_total = $_SESSION["grand_total"];

?>

<div class="container">
	<div class="row">
		<div class="col-lg-2"><h4>Transaction History</h4></div>
		<div class="col-lg-10">
			<div id="transaction"></div>
		</div>
		<a href="index.php" class="btn btn-dark">Back to Home</a>
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
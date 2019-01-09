<?php require_once "../partials/header.php";?>
<?php require_once "../partials/navbar.php";?>

	<div class="container-fluid wallpaper7 py-5">
		<div class="container heightvh">
			<div class="row">
				<div class="col-lg-2"><?php echo $_SESSION["datas"]?></div>
				<div class="col-lg-8">
					<div class="card text-center opacity3">
					 	<div class="card-header bg-dark text-light">
					    	Thank you!
					  	</div>
					  	<div class="card-body">
					    	<h5 class="card-title"><?php echo $_SESSION["transaction_code"]?></h5>
					    	<p class="card-text">Your order has been successful.</p>
					    	<p class="card-text"><small>Click on the button to check your transaction history.</small></p>
					    	<a href="transaction.php" class="btn btn-primary bg-dark">Transaction History</a>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php require_once "../partials/footer.php";?>


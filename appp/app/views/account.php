<?php require_once "../partials/header.php";?>
<?php require_once "../partials/navbar.php";?>

<div class="container-fluid wallpaper py-5">
<div class="container opacity">
	<div class="row">
		
			
		<?php
			$user_id = $_SESSION['user_id'];

			require_once "../controllers/connect.php";
			$sql = "SELECT * FROM users WHERE id = $user_id";
			$result = mysqli_query($conn,$sql);
			 if(mysqli_num_rows($result) > 0){ ?>
				<?php while($row = mysqli_fetch_assoc($result)){ ?>
					<div class="col-lg-2 col-md-12 col-sm-12 text-center mb-3">
						<h4>My Account</h4>
						<a href="edit_account.php?id=<?= $row['id'] ?>"><button class='btn btn-success btn-dark'>Edit Info</button></a>
					
		<?php }	?>
		<?php } ?>

		</div>
		<div class="col-lg-10 my-auto">
			<?php
			if (isset($_SESSION['email'])){
				echo "
						
						<div class='card text-center mb-5'>
					 	<div class='card-header bg-dark text-light'>
					    	Account Information
					  	</div>
					  	<div class='card-body'>
					  			<i class='fas fa-user-alt'></i>
						  		<div class='mb-4'>" .$_SESSION['firstname'] . " ". $_SESSION['lastname'] ."<br></div>
						  		<div class='row'>
									<div class='col-lg-6 mb-4'>
										<i class='fas fa-envelope'></i>
										<div>" .$_SESSION['email'] ."</div>
									</div>

									<div class='col-lg-6'>
										<i class='fas fa-map-marker-alt'></i>
										<div>" .$_SESSION['address'] ."</div>
									</div>
								</div>
											    	
					  	</div>					  	
					</div>
						
					";
			}else{
				echo "
					<div class='col-lg-12'>Hey mate, we don't know you yet. Please Register/Login.</div>
				";
			}
			?>

		</div>
	</div>
</div>
</div>

<?php require_once "../partials/footer.php";?>

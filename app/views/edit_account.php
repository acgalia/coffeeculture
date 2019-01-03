<?php include "../partials/header.php";?>
<?php include "../partials/navbar.php";?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<!-- <h3>Edit Account Info</h3> -->
			<div class="card">
				<div class="card-header bg-dark text-light text-center"><h3>Edit Account Info</h3></div>
				<div class="card-body">
					<form action="../controllers/con_edit_account.php" method="POST">
						<?php 
							require_once "../controllers/connect.php";
							$id = $_GET['id'];
							$sql = "SELECT * FROM users WHERE id = $id";
							$result = mysqli_query($conn,$sql);

								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_assoc($result)){
										echo "
											<input type='hidden' name='id' value='$row[id]'>

											<div class='form-group'>
												<label>First Name</label>
												<input type='text' value='$row[firstname]' class='form-control' name='firstname'>
												</div>

												<div class='form-group'>
												<label>Last Name</label>
												<input type='text' value='$row[lastname]' class='form-control' name='lastname'>
												</div>

												<div class='form-group'>
												<label>Email</label>
												<input type='text' value='$row[email]' class='form-control' name='email'>
												</div>

												<div class='form-group'>
												<label>Address</label>
												<input type='text' value='$row[address]' class='form-control' name='address'>
												</div>

												</div>

												<span class='mx-auto'><input class='btn btn-dark' type='submit' value='Submit'>
												<a href='account.php' class='mx-auto'><input class='btn btn-dark' value='Cancel'></a></span>
										";
									}
								}
						?>
					</form>
				</div>
				<div class="card-footer"></div>
			</div>
		</div>
	</div>
</div>


<?php include "../partials/footer.php";?>
<?php include "../partials/header.php";?>
<?php include "../partials/navbar.php";?>

<div class="container">
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-10">
			<div class="card">
     		<div class="card-header bg-danger">Admin Login</div>
     		<div class="card-body">   			
       			<form action="../controllers/admin_con.php" method="POST">
       				<div class="form-group">
       					<label>Username</label>
       					<input type="text" class="form-control" name="admin_un">
       				</div>     				
       				<div class="form-group">
       					<label>Password</label>
       					<input type="password" class="form-control" name="admin_pw">
       				</div>
       				<input type="submit" class="btn btn-outline-dark" value="LOG-IN">
       			</form>       			
     		</div>   		
     	</div>
		</div>
	</div>
</div>


<?php include "../partials/footer.php";?>
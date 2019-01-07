<?php include "../partials/header.php";?>
<?php include "../partials/adminNavbar.php";?>

<?php if(isset($_SESSION['admin'])){ ?>
<div class="container-fluid wallpaper3">
	<div class="container py-5 heightvh">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">			
				<div class="card opacity3">
					<div class="card-header">
						<h3>Edit Status</h3>
					</div>
						<div class="card-body">
							<form action="../controllers/con_edit_status.php" method="POST">
								<?php 
									require "../controllers/connect.php";
									$id = $_GET['id'];
									$sql = "SELECT orders.id, orders.transaction_code, status.name FROM orders JOIN status ON orders.status_id = status.id WHERE orders.id = $id";
									$result = mysqli_query($conn,$sql);

										if(mysqli_num_rows($result) > 0){
											while($row = mysqli_fetch_assoc($result)){
												echo "
													<strong> Transaction Number  : $row[transaction_code]</strong>
													<input type='hidden' name='id' value='$row[id]'>";

													if ($row[name] == 'Pending'){
														echo "
															<div>
															<select class='custom-select' name='status_id'>
														        <option selected value='1'>Pending</option>
														        <option value='2'>Delivered</option>
														        <option value='3'>Cancelled</option>
														     </select>
														     </div>

														    <div class='mt-3'>
	   														<input class='btn btn-dark' type='submit' value='Save'>
	   														<a href='orders.php'><input class='btn btn-dark' type='button' value='Cancel'></a>
	   														</div>
														";
													}else if($row[name] == 'Delivered'){
														echo "
															<div>
															<select class='custom-select' name='status_id'>
														    	<option value='1'>Pending</option>
														        <option selected value='2'>Delivered</option>
														        <option value='3'>Cancelled</option>
														    </select>
														    </div>

														    <div class='mt-3'>
	   														<input class='btn btn-dark' type='submit' value='Save'>
	   														<a href='orders.php'><input class='btn btn-dark' type='button' value='Cancel'></a>
	   														</div>
														";
													}else{
														echo "
															<div>
															<select class='custom-select' name='status_id'>
														        <option value='1'>Pending</option>
														        <option value='2'>Delivered</option>
														        <option selected value='3'>Cancelled</option>
														    </select>
														    </div>

														    <div class='mt-3'>
	   														<input class='btn btn-dark' type='submit' value='Save'>
	   														<a href='orders.php'><input class='btn btn-dark' type='button' value='Cancel'></a>
	   														</div>
														";
													}
											}
										}
								?>
							</form>
						</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include "../partials/footer.php";?>

        <?php }else{
               header("Location: admin_login.php");
 } ?>

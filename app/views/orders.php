<?php include "../partials/header.php";?>
<?php include "../partials/adminNavbar.php";?>
<?php include "../controllers/authenticate.php";?>
<!-- session_start(); -->
<?php if(isset($_SESSION['admin'])){ ?>
        <div class="container">
			<div class="row">
				<div class="col">
					<h3 class="text-center">Customers' Order List</h3>
					  
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Customer ID</th>
								<th>Purchase Date</th>
								<th>Transaction Number</th>
								<th>Status</th>
							</tr>
						<tbody>
							<?php
								require "../controllers/connect.php";
								$sql = "SELECT * FROM orders ORDER BY status_id";
								$result = mysqli_query($conn,$sql);
							
									if (mysqli_num_rows($result) > 0){ ?>
										<?php while ($row = mysqli_fetch_assoc($result)){ ?>
										
												<tr>
													<td><?= $row['id']?></td>
													<td><?= $row['user_id']?></td>
													<td><?= $row['purchase_date']?></td>
													<td><?= $row['transaction_code']?></td>
													<td><?= $row['status_id']?></td>
												</tr>
								<?php		} ?>
								<?php	} ?>
							
						</tbody>
						</thead>
					</table>
				</div>
			</div>
			
		</div>
        <?php }else{
               header("Location: admin_login.php");
 } ?>

<?php include "../partials/footer.php";?>

<script type="text/javascript">

</script>
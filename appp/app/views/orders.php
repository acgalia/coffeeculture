<?php require_once "../partials/header.php";?>
<?php require_once "../partials/adminNavbar.php";?>
<?php require_once "../controllers/authenticate.php";?>
<!-- session_start(); -->
<?php if(isset($_SESSION['admin'])){ ?>
	<div class="container-fluid wallpaper3 py-5">
        <div class="container">
			<div class="row">
				<div class="card opacity3">
					<div class="col-lg-12 col-md-12 table-responsive w-auto">
						<!-- breadcrumb -->
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb bg-dark mt-3">
						    <li class="breadcrumb-item"><a style='text-decoration: none' href="items.php">Items</a></li>
						    <li class="breadcrumb-item active" aria-current="page"><a style='text-decoration: none' href="orders.php">Orders</a></li>
						  </ol>
						</nav>

						<h3 class="text-center">Customers' Order List</h3>
						  
						<table class="table table-striped text-center">
							<thead>
								<tr>
									<th>Customer</th>
									<th>Purchase Date</th>
									<th>Transaction Number</th>
									<th>Status</th>
									<th>Change Status</th>
								</tr>
							<tbody>
								<?php
									require_once "../controllers/connect.php";
									$sql = "SELECT orders.id, orders.transaction_code, orders.purchase_date, users.lastname, users.firstname, status.name FROM ((orders INNER JOIN users ON orders.user_id = users.id) INNER JOIN status ON orders.status_id = status.id) ORDER BY orders.purchase_date DESC";
									$result = mysqli_query($conn,$sql);
									
										if (mysqli_num_rows($result) > 0){ ?>
											<?php while ($row = mysqli_fetch_assoc($result)){ ?>
											
													<tr>
														<td><?= $row['lastname']?>, <?= $row['firstname']?></td>
														<td><?= $row['purchase_date']?></td>
														<td><?= $row['transaction_code']?></td>
														<td><?= $row['name']?></td>
														<td><a style='text-decoration: none' href="edit_status.php?id=<?= $row['id'] ?>">Edit</a></td>
													</tr>
									<?php		} ?>
									<?php	} ?>
								
							</tbody>
							</thead>
						</table>
					</div>
				</div>
			</div>
			
		</div>
	</div>
        <?php }else{
               header("Location: admin_login.php");
 } ?>

<?php require_once "../partials/footer.php";?>

<script type="text/javascript">

</script>
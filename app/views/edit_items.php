<?php include "../partials/header.php";?>
<?php include "../partials/adminNavbar.php";?>

<?php if(isset($_SESSION['admin'])){ ?>
<div class="container">
	<div class="row">
		<div class="col">
			<h3>Edit Item</h3>
			<div class="card">
				<div class="card-header">
					<div class="card-body">
						<form action="../controllers/con_item_update.php" method="POST">
							<?php 
								require "../controllers/connect.php";
								$id = $_GET['id'];
								$sql = "SELECT * FROM items WHERE id = $id";
								$result = mysqli_query($conn,$sql);

									if(mysqli_num_rows($result) > 0){
										while($row = mysqli_fetch_assoc($result)){
											echo "
												<input type='hidden' name='id' value='$row[id]'>

												<div class='form-group'>
 												<label>Name</label>
   												<input type='text' value='$row[name]' class='form-control' name='name'>
   												</div>

   												<div class='form-group'>
 												<label>Price</label>
   												<input type='text' value='$row[price]' class='form-control' name='price'>
   												</div>

   												<div class='form-group'>
 												<label>Description</label>
   												<input type='text' value='$row[description]' class='form-control' name='description'>
   												</div>

   												<div class='form-group'>
 												<label>Image Path</label>
   												<input type='text' value='$row[img_path]' class='form-control' name='img_path'>
   												</div>

   												<div class='form-group'>
 												<label>Category Id</label>
 												<select class='custom-select' name='category_id'>
											        <option value='1'>Mill Grinder (1)</option>
											        <option value='2'>Pot (2)</option>
											        <option value='3'>Dripper (3)</option>
											        <option value='4'>Filter (4)</option>
											        <option value='5'>Coffee Beans (5)</option>
											     </select>
   												
   												</div>

   												<input class='btn btn-dark' type='submit' value='Save'>
   												<input class='btn btn-dark' type='reset' value='Clear'>
   												<a href='items.php'><input class='btn btn-dark' type='button' value='Cancel'></a>
											";
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

        <?php }else{
               header("Location: admin_login.php");
 } ?>
<?php include "../partials/header.php";?>
<?php include "../partials/adminNavbar.php";?>

<?php if(isset($_SESSION['admin'])){ ?>
<div class="container-fluid wallpaper3 py-5">
<div class="container">
	<div class="row">
		<div class="col">
			<h3>Edit Item</h3>
			<div class="card opacity3">
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
   												</div>";

   												if ($row[category_id] == 1){
   													echo "

   														<div class='form-group'>
			 												<label>Category Id</label>
			 												<select class='custom-select' name='category_id'>
														        <option selected value='1'>Mill Grinder</option>
														        <option value='2'>Pot</option>
														        <option value='3'>Dripper</option>
														        <option value='4'>Filter</option>
														        <option value='5'>Coffee Beans</option>
														     </select>
			   												
			   												</div>

			   												<input class='btn btn-dark' type='submit' value='Save'>
			   												<input class='btn btn-dark' type='reset' value='Clear'>
			   												<a href='items.php'><input class='btn btn-dark' type='button' value='Cancel'></a>
													";
   												}else if($row[category_id] == 2){
   													echo "

   														<div class='form-group'>
			 												<label>Category Id</label>
			 												<select class='custom-select' name='category_id'>
														        <option value='1'>Mill Grinder</option>
														        <option selected value='2'>Pot</option>
														        <option value='3'>Dripper</option>
														        <option value='4'>Filter</option>
														        <option value='5'>Coffee Beans</option>
														     </select>
			   												
			   												</div>

			   												<input class='btn btn-dark' type='submit' value='Save'>
			   												<input class='btn btn-dark' type='reset' value='Clear'>
			   												<a href='items.php'><input class='btn btn-dark' type='button' value='Cancel'></a>
													";
   												}else if($row[category_id] == 3){
   													echo "

   														<div class='form-group'>
			 												<label>Category Id</label>
			 												<select class='custom-select' name='category_id'>
														        <option value='1'>Mill Grinder</option>
														        <option value='2'>Pot</option>
														        <option selected value='3'>Dripper</option>
														        <option value='4'>Filter</option>
														        <option value='5'>Coffee Beans</option>
														     </select>
			   												
			   												</div>

			   												<input class='btn btn-dark' type='submit' value='Save'>
			   												<input class='btn btn-dark' type='reset' value='Clear'>
			   												<a href='items.php'><input class='btn btn-dark' type='button' value='Cancel'></a>
													";
   												}else if($row[category_id] == 4){
   													echo "

   														<div class='form-group'>
			 												<label>Category Id</label>
			 												<select class='custom-select' name='category_id'>
														        <option value='1'>Mill Grinder</option>
														        <option value='2'>Pot</option>
														        <option value='3'>Dripper</option>
														        <option selected value='4'>Filter</option>
														        <option value='5'>Coffee Beans</option>
														     </select>
			   												
			   												</div>

			   												<input class='btn btn-dark' type='submit' value='Save'>
			   												<input class='btn btn-dark' type='reset' value='Clear'>
			   												<a href='items.php'><input class='btn btn-dark' type='button' value='Cancel'></a>
													";
   												}else{
   													echo "

   														<div class='form-group'>
			 												<label>Category Id</label>
			 												<select class='custom-select' name='category_id'>
														        <option value='1'>Mill Grinder</option>
														        <option value='2'>Pot</option>
														        <option value='3'>Dripper</option>
														        <option value='4'>Filter</option>
														        <option selected value='5'>Coffee Beans</option>
														     </select>
			   												
			   												</div>

			   												<input class='btn btn-dark' type='submit' value='Save'>
			   												<input class='btn btn-dark' type='reset' value='Clear'>
			   												<a href='items.php'><input class='btn btn-dark' type='button' value='Cancel'></a>
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
</div>

        <?php }else{
               header("Location: admin_login.php");
 } ?>
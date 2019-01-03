<?php include "../partials/header.php";?>
<?php include "../partials/adminNavbar.php";?>
<?php include "../controllers/authenticate.php";?>
<!-- session_start(); -->
<?php if(isset($_SESSION['admin'])){ ?>
        <div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- breadcrumb -->
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page"><a href="items.php">Items</a></li>
					    <li class="breadcrumb-item"><a href="orders.php">Orders</a></li>
					  </ol>
					</nav>
					<h3 class="text-center">Item List</h3>
					  
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Item ID</th>
								<th>Name</th>
								<th>Price</th>
								<th>Description</th>
								<th>Image Path</th>
								<th>Category</th>
								<th colspan="2">Actions</th>
							</tr>
						<tbody>
							<?php
								require_once "../controllers/connect.php";
								$sql = "SELECT items.id, items.name, items.price, items.description, items.img_path, categories.c_name FROM items JOIN categories ON items.category_id = categories.id ORDER BY items.category_id";
								$result = mysqli_query($conn,$sql);
							
									if (mysqli_num_rows($result) > 0){ ?>
										<?php while ($row = mysqli_fetch_assoc($result)){ ?>
										
												<tr>
													<td><?= $row['id']?></td>
													<td><?= $row['name']?></td>
													<td><?= $row['price']?></td>
													<td><?= $row['description']?></td>
													<td><?= $row['img_path']?></td>
													<td><?= $row['c_name']?></td>
													<td><a href="edit_items.php?id=<?= $row['id'] ?>">Edit</a></td>
													<td><a onclick="return confirm('Delete?')" href="../controllers/delete_item.php?id=<?= $row['id'] ?>">Delete</a></td>
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

<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <!-- form for add_item -->
        <form class="p-2" method="post" action="">
      		<label>Name</label>
			<input type="text" class="form-control mb-3" id="item_name">
			<p class="validation"></p>					

			<label>Price</label>
			<input type="number" class="form-control mb-3" id="item_price">
			<p class="validation"></p>
					
			<label>Description</label>
			<input type="email" class="form-control mb-3" id="item_description">
			<p class="validation"></p>

			<label>Image Path</label>
			<input type="text" class="form-control mb-3" id="img_path">
			<p class="validation"></p>

			<label>Category ID</label>
			<select class="custom-select" id="category_id">
		        <option value="1">Mill Grinder (1)</option>
		        <option value="2">Pot (2)</option>
		        <option value="3">Dripper (3)</option>
		        <option value="4">Filter (4)</option>
		        <option value="5">Coffee Beans (5)</option>
		     </select>
			<!-- <input type="number" class="form-control mb-3" id="category_id"> -->
			<p class="validation"></p>
			
			<p id="item_add_msg"></p>
			<input id="btn_item_add" class='btn btn-dark form-control mb-2' type='button' value='Add Item' >
			<input class='btn btn-warning' type='reset' value='Clear'>
        </form>      
    </div>
  </div>
</div>

<?php include "../partials/footer.php";?>

<script type="text/javascript">


$(document).ready(()=>{

$("#btn_item_add").click(()=>{

	let item_name = $("#item_name").val();
	let item_price = $("#item_price").val();
	let item_description = $("#item_description").val();
	let img_path = $("#img_path").val();
	let category_id = $("#category_id").val();

	//let error_flag = 0; //means no error

	if(item_name == "" || item_price == "" || item_description == "" || img_path == "" || category_id == ""){
		$("#item_add_msg").css("color", "red");
		$("#item_add_msg").html("You know the drill cu! Fill in the blanks!");
		//error_flag = 1;
	}else{
		$.post("../controllers/con_add_item.php", {
		item_name:item_name, item_price:item_price,
		item_description:item_description, img_path:img_path, category_id:category_id},
		function(data){
		$("#item_add_msg").css("color", "green");
		$("#item_add_msg").html(data);
		})
	}


	
})

});
</script>
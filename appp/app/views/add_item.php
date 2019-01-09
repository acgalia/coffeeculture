<?php
require_once "../partials/header.php";	
require_once "../partials/navbar.php";

require_once '../controllers/connect.php';
?>
<div class="container">
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-10">
			<form action="" class="mb-3" id="add_item" method="post">
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

				<label>Address</label>
				<textarea type="text" class="form-control mb-3" id="address"></textarea>
				<p class="validation"></p>
				
				<p id="item_add"></p>
				<input id="btn_item_add" class='btn btn-dark form-control mb-2' type='button' value='SUBMIT' >
				<input class='btn btn-warning' type='reset' value='clear'>
					
			</form>
		</div>
	</div>
</div>
	
<?php require_once "../partials/footer.php";?>

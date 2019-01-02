<?php

	require_once 'connect.php';

	$word = $_POST['word'];
	$data = "";
	$sql = "SELECT * FROM items WHERE name LIKE '%".$word."%' ";
	$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)){
				$data .= "

							<div class='col-md-3 mb-3'>
	              				<div class='card h-100 shadow-lg mb-5 bg-white rounded'>
					                <div class='card-header bg-dark text-light'><h6><a href='../views/product.php?name=$row[name]'>$row[name]</a></div> 
					                <div class='card-body p-5'>
	                  					<img class='card-img-top' src='$row[img_path]' alt='$row[name]'>           
					                </div>
					                <div class='card-footer'>
					                  <div class='row'>
					                    <h6 class='col-sm-12 text-right'>₱ $row[price]</h6>              
					                    <input class='mb-2 col-sm-12' type='number' min='1' value='1' id='quantity$row[id]'>             
					                    <button class='btn btn-block btn-secondary' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-plus'></i> Add to cart</button>
					                  </div>
					                </div>
					            </div>
					        </div>

						";
			}
		}else{
			$data = "
						<div class='col-lg-12 text-center text-light'>
						No Records Found!
						</div>

					";
		}
	echo $data;
?>
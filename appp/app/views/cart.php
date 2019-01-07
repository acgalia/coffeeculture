<?php include "../partials/header.php";?>
<?php include "../partials/navbar.php";?>

<!-- cart.php -->
<!-- <pre>
	<h1>
	<?php
		// print_r($_SESSION["cart"]);
	?>
	</h1>
</pre> -->


<?php if($_SESSION['cart'] == ""){
	echo "
			<div class='container-fluid wallpaper6 py-3'>
				<div class='container heightvh'>
					<div class='row'>
						<div class='col-lg-1'></div>
						<div class='col-lg-10 text-center'>
							<p class='mb-3'>Your cup is empty. There, there.</p>
							<div><a href='catalog.php'><input type='button' value='Shop Now' class='btn btn-dark'></a></div>
						</div>					
					</div>
				</div>
			</div>
		";
}else{
	echo "
			<div class='container-fluid wallpaper2 py-3'>
				<div class='container'>
					<div class='row'>
						<div class='col-lg-1'></div>
						<div class='col-lg-10 table-responsive w-auto' id='loadCart'>
						</div>
					</div>
				</div>
			</div>
		";
}

?>

	
	


<?php include "../partials/footer.php";?>

<script type="text/javascript">
	function loadCart(){
	$.get("../controllers/loadCart.php", function(data){
		$("#loadCart").html(data);
	});
}

$(document).ready(function(){
	loadCart();
});

//grandTotal
function changeNoItems(id){
	let quantity = $("#quantity" + id).val();
	let price = $("#price" + id).text();
	let newPrice = quantity * price;
	
	$("#subTotal" + id).html(newPrice);
	// console.log("Sub total is: " + newPrice);

	let a = 0;
	$(".sub-total").each(function(id) {
		a = a + parseInt($(this).text());
		grandtotal = a.toFixed(2);
		//console.log(a);
		$("#grandTotal").html(grandtotal);
	});

	$.post("../controllers/change_quantity.php", 
				{quantity:quantity, id:id,
					price:price},function(data){	
				//$("#register_msg").html(data);				
		});

}

//removeButton
function removeFromCart(id){
	let ans = confirm("Are you sure?");
	if(ans){
		// alert("You answered yes");
		$.ajax({
			url:"../controllers/removeFromCart.php",
			method: "POST",
			data:{product:id},
			dataType:"text",
			success:function(data){
				$('a[href="cart.php"]').html(data);
				loadCart();
			}
		});
	}
}



</script>
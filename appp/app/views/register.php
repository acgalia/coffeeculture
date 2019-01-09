<?php require_once "../partials/header.php";?>
<?php require_once "../partials/navbar.php";?>

<div class="container-fluid wallpaper5 py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
			
				<?php if(isset($_SESSION['email'])){ ?>
					<div class="col-lg-8">
						<div class="card opacity4">
							<h2>Unable to Find This Page</h2> 
							<p>It may be unavailable or the address may be incorrect. Select the Logo to continue browsing Coffee Culture.</p>	
						</div>
					</div>
							</div>
						</div>
					</div>
				<?php } else { ?>					
					<div class="col-lg-8">
					<div class="card">
						<div class="card-header bg-dark text-light">Register</div>
						<div class="card-body">
							<!-- <form action="../controllers/con_register.php" class="mb-3" method="POST" > -->
							<form action="" class="mb-3" id="form_register" method="post">
								<strong><label>Last Name</label></strong>
								<input type="text" class="form-control mb-3" id="last_name">
								<p class="validation"></p>					
							
								<strong><label>First Name</label></strong>
								<input type="text" class="form-control mb-3" id="first_name">
								<p class="validation"></p>
										
								<strong><label>Email</label></strong>
								<!-- <input type="email" class="form-control mb-3" id="email" placeholder="We'll never share your email with anyone else" data-validation="email"> -->
								<input type="email" class="form-control mb-3" id="email" placeholder="We'll never share your email with anyone else">
								<p class="validation"></p>

								<strong><label>Password</label></strong>
								<input type="password" class="form-control mb-3" id="password">
								<p class="validation"></p>

								<strong><label>Confirm Password</label></strong>
								<input type="password" class="form-control mb-3" id="c_password">
								<p class="validation"></p>

								<strong><label>Address</label></strong>
								<textarea type="text" class="form-control mb-3" id="address"></textarea>
								<p class="validation"></p>
								
								<strong><p id="register_msg"></p></strong>
								<div class="text-center">
								<input id="register_btn" class='btn btn-dark w-25' type='button' value='Submit' >
			   					<input class='btn btn-dark w-25' type='reset' value='Clear'>
			   					</div>
			   					
		   					</form>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>

<?php } ?> 
<?php require_once "../partials/footer.php";?>



<script type="text/javascript">
		

$(document).ready(()=>{

	// $("#email").blur(checkEmail{
	// 	let email = $(this).val();		
	// 	$.post("../controllers/con_register.php", {email:email}, function(data){
	// 		$("#register_msg").html(data);
	// 	})
		
	// });


	$("#register_btn").click(()=>{
		let last_name = $("#last_name").val();
		let first_name = $("#first_name").val();
		let email = $("#email").val();
		let password = $("#password").val();
		let c_password = $("#c_password").val();
		let address = $("#address").val();

		let error_flag = 0; //means no error
			if(email == "" || last_name == "" || first_name == "" || password == "" || address == ""){
				$("#register_msg").css("color", "red");
				$("#register_msg").html("All fields are required!");
				error_flag = 1;
			}else if(password != c_password){
				$("#register_msg").css("color", "red");
				$("#register_msg").html("Your password does not match!");
				error_flag = 1;
			}else{
				$("#register_msg").html("");//echo from con.register.php
			}

			// $.ajax({
			// "url": "../controllers/con_register.php",
			// "data": {"last_name": last_name,
			// 		 "first_name": first_name,
			// 		 "email": email,
			// 		 "password": password,
			// 		 "address": address},
			// "type": "POST",
			// "success": function(data){
			// 	$("#register_msg").html(data)
			// }
			
			// }) /*ajax1 end*/
		//if no error,now we submit
		if (error_flag == 0) {
			$.post("../controllers/con_register.php", 
				{last_name:last_name, first_name:first_name,
					email:email, password:password, address:address},function(data){	
				$("#register_msg").html(data);				
			})
		}
			
	}) /*function end*/
}); //on ready end

		// $("#email").blur(function(){
		// 	// let email = $("#email").val();
		// 	// console.log(email); //to check if working - f12 on browser
		// 	$.post("../controllers/con_register.php", {email:email}, function(data){
		// 		$("#register_msg").html(data);
		// 	})		
		// });	
</script>
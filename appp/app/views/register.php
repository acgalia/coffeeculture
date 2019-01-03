<?php include "../partials/header.php";?>
<?php include "../partials/navbar.php";?>

<div class="container">
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header bg-dark text-light">Register</div>
				<div class="card-body">
					<!-- <form action="../controllers/con_register.php" class="mb-3" method="POST" > -->
					<form action="" class="mb-3" id="form_register" method="post">
						<label>Last Name</label>
						<input type="text" class="form-control mb-3" id="last_name">
						<p class="validation"></p>					
					
						<label>First Name</label>
						<input type="text" class="form-control mb-3" id="first_name">
						<p class="validation"></p>
								
						<label>Email</label>
						<!-- <input type="email" class="form-control mb-3" id="email" placeholder="We'll never share your email with anyone else" data-validation="email"> -->
						<input type="email" class="form-control mb-3" id="email" placeholder="We'll never share your email with anyone else">
						<p class="validation"></p>

						<label>Password</label>
						<input type="password" class="form-control mb-3" id="password">
						<p class="validation"></p>

						<label>Confirm Password</label>
						<input type="password" class="form-control mb-3" id="c_password">
						<p class="validation"></p>

						<label>Address</label>
						<textarea type="text" class="form-control mb-3" id="address"></textarea>
						<p class="validation"></p>
						
						<p id="register_msg"></p>
						<input id="register_btn" class='btn btn-dark form-control mb-2' type='button' value='SUBMIT' >
	   					<input class='btn btn-warning' type='reset' value='clear'>
	   					
   					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include "../partials/footer.php";?>



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
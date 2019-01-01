<?php 
	require_once 'connect.php';

	//fetch data
	$lastname = $_POST['last_name'];
	$firstname = $_POST['first_name'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$address = $_POST['address'];

	$data = "";

	

	//sql for duplicate email
	$sql2 = "SELECT * FROM users WHERE email='$email'";
	$duplicate = mysqli_query($conn, $sql2);


	// 	//sql for registration successful
	$sql = "INSERT INTO users (lastname, firstname, email, password, address)
			VALUES ('$lastname', '$firstname', '$email', '$password', '$address')";

	if (mysqli_num_rows($duplicate) > 0) {
		while ($row = mysqli_fetch_assoc($duplicate)) {
			$data = "<p style='color:red'>Email already exists!</p>";
			}
		}else{
			$result = mysqli_query($conn, $sql);
			$data = "<p style='color:green'>Successfully Registered!</p>";
		}

	echo $data;

?>
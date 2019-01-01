<?php

	require_once 'connect.php';

	//get values
	$email = $_POST['email_login'];
	$password = sha1($_POST['password_login']);

	//check the values
	// echo $email. " - ". $password;

	$data = "";
	$sql = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			// echo $row["lastname"];
			// echo "<br>";
			// echo $row["firstname"];
			session_start();
			$_SESSION['email'] = $row["email"];
			$_SESSION['lastname'] = $row["lastname"];
			$_SESSION['firstname'] = $row["firstname"];
			$_SESSION['user_id'] = $row["id"];
			$_SESSION['address'] = $row["address"];
			
			echo "Success!";
			
		}		
	}else{
		echo "Wrong Credentials!";

	}

	echo $data;
?>
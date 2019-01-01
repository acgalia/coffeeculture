<?php
    include "authenticate.php";

	$admin_un = $_POST['admin_un'];
	$admin_pw = $_POST['admin_pw'];

	//authenticate is taken from authenticate.php
	if(authenticate($admin_un,$admin_pw)){
		// echo "Welcome Admin!";
		session_start();
    	$_SESSION['admin'] = "Admin";
		header("Location: ../views/items.php");
	}
	else{
		header("Location: ../views/items.php");
	}
?>

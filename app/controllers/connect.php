<?php
	// local host php connection
	$host = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_name = 'coffeeculture';

	//db4free.net connection
	// $host = "db4free.net";
	// $db_username = "aarongalia";
	// $db_password = "coffeevulture";
	// $db_name = 'coffeeculture';

	//create connection
	$conn = mysqli_connect($host, $db_username, $db_password, $db_name);

	//check connection
	if(!$conn){
		die("connection failed: ". mysqli_error($conn));
	}

?>
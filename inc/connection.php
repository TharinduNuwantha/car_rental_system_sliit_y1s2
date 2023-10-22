<?php 

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'car_haire_hub'; 

	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	// Checking the connection
	if (mysqli_connect_errno()) {
		die('Database connection failed ' . mysqli_connect_error());
	} else {
		// echo "success";
	}

?>
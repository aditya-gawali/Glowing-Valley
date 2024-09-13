<?php

try {
	// $host = "localhost";
	// $dbname = "glow_valley";
	// $user = "root";
	// $password = "";

	$host = "localhost";
	$dbname = "u264552578_glow_valley";
	$user = "u264552578_root1";
	$password = "Glow_valley@123";


	$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	// $conn = mysqli_connect($host,$user,$password,$dbname);

	// $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
	echo "error is: " . $e->getMessage();
}

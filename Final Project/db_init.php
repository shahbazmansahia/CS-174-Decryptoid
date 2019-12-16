<?php
	require_once 'login.php';
	$conn = new mysqli($hn,$un,$pw,$db);
	if($conn->connect_error) die(print("Database error. Please try later!"));

	$query1 = "CREATE TABLE users( uname VARCHAR(32) NOT NULL, email VARCHAR(128) NOT NULL, pass_hash VARCHAR(32) NOT NULL, salt VARCHAR(32) NOT NULL)";
	$result1 = $conn->query($query1);
	if (!$result1) die(print("Could not create users table"));
	echo("Users table created!\n");
	

	$query2 = "CREATE TABLE records( uname VARCHAR(32) NOT NULL, input VARCHAR(512), cipher VARCHAR(32), ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
	$result2 = $conn->query($query2);
	if (!$result2) die(print("Could not create records table"));
	echo("Records table created!");

	$result1->close();	
	$result2->close();
	
	$conn->close();

	function manual_user_entry($uname, $email, $pwd) {
		$salt =  bin2hex(random_bytes(10));
		$secure_password = $token = hash('ripemd128', $salt.$pwd.$salt);
		$query = "INSERT INTO users (uname, email, pass_hash, salt)
		VALUES('".$uname."', '".$email."', '".$secure_password."', '".$salt."');";
		echo $query;
	}
	echo("Manual Entry Example:");
	manual_user_entry("karthik", "karthik@gmail.com", "chicken wings");
?>
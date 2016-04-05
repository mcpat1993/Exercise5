<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "exercise5";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	// sql to create table
	$sql = "CREATE TABLE People (
	FName VARCHAR(30) NOT NULL,
	LName VARCHAR(30) NOT NULL
	)";

	if ($conn->query($sql) === TRUE) {
		echo "Table MyGuests created successfully";
	} else {
		echo "Error creating table: " . $conn->error;
	}

	$conn->close();
	header("Location: /Exercise5/exercise5.php")
?>
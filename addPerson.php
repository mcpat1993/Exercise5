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

	echo $_GET["FName"] . "<br>";
	echo $_GET["LName"] . "<br>";
	$sql = "SELECT * FROM `people` WHERE `FName` = '" . $_GET["FName"] . "' AND 
	`LName` = '" . $_GET["LName"] . "'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		$_SESSION["addError"] = "I'm sorry, " . $_GET["FName"] . " " . $_GET["LName"] . " is already in the DB";
	}else
	{
		// sql to insert
		$sql = "INSERT INTO `people`(`FName`, `LName`) 
		VALUES ('" . $_GET['FName'] . "','" . $_GET['LName'] . "')";
		echo $sql . "<br>";

		if ($conn->query($sql) === TRUE) {
			echo $_GET["FName"] . " " . $_GET["LName"] . " added successfully";
			$_SESSION["addSuccess"] = "Congratulations, " . $_GET["FName"] . " " . $_GET["LName"] . " has been sucessfully added!";
		} else {
			echo "Error adding " . $_GET["FName"] . " " . $_GET["LName"] . " to table: " . $conn->error;
		}
	}
	$conn->close();
	header("Location: /Exercise5/exercise5.php")
?>
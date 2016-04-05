<?php session_start();?>
</script>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="exercise5.css">
</head>
<body>
	<fieldset>
		<h1>Something</h1>
		<form action="createPeople.php">
			<input class="button" type="submit" value="Create People Table in DB">
		</form>
		<form action="addPerson.php" method="get">
			<input type="text" placeholder="First Name" name="FName"><br>
			<input type="text" placeholder="Last Name" name="LName"><br>
			<input class="button" type="submit" value="Add Person"><br>
			
		</form>
		<?php
			if(isset($_SESSION["addError"]))
			{
				echo "<div id=addError>" . $_SESSION["addError"] . "</div><br>";
			}else
			{
				if(isset($_SESSION["addSuccess"]))
				{
					echo "<div id=addSuccess>" . $_SESSION["addSuccess"] . "</div><br>";
				}
			}
			unset($_SESSION["addError"]);
			unset($_SESSION["addSuccess"]);
		?>
		
		<table style="width:100%">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
		</tr>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "exercise5";
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			$sql = "SELECT * FROM `people`";
			$result = $conn->query($sql);
			foreach($result as $entry)
			{
				echo "<tr><td>" . $entry["FName"] . "</td><td>" . $entry["LName"] . "</td></tr>";
			}
			
			$conn->close();
		?>
		<tr>
			<td>Jill</td>
			<td>Smith</td> 
		</tr>
		<tr>
			<td>Eve</td>
			<td>Jackson</td> 
		  </tr>
		</table>
	</fieldset>
</body>
</html>
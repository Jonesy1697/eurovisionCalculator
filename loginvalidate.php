<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "eurovisioncalc";
	$scoring = array("12", "10", "8", "7", "6", "5", "4", "3", "2", "1");

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);

	
	$user = $_GET['username'];
	$pass = $_GET['password'];

	echo "<br>";

	$count = 0;
	
	$sql = "SELECT password FROM people WHERE name = '$user'";
	$password = mysqli_query($conn, $sql) or die("Connection failed" . $conn->connect_error);
	$password = mysqli_fetch_row($password);
	$password = $password[0]; 
	
	if ($password === $pass){
		header("Location: http://localhost/eurovisionCalc/index.php");	
	}
	else{
		echo "Incorrect login";
	}
	
	$conn->close();
	
?>
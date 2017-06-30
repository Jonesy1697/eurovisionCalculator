<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "eurovisioncalc";
	$scoring = array("12", "10", "8", "7", "6", "5", "4", "3", "2", "1");

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);

	$values = $_GET['select'];

	echo "<br>";

	$count = 0;

	foreach ($values as $a){
				
		$sql = "SELECT points FROM country WHERE country = '$a'";
		$points = mysqli_query($conn, $sql) or die("Connection failed" . $conn->connect_error);
		$points = mysqli_fetch_row($points);
		$points = $points[0]; 

		$sql = "UPDATE country
		SET points = ($points + $scoring[$count])
		WHERE country = '$a';";
	
		$conn->query($sql);
		$count = $count + 1;
	}
	
	$conn->close();

	header("Location: http://localhost/eurovisionCalc/submitted.html");
?>
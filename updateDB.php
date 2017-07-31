<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "eurovisioncalc";
	$scoring = array("12", "10", "8", "7", "6", "5", "4", "3", "2", "1");
	$user = $_COOKIE["userName"];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);
	
	$values = $_GET['select'];

	$count = 0;
	
	// Checks whether the user is able to vote
	$sql = "SELECT voted FROM people WHERE name = '$user'";
	$voted = mysqli_query($conn, $sql) or die("Connection failed" . $conn->connect_error);
	$voted = mysqli_fetch_row($voted);
	$voted = $voted[0]; 
	
	if ($voted == 0){
	
		foreach ($values as $a){
			// Gets the points for the selected country
			$sql = "SELECT points FROM country WHERE country = '$a'";
			$points = mysqli_query($conn, $sql) or die("Connection failed" . $conn->connect_error);
			$points = mysqli_fetch_row($points);
			$points = $points[0]; 
		
			// Adds on the points the user has assigned, to the current value in the database
			$sql = "UPDATE country
			SET points = ($points + $scoring[$count])
			WHERE country = '$a';";
		
			// Runs the update query
			$conn->query($sql);
			$count = $count + 1;
		}
		
		// Sets the current user to has voted
		$sql = "UPDATE `people` SET `voted`= 1 WHERE name = '$user';";
		$conn->query($sql);
		
		$conn->close();
		
		header("Location: http://localhost/eurovisionCalc/submitted.html");
	
	}
	else{
		header("Location: http://localhost/eurovisionCalc/alreadyVoted.html");
	}
?>
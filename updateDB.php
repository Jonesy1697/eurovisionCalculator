<?php
$servername = "localhost";
$username = "root";
$password = "";
$country12 = 'United Kingdom';
$dbname = "eurovisioncalc";
$scoring = array("12", "10", "8", "7", "6", "5", "4", "3", "2", "1");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);
// Check connection

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
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
	
	echo "<b>" . $scoring[$count] . " points: </b>";
	echo $a;
	echo "<br>";
	
	$count = $count + 1;

}

$conn->close();

?>

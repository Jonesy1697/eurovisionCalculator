<?php
$servername = "localhost";
$username = "root";
$password = "";
$country12 = 'United Kingdom';
$dbname = "eurovisioncalc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);
// Check connection

$sql = "SELECT points FROM country WHERE country = '$country12'";
$points = mysqli_query($conn, $sql) or die("Connection failed" . $conn->connect_error);
$points = mysqli_fetch_row($points);
$points = $points[0]; 

$sql = "UPDATE country
		SET points = ($points + 12)
		WHERE country = '$country12';";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>
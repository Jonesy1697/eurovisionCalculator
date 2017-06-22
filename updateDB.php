<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eurovisioncalc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT country FROM country WHERE final = 1";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Eurovision scorer</title>
	</head>
	
	<body>
		<h1>Score countries</h1>
		
		<select>
			<?php while($row1 = mysqli_fetch_array($result)):;?>
			<option> <?php echo $row1[0];?></option>
			<?php endwhile ?>
		</select>
	</body>
</html>
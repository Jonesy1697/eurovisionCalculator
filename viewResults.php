<!DOCTYPE html>
<html>
	<head>
		<title>Eurovision scorer</title>
		<link rel="stylesheet" href="styles/style.css">
	</head>
	
	<body>
	
	<header>
		<h1>Results</h1>
	</header>	
	
		<main style = "text-align: center">
			<table>
				<tr>
					<th>Country</th>
					<th>Points</th>
				</tr>
<?php
	// Create connection	
	include 'db_connection.php';
 
	$con = OpenCon();
	  
	$sql = "SELECT * FROM `country` WHERE `final` = 1 ORDER BY `points` DESC;";
	$results = mysqli_query($con, $sql) or die("Connection failed" . $con->connect_error);
	
	foreach ($results as $a){	
	
	echo '<tr>';
	
	echo '<td>' . $a['country'] . '</td>';
	echo '<td>' . $a['points'] . '</td>';	
	echo '</tr>';
	
	}	
?>
			</table>
			
			<br>
				
			<form action="index.html"">
				<input type="submit" value="Home" />
			</form>			
		</main>
	</body>	
</html>
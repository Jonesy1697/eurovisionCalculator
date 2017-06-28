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
		
		<form id="form1" name="form1" method="get" action="updateDB.php">
		
			<p>12 Points</p>
		
			<select name = "select[ ]">
				<?php while($row1 = mysqli_fetch_array($result)):;?>
				<option> <?php echo $row1[0];?></option>
				<?php endwhile?>
			</select>
		
			<br><br>
			
			<?php
			$sql = "SELECT country FROM country WHERE final = 1";
			$result = mysqli_query($conn, $sql); 
			?>
		
			<p>10 Points</p>
		
			<select name = "select[ ]">
				<?php while($row1 = mysqli_fetch_array($result)):;?>
				<option> <?php echo $row1[0];?></option>
				<?php endwhile?>
			</select>
		
			<?php
			$sql = "SELECT country FROM country WHERE final = 1";
			$result = mysqli_query($conn, $sql); 
			?>
		
			<br><br>
			
			<p>8 Points</p>
		
			<select name = "select[ ]">
				<?php while($row1 = mysqli_fetch_array($result)):;?>
				<option> <?php echo $row1[0];?></option>
				<?php endwhile?>
			</select>
		
			<?php
			$sql = "SELECT country FROM country WHERE final = 1";
			$result = mysqli_query($conn, $sql); 
			?>
		
			<br><br>
			
			<p>7 Points</p>
		
			<?php
			$sql = "SELECT country FROM country WHERE final = 1";
			$result = mysqli_query($conn, $sql); 
			?>
		
			<select name = "select[ ]">
				<?php while($row1 = mysqli_fetch_array($result)):;?>
				<option> <?php echo $row1[0];?></option>
				<?php endwhile?>
			</select>
		
			<br><br>
			
			<?php
			$sql = "SELECT country FROM country WHERE final = 1";
			$result = mysqli_query($conn, $sql); 
			?>
			
			<p>6 Points</p>
		
			<select name = "select[ ]">
				<?php while($row1 = mysqli_fetch_array($result)):;?>
				<option> <?php echo $row1[0];?></option>
				<?php endwhile?>
			</select>
		
			<?php
			$sql = "SELECT country FROM country WHERE final = 1";
			$result = mysqli_query($conn, $sql); 
			?>
		
			<br><br>
			
			<p>5 Points</p>
		
			<select name = "select[ ]">
				<?php while($row1 = mysqli_fetch_array($result)):;?>
				<option> <?php echo $row1[0];?></option>
				<?php endwhile?>
			</select>
		
			<?php
			$sql = "SELECT country FROM country WHERE final = 1";
			$result = mysqli_query($conn, $sql); 
			?>
			
			<br><br>
			
			<p>4 Points</p>
		
			<select name = "select[ ]">
				<?php while($row1 = mysqli_fetch_array($result)):;?>
				<option> <?php echo $row1[0];?></option>
				<?php endwhile?>
			</select>
		
			<?php
			$sql = "SELECT country FROM country WHERE final = 1";
			$result = mysqli_query($conn, $sql); 
			?>
		
			<br><br>
			
			<p>3 Points</p>
		
			<select name = "select[ ]">
				<?php while($row1 = mysqli_fetch_array($result)):;?>
				<option> <?php echo $row1[0];?></option>
				<?php endwhile?>
			</select>
		
			<?php
			$sql = "SELECT country FROM country WHERE final = 1";
			$result = mysqli_query($conn, $sql); 
			?>
		
			<br><br>
			
			<p>2 Points</p>
		
			<select name = "select[ ]">
				<?php while($row1 = mysqli_fetch_array($result)):;?>
				<option> <?php echo $row1[0];?></option>
				<?php endwhile?>
			</select>
		
			<br><br>
			
			<?php
			$sql = "SELECT country FROM country WHERE final = 1";
			$result = mysqli_query($conn, $sql); 
			?>
			
			<p>1 Points</p>
		
			<select name = "select[ ]">
				<?php while($row1 = mysqli_fetch_array($result)):;?>
				<option> <?php echo $row1[0];?></option>
				<?php endwhile?>
			</select>
		
			<br><br>
			
			<input id = "button1" type = "submit" value = "Submit"/>	
	
		</form>
		
	</body>
	
</html>
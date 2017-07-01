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

	$user = $_GET['username'];
	$pass = $_GET['password'];
				
	setcookie("userName",$user,time()+8*3600);
				
	$sql = "SELECT password FROM people WHERE name = '$user'";
	$password = mysqli_query($conn, $sql) or die("Connection failed" . $conn->connect_error);
	$password = mysqli_fetch_row($password);
	$password = $password[0];
	
	$sql = "SELECT voted FROM people WHERE name = '$user'";
	$voted = mysqli_query($conn, $sql) or die("Connection failed" . $conn->connect_error);
	$voted = mysqli_fetch_row($voted);
	$voted = $voted[0];
	
	if ($password === $pass and $voted == 0){
?>

<!DOCTYPE html>

<head>
	
	<title>Eurovision scorer</title>
		<link rel="stylesheet" href="styles/style.css">
	</head>

<html>
		
	<header>
		<h1>Score countries</h1>
	</header>	
	
	<body>
	
		<main>	
				
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
		</main>
		
	</body>
	
</html>
<?php
	}elseif ($password === $pass and $voted == 1){
		
		header("Location: http://localhost/eurovisionCalc/alreadyVoted.html");
		
	}
	else{

	?>

<!DOCTYPE html>

<head>
	
	<title>Eurovision scorer</title>
		<link rel="stylesheet" href="style.css">
	</head>

<html>
		
	<header>
		<h1>Score countries</h1>
	</header>	
	
	<body>
		<main style = "text-align: center;">		
			<p>Incorrect login</p>
			<form action="index.html">
				<input type="submit" value="Back" />
			</form>
		</main>
	</body>
</html>	

<?php

	}

?>
<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

	include 'db_connection.php';
 
	$con = OpenCon();
		
	$sql = "SELECT country FROM country WHERE final = 1";
	
	// Runs query and saves the result
	$result = mysqli_query($con, $sql); 

	// Validates entered username and password
	$user = $_GET['username'];
	$pass = $_GET['password'];
	
	// Stores username as a cookie to later be used again			
	setcookie("userName",$user,time()+8*3600);
				
	// Searchs for the user password
	$sql = "SELECT password FROM people WHERE name = '$user'";
	$password = mysqli_query($con, $sql) or die("conection failed" . $con->conect_error);
	$password = mysqli_fetch_row($password);
	$password = $password[0];
	
	// Searches wheteher the user has voted yet
	$sql = "SELECT voted FROM people WHERE name = '$user'";
	$voted = mysqli_query($con, $sql) or die("conection failed" . $con->conect_error);
	$voted = mysqli_fetch_row($voted);
	$voted = $voted[0];
	
	// If the user details are correct, and they have not yet voted
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
			<!--Creates the form which allows each country to vote-->
				<p>12 Points</p>
			
				<select name = "select[ ]">
				<!--Creates a dropdown menu-->
					<?php while($row1 = mysqli_fetch_array($result)):;?>
					<!--Populates the dropdown menu with countries which are in the final-->
					<option> <?php echo $row1[0];?></option>
					<?php endwhile?>
				</select>
			
				<br><br>
				
				<?php
				$sql = "SELECT country FROM country WHERE final = 1";
				$result = mysqli_query($con, $sql); 
				?>
			
				<p>10 Points</p>
			
				<select name = "select[ ]">
					<?php while($row1 = mysqli_fetch_array($result)):;?>
					<option> <?php echo $row1[0];?></option>
					<?php endwhile?>
				</select>
			
				<?php
				$sql = "SELECT country FROM country WHERE final = 1";
				$result = mysqli_query($con, $sql); 
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
				$result = mysqli_query($con, $sql); 
				?>
			
				<br><br>
				
				<p>7 Points</p>
			
				<?php
				$sql = "SELECT country FROM country WHERE final = 1";
				$result = mysqli_query($con, $sql); 
				?>
			
				<select name = "select[ ]">
					<?php while($row1 = mysqli_fetch_array($result)):;?>
					<option> <?php echo $row1[0];?></option>
					<?php endwhile?>
				</select>
			
				<br><br>
				
				<?php
				$sql = "SELECT country FROM country WHERE final = 1";
				$result = mysqli_query($con, $sql); 
				?>
				
				<p>6 Points</p>
			
				<select name = "select[ ]">
					<?php while($row1 = mysqli_fetch_array($result)):;?>
					<option> <?php echo $row1[0];?></option>
					<?php endwhile?>
				</select>
			
				<?php
				$sql = "SELECT country FROM country WHERE final = 1";
				$result = mysqli_query($con, $sql); 
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
				$result = mysqli_query($con, $sql); 
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
				$result = mysqli_query($con, $sql); 
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
				$result = mysqli_query($con, $sql); 
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
				$result = mysqli_query($con, $sql); 
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
	// If the details are correct but they have voted, redirect to the already voted page
	}elseif ($password === $pass and $voted == 1){
		
		header("Location: http://localhost/euroCalc/alreadyVoted.html");
		
	}
	// Otherwise, the login is incorrect
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
<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "eurovisioncalc";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed: " . $conn->connect_error);
			

	$user = $_GET['username'];
	$pass = $_GET['password1'];
	$pass1 = $_GET['password2'];

	$sql = "SELECT COUNT(name)
			FROM people
			WHERE name = '$user';";
	$count = mysqli_query($conn, $sql) or die("Connection failed" . $conn->connect_error);
	$count = mysqli_fetch_row($count);
	$count = $count[0]; 
	
	if ($count == 0){
	
		if ($pass1 === $pass){
		
			$sql = "INSERT INTO `people`(`name`, `password`, `voted`) VALUES ('$user', '$pass', 0)";
				
			$conn->query($sql);
			
?>

<!DOCTYPE html>
	<html>
		<head>
			<title>Eurovision scorer</title>
			<link rel="stylesheet" href="style.css">
		</head>
		
		<body>
			<header>
				<h1>Log in</h1>
				
			</header>

			<main style = "text-align: center;">
				<p>User created!</p>
				<form action="index.html">
				<input type="submit" value="Login in" />
			</form>		
			</main>		
		</body>
	</html>

<?php
			
		}
		else{
			
	?>

	<!DOCTYPE html>
	<html>
		<head>
			<title>Eurovision scorer</title>
			<link rel="stylesheet" href="style.css">
		</head>
		
		<body>
			<header>
				<h1>Log in</h1>
				
			</header>

			<main style = "text-align: center;">
				<form name = "newUser" action="validateUser.php" method="get" accept-charset="utf-8">
					<label for = "username">Username </label>
					<input type = "username" name="username" placeholder="USERNAME" required>
					<br><br>
					<label for = "password1">Password </label>
					<input type = "password" name="password1" placeholder="PASSWORD" required>
					<br><br>
					<label for = "password2">Password </label>
					<input type = "password" name="password2" placeholder="PASSWORD" required>
					<br><br>
					<input type = "submit" value="Create" style = "color: #111;">
					<p>Password did not match!</p>
				</form>				
			</main>		
		</body>
	</html>

	<?php
			
		}
	}
	else{
	
	?>
	
	<!DOCTYPE html>
	<html>
		<head>
			<title>Eurovision scorer</title>
			<link rel="stylesheet" href="style.css">
		</head>
		
		<body>
			<header>
				<h1>Log in</h1>
				
			</header>

			<main style = "text-align: center;">
				<form name = "newUser" action="validateUser.php" method="get" accept-charset="utf-8">
					<label for = "username">Username </label>
					<input type = "username" name="username" placeholder="USERNAME" required>
					<br><br>
					<label for = "password1">Password </label>
					<input type = "password" name="password1" placeholder="PASSWORD" required>
					<br><br>
					<label for = "password2">Password </label>
					<input type = "password" name="password2" placeholder="PASSWORD" required>
					<br><br>
					<input type = "submit" value="Create" style = "color: #111;">
					<p>User name in use!</p>
				</form>				
			</main>		
		</body>
	</html>
	
	<?php

	}
	
	?>

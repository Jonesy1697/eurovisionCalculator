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
			</form>

			<form action="index.html" style = "float: right;">
				<input type="submit" value="Cancel" />
			</form>
			
			<br>
			
		</main>		
	</body>
</html>
<?php 

	$name = $_POST["name"];
	$surname = $_POST["surname"];
	$email = $_POST["email"];
	$login = $_POST["login"];
	$password = $_POST["password"];

	$connection = mysqli_connect("localhost","root","","dbtest");

	if(mysqli_connect_errno()){
		echo "Failed to connect to database" . mysqli_connect_error();
	}

	mysqli_query($connection,"INSERT INTO form VALUES(NULL,'$name','$surname','$email','$login','$password')");


 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Login</title>
 </head>
 <body>

 	<form action="check.php" method="POST">
 		<label for="login">Login:
 			<input type="text" name="login">
 		</label>
 		<br>
 		<br>
 		<label for="password">Password:
 			<input type="password" name="password">
 		</label>
 		<br>
 		<br>
 		<input type="submit" value="Submit">
 	</form>
 	
 </body>
 </html>
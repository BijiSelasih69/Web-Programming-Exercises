<?php

	//jika sudah ada cookie username, maka langsung masuk ke laman landing
	if (isset($_COOKIE['namauser'])) {
		header("Location: landing.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>MATH GAME</title>
</head>
<body>
	<center>
		<h2>SELAMAT DATANG DI MATH GAME</h2>
		<p>Login dulu yuk</p>
		<form method="post" action="proses.php">
			<table>
				<tr>
					<td align="center">Username</td>
				</tr>
				<tr>
					<td><input type="text" name="namauser"></td>
				</tr>
				<tr >
					<td align="center">Email</td>
				</tr>
				<tr>
					<td><input type="email" name="emailuser"></td>
				</tr>
				<tr>
					<td align="center"><input type="submit" name="submit" value="Submit"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>
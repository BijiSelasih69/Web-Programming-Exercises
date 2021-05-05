<?php

	include 'dbconnect.php';

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "leaderboard";
	$dbtable = "rank";
	tampilLead($dbhost, $dbuser, $dbpass, $dbname, $dbtable);

?>

<!DOCTYPE html>
<html>
<head>
	<title>HALL OF FAME</title>
</head>
<body>
	<center>
		<a href="logout.php"><button>Keluar</button></a>
	</center>
</body>
</html>
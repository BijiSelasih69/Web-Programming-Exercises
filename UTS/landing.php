<?php
	
	include 'cek.php';
	session_start();

	echo "<title>GAME MATEMATIKA</title>";
	echo "<center><h3>Hallo, ".$_SESSION['namauser']."! Selamat datang ke game ini!</h3>";

	echo "<a href='main.php'><button>Mulai Game</button></a>";
	echo "<p>Bukan anda? <a href='logout.php'>(klik di sini)</a></p></center>";
?>
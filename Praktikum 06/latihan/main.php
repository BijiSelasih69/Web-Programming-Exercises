<?php

	session_start();
	include 'cek.php';

	setcookie("visits",0,time()+60*60*3,"/");
	setcookie("lastvisit",date("d-m-Y H:i:s"),time()+60*60*3,"/");

	//cookie diset untuk waktu 3 jam

?>

<!DOCTYPE html>
<html>
<head>
	<title>Game Tebak Angka</title>
</head>
<body>
		<?php

			echo "<h1>Selamat Datang, ".$_SESSION['namauser']."</h1>";
			echo "<p>Nampaknya ini kunjungan anda yang ke-".$_COOKIE['visits']."</p>";
			echo "<p>Anda terakhir datang pada ".$_COOKIE['lastvisit']."</p>";

			setcookie("visits", $_COOKIE['visits']+1, time()+60*60*3,"/");
			setcookie("lastvisit", date("d-m-Y H:i:s"), time()+60*60*3,"/");

		?>
	<p>Bukan anda? <a href="logout.php">keluar</a></p>

	<p>Halo,Nama saya Mr.PHP. Saya telah memilih secara random sebuah bilangan bulat. Silakan anda tebak ya!</p>
	<br>
	<form method="post">
		
	Bilangan Tebakan Anda <input type="text" name="tebakan">
	<input type="submit" name="submit" value="Submit">
	<br><br>

	</form>
	<?php

		if (isset($_POST['tebakan'])) {
			$bilacak = rand(0,10);

			if ($_POST['tebakan'] == $bilacak) {
				echo "<p>Selamat!!! Tebakan kamu benar!!! Saya memilih angka ".$bilacak."</p>";
				echo "<a href='main.php'>Ulang Game</a>";
			} elseif ($_POST['tebakan'] <= $bilacak) {
				echo "<p>Maaf, tebakan kamu kekecilan!</p>";
			} else {
				echo "<p>Maaf tebakan kamu kebesaran!</p>";
			}

		}

	?>
	
</body>
</html>
<?php
	include 'dbconnect.php';
	session_start();
	$jawaban = $_SESSION['rand1'] + $_SESSION['rand2'];

	

	echo "<title>GAME MATEMATIKA</title>";
	echo "<center><h3>Hallo, ".$_COOKIE['namauser']."! Do the best ya!!!</h3>";
	


	
	
	echo "<form method='post'>";
	if (!isset($_POST['submit'])) {
		echo "Lives : ".$_SESSION['lives']." | Score : ".$_SESSION['skor']."<br>";
		echo "<br>Berapakah hasil dari ".$_SESSION['rand1']." + ".$_SESSION['rand2']." ??? ";
		echo "
			<input type='text' name='input'>
			<input type='submit' name='submit' value='Jawab'></form>";
	} else {
		$tebakan = intval($_POST['input']);
		if ($jawaban == $tebakan) {
			echo "Selamat ".$_SESSION['namauser'].", jawaban kamu benar!!!";
			$_SESSION['skor'] += 10;
			echo "<br>Lives : ".$_SESSION['lives']." | Score : ".$_SESSION['skor']."<br>";
			echo "<br><a href='game.php'><button>Soal Selanjutnya</button></a>";
		} else {
			$_SESSION['lives'] -= 1;
			$_SESSION['skor'] -= 2;
			echo "Lives : ".$_SESSION['lives']." | Score : ".$_SESSION['skor']."<br>";
			echo "Yahh, jawaban kamu salah";
			

			if ($_SESSION['lives'] < 1) {
				echo "<p style='color:red'>
						Sayang sekali, nyawa kamu sudah habis.
						<br>Coba lagi lain waktu ya!</p>";
				echo "Skor kamu : ".$_SESSION['skor']."";
				echo "<br><a href='index.php'><button>Main lagi</button></a>";
				echo "<br>Lihat <a href='leaderboard.php'>Leaderboard</a>";
			} else {
				echo "<br><a href='game.php'><button>Soal Selanjutnya</button></a>";
			}

		}
		$_SESSION['rand1'] = random_int(0, 20);
		$_SESSION['rand2'] = random_int(0, 20);
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "leaderboard";
		$dbtable = "rank";
		$nama = $_SESSION['namauser'];
		$skor = $_SESSION['skor'];
		if ($_SESSION['lives'] < 1) {
			inputData($dbhost, $dbuser, $dbpass, $dbname, $dbtable, $nama, $skor);
			$_SESSION['lives'] = 5;
			$_SESSION['skor'] = 0;
		}

	}


	
	
?>
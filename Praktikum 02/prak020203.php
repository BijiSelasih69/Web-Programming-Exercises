<?php
	$baris = 4;
	$kolom = 5;
	$angka = 1;
	$genap = "style='background-color:red;color:white'";
	$ganjil = "style='background-color:white;color:red'";

	echo "<table border='1'>";
	for ($i= 1; $i <= $baris; $i++) { 
		echo "<tr>";
			
		for ($j= 1; $j <= $kolom; $j++) { 
			if ($angka % 2 == 0) {
				echo "<td ".$genap.";>$angka</td>";
			} else {
				echo "<td ".$ganjil.";>$angka</td>";
			}
			
			$angka += 1;
			
		}
		echo "</tr>";
	}
	echo "</table>";
?>

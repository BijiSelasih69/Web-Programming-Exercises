<?php
	$baris = 4;
	$kolom = 5;
	$angka = 1;

	echo "<table border='1'>";
	for ($i= 1; $i <= $baris; $i++) { 
		echo "<tr>";
			
		for ($j= 1; $j <= $kolom; $j++) { 
			if ($angka % 2 == 0) {
				echo "<td>$angka</td>";
			} else {
				echo "<td>$angka</td>";
				
			}
			$angka += 1;
			
		}
		echo "</tr>";
	}
	echo "</table>";
?>

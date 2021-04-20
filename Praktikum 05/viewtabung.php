<?php

	$namaFile = "datatabung.dat";
	$myFile = fopen($namaFile, "r") or die("File Tidak Ditemukan!");
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>DATA TABUNG</title>
</head>
<body>
	<h1>DATA UKURAN TABUNG</h1>

	<table border="1">
		<tr>
			<th>NAMA TABUNG</th>
			<th>DIAMETER</th>
			<th>TINGGI</th>
			<th>LUAS</th>
		</tr>
		<?php

			while (!feof($myFile)) {
				echo "<tr>";
				$dataTab = explode(",", fgets($myFile));
				$link = "hitungluas.php?n=$dataTab[0]&d=$dataTab[1]&t=$dataTab[2]";
				if ($dataTab[0] != '') {
					echo "
						<td>$dataTab[0]</td>
						<td>$dataTab[1]</td>
						<td>$dataTab[2]</td>
						<td><a href = $link target='_blank'>view</a></td>";
				}
			} echo "</tr>";
		?>
	</table>
</body>
</html>
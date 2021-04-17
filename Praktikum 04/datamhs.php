<?php

//deklarasi variabel
	$namaFile = "datamhs.dat";
	$myFile = fopen($namaFile, "r") or die("File tidak ada!");

	$tanggal = explode("-", date("Y-m-d"));
	$tahun = $tanggal[0];
	$bulan = $tanggal[1];
	$hari = $tanggal[2];
	$jd = GregorianToJD($bulan, $hari, $tahun);

	//user-defined function untuk usia
	function usia(string $tglLahir, $jd) {
		$lahirMhs = explode("-", $tglLahir);
		$year = $lahirMhs[0];
		$month = $lahirMhs[1];
		$day = $lahirMhs[2];
		$jd1 = GregorianToJD($month, $day, $year);
		$usia = intval(($jd - $jd1)/ 365.25);
		return $usia;
	}


	//tabel
	echo "<center>";
	echo "<h1>DATA MAHASISWA</h1>";
	echo "<table border = 1>";
	echo 
		"<tr>
			<th>No</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Tanggal Lahir</th>
			<th>Tempat Lahir</th>
			<th>Usia</th>
		</tr>";

	$nomor = 1;
	while (!feof($myFile)) {
		echo "<tr>";
		$dataMhs = explode("|", fgets($myFile));
		if ($dataMhs[0] != '') {
			$umur = usia($dataMhs[2], $jd);
			echo "
				<td>$nomor</td>
				<td>$dataMhs[0]</td>
				<td>$dataMhs[1]</td>
				<td>$dataMhs[2]</td>
				<td>$dataMhs[3]</td>
				<td>$umur</td>";
				$nomor++;
		}
		echo "</tr>";
	}
	echo "</table>";
	echo "Jumlah Data Mahasiswa : ".count(file($namaFile))."";
	echo "</center>";
?>

<?php

	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$tgllhr = $_POST['tgllhr'];
	$tmptlhr = $_POST['tmptlhr'];
	$namaFile = "datamhs.dat";
	$myFile = fopen($namaFile, "a") or die("File Tidak Ada!");
	//deklarasi variabel

	fwrite($myFile, "".$nim."|".$nama."|".$tgllhr."|".$tmptlhr."\n");
	fclose($myFile);

	echo "Data Berhasil Dimasukkan!";

?>
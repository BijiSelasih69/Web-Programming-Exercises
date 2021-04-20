<?php
	
	//deklarasi variabel
	$diameter = $_GET['d'];
	$tinggi = $_GET['t'];
	$nama = $_GET['n'];
	$pi = 22/7;

	//rumus
	$luasSelimut = ($diameter * $pi) * $tinggi;
	$luasLingkaran = (($diameter ** 2) * $pi) / 4;
	$luasTabung = ($luasSelimut + (2 * $luasLingkaran));

	echo "Luas tabung ".$nama." dengan diameter ".$diameter." dan tinggi ".$tinggi." adalah ".$luasTabung." satuan luas.";

?>
<?php

	$namafile = "myfile.txt";
	$myfile = fopen($namafile, "r") or die("Tidak bisa buka file!");
	echo fread($myfile, filesize($namafile));
	fclose($myfile);

?>
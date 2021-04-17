<?php

	$namafile = "myfile.txt";
	$myfile = fopen($namafile, "r") or die("Tidak bisa buka file!");
	while (!feof($myfile)) {
		echo fgets($myfile);
	}
	fclose($myfile);

?>	
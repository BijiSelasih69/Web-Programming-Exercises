<?php

	$namafile = "myfile.txt";
	$myfile = fopen($namafile, "a") or die("Tidak bisa buka file!");
	fwrite($myfile, "DOS = Disk Operating System\n");
	fclose($myfile);

?>
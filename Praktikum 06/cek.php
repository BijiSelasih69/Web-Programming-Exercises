<?php

	//mengecek keberadaan session 'namauser'
	//ket: session 'namauser' akan tercreate ketika proses login sukses
	//silakan cek kembali script di proses.php

	if (!isset($_SESSION['namauser'])) {
		echo "<p>Hayoo.. mau coba nge by-pass ya?</p>";
		echo "<p><a href='form.html'>Login </a>dulu ya..</p>";

		//setelah memunculkan pesan di atas, selanjutnya dibreak dengan exit()
		exit();
		
	}

?>
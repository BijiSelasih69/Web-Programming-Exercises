<?php

	if (!isset($_SESSION['namauser'])) {
		echo "<p>Kok uda mau main aja?</p>";
		echo "<p><a href='formlatihan.html'>Login </a>dulu yuk!</p>";

		exit();
	}

?>
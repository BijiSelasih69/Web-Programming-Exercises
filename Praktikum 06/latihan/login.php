<?php

	session_start();

	$users = array(
					array("kiketganteng","Otniel Dewangga Divan Pramudya","123456"),
					array("default","User Default","user")
					);

	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		foreach ($users as $identity) {
			if (($identity[0] == $username) && ($identity[2] == $password)) {

				$_SESSION['namauser'] = $identity[1];

				header("Location: main.php");
			}
		}

		echo "<h3>Login Gagal</h3>";
		echo "<p>Silahkan <a href='formlatihan.html'>login kembali</a></p>";
	}

?>
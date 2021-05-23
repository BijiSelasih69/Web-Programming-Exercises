<?php

	include 'koneksi.php';
	$db = new koneksiDB();
	$koneksi = $db->getKoneksi();
	$request = $_SERVER['REQUEST_METHOD'];
	$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$uri_segment = explode('/', $uri_path);
	$last = array_pop($uri_segment);

	switch ($request) {
		case 'GET':
			if (!empty($last)) {
				$id = (string)($last);
				get_mahasiswa($id);
			} else {
				get_mahasiswa();
			}
			break;
		
		case 'POST':
			insert_mahasiswa();
			break;

		case 'PUT':
			$id = (string)($last);
			update_mahasiswa($id);
			break;

		case 'DELETE':
			$id = (string)($last);
			delete_mahasiswa($id);
			break;
		default:
			header("HTTP/1.0 405 Method Tidak Terdaftar");
			break;
	}

	function get_mahasiswa($id="") {
		global $koneksi;
		$query = "SELECT * FROM mahasiswa";
		if (!empty($id)) {
			$query .= " WHERE nim = '".$id."'";
		}
		$respon = array();
		$result = mysqli_query($koneksi, $query);
		$i = 0;
		if ($result) {
			$respon['kode'] = 1;
			$respon['status'] = "sukses";
			while ($row = mysqli_fetch_array($result)) {
				$respon['data'][$i]['nim'] = $row['nim'];
				$respon['data'][$i]['nama'] = $row['nama'];
				$respon['data'][$i]['angkatan'] = $row['angkatan'];
				$respon['data'][$i]['semester'] = $row['semester'];
				$respon['data'][$i]['ipk'] = $row['ipk'];
				$i++;
			}
		} else {
			$respon['kode'] = 0;
			$respon['status'] = "gagal";
		}
		header('Content-Type: application/json');
		echo json_encode($respon);
	}

	function insert_mahasiswa() {
		global $koneksi;
		$data = json_decode(file_get_contents('php://input'), true);
		$nim = $data['nim'];
		$nama = $data['nama'];
		$angkatan = $data['angkatan'];
		$semester = $data['semester'];
		$ipk = $data['ipk'];

		$query = "INSERT INTO mahasiswa SET nim = '".$nim."', nama = '".$nama."', angkatan = '".$angkatan."', semester = '".$semester."', ipk = '".$ipk."'";

		if (mysqli_query($koneksi, $query)) {
			$respon	= [
				'kode' => 1,
				'status' => 'Data Mahasiswa Berhasil Ditambah'
			];
		} else {
			$respon = [
				'kode' => 0,
				'status' => 'Data Mahasiswa Gagal Ditambah'
			];
		}
		header('Content-Type: application/json');
		echo json_encode($respon);
	}

	function update_mahasiswa($id) {
		global $koneksi;
		$data = json_decode(file_get_contents('php://input'), true);
		$nama = $data['nama'];
		$angkatan = $data['angkatan'];
		$semester = $data['semester'];
		$ipk = $data['ipk'];

		$query = "UPDATE mahasiswa SET nama = '".$nama."', angkatan = '".$angkatan."', semester = '".$semester."', ipk = '".$ipk."' WHERE nim = '".$id."'";

		if (mysqli_query($koneksi, $query)) {
			$respon	= [
				'kode' => 1,
				'status' => 'Data Mahasiswa Berhasil Diupdate'
			];
		} else {
			$respon = [
				'kode' => 0,
				'status' => 'Data Mahasiswa Gagal Diupdate'
			];
		}
		header('Content-Type: application/json');
		echo json_encode($respon);
	}

	function delete_mahasiswa($id) {
		global $koneksi;
		$query = "DELETE FROM `mahasiswa` WHERE nim = '".$id."'";

		if (mysqli_query($koneksi, $query)) {
			$respon = [
				'kode' => 1,
				'status' => 'Data Mahasiswa Berhasil Dihapus'
			];
		} else {
			$respon = [
				'kode' => 0,
				'status' => 'Data Mahasiswa Gagal Dihapus'
			];
		}
		header('Content-Type: application/json');
		echo json_encode($respon);
	}

?>
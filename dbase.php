<?php
date_default_timezone_set("Asia/Jakarta"); // waktu servernya
$host = "localhost"; // biarkan saja localhost.
$user = "santosa"; // ubah dengan username yang ada.
$password = "";// ubah dengan password phpmyadmin. jika tidak ada maka kosongkan saja.
$database_name = "latihan";// ubah dengan database.

try {
	$db = new PDO("mysql:host=$host;dbname=$database_name",
		$user,
		$password,
		array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		));	 // baris 9 - 14 koneksi ke database menggunakan pdo.
} catch (Exception $e) {
	echo '<script>alert("database sedang mengalami gangguan");</script>'; // apabila gagal koneksi ke database.
}

?>
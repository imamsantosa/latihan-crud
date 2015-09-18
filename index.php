<?php
// ini halaman untuk menampilkan data.
include 'dbase.php'; // memanggil file dbase.php utuk koneksi kedatabase.
?> 
<html>
<head>
	<title>Read</title>
</head>
<body>
<?php 

	if (isset($_GET['status'])) {
		echo '<h2>'.$_GET['status'].'</h2>'; //untuk menampilkan hasil pesan dari proses crud
	}

?>
<a href="create.php">buat artikel baru</a><br> <!-- untuk mengalihkan ke link buat artikel -->

<?php

	$query = $db->prepare("select * from crud"); // memanggil variable $db pada file dbase untuk melakukan pemanggilan database. query untuk memanggilnya seperti apa yang saya tulis. maksud dari (select * from crud) adalah pilih semua dari tabel crud.

	$query->execute(); // untuk mengeksekusi query yang tadi sudah ditulis.
	while ($data = $query->fetch()) { // melakukan perulangan untuk menampilkan semua yang ada di database.
		?> <h3><?php echo $data['judul_artikel']; // menampilkan judul artikel?></h3>
			<a href="update.php?id=<?php echo $data['id'];?>">edit artikel</a> | <!-- maksudnya adalah mengalihkan kehalaman update dengan parameter idnya agar mudah mencari artikel yang dimaksud.-->
			<a href="delete.php?id=<?php echo $data['id'];?>">hapus artikel</a> <!-- maksudnya adalah mengalihkan kehalaman delete dengan parameter idnya agar mudah mencari artikel yang dimaksud.-->
			<h6><?php echo $data['date_create']; // menampilkan tanggal dibuatnya artikel?></h6>
			<hr>
			<p><?php echo $data['isi_artikel']; //menampilkan isi artikel?></p>
			<br>
			<br>
		<?php
	}

?>

</body>
</html>
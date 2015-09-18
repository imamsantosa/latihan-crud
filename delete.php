<?php
	include 'dbase.php';
	try {
		$id = (isset($_GET['id']))? $_GET['id'] : null ; //mengambil id yang ada pada url. update.php?id=xx
		$cariid = $db->prepare("delete from crud where id=:id "); // hapus dari tabel crud dimana id = ?
	    $cariid->execute(array(
	      ':id' => $id
	   	)); // eksekusi penghapusan
		header('location: index.php?status=sukses menghapus artikel'); //redirect ke halaman index (read) dengan status sukses
	} catch (Exception $e) {
		header('location: index.php?status=gagal menghapus artikel'); //redirect ke halaman index (read) dengan status gagal
		
	}
?>
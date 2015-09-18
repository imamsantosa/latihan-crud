<?php
	include 'dbase.php';

	$id = (isset($_GET['id']))? $_GET['id'] : null ; //mengambil id yang ada pada url. update.php?id=xx
	$cariid = $db->prepare("select * from crud where id=:id "); // pilih semua dari tabel crud dimana id = ?
    $cariid->execute(array(
      ':id' => $id
   	));
    $data = $cariid->fetch(); //men mengolah hasil pengambilan dari database
?>

<html>
<head>
	<title>update</title>
</head>
<body>
	<form action="" method="POST">
		<label>Judul : </label> <br>
		<input type="text" name="judul" placeholder="masukan judul" required value="<?php echo $data['judul_artikel']; ?>"><br><!-- menampilkan data judul artikel -->
		<label>Isi : </label><br>
		<textarea rows="10" name="isi" cols="40" required="required"><?php echo $data['isi_artikel']; ?></textarea><br><br> <!-- menampilkan data isi artikel -->
		<input type="submit" name="simpan">
	</form>
</body>
</html>

<?php
	
	if (isset($_POST['simpan'])) { //jika submit dengan nama simpan di set maka...
		$judul = $_POST['judul']; // menerima dari form dengan method post untuk nama judul
		$isi = $_POST['isi']; // menerima dari form dengan method post untuk nama isi
		try { // try adalah exception hendling yang berfungsi untuk menghendel error yang ada didalam kurungnya try
	        $simpan = $db->prepare("update crud set judul_artikel=:judul, isi_artikel=:isi, date_update=now() where id=:id"); // maksud dari query ini adalah update tabel crud dengan kolom yang di isi judul artikel, isi artikel, date create dengan isi ? ? ?. maksud dari :judul dan :isi adalah untuk parameter saat di execute nanti dimana id = ??
	        $simpan->execute(array(
	        		':judul'=>$judul, //parameter :judul diisi oleh variabel judul
	        		':isi'=>$isi, //parameter :isi diisi oleh variabel isi
	        		':id'=>$id //parameter :isi diisi oleh variabel isi
	        	));
			header('location: index.php?status=sukses mengubah artikel'); //redirect ke halaman index (read) dengan status sukses
		} catch (Exception $e) {
			header('location: index.php?status=error mengubah artikel'); //redirect ke halaman index (read) dengan status error
		}
	}
?>
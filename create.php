<?php
include 'dbase.php';
?>

<html>
<head>
	<title>create</title>
</head>
<body>
	<form action="" method="POST">
		<label>Judul : </label> <br>
		<input type="text" name="judul" placeholder="masukan judul" required><br>
		<label>Isi : </label><br>
		<textarea rows="10" name="isi" cols="40" required="required"></textarea><br><br>
		<input type="submit" name="simpan">
	</form>
</body>
</html>

<?php
	
	if (isset($_POST['simpan'])) { //jika submit dengan nama simpan di set maka...
		$judul = $_POST['judul']; // menerima dari form dengan method post untuk nama judul
		$isi = $_POST['isi']; // menerima dari form dengan method post untuk nama isi
		try { // try adalah exception hendling yang berfungsi untuk menghendel error yang ada didalam kurungnya try
	        $simpan = $db->prepare("insert into crud (judul_artikel,isi_artikel,date_create,date_update) values (:judul,:isi,NOW(),NOW())"); // maksud dari query ini adalah simpan ke tabel crud dengan kolom yang di isi judul artikel, isi artikel, date create dengan isi ? ? ?. maksud dari :judul dan :isi adalah untuk parameter saat di execute nanti
	        $simpan->execute(array(
	        		':judul'=>$judul, //parameter :judul diisi oleh variabel judul
	        		':isi'=>$isi //parameter :isi diisi oleh variabel isi
	        	));
			header('location: index.php?status=sukses membuat artikel'); //redirect ke halaman index (read) dengan status sukses
		} catch (Exception $e) {
			header('location: index.php?status=error membuat artikel'); //redirect ke halaman index (read) dengan status error
		}
	}
?>
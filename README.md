# Create, Read, Update, Delete database with PHP 
latihan membuat aplikasi CRUD (create, read, update, delete) dalam bahasa php dan database mysql.

dalam program ini memiliki skema database :
````python
CREATE TABLE IF NOT EXISTS `crud` (
  `id` int(11) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `isi_artikel` longtext NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
````
- di dalam file sudah saya kasih komentar untuk penjelasannya.
- koneksi dengan database saya menggunakan PDO biar kekinian. hehe

# Correct Me If I Wrong :smile
Thank for visit my repo :-)

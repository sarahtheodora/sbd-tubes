<?php

 $ambil = $koneksi->query("SELECT * FROM artikel WHERE id_artikel='$_GET[id]'");
 $pecah = $ambil->fetch_assoc();
 $gambarartikel = $pecah['gambar_artikel'];
 if(file_exists("../$gambarartikel"))
 {
 	unlink("../$gambarartikel");
 }

 $koneksi->query("DELETE FROM artikel WHERE id_artikel='$_GET[id]'");

 echo "<script>alert('Artikel Terhapus');</script>";
 echo "<script>location='index.php?halaman=artikel';</script>";
 ?>
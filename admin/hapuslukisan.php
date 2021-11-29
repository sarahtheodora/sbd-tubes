<?php

 $ambil = $koneksi->query("SELECT * FROM lukisan WHERE id_lukisan='$_GET[id]'");
 $pecah = $ambil->fetch_assoc();
 $gambar = $pecah['gambar'];
 if(file_exists("../$gambar"))
 {
 	unlink("../img/$gambar");
 }

 $koneksi->query("DELETE FROM lukisan WHERE id_lukisan='$_GET[id]'");

 echo "<script>alert('Lukisan Terhapus');</script>";
 echo "<script>location='index.php?halaman=lukisan';</script>";
 ?>

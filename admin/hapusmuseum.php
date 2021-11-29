<?php

 $ambil = $koneksi->query("SELECT * FROM museum WHERE id_museum='$_GET[id]'");
 $pecah = $ambil->fetch_assoc();
 $logo = $pecah['logo'];
 if(file_exists("../$logo"))
 {
 	unlink("../$logo");
 }

 $koneksi->query("DELETE FROM museum WHERE id_museum='$_GET[id]'");

 echo "<script>alert('Museum Terhapus');</script>";
 echo "<script>location='index.php?halaman=museum';</script>";
 ?>
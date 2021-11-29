<?php

 $ambil = $koneksi->query("SELECT * FROM seniman WHERE id_seniman='$_GET[id]'");
 $pecah = $ambil->fetch_assoc();
 
 $koneksi->query("DELETE FROM seniman WHERE id_seniman='$_GET[id]'");

 echo "<script>alert('Nama Seniman Terhapus');</script>";
 echo "<script>location='index.php?halaman=seniman';</script>";
 ?>
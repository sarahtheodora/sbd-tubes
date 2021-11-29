<?php

 $ambil = $koneksi->query("SELECT * FROM media WHERE id_media='$_GET[id]'");
 $pecah = $ambil->fetch_assoc();
 $cover = $pecah['cover_media'];
 if(file_exists("../$cover"))
 {
 	unlink("../$cover");
 }

 $koneksi->query("DELETE FROM media WHERE id_media='$_GET[id]'");

 echo "<script>alert('Media Terhapus');</script>";
 echo "<script>location='index.php?halaman=media';</script>";
 ?>
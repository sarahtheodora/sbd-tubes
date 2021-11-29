<div class="container" style="margin-top:20px">
	<center><font size="6">EDIT DATA MEDIA</font></center>
	<hr>

<?php 
  $ambil = $koneksi->query("SELECT * FROM media WHERE id_media='$_GET[id]'");
  $pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
 	<div class="item form-group">
	    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Media</label>
 		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_media']; ?>" required>
 	</div>
 	<div class="item form-group">
	    <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Media</label>
 		<textarea name="isi"class="form-control" rows="10"><?php echo $pecah['deskripsi_media'];?></textarea>
 	</div>
    <div class="item form-group">
    	<div class="col-md-6 col-sm-6 offset-md-3">
 		<img src="../<?php echo $pecah['cover_media'] ?>" width="100">
 	</div></div>
 	<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Ganti Gambar</label>
			<div class="col-md-7 col-sm-7">
 		<input type="file" name="foto" class="form-control">
 	</div>
 </div>
 	<div class="item form-group">
		 <div class="col-md-6 col-sm-6 offset-md-3">
		 <input type="submit" name="ubah" class="btn btn-primary" value="Simpan">
		<a href="index.php?halaman=media" class="btn btn-warning">Kembali</a>
		</div>
	</div>
 </form>
</div>
 <?php
 if (isset($_POST['ubah']))
 {
 	$namafoto=$_FILES['foto']['name'];
 	$lokasifoto = $_FILES['foto']['tmp_name'];
 	// jk foto diubah
 	if (!empty($lokasifoto))
 	{
 		move_uploaded_file($lokasifoto,"../img/lukisan/$namafoto");

 		$koneksi->query("UPDATE media SET nama_media='$_POST[nama]',deskripsi_media='$_POST[isi]',cover_media='img/lukisan/$namafoto' WHERE id_media='$_GET[id]'");
 	}
 	else
 	{
 		$koneksi->query("UPDATE media SET nama_media='$_POST[nama]',deskripsi_media='$_POST[isi]' WHERE id_media='$_GET[id]'");
 	}
 	echo "<script>alert('Data Media Telah Diubah');</script>";
 	echo "<script>location='index.php?halaman=media';</script>";
 }
 
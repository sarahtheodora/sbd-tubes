 <div class="container" style="margin-top:20px">
		<center><font size="6">EDIT DATA SENIMAN</font></center>
		<hr>
<?php 
  $ambil = $koneksi->query("SELECT * FROM seniman WHERE id_seniman='$_GET[id]'");
  $pecah = $ambil->fetch_assoc();
?>
 <form method="post" enctype="multipart/form-data">
 	<div class="item form-group">
	    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Seniman</label>
 		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_seniman']; ?>" required>
 	</div>
 	<div class="item form-group">
	    <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Seniman</label>
 		<textarea name="isi"class="form-control" rows="10"><?php echo $pecah['deskripsi_seniman'];?></textarea>
 	</div>
          <div class="item form-group">
		  <div class="col-md-6 col-sm-6 offset-md-3">
			<input type="submit" name="ubah" class="btn btn-primary" value="Simpan">
			<a href="index.php?halaman=seniman" class="btn btn-warning">Kembali</a>
		</div>
	</div>
</form>
</div>
<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['ubah'])){
			$koneksi->query("UPDATE seniman SET nama_seniman='$_POST[nama]', deskripsi_seniman='$_POST[isi]' WHERE id_seniman='$_GET[id]'");

			if($koneksi){
				echo "<script>alert('Data Seniman Telah Diubah');</script>";
 	            echo "<script>location='index.php?halaman=seniman';</script>";
			}else{
				echo '<div class="alert alert-warning">Gagal Melakukan Proses Edit Data.</div>';
			}
		}
		?>

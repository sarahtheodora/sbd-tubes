<div class="container" style="margin-top:20px">
	<center><font size="6">EDIT DATA ARTIKEL</font></center>
	<hr>

<?php 
  $ambil = $koneksi->query("SELECT * FROM artikel WHERE id_artikel='$_GET[id]'");
  $pecah = $ambil->fetch_assoc();

  $artikel = $_GET['id'];
  $query = "SELECT * FROM artikel WHERE id_artikel = $artikel";
  $hasil = mysqli_query($koneksi, $query);
  foreach($hasil as $data){  
  	$idmedia = $data['id_media'];
  	$idmuseum = $data['id_museum'];
  }

  $query3 = "SELECT id_media, nama_media FROM media WHERE id_media = $idmedia";
  $hasil3 = mysqli_query($koneksi, $query3);

  $query4 = "SELECT id_museum, nama_museum FROM museum WHERE id_museum = $idmuseum";
  $hasil4 = mysqli_query($koneksi, $query4);
?>

 <form method="post" enctype="multipart/form-data">
 	<div class="item form-group">
	    <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Artikel</label>
 		<input type="text" name="judul" class="form-control" value="<?php echo $data['judul_artikel']; ?>">
 	</div>
 	<div class="item form-group">
	    <label class="col-form-label col-md-3 col-sm-3 label-align">Isi Artikel</label>
 		<textarea name="isi"class="form-control" rows="10"><?php echo $data['isi_artikel'];?></textarea>
 	</div>
 	<div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Media</label>
        <div class="col-md-6 col-sm-6">
          <select class="form-control" name="media" id="media" required>
          		<?php foreach($hasil3 as $data3) { ?>
                <option value="<?=$data['id_media']?>" hidden><?=$data3['nama_media']?></option>
                <?php }
                  include '../includes/koneksi.php';
                  $media = mysqli_query($koneksi, "SELECT id_media, nama_media FROM media");
                  while($m = mysqli_fetch_array($media)){
                ?>
                <option value="<?=$m['id_media']?>"><?=$m['nama_media']?></option>
                <?php } ?>
          </select>
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Museum</label>
        <div class="col-md-6 col-sm-6">
          <select class="form-control" name="museum" id="museum" required>
          		<?php foreach($hasil4 as $data4) { ?>
                <option value="<?=$data['id_museum']?>" hidden><?=$data4['nama_museum']?></option>
                <?php }
                  include '../includes/koneksi.php';
                  $museum = mysqli_query($koneksi, "SELECT id_museum, nama_museum FROM museum");
                  while($u = mysqli_fetch_array($museum)){
                ?>
                <option value="<?=$u['id_museum']?>"><?=$u['nama_museum']?></option>
                <?php } ?>
          </select>
        </div>
      </div>
    <div class="item form-group">
    	<div class="col-md-6 col-sm-6 offset-md-3">
 		<img src="../<?php echo $pecah['gambar_artikel'] ?>" width="100">
 	</div></div>
 	<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Ganti Gambar</label>
			<div class="col-md-7 col-sm-7">
 		<input type="file" name="foto" class="form-control">
 	</div></div>
 	<div class="item form-group">
		  <div class="col-md-6 col-sm-6 offset-md-3">
			<input type="submit" name="ubah" class="btn btn-primary" value="Simpan">
			<a href="index.php?halaman=artikel" class="btn btn-warning">Kembali</a>
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
 		move_uploaded_file($lokasifoto,"../img/artikel/$namafoto");

 		$koneksi->query("UPDATE artikel SET judul_artikel='$_POST[judul]',isi_artikel='$_POST[isi]',id_media='$_POST[media]', id_museum='$_POST[museum]', gambar_artikel='img/artikel/$namafoto' WHERE id_artikel='$_GET[id]'");
 	}
 	else
 	{
 		$koneksi->query("UPDATE artikel SET judul_artikel='$_POST[judul]',isi_artikel='$_POST[isi]' id_media='$_POST[media]', id_museum='$_POST[museum]' WHERE id_artikel='$_GET[id]'");
 	}
 	echo "<script>alert('Data Artikel telah diubah');</script>";
 	echo "<script>location='index.php?halaman=artikel';</script>";
 }
 
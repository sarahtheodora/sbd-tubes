<div class="container" style="margin-top:20px">
	<center><font size="6">EDIT DATA LUKISAN</font></center>
	<hr>

<?php 
include "../includes/koneksi.php";

  $lukisan = $_GET['id'];
  $query = "SELECT * FROM lukisan WHERE id_lukisan = $lukisan";
  $hasil = mysqli_query($koneksi, $query);
  foreach($hasil as $data){ 
  	$idseniman = $data['id_seniman']; 
  	$idmedia = $data['id_media'];
  	$idmuseum = $data['id_museum'];
  }

  $query2 = "SELECT id_seniman, nama_seniman FROM seniman WHERE id_seniman = $idseniman";
  $hasil2 = mysqli_query($koneksi, $query2);

  $query3 = "SELECT id_media, nama_media FROM media WHERE id_media = $idmedia";
  $hasil3 = mysqli_query($koneksi, $query3);

  $query4 = "SELECT id_museum, nama_museum FROM museum WHERE id_museum = $idmuseum";
  $hasil4 = mysqli_query($koneksi, $query4);
?>

 <form method="post" enctype="multipart/form-data">
 	<div class="item form-group">
	    <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Lukisan</label>
 		<input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>">
 	</div>
 	<div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Seniman</label>
        <div class="col-md-6 col-sm-6">
          <select class="form-control" name="seniman" id="seniman" required>
          	 	<?php foreach($hasil2 as $data2) { ?>
                <option value="<?=$data['id_seniman']?>" hidden><?=$data2['nama_seniman']?></option>
            	<?php } 
                  include '../includes/koneksi.php';
                  $seniman = mysqli_query($koneksi, "SELECT id_seniman, nama_seniman FROM seniman");
                  while($s = mysqli_fetch_array($seniman)){
                ?>
                <option value="<?=$s['id_seniman']?>"><?=$s['nama_seniman']?></option>
                <?php } ?>
          </select>
        </div>
      </div>
 	<div class="item form-group">
	    <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Dibuat</label>
 		<input type="text" name="tanggal_dibuat" class="form-control" value="<?php echo $data['tanggal_dibuat']; ?>">
 	</div>
 	<div class="item form-group">
	    <label class="col-form-label col-md-3 col-sm-3 label-align">Tautan Eksternal</label>
 		<input type="text" name="tautan_eksternal" class="form-control" value="<?php echo $data['tautan_eksternal']; ?>">
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
	    <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Lukisan</label>
 		<textarea name="deskripsi"class="form-control" rows="10"><?php echo $data['deskripsi'];?></textarea>
 	</div>
    <div class="item form-group">
    	<div class="col-md-6 col-sm-6 offset-md-3">
 		<img src="../<?php echo $data['gambar'] ?>" width="100">
 	</div></div>
 	<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Ganti Gambar</label>
			<div class="col-md-7 col-sm-7">
 		<input type="file" name="foto" class="form-control">
 	</div>
 </div>
<div class="item form-group">
		 <div class="col-md-6 col-sm-6 offset-md-3">
		 <input hidden type="number" name="id_lukisan" value="<?=$data['id_lukisan']?>">
		 <input type="submit" name="ubah" class="btn btn-primary" value="Simpan">
		<a href="index.php?halaman=lukisan" class="btn btn-warning">Kembali</a>
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

 		$koneksi->query("UPDATE lukisan SET judul='$_POST[judul]', id_seniman='$_POST[seniman]', tanggal_dibuat='$_POST[tanggal_dibuat]', tautan_eksternal='$_POST[tautan_eksternal]', id_media='$_POST[media]', id_museum='$_POST[museum]', gambar='img/lukisan/$namafoto', deskripsi='$_POST[deskripsi]' WHERE id_lukisan='$_POST[id_lukisan]'");
 	}
 	else
 	{
 		$koneksi->query("UPDATE lukisan SET judul='$_POST[judul]', id_seniman='$_POST[seniman]', tanggal_dibuat='$_POST[tanggal_dibuat]', tautan_eksternal='$_POST[tautan_eksternal]', id_media='$_POST[media]', id_museum='$_POST[museum]', deskripsi='$_POST[deskripsi]' WHERE id_lukisan='$_POST[id_lukisan]'");
 	}
 	echo "<script>alert('Data Lukisan telah Diubah');</script>";
 	echo "<script>location='index.php?halaman=lukisan';</script>";
 }
 
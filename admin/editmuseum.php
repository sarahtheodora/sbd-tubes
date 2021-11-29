<center><h3><i class="fas fa-newspaper mr-2"></i>EDIT MUSEUM</h3></center><hr>
<?php 
include "../includes/koneksi.php";

  $ambil = $koneksi->query("SELECT * FROM museum WHERE id_museum='$_GET[id]'");
  $pecah = $ambil->fetch_assoc();
?>
    <table class="table table-bordered">
  <form method="post" enctype="multipart/form-data">
    <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Museum</label>
      <div class="col-md-6 col-sm-6">
      <input type="text" name="nama_museum" class="form-control" value="<?=$pecah['nama_museum']?>" required>
    </div>
  </div>
  <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Museum</label>
      <div class="col-md-6 col-sm-6">
      <textarea class="form-control" name="isi" rows="10"><?=$pecah['deskripsi_museum']?></textarea>
     </div>
   </div>
   <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Negara</label>
      <div class="col-md-6 col-sm-6">
      <input type="text" name="negara" class="form-control" value="<?=$pecah['negara']?>" required>
    </div>
  </div>
  <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Kota</label>
      <div class="col-md-6 col-sm-6">
      <input type="text" name="kota" class="form-control" value="<?=$pecah['kota']?>" required>
    </div>
  </div>
  <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
      <div class="col-md-6 col-sm-6">
      <textarea class="form-control" name="alamat" rows="10"><?=$pecah['alamat']?></textarea>
     </div>
   </div>
      <div class="item form-group">
      <div class="col-md-6 col-sm-6 offset-md-3">
    <img src="../<?php echo $pecah['logo'] ?>" width="100">
  </div></div>
  <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Ganti Logo</label>
      <div class="col-md-7 col-sm-7">
    <input type="file" name="foto" class="form-control">
  </div>
 </div>
    <div class="item form-group">
      <div  class="col-md-6 col-sm-6 offset-md-3">
      <input type="submit" name="ubah" class="btn btn-primary" value="Simpan">
  </div>
</form>

 <?php
 if (isset($_POST['ubah']))
 {
  $namafoto=$_FILES['foto']['name'];
  $lokasifoto = $_FILES['foto']['tmp_name'];
  // jk foto diubah
  if (!empty($lokasifoto))
  {
    move_uploaded_file($lokasifoto,"../img/logo/$namafoto");

    $koneksi->query("UPDATE museum SET nama_museum='$_POST[nama_museum]', deskripsi_museum='$_POST[isi]', logo='img/logo/$namafoto', negara='$_POST[negara]', kota='$_POST[kota]', alamat='$_POST[alamat]' WHERE id_museum='$_GET[id]'");
  }
  else
  {
    $koneksi->query("UPDATE museum SET nama_museum='$_POST[nama_museum]', deskripsi_museum='$_POST[isi]', negara='$_POST[negara]', kota='$_POST[kota]', alamat='$_POST[alamat]' WHERE id_museum='$_GET[id]'");
  }

      echo "<script>alert('Data Museum Telah Disimpan');</script>";
      echo "<script>location='index.php?halaman=museum';</script>";

     }
 <center><h3><i class="fas fa-newspaper mr-2"></i>TAMBAH LUKISAN</h3></center><hr>
    <table class="table table-bordered">
  <form method="post" enctype="multipart/form-data">
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Lukisan</label>
        <div class="col-md-6 col-sm-6">
          <input type="text" name="judul" class="form-control" required>
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Seniman</label>
        <div class="col-md-6 col-sm-6">
          <select class="form-control" name="seniman" id="seniman" required>
                <option selected disabled value="">-- Pilih Seniman --</option>
                <?php
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
        <div class="col-md-6 col-sm-6">
          <input type="text" name="tanggal_dibuat" class="form-control" required>
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Tautan Eksternal</label>
        <div class="col-md-6 col-sm-6">
          <input type="text" name="tautan_eksternal" class="form-control">
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Media</label>
        <div class="col-md-6 col-sm-6">
          <select class="form-control" name="media" id="media" required>
                <option selected disabled value="">-- Pilih Media --</option>
                <?php
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
                <option selected disabled value="">-- Pilih Museum --</option>
                <?php
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
        <label class="col-form-label col-md-3 col-sm-3 label-align">Gambar</label>
        <div class="col-md-6 col-sm-6">
          <input type="file" name="foto" class="form-upload" required>
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi</label>
        <div class="col-md-6 col-sm-6">
          <textarea class="form-control" name="isi" rows="10"></textarea>
        </div>
      </div>
      <div class="item form-group">
        <div  class="col-md-6 col-sm-6 offset-md-3">
          <input type="submit" name="save" class="btn btn-primary" value="Simpan">
      </div>

</form>
<?php
 if (isset($_POST['save']))
 {
  $namafoto=$_FILES['foto']['name'];
  $lokasifoto = $_FILES['foto']['tmp_name'];
  move_uploaded_file($lokasifoto,"../img/lukisan/$namafoto");

   $koneksi->query("INSERT INTO lukisan (judul,id_seniman,tanggal_dibuat,tautan_eksternal,id_media,id_museum,gambar,deskripsi) VALUES ('$_POST[judul]','$_POST[seniman]','$_POST[tanggal_dibuat]','$_POST[tautan_eksternal]','$_POST[media]','$_POST[museum]','img/lukisan/$namafoto','$_POST[isi]')");

  echo "<script>alert('Data Lukisan Telah Disimpan');</script>";
  echo "<script>location='index.php?halaman=lukisan';</script>";
 }
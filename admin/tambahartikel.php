
  <center><h3><i class="fas fa-newspaper mr-2"></i>TAMBAH ARTIKEL</h3></center>
  <hr>
  <table class="table table-bordered">
  <form method="post" enctype="multipart/form-data">
    <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Artikel</label>
      <div class="col-md-6 col-sm-6">
      <input type="text" name="judul" class="form-control" required>
    </div>
  </div>
     <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Isi Artikel</label>
      <div class="col-md-6 col-sm-6">
      <textarea class="form-control" name="isi" rows="10"></textarea>
     </div>
   </div>
     <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Gambar</label>
      <div class="col-md-6 col-sm-6">
      <input type="file" name="foto" class="form-upload" required>
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
      <div  class="col-md-6 col-sm-6 offset-md-3">
      <input type="submit" name="save" class="btn btn-primary" value="Simpan">
  </div>
</form>

 <?php
 $id_museum = 1;
 $id_media = 1 ;
 if (isset($_POST['save']))
 {
  $namafoto=$_FILES['foto']['name'];
  $lokasifoto = $_FILES['foto']['tmp_name'];
  move_uploaded_file($lokasifoto,"../img/artikel/$namafoto");
   $koneksi->query("INSERT INTO artikel (judul_artikel,isi_artikel,gambar_artikel,id_media,id_museum) VALUES ('$_POST[judul]','$_POST[isi]','img/artikel/$namafoto','$_POST[media]','$_POST[museum]')");

  echo "<script>alert('Data Artikel Telah Disimpan');</script>";
  echo "<script>location='index.php?halaman=artikel';</script>";
 }


<center><h3><i class="fas fa-newspaper mr-2"></i>TAMBAH MEDIA</h3></center><hr>
    <table class="table table-bordered">
  <form method="post" enctype="multipart/form-data">
    <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Media</label>
      <div class="col-md-6 col-sm-6">
      <input type="text" name="judul" class="form-control" required>
    </div>
  </div>
  <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Media</label>
      <div class="col-md-6 col-sm-6">
      <textarea class="form-control" name="isi" rows="10"></textarea>
     </div>
   </div>
    <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Cover Media</label>
      <div class="col-md-6 col-sm-6">
      <input type="file" name="foto" class="form-upload" required>
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
      
       $koneksi->query("INSERT INTO media (nama_media,deskripsi_media,cover_media) VALUES ('$_POST[judul]','$_POST[isi]','img/lukisan/$namafoto')");

      echo "<script>alert('Data Media Telah Disimpan');</script>";
      echo "<script>location='index.php?halaman=media';</script>";
     }
<center><h3><i class="fas fa-newspaper mr-2"></i>TAMBAH MUSEUM</h3></center><hr>
    <table class="table table-bordered">
  <form method="post" enctype="multipart/form-data">
    <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Museum</label>
      <div class="col-md-6 col-sm-6">
      <input type="text" name="nama_museum" class="form-control" required>
    </div>
  </div>
  <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Museum</label>
      <div class="col-md-6 col-sm-6">
      <textarea class="form-control" name="isi" rows="10"></textarea>
     </div>
   </div>
   <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Negara</label>
      <div class="col-md-6 col-sm-6">
      <input type="text" name="negara" class="form-control" required>
    </div>
  </div>
  <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Kota</label>
      <div class="col-md-6 col-sm-6">
      <input type="text" name="kota" class="form-control" required>
    </div>
  </div>
  <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
      <div class="col-md-6 col-sm-6">
      <textarea class="form-control" name="alamat" rows="10"></textarea>
     </div>
   </div>
    <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Logo</label>
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
      move_uploaded_file($lokasifoto,"../img/logo/$namafoto");
      
       $koneksi->query("INSERT INTO museum (nama_museum,deskripsi_museum,logo,negara,kota,alamat) VALUES ('$_POST[nama_museum]','$_POST[isi]','img/logo/$namafoto','$_POST[negara]','$_POST[kota]','$_POST[alamat]')");

      echo "<script>alert('Data Museum Telah Disimpan');</script>";
      echo "<script>location='index.php?halaman=museum';</script>";
     }
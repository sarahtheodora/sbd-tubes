<center><h3><i class="fas fa-newspaper mr-2"></i>TAMBAH SENIMAN</h3></center><hr>
    <table class="table table-bordered">
  <form method="post" enctype="multipart/form-data">
    <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Seniman</label>
      <div class="col-md-6 col-sm-6">
      <input type="text" name="nama_seniman" class="form-control" required>
    </div>
  </div>
  <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Seniman</label>
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
   $koneksi->query("INSERT INTO seniman (nama_seniman,deskripsi_seniman) VALUES ('$_POST[nama_seniman]','$_POST[isi]')");

 if ($koneksi){ echo "<script>alert('Data Seniman Telah Disimpan');</script>";
               echo "<script>location='index.php?halaman=seniman';</script>";
 }else {
   echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
      }
 }

<div class="container" style="margin-top:20px">
  <center><font size="6">DAFTAR SENIMAN</font></center>
    <hr>
    <a href="index.php?halaman=tambahseniman" class="btn btn-primary mb-3"><i class="fa fa-plus mr-2"></i>Tambah Seniman</a>
    <table class="table table-bordered">
        <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Seniman</th>
              <th scope="col">Deskripsi Seniman</th>
               <th colspan="2" scope="col" >Aksi</th>
            </tr>
          </thead>
          <tbody>
           <?php $nomor=1; ?>
           <?php $ambil=$koneksi->query("SELECT * FROM seniman ORDER BY id_seniman DESC");?>
           <?php while ($pecah = $ambil->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $nomor; ?></td>
              <td><?php echo $pecah['nama_seniman']; ?></td>
              <td><?php echo $pecah['deskripsi_seniman']; ?></td>
        
              <td><a href="index.php?halaman=editseniman&id=<?php echo $pecah['id_seniman']; ?>"class="btn btn-secondary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></td>
                
              <td><a href="index.php?halaman=hapusseniman&id=<?php echo $pecah['id_seniman']; ?>"class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fa fa-trash-o" aria-hidden="true"></td>
             </tr>
           <?php $nomor++; ?>
           <?php } ?>
          </tbody>
        </table>
      </div>  
    </div>
  </div>
</body>
</html>
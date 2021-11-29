 <div class="container" style="margin-top:20px">
    <center><font size="6">DAFTAR MEDIA</font></center>
    <hr>
 <a href="index.php?halaman=tambahmedia"class="btn btn-primary mb-3"><i class="fa fa-plus mr-2"></i>Tambah Media</a>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Media</th>
              <th scope="col">Deskripsi Media</th>
               <th scope="col">Cover Media</th>
               <th colspan="2" scope="col" >Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $nomor=1; ?>
           <?php $ambil=$koneksi->query("SELECT * FROM media ORDER BY id_media DESC");?>
           <?php while ($pecah = $ambil->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $nomor; ?></td>
              <td><?php echo $pecah['nama_media']; ?></td>
              <td><?php echo $pecah['deskripsi_media']; ?></td>
              <td>
            <img src="../<?php echo $pecah['cover_media']; ?>" width="100">
              </td> 
              <td><a href="index.php?halaman=editmedia&id=<?php echo $pecah['id_media']; ?>" class="btn btn-secondary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></td>
              <td><a href="index.php?halaman=hapusmedia&id=<?php echo $pecah['id_media']; ?>"class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fa fa-trash-o" aria-hidden="true"></i></td>
            </tr>
           <?php $nomor++; ?>
           <?php } ?>
          </tbody>
        </table>
      </div>  
    </div>
  </body>
</html>
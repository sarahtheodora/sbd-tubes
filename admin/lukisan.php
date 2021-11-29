<div class="container" style="margin-top:20px">
    <center><font size="6">DAFTAR LUKISAN</font></center>
    <hr>
        <a href="index.php?halaman=tambahlukisan"class="btn btn-primary mb-3"><i class="fa fa-plus mr-2"></i>Tambah Lukisan</a>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Judul Lukisan</th>
              <th scope="col">Tanggal Dibuat</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Tautan Eskternal</th>
              <th scope="col">Gambar Lukisan</th>
              <th colspan="2" scope="col" >Aksi</th>
            </tr>
          </thead>
          <tbody>
           <?php $nomor=1; ?>
           <?php $ambil=$koneksi->query("SELECT * FROM lukisan ORDER BY id_lukisan DESC");?>
           <?php while ($pecah = $ambil->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $nomor; ?></td>
              <td><?php echo $pecah['judul']; ?></td>
              <td><?php echo $pecah['tanggal_dibuat']; ?></td>
              <td width="200px"><?php echo $pecah['deskripsi']; ?></td>
              <td><?php echo $pecah['tautan_eksternal']; ?></td>
             <td>
                <img src="../<?=$pecah['gambar']?>" width="70">
              </td> 
              <td><a href="index.php?halaman=editlukisan&id=<?php echo $pecah['id_lukisan']; ?>"class="btn btn-secondary btn-sm">
                <i class="fa fa-pencil" aria-hidden="true"></i>
              </td>
              <td><a href="index.php?halaman=hapuslukisan&id=<?php echo $pecah['id_lukisan']; ?>"class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fa fa-trash-o" aria-hidden="true"></td>
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

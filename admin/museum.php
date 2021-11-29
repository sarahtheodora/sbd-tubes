 <div class="container" style="margin-top:20px">
    <center><font size="6">DAFTAR MUSEUM</font></center>
    <hr>
 <a href="index.php?halaman=tambahmuseum"class="btn btn-primary mb-3"><i class="fa fa-plus mr-2"></i>Tambah Museum</a>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Museum</th>
              <th scope="col">Deskripsi Museum</th>
              <th scope="col">Negara</th>
              <th scope="col">Kota</th>
              <th scope="col">Alamat</th>
               <th scope="col">Logo</th>
               <th colspan="2" scope="col" >Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $nomor=1; ?>
           <?php $ambil=$koneksi->query("SELECT * FROM museum ORDER BY id_museum DESC");?>
           <?php while ($pecah = $ambil->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $nomor; ?></td>
              <td><?php echo $pecah['nama_museum']; ?></td>
              <td><?php echo $pecah['deskripsi_museum']; ?></td>
              <td><?php echo $pecah['negara']; ?></td>
              <td><?php echo $pecah['kota']; ?></td>
              <td><?php echo $pecah['alamat']; ?></td>
              <td>
            <img src="../<?php echo $pecah['logo']; ?>" width="100">
              </td> 
              <td><a href="index.php?halaman=editmuseum&id=<?php echo $pecah['id_museum']; ?>" class="btn btn-secondary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></td>
              <td><a href="index.php?halaman=hapusmuseum&id=<?php echo $pecah['id_museum']; ?>"class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fa fa-trash-o" aria-hidden="true"></i></td>
            </tr>
           <?php $nomor++; ?>
           <?php } ?>
          </tbody>
        </table>
      </div>  
    </div>
  </body>
</html>
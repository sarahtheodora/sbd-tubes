<div class="container" style="margin-top:20px">
    <center><font size="6">DAFTAR ARTIKEL</font></center>
    <hr>
<a href="index.php?halaman=tambahartikel" class="btn btn-primary mb-3"><i class="fa fa-plus mr-2"></i>Tambah Artikel</a>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Judul Artikel</th>
              <th scope="col">Isi Artikel</th>
               <th scope="col">Gambar Artikel</th>
               <th colspan="3" scope="col" >Aksi</th>
            </tr>
          </thead>
          <tbody>
           <?php $nomor=1; ?>
           <?php $ambil=$koneksi->query("SELECT * FROM artikel ORDER BY id_artikel DESC");?>
           <?php while ($pecah = $ambil->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $nomor; ?></td>
              <td><?php echo $pecah['judul_artikel']; ?></td>
              <td><?php echo $pecah['isi_artikel']; ?></td>
             <td>
            <img src="../<?php echo $pecah['gambar_artikel']; ?>" width="100">
       </td> 
              <td><a href="index.php?halaman=editartikel&id=<?php echo $pecah['id_artikel']; ?>"class="btn btn-secondary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></td>
                
              <td><a href="index.php?halaman=hapusartikel&id=<?php echo $pecah['id_artikel']; ?>"class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fa fa-trash-o" aria-hidden="true"></td>
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

<?php
  include "includes/koneksi.php";
  
  if(empty($_GET['id_lukisan'])){
    header("Location:index.php");
  }

  include "includes/header.php";

  $lukisan = $_GET['id_lukisan'];

  $query = "SELECT * FROM lukisan l, seniman s, media m, museum u WHERE l.id_seniman = s.id_seniman AND l.id_media = m.id_media AND l.id_museum = u.id_museum AND l.id_lukisan = $lukisan";
  $hasil = mysqli_query($koneksi, $query);

?>
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Arts		
							</h1>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<?php foreach($hasil as $data){ ?>

			<!-- Start about info Area -->
			<section class="info-area" id="about">
				<div class="container">					
					<div class="single-info row mt-40">
						<div class="col-lg-6 col-md-12 text-center no-padding info-left">
							<!-- <div class="info-thumb"> -->
								<img src="<?=$data['gambar']?>" class="img-fluid zoom" alt="">
							<!-- </div> -->
						</div>
						<div class="col-lg-6 col-md-12 no-padding info-rigth">
							<div class="info-content">
								<p style="font-size: 28px; font-weight: 600;"><?=$data['judul']?></p>
								<p style="font-size: 14px; font-weight: 500; color: #CD853F;"><?=$data['nama_seniman']?>&emsp;||&emsp;<?=$data['tanggal_dibuat']?></p>
								<form action="addtofavorit.php" method="post">
									<input hidden type="number" name="id_lukisan" value="<?=$data['id_lukisan']?>">
									<?php
										if(!empty($_SESSION['nama_user'])){
									    
										$user = $_SESSION['id_user'];

										$hasil2 = mysqli_query($koneksi," SELECT * FROM favorit WHERE id_user = $user AND id_lukisan = $lukisan");

										if($hasil2->num_rows == 0){
						          	?>
											<button type="submit" name="submit-fav" class="btn btn-default mb-15" style="border-radius: 50%;" title="Click to Add Favorite">
												<i class="fa fa-heart-o" aria-hidden="true"></i>
											</button>

									<?php } else { ?>

											<button type="submit" name="submit-unfav" class="btn btn-default mb-15" style="border-radius: 50%;" title="Click to Remove Favorite">
												<i class="fa fa-heart" aria-hidden="true" ></i>
											</button>

									<?php } } ?>
								</form>
								<p style="text-align: justify;"><?=$data['deskripsi']?></p>
								<br>
								<p style="font-weight: 500;">Detail :</p>
									<table>
										<tr><td><b>Judul</b></td><td>: <?=$data['judul']?></td></tr>
										<tr><td><b>Seniman</b></td><td>: <?=$data['nama_seniman']?></td></tr>
										<tr><td><b>Tanggal dibuat</b></td><td>: <?=$data['tanggal_dibuat']?></td></tr>
										<tr><td><b>Tautan eksternal&nbsp;</b></td><td>: <a href="<?=$data['tautan_eksternal']?>"><?=$data['tautan_eksternal']?></a></td></tr>
										<tr><td><b>Media</b></td><td>: <a href="media-info.php?id_media=<?=$data['id_media']?>"><?=$data['nama_media']?></a></td></tr>
										<tr><td><b>Museum</b></td><td>: <a href="museum-info.php?id_museum=<?=$data['id_museum']?>"><?=$data['nama_museum']?></a></td></tr>
									</table>
								</div>
						</div>
					</div>
					<?php
						}
					?>
				</div>
			</section>

			<!-- End about info Area -->
			<br><br>

	<?php include "includes/footer.php"; ?>
	
	</body>
</html>
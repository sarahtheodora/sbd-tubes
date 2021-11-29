<?php
  include "includes/koneksi.php";
  
  if(empty($_GET['id_museum'])){
    header("Location:index.php");
  }

  include "includes/header.php";

  $museum = $_GET['id_museum'];

  $query = "SELECT * FROM museum WHERE id_museum = $museum";
  $hasil = mysqli_query($koneksi, $query);

?>
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
			<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12"></div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<?php foreach($hasil as $data){ ?>

			<!-- Start gallery Area -->
			<br><br>
			<section class="gallery-area gallery-page-area" id="gallery">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<img src="<?=$data['logo']?>" style="height: 100px"><br><br>
								<p style="font-size: 16px; font-weight: 600;"><?=$data['nama_museum']?></p>
								<p style="font-size: 12px; color: #CD853F;"><?=$data['kota']?>, <?=$data['negara']?></p>
								<p><?=$data['deskripsi_museum']?></p>
							</div>
						</div>
					</div>
					<?php 
						echo "<input hidden type='number' name='id_museum' value='".$data['id_museum']."'>";
						}
					?>

					<?php
						$query = mysqli_query($koneksi," SELECT * FROM media m, artikel a, museum u WHERE a.id_media = m.id_media AND a.id_museum = u.id_museum AND a.id_museum = $museum");
						$jlh_data = mysqli_num_rows($query);
					?>
					<div class='row mb-5'>
						<h3><?=$jlh_data?> stories</h3>
					</div>

					<div class='row mb-5'>

					<?php
		                while($data1 = mysqli_fetch_array($query)){
		          	?>

						<div style="float: left; width: 20%; padding: 5px;">
						<a href="artikel.php?id_artikel=<?php echo $data1['id_artikel'] ?>">
							<div class="card">
								<img class="card-img-top" src="<?=$data1['gambar_artikel']?>" style="height: 200px; object-fit: cover;">
								<div class="card-body">
                  					<p class='text-primary font-weight-bold'>STORY</p>
									<h5 class="card-title"><?=$data1['judul_artikel']?></h5>
								    <p class="card-text" style="color: grey;"><?=$data1['nama_museum']?></p>
								</div>
							</div>
						</a>
						</div>

						<?php } ?>
					</div>

					<?php 
						$query2 = mysqli_query($koneksi," SELECT * FROM museum u, lukisan l WHERE l.id_museum = u.id_museum AND l.id_museum= $museum");
						$jlh_data2 = mysqli_num_rows($query2);
					?>
					<div class="row mb-3 mt-5">
						<h3><?=$jlh_data2?> items</h3>
					</div>


				<div class="row mb-5">
					<div id="grid-container" class="row">

						<?php

			                while($data2 = mysqli_fetch_array($query2)){
		          		?>

						<a href="lukisan.php?id_lukisan=<?php echo $data2['id_lukisan'] ?>"><img class="grid-item" src="<?php echo $data2['gambar'] ?>"></a>

						<?php } ?>

					</div>
				</div>

				<br><br>

					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-3">
							<div class="title text-center">
								<p style="font-size: 16px; font-weight: 600;"><?=$data['nama_museum']?></p>
								<p style="text-align: left;"><?=$data['alamat']?></p>
							</div>
						</div>
					</div>


				</div>	
			</section>
			<!-- End gallery Area -->			

		<?php include "includes/footer.php"; ?>

		</body>
	</html>




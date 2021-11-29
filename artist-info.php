<?php
  include "includes/koneksi.php";
  
  if(empty($_GET['id_seniman'])){
    header("Location:index.php");
  }

  include "includes/header.php";

  $seniman = $_GET['id_seniman'];

  $query = "SELECT * FROM seniman WHERE id_seniman = $seniman";
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
								<h3><?=$data['nama_seniman']?></h3>
								<!-- <p style="font-size: 12px; color: #CD853F;"></p> -->
								<br>
								<p><?=$data['deskripsi_seniman']?></p>
							</div>
						</div>
					</div>
					<?php 
						echo "<input hidden type='number' name='id_seniman' value='".$data['id_seniman']."'>";
						}
					?>

					<?php 
						$query2 = mysqli_query($koneksi," SELECT * FROM seniman s, lukisan l WHERE l.id_seniman = s.id_seniman AND l.id_seniman = $seniman");
						$jlh_data2 = mysqli_num_rows($query2);
					?>
					<div class="row mb-3">
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


				<!-- MORE ARTISTs -->

					<div class='row mb-5'>
						<h3>More artists</h3>
					</div>

					<div class='row mb-5'>

						<?php
							$query3 = mysqli_query($koneksi," SELECT * FROM seniman WHERE id_seniman NOT IN (1, $seniman) LIMIT 5 ");
			                $jlh_data3 = mysqli_num_rows($query3);

			                while($data3 = mysqli_fetch_array($query3)){
			                	$id_seniman = $data3['id_seniman'];
				                $query4 = mysqli_query($koneksi," SELECT * FROM seniman s, lukisan l WHERE l.id_seniman = s.id_seniman AND l.id_seniman = $id_seniman");
								$jlh_data4 = mysqli_num_rows($query4);
								$q4 = mysqli_query($koneksi," SELECT * FROM seniman s, lukisan l WHERE l.id_seniman = s.id_seniman AND l.id_seniman = $id_seniman LIMIT 1");

								foreach ($q4 as $d) {
		          		?>

						<div style="float: left; width: 20%; padding: 5px;">
						<div class="card">
						<a href="artist-info.php?id_seniman=<?php echo $data3['id_seniman'] ?>">
						  <img class="card-img" src="<?=$d['gambar']?>" style="height: 200px; object-fit: cover;">
						  <div style="font-weight: 600; position: absolute; bottom: 32px; left: 16px; color: white;"><?php echo $data3['nama_seniman'] ?></div>
						  <div style="font-weight: 600; font-size: 12px; position: absolute; bottom: 8px; left: 16px; color: white;"><?=$jlh_data4?> items</div>
						</a>
						</div>
						</div>

						<?php } } ?>

		          	</div>


		          	<!-- MORE MEDIUMS -->

					<div class='row mb-5'>
						<h3>More mediums</h3>
					</div>


					<div class='row mb-5'>

						<?php
							$query5 = mysqli_query($koneksi," SELECT * FROM media LIMIT 5 ");
			                $jlh_data5 = mysqli_num_rows($query5);

			                while($data5 = mysqli_fetch_array($query5)){
			                	$id_media = $data5['id_media'];
				                $query6 = mysqli_query($koneksi," SELECT * FROM media m, lukisan l WHERE l.id_media = m.id_media AND l.id_media = $id_media");
								$jlh_data6 = mysqli_num_rows($query6);
		          		?>

						<div style="float: left; width: 20%; padding: 5px;">
						<div class="card">
						<a href="media-info.php?id_media=<?php echo $data5['id_media'] ?>">
						  <img class="card-img" src="<?=$data5['cover_media']?>" style="height: 200px; object-fit: cover;">
						  <div style="font-weight: 600; position: absolute; bottom: 32px; left: 16px; color: white;"><?php echo $data5['nama_media'] ?></div>
						  <div style="font-weight: 600; font-size: 12px; position: absolute; bottom: 8px; left: 16px; color: white;"><?=$jlh_data6?> items</div>
						</a>
						</div>
						</div>

						<?php } ?>

		          	</div>



				</div>	
			</section>
			<!-- End gallery Area -->			

		<?php include "includes/footer.php"; ?>

		</body>
	</html>




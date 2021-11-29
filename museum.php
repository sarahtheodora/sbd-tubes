<?php 
	include "includes/koneksi.php";
	include "includes/header.php"; 
?>
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">Museums</h1>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start upcoming-exibition Area -->
			<br><br>
			<section class="upcoming-exibition-area">
				<div class="container">				
					<div class="row">

						<?php
							$query = mysqli_query($koneksi," SELECT * FROM museum ");

			                while($data = mysqli_fetch_array($query)){
		          		?>

						<div class="col-lg-4 col-md-6 single-exhibition">
							<div class="thumb">
								<img class="img-fluid" src="<?=$data['logo']?>" style="height: 100px; object-fit: cover;">						
							</div>
							<p class="date" style="color: #CD853F; font-size: 12px;"><?=$data['kota']?>, <?=$data['negara']?></p>
							<h4><?=$data['nama_museum']?></h4>
							<p style="text-align: justify;">
							<?php
								$num_char = 150;
								$text = $data['deskripsi_museum'];
								echo substr($text, 0, $num_char) . '...';
							?>
							</p>
							<div class="meta-bottom d-flex justify-content-start">
								<a href="museum-info.php?id_museum=<?=$data['id_museum']?>" class="genric-btn info">See Details</a>
							</div>
							<br>									
						</div>

						<?php } ?>

					</div>
				</div>	
			</section>
			<br><br>
			<!-- End upcoming-exibition Area -->
			
		<?php include "includes/footer.php"; ?>
		</body>
	</html>
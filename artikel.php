<?php
  include "includes/koneksi.php";
  
  if(empty($_GET['id_artikel'])){
    header("Location:index.php");
  }

  include "includes/header.php";

  $artikel = $_GET['id_artikel'];

  $query = "SELECT * FROM artikel a, museum u, media m WHERE a.id_artikel = $artikel AND a.id_museum = u.id_museum AND a.id_media = m.id_media ";
  $hasil = mysqli_query($koneksi, $query);  

?>

<?php include "includes/header.php"; ?>

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Artikel				
							</h1>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<?php foreach($hasil as $data){ ?>	

			<!-- Start cat-top Area -->
			<br><br>
			<section class="cat-top-area">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 cat-top-left">
							<h1>
								<?php echo $data['judul_artikel'] ?>
							</h1>
							<p style="text-align: justify;" class="mr-50">
								<a href="<?=$data['isi_artikel']?>"><?php echo $data['isi_artikel'] ?></a>
							</p>

							<p style="text-align: justify;" class="mr-50">
								<b>Museum</b> : <?php echo $data['nama_museum'] ?><br>
								<b>Media</b> : <a href="media-info.php?id_media=<?php echo $data['id_media'] ?>">
									<?php echo $data['nama_media'] ?></a>
							</p>

						</div>
						<div class="col-lg-6 cat-top-right">
							<img class="img-fluid" src="<?=$data['gambar_artikel']?>" alt="">
						</div>
					</div>
					<?php 
						echo "<input hidden type='number' name='id_artikel' value='".$data['id_artikel']."'>";
						}
					?>
				</div>	
			</section>
			<br><br>
			<!-- End cat-top Area -->
			
		<?php include "includes/footer.php"; ?>
		</body>
	</html>
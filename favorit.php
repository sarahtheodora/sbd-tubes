<?php 
    include "includes/koneksi.php";
    if(empty($_SESSION['nama_user'])){
      header("Location:login.php");
    }

    include "includes/header.php";
?>
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Favorite		
							</h1>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	


			<!-- Start gallery Area -->
			<br>
			<section class="gallery-area gallery-page-area" id="gallery">
			  <div class="container">
					<!-- <div class="row d-flex justify-content-center">
						<div class="menu-content pb-20 col-lg-8">
							<div class="title text-center">
							</div>
						</div>
					</div> -->
					
						<div class='row mb-5'>
							<?php
								$user = $_SESSION['id_user'];
								$hasil = mysqli_query($koneksi," SELECT * FROM favorit f, lukisan l WHERE f.id_user = $user AND f.id_lukisan = l.id_lukisan");
								if(!empty($hasil)){
									foreach($hasil as $data){
				          	?>
		                  	<div style="float: left; width: 20%; padding: 5px;">
								<div class="card">
									<div style="font-weight: 600; font-size: 12px; position: absolute; top: 8px; right: 8px; color: white;">
										<a href="favorit-hapus.php?id_favorit=<?=$data['id_favorit']?>" class="btn btn-danger btn-sm" style="border-radius: 50%;" title="Remove from Favorite">
											<i class="fa fa-times" aria-hidden="true"></i>
										</a>
									</div>
									<a href="lukisan.php?id_lukisan=<?=$data['id_lukisan']?>" name="submit"> 	
										<img class="card-img" src="<?=$data['gambar']?>" style="height: 200px; object-fit: cover;">
									</a>
								</div>
							</div>
		          			<?php } } ?>
		          		</div>

			  </div>	
			</section>
			<!-- End gallery Area -->			

		<?php include "includes/footer.php"; ?>
	</body>
</html>
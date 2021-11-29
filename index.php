<?php 
	include "includes/koneksi.php";
	include "includes/header.php"; 
?>
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-8">
							<h6 class="text-white">Welcome to</h6>
							<h1 class="text-white">Happy Arts & Culture</h1>
							<p class="pt-20 pb-20 text-white">Enjoy your journey !</p>
							<a href="media.php" class="primary-btn text-uppercase">Explore the Mediums</a>
						</div>											
					</div>
				</div>					
			</section>
			<!-- End banner Area -->	

			
			<!-- Start quote Area -->
			<section class="quote-area section-gap">
			<div class="container">
				<blockquote class="blockquote">
				  <p class="mb-0" style="text-align: center; font-size: 32px; font-weight: 300;"><b>Culture</b> is the <b>arts</b> elevated to a set of <b>beliefs</b>.</p>
				  <br>
				  <footer class="blockquote-footer" style="text-align: center;"><i>Thomas Wolfe</i></footer>
				</blockquote>
			</div>
			</section>
			<!-- End quote Area -->	
			
			<!-- Start gallery Area -->
			<section class="gallery-area section-gap" id="gallery">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content col-lg-8">
							<div class="title text-center">
								<h1 class="text-white">Explore the Gallery !</h1>
							</div>
						</div>
						<div class="container">
					            <div class='d-flex p-2 bd-highlight my-3'>
					            	<a href='media.php' class="ml-auto genric-btn info">View All</a></div>
					        	</div>
						</div>						
					<div id="grid-container" class="row">

					<?php
						$query = mysqli_query($koneksi," SELECT id_lukisan, gambar FROM lukisan ");

		                while($data = mysqli_fetch_array($query)){
		          	?>
						<a href="lukisan.php?id_lukisan=<?php echo $data['id_lukisan'] ?>"><img class="grid-item" src="<?=$data['gambar']?>"></a>
						<!-- <a class="single-gallery" href="media-info.php?id_media=<?php echo $data['id_lukisan'] ?>"><img class="grid-item" src="<?=$data['gambar']?>"></a> -->
						
					<?php } ?>							
					</div>	
				</div>	
			</section>
			<!-- End gallery Area -->	

	<?php include "includes/footer.php"; ?>
	</body>
</html>
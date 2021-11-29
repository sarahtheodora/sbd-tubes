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
							<h1 class="text-white">
								Mediums			
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
					
				<div class="tab-container">
					<!-- Tab links -->
					<div class="tab">
					  <button class="tablinks" onclick="bukaPilihan(event, 'All')" id="defaultOpen">All</button>
					  <button class="tablinks" onclick="bukaPilihan(event, 'Ascending')">A - Z</button>
					</div>

					<!-- Tab content -->
					<div id="All" class="tabcontent">
						<div class='row mb-5'>
							<?php
								$query = mysqli_query($koneksi," SELECT * FROM media ");

				                while($data = mysqli_fetch_array($query)){
				                	$id = $data['id_media'];
				                	$query2 = mysqli_query($koneksi," SELECT * FROM media m, lukisan l WHERE l.id_media = m.id_media AND l.id_media = $id");
									$jlh_data2 = mysqli_num_rows($query2);
				          	?>
		                  	<div style="float: left; width: 20%; padding: 5px;">
								<div class="card">
								<a href="media-info.php?id_media=<?php echo $data['id_media'] ?>" name="submit"> 	
								<img class="card-img" src="<?=$data['cover_media']?>" style="height: 200px; object-fit: cover;">
								  <div style="font-weight: 600; position: absolute; bottom: 32px; left: 16px; color: white;">
								  	<?=$data['nama_media']?>
								  </div>
								  <div style="font-weight: 600; font-size: 12px; position: absolute; bottom: 8px; left: 16px; color: white;"><?=$jlh_data2?> items</div>
								</a>
								</div>
							</div>
		          			<?php } ?>
			          	</div>
					</div>

					<div id="Ascending" class="tabcontent">
						<div class='row mb-5'>
							<?php
								$query = mysqli_query($koneksi," SELECT * FROM media ORDER BY nama_media ASC ");

				                while($data = mysqli_fetch_array($query)){
				                	$id = $data['id_media'];
				                	$query2 = mysqli_query($koneksi," SELECT * FROM media m, lukisan l WHERE l.id_media = m.id_media AND l.id_media = $id");
									$jlh_data2 = mysqli_num_rows($query2);
				          	?>
		                  	<div style="float: left; width: 20%; padding: 5px;">
								<div class="card">
								<a href="media-info.php?id_media=<?php echo $data['id_media'] ?>" name="submit"> 	
								<img class="card-img" src="<?=$data['cover_media']?>" style="height: 200px; object-fit: cover;">
								  <div style="font-weight: 600; position: absolute; bottom: 32px; left: 16px; color: white;">
								  	<?=$data['nama_media']?>
								  </div>
								  <div style="font-weight: 600; font-size: 12px; position: absolute; bottom: 8px; left: 16px; color: white;"><?=$jlh_data2?> items</div>
								</a>
								</div>
							</div>
		          			<?php } ?>
			          	</div>
					</div>

				</div>


			  </div>	
			</section>
			<!-- End gallery Area -->			

		<?php include "includes/footer.php"; ?>
	</body>
</html>
<?php
  include "includes/koneksi.php";
  
  if(empty($_GET['id_media'])){
    header("Location:index.php");
  }

  include "includes/header.php";

  $media = $_GET['id_media'];

  $query = "SELECT * FROM media WHERE id_media = $media";
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
								<h1 class="mb-10"><?php echo $data['nama_media'] ?></h1>
								<br>
								<p><?php echo $data['deskripsi_media'] ?></p>
							</div>
						</div>
					</div>
					<?php 
						echo "<input hidden type='number' name='id_media' value='".$data['id_media']."'>";
						}
					?>


					<?php
						$query1 = mysqli_query($koneksi," SELECT * FROM media m, artikel a, museum u WHERE a.id_media = m.id_media AND a.id_museum = u.id_museum AND a.id_media = $media");
						$jlh_data1 = mysqli_num_rows($query1);
					?>
					<div class='row mb-5'>
						<h3><?=$jlh_data1?> stories</h3>
					</div>

					<div class='row mb-5'>

					<?php
		                while($data1 = mysqli_fetch_array($query1)){
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


					<div class="row mb-4 mt-5">
						<h3>Discover this medium</h3>
					</div>

					<?php
						$query2 = mysqli_query($koneksi," SELECT * FROM media m, lukisan l WHERE l.id_media = m.id_media AND l.id_media = $media");
						$jlh_data2 = mysqli_num_rows($query2);
					?>
					<div class="row mb-3">
						<p style="font-size: 16px;"><?=$jlh_data2?> items</p>
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


					<!-- MORE MEDIUMS -->

					<div class='row mb-5'>
						<h3>More mediums</h3>
					</div>


					<div class='row mb-5'>

						<?php
							$query3 = mysqli_query($koneksi," SELECT * FROM media WHERE id_media NOT IN ($media) LIMIT 5 ");
			                $jlh_data3 = mysqli_num_rows($query3);

			                while($data3 = mysqli_fetch_array($query3)){
			                	$id_media = $data3['id_media'];
				                $query4 = mysqli_query($koneksi," SELECT * FROM media m, lukisan l WHERE l.id_media = m.id_media AND l.id_media = $id_media");
								$jlh_data4 = mysqli_num_rows($query4);
		          		?>

						<div style="float: left; width: 20%; padding: 5px;">
						<div class="card">
						<a href="media-info.php?id_media=<?php echo $data3['id_media'] ?>">
						  <img class="card-img" src="<?=$data3['cover_media']?>" style="height: 200px; object-fit: cover;">
						  <div style="font-weight: 600; position: absolute; bottom: 32px; left: 16px; color: white;"><?php echo $data3['nama_media'] ?></div>
						  <div style="font-weight: 600; font-size: 12px; position: absolute; bottom: 8px; left: 16px; color: white;"><?=$jlh_data4?> items</div>
						</a>
						</div>
						</div>

						<?php } ?>

		          	</div>

		          	<!-- MORE ARTISTs -->

					<div class='row mb-5'>
						<h3>More artists</h3>
					</div>

					<div class='row mb-5'>

						<?php
							$query5 = mysqli_query($koneksi," SELECT * FROM seniman WHERE id_seniman NOT IN (1) LIMIT 5 ");
			                $jlh_data5 = mysqli_num_rows($query5);

			                while($data5 = mysqli_fetch_array($query5)){
			                	$id_seniman = $data5['id_seniman'];
				                $query6 = mysqli_query($koneksi," SELECT * FROM seniman s, lukisan l WHERE l.id_seniman = s.id_seniman AND l.id_seniman = $id_seniman");
								$jlh_data6 = mysqli_num_rows($query6);

								$q6 = mysqli_query($koneksi," SELECT * FROM seniman s, lukisan l WHERE l.id_seniman = s.id_seniman AND l.id_seniman = $id_seniman LIMIT 1");

								foreach ($q6 as $d) {
		          		?>

						<div style="float: left; width: 20%; padding: 5px;">
						<div class="card">
						<a href="artist-info.php?id_seniman=<?php echo $data5['id_seniman'] ?>">
						  <img class="card-img" src="<?=$d['gambar']?>" style="height: 200px; object-fit: cover;">
						  <div style="font-weight: 600; position: absolute; bottom: 32px; left: 16px; color: white;"><?php echo $data5['nama_seniman'] ?></div>
						  <div style="font-weight: 600; font-size: 12px; position: absolute; bottom: 8px; left: 16px; color: white;"><?=$jlh_data6?> items</div>
						</a>
						</div>
						</div>

						<?php } } ?>

		          	</div>


				</div>	
			</section>
			<!-- End gallery Area -->			
			

	<?php include "includes/footer.php"; ?>

			<!-- <script>
				/*
				    Carousel
				*/
				$('#carousel-example').on('slide.bs.carousel', function (e) {
				   
				    var $e = $(e.relatedTarget);
				    var idx = $e.index();
				    var itemsPerSlide = 5;
				    var totalItems = $('.carousel-item').length;
				 
				    if (idx >= totalItems-(itemsPerSlide-1)) {
				        var it = itemsPerSlide - (totalItems - idx);
				        for (var i=0; i<it; i++) {
				            // append slides to end
				            if (e.direction=="left") {
				                $('.carousel-item').eq(i).appendTo('.carousel-inner');
				            }
				            else {
				                $('.carousel-item').eq(0).appendTo('.carousel-inner');
				            }
				        }
				    }
				});
			</script> -->

			<script>
				$(document).ready(function () {
				    var itemsMainDiv = ('.MultiCarousel');
				    var itemsDiv = ('.MultiCarousel-inner');
				    var itemWidth = "";

				    $('.leftLst, .rightLst').click(function () {
				        var condition = $(this).hasClass("leftLst");
				        if (condition)
				            click(0, this);
				        else
				            click(1, this)
				    });

				    ResCarouselSize();


				    $(window).resize(function () {
				        ResCarouselSize();
				    });

				    //this function define the size of the items
				    function ResCarouselSize() {
				        var incno = 0;
				        var dataItems = ("data-items");
				        var itemClass = ('.item');
				        var id = 0;
				        var btnParentSb = '';
				        var itemsSplit = '';
				        var sampwidth = $(itemsMainDiv).width();
				        var bodyWidth = $('body').width();
				        $(itemsDiv).each(function () {
				            id = id + 1;
				            var itemNumbers = $(this).find(itemClass).length;
				            btnParentSb = $(this).parent().attr(dataItems);
				            itemsSplit = btnParentSb.split(',');
				            $(this).parent().attr("id", "MultiCarousel" + id);


				            if (bodyWidth >= 1200) {
				                incno = itemsSplit[3];
				                itemWidth = sampwidth / incno;
				            }
				            else if (bodyWidth >= 992) {
				                incno = itemsSplit[2];
				                itemWidth = sampwidth / incno;
				            }
				            else if (bodyWidth >= 768) {
				                incno = itemsSplit[1];
				                itemWidth = sampwidth / incno;
				            }
				            else {
				                incno = itemsSplit[0];
				                itemWidth = sampwidth / incno;
				            }
				            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
				            $(this).find(itemClass).each(function () {
				                $(this).outerWidth(itemWidth);
				            });

				            $(".leftLst").addClass("over");
				            $(".rightLst").removeClass("over");

				        });
				    }


				    //this function used to move the items
				    function ResCarousel(e, el, s) {
				        var leftBtn = ('.leftLst');
				        var rightBtn = ('.rightLst');
				        var translateXval = '';
				        var divStyle = $(el + ' ' + itemsDiv).css('transform');
				        var values = divStyle.match(/-?[\d\.]+/g);
				        var xds = Math.abs(values[4]);
				        if (e == 0) {
				            translateXval = parseInt(xds) - parseInt(itemWidth * s);
				            $(el + ' ' + rightBtn).removeClass("over");

				            if (translateXval <= itemWidth / 2) {
				                translateXval = 0;
				                $(el + ' ' + leftBtn).addClass("over");
				            }
				        }
				        else if (e == 1) {
				            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
				            translateXval = parseInt(xds) + parseInt(itemWidth * s);
				            $(el + ' ' + leftBtn).removeClass("over");

				            if (translateXval >= itemsCondition - itemWidth / 2) {
				                translateXval = itemsCondition;
				                $(el + ' ' + rightBtn).addClass("over");
				            }
				        }
				        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
				    }

				    //It is used to get some elements from btn
				    function click(ell, ee) {
				        var Parent = "#" + $(ee).parent().attr("id");
				        var slide = $(Parent).attr("data-slide");
				        ResCarousel(ell, Parent, slide);
				    }

				});
			</script>
		</body>
	</html>




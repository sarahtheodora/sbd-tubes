<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/logo.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Happy Arts & Culture</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
		<link rel="stylesheet" href="css/linearicons.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/nice-select.css">					
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/main.css">

        <link rel="stylesheet" href="css/carousel-1.css">
        <link rel="stylesheet" href="css/image-zoom.css">
        <link rel="stylesheet" href="css/tabs.css">
	</head>

	<body>
		<header id="header" id="home">
			<br>
			<div class="container">
			    <div class="row align-items-center justify-content-between d-flex">
				    <div id="logo"><a href="index.php"><img src="img/logo happy.png" alt="" title="Logo" /></a></div>
				    <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          	<li class="menu-active"><a href="index.php">Home</a></li>
				          	<li><a href="media.php">Mediums</a></li>
				          	<li><a href="artist.php">Artists</a></li>
				          	<li><a href="museum.php">Museums</a></li>
			                <li><a href="favorit.php">Favorite</a></li>
				          	<li>
			                    <?php
			                      if(empty($_SESSION['nama_user'])) {
			                        echo "<a href='login.php'><b>Login</b></a>";
			                      } else {
			                        echo "<a href='#'><b><i class='fa fa-user' aria-hidden='true' style='font-size:14px;'></i>&nbsp;&nbsp;&nbsp;".$_SESSION['nama_user']."</b></a>";
			                      }
			                    ?>
			                </li>
			                <li>
			                <?php
			                    if(!empty($_SESSION['nama_user'])){
			                    	echo "<a href='logout.php'><i class='fa fa-sign-out' aria-hidden='true' style='font-size:16px;'></i></a>";
			                    }
			                ?>
			            	</li>
				        </ul>
				    </nav>	    		
			    </div>
			</div>
		</header>
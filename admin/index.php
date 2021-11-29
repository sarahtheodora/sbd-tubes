<?php 
  include "../includes/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/logo.png" type="image/ico" />
    <title> Happy Arts & Culture </title>
  </head>
      <!-- Bootstrap -->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <center>
              <a href="index.php" style="color:#fff;">
                <span><font size="4.95" color="white" face="Calibri">&emsp;Happy Arts & Culture</font></span>
              </a>
            </center>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="assets/images/123.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang Admin</span>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
                  </li>
                  <li><a href="#"><i class="fa fa-picture-o"></i> Media <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?halaman=media">Tampilkan Media</a></li>
                      <li><a href="index.php?halaman=tambahmedia">Tambah Media</a></li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-user"></i> Seniman <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?halaman=seniman">Tampilkan Seniman</a></li>
                      <li><a href="index.php?halaman=tambahseniman">Tambah Seniman</a></li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-paint-brush"></i> Lukisan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?halaman=lukisan">Tampilkan Lukisan</a></li>
                      <li><a href="index.php?halaman=tambahlukisan">Tambah Lukisan</a></li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-book"></i> Artikel <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?halaman=artikel">Tampilkan Artikel</a></li>
                      <li><a href="index.php?halaman=tambahartikel">Tambah Artikel</a></li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-building"></i> Museum <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?halaman=museum">Tampilkan Museum</a></li>
                      <li><a href="index.php?halaman=tambahmuseum">Tambah Museum</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" >
                  <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="assets/images/123.png" alt="">Admin
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <!-- <a class="dropdown-item"  href="#"> Profile</a>
 -->                    <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

          <div class="right_col" role="main">
            <?php
                if (isset($_GET['halaman']))
                { 
                    if($_GET['halaman']=="artikel")
                   {
                    include 'artikel.php';
                   }
                    elseif  ($_GET['halaman']=="lukisan")
                   {
                    include 'lukisan.php';
                   }
                    elseif ($_GET['halaman']=="media")
                   {
                    include 'media.php';
                   }
                   elseif ($_GET['halaman']=="seniman")
                   {
                    include 'seniman.php';
                   }
                    elseif ($_GET['halaman']=="tambahartikel")
                   {
                    include 'tambahartikel.php';
                   }
                   elseif ($_GET['halaman']=="hapusartikel")
                   {
                    include 'hapusartikel.php';
                   }
                   elseif ($_GET['halaman']=="editartikel")
                    {
                     include 'editartikel.php';
                   }
                   elseif ($_GET['halaman']=="tambahlukisan")
                   {
                    include 'tambahlukisan.php';
                   }
                   elseif ($_GET['halaman']=="hapuslukisan")
                   {
                    include 'hapuslukisan.php';
                   }
                   elseif ($_GET['halaman']=="editlukisan")
                    {
                     include 'editlukisan.php';
                   }
                   elseif ($_GET['halaman']=="tambahmedia")
                   {
                    include 'tambahmedia.php';
                   }
                   elseif ($_GET['halaman']=="hapusmedia")
                   {
                    include 'hapusmedia.php';
                   }
                   elseif ($_GET['halaman']=="editmedia")
                    {
                     include 'editmedia.php';
                   }
                    elseif ($_GET['halaman']=="tambahseniman")
                   {
                    include 'tambahseniman.php';
                   }
                   elseif ($_GET['halaman']=="hapusseniman")
                   {
                    include 'hapusseniman.php';
                   }
                   elseif ($_GET['halaman']=="editseniman")
                    {
                     include 'editseniman.php';
                   }
                   elseif ($_GET['halaman']=="museum")
                   {
                    include 'museum.php';
                   }
                   elseif ($_GET['halaman']=="tambahmuseum")
                   {
                    include 'tambahmuseum.php';
                   }
                   elseif ($_GET['halaman']=="hapusmuseum")
                   {
                    include 'hapusmuseum.php';
                   }
                   elseif ($_GET['halaman']=="editmuseum")
                    {
                     include 'editmuseum.php';
                   }
                }
                else
                {
                    include 'dashboard.php';
                }
            ?>
          </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="assets/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="assets/skycons/skycons.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="assets/js/custom.min.js"></script>

  </body>
</html>
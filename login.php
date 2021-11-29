<?php
  include "includes/koneksi.php";
  include "includes/header.php";

  if(isset($_POST['btnlogin']))
  {
    $user_login = $_POST['user'];
    $pass_login = md5($_POST['pass']);

    $sql = "SELECT * FROM user WHERE username = '{$user_login}' and password = '{$pass_login}'";
    $query = mysqli_query($koneksi, $sql);
    $count = mysqli_num_rows($query);

    if(!$query){
      die("Query gagal".mysqli_error($koneksi));
    }

      if(!empty($user_login) && (!empty($_POST['pass']))){
        if($count==0){
          echo "<div style='color:red;'>&nbsp;Username tidak ditemukan atau password Anda salah!</div>";
        }
        else {
          while ($row = mysqli_fetch_array($query)){
            $id = $row['id_user'];
            $user = $row['username'];
            $pass = $row['password'];
            $nama = $row['nama_user'];
            $level = $row['level'];
          }

          if($user_login == $user && $pass_login == $pass && $level == 2){
            header("Location:admin/index.php");
            session_start();
            $_SESSION['id_user'] = $id;
            $_SESSION['username'] = $user;
            $_SESSION['nama_user'] = $nama;
            $_SESSION['level'] = $level;
          } elseif($user_login == $user && $pass_login == $pass && $level == 1){
            header("Location:index.php");
            session_start();
            $_SESSION['id_user'] = $id;
            $_SESSION['username'] = $user;
            $_SESSION['nama_user'] = $nama;
            $_SESSION['level'] = $level;
          } else {
            echo " User tidak ditemukan! ";
          }
        }
      }

      else {
        if(empty($user_login) || empty($_POST['pass'])){
          //echo "Username atau password tidak boleh kosong";
          echo "<script>alert('Username atau password tidak boleh kosong!')</script>";
        }
      }
  }

  if(isset($_GET['alert'])){
    if($_GET['alert']=="akun_terdaftar"){
        echo "<script>alert('Akun Anda telah dibuat, silahkan Login!')</script>";
    }
  }

// include "includes/headerpolos.php";
?>
    <!-- start banner Area -->
      <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>  
        <div class="container">

          <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">Login Akun</h1>
              <center style="margin-top: 40px;">
                <div class="col-md-4 col-md-offset-4 form-login">
                    <div class="outter-form-login">
                        <form action="" class="inner-login" method="post">
                            <div class="form-group mb-20">
                                <input type="text" class="form-control" id="user" name="user" placeholder="Username">
                            </div>
                            <div class="form-group mb-20">
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                            </div>
                            <input type="submit" class="btn btn-block btn-success" name ="btnlogin" value = "Login">
                            <div class="text-center text-white mt-40">
                                <p>Belum punya akun? Silahkan registrasi <a href ="registrasi.php"><b><u>disini</u></b></a></p>
                            </div>
                        </form>
                    </div>
                </div>
              </center>
            </div>             
          </div>
        </div>          
      </section>
      <!-- End banner Area -->
  <?php
      include "includes/footer.php";
  ?>

  </body>
</html>
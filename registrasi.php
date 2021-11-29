<?php
  //include "includes/headerpolos.php";
  include "includes/header.php";
  if(isset($_GET['alert'])){
    if($_GET['alert']=="username_sudah_ada"){
        echo "<script>alert('Username telah terdaftar, coba login atau pilih username lain')</script>";
    } elseif($_GET['alert']=="pass_harus_sama"){
        echo "<script>alert('Password dan konfirmasi password harus sama')</script>";
    }
  }
?>
    <!-- start banner Area -->
      <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>  
        <div class="container">
          <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">Register Akun</h1>
              <center style="margin-top: 20px;">
                <div class="col-md-4 col-md-offset-4 form-login">
                  <div class="outter-form-login">
                      <form id="frmdaftar" action="register.php" class="inner-login" method="post">
                          <div class="form-group">
                              <input type="text" class="form-control form-control-sm" name="user" placeholder="Username" required="true">
                          </div>
                          <div class="form-group">
                              <input type="password" class="form-control form-control-sm" id="pass" name="pass" placeholder="Password" required="true">
                          </div>
                          <div class="form-group">
                              <input type="password" class="form-control form-control-sm" id="confirm_pass" name="confirm_pass" placeholder="Konfirmasi Password" required="true">
                              <span id="message"></span>
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control form-control-sm" name="name" placeholder="Nama" required="true">
                          </div>
                          <input type="submit" class="btn btn-block btn-success btn-sm" value="Register" />
                          <div class="text-center text-white mt-25">
                              <p>Sudah punya akun ? <a href="login.php"><b><u>Login</u></b></a></p>
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
  
  <script>
  $(document).ready(function(){
    $('#pass, #confirm_pass').on('keyup', function(){
        if($('#pass').val() != '' || $('#confirm_pass').val() != ''){
            if($('#pass').val() == $('#confirm_pass').val()){
                $('#message').html('password sesuai').css('color', 'green');
            }else if($('#confirm_pass') == null){
                $('#message').html('');
            }else
                $('#message').html('password tidak sesuai').css('color', 'red');
        }else 
            $('#message').html('');
    });
  });
  </script>
    
  </body>
</html>
<?php include 'Home.php' ?>

<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b><?php echo $DetailPengaturan['NAMA_APLIKASI'] ?></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in </p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="bukalogin" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
     <?php 
        if (isset($_POST['bukalogin'])) {

           $data = $user->LoginUser($_POST['username'],$_POST['password']);

            if ($data=='gagal') {
            echo "<script>alert('gagal, Username atau password salah')</script>";
            }elseif ($data=='berhasil') {
            pop('berhasil login','admin/');
            }
        }

      ?>
  
    <!-- /.social-auth-links -->

    <a href="index.php?halaman=register" class="text-center">Mendaftar Akun Baru</a>

  </div>
  <!-- /.login-box-body -->
</div>

<?php include 'footerLogin.php' ?>
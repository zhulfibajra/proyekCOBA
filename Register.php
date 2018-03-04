<?php include 'Home.php';

$kodeNomor = $siswa->nomor_siswa();

?>



<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><?php echo $DetailPengaturan['NAMA_APLIKASI'] ?></a>
  </div>

  <div class="box box-body">
    <p class="login-box-msg">Daftar siswa baru atau akun baru</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control hidden" name="kode_Siswa" value="<?php echo $kodeNomor ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="passowrd" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="repassowrd" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" name="daftarsimpan" class="btn btn-primary btn-block btn-flat">Daftar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <?php 

      if (isset($_POST['daftarsimpan'])) 
      {   
          if ($_POST['passowrd']!=$_POST['repassowrd']) {
            valiadis("Silakan mengisi password sama atau passowrd ulang lagi");
          }
          else
          {
             $siswa->simpanDaftar($_POST['kode_Siswa'],$_POST['nama_lengkap'],$_POST['username'],$_POST['passowrd']);
             notive_tanparefresh("Berhasil Mendaftar","");
          }
      }

     ?>
<br>
    

    <a href="index.php?halaman=Login" class="text-center">Punya Login? </a>
  </div>
  <!-- /.form-box -->
</div>


<?php include 'footerLogin.php' ?>
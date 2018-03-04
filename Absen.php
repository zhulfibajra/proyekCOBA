

<?php 
    include 'Home.php';
    
 ?>

<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b><?php echo $DetailPengaturan['NAMA_APLIKASI'] ?></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Silakan Absensi</p>

      <form method="post">
        <div class="form-group has-feedback">
          <input type="text" name="Nis_Siswa" class="form-control" placeholder="NIS Siswa">

        </div>
        <div class="row">
          <div class="col-xs-4">
            <button type="submit" name="simpanAbsen" class="btn btn-primary btn-block btn-flat">ABSEN</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <?php 

     


      if (isset($_POST['simpanAbsen'])) 
      {
        $tanggal = date("Y-m-d");
        $DetailAbsen = $Absen->asben_detail($_POST['Nis_Siswa']);
        // echo "<pre>";
        // echo print_r($DetailAbsen);
        // echo "</pre>";
        
        if ($DetailAbsen['tanggal']==$tanggal AND $DetailAbsen['jenis_absen']=="") {
          echo "<script>alert('Sudah Masuk')</script>";
        }
        else if ($DetailAbsen['tanggal']==$tanggal && $DetailAbsen['jenis_absen']=="" && $DetailAbsen['siswa_id']=="") 
        {
           echo "<script>alert('Bukan Siswa / kosong masuk kok')</script>";
        }
        else if($DetailAbsen['jenis_absen']=="")
        {
          $data = $Absen->simpanAbsen($_POST['Nis_Siswa'],$tanggal,'');

          if (!$data) 
          {
            pop('berhasil ','Absen.php');
          }else
          {
            pop('Gagal','Absen.php');
          }
        }

      }


      ?>



    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->


  <?php include "footer.php" ?>
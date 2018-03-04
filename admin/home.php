<?php 
  
$HasilSiswa = $user->hasiluser_siswa();
$HasilJadwalAktif = $JadwalTes->hasil_jadwalaktif(1);
$HasilAbsen = $Absen->hasil_absen();
$DeSiswa = $siswa->detail_siswa($_SESSION['login']['id_user']);
$DeUser = $user->tampil_user_siswa($_SESSION['login']['id_user']);
  

 ?>
 <?php if ($_SESSION['login']['level']==3): ?>
    
      <?php if ($DeSiswa['kelamin']=='' OR $DeSiswa['foto']=='' AND $DeSiswa['alamat2']==''): ?>
         <div class="alert alert-info">
             
              <h2>SELAMAT DATANG DI AKUN <?php echo $DeUser['nama_lengkap'] ?></h2>
             <h1>ini biodatamu <b> belum terisi atau kurang terisi</b>. Mohon Melengkapi Data, Silakan lengkapi data. <a href="index.php?halaman=profil">KLIK</a></h1>
         </div>
      <?php else: ?>
         <h2>SELAMAT DATANG DI AKUN <?php echo $DeUser['nama_lengkap'] ?></h2>   
      <?php endif ?>   


 <?php else: ?>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $HasilSiswa ?> Siswa</h3>

              <p>Informasi Data Siswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="index.php?halaman=siswa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $HasilJadwalAktif ?> Aktif</h3>

              <p>Informasi Jadwal Tes</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="../admin/index.php?halaman=jadwal" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $HasilAbsen ?> Absensi</h3>

              <p>Informasi Absensi</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="../admin/index.php?halaman=absensi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          
        </div>
          <!-- ./col -->
      </div> 
 <?php endif ?>




<?php include 'Home.php' ?>

<div class="login-box">
	<div class="login-logo">
		<a href="index.php"><?php echo $DetailPengaturan['NAMA_APLIKASI'] ?></a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg"><b>MENU</b></p>

		
		<div class="social-auth-links text-center">
			<a href="index.php?halaman=HadirAbsen" class="btn btn-facebook btn-flat">Hadir ABSEN Siswa</a>
			<a href="JadwalSiswa.php?halaman=0" class="btn btn-google btn-flat">Jadwal Ujian Untuk Siswa</a>
			<br><br>
			<a href="index.php?halaman=Login" class="btn btn-success btn-flat">Login</a>
		</div>
		<!-- /.social-auth-links -->

	</div>
	<!-- /.login-box-body -->
</div>


<?php include "footer.php" ?>
<?php 
if(!isset($_GET['halaman'])){

	/*if ($_SESSION['login']['level']==3) {
		echo "<h1>SELAMAT DATANG DI SISWA</h1>";
	}else
	{
		include 'home.php';	
	}
*/
	include 'home.php';	

}
else
{
	// JENIS TES
	if ($_GET['halaman']=='jenis_tes') {
		breadcrLev3("Informasi Data Jenis Tes","Master Data","Jenis Tes");
		include 'jenis_tes/tampil.php';
	}else if ($_GET['halaman']=='tambah_jenis_tes') {
		include 'jenis_tes/tambah.php';
	}elseif ($_GET['halaman']=='edit_jenistes') {
		include 'jenis_tes/edit.php';
	}
	elseif ($_GET['halaman']=='hapus_jenistes') {
		include 'jenis_tes/hapus.php';
	}

	// PELAJARAN
	elseif ($_GET['halaman']=='pelajaran') {
		breadcrLev3("Informasi Data Pelajaran","Master Data","Pelajaran");
		include 'pelajaran/tampil.php';
	}
	elseif ($_GET['halaman']=='tambah_pelajaran') {
		include 'pelajaran/tambah.php';
	}
	elseif ($_GET['halaman']=='edit_pelajaran') {
		include 'pelajaran/edit.php';
	}
	elseif ($_GET['halaman']=='hapus_pelajaran') {
		include 'pelajaran/hapus.php';
	}

	// SISWA 
	elseif ($_GET['halaman']=='siswa') {
		breadcrLev3("Informasi Data Siswa","Master Data","Siswa");
		include 'siswa/tampil.php';
	}
	elseif ($_GET['halaman']=='tambah_siswa') {
		include 'siswa/tambah.php';
	}
	elseif ($_GET['halaman']=='edit_siswa') {
		include 'siswa/edit.php';
	}
	elseif ($_GET['halaman']=='hapus_siswa') {
		include 'siswa/hapus.php';
	}
	elseif ($_GET['halaman']=='detail_siswa') {
		include 'siswa/detail.php';
	}
	elseif ($_GET['halaman']=='status_siswa') {
		include 'siswa/status.php';
	}

	// KELAS
	elseif ($_GET['halaman']=='kelas') {
		breadcrLev3("Informasi Data Kelas","Master Data","Kelas");
		include 'kelas/tampil.php';
	}

	elseif ($_GET['halaman']=='tambah_kelas') {
		include 'kelas/tambah.php';
	}
	elseif ($_GET['halaman']=='edit_kelas') {
		include 'kelas/edit.php';
	}	
	elseif ($_GET['halaman']=='hapus_kelas') {
		include 'kelas/hapus.php';
	}

	// USER
	elseif ($_GET['halaman']=='user') {
		breadcrLev3("Informasi Sistem User","Master Data","User");
		include 'user/tampil.php';
	}

	elseif ($_GET['halaman']=='tambah_user') {
		include 'user/tambah.php';
	}

	elseif ($_GET['halaman']=='edit_user') {
		include 'user/edit.php';
	}

	elseif ($_GET['halaman']=='hapus_user') {
		include 'user/hapus.php';
	}

	elseif ($_GET['halaman']=='logout') {
		session_destroy();
		pop('keluar dari sini','../index.php');
	}

	// JADWAL status_jadwal
	elseif($_GET['halaman']=='jadwal')
	{

		breadcrLev3("Sistem Jadwal","Sistem","Penjadwal");
		include '../data/jadwal/input.php';
	}
	elseif($_GET['halaman']=='HapusJadwal')
	{
		include '../data/jadwal/hapus.php';
	}
	elseif($_GET['halaman']=='detail_jadwal')
	{
		include '../data/jadwal/detail.php';
	}

	elseif($_GET['halaman']=='status_jadwal')
	{
		include '../data/jadwal/status.php';
	}

	// NILAI 
	elseif($_GET['halaman']=='nilai')
	{
		breadcrLev3("Sistem Penilaian","Sistem","penilaian");
		include '../data/nilai/input.php';
	}
	elseif($_GET['halaman']=='HapusNilai')
	{
		include '../data/nilai/hapus.php';
	}

	// PROFIL
	elseif($_GET['halaman']=='profil')
	{
		include '../admin/profil.php';
	}


	// ABSENSI
	elseif($_GET['halaman']=='absensi')
	{
		breadcrLev3("Sistem Absensi","Sistem","Absensi");
		include '../data/absensi/input.php';
	}

	elseif($_GET['halaman']=='absensi')
	{
		breadcrLev3("Sistem Absensi","Sistem","Absensi");
		include '../data/absensi/input.php';
	}

	elseif($_GET['halaman']=='hapus_absensi')
	{
		include '../data/absensi/hapus.php';
	}


	elseif($_GET['halaman']=='detail_absensi')
	{
		include '../data/absensi/detail.php';
	}

	elseif ($_GET['halaman']=='pengaturan') {
		include 'pengaturan/tampil.php';
	}

	else
	{
		include '404.php';
	}

	

}



?>
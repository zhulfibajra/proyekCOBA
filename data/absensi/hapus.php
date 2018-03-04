<?php 

	$id = $_GET['id'];
	$data = $Absen->hapus_absen($id);

	if (!$data) 
        {
         pop('berhasil menghapus','../admin/index.php?halaman=absensi');
       }
	
 ?>
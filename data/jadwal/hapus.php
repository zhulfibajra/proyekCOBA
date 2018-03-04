<?php 

	$id = $_GET['id'];
	$data = $JadwalTes->hapus_jadwal($id);

	if (!$data) 
        {
         pop('berhasil menghapus','../admin/index.php?halaman=jadwal');
       }
	
 ?>
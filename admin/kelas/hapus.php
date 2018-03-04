<?php 

	$data = $kelas->hapus_kelas($_GET['id']);
	if (!$data) 
        {
         pop('berhasil menghapus','../admin/index.php?halaman=kelas');
       }

 ?>
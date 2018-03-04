<?php 

	$id = $_GET['id'];
	$data = $nilai->hapus_nilai($id);

	if (!$data) 
        {
         pop('berhasil menghapus','../admin/index.php?halaman=nilai');
       }
	
 ?>
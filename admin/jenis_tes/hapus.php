<?php 

	$data = $jenistes->hapus_jenistes($_GET['id']);

	if (!$data) 
        {
         pop('berhasil hapus','../admin/index.php?halaman=jenis_tes');
       }else
       {
        pop('Gagal hapus','../admin/index.php?halaman=tambah_jenis_tes');
      }
 ?>
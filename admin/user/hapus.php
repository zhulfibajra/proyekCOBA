<?php 

	$data = $user->hapus_user($_GET['id']);
	if (!$data) 
      {
        pop('berhasil hapus','../admin/index.php?halaman=user');
      }else
      {
        pop('Gagal hapus','../admin/index.php?halaman=user');
      }
?>
<?php 
// $kode='';
// $nama='';
// $data = $pelajaran->crud_pelajaran($kode,$nama,$_GET['id']);
$data = $pelajaran->hapus_pelajaran($_GET['id']);

if (!$data) 
{
	pop('berhasil hapus','../admin/index.php?halaman=pelajaran');
}else
{
	pop('Gagal hapus','../admin/index.php?halaman=pelajaran');
}

?>
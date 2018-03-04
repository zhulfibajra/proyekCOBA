<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah Kelas</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" class="form-horizontal">
    <div class="box-body">
     <div class="form-group">
      <label class="col-sm-2 control-label">Nama Kelas</label>
      <div class="col-sm-10">
        <input type="text" name="nama_kelas" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Angkatan</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="angkatan">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="simpankelas" class="btn btn-primary">Simpan</button>
        <a href="../admin/index.php?halaman=kelas" class="btn btn-default">Batal</a>
      </div>
    </div>
  </div>
</form>
<?php 
if (isset($_POST['simpankelas'])) {

 $data = $kelas->simpankelas($_POST['nama_kelas'],$_POST['angkatan']);

 if (!$data) 
 {
  pop('berhasil simpan','../admin/index.php?halaman=kelas');
}else
{
  pop('Gagal simpan','../admin/index.php?halaman=tambah_kelas');
}
}

?>

</div>



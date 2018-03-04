<?php 

$detailkelas = $kelas->detail_kelas($_GET['id']);

?>

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Kelas</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" class="form-horizontal">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Nama Kelas</label>
        <div class="col-sm-4">
          <input type="text" name="nama_kelas" value="<?php echo $detailkelas['nama_kelas'] ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Angkatan</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" value="<?php echo $detailkelas['Angkatan'] ?>" name="angkatan">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="simpankelas" class="btn btn-primary">Rubah</button>
          <a href="../admin/index.php?halaman=kelas" class="btn btn-default">Batal</a>
        </div>
      </div>
    </div>
  </form>


  <?php 
  if (isset($_POST['simpankelas'])) {
    $id = $_GET['id'];
    $data = $kelas->editkelas($_POST['nama_kelas'],$_POST['angkatan'],$id);
    if (!$data) 
    {
      pop('berhasil mengedit','../admin/index.php?halaman=kelas');
    }else
    {
      pop('Gagal edit','../admin/index.php?halaman=edit_kelas');
    }


  }

  ?>

</div>



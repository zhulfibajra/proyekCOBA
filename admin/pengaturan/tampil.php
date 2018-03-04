<?php 
$DetailPengaturan = $pengaturan->detail_pengaturan(1);

?>

<div class="box">
  <div class="box-header">
     <div class="box-title">PENGATURAN</div>
 </div>
 <!-- /.box-header -->
 <div class="box-body">
  <form class="form-horizontal" method="post">
    <div class="form-group">
      <label class="col-sm-2 control-label">Nama Aplikasi</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_aplikasi" placeholder="<?php echo $DetailPengaturan['NAMA_APLIKASI'] ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Nama Lengkap</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_lengkap" placeholder="<?php echo $DetailPengaturan['NAMA_LENGKAP'] ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Telp</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="Telp_pengatuan" placeholder="<?php echo $DetailPengaturan['TELP'] ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email_pengaturan" placeholder="<?php echo $DetailPengaturan['EMAIL'] ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="update_pengaturan" class="btn btn-primary">Rubah</button>
      </div>
    </div>
  </form>

  <?php 

  if (isset($_POST['update_pengaturan'])) {
    $data = $pengaturan->updatepengaturan($_POST['nama_aplikasi'],$_POST['nama_lengkap'],$_POST['Telp_pengatuan'],$_POST['email_pengaturan']);
    if (!$data) 
    {
      pop('berhasil merubah','../admin/index.php?halaman=pengaturan');
    }else
    {
      pop('Gagal merubah','../admin/index.php?halaman=pengaturan');
    }
  }
  
  ?>
</div>
<!-- /.box-body -->
</div>
<?php 

$detail_user = $user->detail_user($_GET['id']);

?>

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Edit User</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" class="form-horizontal">
    <div class="box-body">
     <div class="form-group">
      <label class="col-sm-2 control-label">Nama Lengkap</label>
      <div class="col-sm-10">
        <input type="text" value="<?php echo $detail_user['nama_lengkap'] ?>" name="namalengkap" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Username</label>
      <div class="col-sm-10">
        <input type="text" value="<?php echo $detail_user['username'] ?>" name="username" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="password">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Level</label>
      <div class="col-sm-10">
        <select class="form-control" name="level">
          <option value="0" <?php UsLeSet($detail_user['level'],0) ?> >Kosong</option>
          <option value="1" <?php UsLeSet($detail_user['level'],1) ?>  >Admin</option>
          <option value="2" <?php UsLeSet($detail_user['level'],2) ?> >Operator</option>
          <option value="3" <?php UsLeSet($detail_user['level'],3) ?> >Siswa</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="simpanuser" class="btn btn-primary">Rubah</button>
        <a href="../admin/index.php?halaman=user" class="btn btn-default">Batal</a>
      </div>
    </div>
  </div>
</form>

    <?php 

    if (isset($_POST['simpanuser'])) 
    {
      $id=$_GET['id'];
      $data = $user->edit_user($_POST['namalengkap'],$_POST['username'],$_POST['password'],$_POST['level'],$id);
      if (!$data) 
      {
        pop('berhasil mengedit','../admin/index.php?halaman=user');
      }else
      {
        pop('Gagal tambah','../admin/index.php?halaman=edit_user');
      }  

    }
    ?>

</div>




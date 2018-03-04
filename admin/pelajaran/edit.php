<?php 
    
    $detail = $pelajaran->detail_pelajaran($_GET['id']);

 ?>

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Pelajaran</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" class="form-horizontal">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Kode</label>
        <div class="col-sm-2">
          <input type="text" name="kode" class="form-control" value="<?php echo $detail['pelajaran_id'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="nama" value="<?php echo $detail['nama'] ?>">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="editpelajaran" class="btn btn-primary">Edit</button>
          <a href="../admin/index.php?halaman=pelajaran" class="btn btn-default">Batal</a>
        </div>
      </div>
  </form>

<?php 

    if (isset($_POST['editpelajaran'])) {

      if ($_POST['kode']==$detail['pelajaran_id']) {

        valiadis('Silakan menganti kode');
        
      }else if ($_POST['nama']==$detail['nama']) {

        valiadis('Silakan menganti nama');  
        
      }else{

        $id = $_GET['id'];
        $data = $pelajaran->cru_pelajaran($_POST['kode'],$_POST['nama'],$id);
        if (!$data) 
        {
         pop('berhasil mengedit','../admin/index.php?halaman=pelajaran');
       }else
       {
        pop('Gagal edit','../admin/index.php?halaman=edit_pelajaran');
      }

    }

  }

  ?>
</div>



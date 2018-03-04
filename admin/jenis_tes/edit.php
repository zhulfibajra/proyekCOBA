<?php 

  $Detail = $jenistes->detail_jenistes($_GET['id']);

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
        <label class="col-sm-2 control-label">Kode</label>
        <div class="col-sm-1">
          <input type="text" name="kode" class="form-control" value="<?php echo $Detail['jenis_tes_id'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="nama" value="<?php echo $Detail['nama'] ?>">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="jenistesimpan" class="btn btn-primary">Rubah</button>
          <a href="../admin/index.php?halaman=jenis_tes" class="btn btn-default">Batal</a>
        </div>  
    </div>
  </form>
  

    <?php 

    if (isset($_POST['jenistesimpan'])) {

      if ($_POST['kode']==$Detail['jenis_tes_id']) {

        valiadis('Silakan mengganti kode');
        
      }else if ($_POST['nama']==$Detail['nama']) {

        valiadis('Silakan mengganti nama');  
        
      }else{

        $id = $_GET['id'];
        $data = $jenistes->edit_jenistes($_POST['kode'],$_POST['nama'],$id);
        if (!$data) {
         pop('berhasil edit','../admin/index.php?halaman=jenis_tes');
       }else
       {
        pop('Gagal edit','../admin/index.php?halaman=edit_jenistes');
      }
      
    }

  }

  ?>
</div>


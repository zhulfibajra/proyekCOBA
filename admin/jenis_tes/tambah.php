


<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah User</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" class="form-horizontal">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Kode</label>
        <div class="col-sm-1">
          <input type="text" name="kode" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="nama">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="jenistesimpan" class="btn btn-primary">Simpan</button>
          <a href="../admin/index.php?halaman=jenis_tes" class="btn btn-default">Batal</a>
        </div>
      </div>  
    </div>
  </form>
  


    <?php 

    if (isset($_POST['jenistesimpan'])) {

      if ($_POST['kode']=='') {

        valiadis('Silakan mengisi kode');
        
      }else if ($_POST['nama']=='') {

        valiadis('Silakan mengisi nama');  
        
      }else{

        $data = $jenistes->simpan_jenistes($_POST['kode'],$_POST['nama']);
        if (!$data) 
        {
         pop('berhasil simpan','../admin/index.php?halaman=jenis_tes');
       }else
       {
        pop('Gagal simpan','../admin/index.php?halaman=tambah_jenis_tes');
      }

    }

  }

  ?>
</div>


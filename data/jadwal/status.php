<?php 
  
    $DetailJadwal = $JadwalTes->detail_lebih_jadwal($_GET['id']);

 ?>

<div class="box">
  <div class="box-header">
    <div class="box-title">STATUS</div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form method="post" class="form-horizontal">

      <div class="form-group">
        <label class="col-sm-2 control-label">Status : </label>
        <div class="col-sm-10">
          <div class="radio-inline">
            <label>
              <input type="radio" name="status" value="0"
              <?php 
              JesKelRa($DetailJadwal['status'],0);
              ?>
              > Tidak Aktif
            </label>
          </div>
          <div class="radio-inline">
            <label>
              <input type="radio" name="status" value="1"
              <?php 
              JesKelRa($DetailJadwal['status'],1);
              ?>
              > Aktif
            </label>
          </div>
        </div>
      </div>      


      

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="statussimpan" class="btn btn-primary">Rubah</button>
          <a href="../admin/index.php?halaman=jadwal" class="btn btn-default">Batal</a>
        </div>
      </div>
    </form>

    <?php 

    if (isset($_POST['statussimpan'])) {

      $data = $siswa->jadwal_status($_GET['id'],$_POST['status']);

      if (!$data) 
      {
         pop('berhasil merubah','../admin/index.php?halaman=siswa');
      }
      else
      {
         pop('gagal merubah','../admin/index.php?halaman=siswa');
      }
    }
    ?>
  </div>
  <!-- /.box-body -->
</div>
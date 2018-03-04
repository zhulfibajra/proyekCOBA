<?php 

$dataJeTe = $jenistes->tampil_jenistes();
$dataPel  = $pelajaran->tampil_pelajaran();
$datKel   = $kelas->tampil_kelas();
?>

<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Input Jadwal</h3>
  </div>
  <form method="post" class="form-horizontal">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Ruang</label>
        <div class="col-sm-4">
          <input type="text" name="Ruang" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Tanggal Tes</label>
        <div class="col-sm-3">
          <input type="date" class="form-control" name="tanggal_tes">
        </div>
        <label class="col-sm-2 control-label">Jam</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="Jam_mulai">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Jenis Tes</label>
        <div class="col-sm-3">
          <select name="jenis_tes" class="form-control">
            <option value="0" selected>Tes Pilihan</option>
            <?php foreach ($dataJeTe as $key => $value_jenisTes): ?>
             <option value="<?php echo $value_jenisTes['jenis_tes_id'] ?>"><?php echo $value_jenisTes['nama'] ?></option>
           <?php endforeach ?>            
         </select>
       </div>
       <label class="col-sm-2 control-label">Pelajaran</label>
       <div class="col-sm-3">
        <select name="pelajaran" class="form-control">
          <option value="0" selected>Pelajaran Pilihan</option>
          <?php foreach ($dataPel as $key => $value_pelajaran): ?>
            <option value="<?php echo $value_pelajaran['pelajaran_id'] ?>">
              <?php echo $value_pelajaran['nama'] ?>
            </option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Kelas</label>
      <div class="col-sm-3">
       <select name="kelas" class="form-control">
         <option value="0" selected>Kelas Berapa</option>
         <?php foreach ($datKel as $key => $value_kelas): ?>
           <option value="<?php echo $value_kelas['id_kelas'] ?>">
             <?php echo $value_kelas['nama_kelas']." ".$value_kelas['Angkatan'] ?>
           </option>
         <?php endforeach ?>
       </select>
     </div>
     <label class="col-sm-2 control-label">Status</label>
     <div class="col-sm-3">
      <div class="radio-inline">
        <input type="radio" name="status" value="0"> Tidak Aktif

      </div>
      <div class="radio-inline">
        <input type="radio" name="status" value="1"> Aktif
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="simpanjadwal" class="btn btn-success"><i class="fa fa-floppy-o"></i> Input Jadwal</button>
      <!-- <a href="#" name="kosongData" onclick="konfirmasi()" class="btn btn-danger"> KOSONG DATA</a> -->
    </div>
  </div>
</div>
</form>
<?php 

if (isset($_POST['simpanjadwal'])) {


 $JadwalTes->simpan_jadwalTes($_POST['tanggal_tes'],$_POST['Jam_mulai'],$_POST['Ruang'],$_POST['jenis_tes'],$_POST['pelajaran'],$_POST['kelas'],$_POST['status']); 
 notive("info","berhasil","../admin/index.php?halaman=jadwal");

}
 ?>

</div>

<?php 

$dataJadwal = $JadwalTes->tampil_jadwal_detail();

?>


<div class="box box-info">
  <div class="box-header">
    <div class="box-title">Informasi Data Jadwal</div>
  </div>
</div>

<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab_1" data-toggle="tab">ALL</a></li>
  <!--   <li><a href="#tab_2" data-toggle="tab">Jadwal per siswa</a></li> -->
    <li><a href="#tab_3" data-toggle="tab">Jadwal Aktif</a></li>
    <li><a href="#tab_4" data-toggle="tab">Jadwal Tidak Aktif</a></li>
    

    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_1">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="7%">No</th>
            <th>Pelajaran</th>
            <th>Kelas</th>
            <th>Jam Mulai</th>
            <th>Tanggal Tes</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($dataJadwal as $key => $value): ?>
            <tr>    
             <?php 

             $DataPelajaran = $pelajaran->detail_pelajaran($value['pelajaran_id']);
             $Datakelas  = $kelas->detail_kelas($value['id_kelas']); 
             ?>
             <td><?php echo $key+1 ?></td>
             <td><?php echo $DataPelajaran['nama'] ?></td>
             <td><?php echo $Datakelas['nama_kelas']." - ". $Datakelas['Angkatan'] ?></td>
             <td><?php echo $value['jam_mulai'] ?></td>
             <td><?php echo $value['tgl_tes'] ?></td>
             <td><?php echo StatusAktif($value['status']) ?></td>
             <td>
               <a href="../admin/index.php?halaman=status_jadwal&id=<?php echo $value['jadwal_id'] ?>" class="btn btn-warning btn-sm">
                <i class="fa fa-retweet" title="Status Aktif / Tidak Aktif"></i></a>             
               <a href="../admin/index.php?halaman=detail_jadwal&id=<?php echo $value['jadwal_id'] ?>" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-list-ul"> </i></a>  
                <a href="../admin/index.php?halaman=HapusJadwal&id=<?php echo $value['jadwal_id'] ?>" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>

              </td>  
              
            </tr> 
          <?php endforeach ?>

        </tbody>

      </table>
    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="tab_2">



    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="tab_3">
      <?php  $JadwalAktif = $JadwalTes->tampil_jadwal_aktif(1); ?>

        <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="7%">No</th>
            <th>Pelajaran</th>
            <th>Kelas</th>
            <th>Jam Mulai</th>
            <th>Tanggal Tes</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($JadwalAktif as $key_aktif => $value_aktif): ?>
            <tr>    
             <?php 

             $DataPelajaran = $pelajaran->detail_pelajaran($value_aktif['pelajaran_id']);
             $Datakelas  = $kelas->detail_kelas($value_aktif['id_kelas']); 
             ?>
             <td><?php echo $key_aktif+1 ?></td>
             <td><?php echo $DataPelajaran['nama'] ?></td>
             <td><?php echo $Datakelas['nama_kelas']." - ". $Datakelas['Angkatan'] ?></td>
             <td><?php echo $value_aktif['jam_mulai'] ?></td>
             <td><?php echo $value_aktif['tgl_tes'] ?></td>
             <td><?php echo StatusAktif($value_aktif['status']) ?></td>
             <td>
              <a href="../admin/index.php?halaman=status_jadwal&id=<?php echo $value['jadwal_id'] ?>" class="btn btn-warning btn-sm">
                <i class="fa fa-retweet" title="Status Aktif / Tidak Aktif"></i></a>  
                <a href="../admin/index.php?halaman=detail_jadwal&id=<?php echo $value['jadwal_id'] ?>" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-list-ul"> </i></a>  
                  <a href="../admin/index.php?halaman=HapusJadwal&id=<?php echo $value_aktif['jadwal_id'] ?>" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>

              </td>  
              
            </tr> 
          <?php endforeach ?>

        </tbody>

      </table>
  </div>

  <div class="tab-pane" id="tab_4">
        
      <?php  $JadwalNonAktif = $JadwalTes->tampil_jadwal_aktif(0); ?>

        <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="7%">No</th>
            <th>Pelajaran</th>
            <th>Kelas</th>
            <th>Jenis Tes</th>
            <th>Tanggal Tes</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($JadwalNonAktif as $key_aktif => $value_aktif): ?>
            <tr>    
             <?php 

             $DataPelajaran = $pelajaran->detail_pelajaran($value_aktif['pelajaran_id']);
             $Datakelas  = $kelas->detail_kelas($value_aktif['id_kelas']); 
             ?>
             <td><?php echo $key_aktif+1 ?></td>
             <td><?php echo $DataPelajaran['nama'] ?></td>
             <td><?php echo $Datakelas['nama_kelas']." - ". $Datakelas['Angkatan'] ?></td>
             <td><?php echo $value_aktif['jam_mulai'] ?></td>
             <td><?php echo $value_aktif['tgl_tes'] ?></td>
             <td><?php echo StatusAktif($value_aktif['status']) ?></td>
             <td>
                    <a href="../admin/index.php?halaman=status_jadwal&id=<?php echo $value['jadwal_id'] ?>" class="btn btn-warning btn-sm">
                <i class="fa fa-retweet" title="Status Aktif / Tidak Aktif"></i></a>   
              <a href="../admin/index.php?halaman=detail_jadwal&id=<?php echo $value['jadwal_id'] ?>" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-list-ul"> </i></a>  
                 <a href="../admin/index.php?halaman=HapusJadwal&id=<?php echo $value_aktif['jadwal_id'] ?>" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>

              </td>  
              
            </tr> 
          <?php endforeach ?>

        </tbody>

      </table>
      

  </div>
  <!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
</div>

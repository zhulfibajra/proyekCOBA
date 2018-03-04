<?php 

$dataNilai = $nilai->tampil_nilai();

$dataJadwal = $JadwalTes->tampil_jadwal_detail();
?>
<script type="text/javascript">
   $(document).ready(function(){

       $("input[name=nim_siswa]").keyup(function(){

            var nim_siswa = $("input[name=nim_siswa]").val();

            $.ajax({
              type: "POST",
              data: "nim_siswa="+nim_siswa,
              url: "../data/nilai/TampilNama.php",
              success:function(nim)
              {
                  $("#namaSISWA").val(nim);          
              }
            })
       })
       
       
       
   });
    
    
</script>

<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Input Nilai</h3>
  </div>
  <form method="post" class="form-horizontal">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">nim siswa</label>
        <div class="col-sm-4">
          <input type="text" name="nim_siswa" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">nama</label>
        <div class="col-sm-4">
          <input type="text" id="namaSISWA" name="nama_siswa" class="form-control" disabled></div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Jadwal</label>
        <div class="col-sm-5">
          <select name="jadwal" class="form-control">
              <?php foreach ($dataJadwal as $key => $valueJadwal): ?>
                
  <?php 
        $DtPelajaran  = $pelajaran->detail_pelajaran($valueJadwal['pelajaran_id']); 
        $DtJenis  = $jenistes->detail_jenistes($valueJadwal['jenis_tes_id'])   
  ?>
                <option value="<?php echo $valueJadwal['jadwal_id'] ?>">
                  <?php echo $valueJadwal['tgl_tes']." - ".$DtPelajaran['nama']. " - ".$DtJenis['nama'] ?>
                </option>
              <?php endforeach ?>
          </select>

        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">penilaian</label>
        <div class="col-sm-2">
          <input type="text" name="penilaian" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="simpannilai" class="btn btn-success"><i class="fa fa-floppy-o"></i>    Input Nilai</button>
        </div>
      </div>
    </div>
  </form>

<?php 
    if (isset($_POST['simpannilai'])) 
    {
        $nilai->simpan_nilai($_POST['nim_siswa'],$_POST['jadwal'],$_POST['penilaian']);
        notive("info","berhasil","../admin/index.php?halaman=nilai");
    }

 ?>
</div>
<div class="box box-info">
  <div class="box-header">
    <div class="box-title">Informasi Data Nilai</div>

  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="7%">No</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Ujian Pelajaran</th>
          <th>Tanggal Ujian</th>
          <th>Nilai</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dataNilai as $key => $value_nilai): ?>
          
      <?php $DataSiswa  = $siswa->detail_siswa_id($value_nilai['siswa_id']) ?>
      <?php $DataJadwal = $JadwalTes->detail_lebih_jadwal($value_nilai['jadwal_id'])  ?>
      <?php $DataPelajaran  = $pelajaran->detail_pelajaran($DataJadwal['pelajaran_id'])   ?>
          <tr>
            <td><?php echo $key+1 ?></td>
            <td><?php echo $DataSiswa['siswa_id']  ?></td>
            <td><?php echo $DataSiswa['nama'] ?></td>
            <td><?php echo $DataPelajaran['nama'] ?></td>
            <td><?php echo $DataJadwal['tgl_tes'] ?></td>
            <td><?php echo $value_nilai['nilai'] ?></td>
            <td>
              <a href="../admin/index.php?halaman=HapusNilai&id=<?php echo $value_nilai['id_nilai'] ?>&" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>
            </td>     
          </tr>
        <?php endforeach ?>

      </tbody>

    </table>
  </div>
  <!-- /.box-body -->
</div>

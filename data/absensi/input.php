<?php 

$DataAll = $Absen->tampil_asben();
$DataIjin = $Absen->tampil_absen_jenis("Ijin");
$DataSakit = $Absen->tampil_absen_jenis("Sakit");
$DataApla = $Absen->tampil_absen_jenis("Alpa");
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

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah Pelajaran</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" class="form-horizontal">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Nim Siswa</label>
        <div class="col-sm-3">
          <input type="text" name="nim_siswa" class="form-control">
        </div>
        <label class="col-sm-2 control-label">Nama Siswa</label>
        <div class="col-sm-3">
          <input type="text" id="namaSISWA" name="nama_Siswa" class="form-control" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Tanggal</label>
        <div class="col-sm-3">
          <input type="date" name="tanggal" class="form-control">
        </div>
        <label class="col-sm-2 control-label">Absen</label>
        <div class="col-sm-3">
          <select name="jenis_absen" class="form-control">
            <option value="Sakit">Sakit</option>
            <option value="Ijin">Ijin</option>
            <option value="Alpa">Apla</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-7">
          <button type="submit" name="simabsen" class="btn btn-success"><i class="fa fa-floppy-o"></i> Absen</button>
        </div>
      </div>
    </div>
  </form>
</div>
<?php 
if(isset($_POST['simabsen']))
{
 $data = $Absen->simpanAbsen($_POST['nim_siswa'],$_POST['tanggal'],$_POST['jenis_absen']);
 if (!$data) {
   notive("info","berhasil absensi","../admin/index.php?halaman=absensi");

 }
}

?>

<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab_1" data-toggle="tab">Semua Absen</a></li>
    <li><a href="#tab_2" data-toggle="tab">IZIN</a></li>
    <li><a href="#tab_3" data-toggle="tab">SAKIT</a></li>
    <li><a href="#tab_4" data-toggle="tab">APLA</a></li>
    
    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_1">

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="7%">No</th>
            <th>Nim Siswa</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Jenis Tes</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($DataAll as $key => $value): ?>
            <tr>    
             <?php 
             $DataSiswa = $siswa->detail_siswa_id($value['siswa_id']);
             ?>
             <td><?php echo $key+1 ?></td>
             <td><?php echo $value['siswa_id']?></td>
             <td><?php echo $DataSiswa['nama'] ?></td>
             <td><?php echo $value['tanggal'] ?></td>
             <td><?php 
             if ($value['jenis_absen']=="") {
              echo "TIDAK ABSENSI";
            } else
            {
              echo $value['jenis_absen'];
            }


            ?></td>
            <td>
              <a href="../admin/index.php?halaman=hapus_absensi&id=<?php echo $value['id_absensi'] ?>" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>

            </td>  

          </tr> 
        <?php endforeach ?>

      </tbody>

    </table>


  </div>
  <!-- /.tab-pane -->
  <div class="tab-pane" id="tab_2">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="7%">No</th>
          <th>Nim Siswa</th>
          <th>Nama</th>
          <th>Tanggal</th>
          <th>Jenis Tes</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($DataIjin as $key => $valueIjin): ?>
          <tr>    
           <?php 
           $DataSiswa = $siswa->detail_siswa_id($valueIjin['siswa_id']);
           ?>
           <td><?php echo $key+1 ?></td>
           <td><?php echo $valueIjin['siswa_id']?></td>
           <td><?php echo $DataSiswa['nama'] ?></td>
           <td><?php echo $valueIjin['tanggal'] ?></td>
           <td><?php 
           if ($valueIjin['jenis_absen']=="") {
            echo "TIDAK ABSENSI";
          } else
          {
            echo $valueIjin['jenis_absen'];
          }


          ?></td>
          <td>
            <a href="../admin/index.php?halaman=hapus_absensi&id=<?php echo $valueIjin['id_absensi'] ?>" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>

          </td>  

        </tr> 
      <?php endforeach ?>

    </tbody>

  </table>
</div>
<!-- /.tab-pane -->
<div class="tab-pane" id="tab_3">
 <table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th width="7%">No</th>
      <th>Nim Siswa</th>
      <th>Nama</th>
      <th>Tanggal</th>
      <th>Jenis Tes</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($DataSakit as $key => $valueSakit): ?>
      <tr>    
       <?php 
       $DataSiswa = $siswa->detail_siswa_id($valueSakit['siswa_id']);
       ?>
       <td><?php echo $key+1 ?></td>
       <td><?php echo $valueSakit['siswa_id']?></td>
       <td><?php echo $DataSiswa['nama'] ?></td>
       <td><?php echo $valueSakit['tanggal'] ?></td>
       <td><?php 
       if ($valueSakit['jenis_absen']=="") {
        echo "TIDAK ABSENSI";
      } else
      {
        echo $valueSakit['jenis_absen'];
      }


      ?></td>
      <td>
        <a href="../admin/index.php?halaman=hapus_absensi&id=<?php echo $valueSakit['id_absensi'] ?>" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>

      </td>  

    </tr> 
  <?php endforeach ?>

</tbody>

</table>
</div>
<div class="tab-pane" id="tab_4">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th width="7%">No</th>
        <th>Nim Siswa</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Jenis Tes</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($DataApla as $key => $valueApla): ?>
        <tr>    
         <?php 
         $DataSiswa = $siswa->detail_siswa_id($valueApla['siswa_id']);
         ?>
         <td><?php echo $key+1 ?></td>
         <td><?php echo $valueApla['siswa_id']?></td>
         <td><?php echo $DataSiswa['nama'] ?></td>
         <td><?php echo $valueApla['tanggal'] ?></td>
         <td><?php 
         if ($valueApla['jenis_absen']=="") {
          echo "TIDAK ABSENSI";
        } else
        {
          echo $valueApla['jenis_absen'];
        }


        ?></td>
        <td>
          <a href="../admin/index.php?halaman=hapus_absensi&id=<?php echo $valueApla['id_absensi'] ?>" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>

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
<?php 
$datakelas = $kelas->tampil_kelas();
?>

<div class="box">
    <div class="box-header">
    <a href="../admin/index.php?halaman=tambah_kelas" class="btn btn-success"> Tambah </a>

  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>nama kelas</th>
                <th>Angkatan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($datakelas as $key => $value): ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $value['nama_kelas'] ?></td>
                <td><?php echo $value['Angkatan'] ?></td>
                <td>
                    <a href="../admin/index.php?halaman=edit_kelas&id=<?php echo $value['id_kelas']?>" class="btn btn-warning">Edit</a> | <a href="../admin/index.php?halaman=hapus_kelas&id=<?php echo $value['id_kelas'] ?>" class="btn btn-danger"> Hapus</a>
                </td>
            </tr>    
        <?php endforeach ?>

    </tbody>

</table>
</div>
<!-- /.box-body -->
</div>
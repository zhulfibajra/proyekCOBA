<?php 
    $dataPelajaran = $pelajaran->tampil_pelajaran();
?>
        
    
<div class="box">
    <div class="box-header">
      <a href="../admin/index.php?halaman=tambah_pelajaran" class="btn btn-success"> Tambah </a>

  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
           <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Opsi</th>
                    </tr>
        </thead>
        <tbody>
          <?php foreach ($dataPelajaran as $key => $value): ?>
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $value['pelajaran_id'] ?></td>
                            <td><?php echo $value['nama'] ?></td>
                            <td>
                                <a href="../admin/index.php?halaman=edit_pelajaran&id=<?php echo $value['pelajaran_id']?>" class="btn btn-warning">Edit</a> | <a href="../admin/index.php?halaman=hapus_pelajaran&id=<?php echo $value['pelajaran_id'] ?>" class="btn btn-danger"> Hapus</a>
                            </td>
                        </tr> 
                    <?php endforeach ?>

    </tbody>

</table>
</div>
<!-- /.box-body -->
</div>
<?php 

$dataSiswa = $siswa->tampil_siswa();
?>             

<div class="box">
  <div class="box-header">
   <a href="../admin/index.php?halaman=tambah_siswa" class="btn btn-success"> Tambah </a>
 </div>
 <!-- /.box-header -->
 <div class="box-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th width="7%">No</th>
        <th>Siswa ID</th>
        <th>Nama</th>
        <th>Telp</th>
        <th>Status</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dataSiswa as $key => $value): ?>
        <tr>
          <td><?php echo $key+1 ?></td>
          <td><?php echo $value['siswa_id']?></td>
          <td><?php echo $value['nama']?></td>
          <td><?php echo $value['telp_rumah']?></td>
          <td><?php echo StatusAktif($value['status'])?></td>
          <td>
            <a href="index.php?halaman=status_siswa&id=<?php echo $value['id_user'] ?>" class="btn btn-success btn-sm btn-flat">Status</a>
            <a href="index.php?halaman=detail_siswa&id=<?php echo $value['id_user'] ?>" class="btn btn-info btn-sm btn-flat">Detail</a>
            <a href="index.php?halaman=edit_siswa&id=<?php echo $value['id_user'] ?>" class="btn btn-warning btn-sm btn-flat">Edit</a>
            <a href="index.php?halaman=hapus_siswa&id=<?php echo $value['id_user'] ?>" class="btn btn-danger btn-sm btn-flat">Hapus</a>
          </td>
        </tr>
      <?php endforeach ?>

    </tbody>

  </table>
</div>
<!-- /.box-body -->
</div>
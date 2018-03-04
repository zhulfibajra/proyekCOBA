<?php 
$DataUser = $user->tampil_user();
$HasilSiswa = $user->hasiluser_siswa();
?>
<div class="col-md-12">
    
    <div class="alert alert-info">
     Informasi jumlah pengguna yang berlevel siswa adalah <strong>
        <?php echo $HasilSiswa ?></strong> Siswa.
 </div>
<div class="box">
    <div class="box-header">
      <a href="../admin/index.php?halaman=tambah_user" class="btn btn-success"> Tambah </a> 

  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>nama lengkap</th>
                <th>username</th>
                <th>Level</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
           <?php foreach ($DataUser as $key => $value): ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $value['nama_lengkap'] ?></td>
                <td><?php echo $value['username'] ?></td>
                <td><?php echo LevelUser($value['level']) ?></td>
                <td>
                    <a href="../admin/index.php?halaman=edit_user&id=<?php echo $value['id_user']?>" class="btn btn-warning">Edit</a> | <a href="../admin/index.php?halaman=hapus_user&id=<?php echo $value['id_user'] ?>" class="btn btn-danger"> Hapus</a>
                </td>
            </tr>    
        <?php endforeach ?>

    </tbody>

</table>
</div>
<!-- /.box-body -->
</div>

</div>        

<?php 

$DetailSiswa = $siswa->detail_siswa($_GET['id']);
$DetailUser    = $user->detail_user($_GET['id']);
?>

<div class="row">
  <div class="col-md-3">

    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="../asset/image/<?php echo $DetailSiswa['foto'] ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo $DetailSiswa['nama'] ?></h3>

        <p class="text-muted text-center">Asal : <?php echo $DetailSiswa['alamat2'] ?></p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>NIS : </b> <a class="pull-right"><?php echo $DetailSiswa['siswa_id'] ?></a>
          </li>
          <li class="list-group-item">
            <b>Status</b> <a class="pull-right"> <?php echo StatusAktif($DetailSiswa['status']) ?></a>
          </li>
          <li class="list-group-item">
            <b>Jenis Kelamin</b> <a class="pull-right"><?php JenisKelamin($DetailSiswa['kelamin']) ?></a>
          </li>
          <li class="list-group-item">
            <b>Username </b> <a class="pull-right"><?php echo $DetailUser['username'] ?></a>
          </li>
        </ul>


      </div>
      <!-- /.box-body -->
    </div>

  </div>
  <!-- /.col -->
  <div class="col-md-9">

    <div class="box box-primary">
      <div class="box-header with-border">
        <a class="btn btn-success btn-sm btn-flat" href="../admin/index.php?halaman=siswa">Kembali</a>
        <h3 class="box-title">Detail Informasi</h3>

      </div>
      <div class="box-body">
        <table class="table table-condensed">
          <thead>
            <tr>
              <td></td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                Tempat Lahir 
              </td>
              <td>: <?php echo $DetailSiswa['tempat_lahir']."<br>" ?></td>
            </tr>
            <tr>
              <td>
                Tanggal Lahir
              </td>
              <td>:
                <?php echo $DetailSiswa['tgl_lahir']."<br>" ?>
              </td>
            </tr>
            <tr>
              <td>
                Nama Orang Tua
              </td>
              <td>:
                <?php echo $DetailSiswa['nama_ortu']."<br>" ?>
              </td>
            </tr>
            <tr>
              <td>
                Alamat Berdomilisi
              </td>
              <td>:
                <?php echo $DetailSiswa['alamat1'] ?>
              </td>
            </tr>
            <tr>
              <td>
                Alamat asal 
              </td>
              <td>:
                <?php echo $DetailSiswa['alamat2'] ?>
              </td>
            </tr>
            <tr>
              <td>
                RT / RW 
              </td>
              <td>:
                <?php echo $DetailSiswa['rt_rw'] ?>
              </td>
            </tr>
            <tr>
              <td>
                Kota
              </td>
              <td>:
                <?php echo $DetailSiswa['kota'] ?>
              </td>
            </tr>
            <tr>
              <td>
                kode Pos
              </td>
              <td>:
                <?php echo $DetailSiswa['kodepos'] ?>
              </td>
            </tr>
            <tr>
              <td>
                Telp Rumah
              </td>
              <td>:
                <?php echo $DetailSiswa['telp_rumah'] ?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->

      <!-- /.box-footer-->
    </div>
  </div>
  <!-- /.col -->
</div>
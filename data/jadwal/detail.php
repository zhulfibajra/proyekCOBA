<?php 

$DetailJadwal      = $JadwalTes->detail_lebih_jadwal($_GET['id']);
$DetailJenisTes    = $jenistes->detail_jenistes($DetailJadwal['jenis_tes_id']);
$DetailPelajaran   = $pelajaran->detail_pelajaran($DetailJadwal['pelajaran_id']);
$DetailKelas       = $kelas->detail_kelas($DetailJadwal['id_kelas']);

?>

<div class="row">
  <!-- /.col -->
  <div class="col-md-9">

    <div class="box box-primary">
      <div class="box-header with-border">
        <a class="btn btn-success btn-sm btn-flat" href="../admin/index.php?halaman=jadwal">Kembali</a>
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
                Tanggal Tes
              </td>
              <td>: <?php echo $DetailJadwal['tgl_tes']."<br>" ?></td>
            </tr>
            <tr>
              <td>
                Jam Mulai
              </td>
              <td>: <?php echo $DetailJadwal['jam_mulai']."<br>" ?>
              </td>
            </tr>
            <tr>
              <td>
                ruang
              </td>
              <td>:
                <?php echo $DetailJadwal['ruang']."<br>" ?>
              </td>
            </tr>
            <tr>
              <td>
                Jenis Tes
              </td>
              <td>:
                <?php echo $DetailJenisTes['nama'] ?>
              </td>
            </tr>
            <tr>
              <td>
                Pelajaran
              </td>
              <td>:
                <?php echo $DetailPelajaran['nama'] ?>
              </td>
            </tr>
            <tr>
              <td>
                Kelas
              </td>
              <td>:
                <?php echo $DetailKelas['nama_kelas'] ?>
              </td>
            </tr>
            <tr>
              <td>
                Kelas Angkatan
              </td>
              <td>:
                <?php echo $DetailKelas['Angkatan'] ?>
              </td>
            </tr>
            <tr>
              <td>
                Status
              </td>
              <td>:
                <?php echo StatusAktif($DetailJadwal['status']) ?>
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
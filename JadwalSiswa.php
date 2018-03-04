
<?php include 'LinkInclude.php';
$DetailPengaturan = $pengaturan->detail_pengaturan(1);
?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $DetailPengaturan['NAMA_APLIKASI'] ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="asset/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="asset/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="asset/dist/css/styleDepan.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="asset/dist/css/skins/skin-blue.min.css">
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <body class="skin-blue">
    	<div class="wrapper">



    		<div class="content">


    			<?php 
    			$DataJadwal = $JadwalTes->tampil_jadwal_aktif(1);
    			$DataHasil  = $JadwalTes->hasil_jadwalaktif(1); 
    			?>
    			<div class="row  text-center">
    				<div class="col-md-12">
    					<h1><a href="index.php" class="text-white">JADWAL UJIAN</a></h1>
    					<br><br><br>
    				</div>
    			</div>

    			<div class="row">
    				<?php if ($DataHasil==0): ?>
    					<div class="container">
    						<p class="alert alert-info text-center" id="text-pesan">Maaf, Belum terjadwal.
    							<br>
    							Harap Menunggu dan sabar. <br>Terima kasih</p>
    						</div>
    					<?php else :?>

    						<?php 

    						$batas =8;

    						$halaman = $_GET['halaman'];

    						if (empty($halaman)) {
    							$posisi = 0;
    							$halaman = 1;
    						}
    						else
    						{
    							$posisi = ($halaman-1)*$batas; 

    						}
                            
    						$DataJadwalPaging = $JadwalTes->jadwal_paging($posisi,$batas);
    						?>


    						<?php foreach ($DataJadwalPaging as $key => $value): ?>


    							<?php 
    							$DataPelajaran = $pelajaran->detail_pelajaran($value['pelajaran_id']); 
    							$DataJenisTes  = $jenistes->detail_jenistes($value['jenis_tes_id']);
    							$DataKelas  = $kelas->detail_kelas($value['id_kelas']);

    							?>
    							<div class="col-md-3">
    								<div class="box box-default">
    									<div class="box-header with-border">
    										<i class="fa fa-newspaper-o"></i>

    										<h3 class="box-title">
    											<?php echo $DataPelajaran['nama'] ?>

    										</h3>
    									</div>
    									<!-- /.box-header -->
    									<div class="box-body">
    										<table class="table table-condensed">
    											<thead>
    												<tr>
    													<td><strong>Detail Informasi</strong></td>
    													<td></td>
    												</tr>
    											</thead>
    											<tbody>
    												<tr>
    													<td>
    														Jam Mulai 
    													</td>
    													<td>: <?php echo $value['jam_mulai']."<br>" ?></td>
    												</tr>
    												<tr>
    													<td>
    														Tanggal 
    													</td>
    													<td>:
    														<?php echo $value['tgl_tes']."<br>" ?>
    													</td>
    												</tr>
    												<tr>
    													<td>
    														Ruangan 
    													</td>
    													<td>:
    														<?php echo $value['ruang']."<br>" ?>
    													</td>
    												</tr>
    												<tr>
    													<td>
    														Jenis Tes 
    													</td>
    													<td>:
    														<?php echo $DataJenisTes['nama'] ?>
    													</td>
    												</tr>
    												<tr>
    													<td>
    														Kelas 
    													</td>
    													<td>:
    														<?php echo $DataKelas['nama_kelas']." - Angkatan ".$DataKelas['Angkatan'] ?>
    													</td>

    												</tr>
    											</tbody>
    										</table>
    									</div>
    									<!-- /.box-body -->
    								</div>
    								<!-- /.box -->

    								

    							</div>
    						<?php endforeach ?>

								<div class="row">
									<div class="col-md-12 text-center">
							
    						<?php

    						$query = "SELECT * FROM jadwal_tes";

    						$SQL = mysqli_query($connent,$query); 
    						$totalData = mysqli_num_rows($SQL);
    						$totalPage = ceil($totalData/$batas);


    						echo "<ul class=\"pagination\"><li>
    								<a href=\"#\" aria-label=\"Previous\">
    									<span aria-hidden=\"true\">&laquo;</span>
    								</a>
    							</li>";


    						for($i = 1; $i <= $totalPage; $i++)
    						{
    							if ($i != $halaman)
    							{	
    								echo "<li><a href='JadwalSiswa.php?halaman=$i'>$i</a></li>";
    								
    							}
    							else
    							{
    								echo "<li><a href=\"#\">$i</a></li> ";
    							}
    						}

    						echo "<li>
    								<a href=\"#\" aria-label=\"Next\">
    									<span aria-hidden=\"true\">&raquo;</span>
    								</a>
    							</li>
    						</ul>";

    							?>

										
									</div>
								</div>



    						<?php endif ?>
    							
    							

    					</div><!--END ROW-->



    				</div>


    				<br><br><br><br>
    				<br><br><br><br>
    			</div>
    			<!-- /.content-wrapper -->

    			<!-- Main Footer -->
    			<footer class="main-footer">
    				<!-- To the right -->
    				<div class="pull-right hidden-xs">
    					Email : <?php echo $DetailPengaturan["EMAIL"] ?>
    				</div>
    				<!-- Default to the left -->
    				<strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
    			</footer>

    			<!-- Control Sidebar -->

    			<!-- /.control-sidebar -->
	  <!-- Add the sidebar's background. This div must be placed
	  	immediately after the control sidebar -->
	  	<div class="control-sidebar-bg"></div>


	  </div>

	  <!-- ./wrapper -->

	  <!-- REQUIRED JS SCRIPTS -->

	  <!-- jQuery 3 -->
	  <script src="asset/bower_components/jquery/dist/jquery.min.js"></script>
	  <!-- Bootstrap 3.3.7 -->
	  <script src="asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	  <!-- AdminLTE App -->
	  <script src="asset/dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
 </body>
 </html>
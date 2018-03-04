
    <?php 
    
    include "../../config/koneksi.php";
    include "../../controller/classMaster.php";

	$NimSis = $_POST['nim_siswa'];
	$DataSiswa = $siswa->detail_siswa_id($NimSis);
	echo $DataSiswa['nama'];

 ?>
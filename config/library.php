<?php 


function paginganJadwal($limit,$tabel,$link)
{	
	$page = $_GET['halaman'];
	if (empty($page)) {
		$position = 0;
		$page     = 1;
	}
	else
	{
		$position = ($page-1) * $limit;
	}

	$query = "SELECT * FROM $tabel LIMIT $limit";
}
function perulangan($data)
{
	$semua_data=array();
	while ($pecah = $data->fetch_assoc()) {

		$semua_data[] = $pecah;

	}
	return $semua_data;
}


function pop($pesan,$url)
{
	echo "<script>alert('$pesan');location='$url'</script>";
}

function valiadis($pesan)
{
	echo "<script>alert('$pesan')</script>";
}


function RubahStatus($value)
{
	if ($value==0) {
		$data = 'checked';
	}elseif ($value==1) {
		$data = 'checked';
	}
	else
	{
		$data = "";
	}
	return $data;
}

function StatusAktif($value)
{
	if ($value==0) {
		$data= "<span class=\"label label-warning\">Tidak Aktif</span>";
	}
	elseif ($value==1) {
		
		$data= "<span class=\"label label-success\">Aktif</span>";   
	}else
	{
		$data= "<span class=\"label label-danger\">BELUM DIAKIF</span>";
	}

	return $data;
}

function notive($alert,$note,$lokasi)
{
	echo "<div class='alert alert-$alert'>$note</div>";
	echo "<meta http-equiv='refresh' content='2; url=$lokasi'>";
}

function notive_tanparefresh($pesan,$lokasi)
{
	echo "<script>alert('$pesan')</script>";
	echo "<meta http-equiv='refresh' content='2; url=$lokasi'>";	
}
function LevelUser($value)
{
	if ($value==0) {
		$data="Kosong";
	} elseif ($value==1) {
		$data="Admin";
	} elseif ($value==2) {
		$data="Operator";
	} elseif ($value==3) {
		$data="Siswa";
	} else
	{
		$data="Belum tersedia";
	}
	return $data;
}

function JenisKelamin($value)
{
	if ($value=="L") 
	{
		echo "Laki-laki";
	} elseif ($value=="P") {
		echo "Perempuan";
	} 
	
}

function JesKelRa($value,$angka)
{
	if ($value==$angka) { echo "checked"; } 
	
}

function UsLeSet($value,$angka)
{
	if ($value==$angka) { echo "selected"; } 
}

function breadcrLev3($title,$Level2,$Level3)
{
	echo " <section class=\"content-header\">
      <h1>
         $title
      </h1>
      <ol class=\"breadcrumb\">
     	   <li><a href=\"../admin/\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
        <li> $Level2 </a></li>
        <li class=\"active\">$Level3</li>
      </ol>
    </section><br>";
}


function KodeAuto($tabel,$inisial)
{
//    $strukur = mysqli_query("SELECT * FROM $tabel");
//    $field   = mysqli_field_name($strukur,0);
//    $panjang = mysqli_field_len($strukur,0);
//    $qry     = mysqli_query("SELECT max(".$field") FROM ".$tabel);
//    $row     = mysqli_fetch($qry);
//    
//    if($row[0]=='')
//    {
//        $angka=0;
//    }
//    else{
//        
//    }
}



?>
<?php 



class Jenistes 
{
	protected $koneksi;

	public function __construct($x)
	{
		$this->koneksi = $x;
	}

	public function simpan_jenistes($kode,$nama)
	{
		$this->koneksi->query("INSERT INTO `jenis_tes` (`jenis_tes_id`, `nama`) VALUES ('$kode', '$nama');");
		
	}

	public function tampil_jenistes()
	{
		$data = $this->koneksi->query("SELECT * FROM jenis_tes");
		return perulangan($data);
	}

	public function edit_jenistes($kode,$nama,$id)
	{
		$this->koneksi->query("UPDATE `jenis_tes` SET `jenis_tes_id` = '$kode', `nama` = '$nama' WHERE `jenis_tes`.`jenis_tes_id` = '$id';");
	}

	public function detail_jenistes($id)
	{
		$data = $this->koneksi->query("SELECT * FROM jenis_tes WHERE jenis_tes_id='$id'");
		return $data->fetch_assoc();	
	}

	public function hapus_jenistes($id)
	{
		$this->koneksi->query("DELETE FROM jenis_tes WHERE jenis_tes_id='$id'");
	}
}


class Pelajaran 
{
	protected $koneksi;

	public function __construct($x)
	{
		$this->koneksi = $x;	
	}

	public function tampil_pelajaran()
	{
		$data = $this->koneksi->query("SELECT * FROM pelajaran");
		return perulangan($data);
	}

	public function detail_pelajaran($id)
	{
		$data = $this->koneksi->query("SELECT * FROM pelajaran WHERE pelajaran_id='$id'");
		return $data->fetch_assoc();
	}

	public function hapus_pelajaran($id)
	{
		$this->koneksi->query("DELETE FROM `pelajaran` WHERE `pelajaran`.`pelajaran_id` = '$id'");
	}

	public function simpan_pelajaran($kode,$nama)
	{
		$this->koneksi->query("INSERT INTO `pelajaran` (`pelajaran_id`, `nama`) VALUES ('$kode', '$nama')");
	}


	public function cru_pelajaran($kode,$nama,$id)
	{
		if (empty($id)) {
			$this->koneksi->query("INSERT INTO `pelajaran` (`pelajaran_id`, `nama`) VALUES ('$kode', '$nama')");
		}elseif (isset($kode) AND isset($nama) AND isset($id)) {
			$this->koneksi->query("UPDATE `pelajaran` SET `pelajaran_id` = '$kode', `nama` = '$nama' WHERE `pelajaran`.`pelajaran_id` = '$id'");
		}else
		{
			return "belum tersedia";
		}
	}
}

class Siswa 
{

	protected $koneksi;

	public function __construct($x)
	{
		$this->koneksi = $x;
	}

	public function tampil_siswa()
	{
		$data = $this->koneksi->query("SELECT * FROM siswa");
		return perulangan($data);
	}

	public function detail_siswa($id)
	{
		$data = $this->koneksi->query("SELECT * FROM siswa WHERE id_user='$id'");
		return $data->fetch_assoc();
	}

	public function detail_siswa_id($id)
	{
		$data = $this->koneksi->query("SELECT * FROM siswa WHERE siswa_id='$id'");
		return $data->fetch_assoc();	
	}

	public function status_siswa($id,$status)
	{
		$this->koneksi->query("UPDATE `siswa` SET `status` = '$status' WHERE `siswa`.`id_user` = '$id'");
	}

	public function tambah_siswa($kode,$nama,$kelamin,$tempatlahir,$tanggalahir,$namaortua,$alamat1,$alamat2,$rt_rw,$kota,$kodepos,$telp,$foto,$status,$username,$password)
	{
		$lokasi_foto = $foto['tmp_name'];
		$nama_foto = $foto['name'];

		if (empty($lokasi_foto)) {


			$this->koneksi->query("INSERT INTO `user` (`nama_lengkap`, `username`, `password`, `level`) VALUES ('$nama', '$username', '$password', 3);");

			$idUser = mysqli_insert_id($this->koneksi);

			$this->koneksi->query("INSERT INTO `siswa` (`siswa_id`, `nama`, `kelamin`, `tempat_lahir`, `tgl_lahir`, `nama_ortu`, `alamat1`, `alamat2`, `rt_rw`, `kota`, `kodepos`, `telp_rumah`, `status`, `id_user`) VALUES ('$kode', '$nama', '$kelamin', '$tempatlahir', '$tanggalahir', '$namaortua', '$alamat1', '$alamat2', '$rt_rw', '$kota', '$kodepos', '$telp','$status', '$idUser')");

		} else {

			$customfoto = "img_".date("YmdHis")."_".$nama_foto;
			move_uploaded_file($lokasi_foto,"../asset/image/$customfoto");

			$this->koneksi->query("INSERT INTO `user` (`nama_lengkap`, `username`, `password`, `level`) VALUES ('$nama', '$username', '$password', 3);");

			$idUser = mysqli_insert_id($this->koneksi);

			$this->koneksi->query("INSERT INTO `siswa` (`siswa_id`, `nama`, `kelamin`, `tempat_lahir`, `tgl_lahir`, `nama_ortu`, `alamat1`, `alamat2`, `rt_rw`, `kota`, `kodepos`, `telp_rumah`, `foto`, `status`, `id_user`) VALUES ('$kode', '$nama', '$kelamin', '$tempatlahir', '$tanggalahir', '$namaortua', '$alamat1', '$alamat2', '$rt_rw', '$kota','$kodepos','$telp','$customfoto','$status', '$idUser')");
		}

	}

	public function edit_siswa($nama,$kelamin,$tempatlahir,$tanggalahir,$namaortua,$alamat1,$alamat2,$rt_rw,$kota,$kodepos,$telp,$foto,$status,$username,$password,$id)
	{
		$lokasifoto = $foto['tmp_name'];

		if (!empty($lokasifoto)) 
		{
			$namafoto = $foto['name'];
			$customfoto = "img_".date("YmdHis")."_".$namafoto;

			$datalama = $this->detail_siswa($id);
			$foto_lama = $datalama['foto'];

			if (file_exists("../asset/image/$foto_lama")) 
			{
				unlink("../asset/image/$foto_lama");
			}

			move_uploaded_file($lokasifoto,"../asset/image/$customfoto");

			$this->koneksi->query("UPDATE `user` SET `nama_lengkap` = '$nama', `username` = '$username', `password` = '$password' WHERE `user`.`id_user` = '$id'");

			$this->koneksi->query("UPDATE `siswa` SET `nama` = '$nama', `kelamin` = '$kelamin', `tempat_lahir` = '$tempatlahir', `tgl_lahir` = '$tanggalahir', `nama_ortu` = '$namaortua', `alamat1` = '$alamat1', `alamat2` = '$alamat2', `rt_rw` = '$rt_rw', `kota` = '$kota', `kodepos` = '$kodepos', `telp_rumah` = '$telp',`foto` = '$customfoto', `status` = '$status' WHERE `siswa`.`id_user` = '$id'");
		}
		else
		{
			$this->koneksi->query("UPDATE `user` SET `nama_lengkap` = '$nama', `username` = '$username', `password` = '$password' WHERE `user`.`id_user` = '$id'");

			$this->koneksi->query("UPDATE `siswa` SET `nama` = '$nama', `kelamin` = '$kelamin', `tempat_lahir` = '$tempatlahir', `tgl_lahir` = '$tanggalahir', `nama_ortu` = '$namaortua', `alamat1` = '$alamat1', `alamat2` = '$alamat2', `rt_rw` = '$rt_rw', `kota` = '$kota', `kodepos` = '$kodepos', `telp_rumah` = '$telp',`status` = '$status' WHERE `siswa`.`id_user` = '$id'");
		}
	}

	public function hapus_siswa($id)
	{
		$datalama = $this->detail_siswa($id);
		$fotolama = $datalama['foto'];

		if (file_exists("../asset/image/$fotolama")) {
			unlink("../asset/image/$fotolama");
		}

		$this->koneksi->query("DELETE FROM siswa WHERE id_user='$id'");

		$this->koneksi->query("DELETE FROM user WHERE id_user='$id'");
	}

	public function nomor_siswa()
	{	
		$ceknomor= $this->koneksi->query("SELECT siswa_id FROM siswa ORDER BY siswa_id");
       //$ceknomor= mysqli_query($koneksi, "SELECT f_kodepart FROM t_inventoryitems ORDER BY f_kodepart DESC");

		if (isset($ceknomor)) {
			$data=mysqli_num_rows($ceknomor);
			$cekQ=$data;

			$awalQ=substr($cekQ,0-6);
			$next=$awalQ+1;

			$kode=strlen($next);

			if(!$cekQ)
				{ $no='PEK0000'; }
			elseif($kode==1)
				{ $no='PEK0000'; }
			elseif($kode==2)
				{ $no='PEK0000'; }
			elseif($kode==3)
				{ $no='PEK000'; }
			elseif($kode==4)
				{ $no='PEK00'; }
			elseif($kode==5)
				{ $no='PEK0'; }
			elseif($kode=6)
				{ $no='PEK'; }

			$items=$no.$next;
		}else
		{
			$items ="P0001";
		}	
		
		return $items;
	}

	public function simpanDaftar($kodeID,$nama_lengkap,$username,$password)
	{
		$this->koneksi->query("INSERT INTO `user` (`nama_lengkap`, `username`, `password`, `level`) VALUES ('$nama_lengkap', '$username', '$password', 3);");

		$user_id = mysqli_insert_id($this->koneksi);

		$this->koneksi->query("INSERT INTO `siswa` (`siswa_id`, `nama`,`status`, `id_user`) VALUES ('$kodeID', '$nama_lengkap',1,'$user_id')");
	}
}

	/**
	* 
	*/

	/**
	* 
	*/
	class kelas 
	{
		protected $koneksi;

		public function __construct($x)
		{
			$this->koneksi = $x;
		}

		public function tampil_kelas()
		{
			$data = $this->koneksi->query("SELECT * FROM kelas");
			return perulangan($data);
		}

		public function detail_kelas($id)
		{
			$data = $this->koneksi->query("SELECT * FROM kelas WHERE id_kelas='$id'");
			return $data->fetch_assoc();
		}

		public function simpankelas($namakelas,$angkatan)
		{
			$this->koneksi->query("INSERT INTO `kelas` (`nama_kelas`, `Angkatan`) VALUES ('$namakelas', '$angkatan')");
		}

		public function editkelas($namakelas,$angkatan,$id)
		{
			$this->koneksi->query("UPDATE `kelas` SET `nama_kelas` = '$namakelas', `Angkatan` = '$angkatan' WHERE `kelas`.`id_kelas` ='$id'");
		}

		public function hapus_kelas($id)
		{
			$this->koneksi->query("DELETE FROM kelas WHERE id_kelas='$id'");
		}
	}
	class UserSistem 
	{
		protected $koneksi;
		
		public function __construct($x)
		{
			$this->koneksi = $x;
		}

		public function LoginUser($username,$password)
		{
				$data = $this->koneksi->query("SELECT * FROM user WHERE username='$username' AND password='$password'");

				$hasil = mysqli_num_rows($data);

				if ($hasil==1) 
				{
					$konvert = $data->fetch_assoc();

					$_SESSION['login'] = $konvert;

					return "berhasil";
				}
				else
				{
					return "gagal";
				}
		}

		public function tampil_user_siswa($id)
		{
			$data = $this->koneksi->query("SELECT * FROM user WHERE id_user='$id'");
			return $data->fetch_assoc();
		}

		public function tampil_user()
		{
			$data = $this->koneksi->query("SELECT * FROM user");
			return perulangan($data);
		}

		public function detail_user($id)
		{
			$data = $this->koneksi->query("SELECT * FROM user WHERE id_user='$id'");
			return $data->fetch_assoc();
		}

		public function simpan_user($namalengkap,$username,$password,$level)
		{
			$this->koneksi->query("INSERT INTO `user` (`nama_lengkap`, `username`, `password`, `level`) VALUES ('$namalengkap', '$username', '$password', '$level');");
		}

		public function hasiluser_siswa()
		{
			$data = $this->koneksi->query("SELECT * FROM user WHERE level=3");
			$hasil = mysqli_num_rows($data);
			if ($hasil==0) {
				$hasil = "Belum ada";
			}
			return $hasil;
		}

		public function edit_user($namalengkap,$username,$password,$level,$id)
		{
			$this->koneksi->query("UPDATE `user` SET `nama_lengkap` = '$namalengkap', `username` = '$username', `password` = '$password', `level` = '$level' WHERE `user`.`id_user` = '$id'");
		}

		public function hapus_user($id)
		{
			$this->koneksi->query("DELETE FROM user WHERE id_user='$id'");
		}

		
	}


	$user  = new UserSistem($connent);
	$siswa = new Siswa($connent);
	$kelas = new kelas($connent);
	$pelajaran = new Pelajaran($connent);
	$jenistes = new Jenistes($connent);
	?>


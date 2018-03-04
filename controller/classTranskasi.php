<?php 

  class JadwalTes
  {
  	protected $koneksi;

  	public function __construct($x)
  	{
  		$this->koneksi = $x;
  	}

    public function jadwal_paging($posisi,$limit)
    {
       $data = $this->koneksi->query("SELECT * FROM jadwal_tes WHERE status=1 LIMIT $posisi,$limit");
       return perulangan($data);
    }

    public function jadwal_status($id,$status)
    {
      $this->koneksi->query("UPDATE `jadwal_tes` SET `status` = '$status' WHERE `jadwal_tes`.`jadwal_id` = '$id'");
    }

  	public function tampil_jadwal_detail()
  	{  
  		$data = $this->koneksi->query("SELECT * FROM jadwal_tes 
        JOIN pelajaran ON jadwal_tes.pelajaran_id=pelajaran.pelajaran_id 
        JOIN kelas ON jadwal_tes.id_kelas=kelas.id_kelas
        JOIN jenis_tes ON jadwal_tes.jenis_tes_id=jenis_tes.jenis_tes_id");
      return perulangan($data);

  	}

    public function kosong_jadwal()
    {
      $this->koneksi->query("TRUNCATE jadwal_tes");
    }

    public function tampil_jadwal_aktif($id)
    {
      $data = $this->koneksi->query("SELECT * FROM jadwal_tes 
        JOIN pelajaran ON jadwal_tes.pelajaran_id=pelajaran.pelajaran_id 
        JOIN kelas ON jadwal_tes.id_kelas=kelas.id_kelas
        JOIN jenis_tes ON jadwal_tes.jenis_tes_id=jenis_tes.jenis_tes_id
        WHERE jadwal_tes.status='$id'");
      return perulangan($data);

    }

    public function hasil_jadwalaktif($id)
    {

      $data = $this->koneksi->query("SELECT * FROM jadwal_tes 
        JOIN pelajaran ON jadwal_tes.pelajaran_id=pelajaran.pelajaran_id 
        JOIN kelas ON jadwal_tes.id_kelas=kelas.id_kelas
        JOIN jenis_tes ON jadwal_tes.jenis_tes_id=jenis_tes.jenis_tes_id
        WHERE jadwal_tes.status='$id'");
      $Hasil = mysqli_num_rows($data);

      if ($Hasil==0) {
        $Hasil="Belum ";
      }
      return $Hasil;
    }

    public function detail_lebih_jadwal($id)
    {
      $data = $this->koneksi->query("SELECT * FROM jadwal_tes 
        WHERE jadwal_id='$id'");

      return $data->fetch_assoc();
    }

  	public function simpan_jadwalTes($tanggal_tes,$jam_mulai,$ruang,$jenis_tes,$pelajaran,$kelas,$status)
  	{
      $this->koneksi->query("INSERT INTO `jadwal_tes` 
        (`tgl_tes`, `jam_mulai`, `ruang`, `jenis_tes_id`, `pelajaran_id`, `id_kelas`, `status`) VALUES ('$tanggal_tes', '$jam_mulai', '$ruang', '$jenis_tes', '$pelajaran', '$kelas', '$status')");
  	}

    public function tampil_jadwal_semetser($nama_semster)
    {
      $data = $this->koneksi->query("SELECT * FROM jadwal_tes 
        JOIN jenis_tes ON jadwal_tes.jenis_tes_id=jenis_tes.jenis_tes_id
        WHERE jenis_tes.nama='$nama_semster'");
      return perulangan($data);
    }

    public function hapus_jadwal($id)
    {
      $this->koneksi->query("DELETE FROM jadwal_tes WHERE jadwal_id='$id'");
    }

  }

  class Nilai 
  {
    protected $koneksi;

    public function __construct($x)
    {
      $this->koneksi = $x;
    }

    public function tampil_nilai()
    {
      $data = $this->koneksi->query("SELECT * FROM nilai");
      return perulangan($data);
    }

    public function detail_nilai($id)
    {
      $data = $this->koneksi->query("SELECT * FROM nilai WHERE siswa_id='$id'");
      return $data->fetch_assoc();
    }

    public function simpan_nilai($siswa_id,$jadwal_id,$nilai)
    {
      $this->koneksi->query("INSERT INTO `nilai` (`siswa_id`, `jadwal_id`, `nilai`) VALUES ('$siswa_id', '$jadwal_id', '$nilai');");
    }

    public function hapus_nilai($id)
    {
      $this->koneksi->query("DELETE FROM nilai WHERE id_nilai='$id'");
    }

  }

  /**
  * 
  */
  class Absen 
  {
    protected $koneksi;

    public function __construct($x)
    {
       $this->koneksi = $x;
    }

    public function tampil_asben()
    {
      $data = $this->koneksi->query("SELECT * FROM absensi");
      return perulangan($data);
    }

    public function tampil_absen_jenis($jenis_absen)
    {
      $data = $this->koneksi->query("SELECT * FROM absensi WHERE jenis_absen='$jenis_absen'");
      return perulangan($data); 
    }

    public function asben_detail($id)
    {
      $data = $this->koneksi->query("SELECT * FROM absensi WHERE siswa_id='$id'");
      return $data->fetch_assoc();
    }

    public function hasil_absen()
    {
      $data = $this->koneksi->query("SELECT * FROM absensi");

      $hasil = mysqli_num_rows($data);

      if ($hasil==0) {
          
          $hasil=" 0 ";
      }
      return $hasil;
    }


    public function asben_detail_id($id)
    {
      $data = $this->koneksi->query("SELECT * FROM absensi WHERE id_absensi='$id'");
      return $data->fetch_assoc();
    }
    public function simpanAbsen($IdSiswa,$tanggal,$absen)
    {
      $this->koneksi->query("INSERT INTO `absensi` (`siswa_id`, `tanggal`, `jenis_absen`) VALUES ('$IdSiswa', '$tanggal', '$absen');");
    }

    public function hapus_absen($id_absensi)
    {
      $this->koneksi->query("DELETE FROM absensi WHERE id_absensi='$id_absensi'");
    }

  }

  /**
  * 
  */
  class Pengaturan
  {
    protected $koneksi;

    public function __construct($x)
    {
      $this->koneksi = $x;
    }

    public function tampil_pengaturan()
    {
      $data = $this->koneksi->query("SELECT * FROM pengaturan ");
      return perulangan($data); 
    }

    public function detail_pengaturan($id)
    {
      $data = $this->koneksi->query("SELECT * FROM pengaturan WHERE ID_PENG='$id'");
      return $data->fetch_assoc();
    }

    public function updatepengaturan($nama_aplikasi,$nama_lengkap,$telp_pengaturan,$email_pengaturan)
    {
      $this->koneksi->query("UPDATE `pengaturan` SET `NAMA_APLIKASI` = '$nama_aplikasi', `NAMA_LENGKAP` = '$nama_lengkap', `TELP` = '$telp_pengaturan', `EMAIL` = '$email_pengaturan' WHERE `pengaturan`.`ID_PENG` = 1;");
    }

  }

  $pengaturan = new Pengaturan($connent);
  $Absen     = new Absen($connent); 
  $nilai     = new Nilai($connent);
  $JadwalTes = new JadwalTes($connent);

?>


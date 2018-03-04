<?php 
    
    $kode = $siswa->nomor_siswa();
    
 ?>


<div class="row">
    <div class="col-md-12">
        <h2>Tambah Data</h2>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="panel-title">Formulir dan User</h2>
            </div>
            <div class="panel-body">
                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                 
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kode Siswa</label>
                        <div class="col-sm-3">
                    <input type="text" name="kode" class="form-control" value="<?php echo $kode ?>">
                        </div>
                        <label class="col-sm-1 control-label">Siswa</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="nama">
                        </div>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tempat Lahir</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tempat_lahir">
                        </div>
                          <label class="col-sm-1">Tanggal Lahir</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="tanggal_lahir">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Orang Tua</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama_ortua">
                        </div>
                        <label class="col-sm-1">Telp</label>
                        <div class="col-sm-3">
                            <input type="number" name="Telp" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat Berdomisili</label>
                        <div class="col-sm-3">
                            <input type="text" name="alamat1" class="form-control">
                        </div>
                        <label class="col-sm-1">Alamat Asal</label>
                        <div class="col-sm-3">
                            <input type="text" name="alamat2" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">RT / RW</label>
                        <div class="col-sm-2">
                            <input type="text" name="rt_rw" class="form-control" placeholder=" Tuliis RT / RW...">
                        </div>
                        <label class="col-sm-1 control-label">KodePos</label>
                        <div class="col-sm-2">
                            <input type="text" name="kodepos" class="form-control">
                        </div>
                        <label class="col-sm-2 control-label">Kota/Kabupaten</label>
                        <div class="col-sm-3">
                            <input type="text" name="kota" class="form-control">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="kelamin" value="L">Laki-laki
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="kelamin" value="P"> Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="status" value="0"> Tidak Aktif
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="status" value="1"> Aktif
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="siswasimpan" class="btn btn-primary">Simpan</button>
                            <a href="../admin/index.php?halaman=siswa" class="btn btn-default">Batal</a>
                        </div>
                    </div>
                </form>
                <?php 

                if (isset($_POST['siswasimpan'])) {

                if ($_POST['nama']=='') 
                  {
                   valiadis("Silakan mengisi nama");
               } elseif ($_POST['kelamin']=='') 
               {
                   valiadis("Silakan mengisi kelamin");
               }elseif ($_POST['tempat_lahir']=='') 
               {
                   valiadis("Silakan mengisi tempat lahir");
               }
               elseif ($_POST['tanggal_lahir']=='')
               {
                   valiadis("Silakan mengisi tempat lahir");
               }
               elseif ($_POST['nama_ortua']=='') {
                valiadis("Silakan mengisi nama orangtua");
            }
            elseif ($_POST['alamat1']=='') {
                valiadis("Silakan mengisi alamat berdomisi");
            }
            elseif ($_POST['alamat2']=='') {
                valiadis("Silakan mengisi alamat asal");
            }
            elseif ($_POST['rt_rw']=='') 
            {
                valiadis("Silakan mengisi RT / RW ");
            }elseif ($_POST['kota']=='') 
            {
                valiadis("Silakan mengisi kota");
            }elseif ($_POST['kodepos']=='') 
            {
                valiadis("Silakan mengisi kodepos");
            }elseif ($_POST['Telp']=='') {
                valiadis("Silakan mengisi Telp");

            }elseif ($_POST['status']=='') {
                valiadis("Silakan mengisi status");
            }
            elseif ($_FILES['foto']['tmp_name']=='') {
                valiadis("Silakan upload dulu");
            }
            elseif ($_POST['username']=='')
            {
                valiadis("Silakan mengisi username");
            }
            elseif ($_POST['password']=='')
            {
                valiadis("Silakan mengisi password");  
            }
            else{

                $Filefoto = $_FILES['foto'];
                $data = $siswa->tambah_siswa(
                    $_POST['kode'],
                    $_POST['nama'],
                    $_POST['kelamin'],
                    $_POST['tempat_lahir'],
                    $_POST['tanggal_lahir'],
                    $_POST['nama_ortua'],
                    $_POST['alamat1'],
                    $_POST['alamat2'],
                    $_POST['rt_rw'],
                    $_POST['kota'],
                    $_POST['kodepos'],
                    $_POST['Telp'],
                    $Filefoto,
                    $_POST['status'],
                    $_POST['username'],
                    $_POST['password']);
                if (!$data) 
                {
                    pop('berhasil simpan','../admin/index.php?halaman=siswa');
               }else
               {
                pop('Gagal simpan','../admin/index.php?halaman=tambah_siswa');
            }
        }

    }


    ?>
</div>
</div>
<br>
<br>



</div>
</div>
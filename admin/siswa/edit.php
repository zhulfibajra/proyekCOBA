<?php 

$detailSiswa = $siswa->detail_siswa($_GET['id']);
$detailUser  = $user->tampil_user_siswa($_GET['id']);

?>

<div class="row">
    <div class="col-md-9">
        <h2>Edit Data</h2>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="panel-title">Ganti Formulir dan User</h2>
            </div>
            <div class="panel-body">
                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kode Siswa</label>
                        <div class="col-sm-10">
                            <input type="text" name="kode" class="form-control" value="<?php echo $detailSiswa['siswa_id'] ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Siswa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="<?php echo $detailSiswa['nama'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="kelamin" value="L" 
                                    <?php 
                                    JesKelRa($detailSiswa['kelamin'],"L")
                                    ?>
                                    >Laki-laki
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="kelamin" value="P"
                                    <?php 
                                    JesKelRa($detailSiswa['kelamin'],"P")
                                    ?>
                                    > Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $detailSiswa['tempat_lahir'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $detailSiswa['tgl_lahir'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Orang Tua</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_ortua" value="<?php echo $detailSiswa['nama_ortu'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat Berdomisili</label>
                        <div class="col-sm-10">
                            <textarea name="alamat1" class="form-control">
                                <?php echo $detailSiswa['alamat1'] ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat Asal</label>
                        <div class="col-sm-10">
                            <textarea name="alamat2" class="form-control">
                                <?php echo $detailSiswa['alamat2'] ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">RT / RW</label>
                        <div class="col-sm-10">
                            <input type="text" name="rt_rw" class="form-control" placeholder=" Tuliis RT / RW..." value="<?php echo $detailSiswa['rt_rw'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kota / Kabupaten</label>
                        <div class="col-sm-10">
                            <input type="text" name="kota" class="form-control" value="<?php echo $detailSiswa['kota'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">KodePos</label>
                        <div class="col-sm-10">
                            <input type="text" name="kodepos" class="form-control" value="<?php echo $detailSiswa['kodepos'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Telp</label>
                        <div class="col-sm-10">
                            <input type="number" name="Telp" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Foto</label>
                        <div class="col-sm-10">
                            <?php if (isset($detailSiswa['foto'])): ?>
                            <img src="../asset/image/<?php echo $detailSiswa['foto'] ?>" class="img-responsive" alt="Responsive image">
                                
                            <?php else: ?>
                                <img src="../asset/image/user.jpg" class="img-responsive" alt="Responsive image">
                            
                            <?php endif ?>
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>

                 <?php if ($_SESSION['login']['level']==3): ?>
                 
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="status" class="form-control hidden" value="<?php echo $DetailSiswa['status'] ?>">
                            <?php echo StatusAktif($DetailSiswa['status']) ?>
                        </div>
                    </div>

                 <?php else : ?>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="status" value="0"
                                    <?php 
                                    JesKelRa($detailSiswa['status'],0);
                                    ?>
                                    > Tidak Aktif
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="status" value="1"
                                    <?php 
                                    JesKelRa($detailSiswa['status'],1);
                                    ?>
                                    > Aktif
                                </label>
                            </div>
                        </div>
                    </div> 
                <?php endif ?>                    

                <div class="form-group">
                    <label class="col-sm-2 control-label">username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" value="<?php echo $detailUser['username'] ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" value="<?php echo $detailUser['password'] ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="siswasimpan" class="btn btn-primary">Rubah</button>

                        <?php if ($_SESSION['login']['level']==3): ?>
                         <a href="../admin/index.php?halaman=profil" class="btn btn-default">Batal</a>
                     <?php else : ?>
                         <a href="../admin/index.php?halaman=siswa" class="btn btn-default">Batal</a> 
                     <?php endif ?>
                 </div>
             </div>
         </form>
         <?php 

         if (isset($_POST['siswasimpan'])) {


            if ($_POST['nama']==$detailSiswa['nama']) 
            {
             valiadis("Silakan merubah nama");
         } elseif ($_POST['kelamin']==$detailSiswa['kelamin']) 
         {
             valiadis("Silakan merubah kelamin");
         }elseif ($_POST['tempat_lahir']==$detailSiswa['tempat_lahir']) 
         {
             valiadis("Silakan merubah tempat lahir");

         }
         elseif ($_POST['tanggal_lahir']==$detailSiswa['tgl_lahir'])
         {
             valiadis("Silakan merubah tempat lahir");
         }
         elseif ($_POST['nama_ortua']==$detailSiswa['nama_ortu']) {
            valiadis("Silakan merubah nama orangtua");
        }
        elseif ($_POST['alamat1']==$detailSiswa['alamat1']) {
            valiadis("Silakan merubah alamat berdomisi");
        }
        elseif ($_POST['alamat2']==$detailSiswa['alamat2']) {
            valiadis("Silakan merubah alamat asal");
        }
        elseif ($_POST['rt_rw']==$detailSiswa['rt_rw']) 
        {
            valiadis("Silakan merubah RT / RW ");
        }
        elseif ($_POST['kota']==$detailSiswa['kota']) 
        {
            valiadis("Silakan merubah kota");
        }
        elseif ($_POST['kodepos']==$detailSiswa['kodepos']) 
        {
            valiadis("Silakan merubah kodepos");
        }
        else{

           $Filefoto = $_FILES['foto'];
                      $data = $siswa->edit_siswa(
                $_POST['nama'],$_POST['kelamin'],$_POST['tempat_lahir'],$_POST['tanggal_lahir'],
                $_POST['nama_ortua'],$_POST['alamat1'],$_POST['alamat2'],$_POST['rt_rw'],$_POST['kota'],$_POST['kodepos'],$_POST['Telp'],$Filefoto,$_POST['status'],$_POST['username'],$_POST['password'],$_GET['id']);

      
            if (!$data) 
            {
                if ($_SESSION['login']['level']==3) {
                 pop('berhasil merubah','../admin/index.php?halaman=profil');
             }else
             {
                pop('berhasil merubah','../admin/index.php?halaman=siswa');    
            }

        }else
        {

            if ($_SESSION['login']['level']==3) {
             pop('gagal merubah','../admin/index.php?halaman=profil');
         }else
         {
            pop('Gagal merubah','../admin/index.php?halaman=tambah_siswa');    
        }

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
 <?php 
 $DetailSiswa = $siswa->detail_siswa($_SESSION['login']['id_user']);
 $DetailUser = $user->tampil_user_siswa($_SESSION['login']['id_user']);

 ?>

 <header class="main-header">

  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>APP</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>APP</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            
              <?php if ($_SESSION['login']['level']==1): ?>
            
                    <img src="../asset/image/user.jpg" class="user-image" alt="User Image">
                  
              <?php else: ?>

                    <?php if (isset($DetailSiswa['foto'])): ?>
                      
                          
                          <img src="../asset/image/<?php echo $DetailSiswa['foto'] ?>" class="user-image" alt="User Image"> 
                    <?php else: ?>
                          <img src="../asset/image/user.jpg" class="user-image" alt="User Image">
                          
                    <?php endif ?>
                  
            <?php endif ?>  
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><?php echo $DetailUser['nama_lengkap'] ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <?php if ($_SESSION['login']['level']==1): ?>
                        <img src="../asset/image/user.jpg"  class="img-circle" alt="User Image"">
              <?php else: ?>

                    <?php if (isset($DetailSiswa['foto'])): ?>            
                          <img src="../asset/image/<?php echo $DetailSiswa['foto'] ?>"  class="img-circle" alt="User Image""> 
                    <?php else: ?>
                          <img src="../asset/image/user.jpg"  class="img-circle" alt="User Image"">
                          
                    <?php endif ?>
                  
              <?php endif ?>

              <p>
                <?php if ($_SESSION['login']): ?>
                      <?php echo $_SESSION['login']['nama_lengkap'] ?>                  
                <?php else: ?>
                  <?php echo $DetailSiswa['nama'] ?> 

                <?php endif ?>
                

                - <?php echo LevelUser($DetailUser['level']) ?>

              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">

              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="index.php?halaman=logout" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
         <?php if ($_SESSION['login']['level']==1): ?>
                        <img src="../asset/image/user.jpg"  class="img-circle" alt="User Image"">
              <?php else: ?>

                    <?php if (isset($DetailSiswa['foto'])): ?>            
                          <img src="../asset/image/<?php echo $DetailSiswa['foto'] ?>"  class="img-circle" alt="User Image""> 
                    <?php else: ?>
                          <img src="../asset/image/user.jpg"  class="img-circle" alt="User Image"">
                          
                    <?php endif ?>
                  
              <?php endif ?>
      </div>
      <div class="pull-left info">
        <p>

          <?php if ($_SESSION['login']): ?>
                      <?php echo $_SESSION['login']['nama_lengkap'] ?>                  
          <?php else: ?>
                  <?php echo $DetailSiswa['nama'] ?> 

          <?php endif ?>
                
          


        </p>
        <!-- Status -->
        <a href="#">
          <?php 
          if(isset($_SESSION['login']))
          {
            echo "<i class=\"fa fa-circle text-success\"></i> Online";
          }
          else
          {
            echo "<i class=\"fa fa-circle text-danger\"></i> Offline";
          }

          ?>
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <!-- Optionally, you can add icons to the links -->

      <?php if ($_SESSION['login']['level']==3): ?>

        <li><a href="../admin/"><i class="fa fa-cube"></i> <span>Home</span></a></li>
        <li><a href="../admin/index.php?halaman=profil"><i class="fa fa-cube"></i> <span>Profil</span></a></li>
        <li><a href="index.php?halaman=logout"><i class="fa fa-cube"></i> Sign out</a>></li>

      <?php else: ?>

        <li><a href="../admin/"><i class="fa fa-cube"></i> <span>Home</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-mortar-board"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?halaman=user"><i class="fa fa-mortar-board"></i> User</a></li>
            <li><a href="index.php?halaman=siswa"><i class="fa fa-mortar-board"></i> Siswa</a></li>
            <li><a href="index.php?halaman=pelajaran"><i class="fa fa-mortar-board"></i> Pelajaran</a></li>
            <li><a href="index.php?halaman=jenis_tes"><i class="fa fa-mortar-board"></i> Jenis Tes</a></li>
            <li><a href="index.php?halaman=kelas"><i class="fa fa-mortar-board"></i> Kelas</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-mortar-board"></i> <span>Sistem Penilaian Dan Ujian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?halaman=absensi"><i class="fa fa-mortar-board"></i> Absensi Siswa</a></li>
            <li><a href="index.php?halaman=nilai"><i class="fa fa-mortar-board"></i> Penilaian</a></li>
            <li><a href="index.php?halaman=jadwal"><i class="fa fa-mortar-board"></i> Penjadwal Ujian</a></li>
          </ul>
        </li>
        <li><a href="index.php?halaman=pengaturan"><i class="fa fa-link"></i> <span>Pengaturan</span></a></li>  
        <li><a href="index.php?halaman=logout"><i class="fa fa-cube"></i> Sign out</a>></li>

      <?php endif ?>

    </ul>
    
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
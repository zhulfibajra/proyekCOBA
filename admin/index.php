<?php 
 include "../config/koneksi.php";
 include "../config/library.php";
    
    if (!isset($_SESSION['login'])) {
      echo pop('silakan login terlebih dahulu','../login.php');
    exit();
    }

 ?>



<?php include 'head.php';
 
 include "../controller/classMaster.php";
 include "../controller/classTranskasi.php";
    

   ?>
  
  <?php include 'navbar2.php'; ?>

  <div class="content-wrapper">
    <section class="content container-fluid">
    
          <?php   
                       
                        include 'content.php';
          ?>
    
    </section>
  </div>
  
  <?php include "mainfooter.php"; ?>
  <?php include 'footer2.php'; ?>

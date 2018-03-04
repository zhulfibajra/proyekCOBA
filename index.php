<?php 


	if(!isset($_GET['halaman'])){

			include 'MENU.php';
	}
	else
	{
		if ($_GET['halaman']=='HadirAbsen') {
			
			include 'Absen.php';
		}
		elseif($_GET['halaman']=='Login')
		{
			include 'login.php';
		}
		elseif($_GET['halaman']=='register')
		{
			include 'Register.php';
		}
		else
		{
			include '404.php';
		}
	}




 ?>
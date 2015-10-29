<?php
	define('p_title','.:: Inicio ::.');
	include('templates/header.php');
	
	session_start();
	if (!(isset($_SESSION['acceso']))){
		header('Location: login.php');
	}
?>
	<h1>Bienvenido al panel de control</h1>
	<img src="img2.png">
<?php
	include('templates/footer.php');
?>
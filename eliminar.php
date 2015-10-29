<?php
	session_start();
	if (!(isset($_SESSION['acceso']))){
		header('Location: login.php');
	}	
	
	include("clases/Dao.php");

	$db;
	$db = new Dao(array(
		'server_ip' => 'localhost',
		'server_user' => 'root',
		'server_password' => '',
		'server_db' => 'inventario_telematica'
	));

	$valor=$_GET['pr_id'];
	$borrar=$db->query("delete from productos where pr_id=$valor");
	header("location: listado.php");
?>
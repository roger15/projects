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

	$valor=$_POST['pr_id'];

	$pr_codigo = $_POST['pr_codigo'];
	$pr_nombre = $_POST['pr_nombre'];
	$pr_categoria = $_POST['pr_categoria'];
	$pr_preciocompra = $_POST['pr_preciocompra'];
	$pr_precioventa = $_POST['pr_precioventa'];

	$db->query("update productos set pr_codigo='$pr_codigo', pr_nombre = '$pr_nombre', pr_categoria = '$pr_categoria',pr_preciocompra = '$pr_preciocompra', pr_precioventa = '$pr_precioventa' where pr_id = $valor");

	header("location: listado.php");
?>
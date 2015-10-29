<?php
	session_start();
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>.:: Inicio de sesión ::.</title>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="estilos_index.css">
	</head>
	<body>
		<?php
			$error=false;
			$incompleto=false;

			if(isset($_SESSION['acceso']))
				header("location: index.php");

			if(isset($_POST['btnlogin'])){
				if($_POST['user']!='' && $_POST['password']!=''){
					include("clases/Dao.php");

						$db;
						$db = new Dao(array(
						'server_ip' => 'localhost',
						'server_user' => 'root',
						'server_password' => '',
						'server_db' => 'inventario_telematica'
					));

					$existe=$db->query_array("select * from usuarios where usuario='".$_POST['user']."' and '".$_POST['password']."'");

						
					if(count($existe)>0){
						$_SESSION['acceso']=$existe[0];
						session_start();
						header("Location: index.php");
					}
					else{
						$error=true;
					}
				}
				else{
					$incompleto=true;
				}
			}

			
		?>

		<div class="container">
			<div class="jumbotron">
				<form class="form-signin" role="form" action="login.php" method="post">
					<?php
						if($error==true){
					?>
							<div class="alert alert-danger">
								Datos incorrectos favor de verificarlos
							</div>
					<?php
						}
					?>

					<?php
						if($incompleto==true){
					?>
							<div class="alert alert-danger">
								Datos incompletos 
							</div>						
					<?php
						}
					?>
					<img src="user2.png" />
					<h2 class="form-signin-heading">Inicio de sesión</h2>

					<input type="text" name="user" class="form-control" placeholder="Usuario" autofocus="" >
					<input type="password" name="password" class="form-control" placeholder="Contraseña">

					<input class="btn btn-lg btn-primary btn-block" type="submit" name="btnlogin" value="Iniciar Sesión"></input>
				</form>
			</div>
		</div>
	</body>
</html>